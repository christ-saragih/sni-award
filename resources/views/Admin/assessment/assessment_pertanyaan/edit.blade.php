@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
            <h6>Edit Pertanyaan</h6>
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
            <form action="{{ route('assessment_pertanyaan.update', $pertanyaan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" class="form-control">
                        <option value="{{ $pertanyaan->assessment_sub_kategori->assessment_kategori->id }}" selected>{{ $pertanyaan->assessment_sub_kategori->assessment_kategori->nama }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_kategori">Sub Kategori</label>
                    <select id="sub_kategori" class="form-control">
                        <option value="{{ $pertanyaan->assessment_sub_kategori->id }}" selected>{{ $pertanyaan->assessment_sub_kategori->nama }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" value="{{ $pertanyaan->pertanyaan }}">
                </div>
                <div class="form-group">
                    <label for="jumlah_jawaban">Jumlah Jawaban</label>
                    <input type="number" class="form-control" id="jumlah_jawaban" name="jumlah_jawaban" min="1" max="5" value="{{ $jumlah_jawaban }}">
                </div>
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
                <button type="button" class="btn btn-primary" id="tambah-jawaban">Tambah Jawaban</button>
                <button type="submit" class="btn btn-primary">Submit</button>
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

    document.getElementById('kategori').addEventListener('change', function() {
        var kategoriId = this.value;
        var subKategoriSelect = document.getElementById('sub_kategori');

        // Kosongkan opsi sub kategori
        subKategoriSelect.innerHTML = '<option value="">Pilih Sub Kategori</option>';

        // Filter sub kategori berdasarkan kategori yang dipilih
        var filteredSubKategori = {!! json_encode($assessment_sub_kategori->groupBy('assessment_kategori_id')->toArray(), JSON_HEX_TAG) !!}[kategoriId] || [];

        // Tambahkan opsi sub kategori yang sesuai dengan filter
        filteredSubKategori.forEach(function(subKategori) {
            var option = document.createElement('option');
            option.value = subKategori.id;
            option.textContent = subKategori.nama;
            subKategoriSelect.appendChild(option);
        });
    });
</script>
@endsection
