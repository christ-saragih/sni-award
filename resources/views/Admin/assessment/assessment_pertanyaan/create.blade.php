@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="card col-12 p-4">
        <div class="mb-4">
            <div class="">
            <h4 class="fw-bold">Assessment Pertanyaan</h4>
            <br><hr style="color: orange; height: 0.5px;"><br>
            </div>
            <div class="px-3 pt-0 pb-2 fw-bold">
                <form action="{{ route('assessment_pertanyaan.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="kategori">Kategori</label>
                        <select id="assessment_kategori" class="form-control mt-2">
                            <option value="">Pilih Kategori</option>
                            @foreach($assessment_kategori as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="assessment_sub_kategori">Sub Kategori</label>
                        <select id="assessment_sub_kategori" class="form-control mt-2" name="assessment_sub_kategori_id">
                            <option value="">Pilih Sub Kategori</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="pertanyaan">Pertanyaan</label>
                        <textarea name="pertanyaan" id="pertanyaan" cols="30" rows="5" class="form-control mt-2" placeholder="Tulis Pertanyaan"></textarea>
                        {{-- <input type="text" class="form-control mt-2" id="pertanyaan" name="pertanyaan"> --}}
                    </div>
                    <div class="form-group mb-4">
                        <label for="jumlah_jawaban">Jumlah Jawaban</label>
                        <div class="row g-3 mt-2">
                            <div class="col-3">
                                <input type="number" class="form-control" id="jumlah_jawaban" name="jumlah_jawaban" min="1" max="5" placeholder="Jumlah">
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" id="tambah-jawaban">Tambah</button>
                            </div>
                        </div>
                    </div>
                    <div id="jawaban-container">
                        <!-- Container untuk field input jawaban -->
                    </div>
                    <div class="row g-3 justify-content-end mt-2">
                        <a href="/admin/assessment" role="button" class="btn col-auto me-4" style="width: 100px; padding: 5px 10px; background-color: #fff; color: #C17D2D; ">Batal</a>
                        <button type="submit" style="width: 100px; padding: 5px 10px; background-color: #552525; color: #fff; border-radius: 10px; border-color: #C17D2D">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

