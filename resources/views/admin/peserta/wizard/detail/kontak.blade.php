<div>
    <div class="d-flex align-items-center gap-3">
        <a href="/admin/peserta" class="btn" style="width: fit-content">&#8617;</a>
        <h3 class="p-0 m-0">Kontak Penghubung</h3>
        <hr class="flex-grow-1" style="height: 3px; background-color: #E1A600;">
    </div>
    @if (count($peserta->peserta_kontak)>0)
        @foreach ($peserta->peserta_kontak as $pk)
            <div class="p-5">
                <div>
                    <h5>Kontak Penghubung {{ $loop->iteration }}</h5>
                    <hr style="top: 8px; height: 1.5px; background-color: #aaa;">
                </div>
                <div class="mt-5 d-flex align-items-center justidy-content-center" style="gap: 50px;">
                    <div style="font-weight: bold;">
                        <div>Nama Penghubung</div>
                        <div>No. Telfon</div>
                        <div>Jabatan</div>
                    </div>
                    <div>
                        <div>:&emsp;{{ $pk->nama }}</div>
                        <div>:&emsp;{{ $pk->no_hp }}</div>
                        <div>:&emsp;{{ $pk->jabatan }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>