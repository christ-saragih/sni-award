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
</style>
<main>
    {{-- {{ dd(request()->id) }} --}}
    <ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ request()->query('tab') == '' ? 'active' : ''}}" id="simple-tab-0" href="{{ route('evaluator.lead_evaluator.profil.view', request()->registrasi_id) }}" role="tab">Profil</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ request()->query('tab') == 'dokumen' ? 'active' : ''}} " id="simple-tab-1" href="{{ route('evaluator.lead_evaluator.profil.view', ['registrasi_id' => request()->registrasi_id, 'tab' => 'dokumen']) }}" role="tab">Dokumen</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ request()->query('tab') == 'kontak' ? 'active' : ''}} " id="simple-tab-1" href="{{ route('evaluator.lead_evaluator.profil.view', ['registrasi_id' => request()->registrasi_id, 'tab' => 'kontak']) }}" role="tab">Kontak</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ request()->query('tab') == 'assessment' ? 'active' : ''}} " id="simple-tab-1" href="{{ route('evaluator.lead_evaluator.profil.view', ['registrasi_id' => request()->registrasi_id, 'tab' => 'assessment']) }}" role="tab">Assessment</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ request()->query('tab') == 'penilaian' ? 'active' : ''}} " id="simple-tab-1" href="{{ route('evaluator.lead_evaluator.profil.view', ['registrasi_id' => request()->registrasi_id, 'tab' => 'penilaian']) }}" role="tab">Penilaian</a>
        </li>
    </ul>
    <hr class="p-0">
    <div class="tab-content" id="tab-content">

        <div class="tab-pane {{ request()->query('tab') == '' ? 'active' : 'hide'}} rounded" role="tabpanel" id="eva-desk" aria-labelledby="eva-desk">
            @include('evaluator.lead_evaluator.wizard.profilProfil')
        </div>
        <!-- Assessment Section -->
        <div class="tab-pane {{ request()->query('tab') == 'dokumen'  ? 'active' : 'hide'}} rounded" role="tabpanel" id="eva-site" aria-labelledby="eva-site">
            @include('evaluator.lead_evaluator.wizard.profilDokumen')
        </div>
        <div class="tab-pane {{ request()->query('tab') == 'kontak'  ? 'active' : 'hide'}} rounded" role="tabpanel" id="eva-site" aria-labelledby="eva-site">
            @include('evaluator.lead_evaluator.wizard.profilKontak')
        </div>
        <div class="tab-pane {{ request()->query('tab') == 'assessment'  ? 'active' : 'hide'}} rounded" role="tabpanel" id="eva-site" aria-labelledby="eva-site">
            @include('evaluator.lead_evaluator.wizard.profilAssessment')
        </div>
        <div class="tab-pane {{ request()->query('tab') == 'penilaian'  ? 'active' : 'hide'}} rounded" role="tabpanel" id="eva-site" aria-labelledby="eva-site">
            @include('evaluator.lead_evaluator.wizard.profilPenilaian')
        </div>

    </div>
</main>
@endsection
