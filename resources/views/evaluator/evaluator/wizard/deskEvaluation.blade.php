<div class="content-profil p-5">
    <div class="d-flex align-items-center justify-content-end">
        <div class="dropdown container-dropdown-internal">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: fit-content;">
                Tahun
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($tahun_registrasi as $tahun)
                    <li><a class="dropdown-item" href="{{ route('evaluator.evaluator.view', [
                        'tahun' => $tahun
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
            {{-- {{ dd($desk_evaluation) }} --}}
            @foreach ($desk_evaluation as $key=>$desk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $desk->registrasi->peserta->nama }}</td>
                    <td>{{ $desk->registrasi->peserta->email }}</td>
                    <td>{{ $desk->registrasi->peserta->peserta_profil ? $desk->registrasi->peserta->peserta_profil->no_hp : '' }}</td>
                    <td class="d-flex align-items-center justify-content-center">
                        <a href="{{ route('evaluator.tim.view', Crypt::encryptString($desk->registrasi->id)) }}" class="px-2 py-1 rounded" style="color: white; background-color: #6C64CC;">
                            <i class="fa fa-users"></i>
                        </a>
                    </td>
                    <td>
                        {{-- {{ dd($desk->registrasi->registrasi_penilaian[count($desk->registrasi->registrasi_penilaian)-1]) }} --}}
                        {{-- {{ dd($desk->is_dinilai) }} --}}
                        {{-- {{dd($desk->registrasi->registrasi_penilaian->registrasi_id)}} --}}
                        @if ($desk->is_dinilai)
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
                                <li><a class="dropdown-item" href="{{ route('evaluator.evaluator.detail.view', Crypt::encryptString($desk->registrasi->id)) }}">Profil</a></li>
                                <li><a class="dropdown-item" href="#">Riwayat</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
