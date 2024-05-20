@extends('peserta.layouts.master')

@section('content')
<style>
    .hide{
      display: none;
    }
  
    .nav-link.disabled {
      pointer-events: none;
      color: #999999 !important;
    }
</style>

<h3 class="my-4">Berikut panduan untuk mendaftar SNI Award 2024😉</h3>
<embed src="{{ asset('assets') }}/peserta/pdf-panduan-pendaftaran.pdf" type="application/pdf" width="100%" height="600px" />
@endsection('content')
