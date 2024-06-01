<div>
    <div class="d-flex align-items-center gap-3">
        <a href="/admin/peserta" class="btn" style="width: fit-content">&#8617;</a>
        <h3 class="p-0 m-0">Kontak Penghubung</h3>
        <hr class="garis-tambah">
    </div>
    @if (count($peserta->peserta_kontak)>0)
        @foreach ($peserta->peserta_kontak as $pk)
            <div class="p-5">
                <div>
                    <h4 class="mb-3" style="font-size: 112.5%; font-weight: bold;">Kontak Penghubung {{ $loop->iteration }}</h4 style="font-size: 112.5%; font-weight: bold;">
                    <hr style="height: 1px; background-color: #9FAFBF;">
                </div>

                <div class="d-flex justify-content-around mb-5">
                    <div class="w-100 mt-5">
                        <div class="row-data mb-3">
                            <div class="head-data">Nama Penghubung</div>
                            <div class="body-data">{{ $pk->nama }}</div>
                        </div>
                        <div class="row-data mb-3">
                            <div class="head-data">No. Telepon</div>
                            <div class="body-data">{{ $pk->no_hp }}</div>
                        </div>
                        <div class="row-data mb-3">
                            <div class="head-data">Jabatan</div>
                            <div class="body-data">{{ $pk->jabatan }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>