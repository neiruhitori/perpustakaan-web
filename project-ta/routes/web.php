<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamanTahunanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PengembalianTahunanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukucrudController;
use App\Http\Controllers\CatatanHarianController;
use App\Http\Controllers\CatatanTahunanController;
use App\Http\Controllers\SedangMeminjamController;
use App\Http\Controllers\SedangMeminjamTahunanController;
use App\Http\Controllers\SelesaiMeminjamController;
use App\Http\Controllers\SelesaiMeminjamTahunanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;

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


/* Dibawah ini adalah route langsung redirect ke dashboard jika sebelumnya belum logout */
Route::get('/', [HomeController::class, 'index'], function () {
        return view('dashboard');
    })->middleware('auth');
/*------------------------------------------------------------------------------------------------------ */

// Route Login ====================================================================
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('profile', 'profile')->name('profile');
    Route::post('profile', 'updateProfile')->name('profile.update');

    Route::post('logout', 'logout')->middleware('auth')->name('logout');
});
// =====================================================================================================

Route::middleware('auth')->group(function () {
//======================Dibawah ini adalah dashboard setelah login akan redirect ke ini===================
    Route::get('dashboard', [HomeController::class, 'index'], function () {
        return view('dashboard');
    })->name('dashboard');
// =======================================================================================================

// ================================= Siswa ===============================================================
Route::controller(SiswaController::class)->prefix('siswa')->group(function () {
    Route::get('', 'index')->name('siswa');
    Route::get('create', 'create')->name('siswa.create');
    Route::post('store', 'store')->name('siswa.store');
    Route::get('show/{id}', 'show')->name('siswa.show');
    Route::get('edit/{id}', 'edit')->name('siswa.edit');
    Route::put('edit/{id}', 'update')->name('siswa.update');
    Route::delete('destroy/{id}', 'destroy')->name('siswa.destroy');
});
// =======================================================================================================

// ================================= Buku ===============================================================
Route::controller(BukucrudController::class)->prefix('buku')->group(function () {
    Route::get('', 'index')->name('buku');
    Route::get('create', 'create')->name('buku.create');
    Route::post('store', 'store')->name('buku.store');
    Route::get('show/{id}', 'show')->name('buku.show');
    Route::get('edit/{id}', 'edit')->name('buku.edit');
    Route::put('edit/{id}', 'update')->name('buku.update');
    Route::delete('destroy/{id}', 'destroy')->name('buku.destroy');
});
// =======================================================================================================

// Harian================================================================================================

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
        Route::get('', 'index')->name('pengembalian');
        Route::get('pdf', 'view_pdf')->name('pengembalian.pdf');
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

    Route::controller(CatatanHarianController::class)->prefix('catatanharian')->group(function () {
        Route::get('', 'index')->name('catatanharian');
        Route::get('show/{id}', 'show')->name('catatanharian.show');
        Route::get('edit/{id}', 'edit')->name('catatanharian.edit');
        Route::put('edit/{id}', 'update')->name('catatanharian.update');
    });

    /*--------------------------------------------------------------------------------------------------------- */

// Tahunan======================================================================================================
    Route::controller(PeminjamanTahunanController::class)->prefix('peminjamantahunan')->group(function () {
        Route::get('', 'index')->name('peminjamantahunan');
        Route::get('create', 'create')->name('peminjamantahunan.create');
        Route::post('store', 'store')->name('peminjamantahunan.store');
        Route::get('createbuku', 'createbuku')->name('peminjamantahunanbuku.create');
        Route::post('storebuku', 'storebuku')->name('peminjamantahunanbuku.store');
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

    Route::controller(CatatanTahunanController::class)->prefix('catatantahunan')->group(function () {
        Route::get('', 'index')->name('catatantahunan');
        Route::get('show/{id}', 'show')->name('catatantahunan.show');
        Route::get('edit/{id}', 'edit')->name('catatantahunan.edit');
        Route::put('edit/{id}', 'update')->name('catatantahunan.update');
    });
    // ===============================================================================================================

    // Route halaman kelas============================================================================================
    Route::controller(KelasController::class)->group(function () {
        Route::get('kelas/viia', 'kelas_viia')->name('viia');
        Route::get('kelas/viia/search', 'search_viia')->name('viia.search');
        Route::get('kelas/viia/pdf', 'pdf_viia')->name('viia.pdf');

        Route::get('kelas/viib', 'kelas_viib')->name('viib');
        Route::get('kelas/viib/search', 'search_viib')->name('viib.search');
        Route::get('kelas/viib/pdf', 'pdf_viib')->name('viib.pdf');

        Route::get('kelas/viic', 'kelas_viic')->name('viic');
        Route::get('kelas/viic/search', 'search_viic')->name('viic.search');
        Route::get('kelas/viic/pdf', 'pdf_viic')->name('viic.pdf');

        Route::get('kelas/viid', 'kelas_viid')->name('viid');
        Route::get('kelas/viid/search', 'search_viid')->name('viid.search');
        Route::get('kelas/viid/pdf', 'pdf_viid')->name('viid.pdf');

        Route::get('kelas/viie', 'kelas_viie')->name('viie');
        Route::get('kelas/viie/search', 'search_viie')->name('viie.search');
        Route::get('kelas/viie/pdf', 'pdf_viie')->name('viie.pdf');

        Route::get('kelas/viif', 'kelas_viif')->name('viif');
        Route::get('kelas/viif/search', 'search_viif')->name('viif.search');
        Route::get('kelas/viif/pdf', 'pdf_viif')->name('viif.pdf');

        Route::get('kelas/viig', 'kelas_viig')->name('viig');
        Route::get('kelas/viig/search', 'search_viig')->name('viig.search');
        Route::get('kelas/viig/pdf', 'pdf_viig')->name('viig.pdf');
    });
    Route::controller(KelasController::class)->group(function () {
        Route::get('kelas/viiia', 'kelas_viiia')->name('viiia');
        Route::get('kelas/viiia/search', 'search_viiia')->name('viiia.search');
        Route::get('kelas/viiia/pdf', 'pdf_viiia')->name('viiia.pdf');

        Route::get('kelas/viiib', 'kelas_viiib')->name('viiib');
        Route::get('kelas/viiib/search', 'search_viiib')->name('viiib.search');
        Route::get('kelas/viiib/pdf', 'pdf_viiib')->name('viiib.pdf');

        Route::get('kelas/viiic', 'kelas_viiic')->name('viiic');
        Route::get('kelas/viiic/search', 'search_viiic')->name('viiic.search');
        Route::get('kelas/viiic/pdf', 'pdf_viiic')->name('viiic.pdf');

        Route::get('kelas/viiid', 'kelas_viiid')->name('viiid');
        Route::get('kelas/viiid/search', 'search_viiid')->name('viiid.search');
        Route::get('kelas/viiid/pdf', 'pdf_viiid')->name('viiid.pdf');

        Route::get('kelas/viiie', 'kelas_viiie')->name('viiie');
        Route::get('kelas/viiie/search', 'search_viiie')->name('viiie.search');
        Route::get('kelas/viiie/pdf', 'pdf_viiie')->name('viiie.pdf');

        Route::get('kelas/viiif', 'kelas_viiif')->name('viiif');
        Route::get('kelas/viiif/search', 'search_viiif')->name('viiif.search');
        Route::get('kelas/viiif/pdf', 'pdf_viiif')->name('viiif.pdf');

        Route::get('kelas/viiig', 'kelas_viiig')->name('viiig');
        Route::get('kelas/viiig/search', 'search_viiig')->name('viiig.search');
        Route::get('kelas/viiig/pdf', 'pdf_viiig')->name('viiig.pdf');
    });
    Route::controller(KelasController::class)->group(function () {
        Route::get('kelas/ixa', 'kelas_ixa')->name('ixa');
        Route::get('kelas/ixa/search', 'search_ixa')->name('ixa.search');
        Route::get('kelas/ixa/pdf', 'pdf_ixa')->name('ixa.pdf');

        Route::get('kelas/ixb', 'kelas_ixb')->name('ixb');
        Route::get('kelas/ixb/search', 'search_ixb')->name('ixb.search');
        Route::get('kelas/ixb/pdf', 'pdf_ixb')->name('ixb.pdf');

        Route::get('kelas/ixc', 'kelas_ixc')->name('ixc');
        Route::get('kelas/ixc/search', 'search_ixc')->name('ixc.search');
        Route::get('kelas/ixc/pdf', 'pdf_ixc')->name('ixc.pdf');

        Route::get('kelas/ixd', 'kelas_ixd')->name('ixd');
        Route::get('kelas/ixd/search', 'search_ixd')->name('ixd.search');
        Route::get('kelas/ixd/pdf', 'pdf_ixd')->name('ixd.pdf');

        Route::get('kelas/ixe', 'kelas_ixe')->name('ixe');
        Route::get('kelas/ixe/search', 'search_ixe')->name('ixe.search');
        Route::get('kelas/ixe/pdf', 'pdf_ixe')->name('ixe.pdf');

        Route::get('kelas/ixf', 'kelas_ixf')->name('ixf');
        Route::get('kelas/ixf/search', 'search_ixf')->name('ixf.search');
        Route::get('kelas/ixf/pdf', 'pdf_ixf')->name('ixf.pdf');

        Route::get('kelas/ixg', 'kelas_ixg')->name('ixg');
        Route::get('kelas/ixg/search', 'search_ixg')->name('ixg.search');
        Route::get('kelas/ixg/pdf', 'pdf_ixg')->name('ixg.pdf');
    });
    // ===================================================================================================================
});
