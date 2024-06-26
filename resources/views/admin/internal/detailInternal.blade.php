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
                        <label for="nama_jabatan" class="ms-1 p-0 font-semibold">Jabatan:</label>
                        <select
                            id="nama_jabatan"
                            name="role"
                            class="form-select form-control-lg ps-4"
                        >
                            <option value="" disabled selected>-- Pilih Jabatan --</option>
                            @foreach ($all_role as $ar)
                                <option value="{{ $ar->id }}" {{ $internal->role==$ar->id ? 'selected' : '' }}>{{ $ar->nama }}</option>
                            @endforeach
                        </select>
                        <div style="color: gray; font-size: 14px;">atau:</div>
                        <div>
                            <input
                                type="checkbox"
                                name="role"
                                id="make_as_admin"
                                value="1"
                                onchange="disableRoleSelect(this, {{ $internal->role }})"
                            >
                            <label for="make_as_admin">Jadikan sebagai admin</label>
                        </div>
                        <div class="m-0 py-0 px-3 d-flex align-items-center justify-content-end gap-1">
                            <input
                                type="checkbox"
                                name="verified_at"
                                id="verifikasi"
                                value="{{ $internal->verified_at ? $internal->verified_at : date('Y-m-d H:i:s') }}"
                                {{ $internal->verified_at ? 'checked' : '' }}
                            >
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
            <a href="/admin/internal{{ $internal->role == 3 ? '?tab=lead_evaluator' : '' }}" class="btn" style="width: fit-content">&#8617;</a>
            <h3>Profile</h3>
            <hr class="flex-grow-1" style="height: 3px; background-color: #E1A600;">
        </div>

        <div class="d-flex justify-content-around mb-5">
            <div class="d-flex flex-column align-items-center">
                <div class="mb-3" style="width: 160px; height: 160px;">
                    <img src="{{ asset('assets') }}/images/foto-peserta.jpg" alt="" style="object-fit: cover; width: 160px; height: 160px;  border-radius: 50%;">
                </div>
                <h3 style="text-transform: capitalize;">{{ $internal->jenis_role->nama }}</h3>
                <p class="mb-2" style="font-size: 112.5%; margin-top: -5px; text-transform: capitalize;">{{ $internal->name }}</p>
                <a href="#ubahJabatan" class="btn btn-ubah mb-2" data-bs-toggle="modal" role="button" style="width: 100% !important;">Ubah dan Verifikasi</a>
                @if ($internal->verified_at)
                    <div class="px-3 mt-1 d-flex align-items-center justify-content-center gap-2" style="background-color: #78A55A; border-radius: 15px; padding-block: 6px; color:white; font-weight: bold;">
                        <i class="fa fa-check"></i>
                        <p class="m-0">Diverifikasi</p>
                    </div>
                @else
                <div class="px-3 mt-1 d-flex align-items-center justify-content-center gap-2" style="background-color: #FF0101; border-radius: 15px; padding-block: 6px; color:white; font-weight: bold;">
                        <i class="fa fa-close" style="margin-top: -2px;"></i>
                        <p class="m-0">Belum Diverifikasi</p>
                    </div>
                @endif
            </div>
            <table class="px-5">
                <tr>
                    <th>Nama</th>
                    <td style="text-transform: capitalize;">{{ $internal->name }}</td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td>{{ $internal->user_profil ? $internal->user_profil->no_hp : '-' }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $internal->email }}</td>
                </tr>
                <tr>
                    <th>NPWP</th>
                    <td>{{ $internal->user_profil ? $internal->user_profil->npwp : '-' }}</td>
                </tr>
                <tr>
                    <th>No. Rekening</th>
                    <td>{{ $internal->user_profil ? $internal->user_profil->no_rekening : '-'}}</td>
                </tr>
                <tr>
                    <th>Dokumen CV</th>
                    <td>
                        <a href="{{ Storage::url($internal->user_profil ? $internal->user_profil->url_cv : '-') }}" target="_blank">
                            <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem;"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Dokumen Anti Penyuapan</th>
                    <td>
                        <a href="{{ Storage::url($internal->user_profil ? $internal->user_profil->url_anti_penyuapan : '-') }}" target="_blank">
                            <i class="fa fa-download" aria-hidden="true" style="color: #552525; border: 2px solid #552525; border-radius: 8px; padding: 0.3rem"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</main>
<script>
    const makeAsAdminCheck = document.getElementById('make_as_admin')
    const roleSelect = document.getElementById('nama_jabatan')
    const disableRoleSelect = (e, currenValue) => {
        if (e.checked) {
            roleSelect.value = ''
            roleSelect.disabled = true
        } else {
            roleSelect.value = currenValue
            roleSelect.disabled = false
        }

    }
</script>
@endsection
