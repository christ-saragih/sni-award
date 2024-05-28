@extends('admin.layouts.master')

@section('content')


<!-- Pop up provinsi -->
<!-- popup tambah -->
<div class="modal fade" id="tambahProvinsi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="{{ route('provinsi.store') }}">
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Provinsi</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div class="pb-0 mb-0">
            <div class="d-flex flex-column gap-2 mb-3">
                <h6 class="ms-1 mb-0">Wilayah Provinsi</h6>
                <input name="propinsi" type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Provinsi" style="font-size: 100%;"/>
                {{-- @error('propinsi')
                    <span class="text-danger">{{ $message }}</span>
                @enderror --}}
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

<!-- pop up ubah provinsi -->
<div class="modal fade" id="ubahProvinsi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_provinsi" method="POST">
        @method('PUT')
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Provinsi</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div action="" class="pb-0 mb-0">
            <div class="d-flex flex-column gap-2">
                <h6 class="ms-1 mb-0">Provinsi</h6>
                <input type="text" id="nama_provinsi" name="propinsi" class="form-control form-control-lg ps-4" style="font-size: 100%;"/>
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

<!-- pop up hapus provinsi -->
<div class="modal fade" id="hapusProvinsi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_provinsi" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Hapus Provinsi</h1>
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

<!-- Pop up tambah kabupaten/kota -->
<div class="modal fade" id="tambahKabupatenKota" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="{{ route('kabupaten.store') }}">
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Kabupaten/Kota</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div action="" class="pb-0 mb-0">
                <div class="d-flex flex-column gap-2 mb-3">
                    <h6 class="ms-1 mb-0">Nama Provinsi</h6>
                    <select class="form-select form-select-lg" aria-label="Default select example" id="propinsi" name="propinsi_id">
                    </select>
                </div>
                <div class="d-flex flex-column gap-2 mb-3">
                    <h6 class="ms-1 mb-0">Nama Daerah</h6>
                    <input name="kota" type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Kabupaten/Kota" style="font-size: 100%;"/>
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

<!-- Pop up ubah kab/kota -->
<div class="modal fade" id="ubahKabupatenKota" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_kabupaten" method="POST">
        @method('PUT')
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Kabupaten/Kota</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div action="" class="pb-0 mb-0">
            <div class="d-flex flex-column gap-2 mb-3">
                <h6 class="ms-1 mb-0">Nama Provinsi</h6>
                <select class="form-select form-select-lg" name="propinsi_id" aria-label="Default select example">
                    @foreach ($provinsi as $pro)
                    <option value="{{ $pro->id }}">{{ $pro->propinsi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex flex-column gap-2">
                <h6 class="ms-1 mb-0">Kabupaten/Kota</h6>
                <input name="kota" type="text" id="nama_kabupaten" class="form-control form-control-lg ps-4" style="font-size: 100%;"/>
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

<!-- Pop up hapus kab/kota -->
<div class="modal fade" id="hapusKabupaten" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_kabupaten" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Hapus Kabupaten/Kota</h1>
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


<!-- Pop up tambah kecamatan -->
<div class="modal fade" id="tambahKecamatan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="{{ route('kecamatan.store') }}">
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Kecamatan</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div class="d-flex flex-column gap-2 pb-0 mb-0">
            <div class="d-flex flex-column gap-2 mb-3">
                <h6 class="ms-1 mb-0">Wilayah Provinsi</h6>
                <select class="form-select form-select-lg" aria-label="Default select example" id="wilayah_propinsi" name="propinsi_id">
                </select>
            </div>
            <div class="d-flex flex-column gap-2 mb-3">
                <h6 class="ms-1 mb-0">Nama Daerah</h6>
                <select class="form-select form-select-lg" aria-label="Default select example" id="wilayah_kota" name="kota_id">
                </select>
            </div>
            <div class="d-flex flex-column gap-2 mb-3">
                <h6 class="ms-1 mb-0">Kecamatan</h6>
                <input name="kecamatan" type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Kecamatan" style="font-size: 100%;"/>
            </div>
            </div>
        </div>
        <div class="modal-footer gap-2" style="border: none;">
            <div class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</div>
            <button class="btn" data-bs-toggle="modal" >Simpan</button>
        </div>
        </form>
    </div>
</div>

{{-- Pop up ubah kecamatan --}}
<div class="modal fade" id="ubahKecamatan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_kecamatan" method="POST" action="{{ route('kecamatan.store') }}">
        @method('PUT')
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Kecamatan</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div class="d-flex flex-column gap-2 pb-0 mb-0">
            <div class="d-flex flex-column gap-2 mb-3">
                <h6 class="ms-1 mb-0">Wilayah Provinsi</h6>
                <select id="wilayah_propinsi_kecamatan" name="propinsi_id" class="form-select form-select-lg" aria-label="Default select example">
                    @foreach($provinsi as $data)
                    <option value="{{ $data->id }}">{{ $data->propinsi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex flex-column gap-2 mb-3">
                <h6 class="ms-1 mb-0">Nama Daerah</h6>
                    <select id="wilayah_kota_kecamatan" name="kota_id" class="form-select form-select-lg" aria-label="Default select example">
                    @foreach ($kota as $data)
                    <option value="{{ $data->id }}">{{ $data->kota }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex flex-column gap-2 mb-3">
                <h6 class="ms-1 mb-0">Kecamatan</h6>
                <input name="kecamatan" id="nama_kecamatan" type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Kecamatan" style="font-size: 100%;"/>
            </div>
            </div>
        </div>
        <div class="modal-footer gap-2" style="border: none;">
            <div class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</div>
            <button class="btn" data-bs-toggle="modal" >Simpan</button>
        </div>
        </form>
    </div>
</div>

{{-- Pop up hapus kecamatan --}}
<div class="modal fade" id="hapusKecamatan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_kecamatan" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Hapus Kecamatan</h1>
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
        <a class="nav-link active" id="province-tab-0" data-bs-toggle="tab" href="#province-tabpanel-0" role="tab" aria-controls="province-tabpanel-0" aria-selected="true">Provinsi</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="kota-tab-1" data-bs-toggle="tab" href="#kota-tabpanel-1" role="tab" aria-controls="kota-tabpanel-1" aria-selected="false" tabindex="-1">Kabupaten/Kota</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="kecamatan-tab-2" data-bs-toggle="tab" href="#kecamatan-tabpanel-2" role="tab" aria-controls="kecamatan-tabpanel-2" aria-selected="false" tabindex="-1">Kecamatan</a>
    </li>
</ul>
<hr class="p-0">


<!-- Wilayah Section -->
<div class="tab-content" id="tab-content">
    {{-- Propinsi Section --}}
    <div class="tab-pane active" id="province-tabpanel-0" role="tabpanel" aria-labelledby="province-tab-0">
        <div class="content-profil py-5">
            <div class="d-flex flex-column">
                <h3>Provinsi</h3>
                <div class="d-flex align-items-center gap-3" style="margin-top: -14px">
                    <hr class="garis-tambah">
                    <a href="#tambahProvinsi" class="btn" data-bs-toggle="modal" role="button">+ Tambah</a>
                </div>
            </div>
            <div class="container mt-4">
                <table class="table">
                    <thead>
                        <tr>
                        <th class="ps-3" scope="col">No</th>
                        <th scope="col"></th>
                        <th scope="col">Nama Provinsi</th>
                        <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($provinsi as $data)
                        <tr>
                        <th class="ps-3" scope="row">{{$loop->iteration}}</th>
                        <td></td>
                        <td>{{ $data->propinsi }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                            <button onclick="openModalUbahProvinsi('{{ $data->id }}', '{{ $data->propinsi }}')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
                            <button onclick="openModalHapusProvinsi('{{ $data->id }}', '{{ $data->propinsi }}')" class="btn btn-hapus">Hapus</button>
                            </div>
                        </td>
                        </tr>
                        @endforeach

                        <div id="hidden-data" style="display: none">
                        <input type="hidden" id="id_provinsi">
                        <input type="hidden" id="nama_provinsi">
                        </div>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Kabupaten/Kota Section -->
    <div class="tab-pane" id="kota-tabpanel-1" role="tabpanel" aria-labelledby="kota-tab-1">
        <div class="content-profil py-5">
            <div class="d-flex flex-column">
                <h3>Kabupaten/Kota</h3>
                <div class="d-flex align-items-center gap-3" style="margin-top: -14px">
                    <hr class="garis-tambah">
                    <a href="#tambahKabupatenKota" class="btn" data-bs-toggle="modal" role="button">+ Tambah</a>
                </div>
            </div>
            <div class="container mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="ps-3" scope="col">No</th>
                            <th scope="col"></th>
                            <th scope="col">Nama Provinsi</th>
                            <th scope="col">Nama Daerah</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kota as $data)
                        <tr>
                        <th class="ps-3" scope="row">{{ $loop->iteration }}</th>
                        <td></td>
                        <td>{{ $data->propinsi->propinsi }}</td>
                        <td>{{ $data->kota }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                            <button onclick="openModalUbahKabupaten('{{ $data->id }}')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
                            <button onclick="openModalHapusKabupaten('{{ $data->id }}')" class="btn btn-hapus">Hapus</button>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Kecamatan Section -->
    <div class="tab-pane" id="kecamatan-tabpanel-2" role="tabpanel" aria-labelledby="kecamatan-tab-2">
        <div class="content-profil py-5">
            <div class="d-flex flex-column">
                <h3>Kecamatan</h3>
                <div class="d-flex align-items-center gap-3" style="margin-top: -14px">
                    <hr class="garis-tambah">
                    <a href="#tambahKecamatan" class="btn" data-bs-toggle="modal" role="button">+ Tambah</a>
                </div>
            </div>
            <div class="container mt-4">
                <table class="table">
                <thead>
                <tr>
                    <th class="ps-3" scope="col">No</th>
                    <th scope="col">Nama Provinsi</th>
                    <th scope="col">Nama Daerah</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($kecamatan as $data)
                    <tr>
                    <th class="ps-3" scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->kota->propinsi->propinsi }}</td>
                    <td>{{ $data->kota->kota }}</td>
                    <td>{{ $data->kecamatan }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                        <button onclick="openModalUbahKecamatan('{{ $data->id }}')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
                        <button onclick="openModalHapusKecamatan('{{ $data->id }}')" class="btn btn-hapus">Hapus</button>
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
        $('#propinsi').select2({
            theme: 'bootstrap-5',
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            dropdownParent: $('#tambahKabupatenKota'),
            // minimumResultsForSearch: Infinity,
            placeholder:'Pilih Provinsi',
            ajax: {
                url: "{{route('propinsi.index')}}",
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item){
                            return {
                                id: item.id,
                                text: item.propinsi
                            }
                        })
                    }
                }
            }
        });
    });

    $(document).ready(function() {
        $('#wilayah_propinsi_kecamatan').select2({
            theme: 'bootstrap-5',
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            dropdownParent: $('#ubahKecamatan'),
            // minimumResultsForSearch: Infinity,
            placeholder:'Pilih Provinsi',
            ajax: {
                url: "{{route('propinsi.index')}}",
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item){
                            return {
                                id: item.id,
                                text: item.propinsi
                            }
                        })
                    }
                }
            }
        });

        $('#wilayah_propinsi_kecamatan').change(function() {
            var id = $('#wilayah_propinsi_kecamatan').val();
            // console.log(id);

            $('#wilayah_kota_kecamatan').select2({
                theme: 'bootstrap-5',
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder:'Pilih Kota',
                ajax: {
                    url: "{{url('admin/wilayah/get_kota')}}/"+ id,
                    processResults: function(data) {
                        // console.log({data});
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.id,
                                    text: item.kota
                                }
                            })
                        }
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('#wilayah_propinsi').select2({
            theme: 'bootstrap-5',
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            dropdownParent: $('#tambahKecamatan'),
            // minimumResultsForSearch: Infinity,
            placeholder:'Pilih Provinsi',
            ajax: {
                url: "{{route('propinsi.index')}}",
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item){
                            return {
                                id: item.id,
                                text: item.propinsi
                            }
                        })
                    }
                }
            }
        });

        $('#wilayah_propinsi').change(function() {
            var id = $('#wilayah_propinsi').val();
            // console.log(id);

            $('#wilayah_kota').select2({
                theme: 'bootstrap-5',
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder:'Pilih Kota',
                ajax: {
                    url: "{{url('admin/wilayah/get_kota')}}/"+ id,
                    processResults: function(data) {
                        // console.log({data});
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.id,
                                    text: item.kota
                                }
                            })
                        }
                    }
                }
            });
        });
    });
</script>
@endsection()
