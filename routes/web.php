<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/auth');
});

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN SYSTEM) - SUDAH BENAR
|--------------------------------------------------------------------------
*/

// tampil halaman login
Route::get('/auth', [AuthController::class, 'index'])->name('auth');

// proses login (INI YANG BENAR POST)
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

// logout
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/home', [HomeController::class, 'redirectTo'])->name('home');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/about', [HomeController::class, 'about'])->name('about');

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (HARUS LOGIN)
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['checkislogin']], function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PELANGGAN
    |--------------------------------------------------------------------------
    */
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.list');
    Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::post('/pelanggan/update', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::get('/pelanggan/destroy/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

    /*
    |--------------------------------------------------------------------------
    | MITRA
    |--------------------------------------------------------------------------
    */
    Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.list');
    Route::get('/mitra/create', [MitraController::class, 'create'])->name('mitra.create');
    Route::post('/mitra/store', [MitraController::class, 'store'])->name('mitra.store');
    Route::get('/mitra/edit/{id}', [MitraController::class, 'edit'])->name('mitra.edit');
    Route::post('/mitra/update', [MitraController::class, 'update'])->name('mitra.update');
    Route::get('/mitra/destroy/{id}', [MitraController::class, 'destroy'])->name('mitra.destroy');

    /*
    |--------------------------------------------------------------------------
    | KATALOG
    |--------------------------------------------------------------------------
    */
    Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.list');
    Route::get('/katalog/create', [KatalogController::class, 'create'])->name('katalog.create');
    Route::post('/katalog/store', [KatalogController::class, 'store'])->name('katalog.store');
    Route::get('/katalog/edit/{id}', [KatalogController::class, 'edit'])->name('katalog.edit');
    Route::post('/katalog/update', [KatalogController::class, 'update'])->name('katalog.update');
    Route::get('/katalog/destroy/{id}', [KatalogController::class, 'destroy'])->name('katalog.destroy');

    /*
    |--------------------------------------------------------------------------
    | PESANAN
    |--------------------------------------------------------------------------
    */
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.list');
    Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
    Route::post('/pesanan/store', [PesananController::class, 'store'])->name('pesanan.store');
    Route::get('/pesanan/edit/{id}', [PesananController::class, 'edit'])->name('pesanan.edit');
    Route::post('/pesanan/update', [PesananController::class, 'update'])->name('pesanan.update');
    Route::get('/pesanan/destroy/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');

    /*
    |--------------------------------------------------------------------------
    | USER (ADMIN)
    |--------------------------------------------------------------------------
    */
    Route::get('/user', [UserController::class, 'index'])->name('user.list');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

/*
|--------------------------------------------------------------------------
| GOOGLE LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/auth/redirect-google', [AuthController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('/oauthcallback', [AuthController::class, 'handleGoogleCallback']);
