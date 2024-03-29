<div>
    <a href="/admin/peserta" class="btn mb-5" style="width: fit-content">&#8617;</a>
    <div class="d-flex align-items-center gap-3">
        <img src="{{ asset('assets') }}/images/foto-peserta.jpg" alt="" style="object-fit: cover; width: 160px; height: 160px;  border-radius: 50%;">
        <h3 class="p-0 m-0">Profil Peserta</h3>
        <hr class="flex-grow-1" style="height: 3px; background-color: #E1A600;">
    </div>

    <div class="d-flex justify-content-around mb-5">
        <div class="w-100 mt-5">
            <div class="row-data">
                <div class="head-data">Nama Organisasi</div>
                <div class="body-data">{{ $peserta->nama }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">{{ $peserta->peserta_profil->jabatan_tertinggi }}</div>
                <div class="body-data">zcxvzcvzcv</div>
            </div>
            <div class="row-data">
                <div class="head-data">Website</div>
                <div class="body-data">{{ $peserta->peserta_profil->website }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Tanggal Beroperasi</div>
                <div class="body-data">{{ $peserta->peserta_profil->tanggal_beroperasi }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Status Kepemilikan</div>
                <div class="body-data">{{ $peserta->peserta_profil->status_kepemilikan }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Jenis Produk</div>
                <div class="body-data">{{ $peserta->peserta_profil->jenis_produk }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Lembaga Sertifikasi</div>
                <div class="body-data">{{ $peserta->peserta_profil->lembaga_sertifikasi }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Negara Tujuan Ekspor</div>
                <div class="body-data">{{ $peserta->peserta_profil->negara_tujuan_ekspor }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Sektor Kategori Organisasi</div>
                <div class="body-data">{{ $peserta->peserta_profil->kategori_organisasi }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Kekayaan Bersih</div>
                <div class="body-data">{{ $peserta->peserta_profil->kekayaan_bersih }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Hasil Penjualan Tahunan</div>
                <div class="body-data">{{ $peserta->peserta_profil->hasil_penjualan_tahunan }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Jenis Organisasi</div>
                <div class="body-data">{{ $peserta->peserta_profil->jenis_organisasi }}</div>
            </div>

        </div>
    </div>

    <div class="d-flex gap-4">
        <span>Nama&emsp;:</span><span>{{ $peserta->nama }}</span>
    </div>
    <div class="d-flex gap-4">
        <span>Email&emsp;:</span><span>{{ $peserta->email }}</span>
    </div>
    <div class="d-flex gap-4">
        <span>No. Telfon&emsp;:</span><span>{{ $peserta->peserta_profil->no_hp }}</span>
    </div>
    <div class="d-flex gap-4">
        {{-- <span>Kategori Organisasi&emsp;:</span><span>{{ $peserta->peserta_profil->kategori_organisasi->nama }}</span> --}}
    </div>
    <div class="d-flex gap-4">
        <span>Status&emsp;:</span><span>{{ $peserta->status }}</span>
    </div>
    <div class="d-flex gap-4">
        <span>URL Legalitas Hukum Organisasi&emsp;:</span><span><a href="{{ $peserta->peserta_profil->url_legalitas_hukum_organisasi }}" target="_blank">{{ $peserta->peserta_profil->url_legalitas_hukum_organisasi }}</a></span>
    </div>
    <div class="d-flex gap-4">
        <span>URL SPPT SNI&emsp;:</span><span><a href="{{ $peserta->peserta_profil->url_sppt_sni }}" target="_blank">{{ $peserta->peserta_profil->url_sppt_sni }}</a></span>
    </div>
    <div class="d-flex gap-4">
        <span>URL SK Kemenkumham&emsp;:</span><span><a href="{{ $peserta->peserta_profil->url_sk_kemenkumham }}" target="_blank">{{ $peserta->peserta_profil->url_sk_kemenkumham }}</a></span>
    </div>
    <div class="d-flex gap-4">
        <span>URL Kewenangan Kebijakan&emsp;:</span><span><a href="{{ $peserta->peserta_profil->url_kewenangan_kebijakan }}" target="_blank">{{ $peserta->peserta_profil->url_kewenangan_kebijakan }}</a></span>
    </div>
    <div class="d-flex gap-4">
        <span>Jabatan Tertinggi&emsp;:</span><span>{{ $peserta->peserta_profil->jabatan_tertinggi }}</span>
    </div>
    <div class="d-flex gap-4">
        <span>Website&emsp;:</span><span>{{ $peserta->peserta_profil->website }}</span>
    </div>
    <div class="d-flex gap-4">
        <span>Tanggal Beroperasi&emsp;:</span><span>{{ $peserta->peserta_profil->tanggal_beroperasi }}</span>
    </div>
    <div class="d-flex gap-4">
        {{-- <span>Status Kepemilikan&emsp;:</span><span>{{ $peserta->peserta_profil->status_kepemilikan->nama }}</span> --}}
    </div>
    <div class="d-flex gap-4">
        <span>Jenis Produk&emsp;:</span><span>{{ $peserta->peserta_profil->jenis_produk }}</span>
    </div>
    <div class="d-flex gap-4">
        <span>Deskripsi Produk&emsp;:</span><span>{{ $peserta->peserta_profil->deskripsi_produk }}</span>
    </div>
    <div class="d-flex gap-4">
        {{-- <span>Lembaga Sertifikasi&emsp;:</span><span>{{ $peserta->peserta_profil->lembaga_setifikasi->nama }}</span> --}}
    </div>
    <div class="d-flex gap-4">
        <span>Produk Export&emsp;:</span><span>{{ $peserta->peserta_profil->produk_export }}</span>
    </div>
    <div class="d-flex gap-4">
        <span>Negara Tujuan Export&emsp;:</span><span>{{ $peserta->peserta_profil->negara_tujuan_ekspor }}</span>
    </div>
    {{-- <div class="d-flex gap-4">
        <span>Sektor kategori Organisasi&emsp;:</span><span>{{ $peserta->peserta_profil->sektor_kategori_organisasi->nama }}</span>
    </div> --}}
    <div class="d-flex gap-4">
        <span>Kekayaan Bersih&emsp;:</span><span>{{ $peserta->peserta_profil->kekayaan_bersih }}</span>
    </div>
    <div class="d-flex gap-4">
        <span>Hasil Penjualan Tahunan&emsp;:</span><span>{{ $peserta->peserta_profil->hasil_penjualan_tahunan }}</span>
    </div>
    <div class="d-flex gap-4">
        <span>Jenis Organisasi&emsp;:</span><span>{{ $peserta->peserta_profil->jenis_organisasi }}</span>
    </div>
    <div class="d-flex gap-4">
        <span>Kewenangan Kebijakan&emsp;:</span><span>{{ $peserta->peserta_profil->kewenangan_kebijakan }}</span>
    </div>
    
</div>