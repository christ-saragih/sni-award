@extends('sekretariat.layouts.master')
@section('content')

<style>
    input,
    select {
        font-size: 18px !important;
        
    }


    a.nonactive {
        font-weight: 600;
        background-color: white;
        color: #c17d2d;
        border-radius: 15px;
        border: 3.5px solid #c17d2d;
    }

    a.nonactive:hover {
        font-weight: 700;
        background-color: var(--primary-color);
        color: white;
        transition: all 0.3s ease;
    }
</style>

<main>
    <hr class="p-0 mt-3">
    <div class="tab-pane">
        <div class="content-profil py-5 mb-5">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <h3 class="mb-0 pb-0" style="font-size: 150%; font-size: 24px; font-weight: bold; color: #000000;">Tim Desk Evaluation</h3>
                    <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
                </div>
                <p style="font-size: 18px; color: #9FAFBF;">Buat tim untuk penilaian desk evaluation pada peserta</p>
            </div>

            <div class="container mt-4">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-xl-12" style="padding-inline: 0px;">
                    <div class="card" style="border-radius: 15px;">

                        <div class="card-body" style="padding-inline: 0px;">

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-4">
                                    <h6 class="mb-0">Nama</h6>
                                </div>
                                <div class="col-md-8 ps-5 pe-5">
                                    <input type="text" name="nama" class="form-control form-control-lg" value="John Doe" disabled style="border: none; background-color: transparent;">
                                </div>
                            </div>

                            <div class="row align-items-center pb-3">
                                <div class="col-md-4">
                                    <h6 class="mb-0">Tanggal Penilaian</h6>
                                </div>
                                <div class="col-md-4 ps-5 pe-5 d-flex flex-row">
                                    <div class="form-group input-group">
                                        <input type="text" name="tanggal_penilaian" class="form-control form-control-lg" id="inputCalendar" value=""/>
                                        <label class="input-group-text" style="background-color: #D7DAE3; border-radius: 0 15px 15px 0; border-right: 1px solid #9fafbf; border-top: 1px solid #9fafbf; border-bottom: 1px solid #9fafbf; color: #595959;"><i class="fa fa-calendar"></i></label>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row align-items-center pb-3">
                                <div class="col-md-4">
                                    <h6 class="mb-0">Lead Evaluator</h6>
                                </div>
                                <div class="col-md-8 ps-5 pe-5">
                                    <select class="form-select form-select-lg" aria-label="Default select example" id="lead_evaluator" name="lead_evaluator_id" value="Test"></select>
                                </div>
                            </div>
        
                            <div class="row align-items-center pb-3">
                                <div class="col-md-4">
                                    <h6 class="mb-0">Evaluator</h6>
                                </div>
                                <div class="col-md-8 ps-5 pe-5">
                                    <select class="form-select form-select-lg" aria-label="Default select example" id="evaluator" name="evaluator_id"></select>
                                </div>
                            </div>

                            <div class="px-5 py-4 d-flex justify-content-end gap-3">
                                <a href="/sekretariat/tim/tambah" role="button" class="btn nonactive" style="width: 13%;">Batal</a>
                                <button type="submit" class="btn" style="width: 13%;">Simpan</button>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</main>
@endsection