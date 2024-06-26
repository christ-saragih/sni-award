<?php

use App\Http\Controllers\User\Evaluator\Sekretariat\EvaluatorTimController;
use App\Http\Controllers\User\Sekretariat\peserta\SekretariatPesertaController;
use App\Http\Controllers\WilayahAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/admin')->group(function () {
    // dropdown kabupaten/kota
    Route::get("/wilayah/provinsi/{id_provinsi}/kota-kab", [WilayahAdminController::class, "get_kabupaten"]);
    }
);

// Route::middleware(['auth', 'verified', 'email.verified'])->group(function () {
    Route::get('/{user_id}/get-member/{tanggal}', [EvaluatorTimController::class, 'getEvaluatorAndLead']);
// });
