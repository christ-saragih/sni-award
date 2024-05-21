@extends('Guest.layouts.master')

@section('content')
<article id="news">
    <div class="artikel-container row">
        <div class="col-12 d-flex align-items-center justify-content-start">
            <div class="title-container d-flex flex-column align-items-center justify-content-center">
                <h1 style="text-align: left;">Berita</h1>
                <hr class="mx-0" style="width: 150px;">
            </div>
        </div>
        @if ($berita_terbaru)
        <div class="content-container col-6">
            <div class="content row">
                <h2>Berita Terkini</h2>
                <img src="{{ asset('gambar/gambar_berita/' . $berita_terbaru->file_gambar) }}" class="p-0" alt="">
                {{-- <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita-terkini.png" class="p-0" alt=""> --}}
            </div>
        </div>
        <div class="content-container col-6">
            <div class="content row">
                <h3>{{ $berita_terbaru->judul_berita }}</h3>
                {{-- <h3>SEMINAR NASIONAL PERINGATAN HARI STANDAR DUNIA</h3> --}}
                <div class="author-container d-flex">
                    <div class="flex-grow-1"></div>
                    <div class="author-content justify-content-end align-items-center">
                        <p class="hour">1 Hour Ago</p>
                        <p class="author">
                            Ditinjau oleh <a href="">Shinta Arafah</a>
                        </p>
                    </div>
                </div>

                <p class="description">
                    {{-- {{ $berita_terbaru_deskripsi }} --}}
                    {!! $berita_terbaru_deskripsi !!}
                    {{-- {{ Illuminate\Support\Str::limit($berita_terbaru->deskripsi, 100) }} --}}
                    <a href="{{ route('informasi.berita.detail', $berita_terbaru->slug) }}">baca selengkapnya.</a>
                </p>
                    {{-- BSN akan mengadakan Seminar Nasional dalam rangka Peringatan
                    Hari Standar Dunia dan Bulan Mutu Nasional (BMN) 2021. Seminar
                    akan dilaksanakan pada bulan November 2021 di Bandung. Acara
                    akan dilaksanakan baik secara tatap muka dengan menerapkan
                    protokol kesehatan maupun daring. PIC Kegiatan: Direktorat
                    Penguatan Standar dan Penilaian Kesesuaian
                    <a href="">baca selengkapnya.</a>
                </p> --}}
                <div class="program-bsn-container row justify-content-end">
                    @foreach ($tag_berita_terbaru as $tbt)
                    <div class="program-bsn col-1 rounded-1 text-center d-flex justify-content-center align-items-center ms-2">
                        <p>#{{$tbt->tag_berita->nama}}</p>
                    </div>
                    @endforeach
                    {{-- <div class="program-bsn col-1 rounded-1 text-center d-flex justify-content-center align-items-center ms-2">
                        <p>SNIBSN</p>
                    </div>
                    <div class="program-bsn col-2 rounded-1 text-center d-flex justify-content-center align-items-center ms-2">
                        <p>SNIAWards2023</p>
                    </div>
                    <div class="program-bsn col-2 rounded-1 text-center d-flex justify-content-center align-items-center ms-2">
                        <p>#BerkasSNI</p> --}}
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="d-flex flex-column align-items-center py-3 px-4 mb-4" style="background-color: #E59B30; color: white; font-weight: bold; font-size: 22px; border-radius: 10px; margin-top: 55px;">
                Berita belum tersedia!
            </div>
        @endif
    </div>

</article>
<div class="container">
    <div class="row justify-content-center gap-4">
        @foreach ($berita as $ber)
        <div class="berita-container col-lg-4 col-md-6 col-sm-12 rounded-3 p-0">
            <img src="{{ asset('gambar/gambar_berita/' . $ber->file_gambar) }}" class="w-100 rounded-3" alt="">
            <div class="content">
                <h4>
                {{ $ber->judul_berita }}
                </h4>
                <p>
                {!! $ber->deskripsi !!}
                </p>
                <a href="{{ route('informasi.berita.detail', $ber->slug) }}" class="btn">Baca Selengkapnya</a>
                {{-- <button class="btn">Baca Selengkapnya</button> --}}
            </div>
        </div>
        @endforeach
        {{-- <div class="berita-container col-lg-4 col-md-6 col-sm-12 rounded-3 p-0">
            <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" class="w-100 rounded-3" alt="">
            <div class="content">
                <h4>
                SIARAN PERS: Perusahaan/Organisasi Terbaik Penerap SNI, Raih
                SNI Award 2021
                </h4>
                <p>
                Badan Standardisasi Nasional (BSN) kembali menggelar SNI Award
                2021. SNI Award, yang dicanangkan sebagai The National Quality
                Award of Indonesia, telah dimulai sejak tahun 2005. SNI Award
                merupakan sebuah pemberian penghargaan tertinggi dari
                Pemerintah Repubik Indonesia bagi organisasi yang menerapkan
                Standar Nasional Indonesia (SNI).
                </p>
                <p>
                Badan Standardisasi Nasional (BSN) kembali menggelar SNI Award
                2021. SNI Award, yang dicanangkan sebagai The National Quality
                Award of Indonesia, telah dimulai sejak tahun 2005. SNI Award
                merupakan sebuah pemberian penghargaan tertinggi dari
                Pemerintah Repubik Indonesia bagi organisasi yang menerapkan
                Standar Nasional Indonesia (SNI).
                </p>
                <button class="btn">Baca Selengkapnya</button>
            </div>
        </div>
        <div class="berita-container col-lg-4 col-md-6 col-sm-12 rounded-3 p-0">
            <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" class="w-100 rounded-3" alt="">
            <div class="content">
                <h4>
                SIARAN PERS: Perusahaan/Organisasi Terbaik Penerap SNI, Raih
                SNI Award 2021
                </h4>
                <p>
                Badan Standardisasi Nasional (BSN) kembali menggelar SNI Award
                2021. SNI Award, yang dicanangkan sebagai The National Quality
                Award of Indonesia, telah dimulai sejak tahun 2005. SNI Award
                merupakan sebuah pemberian penghargaan tertinggi dari
                Pemerintah Repubik Indonesia bagi organisasi yang menerapkan
                Standar Nasional Indonesia (SNI).
                </p>
                <button class="btn">Baca Selengkapnya</button>
            </div>
        </div>
        <div class="berita-container col-lg-4 col-md-6 col-sm-12 rounded-3 p-0">
            <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" class="w-100 rounded-3" alt="">
            <div class="content">
                <h4>
                SIARAN PERS: Perusahaan/Organisasi Terbaik Penerap SNI, Raih
                SNI Award 2021
                </h4>
                <p>
                Badan Standardisasi Nasional (BSN) kembali menggelar SNI Award
                2021. SNI Award, yang dicanangkan sebagai The National Quality
                Award of Indonesia, telah dimulai sejak tahun 2005. SNI Award
                merupakan sebuah pemberian penghargaan tertinggi dari
                Pemerintah Repubik Indonesia bagi organisasi yang menerapkan
                Standar Nasional Indonesia (SNI).
                </p>
                <button class="btn">Baca Selengkapnya</button>
            </div>
        </div>
        <div class="berita-container col-lg-4 col-md-6 col-sm-12 rounded-3 p-0">
            <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" class="w-100 rounded-3" alt="">
            <div class="content">
                <h4>
                SIARAN PERS: Perusahaan/Organisasi Terbaik Penerap SNI, Raih
                SNI Award 2021
                </h4>
                <p>
                Badan Standardisasi Nasional (BSN) kembali menggelar SNI Award
                2021. SNI Award, yang dicanangkan sebagai The National Quality
                Award of Indonesia, telah dimulai sejak tahun 2005. SNI Award
                merupakan sebuah pemberian penghargaan tertinggi dari
                Pemerintah Repubik Indonesia bagi organisasi yang menerapkan
                Standar Nasional Indonesia (SNI).
                </p>
                <button class="btn">Baca Selengkapnya</button>
            </div>
        </div>
        <div class="berita-container col-lg-4 col-md-6 col-sm-12 rounded-3 p-0">
            <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" class="w-100 rounded-3" alt="">
            <div class="content">
                <h4>
                SIARAN PERS: Perusahaan/Organisasi Terbaik Penerap SNI, Raih
                SNI Award 2021
                </h4>
                <p>
                Badan Standardisasi Nasional (BSN) kembali menggelar SNI Award
                2021. SNI Award, yang dicanangkan sebagai The National Quality
                Award of Indonesia, telah dimulai sejak tahun 2005. SNI Award
                merupakan sebuah pemberian penghargaan tertinggi dari
                Pemerintah Repubik Indonesia bagi organisasi yang menerapkan
                Standar Nasional Indonesia (SNI).
                </p>
                <button class="btn">Baca Selengkapnya</button>
            </div>
        </div>
        <div class="berita-container col-lg-4 col-md-6 col-sm-12 rounded-3 p-0">
            <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" class="w-100 rounded-3" alt="">
            <div class="content">
                <h4>
                SIARAN PERS: Perusahaan/Organisasi Terbaik Penerap SNI, Raih
                SNI Award 2021
                </h4>
                <p>
                Badan Standardisasi Nasional (BSN) kembali menggelar SNI Award
                2021. SNI Award, yang dicanangkan sebagai The National Quality
                Award of Indonesia, telah dimulai sejak tahun 2005. SNI Award
                merupakan sebuah pemberian penghargaan tertinggi dari
                Pemerintah Repubik Indonesia bagi organisasi yang menerapkan
                Standar Nasional Indonesia (SNI).
                </p>
                <button class="btn">Baca Selengkapnya</button>
            </div>
        </div> --}}
    </div>
</div>
@endsection
