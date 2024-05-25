<form action="" method="GET">
    <div class="row align-items-center">
        <div class="col-9">
            <div class="form-group">
                <select name="kategori" id="kategori" class="form-control">
                    <option value="">Pilih Kategori</option>
                    @foreach ($assessment_kategori_all as $kategori)
                        <option value="{{ $kategori->nama }}" {{ request('kategori') == $kategori->nama ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>
</form>

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
                <button onclick="openModalHapusPertanyaan('{{ $ap->id }}')" class="btn btn-hapus">Hapus</button>
            </div>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="pagination justify-content-center">
    {{ $assessment_pertanyaan->withQueryString()->links() }}
</div>
