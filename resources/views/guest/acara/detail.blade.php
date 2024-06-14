@extends('guest.layouts.master')

@section('content')
<article id="acara" class="pt-5">
    <div class="acara-container">
        <div class="content-atas row">
            <div class="col-6">
                {{-- {{dd($acara->gambar_thumbnail)}} --}}
            <img src="{{ asset('storage/images/acara/thumbnail_acara/' . $acara->gambar_thumbnail) }}" style="margin-top: 55px;" alt="">
            </div>
            <div class="col-6">
                <div class="d-flex flex-column align-items-center">
                    <h3 style="margin-bottom: 20px;">{{ $acara->judul_acara }}</h3>
                    {{-- <h3 style="margin-bottom: 20px;">SNI Award 2023, untuk Kinerja Unggul dan efisien</h3> --}}
                    <hr class="mx-0" style="width: 420px;">
                </div>
            <p style="margin-top: 40px;">{!! $acara->deskripsi !!}</p>
            {{-- <button class="btn float-end">Baca Selengkapnya</button> --}}
            </div>
        </div>
    </div>
</article>

<article id="kumpulan-acara">
    <section id="slider">
        <div class="carousel-container">
        <div class="slider py-5 px-5" style="background-image: none;">
            <div class="owl-carousel">
                @foreach ($dokumentasi_acara as $da)
                <div class="slider-card">
                    <div class="d-flex justify-content-center align-items-center my-2">
                        <img src="{{ asset('storage/images/acara/konten_acara/' . $da->gambar_konten) }}" class="w-75" alt="Gambar Konten Berita" />
                    </div>
                </div>
                @endforeach
                {{-- <div class="slider-card">
                    <div class="d-flex justify-content-center align-items-center my-2">
                        <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" class="w-75" alt="" />
                    </div>
                </div>
                <div class="slider-card">
                    <div class="d-flex justify-content-center align-items-center my-2">
                        <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita-terkini.png" class="w-75" alt="" />
                    </div>
                </div> --}}
            </div>
        </div>
        </div>
    </section>
</article>
@endsection
