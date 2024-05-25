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
        <ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
            <li class="nav-item" role="presentation">
            <a class="nav-link {{ request()->query('tab') == '' ? 'active' : ''}}" id="simple-tab-0" href="{{ route('evaluator.evaluator.view') }}" role="tab">Desk Evaluation</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ request()->query('tab') == 'site-evaluation' ? 'active' : ''}} " id="simple-tab-1" href="{{ route('evaluator.evaluator.view', ['tab' => 'site-evaluation']) }}" role="tab">Site Evaluation</a>
            </li>
        </ul>
        <hr class="p-0">
        <div class="tab-content" id="tab-content">

            <div class="tab-pane {{ request()->query('tab') == '' ? 'active' : 'hide'}}" role="tabpanel" id="eva-desk" aria-labelledby="eva-desk">
                @include('evaluator.evaluator.wizard.deskEvaluation')
            </div>
            <!-- Assessment Section -->
            <div class="tab-pane {{ request()->query('tab') == 'site-evaluation'  ? 'active' : 'hide'}}" role="tabpanel" id="eva-site" aria-labelledby="eva-site">
                @include('evaluator.evaluator.wizard.siteEvaluation')
            </div>

        </div>
    </main>
@endsection
