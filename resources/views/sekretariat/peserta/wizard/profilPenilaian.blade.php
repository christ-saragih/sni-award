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
                                    {{-- {{dd($registrasi_penilaian)}} --}}
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
                                                        <button type="button" onclick="handleDownloadAssessment()">
                                                            <i class="fa fa-download" aria-hidden="true"></i>
                                                        </button>
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
    
    <form action="{{ route('sekretariat.peserta.profil.assessment.download', $registrasi->id) }}" method="POST" id="formDownloadAssessment" class="d-none">
        @csrf
    </form>
</div>
<script>
    const handleDownloadAssessment = () => {
        const form = document.getElementById('formDownloadAssessment')
        form.submit()
    }
</script>