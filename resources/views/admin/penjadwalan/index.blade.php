@extends('admin.layouts.master')

@section('content')

<!-- Pop up dokumen -->
<!-- popup tambah -->
<div class="modal fade" id="tambahDokumenPenjadwalan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="{{ route('dokumen.store') }}">
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Dokumen</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div class="pb-0 mb-0">
              <div class="d-flex flex-column gap-2 mb-3">
                  <h6 class="ms-1 mb-0">Nama Dokumen</h6>
                  <input name="nama_dokumen" type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Dokumen" style="font-size: 100%;"/>
              </div>
              <div class="d-flex flex-column gap-2 mb-3">
                  <h6 class="ms-1 mb-0">Dokumen</h6>
                  <div class="input-group custom-file-button">
                      <label class="input-group-text px-4" for="inputGroupFile1">Unggah</label>
                      <label class="label-unik px-4" id="file-input-label" for="inputGroupFile1">Masukkan File.. </label>
                      <input type="file" name="dokumen" class="form-control unik form-control-lg" id="inputGroupFile1" style="font-size: 100%;">
                    </div>
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

<!-- pop up ubah dokumen -->
<div class="modal fade" id="ubahDokumenPenjadwalan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_dokumen" method="POST">
        @method('PUT')
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Dokumen</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div action="" class="pb-0 mb-0">
              <div class="d-flex flex-column gap-2 mb-3">
                  <h6 class="ms-1 mb-0">Nama Dokumen</h6>
                  <input type="text" id="nama_dokumen" name="nama_dokumen" class="form-control form-control-lg ps-4" style="font-size: 100%;"/>
              </div>
              <div class="d-flex flex-column gap-2 mb-3">
                    <h6 class="ms-1 mb-0">Dokumen</h6>
                    <div class="input-group custom-file-button">
                        <label class="input-group-text px-4" for="inputGroupFile1">Unggah</label>
                        <label class="label-unik px-4" id="file-input-label" for="inputGroupFile1">Masukkan File.. </label>
                        <input type="file" name="dokumen" class="form-control unik form-control-lg" id="inputGroupFile1" style="font-size: 100%;">
                      </div>
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

<!-- pop up hapus dokumen -->
<div class="modal fade" id="hapusDokumenPenjadwalan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_dokumen" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Hapus Dokumen</h1>
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

<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="dokumen-tab-0" data-bs-toggle="tab" href="#dokumen-tabpanel-0" role="tab" aria-controls="dokumen-tabpanel-0" aria-selected="true">Dokumen</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Linimasa</a>
  </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
  <div class="tab-pane active" id="dokumen-tabpanel-0" role="tabpanel" aria-labelledby="dokumen-tab-0">
  <div class="content-profil py-5 mb-5">
    <div class="d-flex flex-column">
        <h3 class="mb-2 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Dokumen</h3>
        <div class="d-flex align-items-center gap-3" style="margin-top: -25px">
          <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
          <button onclick="openModalTambahDokumenPenjadwalan()" class="btn" data-bs-toggle="modal" role="button" style="width: 14%;">+ Tambah</button>
        </div>
      </div>
      <!-- <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;"> -->
      <!-- TODO: Tampilan FAQ admin -->
    <div class="container mt-4">
    <table class="table">
  <thead>
    <tr>
      <th class="ps-3" scope="col">No</th>
      <th class="ps-5" scope="col">Nama Dokumen</th>
      <th class="ps-5" scope="col">Dokumen</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <!-- foreach($faq as $data) -->
    <tr>
      <th class="ps-3" scope="row">1</th>
      <td class="ps-5">Syarat Pendaftaran</td>
      <td class="ps-5">syaratpendaftaran.pdf</td>
      <td>
        <div class="d-flex justify-content-center gap-2">
          <button onclick="openModalUbahDokumenPenjadwalan()" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
          <button onclick="openModalHapusDokumenPenjadwalan()" class="btn btn-hapus">Hapus</button>
        </div>
      </td>
    </tr>
    <!-- endforeach -->


    <div id="hidden-data" style="display: none">
      <input type="hidden" id="id_faq">
      <input type="hidden" id="nama_faq">
      <input type="hidden" id="deskripsi_faq">
    </div>

  </tbody>
</table>
      </div>
    </div>
  </div>

  <!-- Dokumen start -->
  <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
    <div class="content-profil pt-5 mb-5">
      <div class="d-flex flex-column gap-3">
        <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Linimasa</h3>
        <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
      </div>
    <div class="container mt-4">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-xl-12">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body">

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                    <h6 class="mb-0">Nama Konten</h6>
                  </div>
                  <div class="container col-md-8 pe-5">
                    <div class="input-group custom-file-button">
                      <input name="nama_dokumen" type="text" class="form-control form-control-lg ps-4" placeholder="Masukkan Nama Konten.." style="font-size: 100%;"/>
                    </div>
                  </div>
                </div>

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                    <h6 class="mb-0">Banner</h6>
                  </div>
                  <div class="container col-md-8 pe-5">
                    <div class="input-group custom-file-button">
                      <label class="input-group-text px-4" for="inputGroupFile1">Unggah</label>
                      <label class="label-unik px-4" id="file-input-label" for="inputGroupFile1">Pilih Gambar Banner.. </label>
                      <input type="file" class="form-control unik form-control-lg" id="inputGroupFile1" style="font-size: 100%;">
                    </div>
                  </div>
                </div>

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                    <h6 class="mb-0">Lokasi Map</h6>
                  </div>
                  <div class="container col-md-8 pe-5">
                    <div class="input-group custom-file-button">
                      <input name="lokasi_map" type="text" class="form-control form-control-lg ps-4" placeholder="Masukkan Lokasi Event.." style="font-size: 100%;"/>
                    </div>
                  </div>
                </div>



                <div class="px-5 py-4 d-flex justify-content-end gap-3">
                  <button type="submit" class="btn nonactive" style="width: 13%;">Batal</button>
                  <button type="submit" class="btn" style="width: 13%;">Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Dokumen end -->

</div>
@endsection('content')
