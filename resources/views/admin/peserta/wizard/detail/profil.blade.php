<style>
    .btn-ya {
        width: fit-content !important;
        text-align: center !important;
        padding: 5px 15px !important;
        border: none !important;
        border-radius: 5px !important;
        color: white !important;
        background-color: #47A15E !important;
    }
    .btn-no {
        width: fit-content !important;
        text-align: center !important;
        padding: 5px 15px !important;
        border: none !important;
        border-radius: 5px !important;
        color: white !important;
        background-color: #D12B2B !important;
    }
</style>

{{-- form verifikasi --}}
<form action="{{ route('admin.peserta.verifikasi', Crypt::encryptString($peserta->id)) }}" method="POST" id="admin_verifikasi_peserta">
    @csrf
    @method('PUT')
</form>
{{-- end form verifikasi --}}

<div>
    <a href="/admin/peserta" class="btn mb-5" style="width: fit-content">&#8617;</a>
    <div class="d-flex align-items-center gap-3">
        <img src="{{ asset('assets') }}/images/foto-peserta.jpg" alt="" style="object-fit: cover; width: 160px; height: 160px;  border-radius: 50%;">
        <div style="width: 85%">
            <div class="d-flex align-items-center">
                <h3 class="pe-3 m-0" style="white-space: nowrap;">Profil Peserta</h3>
                <hr class="garis-tambah"/>
            </div>
            @if ($peserta->verified_at)
                <div class="px-3 mt-3 d-flex align-items-center justify-content-center gap-2" style="background-color: #78A55A; border-radius: 15px; padding-block: 6px; color:white; font-weight: bold; height: fit-content; width: fit-content;">
                    <i class="fa fa-check"></i>
                    <p class="m-0">Diverifikasi</p>
                </div>
            @else
                <button type="button" class="mt-3 px-3" style="background-color: #E59B30; height: fit-content; border-radius: 15px; padding-block: 6px; color:white; font-weight: bold; width: fit-content; border:none;" data-bs-toggle="modal" data-bs-placement="right" title="Verifikasi peserta" data-bs-target="#verifikasi_peserta">
                    Verifikasi 
                </button>
                <div class="mt-2" style="color: #9FAFBF; font-size:14px;">* Klik verifikasi di sini</div>
            @endif
        </div>
    </div>

    <div class="d-flex justify-content-around mb-5">
        <div class="w-100 mt-4">
            <div class="row-data mb-3">
                <div class="head-data">Nama Organisasi</div>
                <div class="body-data">{{ $peserta->nama }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Jabatan Tertinggi</div>
                <div class="body-data">{{ $peserta->peserta_profil->jabatan_tertinggi }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Nomor Telepon</div>
                <div class="body-data">{{ $peserta->peserta_profil->no_hp }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Website</div>
                <div class="body-data">{{ $peserta->peserta_profil->website }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Provinsi</div>
                <div class="body-data">{{ $peserta->peserta_alamat ? $peserta->peserta_alamat->propinsi->propinsi : '-' }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Kota</div>
                <div class="body-data">{{ $peserta->peserta_alamat ? $peserta->peserta_alamat->kota->kota : '-' }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Kecamatan</div>
                <div class="body-data">{{ $peserta->peserta_alamat ? $peserta->peserta_alamat->kecamatan->kecamatan : '-' }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Alamat</div>
                <div class="body-data">{{ $peserta->peserta_alamat ? $peserta->peserta_alamat->alamat : '-' }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Kode Pos</div>
                <div class="body-data">{{ $peserta->peserta_alamat ? $peserta->peserta_alamat->kode_pos : '-' }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Tipe</div>
                <div class="body-data">{{ $peserta->peserta_alamat ? $peserta->peserta_alamat->tipe : '-' }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Tanggal Beroperasi</div>
                <div class="body-data">{{ $peserta->peserta_profil->tanggal_beroperasi }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Status Kepemilikan</div>
                <div class="body-data">{{ $peserta->peserta_profil->status_kepemilikan?$peserta->peserta_profil->status_kepemilikan->nama:'' }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Jenis Produk</div>
                <div class="body-data">{{ $peserta->peserta_profil->jenis_produk }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Deskripsi Produk</div>
                <div class="body-data">{{ $peserta->peserta_profil->deskripsi_produk }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Lembaga Sertifikasi</div>
                <div class="body-data">{{ $peserta->peserta_profil->lembaga_sertifikasi?$peserta->peserta_profil->lembaga_sertifikasi->nama:'' }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Produk Ekspor</div>
                <div class="body-data">{{ $peserta->peserta_profil->produk_export }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Negara Tujuan Ekspor</div>
                <div class="body-data">{{ $peserta->peserta_profil->negara_tujuan_ekspor }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Sektor Kategori Organisasi</div>
                <div class="body-data">{{ $peserta->peserta_profil->kategori_organisasi?$peserta->peserta_profil->kategori_organisasi->nama:'' }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Kekayaan Bersih</div>
                <div class="body-data">{{ $peserta->peserta_profil->kekayaan_bersih }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Hasil Penjualan Tahunan</div>
                <div class="body-data">{{ $peserta->peserta_profil->hasil_penjualan_tahunan }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Jenis Organisasi</div>
                <div class="body-data">{{ $peserta->peserta_profil->jenis_organisasi }}</div>
            </div>
            <div class="row-data mb-3">
                <div class="head-data">Kewenangan Kebijakan</div>
                <div class="body-data">{{ $peserta->peserta_profil->kewenangan_kebijakan }}</div>
            </div>
        </div>
    </div>
    
</div>
<script>
    const handleVerifPeserta = () => {
        const form = document.getElementById('admin_verifikasi_peserta')
        form.submit()
    }
</script>