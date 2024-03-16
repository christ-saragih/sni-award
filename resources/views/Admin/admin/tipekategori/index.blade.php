@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <a href="/admin/tipe_kategori/tambah" class="btn btn-primary float-end mb-3">Tambah</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center">
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tipe_kategori as $tk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$tk->nama}}</td>
                    <td>
                        <form action="{{ route('tipe_kategori.destroy', $tk->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                        <a class="btn btn-primary" href="{{ route('tipe_kategori.edit', $tk->id) }}">Edit</a>

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
