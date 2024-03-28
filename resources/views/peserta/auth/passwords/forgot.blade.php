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
        <div class="login-container">
            <div class="content-kiri">
                <img src="{{ asset('assets') }}/images/icon/Frame.svg" alt="" />
            </div>
            
            <div class="content-kanan">
                <div class="text-center w-100">
                    <img src="{{ asset('assets') }}/images/icon/User_circle.svg" alt="" />
                    <h1>{{ __('Lupa Sandi') }}</h1>

                    <div class="mt-4 w-100">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="/forgot-password" style="width: 100%">
                            @csrf

                            <div class="mb-5">
                                <div class="w-100 d-flex flex-column align-items-start">
                                    <label for="email" class="col-md-4 col-form-label" style="text-align: left; width:fit-content;">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="w-100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="button mb-3">
                                    <button type="submit" class="btn" style="white-space: none; width: fit-content;">
                                        {{ __('Kirim Link Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
