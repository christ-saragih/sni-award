@extends('admin.layouts.master')

@section('content')

<!-- Lembaga Sertifikasi Section -->
<div class="modal fade" id="tambahKategori" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Lembaga Sertifikasi</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <form action="" class="pb-0 mb-0">
          <div class="d-flex flex-column gap-2">
              <h6 class="ms-1 mb-0">Lembaga Sertifikasi</h6>
              <input type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Lembaga Sertifikasi" style="font-size: 100%;"/>
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
    <a class="nav-link active px-4" id="simple-tab-0" style="width: auto;" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Lembaga Sertifikasi</a>
  </li>
</ul>
<hr class="p-0">
<!-- Kategori Section -->
<div class="tab-content" id="tab-content">
  <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
    <div class="content-profil py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Lembaga Sertifikasi</h3>
            <a href="#tambahKategori" class="btn" data-bs-toggle="modal" role="button">+ Tambah Lembaga Sertifikasi</a>
        </div>
        <div class="container mt-4">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Lembaga Sertifikasi</th>
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
</div>
</div>
@endsection('content')