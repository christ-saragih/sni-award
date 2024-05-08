@extends('Guest.layouts.master')

@section('content')
<style>
  .circle-step {
    width: fit-content;
    padding: 15px 27px;
    color: white;
    border-radius: 100%;
    font-size: 24px;
    font-weight: bold;
    background-color: #552525;
  }
</style>

<article class="shape-linimasa pb-5">
    <div class="contact-container">
      <div class="title pb-5 mb-4 text-center text-uppercase">
        <h1>TIMELINE KEGIATAN SNI AWARD 2024</h1>
      </div>
     
        <div class="faq-container">
            <img src="{{ asset('assets') }}/images/linimasa.jpg" class="img-fluid" alt="" style="box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25) !important;">
        </div>
        @php
            $linimasa = [
              0 => [
                'tanggal' => '24/4/24',
                'deskripsi' => 'zcvzvzczcxvzxc'
              ],
              1 => [
                'tanggal' => '24/4/24',
                'deskripsi' => 'zcvzvzczcxvzxc'
              ],
              2 => [
                'tanggal' => '24/4/24',
                'deskripsi' => 'zcvzvzczcxvzxc'
              ],
              3 => [
                'tanggal' => '24/4/24',
                'deskripsi' => 'zcvzvzczcxvzxc'
              ],
              4 => [
                'tanggal' => '24/4/24',
                'deskripsi' => 'zcvzvzczcxvzxc'
              ],
              5 => [
                'tanggal' => '24/4/24',
                'deskripsi' => 'zcvzvzczcxvzxc'
              ],
              6 => [
                'tanggal' => '24/4/24',
                'deskripsi' => 'zcvzvzczcxvzxc'
              ],
            ]
        @endphp
        <div class="w-100 d-flex align-items-center justify-content-center bg-white" style="margin-top: 150px;">
          @foreach ($linimasa as $key=>$lm)
            @php
                $percent_index = round((($key+1)/count($linimasa))*100);
            @endphp
            <div class="d-flex align-items-center">
              <div class="">
                <div class="position-relative">
                  <div class="position-absolute {{ ($key % 2 == 0) ? 'bottom-100 start-100' : 'top-100 end-100' }}">
                    <div class="text-center fs-5 fw-bold">{{ $lm['tanggal'] }}</div>
                    <div class="text-center max-w-100">{{ $lm['deskripsi'] }}</div>
                  </div>
                  <div style="opacity: {{ $percent_index }}%;">
                    <div class="circle-step">{{ $loop->iteration }}</div>
                    <div class="position-absolute translate-middle-x {{ ($key % 2 == 0) ? 'bottom-100' : 'top-100' }} start-50" style="height: 50px; width: 3px; background-color: #552525;">
                      <div class="position-absolute translate-middle-x {{ ($key % 2 == 0) ? 'bottom-100' : 'top-100' }} start-50" style="
                        width: 10px; 
                        height: 10px; 
                        background-color: #fff; 
                        border-radius:100%;
                        border: 3px solid #552525;
                      "></div>
                    </div>
                  </div>
                </div>
              </div>
              @if ($key+1 < count($linimasa))
                <div style="height: 5px;width: 100px;background-color:#e1e1e1;"></div>
              @endif
            </div>
          @endforeach
        </div>


    </div>
  </article>
@endsection