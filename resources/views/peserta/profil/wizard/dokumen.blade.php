<form  method="POST" action="/peserta/profil/dokumen" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
  @csrf
  <div class="content-profil pt-5 mb-5">
    <div class="d-flex align-items-center gap-2">
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
                    <h6 class="mb-0">Legalitas Hukum Organisasi <span style="color: #FF0101;">*</span></h6>
                  </div>
                  <div class="container col-md-8 pe-5">
                    <div class="input-group custom-file-button">
                      <label class="input-group-text px-4" for="inputGroupFile1">Unggah</label>
                      <label class="label-unik px-4" id="file-input-label" for="inputGroupFile1">Maksimum upload file : 10 MB </label>
                    <input type="file" name="url_legalitas_hukum_organisasi" accept=".pdf" class="form-control unik form-control-lg" id="inputGroupFile1">
                    </div>
                  </div>
                </div>

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                    <h6 class="mb-0">SPPT SNI <span style="color: #FF0101;">*</span></h6>
                  </div>
                  
                  <div class="container col-md-8 pe-5">
                    <div class="input-group custom-file-button">
                      <label class="input-group-text px-4" for="inputGroupFile2">Unggah</label>
                      <label class="label-unik px-4" id="file-input-label" for="inputGroupFile2">Maksimum upload file : 10 MB </label>
                      <input type="file" name="url_sppt_sni" accept=".pdf" class="form-control unik form-control-lg" id="inputGroupFile2">
                    </div>
                  </div>
                </div>

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                    <h6 class="mb-0">SK Kemenkumham <span style="color: #FF0101;">*</span></h6>
                  </div>

                  <div class="container col-md-8 pe-5">
                    <div class="input-group custom-file-button">
                      <label class="input-group-text px-4" for="inputGroupFile3">Unggah</label>
                      <label class="label-unik px-4" id="file-input-label" for="inputGroupFile3">Maksimum upload file : 10 MB </label>
                      <input type="file" name="url_sk_kemenkumham" accept=".pdf" class="form-control unik form-control-lg" id="inputGroupFile3">
                    </div>
                  </div>
                </div>

                <div class="row align-items-center pb-3">
                  <div class="col-md-4 ps-5">
                    <h6 class="mb-0">Kewenangan dan Kebijakan</h6>
                  </div>

                  <div class="container col-md-8 pe-5">
                    <div class="input-group custom-file-button">
                      <label class="input-group-text px-4" for="inputGroupFile3">Unggah</label>
                      <label class="label-unik px-4" id="file-input-label" for="inputGroupFile3">Maksimum upload file : 10 MB </label>
                      <input type="file" name="url_kewenangan_kebijakan" accept=".pdf" class="form-control unik form-control-lg" id="inputGroupFile3">
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
</form>