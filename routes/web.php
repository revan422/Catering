<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\JenisPembayaranController;
use App\Http\Controllers\PengirimanController;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| LOGIN & REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'login']);

Route::post('/login', [AuthController::class, 'prosesLogin']);

Route::get('/register', [AuthController::class, 'register']);

Route::post('/register', [AuthController::class, 'prosesRegister']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/profile', [AuthController::class, 'profile']);

Route::post('/profile/update', [AuthController::class, 'updateProfile']);
/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $pakets = DB::table('pakets')->get();

    return view('home', compact('pakets'));

});
/*
|--------------------------------------------------------------------------
| CRUD
|--------------------------------------------------------------------------
*/

Route::resource('pakets', PaketController::class);

Route::resource('pelanggans', PelangganController::class);

Route::resource('pemesanans', PemesananController::class);

Route::resource(
    'pembayarans',
    JenisPembayaranController::class
);

Route::resource('pengirimans', PengirimanController::class);
Route::post(
    '/checkout',
    [DashboardController::class, 'checkout']
);
