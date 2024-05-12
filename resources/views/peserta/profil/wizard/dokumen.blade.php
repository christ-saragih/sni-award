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
                                                <div class="input-group custom-file-button">
                                                    <label class="input-group-text" for="inputGroupFile1">Unggah</label>
                                                    <label class="label-unik" id="file-input-label1" for="inputGroupFile1">Maksimum upload file : 10 MB </label>
                                                    <input type="file" name="url_legalitas_hukum_organisasi" accept=".pdf" class="form-control unik" id="inputGroupFile1">
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-11">
                                                <div class="input-group custom-file-button">
                                                    <label class="input-group-text" for="inputGroupFile1">Unggah</label>
                                                    <label class="label-unik" id="file-input-label1" for="inputGroupFile1">Maksimum upload file : 10 MB </label>
                                                    <input type="file" name="url_legalitas_hukum_organisasi" accept=".pdf" class="form-control unik" id="inputGroupFile1">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{Storage::url($peserta->peserta_profil->url_legalitas_hukum_organisasi)}}" target="_blank">
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
                                                <div class="input-group custom-file-button">
                                                    <label class="input-group-text" for="inputGroupFile2">Unggah</label>
                                                    <label class="label-unik" id="file-input-label2" for="inputGroupFile2">Maksimum upload file : 10 MB </label>
                                                    <input type="file" name="url_sppt_sni" accept=".pdf" class="form-control unik" id="inputGroupFile2">
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-11">
                                                <div class="input-group custom-file-button">
                                                    <label class="input-group-text" for="inputGroupFile2">Unggah</label>
                                                    <label class="label-unik" id="file-input-label2" for="inputGroupFile2">Maksimum upload file : 10 MB </label>
                                                    <input type="file" name="url_sppt_sni" accept=".pdf" class="form-control unik" id="inputGroupFile2">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{Storage::url($peserta->peserta_profil->url_sppt_sni)}}"  target="_blank">
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
                                                <div class="input-group custom-file-button">
                                                    <label class="input-group-text" for="inputGroupFile3">Unggah</label>
                                                    <label class="label-unik" id="file-input-label3" for="inputGroupFile3">Maksimum upload file : 10 MB </label>
                                                    <input type="file" name="url_sk_kemenkumham" accept=".pdf" class="form-control unik" id="inputGroupFile3">
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-11">
                                                <div class="input-group custom-file-button">
                                                    <label class="input-group-text" for="inputGroupFile3">Unggah</label>
                                                    <label class="label-unik" id="file-input-label3" for="inputGroupFile3">Maksimum upload file : 10 MB </label>
                                                    <input type="file" name="url_sk_kemenkumham" accept=".pdf" class="form-control unik" id="inputGroupFile3">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{Storage::url($peserta->peserta_profil->url_sk_kemenkumham)}}" target="_blank">
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
                                            <div class="input-group custom-file-button">
                                                <label class="input-group-text" for="inputGroupFile4">Unggah</label>
                                                <label class="label-unik" id="file-input-label4" for="inputGroupFile4">Maksimum upload file : 10 MB </label>
                                                <input type="file" name="url_kewenangan_kebijakan" accept=".pdf" class="form-control unik" id="inputGroupFile4">
                                            </div>
                                        </div>
                                        @else
                                            <div class="col-md-11">
                                                <div class="input-group custom-file-button">
                                                    <label class="input-group-text" for="inputGroupFile4">Unggah</label>
                                                    <label class="label-unik" id="file-input-label4" for="inputGroupFile4">Maksimum upload file : 10 MB </label>
                                                    <input type="file" name="url_kewenangan_kebijakan" accept=".pdf" class="form-control unik" id="inputGroupFile4">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{Storage::url($peserta->peserta_profil->url_kewenangan_kebijakan)}}" target="_blank">
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
