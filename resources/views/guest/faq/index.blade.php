@extends('Guest.layouts.master')

@section('content')
<article class="shape-faq pb-5">
    <div class="contact-container">
      <div class="d-flex align-items-center title pb-5 mb-5">
        <h1>Frequently Asked Questions</h1>
        <hr class="p-0" style="width: 100%; background-color: #CC9305; margin-top: 75px; margin-left: -200px;"/>
      </div>
      <!-- <div class="d-flex align-items-center gap-2">
        <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Feedback</h3>
        <hr class="p-0" style="height: 1px; width: 100%; background-color: #CC9305;">
      </div> -->
     
        <div class="faq-container d-flex ms-auto w-75">
          <div class="accordion w-75" id="accordionExample">

            <!-- popular faq -->
            @for ($i = 0; $i < count($popular_faq); $i++)
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $popular_faq[$i]->id }}">
                  <button
                    class="accordion-button {{ $i != 0 ? 'collapsed' : '' }}"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $popular_faq[$i]->id }}"
                    aria-expanded="false"
                    aria-controls="collapse{{ $popular_faq[$i]->id }}"
                  >
                    {{ $popular_faq[$i]->pertanyaan }}
                  </button>
                </h2>
                <div
                  id="collapse{{ $popular_faq[$i]->id }}"
                  class="accordion-collapse collapse {{ $i == 0 ? 'show' : '' }}"
                  aria-labelledby="heading{{ $popular_faq[$i]->id }}"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    {{ $popular_faq[$i]->jawaban }}
                  </div>
                </div>
              </div>
            @endfor
            <!-- end popular faq -->
            
            <!-- unpopular faq -->
            @for ($i = 0; $i < count($unpopular_faq); $i++)
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $unpopular_faq[$i]->id }}">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $unpopular_faq[$i]->id }}"
                    aria-expanded="false"
                    aria-controls="collapse{{ $unpopular_faq[$i]->id }}"
                  >
                    {{ $unpopular_faq[$i]->pertanyaan }}
                  </button>
                </h2>
                <div
                  id="collapse{{ $unpopular_faq[$i]->id }}"
                  class="accordion-collapse collapse"
                  aria-labelledby="heading{{ $unpopular_faq[$i]->id }}"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    {{ $unpopular_faq[$i]->jawaban }}
                  </div>
                </div>
              </div>
            @endfor
            <!-- end unpopular faq -->

          </div>
        </div>

        
        <!-- <div class="col-6">
          <form>
            <div class="row mb-3 justify-content-center">
              <div class="input-container col-12">
                <label for="exampleInputEmail1" class="form-label"></label>
                <input
                  type="email"
                  class="form-control border-dark rounded-3"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Nama Lengkap"
                />
              </div>

              <div class="input-container col-6">
                <label for="exampleInputEmail1" class="form-label"></label>
                <input
                  type="email"
                  class="form-control border-dark rounded-3"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="No.telp"
                />
              </div>
              <div class="input-container col-6">
                <label for="exampleInputEmail1" class="form-label"></label>
                <input
                  type="email"
                  class="form-control border-dark rounded-3"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="E-mail"
                />
              </div>
              <div class="input-container col-12">
                <label
                  for="exampleFormControlTextarea1"
                  class="form-label"
                ></label>
                <textarea
                  class="form-control border-dark rounded-3"
                  id="exampleFormControlTextarea1"
                  rows="5"
                  placeholder="Berikan Komentarmu!"
                ></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary float-end">
              Kirim Komentar
            </button>
          </form>
        </div> -->
  
    </div>
  </article>
@endsection