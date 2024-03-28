@extends('peserta.layouts.master')

@section('content')
<style>
  .data{
        padding: 10px 15px;
        border: 1px solid lightgray;
        border-radius: 15px;
        background-color: #aaaaaa20;
        font-size: 18px;
    }
<<<<<<< HEAD
    .hide{
      display: none;
    }
    .active{
      display: block;
    }
=======
>>>>>>> 0c420b6fe4150fca8c9b5d58ba7b0a1361897021
</style>
<main class="container">
  <ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
    <li class="nav-item" role="presentation">
<<<<<<< HEAD
      <a class="nav-link {{request()->query('tab')=='' ? 'active' : ''}}" id="simple-tab-0"  href="/peserta/profil" role="tab" >Profil</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link {{request()->query('tab')=='dokumen' ? 'active' : ''}}" id="simple-tab-1"  href="/peserta/profil?tab=dokumen" role="tab" >Dokumen</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link {{request()->query('tab')=='kontak' ? 'active' : ''}}" id="simple-tab-2"  href="/peserta/profil?tab=kontak" role="tab" >Kontak</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link {{request()->query('tab')=='ubah_kata_sandi' ? 'active' : ''}}" id="simple-tab-3"  href="/peserta/profil?tab=ubah_kata_sandi" role="tab" >Ubah Kata Sandi</a>
=======
      <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Profil</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Dokumen</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Kontak</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab" aria-controls="simple-tabpanel-3" aria-selected="false">Ubah Kata Sandi</a>
>>>>>>> 0c420b6fe4150fca8c9b5d58ba7b0a1361897021
    </li>
  </ul>
  <hr class="p-0">
  
    <div class="tab-content" id="tab-content">
        <!-- Profil start -->
<<<<<<< HEAD
        <div class="tab-pane {{request()->query('tab')=='' ? 'active' : 'hide'}}" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
          @include('Peserta.profil.wizard.profil')
=======
        <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
          <div class="content-profil pt-5">
            <div class="d-flex flex-column text-center justify-content-center gap-3">
              <img src="{{ asset('assets') }}/peserta/images/foto-profil.png" class="profil mx-auto" alt="">
              <a href="{{route('peserta.profil.edit')}}" class="btn mx-auto mb-1">Edit Profil</a>
              <span>Kelola informasi profil anda untuk mengontrol, melindungi dan mengamankan akun</span>
            </div>
      
            <div class="container mt-4">
              <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                  <div class="card" style="border-radius: 15px;">
                    <div class="card-body">

                      <div class="row align-items-center pt-4 pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Nama Organisasi</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->nama }}</div>
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Jabatan Tertinggi <span style="color: #FF0101;">*</span></h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->jabatan_tertinggi }}</div>
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Website <span style="color: #FF0101;">*</span></h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->website }}</div>
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Tanggal Beroperasi <span style="color: #FF0101;">*</span></h6>
                        </div>

                        <div class="col-md-8 pe-5">
                          <div class="data">{{ $peserta->peserta_profil->tanggal_beroperasi }}</div>
                        </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                              <h6 class="mb-0">Status Kepemilikan</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->status_kepemilikan ? $peserta->peserta_profil->status_kepemilikan->nama : '' }}</div>
                          </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                              <h6 class="mb-0">Jenis Produk</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->jenis_produk }}</div>
                          </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                              <h6 class="mb-0">Deskripsi Produk</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->deskripsi_produk }}</div>
                          </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Lembaga Sertifikasi</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->lembaga_sertifikasi ? $peserta->peserta_profil->lembaga_sertifikasi->nama : '' }}</div>
                          </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Produk Export</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            @if ($peserta->peserta_profil->produk_export)                            
                              <div class="data">Ya</div>
                            @elseif (!$peserta->peserta_profil->produk_export)                  
                              <div class="data">Tidak</div>
                            @endif
                          </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Negara Tujuan Ekspor</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->negara_tujuan_ekspor }}</div>
                          </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Sektor Kategori Organisasi</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->kategori_organisasi ? $peserta->peserta_profil->kategori_organisasi->nama : '' }}</div>
                          </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Kekayaan Bersih</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->kekayaan_bersih }}</div>
                          </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Hasil Penjualan Tahunan</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->hasil_penjualan_tahunan }}</div>
                          </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Jenis Organisasi</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->jenis_organisasi }}</div>
                          </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Kewenangan Kebijakan</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->kewenangan_kebijakan }}</div>
                          </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
>>>>>>> 0c420b6fe4150fca8c9b5d58ba7b0a1361897021
        </div>
        <!-- Profil end -->

        <!-- Dokumen start -->
<<<<<<< HEAD
        <div class="tab-pane {{request()->query('tab')=='dokumen' ? 'active' : 'hide'}}" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">        
          @include('Peserta.profil.wizard.dokumen')        
=======
        <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
          <div class="content-profil pt-5 mb-5">
            <div class="d-flex align-items-center gap-2">
              <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Dokumen</h3>
              <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
            </div>
          <div class="container mt-4">
              <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                  <div class="card" style="border-radius: 15px;">
                    <div class="card-body">

                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Legalitas Hukum Organisasi <span style="color: #FF0101;">*</span></h6>
                        </div>
                        <div class="container col-md-8 pe-5">
                          <div class="input-group custom-file-button">
                            <label class="input-group-text px-4" for="inputGroupFile1">Unggah</label>
                            <label class="label-unik px-4" id="file-input-label" for="inputGroupFile1">Maksimum upload file : 10 MB </label>
                            <input type="file" class="form-control unik form-control-lg" id="inputGroupFile1">
                          </div>
                        </div>
                      </div>

                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">SPPT SNI <span style="color: #FF0101;">*</span></h6>
                        </div>
                        
                        <div class="container col-md-8 pe-5">
                          <div class="input-group custom-file-button">
                            <label class="input-group-text px-4" for="inputGroupFile2">Unggah</label>
                            <label class="label-unik px-4" id="file-input-label" for="inputGroupFile2">Maksimum upload file : 10 MB </label>
                            <input type="file" class="form-control unik form-control-lg" id="inputGroupFile2">
                          </div>
                        </div>
                      </div>

                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Surat Keterangan Kemenkeuham <span style="color: #FF0101;">*</span></h6>
                        </div>

                        <div class="container col-md-8 pe-5">
                          <div class="input-group custom-file-button">
                            <label class="input-group-text px-4" for="inputGroupFile3">Unggah</label>
                            <label class="label-unik px-4" id="file-input-label" for="inputGroupFile3">Maksimum upload file : 10 MB </label>
                            <input type="file" class="form-control unik form-control-lg" id="inputGroupFile3">
                          </div>
                        </div>
                      </div>

                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Kewenangan dan Kebijakan</h6>
                        </div>

                        <div class="container col-md-8 pe-5">
                          <div class="input-group custom-file-button">
                            <label class="input-group-text px-4" for="inputGroupFile3">Unggah</label>
                            <label class="label-unik px-4" id="file-input-label" for="inputGroupFile3">Maksimum upload file : 10 MB </label>
                            <input type="file" class="form-control unik form-control-lg" id="inputGroupFile3">
                          </div>
                        </div>
                      </div>

                      <div class="px-5 py-4 d-flex justify-content-end gap-3">
                        <button type="submit" class="btn nonactive" style="width: 13%;">Batal</button>
                        <button type="submit" class="btn" style="width: 13%;">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
>>>>>>> 0c420b6fe4150fca8c9b5d58ba7b0a1361897021
        </div>
        <!-- Dokumen end -->

        <!-- Kontak start -->
<<<<<<< HEAD
        <div class="tab-pane {{request()->query('tab')=='kontak' ? 'active' : 'hide'}}" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
          @include('Peserta.profil.wizard.kontak')
=======
        <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
          <div class="content-kontak py-5 mb-5">
            <div class="d-flex align-items-center gap-2">
              <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Tambahkan Kontak Penghubung</h3>
              <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
              <i class="fa fa-plus-square fa-2x" style="color: #552525;"></i>
            </div>
          </div>
          <div class="content-kontak-form mb-5">
            <div class="container">
              <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                  <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                      <div class="row pt-4 pb-4">
                            <div class="ps-5 d-flex flex-column gap-3">
                              <h6 class="mb-0">Kontak Penghubung 1</h6>
                              <hr class="p-0 flex-fill" style="height: 1px; background-color: #9FAFBF;">
                            </div>
                            
                        </div>
                      <div class="row align-items-center pt-4 pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Nama Penghubung</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <input type="text" class="form-control form-control-lg" />
                          </div>
                      </div>
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Nomor Telepon</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <input type="text" class="form-control form-control-lg" />
                          </div>
                      </div>
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Jabatan</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <input type="text" class="form-control form-control-lg" />
                          </div>
                      </div>
                      <div class="px-5 py-4 d-flex justify-content-end gap-3">
                        <button type="submit" class="btn nonactive" style="width: 13%;">Batal</button>
                        <button type="submit" class="btn" style="width: 13%;">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
>>>>>>> 0c420b6fe4150fca8c9b5d58ba7b0a1361897021
        </div>
        <!-- Kontak end -->

        <!-- Ubah password start -->
<<<<<<< HEAD
        <div class="tab-pane {{request()->query('tab')=='ubah_kata_sandi'? 'active' : 'hide'}}" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
           @include('Peserta.profil.wizard.ubahsandi')
        </div>
=======
        <form class="tab-pane" method="POST" action="/peserta/profil" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
          @method('PUT')
          @csrf
          <div class="content-ubah-password pt-5 mb-5">
              <div class="d-flex align-items-center gap-2">
                <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Ubah Kata Sandi</h3>
                <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
              </div>
            <div class="container">
              <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                  <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                      <div class="row align-items-center pt-4 pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 for= "kata_sandi_lama "class="mb-0">Kata Sandi Lama</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <input id="kata_sandi_lama "type="password" class="form-control form-control-lg" name="current_password" required />
                          </div>
                      </div>
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 for= "kata_sandi_baru" class="mb-0">Kata Sandi Baru</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <input id="kata_sandi_baru "type="password" class="form-control form-control-lg" name="password" required autocomplete="new-password"/>
                          </div>
                      </div>
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 for= "konfirmasi_kata_sandi" class="mb-0">Konfirmasi Kata Sandi</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <input id="konfirmasi_kata_sandi" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" />
                          </div>
                      </div>
                      <div class="px-5 py-4 d-flex justify-content-end gap-3">
                        <button type="submit" class="btn nonactive" style="width: 13%;">Batal</button>
                        <button type="submit" class="btn" style="width: 13%;">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
>>>>>>> 0c420b6fe4150fca8c9b5d58ba7b0a1361897021
        <!-- Ubah password end -->

    </div>
</main>
@endsection
