<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SNI Award 2024</title>

        <!-- Bootstrap -->
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous"
        />

        <!-- Arimo Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet"
        />

        <!-- Josefin Sans Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet"
        />

        <!-- icon -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <script src="https://unpkg.com/feather-icons"></script>


        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.theme.default.min.css" />


        <!-- My CSS -->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/styles.css" />
    </head>
    <body>
        <header class="header">

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid ">
              <div class="logo-container me-5">
                <a href="/"><img src="{{ asset('assets') }}/images/icon/logo-bsn.svg" class="logo-bsn ms-2" alt="Logo BSN"/></a>
                <a href="/"><img src="{{ asset('assets') }}/images/icon/logo-sniaward.svg" class="logo-sniaward ms-2" alt="Logo SNI Award"/></a>
            </div>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse justify-content-center"
                id="navbarNavAltMarkup"
            >
                <div class="navbar-container py-2 px-4 d-flex align-items-center justify-content-between" style="margin-top: 0.1rem;">
                    

                    <div class="navbar-nav">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/"
                        >Beranda</a
                        >
                        <div class="nav-link {{ request()->is('informasi*') ? 'active' : '' }} dropdown">
                        <button class="btn {{ request()->is('informasi*') ? 'active' : '' }} dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Informasi
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('informasi.berita.index') }}">Berita</a></li>
                            <li><a class="dropdown-item" href="{{ route('informasi.acara.index') }}">Acara</a></li>
                        </ul>
                        </div>
                        <a class="nav-link {{ request()->is('dokumen') ? 'active' : '' }}" href="/dokumen">Dokumen</a>
                        <a class="nav-link {{ request()->is('linimasa') ? 'active' : '' }}" href="/linimasa">Linimasa</a>
                        <a class="nav-link {{ request()->is('faq') ? 'active' : '' }}" href="/faq">FAQ</a>
                        <a class="nav-link {{ request()->is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a>
                        @if (auth()->check())
                          <a class="nav-link" href="{{ route('user.dashboard.view') }}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#552525" class="bi bi-person-fill" viewBox="0 0 16 16">
                              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                              </svg>
                              {{ auth()->user()->name }}
                          </a>
                        @elseif (auth()->guard('peserta')->check())
                          <a class="nav-link" href="{{ route('peserta.dashboard.view') }}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#552525" class="bi bi-person-fill me-1" viewBox="0 0 16 16">
                              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                              </svg>
                              {{ auth()->guard('peserta')->user()->nama }}
                          </a>
                        @else
                        <a class="nav-link" href="/masuk">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#552525" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                        </a>
                        @endif
                        {{-- <a class="nav-link" href="/login"></a> --}}
                    </div>
                </div>

            </div>
            </div>
        </nav>

        </header>

        <main class="main-content">
        @yield('content')
        </main>

        <!-- button back to top  -->
        <a href="#" class="back-to-top">
            <span><i data-feather="chevrons-up"></i></span>
        </a>

        <!-- footer dihapus dulu (ada dinotepad) -->
        <footer>
          <div class="row m-0">
            <div class="col-12 col-lg-6">
              <div class="row logo-container align-items-center">
                <div class="col-3 text-start">
                  <img class="logo_sniaward" src="{{ asset('assets') }}/images/icon/logo-sniaward.svg" alt="" />
                </div>
                <div class="col-9 text-start">
                  <img class="logo_bsn" src="{{ asset('assets') }}/images/icon/logo-bsn.svg" alt="" />
                </div>
                <div class="col-12 mt-4">
                  <p>
                    {{-- Gedung I BPPT Jl. M.H. Thamrin No.8 Kebon Sirih,
                    <br />
                    Jakarta Pusat 10340 --}}
                    {{ $frontpage_data->alamat }}
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="row">
                <h4 class="mb-3">Info Lebih Lanjut</h4>
                <ul>
                  <a href=""><li>FAQ</li></a>
                  <a href=""><li>Kontak</li></a>
                  <a href=""><li>Syarat dan Ketentuan</li></a>
                  <a href=""><li>Kebijakan Privacy</li></a>
                  <a href=""><li>Refund Policy</li></a>
                </ul>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="social-media row">
                <h4 class="mb-3">Media Sosial</h4>
                <div class="col mb-1">
                  <a href="{{ $frontpage_data->website }}"  target="_blank" class="link-container d-flex align-items-center mb-2">
                    <img src="{{ asset('assets') }}/images/icon/link.svg" alt="" />
                    <p class="mb-0">{{ $frontpage_data->website }}</p>
                  </a>
                </div>
                <div class="sosmed-container row">
                  <a href="{{ $frontpage_data->twitter }}" target="_blank"
                    class="sosmed col-3 d-flex justify-content-center align-items-center"
                  >
                    <i data-feather="twitter"></i>
                  </a>
                  <a href="{{ $frontpage_data->instagram }}" target="_blank"
                    class="sosmed col-3 d-flex justify-content-center align-items-center"
                  >
                    <i data-feather="instagram"></i>
                  </a>
                  <a href="{{ $frontpage_data->youtube }}" target="_blank"
                    class="sosmed col-3 d-flex justify-content-center align-items-center"
                  >
                    <i data-feather="youtube"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="copyright-container col-12 mt-3 text-center align-items-center">
              <p class="m-0 fs-6">
                Copyright © 2024. All Rights Reserved by
                <a href="">Badan Standardisasi Nasional</a>
              </p>
            </div>
          </div>
      </footer>

        <script>
        feather.replace();
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"
        ></script>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"
        ></script>
        <script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>
        <script src="{{ asset('assets') }}/js/script.js"></script>
        <script>
            let goTopBtn = document.querySelector(".back-to-top");
            window.onscroll = function () {
                scrollFunction();
            };
            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                goTopBtn.style.display = "flex";
                goTopBtn.style.opacity = 1;
                } else {
                goTopBtn.style.opacity = 0;
                }
            }
        </script>
    </body>
</html>
