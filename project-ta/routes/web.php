<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginControllerr;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
        return view('dashboard');
    })->middleware('auth');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::post('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

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

    // Route::get('pengembalian/view/pdf', [PengembalianController::class, 'view_pdf']);
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});

// Route::get('/', function () {
//     return view('komponen-admin.master');
// })->middleware('auth');

// // Halaman Login
// Route::get('/login', [LoginControllerr::class, 'login'])->name('login');
// Route::post('/loginuser', [LoginControllerr::class, 'loginuser'])->name('loginuser');

// Route::get('/auth/redirect', 'Auth\LoginController@redirectToProvider');
// Route::get('/auth/callback', 'Auth\LoginController@handleProviderCallback');

// // Halaman Register
// Route::get('/register', [LoginControllerr::class, 'register'])->name('register');
// Route::POST('/registeruser', [LoginControllerr::class, 'registeruser'])->name('registeruser');

// // Logout
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// // Peminjaman
// Route::get('/peminjaman', [PeminjamanController::class, 'peminjaman'])->name('peminjaman');
// Route::post('/createpeminjaman', [PeminjamanController::class, 'createpeminjaman'])->name('createpeminjaman');

// Route::get('/editpeminjaman/{id}', [PeminjamanController::class, 'edistpeminjaman'])->name('editpeminjaman');
// Route::put('/updatepeminjaman/{id}', [PeminjamanController::class, 'updatepeminjaman'])->name('updatepeminjaman');

// Route::get('/delete/{id}', [PeminjamanController::class, 'destroy']);
