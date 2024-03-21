@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="card col-12 p-4">
        <div class="mb-4">
            <div class="">
                <h3 class="fw-bold">Edit Konten Berita</h3>
                <br><hr style="color: orange; height: 0.5px;"><br>
            </div>
            <div class="px-3 pt-0 pb-2">
                <form action="{{ route('acara.update', $acara->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                            <label class="fw-bold">Judul Acara</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="judul_acara" name="judul_acara" class="form-control" placeholder="Tambahkan Judul" value="{{ $acara->judul_acara }}">
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-3">
                            <label class="fw-bold">Gambar Thumbnail</label>
                        </div>
                        <div class="col-9">
                            <input type="file" id="gambar_thumbnail" name="gambar_thumbnail" class="form-control mb-3">
                            <img src="{{ asset('gambar/thumbnail_acara/' . $acara->gambar_thumbnail) }}" alt="Gambar Konten" style="max-width: 200px;">
                        </div>
                    </div>
                    <div class="additional-images">
                        @foreach($dokumentasi_acara as $dokumentasi)
                        <div class="row g-3 mt-2 additional-image-upload">
                            <div class="col-3">
                                <label class="fw-bold">Gambar Konten</label>
                            </div>
                            <div class="col-9">
                                <!-- Input hidden untuk menyimpan nama gambar sebelumnya -->
                                {{-- <input type="hidden" name="gambar_konten[]" value="{{ $dokumentasi->id }}"> --}}
                                <!-- Input file untuk mengunggah gambar baru -->
                                <input type="file" name="gambar_konten[]" class="form-control mb-3">
                                <!-- Tampilkan gambar sebelumnya -->
                                <img src="{{ asset('gambar/konten_acara/' . $dokumentasi->gambar_konten) }}" alt="Gambar Konten" style="max-width: 200px;">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row g-3 justify-content-end mt-2">
                        <div class="col-auto">
                            <button class="btn btn-danger remove-last-image">- Remove</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-warning add-more-images">+ Tambah</button>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-3">
                            <label class="fw-bold">Tanggal Upload Acara</label>
                        </div>
                        <div class="col-3">
                            <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ $acara->tanggal }}">
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-3">
                            <label class="fw-bold">Isi Acara</label>
                        </div>
                        <div class="col-9">
                            <textarea name="deskripsi" id="deskripsi" cols="75" rows="10">{{ $acara->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="row g-3 justify-content-end mt-2">
                        <a href="/admin/acara" role="button" class="btn col-auto me-4" style="width: 100px; padding: 5px 10px; background-color: #fff; color: #C17D2D; ">Batal</a>
                        <button type="submit" style="width: 100px; padding: 5px 10px; background-color: #552525; color: #fff; border-radius: 10px; border-color: #C17D2D">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        var max_fields = 10; // Jumlah maksimum input yang diperbolehkan
        var wrapper = $(".additional-images"); // Kelas wrapper input
        var add_button = $(".add-more-images"); // Selector tombol tambah
        var remove_button = $(".remove-last-image"); // Selector tombol remove

        $(add_button).click(function(e){
            e.preventDefault();
            if($(".additional-image-upload").length < max_fields){
                $(wrapper).append('<div class="row g-3 align-items-center mt-2 additional-image-upload"><div class="col-3"></div><div class="col-9"><input type="file" name="gambar_konten[]" class="form-control"></div></div>'); // Tambah input field
                $(".remove-last-image").show(); // Menampilkan tombol remove
            }
        });

        $(remove_button).click(function(e){
            e.preventDefault();
            $(wrapper).children().last().remove(); // Menghapus input terakhir
            if($(".additional-image-upload").length == 1){
                $(this).hide(); // Sembunyikan tombol remove jika hanya ada satu input
            }
        });
    });
</script>
@endsection
