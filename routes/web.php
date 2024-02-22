<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeControllerPeserta;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [HomeController::class, 'index']);
// Route::get('/login', [LoginController::class, 'index']);
Route::get('/informasi', [InformationController::class, 'index']);
Route::get('/peserta', [HomeControllerPeserta::class, 'index']);

// 
Auth::routes(['verify'=>true]);
//

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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