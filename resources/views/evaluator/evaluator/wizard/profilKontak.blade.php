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
        content: ': ';
        font-weight: bold;
    }
</style>
@foreach ($peserta->peserta_kontak as $key=>$pk)
    @if ($key != 0)
        <hr/>
    @endif
    <div class="content-profil py-5 mb-5">
        {{-- head --}}
        <div class="row mb-5">
            <div class="col-4">
                <label class="fs-4 fw-bold">Kontak Penghubung {{ $loop->iteration }}</label>
            </div>
            <div class="col-8">
                <br>
                <hr style="width: 100%; height: 1px; background-color: #CC9305;">
            </div>
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