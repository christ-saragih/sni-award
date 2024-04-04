<div class="content-profil py-5" id="pendaftaran">
    <h3 class="mb-5 pb-0" style="font-size: 200%; font-weight: bold; color: #2b2b2b;">Self Assesment</h3>
      <div class="card-container mt-4 d-flex flex-wrap justify-content-between gap-5">
      @foreach ($assessment_kategori as $ak)
      @if($existingRegistration != NULL)
      <a href="{{!$ak->check ? route('pendaftaran.detail',['id'=>$ak->id,'registrasi_id'=>$existingRegistration->id]) : 'javascript:void(0)'}}" class="card @if($ak->check) active @endif" style="text-decoration: none">
          {{$ak->nama}}
          <div class="ceklis-container">
          <i class="fa fa-check-circle" aria-hidden="true"></i>
          </div>
      </a>
      @endif
      @endforeach
      </div>
  </div>