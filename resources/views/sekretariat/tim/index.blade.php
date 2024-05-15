@extends('sekretariat.layouts.master')
@section('content')

<style>

    .data {
        font-size: 18px;
        padding: 10px 15px;
    }

    a.nonactive {
        font-weight: 600;
        background-color: white;
        color: #c17d2d;
        border-radius: 15px;
        border: 3.5px solid #c17d2d;
    }

    a.nonactive:hover {
        font-weight: 700;
        background-color: var(--primary-color);
        color: white;
        transition: all 0.3s ease;
    }

    .btn-buat-tim {
        padding: 10px 20px;
        background-color: #552525;
        color: white;
        font-weight: 600;
        border-radius: 15px;
        border: 3px solid #CC9305;
        text-decoration: none;
        transition: 0.3s ease-in-out;
    }
    .btn-buat-tim:hover {
        background-color: white;
        color: #552525;
        transition: 0.3s ease-in-out;
        padding: 11px 22px;
    }

</style>

<main>
    <hr class="p-0 mt-3">
    <div class="tab-pane">
        <div class="content-profil py-5 mb-5">
            <!-- a -->
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <h3 class="mb-0 pb-0" style="font-size: 150%; font-size: 24px; font-weight: bold; color: #000000;">Tim {{ $registrasi->stage->nama }}</h3>
                    <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
                </div>
                <p style="font-size: 18px; color: #9FAFBF;">Buat tim untuk penilaian {{ strtolower($registrasi->stage->nama) }} pada peserta</p>
            </div>

            <div class="container mt-4">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-xl-12" style="padding-inline: 0px;">
                        <div class="card" style="border-radius: 15px;">
                            <form action="" method="" class="card-body" style="padding-inline: 0px;">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-4">
                                        <h6 class="mb-0">Nama</h6>
                                    </div>
                                    <div class="col-md-8 ps-5 pe-5">
                                        <div class="data">:&emsp;{{ Auth::user()->name }}</div>
                                    </div>
                                </div>

                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4">
                                        <h6 class="mb-0">Tanggal Penilaian</h6>
                                    </div>
                                    <div class="col-md-8 ps-5 pe-5">
                                        <div class="data">:&emsp;{{ $tim ? $tim->tanggal : '-' }}</div>
                                    </div>
                                </div>
                            
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4">
                                        <h6 class="mb-0">Lead Evaluator</h6>
                                    </div>
                                    <div class="col-md-8 ps-5 pe-5">
                                        <div class="data">:&emsp;{{ $tim ? $tim->lead_evaluator->name : '-' }}</div>
                                    </div>
                                </div>
            
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4">
                                        <h6 class="mb-0">Evaluator</h6>
                                    </div>
                                    <div class="col-md-8 ps-5 pe-5">
                                        <div class="data">:&emsp;{{ $tim ? $tim->evaluator->name : '-' }}</div>
                                    </div>
                                </div>

                                @if (!$tim)
                                    <a href="{{ route('sekretariat.tim.tambah') }}" class="btn-buat-tim">Buat Tim</a>
                                @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection