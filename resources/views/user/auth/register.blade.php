<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Registrasi</title>
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
        <link rel="stylesheet" href="{{ asset('assets') }}/css/styles.css" />

        <!-- Josefin Sans Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
            rel="stylesheet"
        />

        <!-- icon -->
        <script src="https://unpkg.com/feather-icons"></script>

        <!-- My CSS -->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/styles.css" />

    </head>
    <style>
        #ps-8c,
        #ps-lc,
        #ps-uc,
        #ps-nc,
        #ps-sc {
            padding: 1px 3px;
            border-radius: 3px;
            background-color: #D12B2B;
        }
    </style>
    <body>
        <section id="register" style="background-color: #373F6B">

            <div class="content-kiri p-5">
                <div class="w-100 d-flex flex-column p-5" style="height: 530px; gap: 30%;background-color: white;border-radius: 30px;">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/icon/logo-bsn.svg') }}" alt="" style="height: 50px;">
                        <img src="{{ asset('assets/images/icon/logo-sniaward.svg') }}" alt="" style="height: 50px;">
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <h1 class="fw-bold text-center">Selamat Datang di<br><span style="color: #DCA958">Internal SNI AWARD</span></h1>
                        <div style="color: #9F9F9F">The National Quality Award of Indonesia sejak tahun</div>
                    </div>
                </div>
            </div>

            <div class="content-kanan" style="background-color: #DCA958;">
                <img src="{{ asset('assets') }}/images/icon/User_circle.svg" alt="" />
                <div class="text-white">Registrasi sebagai user</div>

                <form method="POST" action="{{ route('user.registrasi') }}" style="
                    padding: 20px;
                ">
                    @csrf
                    <div class="w-100">
                        <label for="name" class="col-form-label">{{ __('Nama Lengkap') }}</label>

                        <div class="">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="border-radius: 100px;">

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-100">
                        <label for="email" class="col-form-label">{{ __('Email') }}</label>

                        <div class="">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="border-radius: 100px;">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div style="
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        gap: 20px;
                        padding-bottom: 20px;
                    ">
                        <div class="w-100">
                            <label for="password" class="col-form-label">{{ __('Kata Sandi') }}</label>
            
                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="border-radius: 100px;" oninput="handleInputPassword(this)" onfocus="focusPassword()" onfocusout="focusOutPassword()">
            
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-100">
                            <label for="password-confirm" class="col-form-label">{{ __('Konfirmasi Kata Sandi') }}</label>
                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" style="border-radius: 100px;">
                            </div>
                        </div>
                    </div>

                    <div class="pb-2" id="password-rules" style="display: none;font-size: 14px;color:#eaeaea;">
                        <div><span id="ps-8c">&#x2716;</span>&emsp;Minimal 8 karakter</div>
                        <div><span id="ps-lc">&#x2716;</span>&emsp;Huruf kecil</div>
                        <div><span id="ps-uc">&#x2716;</span>&emsp;Huruf kapital</div>
                        <div><span id="ps-nc">&#x2716;</span>&emsp;Angka</div>
                        <div><span id="ps-sc">&#x2716;</span>&emsp;Karakter spesial (!, @, #, $, %, ...)</div>
                    </div>

                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                    
                    {{-- {{ dd(env('NOCAPTCHA_SITEKEY')) }} --}}
                    <div class="">
                        <div class="" style="
                            display: flex;
                            align-item: center;
                            justify-content: center;
                        ">
                            <button type="submit" style="
                                width: 50%;
                                border-radius: 100px;
                                padding: 5px 10%;    
                                border: none;
                                font-weight: 600;
                            ">
                                {{ __('Daftar') }}
                            </button>
                        </div>
                    </div>
                </form>
            
                <div class="form-text text-center">
                    Sudah memiliki akun? <a href="{{ route('user.login.view') }}">Masuk </a>
                </div>
                
            </div>

        </section>
    </body>
    
    <script>
        const handleInputPassword = (e) => {
            const uppercaseRegex = /[A-Z]/
            const lowercaseRegex = /[a-z]/
            const numericRegex = /[0-9]/
            const specialRegex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/

            const PasswordRules = [
                {name: '8C', rule: e.value.length >= 8, element: document.getElementById('ps-8c')},
                {name: 'UC', rule: uppercaseRegex.test(e.value), element: document.getElementById('ps-uc')},
                {name: 'LC', rule: lowercaseRegex.test(e.value), element: document.getElementById('ps-lc')},
                {name: 'NC', rule: numericRegex.test(e.value), element: document.getElementById('ps-nc')},
                {name: 'SC', rule: specialRegex.test(e.value), element: document.getElementById('ps-sc')},
            ]

            PasswordRules.forEach(item => {
                if (item.rule) {
                    item.element.innerHTML = '&#x2714;'
                    item.element.style.backgroundColor = '#47A15E'
                } else {
                    item.element.innerHTML = '&#x2716;'
                    item.element.style.backgroundColor = '#D12B2B'
                }
            });
        }
        const focusPassword = () => {
            const passwordRules = document.getElementById('password-rules')
            passwordRules.style.display = 'block'
        }
        const focusOutPassword = () => {
            const passwordRules = document.getElementById('password-rules')
            passwordRules.style.display = 'none'
        }
    </script>

</html>