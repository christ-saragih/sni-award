@extends('admin.layouts.master')

@section('content')

{{-- Hapus --}}
<!-- Pop up Pendaftar -->
<div class="modal fade" id="hapusPendaftar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_pendaftar" method="POST" >
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
        <a class="nav-link active" id="pendaftar-tab" data-bs-toggle="tab" href="#pendaftar-tabpanel" role="tab" aria-controls="pendaftar-tabpanel" aria-selected="true">Pendaftar</a>
    </li>
</ul>

<hr class="p-0">

<!-- Konten Pendaftar Section -->
<div class="tab-pane" id="pendaftar-tabpanel" role="tabpanel" aria-labelledby="pendaftar-tab">
    <div class="content-profil py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Pendaftar</h3>
            {{-- <a href="{{ route('pendaftar.create') }}" class="btn">+ Tambah</a> --}}
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Tahun
                </button>
                <ul class="dropdown-menu">
                    @foreach ($data_tahun as $tahun)
                        <li><a class="dropdown-item" href="{{ route('pendaftar_sni_award.get_tahun', $tahun) }}">{{ $tahun }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="container mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pendaftar</th>
                        <th scope="col">Sekretariat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Stage</th>
                        <th scope="col">Kategori Organisasi</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrasi as $cr)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$cr->peserta->nama}}</td>
                            <td>{{$cr->user ? $cr->user->name : ''}}</td>
                            <td>{{$cr->status->nama}}</td>
                            <td>{{$cr->stage->nama}}</td>
                            <td>{{$cr->peserta->kategori_organisasi->nama}}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a class="btn" style="padding: 5px 10px;border:none;background-color:#E59B30;border-radius:10px;" href="{{ route('pendaftar_sni_award.detail', $cr->id) }}">detail</a>
                                    {{-- <button onclick="openModalHapusPendaftar('{{ $cr->id }}', ' {{ $cr->nama }} ')" class="btn btn-hapus">Hapus</button> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="pagination justify-content-center">
                {{ $pendaftar->links() }}
            </div> --}}
        </div>
    </div>
</div>

@endsection()
