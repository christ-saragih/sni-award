<form action="/admin/assessment?tab=assessment_pertanyaan&kategori=Kepemimpinan" method="GET">
    <div class="form-group">
        <input type="text" name="tab" style="display: none !important;" value="{{ request()->query('tab') }}">

        <label for="kategori">Kategori:</label>
        <select name="kategori" id="kategori" class="form-control">
            <option value="">Pilih Kategori</option>
            @foreach ($assessment_kategori_all as $kategori)
                <option value="{{ $kategori->nama }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="mt-2 btn btn-primary">Filter</button>
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
