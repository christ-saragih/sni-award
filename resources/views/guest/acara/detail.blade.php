@extends('Guest.layouts.master')

@section('content')
<article id="acara" class="pt-5">
    <div class="acara-container">
      <div class="content-atas row">
        <div class="col-6">
          <img src="http://127.0.0.1:8000/assets/images/acara/acara1.png" style="margin-top: 55px;" alt="">
        </div>
        <div class="col-6">
            <div class="d-flex flex-column align-items-center">
                <h3 style="margin-bottom: 20px;">SNI Award 2023, untuk Kinerja Unggul dan efisien</h3>
                <hr class="mx-0" style="width: 420px;">
            </div>
          <p style="margin-top: 40px;">BSN akan mengadakan Seminar Nasional dalam rangka Peringatan Hari Standar Dunia dan Bulan Mutu Nasional (BMN) 2021. Seminar akan dilaksanakan pada bulan November 2021 di Bandung. Acara akan dilaksanakan baik secara tatap muka dengan menerapkan protokol kesehatan maupun daring. PIC Kegiatan: Direktorat Penguatan Standar dan Penilaian Kesesuaian </p>
          <button class="btn float-end">Baca Selengkapnya</button>
        </div>
      </div>

    </div>
  </article>

  <article id="kumpulan-acara">
    <section id="slider">
      <div class="carousel-container">
        <div class="slider py-5 px-5" style="background-image: none;">
          <div class="owl-carousel">

            
              <div class="slider-card">
                <div class="d-flex justify-content-center align-items-center my-2">
                  <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita.png" class="w-75" alt="" />
                </div>
              </div>

              <div class="slider-card">
                <div class="d-flex justify-content-center align-items-center my-2">
                  <img src="http://127.0.0.1:8000/assets/images/dokumentasi/berita-terkini.png" class="w-75" alt="" />
                </div>
              </div>
       
            
          </div>
        </div>
      </div>
    </section>
  </article>
@endsection