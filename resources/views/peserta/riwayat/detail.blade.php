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
                          value="Selanjutnya"
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
                        value="Selanjutnya"
                      />
                      <input
                        type="button"
                        name="previous"
                        class="btn previous action-button-previous float-end me-3"
                        value="Sebelumnya"
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
                        value="Sebelumnya"
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

                    <select class="form-select kategori_pertanyaan ps-3 ms-auto" aria-label="Default select example">
                        <option selected value="1">Kepemimpinan</option>
                        <option value="2">Strategi</option>
                        <option value="3">Strategi</option>
                        <option value="4">Pelanggan</option>
                        <option value="5">dan lain-lain..</option>
                      </select>
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
                      <div class="jawaban d-flex justify-content-between align-items-center w-100 mt-4 gap-5">
                        <div class="d-flex flex-column gap-3">
                          <div class="active d-flex align-items-center py-1 px-3">Standar tidak menjadi acuan dalam penetapan visi, misi maupun operasional</div>
                          <div class="d-flex align-items-center py-1 px-3">Standar hanya digunakan operasional dalam bagian tertentu</div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center py-1 px-3">Standar masih sebatas acuan dalam penetapan visi, misi dan tata nilai</div>
                          <div class="d-flex align-items-center py-1 px-3">Visi, misi dan tata nilai secara eksplisit mengacu kepada standar</div>
                        </div>
                      </div>
                    </div>

                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-5">
                      <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                        <h3 class="m-0">Pertanyaan 2</h3>
                        <p class="m-0">Visi, Tata Nilai, dan Misi</p>
                      </div>
                      <div class="pertanyaan d-flex flex-column text-center">
                        <p class="m-0">Apakah organisasi mensosialisasi standar (SNI) dan penilaian kesesuaian ke internal maupun mitra?</p>
                      </div>
                      <div class="jawaban d-flex justify-content-evenly align-items-center w-100 mt-4 gap-5">
                        <div class="d-flex flex-column gap-3">
                          <div class="active d-flex align-items-center py-1 px-3">Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian</div>
                          <div class="d-flex align-items-center py-1 px-3">Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian</div>
                          <div class="d-flex align-items-center py-1 px-3">Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian </div>
                          <div class="d-flex align-items-center py-1 px-3"> Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian </div>
                        </div>
                        
                      </div>
                    </div>

                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-5">
                      <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                        <h3 class="m-0">Pertanyaan 3</h3>
                        <p class="m-0">Visi, Tata Nilai, dan Misi</p>
                      </div>
                      <div class="pertanyaan d-flex flex-column text-center">
                        <p class="m-0">Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan Good Corporate Governace (GCG)?</p>
                      </div>
                      <div class="jawaban d-flex justify-content-evenly align-items-center w-100 mt-4 gap-5">
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center py-1 px-3">Memiliki sistem GCG yang mengacu kepada standar</div>
                          <div class="d-flex align-items-center py-1 px-3">Sistem GCG sudah mengacu standar (contoh:  SNI ISO 37001)</div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center py-1 px-3">Sistem GCG sudah melebihi dan mempertimbangkan ESG</div>
                          <div class="active d-flex align-items-center py-1 px-3">Penerapan GCG sudah menjadi role model dalam sektor bisnisnya</div>
                        </div>
                      </div>
                    </div>
                    <input
                      type="button"
                      name="selanjutnyaAssesment"
                      class="btn selanjutnyaAssesment action-button float-end mt-5"
                      value="Selanjutnya"
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
                     
                    />
                    <input
                        type="button"
                        name="sebelumnyaAssesment"
                        class="btn sebelumnyaAssesment action-button-previous float-end mt-5 me-3"
                        value="Sebelumnya"
                       
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
                      name="sebelumnyaAssesment"
                      class="btn sebelumnyaAssesment action-button-previous float-end mt-5"
                      value="Sebelumnya"
                    />
                  </fieldset>

                  
                
        </div>
    </div>

  </div>

<!-- Dokumen Section -->
  <div class="tab-pane" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
    <div class="content-profil py-5 mb-5">
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
              <td scope="row">Upload Kuesioner</td>
              <td class="text-center"><button class="btn btn-lihat">Lihat</button></td>
            </tr>
            <tr>
              <td scope="row">Lembar Pernyataan Tidak Terlibat Kasus Hukum</td>
              <td class="text-center"><button class="btn btn-upload">Upload</button></td>
            </tr>          
          </tbody>
        </table>
      </div>
    </div>

    <hr class="p-0">
    <div class="content-profil py-5">
      <div class="d-flex align-items-center gap-2">
        <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Feedback</h3>
        <hr class="p-0" style="height: 1px; width: 100%; background-color: #CC9305;">
      </div>

        <div class="container mt-4" style="border: 1px solid #9FAFBF; border-radius: 15px;">
        <div class="d-flex flex-row py-5">
          <div class="d-flex gap-2">
            <img src="{{ asset('assets') }}/peserta/images/foto-profil.png" width="26" height="26" style="border-radius: 50px; border: 1px solid #D9D9D9;" alt="img">
            <div class="d-flex flex-column gap-1">
              <div class="py-2 px-3" style="background-color: #D9D9D9; border-top-right-radius: 15px; border-bottom-right-radius: 15px; font-size: 100%; box-shadow: inset 3px 0px 0px 0px rgba(204,147,5,1);">
                Dokumen Keterangan Kemenkeuham tidak sesuai
              </div>
              <div class="ms-auto" style="color: #595959; font-size: 90%">
                17:20:29
              </div>
            </div>
          </div>
        </div>

        </div>
  </div>
  </div>
</div>
@endsection('content')