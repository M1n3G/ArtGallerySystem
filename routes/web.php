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

// ERR0R 404
Route::fallback(function () {
    return view('error404');
});


// Home
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');

Route::get('login', function () {
    return view('login');
});
Route::get('register', function () {
    return view('register');
});

//User
Route::post('/register', 'UserController@store')->name('register.register');
Route::post('/login', 'UserController@login')->name('login.login');


//Store
Route::get('/store', 'ArtController@index')->name('store.index');
Route::get('/storeDetails/{artID}', 'ArtController@details')->name('storeDetails.details');

Route::get('/profile', 'ProfileController@profile')->name('profile.show');

Route::get('/profile/address', 'ProfileController@address')->name('address.show');
Route::post('/profile/addaddress', 'ProfileController@storeAddress')->name('address.add');
Route::get('/profile/editaddress/{userID}', 'ProfileController@editAddress')->name('address.edit');
Route::post('/profile/editaddress/{userID}', 'ProfileController@updateAddress')->name('address.update');

Route::get('/profile/editprofile/{userID}', 'ProfileController@editprofile')->name('profile.edit');
Route::post('/profile/editprofile/{userID}', 'ProfileController@updateprofile')->name('profile.update');

Route::get('/profile/changepassword', 'ProfileController@password')->name('password.show');
Route::post('/profile/changepassword', 'ProfileController@changeUserPassword')->name('password.update');

Route::get('/profile/mypurchase', 'ProfileController@purchase')->name('purchase.show');

Route::get('/forumprofile', 'ForumProfileController@forumProfile')->name('forumprofile.show');

Route::middleware(['AuthCheck'])->group(function () {
    Route::post('/storeDetails/comment/store', 'CommentController@store')->name('comment.store');
    Route::delete('/storeDetails/remove/{artID}', 'ArtController@removeComment')->name('comment.remove');
    Route::get('/logout', 'UserController@logout')->name('logout.logout');
    Route::get("/wishlist", 'WishlistController@index')->name('wishlist.show');
    Route::post("/wishlist/add/{artID}", 'WishlistController@add')->name('wishlist.add');
    Route::delete('/wishlist/remove/{artID}', 'WishlistController@remove')->name('wishlist.remove');
});

// Reset Password
Route::get('/forget-password', 'ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('/forget-password', 'ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('/reset-password/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('/reset-password', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');

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
Route::get("/viewGallery", 'ExhibitionsController@');
Route::get("/viewGallery", 'ExhibitionsController@index')->name('exhibitions.show');

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

Route::get('/searchpost', 'CategoryController@search')->name('post.search');
Route::post('/post', 'PostController@viewPost')->name('post.view');
Route::post('/report/store', 'PostController@storeReport')->name('report.store');

Route::middleware(['AuthCheck'])->group(function () {
    Route::get('/forum/create', 'PostController@create')->name('post.create');
    Route::get('/forum/editPost/{id}', 'PostController@edit')->name('post.edit');
    Route::put('/forum/editPost/{id}', 'PostController@update')->name('post.update');
    Route::post('/forum/comment', 'CommentController@storeForumComment')->name('forumcomment.store');
    Route::delete('/forum/comment/remove/{postID}', 'ArtController@removeForumComment')->name('forumcomment.remove');
});


Route::get('/forum/contentpolicy', 'ForumController@index')->name('forum.policy');


Route::post('/forum/reply', 'CommentController@replyStore')->name('reply.add');

Route::post('/forum/store', 'PostController@store')->name('post.store');

Route::delete('/forum/deletepost/{id}', 'PostController@destroy')->name('post.delete');
