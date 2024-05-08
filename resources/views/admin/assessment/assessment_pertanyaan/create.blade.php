@extends('admin.layouts.master')

@section('content')
<form action="{{ route('assessment_pertanyaan.store') }}" method="POST">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Assessment Pertanyaan</h5>
            <br><hr style="color: orange; height: 0.5px;"><br>
            @csrf
            <div class="form-group mb-4">
                <label>Kategori</label>
                <select id="assessment_kategori" name="assessment_kategori_id" class="form-control mt-2" required oninvalid="this.setCustomValidity('Field ini tidak boleh kosong. Silakan isi.')" oninput="setCustomValidity('')"></select>
            </div>
            <div class="form-group mb-4">
                <label>Sub Kategori</label>
                <select id="assessment_sub_kategori" class="form-control mt-2" name="assessment_sub_kategori_id" required oninvalid="this.setCustomValidity('Field ini tidak boleh kosong. Silakan isi.')" oninput="setCustomValidity('')"></select>
            </div>
            <div class="form-group mb-4">
                <label for="pertanyaan">Pertanyaan</label>
                <textarea name="pertanyaan" id="pertanyaan" cols="30" rows="5" class="form-control mt-2" placeholder="Tulis Pertanyaan" required oninvalid="this.setCustomValidity('Field ini tidak boleh kosong. Silakan isi.')" oninput="setCustomValidity('')"></textarea>
            </div>
            <div class="form-group mb-4">
                <label for="jumlah_jawaban">Jumlah Jawaban</label>
                <div class="row g-3 mt-2">
                    <div class="col-3">
                        <input type="number" class="form-control" id="jumlah_jawaban" name="jumlah_jawaban" min="1" max="5" placeholder="Jumlah" required oninvalid="this.setCustomValidity('Field ini tidak boleh kosong. Silakan isi.')" oninput="setCustomValidity('')">
                    </div>
                    <div class="col-3">
                        <button type="button" style="width: 100px; padding: 5px 10px; background-color: #C17D2D; color: #fff; border-radius: 10px; border: none" id="tambah-jawaban">Tambah</button>
                    </div>
                </div>
            </div>
            {{-- <div id="jawaban-container">
                <!-- Container untuk field input jawaban -->
            </div> --}}
            {{-- <div class="row g-3 justify-content-end mt-2">
                <a href="/admin/assessment" role="button" class="btn col-auto me-4" style="width: 100px; padding: 5px 10px; background-color: #fff; color: #C17D2D; ">Batal</a>
                <button type="submit" style="width: 100px; padding: 5px 10px; background-color: #552525; color: #fff; border-radius: 10px; border-color: #C17D2D">Simpan</button>
            </div> --}}
        </div>
    </div>

    <div id="jawaban" class="card" hidden>
        <div class="card-body">
            <h5 class="card-title">Jawaban</h5>
            <div id="jawaban-container">
                <!-- Container untuk field input jawaban -->
            </div>
            <div class="row g-3 justify-content-end mt-2">
                <a href="/admin/assessment" role="button" class="btn col-auto me-4" style="width: 100px; padding: 5px 10px; background-color: #fff; color: #C17D2D; ">Batal</a>
                <button type="submit" style="width: 100px; padding: 5px 10px; background-color: #552525; color: #fff; border-radius: 10px; border-color: #C17D2D">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    document.getElementById('tambah-jawaban').addEventListener('click', function() {
        var jawabanCard = document.getElementById('jawaban');
        jawabanCard.removeAttribute('hidden');
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
                    <input type="text" class="form-control" name="jawaban[]" required oninvalid="this.setCustomValidity('Field ini tidak boleh kosong. Silakan isi.')" oninput="setCustomValidity('')">
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

