<div>
    <div class="d-flex align-items-center gap-3">
        <a href="/admin/peserta" class="btn" style="width: fit-content">&#8617;</a>
        <h3 class="p-0 m-0">Dokumen</h3>
        <hr class="garis-tambah">
    </div>

    <div class="px-5 d-flex justify-content-around mb-5">
        <div class="w-100 mt-5">
            <div class="row-data mb-3">
                <div class="head-data">Akte / NIB / TDP</div>
                <div class="body-data d-flex align-items-center justify-content-end">
                    <a href="{{ Storage::url($peserta->peserta_profil->url_legalitas_hukum_organisasi) }}" target="_blank">
                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem;"></i>
                    </a>
                </div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">SPPT SNI / Sertifikat SNI</div>
                <div class="body-data d-flex align-items-center justify-content-end">
                    <a href="{{ Storage::url($peserta->peserta_profil->url_sppt_sni) }}" target="_blank">
                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                    </a>
                </div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Surat Keterangan Kemenkeuham</div>
                <div class="body-data d-flex align-items-center justify-content-end">
                    <a href="{{ Storage::url($peserta->peserta_profil->url_sk_kemenkumham) }}" target="_blank">
                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                    </a>
                </div>
            </div>
            {{-- <div class="row-data mb-3">
                <div class="head-data">Kewenangan dan Kebijakan</div>
                <div class="body-data d-flex align-items-center justify-content-end">
                    <a href="{{ Storage::url($peserta->peserta_profil->url_kewenangan_kebijakan) }}" target="_blank">
                        <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</div>