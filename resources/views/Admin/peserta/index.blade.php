@extends('Admin.layouts.master')
@section('content')
    <main>
        <style>

        </style>
        <section class="bg-light container-fluid rounded rounded-lg">
            <table class="table align-items-center mb-0 text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telfon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peserta as $peserta)
                        <tr>
                            <td>No.</td>
                            <td>{{ $peserta->nama }}</td>
                            <td>{{ $peserta->email }}</td>
                            <td>-</td>
                            <td>Aksi</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection