@extends('admin.layouts.master')

@section('content')

<style>
    .file-input {
    position: relative;
    overflow: hidden;
    display: inline-block;
    border: 1px solid #9fafbf;
    border-radius: 15px;
    width: 100%;
    display: flex;
    align-items: center;
    cursor: pointer;
  }

  .file-input input[type="file"] {
    position: absolute;
    font-size: 100px;
    opacity: 0;
    right: 0;
    top: 0;
  }

  .file-input-label {
    display: inline-block;
    font-size: 112.5%;
    color: #595959;
    background-color: #d7dae3;
    padding: 6px 12px;
    border-right: 1px solid #9fafbf;
    cursor: pointer;
  }

  #fileInputLabel1, 
  #fileInputLabel2 {
    width: 80%; 
    color: #9fafbf; 
    white-space: nowrap;
    overflow: hidden; 
    text-overflow: ellipsis;
    cursor: pointer;
  }
</style>

<!-- Pop up dokumen -->
<!-- popup tambah -->
<div class="modal fade" id="tambahDokumenPenjadwalan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="{{ route('penjadwalan_dokumen.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Dokumen</h1>
        </div>
        <div class="modal-body" style="border: none;">
            <div class="pb-0 mb-0">
                <div class="d-flex flex-column gap-2 mb-3">
                    <h6 class="ms-1 mb-0">Nama Dokumen</h6>
                    <input name="nama_dokumen" type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Dokumen" style="font-size: 100%;"/>
                </div>
                <div class="d-flex flex-column gap-2 mb-3">
                    <h6 class="ms-1 mb-0">Dokumen</h6>
                    <div class="file-input">
                        <!-- <label class="input-group-text px-4" for="inputGroupFile1">Unggah</label>
                        <label class="label-unik px-4" id="file-input-label" for="inputGroupFile1">Masukkan File.. </label>
                        <input type="file" name="file_dokumen" accept=".pdf" class="form-control unik form-control-lg" id="inputGroupFile1" style="font-size: 100%;"> -->

                        <input type="file" id="inputGroupFile1" name="file_dokumen" accept=".pdf" onchange="handleFileSelect('inputGroupFile1', 'fileInputLabel1', 'fileName1')">
                        <label for="inputGroupFile1" class="file-input-label">Unggah</label>
                        <label for="inputGroupFile1" id="fileInputLabel1" class="mx-4" style="color: #9fafbf;">Maksimal mengunggah dokumen : 10 MB</label>
                        <div id="fileName1"></div>
                    </div>
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

<!-- pop up ubah dokumen -->
<!-- Modal -->
<div class="modal fade" id="ubahDokumenPenjadwalan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_ubah_dokumen" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah  sfdsfdsfdfsdf</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <div action="" class="pb-0 mb-0">
                    <div class="d-flex flex-column gap-2 mb-3">
                        <h6 class="ms-1 mb-0">Nama Dokumen</h6>
                        <input type="text" id="nama_dokumen" name="nama_dokumen" class="form-control form-control-lg ps-4" style="font-size: 100%;"/>
                    </div>
                    <div class="d-flex flex-column gap-2 mb-3">
                        <h6 class="ms-1 mb-0">Dokumen</h6>
                        <div class="file-input">
                            {{-- <label class="input-group-text px-4" for="inputGroupFile1">Unggah</label>
                            <label class="label-unik px-4" id="file-input-label" for="inputGroupFile1">Masukkan File.. </label> --}}
                            <!-- <input type="file" name="file_dokumen" accept=".pdf,.doc,.docx" class="form-control"> -->
                            <input type="file" id="inputGroupFile2" name="file_dokumen" accept=".pdf" onchange="handleFileSelect('inputGroupFile2', 'fileInputLabel2', 'fileName2')">
                            <label for="inputGroupFile2" class="file-input-label">Unggah</label>
                            <label for="inputGroupFile2" id="fileInputLabel2" class="mx-4" style="color: #9fafbf;">Maksimal mengunggah dokumen : 10 MB</label>
                            <div id="fileName2"></div>
                        </div>
                        <div id="current-file" class="mt-2" style="overflow-wrap: break-word; word-break: break-all; "></div>
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

<!-- pop up hapus dokumen -->
<div class="modal fade" id="hapusDokumenPenjadwalan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_dokumen" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-header" style="border: none;">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Hapus Dokumen</h1>
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

{{-- Pop Up Ubah Linimasa --}}
@if ($penjadwalan_linimasa)
<div class="modal fade" id="ubahlinimasajadwalan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" action="{{ route('penjadwalan_linimasa.update', $penjadwalan_linimasa->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Dokumen</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <div action="" class="pb-0 mb-0">
                    <div class="d-flex flex-column gap-2 mb-3">
                        <h6 class="ms-1 mb-0">Judul</h6>
                        <input type="text" id="judul" name="judul" class="form-control form-control-lg ps-4" style="font-size: 100%;" value="{{ $penjadwalan_linimasa->judul }}"/>
                    </div>
                    <div class="d-flex flex-column gap-2 mb-3">
                        <h6 class="ms-1 mb-0">Benner</h6>
                        <div class="input-group custom-file-button">
                            <input type="file" name="gambar" accept="image/*" class="form-control">
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2 mb-3">
                        <h6 class="ms-1 mb-0">Lopasi Maps</h6>
                        <input type="text" id="lokasi_map" name="lokasi_map" class="form-control form-control-lg ps-4" style="font-size: 100%;" value="{{ $penjadwalan_linimasa->lokasi_map }}"/>
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
@endif

<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == '')?'active':'' }}"  id="dokumen-tab-0" href="/admin/penjadwalan" role="tab" aria-controls="dokumen-tabpanel-0" aria-selected="true">Dokumen</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == 'linimasa')?'active':'' }}"  id="simple-tab-1" href="/admin/penjadwalan?tab=linimasa" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Linimasa</a>
    </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
    <div class="tab-pane {{ (request()->query('tab') == '')?'active':'' }}" id="dokumen-tabpanel-0" role="tabpanel" aria-labelledby="dokumen-tab-0">
        <div class="content-profil py-5 mb-5">
            <div class="d-flex flex-column">
                <h3 class="mb-2 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Dokumen</h3>
                <div class="d-flex align-items-center gap-3" style="margin-top: -25px">
                <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
                <button onclick="openModalTambahDokumenPenjadwalan()" class="btn" data-bs-toggle="modal" role="button" style="width: 14%;">+ Tambah</button>
                </div>
            </div>
            <!-- <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;"> -->
            <!-- TODO: Tampilan FAQ admin -->
            <div class="container mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th class="ps-3" scope="col">No</th>
                        <th class="ps-5" scope="col">Nama Dokumen</th>
                        <th class="ps-5" scope="col">Dokumen</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- foreach($faq as $data) -->
                    @foreach ($penjadwalan_dokumen as $dokumen)
                        <tr>
                            <td class="ps-3" scope="row">{{ $loop->iteration }}</td>
                            <td class="ps-5">{{ $dokumen->nama_dokumen }}</td>
                            <td class="ps-5">
                                @if(strlen($dokumen->file_dokumen) > 50)
                                    {{ substr($dokumen->file_dokumen, 0, 50) . '...' }}
                                @else
                                    {{ $dokumen->file_dokumen }}
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button onclick="openModalUbahDokumenPenjadwalan('{{ $dokumen->id }}')" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
                                    <button onclick="openModalHapusDokumenPenjadwalan('{{ $dokumen->id }}')" class="btn btn-hapus">Hapus</button>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                {{-- <button onclick="openModalUbahDokumenPenjadwalan()" class="btn btn-ubah" data-bs-toggle="modal" role="button">Ubah</button>
                                <button onclick="openModalHapusDokumenPenjadwalan()" class="btn btn-hapus">Hapus</button> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <!-- endforeach -->

                </tbody>
            </table>
            </div>
        </div>
    </div>

    <!-- Dokumen start -->
    <div class="tab-pane {{ (request()->query('tab') == 'linimasa')?'active':'' }}" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
        <div class="content-profil pt-5 mb-5">
            <div class="d-flex flex-column gap-3">
                <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Linimasa</h3>
                <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
            </div>
            <div class="container mt-4">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-xl-12">
                        <div class="card" style="border-radius: 15px;">
                            @if (!$penjadwalan_linimasa)
                                <form action="{{ route('penjadwalan_linimasa.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row align-items-center pb-3">
                                            <div class="col-md-4 ps-5">
                                                <h6 class="mb-0">Nama Konten</h6>
                                            </div>
                                            <div class="container col-md-8 pe-5">
                                                <div class="input-group custom-file-button">
                                                <input name="judul" type="text" class="form-control form-control-lg ps-4" placeholder="Masukkan Nama Konten.." style="font-size: 100%;"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center pb-3">
                                            <div class="col-md-4 ps-5">
                                                <h6 class="mb-0">Banner</h6>
                                            </div>
                                            <div class="container col-md-8 pe-5">
                                                <div class="input-group custom-file-button">
                                                    {{-- <label class="input-group-text px-4" for="inputGroupFile1">Unggah</label>
                                                    <label class="label-unik px-4" id="file-input-label" for="inputGroupFile1">Masukkan File.. </label> --}}
                                                    {{-- <input type="file" name="gambar" class="form-control unik form-control-lg" id="inputGroupFile1" style="font-size: 100%;"> --}}
                                                    <input type="file" name="gambar" accept="image/*" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center pb-3">
                                            <div class="col-md-4 ps-5">
                                                <h6 class="mb-0">Lokasi Map</h6>
                                            </div>
                                            <div class="container col-md-8 pe-5">
                                                <div class="input-group custom-file-button">
                                                <input name="lokasi_map" type="url" class="form-control form-control-lg ps-4" placeholder="Masukkan Lokasi Event.." style="font-size: 100%;"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-5 py-4 d-flex justify-content-end gap-3">
                                        <button type="submit" class="btn nonactive" style="width: 13%;">Batal</button>
                                        <button type="submit" class="btn">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="card-body">
                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Nama Konten</h6>
                                        </div>
                                        <div class="container col-md-8 pe-5">
                                            <div class="input-group custom-file-button">
                                                <span>{{ $penjadwalan_linimasa->judul }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Banner</h6>
                                        </div>
                                        <div class="container col-md-8 pe-5">
                                            <div class="input-group custom-file-button">
                                                <span>{{ $penjadwalan_linimasa->gambar }}</span>
                                                {{-- <label class="input-group-text px-4" for="inputGroupFile1">Unggah</label>
                                                <label class="label-unik px-4" id="file-input-label" for="inputGroupFile1">Masukkan File.. </label> --}}
                                                {{-- <input type="file" name="gambar" class="form-control unik form-control-lg" id="inputGroupFile1" style="font-size: 100%;"> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Lokasi Map</h6>
                                        </div>
                                        <div class="container col-md-8 pe-5">
                                            <div class="input-group custom-file-button">
                                                <span>{{ $penjadwalan_linimasa->lokasi_map }}</span>
                                            {{-- <input name="lokasi_map" type="text" class="form-control form-control-lg ps-4" placeholder="Masukkan Lokasi Event.." style="font-size: 100%;"/> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-5 py-4 d-flex justify-content-end gap-3">
                                        {{-- <button type="submit" class="btn">Edit</button> --}}
                                        <button type="button" class="btn btn-ubah" data-bs-toggle="modal" data-bs-target="#ubahlinimasajadwalan">
                                            Edit
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dokumen end -->
</div>

<script>
    
function handleFileSelect(inputId, labelId, fileNameId) {
    const fileInput = document.getElementById(inputId);
    const fileInputLabel = document.getElementById(labelId);
    const fileNameDisplay = document.getElementById(fileNameId);
    const fileName = fileInput.files[0] ? fileInput.files[0].name : null;
    if (fileName) {
      fileInputLabel.textContent = fileName;
    //   fileNameDisplay.textContent = fileName;
    } else {
      fileInputLabel.textContent = "Maksimal mengunggah dokumen : 10 MB";
      fileNameDisplay.textContent = "";
    }
  }

</script>
@endsection('content')
