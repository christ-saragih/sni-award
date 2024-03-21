@extends('Guest.layouts.master')

@section('content')
<article class="pb-5 shape-kontak">
    <div class="contact-container">
      <div class="d-flex flex-row-reverse align-items-center title gap-4 pb-5 mb-5">
          <h1>Kontak Kami</h1>
          <hr class="mb-0 p-0 w-75" style="background-color: #CC9305;"/>
      </div>

        <div class="kontak-container d-flex flex-column gap-2">
          <h1>Hubungi Kami</h1>
          <p>Untuk informasi lebih lanjut atau pertanyaan, Silahkan untuk menghubungi kami.</p>
          <div class="d-flex gap-5 mb-5">

              <div class="d-flex flex-column gap-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-container">
                        <div class="icon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <h4>Email</h4>
                        <span>sniawardbsn@gmail.com</span>
                    </div>
                </div>
    
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-container">
                        <div class="icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <h4>Kontak</h4>
                        <span>(021) 1234567</span>
                    </div>
                </div>                
              </div>

              <div class="d-flex flex-column gap-4">
                <h4 class="mb-1">Media Sosial</h4>
                <a href="" style="color: inherit; text-decoration: inherit;">
                <div class="d-flex flex-row gap-3 align-items-center">
                    <div class="medsos-container">
                        <i data-feather="link"></i>
                    </div>
                    <p class="link">www.bsn.go.id</p>
                </div>
                </a>
                <div class="d-flex flex-row gap-3">
                    <div class="medsos-container"><a href="" style="color: inherit; text-decoration: inherit;"><i data-feather="twitter"></i></a></div>
                    <div class="medsos-container"><a href="" style="color: inherit; text-decoration: inherit;"><i data-feather="instagram"></i></a></div>
                    <div class="medsos-container"><a href="" style="color: inherit; text-decoration: inherit;"><i data-feather="facebook"></i></a></div>
                    <div class="medsos-container"><a href="" style="color: inherit; text-decoration: inherit;"><i data-feather="youtube"></i></a></div>
                </div>
              </div>


          </div>

          <div class="mt-5 ms-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.97659708331!2d106.82049436920713!3d-6.236432029161127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f36a70592c2d%3A0xb7e21ff0384fde0d!2sBadan%20Standardisasi%20Nasional%20(BSN)!5e0!3m2!1sid!2sid!4v1707458886395!5m2!1sid!2sid"
                width="960"
                height="580"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>

    </div>
  </article>
@endsection