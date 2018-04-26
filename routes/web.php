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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/editProfile', 'memberController@editProfile')->name('editProfile')->middleware('auth');
Route::post('/completeAcount', 'memberController@storeCompleteAcount')->name('completeAcount')->middleware('auth');

Route::resource('/campaignUser','CampaignUserController');

Route::get('users','RekUserController@index')->middleware('auth');

Route::resource('/galangDana','GalangDanaController')->middleware('auth');

Route::resource('/dompetKebaikanUser','RekUserController')->middleware('auth');

Route::resource('/admin','admin');



