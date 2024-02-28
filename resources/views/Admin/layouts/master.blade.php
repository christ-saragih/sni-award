<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin || SNI Award 2023</title>

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

    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- icon -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- CSS Admin -->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/styles.css" />
</head>

<body style="background-color: #ECE4E4;">

<aside
      class="sidenav navbar navbar-vertical navbar-expand-xs fixed-start"
      id="sidenavMain"
      style="
        background-color: #fafafa;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        box-shadow: 0px 4px 10px 0px rgba(0, 0, 0, 0.25);
      "
    >
      <div class="sidenav-header d-flex align-item-center justify-content-center">
        <a
          class="navbar-brand m-0"
          id="navbarBrand"
          href="#"
        
        >
          <img
            src="{{ asset('assets') }}/images/icon/logo-sniaward.svg"
            class="navbar-brand-img" style="width: 100px;"
            id="navbarBrandImg"
            alt="SNIAward 2024"
          />
        </a>
      </div>
      <!-- <hr class="horizontal dark mt-0" /> -->
      <div class="sidebar collapse navbar-collapse w-auto" id="sidebar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" id="navLink" href="../pages/dashboard.html">
              <div
                class="icon-sm icon-sm text-center me-1 d-flex align-items-center justify-content-center"
              >
                <i class="fa fa-home"></i>
              </div>
              <span class="nav-link-text" id="navLinkText">Beranda</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="navLink" href="#">
              <div
                class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
              >
                <i class="fa fa-university"></i>
              </div>
              <span class="nav-link-text" id="navLinkText">Halaman Depan</span>
            </a>
          </li>
          <li class="nav-item" id="navItemBerita">
            <a class="nav-link" id="navLink" href="#">
              <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                <i class="fa fa-sticky-note"></i>
              </div>
              <span class="nav-link-text" id="navLinkText">Data Master</span> 
                <i class="fa fa-caret-left ms-auto" id="faCaretLeft"></i>
            </a>
            <ul class="dropdown-menu" id="dropdownMenu">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                    <i class="fa fa-circle-thin"></i>
                  </div>
                  <span class="nav-link-text dropdown">Konfigurasi</span> 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                    <i class="fa fa-circle-thin"></i>
                  </div>
                  <span class="nav-link-text dropdown">Assesment</span> 
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="navLink" href="#">
              <div
                class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
              >
                <i class="fa fa-user"></i>
              </div>
              <span class="nav-link-text" id="navLinkText">Peserta</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="navLink" href="#">
              <div
                class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
              >
                <i class="fa fa-tasks"></i>
              </div>
              <span class="nav-link-text" id="navLinkText">Evaluator</span>
            </a>
          </li>
          <li class="nav-item" id="navItemBerita">
            <a class="nav-link" id="navLink" href="#">
              <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                <i class="fa fa-sticky-note"></i>
              </div>
              <span class="nav-link-text" id="navLinkText">Berita & Acara</span> 
                <i class="fa fa-caret-left ms-auto" id="faCaretLeft"></i>
            </a>
            <ul class="dropdown-menu" id="dropdownMenu">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                    <i class="fa fa-circle-thin"></i>
                  </div>
                  <span class="nav-link-text dropdown">Kategori</span> 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                    <i class="fa fa-circle-thin"></i>
                  </div>
                  <span class="nav-link-text dropdown">Tag Berita</span> 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                    <i class="fa fa-circle-thin"></i>
                  </div>
                  <span class="nav-link-text dropdown">Dan lain-lain</span> 
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="navLink" href="#">
              <div
                class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
              >
                <i class="fa fa-tags"></i>
              </div>
              <span class="nav-link-text" id="navLinkText">Dokumentasi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="navLink" href="#">
              <div
                class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
              >
                <i class="fa fa-file-text"></i>
              </div>
              <span class="nav-link-text" id="navLinkText">Dokumen</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="navLink" href="#">
              <div
                class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
              >
                <i class="fa fa-calendar"></i>
              </div>
              <span class="nav-link-text" id="navLinkText">Penjadwalan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="navLink" href="#">
              <div
                class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
              >
                <i class="fa fa-database"></i>
              </div>
              <span class="nav-link-text" id="navLinkText">Data Master</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
    <main
      class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps-3" id="mainContent"
    >
      <!-- Navbar -->
      <nav
        class="navbar navbar-main navbar-expand-lg px-0 mt-3 me-4"
        id="navbarBlur"
        navbar-scroll="true"
        style="
          background-color: #ffffff;
          border-radius: 25px;
          box-shadow: 0px 4px 10px 0px rgba(0, 0, 0, 0.25);
        "
      >
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb" class="d-flex ps-2 align-items-center gap-3">
            <i class="fa fa-bars" id="barsMenu" style="cursor: pointer;"></i>
            <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">Beranda</h6>
            <li class="nav-item px-2 d-flex align-items-center">
              <a
                href="javascript:;"
                class="nav-link text-body p-0"
                id="iconNavbarSidenav"
              >
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </nav>
          <div
            class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4"
            id="navbar"
          >
            <ul class="navbar-nav d-flex ms-auto justify-content-end">
              <li class="nav-item dropdown px-2 d-flex align-items-center">
                <a
                  href="javascript:;"
                  class="nav-link text-body p-0"
                  id="dropdownMenuButton"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                   <i class="fa fa-bell-o cursor-pointer"></i>
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                  aria-labelledby="dropdownMenuButton"
                >
                  <li class="mb-2">
                    <a
                      class="dropdown-item border-radius-md"
                      href="javascript:;"
                    >
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img
                            src="../assets/img/team-2.jpg"
                            class="avatar avatar-sm me-3"
                          />
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New message</span>
                            from Laur
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            13 minutes ago
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li class="mb-2">
                    <a
                      class="dropdown-item border-radius-md"
                      href="javascript:;"
                    >
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img
                            src="../assets/img/small-logos/logo-spotify.svg"
                            class="avatar avatar-sm bg-gradient-dark me-3"
                          />
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New album</span> by
                            Travis Scott
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            1 day
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a
                      class="dropdown-item border-radius-md"
                      href="javascript:;"
                    >
                      <div class="d-flex py-1">
                        <div
                          class="avatar avatar-sm bg-gradient-secondary me-3 my-auto"
                        >
                          <svg
                            width="12px"
                            height="12px"
                            viewBox="0 0 43 36"
                            version="1.1"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                          >
                            <title>credit-card</title>
                            <g
                              stroke="none"
                              stroke-width="1"
                              fill="none"
                              fill-rule="evenodd"
                            >
                              <g
                                transform="translate(-2169.000000, -745.000000)"
                                fill="#FFFFFF"
                                fill-rule="nonzero"
                              >
                                <g
                                  transform="translate(1716.000000, 291.000000)"
                                >
                                  <g
                                    transform="translate(453.000000, 454.000000)"
                                  >
                                    <path
                                      class="color-background"
                                      d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                      opacity="0.593633743"
                                    ></path>
                                    <path
                                      class="color-background"
                                      d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"
                                    ></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            Payment successfully completed
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            2 days
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown d-flex px-2 align-items-center">
                <a
                  href="javascript:;"
                  class="nav-link text-body p-0"
                  id="dropdownMenuButton"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="fa fa-user-o me-sm-1"></i>
                  <span class="d-sm-inline d-none me-sm-1"><b>Admin</b></span>
                  <i class="fa fa-caret-down"></i>
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                  aria-labelledby="dropdownMenuButton"
                >
                  <li class="mb-2">
                    <a
                      class="dropdown-item border-radius-md"
                      href="javascript:;"
                    >
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img
                            src="../assets/img/team-2.jpg"
                            class="avatar avatar-sm me-3"
                          />
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New message</span>
                            from Laur
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            13 minutes ago
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li class="mb-2">
                    <a
                      class="dropdown-item border-radius-md"
                      href="javascript:;"
                    >
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img
                            src="../assets/img/small-logos/logo-spotify.svg"
                            class="avatar avatar-sm bg-gradient-dark me-3"
                          />
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New album</span> by
                            Travis Scott
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            1 day
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a
                      class="dropdown-item border-radius-md"
                      href="javascript:;"
                    >
                      <div class="d-flex py-1">
                        <div
                          class="avatar avatar-sm bg-gradient-secondary me-3 my-auto"
                        >
                          <svg
                            width="12px"
                            height="12px"
                            viewBox="0 0 43 36"
                            version="1.1"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                          >
                            <title>credit-card</title>
                            <g
                              stroke="none"
                              stroke-width="1"
                              fill="none"
                              fill-rule="evenodd"
                            >
                              <g
                                transform="translate(-2169.000000, -745.000000)"
                                fill="#FFFFFF"
                                fill-rule="nonzero"
                              >
                                <g
                                  transform="translate(1716.000000, 291.000000)"
                                >
                                  <g
                                    transform="translate(453.000000, 454.000000)"
                                  >
                                    <path
                                      class="color-background"
                                      d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                      opacity="0.593633743"
                                    ></path>
                                    <path
                                      class="color-background"
                                      d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"
                                    ></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            Payment successfully completed
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            2 days
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="container-fluid py-4">
        <!-- Content -->
        @yield('content')
        <!-- End Content -->

        <footer class="footer pt-3">
          <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-center">
              <div class="mb-lg-0 mb-4">
                <div
                  class="copyright text-center text-sm text-muted text-lg-start"
                >
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with <i class="fa fa-heart"></i> by
                  <a
                    href="https://www.creative-tim.com"
                    class="font-weight-bold"
                    target="_blank"
                    >Badan Standardisasi Nasional</a
                  >
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </main>

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
    <script src="{{ asset('assets') }}/admin/js/script.js"></script>

</body>

</html>