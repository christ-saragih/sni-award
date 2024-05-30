@extends('admin.layouts.master')

@section('content')

<!-- Pop up tambah start -->
<div class="modal fade" id="tambahFaq" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" method="POST" action="{{ route('faq.store') }}">
      @csrf
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah FAQ</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <div class="pb-0 mb-0">
          <div class="d-flex flex-column gap-2 mb-3">
              <h6 class="ms-1 mb-0">Nama FAQ</h6>
              <input name="faq" type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Nama FAQ" style="font-size: 100%;"/>
          </div>
          <div class="d-flex flex-column gap-2 mb-3">
              <h6 class="ms-1 mb-0">Deskripsi</h6>
              <textarea name="deskripsi" type="text" cols="30" rows="5" class="form-control-lg ps-4" placeholder="Tulis Deskripsi" style="font-size: 100%;"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer gap-2" style="border: none;">
        <div class="btn nonactive" style="width: 150px;" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</div>
        <button type="submit" class="btn" data-bs-toggle="modal" >Simpan</button>
      </div>
    </form>
  </div>
</div>
<!-- Pop up tambah end -->

<!-- Pop up ubah start -->
<div class="modal fade" id="ubahFaq" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" id="form_ubah_faq" method="POST">
      @method('PUT')
      @csrf
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah FAQ</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <div action="" class="pb-0 mb-0">
          <div class="d-flex flex-column gap-2 mb-3">
              <h6 class="ms-1 mb-0">Nama FAQ</h6>
              <input type="text" id="nama_faq" name="faq" class="form-control form-control-lg ps-4" style="font-size: 100%;"/>
          </div>
          <div class="d-flex flex-column gap-2">
              <h6 class="ms-1 mb-0">Deskripsi</h6>
              <textarea id="deskripsi_faq" name="deskripsi" type="text" cols="30" rows="5" class="form-control-lg ps-4" placeholder="Tulis Deskripsi" style="font-size: 100%;"></textarea>
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
<!--  pop up ubah end  -->

<!-- pop up hapus start -->
<div class="modal fade" id="hapusFaq" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" id="form_hapus_faq" method="POST">
      @method('DELETE')
      @csrf
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Hapus FAQ</h1>
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
<!-- pop up hapus end -->


<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">FAQ</a>
  </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
  <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
  <div class="content-profil py-5 mb-5">
    <div class="d-flex flex-column">
        <h3>FAQ</h3>
        <div class="d-flex align-items-center gap-3" style="margin-top: -14px">
            <hr class="garis-tambah">
            <a href="#tambahFaq" class="btn" data-bs-toggle="modal" role="button">+ Tambah</a>
        </div>
      </div>
      <!-- TODO: Tampilan FAQ admin -->
    <div class="container mt-4">
    <table class="table">
  <thead>
    <tr>
      <th class="ps-3" scope="col">No</th>
      <th class="ps-5" scope="col">Nama FAQ</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($faq as $data)
    <tr>
      <th class="ps-3" scope="row">{{ $loop->iteration }}</th>
      <td class="ps-5">{{ $data->pertanyaan }}</td>
      <td>
        <div class="d-flex justify-content-center gap-2">
          <button onclick="openModalUbahFaq('{{ $data->id }}', '{{ $data->pertanyaan }}', '{{ $data->jawaban }}')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
          <button onclick="openModalHapusFaq('{{ $data->id }}', '{{ $data->pertanyaan }}', '{{ $data->jawaban }}')" class="btn btn-hapus">Hapus</button>
        </div>
      </td>
    </tr>
    @endforeach
    

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

</div>
@endsection('content')
