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

<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == '')?'active':'' }}"  id="simple-tab-1" href="/admin/kontak" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Kontak</a>
    </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">

    <!-- Dokumen start -->
    <div class="tab-pane {{ (request()->query('tab') == '')?'active':'' }}" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
        <div class="content-profil pt-5 mb-5">
            <div class="d-flex flex-column gap-3">
                <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Kontak</h3>
                <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
            </div>
            <div class="container mt-4">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-xl-12">
                        <div class="card" style="border-radius: 15px;">
                            <form action="{{ route('penjadwalan_linimasa.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Nama Konten</h6>
                                        </div>
                                        <div class="container col-md-8 pe-5">
                                            <div class="input-group custom-file-button">
                                            <input name="nama_konten" value="" type="text" class="form-control form-control-lg ps-4" placeholder="Masukkan nama konten.." style="font-size: 100%;"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-md-4 ps-5 mt-2">
                                            <h6 class="mb-0">Isi Konten</h6>
                                        </div>
                                        <div class="container col-md-8 pe-5">
                                            <div class="input-group custom-file-button">
                                            <textarea name="isi_konten" type="text" cols="30" rows="3" class="form-control form-control-lg ps-4" placeholder="Masukkan isi konten.." style="font-size: 100%;"></textarea>
                                                <!-- <input name="nama_konten" value="" type="text" class="form-control form-control-lg ps-4" placeholder="Masukkan nama konten.." style="font-size: 100%;"/> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="container col-md-8 pe-5">
                                            <div class="input-group custom-file-button">
                                            <input name="email" value="" type="email" class="form-control form-control-lg ps-4" placeholder="Masukkan alamat email.." style="font-size: 100%;"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Kontak</h6>
                                        </div>
                                        <div class="container col-md-8 pe-5">
                                            <div class="input-group custom-file-button">
                                            <input name="kontak" value="" type="text" class="form-control form-control-lg ps-4" placeholder="Masukkan kontak.." style="font-size: 100%;"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Link Website</h6>
                                        </div>
                                        <div class="container col-md-8 pe-5">
                                            <div class="input-group custom-file-button">
                                            <input name="link_website" value="" type="url" class="form-control form-control-lg ps-4" placeholder="Masukkan link website.." style="font-size: 100%;"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Instagram</h6>
                                        </div>
                                        <div class="container col-md-8 pe-5">
                                            <div class="input-group custom-file-button">
                                            <input name="instagram" value="" type="url" class="form-control form-control-lg ps-4" placeholder="Masukkan link instagram.." style="font-size: 100%;"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Twitter</h6>
                                        </div>
                                        <div class="container col-md-8 pe-5">
                                            <div class="input-group custom-file-button">
                                            <input name="twitter" value="" type="url" class="form-control form-control-lg ps-4" placeholder="Masukkan link twitter.." style="font-size: 100%;"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Facebook</h6>
                                        </div>
                                        <div class="container col-md-8 pe-5">
                                            <div class="input-group custom-file-button">
                                            <input name="facebook" value="" type="url" class="form-control form-control-lg ps-4" placeholder="Masukkan link facebook.." style="font-size: 100%;"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3">
                                        <div class="col-md-4 ps-5">
                                            <h6 class="mb-0">Youtube</h6>
                                        </div>
                                        <div class="container col-md-8 pe-5">
                                            <div class="input-group custom-file-button">
                                            <input name="youtube" value="" type="url" class="form-control form-control-lg ps-4" placeholder="Masukkan link youtube.." style="font-size: 100%;"/>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    

                                    

                                    <div class="px-5 py-4 d-flex justify-content-end gap-3">
                                        <button type="submit" class="btn nonactive" style="width: 13%;">Batal</button>
                                        <button type="submit" class="btn">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dokumen end -->
</div>

@endsection('content')
