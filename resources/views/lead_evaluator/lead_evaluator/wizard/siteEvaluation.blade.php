<div class="d-flex align-items-center justify-content-end">
    <div class="dropdown container-dropdown-internal">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Tahun
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @foreach ($tahun_registrasi as $tahun)
                <li><a class="dropdown-item" href="{{ route('lead_evaluator.lead_evaluator.view', [
                    'tab' => 'site-evaluation',
                    'tahun' => $tahun,
                ]) }}">{{ $tahun }}</a></li>
            @endforeach
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
        @foreach ($site_evaluation as $key=>$site)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $site->registrasi->peserta->nama }}</td>
                <td>{{ $site->registrasi->peserta->email }}</td>
                <td>{{ $site->registrasi->peserta->peserta_profil ? $site->registrasi->peserta->peserta_profil->no_hp : '' }}</td>
                <td class="d-flex align-items-center justify-content-center">
                    <a href="{{ route('lead_evaluator.tim.view', Crypt::encryptString($site->registrasi->id)) }}" class="px-2 py-1 rounded" style="color: white; background-color: #6C64CC;">
                        <i class="fa fa-users"></i>
                    </a>
                </td>
                <td>
                    @if ($penilaian_evaluator)
                        <div class="px-1 py-1 text-center text-white rounded" style="background-color: #47A15E;">Sudah Dinilai</div>
                    @else
                        <div class="px-1 py-1 text-center text-white rounded" style="background-color: #D12B2B;">Belum Dinilai</div>
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
                            <li><a class="dropdown-item" href="{{ route('lead_evaluator.lead_evaluator.detail.view', Crypt::encryptString($site->registrasi->id)) }}">Profil</a></li>
                            <li><a class="dropdown-item" href="#">Riwayat</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
