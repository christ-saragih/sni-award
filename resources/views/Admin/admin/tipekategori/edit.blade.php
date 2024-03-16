@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
            <h6>Edit Tipe Kategori</h6>
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
                <form action="{{ route('tipe_kategori.update', $tipe_kategori->id) }}" method="POST">
                    @csrf
                    @method('put')
                        <div class="form-group">
                        <label>nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Tipe kategori" value="{{$tipe_kategori->nama}}">
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
