@extends('admin.layouts.master')

@section('content')
<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Dokumen</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Linimasa</a>
  </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
  <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
  <div class="content-profil pt-5 mb-5">
      <div class="d-flex flex-column gap-3">
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
                      <h6 class="mb-0">Nama Dokumen</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                      <input type="text" class="form-control form-control-lg"/>
                    </div>
                </div>


                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                    
                  </div>
                  
                  <div class="container col-md-8 pe-5">
                    <div class="input-group custom-file-button">
                      <label class="input-group-text px-4" for="inputGroupFile2">Unggah</label>
                      <label class="label-unik px-4" id="file-input-label" for="inputGroupFile2">Maksimum upload file : 10 MB </label>
                      <input type="file" class="form-control unik form-control-lg" id="inputGroupFile2">
                    </div>
                  </div>
                </div>

                <div class="row align-items-center pb-3 justify-content-end pe-5">
                    <button class="btn btn-tambah" style="width: 13%;">Tambah</button>
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

  <!-- Dokumen start -->
  <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
    <div class="content-profil pt-5 mb-5">
      <div class="d-flex flex-column gap-3">
        <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Linimasa</h3>
        <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
      </div>
    <div class="container mt-4">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-xl-12">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body">

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                    <h6 class="mb-0">Banner</h6>
                  </div>
                  <div class="container col-md-8 pe-5">
                    <div class="input-group custom-file-button">
                      <label class="input-group-text px-4" for="inputGroupFile1">Unggah</label>
                      <label class="label-unik px-4" id="file-input-label" for="inputGroupFile1">Maksimum upload file : 10 MB </label>
                      <input type="file" class="form-control unik form-control-lg" id="inputGroupFile1">
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

</div>
@endsection('content')
