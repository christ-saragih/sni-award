@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="tab-content" id="tab-content">
        <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
          <div class="content-profil pt-5">
            <div class="d-flex flex-column text-center justify-content-center gap-3">
              <img src="{{ asset('assets') }}/peserta/images/foto-profil.png" class="profil mx-auto" alt="">
              <button type="disabled" class="btn edit mx-auto mb-1" style="cursor: none;">Edit Profil</button>
              <span>Kelola informasi profil anda untuk mengontrol, melindungi dan mengamankan akun</span>
            </div>
      
            <div class="container mt-4">
              <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                  <div class="card" style="border-radius: 15px;">
                    <form class="card-body" method="POST" action="{{ route('user.profil.edit') }}">
                        @method('PUT')
                        @csrf
                      <div class="row align-items-center pt-4 pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">No. Telepon</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <input type="text" name="no_hp" class="form-control form-control-lg" value="{{ $user->user_profil->no_hp }}"/>
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">NPWP <span style="color: #FF0101;">*</span></h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <input type="text" name="npwp" class="form-control form-control-lg" value="{{ $user->user_profil->npwp }}" />
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">No. Rekening <span style="color: #FF0101;">*</span></h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <input type="text" name="no_rekening" class="form-control form-control-lg" value="{{ $user->user_profil->no_rekening }}" />
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                            <h6 class="mb-0">URL CV <span style="color: #FF0101;">*</span></h6>
                        </div>
      
                        <div class="col-md-8 pe-5">
                            <input type="text" name="url_cv" class="form-control form-control-lg" value="{{ $user->user_profil->url_cv }}" />
                        </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">URL Anti Penyuapan</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <input type="text" name="url_anti_penyuapan" class="form-control form-control-lg" value="{{ $user->user_profil->url_anti_penyuapan }}" />
                          </div>
                      </div>
      
                      <div class="px-5 py-4 d-flex justify-content-end gap-3">
                        <a href="{{ route('user.profil.view') }}" class="btn nonactive" style="width: 13%;">Batal</a>
                        <button type="submit" class="btn" style="width: 13%;">Simpan</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
