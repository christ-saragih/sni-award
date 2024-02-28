<?php

use App\Http\Controllers\AssesmentAdminController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeControllerPeserta;
use App\Http\Controllers\HomePesertaController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilPesertaController;
use App\Http\Controllers\RiwayatPesertaController;
use App\Http\Controllers\TagBeritaController;
use App\Models\KategoriBerita;
use App\Models\TagBerita;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     echo "Hallo gaes";
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/informasi', [InformationController::class, 'index']);
Route::get('/admin', [HomeAdminController::class, 'index']);
Route::get('/admin/assesment', [AssesmentAdminController::class, 'index']);
Route::get('/peserta',[HomePesertaController::class, 'index']);
Route::get('/peserta/profil',[ProfilPesertaController::class, 'index']);
Route::get('/peserta/riwayat', [RiwayatPesertaController::class, 'index']);

Route::prefix('admin')->group(function() {

// <<<<<<< HEAD
// Admin
Route::get('/admin/assesment', [AssesmentAdminController::class, 'index']);


// =======
    // Tag Berita
    Route::get('/tag_berita', [TagBeritaController::class, 'index'])->name('tag_berita.index');
    Route::get('/tag_berita/tambah', [TagBeritaController::class, 'create'])->name('tag_berita.create');
    Route::post('/tag_berita', [TagBeritaController::class, 'store'])->name('tag_berita.store');
    Route::get('/tag_berita/{tag_berita}/edit', [TagBeritaController::class, 'edit'])->name('tag_berita.edit');
    Route::put('/tag_berita/{tag_berita}', [TagBeritaController::class, 'update'])->name('tag_berita.update');
    Route::delete('/tag_berita/{tag_berita}', [TagBeritaController::class, 'destroy'])->name('tag_berita.destroy');

    //berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/tambah', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    //kategori berita
    Route::get('/kategori_berita',[KategoriBeritaController::class,'index'])->name('kategori_berita.index');
    Route::get('/kategori_berita/tambah',[KategoriBeritaController::class,'create'])->name('kategori_berita.create');
    Route::post('/kategori_berita',[KategoriBeritaController::class,'store'])->name('kategori_berita.store');
    Route::get('/kategori_berita/{kategori_berita}/edit',[KategoriBeritaController::class,'edit'])->name('kategori_berita.edit');
    Route::put('/kategori_berita/{kategori_berita}',[KategoriBeritaController::class,'update'])->name('kategori_berita.update');
    Route::delete('/kategori_berita/{kategori_berita}',[KategoriBeritaController::class,'destroy'])->name('kategori_berita.destroy');

    //berita
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::get('/dokumen/tambah', [DokumenController::class, 'create'])->name('dokumen.create');
    Route::post('/dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
    Route::get('/dokumen/{dokumen}/edit', [DokumenController::class, 'edit'])->name('dokumen.edit');
    Route::put('/dokumen/{dokumen}', [DokumenController::class, 'update'])->name('dokumen.update');
    Route::delete('/dokumen/{dokumen}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');
});

// >>>>>>> aff9a7dc4ee15cfe0da066180cb07c20d0e5d80c
