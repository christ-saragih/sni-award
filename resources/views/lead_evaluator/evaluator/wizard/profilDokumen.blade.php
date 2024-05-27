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

    a.btn {
        color: white;
        padding-block: 0.1rem !important;
        padding-inline: 0 !important;
        border-radius: 10px;
        min-width: 95px !important;
        pointer-events: none;
    }

    a.btn:hover {
        color: white;
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
        <div class="d-flex align-items-center gap-3 mb-5">
            <label class="fs-4 fw-bold">Dokumen</label>
            <hr style="width: 100%; height: 1px; background-color: #CC9305;">
        </div>
        
        <div>
            <div class="row g-3 ">
                <div class="col-9"></div>
                <div class="col-2 d-flex justify-content-center">
                    <label class="fw-bold">Status</label>
                </div>
                <div class="col-1 d-flex justify-content-center">
                    <label class="fw-bold">Aksi</label>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <label class="fw-bold">Dokumen Assessment</label>
                <hr style="width: 72%; height: 1px; background-color: #9FAFBF;">
            </div>
            <div cs="mt-2">
                @foreach ($dokumen as $dok)
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-3">
                            <label>{{$dok->nama}}</label>
                        </div>
                        <div class="col-6">
                            @php
                                $statusColor = '';
                                $dokumen_assessment = $registrasi_dokumen ? $registrasi_dokumen->where('dokumen_id', $dok->id)->last() : null;
                                $dokumen_disetujui = false;
                                if ($dokumen_assessment) {
                                    $status_dokumen = $dokumen_assessment->status;
                                    $dokumen_disetujui = $status_dokumen == 'disetujui';
                                }
                            @endphp
                        </div>
                            <!-- <div class="col-9"> -->
                                {{-- <input type="file" name="url_dokumen[]" accept=".pdf" class="form-control" id="uploadDokumen"> --}}
                            <!-- </div> -->
                            @foreach ($registrasi_dokumen as $rd)
                                @if ($rd->dokumen_id == $dok->id)
                                    @switch ($rd->status)
                                        @case ('proses')
                                            @php $statusColor = '#E59B30'; @endphp
                                            @break
                                        @case ('ditolak')
                                            @php $statusColor = '#D12B2B'; @endphp
                                            @break
                                        @case ('disetujui')
                                            @php $statusColor = '#47A15E'; @endphp
                                            @break
                                    @endswitch
                                    <div class="col-2 d-flex justify-content-center">
                                        <a class="btn" style="background-color: {{ $statusColor }};">{{ $rd->status }}</a>
                                    </div>
                                    <div class="col-1 d-flex justify-content-center">
                                    <a href="{{ $rd->url_dokumen }}" target="_blank" style="text-decoration: none;">
                                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i></a>
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        
                    </div>
                @endforeach
            </div>
            <br>
            <div class="d-flex align-items-center justify-content-between">
                <label class="fw-bold">Dokumen Profil</label>
                <hr style="width: 72%; height: 1px; background-color: #9FAFBF;">
            </div>
            <div>
                @if ($peserta->peserta_profil && $registrasi && count($registrasi->registrasi_dokumen)!== 0)
                    @if ($peserta->peserta_profil->url_legalitas_hukum_organisasi)
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-3">
                                <label>Legalitas Hukum Organisasi</label>
                            </div>
                            <div class="col-8"></div>
                    
                            <div class="col-1 d-flex justify-content-center">
                                <a href="{{ $peserta->peserta_profil->url_legalitas_hukum_organisasi }}" target="_blank">
                                    <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                                </a>
                            </div>                                        
                        </div>
                    @endif
                    @if ($peserta->peserta_profil->url_sppt_sni)
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-3">
                                <label>SPPT SNI</label>
                            </div>
                            <div class="col-8"></div>
                    
                            <div class="col-1 d-flex justify-content-center">
                                <a href="{{ $peserta->peserta_profil->url_sppt_sni }}" target="_blank">
                                    <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                                </a>
                            </div>                                        
                        </div>
                    @endif
                    @if ($peserta->peserta_profil->url_sk_kemenkumham)
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-3">
                                <label>SK Kemenkeuham</label>
                            </div>
                            <div class="col-8"></div>
                    
                            <div class="col-1 d-flex justify-content-center">
                                <a href="{{ $peserta->peserta_profil->url_sk_kemenkumham }}" target="_blank">
                                    <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                                </a>
                            </div>                                        
                        </div>
                    @endif
                    @if ($peserta->peserta_profil->url_kewenangan_kebijakan)
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-3">
                                <label>Kewenangan Kebijakan</label>
                            </div>
                            <div class="col-8"></div>
                    
                            <div class="col-1 d-flex justify-content-center">
                                <a href="{{ $peserta->peserta_profil->url_kewenangan_kebijakan }}" target="_blank">
                                    <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                                </a>
                            </div>                                        
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
    <div class="d-flex align-items-center gap-3 mb-5">
        <label class="fs-4 fw-bold">Feedback</label>
        <hr style="width: 100%; height: 1px; background-color: #CC9305;">
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
                    @if ($registrasi_dokumen[0]->feedback)
                        <div class="chat-text" id="chat-text">
                            {!! $registrasi_dokumen[0]->feedback !!}
                        </div>
                    @endif
                @endif
            </div>
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
