@extends('Guest.layouts.master')

@section('content')
<main>
  <article id="jumbotron" class="bg-theme">
    <div id="container-jumbotron" style="margin-top: -60px;">
      <div class="row ">
        <div class="title-container col-8 d-flex flex-column justify-content-center ">
          <h1>
            {{-- Selamat Datang di Website
            <span>SNI Award 2024</span> --}}
            {{ $frontpage_data->judul }}
          </h1>
          <p>
            {{-- SNI Award dicanangkan sebagai The National Quality Award of
            <br />Indonesia sejak tahun 2005 --}}
            {{ $frontpage_data->keterangan_judul }}
          </p>
        </div>
        <div class="image-container col-4 ">
          <img src="/storage{{ $frontpage_data->gambar_banner }}" class="w-100" alt="" />
        </div>
      </div>
      <br>
      <br>
      <div class="d-flex align-items-center justify-content-center">
        <div class="card-container d-flex align-items-center justify-content-center">
          <div class="card">
            <img src="{{ asset('assets') }}/images/icon/buku-biru.svg" alt="" />
            <p>Seputar SNI Award</p>
          </div>
          <div class="card">
            <img src="{{ asset('assets') }}/images/icon/juri-biru.svg" alt="" />
            <p>Dewan Juri SNI Award</p>
          </div>
          <div class="card">
            <img src="{{ asset('assets') }}/images/icon/medali-biru.svg" alt="" />
            <p>Peraih SNI Award</p>
          </div>
        </div>
      </div>
    </div>

  </article>

  <article id="about">
    <div class="about-container justify-content-center">
      <h1>Apa itu SNI Award?</h1>
      <hr />
      <p>
        {{ $frontpage_data->keterangan_sni }}
      </p>
    </div>
  </article>

  <article id="dokumentasi">
  <section id="slider" class="pt-5">
      <div class="carousel-container">
        <h1 class="text-center">{{ $frontpage_data->judul_dokumentasi }}</h1>
        <hr class="mb-4">
        <p class="text-center pb-5">{{ $frontpage_data->keterangan_dokumentasi }}</p>
        <div class="slider py-5 px-5">
          <div class="owl-carousel">

            @foreach ($dokumentasi as $dok)
              <div class="slider-card">
                <div
                  class="d-flex justify-content-center align-items-center mb-4"
                >
                  <img src="/storage{{ $dok->url_dokumentasi }}" alt="" />
                </div>
              </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </section>
  </article>

  <article id="news">
    <div class="artikel-container row">
      <div class="col-12 d-flex align-items-center justify-content-start">
        <div class="title-container d-flex flex-column align-items-center justify-content-center">
          <h1 style="text-align: left;">Artikel</h1>
          <hr class="mx-0" style="width: 120px;"/>
        </div>
      </div>
      <div class="content-container col-6">
        <div class="content row">
          <h2>Berita Terkini</h2>
          <img
            src="{{ asset('assets') }}/images/dokumentasi/berita-terkini.png"
            class="p-0"
            alt=""
          />
        </div>
      </div>
      <div class="content-container col-6">
        <div class="content row">
          <h3>SEMINAR NASIONAL PERINGATAN HARI STANDAR DUNIA</h3>
          <div class="author-container d-flex">
            <div class="flex-grow-1"></div>
            <div
              class="author-content justify-content-end align-items-center"
            >
              <p class="hour">1 Hour Ago</p>
              <p class="author">
                Ditinjau oleh <a href="">Shinta Arafah</a>
              </p>
            </div>
          </div>

          <p class="description">
            BSN akan mengadakan Seminar Nasional dalam rangka Peringatan
            Hari Standar Dunia dan Bulan Mutu Nasional (BMN) 2021. Seminar
            akan dilaksanakan pada bulan November 2021 di Bandung. Acara
            akan dilaksanakan baik secara tatap muka dengan menerapkan
            protokol kesehatan maupun daring. PIC Kegiatan: Direktorat
            Penguatan Standar dan Penilaian Kesesuaian
            <a href="">baca selengkapnya.</a>
          </p>
          <div class="program-bsn-container row justify-content-end">
            <div
              class="program-bsn col-1 rounded-1 text-center d-flex justify-content-center align-items-center ms-2"
            >
              <p>SNIBSN</p>
            </div>
            <div
              class="program-bsn col-2 rounded-1 text-center d-flex justify-content-center align-items-center ms-2"
            >
              <p>SNIAWards2023</p>
            </div>
            <div
              class="program-bsn col-2 rounded-1 text-center d-flex justify-content-center align-items-center ms-2"
            >
              <p>#BerkasSNI</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="news-container">
      <div class="row justify-content-center">
        <div class="berita-container col-4 rounded-3 p-0 mx-4">
          <img src="{{ asset('assets') }}/images/dokumentasi/berita.png" class="w-100 rounded-3" alt="" />
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
        <div class="berita-container col-4 rounded-3 p-0 mx-4">
          <img src="{{ asset('assets') }}/images/dokumentasi/berita.png" class="w-100 rounded-3" alt="" />
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
        <div class="berita-container col-4 rounded-3 p-0 mx-4">
          <img src="{{ asset('assets') }}/images/dokumentasi/berita.png" class="w-100 rounded-3" alt="" />
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
      </div>
    </div>
  </article>

  <article id="acara">
    <div class="acara-container">
      <div class="title col-12">
        <h1>{{ $frontpage_data->judul_berita }}</h1>
        <hr class="mx-0">
        <p>{{ $frontpage_data->keterangan_berita }}</p>
      </div>
      <div class="content-atas row">
        <div class="col-6">
          <img src="{{ asset('assets') }}/images/acara/acara1.png" alt="">
        </div>
        <div class="col-6">
          <h3>SNI Award 2023, untuk Kinerja Unggul dan efisien</h3>
          <p>BSN akan mengadakan Seminar Nasional dalam rangka Peringatan Hari Standar Dunia dan Bulan Mutu Nasional (BMN) 2021. Seminar akan dilaksanakan pada bulan November 2021 .</p>
          <button class="btn float-end">Baca Selengkapnya</button>
        </div>
      </div>

      <div class="content-bawah row">
        <div class="col-6">
          <h3>Pendaftaran SNI 2024 menjadi sorotan para pekerja</h3>
          <p>BSN akan mengadakan Seminar Nasional dalam rangka Peringatan Hari Standar Dunia dan Bulan Mutu Nasional (BMN) 2021. Seminar akan dilaksanakan pada bulan November 2021 .</p>
          <button class="btn float-end">Baca Selengkapnya</button>
        </div>
        <div class="col-6">
          <img src="{{ asset('assets') }}/images/acara/acara2.png" alt="">
        </div>
      </div>
    </div>
  </article>

  <article id="contact" class="shape-atas">
    <div class="contact-container">
      <div class="title">
        <h1>Frequently Asked Questions</h1>
        <hr class="mx-0" />
      </div>
      <div class="row">
        <div class="faq-container col-6">
          <div class="accordion w-75" id="accordionExample">

            <?php $i_faq = 0; ?>
            @foreach ($popular_faq as $faq)
            <?php $i_faq++; ?>
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $i_faq }}">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $i_faq }}"
                    aria-expanded="false"
                    aria-controls="collapse{{ $i_faq }}"
                  >
                    {{ $faq->pertanyaan }}
                  </button>
                </h2>
                <div
                  id="collapse{{ $i_faq }}"
                  class="accordion-collapse collapse {{ ($i_faq == 1) ? 'show' : '' }}"
                  aria-labelledby="heading{{ $i_faq }}"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    {{ $faq->jawaban }}
                  </div>
                </div>
              </div>
            @endforeach
            
          </div>
        </div>
        <div class="col-6 text-center">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.97659708331!2d106.82049436920713!3d-6.236432029161127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f36a70592c2d%3A0xb7e21ff0384fde0d!2sBadan%20Standardisasi%20Nasional%20(BSN)!5e0!3m2!1sid!2sid!4v1707458886395!5m2!1sid!2sid"
            width="579"
            height="351"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </div>
    </div>
  </article>

</main>
@endsection('content')
