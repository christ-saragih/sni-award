<style>
  .chat {
        display: flex;
        align-items: center;
        height: fit-content;
        border-left: 4px solid #CC9305;
    }
    .chat-text {
        width: fit-content;
        background-color: #D9D9D9;
        border-radius: 0 15px 15px 0;
        padding: 10px 20px;
    }

    a.btn {
        color: white;
        padding-block: 0.1rem !important;
        padding-inline: 0 !important;
        border-radius: 10px;
        min-width: 95px !important;
        pointer-events: none;
    }
</style>

<div class="content-profil py-5 mb-5">
    <div class="container mt-4">
      <div class="row g-3 align-items-center mt-2">
        @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
        @endif
        <div class="col-3">
          <label class="fw-bold">Nama Lampiran</label>
        </div>
        <div class="col-6">
          <label class="fw-bold">Lampiran</label>
        </div>
        <div class="col-1 d-flex justify-content-center">
          <label class="fw-bold" style="margin-left: 25px;">Aksi</label>
        </div>
        <div class="col-2 d-flex justify-content-center">
          <label class="fw-bold">Status</label>
        </div>
        
      </div>
        <br>
        <hr class="mb-2" style="width: 100%; height: 1px; background-color: #9FAFBF">
          <form action="{{ route('peserta.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            @if(count($test) == 0)

              @foreach ($dokumen as $dok)
              <div class="row align-items-center mt-3">
                  <div class="col-3">
                      <label class="fw-bold">{{$dok->nama}}</label>
                  </div>
                  
                      @php
                          $statusColor = '';
                          $dokumen_assessment = $registrasi_dokumen ? $registrasi_dokumen->where('dokumen_id', $dok->id)->last() : null;
                          $dokumen_disetujui = false;
                          if ($dokumen_assessment) {
                            $status_dokumen = $dokumen_assessment->status;
                            $dokumen_disetujui = $status_dokumen == 'disetujui';
                          }                        
                      @endphp
                      
                      <div class="col-6">
                        <input type="file" name="url_dokumen[]" accept=".pdf" class="form-control" id="uploadDokumen">
                      </div>

                      <div class="col-1"></div>
                      <div class="col-2"></div>                    
              </div>
              @endforeach
            @else
              @foreach($test as $td)
              <div class="row align-items-center mt-3">
                <div class="col-3">
                    <label class="fw-bold">{{$td->nama}}</label>
                </div>
                    @php
                        $statusColor = '';
                        $dokumen_assessment = $registrasi_dokumen ? $registrasi_dokumen->where('dokumen_id', $td->id)->last() : null;
                        $dokumen_disetujui = false;
                        if ($dokumen_assessment) {
                          $status_dokumen = $dokumen_assessment->status;
                          $dokumen_disetujui = $status_dokumen == 'disetujui';
                        }                      
                    @endphp
                    @if($td->status != 'disetujui')
                      <div class="col-6">
                        <input type="file" name="url_dokumen[]" accept=".pdf" class="form-control" id="uploadDokumen">
                      </div>
                    @endif
                    @switch ($td->status)
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
                        @if($td->url_dokumen != NULL)
                          <div class="col-1 d-flex justify-content-center">
                            <a href="{{ $td->url_dokumen }}" target="_blank" style="text-decoration: none; margin-left: 25px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Unduh dokumen">
                              <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                            </a>
                          </div>
                          <div class="col-2 d-flex justify-content-center">
                            <a class="btn" style="background-color: {{ $statusColor }};">{{ $td->status }}</a>
                          </div>
                        @endif                                      
                </div>
              @endforeach
            @endif
            <div class="row g-3 justify-content-end mt-2">
                <button type="submit" style="width: 100px; padding: 5px 10px; background-color: #552525; color: #fff; border-radius: 10px; border-color: #C17D2D">Simpan</button>
            </div>
          </form>
          <br>
          <div class="d-flex align-items-center gap-5">
              <label class="fw-bold">Dokumen Profil</label>
              <hr class="flex-grow-1" style="height: 1px; background-color: #9FAFBF;">
          </div>
            {{-- @if ($peserta->peserta_profil && $registrasi && count($registrasi->registrasi_dokumen)!== 0) --}}
              @if ($peserta->peserta_profil->url_legalitas_hukum_organisasi)
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <div>
                    <label class="fw-bold">Akte / NIB / TDP</label>
                  </div>
                  <div class="d-flex justify-content-center">
                      <a href="{{ $peserta->peserta_profil->url_legalitas_hukum_organisasi }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Unduh dokumen">
                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                    </a>
                  </div>
                </div>
              @endif
              @if ($peserta->peserta_profil->url_sppt_sni)
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <div>
                    <label class="fw-bold">SPPT SNI / Sertifikat SNI</label>
                  </div>
                  <div class="d-flex justify-content-center">
                      <a href="{{ $peserta->peserta_profil->url_sppt_sni }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Unduh dokumen">
                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                    </a>
                  </div>
                </div>
              @endif
              @if ($peserta->peserta_profil->url_sk_kemenkumham)
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <div>
                    <label class="fw-bold">SK Kemenkumham</label>
                  </div>
                  <div class="d-flex justify-content-center">
                      <a href="{{ $peserta->peserta_profil->url_sk_kemenkumham }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Unduh dokumen">
                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                    </a>
                  </div>
                </div>
              @endif
              @if ($peserta->peserta_profil->url_kewenangan_kebijakan)
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <div>
                    <label class="fw-bold">Kewenangan Kebijakan</label>
                  </div>
                  <div class="d-flex justify-content-center">
                      <a href="{{ $peserta->peserta_profil->url_kewenangan_kebijakan }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Unduh dokumen">
                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                    </a>
                  </div>
                </div>
              @endif
            {{-- @endif --}}
            
    </div>
  </div>
</div>

{{-- feedback --}}
@if (request()->query('tab') == 'dokumen')
  <hr>
  <div class="content-profil p-5 bg-white" style="border-radius: 15px;">
      <div class="d-flex align-items-center gap-3 mb-5">
          <label class="fs-4 fw-bold">Feedback</label>
          <hr class="flex-grow-1" style="height: 1px; background-color: #CC9305;">
      </div>
      
      <div style="
          padding: 30px;
          border: 2px solid #9FAFBF;
          border-radius: 15px;
      ">
          <div>
              <div class="chat d-flex flex-column align-items-start gap-2">
                  @if (count($registrasi_dokumen) != 0)
                      <div class="chat-text" id="chat-text">
                          {!! $registrasi_dokumen[0]->feedback !!}
                      </div>
                  @endif
              </div>
          </div>
      </div>
  </div>
@endif
{{-- end feedback --}}