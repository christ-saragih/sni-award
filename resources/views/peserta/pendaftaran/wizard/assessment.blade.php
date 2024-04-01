<div class="content-profil py-5" id="pendaftaran">
    <h3 class="mb-5 pb-0" style="font-size: 200%; font-weight: bold; color: #2b2b2b;">Self Assesment</h3>
      <div class="card-container mt-4 d-flex flex-wrap justify-content-between gap-5">
      @foreach ($assessment_kategori as $ak)
      <a href="{{route('pendaftaran.detail',$ak->id)}}" class="card" style="text-decoration: none">
          {{$ak->nama}}
          <div class="ceklis-container">
          <i class="fa fa-check-circle" aria-hidden="true"></i>
          </div>
      </a>
      @endforeach
      </div>
  </div>