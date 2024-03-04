@extends('admin.layouts.master')

@section('content')

<!-- Status Kepemilikan Section -->
<!-- pop up tambah -->
<div class="modal fade" id="tambahStatusKepemilikan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Status Kepemilikan</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <form action="" class="pb-0 mb-0">
          <div class="d-flex flex-column gap-2">
              <h6 class="ms-1 mb-0">Status Kepemilikan</h6>
              <input type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Status Kepemilikan" style="font-size: 100%;"/>
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

<!-- pop up ubah -->
<div class="modal fade" id="ubahKategori" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Status Kepemilikan</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <form action="" class="pb-0 mb-0">
          <div class="d-flex flex-column gap-2">
              <h6 class="ms-1 mb-0">Status Kepemilikan</h6>
              <input type="text" class="form-control form-control-lg ps-4" placeholder="Ubah Status Kepemilikan" style="font-size: 100%;"/>
          </div>
        </form>
      </div>
      <div class="modal-footer gap-2" style="border: none;">
        <button class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
        <button class="btn" data-bs-toggle="modal" >Ubah</button>
      </div>
    </div>
  </div>
</div>

<!-- pop up delete -->
<div class="modal fade" id="hapusKategori" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Hapus Status Kepemilikan</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <form action="" class="pb-0 mb-0">
          <div class="d-flex flex-column gap-2">
              <h6 class="ms-1 mb-0">Status Kepemilikan</h6>
              <input type="text" class="form-control form-control-lg ps-4" placeholder="Hapus Status Kepemilikan" style="font-size: 100%;"/>
          </div>
        </form>
      </div>
      <div class="modal-footer gap-2" style="border: none;">
        <button class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
        <button class="btn" data-bs-toggle="modal" >Hapus</button>
      </div>
    </div>
  </div>
</div>

<!-- Status Kepunyaanmu Section -->
<!-- pop up tambah -->
<div class="modal fade" id="tambahStatusKepunyaan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Status Kepunyaanmu</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <form action="" class="pb-0 mb-0">
          <div class="d-flex flex-column gap-2">
              <h6 class="ms-1 mb-0">Status Kepunyaan</h6>
              <input type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Status Kepunyaan" style="font-size: 100%;"/>
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
    <a class="nav-link active px-4" id="simple-tab-0" style="width: auto;" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Status Kepemilikan</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-4" id="simple-tab-0" style="width: auto;" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="true">Status Kepunyaanmu</a>
  </li>
</ul>
<hr class="p-0">

<!-- Status Kepemilikan Section -->
<div class="tab-content" id="tab-content">
  <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
    <div class="content-profil py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Status Kepemilikan</h3>
            <a href="#tambahStatusKepemilikan" class="btn" data-bs-toggle="modal" role="button">+ Tambah Status Kepemilikan</a>
        </div>
        <div class="container mt-4">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Status Kepemilikan</th>
                <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Perusahaan Perseorangan</td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-ubah">Ubah</button>
                    <button class="btn btn-hapus">Hapus</button>
                    </div>
                </td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Firma</td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-ubah">Ubah</button>
                    <button class="btn btn-hapus">Hapus</button>
                    </div>
                </td>
                
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Penanaman Modal Asing (PMA)</td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-ubah">Ubah</button>
                    <button class="btn btn-hapus">Hapus</button>
                    </div>
                </td>
                
                </tr>
                <tr>
                <th scope="row">4</th>
                <td>Penanaman Modal Asing (PMA)</td>
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

  <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-0">
    <div class="content-profil py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Status Kepunyaan</h3>
            <a href="#tambahStatusKepunyaan" class="btn" data-bs-toggle="modal" role="button">+ Tambah Kepunyaanmu</a>
        </div>
        <div class="container mt-4">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Status Kepunyaan</th>
                <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Perusahaan Bersama</td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-ubah">Ubah</button>
                    <button class="btn btn-hapus">Hapus</button>
                    </div>
                </td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Firma</td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-ubah">Ubah</button>
                    <button class="btn btn-hapus">Hapus</button>
                    </div>
                </td>
                
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Penanaman Modal Asing (PMA)</td>
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