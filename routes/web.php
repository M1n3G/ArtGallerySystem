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

Route::get("/wishList", 'WishlistController@show')->name('wishlist.show');
Route::post("/wishList/add", 'WishlistController@add')->name('wishlist.add');


//Store
Route::get('/store', 'ArtController@index')->name('store.index');
Route::get('/storeDetails/{artID}', 'ArtController@details')->name('storeDetails.details');
Route::get('/storeDetails/comment/create', 'CommentController@create')->name('comment.create');
Route::post('/storeDetails/comment/store', 'CommentController@store')->name('comment.store');
Route::get('/store/filter', 'ArtController@filter')->name('store.filter');

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

Route::get('/forum', 'PostController@index')->name('postslist');
Route::get('/forum/category/{category_id}', 'PostController@viewCategoryPost')->name('category.post');
Route::get('/forum/{category_id}/{title}', 'PostController@viewPost')->name('post.view');


Route::get('/forum/create', 'PostController@create')->name('post.create');
Route::post('/forum/store', 'PostController@store')->name('post.store');
Route::get('/forum/editPost/{id}', 'PostController@edit')->name('post.edit');
Route::put('/forum/editPost/{id}', 'PostController@update')->name('post.update');
Route::delete('/forum/deletepost/{id}', 'PostController@destroy')->name('post.delete');

// Route::post('/comment/tore', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
