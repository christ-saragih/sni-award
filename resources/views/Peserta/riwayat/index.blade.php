@extends('peserta.layouts.master')

@section('content')
<div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
<div class="content-profil">
  <div class="container mt-4 py-3">
    <table class="table">
      <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tahun</th>
        <th scope="col">Status</th>
        <th scope="col">State</th>
        <th scope="col">Kategori</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>2023</td>
          <td>Aktif</td>
          <td>Stage</td>
          <td>Organisasi</td>
          <td class="text-center">
            <div class="btn-group dropend">
              <button class="button-detail" type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Penilaian</a></li>
                <li><a class="dropdown-item" href="#">Tim</a></li>
                <li><a class="dropdown-item" href="#">Assesment</a></li>
                <li><a class="dropdown-item" href="#">Dokumen</a></li>
              </ul>
            </div>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>2023</td>
          <td>Aktif</td>
          <td>Stage</td>
          <td>Organisasi</td>
          <td class="text-center">
            <div class="btn-group dropend">
              <button class="button-detail" type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Penilaian</a></li>
                <li><a class="dropdown-item" href="#">Tim</a></li>
                <li><a class="dropdown-item" href="#">Assesment</a></li>
                <li><a class="dropdown-item" href="#">Dokumen</a></li>
              </ul>
            </div>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>2023</td>
          <td>Aktif</td>
          <td>Stage</td>
          <td>Organisasi</td>
          <td class="text-center">
            <div class="btn-group dropend">
              <button class="button-detail" type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Penilaian</a></li>
                <li><a class="dropdown-item" href="#">Tim</a></li>
                <li><a class="dropdown-item" href="#">Assesment</a></li>
                <li><a class="dropdown-item" href="#">Dokumen</a></li>
              </ul>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
<div class="btn-group dropend">
  <button type="button" class="btn btn-secondary">
    Split dropend
  </button>
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropright</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
@endsection
