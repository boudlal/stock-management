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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(["middleware" => "auth"], function (){

    //Home
    Route::get('/', 'HomeController@index');

    //siteSettings
    Route::get('/siteSetting', 'AdminController@siteSetting');
    Route::post('/sitesetting', 'AdminController@updateSetting');

    Route::patch('/updateUser', 'AdminController@updateUserEmail');
    Route::patch('/updatePassword', 'AdminController@updateUserPassword');


    //clients
    Route::get('/clients', 'ClientController@index')->name('clients.index');
    Route::get('/clients/create', 'ClientController@create')->name('clients.create');
    Route::post('/clients/create', 'ClientController@store')->name('clients.store');
    Route::get('/clients/edit/{id}', 'ClientController@edit')->name('clients.edit');
    Route::patch('/clients/update/{id}', 'ClientController@update')->name('clients.update');
    Route::delete('/clients/delete/{id}', 'ClientController@destroy')->name('clients.destroy');

    //providers
    Route::get('/providers', 'ProviderController@allProviders');
    Route::get('/providers/add', 'ProviderController@createProvider');
    Route::post('/providers/add', 'ProviderController@storeProvider');
    Route::get('/provider/edit/{id}', 'ProviderController@editProvider');
    Route::patch('/provider/update/{id}', 'ProviderController@updateProvider');
    Route::get('/provider/delete/{id}', 'ProviderController@destroyProvider');

    //stock
    Route::get('/stock', 'StockController@allStock');
    Route::get('/stock/add', 'StockController@createStock');
    Route::post('/stock/add', 'StockController@storeStock');
    Route::get('/stock/edit/{id}', 'StockController@editStock');
    Route::patch('/stock/update/{id}', 'StockController@updateStock');
    Route::get('/stock/delete/{id}', 'StockController@destroyStock');
    Route::get('/stock/notification/{id}', 'StockController@stockNotifications');

    //orders
    Route::get('/orders', 'OrderController@allOrders');
    Route::get('/orders/add', 'OrderController@createOrder');
    Route::get('/orders/price/{id}', 'OrderController@orderPrice'); //ajax call
    Route::post('/orders/add', 'OrderController@storeOrder');
    Route::get('/order/show/{id}', 'OrderController@showOrder');
    Route::get('/order/bill/{id}', 'OrderController@billOrder');
    Route::get('/order/delete/{id}', 'OrderController@destroyOrder');


    //calendar
    Route::get('/calendar', 'HomeController@calendarIndex');
    Route::get('/calendar/all', 'HomeController@allCalendar');
    Route::get('/calendar/delete/{id}', 'HomeController@deleteCalendar');
    Route::post('/calendar/add', 'HomeController@storeCalendar');






});
