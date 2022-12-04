<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = "MYR";
                $payment->paymentStatus = $arr_body['state'];

                if ($payment->save()) {
                    $users = session()->get('username');

                    $cart = DB::table('cart')
                        ->where('userID', $users)
                        ->get();

                    $address = DB::table('addresses')
                        ->where('username', $users)
                        ->get();

                    $payment = DB::table('payment')
                        ->where('paymentID', $result)
                        ->get();


                    return view('payment/invoice', compact('cart', 'address', 'payment'));
                }
            } else {
                return $response->getMessage();
            }
        } else {
            return "payment END";
        }
    }

    public function error()
    {
        return "payment end";
    }
}
