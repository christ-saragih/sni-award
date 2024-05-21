@extends('admin.layouts.master')

@section('content')

<!-- Pop Up Tambah Dokumen -->
<div class="modal fade" id="tambahDokumen" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="/admin/dokumen" enctype="multipart/form-data">
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Dokumen</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div class="d-flex flex-column gap-2 pb-0 mb-0">
                <div class="d-flex flex-column gap-2">
                    <h6 class="ms-1 mb-0">Nama</h6>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Dokumen"/>
                </div>
                <div class="d-flex flex-column gap-2 mb-3">
                    <h6 class="ms-1 mb-0">Status</h6>
                    <select class="form-select form-control-lg ps-4" aria-label="Default select example" name="status">
                        <option hidden>Pilih Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div class="d-flex flex-column gap-2">
                    <h6 class="ms-1 mb-0">FIle Dokumen</h6>
                    <input type="file" name="file_dokumen" accept=".pdf" class="form-control"/>
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

<!-- Pop Up Ubah Dokumen -->
<div class="modal fade" id="ubahDokumen" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_dokumen" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Dokumen</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <div class="d-flex flex-column gap-2 pb-0 mb-0">
                    <div class="d-flex flex-column gap-2">
                        <h6 class="ms-1 mb-0">Nama</h6>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Dokumen">
                    </div>
                    <div class="d-flex flex-column gap-2 mb-3">
                        <h6 class="ms-1 mb-0">Status</h6>
                        <select class="form-select form-control-lg ps-4" aria-label="Default select example" name="status">
                            <option hidden>Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <h6 class="ms-1 mb-0">FIle Dokumen</h6>
                        <input type="file" name="file_dokumen" accept=".pdf" class="form-control"/>
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

<!-- Pop Up Hapus Dokumen -->
<div class="modal fade" id="hapusDokumen" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_dokumen" method="POST" >
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
        <a class="nav-link active" id="dokumen-tab" data-bs-toggle="tab" href="#dokumen-tabpanel" role="tab" aria-controls="dokumen-tabpanel" aria-selected="true">Dokumen</a>
    </li>
</ul>

<hr class="p-0">

<!-- Konten Dokumen Section -->
<div class="tab-pane" id="dokumen-tabpanel" role="tabpanel" aria-labelledby="dokumen-tab">
    <div class="content-profil py-5">
        <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Dokumen</h3>
        <a href="#tambahDokumen" class="btn" data-bs-toggle="modal" role="button">+ Tambah Dokumen</a>
        </div>
        <div class="container mt-4">
            <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Status</th>
                <th scope="col">File Dokumen</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($dokumen as $dok)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dok->nama}}</td>
                        <td>{{$dok->status}}</td>
                        <td>{{$dok->file_dokumen}}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button onclick="openModalUbahDokumen('{{ $dok->id }}')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
                                <button onclick="openModalHapusDokumen('{{ $dok->id }}')" class="btn btn-hapus">Hapus</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>


@endsection()
