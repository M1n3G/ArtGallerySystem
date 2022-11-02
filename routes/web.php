<?php

use App\Http\Controllers\ArtController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');

//User
Route::group(['middleware' => ['authCheck']], function () {
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::get('/login', 'UserController@login')->name('user.login');
    Route::get('/register', 'UserController@register')->name('user.register');
    Route::get('/logout', 'UserController@userLogout')->name('user.logout');
    
});


//Store
Route::get('/store', 'ArtController@index') ->name('store.index');
Route::get('/storeDetails/{artID}', 'ArtController@details') ->name('storeDetails.details');

// Cart
Route::get('/cart', function () {
    return view('cart');
});

// Login
Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

// Register
Route::post('/register', 'UserController@store') ->name('register.register');
Route::post('/login', 'UserController@login') ->name('login.login');

Route::get('/logout', 'UserController@logout') ->name('logout.logout');

// About
Route::get('/about', function () {
    return view('about');
});

//Exhibitions
Route::get('/exhibitions', function () {
    return view('exhibitions');
});


