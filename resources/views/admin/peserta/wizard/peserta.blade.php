<div class="d-flex align-items-center justify-content-between">
    <h3 class="mb-0" style="font-size: 150%; font-weight: bold;">Data Peserta Pendaftar</h3>
    <div class="dropdown container-dropdown-peserta">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Tahun
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">2024</a></li>
            <li><a class="dropdown-item" href="#">2023</a></li>
            <li><a class="dropdown-item" href="#">2022</a></li>
            <li><a class="dropdown-item" href="#">2021</a></li>
        </ul>
    </div>
</div>

<table class="table align-items-center mt-4 mb-0 text-center">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telfon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peserta as $peserta)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $peserta->nama }}</td>
                <td>{{ $peserta->email }}</td>
                {{-- <td>-</td> --}}
                <td>{{ 
                    $peserta->peserta_profil ? 
                        $peserta->peserta_profil->no_hp ? 
                            $peserta->peserta_profil->no_hp 
                            : '-'
                        : '-' 
                }}</td>
                <td>
                    <a href="/admin/peserta/{{ $peserta->id }}" class="btn" role="button">Detail</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>