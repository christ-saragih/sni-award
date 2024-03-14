{{-- @extends('admin.assessment.index') --}}

{{-- @section('content') --}}
<table class="table align-items-center mb-0 text-center">
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
    @foreach ($assessment_pertanyaan as $assessment_pertanyaan)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$assessment_pertanyaan->assessment_sub_kategori->assessment_kategori->nama}}</td>
        <td>{{$assessment_pertanyaan->assessment_sub_kategori->nama}}</td>
        <td>{{$assessment_pertanyaan->pertanyaan}}</td>
        <td>
            <form action="{{ route('assessment_pertanyaan.destroy', $assessment_pertanyaan->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('assessment_pertanyaan.edit', $assessment_pertanyaan->id) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{-- @endsection --}}
