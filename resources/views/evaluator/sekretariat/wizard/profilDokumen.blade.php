<style>
    .btn-cek-dokumen {
        padding: 8px 40px 8px 20px;
        border: none !important;
        background-color: #CC9305;
        border-radius: 10px;
        color: #fff;
        font-weight: bold !important;
        width: 100% !important;
    }
    .btn-cek-dokumen:hover {
        background-color: #E59B30 !important;
        color: #fff !important;
        font-weight: bold !important;
    }
    .btn-disetujui {
        width: fit-content !important;
        border: none !important;
        padding: 3px 8px !important;
        border-radius: 8px !important;
        color: white;
        background-color: #47A15E !important;
    }
    .btn-ditolak {
        width: fit-content !important;
        border: none !important;
        padding: 3px 7px !important;
        border-radius: 8px !important;
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
        transition: all 0.3s ease;
    }
    .btn-setuju {
        min-width: 100px;
        padding: 8px!important;
        border: none !important;
        border-radius: 15px !important;
        color: white !important;
        background-color: #47A15E !important;
    }
    .btn-tidak {
        min-width: 100px;
        padding: 8px !important;
        border: none !important;
        border-radius: 15px !important;
        color: white !important;
        background-color: #D12B2B !important;
    }
    .btn-setuju:hover,
    .btn-tidak:hover {
        font-weight: bold !important;
    }
    .fa-download:hover {
        transform: scale(110%, 110%);
        transition: all 0.3s ease;
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

<!-- Modal Cek Dokumen -->
<div class="modal fade" id="ubahKonfigurasi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" style="width: 100%;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body" style="padding-block: 100px;">
                <div class="d-flex flex-column align-items-center">
                    <h1 class="mb-1" style="font-family: 'Josefin Sans', sans-serif; font-size: 36px; font-weight: bold; color: black;">Dokumen Peserta Telah Selesai</h1>
                    <p style="color: #2B2B28;">Klik di bawah untuk melanjutkan ke tahap Desk Evaluation</p>
                    <div class="d-flex gap-3 mt-2">
                        <button class="btn btn-setuju">Setuju</button>
                        <button class="btn btn-tidak" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Cek Dokumen End-->
{{-- Modal --}}
@foreach ($registrasi_dokumen as $key=>$rd)
    <div class="modal fade" id="setujuDokumen{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                Dengan menekan tombol <b>"Ya"</b>, Anda <b>menyetujui</b> dokumen terkait.
                Dokumen yang telah <b>disetujui</b> tidak bisa <b>ditolak</b> atau <b>diubah</b> kembali. <br><br>
                Apakah Anda yakin ingin <b>menyetujui</b> dokumen ini?
            </div>
            <div class="modal-footer">
                <form action="{{ route('evaluator.sekretariat.detail.dokumen.persetujuan', $rd->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="persetujuan_dokumen" value="disetujui" class="d-none">
                    <button type="submit" class="btn-yes">Ya</button>
                </form>
                <button type="button" class="btn-no" data-bs-dismiss="modal">Tidak</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tolakDokumen{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Dengan menekan tombol <b>"Ya"</b>, Anda <b>menolak</b> dokumen terkait. <br>
                Dokumen yang telah <b>ditolak</b> tidak bisa <b>disetujui</b> atau <b>diubah</b> kembali. <br><br>
                Apakah Anda yakin ingin <b>menolak</b> dokumen ini?
            </div>
            <div class="modal-footer">
                <form action="{{ route('evaluator.sekretariat.detail.dokumen.persetujuan', $rd->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="persetujuan_dokumen" value="ditolak" class="d-none">
                    <button type="submit" class="btn-yes">Ya</button>
                </form>
                <button type="button" class="btn-no" data-bs-dismiss="modal">Tidak</button>
            </div>
            </div>
        </div>
    </div>
@endforeach
{{-- end Modal --}}

{{-- dokumen --}}
<div class="content-profil py-5 mb-5">
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="d-flex align-items-center mb-5">

            <div class="progress flex-grow-1" style="height: 10px; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                <div class="progress-bar" role="progressbar" style="width: 25%; background-color: #E59B30;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- <div class="progress flex-grow-1" style="height: 10px; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                <div class="progress-bar" role="progressbar" style="width: 100%; background-color: #47A15E;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->
            
            <div class="container-kategori-select">
                <!-- <select name="assessment_kategori" id="" class="kategori-select" style="background-color: #E59B30; font-family: 'Josefin Sans', sans-serif; font-size: 20px;">
                </select> -->
                <button data-bs-toggle="modal" data-bs-target="#ubahKonfigurasi" class="btn btn-cek-dokumen" style="background-color: #E59B30; font-family: 'Josefin Sans', sans-serif; font-size: 20px;">
                    Cek Dokumen
                </button>
            </div>
            <!-- <div class="container-kategori-select">
                <select name="assessment_kategori" id="" class="kategori-select" style="background-color: #47A15E; font-family: 'Josefin Sans', sans-serif; font-size: 20px;">
                    <option value="0" selected class="kategori-option">Desk Evaluation</option>
                    <option value="1" class="kategori-option">One</option>
                    <option value="2" class="kategori-option">Two</option>
                    <option value="3" class="kategori-option">Three</option>
                </select>
            </div> -->
        </div>

        <!-- <div class="d-flex align-items-center gap-3 mb-5">
            <label class="fs-4 fw-bold">Dokumen</label>
            <hr style="width: 100%; height: 1px; background-color: #CC9305;">    
        </div> -->
        
        <div class="d-flex justify-content-end pe-5">
            <div>
                <label class="fw-bold">Aksi</label>
            </div>
        </div>
        <div>
            <div class="d-flex align-items-center justify-content-between">
                <label class="fw-bold">Dokumen Assessment</label>
                <hr style="width: 72%; height: 1px; background-color: #9FAFBF;">
            </div>
            <div class="mt-2">
                @method('PUT')
                @csrf
                @foreach ($dokumen as $dok)
                    <div class="d-flex align-items-center justify-content-between ps-4">
                        <div>
                            <label style="color: #000000;">{{$dok->nama}}</label>
                        </div>
                        <div class="p-2">
                            @php
                                $statusColor = '';
                            @endphp
                            @foreach ($registrasi_dokumen as $key=>$rd)

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
                                    <div class="d-flex align-items-center justify-content-center">
                                        @if ($rd->status != 'proses')
                                            <div class="d-flex justify-content-center border-0  text-white" style="padding-block: 0.2rem; border-radius: 10px; min-width: 95px !important; background-color: {{ $statusColor }}">{{ $rd->status }}</div>
                                        @else
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                <button type="button" class="btn-disetujui" data-bs-toggle="modal" data-bs-target="#setujuDokumen{{ $key }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Setujui dokumen">&#x2714;</button>
                                                <button type="button" class="btn-ditolak" data-bs-toggle="modal" data-bs-target="#tolakDokumen{{ $key }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tolak dokumen">&#x2716;</button>
                                            </div>
                                        @endif
    
                                        <a href="{{ $rd->url_dokumen }}" target="_blank" style="text-decoration: none; margin-left: 10px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Unduh dokumen">
                                            <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                                        </a>
                                    </div>
                                    
                                    @break
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
                
            </div>
            <br>
            <div class="d-flex align-items-center justify-content-between">
                <label class="fw-bold">Dokumen Profil</label>
                <hr style="width: 72%; height: 1px; background-color: #9FAFBF;">
            </div>
            <div class="ps-4 mt-2">
                {{-- @if ($peserta->peserta_profil && $registrasi && count($registrasi->registrasi_dokumen)!== 0) --}}
                    @if ($peserta->peserta_profil->url_legalitas_hukum_organisasi)
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-3">
                                <label>Akte / NIB / TDP</label>
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
                                <label>SPPT SNI / Sertifikat SNI</label>
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
                    {{-- @if ($peserta->peserta_profil->url_kewenangan_kebijakan)
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
                    @endif --}}
                {{-- @endif --}}
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
                    <div class="chat-text" id="chat-text">
                        {!! $registrasi_dokumen[0]->feedback !!}
                    </div>
                @endif
            </div>
            <form action="{{ route('evaluator.sekretariat.detail.dokumen.send_feedback', request()->registrasi_id) }}" method="POST" class="chat-input mt-4">
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