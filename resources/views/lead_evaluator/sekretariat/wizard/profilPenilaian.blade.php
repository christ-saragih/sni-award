<!-- Modal -->
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
<div class="tab-pane {{ (request()->query('tab') == 'penilaian')?'active':'' }}" id="penilaian-tabpanel" role="tabpanel" aria-labelledby="penilaian-tab">
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
                                <div class="progress">
                                    <div class="progress-bar penilaian progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br />
                                <!-- fieldsets -->
                                <fieldset class="fieldset" id="fieldsetPenilaian">
                                    @if ($desk_evaluation->evaluator)
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
                                                {{-- {{dd($penilaian_evaluator ? $penilaian_evaluator->internal_id : null)}} --}}
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
                
                                <fieldset class="fieldset" id="fieldsetPenilaian">
                                    @if ($desk_evaluation->lead_evaluator)
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
                
                                <fieldset class="fieldset" id="fieldsetPenilaian">
                                    @if ($desk_evaluation->registrasi->sekretariat_id)
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
                                                {{-- {{dd($penilaian_evaluator ? $penilaian_sekretariat->internal_id : null)}} --}}
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
                                                    <form id="submissionForm" action="{{ route('lead_evaluator.sekretariat.detail.penilaian', $registrasi->id) }}" method="post">
                                                        @csrf
                                                        <div class="row align-items-center pb-3">
                                                            <div class="col-md-4 ps-5">
                                                                <h6 class="mb-0">Nilai</h6>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input name="skor" type="text" class="form-control" placeholder="Masukkan Score" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ old('skor') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-md-4 ps-5">
                                                                <h6 class="mb-0 mt-2">Komentar</h6>
                                                            </div>
                                                            <div class="col-md-6 pe-5">
                                                                <textarea name="catatan" class="form-control" id="" cols="30" rows="5" placeholder="Tuliskan Komentar" required></textarea>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmationModal">Submit</button>
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