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
        {{-- <a class="nav-link active" id="registrasi-tab" data-bs-toggle="tab" href="#registrasi-tabpanel" role="tab" aria-controls="registrasi-tabpanel" aria-selected="true" style="width: 100%;">Registrasi</a> --}}
        <a class="nav-link {{ (request()->query('tab') == '')?'active':'' }}" id="registrasi-tab" style="width: auto;" href="{{ route('pendaftar_sni_award.detail', Crypt::encryptString($registrasi->id)) }}" role="tab" >Registrasi</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == 'profil')?'active':'' }}" id="profil-tab" style="width: auto;" href="{{ route('pendaftar_sni_award.detail', [ 'id' => Crypt::encryptString($registrasi->id), 'tab' => 'profil']) }}" role="tab" >Profil</a>
        {{-- <a class="nav-link" id="profil-tab" data-bs-toggle="tab" href="#profil-tabpanel" role="tab" aria-controls="profil-tabpanel" aria-selected="false" tabindex="-1" style="width: 100%;">Profil</a> --}}
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == 'dokumen')?'active':'' }}" id="dokumen-tab" style="width: auto;" href="{{ route('pendaftar_sni_award.detail', [ 'id' => Crypt::encryptString($registrasi->id), 'tab' => 'dokumen']) }}" role="tab" >Dokumen</a>
        {{-- <a class="nav-link" id="dokumen-tab" data-bs-toggle="tab" href="#dokumen-tabpanel" role="tab" aria-controls="dokumen-tabpanel" aria-selected="false" tabindex="-1" style="width: 100%;">Dokumen</a> --}}
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == 'assessment')?'active':'' }}" id="assessment-tab" style="width: auto;" href="{{ route('pendaftar_sni_award.detail', [ 'id' => Crypt::encryptString($registrasi->id), 'tab' => 'assessment']) }}" role="tab" >Assessment</a>
        {{-- <a class="nav-link" id="assessment-tab" data-bs-toggle="tab" href="#assessment-tabpanel" role="tab" aria-controls="assessment-tabpanel" aria-selected="false" tabindex="-1" style="width: 100%;">Assessment</a> --}}
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == 'penilaian')?'active':'' }}" id="penilaian-tab" style="width: auto;" href="{{ route('pendaftar_sni_award.detail', [ 'id' => Crypt::encryptString($registrasi->id), 'tab' => 'penilaian']) }}" role="tab" >Penilaian</a>
        {{-- <a class="nav-link" id="penilaian-tab" data-bs-toggle="tab" href="#penilaian-tabpanel" role="tab" aria-controls="penilaian-tabpanel" aria-selected="false" tabindex="-1" style="width: 100%;">Penilaian</a> --}}
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == 'tim-penilaian')?'active':'' }}" id="tim-penilaian-tab" style="width: auto;" href="{{ route('pendaftar_sni_award.detail', [ 'id' => Crypt::encryptString($registrasi->id), 'tab' => 'tim-penilaian']) }}" role="tab" >Tim Penilaian</a>
        {{-- <a class="nav-link" id="tim-penilaian-tab" data-bs-toggle="tab" href="#tim-penilaian-tabpanel" role="tab" aria-controls="tim-penilaian-tabpanel" aria-selected="false" tabindex="-1" style="width: 100%;">Tim Penilaian</a> --}}
    </li>
</ul>

<hr class="p-0">

<div class="tab-content" id="tab-content">
    <!-- Konten Registrasi Section -->
    <div class="tab-pane {{ (request()->query('tab') == '')?'active':'' }}" id="registrasi-tabpanel" role="tabpanel" aria-labelledby="registrasi-tab">
        <div class="content-profil py-5">
            <div class="d-flex align-items-center gap-2">
                <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Data Registrasi Peserta</h3>
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
                            {{ $registrasi->user ? $registrasi->user->name : '' }}
                        </div>
                        <div class="col-3">
                            @if ($registrasi->status->nama == 'open')
                                <button
                                    {{-- onclick="openModalUbahPendaftarAdmin('{{ Crypt::encryptString($registrasi->id) }}')" --}}
                                    onclick="openModalUbahPendaftarAdmin('{{ $registrasi->id }}')"
                                class="btn" data-bs-toggle="modal" role="button" style="background-color: #E1A600; border: none;"><i class="fa fa-edit"></i></button>
                            @endif
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
    <div class="tab-pane {{ (request()->query('tab') == 'profil')?'active':'' }}" id="profil-tabpanel" role="tabpanel" aria-labelledby="profil-tab">
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
                            {{ $peserta->peserta_profil->status_kepemilikan?$peserta->peserta_profil->status_kepemilikan->nama:'' }}
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
                            {{ $peserta->peserta_profil->lembaga_sertifikasi?$peserta->peserta_profil->lembaga_sertifikasi->nama:'' }}
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
                            {{ $peserta->peserta_profil->kategori_organisasi?$peserta->peserta_profil->kategori_organisasi->nama:'' }}
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
    <div class="tab-pane {{ (request()->query('tab') == 'dokumen')?'active':'' }}" id="dokumen-tabpanel" role="tabpanel" aria-labelledby="dokumen-tab">
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
                                        <a href="{{ $dok->registrasi_dokumen->url_dokumen }}" class="btn" style="background-color: white; color:#552525; border: #552525 solid 3px; border-radius: 10px; padding: 4px 8px;" download><i class="fa fa-download"></i></a>
                                        <a class="btn {{ $statusColor }}" style="border: none;">{{ $dok->registrasi_dokumen->status }}</a>
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
                        @if ($dokumen_peserta->url_legalitas_hukum_organisasi)
                            <div class="row g-3 align-items-center mt-2 mt-2">
                                <div class="col-8">
                                    <label>url_legalitas_hukum_organisasi <span style="color: red">*</span></label>
                                </div>
                                <div class="col-4">
                                    <a href="{{ $dokumen_peserta->url_legalitas_hukum_organisasi }}" class="btn" style="background-color: white; color:#552525; border: #552525 solid 3px; border-radius: 10px; padding: 4px 8px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $dokumen_peserta->url_legalitas_hukum_organisasi }}.pdf" download><i class="fa fa-download"></i></a>
                                </div>
                            </div>
                        @else
                            <div class="row g-3 align-items-center mt-2 mt-2">
                                <div class="col-8">
                                    <label>url_legalitas_hukum_organisasi <span style="color: red">*</span></label>
                                </div>
                                <div class="col-4">
                                    <span class="text-muted">Tidak ada file</span>
                                </div>
                            </div>
                        @endif
                        @if ($dokumen_peserta->url_sppt_sni)
                            <div class="row g-3 align-items-center mt-2">
                                <div class="col-8">
                                    <label>url_sppt_sni <span style="color: red">*</span></label>
                                </div>
                                <div class="col-4">
                                    <a href="{{ $dokumen_peserta->url_sppt_sni }}" class="btn" style="background-color: white; color:#552525; border: #552525 solid 3px; border-radius: 10px; padding: 4px 8px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $dokumen_peserta->url_sppt_sni }}.pdf" download><i class="fa fa-download"></i></a>
                                </div>
                            </div>
                        @else
                            <div class="row g-3 align-items-center mt-2 mt-2">
                                <div class="col-8">
                                    <label>url_sppt_sni <span style="color: red">*</span></label>
                                </div>
                                <div class="col-4">
                                    <span class="text-muted">Tidak ada file</span>
                                </div>
                            </div>
                        @endif
                        @if ($dokumen_peserta->url_sk_kemenkumham)
                            <div class="row g-3 align-items-center mt-2">
                                <div class="col-8">
                                    <label>url_sk_kemenkumham <span style="color: red">*</span></label>
                                </div>
                                <div class="col-4">
                                    <a href="{{ $dokumen_peserta->url_sk_kemenkumham }}" class="btn" style="background-color: white; color:#552525; border: #552525 solid 3px; border-radius: 10px; padding: 4px 8px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $dokumen_peserta->url_sk_kemenkumham }}.pdf" download><i class="fa fa-download"></i></a>
                                </div>
                            </div>
                        @else
                            <div class="row g-3 align-items-center mt-2 mt-2">
                                <div class="col-8">
                                    <label>url_sk_kemenkumham <span style="color: red">*</span></label>
                                </div>
                                <div class="col-4">
                                    <span class="text-muted">Tidak ada file</span>
                                </div>
                            </div>
                        @endif
                        @if ($dokumen_peserta->url_kewenangan_kebijakan)
                            <div class="row g-3 align-items-center mt-2">
                                <div class="col-8">
                                    <label>url_kewenangan_kebijakan <span style="color: red">*</span></label>
                                </div>
                                <div class="col-4">
                                    <a href="{{ $dokumen_peserta->url_kewenangan_kebijakan }}" class="btn" style="background-color: white; color:#552525; border: #552525 solid 3px; border-radius: 10px; padding: 4px 8px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $dokumen_peserta->url_kewenangan_kebijakan }}.pdf" download><i class="fa fa-download"></i></a>
                                </div>
                            </div>
                        @else
                            <div class="row g-3 align-items-center mt-2 mt-2">
                                <div class="col-8">
                                    <label>url_kewenangan_kebijakan <span style="color: red">*</span></label>
                                </div>
                                <div class="col-4">
                                    <span class="text-muted">Tidak ada file</span>
                                </div>
                            </div>
                        @endif
                    @else
                        {{-- <span class="text-muted">Tidak ada file</span> --}}
                    @endif

                    {{-- old --}}
                    {{-- @if ($registrasi_dokumen && $registrasi_dokumen->url_dokumen)
                        <div class="row g-3 align-items-center mt-2 mt-2">
                            <div class="col-8">
                                <label>url_legalitas_hukum_organisasi</label>
                            </div>
                            <div class="col-4">
                                <a href="{{ $dokumen_peserta->url_legalitas_hukum_organisasi }}" class="btn" style="background-color: white; color:#552525; border: #552525 solid 3px; border-radius: 10px; padding: 4px 8px;" download><i class="fa fa-download"></i></a>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-8">
                                <label>url_sppt_sni</label>
                            </div>
                            <div class="col-4">
                                <a href="{{ $dokumen_peserta->url_sppt_sni }}" class="btn" style="background-color: white; color:#552525; border: #552525 solid 3px; border-radius: 10px; padding: 4px 8px;" download><i class="fa fa-download"></i></a>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-8">
                                <label>url_sk_kemenkumham</label>
                            </div>
                            <div class="col-4">
                                <a href="{{ $dokumen_peserta->url_sk_kemenkumham }}" class="btn" style="background-color: white; color:#552525; border: #552525 solid 3px; border-radius: 10px; padding: 4px 8px;" download><i class="fa fa-download"></i></a>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-8">
                                <label>url_kewenangan_kebijakan</label>
                            </div>
                            <div class="col-4">
                                <a href="{{ $dokumen_peserta->url_kewenangan_kebijakan }}" class="btn" style="background-color: white; color:#552525; border: #552525 solid 3px; border-radius: 10px; padding: 4px 8px;" download><i class="fa fa-download"></i></a>
                            </div>
                        </div>
                    @else
                        <span class="text-muted">Tidak ada file</span>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Konten Assessment Section -->
    <div class="tab-pane {{ (request()->query('tab') == 'assessment')?'active':'' }}" id="assessment-tabpanel" role="tabpanel" aria-labelledby="assessment-tab">
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
                                {{-- <li><a class="dropdown-item" href="{{ route('pendaftar_sni_award.get_kategori', [$registrasi->id, $kategori ]) }}">{{ $kategori }}</a></li> --}}
                                <li><a class="dropdown-item" href="{{ route('pendaftar_sni_award.get_kategori', [Crypt::encryptString($registrasi->id), $kategori ]) }}?tab={{ request()->query('tab') }}">{{ $kategori }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- <div class="text-center kategori_pertanyaan_single ms-auto">Kepemimpinan</div> --}}
                </div>
                <!-- fieldset pertanyaan -->
                @foreach ($assessment_kategori->assessment_sub_kategori as $ask)
                {{-- <fieldset class="fieldset" id="fieldsetPertanyaan"> --}}
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
                            {{-- <div class="d-flex flex-column gap-3"> --}}
                                @foreach ($ap->assessment_jawaban as $aj)
                                    <label class="jawaban-label d-flex align-items-center py-1 px-3 @if($registrasi_assessment->contains('assessment_jawaban_id', $aj->id)) active @endif">{{ $aj->jawaban }}</label>
                                @endforeach
                            {{-- </div> --}}
                        </div>
                    </div>
                    @endforeach
                    {{-- <input type="button" name="selanjutnyaAssesment" class="btn selanjutnyaAssesment action-button float-end mt-5" value="Selanjutnya"/> --}}
                {{-- </fieldset> --}}
                @endforeach
            </div>
        </div>
    </div>

    <!-- Konten Penilaian Section -->
    <div class="tab-pane {{ (request()->query('tab') == 'penilaian')?'active':'' }}" id="penilaian-tabpanel" role="tabpanel" aria-labelledby="penilaian-tab">
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
                                        <li class="active" id="account"><strong>Evaluator</strong></li>
                                        <li id="personal"><strong>Lead Evaluator</strong></li>
                                        <li id="payment"><strong>Sekretariat</strong></li>
                                    </ul>
                                    <div class="progress">
                                        <div class="progress-bar penilaian progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <br />
                                    <!-- fieldsets -->
                                    <fieldset class="fieldset" id="fieldsetPenilaian">
                                        @foreach ($registrasi_penilaian as $penilaian)
                                            <div class="card-body pt-0 mt-0">
                                                <div class="row align-items-center pt-4 pb-3">
                                                    <div class="col-md-4 ps-5">
                                                        <h6 class="mb-0">Nama Evaluator</h6>
                                                    </div>
                                                    <div class="col-md-8 pe-5">
                                                        <p class="form-control form-control-lg m-0">{{ $penilaian->user->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center pb-3">
                                                    <div class="col-md-4 ps-5">
                                                        <h6 class="mb-0">Nilai</h6>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <p class="form-control form-control-lg m-0">{{ $penilaian->skor }}</p>
                                                            {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <div class="col-md-4 ps-5">
                                                        <h6 class="mb-0 mt-2">Komentar</h6>
                                                    </div>
                                                    <div class="col-md-8 pe-5">
                                                        <p class="form-control form-control-lg m-0" style="max-height: 120px; overflow-y: auto;">{{ $penilaian->catatan }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
    <div class="tab-pane {{ (request()->query('tab') == 'tim-penilaian')?'active':'' }}" id="tim-penilaian-tabpanel" role="tabpanel" aria-labelledby="tim-penilaian-tab">
        <div class="content-profil py-5 mb-5">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Tim Desk Evaluation</h3>
            <div class="container mt-4">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-xl-12">
                        <div class="card" style="border-radius: 15px;">
                            <div class="fieldset">
                                <div class="card-body">
                                    @foreach ($registrasi_penilaian as $penilaian)
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

<script>
    $(document).ready(function(){
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endsection()
