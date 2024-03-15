@extends('admin.layouts.master')

@section('content')

{{-- Tambah --}}
<!-- Pop up Tag Berita -->
<div class="modal fade" id="tambahTagBerita" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tag Berita</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <form class="pb-0 mb-0" method="POST" action="{{ route('tag_berita.store') }}">
                    @csrf
                    <div class="d-flex flex-column gap-2">
                        {{-- <h6 class="ms-1 mb-0">Tag Berita</h6> --}}
                        <input type="text" name="nama" class="form-control form-control-lg ps-4" placeholder="Tuliskan Tag Berita" style="font-size: 100%;"/>
                    </div>
                    <div class="modal-footer gap-2" style="border: none;">
                        <button class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                        <button class="btn" data-bs-toggle="modal" >Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Ubah --}}
<!-- Pop up Tag Berita -->
<div class="modal fade" id="ubahTagBerita" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_tag_berita" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Tag Berita</h1>
            </div>
            <div class="modal-body" style="border: none;">
            <div action="" class="pb-0 mb-0">
                <div class="d-flex flex-column gap-2">
                    <h6 class="ms-1 mb-0">Tag Berita</h6>
                    <input type="text" id="nama_tag_berita" name="nama" class="form-control form-control-lg ps-4" style="font-size: 100%;"/>
                </div>
            </div>
            </div>
            <div class="modal-footer gap-2" style="border: none;">
            <div class="btn nonactive" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</div>
            <button type="submit" class="btn" data-bs-toggle="modal">Ubah</button>
            </div>
        </form>
    </div>
</div>

{{-- Hapus --}}
<!-- Pop up Tag Berita -->
<div class="modal fade" id="hapusTagBerita" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_tag_berita" method="POST" >
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

<!-- Pop up Berita -->
<div class="modal fade" id="hapusBerita" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_berita" method="POST" >
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
        <a class="nav-link active" id="tag-berita-tab" data-bs-toggle="tab" href="#tag-berita-tabpanel" role="tab" aria-controls="tag-berita-tabpanel" aria-selected="true">Tag Berita</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="berita-tab" data-bs-toggle="tab" href="#berita-tabpanel" role="tab" aria-controls="berita-tabpanel" aria-selected="false" tabindex="-1">Konten Berita</a>
    </li>
</ul>

<hr class="p-0">
<!-- Tag Berita Section -->
<div class="tab-content" id="tab-content">
    <div class="tab-pane active" id="tag-berita-tabpanel" role="tabpanel" aria-labelledby="tag-berita-tab">
        <div class="content-profil py-5">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Tag Berita</h3>
                <a href="#tambahTagBerita" class="btn" data-bs-toggle="modal" role="button">+ Tambah</a>
            </div>
        <div class="container mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Jenis Tag Berita</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tag_berita as $tb)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$tb->nama}}</td>
                        <td>
                            {{-- <form action="{{ route('tag_berita.destroy', $tb->id) }}" method="POST">
                            <a class="btn btn-ubah" href="{{ route('tag_berita.edit', $tb->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-hapus">Delete</button>
                            </form> --}}
                            <div class="d-flex justify-content-center gap-2">
                                <button onclick="openModalUbahTB('{{ $tb->id }}', ' {{ $tb->nama }} ')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
                                <button onclick="openModalHapusTB('{{ $tb->id }}', ' {{ $tb->nama }} ')" class="btn btn-hapus">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <div id="hidden-data" style="display: none">
                        <input type="hidden" id="id_tag_berita">
                        <input type="hidden" id="nama_tag_berita">
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>

  <!-- Konten Berita Section -->
<div class="tab-pane" id="berita-tabpanel" role="tabpanel" aria-labelledby="berita-tab">
  <div class="content-profil py-5">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Berita</h3>
      <a href="{{ route('berita.create') }}" class="btn">+ Tambah</a>
    </div>
      <div class="container mt-4">
        <table class="table">
          <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Tanggal</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($berita as $ber)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$ber->judul_berita}}</td>
                    <td>{{$ber->tanggal}}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a class="btn btn-ubah" href="{{ route('berita.edit', $ber->id) }}">Ubah</a>
                            <button onclick="openModalHapusBerita('{{ $ber->id }}', ' {{ $ber->nama }} ')" class="btn btn-hapus">Hapus</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            <div id="hidden-data" style="display: none">
                <input type="hidden" id="id_berita">
                <input type="hidden" id="nama_berita">
            </div>
          </tbody>
        </table>
      </div>
  </div>
</div>

@endsection()
