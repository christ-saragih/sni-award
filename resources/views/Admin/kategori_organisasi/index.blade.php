@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          {{-- <h6>Berita</h6> --}}
          <a href="{{ route('kategori_organisasi.create') }}" class="btn btn-primary float-end mb-4">Tambah</a>
        </div>
        <div class="card-body px-5 pt-2 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center">
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Tipe Kategori</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kategori_organisasi as $ko)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$ko->tipe_kategori->nama}}</td>
                    <td>{{$ko->nama}}</td>
                    <td>
                        <form action="{{ route('kategori_organisasi.destroy', $ko->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('kategori_organisasi.edit', $ko->id) }}">Edit</a>

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
