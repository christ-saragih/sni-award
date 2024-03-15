@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="card col-12 p-4">
        <div class="mb-4">
            <div class="">
            <h3 class="fw-bold">Konten Berita</h3>
            <br><hr style="color: orange; height: 0.5px;"><br>
            </div>
            <div class="px-3 pt-0 pb-2">
            {{-- @if($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                </div>
            @endif --}}
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
                            @foreach ($tag_berita as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tag{{ $tag->id }}" name="tag_berita[]" value="{{ $tag->id }}">
                                <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->nama }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label>Judul Berita</label>
                        <input name="judul_berita" type="string" class="form-control" placeholder="Tambahkan Judul" value="{{ old('judul_berita') }}">
                    </div> --}}
                    {{-- <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori_berita_id" class="form-control">
                            @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    {{-- <div class="form-group">
                        <label>Tag Berita</label><br>
                        @foreach ($tag_berita as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="tag{{ $tag->id }}" name="tag_berita[]" value="{{ $tag->id }}">
                            <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->nama }}</label>
                        </div>
                        @endforeach
                    </div> --}}
                    <div class="row g-3 justify-content-end mt-2">
                        <div class="col-auto">
                            <button class="btn btn-secondary">Close</button>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
