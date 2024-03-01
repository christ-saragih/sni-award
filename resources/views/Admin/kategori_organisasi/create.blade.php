@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          {{-- <h6>Tambah Berita</h6> --}}
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
            <form action="{{ route('kategori_organisasi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tipe Kategori</label>
                    <select name="tipe_kategori_id" class="form-control">
                        <option value="">Pilih Tipe Kategori</option>
                        @foreach ($tipe_kategori as $tk)
                            <option value="{{ $tk->id }}">{{ $tk->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" type="string" class="form-control" placeholder="Tambahkan Nama" value="{{ old('nama') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
