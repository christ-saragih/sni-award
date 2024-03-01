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
          <!-- <li class="nav-item">
            <a class="nav-link" href="../pages/sign-up.html">
              <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"
              >
                <svg
                  width="12px"
                  height="20px"
                  viewBox="0 0 40 40"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <title>spaceship</title>
                  <g
                    stroke="none"
                    stroke-width="1"
                    fill="none"
                    fill-rule="evenodd"
                  >
                    <g
                      transform="translate(-1720.000000, -592.000000)"
                      fill="#FFFFFF"
                      fill-rule="nonzero"
                    >
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(4.000000, 301.000000)">
                          <path
                            class="color-background"
                            d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"
                          ></path>
                          <path
                            class="color-background opacity-6"
                            d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"
                          ></path>
                          <path
                            class="color-background opacity-6"
                            d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"
                          ></path>
                          <path
                            class="color-background opacity-6"
                            d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"
                          ></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Sign Up</span>
            </a>
          </li> -->
        </ul>
      </div>
      <!-- <div class="sidenav-footer mx-3">
        <div
          class="card card-background shadow-none card-background-mask-secondary"
          id="sidenavCard"
        >
          <div
            class="full-background"
            style="
              background-image: url('../assets/img/curved-images/white-curved.jpg');
            "
          ></div>
          <div class="card-body text-start p-3 w-100">
            <div
              class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md"
            >
              <i
                class="ni ni-diamond text-dark text-gradient text-lg top-0"
                aria-hidden="true"
                id="sidenavCardIcon"
              ></i>
            </div>
            <div class="docs-info">
              <h6 class="text-white up mb-0">Need help?</h6>
              <p class="text-xs font-weight-bold">Please check our docs</p>
              <a
                href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard"
                target="_blank"
                class="btn btn-white btn-sm w-100 mb-0"
                >Documentation</a
              >
            </div>
          </div>
        </div>
        <a
          class="btn bg-gradient-primary mt-3 w-100"
          href="https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree"
          >Upgrade to pro</a
        >
      </div> -->
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
          <!-- searching -->
            <!-- <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group">
                <span class="input-group-text text-body"
                  ><i class="fa fa-search" aria-hidden="true"></i
                ></span>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Type here..."
                />
              </div>
            </div> -->
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
              <!-- <div class="col-lg-6">
                <ul
                  class="nav nav-footer justify-content-center justify-content-lg-end"
                >
                  <li class="nav-item">
                    <a
                      href="https://www.creative-tim.com"
                      class="nav-link text-muted"
                      target="_blank"
                      >Creative Tim</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      href="https://www.creative-tim.com/presentation"
                      class="nav-link text-muted"
                      target="_blank"
                      >About Us</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      href="https://www.creative-tim.com/blog"
                      class="nav-link text-muted"
                      target="_blank"
                      >Blog</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      href="https://www.creative-tim.com/license"
                      class="nav-link pe-0 text-muted"
                      target="_blank"
                      >License</a
                    >
                  </li>
                </ul>
              </div> -->
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