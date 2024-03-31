@extends('peserta.layouts.master')

@section('content')
<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Assessment</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Dokumen</a>
    </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
    <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
        <div class="content-profil py-5" id="pendaftaran">
        <h3 class="mb-5 pb-0" style="font-size: 200%; font-weight: bold; color: #2b2b2b;">Self Assesment</h3>
            <div class="card-container mt-4 d-flex flex-wrap justify-content-between gap-5">
            @foreach ($assessment_kategori as $ak)
            <a href="{{route('pendaftaran.detail',$ak->id)}}" class="card" style="text-decoration: none">
                {{$ak->nama}}
                <div class="ceklis-container">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
                </div>
            </a>
            @endforeach
            </div>
        </div>
    </div>
  </div>
    
  <!-- Dokumen Section -->
  <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
    <div class="content-profil py-5 mb-5">
      <div class="container mt-4">
        <div class="row g-3 align-items-center mt-2">
          <div class="col-3">
            <label class="fw-bold">Nama Lampiran</label>
          </div>
          <div class="col-9">
            <label class="fw-bold">Aksi</label>
          </div>
        </div>
          <br>
          <hr style="width: 100%; height: 5px; color: grey">
            <form action="{{ route('peserta.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @foreach ($dokumen as $dok)
                <div class="row g-3 align-items-center mt-2">
                  <div class="col-3">
                    <label class="fw-bold">{{$dok->nama}}</label>
                  </div>
                  <div class="col-9">
                    <input type="file" name="url_dokumen[]" accept=".pdf" class="form-control" id="uploadDokumen">
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
            <form action="{{route('pendaftaran.dokumen') }}" method="GET">
              @foreach ($pesertaProfil as $pp)
                <div class="row g-3 align-items-center mt-2">
                  <div class="col-3">
                    <label class="fw-bold">{{$pp->nama}}</label>
                  </div>
                  {{-- <div class="col-9">
                    <input type="file" name="url_dokumen[]" accept=".pdf" class="form-control" id="uploadDokumen">
                  </div> --}}
                </div>
              @endforeach
            </form>
      </div>
    </div>
</div>
@endsection('content')
