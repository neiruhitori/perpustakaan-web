<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamanTahunanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PengembalianTahunanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SedangMeminjamController;
use App\Http\Controllers\SedangMeminjamTahunanController;
use App\Http\Controllers\SelesaiMeminjamController;
use App\Http\Controllers\SelesaiMeminjamTahunanController;

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


/* Dibawah ini adalah route untuk redirect waktu pertama kali PHP artisan serve */
Route::get('/', function () {
        return view('dashboard');
    })->middleware('auth');
/*------------------------------------------------------------------------- */
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('profile', 'profile')->name('profile');
    Route::post('profile', 'updateProfile')->name('profile.update');

    Route::post('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

/* Route dashboard dibawah ini adalah untuk untuk connecting ke controller untuk buat Count() di dashboard. */
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
/*--------------------------------------------------------------------------------------------------------- */

    // Harian

    Route::controller(PeminjamanController::class)->prefix('peminjaman')->group(function () {
        Route::get('', 'index')->name('peminjaman');
        Route::get('create', 'create')->name('peminjaman.create');
        Route::post('store', 'store')->name('peminjaman.store');
        Route::get('show/{id}', 'show')->name('peminjaman.show');
        Route::get('edit/{id}', 'edit')->name('peminjaman.edit');
        Route::put('edit/{id}', 'update')->name('peminjaman.update');
        Route::delete('destroy/{id}', 'destroy')->name('peminjaman.destroy');
    });

    Route::controller(PengembalianController::class)->prefix('pengembalian')->group(function () {
        Route::get('pdf', 'view_pdf')->name('pengembalian.pdf');
        Route::get('', 'index')->name('pengembalian');
        Route::delete('destroy/{id}', 'destroy')->name('pengembalian.destroy');
        Route::get('status/{id}', 'status')->name('pengembalian.status');
    });

    Route::controller(SedangMeminjamController::class)->prefix('sedangmeminjam')->group(function () {
        Route::get('', 'index')->name('sedangmeminjam');
        Route::get('pdf', 'view_pdf')->name('sedangmeminjam.pdf');
    });

    Route::controller(SelesaiMeminjamController::class)->prefix('selesaimeminjam')->group(function () {
        Route::get('', 'index')->name('selesaimeminjam');
        Route::get('pdf', 'view_pdf')->name('selesaimeminjam.pdf');
    });

    /*--------------------------------------------------------------------------------------------------------- */

    // Tahunan
    Route::controller(PeminjamanTahunanController::class)->prefix('peminjamantahunan')->group(function () {
        Route::get('', 'index')->name('peminjamantahunan');
        Route::get('create', 'create')->name('peminjamantahunan.create');
        Route::post('store', 'store')->name('peminjamantahunan.store');
        Route::get('show/{id}', 'show')->name('peminjamantahunan.show');
        Route::get('edit/{id}', 'edit')->name('peminjamantahunan.edit');
        Route::put('edit/{id}', 'update')->name('peminjamantahunan.update');
        Route::delete('destroy/{id}', 'destroy')->name('peminjamantahunan.destroy');
    });

    Route::controller(PengembalianTahunanController::class)->prefix('pengembaliantahunan')->group(function () {
        Route::get('pdf', 'view_pdf')->name('pengembaliantahunan.pdf');
        Route::get('', 'index')->name('pengembaliantahunan');
        Route::delete('destroy/{id}', 'destroy')->name('pengembaliantahunan.destroy');
        Route::get('status/{id}', 'status')->name('pengembaliantahunan.status');
    });

    Route::controller(SedangMeminjamTahunanController::class)->prefix('sedangmeminjamtahunan')->group(function () {
        Route::get('', 'index')->name('sedangmeminjamtahunan');
        Route::get('pdf', 'view_pdf')->name('sedangmeminjamtahunan.pdf');
    });

    Route::controller(SelesaiMeminjamTahunanController::class)->prefix('selesaimeminjamtahunan')->group(function () {
        Route::get('', 'index')->name('selesaimeminjamtahunan');
        Route::get('pdf', 'view_pdf')->name('selesaimeminjamtahunan.pdf');
    });
});
