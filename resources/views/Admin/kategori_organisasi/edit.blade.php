@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          {{-- <h6>Edit Berita</h6> --}}
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
            <form action="{{ route('kategori_organisasi.update', $kategori_organisasi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tipe_kategori_id">Tipe Kategori</label>
                    <select class="form-control" id="tipe_kategori_id" name="tipe_kategori_id">
                        @foreach ($tipe_kategori as $tk)
                        <option value="{{ $tk->id }}" {{ $kategori_organisasi->tipe_kategori_id == $tk->id ? 'selected' : '' }}>{{ $tk->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="slug" name="nama" value="{{ $kategori_organisasi->nama }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
