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

Route::prefix('sale')->group(function () {
    Route::get('', 'SaleController@index')->name('page.sale');
    Route::post('/searchCustomer', 'SaleController@searchCustomer')->name('page.sale.searchCustomer');
    Route::post('/checkOut', 'CheckoutController@checkOut')->name('page.sale.checkout');
    Route::post('/addItem', 'SaleController@addNewCartItem')->name('page.sale.add');
    Route::post('/deleteItem', 'SaleController@deleteCartItem')->name('page.sale.deleteItem');
    Route::post('/deleteAll', 'SaleController@deleteAll')->name('page.sale.deleteAll');
});

Route::prefix('customer')->group(function () {
    Route::get('', 'CustomerController@index')->name('page.customer');

    Route::post('info/add', 'CustomerController@addInfoCustomer')->name('page.customer.addInfo');
    Route::post('info/delete', 'CustomerController@deleteInfoCustomer')->name('page.customer.deleteInfo');
    Route::post('search', 'CustomerController@searchCustomer')->name('page.customer.search');

    Route::post('edit/payment', 'CustomerController@editPayment')->name('page.customer.editPayment');
    Route::post('edit/customer', 'CustomerController@editCustomer')->name('page.customer.editCustomer');
});

Route::prefix('statistic')->group(function () {
    Route::get('', 'StatisticController@index')->name('page.statistic');
    Route::post('search/date', 'StatisticController@searchDate')->name('page.statistic.searchDate');
});

Route::prefix('setting')->group(function () {

    Route::get('', 'SettingController@index')->name('page.setting');
    Route::prefix('refraction')->group(function () {
        Route::post('add', 'RefractionController@refractionAdd')->name('page.setting.refractionAdd');
        Route::post('edit', 'RefractionController@refractionEdit')->name('page.setting.refractionEdit');
        Route::post('delete', 'RefractionController@refractionEdit')->name('page.setting.refractionDel');
    });

});
