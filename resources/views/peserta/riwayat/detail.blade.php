@extends('peserta.layouts.master')

@section('content')
<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == '')?'active':'' }}" id="simple-tab-0" style="width: auto;" href="{{ route('riwayat.detail', Crypt::encryptString($registrasi->id)) }}" role="tab">Penilaian</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == 'tim')?'active':'' }}" id="simple-tab-1" style="width: auto;" href="{{ route('riwayat.detail', [ 'id' => Crypt::encryptString($registrasi->id), 'tab' => 'tim']) }}" role="tab">Tim</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == 'assessment')?'active':'' }}" id="simple-tab-2" style="width: auto;" href="{{ route('riwayat.detail', [ 'id' => Crypt::encryptString($registrasi->id), 'tab' => 'assessment']) }}" role="tab">Assesment</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == 'dokumen')?'active':'' }}" id="simple-tab-3" style="width: auto;" href="{{ route('riwayat.detail', [ 'id' => Crypt::encryptString($registrasi->id), 'tab' => 'dokumen']) }}" role="tab">Dokumen</a>
    </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
    <div class="tab-pane {{ (request()->query('tab') == '')?'active':'' }}" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
        <div class="content-profil py-5">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Desk Evaluation</h3>
            <div class="container mt-4">
                <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                    <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                        <div id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar" class="d-flex justify-content-between">
                            <li class="active" id="account"><strong>Evaluator</strong></li>
                            <li id="personal"><strong>Lead Evaluator</strong></li>
                            <li id="payment"><strong>Sekretariat</strong></li>
                        </ul>
                        <!-- <div class="progress">
                            <div
                            class="progress-bar penilaian progress-bar-striped progress-bar-animated"
                            role="progressbar"
                            aria-valuemin="0"
                            aria-valuemax="100"
                            ></div>
                        </div> -->

                        <!-- fieldsets -->
                        {{-- evaluator --}}
                        <fieldset class="fieldset" id="fieldsetPenilaian">
                            {{-- {{ dd($desk_evaluation->evaluator != null) }} --}}
                            @if ($desk_evaluation ? $desk_evaluation->evaluator : null)
                                <div class="card-body pt-0 mt-0">
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Nama</h6>
                                        </div>
                                        <div class="col-md-8 pe-5">
                                            <p>{{ $desk_evaluation->evaluator->name }}</p>
                                        </div>
                                    </div>
                                    {{-- @foreach ($registrasi_penilaian as $penilai) --}}
                                        {{-- {{dd($penilai)}} --}}
                                        @if ($penilaian_evaluator ? $penilaian_evaluator->internal_id : null)
                                            <div class="row align-items-center pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0">Nilai</h6>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <p>{{ $penilaian_evaluator->skor }}</p>
                                                        {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0 mt-2">Komentar</h6>
                                                </div>
                                                <div class="col-md-8 pe-5">
                                                    <p style="max-height: 120px; overflow-y: auto;">{{ $penilaian_evaluator->catatan }}</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row align-items-center pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0">Nilai</h6>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <p>-</p>
                                                        {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0 mt-2">Komentar</h6>
                                                </div>
                                                <div class="col-md-8 pe-5">
                                                    <p style="max-height: 120px; overflow-y: auto;">-</p>
                                                </div>
                                            </div>
                                        @endif
                                    {{-- @endforeach --}}
                                </div>
                                <input type="button" name="next" class="btn next action-button float-end" value="Selanjutnya"/>
                            @else
                                <div class="card-body pt-0 mt-0">
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Nama</h6>
                                        </div>
                                        <div class="col-md-8 pe-5">
                                            <p>-</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Nilai</h6>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="d-flex align-items-center gap-3">
                                                <p>-</p>
                                                {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0 mt-2">Komentar</h6>
                                        </div>
                                        <div class="col-md-8 pe-5">
                                            <p style="max-height: 120px; overflow-y: auto;">-</p>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="next" class="btn next action-button float-end" value="Selanjutnya"/>
                            @endif
                        </fieldset>

                        {{-- Lead Evaluator --}}
                        <fieldset class="fieldset" id="fieldsetPenilaian">
                            @if ($desk_evaluation ? $desk_evaluation->lead_evaluator : null)
                                <div class="card-body pt-0 mt-0">
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Nama</h6>
                                        </div>
                                        <div class="col-md-8 pe-5">
                                            <p>{{ $desk_evaluation->lead_evaluator->name }}</p>
                                        </div>
                                    </div>
                                    {{-- @foreach ($registrasi_penilaian as $penilai) --}}
                                        {{-- {{dd($penilai)}} --}}
                                        @if ($penilaian_lead_evaluator ? $penilaian_lead_evaluator->internal_id : null)
                                            <div class="row align-items-center pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0">Nilai</h6>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <p>{{ $penilaian_lead_evaluator->skor }}</p>
                                                        {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0 mt-2">Komentar</h6>
                                                </div>
                                                <div class="col-md-8 pe-5">
                                                    <p style="max-height: 120px; overflow-y: auto;">{{ $penilaian_lead_evaluator->catatan }}</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row align-items-center pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0">Nilai</h6>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <p>-</p>
                                                        {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0 mt-2">Komentar</h6>
                                                </div>
                                                <div class="col-md-8 pe-5">
                                                    <p style="max-height: 120px; overflow-y: auto;">-</p>
                                                </div>
                                            </div>
                                        @endif
                                    {{-- @endforeach --}}
                                </div>
                                <input type="button" name="next" class="btn next action-button float-end" value="Selanjutnya"/>
                                <input type="button" name="previous" class="btn previous action-button-previous float-end me-3" value="Sebelumnya"/>
                            @else
                                <div class="card-body pt-0 mt-0">
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Nama</h6>
                                        </div>
                                        <div class="col-md-8 pe-5">
                                            <p>-</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Nilai</h6>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="d-flex align-items-center gap-3">
                                                <p>-</p>
                                                {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0 mt-2">Komentar</h6>
                                        </div>
                                        <div class="col-md-8 pe-5">
                                            <p style="max-height: 120px; overflow-y: auto;">-</p>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="next" class="btn next action-button float-end" value="Selanjutnya"/>
                                <input type="button" name="previous" class="btn previous action-button-previous float-end me-3" value="Sebelumnya"/>
                            @endif
                        </fieldset>

                        {{-- Sekretariat --}}
                        <fieldset class="fieldset" id="fieldsetPenilaian">
                            @if ($desk_evaluation ? $desk_evaluation->registrasi->sekretariat_id : null)
                                <div class="card-body pt-0 mt-0">
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Nama</h6>
                                        </div>
                                        <div class="col-md-8 pe-5">
                                            <p>{{ $desk_evaluation->registrasi->sekretariat->name }}</p>
                                        </div>
                                    </div>
                                    {{-- @foreach ($registrasi_penilaian as $penilai) --}}
                                        {{-- {{dd($penilai)}} --}}
                                        @if ($penilaian_sekretariat ? $penilaian_sekretariat->internal_id : null)
                                            <div class="row align-items-center pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0">Nilai</h6>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <p>{{ $penilaian_sekretariat->skor }}</p>
                                                        {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0 mt-2">Komentar</h6>
                                                </div>
                                                <div class="col-md-8 pe-5">
                                                    <p style="max-height: 120px; overflow-y: auto;">{{ $penilaian_sekretariat->catatan }}</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row align-items-center pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0">Nilai</h6>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <p>-</p>
                                                        {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-4 ps-5">
                                                    <h6 class="mb-0 mt-2">Komentar</h6>
                                                </div>
                                                <div class="col-md-8 pe-5">
                                                    <p style="max-height: 120px; overflow-y: auto;">-</p>
                                                </div>
                                            </div>
                                        @endif
                                    {{-- @endforeach --}}
                                </div>
                                <input type="button" name="previous" class="btn previous action-button-previous float-end me-3" value="Sebelumnya"/>
                            @else
                                <div class="card-body pt-0 mt-0">
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Nama</h6>
                                        </div>
                                        <div class="col-md-8 pe-5">
                                            <p>{{$penilaian_sekretariat->sekretariat->name}}</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Nilai</h6>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="d-flex align-items-center gap-3">
                                                <p>-</p>
                                                {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0 mt-2">Komentar</h6>
                                        </div>
                                        <div class="col-md-8 pe-5">
                                            <p style="max-height: 120px; overflow-y: auto;">-</p>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="previous" class="btn previous action-button-previous float-end me-3" value="Sebelumnya"/>
                            @endif
                        </fieldset>
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
    <!-- Tim Section -->
    <div class="tab-pane {{ (request()->query('tab') == 'tim')?'active':'' }}" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
        <div class="content-profil py-5 mb-5">
        <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Tim Desk Evaluation</h3>
        <div class="container mt-4">
            <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-12">
                <div class="card" style="border-radius: 15px;">
                <div class="fieldset">
                    <div class="card-body">
                        {{-- @foreach ($desk_evaluation as $penilaian) --}}
                        {{-- {{dd($desk_evaluation->evaluator)}} --}}
                        @if ($desk_evaluation ? $desk_evaluation->evaluator : null)
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
                                        <p class="form-control form-control-lg m-0">{{ $desk_evaluation->evaluator->name }}</p>
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Jabatan</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p class="form-control form-control-lg m-0">{{ $desk_evaluation->evaluator->jenis_role->nama }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
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
                                        <p class="form-control form-control-lg m-0">-</p>
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Jabatan</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p class="form-control form-control-lg m-0">-</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($desk_evaluation ? $desk_evaluation->lead_evaluator : null)
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
                                        <p class="form-control form-control-lg m-0">{{ $desk_evaluation->lead_evaluator->name }}</p>
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Jabatan</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p class="form-control form-control-lg m-0">{{ $desk_evaluation->lead_evaluator->jenis_role->nama }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card-body pt-0 mt-0">
                                <div class="row align-items-center pt-4 mb-5">
                                    <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                                        <h5 class="mb-0">Lead_Evaluator</h5>
                                        <hr class="" style="height: 1px;" >
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Nama</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p class="form-control form-control-lg m-0">-</p>
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Jabatan</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p class="form-control form-control-lg m-0">-</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- {{ dd($desk_evaluation->registrasi->sekretariat_id) }} --}}
                        @if ($desk_evaluation ? $desk_evaluation->registrasi->sekretariat_id : null)
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
                                        <p class="form-control form-control-lg m-0">{{ $desk_evaluation->registrasi->sekretariat->name }}</p>
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Jabatan</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p class="form-control form-control-lg m-0">{{ $desk_evaluation->registrasi->sekretariat->jenis_role->nama }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
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
                                        <p class="form-control form-control-lg m-0">{{$penilaian_sekretariat->sekretariat->name}}</p>
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Jabatan</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p class="form-control form-control-lg m-0">-</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- @endforeach --}}
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
    <div class="tab-pane {{ (request()->query('tab') == 'assessment')?'active':'' }}" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
        <div class="content-profil py-5">
            <div class="d-flex align-items-center gap-2">
                <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Assessment</h3>
                <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
            </div>
            <div class="container mt-4 d-flex flex-column gap-4">
                <div class="d-flex align-items-center">
                    <div class="progress flex-grow-1" style="height: 9px; background-color: #E59B30;" >
                        <div class="progress-bar pertanyaan" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="dropdown">
                        {{-- <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: fit-content">
                            Kategori
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($data_assessment_kategori as $kategori)
                                <li><a class="dropdown-item" href="{{ route('riwayat.get_kategori', [Crypt::encryptString($registrasi->id), $kategori ]) }}?tab={{ request()->query('tab') }}">{{ $kategori }}</a></li>
                            @endforeach
                        </ul> --}}
                        <select name="assessment_kategori" id="" class="kategori-select" oninput="changeKategori(this, {{ $registrasi->id }})">
                            @foreach ($data_assessment_kategori as $key=>$ak)
                                <option value="{{ $ak }}" {{ request()->query('assessment_kategori') == $ak ? 'selected' : '' }} class="kategori-option">
                                    {{ $ak }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- fieldset pertanyaan -->
                <form action="{{ route('peserta.riwayat.assessment.download', $registrasi->id) }}" method="POST">
                    @csrf
                    <button type="submit">
                        Unduh sebagai PDF
                    </button>
                </form>
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
    <div class="tab-pane {{ (request()->query('tab') == 'dokumen')?'active':'' }}" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
        <div class="content-profil py-5 mb-5">
            <div class="container mt-4">
                <div class="px-3 pt-0 pb-2">
                    <div class="row g-3 align-items-center">
                        <div class="col-8">
                            <label class="fw-bold">Nama Lampiran</label>
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
                                        <a href="{{ $dok->registrasi_dokumen->url_dokumen }}" class="btn" style="border-style: solid; border-color: #552525; border-width: 3px; color:#552525;" download data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $dok->registrasi_dokumen->url_dokumen }}.pdf">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <a class="btn {{ $statusColor }}" style="color: #fff">{{ $dok->registrasi_dokumen->status }}</a>
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
                                    <a href="{{ $dokumen_peserta->url_legalitas_hukum_organisasi }}" class="btn" style="border-style: solid; border-color: #552525; border-width: 3px; color:#552525;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $dokumen_peserta->url_legalitas_hukum_organisasi }}.pdf" download><i class="fa fa-download"></i></a>
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
                                    <a href="{{ $dokumen_peserta->url_sppt_sni }}" class="btn" style="border-style: solid; border-color: #552525; border-width: 3px; color:#552525;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $dokumen_peserta->url_sppt_sni }}.pdf" download><i class="fa fa-download"></i></a>
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
                                    <a href="{{ $dokumen_peserta->url_sk_kemenkumham }}" class="btn" style="border-style: solid; border-color: #552525; border-width: 3px; color:#552525;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $dokumen_peserta->url_sk_kemenkumham }}.pdf" download><i class="fa fa-download"></i></a>
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
                                    <a href="{{ $dokumen_peserta->url_kewenangan_kebijakan }}" class="btn" style="border-style: solid; border-color: #552525; border-width: 3px; color:#552525;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $dokumen_peserta->url_kewenangan_kebijakan }}.pdf" download><i class="fa fa-download"></i></a>
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
                </div>
            </div>
        </div>

        <hr class="p-0">
        <div class="content-profil py-5">
            <div class="d-flex align-items-center gap-2">
            <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Feedback</h3>
            <hr class="p-0" style="height: 1px; width: 100%; background-color: #CC9305;">
            </div>

            <div class="row g-3 align-items-center mt-2">
                <div class="col">
                    <div class="container mt-4" style="border: 1px solid #9FAFBF; border-radius: 15px;">
                        @foreach ($dokumen as $dok)
                            @if ($dok->registrasi_dokumen && $dok->registrasi_dokumen->url_dokumen)
                                @if ($registrasi_dokumen && $registrasi_dokumen->url_dokumen)
                                <div class="d-flex flex-row py-5">
                                    <div class="d-flex gap-2">
                                        <img src="{{ asset('assets') }}/peserta/images/foto-profil.png" width="26" height="26" style="border-radius: 50px; border: 1px solid #D9D9D9;" alt="img">
                                        <div class="d-flex flex-column gap-1">
                                            <div class="py-2 px-3" style="background-color: #D9D9D9; border-top-right-radius: 15px; border-bottom-right-radius: 15px; font-size: 100%; box-shadow: inset 3px 0px 0px 0px rgba(204,147,5,1);">
                                                {{ $dok->registrasi_dokumen->feedback }}
                                            </div>
                                            <div class="ms-auto" style="color: #595959; font-size: 90%">
                                                {{ $dok->registrasi_dokumen->updated_at }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    {{-- <span class="text-muted">Tidak ada file</span> --}}
                                @endif
                            @else
                                {{-- <span class="text-muted">Tidak ada file</span> --}}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- <div class="container mt-4" style="border: 1px solid #9FAFBF; border-radius: 15px;">
                <div class="d-flex flex-row py-5">
                    <div class="d-flex gap-2">
                        <img src="{{ asset('assets') }}/peserta/images/foto-profil.png" width="26" height="26" style="border-radius: 50px; border: 1px solid #D9D9D9;" alt="img">
                        <div class="d-flex flex-column gap-1">
                            <div class="py-2 px-3" style="background-color: #D9D9D9; border-top-right-radius: 15px; border-bottom-right-radius: 15px; font-size: 100%; box-shadow: inset 3px 0px 0px 0px rgba(204,147,5,1);">
                                Dokumen Keterangan Kemenkeuham tidak sesuai
                            </div>
                            <div class="ms-auto" style="color: #595959; font-size: 90%">
                                17:20:29
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/pbkdf2.js"></script>
<script>
    $(document).ready(function(){
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    const changeKategori = (e, id) => {
        const encryptId = CryptoJS.AES.encrypt(id);
        // console.log(encryptId);
        // const route = `/peserta/riwayat/${encryptId}/detail/${e.value}`
        // console.log(route);
        // location.href = route
    }
</script>
@endsection('content')
