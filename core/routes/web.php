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
Route::get('/',['as' => 'login','uses' => 'AuthController@index']);
Route::post('postlogin',['as' => 'post.login','uses' => 'AuthController@post']);
Route::get('logout',['as' => 'logout','uses' => 'AuthController@logout']);


Route::group(['middleware' => 'auth'], function(){
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
            Route::get('getsatuan',['as' => 'get.satuan','uses' => 'ObatController@getSatuan']);
            Route::get('data',['as' => 'obat.data','uses' => 'ObatController@dataObat']);
        });

        Route::prefix('transaksi')->group(function(){
            Route::prefix('order')->group(function(){
                Route::get('/',['as' => 'order', 'uses' => 'OrderController@index']);
                Route::post('add_temp',['as' => 'order.temp', 'uses' => 'OrderController@addTemp']);
                Route::get('tabelrender',['as' => 'order.render.tabel', 'uses' => 'OrderController@renderTabel']);
                Route::get('otherrender',['as' => 'order.render.other', 'uses' => 'OrderController@renderLain']);
                Route::get('destroyobat',['as' => 'order.destroy.obat', 'uses' => 'OrderController@deleteObat']);
                Route::get('editobat',['as' => 'order.edit.obat', 'uses' => 'OrderController@editObat']);
                Route::post('updateobat',['as' => 'order.update.temp', 'uses' => 'OrderController@updateObat']);
                Route::post('store',['as' => 'order.store', 'uses' => 'OrderController@storeOrder']);
                Route::get('obatunit',['as' => 'get.obat.unit', 'uses' => 'OrderController@getObatUnit']);
            });

            Route::prefix('histori_pembelian')->group(function(){
                Route::get('/',['as' => 'histori.pembelian', 'uses' => 'HistoriPembelianController@index']);
                Route::get('datapembelian',['as' => 'histori.pembelian.data', 'uses' => 'HistoriPembelianController@dataPembelian']);
                Route::get('detail',['as' => 'histori.pembelian.detail', 'uses' => 'HistoriPembelianController@detailPembelian']);
            });
        });

        Route::prefix('pengaturan')->group(function(){
            Route::prefix('tampilan')->group(function(){
                Route::get('/',['as' => 'pengaturan.tampilan', 'uses' => 'SettingController@tampilan']);
                Route::post('update/{id}',['as' => 'pengaturan.update', 'uses' => 'SettingController@updateTampilan']);
            });
        });
    });

    Route::prefix('kasir')->group(function(){
        Route::get('/',['as' => 'kasir.index','uses' => 'KasirController@index']);
        Route::get('show',['as' => 'kasir.show.obat','uses' => 'KasirController@showObat']);
        Route::get('addtolist',['as' => 'kasir.add.tolist','uses' => 'KasirController@addtolist']);
        Route::get('getlist',['as' => 'kasir.get.list','uses' => 'KasirController@getList']);
        Route::get('changepcs',['as' => 'kasir.change.pcs','uses' => 'KasirController@changePcs']);
        Route::post('changepcs',['as' => 'change.pcs','uses' => 'KasirController@changePcsPost']);
    });
});