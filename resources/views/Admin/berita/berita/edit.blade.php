@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4 p-4">
        <div class="">
            <h3 class="fw-bold">Edit Konten Berita</h3>
            <br><hr style="color: orange; height: 0.5px;"><br>
        </div>
        <div class="px-3 pt-0 pb-2">
            <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3 align-items-center">
                    <div class="col-3">
                        <label class="fw-bold">Judul Berita</label>
                    </div>
                    <div class="col-9">
                        <input type="text" id="judul_berita" name="judul_berita" class="form-control" placeholder="Tambahkan Judul" value="{{ $berita->judul_berita }}">
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-3">
                        <label class="fw-bold">Gambar Berita</label>
                    </div>
                    <div class="col-9">
                        <input type="file" id="file_gambar" name="file_gambar" class="form-control" value="{{ $berita->file_gambar }}">
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-3">
                        <label class="fw-bold">Tanggal Upload Berita</label>
                    </div>
                    <div class="col-3">
                        <input type="date" id="tangga" name="tanggal" class="form-control" value="{{ $berita->tanggal }}">
                    </div>
                </div>
                <div class="row g-3 mt-2">
                    <div class="col-3">
                        <label class="fw-bold">Isi Berita</label>
                    </div>
                    <div class="col-9">
                        <textarea name="deskripsi" id="deskripsi" cols="85" rows="20">{{ $berita->deskripsi }}</textarea>
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-3">
                        <label class="fw-bold">Tag Berita</label>
                    </div>
                    <div class="col-9">
                        @foreach ($tag_berita as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="tag{{ $tag->id }}" name="tag_berita[]" value="{{ $tag->id }}" {{ in_array($tag->id, $berita->tag_berita->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->nama }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="kategori_berita_id">Kategori Berita</label>
                    <select class="form-control" id="kategori_berita_id" name="kategori_berita_id">
                        @foreach ($kategori as $kategori)
                        <option value="{{ $kategori->id }}" {{ $berita->kategori_berita_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div> --}}
                {{-- <div class="form-group">
                    <label for="judul_berita">Judul Berita</label>
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="{{ $berita->judul_berita }}">
                </div> --}}
                {{-- <div class="form-group">
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
                </div> --}}
                <div class="row g-3 justify-content-end mt-2">
                    <div class="col-auto">
                        <button class="btn btn-secondary">Batal</button>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
