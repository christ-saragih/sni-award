@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="card col-12 p-4">
        <div class="mb-4">
            <div class="">
                <h4 class="fw-bold">Edit Pertanyaan</h4>
                <br><hr style="color: orange; height: 0.5px;"><br>
            </div>
            <div class="px-3 pt-0 pb-2 fw-bold">
            @if($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                </div>
            @endif
            <form action="{{ route('assessment_pertanyaan.update', $pertanyaan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label for="assessment_kategori">Kategori</label>
                    <select id="assessment_kategori" class="form-control mt-2">
                        <option value="">Pilih Kategori</option>
                        @foreach($assessment_kategori as $kategori)
                        <option value="{{ $kategori->id }}" {{ $pertanyaan->assessment_sub_kategori->assessment_kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                        {{-- <option value="{{ $pertanyaan->assessment_sub_kategori->assessment_kategori->id }}" selected>{{ $pertanyaan->assessment_sub_kategori->assessment_kategori->nama }}</option> --}}
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="assessment_sub_kategori">Sub Kategori</label>
                    <select id="assessment_sub_kategori" class="form-control mt-2" name="assessment_sub_kategori_id">
                        <option value="">Pilih Sub Kategori</option>
                        <option value="{{ $pertanyaan->assessment_sub_kategori->id }}" selected>{{ $pertanyaan->assessment_sub_kategori->nama }}</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="pertanyaan">Pertanyaan</label>
                    <textarea name="pertanyaan" id="pertanyaan" cols="30" rows="5" class="form-control mt-2" placeholder="Tulis Pertanyaan">{{ $pertanyaan->pertanyaan }}</textarea>
                    {{-- <input type="text" class="form-control mt-2" id="pertanyaan" name="pertanyaan" value="{{ $pertanyaan->pertanyaan }}"> --}}
                </div>
                <div class="form-group mb-4">
                    <label for="jumlah_jawaban">Jumlah Jawaban</label>
                    <div class="row g-3 mt-2">
                        <div class="col-3">
                            <input type="number" class="form-control mt-2" id="jumlah_jawaban" name="jumlah_jawaban" min="1" max="5" value="{{ $jumlah_jawaban }}">
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" id="tambah-jawaban">Tambah</button>
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group mb-4">
                    <label for="jumlah_jawaban">Jumlah Jawaban</label>
                    <input type="number" class="form-control mt-2" id="jumlah_jawaban" name="jumlah_jawaban" min="1" max="5" value="{{ $jumlah_jawaban }}">
                </div> --}}
                <div id="jawaban-container">
                    <!-- Container untuk field input jawaban -->
                    {{-- @if($pertanyaan->jawaban) --}}
                    @foreach($jawaban as $jawaban)
                    <div class="form-group jawaban-group">
                        <label for="jawaban">Jawaban {{ $loop->iteration }}</label>
                        <input type="text" class="form-control" name="jawaban[]" value="{{ $jawaban->jawaban }}" required>
                        {{-- <label for="status_jawaban">Status Jawaban</label>
                        <select class="form-control" name="status_jawaban[]" required>
                            <option value="TRUE" {{ $jawaban->status_jawaban == 'TRUE' ? 'selected' : '' }}>Benar</option>
                            <option value="FALSE" {{ $jawaban->status_jawaban == 'FALSE' ? 'selected' : '' }}>Salah</option>
                        </select>
                        <label for="poin">Poin</label>
                        <input type="number" class="form-control poin-input" name="poin[]" value="{{ $jawaban->poin }}" required> --}}
                    </div>
                    @endforeach
                    {{-- @endif --}}
                </div>
                <div class="row g-3 justify-content-end mt-2">
                    <a href="/admin/assessment" role="button" class="btn col-auto me-4" style="width: 100px; padding: 5px 10px; background-color: #fff; color: #C17D2D; ">Batal</a>
                    <button type="submit" style="width: 100px; padding: 5px 10px; background-color: #552525; color: #fff; border-radius: 10px; border-color: #C17D2D">Ubah</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('tambah-jawaban').addEventListener('click', function() {
        var container = document.getElementById('jawaban-container');
        var jumlahJawaban = document.getElementById('jumlah_jawaban').value;
        container.innerHTML = ''; // Bersihkan kontainer sebelum menambahkan input jawaban baru

        var totalPoin = 0; // Inisialisasi total poin

        for (var i = 0; i < jumlahJawaban; i++) {
            var group = document.createElement('div');
            group.classList.add('form-group', 'jawaban-group', 'mb-4');
            group.innerHTML = `
                <label for="jawaban">Jawaban ${i+1}</label>
                <input type="text" class="form-control mt-2" name="jawaban[]" required>
            `;
            container.appendChild(group);
        }
    });

    $(document).ready(function() {
        $('#assessment_kategori').on('change', function() {
            var assessment_kategori_id = $(this).val();
            var sub_kategori_select = $('#assessment_sub_kategori');

            // Kosongkan opsi sub kategori
            sub_kategori_select.empty().append('<option value="">Pilih Sub Kategori</option>');

            // Kirim permintaan Ajax
            $.ajax({
                url: '/get-sub-kategori-by-kategori',
                type: 'GET',
                data: {
                    assessment_kategori_id
                },
                success: function(response) {
                    $.each(response, function(index, assessment_sub_kategori) {
                        sub_kategori_select.append('<option value="' + assessment_sub_kategori.id + '">' + assessment_sub_kategori.nama + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
@endsection
