@extends('admin.layouts.master')

@section('content')

{{-- Hapus --}}
<!-- Pop up Acara -->
<div class="modal fade" id="hapusAcara" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_acara" method="POST" >
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
        <a class="nav-link active" id="acara-tab" data-bs-toggle="tab" href="#acara-tabpanel" role="tab" aria-controls="acara-tabpanel" aria-selected="true">Acara</a>
    </li>
</ul>

<hr class="p-0">

  <!-- Konten Acara Section -->
<div class="tab-pane" id="acara-tabpanel" role="tabpanel" aria-labelledby="acara-tab">
  <div class="content-profil py-5">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Acara</h3>
      <a href="{{ route('acara.create') }}" class="btn">+ Tambah</a>
    </div>
      <div class="container mt-4">
        <table class="table">
          <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Data Acara</th>
            <th scope="col">Tanggal</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($acara as $cr)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$cr->judul_acara}}</td>
                    <td>{{$cr->tanggal}}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a class="btn btn-ubah" href="{{ route('acara.edit', $cr->id) }}">Ubah</a>
                            <button onclick="openModalHapusAcara('{{ $cr->id }}', ' {{ $cr->nama }} ')" class="btn btn-hapus">Hapus</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            <div id="hidden-data" style="display: none">
                <input type="hidden" id="id_acara">
                <input type="hidden" id="nama_acara">
            </div>
          </tbody>
        </table>
      </div>
  </div>
</div>

@endsection()
