<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


#User
Route::get('signup', function(request $request){
    $content_email = $request->email;
    $email = $content_email;//." ".$pass;
    return $email;
    
});
Route::post('signup', 'SignupController@create_user');
Route::post('signup/login', 'SignupController@login_user');

