<style>
    button.btn-daftar-sekarang:hover {
        color: white !important;
        transition: none !important;
    }
</style>

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
    <div class="container" style="margin-block: 100px;">
        <form id="daftarForm" class="d-flex flex-column align-items-center" action="/peserta/pendaftaran/daftar" method="POST">
            @csrf
            <label class="text-center">
                @if($existingRegistration)
                    <h2 style="font-family: 'Josefin Sans', sans-serif; font-weight: bold; font-size: 225%; color: #2B2B28;">Selamat Anda Sudah Terdaftar</h2>
                    <p class="mb-4" style="font-size: 100%; color: #2B2B28;">Jangan lupa mengerjakan Assesment dan melengkapi dokumen!</p>
                @else
                    <h2 style="font-family: 'Josefin Sans', sans-serif; font-weight: bold; font-size: 225%; color: #2B2B28;">Silakan Daftar Event SNI Award 2024</h2>
                    <p class="mb-4" style="font-size: 100%; color: #2B2B28;">Yuk, saatnya melakukan pendaftaran sebelum tanggal 20 Februari 2024</p>
                @endif
            </label>
            <!-- <p>test</p> -->

            @if($existingRegistration)
                <button type="submit" disabled class="px-4 py-2" style="border: initial; border-radius: 15px; width: initial; background-color: #47A15E; color: white;">Sudah Terdaftar</button>
            @else
                <!-- <button class="btn">Test</button> -->
                <button type="submit" class="btn-daftar-sekarang px-4 py-2" style="border: initial; border-radius: 15px; width: initial; background-color: #E1A600;">Daftar Sekarang</button>
            @endif
        </form>
    </div>
</div>
