<?php

use Illuminate\Support\Facades\Cookie;
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
Route::get('/testing',function(){
    // return view('testing');
    dd(Cookie::get('laravel_session'));
});
Route::post('/testing/upload','AdminController@testing');
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
        Route::post('/profil/akun','AdminController@editAkunKecamatan');
        Route::post('/profil/password','AdminController@editAkunKecamatanPass');
        Route::post('/profil/info/{id}','AdminController@editInfoKecamatan');
    });
    Route::group(['prefix' => 'desa','middleware'=>'desa'], function () {
        Route::get('/','DesaController@homeDesa');
        Route::get('/pengaturan','DesaController@pagePengaturan');
        Route::get('/formulir/{slug}','DesaController@formulirPelayanan');
        Route::get('/formulir/{slug1}/{slug2}','DesaController@formulirSublayanan');
        Route::post('/formulir/imb','DesaController@imb');
        Route::post('/formulir/reklame','DesaController@reklameForm')->name('formulilr_reklame');
        Route::post('/profil/akun','DesaController@editAkunDesa')->name('akunDesa');
        Route::post('/profil/akun/pass','DesaController@editPassAdminDesa')->name('passAdminDesa');
        Route::post('/profil/akun/info/{id}','DesaController@gantiInfoDesa')->name('gantiInfoDesa');
         
    });
});

