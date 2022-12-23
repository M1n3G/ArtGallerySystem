<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Notification;
use App\Notifications\ReminderPayment;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (\Throwble $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(
                array(
                    'payer_id' => $request->input('PayerID'),
                    'transactionReference' => $request->input('paymentId'),
                )
            );

            $response = $transaction->send();


            if ($response->isSuccessful()) {
                $arr_body = $response->getData();

                $result = $arr_body['id'];


                $payment = new Payment;
                $payment->paymentID = $arr_body['id'];
                $payment->payer_id = session()->get('username');
                $payment->userEmail = session()->get('email');
                if ($request->session()->has('cartOrder')) {
                    $payment->itemID = json_encode(session()->get('cartOrder'));
                    $payment->type = "c";
                } else {
                    $payment->itemID = session()->get('auctionOrder');
                    $payment->type = "a";
                }

                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = "MYR";
                $payment->paymentStatus = $arr_body['state'];

                if ($payment->save()) {
                    $users = session()->get('username');


                    $cart = DB::table('cart')
                        ->where('userID', $users)
                        ->get();

                    $address = DB::table('addresses')
                        ->join('users', 'users.username', '=', 'addresses.username')
                        ->where('addresses.username', $users)
                        ->select('addresses.*', 'users.contactNum')
                        ->get();

                    $payment = DB::table('payment')
                        ->where('paymentID', $result)
                        ->get();



                    if ($request->session()->has('cartOrder')) {

                        $product = session()->get('cartOrder');
                        DB::table('cart')
                            ->whereIn('itemID', $product)
                            ->delete();

                        DB::table('art')
                            ->whereIn('artID', $product)
                            ->update([
                                'artStatus' => "SOLD"
                            ]);

                        return view('payment/invoice', compact('cart', 'address', 'payment'));
                    } else {
                        $auc = session()->get('auctionOrder');
                        $auction = DB::table('auction')
                            ->where('auctionID', $auc)
                            ->get();

                        DB::table('auction')
                            ->where('auctionID', $auc)
                            ->update([
                                'auctionStatus' => "FINISH"
                            ]);

                        return view('payment/invoice', compact('cart', 'address', 'payment', 'auction'));
                    }
                }
            } else {
                return $response->getMessage();
            }
        } else {
            return redirect('/cart')->with('fail', 'User Declined the payment.');
        }
    }

    public function error()
    {
        return redirect('/cart')->with('fail', 'Payment Declined');
    }

    public function index()
    {
        $user = session()->get('username');
        $users = User::where('username', $user)->first();

        $payment = DB::table('payment')
            ->where('payer_id', $user)
            ->distinct()
            ->get();

        $art = DB::table('art')
            ->get();

        $auction = DB::table('auction')
            ->join('payment', 'payment.itemID', '=', 'auction.auctionID')
            ->where('payment.payer_id', $user)
            ->select('payment.*', 'auction.*')
            ->get();

        return view('user/purchase', compact('payment', 'users', 'art', 'auction'));
    }
}
