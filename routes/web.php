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

Route::get('/','welcome@index');

Route::resource('/member','memberController')->middleware('auth');
Route::resource('/campaignSaya','campaignSaya')->middleware('auth');
Auth::routes();

Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/editProfile', 'memberController@editProfile')->name('editProfile')->middleware('auth');
Route::post('/completeAcount', 'memberController@storeCompleteAcount')->name('completeAcount')->middleware('auth');

Route::resource('/campaignUser','CampaignUserController');

Route::get('/rek-user','RekUserController@index')->middleware('auth');

Route::resource('/galangDana','GalangDanaController')->middleware('auth');

Route::resource('/dompetKebaikanUser','RekUserController')->middleware('auth');

Route::group(['prefix'=>'admin'],function() {
	Route::get('/login','AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login','AuthAdmin\LoginController@login')->name('admin.login.submit');
	Route::get('/','admin@index')->name('admin.home');
	Route::get('/edit/{id}','admin@edit')->name('admin.edit');
	Route::get('/logout','AuthAdmin\LoginController@logout')->name('admin.logout');

	Route::get('/password/reset','AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/email','AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

	Route::get('/password/reset/{token}','AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset','AuthAdmin\ResetPasswordController@reset');

});

Route::get('/daftar-campaign-admin','admin@showDaftarCampaign')->name('daftar-campaign');
Route::get('/daftar-admin','admin@showDaftarAdmin')->name('daftar-admin');
Route::get('/daftar-user','admin@showDaftarUser')->name('daftar-user');
Route::get('/daftar-new-user','admin@showDaftarNewUser')->name('daftar-new-user');
Route::get('/daftar-new-campaign','admin@showDaftarNewCampaign')->name('daftar-new-campaign');
Route::get('/daftar-new-transfer','admin@showDaftarNewTransfer')->name('daftar-new-transfer');
Route::get('/daftar-transfer','admin@showDaftarTransfer')->name('daftar-transfer');
Route::get('/daftar-new-pencairan','admin@showDaftarNewPencairan')->name('daftar-new-pencairan');
Route::get('/daftar-pencairan','admin@showDaftarPencairan')->name('daftar-pencairan');
Route::get('/daftar-pengiriman','admin@showDaftarPengiriman')->name('daftar-pengiriman');
Route::get('/daftar-penerimaan','admin@showDaftarPenerimaan')->name('daftar-penerimaan');
Route::get('/validasi-campaign/{id}','admin@validasi_campaign')->name('validasi-campaign');


Route::get('/donasi-saya','memberController@create')->middleware('auth');

Route::get('/edit-profile','memberController@edit2')->middleware('auth');






