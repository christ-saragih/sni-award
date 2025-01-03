@extends('peserta.layouts.master')

@section('content')
<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Assessment</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Dokumen</a>
    </li>
</ul>
<hr class="p-0">
<div class="tab-content" id="tab-content">
    <!-- Assessment detail -->
    <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <div class="content-ubah-password py-5">
            <h3 class="mb-5 pb-0" style="font-size: 200%; font-weight: bold; color: #2b2b2b;">Jawablah Pertanyaan di Bawah Ini</h3>
            <h3 class="mb-5 pb-0" style="font-size: 130%; font-weight: bold; color: #2b2b2b;">Pilihlah jawaban yang paling benar menurut anda</h3>
            <div class="container mt-4 d-flex flex-column gap-4">
                <div class="d-flex align-items-center">
                <div class="progress flex-grow-1" style="height: 9px;">
                    <div
                    class="progress-bar pertanyaan"
                    role="progressbar"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="background-color: #E59B30;"
                    ></div>
                </div>

                <div class="text-center kategori_pertanyaan_single ms-auto">
                    {{$assessment_sub_kategori[0]->assessment_kategori->nama}}
                    {{-- Kepemimpinan --}}
                    </div>
                </div>

                <!-- detail pertanyaan -->
                @if ($registrasi)
                    <form id="submitForm" action="{{ route('simpanJawaban') }}" method="POST">
                        @csrf
                        @foreach ($assessment_sub_kategori as $ask)
                            @foreach ($ask->assessment_pertanyaan as $key=>$ap)
                                <input type="hidden" name="registrasi_id" value="{{ $registrasi->id }}">
                                <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-4">
                                    <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                                        <h3 class="m-0">Pertanyaan {{ $loop->parent->iteration }}.{{ $loop->iteration }}</h3>
                                        <p class="m-0">{{ $ask->nama }}</p>
                                    </div>
                                    <div class="pertanyaan d-flex flex-column text-center">
                                        <input type="hidden" name="assessment_pertanyaan_id[]" value="{{ $ap->id }}">
                                        <p class="m-0">{{ $ap->pertanyaan }}</p>
                                    </div>
                                    <div class="jawaban d-flex flex-wrap justify-content-between align-items-center w-100 mt-4 gap-3">
                                        @foreach ($ap->assessment_jawaban as $aj)
                                            <label class="jawaban-label d-flex align-items-center py-1 px-3 @if($registrasi_assessment->contains('assessment_jawaban_id', $aj->id)) active @endif" onclick="pilihJawaban(this)">
                                                @if (!$is_completed)
                                                    <input type="radio" name="jawaban[{{ $ap->id }}]" value="{{ $aj->id }}">
                                                @endif
                                                {{ $aj->jawaban }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                        @if (!$is_completed)
                            <button type="button" class="btn float-end mt-5" onclick="showConfirmation()" style="width: 20%;">Submit Jawaban</button>
                        @endif
                    </form>
                @endif

                <!-- detail pertanyaan 2 -->
                {{-- @if ($registrasi)
                    <form id="submitForm" action="{{ route('simpanJawaban') }}" method="POST">
                        @csrf
                        @foreach ($assessment_sub_kategori as $ask)
                            @foreach ($ask->assessment_pertanyaan as $ap)
                                <input type="hidden" name="registrasi_id" value="{{ $registrasi->id }}">
                                <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-4">
                                    <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                                        <h3 class="m-0">Pertanyaan {{ $loop->parent->iteration }}.{{ $loop->iteration }}</h3>
                                        <p class="m-0">{{ $ask->nama }}</p>
                                    </div>
                                    <div class="pertanyaan d-flex flex-column text-center">
                                        <input type="hidden" name="assessment_pertanyaan_id[]" value="{{ $ap->id }}">
                                        <p class="m-0">{{ $ap->pertanyaan }}</p>
                                    </div>
                                    <div class="jawaban d-flex flex-wrap justify-content-between align-items-center w-100 mt-4 gap-3">
                                        @foreach ($ap->assessment_jawaban as $aj)
                                            <label class="jawaban-label d-flex align-items-center py-1 px-3">
                                                <input type="radio" name="jawaban[{{ $ap->id }}]" value="{{ $aj->id }}" {{ (isset($jawaban_peserta[$ap->id]) && $jawaban_peserta[$ap->id]->assessment_jawaban_id == $aj->id) ? 'checked' : '' }}> {{ $aj->jawaban }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                        <button type="button" class="btn float-end mt-5" onclick="showConfirmation()" style="width: 20%;">Submit Jawaban</button>
                    </form>
                @endif --}}

                </div>
                </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pengumpulan Jawaban</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin mengumpulkan jawaban?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                <button type="button" class="btn btn-primary" onclick="submitForm()">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>

<script>
    function showConfirmation() {
        $('#confirmationModal').modal('show');
    }

    function submitForm() {
        $('#submitForm').submit();
    }
</script>



    <!-- Assessment detail end -->

    <!-- Dokumen Section -->
    <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
        <div class="content-profil py-5 mb-5">
            <div class="container mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Lampiran</th>
                            <th class="text-center" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">Upload Kuesioner</td>
                            <td class="text-center"><button class="btn btn-upload">Upload</button></td>
                        </tr>
                        <tr>
                            <td scope="row">Lembar Pernyataan Tidak Terlibat Kasus Hukum</td>
                            <td class="text-center"><button class="btn btn-upload">Upload</button></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-5 me-2 px-5 py-4 d-flex justify-content-end gap-3">
                <button type="submit" class="btn nonactive" style="width: 13%;">Batal</button>
                <button type="submit" class="btn" style="width: 13%;">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
