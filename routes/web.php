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


//User
Route::get('login', function () {
    return view('login');
});
Route::get('register', function () {
    return view('register');
});

Route::post('/register', 'UserController@store')->name('register.register');
Route::post('/login', 'UserController@login')->name('login.login');
Route::get('/user/accountUpgrade', 'UserController@upgrade')->name('account.upgrade');
Route::post('/profile/artistacc', 'ArtistController@upgradeAccount')->name('artist.store');
Route::get('/profile/editWorkshop/{userID}', 'ArtistController@editworkshop')->name('workshop.edit');
Route::post('/profile/editWorkshop/success', 'ArtistController@updateworkshop')->name('workshop.store');

//Store
Route::get('/store', 'ArtController@index')->name('store.index');
Route::get('/storeDetails/{artID}', 'ArtController@details')->name('storeDetails.details');

// Reset Password
Route::get('/forget-password', 'ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('/forget-password', 'ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('/reset-password/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('/reset-password', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');
Route::get('/profile/changepassword', 'ProfileController@password')->name('password.show');
Route::post('/profile/changepassword', 'ProfileController@changeUserPassword')->name('password.update');

//Profile AuthCheck
Route::middleware(['AuthCheck'])->group(function () {
    // Profile
    Route::get('/profile', 'ProfileController@profile')->name('profile.show');
    Route::get('/profile/editprofile/{userID}', 'ProfileController@editprofile')->name('profile.edit');
    Route::post('/profile/editprofile/{userID}', 'ProfileController@updateprofile')->name('profile.update');

    Route::get('/profile/address', 'ProfileController@address')->name('address.show');
    Route::post('/profile/addaddress', 'ProfileController@storeAddress')->name('address.add');
    Route::get('/profile/editaddress/{userID}', 'ProfileController@editAddress')->name('address.edit');
    Route::post('/profile/editaddress/{userID}', 'ProfileController@updateAddress')->name('address.update');


    Route::get('/profile/mypurchase', 'ProfileController@purchase')->name('purchase.show');

    Route::get('/forumprofile', 'ForumProfileController@forumProfile')->name('forumprofile.show');
    Route::delete('/forumprofile/removeBookmarks/{bookmarkID}', 'ForumProfileController@removeBookmarks')->name('bookmark.delete');
});


// Art AuthCheck
Route::middleware(['AuthCheck'])->group(function () {

    // Add to cart
    Route::post('/storeDetails/cartadd', 'CartController@addcart')->name('cart.add');

    // Art comment
    Route::post('/storeDetails/comment/store', 'CommentController@store')->name('comment.store');
    Route::post('/storeDetails/comment/update', 'CommentController@updateComment')->name('comment.update');
    Route::delete('/storeDetails/remove/{artID}', 'ArtController@removeComment')->name('comment.remove');
    Route::get('/logout', 'UserController@logout')->name('logout.logout');

    // Wishlist
    Route::get("/wishlist", 'WishlistController@index')->name('wishlist.show');
    Route::post("/wishlist/add/{artID}", 'WishlistController@add')->name('wishlist.add');
    Route::delete('/wishlist/remove/{artID}', 'WishlistController@remove')->name('wishlist.remove');
});

// About
Route::get('/about', function () {
    return view('about');
});

//Exhibitions
Route::get("/exhibitions", 'ExhibitionsController@index');

//Forum
Route::get('/forum', 'PostController@index')->name('category.view');
Route::get('/forum/category/{category_id}', 'PostController@viewCategoryPost')->name('category.post');
Route::get('/forum/contentpolicy', 'ForumController@index')->name('forum.policy');
Route::post('/post', 'PostController@viewPost')->name('post.view');

//Forum AuthCheck
Route::middleware(['AuthCheck'])->group(function () {
    //Post
    Route::get('/forum/create', 'PostController@create')->name('post.create');
    Route::get('/forum/editPost/{id}', 'PostController@edit')->name('post.edit');
    Route::post('/forum/store', 'PostController@store')->name('post.store');
    Route::put('/forum/editPost/{id}', 'PostController@update')->name('post.update');
    Route::delete('/forum/deletepost/{id}', 'PostController@destroy')->name('post.delete');

    // Like Or Dislike
    Route::post('/forum/like', 'PostController@like')->name('like.post');
    Route::post('/forum/dislike', 'PostController@dislike')->name('dislike.post');
    Route::post('/forum/comment/like', 'PostController@forumlike')->name('forumlike.post');
    Route::post('/forum/comment/dislike', 'PostController@forumdislike')->name('forumdislike.post');

    //Forum report & Bookmarks
    Route::post('/report/store', 'PostController@storeReport')->name('report.store');
    Route::post('/bookmark/store', 'PostController@storeBookmarks')->name('bookmarks.store');

    //Comment
    Route::post('/forum/comment', 'CommentController@storeForumComment')->name('forumcomment.store');
    Route::delete('/forum/comment/remove/{postID}', 'CommentController@removeForumComment')->name('forumcomment.remove');

    //Forum Manage
    Route::get('/forum/manage', 'CategoryController@index')->name('categorylist');
    Route::get('/forum/manage/report', 'ForumController@showReport')->name('report.list');
    Route::get('/forum/manage/reporthistory', 'ForumController@showReportHistory')->name('reporthistory.list');
    Route::get('/forum/manage/editreport/{id}', 'ForumController@edit')->name('report.edit');
    Route::delete('/forum/manage/removereport/{id}', 'ForumController@removeRecord')->name('report.delete');
    Route::delete('/forum/manage/removepost/{id}/{reportID}', 'ForumController@removePost')->name('reportpost.delete');
    Route::get('/forum/createCategory', 'CategoryController@create')->name('category.create');
    Route::post('/forum/storeCategory', 'CategoryController@store')->name('category.store');
    Route::get('/forum/editCategory/{id}', 'CategoryController@edit')->name('category.edit');
    Route::put('/forum/editCategory/{id}', 'CategoryController@update')->name('category.update');
    Route::delete('/forum/deletecategory/{id}', 'CategoryController@destroy')->name('category.delete');

    //Forum subscribe
    Route::post('/forum/category/{category_id}/subscribe', 'PostController@subscribe')->name('subscribe.store');
    Route::delete('/forum/category/{category_id}/unsubscribe', 'PostController@unsubscribe')->name('subscribe.remove');
});

Route::post('/forum/reply', 'CommentController@replyStore')->name('reply.add');

//Auction
Route::get('addAuction', function () {
    return view('/auction/addAuction');
});

Route::get('auction', function () {
    return view('/auction/auction');
});

Route::get('auctionDetails', function () {
    return view('/auction/auctionDetails');
});

Route::get('artworkAdd', function () {
    return view('/artwork/artworkAdd');
});

Route::get('artworkList', function () {
    return view('/artwork/artworkList');
});

#Countdown timer example
// Route::get('/create-timer', [CountdownTimerController::class, 'create']);
// Route::post('/update-timer', [CountdownTimerController::class, 'update'])->name('timer.update');
Route::get('/auction/auction', [CountdownTimerController::class, 'view']);

//Auction
Route::get('/auction/auction', 'AuctionController@index')->name('auctionlist');
Route::post('/auction/addAuction', 'AuctionController@store')->name('auction.store');
Route::get('/auction/addAuction', 'AuctionController@create');
Route::get('/auction/auctionDetails/{auctionID}', 'AuctionController@viewDetails');
Route::get('/payment/payment/{auctionID}', 'AuctionController@oneBid');
Route::get('/payment/payment/pay/{auctionID}', 'AuctionController@manual');
Route::post('/auction/auctionDetails/{auctionID}','AuctionController@manualBid')->name('manualBid');
Route::get('/profile/view', 'AuctionController@viewAucPay')->name('auctionView');


//Artwork Management
Route::get('/artwork/artworkList', 'ArtworkController@list')->name('artworklist');
Route::get('/artwork/artworkAdd', 'ArtworkController@create')->name('addArtwork');
Route::post('/artwork/artworkAdd', 'ArtworkController@store')->name('artwork.store');
Route::delete('/artwork/artworkList/deleteArtwork/{artID}', 'ArtworkController@destroy')->name('artwork.delete');
Route::get('/artwork/artworkEdit/{artID}', 'ArtworkController@editArtwork')->name('artwork.edit');
Route::post('/artwork/artworkList/{artID}', 'ArtworkController@saveArtwork')->name('artwork.save');

//Add to Cart
Route::post('/storeDetails/cartadd', 'CartController@addcart')->name('cart.add');
Route::get('/cart', 'CartController@cartshow')->name('cart.list');
Route::get('/cart/Cartlist/delete/{cartID}', 'CartController@destroy');
Route::post('/Cart/place', 'CartController@placeOrder');

//payment
Route::post('/pay', 'PaymentController@pay')->name('payment');
Route::get('success', 'PaymentController@success');
Route::get('error', 'PaymentController@error');
Route::get('/profile/purchase', 'PaymentController@index')->name('payment.index');

Route::get('sendEmail',function(){
    $details = [
        'title'=>'Mail From ArtCells Platform',
        'body' =>'You Are successfully to bid the item, please make the payment in your Profile -> Auction -> Auction Status.'
    ];

    Mail::to('yapys-wm19@student.tarc.edu.my')->send(new \App\Mail\paymentReminder($details));
});