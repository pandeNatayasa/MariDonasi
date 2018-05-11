<?php

//-------------------------------------ROUTE User----------------------------------------------//
//---------------------------------------------------------------------------------------------//
Auth::routes();
Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
Route::resource('/member','memberController')->middleware('auth:web');
Route::get('/editProfile', 'memberController@editProfile')->name('editProfile')->middleware('auth:web');
Route::post('/completeAcount', 'memberController@storeCompleteAcount')->name('completeAcount')->middleware('auth:web');
//Route::get('/rek-user','RekUserController@index')->middleware('auth:web');
Route::resource('/campaignSaya','campaignSaya')->middleware('auth:web');
Route::resource('/rek-user','RekUserController')->middleware('auth:web');

Route::get('/donasi-saya','memberController@create')->middleware('auth:web');

Route::get('/myprofile','memberController@edit2')->name('akunsaya')->middleware('auth:web');

Route::resource('/dompet-kebaikan-user', 'DompetKebaikanController')->middleware('auth:web');
Route::get('/dompet-kebaikan-user-pencairan','DompetKebaikanController@showFormPencairan')->name('pencairan_dana')->middleware('auth:web');
//-------------------------------------ROUTE Public---------------------------------------------//
//---------------------------------------------------------------------------------------------//
Route::get('/','welcome@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/campaignUser','CampaignUserController')->middleware('auth:web');
Route::resource('/campaign_user_barang','CampaignUserBarangController')->middleware('auth:web');
Route::post('/tambahBarang','CampaignUserController@storeBarang')->name('tambahBarang');
Route::resource('/galangDana','GalangDanaController')->middleware('auth:web');
Route::resource('/galang-barang-user','CampaignUserBarangController')->middleware('auth:web');

Route::resource('/campaignOrganisasi','CampaignOrganisasiController')->middleware('auth:organitation');
Route::get('/campaignOrganisasiView','OrganisasiController@showCampaignOrganisasi')->name('campaignView')->middleware('auth:organitation');

//-------------------------------------ROUTE Admin---------------------------------------------//
//---------------------------------------------------------------------------------------------//
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

	Route::get('/register','admin@create')->name('admin.create');

});


Route::get('/daftar-campaign-admin','admin@showDaftarCampaign')->name('daftar-campaign');
Route::get('/daftar-admin','admin@showDaftarAdmin')->name('daftar-admin');
Route::get('/daftar-user','admin@showDaftarUser')->name('daftar-user');
Route::get('/daftar-new-user','admin@showDaftarNewUser')->name('daftar-new-user');
Route::get('/daftar-new-campaign-user','admin@showDaftarNewCampaign')->name('daftar-new-campaign');
Route::get('/daftar-new-transfer-user','admin@showDaftarNewTransfer')->name('daftar-new-transfer');
Route::get('/daftar-transfer-user','admin@showDaftarTransfer')->name('daftar-transfer');
Route::get('/daftar-new-pencairan','admin@showDaftarNewPencairan')->name('daftar-new-pencairan');
Route::get('/daftar-pencairan','admin@showDaftarPencairan')->name('daftar-pencairan');
Route::get('/daftar-pengiriman','admin@showDaftarPengiriman')->name('daftar-pengiriman');
Route::get('/daftar-penerimaan','admin@showDaftarPenerimaan')->name('daftar-penerimaan');
Route::get('/validasi-campaign/{id}','admin@validasi_campaign')->name('validasi-campaign');

Route::resource('/admin-organisasi', 'adminOrganisasi');
Route::get('/daftar-new-campaign-organisasi','adminOrganisasi@showDaftarNewCampaign')->name('daftar-new-campaign-group');
Route::get('/daftar-campaign-organisasi','adminOrganisasi@showDaftarCampaign')->name('daftar-campaign-group');
Route::get('/daftar-new-pencairan-organisasi','adminOrganisasi@showDaftarNewPencairan')->name('daftar-new-pencairan-group');
Route::get('/daftar-new-transfer-organisasi','adminOrganisasi@showDaftarNewTransfer')->name('daftar-new-transfer-group');
Route::get('/daftar-new-organisasi','adminOrganisasi@showDaftarNewOrganisasi')->name('daftar-new-organisasi');
Route::get('/daftar-organisasi','adminOrganisasi@showDaftarOrganisasi')->name('daftar-organisasi');

//-------------------------------------ROUTE Organisasi----------------------------------------//
//---------------------------------------------------------------------------------------------//
Route::group(['prefix'=>'organisasi'],function() {
	Route::get('/login','AuthOrganisasi\LoginController@showLoginForm')->name('organisasi.login');
	Route::post('/login','AuthOrganisasi\LoginController@login')->name('organisasi.login.submit');
	Route::get('/','HomeControllerOrganisasi@index')->name('organisasi.home')->middleware('auth:organitation');
	// Route::get('/edit/{id}','admin@edit')->name('admin.edit');
	Route::get('/logout','AuthOrganisasi\LoginController@logout')->name('organisasi.logout');
	Route::get('/register','AuthOrganisasi\RegisterController@create')->name('organisasi.register');\
	Route::post('/register/post','AuthOrganisasi\RegisterController@store')->name('organisasi.register.post');
	// Route::get('/password/reset','AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	// Route::post('/password/email','AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

	// Route::get('/password/reset/{token}','AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	// Route::post('/password/reset','AuthAdmin\ResetPasswordController@reset');

});

Route::resource('/profille-organisasi','OrganisasiController')->middleware('auth:organitation');
Route::post('/completeAcountOrganisasi', 'OrganisasiController@storeCompleteAcount')->name('completeAcountOrganisasi')->middleware('auth:organitation');
Route::get('/myprofille-organisasi','OrganisasiController@edit2')->name('akun.organisasi')->middleware('auth:organitation');

//-------------------------------------ROUTE Lain----------------------------------------//
//---------------------------------------------------------------------------------------//
Route::post('list','ListController@store');
Route::get('list','ListController@index');

