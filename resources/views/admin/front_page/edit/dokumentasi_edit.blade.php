
<div class="d-flex justify-content-between align-items-center">
    <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Dokumentasi</h3>
</div>
<br><hr style="color: orange; height: 0.5px;"><br>
<a href="/admin/frontpage?tab=dokumentasi" role="button" class="btn">Kembali</a>
<br><br>

@if (session('error'))
<div class="alert alert-danger w-100" role="alert">
  {{ session('error') }}
</div>
@elseif (session('success'))
<div class="alert alert-success w-100" role="alert">
  {{ session('success') }}
</div>
@endif

<form action="/admin/frontpage/dokumentasi/tambah" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="frontpage-input-text">
        <label for="url_dokumentasi">Dokumentasi</label>
        <div style="position:relative;">
            <label for="gambar_dokumentasi" class="btn h-100 fw-semibold" style="position: absolute; top:0; left:-1px; background-color: #999; border-radius: 10px 0 0 10px; border-right: 1px solid gray;width:120px;">Unggah</label>
            <input type="file" name="url_dokumentasi[]" id="gambar_dokumentasi" accept="image/*" multiple style="padding: 0;" required>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" style="padding: 5px 10px;border:none;background-color:#E59B30;border-radius:10px;">+ Tambah</button>
    </div>
</form>
<br>

<div class="w-100" style="
    display: flex;
    align-items: center;
    justify-content: space-beteween;
    gap: 10px;
    flex-wrap: wrap;
"> 
    <?php $jumlah_dokumentasi = count($dokumentasi) ?>
    @foreach ($dokumentasi as $dok)
        <div class="image-container">
            <img src="/storage{{ $dok->url_dokumentasi }}" alt="" style="
                width: 500px;
                height: auto;
                border: none;
                border-radius: 20px;
            ">
            @if ($jumlah_dokumentasi > 3)
            <form action="/admin/frontpage/dokumentasi/hapus/{{ $dok->id }}" method="post">
                @method('DELETE')
                @csrf
                <button class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                  </svg>
                </button>
            </form>
            @endif
        </div>
    @endforeach
</div><br>

{{-- <div class="d-flex align-items-center justify-content-end gap-2">
    <a href="/admin/frontpage?tab=dokumentasi" role="button" class="btn" style="
        width: 100px;
        padding: 5px 10px;
        background-color: #fff;
        color: #C17D2D;
    ">Batal</a>
    <button style="
        width: 100px;
        padding: 5px 10px;
    " disabled>Simpan</button>
</div> --}}