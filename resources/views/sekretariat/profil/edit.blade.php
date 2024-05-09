@extends('sekretariat.layouts.master')

@section('content')
<style>
    .data {
        font-size: 18px;
        border: 1px solid #9FAFBF;
        border-radius: 15px;
    }

    .img-container {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        border: 10px solid #ffffff;
        overflow: hidden;
        position: absolute;
        top: -90%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .img-container img {
        width: 100%;
        height: 100%; 
        object-fit: cover !important;
    }
</style>
<main class="container">
    <div class="tab-content" id="tab-content">
        <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
          <div class="content-profil" style="margin-top: 80px; padding-top: 80px;">
            <div class="d-flex flex-column align-items-center justify-content-center gap-2 position-relative">
                <div class="img-container position-absolute mb-5">
                    <img src="{{ asset('assets') }}/images/foto-peserta.jpg" alt="Foto Profil Sekretariat">
                </div>
              <h4 style="color: #000000; font-size: 22px; font-weight: bold;">Sekretariat</h4>
              <button class="btn action-button mx-auto mb-1" disabled>Edit Profil</button>
            </div>
      
            <div class="container mt-4">
              <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                  <div class="card" style="border-radius: 15px;">
                    <div class="card-body">

                        <div class="row align-items-center pt-4 pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Nama</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <input type="text" name="nama" class="form-control form-control-lg" value="BENNEFIT CHRISTY SARAGIH">
                          </div>
                        </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">No. Telepon</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <input type="tel" name="no_telepon" class="form-control form-control-lg" value="0812124321">
                          </div>
                      </div>
                      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Email</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <input type="email" name="email" class="form-control form-control-lg" value="bennefit.19@gmail.com">
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">NPWP</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <input type="number" name="npwp" class="form-control form-control-lg" value="123456789">
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">No. Rekening</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <input type="number" name="no_rekening" class="form-control form-control-lg" value="321456789">
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Dokumen CV</h6>
                        </div>
      
                        <div class="col-md-8 ps-5 pe-5">
                          <div class="input-group custom-file-button">
                            <label class="input-group-text px-4" for="inputGroupFile1">Unggah</label>
                            <label class="label-unik px-4" id="file-input-label" for="inputGroupFile1">Maksimum upload file : 10 MB </label>
                            <input type="file" name="dokumen_cv" class="form-control unik form-control-lg" id="inputGroupFile1">
                          </div>
                        </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Dokumen Anti Penyuapan</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <div class="input-group custom-file-button">
                              <label class="input-group-text px-4" for="inputGroupFile1">Unggah</label>
                              <label class="label-unik px-4" id="file-input-label" for="inputGroupFile1">Maksimum upload file : 10 MB </label>
                              <input type="file" name="dokumen_anti_penyuapan" class="form-control unik form-control-lg" id="inputGroupFile1">
                            </div>
                          </div>
                      </div>
                      
                      <div class="px-5 py-4 d-flex justify-content-end gap-3">
                        <a href="/peserta/profil" role="button" class="btn nonactive" style="width: 13%;">Batal</a>
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
</main>
@endsection
