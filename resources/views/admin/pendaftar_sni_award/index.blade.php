@extends('admin.layouts.master')

@section('content')
<style>
    .btn-success {
        background-color: #00ab56;
        color: white;
        border: none;
        padding: 12px 22px;
        border-radius: 10px;
        font-weight: bold;
    }
</style>
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
<section class="tab-pane py-5" id="pendaftar-tabpanel" role="tabpanel" aria-labelledby="pendaftar-tab">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Pendaftar</h3>
        {{-- <a href="{{ route('pendaftar.create') }}" class="btn">+ Tambah</a> --}}
        <div class="d-flex align-items-center gap-3">
            <form action="{{route('pendaftar_sni_award.export_excel')}}" method="post">
                @csrf
                <button type="submit" class="btn-success">Download Excel</button>
            </form>
            <div class="dropdown container-dropdown-peserta">
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
    </div>
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Pendaftar</th>
                    <th scope="col">Sekretariat</th>
                    <th scope="col">Status</th>
                    <th scope="col">Stage</th>
                    <th scope="col">Kategori Organisasi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrasi as $cr)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cr->peserta->nama}}</td>
                        <td>
                            @if ($cr->sekretariat)
                                <div>{{ $cr->sekretariat->name }}</div>
                            @else
                                <div class="text-center" style="padding: 6px;
                                    font-weight: bold;
                                    color: white;
                                    background-color: #FF0101;
                                    border-radius: 15px;">
                                    Belum Ditentukan
                                </div>
                            @endif
                        </td>
                        <td class="text-center">{{$cr->status->nama}}</td>
                        <td class="text-center">{{$cr->stage->nama}}</td>
                        <td>{{$cr->peserta->kategori_organisasi ? $cr->peserta->kategori_organisasi->nama : ''}}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a class="btn btn-detail"  href="{{ route('pendaftar_sni_award.detail', Crypt::encryptString($cr->id)) }}">Detail</a>
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
</section>

@endsection()
