<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Register</title>
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
        <!-- Select2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
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
        {{-- jquery CDN --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <!-- Select2 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <section id="register">

            <div class="content-kiri">
            <img src="{{ asset('assets') }}/images/icon/Frame.svg" alt="" />
            </div>

            <div class="content-kanan">
            <h1 class="mt-3">Selamat Datang</h1>
            <p>Silakan buat akun dan lengkapi informasi di bawah ini.</p>
            <form method="POST" action="/registrasi" style="
                padding: 20px 30px;  
            ">
                @csrf
                <div class="mb-2">
                    <label for="name" class="col-form-label">{{ __('Nama Organisasi') }}</label>

                    <div class="">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="name" autofocus style="border-radius: 100px;">

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
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
                <div class="mb-2">
                    <label for="kategori" class="col-form-label">{{ __('Kategori') }}</label>

                    <div class="">
                        <select name="kategori_organisasi_id" id="kategori" class="form-select" style="width: 100%; padding: .375rem .75rem;">
                            <option value="" selected disabled>Pilih Kategori..</option>
                            @foreach ($kategori_organisasi as $ko)
                                <option value="{{ $ko->id }}">{{ $ko->nama }}</option>                        
                            @endforeach
                        </select>

                        @error('kategori_organisasi_id')
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
                    margin-bottom: 20px;
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
                {{-- display: none; --}}
                <div class="pb-2" id="password-rules" style="display: none;font-size: 14px;color:#eaeaea;">
                    <div><span id="ps-8c">&#x2716;</span>&emsp;Minimal 8 karakter</div>
                    <div><span id="ps-lc">&#x2716;</span>&emsp;Huruf kecil</div>
                    <div><span id="ps-uc">&#x2716;</span>&emsp;Huruf kapital</div>
                    <div><span id="ps-nc">&#x2716;</span>&emsp;Angka</div>
                    <div><span id="ps-sc">&#x2716;</span>&emsp;Karakter spesial (!, @, #, $, %, ...)</div>
                </div>
                
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}

                <div>
                    <div class="mb-2" style="
                    display: flex;
                    align-item: center;
                    justify-content: center;
                ">
                        <button type="submit" style="
                            border: none;
                            border-radius: 100px;
                            padding: 6px 80px;
                            color: #fff;
                            background-color: #DCA958;
                            font-weight: bold;
                        ">
                            {{ __('Daftar') }}
                        </button>
                    </div>
                </div>
                <div class="form-text text-center">
                    Sudah memiliki akun? <a href="/masuk">Masuk </a>
                </div>
            </form>

            </div>

        </section>

        <script>
            $(document).ready(()=>{
                $('#kategori').select2({
                    tags: true,
                });

            });

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
    </body>
</html>