@extends('admin.layouts.master')

@section('content')

<!-- Pop Up Tambah Lembaga Sertifikasi -->
<div class="modal fade" id="tambahLembagaSertifikasi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="/admin/lembaga_sertifikasi">
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Lembaga Sertifikasi</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div class="d-flex flex-column gap-2 pb-0 mb-0">
                <div class="d-flex flex-column gap-2">
                    <h6 class="ms-1 mb-0">Nama</h6>
                    <input type="text" name="nama" class="form-control" placeholder="Nama"/>
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

<!-- Pop Up Ubah Lembaga Sertifikasi -->
<div class="modal fade" id="ubahLembagaSertifikasi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_lembaga_sertifikasi" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah LembagaSertifikasi</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <div class="d-flex flex-column gap-2 pb-0 mb-0">
                    <div class="d-flex flex-column gap-2">
                        <h6 class="ms-1 mb-0">Nama</h6>
                        <input type="text" name="nama" class="form-control" placeholder="Nama">
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

<!-- Pop Up Hapus Lembaga Sertifikasi -->
<div class="modal fade" id="hapusLembagaSertifikasi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_lembaga_sertifikasi" method="POST" >
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
        <a class="nav-link active" id="lembaga-sertifikasi-tab" data-bs-toggle="tab" href="#lembaga-sertifikasi-tabpanel" role="tab" aria-controls="lembaga-sertifikasi-tabpanel" aria-selected="true" style="white-space: nowrap; width: fit-content;">Lembaga Sertifikasi</a>
    </li>
</ul>

<hr class="p-0">

<!-- Konten Lembaga Sertifikasi Section -->
<div class="tab-pane" id="lembaga-sertifikasi-tabpanel" role="tabpanel" aria-labelledby="lembaga-sertifikasi-tab">
    <div class="content-profil py-5">
        <div class="d-flex flex-column">
            <h3>Lembaga Sertifikasi</h3>
            <div class="d-flex align-items-center gap-3" style="margin-top: -14px">
                    <hr class="garis-tambah">
                    <a href="#tambahLembagaSertifikasi" class="btn" data-bs-toggle="modal" role="button">+ Tambah</a>
                </div>
        </div>
        <div class="container mt-4">
            <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($lembaga_sertifikasi as $ls)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$ls->nama}}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button onclick="openModalUbahLembagaSertifikasi('{{ $ls->id }}')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
                                <button onclick="openModalHapusLembagaSertifikasi('{{ $ls->id }}')" class="btn btn-hapus">Hapus</button>
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
