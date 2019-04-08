<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/pelayananlist','ApiAll@pelayanan');
Route::get('/desakelurahan','ApiAll@desakelurahan');
Route::get('/akunpage','ApiAll@HalamanAkun');
Route::get('/layanan/{slug}','ApiAll@dataLayanan');
