@extends('admin.layouts.master')
@section('content')
    <style>
        td>a {
            background-color: #E59B30 !important;
            color: black !important;
            border: none !important;
        }
        td>a:hover{
            color: white !important;
        }
    </style>
    <main>
        <section class="bg-light container-fluid rounded rounded-lg px-4 py-4">
            <table class="table align-items-center mb-0 text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telfon</th>
                        <th>NPWP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($internal as $internal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $internal->name }}</td>
                            <td>{{ $internal->email }}</td>
                            <td>{{ $internal->user_profil->no_hp }}</td>
                            <td>{{ $internal->user_profil->npwp }}</td>
                            <td>
                                <a href="/admin/internal/{{ $internal->id }}" class="btn" role="button">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection