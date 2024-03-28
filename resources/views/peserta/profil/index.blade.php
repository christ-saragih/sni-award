@extends('peserta.layouts.master')

@section('content')
<style>
  .data{
        padding: 10px 15px;
        border: 1px solid lightgray;
        border-radius: 15px;
        background-color: #aaaaaa20;
        font-size: 18px;
    }
    .hide{
      display: none;
    }
    .active{
      display: block;
    }
</style>
<main class="container">
  <ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link {{request()->query('tab')=='' ? 'active' : ''}}" id="simple-tab-0"  href="/peserta/profil" role="tab" >Profil</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link {{request()->query('tab')=='dokumen' ? 'active' : ''}}" id="simple-tab-1"  href="/peserta/profil?tab=dokumen" role="tab" >Dokumen</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link {{request()->query('tab')=='kontak' ? 'active' : ''}}" id="simple-tab-2"  href="/peserta/profil?tab=kontak" role="tab" >Kontak</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link {{request()->query('tab')=='ubah_kata_sandi' ? 'active' : ''}}" id="simple-tab-3"  href="/peserta/profil?tab=ubah_kata_sandi" role="tab" >Ubah Kata Sandi</a>
    </li>
  </ul>
  <hr class="p-0">
  
    <div class="tab-content" id="tab-content">
        <!-- Profil start -->
        <div class="tab-pane {{request()->query('tab')=='' ? 'active' : 'hide'}}" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
          @include('Peserta.profil.wizard.profil')
        </div>
        <!-- Profil end -->

        <!-- Dokumen start -->
        <div class="tab-pane {{request()->query('tab')=='dokumen' ? 'active' : 'hide'}}" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">        
          @include('Peserta.profil.wizard.dokumen')
        </div>
        <!-- Dokumen end -->

        <!-- Kontak start -->
        <div class="tab-pane {{request()->query('tab')=='kontak' ? 'active' : 'hide'}}" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
          @include('Peserta.profil.wizard.kontak')
        </div>
        <!-- Kontak end -->

        <!-- Ubah password start -->
        <div class="tab-pane {{request()->query('tab')=='ubah_kata_sandi'? 'active' : 'hide'}}" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
           @include('Peserta.profil.wizard.ubahsandi')
        </div>
        <!-- Ubah password end -->

    </div>
</main>
@endsection
