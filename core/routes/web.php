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

Route::prefix('admin')->group(function(){
    Route::get('dashboard',['as' => 'back.dashboard','uses' => 'BackDashboardController@index']);
    
    Route::prefix('user')->group(function(){
        Route::get('/',['as' => 'back.user','uses' => 'UserController@index']);
        Route::get('add',['as' => 'back.user.add','uses' => 'UserController@add']);
        Route::post('store',['as' => 'back.user.store','uses' => 'UserController@store']);
        Route::get('edit/{id}',['as' => 'back.user.edit','uses' => 'UserController@edit']);
    });
});
