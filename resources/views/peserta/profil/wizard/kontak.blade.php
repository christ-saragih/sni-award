@if (session('error'))
    <div class="alert alert-danger w-100" role="alert">
    {{ session('error') }}
    </div>
@elseif (session('success'))
    <div class="alert alert-success w-100" role="alert">
    {{ session('success') }}
    </div>
@endif 

<section id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
    @php
        $jumlah_kontak = count($peserta_kontak)
    @endphp
    <div class="content-kontak py-5 mb-5">
        <div class="d-flex align-items-center gap-2">
        <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Tambahkan Kontak Penghubung</h3>
        <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
        <div onclick="handleAddForm({{$jumlah_kontak}})" style="cursor: pointer">
            <i id="iconTambah" class="fa fa-plus-square fa-2x" style="color: #552525; cursor: pointer;"></i>
        </div>
        </div>
    </div>
    {{-- add --}}
    <form  method="POST" id="tambah-kontak-penghubung" action="{{ $jumlah_kontak<2?route('peserta.profil.kontak'):'' }}" style="display: none"> 
        @csrf 

        <div class="content-kontak-form mb-5">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body" style="display:;">
                            <div class="row pt-4 pb-4">
                                <div class="ps-5 d-flex flex-column gap-3">
                                    <h6 class="mb-0">Kontak Penghubung Baru</h6>
                                    <hr class="p-0 flex-fill" style="height: 1px; background-color: #9FAFBF;">
                                </div>
                                
                            </div>
                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-4 ps-5">
                                <h6 class="mb-0">Nama Penghubung</h6>
                                </div>
                                <div class="col-md-8 pe-5">
                                <input type="text" name="nama" class="form-control form-control-lg" id="addPenghubung" />
                                </div>
                            </div>
                            <div class="row align-items-center pb-3">
                                <div class="col-md-4 ps-5">
                                <h6 class="mb-0">Nomor Telepon</h6>
                                </div>
                                <div class="col-md-8 pe-5">
                                <input type="text" name="no_hp" class="form-control form-control-lg" id="addPenghubung" />
                                </div>
                            </div>
                            <div class="row align-items-center pb-3">
                                <div class="col-md-4 ps-5">
                                <h6 class="mb-0">Jabatan</h6>
                                </div>
                                <div class="col-md-8 pe-5">
                                <input type="text" name="jabatan" class="form-control form-control-lg" id="addPenghubung" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="px-5 py-4 d-flex justify-content-end gap-3">
                    <button type="button" class="btn nonactive" onclick="handleCloseForm()" style="width: 13%;">Batal</button>
                    <button type="submit" class="btn" style="width: 13%;">Simpan</button>
                </div>
            </div>
        </div>
    </form>
    {{-- end add --}}

    {{-- nanti ganti ke route update --}}
    @foreach ($peserta_kontak as $peserta_kontak)
        <form method="POST" action="{{ route('peserta.profil.kontak.ubah', $peserta_kontak->id) }}"> 
            @method('PUT')
            @csrf 
    
            <div class="content-kontak-form mb-5">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-xl-12">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body">
                                <div class="row pt-4 pb-4">
                                    <div class="ps-5 d-flex flex-column gap-3">
                                        <h6 class="mb-0">Kontak Penghubung {{$loop->iteration}}</h6>
                                        <hr class="p-0 flex-fill" style="height: 1px; background-color: #9FAFBF;">
                                    </div>
                                </div>
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-4 ps-5">
                                    <h6 class="mb-0">Nama Penghubung</h6>
                                    </div>
                                    <div class="col-md-8 pe-5" style="font-size: 18px; padding: 10px 15px;">
                                        <span class="view-mode">{{$peserta_kontak->nama}}</span>
                                        <input value="{{$peserta_kontak->nama}}" type="text" name="nama" class="form-control form-control-lg edit-mode" style="display: none;" />
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                    <h6 class="mb-0">Nomor Telepon</h6>
                                    </div>
                                    <div class="col-md-8 pe-5" style="font-size: 18px; padding: 10px 15px;">
                                    <span class="view-mode">{{$peserta_kontak->no_hp}}</span>
                                    <input value="{{$peserta_kontak->no_hp}}" type="text" name="no_hp" class="form-control form-control-lg edit-mode" style="display: none;" />
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                    <h6 class="mb-0">Jabatan</h6>
                                    </div>
                                    <div class="col-md-8 pe-5" style="font-size: 18px; padding: 10px 15px;">
                                    <span class="view-mode">{{$peserta_kontak->jabatan}}</span>
                                    <input value="{{$peserta_kontak->jabatan}}" type="text" name="jabatan" class="form-control form-control-lg edit-mode" style="display: none;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="px-5 py-4 d-flex justify-content-end gap-3"> 
                        @if ($loop->count>1)
                            <button type="button" class="btn nonactive" style="cursor: pointer;" onclick="handleSubmitDeleteForm({{$loop->iteration}})">Hapus</button> 
                        @endif
                        <button type="button" class="btn edit-button" style="width: 13%;" onclick="toggleEdit(this)">Edit</button>
                        <button type="button" class="btn cancel-button" style="width: 13%; display: none;" onclick="toggleEdit(this, true)" >Batal</button>
                        <button type="submit" class="btn save-button" style="width: 13%; display: none;">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
        <form method="POST" action="{{ route('peserta.profil.kontak.hapus', $peserta_kontak->id) }}" id="deleteForm{{$loop->iteration}}">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
    {{-- nanti ganti ke route update --}}
</section>

<script>
    // Get the form element with the id 'tambah-kontak-penghubung'
    const form = document.getElementById('tambah-kontak-penghubung')

    /**
     * This function handles the display of the add contact form.
     * It takes a single parameter 'jumlahKontak' (number of contacts) and checks if it is less than 2.
     * If true, it sets the display style of the form to 'block', making it visible.
     * @param {number} jumlahKontak - The number of contacts.
     */
    const handleAddForm = (jumlahKontak) =>  {
        if (jumlahKontak < 2) {
            form.style.display = 'block'
        }
    }

    /**
     * This function handles the closing of the add contact form.
     * It clears the values of all input elements with the id 'addPenghubung' and sets the display style of the form to 'none', effectively hiding the form.
     */
    const handleCloseForm = () => {
        const addPenghubungInput = document.querySelectorAll('#addPenghubung')
        addPenghubungInput.forEach(item => {
            item.value = ''
        });
        form.style.display = 'none'
    }

    /**
     * This function handles the submission of the delete form.
     * It takes a single parameter 'iteration' and retrieves an HTML form element with the id 'deleteForm' followed by the value of 'iteration'.
     * It then submits the form.
     * @param {number} iteration - The iteration number.
     */
    // const handleSubmitDeleteForm = (iteration) => {
    //     const form = document.getElementById(`deleteForm${iteration}`)
    //     form.submit()
    // }
    function toggleEdit(button, cancel = false) {
        const form = button.closest('form');
        const spans = form.querySelectorAll('.view-mode');
        const inputs = form.querySelectorAll('.edit-mode');
        const editButton = form.querySelector('.edit-button');
        const saveButton = form.querySelector('.save-button');
        const cancelButton = form.querySelector('.cancel-button');

    if (cancel) {
        spans.forEach(span => {
            span.style.display = 'block';
        });
        inputs.forEach(input => {
            input.style.display = 'none';
        });
        editButton.style.display = 'block';
        saveButton.style.display = 'none';
        cancelButton.style.display = 'none';
    } else { 
        spans.forEach(span => {
            span.style.display = 'none';
        });
        inputs.forEach(input => {
            input.style.display= 'block';
        });
        editButton.style.display = 'none';
        saveButton.style.display = 'block';
        cancelButton.style.display = 'block';

        // button.style.display = 'none';
        // button.nextElementSibling.style.display = 'block';
        }
    }
    function handleSubmitDeleteForm(formId) {
        // Submit form penghapusan
        $('#deleteForm'+formId).submit();
    }
</script>