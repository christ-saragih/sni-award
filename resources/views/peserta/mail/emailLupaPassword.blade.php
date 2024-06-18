<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Konfirmasi untuk atur ulang sandi</title>
</head>
<body>
    <p>
        halo <b>{{ $details['name'] }}</b> !
    </p>
    <br>
    <center>
        <h3>Klik di bawah ini untuk atur ulang sandi: </h3>
        <a href="{{ $details['url'] }}" style="text-decoration: none; color: #fff; padding: 9px; background-color: #552525; font: bold; border-radius: 10px">Atur Ulang</a>
        <br><br><br>
        <p>
            Copy right @ {{ $details['tahun_sni'] }} | BSN SNI Award
        </p>
    </center>
</body>
</html>
