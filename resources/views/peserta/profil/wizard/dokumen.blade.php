<style>
    .file-input {
    position: relative;
    overflow: hidden;
    display: inline-block;
    border: 1px solid #9fafbf;
    border-radius: 15px;
    width: 100%;
    display: flex;
    align-items: center;
    cursor: pointer;
  }

  .file-input input[type="file"] {
    position: absolute;
    font-size: 100px;
    opacity: 0;
    right: 0;
    top: 0;
  }

  .file-input-label {
    display: inline-block;
    font-size: 112.5%;
    color: #595959;
    background-color: #d7dae3;
    padding: 6px 12px;
    border-right: 1px solid #9fafbf;
    cursor: pointer;
  }

  #fileInputLabel1,
  #fileInputLabel2,
  #fileInputLabel3, 
  #fileInputLabel4 {
    width: 80%; 
    color: #9fafbf; 
    white-space: nowrap;
    overflow: hidden; 
    text-overflow: ellipsis;
    cursor: pointer;
  }
</style>

<form  method="POST" action="{{ route('peserta.profil.dokumen') }}" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1" enctype="multipart/form-data">
    {{-- @method('PUT') --}}
    @csrf


    @if (session('error'))
        <div class="alert alert-danger w-100" role="alert">
            {{ session('error') }}
        </div>
    @elseif (session('success'))
        <div class="alert alert-success w-100" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="content-profil pt-5 mb-5">
        <div class="d-flex align-items-center gap-2">
            <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Dokumen</h3>
            <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
        </div>
        <div class="mt-4">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="row align-items-center pb-3">
                                <div class="col-md-3">
                                    <h6 class="mb-0">Legalitas Hukum Organisasi <span style="color: #FF0101;">*</span></h6>
                                </div>
                                <div class="col-md-9">
                                    <div class="row align-items-center">
                                        @if (!$peserta->peserta_profil->url_legalitas_hukum_organisasi)
                                            <div class="col-md-11">
                                                <div class="file-input">
                                                    <input type="file" id="inputGroupFile1" name="url_legalitas_hukum_organisasi" accept=".pdf" onchange="handleFileSelect('inputGroupFile1', 'fileInputLabel1', 'fileName1')">
                                                    <label for="inputGroupFile1" class="file-input-label">Unggah</label>
                                                    <label for="inputGroupFile1" id="fileInputLabel1" class="mx-4" style="color: #9fafbf;">Maksimal upload file : 10 MB</label>
                                                    <div id="fileName1"></div>
                                                </div>
                                            </div>  
                                        @else
                                            <div class="col-md-11">
                                                <div class="file-input">
                                                    <input type="file" id="inputGroupFile1" name="url_legalitas_hukum_organisasi" accept=".pdf" onchange="handleFileSelect('inputGroupFile1', 'fileInputLabel1', 'fileName1')">
                                                    <label for="inputGroupFile1" class="file-input-label">Unggah</label>
                                                    <label for="inputGroupFile1" id="fileInputLabel1" class="mx-4" style="color: #9fafbf;">Maksimal upload file : 10 MB</label>
                                                    <div id="fileName1"></div>
                                                </div>
                                            </div>  

                                            <div class="col-md-1">
                                                <a href="{{ $peserta->peserta_profil->url_legalitas_hukum_organisasi }}" target="_blank">
                                                <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 12px; padding: 0.7rem"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center pb-3">
                                <div class="col-md-3">
                                    <h6 class="mb-0">SPPT SNI <span style="color: #FF0101;">*</span></h6>
                                </div>
                                <div class="col-md-9">
                                    <div class="row align-items-center">
                                        @if (!$peserta->peserta_profil->url_sppt_sni)
                                        <div class="col-md-11">
                                            <div class="file-input">
                                                <input type="file" id="inputGroupFile2" name="url_sppt_sni" accept=".pdf" onchange="handleFileSelect('inputGroupFile2', 'fileInputLabel2', 'fileName2')">
                                                <label for="inputGroupFile2" class="file-input-label">Unggah</label>
                                                <label for="inputGroupFile2" id="fileInputLabel2" class="mx-4" style="color: #9fafbf;">Maksimal upload file : 10 MB</label>
                                                <div id="fileName2"></div>
                                            </div>
                                        </div>
                                        @else
                                            <div class="col-md-11">
                                                <div class="file-input">
                                                    <input type="file" id="inputGroupFile2" name="url_sppt_sni" accept=".pdf" onchange="handleFileSelect('inputGroupFile2', 'fileInputLabel2', 'fileName2')">
                                                    <label for="inputGroupFile2" class="file-input-label">Unggah</label>
                                                    <label for="inputGroupFile2" id="fileInputLabel2" class="mx-4" style="color: #9fafbf;">Maksimal upload file : 10 MB</label>
                                                    <div id="fileName2"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{ $peserta->peserta_profil->url_sppt_sni }}"  target="_blank">
                                                <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 12px; padding: 0.7rem"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center pb-3">
                                <div class="col-md-3">
                                    <h6 class="mb-0">SK Kemenkumham <span style="color: #FF0101;">*</span></h6>
                                </div>
                                <div class="col-md-9">
                                    <div class="row align-items-center">
                                        @if (!$peserta->peserta_profil->url_sk_kemenkumham)
                                            <div class="col-md-11">
                                                <div class="file-input">
                                                    <input type="file" id="inputGroupFile3" name="url_sk_kemenkumham" accept=".pdf" onchange="handleFileSelect('inputGroupFile3', 'fileInputLabel3', 'fileName3')">
                                                    <label for="inputGroupFile3" class="file-input-label">Unggah</label>
                                                    <label for="inputGroupFile3" id="fileInputLabel3" class="mx-4" style="color: #9fafbf;">Maksimal upload file : 10 MB</label>
                                                    <div id="fileName3"></div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-11">
                                                <div class="file-input">
                                                    <input type="file" id="inputGroupFile3" name="url_sk_kemenkumham" accept=".pdf" onchange="handleFileSelect('inputGroupFile3', 'fileInputLabel3', 'fileName3')">
                                                    <label for="inputGroupFile3" class="file-input-label">Unggah</label>
                                                    <label for="inputGroupFile3" id="fileInputLabel3" class="mx-4" style="color: #9fafbf;">Maksimal upload file : 10 MB</label>
                                                    <div id="fileName3"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-1">
                                                <a href="{{ $peserta->peserta_profil->url_sk_kemenkumham }}" target="_blank">
                                                <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 12px; padding: 0.7rem"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center pb-3">
                                <div class="col-md-3">
                                    <h6 class="mb-0">Kewenangan dan Kebijakan<span style="color: #FF0101;">*</span></h6>
                                </div>
                                <div class="col-md-9">
                                    <div class="row align-items-center">
                                        @if (!$peserta->peserta_profil->url_kewenangan_kebijakan)
                                        <div class="col-md-11">
                                            <div class="file-input">
                                                <input type="file" id="inputGroupFile4" name="url_kewenangan_kebijakan" accept=".pdf" onchange="handleFileSelect('inputGroupFile4', 'fileInputLabel4', 'fileName4')">
                                                <label for="inputGroupFile4" class="file-input-label">Unggah</label>
                                                <label for="inputGroupFile4" id="fileInputLabel4" class="mx-4" style="color: #9fafbf;">Maksimal upload file : 10 MB</label>
                                                <div id="fileName4"></div>
                                            </div>
                                        </div>
                                        @else
                                            <div class="col-md-11">
                                                <div class="file-input">
                                                    <input type="file" id="inputGroupFile4" name="url_kewenangan_kebijakan" accept=".pdf" onchange="handleFileSelect('inputGroupFile4', 'fileInputLabel4', 'fileName4')">
                                                    <label for="inputGroupFile4" class="file-input-label">Unggah</label>
                                                    <label for="inputGroupFile4" id="fileInputLabel4" class="mx-4" style="color: #9fafbf;">Maksimal upload file : 10 MB</label>
                                                    <div id="fileName4"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{ $peserta->peserta_profil->url_kewenangan_kebijakan }}" target="_blank">
                                                    <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 12px; padding: 0.7rem"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="px-5 py-4 d-flex justify-content-end gap-3">
                                <a href="/peserta/profil" role="button" class="btn nonactive">Batal</a>
                                <button type="submit" class="btn">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    
function handleFileSelect(inputId, labelId, fileNameId) {
    const fileInput = document.getElementById(inputId);
    const fileInputLabel = document.getElementById(labelId);
    const fileNameDisplay = document.getElementById(fileNameId);
    const fileName = fileInput.files[0] ? fileInput.files[0].name : null;
    if (fileName) {
      fileInputLabel.textContent = fileName;
    //   fileNameDisplay.textContent = fileName;
    } else {
      fileInputLabel.textContent = "Maksimal upload file : 10 MB";
      fileNameDisplay.textContent = "";
    }
  }

</script>
