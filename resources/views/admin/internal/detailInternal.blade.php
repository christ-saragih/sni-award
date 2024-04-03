@extends('admin.layouts.master')
@section('content')
<style>
    .value{
        padding: 2px 5px;
        border: 1px solid lightgray;
        border-radius: 5px;
        background-color: #aaa;
    }

    section {
            border-radius: 20px !important;
            padding-inline: 3rem !important
    }

    tbody th,
    tbody td {
        padding-block: 5px !important;
    }

    tbody th {
        padding-right: 50px !important;
    }

    /* tbody td {
       padding-left: 25px !important; 
    } */

    a.btn-edit {
            background-color: #E59B30 !important;
            color: white !important;
            border: none !important;
        }

    tbody tr:nth-child(odd) {
        background-color: white !important;
    }

    h3 {
        margin-bottom: 0 !important;
        font-size: 137.5% !important; 
        font-weight: bold !important;
    }

</style>

<main>
    <!-- Pop up ubah jabatan start -->
    <div class="modal fade" id="ubahJabatan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">

            <form class="modal-content" id="form_ubah_jabatan" method="POST" action="/admin/internal/edit/{{ Crypt::encryptString($internal->id) }}">
            @method('PUT')
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Jabatan</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <div action="" class="pb-0 mb-0">
                    <div class="d-flex flex-column gap-2">
                        <h6 class="ms-1 mb-0">Jabatan</h6>
                        <select id="nama_jabatan" name="role" class="form-select form-control-lg ps-4" aria-label="Default select example">
                            @foreach ($all_role as $ar)
                                <option value="{{ $ar->id }}" {{ $internal->role==$ar->id ? 'selected' : '' }}>{{ $ar->nama }}</option>
                            @endforeach
                        </select>   
                        <div>
                            <input type="checkbox" name="verified_at" id="verifikasi" value="{{ date('Y-m-d H:i:s') }}">
                            <label for="verifikasi">Verifikasi</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer gap-2" style="border: none;">
                <div class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</div>
                <button type="submit" class="btn" data-bs-toggle="modal">Simpan</button>
            </div>
            </form>
        </div>
    </div>
    <!-- Pop up ubah jabatan end -->
    <section class="card pb-5">
        <div class="d-flex py-5 align-items-center gap-3">
            <a href="/admin/internal" class="btn" style="width: fit-content">&#8617;</a>
            <h3>Profile</h3>
            <hr class="flex-grow-1" style="height: 3px; background-color: #E1A600;">
        </div>

        <div class="d-flex justify-content-around mb-5">
            <div class="d-flex flex-column align-items-center">
                <div class="mb-3" style="width: 160px; height: 160px;">
                    <img src="{{ asset('assets') }}/images/foto-peserta.jpg" alt="" style="object-fit: cover; width: 160px; height: 160px;  border-radius: 50%;">
                </div>
                <h3>{{ $internal->jenis_role->nama }}</h3>
                <p class="mb-2" style="font-size: 112.5%; margin-top: -5px;">{{ $internal->name }}</p>
                
                <a href="#ubahJabatan" class="mb-2 btn btn-edit px-4" data-bs-toggle="modal" role="button">Ubah dan Verifikasi</a>
                @if ($internal->verified_at)
                    <div class="px-3 py-1 rounded d-flex align-items-center justify-content-center" style="background-color: #009900;height: fit-content; color:white;">
                        <i class="fa fa-check-circle"></i>
                        &ensp;Terverifikasi 
                    </div>
                @endif
            </div>
            <table class="px-5">
                <tr>
                    <th>Nama</th>
                    <td>{{ $internal->name }}</td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td>{{ $internal->user_profil->no_hp }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $internal->email }}</td>
                </tr>
                <tr>
                    <th>NPWP</th>
                    <td>{{ $internal->user_profil->npwp }}</td>
                </tr>
                <tr>
                    <th>No. Rekening</th>
                    <td>{{ $internal->user_profil->no_rekening }}</td>
                </tr>
                <tr>
                    <th>Dokumen CV</th>
                    <td>
                        <a href="">
                            <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem;"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Dokumen Anti Penyuapan</th>
                    <td>
                        <a href="{{ $internal->user_profil->url_anti_penyuapan }}" target="_blank">
                            <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</main>
@endsection