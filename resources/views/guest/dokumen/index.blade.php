@extends('Guest.layouts.master')

@section('content')
<article id="unduh">
    <div class="title">
        <h1 class="text-center">Dokumen Kegiatan</h1>
        <hr style="width: 350px;">
    </div>

    <div class="row">
        @if ($penjadwalan_dokumen->count() <= 2)
            {{-- Jika data kurang dari atau sama dengan 2, gunakan div --}}
            <div class="d-flex justify-content-center">
            @foreach ($penjadwalan_dokumen as $item)

                <div class="item" style="width: 405px;">
                    <a href="{{ $item->file_dokumen }}" target="_blank" class="card-body" style="text-decoration: none">
                        <img src="http://127.0.0.1:8000/assets/images/icon/dokumen-kegiatan/dok2.svg" alt="">
                        <h4>{{ $item->nama_dokumen }}</h4>
                    </a>
                </div>

            @endforeach
            </div>
        @else
            {{-- Jika data lebih dari 2, gunakan carousel --}}
            <div class="owl-carousel owl-theme">
                @foreach ($penjadwalan_dokumen as $item)
                    <div class="item">
                        <a href="{{ $item->file_dokumen }}" target="_blank" class="card-body" style="text-decoration: none">
                            <img src="http://127.0.0.1:8000/assets/images/icon/dokumen-kegiatan/dok2.svg" alt="">
                            <h4>{{ $item->nama_dokumen }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</article>

@endsection
