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

/* Auth Controller */
// Register Round 1 
Route::post('user/auth/register_round_a','Api\authController@register_round_a');
Route::post('user/auth/register_round_b','Api\authController@register_round_b');
Route::post('user/auth/register_round_c','Api\authController@register_round_c');

// Login
Route::post('user/auth/login','Api\authController@login');


Route::group(['middleware' => 'auth:api'], function(){
    /* Donate */
    // Request new needs
    Route::post('donate/request','Api\DonateRequestController@store');
    //index donate needs 
    Route::get('donate/index','Api\DonateRequestController@index');

    /* Folder */
    // store 
    Route::post('folder/store','Api\FolderController@store');
    Route::get('folder/index','Api\FolderController@index');

    // Docs 
    Route::post('doc/store','Api\docController@store');
});