@extends('admin.layouts.master')
@section('content')
    <main>
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
                            {{-- <td>-</td> --}}
                            <td>{{ 
                                $peserta->peserta_profil ? 
                                    $peserta->peserta_profil->no_hp ? 
                                        $peserta->peserta_profil->no_hp 
                                        : '-'
                                    : '-' 
                            }}</td>
                            <td>
                                <a href="/admin/peserta/{{ $peserta->id }}" class="btn" role="button">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection