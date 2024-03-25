@extends('admin.layouts.master')

@section('content')
<style>
  .data{
        padding: 10px 15px;
        border: 1px solid lightgray;
        border-radius: 15px;
        background-color: #aaaaaa20;
        font-size: 18px;
    }
</style>
<main class="container">
    <div class="tab-content" id="tab-content">
        <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
          <div class="content-profil pt-5">
            <div class="d-flex flex-column text-center justify-content-center gap-3">
              <img src="{{ asset('assets') }}/peserta/images/foto-profil.png" class="profil mx-auto" alt="">
              <a href="/admin/profil/edit" class="btn mx-auto mb-1">Edit Profil</a>
              <span>Kelola informasi profil anda untuk mengontrol, melindungi dan mengamankan akun</span>
            </div>
      
            <div class="container mt-4">
              <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                  <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                      <div class="row align-items-center pt-4 pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">No. Telfon</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->no_hp }}</div>
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">NPWP <span style="color: #FF0101;">*</span></h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->npwp }}</div>
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">No. Rekening <span style="color: #FF0101;">*</span></h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data">{{ $peserta->peserta_profil->no_rekening }}</div>
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                            <h6 class="mb-0">URL CV <span style="color: #FF0101;">*</span></h6>
                        </div>
      
                        <div class="col-md-8 pe-5">
                            <div class="data"><a href="{{ $peserta->peserta_profil->url_cv }}" target="_blank">{{ $peserta->peserta_profil->url_cv }}</a></div>
                        </div>
                      </div>

                      <div class="row align-items-center pb-3 mb-5">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">URL Anti Penyuapan</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <div class="data"><a href="{{ $peserta->peserta_profil->url_anti_penyuapan }}" target="_blank">{{ $peserta->peserta_profil->url_anti_penyuapan }}</a></div>
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
</main>
@endsection
