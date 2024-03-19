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
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                >
                Apa itu SNI Award?
                </button>
              </h2>
              <div
                id="collapseOne"
                class="accordion-collapse collapse show"
                aria-labelledby="headingOne"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <strong>This is the first item's accordion body.</strong> It is
                  shown by default, until the collapse plugin adds the appropriate
                  classes that we use to style each element. These classes control
                  the overall appearance, as well as the showing and hiding via CSS
                  transitions. You can modify any of this with custom CSS or
                  overriding our default variables. It's also worth noting that just
                  about any HTML can go within the <code>.accordion-body</code>,
                  though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                Siapa saja yang dapat mengikuti SNI Award?
                </button>
              </h2>
              <div
                id="collapseTwo"
                class="accordion-collapse collapse"
                aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <strong>This is the second item's accordion body.</strong> It is
                  hidden by default, until the collapse plugin adds the appropriate
                  classes that we use to style each element. These classes control
                  the overall appearance, as well as the showing and hiding via CSS
                  transitions. You can modify any of this with custom CSS or
                  overriding our default variables. It's also worth noting that just
                  about any HTML can go within the <code>.accordion-body</code>,
                  though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                Apa saja kategori SNI Award
                </button>
              </h2>
              <div
                id="collapseThree"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <strong>This is the third item's accordion body.</strong> It is
                  hidden by default, until the collapse plugin adds the appropriate
                  classes that we use to style each element. These classes control
                  the overall appearance, as well as the showing and hiding via CSS
                  transitions. You can modify any of this with custom CSS or
                  overriding our default variables. It's also worth noting that just
                  about any HTML can go within the <code>.accordion-body</code>,
                  though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseFour"
                  aria-expanded="false"
                  aria-controls="collapseFour"
                >
                Siapa saja yang dapat mengikuti SNI Award?
                </button>
              </h2>
              <div
                id="collapseFour"
                class="accordion-collapse collapse"
                aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <strong>This is the second item's accordion body.</strong> It is
                  hidden by default, until the collapse plugin adds the appropriate
                  classes that we use to style each element. These classes control
                  the overall appearance, as well as the showing and hiding via CSS
                  transitions. You can modify any of this with custom CSS or
                  overriding our default variables. It's also worth noting that just
                  about any HTML can go within the <code>.accordion-body</code>,
                  though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseFive"
                  aria-expanded="false"
                  aria-controls="collapseFive"
                >
                Apa saja kategori SNI Award
                </button>
              </h2>
              <div
                id="collapseFive"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <strong>This is the third item's accordion body.</strong> It is
                  hidden by default, until the collapse plugin adds the appropriate
                  classes that we use to style each element. These classes control
                  the overall appearance, as well as the showing and hiding via CSS
                  transitions. You can modify any of this with custom CSS or
                  overriding our default variables. It's also worth noting that just
                  about any HTML can go within the <code>.accordion-body</code>,
                  though the transition does limit overflow.
                </div>
              </div>
            </div>
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