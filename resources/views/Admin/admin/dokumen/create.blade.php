@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Tambah Kategori</h6>
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
                <form action="{{ route('dokumen.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" type="string" class="form-control" value="{{ old('nama') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
