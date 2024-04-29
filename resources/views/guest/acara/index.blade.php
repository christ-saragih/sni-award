@extends('Guest.layouts.master')

@section('content')
<article id="news">
    <div class="artikel-container">

        <div class="col-12 d-flex align-items-center justify-content-start">
            <div class="title-container d-flex flex-column align-items-center justify-content-center">
                <h1 style="text-align: left;">Kumpulan Acara</h1>
                <hr class="mx-0" style="width: 310px;">
            </div>
        </div>

        <div class="news-container" style="margin-top: 55px;">
            <div class="row d-flex gap-3 justify-content-around">
                @foreach ($acara as $acara)
                <a href="{{ route('informasi.acara.detail', $acara->slug) }}" class="informasi-acara-container col-4 rounded-3 p-0" style="text-decoration: none">
                    <img src="{{ asset('gambar/thumbnail_acara/' . $acara->gambar_thumbnail) }}" alt="">
                    <div class="content">
                        <h4>
                            {{ $acara->judul_acara }}
                        </h4>
                    </div>
                </a>
                @endforeach
                {{-- <div class="informasi-acara-container col-4 rounded-3 p-0">
                    <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" alt="">
                    <div class="content">
                        <h4>
                            Kemerihan SNI AWARD
                        </h4>
                    </div>
                </div>
                <div class="informasi-acara-container col-4 rounded-3 p-0">
                    <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" alt="">
                    <div class="content">
                        <h4>
                            Kemerihan SNI AWARD
                        </h4>
                    </div>
                </div>
                <div class="informasi-acara-container col-4 rounded-3 p-0">
                    <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" alt="">
                    <div class="content">
                        <h4>
                            Kemerihan SNI AWARD
                        </h4>
                    </div>
                </div>
                <div class="informasi-acara-container col-4 rounded-3 p-0">
                    <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" alt="">
                    <div class="content">
                        <h4>
                            Kemerihan SNI AWARD
                        </h4>
                    </div>
                </div>
                <div class="informasi-acara-container col-4 rounded-3 p-0">
                    <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" alt="">
                    <div class="content">
                        <h4>
                            Kemerihan SNI AWARD
                        </h4>
                    </div>
                </div>
                <div class="informasi-acara-container col-4 rounded-3 p-0">
                    <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" alt="">
                    <div class="content">
                        <h4>
                            Kemerihan SNI AWARD
                        </h4>
                    </div>
                </div> --}}
            </div>
        </div>
</article>
@endsection
