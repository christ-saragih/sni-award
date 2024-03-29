<form  method="POST" action="/peserta/profil" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
    @method('PUT')
    @csrf
    <div class="content-ubah-password pt-5 mb-5">
        <div class="d-flex align-items-center gap-2">
        <h3 class="mb-0 pb-0" style="font-size: 150%; font-weight: bold; color: #000000;">Ubah Kata Sandi</h3>
        <hr class="p-0 flex-fill" style="height: 1px; background-color: #CC9305;">
        </div>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
        <div class="col-xl-12">
            <div class="card" style="border-radius: 15px;">
            <div class="card-body">
                <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-4 ps-5">
                    <h6 for= "kata_sandi_lama "class="mb-0">Kata Sandi Lama</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                    <input id="kata_sandi_lama "type="password" class="form-control form-control-lg" name="current_password" required />
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                    <h6 for= "kata_sandi_baru" class="mb-0">Kata Sandi Baru</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                    <input id="kata_sandi_baru "type="password" class="form-control form-control-lg" name="password" required autocomplete="new-password"/>
                    </div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-md-4 ps-5">
                    <h6 for= "konfirmasi_kata_sandi" class="mb-0">Konfirmasi Kata Sandi</h6>
                    </div>
                    <div class="col-md-8 pe-5">
                    <input id="konfirmasi_kata_sandi" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>
                <div class="px-5 py-4 d-flex justify-content-end gap-3">
                <button type="submit" class="btn nonactive" style="width: 13%;">Batal</button>
                <button type="submit" class="btn" style="width: 13%;">Simpan</button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</form>