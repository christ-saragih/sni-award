@extends('guest.layouts.master')

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
                {{-- {{dd($penjadwalan_dokumen)}} --}}
            @forelse ($penjadwalan_dokumen as $item)
                <div class="item" style="width: 405px;">
                    <a href="{{ route('penjadwalan_dokumen.download', $item->id) }}" target="_blank" class="card-body" style="text-decoration: none">
                        <img src="http://127.0.0.1:8000/assets/images/icon/dokumen-kegiatan/dok2.svg" alt="">
                        <h4>{{ $item->nama }}</h4>
                    </a>
                </div>
            @empty
                <div class="d-flex flex-column align-items-center py-3 px-4 mb-4" style="background-color: #E59B30; color: white; font-weight: bold; font-size: 22px; border-radius: 10px;">
                    Dokumen kegiatan belum tersedia!
                </div>
            @endforelse
            </div>
        @else
            {{-- Jika data lebih dari 2, gunakan carousel --}}
            <div class="owl-carousel owl-theme">
                @foreach ($penjadwalan_dokumen as $item)
                    <div class="item">
                        <a href="{{ route('penjadwalan_dokumen.download', $item->id) }}" target="_blank" class="card-body" style="text-decoration: none">
                            <img src="http://127.0.0.1:8000/assets/images/icon/dokumen-kegiatan/dok2.svg" alt="">
                            <h4>{{ $item->nama }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</article>

@endsection
