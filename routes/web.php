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

Route::get('/', function () {
    return redirect('/auth');
});

//pembuatan login
Route::get('/auth', [AuthController::class, 'index'])->name('auth');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/home', [HomeController::class, 'redirectTo'])->name('home');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/about', [HomeController::class, 'about'])->name('about');


// Route::get('/menu', function () {
//     return view('menu');
//     });

Route::group(['middleware' => ['checkislogin']], function () {
//pertemuan6
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.list');
    Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');

//pertemuan7
    Route::get('pelanggan/edit/{param1}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::post('pelanggan/update', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::get('pelanggan/destroy/{param1}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

    Route::get('mitra', [MitraController::class, 'index'])->name('mitra.list');
    Route::get('mitra/create', [MitraController::class, 'create'])->name('mitra.create');
    Route::post('mitra/store', [MitraController::class, 'store'])->name('mitra.store');
    Route::get('mitra/edit/{param1}', [MitraController::class, 'edit'])->name('mitra.edit');
    Route::post('mitra/update', [MitraController::class, 'update'])->name('mitra.update');
    Route::get('mitra/destroy/{param1}', [MitraController::class, 'destroy'])->name('mitra.destroy');

//pertemuan8 (quiz)
    Route::get('katalog', [KatalogController::class, 'index'])->name('katalog.list');
    Route::get('katalog/create', [KatalogController::class, 'create'])->name('katalog.create');
    Route::post('katalog/store', [KatalogController::class, 'store'])->name('katalog.store');
    Route::get('katalog/edit/{param1}', [KatalogController::class, 'edit'])->name('katalog.edit');
    Route::post('katalog/update', [KatalogController::class, 'update'])->name('katalog.update');
    Route::get('katalog/destroy/{param1}', [KatalogController::class, 'destroy'])->name('katalog.destroy');

    Route::get('pesanan', [PesananController::class, 'index'])->name('pesanan.list');
    Route::get('pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
    Route::post('pesanan/store', [PesananController::class, 'store'])->name('pesanan.store');
    Route::get('pesanan/edit/{param1}', [PesananController::class, 'edit'])->name('pesanan.edit');
    Route::post('pesanan/update', [PesananController::class, 'update'])->name('pesanan.update');
    Route::get('pesanan/destroy/{param1}', [PesananController::class, 'destroy'])->name('pesanan.destroy');

    // Route::group(['middleware' => ['checkrole:Administrator']], function () {
//pertemuan10
        Route::get('user', [UserController::class, 'index'])->name('user.list');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user/store', [UserController::class, 'store'])->name('user.store');

        Route::get('user/edit/{param1}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('user/update', [UserController::class, 'update'])->name('user.update');
        Route::get('user/destroy/{param1}', [UserController::class, 'destroy'])->name('user.destroy');

//     });
});

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.list');
Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.list');
Route::get('/user', [UserController::class, 'index'])->name('user.list');

Route::get('/auth/redirect-google', [AuthController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('/oauthcallback', [AuthController::class, 'handleGoogleCallback']);
