@extends('admin.layouts.master')

@section('content')
<form action="{{ route('assessment_pertanyaan.update', $pertanyaan->id) }}" method="POST">
        <div class="card mb-3 p-4">
            <div class="mb-4">
                <div class="">
                    <h4 class="fw-bold">Edit Pertanyaan</h4>
                    <br><hr style="color: orange; height: 0.5px;"><br>
                </div>
                <div class="px-3 pt-0 pb-2 fw-bold">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label for="assessment_kategori">Kategori</label>
                        <select id="assessment_kategori" class="form-control mt-2">
                            <option value="">Pilih Kategori</option>
                            {{-- @foreach($assessment_kategori as $kategori)
                            <option value="{{ $kategori->id }}" {{ $pertanyaan->assessment_sub_kategori->assessment_kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                            @endforeach --}}
                            <option value="{{ $pertanyaan->assessment_sub_kategori->assessment_kategori->id }}" selected>{{ $pertanyaan->assessment_sub_kategori->assessment_kategori->nama }}</option>
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
                    </div>
                    <div class="form-group mb-4">
                        <label for="jumlah_jawaban">Jumlah Jawaban</label>
                        <div class="row g-3 mt-2">
                            <div class="col-3">
                                <input type="number" class="form-control" id="jumlah_jawaban" name="jumlah_jawaban" min="1" max="5" value="{{ $jumlah_jawaban }}">
                            </div>
                            <div class="col-3">
                                <button type="button" style="width: 100px; padding: 5px 10px; background-color: #C17D2D; color: #fff; border-radius: 10px; border: none" id="tambah-jawaban">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div id="jawaban" class="card">
        <div class="card-body">
            <h5 class="card-title">Jawaban</h5>
            <div id="jawaban-container">
                @foreach($jawaban as $jawaban)
                <div class="row text-center align-items-center my-3">
                    <div class="col-3">
                        <label for="jawaban" style="color: #9FAFBF; border-style: groove; padding: 5px 10px;">{{ chr(65 + $loop->index) }}</label>
                    </div>
                    <div class="col-9">
                        {{-- <input type="text" class="form-control" name="jawaban[]" required> --}}
                        <input type="text" class="form-control mt-2" name="jawaban[]" value="{{ $jawaban->jawaban }}" required>
                    </div>
                    {{-- <label for="jawaban">Jawaban {{ $loop->iteration }}</label> --}}
                </div>
                @endforeach
            </div>
            <div class="row g-3 justify-content-end mt-2">
                <a href="/admin/assessment" role="button" class="btn col-auto me-4" style="width: 100px; padding: 5px 10px; background-color: #fff; color: #C17D2D; ">Batal</a>
                <button type="submit" style="width: 100px; padding: 5px 10px; background-color: #552525; color: #fff; border-radius: 10px; border-color: #C17D2D">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    // document.getElementById('tambah-jawaban').addEventListener('click', function() {
    //     var container = document.getElementById('jawaban-container');
    //     var jumlahJawaban = document.getElementById('jumlah_jawaban').value;
    //     container.innerHTML = ''; // Bersihkan kontainer sebelum menambahkan input jawaban baru

    //     var totalPoin = 0; // Inisialisasi total poin

    //     for (var i = 0; i < jumlahJawaban; i++) {
    //         var group = document.createElement('div');
    //         group.classList.add('form-group', 'jawaban-group', 'mb-4');
    //         group.innerHTML = `
    //             <label for="jawaban">Jawaban ${i+1}</label>
    //             <input type="text" class="form-control mt-2" name="jawaban[]" required>
    //         `;
    //         container.appendChild(group);
    //     }
    // });
    document.getElementById('tambah-jawaban').addEventListener('click', function() {
        var container = document.getElementById('jawaban-container');
        var jumlahJawaban = document.getElementById('jumlah_jawaban').value;
        container.innerHTML = ''; // Bersihkan kontainer sebelum menambahkan input jawaban baru

        var totalPoin = 0; // Inisialisasi total poin

        var hurufAbjad = 'abcdefghijklmnopqrstuvwxyz'.toUpperCase().split('');

        for (var i = 0; i < jumlahJawaban; i++) {
            var group = document.createElement('div');
            group.classList.add('row', 'text-center', 'align-items-center', 'my-3');
            group.innerHTML = `
                <div class="col-3">
                    <label for="jawaban" style="color: #9FAFBF; border-style: groove; padding: 5px 10px;">${hurufAbjad[i]}</label>
                </div>
                <div class="col-9">
                    <input type="text" class="form-control" name="jawaban[]" required>
                </div>
            `;
            container.appendChild(group);
        }
    });

    $(document).ready(function() {
        $('#assessment_kategori').select2({
            theme: 'bootstrap-5',
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder:'Pilih Assessment Kategori',
            ajax: {
                url: "{{route('getAssessmentKategori')}}",
                processResults: function({data}) {
                    return {
                        results: $.map(data, function(item){
                            return {
                                id: item.id,
                                text: item.nama
                            }
                        })
                    }
                }
            }
        });

        $('#assessment_kategori').change(function() {
            var id = $('#assessment_kategori').val();
            // console.log(id);

            $('#assessment_sub_kategori').select2({
                theme: 'bootstrap-5',
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder:'Pilih Assessment Sub Kategori',
                ajax: {
                    url: "{{url('admin/get_assessment_sub_kategori')}}/"+ id,
                    processResults: function({data}) {
                        console.log({data});
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            })
                        }
                    }
                }
            });
        });
    });

    // $(document).ready(function() {
    //     $('#assessment_kategori').on('change', function() {
    //         var assessment_kategori_id = $(this).val();
    //         var sub_kategori_select = $('#assessment_sub_kategori');

    //         // Kosongkan opsi sub kategori
    //         sub_kategori_select.empty().append('<option value="">Pilih Sub Kategori</option>');

    //         // Kirim permintaan Ajax
    //         $.ajax({
    //             url: '/get-sub-kategori-by-kategori',
    //             type: 'GET',
    //             data: {
    //                 assessment_kategori_id
    //             },
    //             success: function(response) {
    //                 $.each(response, function(index, assessment_sub_kategori) {
    //                     sub_kategori_select.append('<option value="' + assessment_sub_kategori.id + '">' + assessment_sub_kategori.nama + '</option>');
    //                 });
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error('Error:', error);
    //             }
    //         });
    //     });
    // });
</script>
@endsection
