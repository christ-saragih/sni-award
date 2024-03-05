@extends('peserta.layouts.master')

@section('content')
<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Penilaian</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Tim</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Assesment</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab" aria-controls="simple-tabpanel-3" aria-selected="false">Dokumen</a>
  </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
  <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
    <div class="content-profil py-5">
      <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Desk Evaluation</h3>
        <div class="container mt-4">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-12">
              <div class="card" style="border-radius: 15px;">
                <div class="card-body">
                  <form id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar" class="d-flex justify-content-between">
                      <li class="active" id="account">
                        <strong>Evaluator</strong>
                      </li>
                      <li id="personal"><strong>Lead Evaluator</strong></li>
                      <li id="payment"><strong>Sekretariat</strong></li>
                    </ul>
                    <div class="progress">
                      <div
                        class="progress-bar penilaian progress-bar-striped progress-bar-animated"
                        role="progressbar"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                    <br />
                    
                    <!-- fieldsets -->
                    <fieldset class="fieldset" id="fieldsetPenilaian">
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
                      
                    </fieldset>
                    
                    <fieldset class="fieldset" id="fieldsetPenilaian">
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

                    <fieldset class="fieldset" id="fieldsetPenilaian">
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

    
    <div class="content-site-evaluation mt-4 py-5 gap-2 d-flex justify-content-center flex-column text-center">
      <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Site Evaluation</h3>
      <span>Sedang Tahap penilaian Desk Evaluation. Harap Ditunggu!</span>
    </div>
    <hr class="p-0">
  </div>
    
  <!-- Tim Section -->
<div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
    <div class="content-profil py-5 mb-5">
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

<!-- Assesment Section -->
  <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
    <div class="content-ubah-password py-5">
        <div class="container mt-4 d-flex flex-column gap-4">
          <div class="kategori-pertanyaan d-flex justify-content-evenly" style="height: 75px;">
            <div class="mh-100 d-flex align-items-center justify-content-center">Kepemimpinan</div>
            <div class="mh-100 d-flex align-items-center justify-content-center">Strategi</div>
          </div>
          <div class="kategori-pertanyaan d-flex justify-content-evenly" style="height: 75px;">
            <div class="mh-100 d-flex align-items-center justify-content-center">Kepemimpinan</div>
            <div class="mh-100 d-flex align-items-center justify-content-center">Strategi</div>
          </div>
          <div class="kategori-pertanyaan d-flex justify-content-evenly mb-5" style="height: 75px;">
            <div class="mh-100 d-flex align-items-center justify-content-center">Kepemimpinan</div>
            <div class="mh-100 d-flex align-items-center justify-content-center">Strategi</div>
          </div>

          <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Jawab Pertanyaan di Bawah Ini</h3>
            <hr class="p-0" style="height: 1px;">
                  <div class="d-flex align-items-center">
                    <div class="progress flex-grow-1" style="height: 9px;">
                      <div
                        class="progress-bar pertanyaan"
                        role="progressbar"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        style="background-color: #E59B30;"
                      ></div>
                    </div>

                    <div class="kategori_pertanyaan ms-auto text-center">
                      Kepemimpinan
                    </div>

                    <!-- <select class="form-select form-control-lg ms-auto" style="width: 20%;" aria-label="Default select example">
                        <option selected value="1">vdsfasd</option>
                        <option value="2">Strategi</option>
                        <option value="3">Strategi</option>
                        <option value="4">Pelanggan</option>
                        <option value="5">dan lain-lain..</option>
                      </select> -->
                  </div>

                  <!-- fieldset pertanyaan -->
                  <fieldset class="fieldset" id="fieldsetPertanyaan">
                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-4">
                      <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                        <h3 class="m-0">Pertanyaan 1</h3>
                        <p class="m-0">Visi, Tata Nilai, dan Misi</p>
                      </div>
                      <div class="pertanyaan d-flex flex-column text-center">
                        <p class="m-0">Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan visi, misi dan tata nilai?</p>
                      </div>
                      <div class="jawaban d-flex justify-content-evenly align-items-center w-100 mt-5">
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">A. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">B. Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">C. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">D. Lorem ipsum dolor sit amet</div>
                        </div>
                        
                      </div>
                    </div>

                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-5">
                      <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                        <h3 class="m-0">Pertanyaan 2</h3>
                        <p class="m-0">Visi, Tata Nilai, dan Misi</p>
                      </div>
                      <div class="pertanyaan d-flex flex-column text-center">
                        <p class="m-0">Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan visi, misi dan tata nilai?</p>
                      </div>
                      <div class="jawaban d-flex justify-content-evenly align-items-center w-100 mt-5">
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">A. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">B. Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">C. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">D. Lorem ipsum dolor sit amet</div>
                        </div>
                        
                      </div>
                    </div>

                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-5">
                      <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                        <h3 class="m-0">Pertanyaan 3</h3>
                        <p class="m-0">Visi, Tata Nilai, dan Misi</p>
                      </div>
                      <div class="pertanyaan d-flex flex-column text-center">
                        <p class="m-0">Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan visi, misi dan tata nilai?</p>
                      </div>
                      <div class="jawaban d-flex justify-content-evenly align-items-center w-100 mt-5">
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">A. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">B. Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">C. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">D. Lorem ipsum dolor sit amet</div>
                        </div>
                      </div>
                    </div>
                    <input
                      type="button"
                      name="selanjutnyaAssesment"
                      class="btn selanjutnyaAssesment action-button float-end mt-5"
                      value="Selanjutnya"
                      style="width: 13%;"
                    />
                  </fieldset>

                  <fieldset class="fieldset" id="fieldsetPertanyaan">
                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-4">
                      <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                        <h3 class="m-0">Pertanyaan 1</h3>
                        <p class="m-0">Pengembangan Strategi</p>
                      </div>
                      <div class="pertanyaan d-flex flex-column text-center">
                        <p class="m-0">Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan visi, misi dan tata nilai?</p>
                      </div>
                      <div class="jawaban d-flex justify-content-evenly align-items-center w-100 mt-5">
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">A. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">B. Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">C. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">D. Lorem ipsum dolor sit amet</div>
                        </div>
                        
                      </div>
                    </div>

                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-5">
                      <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                        <h3 class="m-0">Pertanyaan 2</h3>
                        <p class="m-0">Pengembangan Strategi</p>
                      </div>
                      <div class="pertanyaan d-flex flex-column text-center">
                        <p class="m-0">Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan visi, misi dan tata nilai?</p>
                      </div>
                      <div class="jawaban d-flex justify-content-evenly align-items-center w-100 mt-5">
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">A. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">B. Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">C. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">D. Lorem ipsum dolor sit amet</div>
                        </div>
                        
                      </div>
                    </div>

                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-5">
                      <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                        <h3 class="m-0">Pertanyaan 3</h3>
                        <p class="m-0">Pengembangan Strategi</p>
                      </div>
                      <div class="pertanyaan d-flex flex-column text-center">
                        <p class="m-0">Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan visi, misi dan tata nilai?</p>
                      </div>
                      <div class="jawaban d-flex justify-content-evenly align-items-center w-100 mt-5">
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">A. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">B. Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">C. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">D. Lorem ipsum dolor sit amet</div>
                        </div>
                      </div>
                    </div>
                    <input
                      type="button"
                      name="selanjutnyaAssesment"
                      class="btn selanjutnyaAssesment action-button float-end mt-5"
                      value="Selanjutnya"
                      style="width: 13%;"
                    />
                  </fieldset>
                  
                  <fieldset class="fieldset" id="fieldsetPertanyaan">
                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-4">
                      <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                        <h3 class="m-0">Pertanyaan 1</h3>
                        <p class="m-0">Visi, Tata Nilai, dan Misi</p>
                      </div>
                      <div class="pertanyaan d-flex flex-column text-center">
                        <p class="m-0">Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan visi, misi dan tata nilai?</p>
                      </div>
                      <div class="jawaban d-flex justify-content-evenly align-items-center w-100 mt-5">
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">A. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">B. Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">C. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">D. Lorem ipsum dolor sit amet</div>
                        </div>
                        
                      </div>
                    </div>

                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-5">
                      <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                        <h3 class="m-0">Pertanyaan 2</h3>
                        <p class="m-0">Visi, Tata Nilai, dan Misi</p>
                      </div>
                      <div class="pertanyaan d-flex flex-column text-center">
                        <p class="m-0">Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan visi, misi dan tata nilai?</p>
                      </div>
                      <div class="jawaban d-flex justify-content-evenly align-items-center w-100 mt-5">
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">A. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">B. Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">C. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">D. Lorem ipsum dolor sit amet</div>
                        </div>
                        
                      </div>
                    </div>

                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-5">
                      <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                        <h3 class="m-0">Pertanyaan 3</h3>
                        <p class="m-0">Visi, Tata Nilai, dan Misi</p>
                      </div>
                      <div class="pertanyaan d-flex flex-column text-center">
                        <p class="m-0">Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan visi, misi dan tata nilai?</p>
                      </div>
                      <div class="jawaban d-flex justify-content-evenly align-items-center w-100 mt-5">
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">A. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">B. Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center px-3">C. Lorem ipsum dolor sit amet</div>
                          <div class="d-flex align-items-center px-3">D. Lorem ipsum dolor sit amet</div>
                        </div>
                      </div>
                    </div>
                    <input
                      type="button"
                      name="selanjutnyaAssesment"
                      class="btn selanjutnyaAssesment action-button float-end mt-5"
                      value="Selanjutnya"
                      style="width: 13%;"
                    />
                  </fieldset>

                  
                
        </div>
    </div>

  </div>

<!-- Dokumen Section -->
  <div class="tab-pane" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
    <div class="content-profil py-5 mb-5">
      <h3 class="mb-0 pb-0">Unggah Dokumen</h3>
      <div class="container mt-4">
        <table class="table">
          <thead>
          <tr>
            <th scope="col">Nama Lampiran</th>
            <th class="text-center" scope="col">Aksi</th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">Scan legalitas hukum organisasi (SIUP/Akte Perusahaan)</td>
              <td class="text-center"><button class="btn btn-lihat">Ubah</button></td>
            </tr>
            <tr>
              <td scope="row">Lembar Pernyataan Tidak Terlibat Hukum Selama 3 Tahun Terakhir</td>
              <td class="text-center"><button class="btn btn-lihat">Ubah</button></td>
            </tr>
            <tr>
              <td scope="row">Sertifikat SNI yang dimiliki</td>
              <td class="text-center"><button class="btn btn-upload">Upload!</button></td>
            </tr>
            <tr>
              <td scope="row">Lembar Pernyataan Tidak Terlibat Hukum Selama 3 Tahun Terakhir</td>
              <td class="text-center"><button class="btn btn-lihat">Ubah</button></td>
            </tr>
            <tr>
              <td scope="row">Sertifikat SNI yang dimiliki</td>
              <td class="text-center"><button class="btn btn-upload">Upload!</button></td>
            </tr>

            
          </tbody>
        </table>
      </div>
      <!-- <div class="container mt-4">
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
      </div> -->
    </div>
  </div>
  </div>
</div>
@endsection('content')
