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
Route::get('login', function () { return view('login'); });
Route::get('register', function () { return view('register'); });
Route::post('/register', 'UserController@store') ->name('register.register');
Route::post('/login', 'UserController@login') ->name('login.login');
Route::get('/logout', 'UserController@logout') ->name('logout.logout');

//Store
Route::get('/store', 'ArtController@index') ->name('store.index');
Route::get('/storeDetails/{artID}', 'ArtController@details') ->name('storeDetails.details');

// Cart
Route::get('/cart', function () { return view('cart'); });

// About
Route::get('/about', function () { return view('about'); });

//Exhibitions
Route::get('/exhibitions', function () { return view('exhibitions'); });

//Forum
// Route::get('/forumhome', 'ForumController@forumhome');
Route::get('/manage', 'ForumController@manageHome');
Route::get('/createCategory', 'ForumController@category');
Route::post('/add-category', 'ForumController@storeCategory')->name('forum.storecategory');


Route::get('/forum', 'PostController@index')->name('postslist');
Route::get('/forum/create', 'PostController@create')->name('post.create');

Route::post('/forum/store', 'PostController@store')->name('post.store');
Route::get('/forum/show/{id}', 'PostController@show')->name('post.show');

Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');


