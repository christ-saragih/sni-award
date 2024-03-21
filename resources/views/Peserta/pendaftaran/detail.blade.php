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
    <!-- Assessment detail -->
    <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
    <div class="content-ubah-password py-5">
        <h3 class="mb-5 pb-0" style="font-size: 200%; font-weight: bold; color: #2b2b2b;">Jawablah Pertanyaan di Bawah Ini</h3>
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

                    <div class="text-center kategori_pertanyaan_single ms-auto">
                        Kepemimpinan
                      </div>
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
                      <div class="jawaban d-flex flex-wrap justify-content-between align-items-center w-100 mt-4 gap-3">
                            <label onclick="ubahWarna(this)" class="d-flex align-items-center py-1 px-3">
                                <input type="radio" name="jawaban" value="A"> Standar tidak menjadi acuan dalam penetapan visi, misi maupun operasional
                            </label>
                            <label onclick="ubahWarna(this)" class="d-flex align-items-center py-1 px-3">
                                <input type="radio" name="jawaban" value="B">Standar hanya digunakan operasional dalam bagian tertentu
                            </label>
                            <label onclick="ubahWarna(this)" class="d-flex align-items-center py-1 px-3">
                                <input type="radio" name="jawaban" value="B">Standar masih sebatas acuan dalam penetapan visi, misi dan tata nilai
                            </label>
                            <label onclick="ubahWarna(this)" class="d-flex align-items-center py-1 px-3">
                                <input type="radio" name="jawaban" value="B">Visi, misi dan tata nilai secara eksplisit mengacu kepada standar
                            </label>
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
                      <div class="jawaban-banyak d-flex flex-column justify-content-evenly align-items-center w-100 mt-4 gap-3">
                            <label onclick="ubahWarna(this)" class="d-flex align-items-center py-1 px-3">
                                <input type="radio" name="jawaban" value="A">Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian
                            </label>
                            <label onclick="ubahWarna(this)" class="d-flex align-items-center py-1 px-3">
                                <input type="radio" name="jawaban" value="A">Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian
                            </label>
                            <label onclick="ubahWarna(this)" class="d-flex align-items-center py-1 px-3">
                                <input type="radio" name="jawaban" value="A">Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian 
                            </label>
                            <label onclick="ubahWarna(this)" class="d-flex align-items-center py-1 px-3">
                                <input type="radio" name="jawaban" value="A">Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian 
                            </label>
                        <!-- <div class="d-flex flex-column gap-3">
                          <div class="active d-flex align-items-center py-1 px-3">Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian</div>
                          <div class="d-flex align-items-center py-1 px-3">Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian</div>
                          <div class="d-flex align-items-center py-1 px-3">Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian </div>
                          <div class="d-flex align-items-center py-1 px-3"> Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian </div>
                        </div> -->
                        
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
                      <div class="jawaban d-flex flex-wrap justify-content-between align-items-center w-100 mt-4 gap-3">
                            <label onclick="ubahWarna(this)" class="d-flex align-items-center py-1 px-3">
                                <input type="radio" name="jawaban" value="A"> Standar tidak menjadi acuan dalam penetapan visi, misi maupun operasional
                            </label>
                            <label onclick="ubahWarna(this)" class="d-flex align-items-center py-1 px-3">
                                <input type="radio" name="jawaban" value="B">Standar hanya digunakan operasional dalam bagian tertentu
                            </label>
                            <label onclick="ubahWarna(this)" class="d-flex align-items-center py-1 px-3">
                                <input type="radio" name="jawaban" value="B">Standar masih sebatas acuan dalam penetapan visi, misi dan tata nilai
                            </label>
                            <label onclick="ubahWarna(this)" class="d-flex align-items-center py-1 px-3">
                                <input type="radio" name="jawaban" value="B">Visi, misi dan tata nilai secara eksplisit mengacu kepada standar
                            </label>
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
    <!-- Assessment detail end -->
    
  <!-- Dokumen Section -->
  <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
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
              <td class="text-center"><button class="btn btn-upload">Upload</button></td>
            </tr>
            <tr>
              <td scope="row">Lembar Pernyataan Tidak Terlibat Kasus Hukum</td>
              <td class="text-center"><button class="btn btn-upload">Upload</button></td>
            </tr>          
          </tbody>
        </table>
        <div class="mt-5 me-2 px-5 py-4 d-flex justify-content-end gap-3">
          <button type="submit" class="btn nonactive" style="width: 13%;">Batal</button>
          <button type="submit" class="btn" style="width: 13%;">Simpan</button>
        </div>
      </div>

      
    </div>
</div>
@endsection('content')
