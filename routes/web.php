<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\Peserta\AuthPesertaController;
use App\Http\Controllers\Peserta\PesertaDashboardController;
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
Route::get('/informasi', [InformationController::class, 'index']);

//Peserta
Route::middleware(['guest:peserta'])->group(function () {
    Route::get('/masuk', [AuthPesertaController::class, 'loginPesertaView'])->name('masuk');
    Route::post('/masuk', [AuthPesertaController::class, 'loginPeserta']);
    Route::get('/registrasi', [AuthPesertaController::class, 'registrasiPesertaView']);
    Route::post('/registrasi', [AuthPesertaController::class, 'registrasiPeserta']);
});
Route::middleware(['auth:peserta'])->group(function () {//middleware(['{middleware}:{guard}'])
    Route::get('/verifikasi', [AuthPesertaController::class, 'verifikasiPesertaView']);
    Route::get('/verifikasi/{verify_key}', [AuthPesertaController::class, 'verifikasiPeserta']);
    Route::post('/resend/verifikasi/{kode_verifikasi}', [AuthPesertaController::class, 'verifikasiUlangPeserta']);
    Route::get('/keluar', [AuthPesertaController::class, 'logoutPeserta']);
});
Route::middleware(['auth:peserta', 'verified:peserta'])->group(function(){
    Route::get('/dashboard', [PesertaDashboardController::class, 'index']);
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
    Route::middleware(['auth'])->group(function () {
        Route::get('/keluar', [AuthUserController::class, 'logoutUser']);
        Route::get('/verifikasi', [AuthUserController::class, 'verifikasiUserView']);
        Route::get('/verifikasi/{verify_key}', [AuthUserController::class, 'verifikasiUser']);
        Route::post('/resend/verifikasi/{kode_verifikasi}', [AuthUserController::class, 'verifikasiUlangUser']);
    });
    Route::middleware(['auth', 'verified'])->group(function() {
        Route::get('/dashboard', [UserDashboardController::class, 'index']);
    });
});
// end User




//berita
Route::get('/berita',[BeritaController::class,'index']);
Route::post('/berita',[BeritaController::class,'store']);
Route::get('/berita/tambah',[BeritaController::class,'create']);
Route::get('/berita/{id}/edit',[BeritaController::class,'edit']);
Route::put('/berita/{id}/edit',[BeritaController::class,'update']);
Route::delete('/berita/{id}/edit',[BeritaController::class,'destroy']);
//kategori berita
Route::get('/kategori_berita',[KategoriBeritaController::class,'index']);
Route::post('/kategori_berita',[KategoriBeritaController::class,'store']);
Route::get('/kategori_berita/tambah',[KategoriBeritaController::class,'create']);