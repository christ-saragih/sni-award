<style>
    button.dropdown-toggle {
        border: none;
        border-radius: 10px;
    }

    button.dropdown-toggle:hover {
        color: white;
        border: none;
        border-radius: 10px;
    }

    button.dropdown-toggle:active {
        color: white !important;
    }

    button#dropdownMenuButton1 {
        background-color: #C17D2D;
    }

    button#dropdownMenuButton2 {
        background-color: #552525;
    }
</style>

<div class="d-flex align-items-center gap-2 justify-content-end">
    <div class="dropdown container-dropdown-internal">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Stage
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Desk Evaluation</a></li>
            <li><a class="dropdown-item" href="#">Site Evaluation</a></li>
        </ul>
    </div>
    <div class="dropdown container-dropdown-internal">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            Tahun
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="width: auto;">
            <li><a class="dropdown-item" href="#">2024</a></li>
            <li><a class="dropdown-item" href="#">2023</a></li>
            <li><a class="dropdown-item" href="#">2022</a></li>
            <li><a class="dropdown-item" href="#">2021</a></li>
        </ul>
    </div>
</div>

<table class="table align-items-center mt-4 mb-0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No. Telepon</th>
            <th>Tim Penilai</th>
            <th class="text-center">Status Penilaian</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        {{-- {{ dd($registrasi[1]->registrasi_penilaian) }} --}}
        @foreach ($registrasi as $key=>$reg)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $reg->peserta->nama }}</td>
                <td>{{ $reg->peserta->email }}</td>
                <td>{{ $reg->peserta->peserta_profil ? $reg->peserta->peserta_profil->no_hp : '' }}</td>
                <td class="d-flex align-items-center justify-content-center">
                    <a href="{{ route('sekretariat.tim.view') }}" class="px-2 py-1" style="color: white; background-color: #6C64CC; border-radius: 10px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Buat tim">
                        <i class="fa fa-user-plus"></i>
                    </a>
                </td>
                <td>
                    @if (count($reg->registrasi_penilaian) > 0)
                        <div class="px-1 py-1 text-center text-white" style="border-radius: 15px; font-weight: bold; background-color: #47A15E;">Sudah Dinilai</div>
                    @else
                        <div class="px-1 py-1 text-center text-white" style="border-radius: 15px; font-weight: bold; background-color: #D12B2B;">Belum Dinilai</div>
                    @endif
                </td>
                <td class="text-center">
                    <div class="dropdown">
                        <button 
                            type="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false"
                            class="btn dropdown-toggle" 
                            style="
                                text-decoration: none;
                                padding: 5px 10px;
                                border:none;
                                background-color:#E59B30;
                                border-radius:10px;
                            " 
                        >Detail</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('sekretariat.peserta.profil.view', Crypt::encryptString($reg->id)) }}">Profil</a></li>
                            <li><a class="dropdown-item" href="#">Riwayat</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>