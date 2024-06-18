@extends('guest.layouts.master')

@section('content')
<style>
    .container-viewer {
        display: block;
        float: right;
    }
    #informasi .content {
        padding-left: 0px !important;
        padding-inline: 90px !important;
    }
    #informasi .content .container-title-berita {
        width: 60%;
        padding-right: 90px;
    }
    #informasi .content .accordion {
        width: 40%;
    }
    .container-berita .date {
        float: right;
    }
    .container-berita .berita {
            gap: 20px;
            margin-bottom: 10px;
        }
    .container-berita .berita .container-image {
            width: 30%;
        }
    .container-berita .berita .container-title {
            width: 70%;
        }

    .content-bawah .content {
        width: 60%;
    }
    .content-bawah .content-samping {
        width: 40%;
        margin-top: -85px;
    }
    .container-berita .container-tanggal {
            display: none;
        }
        .container-berita .container-title .date {
            display: flex;
        }
    
    @media (max-width: 480px) {
        .container-viewer {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            float: left !important;
        }
        #informasi {
            margin-top: -60px;
        }
        #informasi > .content {
            padding-top: 100px;
            gap: 10px;
        }
        #informasi .content .container-title-berita {
            width: 70% !important;
            padding-right: 0px;
        }
        #informasi .content .accordion {
            width: 30% !important;
        }
        #informasi .content {
            padding-inline: 10px !important;
        }
        #informasi .content-samping {
            padding-left: 10px !important;
            padding-right: 10px !important;
        }
        .content-samping .container-berita {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            padding-inline: 0px !important;
        }
        .container-berita .date {
            float: left !important;
        }
        
        .container-berita .berita {
            flex-direction: column !important; 
        }
        .container-title {
            flex-grow: 1 !important;
            width: 100% !important;
            padding-inline: 2px !important;
        }
        .container-tanggal {
            padding-inline: 2px !important;
        }
        .content-bawah {
            flex-wrap: wrap;
        }
        .content-bawah .content {
            width: 100% !important;
        }
        .content-bawah .content-samping {
            width: 100% !important;
            margin-top: 10px !important;
        }
        .accordion-button {
            font-size: 14px !important;
            padding: 12px 10px !important;
        }
        .container-berita .berita .container-image {
            width: 100% !important;
            height: 110px;
        }
        .container-berita .berita .container-image img {
            width: 100% !important;
            height: 100%;
        }
        .container-berita .container-tanggal {
            display: flex !important;
            
        }
        .container-berita .container-title .date {
            display: none !important;
        }
        .container-berita .container-tanggal p {
            margin: 0px;
        }
        p.title {
            margin: 0;
        }
        .container-berita .berita {
            flex-direction: row;
            /* justify-content: space-between !important; */
            /* align-content: space-between !important; */
            gap: 5px !important;
        }
    }
</style>

<article id="informasi" class="shape-bawah">
    <div class="d-flex content" style="max-width: 100%; margin-bottom: 20px;">
        <div class="container-title-berita">
            <h3 class="">{{ $berita->judul_berita }}</h3>
            <hr class="w-100"/>
            <div class="container-viewer">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets') }}/images/icon/calendar.svg" class="me-2" alt="">
                    <p class="mb-0">{{ $tanggal }}</p>
                    {{-- <p class="mb-0">{{ \Carbon\Carbon::parse($berita->tanggal)->locale('id')->translatedFormat('l, j F Y') }}</p> --}}
                    {{-- <p class="mb-0">Senin, 12 Februari 2024</p> --}}
                </div>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets') }}/images/icon/eye.svg" class="me-2" alt="">
                    <p class="mb-0">470</p>
                </div>
            </div>
        </div>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item float-end">
            <h2 class="accordion-header" id="headingThree">
                <button
                class="accordion-button collapsed me-4"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapseThree"
                aria-expanded="false"
                aria-controls="collapseThree"
                >
            Tag Populer
                </button>
            </h2>
            <div
                id="collapseThree"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordionExample"
            >
                <div class="accordion-body">
                <strong>This is the third</strong>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="m-0 d-flex content-bawah" style="max-width: 100%">
        <div class="content">
            <img src="{{ asset('storage/images/gambar_berita/' . $berita->file_gambar) }}" alt="" class="berita mb-4" style="object-fit: cover;">
            <p class="description">{!! $berita->deskripsi !!}</p>
        </div>
        <div class="content-samping">
            
                <div class="d-flex flex-column justify-content-start align-items-start">
                    <h3 class="ms-2">Berita</h3>
                    <hr style="margin-inline: 0px; width: 32%; margin-bottom: 25px;">
                </div>
                <div class="container-berita">
                    @foreach ($get_all_berita as $ber)
                    <div class="d-flex berita">
                        <div class="container-image">
                            <img src="{{ asset('storage/images/gambar_berita/' . $ber->file_gambar) }}" alt="" style="object-fit: cover;">
                        </div>
                        <div class="container-title d-flex flex-column justify-content-between">
                            <p class="title">{{ $ber->judul_berita }}</p>
                            <p class="date items-end me-4" style="align-self: flex-end">{{ $ber->tanggal }}</p>
                        </div>
                        <div class="container-tanggal">
                            <p class="date float-end me-4">{{ $ber->tanggal }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col mt-5">
                <a href="/informasi/berita" class="btn">Baca Lainnya</a>
                {{-- <button class="btn">Berita Lainnya</button> --}}
                </div>

            </div>


    </div>
</article>
@endsection('content')