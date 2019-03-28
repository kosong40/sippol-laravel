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
    return view('index');
});
Route::get('/login',function(){
    return view('login');
})->name('login');
Route::post('/login','AdminController@login');
Route::get('/cobaApi','ApiAll@pelayanan');

Route::group(['middleware' => ['sesi']], function () {
    Route::get('/logout','AdminController@keluar')->name('keluar');
    Route::group(['prefix' => 'kecamatan','middleware' => ['kecamatan']], function () {
        Route::get('/','AdminController@homeKec');
        Route::get('/akun','AdminController@AkunAdmin');
        Route::post('/akun/addDesa','AdminController@AkunAddDesa')->name('AddAdminDesa');
        Route::post('/akun/edit/{username}','AdminController@editAkun');
        Route::get('/akun/resetpass/{username}','AdminController@resetPass');
        Route::get('/layanan','AdminController@dataPelayanan');
        Route::get('/layanan/{slug}','AdminController@dataLayanan');
        Route::get('/profil','AdminController@ubahDataAdmin');
        Route::get('/pelayanan','AdminController@pelayanan');
        Route::post('/pelayanan/ubah/{slug}','AdminController@ubahKetPelayanan');
        Route::post('/sublayanan/ubah/{slug}','AdminController@ubahKetSublayanan');
        Route::get('/pelayanan/{slug}','AdminController@setPelayanan');
        Route::get('/pelayanan/{slug}/{slug2}','AdminController@setSublayanan');
    });
    Route::group(['prefix' => 'desa','middleware'=>'desa'], function () {
        Route::get('/','AdminController@homeDesa');
        Route::get('/pengaturan','AdminController@pagePengaturan');
    });
});

