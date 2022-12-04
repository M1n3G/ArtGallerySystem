<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Address;
use App\Models\Workshop;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthCheck');
    }

    public function profile()
    {
        $username = session()->get('username');
        $user = new User;
        $users = User::where('username', $username)->first();
        $workshop= Workshop::where('userID',$username)->first();
        return view('user/profile', compact('users','workshop'));
    }

    public function editprofile($userID)
    {
        $users = User::where('userID', $userID)->firstorFail();
        return view('user/editprofile',  compact('users'));
    }

    public function updateprofile(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:100',
            "contactNum" => 'string|regex:/^[0-9]{3}[-]{1}[0-9]{7,8}$/',
        ]);

        if ($request->hasFile('image')) {
            $image = $request['image'];
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
            $user = User::where('userID', $id)
                ->update([
                    'contactNum' => $request['contactNum'],
                    'gender' => $request['gender'],
                    'about' => $request['about'],
                    'userImg' => $uploadedFileUrl
                ]);
        } else {
            $user = User::where('userID', $id)
                ->update([
                    'contactNum' => $request['contactNum'],
                    'gender' => $request['gender'],
                    'about' => $request['about']
                ]);
        }

        return redirect('/profile')->with('success', 'Profile updated successfully');
    }


    public function address()
    {
        $username = session()->get('username');
        $user = new User;
        $users = User::where('username', $username)->first();

        $address = new Address;
        $address = Address::where('username', $username)->first();
        return view('user/address', compact('users', 'address'));
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            "name" => 'regex:/^[\pL\s\-]+$/u',
            "contact" => 'regex:/^[0-9]{3}[-]{1}[0-9]{7,8}$/',
            "address" => 'max:150',
            "city" => 'max:50',
            "state" => 'max:50',
            "postalcode" => 'max:5',
            "houseno" => 'max:7'
        ]);

        $address = new Address;
        $address->username = Session::get('username');
        $address->name = $request->get('name');
        $address->contact = $request->get('contact');
        $address->address = $request->get('address');
        $address->city = $request->get('city');
        $address->state = $request->get('state');
        $address->postalcode = $request->get('postalcode');
        $address->houseno = $request->get('houseno');

        if ($address->save()) {
            return redirect()->back()->with('success', 'Address added successfully');
        }

        return redirect()->back()->with('fail', 'Unable to add address');
    }

    public function editAddress($userID)
    {
        $username = session()->get('username');
        $user = new User;
        $users = User::where('username', $username)->first();

        $address = new Address;
        $address = Address::where('username', $username)->first();
        return view('user/editaddress',  compact('users', 'address'));
    }

    public function updateaddress(Request $request, $id)
    {
        $request->validate([
            "name" => 'regex:/^[\pL\s\-]+$/u',
            "contact" => 'regex:/^[0-9]{3}[-]{1}[0-9]{7,8}$/',
            "address" => 'max:150',
            "city" => 'max:50',
            "state" => 'max:50',
            "postalcode" => 'max:5',
            "houseno" => 'max:7'
        ]);

        $username = session()->get('username');
        $address = new Address;
        $address = Address::where('username', $username)
            ->update([
                'name' => $request['name'],
                'contact' => $request['contact'],
                'address' => $request['address'],
                'city' => $request['city'],
                'state' => $request['state'],
                'postalcode' => $request['postalcode'],
                'houseno' => $request['houseno']
            ]);

        return redirect('profile/address')->with('success', 'Address updated successfully');
    }



    public function password()
    {
        $username = session()->get('username');
        $user = new User;
        $users = User::where('username', $username)->first();
        return view('user/changepassword', compact('users'));
    }

    public function changeUserPassword(Request $request)
    {

        $this->validate($request, [
            'password' => 'required|string',
            'new_password' => 'required|same:password_confirm|min:8|string|max:20'
        ]);

        $username = Session::get('username');
        $users = User::where('username', $username)->first();

        // The passwords matches
        if (!Hash::check($request->get('password'), $users->password)) {
            return back()->with('error', "Current Password is Invalid");
        }

        // Current password and new password same
        if (strcmp($request->get('password'), $request->new_password) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user =  User::where('username', $username)->update(['password'=> Hash::make($request->new_password)]);

        return redirect('/profile')->with('success', 'Your password has been changed!');
    }


    public function purchase()
    {
        $username = session()->get('username');
        $user = new User;
        $users = User::where('username', $username)->first();
        return view('user/purchase', compact('users'));
    }
}
