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
Route::post('/sale/checkOut', 'CheckoutController@checkOut')->name('page.sale.checkout');
Route::post('/sale/addItem', 'SaleController@addNewCartItem')->name('page.sale.add');
Route::post('/sale/deleteItem', 'SaleController@deleteCartItem')->name('page.sale.deleteItem');
Route::post('/sale/deleteAll', 'SaleController@deleteAll')->name('page.sale.deleteAll');

Route::get('/customer', 'CustomerController@index')->name('page.customer');
Route::post('/customer/addInfo', 'CustomerController@addInfoCustomer')->name('page.customer.addInfo');
Route::post('/customer/deleteInfo', 'CustomerController@deleteInfoCustomer')->name('page.customer.deleteInfo');
Route::post('/customer/searchCustomer', 'CustomerController@searchCustomer')->name('page.customer.search');
Route::post('/customer/editPayment', 'CustomerController@editPayment')->name('page.customer.editPayment');
Route::post('/customer/editCustomer', 'CustomerController@editCustomer')->name('page.customer.editCustomer');

Route::get('/statistic', 'StatisticController@index')->name('page.statistic');
Route::post('/statistic/searchDate', 'StatisticController@searchDate')->name('page.statistic.searchDate');