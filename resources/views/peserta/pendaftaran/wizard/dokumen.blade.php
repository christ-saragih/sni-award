<div class="content-profil py-5 mb-5">
    <div class="container mt-4">
      <div class="row g-3 align-items-center mt-2">
        <div class="col-3">
          <label class="fw-bold">Nama Lampiran</label>
        </div>
        <div class="col-6">
        </div>
        <div class="col-3">
          <label class="fw-bold">Aksi</label>
        </div>
      </div>
        <br>
        <hr style="width: 100%; height: 5px; color: grey">
          <form action="{{ route('peserta.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @foreach ($dokumen as $dok)
              @php
                  $processed = false; // Inisialisasi variabel boolean
              @endphp
              <div class="row g-3 align-items-center mt-2">
                  <div class="col-3">
                      <label class="fw-bold">{{$dok->nama}}</label>
                  </div>
                  <div class="col-6">
                      <input type="file" name="url_dokumen[]" accept=".pdf" class="form-control" id="uploadDokumen">
                  </div>
                  <div class="col-3">
                    @foreach ($registrasi_dokumen as $i=>$rd)
                      @if ($rd->dokumen_id == $dok->id)
                        @php
                          $statusColor = '';
                          switch ($rd->status) {
                            case 'proses':
                                $statusColor = 'bg-warning';
                                $processed = true; // Set variabel boolean menjadi true jika status "diproses" ditemukan
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
                      @endif
                    @endforeach --}}
                  {{-- Tampilkan kotak "diproses" hanya jika ada file yang diunggah dan statusnya "diproses" --}}
                  {{-- @if ($processed && $dok->registrasi_dokumen)
                      @if ($dok->registrasi_dokumen->url_dokumen)
                          <a class="btn {{ $statusColor }}">{{ $dok->registrasi_dokumen->status}}</a>
                      @endif
                  @endif
              </div>
          </div>
          @endforeach --}}
          @foreach ($dokumen as $dok)
          <div class="row g-3 align-items-center mt-2">
              <div class="col-3">
                  <label class="fw-bold">{{$dok->nama}}</label>
              </div>
              <div class="col-6">
                  <input type="file" name="url_dokumen[]" accept=".pdf" class="form-control" id="uploadDokumen">
              </div>
              <div class="col-3">
                  @php
                      $statusColor = '';
                  @endphp
                  @foreach ($registrasi_dokumen as $rd)
                      @if ($rd->dokumen_id == $dok->id)
                          @switch ($rd->status)
                              @case ('proses')
                                  @php $statusColor = 'bg-warning'; @endphp
                                  @break
                              @case ('ditolak')
                                  @php $statusColor = 'bg-danger'; @endphp
                                  @break
                              @case ('disetujui')
                                  @php $statusColor = 'bg-success'; @endphp
                                  @break
                          @endswitch
                          <a class="btn {{ $statusColor }}">{{ $rd->status }}</a>
                          @break
                      @endif
                  @endforeach
              </div>
          </div>
      @endforeach


        {{-- <div class="row g-3 align-items-center mt-2">
            <div class="col-3">
                <label class="fw-bold">Lembar Pernyataan Tidak Terlibat Kasus Hukum</label>
            </div>
            <div class="col-9">
                <input type="file" name="url_dokumen" class="form-control">
            </div>
        </div> --}}
            <div class="row g-3 justify-content-end mt-2">
                {{-- <a href="/admin/berita" role="button" class="btn col-auto me-4" style="width: 100px; padding: 5px 10px; background-color: #fff; color: #C17D2D; ">Batal</a> --}}
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
                      <a href="/storage{{ $peserta->peserta_profil->url_legalitas_hukum_organisasi }}" target="_blank">
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
                      <a href="/storage{{ $peserta->peserta_profil->url_sppt_sni }}" target="_blank">
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
                      <a href="/storage{{ $peserta->peserta_profil->url_sk_kemenkumham }}" target="_blank">
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
                      <a href="/storage{{ $peserta->peserta_profil->url_kewenangan_kebijakan }}" target="_blank">
                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                    </a>
                  </div>
                </div>
              @endif
            @endif
            
    </div>
  </div>