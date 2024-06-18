@extends('guest.layouts.master')

@section('content')
<article id="informasi" class="shape-bawah">
    <div class="content row" style="max-width: 100%">
        <h3 class="col-7">{{ $berita->judul_berita }}</h3>
        {{-- <h3 class="col-7">Seminar Nasional Peringatan Hari Standar Dunia</h3> --}}
    </div>
    <div class="row m-0 d-flex" style="max-width: 100%">
        <div class="content col-lg-7">
            {{-- <hr> --}}
            <div class="row float-end mb-4">
                <div class="d-flex mb-2">
                    <img src="{{ asset('assets') }}/images/icon/calendar.svg" class="me-2" alt="">
                    <p class="mb-0">{{ $tanggal }}</p>
                    {{-- <p class="mb-0">{{ \Carbon\Carbon::parse($berita->tanggal)->locale('id')->translatedFormat('l, j F Y') }}</p> --}}
                    {{-- <p class="mb-0">Senin, 12 Februari 2024</p> --}}
                </div>
                <div class="d-flex">
                    <img src="{{ asset('assets') }}/images/icon/eye.svg" class="me-2" alt="">
                    <p class="mb-0">470</p>
                </div>
            </div>
            {{-- <img src="{{ asset('storage/images/gambar_berita/' . $berita->file_gambar) }}" alt="" class="berita mb-4" style="object-fit: cover;"> --}}
            {{-- <img src="{{ asset('assets') }}/images/dokumentasi/berita-terkini.png" class="berita mb-4" alt=""> --}}
            <p class="description">{!! $berita->deskripsi !!}</p>
            {{-- <p class="description">BSN akan mengadakan Seminar Nasional dalam rangka Peringatan Hari Standar Dunia dan Bulan Mutu Nasional (BMN) 2021. Seminar akan dilaksanakan pada bulan November 2021 di Bandung. Acara akan dilaksanakan baik secara tatap muka dengan menerapkan protokol kesehatan maupun daring. PIC Kegiatan: Direktorat Penguatan Standar dan Penilaian Kesesuaian . BSN akan mengadakan Seminar Nasional dalam rangka Peringatan Hari Standar Dunia dan Bulan Mutu Nasional (BMN) 2021. Seminar akan dilaksanakan pada bulan November 2021 di Bandung. Acara akan dilaksanakan baik secara tatap muka dengan menerapkan protokol kesehatan maupun daring. PIC Kegiatan: Direktorat Penguatan Standar dan Penilaian Kesesuaian.</p> --}}
        </div>
        <div class="content-samping col-lg-5">
            <div class="row ms-3">
                {{-- <div class="accordion" id="accordionExample">
                    <div class="accordion-item float-end">
                    <h2 class="accordion-header" id="headingThree">
                        <button
                        class="accordion-button collapsed me-4"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseThree"
                        aria-expanded="false"
                        aria-controls="collapseThree"
                        >
                    Tag Populer
                        </button>
                    </h2>
                    <div
                        id="collapseThree"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample"
                    >
                        <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is
                        hidden by default, until the collapse plugin adds the appropriate
                        classes that we use to style each element. These classes control
                        the overall appearance, as well as the showing and hiding via CSS
                        transitions. You can modify any of this with custom CSS or
                        overriding our default variables. It's also worth noting that just
                        about any HTML can go within the <code>.accordion-body</code>,
                        though the transition does limit overflow.
                        </div>
                    </div>
                    </div>
                </div> --}}

                {{-- <h3 class="ms-2">Berita</h3> --}}
                {{-- <hr> --}}

                @foreach ($get_all_berita as $ber)
                <div class="row my-4">
                    <div class="col-12 col-lg-4">
                        <img src="{{ asset('storage/images/gambar_berita/' . $ber->file_gambar) }}" alt="" style="object-fit: cover;">
                    </div>
                    <div class="col-12 col-lg-8">
                        <p class="title">{{ $ber->judul_berita }}</p>
                        <p class="date float-end me-4">{{ $ber->tanggal }}</p>
                    </div>
                </div>
                @endforeach

                {{-- <div class="row my-4">
                    <div class="col-4">
                        <img src="{{ asset('assets') }}/images/berita/berita1.png" alt="">
                    </div>
                    <div class="col-8">
                        <p class="title">Perusahaan/Organisasi Terbaik Penerap SNI, Raih SNI Award 2021</p>
                        <p class="date float-end me-4">Senin, 14 Februari 2024</p>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-4">
                        <img src="{{ asset('assets') }}/images/berita/berita1.png" alt="">
                    </div>
                    <div class="col-8">
                        <p class="title">Perusahaan/Organisasi Terbaik Penerap SNI, Raih SNI Award 2021</p>
                        <p class="date float-end me-4">Senin, 14 Februari 2024</p>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-4">
                        <img src="{{ asset('assets') }}/images/berita/berita1.png" alt="">
                    </div>
                    <div class="col-8">
                        <p class="title">Perusahaan/Organisasi Terbaik Penerap SNI, Raih SNI Award 2021</p>
                        <p class="date float-end me-4">Senin, 14 Februari 2024</p>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-4">
                        <img src="{{ asset('assets') }}/images/berita/berita1.png" alt="">
                    </div>
                    <div class="col-8">
                        <p class="title">Perusahaan/Organisasi Terbaik Penerap SNI, Raih SNI Award 2021</p>
                        <p class="date float-end me-4">Senin, 14 Februari 2024</p>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-4">
                        <img src="{{ asset('assets') }}/images/berita/berita1.png" alt="">
                    </div>
                    <div class="col-8">
                        <p class="title">Perusahaan/Organisasi Terbaik Penerap SNI, Raih SNI Award 2021</p>
                        <p class="date float-end me-4">Senin, 14 Februari 2024</p>
                    </div>
                </div> --}}


                <div class="col mt-5">
                <a href="/informasi/berita" class="btn">Baca Lainnya</a>
                {{-- <button class="btn">Berita Lainnya</button> --}}
                </div>

            </div>


        </div>
    </div>
</article>
@endsection('content')
