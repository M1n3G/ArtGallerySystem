<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\StoreComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\LoginComponent;
use App\Http\Livewire\RegisterComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Home
Route::get('/', HomeComponent::class);

//Store
Route::get('/store', StoreComponent::class);

//Cart
Route::get('/cart', CartComponent::class);

//Checkout
Route::get('/checkout', CheckoutComponent::class);

//Login
Route::get('/login', LoginComponent::class);

//Register
Route::get('/register', RegisterComponent::class);


