<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* Route::apiResources( */
/* 	[ */
/* 		'clients' => 'API/ClientController' */
/* 	] */
/* ); */
Route::post('create', 'ClientController@store');
/* Route::get('', 'PostController@get');     */
Route::delete('/{id}', 'PostController@delete');

Route::middleware('api')->group(function () {
  Route::resource('clients', ClientController::class);
});

