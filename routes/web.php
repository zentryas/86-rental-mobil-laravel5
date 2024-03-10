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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

//Clear Config cache:
Route::get('/optimize-clear', function() {
    $exitCode = Artisan::call('optimize:clear');
    return '<h1>Clear Optimize cleared</h1>';
});

Route::get('/test/env', function () {
    dd(env('DB_DATABASE')); // dump db variable value one by one
});

Auth::routes();
//ACTIVATED EMAIL dan LOGOUT
Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('auth/activate/resend', 'Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
Route::post('auth/activate/resend', 'Auth\ActivationResendController@resend');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('users.logout');

Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/daftar-mobil', 'HomeController@mobil');
Route::get('/daftar-mobil-cari', 'HomeController@cari');
Route::get('/syarat-&-ketentuan', 'HomeController@terms');
Route::get('/reservasi', 'HomeController@reservasi');
Route::get('/tarif-PPN', 'HomeController@tarifPPN');
Route::get('/profile', 'ProfileController@index');
Route::post('/profile/{id}/update', 'ProfileController@update');

//halaman harus login
Route::group(['middleware' => 'auth'],function(){
	Route::get('/booking/{id}', 'BookingController@index');
	Route::get('/cek/mobil','BookingController@cek_mobil');
	Route::post('/booking/{id}/detail', 'BookingController@detail');
	Route::post('/booking/{id}/detail/create', 'BookingController@create');
	Route::get('/pembayaran/{id}','BookingController@pembayaran');
	Route::post('/pembayaran/Dp', 'PaymentController@submitDp')->name('pembayaran.dp');
	Route::post('/update/status/booking', 'BookingController@update_status_booking');

	Route::get('/riwayat-transaksi', 'BookingController@riwayatTransaksi');	
	Route::post('/post-testimoni', 'TestimoniController@post');	

});

Route::post('/notification/handler', 'PaymentController@notificationHandler')->name('notification.handler');
Route::post('/finish', function(){
    return redirect()->route('welcome');
});

Route::group(['prefix' => 'admin'], function() {
	Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
	//password reset routes	
	Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset')->name('admin.password.update');
	Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');

	Route::group(['middleware' => 'auth:admin'],function(){
		Route::get('/', 'AdminController@index')->name('admin.home');
		Route::get('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
		
		//Profile Admin
		Route::get('/profile', 'AdminPage\ProfileController@index');
		Route::post('/profile/{id}/update', 'AdminPage\ProfileController@update');

		//CRUD DATA MOBIL
		Route::get('/mobil', 'AdminPage\MobilController@index');
		Route::post('/mobil/create','AdminPage\MobilController@create');
		Route::post('/mobil/{id}/update','AdminPage\MobilController@update');
		Route::get('/mobil/{id}/delete','AdminPage\MobilController@delete');
		
		//CRUD DATA MEREK
		Route::get('/merek', 'AdminPage\MerekController@index');
		Route::post('/merek/create','AdminPage\MerekController@create');
		Route::post('/merek/{id}/update','AdminPage\MerekController@update');
		Route::get('/merek/{id}/delete','AdminPage\MerekController@delete');
		
		//CRUD DATA CUSTOMER/USERS
		Route::get('/customer', 'AdminPage\CustomerController@index');
		Route::get('/customer/{id}/delete','AdminPage\CustomerController@delete');

		//GET SOPIR
		Route::get('/sopir', 'AdminPage\SopirController@index');
		Route::post('/sopir/create','AdminPage\SopirController@create');
		Route::post('/sopir/{id}/update','AdminPage\SopirController@update');
		Route::get('/sopir/{id}/delete','AdminPage\SopirController@delete');

		//GET Testimoni
		Route::get('/testimoni', 'AdminPage\TestimoniController@index');
		Route::get('/testimoni/{id}/delete','AdminPage\TestimoniController@delete');

		//GET BOOKING
		Route::get('/booking', 'AdminPage\BookingController@index');
		Route::get('/booking/print/{id}', 'AdminPage\BookingController@cetak');
		Route::post('/booking/{id}/updateStatus','AdminPage\BookingController@updateStatus');

		Route::post('/booking/{id}/update','AdminPage\BookingController@updateKembali');
		Route::get('/booking/sewa', 'AdminPage\BookingController@sewa');
		Route::get('/booking/selesai', 'AdminPage\BookingController@selesai');
		Route::get('/booking/batal', 'AdminPage\BookingController@batal');

		Route::get('/booking/pengambilan', 'AdminPage\BookingController@ambil');
		Route::get('/booking/pengembalian', 'AdminPage\BookingController@kembali');

		//GET PEMBAYARAN
		Route::get('/payment', 'AdminPage\PaymentController@index');
		Route::get('/payment/lunas', 'AdminPage\PaymentController@lunas');
		Route::get('/payment/expired', 'AdminPage\PaymentController@expired');

		//GET REPORT
		Route::get('/laporan', 'AdminPage\ReportController@index');
		Route::get('/laporan/PDF/{data_mulai}/{data_selesai}/{type}', 'AdminPage\ReportController@cetakPDF');
		Route::get('/laporan/print/{data_mulai}/{data_selesai}/{type}', 'AdminPage\ReportController@cetak');
	});
});