<?php

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
Route::get('login', function () {
    return view('login');
});
Route::get('register', function () {
    return view('register');
});
Route::post('/register', 'UserController@store')->name('register.register');
Route::post('/login', 'UserController@login')->name('login.login');
Route::get('/logout', 'UserController@logout')->name('logout.logout');

//Store
Route::get('/store', 'ArtController@index')->name('store.index');
Route::get('/storeDetails/{artID}', 'ArtController@details')->name('storeDetails.details');
Route::post('/storeDetails/comment/store', 'CommentController@store')->name('comment.store');
Route::delete('/storeDetails/remove/{artID}', 'ArtController@removeComment')->name('comment.remove');
Route::get("/wishlist", 'WishlistController@index')->name('wishlist.show');
Route::post("/wishlist/add/{artID}", 'WishlistController@add')->name('wishlist.add');
Route::delete('/wishlist/remove/{artID}', 'WishlistController@remove')->name('wishlist.remove');


// Cart
Route::get('/cart', function () {
    return view('cart');
});

// About
Route::get('/about', function () {
    return view('about');
});

//Exhibitions
Route::get('/exhibitions', function () {
    return view('exhibitions');
});

//Forum
// Route::get('/forumhome', 'ForumController@forumhome');
Route::get('/forum/manage', 'CategoryController@index')->name('categorylist');
Route::get('/forum/createCategory', 'CategoryController@create')->name('category.create');
Route::post('/forum/storeCategory', 'CategoryController@store')->name('category.store');
Route::get('/forum/editCategory/{id}', 'CategoryController@edit')->name('category.edit');
Route::put('/forum/editCategory/{id}', 'CategoryController@update')->name('category.update');
Route::delete('/forum/deletecategory/{id}', 'CategoryController@destroy')->name('category.delete');

Route::get('/forum', 'PostController@index')->name('category.view');
Route::get('/forum/category/{category_id}', 'PostController@viewCategoryPost')->name('category.post');
Route::get('/forum/{category_id}/{title}', 'PostController@viewPost')->name('post.view');
Route::post('/forum/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/forum/reply', 'CommentController@replyStore')->name('reply.add');


Route::get('/forum/create', 'PostController@create')->name('post.create');
Route::post('/forum/store', 'PostController@store')->name('post.store');
Route::get('/forum/editPost/{id}', 'PostController@edit')->name('post.edit');
Route::put('/forum/editPost/{id}', 'PostController@update')->name('post.update');
Route::delete('/forum/deletepost/{id}', 'PostController@destroy')->name('post.delete');

