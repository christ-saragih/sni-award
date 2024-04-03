<div class="d-flex align-items-center justify-content-between">
    <h3 class="mb-0" style="font-size: 150%; font-weight: bold;">Data Evaluator</h3>
    <div class="dropdown container-dropdown-internal">
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

<table class="table align-items-center mt-4 mb-0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No. Telepon</th>
            <th>Jabatan</th>
            <th>Status Verifikasi</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($evaluator as $evaluator)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $evaluator->name }}</td>
                <td>{{ $evaluator->email }}</td>
                <td>{{ $evaluator->user_profil->no_hp }}</td>
                <td>{{ $evaluator->jenis_role?$evaluator->jenis_role->nama:'' }}</td>
                <td class="d-flex justify-content-center">
                    <div style="
                        width: fit-content;
                        padding: 1px 10px;
                        font-weight: bold;
                        color: white;
                        background-color: {{ $evaluator->verified_at ? '#009900' : '#dd0000' }};
                        border-radius: 5px;
                    ">
                        {{ $evaluator->verified_at ? 'Terverifikasi' : 'Belum diverifikasi' }}
                        </div>
                </td>
                {{-- <td>{{ $evaluator->user_profil->no_hp ? $evaluator->user_profil->no_hp : '-' }}</td> --}}
                {{-- <td>{{ $evaluator->user_profil->npwp ? $evaluator->user_profil->npwp : '-' }}</td> --}}
                <td class="text-center">
                    <a href="/admin/internal/{{ $evaluator->id }}" class="btn" role="button">Detail</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>