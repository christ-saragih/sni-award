@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="content-profil py-5 mb-5">
    <div class="container mt-4">
        <form id="daftarForm" action="/peserta/pendaftaran/daftar" method="POST">
            @csrf
            <label class="fw-bold" style="font-size: 23px">
                @if($existingRegistration)
                    Sudah Terdaftar
                @else
                    Silahkan Klik Tombol di Bawah Untuk Mendaftar
                @endif
            </label>
            <br><br>
            @if($existingRegistration)
                <button type="button" disabled>Sudah Terdaftar</button>
            @else
                <button type="submit">Daftar</button>
            @endif
        </form>
    </div>
</div>
