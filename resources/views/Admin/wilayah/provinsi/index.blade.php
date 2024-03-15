@extends('admin.layouts.master')

@section('content')

<!-- Pop up provinsi -->
<!-- popup tambah -->
<div class="modal fade" id="tambahProvinsi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" method="POST" action="/admin/wilayah">
      @csrf
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Provinsi</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <div action="" class="pb-0 mb-0">
          <div class="d-flex flex-column gap-2 mb-3">
              <h6 class="ms-1 mb-0">Wilayah Provinsi</h6>
              <input name="name" type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Provinsi" style="font-size: 100%;"/>
          </div>
          <div class="d-flex flex-column gap-2 pb-5">
              <h6 class="ms-1 mb-0">Kategori Daerah</h6>
              <select class="form-select form-control-lg ps-4" id="basic-usage" style="z-index: 9999;">
                <option hidden>Pilih Provinsi</option>
                <option>Reactive</option>
                <option>Solution</option>
                <option>Conglomeration</option>
                <option>Algoritm</option>
                <option>Holistic</option>
              </select>
              <!-- <input type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Daerah Kabupaten/Kota" style="font-size: 100%;"/> -->
          </div>
          
        </div>
      </div>
      <div class="modal-footer gap-2" style="border: none;">
        <div class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</div>
        <button type="submit" class="btn" data-bs-toggle="modal" >Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- pop up ubah provinsi -->
<div class="modal fade" id="ubahProvinsi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" id="form_ubah_provinsi" method="POST">
      @method('PUT')
      @csrf
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Provinsi</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <div action="" class="pb-0 mb-0">
          <div class="d-flex flex-column gap-2">
              <h6 class="ms-1 mb-0">Provinsi</h6>
              <input type="text" id="nama_provinsi" name="name" class="form-control form-control-lg ps-4" style="font-size: 100%;"/>
          </div>
        </div>
      </div>
      <div class="modal-footer gap-2" style="border: none;">
        <div class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</div>
        <button type="submit" class="btn" data-bs-toggle="modal">Ubah</button>
      </div>
    </form>
  </div>
</div>

<!-- pop up hapus provinsi -->
<div class="modal fade" id="hapusProvinsi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" id="form_hapus_provinsi" method="POST">
      @method('DELETE')
      @csrf
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Provinsi</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <p>Apakah Anda yakin menghapus item ini?</p>
      </div>
      <div class="modal-footer gap-2" style="border: none;">
        <div class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Tidak</div>
        <button type="submit" class="btn" data-bs-toggle="modal">Ya</button>
      </div>
    </form>
  </div>
</div>


<!-- Pop up kabupaten/kota -->
<div class="modal fade" id="tambahSubKategori" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Kabupaten/Kota</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <form action="" class="d-flex flex-column gap-2 pb-0 mb-0">
          <div class="d-flex flex-column gap-2 mb-3">
            <h6 class="ms-1 mb-0">Wilayah Provinsi</h6>
            <select class="form-select form-control-lg ps-4" aria-label="Default select example" aria-label="Default select example">
              <option hidden>Pilih Provinsi</option>
              <option value="1">Kepemimpinan</option>
              <option value="2">Strategi</option>
              <option value="3">Pelanggan</option>
              <option value="4">dan lain-lain..</option>
            </select>
          </div>
          <div class="d-flex flex-column gap-2 mb-3">
            <h6 class="ms-1 mb-0">Kategori Daerah</h6>
            <select name="selectKategoriDaerah[]" class="form-select form-control-lg ps-4" multiple=multiple aria-label="Default select example">
              <option hidden>Pilih Kabupaten/Kota</option>
              <option value="1">Kepemimpinan</option>
              <option value="2">Strategi</option>
              <option value="3">Pelanggan</option>
              <option value="4">dan lain-lain..</option>
            </select>
          </div>
          <div class="d-flex flex-column gap-2">
            <h6 class="ms-1 mb-0">Nama Daerah</h6>
            <input type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Daerah" style="font-size: 100%;"/>
          </div>
        </form>
      </div>
      <div class="modal-footer gap-2" style="border: none;">
        <button class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
        <button class="btn" data-bs-toggle="modal" >Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Pop up kecamatan -->
<div class="modal fade" id="tambahPertanyaan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Kecamatan</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <form action="" class="d-flex flex-column gap-2 pb-0 mb-0">
          <div class="d-flex flex-column gap-2 mb-3">
            <h6 class="ms-1 mb-0">Wilayah Provinsi</h6>
            <select class="form-select form-control-lg ps-4" aria-label="Default select example">
              <option hidden class="selected">Pilih Provinsi</option>
              <option value="1">Kepemimpinan</option>
              <option value="2">Strategi</option>
              <option value="3">Pelanggan</option>
              <option value="4">dan lain-lain..</option>
            </select>
          </div>
          <div class="d-flex flex-column gap-2 mb-3">
            <h6 class="ms-1 mb-0">Kategori Daerah</h6>
            <select class="form-select form-control-lg ps-4" aria-label="Default select example">
              <option hidden class="selected">Pilih Kabupaten/Kota</option>
              <option value="1">Kepemimpinan</option>
              <option value="2">Strategi</option>
              <option value="3">Pelanggan</option>
              <option value="4">dan lain-lain..</option>
            </select>
          </div>
          <div class="d-flex flex-column gap-2 mb-3">
            <h6 class="ms-1 mb-0">Nama Daerah</h6>
            <select class="form-select form-control-lg ps-4" aria-label="Default select example">
              <option hidden class="selected">Pilih Daerah Kabupaten/Kota</option>
              <option value="1">Kepemimpinan</option>
              <option value="2">Strategi</option>
              <option value="3">Pelanggan</option>
              <option value="4">dan lain-lain..</option>
            </select>
          </div>
          <div class="d-flex flex-column gap-2">
            <h6 class="ms-1 mb-0">Kecamatan</h6>
            <input type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Kecamatan" style="font-size: 100%;"/>
          </div>

        </form>
      </div>
      <div class="modal-footer gap-2" style="border: none;">
        <button class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
        <button class="btn" data-bs-toggle="modal" >Simpan</button>
      </div>
    </div>
  </div>
</div>

<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Provinsi</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false" tabindex="-1">Kabupaten/Kota</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false" tabindex="-1">Kecamatan</a>
  </li>
</ul>
<hr class="p-0">


<!-- Kategori Section -->
<div class="tab-content" id="tab-content">
  <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
    <div class="content-profil py-5">
      <!-- <select class="form-select form-control-lg ps-4" id="basic-usage">
        <option hidden>Pilih Provinsi</option>
          <option>Reactive</option>
          <option>Solution</option>
          <option>Conglomeration</option>
          <option>Algoritm</option>
          <option>Holistic</option>
      </select> -->
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Provinsi</h3>
        <a href="#tambahProvinsi" class="btn" data-bs-toggle="modal" role="button">+ Tambah Provinsi</a>
      </div>
        <div class="container mt-4">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Provinsi</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($provinsi as $data)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ $data->name }}</td>
      <td>
        <div class="d-flex justify-content-center gap-2">
          <button onclick="openModalUbahProvinsi('{{ $data->id }}', '{{ $data->name }}')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
          <button onclick="openModalHapusProvinsi('{{ $data->id }}', '{{ $data->name }}')" class="btn btn-hapus">Hapus</button>
        </div>
      </td>
    </tr>
    @endforeach

    <div id="hidden-data" style="display: none">
      <input type="hidden" id="id_provinsi">
      <input type="hidden" id="nama_provinsi">
    </div>

  </tbody>
</table>
        </div>
    </div>
  </div>
    
  <!-- Kabupaten/Kota Section -->
<div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
  <div class="content-profil py-5">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Kabupaten/Kota</h3>
      <a href="#tambahSubKategori" class="btn" data-bs-toggle="modal" role="button">+ Tambah Kabupaten/Kota</a>
    </div>
      <div class="container mt-4">
        <table class="table">
          <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Provinsi</th>
            <th scope="col">Kategori Daerah</th>
            <th scope="col">Nama Daerah</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Jawa Barat</td>
              <td>Kabupaten</td>
              <td>Bandung Well</td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <button class="btn btn-ubah">Ubah</button>
                  <button class="btn btn-hapus">Hapus</button>
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jawa Timur</td>
              <td>Kabupaten</td>
              <td>Surabaya</td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <button class="btn btn-ubah">Ubah</button>
                  <button class="btn btn-hapus">Hapus</button>
                </div>
              </td>
              
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Jawa Tengah</td>
              <td>Kota</td>
              <td>Semarang</td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <button class="btn btn-ubah">Ubah</button>
                  <button class="btn btn-hapus">Hapus</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</div>

<!-- Kecamatan Section -->
<div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
  <div class="content-profil py-5">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Kecamatan</h3>
      <a href="#tambahPertanyaan" class="btn" data-bs-toggle="modal" role="button">+ Tambah Kecamatan</a>
    </div>
      <div class="container mt-4">
        <table class="table">
          <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Data Provinsi</th>
            <th scope="col">Daerah Provinsi</th>
            <th scope="col">Kecamatan</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Jawa Barat</td>
              <td>Kabupaten Bandung</td>
              <td>Bandung Barat</td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <button class="btn btn-ubah">Ubah</button>
                  <button class="btn btn-hapus">Hapus</button>
                </div>
              </td>
            </tr>

            <tr>
              <th scope="row">2</th>
              <td>Jawa Timur</td>
              <td>Kabupaten Surabaya</td>
              <td>Surabaya</td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <button class="btn btn-ubah">Ubah</button>
                  <button class="btn btn-hapus">Hapus</button>
                </div>
              </td>
            </tr>

            <tr>
              <th scope="row">3</th>
              <td>Jawa Tengah</td>
              <td>Kota Semarang</td>
              <td>Genuk</td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <button class="btn btn-ubah">Ubah</button>
                  <button class="btn btn-hapus">Hapus</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</div>
</div>
</div>
@endsection('content')