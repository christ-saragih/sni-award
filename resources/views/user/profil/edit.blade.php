@extends('admin.layouts.master')

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

    .custom-file-button {
      border-right: 1px solid #9FAFBF !important;
      border-radius: 15px;
    }
    
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .input-file-group {
      display: flex;
      align-items: center;
      border-radius: 12px;
    }
    .input-file-group > .input-group-text {
      background-color: #D7DAE3;
      border-radius: 12px 0 0 12px;
      cursor: pointer;
    }
    .input-file-group > .label-text {
      height: 35px;
      width: 100%;
      color: #9FAFBF;
      cursor: pointer;
      display: flex;
      align-items: center;
      overflow: hidden;
      white-space: nowrap;
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
                    <form class="card-body" action="{{ route('user.profil.edit') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-4 ps-5">
                          <h6 class="mb-0">Nama</h6>
                        </div>
                        <div class="col-md-8 ps-5 pe-5">
                          <input type="text" name="name" class="form-control form-control-lg" value="{{ $user->name }}">
                        </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">No. Telepon</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <input type="number" name="no_hp" class="form-control form-control-lg" value="{{ $user->user_profil->no_hp }}">
                          </div>
                      </div>
                      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Email</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <input type="email" name="email" class="form-control form-control-lg" value="{{ $user->email }}">
                            <span class="ms-3" style="font-size: 14px;">
                              <span class="text-danger">*</span> 
                              Email untuk login akan berubah sesuai perubahan yang Anda buat
                            </span>
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">NPWP</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <input type="number" name="npwp" class="form-control form-control-lg" value="{{ $user->user_profil->npwp }}">
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">No. Rekening</h6>
                          </div>
                          <div class="col-md-8 ps-5 pe-5">
                            <input type="number" name="no_rekening" class="form-control form-control-lg" value="{{ $user->user_profil->no_rekening }}">
                          </div>
                      </div>
      
                      <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Dokumen CV</h6>
                        </div>
      
                        <div class="col-md-8 ps-5 pe-5">
                          <div class="input-file-group" style="border: 1px solid #9FAFBF;">
                            <label class="input-group-text px-4" for="inputCV" style="border: none;">Unggah</label>
                            <label class="label-text px-4" id="labelInputCV" for="inputCV" style="border: none; width:">Maksimum upload file : 10 MB </label>
                            <input type="file" oninput="handleFileInputCV(this)" accept=".pdf" name="url_cv" class="d-none form-control unik" id="inputCV">
                          </div>
                        </div>
                      </div>

                      <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Dokumen Anti Penyuapan</h6>
                          </div>

                          <div class="col-md-8 ps-5 pe-5">
                            <div class="input-file-group" style="border: 1px solid #9FAFBF;">
                              <label class="input-group-text px-4" for="inputAntiSuap" style="border: none;">Unggah</label>
                              <label class="label-text px-4" style="border: none;" id="labelInputAntiSuap" for="inputAntiSuap">Maksimum upload file : 10 MB </label>
                              <input type="file" oninput="handleFileInputAntiSuap(this)" accept=".pdf" name="url_anti_penyuapan" class="d-none form-control unik" id="inputAntiSuap">
                            </div>
                          </div>
                      </div>
                      
                      <div class="px-5 py-4 d-flex justify-content-end gap-3">
                        <a href="{{ route('user.profil.view') }}" role="button" class="btn nonactive" style="width: 13%;">Batal</a>
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
</main>
<script>
  const handleFileInputCV = (e) => {
    const filename = e.files[0].name
    const labelInputCV = document.getElementById('labelInputCV')
    labelInputCV.innerHTML = filename
    labelInputCV.style.color = 'black'
  }
  const handleFileInputAntiSuap = (e) => {
    const filename = e.files[0].name
    const labelInputAntiSuap = document.getElementById('labelInputAntiSuap')
    labelInputAntiSuap.innerHTML = filename
    labelInputAntiSuap.style.color = 'black'
  }
</script>
@endsection
