
<div class="content-profil py-5 mb-5">
    <h3 class="text-center mb-0 pb-0" style="font-size: 200%; font-weight: bold;">Desk Evaluation</h3>
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

                <fieldset class="fieldset" id="fieldsetPenilaian">
                    @foreach ($desk_evaluation as $penilai)
                        @if ($penilai->jabatan == 'evaluator')
                            <div class="card-body pt-0 mt-0">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Nama</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p>{{ $penilai->user->name }}</p>
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Nilai</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <p>{{ $penilai->skor }}</p>
                                            {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0 mt-2">Komentar</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p style="max-height: 120px; overflow-y: auto;">{{ $penilai->catatan }}</p>
                                    </div>
                                </div>
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
                        {{-- @if ($index > 0)
                            <input type="button" name="previous" class="btn previous action-button-previous float-end me-3" value="Sebelumnya"/>
                        @endif --}}
                    @endforeach
                </fieldset>

                <fieldset class="fieldset" id="fieldsetPenilaian">
                    @foreach ($desk_evaluation as $penilai)
                        @if ($penilai->lead_evaluator != null)
                            <div class="card-body pt-0 mt-0">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Nama</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p>{{ $penilai->evaluator->name }}</p>
                                    </div>
                                </div>
                                    @foreach ($penilai->registrasi->registrasi_penilaian as $penilai)
                                        @if ($penilai->jabatan == 'lead_evaluator')
                                            @if ($penilai->skor == 0 && $penilai->catatan == '')
                                                <form action="{{ route('lead_evaluator.peserta.profil.penilaian', $penilai->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row align-items-center pb-3">
                                                        <div class="col-md-4 ps-5">
                                                            <h6 class="mb-0">Nilai</h6>
                                                        </div>
                                                        <div class="col-md-3">
                                                                <input name="skor" type="string" class="form-control" placeholder="Masukkan Score" value="{{ old('skor') }}">
                                                        </div>
                                                    </div>
                                                    <div class="row pb-3">
                                                        <div class="col-md-4 ps-5">
                                                            <h6 class="mb-0 mt-2">Komentar</h6>
                                                        </div>
                                                        <div class="col-md-6 pe-5">
                                                            <textarea name="catatan" class="form-control" id="" cols="30" rows="5" placeholder="Tuliskan Komentar"></textarea>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            @else
                                                <div class="row align-items-center pb-3">
                                                    <div class="col-md-4 ps-5">
                                                        <h6 class="mb-0">Nilai</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        @if ($penilai->skor == 0)
                                                            <input name="skor" type="string" class="form-control" placeholder="Masukkan Score" value="{{ old('skor') }}">
                                                        @else
                                                            <div class="d-flex align-items-center gap-3">
                                                                <p>{{ $penilai->skor }}</p>
                                                                {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <div class="col-md-4 ps-5">
                                                        <h6 class="mb-0 mt-2">Komentar</h6>
                                                    </div>
                                                    <div class="col-md-6 pe-5">
                                                        @if ($penilai->catatan == '')
                                                            <textarea name="catatan" class="form-control" id="" cols="30" rows="5" placeholder="Tuliskan Komentar"></textarea>
                                                        @else
                                                            <p style="max-height: 120px; overflow-y: auto;">{{ $penilai->catatan }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
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
                        {{-- @if ($index > 0)
                            <input type="button" name="previous" class="btn previous action-button-previous float-end me-3" value="Sebelumnya"/>
                        @endif --}}
                    @endforeach
                </fieldset>

                <fieldset class="fieldset" id="fieldsetPenilaian">
                    @foreach ($desk_evaluation as $penilai)
                        @if ($penilai->jabatan == 'sekretariat')
                            <div class="card-body pt-0 mt-0">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Nama</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p>{{ $penilai->user->name }}</p>
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0">Nilai</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <p>{{ $penilai->skor }}</p>
                                            {{-- <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-md-4 ps-5">
                                        <h6 class="mb-0 mt-2">Komentar</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                        <p style="max-height: 120px; overflow-y: auto;">{{ $penilai->catatan }}</p>
                                    </div>
                                </div>
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
                        {{-- @if ($index > 0)
                            <input type="button" name="previous" class="btn previous action-button-previous float-end me-3" value="Sebelumnya"/>
                        @endif --}}
                    @endforeach
                </fieldset>

                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<hr class="p-0">
<div class="content-site-evaluation py-5 gap-2 d-flex justify-content-center flex-column text-center">
    <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Site Evaluation</h3>
    <span>Sedang Tahap penilaian Desk Evaluation. Harap Ditunggu!</span>
</div>
