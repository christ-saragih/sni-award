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
                    @foreach ($assessment_sub_kategori as $ask)
                      <fieldset class="fieldset" id="fieldsetPertanyaan">
                          @foreach ($ask->assessment_pertanyaan as $ap)
                            <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-4">
                              <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                                <h3 class="m-0">Pertanyaan {{ $loop->parent->iteration }}.{{ $loop->iteration }}</h3>
                                <p class="m-0">{{$ask->nama}}</p>
                              </div>
                              <div class="pertanyaan d-flex flex-column text-center">
                                <p class="m-0">{{$ap->pertanyaan}}</p>
                              </div>
                              <div class="jawaban d-flex flex-wrap justify-content-between align-items-center w-100 mt-4 gap-3">
                                @foreach ($ap->assessment_jawaban as $aj)
                                  <label class="jawaban-label d-flex align-items-center py-1 px-3" onclick="pilihJawaban(this)">
                                      <input type="radio" name="jawaban_{{ $ap->id }}" value="{{ $aj->id }}"> {{ $aj->jawaban }}
                                  </label>
                                @endforeach
                              </div>
                            </div>
                          @endforeach

                          <input
                            type="button"
                            name="selanjutnyaAssesment"
                            class="btn selanjutnyaAssesment action-button float-end mt-5"
                            value="Selanjutnya"
                          />
                      </fieldset>
                    @endforeach

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
