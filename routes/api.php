<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\Client;
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
Route::get('clients', [ClientController::class, 'index']);
Route::group(['prefix' => 'client'], function(){ 
  Route::post('create', [ClientController::class, 'create']);
  Route::get('edit/{id}', [ClientController::class, 'edit']);
  Route::post('update/{id}', [ClientController::class, 'update']);
  Route::delete('delete/{id}', [ClientController::class, 'delete']);
});

