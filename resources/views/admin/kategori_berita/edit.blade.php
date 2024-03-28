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
                <form action="{{ route('kategori_berita.update', $kategori_berita->id) }}" method="POST">
                    @csrf
                    @method('put')
                        <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="nama" class="form-control" placeholder="Kategori Berita" value="{{$kategori_berita->nama}}">
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
