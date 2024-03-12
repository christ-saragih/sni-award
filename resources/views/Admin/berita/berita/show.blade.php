<!-- resources/views/berita/show.blade.php -->

@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Detail Berita</h2>

        <div>
            <strong>Judul:</strong> {{ $berita->judul }}
        </div>
        <div>
            <strong>Isi:</strong> {{ $berita->isi }}
        </div>

        <a href="{{ route('berita.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
