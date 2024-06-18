@extends('guest.layouts.master')

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
            <h1>{{ $penjadwalan_linimasa ? $penjadwalan_linimasa->judul : 'TIMELINE KEGIATAN SNI AWARD 2024' }}</h1>
            {{-- <h1>TIMELINE KEGIATAN SNI AWARD 2024</h1> --}}
        </div>

        {{-- <div class="faq-container">
            {{ dd(storage_path('C:\Users\Iqbal Fadhila Rahman\Documents\Magang Sem6\sni-award-iqbal\storage\app\public\images\frontpage\linimasa_penjadwalan\\' . $penjadwalan_linimasa->gambar)) }}
            <img src="{{ asset('storage/images/frontpage/linimasa_penjadwalan/' . $penjadwalan_linimasa->gambar) }}" class="img-fluid" alt="" style="box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25) !important;">
        </div> --}}
        <div class="faq-container">
            <img src="{{ asset('assets') }}/images/linimasa.jpg" class="img-fluid" alt="" style="box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25) !important;">
        </div>

        @if ($penjadwalan_linimasa)
        <div class="mt-5 ms-5">
            <iframe
                {{-- src="{{ $penjadwalan_linimasa ? $penjadwalan_linimasa->lokasi_map : null }}" --}}
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.97659708331!2d106.82049436920713!3d-6.236432029161127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f36a70592c2d%3A0xb7e21ff0384fde0d!2sBadan%20Standardisasi%20Nasional%20(BSN)!5e0!3m2!1sid!2sid!4v1707458886395!5m2!1sid!2sid"
                width="960"
                height="580"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
        @endif
        {{-- @php
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
        <div class="d-flex align-items-center justify-content-center" style="margin-top: 150px;">
          @foreach ($linimasa as $key=>$lm)
            @php
                $percent_index = round((($key+2)/count($linimasa))*100);
            @endphp
            <div class="d-flex align-items-center">
              <div class="">
                <div class="position-relative">
                  <div
                    class="p-0 m-0 text-center position-absolute"
                    style="{{ ($key % 2 == 0) ? 'bottom: 200%;' : 'top: 200%;' }} transform: translateX(-20%);"
                  >
                    <div class="fs-5 fw-bold">{{ $lm['tanggal'] }}</div>
                    <div class="max-w-100">{{ $lm['deskripsi'] }}</div>
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
        </div> --}}
    </div>
</article>
@endsection
