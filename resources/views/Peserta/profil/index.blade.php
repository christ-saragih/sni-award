@extends('peserta.layouts.master')

@section('content')
<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Profil</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Kontak</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Ubah Password</a>
  </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
  <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
    <div class="content-profil py-5">
      <div class="d-flex flex-column text-center justify-content-center gap-3">
        <img src="{{ asset('assets') }}/peserta/images/foto-profil.png" class="mx-auto" alt="">
        <button class="btn mx-auto mb-1">Edit Profil</button>
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
                      <input type="text" class="form-control form-control-lg"/>
                    </div>
                </div>

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
                    <h6 class="mb-0">Surat Keterangan Kemenkeuham </h6>
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
                      <h6 class="mb-0">Jabatan Tertinggi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" class="form-control form-control-lg" />
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Website</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" class="form-control form-control-lg" />
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Tanggal beroperasi</h6>
                  </div>

                  <div class="col-md-4 pe-5">
                    <div class="form-group input-group">
                      <input type="text" class="form-control form-control-lg" id="inputCalendar" />
                      <label class="input-group-text" style="background-color: #D7DAE3; border-radius: 0 15px 15px 0; border-right: 1px solid #9fafbf; border-top: 1px solid #9fafbf; border-bottom: 1px solid #9fafbf; color: #595959;"><i class="fa fa-calendar"></i></label>
                    </div>
                  </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Status Kepemilikan</h6>
                    </div>
                    <div class="col-md-4 pe-5">
                      <input type="text" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Jenis  Produk</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Lembaga sertifikasi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Negara tujuan ekspor</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Sektor kategori organisasi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Kekayaan Bersih</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Sektor kategori organisasi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Hasil Penjualan Tahunan</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                      <h6 class="mb-0">Jenis Organisasi</h6>
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

  <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
    <div class="content-kontak py-4 mb-4">
      <div class="d-flex align-items-center justify-content-between text-center mt-2">
        <h3 class="m-0" style="font-size: 150%; font-weight: bold;">Tambahkan Kontak Penghubung</h3>
       <i class="fa fa-plus-square fa-3x" style="color: #552525;"></i>
      </div>
    </div>

    <div class="content-kontak-form mb-5">
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-xl-12">
            <div class="card my-5" style="border-radius: 15px;">
              <div class="card-body">
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

  <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
    <div class="content-ubah-password py-5">
      <h3 style="font-size: 150%; font-weight: bold;">Ubah Kata Sandi Anda</h3>
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-xl-12">
            <div class="card my-5" style="border-radius: 15px;">
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
</div>
@endsection('content')
