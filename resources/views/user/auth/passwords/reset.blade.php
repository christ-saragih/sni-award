<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Reset Password</title>
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
    <body id="login">
        <main class="login-container">
            <div class="content-kiri"> 
                <img src="{{ asset('assets') }}/images/icon/Frame.svg" alt="" />
            </div>

            <div class="content-kanan" style="background-color: #2E3A66;">
                <img src="{{ asset('assets') }}/images/icon/User_circle.svg" alt="" />
                <h1>{{ __('Ganti Sandi') }}</h1>

                <div class="w-100">
                    <form method="POST" action="{{ route('user.reset_password', ['forgot_password_token' => $token,'email' => $email]) }}" class="w-100 d-flex flex-column align-items-center justify-content-center">
                        @method('PUT')
                        @csrf
                        <div class="w-100 d-flex flex-column">
                            <label for="password" class="w-fit my-2">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="w-100 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-100 d-flex flex-column">
                            <label for="password-confirm" class="w-fit my-2">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="w-100 form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="my-4">
                            <div class="button mb-3">
                                <button type="submit" class="btn" style="white-space: none; width: fit-content;">
                                    {{ __('Kirim Link Reset Password') }}
                                    {{-- {{ __('Masuk') }} --}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
