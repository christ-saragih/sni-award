<style>
    .btn-disetujui {
        width: fit-content !important;
        border: none !important;
        padding: 1px 7px !important;
        border-radius: 3px !important;
        color: white;
        background-color: #47A15E !important;
    }
    .btn-ditolak {
        width: fit-content !important;
        border: none !important;
        padding: 1px 7px !important;
        border-radius: 3px !important;
        color: white;
        background-color: #D12B2B !important;
    }
    .btn-yes {
        padding: 5px 15px;
        border: none;
        border-radius: 5px;
        color: white;
        background-color: #47A15E;
    }
    .btn-no {
        padding: 5px 15px;
        border: none;
        border-radius: 5px;
        color: white;
        background-color: #D12B2B;
    }
    .btn-disetujui:hover,
    .btn-ditolak:hover,
    .btn-yes:hover,
    .btn-no:hover {
        color: white !important;
        transform: scale(110%, 110%);
    }
    .chat {
        display: flex;
        align-items: center;
        height: fit-content;
        border-right: 4px solid #CC9305;
    }
    .chat-text {
        width: fit-content;
        border: 1px solid #9FAFBF;
        border-radius: 15px 0 0 15px;
        padding: 10px 20px;
    }
    .chat-input {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    .chat-input button {
        width: fit-content;
        margin: 0;
        padding: 10px 12px;
        background-color: #552525;
        border: none;
        border-radius: 100%;
    }
    .chat-input button:hover {
        border: none !important;
    }
    #documentFeedback {
        -ms-overflow-style: none;
        scrollbar-width: none;
        resize: none;
        padding: 10px 15px;
        width: 100%;
        border: 2px solid #9FAFBF;
        border-radius: 15px;
    }
    #documentFeedback:focus {
        outline: none !important;
        border: none !important;
    }
    #documentFeedback::placeholder {
        color: #ccc;
    }
    #documentFeedback::-webkit-scrollbar {
        display: none;
    }
</style>

{{-- dokumen --}}
<div class="content-profil py-5 mb-5">
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row mb-5">
            <div class="col-2">
                <label class="fs-4 fw-bold">Dokumen</label>
            </div>
            <div class="col-10">
                <br>
                <hr style="width: 100%; height: 1px; background-color: #CC9305;">
            </div>
        </div>
        <div class="d-flex justify-content-end pe-5">
            <div>
                <label class="fw-bold">Aksi</label>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-3">
                    <label class="fw-bold">Dokumen Assessment</label>
                </div>
                <div class="col-9">
                    <br>
                    <hr style="width: 100%; height: 1px; background-color: gray;">
                </div>
            </div>
            <div class="mt-2">
                @foreach ($dokumen as $dok)
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-3">
                            <label>{{$dok->nama}}</label>
                        </div>
                        <div class="row col-9">
                            @php
                                $statusColor = '';
                                $dokumen_assessment = $registrasi_dokumen ? $registrasi_dokumen->where('dokumen_id', $dok->id)->last() : null;
                                $dokumen_disetujui = false;
                                if ($dokumen_assessment) {
                                    $status_dokumen = $dokumen_assessment->status;
                                    $dokumen_disetujui = $status_dokumen == 'disetujui';
                                }
                            @endphp
                            <div class="col-9">
                                {{-- <input type="file" name="url_dokumen[]" accept=".pdf" class="form-control" id="uploadDokumen"> --}}
                            </div>
                            @foreach ($registrasi_dokumen as $rd)
                                @if ($rd->dokumen_id == $dok->id)
                                    @switch ($rd->status)
                                        @case ('proses')
                                            @php $statusColor = 'bg-warning'; @endphp
                                            @break
                                        @case ('ditolak')
                                            @php $statusColor = 'bg-danger text-white'; @endphp
                                            @break
                                        @case ('disetujui')
                                            @php $statusColor = 'bg-success text-white'; @endphp
                                            @break
                                    @endswitch
                                    <div class="col-3">
                                        <a class="btn {{ $statusColor }}">{{ $rd->status }}</a>
                                        <a href="{{ $rd->url_dokumen }}" target="_blank" style="text-decoration: none; margin-right: 10px;">
                                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i></a>
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <label class="fw-bold">Dokumen Profil</label>
                </div>
                <div class="col-9">
                    <br>
                    <hr style="width: 100%; height: 1.5px; background-color: gray;">
                </div>
            </div>
            <div>
                @if ($peserta->peserta_profil && $registrasi && count($registrasi->registrasi_dokumen)!== 0)
                    @if ($peserta->peserta_profil->url_legalitas_hukum_organisasi)
                        <div class="w-100 d-flex justify-content-between align-items-center mt-2 pe-2">
                            <label>Legalitas Hukum Organisasi</label>
                            <a href="{{ $peserta->peserta_profil->url_legalitas_hukum_organisasi }}" target="_blank">
                                <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                            </a>
                        </div>
                    @endif
                    @if ($peserta->peserta_profil->url_sppt_sni)
                        <div class="w-100 d-flex justify-content-between align-items-center mt-2 pe-2">
                            <label>SPPT SNI</label>
                            <a href="{{ $peserta->peserta_profil->url_sppt_sni }}" target="_blank">
                                <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                            </a>
                        </div>
                    @endif
                    @if ($peserta->peserta_profil->url_sk_kemenkumham)
                        <div class="w-100 d-flex justify-content-between align-items-center mt-2 pe-2">
                            <label>SK Kemenkeuham</label>
                            <a href="{{ $peserta->peserta_profil->url_sk_kemenkumham }}" target="_blank">
                                <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                            </a>
                        </div>
                    @endif
                    @if ($peserta->peserta_profil->url_kewenangan_kebijakan)
                        <div class="w-100 d-flex justify-content-between align-items-center mt-2 pe-2">
                            <label>Kewenangan Kebijakan</label>
                            <a href="{{ $peserta->peserta_profil->url_kewenangan_kebijakan }}" target="_blank">
                                <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
{{-- end dokumen --}}

{{-- feedback --}}
<hr>
<div class="content-profil py-5">
    {{-- head --}}
    <div class="row mb-5">
        <div class="col-2">
            <label class="fs-4 fw-bold">Feedback</label>
        </div>
        <div class="col-10">
            <br>
            <hr style="width: 100%; height: 1px; background-color: #CC9305;">
        </div>
    </div>
    {{-- end head --}}
    {{-- chatbox --}}
    <div style="
        padding: 30px;
        border: 2px solid #9FAFBF;
        border-radius: 15px;
    ">
        <div>
            <div class="chat d-flex flex-column align-items-end gap-2">
                @if (count($registrasi_dokumen) > 0 && $registrasi_dokumen[0]->feedback)
                    <div class="chat-text" id="chat-text">
                        {!! $registrasi_dokumen[0]->feedback !!}
                    </div>
                @endif
            </div>
            <form action="{{ route('evaluator.evaluator.detail.dokumen.send_feedback', request()->registrasi_id) }}" method="POST" class="chat-input mt-4">
                @csrf
                @method('PUT')
                <textarea name="feedback" id="documentFeedback" placeholder="Tuliskan Pesan" rows="1" oninput="autoResizeTextarea(this)"></textarea>
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-send-fill p-0 m-0" viewBox="0 0 18 16">
                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
    {{-- end chatbox --}}
</div>
{{-- end feedback --}}

<script>
    const autoResizeTextarea = (e) => {
        e.style.height = 'auto'
        e.style.height = e.scrollHeight + 'px'
    }
</script>
