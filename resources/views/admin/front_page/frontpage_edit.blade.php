
<div class="d-flex justify-content-between align-items-center">
    <h3>Beranda</h3>
</div>
<br><hr style="color: orange; height: 0.5px;"><br>
<div class="d-flex items-center justify-content-end">
    <a href="/admin/frontpage/edit" class="btn" role="button" style="width: 100px;">Edit</a>
</div><br>

<div>
    <div>
        <div class="frontpage-input-text">
            <label for="judul">Judul</label>   
            <p>{{ $frontpage->judul }}</p>
        </div>
        <div class="frontpage-input-text" style="display: flex; justify-content: center;">
            <label for="keterangan_judul">Keterangan Judul</label>
            <p>{{ $frontpage->keterangan_judul }}</p>
        </div>
        <div class="frontpage-input-text" style="display: flex; justify-content: flex-start;">
            <label for="gambar_banner">Gambar Banner</label>
            <img src="/storage{{ $frontpage->gambar_banner }}" alt="">
        </div>
        <div class="frontpage-input-text">
            <label for="keterangan_sni">Keterangan SNI</label>
            <p>{{ $frontpage->keterangan_sni }}</p>
        </div>
        <div class="frontpage-input-text">
            <label for="judul_dokumentasi">Judul Dokumentasi</label>
            <p>{{ $frontpage->judul_dokumentasi }}</p>
        </div>
        <div class="frontpage-input-text">
            <label for="keterangan_dokumentasi">Keterangan Dokumentasi</label>
            <p>{{ $frontpage->keterangan_dokumentasi }}</p>
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-between align-items-center">
        <h3>Berita</h3>
    </div>
    <br><hr style="color: orange; height: 0.5px;"><br>
    <br>
    <div>
        <div class="frontpage-input-text">
            <label for="judul_konten_berita">Judul Konten Berita</label>
            <p>{{ $frontpage->judul_konten_berita }}</p>
        </div>
        <div class="frontpage-input-text">
            <label for="keterangan_berita">Keterangan Berita</label>
            <p>{{ $frontpage->keterangan_berita }}</p>
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-between align-items-center">
        <h3>Footer</h3>
    </div>
    <br><hr style="color: orange; height: 0.5px;"><br>
    <br>
    <div>
        <div class="frontpage-input-text">
            <label for="alamat">Logo SNI Award</label>
            <img src="/storage" alt="">
        </div>
        <div class="frontpage-input-text">
            <label for="alamat">Logo Instansi</label>
            <img src="/storage" alt="">
        </div>
        <div class="frontpage-input-text">
            <label for="alamat">Alamat</label>
            <p>{{ $frontpage->alamat }}</p>
        </div>
        <div class="frontpage-input-text">
            <label for="informasi_website">Informasi Website</label>
            <p>Info Lebih Lanjut</p>
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-between align-items-center">
        <h3>Media Sosial</h3>
    </div>
    <br><hr style="color: orange; height: 0.5px;"><br>
    <br>
    <div>
        <div class="frontpage-input-text">
            <label for="twitter">Twitter</label>
            <p>{{ $frontpage->twitter }}</p>
        </div>
        <div class="frontpage-input-text">
            <label for="instagram">Instagram</label>
            <p>{{ $frontpage->instagram }}</p>
        </div>
        <div class="frontpage-input-text">
            <label for="youtube">Youtube</label>
            <p>{{ $frontpage->youtube }}</p>
        </div>
        <div class="frontpage-input-text">
            <label for="website">Website</label>
            <p>{{ $frontpage->website }}</p>
        </div>
    </div>
</div>