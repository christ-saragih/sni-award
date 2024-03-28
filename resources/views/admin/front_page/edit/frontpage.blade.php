@extends('admin.layouts.master')
@section('content')
<main>
  <style>
    .frontpage-input-text{
        display: flex;
        align-items:  flex-start;
        justify-content: space-between;
        margin-bottom: 30px;
    }
    .frontpage-input-text>input,
    .frontpage-input-text>textarea,
    .frontpage-input-text>div,
    .frontpage-input-text>select {
        width: 80%;
        border-radius: 10px;
        border: 1px solid gray;
        padding: 5px 10px;
    }
    .frontpage-input-text>label::after{
      content: " :";
    }
    .frontpage-input-text>p{
        width: 80%;
    }
    .frontpage-input-text>img{
        width: 250px;
        height: auto;
        border-radius: 0;
        border: none;
        pointer-events: none;
        user-select: none;
    }
    .frontpage-input-text>label{
        width: 20%;
        font-weight: bold;
    }
    span.label-span{
        padding: 8px 16px;
        height: 100%;
        color: black;
        background-color: #D7DAE3;
        border-radius: 10px 0 0 10px;
        border: 1px solid gray;
    }
    span.label-span-2{
        width: 100%;
        padding: 8px 16px;
        height: 100%;
        color: black;
        background-color: #D7DAE3;
        border-radius: 0 10px 10px 0;
        border: 1px solid gray;
    }
    .image-container{
        position: relative;
    }
    .image-container button{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: none;
      border-radius: 20px;
      background-color: #D12B2B80;
      opacity: 0;
    }
    .image-container button:hover{
      opacity: 1;
      border: none;
      color: white;
    }
    .pilihan-faq{
      position: absolute;
      top:100%;
      left: 0;
      display:none;
      background-color: white;
      width: 100%;
      border-radius: 5px;
      border: 1px solid gray;
    }
    .pilihan-faq form{
      width: 100%;
    }
    .pilihan-faq button{
      width: 100%;
      padding: 5px 20px;
      background-color: transparent;
      border:none;
      border-radius: 0;
      font-weight: normal;
      color: black;
      text-align: left;
    }
    .pilihan-faq button:hover{
      background-color: #aaa;
      border:none;
      border-radius: 5px;
      color: white;
    }
    @media screen and (max-width: 768px){
        .frontpage-input-text {
            flex-direction: column;
        }
        .frontpage-input-text>input, .frontpage-input-text>textarea, .frontpage-input-text>div, .frontpage-input-text>p {
            width: 100%;
        }
        .frontpage-input-text>label {
            width: 100%;
        }
    }
  </style>
  
  <ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
    @if (request()->query('tab') == '')
      <li class="nav-item" role="presentation">
        <div class="nav-link {{ (request()->query('tab') == '')?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" role="tab" >Halaman Depan</div>
      </li>
    @elseif (request()->query('tab') == 'faq')
      <li class="nav-item" role="presentation">
        <div class="nav-link {{ (request()->query('tab') == 'faq')?'active':'' }} px-4" id="simple-tab-1" style="width: auto;" role="tab" >FAQ</div>
      </li>
    @elseif (request()->query('tab') == 'dokumentasi')
      <li class="nav-item" role="presentation">
        <div class="nav-link {{ (request()->query('tab') == 'dokumentasi')?'active':'' }} px-4" id="simple-tab-2" style="width: auto;" role="tab">Dokumentasi</div>
      </li>
    @endif
  </ul>
  <hr class="p-0">
  
  <div class="tab-content" id="tab-content">
    <div class="tab-pane {{ (request()->query('tab') == '')?'active':'' }}" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
      <div class="content-profil py-5">
            <div class="container">
                @include('admin.front_page.edit.frontpage_edit')
            </div>
      </div>
    </div>
  
    <div class="tab-pane {{ (request()->query('tab') == 'faq')?'active':'' }}" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-0">
      <div class="content-profil py-5">
          <div class="container">
            @include('admin.front_page.edit.faq_edit')
          </div>
      </div>
    </div>
    
    <div class="tab-pane {{ (request()->query('tab') == 'dokumentasi')?'active':'' }}" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-0">
      <div class="content-profil py-5">
          <div class="container">
            @include('admin.front_page.edit.dokumentasi_edit')
          </div>
      </div>
    </div>
  </div>
  </div>
  
</main>
@endsection