@extends('admin.layouts.master')

@section('content')
<div class="tab-pane">
    <div class="content-profil d-flex py-5 mb-5">
        
        <div class="d-flex flex-column w-75">

            <div class="d-flex mb-5 gap-5">
                <div class="d-flex position-relative flex-column justify-content-center py-3 px-5" style="box-shadow: 0px 4px 4px 0px rgba(204,204,204,1); border-radius: 20px; background-color: #FAFAFA; height: 144px;">
                    <hr class="position-absolute start-0 h-100" style="background-color: #552525; border: none; width: 12px; border-radius: 20px;">
                    <h3 style="font-weight: bold; font-size: 150%; color: #000000;">Desk Evaluation</h3>
                    <div class="d-flex gap-2 align-items-center">
                        <img src="{{ asset('assets') }}/images/dashboard1.svg" style="width: 50px; height: 50px; border: none; border-radius: 0;" alt="">
                        <span style="color: #E59B30; font-weight: bold; font-size: 137.5%">27 Tim</span>
                    </div>
                </div>

                <div class="d-flex position-relative flex-column justify-content-center py-3 px-5" style="box-shadow: 0px 4px 4px 0px rgba(204,204,204,1); border-radius: 20px; background-color: #FAFAFA; height: 144px;">
                    <hr class="position-absolute start-0 h-100" style="background-color: #552525; border: none; width: 12px; border-radius: 20px;">
                    <h3 style="font-weight: bold; font-size: 150%; color: #000000;">Desk Evaluation</h3>
                    <div class="d-flex gap-2 align-items-center">
                        <img src="{{ asset('assets') }}/images/dashboard1.svg" style="width: 50px; height: 50px; border: none; border-radius: 0;" alt="">
                        <span style="color: #E59B30; font-weight: bold; font-size: 137.5%">27 Tim</span>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h4>Grafik</h4>
                <p>Peserta SNI Award</p>
            </div>


            
        </div>
        <div class="w-25">
            <h1>Kalender</h1>
        </div>
        
    </div>
</div>
@endsection('content')