@extends('peserta.layouts.master')

@section('content')
<div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
    <div class="content-profil">
        <div class="container mt-4 py-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Status</th>
                        <th scope="col">State</th>
                        <th scope="col">Kategori</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->status->nama }}</td>
                            <td>{{ $item->stage->nama }}</td>
                            <td>{{ $item->kategori_organisasi->nama }}</td>
                            <td class="text-center">
                                <div class="btn-group dropend">
                                <a href="{{ route('riwayat.detail', Crypt::encryptString($item->id)) }}">
                                    <button class="btn button-detail" type="button">
                                    Detail
                                    </button>
                                </a>
                                {{-- <a class="btn" style="padding: 5px 10px;border:none;background-color:#E59B30;border-radius:10px;" href="{{ route('pendaftar_sni_award.detail', Crypt::encryptString($cr->id)) }}">detail</a> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
