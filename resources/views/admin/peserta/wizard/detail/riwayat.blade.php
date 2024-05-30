<div>
    <div class="d-flex align-items-center gap-3">
        <a href="/admin/peserta" class="btn" style="width: fit-content">&#8617;</a>
        <h3 class="p-0 m-0">Riwayat SNI Award</h3>
        <hr class="garis-tambah">
    </div>
    <div class="p-5">
        <table class="w-100">
            <thead>
                <tr style="font-weight: bold">
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Status</th>
                    <th>Pesan</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($peserta->registrasi)
                    @foreach ($peserta->registrasi as $reg)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reg->tahun }}</td>
                            <td>{{ $reg->status->nama }}</td>
                            <td>{{ $reg->stage->nama }}</td>
                            <td>{{ $reg->kategori_organisasi->nama }}</td>
                            <td>
                                <a href="#" class="btn btn-detail" role="button">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>