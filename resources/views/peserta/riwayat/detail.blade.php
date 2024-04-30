@extends('peserta.layouts.master')

@section('content')
<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Penilaian</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Tim</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Assesment</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab" aria-controls="simple-tabpanel-3" aria-selected="false">Dokumen</a>
    </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
    <!-- Penilaian Section -->
    <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
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
                                <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a>
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

                            <input
                            type="button"
                            name="next"
                            class="btn next action-button float-end"
                            value="Selanjutnya"
                            />

                        </fieldset>

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
                                <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a>
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

                        <input
                            type="button"
                            name="next"
                            class="btn next action-button float-end"
                            value="Selanjutnya"
                        />
                        <input
                            type="button"
                            name="previous"
                            class="btn previous action-button-previous float-end me-3"
                            value="Sebelumnya"
                        />
                        </fieldset>

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
                                <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a>
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
                        <input
                            type="button"
                            name="previous"
                            class="btn previous action-button-previous float-end me-3"
                            value="Sebelumnya"
                        />
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

    <!-- Tim Section -->
    <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
        <div class="content-profil py-5 mb-5">
        <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Tim Desk Evaluation</h3>
        <div class="container mt-4">
            <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-12">
                <div class="card" style="border-radius: 15px;">
                <div class="fieldset">
                    <div class="card-body">
                        @foreach ($desk_evaluation as $penilaian)
                            <div class="card-body pt-0 mt-0">
                                <div class="row align-items-center pt-4 mb-5">
                                    <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                                        <h5 class="mb-0">{{ $penilaian->jabatan }}</h5>
                                        <hr class="" style="height: 1px;" >
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Nama</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p class="form-control form-control-lg m-0">{{ $penilaian->user->name}}</p>
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Jabatan</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p class="form-control form-control-lg m-0">{{ $penilaian->jabatan }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="card-body pt-0 mt-0">
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
                        </div> --}}
                    </div>
                </div>

                </div>
            </div>
            </div>
        </div>
        </div>

        <hr class="p-0">
        <div class="content-profil py-5">
        <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Tim Site Evaluation</h3>
            <div class="container mt-4">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-xl-12">
                        <div class="card" style="border-radius: 15px;">
                            <div class="fieldset">
                                <div class="card-body">
                                    @foreach ($site_evaluation as $penilaian)
                                        <div class="card-body pt-0 mt-0">
                                            <div class="row align-items-center pt-4 mb-5">
                                                <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                                                    <h5 class="mb-0">{{ $penilaian->jabatan }}</h5>
                                                    <hr class="" style="height: 1px;" >
                                                </div>
                                            </div>
                                            <div class="row align-items-center pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0">Nama</h6>
                                                </div>
                                                <div class="col-md-8 pe-5">
                                                    <p class="form-control form-control-lg m-0">{{ $penilaian->user->name}}</p>
                                                </div>
                                            </div>
                                            <div class="row align-items-center pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0">Jabatan</h6>
                                                </div>
                                                <div class="col-md-8 pe-5">
                                                    <p class="form-control form-control-lg m-0">{{ $penilaian->jabatan }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="card-body pt-0 mt-0">
                                        <div class="row align-items-center pt-4 mb-5">
                                            <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                                            <h5 class="mb-0">Evaluator</h5>
                                            <hr class="" style="height: 1px;">
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
                                                <hr class="" style="height: 1px;">
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
                                            <hr class="" style="height: 1px;">
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
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Assesment Section -->
    <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
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
                            Kategori
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($data_assessment_kategori as $kategori)
                                <li><a class="dropdown-item" href="{{ route('pendaftar_sni_award.get_kategori', [$registrasi->id, $kategori ]) }}?tab={{ request()->query('tab') }}">{{ $kategori }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- fieldset pertanyaan -->
                @foreach ($assessment_kategori->assessment_sub_kategori as $ask)
                    @foreach ($ask->assessment_pertanyaan as $ap)
                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-4">
                        <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                            <h3 class="m-0">Pertanyaan {{ $loop->parent->iteration }}.{{ $loop->iteration }}</h3>
                            <p class="m-0">{{ $ask->nama }}</p>
                        </div>
                        <div class="pertanyaan d-flex flex-column text-center">
                            <p class="m-0">{{ $ap->pertanyaan }}</p>
                        </div>
                        <div class="jawaban d-flex flex-wrap justify-content-between align-items-center w-100 mt-4 gap-3">
                                @foreach ($ap->assessment_jawaban as $aj)
                                    <label class="jawaban-label d-flex align-items-center py-1 px-3 @if($registrasi_assessment->contains('assessment_jawaban_id', $aj->id)) active @endif">{{ $aj->jawaban }}</label>
                                @endforeach
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    <!-- Dokumen Section -->
    <div class="tab-pane" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
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
                    @foreach ($dokumen as $dok)
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-8">
                                <label>{{ $dok->nama }}</label>
                            </div>
                            <div class="col-4">
                                @if ($dok->registrasi_dokumen && $dok->registrasi_dokumen->url_dokumen)
                                    @if ($registrasi_dokumen && $registrasi_dokumen->url_dokumen)
                                    @php
                                        $statusColor = '';
                                        switch ($dok->registrasi_dokumen->status) {
                                            case 'proses':
                                                $statusColor = 'bg-warning';
                                                break;
                                            case 'ditolak':
                                                $statusColor = 'bg-danger';
                                                break;
                                            case 'disetujui':
                                                $statusColor = 'bg-success';
                                                break;
                                            default:
                                                $statusColor = '';
                                                break;
                                        }
                                        @endphp
                                        <a href="{{ $dok->registrasi_dokumen->url_dokumen }}" class="btn" download><i class="fa fa-download"></i></a>
                                        <a class="btn {{ $statusColor }}" >{{ $dok->registrasi_dokumen->status }}</a>
                                    @else
                                    <span class="text-muted">Tidak ada file</span>
                                    @endif
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    {{-- <div id="dokumen_peserta">

                    </div> --}}
                    @if ($registrasi_dokumen && $registrasi_dokumen->url_dokumen)
                        <div class="row g-3 align-items-center mt-2 mt-2">
                            <div class="col-8">
                                <label>url_legalitas_hukum_organisasi</label>
                            </div>
                            <div class="col-4">
                                <a href="{{ $dokumen_peserta->url_legalitas_hukum_organisasi }}" class="btn" download><i class="fa fa-download"></i></a>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-8">
                                <label>url_sppt_sni</label>
                            </div>
                            <div class="col-4">
                                <a href="{{ $dokumen_peserta->url_sppt_sni }}" class="btn" download><i class="fa fa-download"></i></a>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-8">
                                <label>url_sk_kemenkumham</label>
                            </div>
                            <div class="col-4">
                                <a href="{{ $dokumen_peserta->url_sk_kemenkumham }}" class="btn" download><i class="fa fa-download"></i></a>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-8">
                                <label>url_kewenangan_kebijakan</label>
                            </div>
                            <div class="col-4">
                                <a href="{{ $dokumen_peserta->url_kewenangan_kebijakan }}" class="btn" download><i class="fa fa-download"></i></a>
                            </div>
                        </div>
                    @else
                        {{-- <span class="text-muted">Tidak ada file</span> --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
