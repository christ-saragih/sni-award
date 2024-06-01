@extends('admin.layouts.master')
@section('content')

<main>
    <ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="/admin/peserta" class="nav-link {{ request()->query('tab')==''?'active':'' }} px-4" id="simple-tab-0" style="width: auto; pointer-events: none;" role="tab">Peserta</a>
        </li>
    </ul>
    <hr class="p-0">

    <div class="tab-content" id="tab-content">
        <section class="tab-pane {{ request()->query('tab')==''?'active':'' }} py-5" id="peserta-tabpanel-0" role="tabpanel" aria-labelledby="peserta-tab-0">
            @include('admin.peserta.wizard.peserta')
        </section>
    </div>

</main>
@endsection