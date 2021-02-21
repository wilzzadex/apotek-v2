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
        Route::get('destroy',['as' => 'back.user.destroy','uses' => 'UserController@destroy']);
        Route::post('update/{id}',['as' => 'back.user.update','uses' => 'UserController@update']);
    });

    Route::prefix('suplier')->group(function(){
        Route::get('/',['as' => 'suplier','uses' => 'SuplierController@index']);
        Route::get('add',['as' => 'suplier.add','uses' => 'SuplierController@add']);
        Route::post('store',['as' => 'suplier.store','uses' => 'SuplierController@store']);
        Route::get('edit/{id}',['as' => 'suplier.edit','uses' => 'SuplierController@edit']);
        Route::get('destroy',['as' => 'suplier.destroy','uses' => 'SuplierController@destroy']);
        Route::post('update/{id}',['as' => 'suplier.update','uses' => 'SuplierController@update']);
    });

    Route::prefix('unit')->group(function(){
        Route::get('/',['as' => 'unit','uses' => 'UnitController@index']);
        Route::get('add',['as' => 'unit.add','uses' => 'UnitController@add']);
        Route::post('store',['as' => 'unit.store','uses' => 'UnitController@store']);
        Route::get('edit/{id}',['as' => 'unit.edit','uses' => 'UnitController@edit']);
        Route::get('destroy',['as' => 'unit.destroy','uses' => 'UnitController@destroy']);
        Route::post('update/{id}',['as' => 'unit.update','uses' => 'UnitController@update']);
    });

    Route::prefix('obat')->group(function(){
        Route::get('/',['as' => 'obat','uses' => 'ObatController@index']);
        Route::get('add',['as' => 'obat.add','uses' => 'ObatController@add']);
        Route::post('store',['as' => 'obat.store','uses' => 'ObatController@store']);
    });

    Route::prefix('transaksi')->group(function(){
        Route::prefix('order')->group(function(){
            Route::get('/',['as' => 'order', 'uses' => 'OrderController@index']);
            Route::post('add_temp',['as' => 'order.temp', 'uses' => 'OrderController@addTemp']);
            Route::get('tabelrender',['as' => 'order.render.tabel', 'uses' => 'OrderController@renderTabel']);
        });
    });
});
