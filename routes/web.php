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
    return view('testing');
    // dd(Cookie::get('laravel_session'));
    // $string = "ABCDEFGHIJKLMNOPQRETUVWXYZabcdefghijklmnopqrstuwvxyz1234567890";
    // $acak = substr(str_shuffle($string),0,16);
    // dd(substr("RUHGOAEw1bI2MZyV1",16,16));
    // dd($acak);
    // return view('surat/dispensasi-nikah');
});
Route::get('/tes','AdminController@cek');
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
        Route::get('/layanan/{slug}/{id}','AdminController@dataLayananDetail');
        Route::get('/layanan/{slug}/{id}/setujui','AdminController@setujuPermohonan');
        Route::get('/layanan/{slug}/{id}/cetak','AdminController@cetakSKLayanan');

        Route::get('/layanan/{slug}/{id}/pdf','AdminController@cetakSKLayananPDF');

        Route::get('/sublayanan/{slug1}/{slug2}','AdminController@dataSublayanan');
        Route::get('/sublayanan/{slug2}/{id}/detail','AdminController@dataSublayananDetail');
        Route::get('/sublayanan/{slug2}/{id}/setujui','AdminController@setujuPermohonan');
        Route::get('/sublayanan/{slug2}/{id}/cetak','AdminController@cetakSKSubayanan');
        Route::get('/sublayanan/{slug2}/{id}/pdf','AdminController@cetakSKSubayananPDF');

        Route::get('/profil','AdminController@ubahDataAdmin');
        Route::get('/pelayanan','AdminController@pelayanan');
        Route::post('/pelayanan/ubah/{slug}','AdminController@ubahKetPelayanan');
        Route::post('/sublayanan/ubah/{slug}','AdminController@ubahKetSublayanan');
        Route::get('/pelayanan/{slug}','AdminController@setPelayanan');
        Route::get('/pelayanan/{slug}/{slug2}','AdminController@setSublayanan');
        Route::post('/profil/akun','AdminController@editAkunKecamatan');
        Route::post('/profil/password','AdminController@editAkunKecamatanPass');
        Route::post('/profil/info/{id}','AdminController@editInfoKecamatan');
        Route::post('/formulir/{kode}/{id}/{slug}/no-sk','AdminController@noSKLayanan')->name('no_sk');
    });
    Route::group(['prefix' => 'desa','middleware'=>'desa'], function () {
        Route::get('/','DesaController@homeDesa');
        Route::get('/pengaturan','DesaController@pagePengaturan');
        Route::get('/formulir/{slug}','DesaController@formulirPelayanan');
        Route::get('/formulir/{slug1}/{slug2}','DesaController@formulirSublayanan');
        Route::post('/formulir/imb','DesaController@imb');
        Route::post('/formulir/reklame','DesaController@reklameForm')->name('formulilr_reklame');
        Route::post('/formulir/iumk','DesaController@iumkForm')->name('formulir_iumk');
        Route::post('/formulir/salon','DesaController@salonForm')->name('formulir_salon');
        Route::post('/formulir/rumahMakan','DesaController@rmForm')->name('formulir_rm');
        Route::post('/formulir/gelanggangketangkasan','DesaController@gkForm')->name('formulir_gk');
        Route::post('/formulir/atraksiwisata','DesaController@awForm')->name('formulir_aw');
        Route::get('/data','DesaController@data');
        Route::get('/data/{slug}','DesaController@dataPelayanan');

        Route::post('/profil/akun','DesaController@editAkunDesa')->name('akunDesa');
        Route::post('/profil/akun/pass','DesaController@editPassAdminDesa')->name('passAdminDesa');
        Route::post('/profil/akun/info/{id}','DesaController@gantiInfoDesa')->name('gantiInfoDesa');
         
    });
});

