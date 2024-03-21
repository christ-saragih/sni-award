@extends('admin.layouts.master')

@section('content')

<!-- Pop Up Tambah Konfigurasi -->
<div class="modal fade" id="tambahKonfigurasi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="/admin/konfigurasi">
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Konfigurasi</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div class="d-flex flex-column gap-2 pb-0 mb-0">
                <div class="d-flex flex-column gap-2">
                    <h6 class="ms-1 mb-0">Key</h6>
                    <input type="text" name="key" class="form-control" placeholder="Key"/>
                </div>
                <div class="d-flex flex-column gap-2 mb-3">
                    <h6 class="ms-1 mb-0">Value</h6>
                    <input type="text" name="value" class="form-control" placeholder="Value"/>
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

<!-- Pop Up Ubah Konfigurasi -->
<div class="modal fade" id="ubahKonfigurasi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_konfigurasi" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Konfigurasi</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <div class="d-flex flex-column gap-2 pb-0 mb-0">
                    <div class="d-flex flex-column gap-2">
                        <h6 class="ms-1 mb-0">Key</h6>
                        <input type="text" name="key" class="form-control" placeholder="Key">
                    </div>
                    <div class="d-flex flex-column gap-2 mb-3">
                        <h6 class="ms-1 mb-0">Value</h6>
                        <input type="text" name="value" class="form-control" placeholder="Value"/>
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

<!-- Pop Up Hapus Konfigurasi -->
<div class="modal fade" id="hapusKonfigurasi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_konfigurasi" method="POST" >
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
        <a class="nav-link active" id="konfigurasi-tab" data-bs-toggle="tab" href="#konfigurasi-tabpanel" role="tab" aria-controls="konfigurasi-tabpanel" aria-selected="true">Konfigurasi</a>
    </li>
</ul>

<hr class="p-0">

<!-- Konten Konfigurasi Section -->
<div class="tab-pane" id="konfigurasi-tabpanel" role="tabpanel" aria-labelledby="konfigurasi-tab">
    <div class="content-profil py-5">
        <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Konfigurasi</h3>
        <a href="#tambahKonfigurasi" class="btn" data-bs-toggle="modal" role="button">+ Tambah Konfigurasi</a>
        </div>
        <div class="container mt-4">
            <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Key</th>
                <th scope="col">Value</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($konfigurasi as $kon)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$kon->key}}</td>
                        <td>{{$kon->value}}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button onclick="openModalUbahKonfigurasi('{{ $kon->id }}')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
                                <button onclick="openModalHapusKonfigurasi('{{ $kon->id }}')" class="btn btn-hapus">Hapus</button>
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
