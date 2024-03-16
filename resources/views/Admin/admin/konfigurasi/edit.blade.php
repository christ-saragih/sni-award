@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
            <h6>Edit Konfigurasi</h6>
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
                <form action="{{ route('konfigurasi.update', $konfigurasi->id) }}" method="POST">
                    @csrf
                    @method('put')
                        <div class="form-group">
                        <label>Key</label>
                        <input type="text" name="key" class="form-control" placeholder="Kategori Berita" value="{{$konfigurasi->key}}">
                        </div>
                        <div class="form-group">
                        <label>Value</label>
                        <input type="text" name="value" class="form-control" placeholder="Kategori Berita" value="{{$konfigurasi->value}}">
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
