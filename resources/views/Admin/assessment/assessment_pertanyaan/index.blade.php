<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Kategori</th>
        <th>Sub Kategori</th>
        <th>Pertanyaan</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($assessment_pertanyaan as $ap)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$ap->assessment_sub_kategori->assessment_kategori->nama}}</td>
        <td>{{$ap->assessment_sub_kategori->nama}}</td>
        <td>{{$ap->pertanyaan}}</td>
        <td>
            <div class="d-flex justify-content-center gap-2">
                <a class="btn btn-ubah" href="{{ route('assessment_pertanyaan.edit', $ap->id) }}">Ubah</a>
                <button onclick="openModalHapusPertanyaan('{{ $ap->id }}', ' {{ $ap->pertanyaan }} ')" class="btn btn-hapus">Hapus</button>
            </div>
        </td>
    </tr>
    @endforeach
    <div id="hidden-data" style="display: none">
        <input type="hidden" id="id_pertanyaan">
        <input type="hidden" id="nama_pertanyaan">
    </div>
    </tbody>
</table>
