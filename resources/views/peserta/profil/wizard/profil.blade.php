<style>
  div.data {
    border: none !important;
    background-color: transparent !important;
  }
</style>

<div class="content-profil pt-5">
  <div class="d-flex flex-column text-center justify-content-center gap-3">
    <img src="{{ asset('assets') }}/peserta/images/foto-profil.png" class="profil mx-auto" alt="">
    <a href="{{route('peserta.profil.edit')}}" class="btn action-button mx-auto mb-1">Edit Profil</a>
    <span>Kelola informasi profil anda untuk mengontrol, melindungi dan mengamankan akun</span>
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
                  <h6 class="mb-0">Jabatan Tertinggi</h6>
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
                  <h6 class="mb-0">Website</h6>
                </div>
                <div class="col-md-8 pe-5">
                  <div class="data">{{ $peserta->peserta_profil->website }}</div>
                </div>
            </div>
              
            <div class="row align-items-center pb-3">
              <div class="col-md-4 ps-5">
                <h6 class="mb-0">Provinsi</h6>
              </div>
              <div class="col-md-8 pe-5">
                <div class="data">{{ $peserta_alamat ? $peserta_alamat->propinsi->propinsi : '-' }}</div>
              </div>
            </div>
            
            <div class="row align-items-center pb-3">
              <div class="col-md-4 ps-5">
                  <h6 class="mb-0">Kota</h6>
              </div>
              <div class="col-md-8 pe-5">
                <div class="data">{{ $peserta_alamat ? $peserta_alamat->kota->kota : '-' }}</div>
              </div>
            </div>

            <div class="row align-items-center pb-3">
              <div class="col-md-4 ps-5">
                  <h6 class="mb-0">Kecamatan</h6>
              </div>
              <div class="col-md-8 pe-5">
                <div class="data">{{ $peserta_alamat ? $peserta_alamat->kecamatan->kecamatan : '-' }}</div>
              </div>
            </div>
            
            <div class="row align-items-center pb-3">
              <div class="col-md-4 ps-5">
                  <h6 class="mb-0">Alamat</h6>
                </div>
                <div class="col-md-8 pe-5">
                  <div class="data">{{ $peserta_alamat ? $peserta_alamat->alamat : '-' }}</div>
              </div>
            </div>

            <div class="row align-items-center pb-3">
              <div class="col-md-4 ps-5">
                <h6 class="mb-0">Kode Pos</h6>
              </div>
              <div class="col-md-8 pe-5">
                <div class="data">{{ $peserta_alamat ? $peserta_alamat->kode_pos : '-' }}</div>
              </div>
            </div>

            <div class="row align-items-center pb-3">
              <div class="col-md-4 ps-5">
                <h6 class="mb-0">Tipe</h6>
              </div>
              <div class="col-md-8 pe-5">
                <div class="data">{{ $peserta_alamat ? $peserta_alamat->tipe : '-' }}</div>
              </div>
            </div>

            <div class="row align-items-center pb-3">
              <div class="col-md-4 ps-5">
                <h6 class="mb-0">Tanggal Beroperasi</h6>
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
                  @if ($peserta->peserta_profil->produk_export)                            
                    <div class="data">Ya</div>
                  @elseif (!$peserta->peserta_profil->produk_export)                  
                    <div class="data">Tidak</div>
                  @endif
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
                  {{-- {{dd($peserta->peserta_profil)}} --}}
                  <div class="data">{{ $peserta->kategori_organisasi ? $peserta->kategori_organisasi->nama : '-' }}</div>
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