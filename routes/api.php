<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('artAPI', function() {
    // Search in the title and body columns from the posts table
    $artArray = array();
    $products = Post::query()->get();
    foreach($products as $product){
        array_push($artArray,
        [
            'image_id' => $product['image'],
        ]
        );
    }
    return json_encode($artArray);
});
