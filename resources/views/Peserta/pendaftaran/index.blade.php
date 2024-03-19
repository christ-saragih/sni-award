@extends('peserta.layouts.master')

@section('content')
<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Assessment</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Dokumen</a>
  </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
  <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
    <div class="content-profil py-5">
      <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Assessment Mandiri</h3>
        <div class="container mt-4">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-12">
              <div class="card" style="border-radius: 15px;">
                <div class="card-body">
                </div>  
              </div>
            </div>
          </div>
        </div>
    </div>

    
    <div class="content-site-evaluation mt-4 py-5 gap-2 d-flex justify-content-center flex-column text-center">
      <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Site Evaluation</h3>
      <span>Sedang Tahap penilaian Desk Evaluation. Harap Ditunggu!</span>
    </div>
    <hr class="p-0">
  </div>
    
  <!-- Tim Section -->
<div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
<div class="content-profil py-5 mb-5">
      <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Tim Site Evaluation</h3>
        <div class="container mt-4">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-12">
              <div class="card" style="border-radius: 15px;">
                <div class="fieldset">
                  <div class="card-body">
                    <div class="card-body pt-0 mt-0">
                      <div class="row align-items-center pt-4 mb-5">
                        <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                          <h5 class="mb-0">Evaluator</h5>
                          <hr class="" style="height: 1px;" >
                        </div>
                        
                      </div>     
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Nama</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                          <p class="form-control form-control-lg m-0">Bennefit</p>
                        </div>
                      </div>     
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Jabatan</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                          <p class="form-control form-control-lg m-0">Chief Information Officer</p>
                        </div>
                      </div>     
                    </div>

                    <div class="card-body pt-0 mt-0">
                      <div class="row align-items-center pt-4 mb-5">
                        <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                          <h5 class="mb-0">Lead Evaluator</h5>
                          <hr class="" style="height: 1px;" >
                        </div>
                        
                      </div>     
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Nama</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                          <p class="form-control form-control-lg m-0">Bennefit</p>
                        </div>
                      </div>     
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Jabatan</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                          <p class="form-control form-control-lg m-0">Chief Information Officer</p>
                        </div>
                      </div>     
                    </div>

                    <div class="card-body pt-0 mt-0">
                      <div class="row align-items-center pt-4 mb-5">
                        <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                          <h5 class="mb-0">Sekretariat</h5>
                          <hr class="" style="height: 1px;" >
                        </div>
                        
                      </div>     
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Nama</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                          <p class="form-control form-control-lg m-0">Bennefit</p>
                        </div>
                      </div>     
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Jabatan</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                          <p class="form-control form-control-lg m-0">Chief Information Officer</p>
                        </div>
                      </div>     
                    </div>

                  </div> 
                </div>
                 
              </div>
            </div>
          </div>
        </div>
    </div>

    <hr class="p-0">
    <div class="content-profil py-5">
      <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Tim Desk Evaluation</h3>
        <div class="container mt-4">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-12">
              <div class="card" style="border-radius: 15px;">
                <div class="fieldset">
                  <div class="card-body">
                    <div class="card-body pt-0 mt-0">
                      <div class="row align-items-center pt-4 mb-5">
                        <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                          <h5 class="mb-0">Evaluator</h5>
                          <hr class="" style="height: 1px;">
                        </div>
                        
                      </div>     
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Nama</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                          <p class="form-control form-control-lg m-0">Bennefit</p>
                        </div>
                      </div>     
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Jabatan</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                          <p class="form-control form-control-lg m-0">Chief Information Officer</p>
                        </div>
                      </div>     
                    </div>

                    <div class="card-body pt-0 mt-0">
                      <div class="row align-items-center pt-4 mb-5">
                        <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                          <h5 class="mb-0">Lead Evaluator</h5>
                          <hr class="" style="height: 1px;">
                        </div>
                        
                      </div>     
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Nama</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                          <p class="form-control form-control-lg m-0">Bennefit</p>
                        </div>
                      </div>     
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Jabatan</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                          <p class="form-control form-control-lg m-0">Chief Information Officer</p>
                        </div>
                      </div>     
                    </div>

                    <div class="card-body pt-0 mt-0">
                      <div class="row align-items-center pt-4 mb-5">
                        <div class="col-md-12 ps-5 d-flex flex-column gap-3">
                          <h5 class="mb-0">Sekretariat</h5>
                          <hr class="" style="height: 1px;">
                        </div>
                        
                      </div>     
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Nama</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                          <p class="form-control form-control-lg m-0">Bennefit</p>
                        </div>
                      </div>     
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Jabatan</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                          <p class="form-control form-control-lg m-0">Chief Information Officer</p>
                        </div>
                      </div>     
                    </div>

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
