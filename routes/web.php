<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sale', 'SaleController@index')->name('page.sale');
Route::post('/sale/searchCustomer', 'SaleController@searchCustomer')->name('page.sale.searchCustomer');
Route::get('/sale/checkOut', 'SaleController@checkOut')->name('page.sale.checkout');
Route::post('/sale/addItem', 'SaleController@addNewCartItem')->name('page.sale.add');
Route::post('/sale/deleteItem', 'SaleController@deleteCartItem')->name('page.sale.deleteItem');
Route::post('/sale/deleteAll', 'SaleController@deleteAll')->name('page.sale.deleteAll');
