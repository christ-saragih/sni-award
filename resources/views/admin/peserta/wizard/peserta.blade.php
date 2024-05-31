<div class="d-flex justify-content-between">
    <h3>Data Peserta Pendaftar</h3>
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
            <th>Nama Organisasi</th>
            <th>Email</th>
            <th>No. Telepon</th>
            <th>Status Verifikasi</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peserta as $peserta)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $peserta->nama }}</td>
                <td>{{ $peserta->email }}</td>
                <td>{{ 
                    $peserta->peserta_profil ? 
                    $peserta->peserta_profil->no_hp ? 
                    $peserta->peserta_profil->no_hp 
                    : '-'
                    : '-' 
                }}</td>
                <td class="text-center">
                    <div style="
                        width: 100%;
                        padding: 6px;
                        font-weight: bold;
                        color: white;
                        background-color: {{ $peserta->verified_at ? '#78A55A' : '#FF0101' }};
                        border-radius: 15px;
                    ">
                        {{ $peserta->verified_at ? 'Diverifikasi' : 'Belum diverifikasi' }}
                        </div>
                </td>

                <td>
                    <a href="/admin/peserta/{{ Crypt::encryptString($peserta->id) }}" class="btn btn-detail" role="button">Detail</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>