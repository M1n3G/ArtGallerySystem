<?php

use App\Http\Controllers\ArtworkController;
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
Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

//Store
Route::get('/store', 'ArtController@index') ->name('store.index');
Route::get('/storeDetails/{artID}', 'ArtController@details') ->name('storeDetails.details');

// Cart
Route::get('/cart', function () {
    return view('cart');
});

// Login
Route::get('/login', function () {
    return view('login');
});

// Register
Route::get('/register', function () {
    return view('register');
});

// About
Route::get('/about', function () {
    return view('about');
});

//Exhibitions
Route::get('/exhibitions', function () {
    return view('exhibitions');
});




