@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          {{-- <h6>Berita</h6> --}}
          <a href="{{ route('berita.create') }}" class="btn btn-primary float-end mb-4">Tambah</a>
        </div>
        <div class="card-body px-5 pt-2 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center">
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Kategori</th>
                    <th>Slug</th>
                    <th>Judul Berita</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>file</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($berita as $berita)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$berita->kategori_berita->nama}}</td>
                    <td>{{$berita->slug}}</td>
                    <td>{{$berita->judul_berita}}</td>
                    <td>{{$berita->deskripsi}}</td>
                    <td>{{$berita->tanggal}}</td>
                    <td>{{$berita->file_gambar}}</td>
                    <td>
                        <form action="{{ route('berita.destroy', $berita->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('berita.edit', $berita->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
