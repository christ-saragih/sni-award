@extends('admin.layouts.master')
@section('content')
<style>
    .value{
        padding: 2px 5px;
        border: 1px solid lightgray;
        border-radius: 5px;
        background-color: #aaa;
    }
</style>
<main>
    <section class="card px-4 py-4">
        <div class="d-flex justify-content-between">
            <a href="/admin/internal/" class="btn">Kembali</a>
            <a href="/admin/internal/edit/{{ $internal->id }}" class="btn">Ubah</a>
        </div>

        <div class="d-flex gap-4">
            <span>Nama&emsp;:</span><span>{{ $internal->name }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>Email&emsp;:</span><span>{{ $internal->email }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>Peran&emsp;:</span><span>{{ $role }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>No. Telfon&emsp;:</span><span>{{ $internal->user_profil->no_hp }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>NPWP&emsp;:</span><span>{{ $internal->user_profil->npwp }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>No. Rekening&emsp;:</span><span>{{ $internal->user_profil->no_rekening }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>Bukti Anti Penyuapan&emsp;:</span><span><a href="{{ $internal->user_profil->url_anti_penyuapan }}" target="_blank">{{ $internal->user_profil->url_anti_penyuapan }}</a></span>
        </div>
    </section>
</main>
@endsection