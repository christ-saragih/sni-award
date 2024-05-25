<style>
    .kontak-row {
        display: flex;
        align-items: center;
        gap: 30px;
    }
    .kontak-field {
        font-weight: bold;
        text-transform: capitalize;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .kontak-record {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .kontak-record div::before {
        content: ':';
        font-weight: bold;
        margin-right: 15px;
    }
</style>
@foreach ($peserta->peserta_kontak as $key=>$pk)
    @if ($key != 0)
        <hr/>
    @endif
    <div class="content-profil py-5 mb-5">
        {{-- head --}}
        <div class="d-flex align-items-center gap-3 mb-5">
            <label class="fs-4 fw-bold">Kontak Penghubung {{ $loop->iteration }}</label>
            <hr class="flex-grow-1" style="height: 1px; background-color: #CC9305;">
        </div>
        {{-- end head --}}
        {{-- content --}}
        <div class="px-5">
            <div class="kontak-row">
                <div class="kontak-field">
                    <div>Nama Penghubung</div>
                    <div>No Handphone</div>
                    <div>Jabatan</div>
                </div>
                <div class="kontak-record">
                    <div>{{ $pk->nama }}</div>
                    <div>{{ $pk->no_hp }}</div>
                    <div>{{ $pk->jabatan }}</div>
                </div>
            </div>
        </div>
        {{-- end content --}}
    </div>
@endforeach