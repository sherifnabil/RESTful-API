<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('posts', 'PostsController')->except(['create', 'edit']);

Route::apiResource('/products', 'ProductController');

Route::group(['prefix' => 'products'], function(){
    Route::apiResource('/{product}/reviews', 'ReviewController');
});
