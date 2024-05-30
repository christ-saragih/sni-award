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
        width: 70%;
        border-radius: 10px;
        border: 1px solid gray;
        padding: 6px 16px;
    }
    .frontpage-input-text>p{
        width: 70%;
        padding: 6px 16px;
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
        padding-block: 6px;
        width: 30%;
        font-weight: bold;
        margin-left: 30px;
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
    .image-container>button{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 20px;
        background-color: rgba(126, 126, 126, 50%);
        opacity: 0;
    }
    .image-container>button:hover{
        opacity: 1;
        border: none;
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
        <!-- Status Kepemilikan Section -->
<!-- pop up tambah -->
  <div class="modal fade" id="tambahStatusKepemilikan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="border: none;">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Status Kepemilikan</h1>
        </div>
        <div class="modal-body" style="border: none;">
          <form action="" class="pb-0 mb-0">
            <div class="d-flex flex-column gap-2">
                <h6 class="ms-1 mb-0">Status Kepemilikan</h6>
                <input type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Status Kepemilikan" style="font-size: 100%;"/>
            </div>
          </form>
        </div>
        <div class="modal-footer gap-2" style="border: none;">
          <button class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
          <button class="btn" data-bs-toggle="modal" >Simpan</button>
        </div>
      </div>
    </div>
  </div>
  
    <ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == '')?'active':'' }} px-4" id="simple-tab-0" style="width: auto;" href="/admin/frontpage" role="tab" >Beranda</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == 'faq')?'active':'' }} px-4" id="simple-tab-1" style="width: auto;" href="/admin/frontpage?tab=faq" role="tab" >FAQ</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link {{ (request()->query('tab') == 'dokumentasi')?'active':'' }} px-4" id="simple-tab-2" style="width: auto;" href="/admin/frontpage?tab=dokumentasi" role="tab">Dokumentasi</a>
      </li>
    </ul>
    <hr class="p-0">

  <!-- Status Kepemilikan Section -->
    <div class="tab-content" id="tab-content">
      <div class="tab-pane {{ (request()->query('tab') == '')?'active':'' }}" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
        <div class="content-profil py-5">
              <div class="container">
                  @include('admin.front_page.frontpage_edit')
              </div>
        </div>
      </div>

      <div class="tab-pane {{ (request()->query('tab') == 'faq')?'active':'' }}" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-0">
        <div class="content-profil py-5">
            <div class="container">
              @include('admin.front_page.faq_edit')
            </div>
        </div>
      </div>
      
      <div class="tab-pane {{ (request()->query('tab') == 'dokumentasi')?'active':'' }}" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-0">
        <div class="content-profil py-5">
            <div class="container">
              @include('admin.front_page.dokumentasi_edit')
            </div>
        </div>
      </div>
    </div>
  
</main>
@endsection
