<!-- pop up hapus start -->
<div class="modal fade" id="hapusDokumentasi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_hapus_dokumentasi" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Hapus Dokumentasi</h1>
            </div>
            <div class="modal-body" style="border: none;">
                <p>Apakah Anda yakin menghapus item ini?</p>
            </div>
            <div class="modal-footer gap-2" style="border: none;">
                <div class="btn btn-warning nonactive"  data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Tidak</div>
                <button type="submit" class="btn btn-danger" data-bs-toggle="modal">Ya</button>
            </div>
        </form>
    </div>
</div>
<!-- pop up hapus end -->