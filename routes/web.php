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

Route::post('notification/handling', 'SnapController@notification')->name('notification.handling');
Route::post('payment/finish', 'SnapController@finish')->name('payment.finish');
Route::post('payment/unfinish', 'SnapController@unfinish')->name('payment.unfinish');
Route::post('payment/unfinish', 'SnapController@error')->name('payment.error');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'DashboardController@dashboard');
    Route::get('/home', 'DashboardController@index');

    // Konfirmasi Pembayaran
    Route::get('/konfirmasi-pembayaran', 'PaymentController@showConfirmationPaymentForm');
    Route::post('/konfirmasi-pembayaran/store', 'PaymentController@confirmationPayment');
    Route::get('/payment/detail/{id}', 'PaymentController@paymentDetail');
    
    // Midtrans
	Route::get('snap', 'SnapController@snap');
	Route::get('snaptoken', 'SnapController@token');
    
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

    Route::resource('setting','SettingController');
    Route::get('setting/destroy/{id}','SettingController@destroy');
    Route::get('payment/count_payment','PaymentController@countPayment');
    Route::resource('payment','PaymentController');
    
    Route::get('payment/destroy/{id}','PaymentController@destroy');
    
    // Module User 
    Route::resource('landingpages','LandingpageController');
    Route::get('landingpages/destroy/{id}','LandingpageController@destroy');

    Route::resource('mysubscribers','MySubscriberController');
    Route::get('mysubscriber/new/create/{id}','MySubscriberController@create_subscriber');
    Route::post('mysubscriber/new/store/{id}','MySubscriberController@store_subscriber');
    Route::get('mysubscriber/destroy/{id}','MySubscriberController@destroy');

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

    Route::resource('reports','ReportController');
    Route::get('report/trafik','ReportController@trafik');
    Route::get('report/share','ReportController@share');
    Route::get('report/order','ReportController@order');
    Route::get('report/destroy/{id}','ReportController@destroy');

    Route::resource('testimonials','TestimonialController');
    Route::get('testimonial/destroy/{id}','TestimonialController@destroy');

    Route::post('/user/ingatkan', 'KirimEmailController@ingatkan');
    Route::resource('/usersubscribers','User\SubscribersController');
});