@extends('admin.layouts.master')

@section('content')
<style>
    .data {
        font-size: 18px;
        padding: 10px 15px;
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
              <h4 style="color: #000000; font-size: 22px; font-weight: bold; text-transform: capitalize;">{{ $role }}</h4>
              <a href="{{ route('user.profil.edit.view') }}" class="btn action-button mx-auto mb-1">Edit Profil</a>
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
                            <div class="data">{{ $user->name }}</div>
                          </div>
                        </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">No. Telepon</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <div class="data">{{ $user->user_profil ? $user->user_profil->no_hp : '' }}</div>
                          </div>
                      </div>
                      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Email</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <div class="data">{{ $user->email }}</div>
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">NPWP</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <div class="data">{{ $user->user_profil ? $user->user_profil->npwp : '' }}</div>
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">No. Rekening</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <div class="data">{{ $user->user_profil ? $user->user_profil->no_rekening : '' }}</div>
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Dokumen CV</h6>
                        </div>
                        <div class="col-md-8 ps-5 pe-5">
                            @if ($user->user_profil && $user->user_profil->url_cv)
                              <div class="data">
                                  <a href="{{ $user->user_profil->url_cv }}" target="_blank">
                                      <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem;"></i>
                                  </a>
                              </div>
                            @endif
                        </div>
                      </div>

                      <div class="row align-items-center pb-3 mb-5">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Dokumen Anti Penyuapan</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            @if ($user->user_profil && $user->user_profil->url_anti_penyuapan)
                              <div class="data">
                                  <a href="{{ $user->user_profil->url_anti_penyuapan }}" target="_blank">
                                      <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem;"></i>
                                  </a>
                              </div>
                            @endif
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
