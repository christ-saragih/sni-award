<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
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
    <section id="login">
      <div class="login-container">

        <div class="content-kiri">
          <img src="{{ asset('assets') }}/images/icon/Frame.svg" alt="" />
        </div>

        <div class="content-kanan">
            <img src="{{ asset('assets') }}/images/icon/User_circle.svg" alt="" />
            <h1>SNI AWARD</h1>
            
            <form method="POST" action="/masuk">
              @csrf
              @if (session('error'))
                  <div class="alert alert-danger w-100" role="alert">
                    {{ session('error') }}
                  </div>
              @elseif (session('success'))
                  <div class="alert alert-success w-100" role="alert">
                    {{ session('success') }}
                  </div>
              @endif
              <div class="mb-3">
                  <label for="email" class="form-label ms-1">{{ __('Email') }}</label>

                  {{-- <div class="d-flex flex-column align-items-start"> --}}
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="exampleInputEmail1" aria-describedby="emailHelp">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  {{-- </div> --}}
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label ms-1">{{ __('Kata Sandi') }}</label>

                  <div>
                      <input id="exampleInputPassword1" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-text mt-0 ms-1">
                <a href="/forgot-password" class="text-decoration-none">Lupa Kata Sandi?</a>
              </div>
              <div class="mb-4">
                  <div class="mb-4">
                      @if (Route::has('password.request'))
                      <a class="" style="color: #ccc; font-size: 14px;" href="{{ route('password.request') }}">
                          {{ __('Lupa Password?') }}
                      </a>
                      @endif
                  </div>
                  <!-- <div class="form-check">
                  </div> -->
              <div class="mb-0 d-flex flex-column align-items-center justify-content-center">
                  <div class="button mb-2">
                      <button type="submit" class="btn">
                          {{ __('Masuk') }}
                      </button>
                  </div>
                  <div class="form-text text-center">
                      Belum memiliki akun? <a href="/registrasi">Daftar </a>
                  </div>
              </div>
            </form>

        </div>

      </div>
    </section>
  </body>
</html>

                    
