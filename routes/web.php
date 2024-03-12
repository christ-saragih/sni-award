<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AssessmentPertanyaanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeControllerPeserta;
use App\Http\Controllers\HomePesertaController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KategoriOrganisasiController;
use App\Http\Controllers\ProfilPesertaController;
use App\Http\Controllers\RiwayatPesertaController;
use App\Http\Controllers\TagBeritaController;
use App\Http\Controllers\Peserta\AuthPesertaController;
use App\Http\Controllers\Peserta\PesertaDashboardController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    // Route::get('/login', [LoginController::class, 'index']);
    Route::get('/informasi', [InformationController::class, 'index']);
    Route::get('/peserta',[HomePesertaController::class, 'index']);
    Route::get('/peserta/profil',[ProfilPesertaController::class, 'index']);
    Route::get('/peserta/riwayat', [RiwayatPesertaController::class, 'index']);

    // Auth
    //peserta
    Route::get('/masuk', [AuthPesertaController::class, 'loginPesertaView'])->name('masuk');
    Route::post('/masuk', [AuthPesertaController::class, 'loginPeserta']);
    Route::get('/registrasi', [AuthPesertaController::class, 'registrasiPesertaView']);
    Route::post('/registrasi', [AuthPesertaController::class, 'registrasiPeserta']);
    Route::get('/verifikasi/{verify_key}', [AuthPesertaController::class, 'verifikasiPeserta']);
    //end Auth


    Route::prefix('admin')->group(function() {
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

        //Acara
        Route::get('/acara', [AcaraController::class, 'index'])->name('acara.index');
        Route::get('/acara/tambah', [AcaraController::class, 'create'])->name('acara.create');
        Route::post('/acara', [AcaraController::class, 'store'])->name('acara.store');
        Route::get('/acara/{acara}/edit', [AcaraController::class, 'edit'])->name('acara.edit');
        Route::put('/acara/{acara}', [AcaraController::class, 'update'])->name('acara.update');
        Route::delete('/acara/{acara}', [AcaraController::class, 'destroy'])->name('acara.destroy');

        //kategori berita
        Route::get('/kategori_berita',[KategoriBeritaController::class,'index'])->name('kategori_berita.index');
        Route::get('/kategori_berita/tambah',[KategoriBeritaController::class,'create'])->name('kategori_berita.create');
        Route::post('/kategori_berita',[KategoriBeritaController::class,'store'])->name('kategori_berita.store');
        Route::get('/kategori_berita/{kategori_berita}/edit',[KategoriBeritaController::class,'edit'])->name('kategori_berita.edit');
        Route::put('/kategori_berita/{kategori_berita}',[KategoriBeritaController::class,'update'])->name('kategori_berita.update');
        Route::delete('/kategori_berita/{kategori_berita}',[KategoriBeritaController::class,'destroy'])->name('kategori_berita.destroy');

        //Dokumen
        Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
        Route::get('/dokumen/tambah', [DokumenController::class, 'create'])->name('dokumen.create');
        Route::post('/dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
        Route::get('/dokumen/{dokumen}/edit', [DokumenController::class, 'edit'])->name('dokumen.edit');
        Route::put('/dokumen/{dokumen}', [DokumenController::class, 'update'])->name('dokumen.update');
        Route::delete('/dokumen/{dokumen}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');

        // Asessment
        Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
        //Assessment Pertanyaan
        Route::get('/assessment_pertanyaan', [AssessmentPertanyaanController::class, 'index'])->name('assessment_pertanyaan.index');
        Route::get('/assessment_pertanyaan/tambah', [AssessmentPertanyaanController::class, 'create'])->name('assessment_pertanyaan.create');
        Route::post('/assessment_pertanyaan', [AssessmentPertanyaanController::class, 'store'])->name('assessment_pertanyaan.store');
        Route::get('/assessment_pertanyaan/{assessment_pertanyaan}/edit', [AssessmentPertanyaanController::class, 'edit'])->name('assessment_pertanyaan.edit');
        Route::put('/assessment_pertanyaan/{assessment_pertanyaan}', [AssessmentPertanyaanController::class, 'update'])->name('assessment_pertanyaan.update');
        Route::delete('/assessment_pertanyaan/{assessment_pertanyaan}', [AssessmentPertanyaanController::class, 'destroy'])->name('assessment_pertanyaan.destroy');

        //Kategori Organisasi
        Route::get('/kategori_organisasi', [KategoriOrganisasiController::class, 'index'])->name('kategori_organisasi.index');
        Route::get('/kategori_organisasi/tambah', [KategoriOrganisasiController::class, 'create'])->name('kategori_organisasi.create');
        Route::post('/kategori_organisasi', [KategoriOrganisasiController::class, 'store'])->name('kategori_organisasi.store');
        Route::get('/kategori_organisasi/{kategori_organisasi}/edit', [KategoriOrganisasiController::class, 'edit'])->name('kategori_organisasi.edit');
        Route::put('/kategori_organisasi/{kategori_organisasi}', [KategoriOrganisasiController::class, 'update'])->name('kategori_organisasi.update');
        Route::delete('/kategori_organisasi/{kategori_organisasi}', [KategoriOrganisasiController::class, 'destroy'])->name('kategori_organisasi.destroy');
    });
});

Route::middleware(['auth'])->group(function () {
    //Auth
    Route::post('/keluar', [AuthPesertaController::class, 'logoutPeserta']);
    //end Auth

});

Route::get('/dashboard', [PesertaDashboardController::class, 'index']);
Route::get('/get-sub-kategori-by-kategori', [AssessmentPertanyaanController::class, 'getSubKategoriByKategori'])->name('get-sub-kategori-by-kategori');
