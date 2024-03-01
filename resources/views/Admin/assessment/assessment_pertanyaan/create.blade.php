@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Berita</h6>
        </div>
        <div class="card-body px-3 pt-0 pb-2">
          @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          @endif
            <form action="{{ route('assessment_pertanyaan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="assessment_kategori" class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach($assessment_kategori as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="assessment_sub_kategori">Sub Kategori</label>
                    <select id="assessment_sub_kategori" class="form-control" name="assessment_sub_kategori_id">
                        <option value="">Pilih Sub Kategori</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan">
                </div>
                <div class="form-group">
                    <label for="jumlah_jawaban">Jumlah Jawaban</label>
                    <input type="number" class="form-control" id="jumlah_jawaban" name="jumlah_jawaban" min="1" max="5">
                </div>
                <div id="jawaban-container">
                    <!-- Container untuk field input jawaban -->
                </div>
                <button type="button" class="btn btn-primary" id="tambah-jawaban">Tambah Jawaban</button>
                <button type="submit" class="btn btn-primary">Submit</button>
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
            group.classList.add('form-group', 'jawaban-group');
            group.innerHTML = `
                <label for="jawaban">Jawaban ${i+1}</label>
                <input type="text" class="form-control" name="jawaban[]" required>
                <label for="status_jawaban">Status Jawaban</label>
                <select class="form-control" name="status_jawaban[]" required>
                    <option value="">Pilih Status Jawaban</option>
                    <option value="TRUE">Benar</option>
                    <option value="FALSE">Salah</option>
                </select>
                <label for="poin">Poin</label>
                <input type="number" class="form-control poin-input" name="poin[]" required>
            `;
            container.appendChild(group);

            // Tambahkan event listener untuk setiap input poin
            group.querySelector('.poin-input').addEventListener('input', function() {
                var inputs = document.querySelectorAll('.poin-input');
                var total = 0;
                inputs.forEach(function(input) {
                    total += parseInt(input.value) || 0; // Jumlahkan nilai input poin
                });

                // Periksa apakah total poin lebih dari 100
                if (total > 100) {
                    alert('Total poin tidak boleh melebihi 100');
                    this.value = ''; // Reset nilai input jika melebihi 100
                }
            });
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

    // document.getElementById('kategori').addEventListener('change', function() {
    //     var kategoriId = this.value;
    //     var subKategoriSelect = document.getElementById('sub_kategori');

    //     // Kosongkan opsi sub kategori
    //     subKategoriSelect.innerHTML = '<option value="">Pilih Sub Kategori</option>';

    //     // Filter sub kategori berdasarkan kategori yang dipilih
    //     var filteredSubKategori = {!! json_encode($assessment_sub_kategori->groupBy('assessment_kategori_id')->toArray(), JSON_HEX_TAG) !!}[kategoriId] || [];

    //     // Tambahkan opsi sub kategori yang sesuai dengan filter
    //     filteredSubKategori.forEach(function(subKategori) {
    //         var option = document.createElement('option');
    //         option.value = subKategori.id;
    //         option.textContent = subKategori.nama;
    //         subKategoriSelect.appendChild(option);
    //     });
    // });
</script>
@endsection

<!-- resources/views/pertanyaan/create.blade.php -->
{{-- @if($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                </div>
            @endif
<form action="{{ route('assessment_pertanyaan.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <select id="kategori" class="form-control">
            <option value="">Pilih Kategori</option>
            @foreach($assessment_kategori as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sub_kategori">Sub Kategori</label>
        <select id="sub_kategori" class="form-control">
            <option value="">Pilih Sub Kategori</option>
        </select>
    </div>
    <div class="form-group">
        <label for="pertanyaan">Pertanyaan</label>
        <input type="text" class="form-control" id="pertanyaan" name="pertanyaan">
    </div>
    <div class="form-group">
        <label for="jumlah_jawaban">Jumlah Jawaban</label>
        <input type="number" class="form-control" id="jumlah_jawaban" name="jumlah_jawaban" min="1" max="5">
    </div>
    <div id="jawaban-container">
        <!-- Container untuk field input jawaban -->
    </div>
    <button type="button" class="btn btn-primary" id="tambah-jawaban">Tambah Jawaban</button>
    <button type="submit" class="btn btn-primary">Submit</button>
</form> --}}



