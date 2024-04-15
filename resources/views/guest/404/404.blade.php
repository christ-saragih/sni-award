<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Tidak Ditemukan</title>
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

    <!-- icon -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://unpkg.com/feather-icons"></script>


    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.theme.default.min.css" />


    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/styles.css" />
</head>
<body>
    <main style="
        width: 100dvw;
        height: 100dvh;
        padding: 1% 5%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background-color: #ECE4E4;
    ">
        <img src="{{ asset('assets/images/icon/Frame.svg') }}" alt="" style="width: 25%;">
        <h1>404</h1>
        <h2 style="padding: 0; margin: 0;">Oops! Halaman Tidak Ditemukan</h2>
    </main>
</body>
</html>