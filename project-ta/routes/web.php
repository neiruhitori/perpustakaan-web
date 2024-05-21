<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamanTahunanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PengembalianTahunanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatatanHarianController;
use App\Http\Controllers\CatatanTahunanController;
use App\Http\Controllers\SedangMeminjamController;
use App\Http\Controllers\SedangMeminjamTahunanController;
use App\Http\Controllers\SelesaiMeminjamController;
use App\Http\Controllers\SelesaiMeminjamTahunanController;
use App\Http\Controllers\KelasController;

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
    Route::controller(KelasController::class)->prefix('kelasvii')->group(function () {
        Route::get('', 'index_vii')->name('kelasvii');
    });
    Route::controller(KelasController::class)->prefix('kelasviii')->group(function () {
        Route::get('', 'index_viii')->name('kelasviii');
    });
    Route::controller(KelasController::class)->prefix('kelasix')->group(function () {
        Route::get('', 'index_ix')->name('kelasix');
    });
    // ===================================================================================================================
    // Route halaman isi kelas VII A====================================================================================
    Route::controller(KelasController::class)->prefix('a')->group(function () {
        Route::get('kelas/viia', 'kelas_viia')->name('a');
        Route::get('kelas/viia/search', 'search_viia')->name('a.search');
        Route::get('kelas/viia/pdf', 'pdf_viia')->name('a.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VII B====================================================================================
    Route::controller(KelasController::class)->prefix('b')->group(function () {
        Route::get('kelas/viib', 'kelas_viib')->name('b');
        Route::get('kelas/viib/search', 'search_viib')->name('b.search');
        Route::get('kelas/viib/pdf', 'pdf_viib')->name('b.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VII C====================================================================================
    Route::controller(KelasController::class)->prefix('c')->group(function () {
        Route::get('kelas/viic', 'kelas_viic')->name('c');
        Route::get('kelas/viic/search', 'search_viic')->name('c.search');
        Route::get('kelas/viic/pdf', 'pdf_viic')->name('c.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VII D====================================================================================
    Route::controller(KelasController::class)->prefix('d')->group(function () {
        Route::get('kelas/viid', 'kelas_viid')->name('d');
        Route::get('kelas/viid/search', 'search_viid')->name('d.search');
        Route::get('kelas/viid/pdf', 'pdf_viid')->name('d.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VII E====================================================================================
    Route::controller(KelasController::class)->prefix('e')->group(function () {
        Route::get('kelas/viie', 'kelas_viie')->name('e');
        Route::get('kelas/viie/search', 'search_viie')->name('e.search');
        Route::get('kelas/viie/pdf', 'pdf_viie')->name('e.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VII F====================================================================================
    Route::controller(KelasController::class)->prefix('f')->group(function () {
        Route::get('kelas/viif', 'kelas_viif')->name('f');
        Route::get('kelas/viif/search', 'search_viif')->name('f.search');
        Route::get('kelas/viif/pdf', 'pdf_viif')->name('f.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VII G====================================================================================
    Route::controller(KelasController::class)->prefix('g')->group(function () {
        Route::get('kelas/viig', 'kelas_viig')->name('g');
        Route::get('kelas/viig/search', 'search_viig')->name('g.search');
        Route::get('kelas/viig/pdf', 'pdf_viig')->name('g.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VIII A====================================================================================
    Route::controller(KelasController::class)->prefix('a')->group(function () {
        Route::get('kelas/viiia', 'kelas_viiia')->name('a');
        Route::get('kelas/viiia/search', 'search_viiia')->name('a.search');
        Route::get('kelas/viiia/pdf', 'pdf_viiia')->name('a.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VIII B====================================================================================
    Route::controller(KelasController::class)->prefix('b')->group(function () {
        Route::get('kelas/viiib', 'kelas_viiib')->name('b');
        Route::get('kelas/viiib/search', 'search_viiib')->name('b.search');
        Route::get('kelas/viiib/pdf', 'pdf_viiib')->name('b.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VIII C====================================================================================
    Route::controller(KelasController::class)->prefix('c')->group(function () {
        Route::get('kelas/viiic', 'kelas_viiic')->name('c');
        Route::get('kelas/viiic/search', 'search_viiic')->name('c.search');
        Route::get('kelas/viiic/pdf', 'pdf_viiic')->name('c.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VIII D====================================================================================
    Route::controller(KelasController::class)->prefix('d')->group(function () {
        Route::get('kelas/viiid', 'kelas_viiid')->name('d');
        Route::get('kelas/viiid/search', 'search_viiid')->name('d.search');
        Route::get('kelas/viiid/pdf', 'pdf_viiid')->name('d.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VIII E====================================================================================
    Route::controller(KelasController::class)->prefix('e')->group(function () {
        Route::get('kelas/viiie', 'kelas_viiie')->name('e');
        Route::get('kelas/viiie/search', 'search_viiie')->name('e.search');
        Route::get('kelas/viiie/pdf', 'pdf_viiie')->name('e.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VIII F====================================================================================
    Route::controller(KelasController::class)->prefix('f')->group(function () {
        Route::get('kelas/viiif', 'kelas_viiif')->name('f');
        Route::get('kelas/viiif/search', 'search_viiif')->name('f.search');
        Route::get('kelas/viiif/pdf', 'pdf_viiif')->name('f.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas VIII G====================================================================================
    Route::controller(KelasController::class)->prefix('g')->group(function () {
        Route::get('kelas/viiig', 'kelas_viiig')->name('g');
        Route::get('kelas/viiig/search', 'search_viiig')->name('g.search');
        Route::get('kelas/viiig/pdf', 'pdf_viiig')->name('g.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas IX A====================================================================================
    Route::controller(KelasController::class)->prefix('a')->group(function () {
        Route::get('kelas/ixa', 'kelas_ixa')->name('a');
        Route::get('kelas/ixa/search', 'search_ixa')->name('a.search');
        Route::get('kelas/ixa/pdf', 'pdf_ixa')->name('a.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas IX B====================================================================================
    Route::controller(KelasController::class)->prefix('b')->group(function () {
        Route::get('kelas/ixb', 'kelas_ixb')->name('b');
        Route::get('kelas/ixb/search', 'search_ixb')->name('b.search');
        Route::get('kelas/ixb/pdf', 'pdf_ixb')->name('b.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas IX C====================================================================================
    Route::controller(KelasController::class)->prefix('c')->group(function () {
        Route::get('kelas/ixc', 'kelas_ixc')->name('c');
        Route::get('kelas/ixc/search', 'search_ixc')->name('c.search');
        Route::get('kelas/ixc/pdf', 'pdf_ixc')->name('c.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas IX D====================================================================================
    Route::controller(KelasController::class)->prefix('d')->group(function () {
        Route::get('kelas/ixd', 'kelas_ixd')->name('d');
        Route::get('kelas/ixd/search', 'search_ixd')->name('d.search');
        Route::get('kelas/ixd/pdf', 'pdf_ixd')->name('d.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas IX E====================================================================================
    Route::controller(KelasController::class)->prefix('e')->group(function () {
        Route::get('kelas/ixe', 'kelas_ixe')->name('e');
        Route::get('kelas/ixe/search', 'search_ixe')->name('e.search');
        Route::get('kelas/ixe/pdf', 'pdf_ixe')->name('e.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas IX F====================================================================================
    Route::controller(KelasController::class)->prefix('f')->group(function () {
        Route::get('kelas/ixf', 'kelas_ixf')->name('f');
        Route::get('kelas/ixf/search', 'search_ixf')->name('f.search');
        Route::get('kelas/ixf/pdf', 'pdf_ixf')->name('f.pdf');
    });
    // ====================================================================================================================
    // Route halaman isi kelas IX G====================================================================================
    Route::controller(KelasController::class)->prefix('g')->group(function () {
        Route::get('kelas/ixg', 'kelas_ixg')->name('g');
        Route::get('kelas/ixg/search', 'search_ixg')->name('g.search');
        Route::get('kelas/ixg/pdf', 'pdf_ixg')->name('g.pdf');
    });
    // ====================================================================================================================
});
