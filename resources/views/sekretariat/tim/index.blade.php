@extends('sekretariat.layouts.master')
@section('content')

<style>

    .data {
        font-size: 18px;
        padding: 10px 15px;
    }

    .profil-image-container {
        width: 83px;
        height: 83px;
        border-radius: 50%;
        overflow: hidden;
    }
    .profil-image {
        width: 100%;
        height: 100%;
        object-fit: cover !important;
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

                <!-- <p style="font-size: 18px; color: #9FAFBF;">Buat tim untuk penilaian {{ strtolower($registrasi->stage->nama) }} pada peserta</p> -->
            </div>

            <div class="d-flex justify-content-end mt-4">
                @if (!$tim)
                    <a href="{{ route('sekretariat.tim.tambah') }}" class="btn px-3" style="background-color: #E59B30; color: white; font-weight: bold; border-radius: 15px;">Buat Tim</a>
                @endif
            </div>

            <div class="container my-5">
                <div class="d-flex justify-content-between">
                    <a href="" class="d-flex flex-column align-items-center justify-content-center py-3" style="width: 30%; border: 1px solid #F7C35F; border-radius: 20px; box-shadow: 0px 4px 4px 0px rgba(159,175,191,0.9); color: black; text-decoration: none;">
                        <div class="profil-image-container mb-2">
                            <img src="{{ asset('assets') }}/images/foto-peserta.jpg" alt="Foto Profil Sekretariat" class="profil-image">
                        </div>
                        <h4 class="mb-1" style="font-size: 18px; font-weight: bold; margin: 0px;">Sekretariat</h4>
                        <p style="font-size: 18px; margin: 0px;">{{ Auth::user()->name }}</p>
                    </a>

                    <a href="" class="d-flex flex-column align-items-center justify-content-center py-3" style="width: 30%; border: 1px solid #F7C35F; border-radius: 20px; box-shadow: 0px 4px 4px 0px rgba(159,175,191,0.9); color: black; text-decoration: none;">
                        <div class="profil-image-container mb-2">
                            <img src="{{ asset('assets') }}/images/foto-peserta.jpg" alt="Foto Profil Sekretariat" class="profil-image">
                        </div>
                        <h4 class="mb-1" style="font-size: 18px; font-weight: bold; margin: 0px;">Lead Evaluator</h4>
                        <p style="font-size: 18px; margin: 0px;">{{ $tim ? $tim->lead_evaluator->name : '-' }}</p>
                    </a>

                    <a href="" class="d-flex flex-column align-items-center justify-content-center py-3" style="width: 30%; border: 1px solid #F7C35F; border-radius: 20px; box-shadow: 0px 4px 4px 0px rgba(159,175,191,0.9); color: black; text-decoration: none;">
                        <div class="profil-image-container mb-2">
                            <img src="{{ asset('assets') }}/images/foto-peserta.jpg" alt="Foto Profil Sekretariat" class="profil-image">
                        </div>
                        <h4 class="mb-1" style="font-size: 18px; font-weight: bold; margin: 0px;">Evaluator</h4>
                        <p style="font-size: 18px; margin: 0px;">{{ $tim ? $tim->evaluator->name : '-' }}</p>
                    </a>
                </div>
            </div>

            <!-- GET TANGGAL PENILAIAN -->
            <!-- <div class="data">:&emsp;{{ $tim ? $tim->tanggal : '-' }}</div> -->

        </div>
    </div>
</main>
@endsection