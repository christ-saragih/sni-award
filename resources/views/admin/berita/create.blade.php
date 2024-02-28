@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Berita</h6>
        </div>
        <div class="card-body px-3 pt-0 pb-2">
          @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          @endif
            <form action="{{ route('berita.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_berita_id" class="form-control">
                        @foreach ($kategori as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input name="slug" type="string" class="form-control" placeholder="Tambahkan Slug" value="{{ old('slug') }}">
                </div>
                <div class="form-group">
                    <label>Judul Berita</label>
                    <input name="judul_berita" type="string" class="form-control" placeholder="Tambahkan Judul" value="{{ old('judul_berita') }}">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input name="deskripsi" type="string" class="form-control" placeholder="Tambahkan Deskripsi" value="{{ old('deskripsi') }}">
                  </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input name="tanggal" type="date" class="form-control" placeholder="Masukkan Tanggal" value="{{ old('tanggal') }}">
                </div>
                <div class="form-group">
                    <label>File</label>
                    <input name="file_gambar" type="file" class="form-control" placeholder="Tambahkan File">
                </div>
                <div class="form-group">
                    <label>Tag Berita</label><br>
                    @foreach ($tag_berita as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tag{{ $tag->id }}" name="tag_berita[]" value="{{ $tag->id }}">
                        <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->nama }}</label>
                    </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
