<div>
    <a href="/admin/peserta" class="btn mb-5" style="width: fit-content">&#8617;</a>
    <div class="d-flex align-items-center gap-3">
        <img src="{{ asset('assets') }}/images/foto-peserta.jpg" alt="" style="object-fit: cover; width: 160px; height: 160px;  border-radius: 50%;">
        <h3 class="p-0 m-0">Profil Peserta</h3>
        <hr class="flex-grow-1" style="height: 3px; background-color: #E1A600;">
    </div>
    @if ($peserta->verified_at)
        <div class="mt-3 px-3 py-1 rounded d-flex align-items-center justify-content-center" style="background-color: #009900;height: fit-content; color:white; width: fit-content;">
            <i class="fa fa-check-circle"></i>
            &ensp;Terverifikasi 
        </div>
    @else
        <form action="/admin/peserta/{{ $peserta->id }}/verifikasi" method="POST">
            @method('PUT')
            @csrf
            <button type="submit" class="mt-3 px-3 py-1 rounded d-flex align-items-center justify-content-center" style="background-color: #acacac;height: fit-content; color:white; width: fit-content; border:none;">
                {{-- <i class="fa fa-check-circle"></i> --}}
                &ensp;Verifikasi 
            </button>
        </form>
    @endif

    <div class="d-flex justify-content-around mb-5">
        <div class="w-100 mt-3">
            <div class="row-data">
                <div class="head-data">Nama Organisasi</div>
                <div class="body-data">{{ $peserta->nama }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Jabatan Tertinggi</div>
                <div class="body-data">{{ $peserta->peserta_profil->jabatan_tertinggi }}</div>
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
                <div class="body-data">{{ $peserta->peserta_profil->status_kepemilikan?$peserta->peserta_profil->status_kepemilikan->nama:'' }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Jenis Produk</div>
                <div class="body-data">{{ $peserta->peserta_profil->jenis_produk }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Lembaga Sertifikasi</div>
                <div class="body-data">{{ $peserta->peserta_profil->lembaga_sertifikasi?$peserta->peserta_profil->lembaga_sertifikasi->nama:'' }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Negara Tujuan Ekspor</div>
                <div class="body-data">{{ $peserta->peserta_profil->negara_tujuan_ekspor }}</div>
            </div>
            <div class="row-data">
                <div class="head-data">Sektor Kategori Organisasi</div>
                <div class="body-data">{{ $peserta->peserta_profil->kategori_organisasi?$peserta->peserta_profil->kategori_organisasi->nama:'' }}</div>
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
    
</div>