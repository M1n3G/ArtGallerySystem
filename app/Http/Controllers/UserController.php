<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;


class UserController extends Controller
{

    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            "username" => 'required|unique:users|min:5|max:30',
            "name" => 'required|regex:/^[\pL\s\-]+$/u',
            "email" => 'required|unique:users|max:255|email',
            "contactNum" => 'required|regex:/^[0-9]{3}[-]{1}[0-9]{7,8}$/',
            "password" => 'required|min:8|max:20'
        ]);

        $user = new User;
        $user->userID = $this->generateUserID();
        $user->username = $request->get('username');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->contactNum = $request->get('contactNum');
        $user->userRole = "User";
        $user->password = Hash::make($request->get('password'));    
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date =  Carbon::now()->format('Y-m-d H:i:s');
        $user->datetime = $date;

        if ($user->save() ) {
            return redirect('login')->with('success','Register Successfully');
        }
        
        return redirect()->back()->with('fail','Unable to register');
    }


    public static function generateUserID(int $length = 8): string
    {
        $user_id = Str::random($length); //Generate random string
        $exists = DB::table('users')
            ->where('userID', '=', $user_id)
            ->get(['userID']); //Find matches for id = generated id

        if (isset($exists[0]->id)) { //id exists in users table
            return self::generateUserid(); //Retry with another generated id
        }

        return $user_id; //Return the generated id as it does not exist in the DB
    }

    public function login(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('fail', 'Incorrect credentials. Please try again.');
        } else {
            $request->session()->put('username', $user->username);
            $request->session()->put('userRole', $user->userRole);
            return redirect('/home')->with('success2', 'Login Successfully');
        }
    }

    public function logout()
    {
        if (session()->has('username')) {
            session()->forget('username');
            session()->forget('userID');
            session()->forget('userRole');
            return redirect('/');
        }
    }
}
