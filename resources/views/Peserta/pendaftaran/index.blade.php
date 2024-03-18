@extends('peserta.layouts.master')

@section('content')
<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Assessment</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab" aria-controls="simple-tabpanel-3" aria-selected="false">Dokumen</a>
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
                  <form id="msform">                    
                    <!-- fieldsets -->
                    <fieldset class="fieldset">
        
                    </fieldset>
                    
                    <fieldset class="fieldset">
                      <div class="card-body pt-0 mt-0">
                        <div class="row align-items-center pt-4 pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Nama Evaluator</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <p class="form-control form-control-lg m-0">Bennefit</p>
                          </div>
                        </div>

                        <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Nilai</h6>
                          </div>
                          <div class="col-md-2">
                            <div class="d-flex align-items-center gap-3">
                              <p class="form-control form-control-lg m-0">192</p>
                              <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a>
                            </div>
                          </div>
                        </div>

                        <div class="row pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0 mt-2">Komentar</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <p class="form-control form-control-lg m-0" style="max-height: 120px; overflow-y: auto;">Bagus, tapi ada beberapa yang tidak sesuai Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                          </div>
                        </div>        
                      </div>

                      <input
                        type="button"
                        name="next"
                        class="btn next action-button float-end"
                        value="Next"
                        style="width: 13%;"
                      />
                      <input
                        type="button"
                        name="previous"
                        class="btn previous action-button-previous float-end me-3"
                        value="Previous"
                        style="width: 13%;"
                      />
                    </fieldset>

                    <fieldset class="fieldset">
                      <div class="card-body pt-0 mt-0">
                        <div class="row align-items-center pt-4 pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Nama Evaluator</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <p class="form-control form-control-lg m-0">Bennefit</p>
                          </div>
                        </div>

                        <div class="row align-items-center pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Nilai</h6>
                          </div>
                          <div class="col-md-2">
                            <div class="d-flex align-items-center gap-3">
                              <p class="form-control form-control-lg m-0">192</p>
                              <a href="" style="border: 1px solid #552525; color: #552525; padding-block: 0.5rem; font-size: 1.25rem;" class="form-control form-control-lg text-center "><i class="fa fa-download"></i></a>
                            </div>
                          </div>
                        </div>

                        <div class="row pb-3">
                          <div class="col-md-4 ps-5">
                            <h6 class="mb-0 mt-2">Komentar</h6>
                          </div>
                          <div class="col-md-8 pe-5">
                            <p class="form-control form-control-lg m-0" style="max-height: 120px; overflow-y: auto;">Bagus, tapi ada beberapa yang tidak sesuai Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                          </div>
                        </div>        
                      </div>
                      <input
                        type="button"
                        name="previous"
                        class="btn previous action-button-previous float-end me-3"
                        value="Previous"
                        style="width: 13%;"
                      />
                    </fieldset>
                  </form>
                </div>  
              </div>
            </div>
          </div>
        </div>
    </div>

    
    
  <!-- Tim Section -->
@endsection('content')