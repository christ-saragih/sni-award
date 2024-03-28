{{-- <script>
    window.addEventListener('beforeunload', function (e) {
        const unsavedChanges = true; 
        if (unsavedChanges && !document.getElementById('frontpageForm').getAttribute('data-submitted')) {
            e.returnValue = 'Anda memiliki perubahan yang belum disimpan. Apakah Anda yakin ingin meninggalkan halaman?';
        }
    });
    
    document.getElementById('frontpageForm').addEventListener('submit', function () {
        this.setAttribute('data-submitted', 'true');
    });
</script> --}}

<div class="d-flex justify-content-between align-items-center">
    <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Frontpage</h3>
</div>
<br><hr style="color: orange; height: 0.5px;"><br>
<br>

<div>
    <form action="/admin/frontpage/edit" method="POST" id="frontpageForm" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div>
            <div class="frontpage-input-text">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="" value="{{ $frontpage->judul }}" required>
            </div>
            <div class="frontpage-input-text">
                <label for="keterangan_judul">Keterangan Judul</label>
                <input type="text" name="keterangan_judul" id="" value="{{ $frontpage->keterangan_judul }}" required>
            </div>
            <div class="frontpage-input-text">
                <label for="gambar_banner">Gambar Banner</label>
                <div style="position:relative;">
                    <label for="banner_image" class="btn h-100 fw-semibold" style="position: absolute; top:0; left:-1px; background-color: #999; border-radius: 10px 0 0 10px; border-right: 1px solid gray;width:112px;">Unggah</label>
                    <input type="file" name="gambar_banner" id="banner_image" accept="image/*" style="padding: 0;">
                </div>
            </div>
            <div class="frontpage-input-text">
                <label for="keterangan_sni">Keterangan SNI</label>
                <textarea name="keterangan_sni" id="" cols="30" rows="5" required>{{ $frontpage->keterangan_sni }}</textarea>
            </div>
            <div class="frontpage-input-text">
                <label for="judul_dokumentasi">Judul Dokumentasi</label>
                <input type="text" name="judul_dokumentasi" id="" value="{{ $frontpage->judul_dokumentasi }}" required>
            </div>
            <div class="frontpage-input-text">
                <label for="keterangan_dokumentasi">Keterangan Dokumentasi</label>
                <input type="text" name="keterangan_dokumentasi" id="" value="{{ $frontpage->keterangan_dokumentasi }}" required>
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Berita</h3>
        </div>
        <br><hr style="color: orange; height: 0.5px;"><br>
        <br>
        <div>
            <div class="frontpage-input-text">
                <label for="judul_konten_berita">Judul Konten Berita</label>
                <input type="text" name="judul_konten_berita" id="" value="{{ $frontpage->judul_konten_berita }}" required>
            </div>
            <div class="frontpage-input-text">
                <label for="keterangan_berita">Keterangan Berita</label>
                <input type="text" name="keterangan_berita" id="" value="{{ $frontpage->keterangan_berita }}" required>
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Footer</h3>
        </div>
        <br><hr style="color: orange; height: 0.5px;"><br>
        <br>
        <div>
            <div class="frontpage-input-text">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="" value="{{ $frontpage->alamat }}" required>
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Social Media</h3>
        </div>
        <br><hr style="color: orange; height: 0.5px;"><br>
        <br>
        <div>
            <div class="frontpage-input-text">
                <label for="twitter">Twitter</label>
                <input type="text" name="twitter" id="" value="{{ $frontpage->twitter }}">
            </div>
            <div class="frontpage-input-text">
                <label for="instagram">Instagram</label>
                <input type="text" name="instagram" id="" value="{{ $frontpage->instagram }}">
            </div>
            <div class="frontpage-input-text">
                <label for="youtube">Youtube</label>
                <input type="text" name="youtube" id="" value="{{ $frontpage->youtube }}">
            </div>
            <div class="frontpage-input-text">
                <label for="website">Website</label>
                <input type="text" name="website" id="" value="{{ $frontpage->website }}" required>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-end gap-2">
            <a href="/admin/frontpage" role="button" class="btn" style="
                width: 100px;
                padding: 5px 10px;
                background-color: #fff;
                color: #C17D2D;
            ">Batal</a>
            <button type="submit" style="
                width: 100px;
                padding: 5px 10px;
            " >Simpan</button>
        </div>
    </form>
</div>