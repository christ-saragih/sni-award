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

        <div class="content-kanan py-5">
          <img src="{{ asset('assets') }}/images/icon/User_circle.svg" alt="" />
          <h1>SNI AWARD</h1>
          <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
              />
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label"
                >Password</label
              >
              <input
                type="password"
                class="form-control"
                id="exampleInputPassword1"
              />
            </div>
            <div class="form-text mb-3">Lupa Password?</div>
            <div class="button text-center mb-3">
              <button type="submit" class="btn">Masuk</button>
            </div>
            <div class="form-text text-center">
              Belum memiliki akun? <a href="">Daftar </a>
            </div>
          </form>
        </div>

      </div>
    </section>
  </body>
</html>
