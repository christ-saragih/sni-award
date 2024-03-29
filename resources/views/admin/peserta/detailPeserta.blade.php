@extends('admin.layouts.master')
@section('content')
<style>
    .value{
        padding: 2px 5px;
        border: 1px solid lightgray;
        border-radius: 5px;
        background-color: #aaa;
    }
    .row-data {
        width: 100%;
        display: flex;
        align-items: flex-start;
    }
    .head-data {
        width: 40%;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: space-between; 
    }
    .head-data::after {
        content: ':';
    }
    .body-data {
        width: 60%;
        padding: 0 0 0 20px;
    }
</style>
<main>
    <ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="/admin/peserta/{{ $peserta->id }}" class="nav-link {{ request()->query('tab')==''?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" role="tab" >Profil</a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="/admin/peserta/{{ $peserta->id }}?tab=dokumen" class="nav-link {{ request()->query('tab')=='dokumen'?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" role="tab" >Dokumen</a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="/admin/peserta/{{ $peserta->id }}?tab=kontak" class="nav-link {{ request()->query('tab')=='kontak'?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" role="tab" >Kontak</a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="/admin/peserta/{{ $peserta->id }}?tab=histori" class="nav-link {{ request()->query('tab')=='histori'?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" role="tab" >Histori</a>
        </li>
    </ul>
    <hr class="p-0">

    <div class="tab-content" id="tab-content">
        <section class="tab-pane {{ request()->query('tab')==''?'active':'' }} bg-light rounded-5 container-fluid px-5 py-5" id="peserta-tabpanel-0" role="tabpanel" aria-labelledby="peserta-tab-0">
            @include('admin.peserta.wizard.detail.profil')
        </section>
        <section class="tab-pane {{ request()->query('tab')=='dokumen'?'active':'' }} bg-light rounded-5 container-fluid px-5 py-5" id="peserta-tabpanel-0" role="tabpanel" aria-labelledby="peserta-tab-0">
            @include('admin.peserta.wizard.detail.dokumen')
        </section>
        <section class="tab-pane {{ request()->query('tab')=='kontak'?'active':'' }} bg-light rounded-5 container-fluid px-5 py-5" id="peserta-tabpanel-0" role="tabpanel" aria-labelledby="peserta-tab-0">
            @include('admin.peserta.wizard.detail.kontak')
        </section>
        <section class="tab-pane {{ request()->query('tab')=='histori'?'active':'' }} bg-light rounded-5 container-fluid px-5 py-5" id="peserta-tabpanel-0" role="tabpanel" aria-labelledby="peserta-tab-0">
            @include('admin.peserta.wizard.detail.histori')
        </section>
    </div>

</main>
@endsection