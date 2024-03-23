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
    
  <!-- Dokumen Section -->
  <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
    <div class="content-profil py-5 mb-5">
      <div class="container mt-4">
        <table class="table">
          <thead>
          <tr>
            <th scope="col">Nama Lampiran</th>
            <th class="text-center" scope="col">Aksi</th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">Upload Kuesioner</td>
              <td class="text-center"><button class="btn btn-upload">Upload</button></td>
            </tr>
            <tr>
              <td scope="row">Lembar Pernyataan Tidak Terlibat Kasus Hukum</td>
              <td class="text-center"><button class="btn btn-upload">Upload</button></td>
            </tr>          
          </tbody>
        </table>
        <div class="mt-5 me-2 px-5 py-4 d-flex justify-content-end gap-3">
          <button type="submit" class="btn nonactive" style="width: 13%;">Batal</button>
          <button type="submit" class="btn" style="width: 13%;">Simpan</button>
        </div>
      </div>

      
    </div>
</div>
@endsection('content')
