@extends('admin.layouts.master')
@section('content')
    <main>
        <style>

        </style>
        <section class="bg-light container-fluid rounded rounded-lg px-4 py-4">
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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $peserta->nama }}</td>
                            <td>{{ $peserta->email }}</td>
                            <td>-</td>
                            <td>
                                <button class="btn" role="button" style="background-color: #E59B30; font-weight: 600;">Detail</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection