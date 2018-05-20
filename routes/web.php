<?php

//-------------------------------------ROUTE User----------------------------------------------//
//---------------------------------------------------------------------------------------------//
Auth::routes();
Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
Route::resource('/member','memberController')->middleware('auth:web');
Route::get('/editProfile', 'memberController@editProfile')->name('editProfile')->middleware('auth:web');
Route::post('/completeAcount', 'memberController@storeCompleteAcount')->name('completeAcount')->middleware('auth:web');
Route::resource('/campaignSaya','campaignSaya')->middleware('auth:web');
Route::resource('/rek-user','RekUserController')->middleware('auth:web');

Route::get('/donasi-saya','memberController@create')->middleware('auth:web');

Route::get('/myprofile','memberController@edit2')->name('akunsaya')->middleware('auth:web');

Route::resource('/dompet-kebaikan-user', 'DompetKebaikanController')->middleware('auth:web');

Route::post('/dompet-kebaikan-user/pencairan_dana_campaign', 'DompetKebaikanController@storePencairan')->name('pencairan_dana_campaign')->middleware('auth:web');
Route::get('/dompet-kebaikan-user-pencairan','DompetKebaikanController@showFormPencairan')->name('pencairan_dana')->middleware('auth:web');
//-------------------------------------ROUTE Public---------------------------------//
//----------------------------------------------------------------------------------//
Route::get('/','welcome@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/campaignUser','CampaignUserController')->middleware('auth:web');
Route::resource('/campaign_user_barang','CampaignUserBarangController')->middleware('auth:web');

Route::resource('/campaign_organisasi_barang','CampignOrganisasiBarangController')->middleware('auth:organitation');

Route::post('/campaign_organisasi_barang/store-barang','CampignOrganisasiBarangController@store')->middleware('auth:organitation');
Route::get('/campaign_organisasi/get-barang','CampignOrganisasiBarangController@loadComment');

Route::post('/tambahBarang','CampaignUserController@storeBarang')->name('tambahBarang');
Route::resource('/galangDana','GalangDanaController')->middleware('auth:web');
Route::post('/campaign_user_barang/store-barang','CampaignUserBarangController@store')->middleware('auth:web');
Route::get('/campaign/get-barang','CampaignUserBarangController@loadComment');
Route::post('/campaign-contribute/edit-barang','campaignSaya@store')->name('ajaxEdit');

Route::resource('/campaignOrganisasi','CampaignOrganisasiController')->middleware('auth:organitation');
// Route::get('/campaign-organisasi-show/{$id}','CampaignOrganisasiController@showDetailOrganisasi')->name('show_detail_campaign_organisasi')->middleware('auth:organitation');

Route::get('/campaignOrganisasiView','OrganisasiController@showCampaignOrganisasi')->name('campaignView')->middleware('auth:organitation');

Route::resource('/admin-edit-organisasi','adminOrganisasiEdit')->middleware('auth:admin');

Route::resource('/galangDanaOrganisasi','GalangDanaOrganisasiController')->middleware('auth:organitation');
Route::resource('/galangDanaUserToOrganisasi','GalangDanaUserForOrganisasiController')->middleware('auth:organitation');
Route::resource('/galangDanaOrganisasiToUser','GalangDanaOrganisasiForUserController')->middleware('auth:web');
//-------------------------------------ROUTE Admin--------------------------------------//
//--------------------------------------------------------------------------------------//
Route::group(['prefix'=>'admin'],function() {
	Route::get('/login','AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login','AuthAdmin\LoginController@login')->name('admin.login.submit');
	Route::get('/','adminController@index')->name('admin.home');
	Route::get('/edit/{id}','adminController@edit')->name('admin.edit');
	Route::get('/logout','AuthAdmin\LoginController@logout')->name('admin.logout');

	Route::get('/password/reset','AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/email','AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

	Route::get('/password/reset/{token}','AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset','AuthAdmin\ResetPasswordController@reset');

	Route::get('/register','adminController@create')->name('admin.create');
	Route::post('/register/post','adminController@store')->name('admin.register.post');

	

});

Route::delete('/user/destroy/{$id}','adminController@destroyUser')->name('admin.user.delete');

Route::get('/daftar-campaign-admin','adminController@showDaftarCampaign')->name('daftar-campaign');
Route::get('/daftar-admin','adminController@showDaftarAdmin')->name('daftar-admin');
Route::get('/daftar-user','adminController@showDaftarUser')->name('daftar-user');
Route::get('/daftar-new-user','adminController@showDaftarNewUser')->name('daftar-new-user');
Route::get('/daftar-new-campaign-user','adminController@showDaftarNewCampaign')->name('daftar-new-campaign');
Route::get('/daftar-new-transfer-user','adminController@showDaftarNewTransfer')->name('daftar-new-transfer');
Route::get('/daftar-transfer-user','adminController@showDaftarTransfer')->name('daftar-transfer');
Route::get('/daftar-new-pencairan','adminController@showDaftarNewPencairan')->name('daftar-new-pencairan');
Route::get('/daftar-pencairan','adminController@showDaftarPencairan')->name('daftar-pencairan');
Route::get('/daftar-pengiriman','adminController@showDaftarPengiriman')->name('daftar-pengiriman');
Route::get('/daftar-penerimaan','adminController@showDaftarPenerimaan')->name('daftar-penerimaan');
Route::get('/validasi-campaign/{id}','adminController@validasi_campaign')->name('validasi-campaign');
Route::get('/validasi-transfer/{id}','adminController@validasi_transfer')->name('validasi-transfer');
Route::get('/validasi_transfer_organisasi_to_user/{id}','adminController@validasi_transfer_organisasi_to_user')->name('validasi_transfer_organisasi_to_user');

Route::get('/validasi_transfer_organisasi/{id}','adminController@validasi_transfer_organisasi')->name('validasi_transfer_organisasi');
Route::get('/validasi-transfer-user-to-organisasi/{id}','adminController@validasi_transfer_user_for_organisasi')->name('validasi_transfer_user_for_organisasi');


Route::get('/validasi_pencairan_dana_user/{id}','adminController@validasi_pencairan_dana_user')->name('validasi_pencairan_dana_user');

Route::get('/validasi_pencairan_dana_organisasi/{id}','adminOrganisasi@validasi_pencairan_dana_organisasi')->name('validasi_pencairan_dana_organisasi');

Route::resource('/admin-organisasi', 'adminOrganisasi');
Route::get('/daftar-new-campaign-organisasi','adminOrganisasi@showDaftarNewCampaign')->name('daftar-new-campaign-group');
Route::delete('/organisasi/{$id}','adminOrganisasi@destroyOrganisasi')->name('delete_organisasi');

Route::get('/daftar-campaign-organisasi','adminOrganisasi@showDaftarCampaign')->name('daftar-campaign-group');
Route::get('/daftar-new-pencairan-organisasi','adminOrganisasi@showDaftarNewPencairan')->name('daftar-new-pencairan-group');
Route::get('/daftar-new-transfer-organisasi','adminOrganisasi@showDaftarNewTransfer')->name('daftar-new-transfer-group');
Route::get('/daftar-new-organisasi','adminOrganisasi@showDaftarNewOrganisasi')->name('daftar-new-organisasi');
Route::get('/daftar-organisasi','adminOrganisasi@showDaftarOrganisasi')->name('daftar-organisasi');
Route::get('/validasi-campaign-organisasi/{id}','adminOrganisasi@validasi_campaign')->name('validasi-campaign-organisasi');

//--------------------------------ROUTE Organisasi-----------------------------------//
//----------------------------------------------------------------------------------//
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
Route::resource('/dompet-kebaikan-organisasi', 'DompetKebaikanOrganisasiController')->middleware('auth:organitation');
Route::get('/dompet-kebaikan-organisasi-pencairan','DompetKebaikanOrganisasiController@showFormPencairan')->name('pencairan_dana_organisasi')->middleware('auth:organitation');
Route::post('/dompet-kebaikan-organisasi/pencairan_dana_campaign', 'DompetKebaikanOrganisasiController@storePencairan')->name('pencairan_dana_campaign_organisasi')->middleware('auth:organitation');

//-------------------------------------ROUTE Lain----------------------------------------//
//---------------------------------------------------------------------------------------//
Route::post('list','ListController@store');
Route::get('list','ListController@index');

