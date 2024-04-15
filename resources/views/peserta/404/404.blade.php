@extends('peserta.layouts.master')
@section('content')
    <section style="
    width: 100%;
    height: 100%;
    padding: 1% 5%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
    ">
        <img src="{{ asset('assets/images/icon/Frame.svg') }}" alt="" style="width: 25%;">
        <h1>404</h1>
        <h2 style="padding: 0; margin: 0;">Oops! Halaman Tidak Ditemukan</h2>
    </section>
@endsection