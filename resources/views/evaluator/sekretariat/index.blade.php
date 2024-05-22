@extends('evaluator.layouts.master')
@section('content')
    <style>
        .hide{
            display: none;
        }

        .active {
            display: block;
        }
        
        .nav-link.disabled {
            pointer-events: none;
            color: #999999 !important;
        }
        button.btn {   
            font-size: 100%;
            font-weight: 700;
            background-color: #552525;
            color: white;
            border-radius: 15px;
            border: 3px solid #c17d2d;
        }
        button.btn:hover { 
            font-weight: 600;
            background-color: white;
            color: #c17d2d;
            border-radius: 15px;
            border: 3.5px solid #c17d2d;
        }
        button.noneactive {
            font-weight: 600;
            background-color: white;
            color: #c17d2d;
            border-radius: 15px;
            border: 3.5px solid #c17d2d;
        }
        button.noneactive:hover {
            font-weight: 700;
            background-color: var(--primary-color);
            color: white;
            transition: all 0.3s ease;
        }
        button.dropdown-toggle {
            width: fit-content;
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
    <main>
        <ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
            <li class="nav-item" role="presentation">
            <a class="nav-link text-center {{ request()->query('tab') == '' ? 'active' : ''}}" id="simple-tab-0" href="" role="tab" style="white-space: nowrap; width: fit-content;">Penilaian Peserta</a>
            </li>
        </ul>
        <hr class="p-0">
        <div class="tab-content" id="tab-content">
            <div class="tab-pane {{ request()->query('tab') == '' ? 'active' : 'hide'}}" role="tabpanel" id="sekre-desk" aria-labelledby="sekre-desk">
                <div class="content-profil p-5">
                    
                    <div class="d-flex align-items-center gap-2 justify-content-end">
                        <div class="dropdown container-dropdown-internal">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Stage
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach ($stage as $st)
                                    <li><a class="dropdown-item" href="{{ route('evaluator.sekretariat.view', [
                                        'stage' => $st->id,
                                        'tahun' => request()->query('tahun'),
                                    ]) }}">{{ $st->nama }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="dropdown container-dropdown-internal">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                Tahun
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="width: auto;">
                                @foreach ($tahun_registrasi as $tahun)
                                    <li><a class="dropdown-item" href="{{ route('evaluator.sekretariat.view', [
                                        'stage' => request()->query('stage'),
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
                                @foreach ($registrasi as $reg)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $reg->peserta->nama }}</td>
                                        <td>{{ $reg->peserta->email }}</td>
                                        <td>{{ $reg->peserta->peserta_profil->no_hp }}</td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a href="" class="px-2 py-1" style="color: white; background-color: #6C64CC; border-radius: 10px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Buat tim">
                                                <i class="fa fa-user-plus"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="px-1 py-1 text-center text-white" style="border-radius: 15px; font-weight: bold; background-color: #47A15E;">Sudah Dinilai</div>
                                            <!-- <div class="px-1 py-1 text-center text-white" style="border-radius: 15px; font-weight: bold; background-color: #D12B2B;">Belum Dinilai</div> -->
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
                                                    <li><a class="dropdown-item" href="{{ route('evaluator.sekretariat.detail.view', Crypt::encryptstring($reg->id)) }}">Profil</a></li>
                                                    
                                                    <li><a class="dropdown-item" href="">Riwayat</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </main>
@endsection