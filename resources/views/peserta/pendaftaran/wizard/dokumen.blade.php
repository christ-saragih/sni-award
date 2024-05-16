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
        <div class="col-9">
          <label class="fw-bold">Aksi</label>
        </div>
      </div>
        <br>
        <hr style="width: 100%; height: 5px; color: grey">
          <form action="{{ route('peserta.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            @if(count($test) == 0)

              @foreach ($dokumen as $dok)
              <div class="row g-3 align-items-center mt-2">
                  <div class="col-3">
                      <label class="fw-bold">{{$dok->nama}}</label>
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
                          // dd($registrasi_dokumen->where('dokumen_id', $dok->id)->last()->status);
                      @endphp
                      
                      <div class="col-9">
                        <input type="file" name="url_dokumen[]" accept=".pdf" class="form-control" id="uploadDokumen">
                      </div>
                      {{-- @foreach ($registrasi_dokumen as $rd)
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
                            <a href="{{ $rd->url_dokumen }}" target="_blank" style="text-decoration: none; margin-right: 10px;">
                              <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                            <a class="btn {{ $statusColor }}">{{ $rd->status }}</a>
                          </div>
                          @break
                        @endif
                      @endforeach --}}
                  </div>
              </div>
              @endforeach
            @else
              @foreach($test as $td)
              <div class="row g-3 align-items-center mt-2">
                <div class="col-3">
                    <label class="fw-bold">{{$td->nama}}</label>
                </div>
                <div class="row col-9">
                    @php
                        $statusColor = '';
                        $dokumen_assessment = $registrasi_dokumen ? $registrasi_dokumen->where('dokumen_id', $td->id)->last() : null;
                        $dokumen_disetujui = false;
                        if ($dokumen_assessment) {
                          $status_dokumen = $dokumen_assessment->status;
                          $dokumen_disetujui = $status_dokumen == 'disetujui';
                        }
                        // dd($registrasi_dokumen->where('dokumen_id', $dok->id)->last()->status);
                    @endphp
                    @if($td->status != 'disetujui')
                      <div class="col-9">
                        <input type="file" name="url_dokumen[]" accept=".pdf" class="form-control" id="uploadDokumen">
                      </div>
                    @endif
                    @switch ($td->status)
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
                          @if($td->url_dokumen != NULL)
                            <a href="{{ $td->url_dokumen }}" target="_blank" style="text-decoration: none; margin-right: 10px;">
                              <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                              <a class="btn {{ $statusColor }}">{{ $td->status }}</a>
                          @endif
                        </div>
                    {{-- @foreach ($registrasi_dokumen as $rd)
                      @if ($rd->dokumen_id == $dok->id)
                        
                        @break
                      @endif
                    @endforeach --}}
                </div>
            </div>
              @endforeach
            @endif
            <div class="row g-3 justify-content-end mt-2">
                <button type="submit" style="width: 100px; padding: 5px 10px; background-color: #552525; color: #fff; border-radius: 10px; border-color: #C17D2D">Simpan</button>
            </div>
          </form>
          <br>
          <div class="row">
            <div class="col-2">
              <label class="fw-bold">Dokumen Profil</label>
            </div>
            <div class="col-9">
              <br>
              <hr style="width: 110%; height: 5px">
            </div>
          </div>
            @if ($peserta->peserta_profil && $registrasi && count($registrasi->registrasi_dokumen)!== 0)
              @if ($peserta->peserta_profil->url_legalitas_hukum_organisasi)
                <div class="row g-3 align-items-center mt-2">
                  <div class="col-3">
                    <label class="fw-bold">Legalitas Hukum Organisasi</label>
                  </div>
                  <div class="col-9">
                      <a href="{{ $peserta->peserta_profil->url_legalitas_hukum_organisasi }}" target="_blank">
                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                    </a>
                  </div>
              @endif
              @if ($peserta->peserta_profil->url_sppt_sni)
                <div class="row g-3 align-items-center mt-2">
                  <div class="col-3">
                    <label class="fw-bold">SPPT SNI</label>
                  </div>
                  <div class="col-9">
                      <a href="{{ $peserta->peserta_profil->url_sppt_sni }}" target="_blank">
                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                    </a>
                  </div>
                </div>
              @endif
              @if ($peserta->peserta_profil->url_sk_kemenkumham)
                <div class="row g-3 align-items-center mt-2">
                  <div class="col-3">
                    <label class="fw-bold">SK Kemenkeuham</label>
                  </div>
                  <div class="col-9">
                      <a href="{{ $peserta->peserta_profil->url_sk_kemenkumham }}" target="_blank">
                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                    </a>
                  </div>
                </div>
              @endif
              @if ($peserta->peserta_profil->url_kewenangan_kebijakan)
                <div class="row g-3 align-items-center mt-2">
                  <div class="col-3">
                    <label class="fw-bold">Kewenangan Kebijakan</label>
                  </div>
                  <div class="col-9">
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

{{-- feedback --}}
@if (request()->query('tab') == 'dokumen')
  <hr>
  <div class="content-profil p-5 bg-white" style="border-radius: 15px;">
      <div class="row mb-5">
          <div class="col-2">
              <label class="fs-4 fw-bold">Feedback</label>
          </div>
          <div class="col-10">
              <br>
              <hr style="width: 100%; height: 1px; background-color: #CC9305;">
          </div>
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