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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('produit', 'ProductController@add');
Route::post('adduser', 'UserController@add');
Route::get('produits', 'ProductController@getAll');
Route::delete('produit{id}', 'ProductController@delete');
Route::get('produit/buy/{id}', 'ProductController@buy');

