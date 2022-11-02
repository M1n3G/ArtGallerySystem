<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        // $validate = $request->validate ([
        //     "username" => 'required|unique:users|min:5',
        //     "name" => 'required|regex:/^[\pL\s\-]+$/u',
        //     "email" => 'required|unique:users|max:255|email',
        //     "contactNum" => 'required|regex:/^[0-9]{3}[-]{1}[0-9]{7,8}$/',
        //     "password" => 'required|min:6|confirmed'
        // ]);

        $user = new User();
        $user->userID = $this -> generateUserID();
        $user->username = $request['username'];
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->contactNum = $request['contactNum'];
        $user->password = Hash::make($request['password']);

        $user->save();
        // DB::table('users')->insert($user);
        return redirect('login')->with('success', 'Register Successfully');
    }    
        
        
    public static function generateUserID(int $length = 8): string {
        $user_id = Str::random($length);//Generate random string
        $exists = DB::table('users')
            ->where('userID', '=', $user_id)
            ->get(['userID']);//Find matches for id = generated id

        if (isset($exists[0]->id)) {//id exists in users table
            return self::generateUserid();//Retry with another generated id
        }

        return $user_id;//Return the generated id as it does not exist in the DB
    } 
        
    public function login(Request $request){

        $user = User::where(['username'=>$request->username])->first();
        if(!$user || !Hash::check($request->password, $user->password)) {
            return "Username or password is not matched";
        }
        else {
            $request->session()->put('username',$user->username);
            return redirect('/');
        } 
    }

    public function logout(){
        if (session()->has('username')) {
            session()->forget('username');
            session()->forget('userID');
            return redirect('/');
        }
    }

       
    
}
