<?php

use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\Admin\DashboardController;

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
use App\Http\Controllers\Peserta\AuthPesertaController;
use App\Http\Controllers\Peserta\PesertaDashboardController;
use App\Http\Controllers\User\Admin\FrontPageController;
use App\Http\Controllers\User\AuthUserController;
use App\Http\Controllers\User\UserDashboardController;
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
Route::get('/', [HomeController::class, 'index']);
// Route::get('/login', [LoginController::class, 'index']);
Route::get('/informasi', [InformationController::class, 'index']);
// Route::get('/admin', [HomeAdminController::class, 'index']);
// Route::get('/peserta',[HomePesertaController::class, 'index']);
// Route::get('/peserta/profil',[ProfilPesertaController::class, 'index']);
// Route::get('/peserta/riwayat', [RiwayatPesertaController::class, 'index']);

Route::middleware(['guest:peserta'])->group(function () {

    // Auth
    //peserta
    Route::get('/masuk', [AuthPesertaController::class, 'loginPesertaView'])->name('masuk');
    Route::post('/masuk', [AuthPesertaController::class, 'loginPeserta']);
    Route::get('/registrasi', [AuthPesertaController::class, 'registrasiPesertaView']);
    Route::post('/registrasi', [AuthPesertaController::class, 'registrasiPeserta']);
});
Route::middleware(['auth:peserta'])->group(function () {//middleware(['{middleware}:{guard}'])
Route::get('/verifikasi', [AuthPesertaController::class, 'verifikasiPesertaView']);
Route::post('/resend/verifikasi/{kode_verifikasi}', [AuthPesertaController::class, 'verifikasiUlangPeserta']);
Route::get('/keluar', [AuthPesertaController::class, 'logoutPeserta']);
});
Route::get('/verifikasi/{verify_key}', [AuthPesertaController::class, 'verifikasiPeserta']);
Route::middleware(['auth:peserta', 'verified:peserta'])->group(function(){
    Route::get('/dashboard', [PesertaDashboardController::class, 'index']);
    Route::get('/profil',[ProfilPesertaController::class, 'index']);
    Route::get('/riwayat', [RiwayatPesertaController::class, 'index']);
});
//end peserta

//User
Route::prefix('/admin')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/masuk', [AuthUserController::class, 'loginUserView'])->name('masukAdmin');
        Route::post('/masuk', [AuthUserController::class, 'loginUser']);
        Route::get('/registrasi', [AuthUserController::class, 'registrasiUserView']);
        Route::post('/registrasi', [AuthUserController::class, 'registrasiUser']);
    });
    Route::middleware(['auth:web'])->group(function () {
        Route::get('/keluar', [AuthUserController::class, 'logoutUser']);
        Route::get('/verifikasi', [AuthUserController::class, 'verifikasiUserView'])->name('verification.notice');
        Route::post('/resend/verifikasi/{kode_verifikasi}', [AuthUserController::class, 'verifikasiUlangUser']);
    });
    Route::get('/verifikasi/{verify_key}', [AuthUserController::class, 'verifikasiUser']);
    Route::middleware(['auth', 'verified'])->group(function() {
        Route::get('/dashboard', [UserDashboardController::class, 'index']);
        
        //CRUD Frontpage
        Route::get('/frontpage', [FrontPageController::class, 'index']);
        Route::get('/frontpage/edit', [FrontPageController::class, 'updateFrontpageView']);
        Route::put('/frontpage/edit', [FrontPageController::class, 'updateFrontpage']);
        Route::put('/frontpage/faq_populer/hapus/{id}', [FrontPageController::class, 'removePopularFaq']);
        Route::put('/frontpage/faq_populer/tambah/{id}', [FrontPageController::class, 'addPopularFaq']);
        Route::delete('/frontpage/dokumentasi/hapus/{id}', [FrontPageController::class, 'hapusDokumentasi']);
        Route::post('/frontpage/dokumentasi/tambah', [FrontPageController::class, 'tambahDokumentasi']);
        //end  CRUD Frontpage
      
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
});
// end User
