<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin || SNI Award 2024</title>

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

    <!-- Select2 -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" /> --}}
    <!-- CSS Admin -->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/styles.css" />

</head>

<body style="background-color: #ECE4E4;">
    {{-- jquery CDN --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

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
            href="/"

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
            @if ($role == 'admin')
                @include('user.profil_layout.partials.admin')
            @elseif ($role == 'evaluator')
                @include('user.profil_layout.partials.evaluator')
            @elseif ($role == 'lead evaluator')
                @include('user.profil_layout.partials.lead_evaluator')
            @endif
        </div>
        </aside>
    <main
        class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps-3" id="mainContent"
        >
        <!-- Navbar -->
        <img src="" alt="">
        <nav
            class="navbar navbar-main navbar-expand px-0 mt-3 me-3"
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
            </nav>
            <div
                class="collapse navbar-collapse mt-sm-0 me-md-0 me-sm-4"
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
                            <h6 class="text-sm font-weight-normal mb-0">
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
                    <span class="d-sm-inline d-none me-sm-1"><b>{{ auth()->user()->name }}</b></span>
                    <i class="fa fa-caret-down"></i>
                    </a>
                    <ul
                    class="dropdown-menu dropdown-menu-end px-5 py-3 me-sm-n4 ms-5"
                    aria-labelledby="dropdownMenuButton"
                    >
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="">
                        <li class="mb-2 w-50">
                            <a
                            class="dropdown-item border-radius-md"
                            href="{{ route('user.profil.view') }}"
                            >
                                <div class="d-flex gap-4 align-items-center">
                                <i class="fa fa-user" style="width: 12%;"></i>
                                <h6 class="text-sm font-weight-normal mb-0">
                                    Profil
                                </h6>
                                </div>
                            </a>
                        </li>
                        <li class="w-50">
                            <a
                            class="dropdown-item border-radius-md"
                            href="{{ route('user.logout') }}"
                            >
                                <div class="d-flex gap-4 align-items-center">
                                <i class="fa fa-sign-out" style="width: 12%;"></i>
                                <h6 class="text-sm font-weight-normal mb-1">
                                    Keluar
                                </h6>
                                </div>
                            </a>
                        </li>
                        </div>
                    </div>
                    </ul>
                </li>
                </ul>
            </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="py-4 me-4">
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
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    By
                    <a
                        href="https://www.bsn.go.id/"
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
    <!-- Select2 -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets') }}/admin/js/script.js"></script>
    <script src="{{ asset('assets') }}/admin/js/app.js"></script>

    {{-- CK EDITOR --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    @yield('script')

</body>

</html>
