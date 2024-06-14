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
            <a href="/admin/peserta/{{ Crypt::encryptString($peserta->id) }}" class="nav-link {{ request()->query('tab')==''?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" role="tab" >Profil</a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="/admin/peserta/{{ Crypt::encryptString($peserta->id) }}?tab=dokumen" class="nav-link {{ request()->query('tab')=='dokumen'?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" role="tab" >Dokumen</a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="/admin/peserta/{{ Crypt::encryptString($peserta->id) }}?tab=kontak" class="nav-link {{ request()->query('tab')=='kontak'?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" role="tab" >Kontak</a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="/admin/peserta/{{ Crypt::encryptString($peserta->id) }}?tab=riwayat" class="nav-link {{ request()->query('tab')=='riwayat'?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" role="tab" >Riwayat</a>
        </li>
    </ul>
    <hr class="p-0">

    {{-- modal verifikasi peserta --}}
    <div class="modal fade" id="verifikasi_peserta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                Pastikan Anda telah membaca seluruh data peserta! <br>
                Konfirmasi dan verifikasi peserta <b>{{ $peserta->nama }}</b> 
            </div>
            <div class="modal-footer d-flex align-items-center justify-content-end gap-3">
                <button type="submit" class="btn-ya" onclick="handleVerifPeserta()">Ya</button>
                <button type="button" class="btn-no" data-bs-dismiss="modal">Tidak</button>
            </div>
            </div>
        </div>
    </div>
    {{-- end modal verifikasi peserta --}}

    <div class="tab-content" id="tab-content">
        <section class="tab-pane {{ request()->query('tab')==''?'active':'' }} py-5" id="peserta-tabpanel-0" role="tabpanel" aria-labelledby="peserta-tab-0">
            @include('admin.peserta.wizard.detail.profil')
        </section>
        <section class="tab-pane {{ request()->query('tab')=='dokumen'?'active':'' }} py-5" id="peserta-tabpanel-0" role="tabpanel" aria-labelledby="peserta-tab-0">
            @include('admin.peserta.wizard.detail.dokumen')
        </section>
        <section class="tab-pane {{ request()->query('tab')=='kontak'?'active':'' }} py-5" id="peserta-tabpanel-0" role="tabpanel" aria-labelledby="peserta-tab-0">
            @include('admin.peserta.wizard.detail.kontak')
        </section>
        <section class="tab-pane {{ request()->query('tab')=='riwayat'?'active':'' }} py-5" id="peserta-tabpanel-0" role="tabpanel" aria-labelledby="peserta-tab-0">
            @include('admin.peserta.wizard.detail.riwayat')
        </section>
    </div>

</main>
@endsection