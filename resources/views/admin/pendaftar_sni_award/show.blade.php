{{-- @extends('admin.layouts.master')

@section('content')

<!-- Pop Up Ubah Dokumen -->
<div class="modal fade" id="ubahPendaftarAdmin" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_pendaftar_sni_award" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Sekretariat</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <div class="d-flex flex-column gap-2 pb-0 mb-0">
                    <div class="d-flex flex-column gap-2">
                        <h6 class="ms-1 mb-0">Nama</h6>
                        <select class="form-select form-control-lg ps-4" name="sekretariat_id" aria-label="Default select example">
                            @foreach ($user as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer gap-2" style="border: none;">
                <div class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</div>
                <button type="submit" class="btn" data-bs-toggle="modal">Ubah</button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="card col-12 p-4">
        <div class="mb-4">
            <h3 class="fw-bold">Detail Peserta</h3>
            <h6 class="fw-bold mt-3">Data Peserta</h6>
            <br><hr style="color: orange; height: 0.5px;"><br>
            <div class="px-3 pt-0 pb-2">
                <div class="row g-3 align-items-center">
                    <div class="col-3">
                        <label class="fw-bold">Nama Peserta</label>
                    </div>
                    <div class="col-9">
                        {{ $peserta->nama }}
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-3">
                        <label class="fw-bold">Nama Sekretariat</label>
                    </div>
                    <div class="col-9">
                        {{ $peserta->email }}
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-3">
                        <label class="fw-bold">Stage</label>
                    </div>
                    <div class="col-9">
                        {{ $peserta->status }}
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-3">
                        <label class="fw-bold">Kategori Organisasi</label>
                    </div>
                    <div class="col-9">
                        {{ $peserta->kategori_organisasi->nama }}
                    </div>
                </div>
            </div>
            <h6 class="fw-bold mt-3">Data Registrasi</h6>
            <br><hr style="color: orange; height: 0.5px;"><br>
            <div class="px-3 pt-0 pb-2">
                <div class="row g-3 align-items-center">
                    <div class="col-3">
                        <label class="fw-bold">Nama Peserta</label>
                    </div>
                    <div class="col-9">
                        {{ $registrasi->peserta->nama }}
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-3">
                        <label class="fw-bold">Nama Sekretariat</label>
                    </div>
                    <div class="col-9">
                        {{ $registrasi->user->name }}
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-3">
                        <label class="fw-bold">Status</label>
                    </div>
                    <div class="col-3">
                        {{ $registrasi->status->nama }}
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-3">
                        <label class="fw-bold">Stage</label>
                    </div>
                    <div class="col-9">
                        {{ $registrasi->stage->nama }}
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-3">
                        <label class="fw-bold">Kategori Organisasi</label>
                    </div>
                    <div class="col-9">
                        {{ $registrasi->peserta->kategori_organisasi->nama }}
                    </div>
                </div>
                <button onclick="openModalUbahPendaftarAdmin('{{ $registrasi->id }}')" class="btn" data-bs-toggle="modal" role="button" style="width: 100px; padding: 5px 10px; background-color: #552525; color: #fff; ">Ubah</button>
            </div>
            <h6 class="fw-bold mt-3">Data Registrasi Assessment</h6>
            <br><hr style="color: orange; height: 0.5px;"><br>
            <div class="px-3 pt-0 pb-2">
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-2">
                        <label class="fw-bold">No</label>
                    </div>
                    <div class="col-5">
                        <label class="fw-bold">Pertanyaan</label>
                    </div>
                    <div class="col-5">
                        <label class="fw-bold">Jawaban</label>
                    </div>
                </div>
                @foreach ($registrasi_assessment as $assessment)
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-2">
                        {{ $loop->iteration }}
                    </div>
                    <div class="col-5">
                        {{ $assessment->assessment_jawaban->assessment_pertanyaan->pertanyaan }}
                    </div>
                    <div class="col-5">
                        {{ $assessment->assessment_jawaban->jawaban }}
                    </div>
                </div>
                @endforeach
            </div>
            <h6 class="fw-bold mt-3">Data Registrasi Dokumen</h6>
            <br><hr style="color: orange; height: 0.5px;"><br>
            <div class="px-3 pt-0 pb-2">
                @foreach ($registrasi_dokumen as $dokumen)
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-3">
                        <label class="fw-bold">Nama Dokumen</label>
                    </div>
                    <div class="col-9">
                        <label class="fw-bold">Url Dokumen</label>
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-3">
                        {{ $dokumen->dokumen->nama }}
                    </div>
                    <div class="col-9">
                        {{ $dokumen->url_dokumen }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Detail Pendaftar</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pendaftar_sni_award.index') }}"> Back</a>
        </div>
    </div>
</div> -->

@endsection() --}}

@extends('admin.layouts.master')

@section('content')

<!-- Pop Up Ubah Dokumen -->
<div class="modal fade" id="ubahPendaftarAdmin" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_pendaftar_sni_award" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Sekretariat</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <div class="d-flex flex-column gap-2 pb-0 mb-0">
                    <div class="d-flex flex-column gap-2">
                        <h6 class="ms-1 mb-0">Nama</h6>
                        <select class="form-select form-control-lg ps-4" name="sekretariat_id" aria-label="Default select example">
                            @foreach ($user as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer gap-2" style="border: none;">
                <div class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</div>
                <button type="submit" class="btn" data-bs-toggle="modal">Ubah</button>
            </div>
        </form>
    </div>
</div>

<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="registrasi-tab" data-bs-toggle="tab" href="#registrasi-tabpanel" role="tab" aria-controls="registrasi-tabpanel" aria-selected="true" style="width: 100%;">Registrasi</a>
        {{-- <a class="nav-link {{ (request()->query('tab') == '')?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" href="{{ route('pendaftar_sni_award.detail', $registrasi->id) }}" role="tab" >Registrasi</a> --}}
    </li>
    <li class="nav-item" role="presentation">
        {{-- <a class="nav-link {{ (request()->query('tab') == '')?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" href="{{ route('pendaftar_sni_award.detail', $registrasi->id) }}" role="tab" >Profil</a> --}}
        <a class="nav-link" id="profil-tab" data-bs-toggle="tab" href="#profil-tabpanel" role="tab" aria-controls="profil-tabpanel" aria-selected="false" tabindex="-1" style="width: 100%;">Profil</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="dokumen-tab" data-bs-toggle="tab" href="#dokumen-tabpanel" role="tab" aria-controls="dokumen-tabpanel" aria-selected="false" tabindex="-1" style="width: 100%;">Dokumen</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="assessment-tab" data-bs-toggle="tab" href="#assessment-tabpanel" role="tab" aria-controls="assessment-tabpanel" aria-selected="false" tabindex="-1" style="width: 100%;">Assessment</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="penilaian-tab" data-bs-toggle="tab" href="#penilaian-tabpanel" role="tab" aria-controls="penilaian-tabpanel" aria-selected="false" tabindex="-1" style="width: 100%;">Penilaian</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tim-penilaian-tab" data-bs-toggle="tab" href="#tim-penilaian-tabpanel" role="tab" aria-controls="tim-penilaian-tabpanel" aria-selected="false" tabindex="-1" style="width: 100%;">Tim Penilaian</a>
    </li>
</ul>

<hr class="p-0">

<div class="tab-content" id="tab-content">
    <!-- Konten Registrasi Section -->
    <div class="tab-pane active" id="registrasi-tabpanel" role="tabpanel" aria-labelledby="registrasi-tab">
        <div class="content-profil py-5">
            <div class="d-flex align-items-center gap-2">
                <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Registrasi</h3>
                <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
            </div>
            <div class="container mt-4">
                <div class="px-3 pt-0 pb-2">
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                            <label class="fw-bold">Nama Peserta</label>
                        </div>
                        <div class="col-9">
                            {{ $registrasi->peserta->nama }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-3">
                            <label class="fw-bold">Nama Sekretariat</label>
                        </div>
                        <div class="col-auto">
                            {{ $registrasi->user->name }}
                        </div>
                        <div class="col-3">
                            <button onclick="openModalUbahPendaftarAdmin('{{ $registrasi->id }}')" class="btn" data-bs-toggle="modal" role="button" style="background-color: #E1A600; border: none;"><i class="fa fa-edit"></i></button>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-3">
                            <label class="fw-bold">Status</label>
                        </div>
                        <div class="col-3">
                            {{ $registrasi->status->nama }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-3">
                            <label class="fw-bold">Stage</label>
                        </div>
                        <div class="col-9">
                            {{ $registrasi->stage->nama }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-3">
                            <label class="fw-bold">Kategori Organisasi</label>
                        </div>
                        <div class="col-9">
                            {{ $registrasi->peserta->kategori_organisasi->nama }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten Profil Section -->
    <div class="tab-pane" id="profil-tabpanel" role="tabpanel" aria-labelledby="profil-tab">
        <div class="content-profil py-5">
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('assets') }}/peserta/images/foto-profil.png" class="profil mx-auto" alt="" style="max-width: 100px; height: auto;">
                <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Profil</h3>
                <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
            </div>
            <div class="container mt-4">
                <div class="px-3 pt-0 pb-2">
                    <div class="row g-3 align-items-center">
                        <div class="col-4">
                            <label class="fw-bold" style="">Nama Organisasi</label>
                        </div>
                        <div class="col-8">
                            {{ $peserta->peserta_profil->peserta->nama }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-4">
                            <label class="fw-bold">Jabatan Tertinggi</label>
                        </div>
                        <div class="col-8">
                            {{ $peserta->peserta_profil->jabatan_tertinggi }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-4">
                            <label class="fw-bold">Website</label>
                        </div>
                        <div class="col-8">
                            {{ $peserta->peserta_profil->website }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-4">
                            <label class="fw-bold">Tanggal Beroperasi</label>
                        </div>
                        <div class="col-8">
                            {{ $peserta->peserta_profil->tanggal_beroperasi }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-4">
                            <label class="fw-bold">Status Kepemilikan</label>
                        </div>
                        <div class="col-8">
                            {{ $peserta->peserta_profil->status_kepemilikan->nama }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-4">
                            <label class="fw-bold">Jenis Produk</label>
                        </div>
                        <div class="col-8">
                            {{ $peserta->peserta_profil->jenis_produk }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-4">
                            <label class="fw-bold">Lembaga Sertifikasi</label>
                        </div>
                        <div class="col-8">
                            {{ $peserta->peserta_profil->lembaga_sertifikasi->nama }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-4">
                            <label class="fw-bold">Negara Tujuan Ekspor</label>
                        </div>
                        <div class="col-8">
                            {{ $peserta->peserta_profil->negara_tujuan_ekspor }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-4">
                            <label class="fw-bold">Sektor Kategori Organisasi</label>
                        </div>
                        <div class="col-8">
                            {{ $peserta->peserta_profil->kategori_organisasi->nama }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-4">
                            <label class="fw-bold">Kekayaan Bersih</label>
                        </div>
                        <div class="col-8">
                            {{ $peserta->peserta_profil->kekayaan_bersih }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-4">
                            <label class="fw-bold">Hasil Penjualan Tahunan</label>
                        </div>
                        <div class="col-8">
                            {{ $peserta->peserta_profil->hasil_penjualan_tahunan }}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-4">
                            <label class="fw-bold">Jenis Organisasi</label>
                        </div>
                        <div class="col-8">
                            {{ $peserta->peserta_profil->jenis_organisasi }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten Dokumen Section -->
    <div class="tab-pane" id="dokumen-tabpanel" role="tabpanel" aria-labelledby="dokumen-tab">
        <div class="content-profil py-5">
            <div class="d-flex align-items-center gap-2">
                <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Dokumen Assessment</h3>
                <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
            </div>
            <div class="container mt-4">
                <div class="px-3 pt-0 pb-2">
                    <div class="row g-3 align-items-center">
                        <div class="col-8">
                            <label class="fw-bold">Nama Organisasi</label>
                        </div>
                        <div class="col-4">
                            <label class="fw-bold">Aksi</label>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-8">
                            <label class="fw-bold">Upload Kuisoner</label>
                        </div>
                        <div class="col-4">
                            {{-- {{ $peserta->peserta_profil->jabatan_tertinggi }} --}}
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-8">
                            <label class="fw-bold">Lembar Pernyataan Tidak Terlibat Kasus Hokum </label>
                        </div>
                        <div class="col-4">
                            {{-- {{ $peserta->peserta_profil->jabatan_tertinggi }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten Assessment Section -->
    <div class="tab-pane" id="assessment-tabpanel" role="tabpanel" aria-labelledby="assessment-tab">
        <div class="content-profil py-5">
            <div class="d-flex align-items-center gap-2">
                <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Assessment</h3>
                <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
            </div>
            <div class="container mt-4 d-flex flex-column gap-4">
                <div class="d-flex align-items-center">
                    <div class="progress flex-grow-1" style="height: 9px;">
                        <div class="progress-bar pertanyaan" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background-color: #E59B30;"></div>
                    </div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kepeminpinan
                        </button>
                        <ul class="dropdown-menu">
                            {{-- @foreach ($data_assessment_kategori as $kategori)
                                <li><a class="dropdown-item" href="{{ route('pendaftar_sni_award.get_kategori', $kategori->assessment_kategori_id) }}">{{ $kategori }}</a></li>
                            @endforeach --}}
                        </ul>
                    </div>
                    {{-- <div class="text-center kategori_pertanyaan_single ms-auto">Kepemimpinan</div> --}}
                </div>
                <!-- fieldset pertanyaan -->
                @foreach ($assessment_sub_kategori as $ask)
                <fieldset class="fieldset" id="fieldsetPertanyaan">
                    @foreach ($ask->assessment_pertanyaan as $ap)
                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-4">
                        <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                            <h3 class="m-0">Pertanyaan {{ $loop->iteration }}</h3>
                            <p class="m-0">{{ $ask->nama }}</p>
                        </div>
                        <div class="pertanyaan d-flex flex-column text-center">
                            <p class="m-0">{{ $ap->pertanyaan }}</p>
                        </div>
                        <div class="jawaban d-flex justify-content-between align-items-center w-100 mt-4 gap-3">
                            <div class="d-flex flex-column gap-3">
                                @foreach ($ap->assessment_jawaban as $aj)
                                    <label class="d-flex align-items-center py-1 px-3 @if($registrasi_assessment->contains('assessment_jawaban_id', $aj->id)) active @endif">{{ $aj->jawaban }}</label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <input type="button" name="selanjutnyaAssesment" class="btn selanjutnyaAssesment action-button float-end mt-5" value="Selanjutnya"/> --}}
                </fieldset>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Konten Penilaian Section -->
    <div class="tab-pane" id="penilaian-tabpanel" role="tabpanel" aria-labelledby="penilaian-tab">
        <div class="content-profil py-5">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Desk Evaluation</h3>
            <div class="container mt-4">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <form id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar" class="d-flex justify-content-between">
                                <li class="active" id="account">
                                    <strong>Evaluator</strong>
                                </li>
                                <li id="personal"><strong>Lead Evaluator</strong></li>
                                <li id="payment"><strong>Sekretariat</strong></li>
                                </ul>
                                <div class="progress">
                                <div
                                    class="progress-bar penilaian progress-bar-striped progress-bar-animated"
                                    role="progressbar"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                ></div>
                                </div>
                                <br />

                                <!-- fieldsets -->
                                <fieldset class="fieldset" id="fieldsetPenilaian">
                                    <div class="card-body pt-0 mt-0">
                                        <div class="row align-items-center pt-4 pb-3">
                                            <div class="col-md-4 ps-5">
                                                <h6 class="mb-0">Nama Evaluator</h6>
                                            </div>
                                            <div class="col-md-8 pe-5">
                                                <p class="form-control form-control-lg m-0">Bennefit</p>
                                            </div>
                                        </div>

                                        <div class="row align-items-center pb-3">
                                            <div class="col-md-4 ps-5">
                                                <h6 class="mb-0">Nilai</h6>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="d-flex align-items-center gap-3">
                                                    <p class="form-control form-control-lg m-0">192</p>
                                                    {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row pb-3">
                                            <div class="col-md-4 ps-5">
                                                <h6 class="mb-0 mt-2">Komentar</h6>
                                            </div>
                                            <div class="col-md-8 pe-5">
                                                <p class="form-control form-control-lg m-0" style="max-height: 120px; overflow-y: auto;">Bagus, tapi ada beberapa yang tidak sesuai Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="btn next action-button float-end" value="Selanjutnya"/>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="content-site-evaluation mt-4 py-5 gap-2 d-flex justify-content-center flex-column text-center">
            <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Site Evaluation</h3>
            <span>Sedang Tahap penilaian Desk Evaluation. Harap Ditunggu!</span>
        </div>
        <hr class="p-0">
    </div>

    <!-- Konten Tim Penilaian Section -->
    <div class="tab-pane" id="tim-penilaian-tabpanel" role="tabpanel" aria-labelledby="tim-penilaian-tab">
        <div class="content-profil py-5 mb-5">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Tim Desk Evaluation</h3>
            <div class="container mt-4">
                <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                    <div class="card" style="border-radius: 15px;">
                    <div class="fieldset">
                        <div class="card-body">
                        <div class="card-body pt-0 mt-0">
                            <div class="row align-items-center pt-4 mb-5">
                            <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                                <h5 class="mb-0">Evaluator</h5>
                                <hr class="" style="height: 1px;" >
                            </div>

                            </div>
                            <div class="row align-items-center pb-3">
                            <div class="col-md-4 ps-5">
                                <h6 class="mb-0">Nama</h6>
                            </div>
                            <div class="col-md-8 pe-5">
                                <p class="form-control form-control-lg m-0">Bennefit</p>
                            </div>
                            </div>
                            <div class="row align-items-center pb-3">
                            <div class="col-md-4 ps-5">
                                <h6 class="mb-0">Jabatan</h6>
                            </div>
                            <div class="col-md-8 pe-5">
                                <p class="form-control form-control-lg m-0">Chief Information Officer</p>
                            </div>
                            </div>
                        </div>

                        <div class="card-body pt-0 mt-0">
                            <div class="row align-items-center pt-4 mb-5">
                            <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                                <h5 class="mb-0">Lead Evaluator</h5>
                                <hr class="" style="height: 1px;" >
                            </div>

                            </div>
                            <div class="row align-items-center pb-3">
                            <div class="col-md-4 ps-5">
                                <h6 class="mb-0">Nama</h6>
                            </div>
                            <div class="col-md-8 pe-5">
                                <p class="form-control form-control-lg m-0">Bennefit</p>
                            </div>
                            </div>
                            <div class="row align-items-center pb-3">
                            <div class="col-md-4 ps-5">
                                <h6 class="mb-0">Jabatan</h6>
                            </div>
                            <div class="col-md-8 pe-5">
                                <p class="form-control form-control-lg m-0">Chief Information Officer</p>
                            </div>
                            </div>
                        </div>

                        <div class="card-body pt-0 mt-0">
                            <div class="row align-items-center pt-4 mb-5">
                            <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                                <h5 class="mb-0">Sekretariat</h5>
                                <hr class="" style="height: 1px;" >
                            </div>

                            </div>
                            <div class="row align-items-center pb-3">
                            <div class="col-md-4 ps-5">
                                <h6 class="mb-0">Nama</h6>
                            </div>
                            <div class="col-md-8 pe-5">
                                <p class="form-control form-control-lg m-0">Bennefit</p>
                            </div>
                            </div>
                            <div class="row align-items-center pb-3">
                            <div class="col-md-4 ps-5">
                                <h6 class="mb-0">Jabatan</h6>
                            </div>
                            <div class="col-md-8 pe-5">
                                <p class="form-control form-control-lg m-0">Chief Information Officer</p>
                            </div>
                            </div>
                        </div>

                        </div>
                    </div>

                    </div>
                </div>
                </div>
            </div>
        </div>


        <div class="content-site-evaluation mt-4 py-5 gap-2 d-flex justify-content-center flex-column text-center">
            <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Site Evaluation</h3>
            <span>Sedang Tahap penilaian Desk Evaluation. Harap Ditunggu!</span>
        </div>
        <hr class="p-0">
    </div>
</div>

@endsection()
