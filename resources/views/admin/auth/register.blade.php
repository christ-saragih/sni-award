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
  <body>
    <section id="register">

        <div class="content-kiri">
          <img src="{{ asset('assets') }}/images/icon/Frame.svg" alt="" />
        </div>

        <div class="content-kanan" style="background-color: #2E3A66;">
          <img src="{{ asset('assets') }}/images/icon/User_circle.svg" alt="" />
          <h1>SNI AWARD</h1>

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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="border-radius: 100px;">
    
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
                    ">
                        {{ __('Daftar') }}
                    </button>
                </div>
            </div>
        </form>

        </div>

    </section>
  </body>
</html>