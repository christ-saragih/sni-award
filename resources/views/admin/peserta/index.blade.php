@extends('admin.layouts.master')
@section('content')
<style>
    td>a {
        background-color: #E59B30 !important;
        color: black !important;
        border: none !important;
    }
    td>a:hover{
        color: white !important;
    }
    .container-dropdown-peserta button.dropdown-toggle {
        background-color: #552525 !important;
        border-radius: 10px !important;
        color: white;
        font-weight: bold;
        font-size: 112.5%;
        padding-inline: 1rem;

    }
    .container-dropdown-peserta ul.dropdown-menu {
        border: 2px solid #3b1919;
        border-radius: 10px;
        margin-left: 9px !important;
        min-width: 5.5rem !important;
    }
    .container-dropdown-peserta ul.dropdown-menu.show {
        margin-top: 45px !important;
    }
    .container-dropdown-peserta .dropdown-item {
        margin-inline: 0px !important;
        color: #231F20;
        font-family: "Arimo", sans-serif;
        font-size: 112.5%;
    }
    .container-dropdown-peserta .dropdown-item:hover {
        background-color: transparent;
    }
</style>
<main>
    <ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="/admin/peserta" class="nav-link {{ request()->query('tab')==''?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" role="tab" >Peserta</a>
        </li>
    </ul>
    <hr class="p-0">

    <div class="tab-content" id="tab-content">
        <section class="tab-pane {{ request()->query('tab')==''?'active':'' }} bg-light rounded-5 container-fluid px-5 py-5" id="peserta-tabpanel-0" role="tabpanel" aria-labelledby="peserta-tab-0">
            @include('admin.peserta.wizard.peserta')
        </section>
    </div>

</main>
@endsection