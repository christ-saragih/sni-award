@extends('admin.layouts.master')
@section('content')
<style>
    form input, form select {
        padding: 2px 5px;
        border-radius: 5px;
        border: 1px solid lightgray;
    }
    .data{
        padding: 2px 5px;
        border: 1px solid lightgray;
        border-radius: 5px;
        background-color: #efefef50;
    }
</style>
<main>
    {{-- <form class="card px-4 py-4" method="POST" action="/admin/peserta/edit/{{ $peserta->id }}"> --}}
    <form class="card px-4 py-4" method="POST" action="">
        @method('PUT')
        @csrf
        <div class="d-flex gap-4">
            <span>Nama&emsp;:</span><span>{{ $peserta->nama }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>Email&emsp;:</span><span>{{ $peserta->email }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>No. Telfon&emsp;:</span><span>{{ $peserta->peserta_profil->no_hp }}</span>
        </div>
        <div class="d-flex gap-4">
            {{-- <span>Kategori Organisasi&emsp;:</span><span>{{ $peserta->peserta_profil->kategori_organisasi->nama }}</span> --}}
        </div>
        <div class="d-flex gap-4">
            <span>Status&emsp;:</span><span>{{ $peserta->status }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>URL Legalitas Hukum Organisasi&emsp;:</span><span><a href="{{ $peserta->peserta_profil->url_legalitas_hukum_organisasi }}" target="_blank">{{ $peserta->peserta_profil->url_legalitas_hukum_organisasi }}</a></span>
        </div>
        <div class="d-flex gap-4">
            <span>URL SPPT SNI&emsp;:</span><span><a href="{{ $peserta->peserta_profil->url_sppt_sni }}" target="_blank">{{ $peserta->peserta_profil->url_sppt_sni }}</a></span>
        </div>
        <div class="d-flex gap-4">
            <span>URL SK Kemenkumham&emsp;:</span><span><a href="{{ $peserta->peserta_profil->url_sk_kemenkumham }}" target="_blank">{{ $peserta->peserta_profil->url_sk_kemenkumham }}</a></span>
        </div>
        <div class="d-flex gap-4">
            <span>URL Kewenangan Kebijakan&emsp;:</span><span><a href="{{ $peserta->peserta_profil->url_kewenangan_kebijakan }}" target="_blank">{{ $peserta->peserta_profil->url_kewenangan_kebijakan }}</a></span>
        </div>
        <div class="d-flex gap-4">
            <span>Jabatan Tertinggi&emsp;:</span><span>{{ $peserta->peserta_profil->jabatan_tertinggi }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>Website&emsp;:</span><span>{{ $peserta->peserta_profil->website }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>Tanggal Beroperasi&emsp;:</span><span>{{ $peserta->peserta_profil->tanggal_beroperasi }}</span>
        </div>
        <div class="d-flex gap-4">
            {{-- <span>Status Kepemilikan&emsp;:</span><span>{{ $peserta->peserta_profil->status_kepemilikan->nama }}</span> --}}
        </div>
        <div class="d-flex gap-4">
            <span>Jenis Produk&emsp;:</span><span>{{ $peserta->peserta_profil->jenis_produk }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>Deskripsi Produk&emsp;:</span><span>{{ $peserta->peserta_profil->deskripsi_produk }}</span>
        </div>
        <div class="d-flex gap-4">
            {{-- <span>Lembaga Sertifikasi&emsp;:</span><span>{{ $peserta->peserta_profil->lembaga_setifikasi->nama }}</span> --}}
        </div>
        <div class="d-flex gap-4">
            <span>Produk Export&emsp;:</span><span>{{ $peserta->peserta_profil->produk_export }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>Negara Tujuan Export&emsp;:</span><span>{{ $peserta->peserta_profil->negara_tujuan_ekspor }}</span>
        </div>
        {{-- <div class="d-flex gap-4">
            <span>Sektor kategori Organisasi&emsp;:</span><span>{{ $peserta->peserta_profil->sektor_kategori_organisasi->nama }}</span>
        </div> --}}
        <div class="d-flex gap-4">
            <span>Kekayaan Bersih&emsp;:</span><span>{{ $peserta->peserta_profil->kekayaan_bersih }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>Hasil Penjualan Tahunan&emsp;:</span><span>{{ $peserta->peserta_profil->hasil_penjualan_tahunan }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>Jenis Organisasi&emsp;:</span><span>{{ $peserta->peserta_profil->jenis_organisasi }}</span>
        </div>
        <div class="d-flex gap-4">
            <span>Kewenangan Kebijakan&emsp;:</span><span>{{ $peserta->peserta_profil->kewenangan_kebijakan }}</span>
        </div>
        
        <div class="d-flex justify-content-end gap-2">
            <a href="/admin/peserta/{{ $peserta->id }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>

    </form>
</main>
@endsection