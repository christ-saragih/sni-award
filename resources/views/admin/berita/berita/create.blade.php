@extends('admin.layouts.master')

@section('content')
<style>
    #container {
        width: 1000px;
        margin: 20px auto;
    }
    .ck-editor__editable[role="textbox"] {
        /* Editing area */
        min-height: 300px;
    }
    .ck-content .image {
        /* Block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style>
<div class="row">
    <div class="card col-12 p-4">
        <div class="mb-4">
            <div class="">
            <h3 class="fw-bold">Konten Berita</h3>
            <br><hr style="color: orange; height: 0.5px;"><br>
            </div>
            <div class="px-3 pt-0 pb-2">
                <form action="{{ route('berita.index') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                            <label class="fw-bold">Judul Berita</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="judul_berita" name="judul_berita" class="form-control" placeholder="Tambahkan Judul" value="{{ old('judul_berita') }}">
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-3">
                            <label class="fw-bold">Gambar Berita</label>
                        </div>
                        <div class="col-9">
                            <input type="file" id="file_gambar" name="file_gambar" class="form-control" value="{{ old('file_gambar') }}">
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-3">
                            <label class="fw-bold">Tanggal Upload Berita</label>
                        </div>
                        <div class="col-3">
                            <input type="date" id="tangga" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-3">
                            <label class="fw-bold">Isi Berita</label>
                        </div>
                        <div class="col-9">
                            <textarea name="deskripsi" id="deskripsi" cols="85" rows="20">{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-3">
                            <label class="fw-bold">Tag Berita</label>
                        </div>
                        <div class="col-9">
                            <select class="form-select" name="tag_berita[]" id="tagBerita" multiple></select>
                        </div>
                    </div>
                    <div class="row g-3 justify-content-end mt-2">
                        <a href="/admin/berita" role="button" class="btn col-auto me-4" style="width: 100px; padding: 5px 10px; background-color: #fff; color: #C17D2D; ">Batal</a>
                        <button type="submit" style="width: 100px; padding: 5px 10px; background-color: #552525; color: #fff; border-radius: 10px; border-color: #C17D2D">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tagBerita').select2({
            theme: 'bootstrap-5',
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder:'Pilih Tag Berita',
            closeOnSelect: false,
            allowClear: true,
            ajax: {
                url: "{{route('getTagBerita')}}",
                processResults: function({data}) {
                    console.log(data);
                    return {
                        results: $.map(data, function(item){
                            return {
                                id: item.id,
                                text: item.nama
                            }
                        })
                    }
                }
            }
        });
    });
</script>
@endsection

@section('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#deskripsi' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection

