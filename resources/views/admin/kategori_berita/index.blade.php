@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <a href="/admin/kategori_berita/tambah" class="btn btn-primary float-end mb-3">Tambah</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center">
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kategori_berita as $kb)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$kb->nama}}</td>
                    <td>
                        <form action="{{ route('kategori_berita.destroy', $kb->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('kategori_berita.edit', $kb->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
