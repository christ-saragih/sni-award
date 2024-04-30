
<div class="content-kontak py-5 mb-5">
    <div class="d-flex align-items-center gap-2">
    <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Tambahkan Kontak Penghubung</h3>
    <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
    <i id="iconTambah" class="fa fa-plus-square fa-2x" style="color: #552525; cursor: pointer;"></i>
    </div>
</div>
<section id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
    @php
        $jumlah_kontak = count($peserta_kontak)
    @endphp
    @foreach ($peserta_kontak as $peserta_kontak)
        <form  method="POST" action="{{ $jumlah_kontak<2?route('peserta.profil.kontak'):'' }}"> 
    
            @csrf
    
            @if (session('error'))
                <div class="alert alert-danger w-100" role="alert">
                {{ session('error') }}
                </div>
            @elseif (session('success'))
                <div class="alert alert-success w-100" role="alert">
                {{ session('success') }}
                </div>
            @endif  
    
            <div class="content-kontak-form mb-5">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-xl-12">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body" style="display:;">
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
                                    <div class="col-md-8 pe-5">
                                    <input value="{{$peserta_kontak->nama}}" type="text" name="nama" class="form-control form-control-lg" />
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                    <h6 class="mb-0">Nomor Telepon</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                    <input value="{{$peserta_kontak->no_hp}}" type="text" name="no_hp" class="form-control form-control-lg" />
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-md-4 ps-5">
                                    <h6 class="mb-0">Jabatan</h6>
                                    </div>
                                    <div class="col-md-8 pe-5">
                                    <input value="{{$peserta_kontak->jabatan}}" type="text" name="jabatan" class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="px-5 py-4 d-flex justify-content-end gap-3">
                        <a href="/peserta/profil" role="button" class="btn nonactive" style="width: 13%;">Batal</a>
                        <button type="submit" class="btn" style="width: 13%;">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
</section>