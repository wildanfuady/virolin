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
Route::get('/test', function(){
    return view('theme');
});
Route::get('/kirimemail','KirimEmailController@index');

Route::post('finish', 'SnapController@finish')->name('payment.finish');
Route::post('unfinish', 'SnapController@unfinish')->name('payment.unfinish');
Route::post('error', 'SnapController@error')->name('payment.error');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('finish', 'SnapController@finish')->name('finish');

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
    Route::get('reports/user/{id}','ReportController@user');

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

    Route::resource('reports','ReportController');
    Route::get('report/trafik','ReportController@trafik');
    Route::get('report/share','ReportController@share');
    Route::get('report/leads','ReportController@leads');
    Route::get('report/payment','ReportController@payment');
    Route::get('report/destroy/{id}','ReportController@destroy');

    Route::resource('testimonials','TestimonialController');
    Route::get('testimonial/destroy/{id}','TestimonialController@destroy');

    Route::post('/user/ingatkan', 'KirimEmailController@ingatkan');
    Route::resource('/usersubscribers','User\SubscribersController');

    Route::get('promo','UserPromoController@index');

    Route::get('profile','ProfileController@index');
    Route::get('tutorial','TutorialController@index');
});

Route::get('/cache/clear',function(){
    $exitCode1  = Artisan::call('config:cache');
    $exitCode2  = Artisan::call('route:clear');
    $exitCode3  = Artisan::call('view:clear');
    return 'sukses';
});
