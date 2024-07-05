<style>
    div.data {
        border: none !important;
        background-color: transparent !important;
    }
    .profil-image-container {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
    }
    .profil-image {
        width: 100%;
        height: 100%;
        object-fit: cover !important;
    }
    span.info {
        color: red;
    }
    a.data {
        color: black;
        text-decoration: none;
    }
    a.data:hover {
        color: #c17d2d;
    }
</style>

<div class="content-profil py-5">
    <div class="d-flex align-items-center justify-content-center gap-3">
        <div class="profil-image-container">
            <img src="{{ asset('assets') }}/images/foto-peserta.jpg" alt="Foto Profil Sekretariat" class="profil-image img-fluid">
        </div>
    </div>
    <div class="container mt-4">
        <div class="row d-flex justify-content-center align-items-center">
        <div class="col-xl-12">
            <div class="card" style="border-radius: 15px;">
            <div class="card-body">

                <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-4 ps-5">
                    <h6 class="mb-0">Nama Organisasi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                    <div class="data">{{ $peserta->nama }}</div>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Jabatan Tertinggi <span class="info">*</span></h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->jabatan_tertinggi }}</div>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                    <h6 class="mb-0">Nomor Telepon</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                    <div class="data">{{ $peserta->peserta_profil->no_hp }}</div>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Website <span class="info">*</span></h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <a href="{{ $peserta->peserta_profil->website }}" target="_blank" class="data">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z"/>
                                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z"/>
                            </svg>
                            {{ $peserta->peserta_profil->website }}
                        </a>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <label class="fw-bold">Provinsi</label>
                    </div>
                    <div class="col-md-8 pe-5">
                        {{ $peserta->peserta_alamat ? $peserta->peserta_alamat->propinsi->propinsi : '-' }}
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <label class="fw-bold">Kota</label>
                    </div>
                    <div class="col-md-8 pe-5">
                        {{ $peserta->peserta_alamat ? $peserta->peserta_alamat->kota->kota : '-' }}
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <label class="fw-bold">Kecamatan</label>
                    </div>
                    <div class="col-md-8 pe-5">
                        {{ $peserta->peserta_alamat ? $peserta->peserta_alamat->kecamatan->kecamatan : '-' }}
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <label class="fw-bold">Alamat</label>
                    </div>
                    <div class="col-md-8 pe-5">
                        {{ $peserta->peserta_alamat ? $peserta->peserta_alamat->alamat : '-' }}
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <label class="fw-bold">Kode Pos</label>
                    </div>
                    <div class="col-md-8 pe-5">
                        {{ $peserta->peserta_alamat ? $peserta->peserta_alamat->kode_pos : '-' }}
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <label class="fw-bold">Tipe</label>
                    </div>
                    <div class="col-md-8 pe-5">
                        {{ $peserta->peserta_alamat ? $peserta->peserta_alamat->tipe : '-' }}
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Tanggal Beroperasi <span class="info">*</span></h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->tanggal_beroperasi }}</div>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Status Kepemilikan</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->status_kepemilikan ? $peserta->peserta_profil->status_kepemilikan->nama : '-' }}</div>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Jenis Produk</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->jenis_produk }}</div>
                    </div>
                </div>
                 
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Deskripsi Produk</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->deskripsi_produk }}</div>
                    </div>
                </div>
                 
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Lembaga Sertifikasi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->lembaga_sertifikasi ? $peserta->peserta_profil->lembaga_sertifikasi->nama : '-' }}</div>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Produk Ekspor</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->produk_export }}</div>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Negara Tujuan Ekspor</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->negara_tujuan_ekspor }}</div>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Sektor Kategori Organisasi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->kategori_organisasi ? $peserta->peserta_profil->kategori_organisasi->nama : '-' }}</div>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Kekayaan Bersih</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->kekayaan_bersih }}</div>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Hasil Penjualan Tahunan</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->hasil_penjualan_tahunan }}</div>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Jenis Organisasi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->jenis_organisasi }}</div>
                    </div>
                </div>

                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                        <h6 class="mb-0">Kewenangan Kebijakan</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                        <div class="data">{{ $peserta->peserta_profil->kewenangan_kebijakan }}</div>
                    </div>
                </div>

            </div>
            </div>
        </div>
        </div>
    </div>
</div>