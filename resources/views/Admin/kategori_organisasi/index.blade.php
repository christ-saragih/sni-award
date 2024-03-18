@extends('admin.layouts.master')

@section('content')

<!-- Pop Up Tambah Kategori Organisasi -->
<div class="modal fade" id="tambahKategoriOrganisasi" role="dialog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="/admin/kategori_organisasi">
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Kategori Organisasi</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div class="d-flex flex-column gap-2 pb-0 mb-0">
                <div class="d-flex flex-column gap-2">
                    <h6 class="ms-1 mb-0">Nama</h6>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Kategori Organisasi"/>
                </div>
                <div class="d-flex flex-column gap-2 mb-3">
                    <h6 class="ms-1 mb-0">Tipe Kategori</h6>
                    <select class="form-select" aria-label="Default select example" id="tipeKategori" name="tipe_kategori_id">
                        {{-- <option hidden>Pilih tipe Kategori</option>
                        @foreach ($tipe_kategori as $tk)
                            <option value="{{ $tk->id }}">{{ $tk->nama }}</option>
                        @endforeach --}}
                    </select>
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

<!-- Pop Up Tambah Tipe Kategori -->
<div class="modal fade" id="tambahTipeKategori" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="/admin/tipe_kategori">
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Tipe Kategori</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <div class="d-flex flex-column gap-2 pb-0 mb-0">
                    <div class="d-flex flex-column gap-2">
                        <h6 class="ms-1 mb-0">Nama</h6>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Tipe Kategori"/>
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

<!-- Pop Up Ubah Ketegori Organisasi -->
<div class="modal fade" id="ubahKategoriOrganisasi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_kategori_organisasi" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Kategori Organisasi</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <div class="d-flex flex-column gap-2 pb-0 mb-0">
                    <div class="d-flex flex-column gap-2">
                        <h6 class="ms-1 mb-0">Nama</h6>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Kategori Organisasi">
                    </div>
                    <div class="d-flex flex-column gap-2 mb-3">
                        <h6 class="ms-1 mb-0">Tipe Kategori</h6>
                        <select class="form-select form-control-lg ps-4" aria-label="Default select example" name="tipe_kategori_id">
                            <option hidden>Pilih Kategori</option>
                            @foreach ($tipe_kategori as $tk)
                            <option value="{{ $tk->id }}">{{ $tk->nama }}</option>
                            @endforeach
                            {{-- @foreach ($tipe_kategori as $tk)
                                <option value="{{ $tk->id }}" {{ $kategori_organisasi->tipe_kategori_id == $tk->id ? 'selected' : '' }}>{{ $tk->nama }}</option>
                            @endforeach --}}
                        </select>
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

<!-- Pop Up Ubah Tipe Kategori -->
<div class="modal fade" id="ubahTipeKategori" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_tipe_kategori" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Tipe Kategori</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <div class="d-flex flex-column gap-2 pb-0 mb-0">
                    <div class="d-flex flex-column gap-2">
                        <h6 class="ms-1 mb-0">Nama</h6>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Tipe Kategori">
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

<!-- Pop Up Hapus Kategori Organisasi -->
<div class="modal fade" id="hapusKategoriOrganisasi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_kategori_organisasi" method="POST" >
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

<!-- Pop Up Hapus Tipe Kategori -->
<div class="modal fade" id="hapusTipeKategori" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_tipe_kategori" method="POST" >
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
        <a class="nav-link active" id="tipe-kategori-tab" data-bs-toggle="tab" href="#tipe-kategori-tabpanel" role="tab" aria-controls="tipe-kategori-tabpanel" aria-selected="true">Tipe Kategori</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="kategori-organisasi-tab" data-bs-toggle="tab" href="#kategori-organisasi-tabpanel" role="tab" aria-controls="kategori-organisasi-tabpanel" aria-selected="false" tabindex="-1" style="white-space: nowrap; width: fit-content;">Kategori Organisasi</a>
    </li>
</ul>

<hr class="p-0" style="color: #e59b30; height: 20px;">

<!-- Konten Tipe Kategori Section -->
<div class="tab-content" id="tab-content">
    <div class="tab-pane active" id="tipe-kategori-tabpanel" role="tabpanel" aria-labelledby="tipe-kategori-tab">
        <div class="content-profil py-5">
            <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Tipe Kategori</h3>
            <a href="#tambahTipeKategori" class="btn" data-bs-toggle="modal" role="button">+ Tambah Tipe Kategori</a>
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
                        @foreach ($tipe_kategori as $tk)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$tk->nama}}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button onclick="openModalUbahTipeKategori('{{ $tk->id }}')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
                                        <button onclick="openModalHapusTipeKategori('{{ $tk->id }}')" class="btn btn-hapus">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Konten Kategori Organisasi Section -->
    <div class="tab-pane" id="kategori-organisasi-tabpanel" role="tabpanel" aria-labelledby="kategori-organisasi-tab">
        <div class="content-profil py-5">
            <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Kategori Organisasi</h3>
            <a href="#tambahKategoriOrganisasi" class="btn" data-bs-toggle="modal" role="button">+ Tambah Kategori Organisasi</a>
            </div>
            <div class="container mt-4">
                <table class="table">
                <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-2">Tipe Kategori</th>
                    <th class="col">Nama</th>
                    <th class="col-3 text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($kategori_organisasi as $ko)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$ko->tipe_kategori->nama}}</td>
                            <td>{{$ko->nama}}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button onclick="openModalUbahKategoriOrganisasi('{{ $ko->id }}')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
                                    <button onclick="openModalHapusKategoriOrganisasi('{{ $ko->id }}')" class="btn btn-hapus">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Inisialisasi Select2 pada elemen select dengan id 'tipe_kategori'
        $('#tipeKategori').select2({
            theme: 'bootstrap-5',
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            dropdownParent: $('#tambahKategoriOrganisasi'),
            // minimumResultsForSearch: Infinity,
            placeholder:'Pilih Tipe Kategori',
            ajax: {
                url: "{{route('tipe_kategori.index')}}",
                processResults: function({data}) {
                    return {
                        results: $.map(data, function(item){
                            return {
                                id: item.id,
                                text: item.nama
                            }
                        })
                    }
                }
            }
        });
    });
</script>

@endsection()
