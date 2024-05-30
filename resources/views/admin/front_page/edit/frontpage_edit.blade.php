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
    <h3>Beranda</h3>
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
                <textarea name="keterangan_judul" id="" cols="30" rows="2" required>{{ $frontpage->keterangan_judul }}</textarea>
            </div>
            <div class="frontpage-input-text">
                <label for="gambar_banner">Gambar Banner</label>
                <div class="file-input" style="padding: 0;">
                    <input type="file" id="inputGroupFile1" name="gambar_banner" accept="image/*" onchange="handleFileSelect('inputGroupFile1', 'fileInputLabel1', 'fileName1')">
                    <label for="inputGroupFile1" class="file-input-label">Unggah</label>
                    <label for="inputGroupFile1" id="fileInputLabel1" class="mx-4" style="color: #9fafbf;">Pilih gambar banner..</label>
                    <div id="fileName1"></div>
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
            <h3>Berita</h3>
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
            <h3>Footer</h3>
        </div>
        <br><hr style="color: orange; height: 0.5px;"><br>
        <br>
        <div>
            <div class="frontpage-input-text">
                <label for="logo_sni_award">Logo SNI Award</label>
                <div class="file-input" style="padding: 0;">
                    <input type="file" id="inputGroupFile2" name="logo_sni_award" accept="image/*" onchange="handleFileSelect('inputGroupFile2', 'fileInputLabel2', 'fileName2')">
                    <label for="inputGroupFile2" class="file-input-label">Unggah</label>
                    <label for="inputGroupFile2" id="fileInputLabel2" class="mx-4" style="color: #9fafbf;">Pilih logo SNI Award..</label>
                    <div id="fileName2"></div>
                </div>
            </div>
            <div class="frontpage-input-text">
                <label for="logo_instansi">Logo Instansi</label>
                <div class="file-input" style="padding: 0;">
                    <input type="file" id="inputGroupFile3" name="logo_instansi" accept="image/*" onchange="handleFileSelect('inputGroupFile3', 'fileInputLabel3', 'fileName3')">
                    <label for="inputGroupFile3" class="file-input-label">Unggah</label>
                    <label for="inputGroupFile3" id="fileInputLabel3" class="mx-4" style="color: #9fafbf;">Pilih instansi..</label>
                    <div id="fileName3"></div>
                </div>
            </div>
            <div class="frontpage-input-text">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="" value="{{ $frontpage->alamat }}" required>
            </div>
            <div class="frontpage-input-text">
                <label for="alamat">Informasi Website</label>
                <input type="text" name="informasi_website" id="" value="" required>
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

        <div class="d-flex align-items-center justify-content-end gap-3">
            <a href="/admin/frontpage" role="button" class="btn nonactive">Batal</a>
            <button type="submit" class="btn">Simpan</button>
        </div>
    </form>
</div>