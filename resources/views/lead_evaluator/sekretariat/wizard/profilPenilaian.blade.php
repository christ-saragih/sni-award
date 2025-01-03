<!-- Modal penilain -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin mengirimkan penilaian ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="submissionForm" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>
</div>
{{-- modal finalisasi --}}
<div class="modal fade" id="finalisasiModal" tabindex="-1" aria-labelledby="finalisasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="finalisasiModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin memfinalisasi penilaian ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="finalisasiForm" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>
</div>
{{-- modal site evaluation --}}
<div class="modal fade" id="siteEvaluationModal" tabindex="-1" aria-labelledby="siteEvaluationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="siteEvaluationModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin lanjut ke penilaian site evaluation?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="siteEvaluationForm" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane {{ (request()->query('tab') == 'penilaian')?'active':'' }}" id="penilaian-tabpanel" role="tabpanel" aria-labelledby="penilaian-tab">
    <div class="content-profil py-5">
        <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Desk Evaluation</h3>
        <div class="container mt-4">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div id="msform">
                                @if ($konfigurasi_desk_evaluation->value == 'TRUE')
                                    <!-- progressbar -->
                                    <ul id="progressbar" class="d-flex justify-content-between">
                                        <li class="active" id="account"><strong>Evaluator</strong></li>
                                        <li id="personal"><strong>Lead Evaluator</strong></li>
                                        <li id="payment"><strong>Sekretariat</strong></li>
                                    </ul>
                                    <!-- fieldsets -->

                                    <fieldset class="fieldset" id="fieldsetPenilaian">
                                        @if ($desk_evaluation ? $desk_evaluation->evaluator : null)
                                            <div class="card-body pt-0 mt-0">
                                                <div class="row align-items-center pt-4 pb-3">
                                                    <div class="col-md-3 ps-5">
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
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0">Nilai</h6>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    <p>{{ $penilaian_evaluator->skor }}</p>
                                                                    {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center pb-3">
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0">Dokumen Penilaian</h6>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    {{-- {{ dd($penilaian_evaluator->id) }} --}}
                                                                    <a href="{{ route('lead_evaluator.evaluator.detail.download', [Crypt::encryptString($registrasi->id), Crypt::encryptString($penilaian_evaluator->id)]) }}" style="border: 1px solid #552525; color: #552525; padding: 0.5rem; width: 50%" class="form-control text-center"><i class="fa fa-download"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0 mt-2">Komentar</h6>
                                                            </div>
                                                            <div class="col-md-8 pe-5">
                                                                <p style="max-height: 120px; overflow-y: auto;">{{ $penilaian_evaluator->catatan }}</p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="row align-items-center pb-3">
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0">Nilai</h6>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    <p>-</p>
                                                                    {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center pb-3">
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0">Dokumen Penilaian</h6>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    {{-- {{ dd($penilaian_evaluator->id) }} --}}
                                                                    <p>-</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-md-3 ps-5">
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
                                                    <div class="col-md-3 ps-5">
                                                        <h6 class="mb-0">Nama</h6>
                                                    </div>
                                                    <div class="col-md-8 pe-5">
                                                        <p>-</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center pb-3">
                                                    <div class="col-md-3 ps-5">
                                                        <h6 class="mb-0">Nilai</h6>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <p>-</p>
                                                            {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center pb-3">
                                                    <div class="col-md-3 ps-5">
                                                        <h6 class="mb-0">Dokumen Penilaian</h6>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="d-flex align-items-center gap-3">
                                                            {{-- {{ dd($penilaian_evaluator->id) }} --}}
                                                            <p>-</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <div class="col-md-3 ps-5">
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

                                    <fieldset class="fieldset" id="fieldsetPenilaian">
                                        @if ($desk_evaluation ? $desk_evaluation->lead_evaluator : null)
                                            <div class="card-body pt-0 mt-0">
                                                <div class="row align-items-center pt-4 pb-3">
                                                    <div class="col-md-3 ps-5">
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
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0">Nilai</h6>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    <p>{{ $penilaian_lead_evaluator->skor }}</p>
                                                                    {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center pb-3">
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0">Dokumen Penilaian</h6>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    {{-- {{ dd($penilaian_evaluator->id) }} --}}
                                                                    <a href="{{ route('evaluator.lead_evaluator.detail.download', [Crypt::encryptString($registrasi->id), Crypt::encryptString($penilaian_lead_evaluator->id)]) }}" style="border: 1px solid #552525; color: #552525; padding: 0.5rem; width: 50%" class="form-control text-center"><i class="fa fa-download"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0 mt-2">Komentar</h6>
                                                            </div>
                                                            <div class="col-md-8 pe-5">
                                                                <p style="max-height: 120px; overflow-y: auto;">{{ $penilaian_lead_evaluator->catatan }}</p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="row align-items-center pb-3">
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0">Nilai</h6>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    <p>-</p>
                                                                    {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center pb-3">
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0">Dokumen Penilaian</h6>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    {{-- {{ dd($penilaian_evaluator->id) }} --}}
                                                                    <p>-</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-md-3 ps-5">
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
                                                    <div class="col-md-3 ps-5">
                                                        <h6 class="mb-0">Nama</h6>
                                                    </div>
                                                    <div class="col-md-8 pe-5">
                                                        <p>-</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center pb-3">
                                                    <div class="col-md-3 ps-5">
                                                        <h6 class="mb-0">Nilai</h6>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <p>-</p>
                                                            {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center pb-3">
                                                    <div class="col-md-3 ps-5">
                                                        <h6 class="mb-0">Dokumen Penilaian</h6>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="d-flex align-items-center gap-3">
                                                            {{-- {{ dd($penilaian_evaluator->id) }} --}}
                                                            <p>-</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <div class="col-md-3 ps-5">
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

                                    <fieldset class="fieldset" id="fieldsetPenilaian">
                                        @if ($registrasi ? $registrasi->sekretariat_id : null)
                                            <div class="card-body pt-0 mt-0">
                                                <div class="row align-items-center pt-4 pb-3">
                                                    <div class="col-md-3 ps-5">
                                                        <h6 class="mb-0">Nama</h6>
                                                    </div>
                                                    <div class="col-md-8 pe-5">
                                                        <p>{{ $registrasi->sekretariat->name }}</p>
                                                    </div>
                                                </div>
                                                {{-- @foreach ($registrasi_penilaian as $penilai) --}}
                                                    {{-- {{dd($penilaian_evaluator ? $penilaian_sekretariat->internal_id : null)}} --}}
                                                    @if ($penilaian_sekretariat ? $penilaian_sekretariat->internal_id : null)
                                                        <div class="row align-items-center pb-3">
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0">Nilai</h6>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    <p>{{ $penilaian_sekretariat->skor }}</p>
                                                                    {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center pb-3">
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0">Dokumen Penilaian</h6>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    {{-- {{ dd($penilaian_evaluator->id) }} --}}
                                                                    <a href="{{ route('evaluator.sekretariat.detail.download', [Crypt::encryptString($registrasi->id), Crypt::encryptString($penilaian_sekretariat->id)]) }}" style="border: 1px solid #552525; color: #552525; padding: 0.5rem; width: 50%" class="form-control text-center"><i class="fa fa-download"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-md-3 ps-5">
                                                                <h6 class="mb-0 mt-2">Komentar</h6>
                                                            </div>
                                                            <div class="col-md-8 pe-5">
                                                                <p style="max-height: 120px; overflow-y: auto;">{{ $penilaian_sekretariat->catatan }}</p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <form id="submissionForm" action="{{ route('lead_evaluator.sekretariat.detail.penilaian', $registrasi->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row align-items-center pb-3">
                                                                <div class="col-md-3 ps-5">
                                                                    <h6 class="mb-0">Nilai</h6>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input name="skor" type="text" class="form-control" placeholder="Masukkan Score" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('skor') }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center pb-3">
                                                                <div class="col-md-3 ps-5">
                                                                    <h6 class="mb-0">Dokumen Penilaian</h6>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input name="url_dokumen_penilaian" type="file" accept=".pdf" class="form-control"required>
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-md-3 ps-5">
                                                                    <h6 class="mb-0 mt-2">Komentar</h6>
                                                                </div>
                                                                <div class="col-md-6 pe-5">
                                                                    <textarea name="catatan" class="form-control" id="" cols="30" rows="5" placeholder="Tuliskan Komentar" required></textarea>
                                                                </div>
                                                                <div class="col-md-3 d-flex align-items-end">
                                                                    <button type="button" class="btn btn-primary" style="width: auto" data-bs-toggle="modal" data-bs-target="#confirmationModal"><i class="fa fa-send"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
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
                                                <div class="row align-items-center pb-3">
                                                    <div class="col-md-3 ps-5">
                                                        <h6 class="mb-0">Dokumen Penilaian</h6>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="d-flex align-items-center gap-3">
                                                            {{-- {{ dd($penilaian_evaluator->id) }} --}}
                                                            <p>-</p>
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
                                @else
                                    <h5 class="text-center" style="color: red;">Penilaian Desk Evaluation Belum Dibuka!</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-site-evaluation mt-4 py-5 gap-2 d-flex justify-content-center flex-column text-center">
        <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Site Evaluation</h3>
        {{-- {{dd($penilaian_sekretariat != null)}} --}}
        @if ($penilaian_sekretariat != null && $registrasi->status_id == 5)
            <span>Penilaian Selesai</span>
        @elseif ($penilaian_sekretariat != null && $registrasi->stage_id == 4)
            <span>Penilaian site</span>
        @elseif ($penilaian_sekretariat != null)
            <h1>Apakah Nilai Peserta Memenuhi Kriteria?</h1>
            <span>Tekan dibawah untuk melanjutkan penilaian pada tahap Site Evaluation</span>
            <div class="row justify-content-center mt-2">
                <div class="col-3">
                    <form id="finalisasiForm" action="{{ route('evaluator.evaluator.detail.finalisasi', $registrasi->id) }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-primary" style="width: auto" data-bs-toggle="modal" data-bs-target="#finalisasiModal">Finalisasi</i></button>
                    </form>
                </div>
                <div class="col-3">
                    <form id="siteEvaluationForm" action="{{ route('evaluator.evaluator.detail.site_evaluation', $registrasi->id) }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-primary" style="width: auto" data-bs-toggle="modal" data-bs-target="#siteEvaluationModal">Site Evaluation</i></button>
                    </form>
                </div>
            </div>
        @else
            <span>Sedang Tahap penilaian Desk Evaluation. Harap Ditunggu!</span>
        @endif
    </div>
    <hr class="p-0">
</div>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    document.addEventListener("input", function() {
        var input = document.getElementsByName('skor')[0];
        if (parseInt(input.value) > 100) {
            input.value = 100;
        }
    });
</script>
