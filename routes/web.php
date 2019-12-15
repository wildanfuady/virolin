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
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/kirimemail','KirimEmailController@index');
Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'DashboardController@index');
    
    // Module Customer Admin
    Route::resource('users','UsersController');
    Route::get('users/destroy/{id}','UsersController@destroy');

    Route::resource('roles','RoleController');
    Route::get('roles/destroy/{id}','RoleController@destroy');

    Route::resource('subscribers','SubscribersController');
    Route::get('subscribers/destroy/{id}','SubscribersController@destroy');

    Route::resource('banks','BankController');
    Route::get('banks/destroy/{id}','BankController@destroy');

    Route::resource('promos','PromoController');
    Route::get('promos/destroy/{id}','PromoController@destroy');

    Route::resource('orders','OrderController');
    Route::get('orders/destroy/{id}','OrderController@destroy');

    Route::resource('products','ProductController');
    Route::get('products/destroy/{id}','ProductController@destroy');

    // Route::resource('reports','ReportController');
    Route::get('reports/destroy/{id}','ReportController@destroy');

    Route::get('reports/pengunjung','ReportController@pengunjung');
    Route::get('reports/penjualan','ReportController@penjualan');
    Route::get('reports/promo','ReportController@promo');
    Route::get('reports/user','ReportController@user');

    Route::resource('settings','SettingController');
    Route::get('settings/destroy/{id}','SettingController@destroy');
    
    // Module User 
    Route::resource('landingpages','LandingpageController');
    Route::get('landingpages/destroy/{id}','LandingpageController@destroy');

    Route::resource('mysubscribers','MySubscriberController');
    Route::get('mysubscriber/new/create/{id}','MySubscriberController@create_subscriber');
    Route::post('mysubscriber/new/store/{id}','MySubscriberController@store_subscriber');
    
    Route::resource('autoresponders','AutoresponderController');
    Route::get('autoresponders/destroy/{id}','AutoresponderController@destroy');

    Route::resource('forms','FormController');
    Route::get('forms/destroy/{id}','FormController@destroy');

    Route::resource('landingpages','LandingpageController');
    
    Route::get('landingpage/create-step-1','LandingpageController@create_step_1');
    Route::get('landingpage/edit-step-1/{id}','LandingpageController@edit_step_1');
    Route::post('landingpage/act-create-step-1','LandingpageController@act_create_step_1');

    Route::get('landingpage/create-step-2','LandingpageController@create_step_2');
    Route::post('landingpage/act-create-step-2','LandingpageController@act_create_step_2');

    Route::get('landingpage/create-step-3','LandingpageController@create_step_3');
    Route::post('landingpage/act-create-step-3','LandingpageController@act_create_step_3');

    Route::post('/user/ingatkan', 'KirimEmailController@ingatkan');
    Route::resource('/usersubscribers','User\SubscribersController');
});