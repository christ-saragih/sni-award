@extends('admin.layouts.master')
@section('content')
    <style>
        td>a {
            background-color: #E59B30 !important;
            color: white !important;
            border: none !important;
        }

        section {
            border-radius: 20px !important;
            padding-inline: 70px !important;
        }

        .container-dropdown-internal button.dropdown-toggle {
            background-color: #552525 !important;
            border-radius: 10px !important;
            color: white;
            font-weight: bold;
            font-size: 112.5%;
            padding-inline: 1rem;

        }

        .container-dropdown-internal ul.dropdown-menu {
            border: 2px solid #3b1919;
            border-radius: 10px;
            margin-left: 9px !important;
            min-width: 5.5rem !important;
        }

        .container-dropdown-internal ul.dropdown-menu.show {
            margin-top: 45px !important;
        }

        .container-dropdown-internal .dropdown-item {
            margin-inline: 0px !important;
            color: #231F20;
            font-family: "Arimo", sans-serif;
            font-size: 112.5%;
        }

        .container-dropdown-internal .dropdown-item:hover {
            background-color: transparent;
        }
    </style>
    <main>
        <ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ request()->query('tab')=='' ? 'active' : '' }}" id="evaluator-tab-0" href="/admin/internal" role="tab">Evaluator</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ request()->query('tab')=='lead_evaluator' ? 'active' : '' }}" id="lead-evaluator-tab-1" href="/admin/internal?tab=lead_evaluator" role="tab">Lead Evaluator</a>
            </li>
        </ul>
        <hr class="p-0">
        <div class="tab-content" id="tab-content">
            <section class="tab-pane {{ request()->query('tab')=='' ? 'active' : '' }} bg-light container-fluid py-5" id="evaluator-tabpanel-0" role="tabpanel" aria-labelledby="evaluator-tab-0">
                @include('admin.internal.wizard.evaluator')
            </section>

            <section class="tab-pane {{ request()->query('tab')=='lead_evaluator' ? 'active' : '' }} bg-light container-fluid py-5" id="lead-evaluator-tabpanel-0" role="tabpanel" aria-labelledby="lead-evaluator-tab-0">
                @include('admin.internal.wizard.leadEvaluator')
            </section>
        </div>
        
    </main>
@endsection