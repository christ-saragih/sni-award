@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Berita</h6>
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
            <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kategori_berita_id">Kategori Berita</label>
                    <select class="form-control" id="kategori_berita_id" name="kategori_berita_id">
                        @foreach ($kategori as $kategori)
                        <option value="{{ $kategori->id }}" {{ $berita->kategori_berita_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $berita->slug }}">
                </div>
                <div class="form-group">
                    <label for="judul_berita">Judul Berita</label>
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="{{ $berita->judul_berita }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Berita</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $berita->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $berita->tanggal }}">
                </div>
                <div class="form-group">
                    <label for="file_gambar">File Gambar</label>
                    <input type="file" class="form-control" id="file_gambar" name="file_gambar">
                    <img src="{{ asset('gambar/user/' . $berita->file_gambar) }}" alt="Gambar Berita" width="200">
                </div>
                <div class="form-group">
                    <label>Tag Berita</label><br>
                    @foreach ($tag_berita as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tag{{ $tag->id }}" name="tag_berita[]" value="{{ $tag->id }}" {{ in_array($tag->id, $berita->tag_berita->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->nama }}</label>
                    </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
