@extends('admin.layouts.master')

@section('content')

<!-- Pop up kategori -->
<div class="modal fade" id="tambahKategori" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Kategori</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <form action="" class="pb-0 mb-0">
          <div class="d-flex flex-column gap-2">
              <h6 class="ms-1 mb-0">Kategori</h6>
              <input type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Jenis Kategori" style="font-size: 100%;"/>
          </div>
        </form>
      </div>
      <div class="modal-footer gap-2" style="border: none;">
        <button class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
        <button class="btn" data-bs-toggle="modal" >Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Pop up sub kategori -->
<div class="modal fade" id="tambahSubKategori" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Sub Kategori</h1>
      </div>
      <div class="modal-body" style="border: none;">
        <form action="" class="d-flex flex-column gap-2 pb-0 mb-0">
          <div class="d-flex flex-column gap-2 mb-3">
            <h6 class="ms-1 mb-0">Kategori</h6>
            <select class="form-select form-control-lg ps-4" aria-label="Default select example">
              <option hidden>Pilih Kategori</option>
              <option value="1">Kepemimpinan</option>
              <option value="2">Strategi</option>
              <option value="3">Pelanggan</option>
              <option value="4">dan lain-lain..</option>
            </select>
          </div>
          <div class="d-flex flex-column gap-2">
            <h6 class="ms-1 mb-0">Sub Kategori</h6>
            <input type="text" class="form-control form-control-lg ps-4" placeholder="Tuliskan Sub Kategori" style="font-size: 100%;"/>
          </div>
        </form>
      </div>
      <div class="modal-footer gap-2" style="border: none;">
        <button class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
        <button class="btn" data-bs-toggle="modal" >Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Pop up pertanyaan -->
<div class="modal fade" id="tambahPertanyaan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Pertanyaan</h1>
      </div>
      <form action="{{ route('assessment_pertanyaan.store') }}" method="POST">
      <div class="modal-body" style="border: none;">
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
            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
        </div>
        <div class="modal-footer gap-2" style="border: none;">
            <button type="button" class="btn btn-primary" id="tambah-jawaban">Tambah Jawaban</button>
            <button class="btn nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
            <button type="submit" class="btn" data-bs-toggle="modal" >Simpan</button>
        </div>
    </form>
    </div>
  </div>
</div>


<ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Kategori</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false" tabindex="-1">Sub Kategori</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false" tabindex="-1">Pertanyaan</a>
    </li>
</ul>
{{-- <hr class="p-0"> --}}
<div class="tab-content" id="tab-content">
  <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
    <div class="content-profil py-5">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Kategori</h3>
        <a href="#tambahKategori" class="btn" data-bs-toggle="modal" role="button">+ Tambah Kategori</a>
      </div>
        <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assessment_kategori as $ak)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$ak->nama}}</td>
                    <td>
                        <form action="{{ route('assessment_pertanyaan.destroy', $ak->id) }}" method="POST">
                        <a class="btn btn-ubah" href="{{ route('assessment_pertanyaan.edit', $ak->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-hapus">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
  </div>

  <!-- Sub Kategori Section -->
<div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
  <div class="content-profil py-5">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Sub Kategori</h3>
      <a href="#tambahSubKategori" class="btn" data-bs-toggle="modal" role="button">+ Tambah Sub Kategori</a>
    </div>
      <div class="container mt-4">
        <table class="table">
          <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kategori</th>
            <th scope="col">Sub Kategori</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($assessment_sub_kategori as $ask)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$ask->assessment_kategori->nama}}</td>
                    <td>{{$ask->nama}}</td>
                    <td>
                        <form action="{{ route('assessment_pertanyaan.destroy', $ask->id) }}" method="POST">
                        <a class="btn btn-ubah" href="{{ route('assessment_pertanyaan.edit', $ask->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-hapus">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>

<!-- Pertanyaan Section -->
<div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
  <div class="content-profil py-5">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">Pertanyaan</h3>
      <a href="{{ route('assessment_pertanyaan.create') }}" class="btn">+ Tambah Pertanyaan</a>
    </div>
      <div class="container mt-4">
            @include('admin.assessment.assessment_pertanyaan.index')
      </div>
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

</script>
@endsection()

