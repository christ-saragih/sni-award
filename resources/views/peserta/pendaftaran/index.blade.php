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
<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link {{ request()->query('tab') == '' ? 'active' : ''}}" id="simple-tab-0" href="/peserta/pendaftaran" role="tab">Daftar</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->query('tab') == 'assessment' ? 'active' : ''}} {{ $existingRegistration === NULL ? 'disabled' : ''}}" id="simple-tab-1" href="/peserta/pendaftaran?tab=assessment" role="tab">Assessment</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->query('tab') == 'dokumen' ? 'active' : ''}} {{ $existingRegistration === NULL ? 'disabled' : ''}}" id="simple-tab-2" href="/peserta/pendaftaran?tab=dokumen" role="tab">Dokumen</a>
    </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
    <div class="tab-pane {{ request()->query('tab') == '' ? 'active' : 'hide'}}" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
        @include('peserta.pendaftaran.wizard.daftar')
    </div>
  </div>

  <!-- Assessment Section -->
  <div class="tab-pane {{ request()->query('tab') == 'assessment' ? 'active' : 'hide'}}" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
    {{-- @if ($assessment_jawaban != NULL)
      <label> Sudah Terisi</label>
    @endif --}}
    @include('peserta.pendaftaran.wizard.assessment')
  </div>
    
  <!-- Dokumen Section -->
  <div class="tab-pane {{ request()->query('tab') == 'dokumen' ? 'active' : 'hide'}}" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
    @include('peserta.pendaftaran.wizard.dokumen')
  </div>
@endsection('content')
