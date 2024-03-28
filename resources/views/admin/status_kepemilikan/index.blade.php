@extends('admin.layouts.master')

@section('content')

<script>
  function openDeleteAlert() {
    document.getElementById('deleteKategori').style.display = 'block';
  }
  function closeDeleteAlert() {
    document.getElementById('deleteKategori').style.display = 'none';
  }
</script>

{{-- Pop up tambah --}}
<!-- Pop up status kepemilikan -->
<div class="modal fade" id="tambahStatusKepemilikan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" method="POST" action="/admin/status_kepemilikan">
      @csrf
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Status Kepemilikan</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <div action="" class="pb-0 mb-0">
          <div class="d-flex flex-column gap-2">
              <h6 class="ms-1 mb-0">Status Kepemilikan</h6>
              <input type="text" name="nama" class="form-control form-control-lg ps-4" placeholder="Tuliskan Status Kepemilikan" style="font-size: 100%;"/>
          </div>
        </div>
      </div>
      <div class="modal-footer gap-2" style="border: none;">
        <button class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
        <button type="submit" class="btn" data-bs-toggle="modal" >Simpan</button>
      </div>
    </form>
  </div>
</div>

{{-- Pop up ubah --}}
<!-- Pop up status kepemilikan -->
<div class="modal fade" id="ubahStatusKepemilikan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" id="form_ubah_status_kepemilikan" method="POST">
      @method('PUT')
      @csrf
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Status Kepemilikan</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <div action="" class="pb-0 mb-0">
          <div class="d-flex flex-column gap-2">
              <h6 class="ms-1 mb-0">Status Kepemilikan</h6>
              <input type="text" id="nama_status_kepemilikan" name="nama" class="form-control form-control-lg ps-4" style="font-size: 100%;"/>
          </div>
        </div>
      </div>
      <div class="modal-footer gap-2" style="border: none;">
        <div class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal1" aria-label="Close">Batal</div>
        <button type="submit" class="btn" data-bs-toggle="modal1">Ubah</button>
      </div>
    </form>
  </div>
</div>

{{-- delete --}}
<div class="modal fade" id="hapusStatusKepemilikan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" id="form_hapus_status_kepemilikan" method="POST" >
      @method('DELETE')
      @csrf
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Peringatan!</h1>
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
    <a class="nav-link active" id="status_kepemilikan" data-bs-toggle="tab" href="#status_kepemilikan_form" role="tab" aria-controls="status_kepemilikan_form" aria-selected="true">Status Kepemilikan</a>
  </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
  <div class="tab-pane active" id="status_kepemilikan_form" role="tabpanel" aria-labelledby="status_kepemilikan">
    <div class="content-profil py-5">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Status Kepemilikan</h3>
        <a href="#tambahStatusKepemilikan" class="btn" data-bs-toggle="modal" role="button">+ Tambah</a>
      </div>
        <div class="container mt-4">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Status Kepemilikan</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody style="position: relative;">
    @foreach ($list_status_kepemilikan as $sk)
    {{-- delete --}}
    <div class="modal fade" id="hapusStatusKepemilikan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="1" style="">
      <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="/admin/status_kepemilikan/{{$sk->id}}">
          @method('DELETE')
          @csrf
          <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Peringatan!</h1>
          </div>
          <div class="modal-body" style="border: none;">
            <p>Apakah Anda yakin menghapus item ini?</p>
          </div>
          <div class="modal-footer gap-2" style="border: none;">
            <button class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Tidak</button>
            <button type="submit" class="btn" data-bs-toggle="modal">Ya</button>
          </div>
        </form>
      </div>
    </div>
    <div id="deleteStatusKepemilikan" style="
      display: none;
      background-color: gray;
      border: 1px solid red;
      padding: 100px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1;
      border-radius: 20px;
    ">
      lkmclkmcxkm
      <form action="/admin/status_kepemilikan/{{$sk->id}}" method="POST" style="
      displa: flex;
      align-items: center;
      justify-content: center;
      gap: 20px;
    ">
        @method('DELETE')
        @csrf
        <div onclick="closeDeleteAlert()" class="btn btn-info">Tidak</div>
        <button type="submit" class="btn btn-danger">Ya</button>
      </form>
    </div>
    {{-- end delete --}}
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$sk->nama}}</td>
        <td>
          <div class="d-flex justify-content-center gap-2">
            {{-- <a href="/assessment_kategori/{{$ak ->id}}/ubah">
              <button class="btn btn-ubah">
                Ubah
              </button>
            </a> --}}
            <button onclick="openModalUbahSK('{{ $sk->id }}', ' {{ $sk->nama }} ')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
            {{-- <a href="#hapusKategori" class="btn btn-hapus" data-bs-toggle="modal" role="button">Hapus</a> --}}
            <button onclick="openModalHapusSK('{{ $sk->id }}', ' {{ $sk->nama }} ')" class="btn btn-hapus">Hapus</button>
          </div>
        </td>
    </tr>
    @endforeach

    <div id="hidden-data" style="display: none">
      <input type="hidden" id="id_status_kepemilikan">
      <input type="hidden" id="nama_status_kepemilikan">
    </div>
  </tbody>
@endsection('content')