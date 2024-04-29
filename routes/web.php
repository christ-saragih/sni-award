<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\FaqAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePesertaController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\KotaAdminController;
use App\Http\Controllers\WilayahAdminController;
use App\Http\Controllers\PropinsiAdminController;
use App\Http\Controllers\KecamatanAdminController;
use App\Http\Controllers\RiwayatPesertaController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AssessmentKategoriController;
use App\Http\Controllers\AssessmentPertanyaanController;
use App\Http\Controllers\AssessmentSubKategoriController;
use App\Http\Controllers\KategoriOrganisasiController;
use App\Http\Controllers\LembagaSertifikasiController;
use App\Http\Controllers\PendaftarAdminController;
use App\Http\Controllers\PenjadwalanAdminController;
use App\Http\Controllers\TagBeritaController;
use App\Http\Controllers\Peserta\AuthPesertaController;
use App\Http\Controllers\Peserta\PesertaDashboardController;
use App\Http\Controllers\Peserta\RegistrasiAssessmentController;
use App\Http\Controllers\PesertaKontakController;
use App\Http\Controllers\PesertaProfilController;
use App\Http\Controllers\User\Admin\DataPesertaController;
use App\Http\Controllers\TipeKategoriController;
use App\Http\Controllers\User\Admin\DataInternalController;
use App\Http\Controllers\User\Admin\FrontPageController;
use App\Http\Controllers\User\AuthUserController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserProfilController;
use App\Models\RegistrasiAssessment;
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
Route::get('/informasi/berita', [App\Http\Controllers\Guest\BeritaController::class, 'index'])->name("informasi.berita.index");
Route::get('/informasi/berita/{berita}/detail', [App\Http\Controllers\Guest\BeritaController::class, 'detail'])->name('informasi.berita.detail');
Route::get('/informasi/acara', [App\Http\Controllers\Guest\AcaraController::class, 'index'])->name("informasi.acara.index");
Route::get('/informasi/acara/{acara}/detail', [App\Http\Controllers\Guest\AcaraController::class, 'detail'])->name("informasi.acara.detail");

Route::get('/dokumen', [App\Http\Controllers\Guest\DokumenController::class, 'index']);

Route::get('/faq', [App\Http\Controllers\Guest\FaqController::class, 'index']);

Route::get('/kontak', [App\Http\Controllers\Guest\KontakController::class, 'index']);

Route::get('/linimasa', [App\Http\Controllers\Guest\LinimasaController::class, 'index']);

Route::get('/peserta/riwayat', [RiwayatPesertaController::class, 'index']);
Route::get('/peserta/riwayat/detail', [RiwayatPesertaController::class, 'detail'])->name("riwayat.detail");
// Route::get('/login', [LoginController::class, 'index']);
Route::get('/informasi', [InformationController::class, 'index']);
// Route::get('/admin', [HomeAdminController::class, 'index']);
Route::get('/peserta',[HomePesertaController::class, 'index']);
// Route::get('/peserta/profil',[ProfilPesertaController::class, 'index']);
// Route::get('/peserta/riwayat', [RiwayatPesertaController::class, 'index']);

Route::middleware(['guest:peserta'])->group(function () {

    // Auth
    //peserta
    Route::get('/masuk', [AuthPesertaController::class, 'loginPesertaView'])->name('masuk');
    Route::post('/masuk', [AuthPesertaController::class, 'loginPeserta']);
    Route::get('/registrasi', [AuthPesertaController::class, 'registrasiPesertaView']);
    Route::post('/registrasi', [AuthPesertaController::class, 'registrasiPeserta']);
    Route::get('/forgot-password', [AuthPesertaController::class, 'forgotPasswordView']);
    Route::post('/forgot-password', [AuthPesertaController::class, 'forgotPassword']);
    Route::get('/reset-password/{forgot_password_token}', [AuthPesertaController::class, 'resetPasswordView']);
    Route::put('/reset-password/{forgot_password_token}', [AuthPesertaController::class, 'resetPassword']);
});

Route::middleware(['auth:peserta'])->group(function () {//middleware(['{middleware}:{guard}'])
    Route::get('/verifikasi', [AuthPesertaController::class, 'verifikasiPesertaView']);
    Route::post('/resend/verifikasi/{kode_verifikasi}', [AuthPesertaController::class, 'verifikasiUlangPeserta']);
    Route::get('/keluar', [AuthPesertaController::class, 'logoutPeserta']);
});

Route::get('/verifikasi/{verify_key}', [AuthPesertaController::class, 'verifikasiPeserta']);

Route::prefix('/peserta')->middleware(['auth:peserta', 'verified:peserta'])->group(function(){
    Route::get('/dashboard', [PesertaDashboardController::class, 'index']);
    Route::get('/profil',[PesertaProfilController::class, 'index'])->name('peserta.profil.index');
    Route::post('/profil',[PesertaProfilController::class, 'tambahDokumenPeserta']);
    Route::post('/profil',[PesertaKontakController::class, 'tambahKontakPenghubung']);
    Route::get('/profil/edit/',[PesertaProfilController::class, 'edit'])->name( "peserta.profil.edit" );
    Route::put('/profil/edit/',[PesertaProfilController::class, 'update'])-> name('peserta.profil.update');
    Route::get('/riwayat', [RiwayatPesertaController::class, 'index']);
    Route::get('/pendaftaran', [App\Http\Controllers\Peserta\RegistrasiAssessmentController::class, 'showKategori']);
    Route::get('/pendaftaran/{id}/detail/{registrasi_id}', [App\Http\Controllers\Peserta\RegistrasiAssessmentController::class, 'showPertanyaan'])->name('pendaftaran.detail');
    Route::post('/pendaftaran/daftar', [RegistrasiAssessmentController::class, 'openRegistrasi']);
    Route::get('/pendaftaran/dokumen', [App\Http\Controllers\Peserta\RegistrasiDokumenController::class, 'getDokumenPeserta'])->name('pendaftaran.dokumen');
    // Route::get('/pendaftaran')
    Route::post('/pendaftaran',[App\Http\Controllers\Peserta\RegistrasiDokumenController::class,'store'])->name('peserta.store');
    Route::post('/pendaftaran/jawaban',[App\Http\Controllers\Peserta\RegistrasiAssessmentController::class,'store'])->name('simpanJawaban');
    // Route::get('/pendaftaran', [App\Http\Controllers\Peserta\RegistrasiAssessmentController::class, 'index']);
    // Route::get('/profil', [App\Http\Controllers\Peserta\AuthPesertaController::class, 'ubahkatasandiView'])->name('ubah.kata.sandi');
    Route::put('/profil', [App\Http\Controllers\Peserta\AuthPesertaController::class, 'ubahkatasandi']);

});

//end peserta

//User
Route::prefix('/admin')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/masuk', [AuthUserController::class, 'loginUserView'])->name('masukAdmin');
        Route::post('/masuk', [AuthUserController::class, 'loginUser']);
        Route::get('/registrasi', [AuthUserController::class, 'registrasiUserView']);
        Route::post('/registrasi', [AuthUserController::class, 'registrasiUser']);
        Route::get('/forgot-password', [AuthUserController::class, 'forgotPasswordView']);
        Route::post('/forgot-password', [AuthUserController::class, 'forgotPassword']);
        Route::get('/reset-password/{forgot_password_token}', [AuthUserController::class, 'resetPasswordView']);
        Route::put('/reset-password/{forgot_password_token}', [AuthUserController::class, 'resetPassword']);
    });

    Route::middleware(['auth:web'])->group(function () {
        Route::get('/keluar', [AuthUserController::class, 'logoutUser']);
        Route::get('/verifikasi', [AuthUserController::class, 'verifikasiUserView'])->name('verification.notice');
        Route::post('/resend/verifikasi/{kode_verifikasi}', [AuthUserController::class, 'verifikasiUlangUser']);
    });

    Route::get('/verifikasi/{verify_key}', [AuthUserController::class, 'verifikasiUser']);

    Route::middleware(['auth', 'verified'])->group(function() {
        Route::get('/dashboard', [UserDashboardController::class, 'index']);
        Route::get('/profil', [UserProfilController::class, 'index']);
        Route::get('/profil/edit', [UserProfilController::class, 'editView']);
        Route::put('/profil/edit', [UserProfilController::class, 'edit']);

        //CRUD Frontpage
        Route::get('/frontpage', [FrontPageController::class, 'index']);
        Route::get('/frontpage/edit', [FrontPageController::class, 'updateFrontpageView']);
        Route::put('/frontpage/edit', [FrontPageController::class, 'updateFrontpage']);
        Route::put('/frontpage/faq_populer/hapus/{id}', [FrontPageController::class, 'removePopularFaq']);
        Route::put('/frontpage/faq_populer/tambah/{id}', [FrontPageController::class, 'addPopularFaq']);
        Route::delete('/frontpage/dokumentasi/hapus/{id}', [FrontPageController::class, 'hapusDokumentasi']);
        Route::post('/frontpage/dokumentasi/tambah', [FrontPageController::class, 'tambahDokumentasi']);
        //end  CRUD Frontpage

        // FAQ
        Route::get('/faq', [FaqAdminController::class, 'index'])->name('faq.index');
        Route::post('/faq', [FaqAdminController::class, 'store'])->name('faq.store');
        Route::put('/faq/{id}',[FaqAdminController::class,'update']);
        Route::delete('/faq/{id}',[FaqAdminController::class,'destroy']);

        //Penjadwalan
        Route::get('/penjadwalan', [PenjadwalanAdminController::class, 'index'])->name('penjadwalan.index');

        //CRUD Peserta & Internal
        Route::get('/peserta', [DataPesertaController::class, 'index']);
        Route::get('/peserta/{id}', [DataPesertaController::class, 'detail']);
        Route::put('/peserta/{id}/verifikasi', [DataPesertaController::class, 'verifikasiPeserta']);
        // Route::get('/peserta/edit/{id}', [DataPesertaController::class, 'editView']);
        Route::get('/internal', [DataInternalController::class, 'index']);
        Route::get('/internal/{id}', [DataInternalController::class, 'detail']);
        // Route::get('/internal/edit/{id}', [DataInternalController::class, 'editView']);
        Route::put('/internal/edit/{id}', [DataInternalController::class, 'edit']);
        //end Peserta & Internal

        // Tag Berita
        Route::get('/tag_berita', [TagBeritaController::class, 'index'])->name('tag_berita.index');
        Route::get('/tag_berita/tambah', [TagBeritaController::class, 'create'])->name('tag_berita.create');
        Route::post('/tag_berita', [TagBeritaController::class, 'store'])->name('tag_berita.store');
        Route::get('/tag_berita/{tag_berita}/edit', [TagBeritaController::class, 'edit'])->name('tag_berita.edit');
        Route::put('/tag_berita/{tag_berita}', [TagBeritaController::class, 'update'])->name('tag_berita.update');
        Route::delete('/tag_berita/{tag_berita}', [TagBeritaController::class, 'destroy'])->name('tag_berita.destroy');

        //berita
        Route::get('/get_tag_berita', [BeritaController::class, 'getTagBerita'])->name('getTagBerita');
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
        // Route::get('/kategori_berita',[KategoriBeritaController::class,'index'])->name('kategori_berita.index');
        // Route::get('/kategori_berita/tambah',[KategoriBeritaController::class,'create'])->name('kategori_berita.create');
        // Route::post('/kategori_berita',[KategoriBeritaController::class,'store'])->name('kategori_berita.store');
        // Route::get('/kategori_berita/{kategori_berita}/edit',[KategoriBeritaController::class,'edit'])->name('kategori_berita.edit');
        // Route::put('/kategori_berita/{kategori_berita}',[KategoriBeritaController::class,'update'])->name('kategori_berita.update');
        // Route::delete('/kategori_berita/{kategori_berita}',[KategoriBeritaController::class,'destroy'])->name('kategori_berita.destroy');

        //dokumen
        Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
        Route::get('/dokumen/tambah', [DokumenController::class, 'create'])->name('dokumen.create');
        Route::post('/dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
        Route::get('/dokumen/{dokumen}/edit', [DokumenController::class, 'edit'])->name('dokumen.edit');
        Route::put('/dokumen/{dokumen}', [DokumenController::class, 'update'])->name('dokumen.update');
        Route::delete('/dokumen/{dokumen}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');

        //Konfigurasi
        Route::get('/konfigurasi',[KonfigurasiController::class, 'index'])->name('konfigurasi.index');
        Route::get('/konfigurasi/tambah', [KonfigurasiController::class, 'create'])->name('konfigurasi.create');
        Route::post('/konfigurasi', [KonfigurasiController::class, 'store'])->name('konfigurasi.store');
        Route::get('/konfigurasi/{konfigurasi}/ubah', [KonfigurasiController::class, 'edit'])->name('konfigurasi.edit');
        Route::put('/konfigurasi/{konfigurasi}', [KonfigurasiController::class, 'update'])->name('konfigurasi.update');
        Route::delete('/konfigurasi/{konfigurasi}', [KonfigurasiController::class, 'destroy'])->name('konfigurasi.destroy');

        // assessment
        Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
        // assessment kategori
        Route::get('/get_assessment_kategori', [App\Http\Controllers\AssessmentKategoriController::class,'getAssessmentKategori'])->name('getAssessmentKategori');
        Route::get('/assessment_kategori/tambah', [App\Http\Controllers\AssessmentKategoriController::class,'create']);
        Route::post('/assessment_kategori',[App\Http\Controllers\AssessmentKategoriController::class,'store']);
        Route::get('/assessment_kategori/{id}/ubah',[App\Http\Controllers\AssessmentKategoriController::class,'edit']);
        Route::put('/assessment_kategori/{id}',[App\Http\Controllers\AssessmentKategoriController::class,'update']);
        Route::delete('/assessment_kategori/{id}',[App\Http\Controllers\AssessmentKategoriController::class,'destroy']);

        // assessment sub kategori
        Route::get('/get_assessment_sub_kategori/{id}', [AssessmentSubKategoriController::class,'getAssessmentSubKategori']);
        Route::get('/assessment_sub_kategori', [App\Http\Controllers\AssessmentSubKategoriController::class,'index']);
        Route::get('/assessment_sub_kategori/tambah', [App\Http\Controllers\AssessmentSubKategoriController::class,'create']);
        Route::post('/assessment_sub_kategori',[App\Http\Controllers\AssessmentSubKategoriController::class,'store']);
        Route::get('/assessment_sub_kategori/{assessment_sub_kategori}/ubah',[App\Http\Controllers\AssessmentSubKategoriController::class,'edit']);
        Route::put('/assessment_sub_kategori/{id}',[App\Http\Controllers\AssessmentSubKategoriController::class,'update']);
        Route::delete('/assessment_sub_kategori/{id}',[App\Http\Controllers\AssessmentSubKategoriController::class,'destroy']);

        //Assessment Pertanyaan
        Route::get('/assessment_pertanyaan', [AssessmentPertanyaanController::class, 'index'])->name('assessment_pertanyaan.index');
        Route::get('/assessment_pertanyaan/tambah', [AssessmentPertanyaanController::class, 'create'])->name('assessment_pertanyaan.create');
        Route::post('/assessment_pertanyaan', [AssessmentPertanyaanController::class, 'store'])->name('assessment_pertanyaan.store');
        Route::get('/assessment_pertanyaan/{assessment_pertanyaan}/edit', [AssessmentPertanyaanController::class, 'edit'])->name('assessment_pertanyaan.edit');
        Route::put('/assessment_pertanyaan/{assessment_pertanyaan}', [AssessmentPertanyaanController::class, 'update'])->name('assessment_pertanyaan.update');
        Route::delete('/assessment_pertanyaan/{assessment_pertanyaan}', [AssessmentPertanyaanController::class, 'destroy'])->name('assessment_pertanyaan.destroy');

        // status kepemilikan
        Route::get('/status_kepemilikan', [App\Http\Controllers\StatusKepemilikanController::class,'index']);
        Route::get('/status_kepemilikan/tambah', [App\Http\Controllers\StatusKepemilikanController::class,'create']);
        Route::post('/status_kepemilikan',[App\Http\Controllers\StatusKepemilikanController::class,'store']);
        Route::get('/status_kepemilikan/{id}/ubah',[App\Http\Controllers\StatusKepemilikanController::class,'edit']);
        Route::put('/status_kepemilikan/{id}',[App\Http\Controllers\StatusKepemilikanController::class,'update']);
        Route::delete('/status_kepemilikan/{id}',[App\Http\Controllers\StatusKepemilikanController::class,'destroy']);

        // wilayah
        Route::get('/wilayah', [WilayahAdminController::class, 'index']);
        // provinsi
        Route::get('/propinsi', [PropinsiAdminController::class, 'index'])->name('propinsi.index');
        Route::post('/wilayah/provinsi', [PropinsiAdminController::class, 'store'])->name('provinsi.store');
        Route::put('/wilayah/provinsi/{id}', [PropinsiAdminController::class, 'update']);
        Route::delete('/wilayah/provinsi/{id}', [PropinsiAdminController::class, 'destroy']);

        // kota
        Route::get('/wilayah/get_kota/{id}', [KotaAdminController::class,'getKota']);
        Route::post('/wilayah/kabupaten', [KotaAdminController::class, 'store'])->name('kabupaten.store');
        Route::put('/wilayah/kabupaten/{id}', [KotaAdminController::class, 'update']);
        Route::get('/wilayah/kabupaten/{kota}/ubah', [KotaAdminController::class, 'edit']);
        Route::delete('/wilayah/kabupaten/{id}', [KotaAdminController::class, 'destroy']);

        // kecamatan
        Route::post('/wilayah/kecamatan', [KecamatanAdminController::class, 'store'])->name('kecamatan.store');
        Route::put('/wilayah/kecamatan/{id}', [KecamatanAdminController::class, 'update']);
        Route::get('/wilayah/kecamatan/{kecamatan}/ubah', [KecamatanAdminController::class, 'edit']);
        Route::delete('/wilayah/kecamatan/{id}', [KecamatanAdminController::class, 'destroy']);

        //Tipe Kategori
        Route::get('/tipe_kategori', [TipeKategoriController::class, 'index'])->name('tipe_kategori.index');
        Route::get('/tipe_kategori/tambah', [TipeKategoriController::class, 'create'])->name('tipe_kategori.create');
        Route::post('/tipe_kategori', [TipeKategoriController::class, 'store'])->name('tipe_kategori.store');
        Route::get('/tipe_kategori/{tipe_kategori}/edit', [TipeKategoriController::class, 'edit'])->name('tipe_kategori.edit');
        Route::put('/tipe_kategori/{tipe_kategori}', [TipeKategoriController::class, 'update'])->name('tipe_kategori.update');
        Route::delete('/tipe_kategori/{tipe_kategori}', [TipeKategoriController::class, 'destroy'])->name('tipe_kategori.destroy');

        //Kategori Organisasi
        Route::get('/kategori_organisasi', [KategoriOrganisasiController::class, 'index'])->name('kategori_organisasi.index');
        Route::get('/kategori_organisasi/tambah', [KategoriOrganisasiController::class, 'create'])->name('kategori_organisasi.create');
        Route::post('/kategori_organisasi', [KategoriOrganisasiController::class, 'store'])->name('kategori_organisasi.store');
        Route::get('/kategori_organisasi/{kategori_organisasi}/edit', [KategoriOrganisasiController::class, 'edit'])->name('kategori_organisasi.edit');
        Route::put('/kategori_organisasi/{kategori_organisasi}', [KategoriOrganisasiController::class, 'update'])->name('kategori_organisasi.update');
        Route::delete('/kategori_organisasi/{kategori_organisasi}', [KategoriOrganisasiController::class, 'destroy'])->name('kategori_organisasi.destroy');

        //LembagaSertifikasi
        Route::get('/lembaga_sertifikasi',[LembagaSertifikasiController::class, 'index'])->name('lembaga_sertifikasi.index');
        Route::get('/lembaga_sertifikasi/tambah', [LembagaSertifikasiController::class, 'create'])->name('lembaga_sertifikasi.create');
        Route::post('/lembaga_sertifikasi', [LembagaSertifikasiController::class, 'store'])->name('lembaga_sertifikasi.store');
        Route::get('/lembaga_sertifikasi/{lembaga_sertifikasi}/ubah', [LembagaSertifikasiController::class, 'edit'])->name('lembaga_sertifikasi.edit');
        Route::put('/lembaga_sertifikasi/{lembaga_sertifikasi}', [LembagaSertifikasiController::class, 'update'])->name('lembaga_sertifikasi.update');
        Route::delete('/lembaga_sertifikasi/{lembaga_sertifikasi}', [LembagaSertifikasiController::class, 'destroy'])->name('lembaga_sertifikasi.destroy');

        // Pendaftar SNI Award
        Route::get('/pendaftar_sni_award', [PendaftarAdminController::class, 'index'])->name('pendaftar_sni_award.index');
        Route::get('/pendaftar_sni_award/{tahun}', [PendaftarAdminController::class, 'getTahun'])->name('pendaftar_sni_award.get_tahun');
        Route::get('/pendaftar_sni_award/{id}/detail', [PendaftarAdminController::class, 'show'])->name('pendaftar_sni_award.detail');
        Route::get('/pendaftar_sni_award/{id}/detail/{kategori}', [PendaftarAdminController::class, 'getKategori'])->name('pendaftar_sni_award.get_kategori');
        Route::get('/pendaftar_sni_award/{registrasi}/ubah', [PendaftarAdminController::class, 'edit'])->name('pendaftar_sni_award.edit');
        Route::put('/pendaftar_sni_award/{id}', [PendaftarAdminController::class, 'update'])->name('pendaftar_sni_award.update');
        Route::get('/get_data_dokumen/{id}', [PendaftarAdminController::class, 'getDokumenPeserta'])->name('pendaftar_sni_award.get_dokumen_peserta');
    });
});
// end User
Route::get('/get-sub-kategori-by-kategori', [AssessmentPertanyaanController::class, 'getSubKategoriByKategori'])->name('get-sub-kategori-by-kategori');
