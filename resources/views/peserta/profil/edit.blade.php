@extends('peserta.layouts.master')

<style>
  .form-check-input {
    border: 1px solid #9fafbf !important;
  }

  .validation-message {
    color: #D12B2B;
    margin-left: 0.25rem;
    margin-bottom: 0;
  }
</style>

@section('content')
<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Profil</a>
  </li>
  {{-- <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Dokumen</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Kontak</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab" aria-controls="simple-tabpanel-3" aria-selected="false">Ubah Kata Sandi</a>
  </li> --}}
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
  {{-- Profil --}}
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error )
            <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form class="tab-pane active" method="POST" action="{{ route('peserta.profil.update') }}" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
    @csrf
    @method('PUT')
    <div class="content-profil pt-5">
      <div class="d-flex flex-column text-center justify-content-center gap-3">
        <img src="{{ asset('assets') }}/peserta/images/foto-profil.png" class="profil mx-auto" alt="">
        <button class="btn mx-auto mb-1" disabled>Edit Profil</button>
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
                      <input type="text" name="nama" class="form-control form-control-lg" value="{{$peserta->nama}}" required pattern="^(?![_. ])(?!.*[_. ]{2})[a-zA-Z._ ]+(?<![_. ])$" autocomplete="off" aria-describedby="namaValidation"/>
                    </div>
                    <div class="col-md-4 ps-5">
                    </div>
                    <div class="col-md-8 pe-5">
                      <p id="namaValidation" class="validation-message" aria-live="polite"></p>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Jabatan Tertinggi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" name="jabatan_tertinggi" id="jabatan_tertinggi" class="form-control form-control-lg" value="{{$peserta->peserta_profil->jabatan_tertinggi}}" required pattern="^(?![_. ])(?!.*[_. ]{2})[a-zA-Z._ ]+(?<![_. ])$" autocomplete="off" aria-describedby="jabatanTertinggiValidation"/>
                    </div>
                    <div class="col-md-4 ps-5">
                    </div>
                    <div class="col-md-8 pe-5">
                      <p id="jabatanTertinggiValidation" class="validation-message" aria-live="polite"></p>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Nomor Telepon</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="tel" name="no_hp" class="form-control form-control-lg" value="{{$peserta->peserta_profil->no_hp}}" required pattern="[0-9]{10,15}" autocomplete="off" aria-describedby="nomorTeleponValidation"/>
                    </div>
                    <div class="col-md-4 ps-5"></div>
                    <div class="col-md-8 pe-5">
                      <p class="ms-1 mb-0">Contoh: <i>081234567890</i></p>  
                    </div>
                    <div class="col-md-4 ps-5"></div>
                    <div class="col-md-8 pe-5">
                      <p id="nomorTeleponValidation" class="validation-message" aria-live="polite"></p>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Website</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" name="website" class="form-control form-control-lg" value="{{$peserta->peserta_profil->website}}" />
                    </div>
                    <div class="col-md-4 ps-5"></div>
                    <div class="col-md-8 pe-5">
                      <p class="ms-1 mb-0">Contoh: <i>https://example.com</i></p>  
                    </div>
                    <div class="col-md-4 ps-5"></div>
                    {{-- <div class="col-md-8 pe-5">
                      <p id="websiteValidation" class="validation-message" aria-live="polite"></p>
                    </div> --}}
                </div>

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Provinsi</h6>
                  </div>
                  <div class="col-md-8 pe-5">
                      <select name="propinsi_id" class="form-select form-select-lg select2" data-label="Select One">
                        @foreach ($provinsi as $prov)
                          <option value="{{$prov->id}}">{{$prov->propinsi}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                
                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Kota</h6>
                  </div>
                  <div class="col-md-8 pe-5">
                      <select name="kota_id" class="form-select form-select-lg select2" data-label="Select One">
                        @foreach ($kota as $kot)
                          <option value="{{$kot->id}}">{{$kot->kota}}</option>
                        @endforeach
                      </select>
                  </div>   
                </div>
                
                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Kecamatan</h6>
                  </div>
                  <div class="col-md-8 pe-5">
                      <select name="kecamatan_id" class="form-select form-select-lg select2" data-label="Select One">
                        @foreach ($kecamatan as $kec)
                          <option value="{{$kec->id}}">{{$kec->kecamatan}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Alamat</h6>
                  </div>
                  <div class="col-md-8 pe-5">
                      <input type="text" name="alamat" class="form-control form-control-lg" value="{{$peserta->peserta_profil->alamat}}" required pattern="^(?![_. ])(?!.*[_. ]{2})[a-zA-Z._ ]+(?<![_. ])$" autocomplete="off" aria-describedby="alamatValidation"/>
                  </div>
                  <div class="col-md-4 ps-5"></div>
                  <div class="col-md-8 pe-5">
                    <p id="alamatValidation" class="validation-message" aria-live="polite"></p>
                  </div>
                </div>

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Kode Pos</h6>
                  </div>
                  <div class="col-md-8 pe-5">
                      <input type="text" name="kode_pos" class="form-control form-control-lg" value="{{$peserta->peserta_profil->kode_pos}}" required pattern="[0-9]{5}" autocomplete="off" aria-describedby="kodePosValidation"/>
                  </div>
                  <div class="col-md-4 ps-5"></div>
                  <div class="col-md-8 pe-5">
                    <p id="kodePosValidation" class="validation-message" aria-live="polite"></p>
                  </div>
                </div>

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                    <h6 class="mb-0">Tipe</h6>
                  </div>
                  <div class="col-md-8 pe-5">
                    <select name="tipe" class="form-select form-select-lg" data-label="Select One">
                      <option value="pabrik">Pabrik</option>
                      <option value="organisasi">Organisasi</option>
                    </select>
                  </div>
               </div>

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Tanggal Beroperasi</h6>
                  </div>

                  <div class="col-md-4 pe-5">
                    <div class="form-group input-group">
                      <input type="text" name="tanggal_beroperasi" class="form-control form-control-lg" id="inputCalendar" value="{{$peserta->peserta_profil->tanggal_beroperasi}}" required autocomplete="off" aria-describedby="tanggalBeroperasiValidation"/>
                      <label class="input-group-text" style="background-color: #D7DAE3; border-radius: 0 15px 15px 0; border-right: 1px solid #9fafbf; border-top: 1px solid #9fafbf; border-bottom: 1px solid #9fafbf; color: #595959;"><i class="fa fa-calendar"></i></label>
                    </div>
                  </div>
                  <div class="col-md-4 ps-5"></div>
                  <div class="col-md-4 ps-5"></div>
                  <div class="col-md-8 pe-5">
                    <p id="tanggalBeroperasiValidation" class="validation-message" aria-live="polite"></p>
                  </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Status Kepemilikan</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <select id="input_status_kepemilikan" name="status_kepemilikan_id" class="form-select form-select-lg" data-label="Select One">
                        @foreach ($status_kepemilikan as $sk)
                        <option value="{{$sk->id}}">{{$sk->nama}}</option>    
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Jenis  Produk</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <select name="jenis_produk" class="form-select form-select-lg" data-label="Select One">
                        <option value="jasa">Jasa</option>
                        <option value="barang">Barang</option>
                        <option value="pendidikan">Pendidikan</option>
                      </select>
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Deskripsi Produk</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" name="deskripsi_produk" class="form-control form-control-lg" value="{{$peserta->peserta_profil->deskripsi_produk}}" required autocomplete="off" aria-describedby="deskripsiProdukValidation" />
                    </div>
                    <div class="col-md-4 ps-5"></div>
                    <div class="col-md-8 pe-5">
                      <p id="deskripsiProdukValidation" class="validation-message" aria-live="polite"></p>
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Lembaga Sertifikasi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <select id="input_lembaga_sertifikasi" name="lembaga_sertifikasi_id" class="form-select form-select-lg" data-label="Select One">
                        @foreach ($lembaga_sertifikasi as $ls)
                        <option value="{{$ls->id}}">{{$ls->nama}}</option>    
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Produk Ekspor</h6>
                    </div>
                    <div class="col-md-8 pe-5 d-flex flex-row gap-4">              
                      <div class="form-check">
                        <input value="1" class="form-check-input" type="radio" name="produk_export" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2" style="font-size: 1.25rem;">
                          Ya
                        </label>
                      </div>
                      <div class="form-check">
                        <input value="0" class="form-check-input" type="radio" name="produk_export" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1" style="font-size: 1.25rem;">
                          Tidak
                        </label>
                      </div>
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Negara Tujuan Ekspor</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" name="negara_tujuan_ekspor" class="form-control form-control-lg" value="{{$peserta->peserta_profil->negara_tujuan_ekspor}}" required pattern="^(?![_. -])(?!.*[_. -]{2})[a-zA-Z._ -]+(?<![_. -])$" autocomplete="off" aria-describedby="negaraTujuanValidation"/>
                    </div>
                    <div class="col-md-4 ps-5"></div>
                    <div class="col-md-8 pe-5">
                      <p class="ms-1 mb-0">Catatan: <i>Jika menjawab tidak pada pertanyaan sebelumnya, isi '-'.</i></p>  
                    </div>
                    <div class="col-md-4 ps-5"></div>
                    <div class="col-md-8 pe-5">
                      <p id="negaraTujuanValidation" class="validation-message" aria-live="polite"></p>
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Sektor Kategori Organisasi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <select id="input_kategori_organisasi" name="sektor_kategori_organisasi_id" class="form-select form-select-lg" data-label="Select One">
                        @foreach ($kategori_organisasi as $ko)
                        <option value="{{$ko->id}}">{{$ko->nama}}</option>    
                        @endforeach
                      </select>              
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Kekayaan Bersih</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" name="kekayaan_bersih" class="number form-control form-control-lg" value="{{$peserta->peserta_profil->kekayaan_bersih}}" required autocomplete="off" aria-describedby="kekayaanBersihValidation"/>
                    </div>
                    <div class="col-md-4 ps-5"></div>
                    <div class="col-md-8 pe-5">
                      <p id="kekayaanBersihValidation" class="validation-message" aria-live="polite"></p>
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Hasil Penjualan Tahunan</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" name="hasil_penjualan_tahunan" class="number form-control form-control-lg" value="{{$peserta->peserta_profil->hasil_penjualan_tahunan}}" required autocomplete="off" aria-describedby="hasilPenjualanValidation"/>
                    </div>
                    <div class="col-md-4 ps-5"></div>
                    <div class="col-md-8 pe-5">
                      <p id="hasilPenjualanValidation" class="validation-message" aria-live="polite"></p>
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Jenis Organisasi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <select name="jenis_organisasi" class="form-select form-select-lg" data-label="Select One">
                        <option value="induk">Induk</option>
                        <option value="cabang">Cabang</option>
                        <option value="anak">Anak</option>
                        <option value="tidak">Tidak</option>
                      </select>
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Kewenangan Kebijakan</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" name="kewenangan_kebijakan" class="form-control form-control-lg" value="{{$peserta->peserta_profil->kewenangan_kebijakan}}" required pattern="^(?![_. ])(?!.*[_. ]{2})[a-zA-Z._ ]+(?<![_. ])$" autocomplete="off" aria-describedby="kewenanganKebijakanValidation"/>
                    </div>
                    <div class="col-md-4 ps-5"></div>
                    <div class="col-md-8 pe-5">
                      <p id="kewenanganKebijakanValidation" class="validation-message" aria-live="polite"></p>
                    </div>
                </div>

                <div class="px-5 py-4 d-flex justify-content-end gap-3">
                  <a href="/peserta/profil" role="button" class="btn nonactive" style="width: 13%;">Batal</a>
                  {{-- <button type="submit" class="btn nonactive" style="width: 13%;">Batal</button> --}}
                  <button type="submit" class="btn" style="width: 13%;">Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- Dokumen start -->
  {{-- <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
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
                    <h6 class="mb-0">Legalitas Hukum Organisasi</h6>
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
                    <h6 class="mb-0">SPPT SNI</h6>
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
                    <h6 class="mb-0">Surat Keterangan Kemenkeuham</h6>
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
  </div>
  <!-- Dokumen end -->

   <!-- Kontak start -->
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
  </div>
  <!-- Kontak end -->

<!-- Ubah password start -->
  <div class="tab-pane" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
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
                      <h6 class="mb-0">Kata Sandi Lama</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="password" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Kata Sandi Baru</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="password" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Konfirmasi Kata Sandi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="password" class="form-control form-control-lg" />
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
  </div>
  <!-- Ubah password end --> --}}

</div>
<script>
  $(document).ready(()=>{
      $('#input_lembaga_sertifikasi').select2({
          tags: true,
      });

  });

  document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    // Function to handle custom validation
    const customValidationHandler = (event) => {
        event.target.setCustomValidity('');
        
        if(event.target.validity.valueMissing) {
            event.target.setCustomValidity('Wajib diisi!');
            return;
        }

        if(event.target.type === 'text' && event.target.validity.patternMismatch) {
            event.target.setCustomValidity('Tidak boleh diawali dengan spasi, mengandung angka, dan mengandung karakter spesial seperti dolar ($).');
            return;
        }

        if(event.target.type === 'tel' && event.target.validity.patternMismatch) {
            event.target.setCustomValidity('Tidak boleh diawali dengan spasi, harus berupa angka, dan panjang karakter minimal 10 dan maksimal 15.');
            return;
        }

        if(event.target.type === 'url' && event.target.validity.patternMismatch) {
            event.target.setCustomValidity("Tidak boleh diawali dengan spasi, dan harus menyertakan 'https://(nama_website)'.");
            return;
        }
    };

    // Function to display validation message
    const displayValidationMessage = (event) => {
        const isValid = event.target.validity.valid;
        const errorMessage = event.target.validationMessage;

        const connectedValidationId = event.target.getAttribute('aria-describedby');
        const connectedValidationEl = connectedValidationId ? document.getElementById(connectedValidationId) : null;

        if(connectedValidationEl && errorMessage && !isValid) {
            connectedValidationEl.innerText = errorMessage;
        } else {
            connectedValidationEl.innerText = '';
        }
    };

    // Select all inputs within the form that need validation
    const inputs = form.querySelectorAll('input[required]');

    inputs.forEach(input => {
        input.addEventListener('change', customValidationHandler);
        input.addEventListener('invalid', customValidationHandler);
        input.addEventListener('blur', displayValidationMessage);
    });

    // form.addEventListener('submit', (event) => event.preventDefault());
});

// VALIDASI UNTUK INPUT BERCLASS NUMBER
const numberInputs = document.querySelectorAll('input.number');

// Menambahkan event listener untuk setiap elemen input yang ditemukan
numberInputs.forEach(input => {
  input.addEventListener('input', function() {
    const removeChar = this.value.replace(/[^0-9\.]/g, ''); // Menghapus huruf dan karakter spesial
    const removeDot = removeChar.replace(/\./g, ''); // Menghapus titik
    this.value = removeDot;

    const formattedNumber = this.value.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Menambahkan titik sebagai pemisah ribuan
    this.value = formattedNumber;
  });
});

$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Select One",
        allowClear: true
    });
});


</script>

@endsection('content')
