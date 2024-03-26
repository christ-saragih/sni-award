@extends('admin.layouts.master')
@section('content')
    <style>
        td>a {
            background-color: #E59B30 !important;
            color: white !important;
            border: none !important;
        }

        section {
            border-radius: 20px !important;
            padding-inline: 70px !important;
        }

        .container-dropdown-internal button.dropdown-toggle {
            background-color: #552525 !important;
            border-radius: 10px !important;
            color: white;
            font-weight: bold;
            font-size: 112.5%;
            padding-inline: 1rem;

        }

        .container-dropdown-internal ul.dropdown-menu {
            border: 2px solid #3b1919;
            border-radius: 10px;
            margin-left: 9px !important;
            min-width: 5.5rem !important;
        }

        .container-dropdown-internal ul.dropdown-menu.show {
            margin-top: 45px !important;
        }

        .container-dropdown-internal .dropdown-item {
            margin-inline: 0px !important;
            color: #231F20;
            font-family: "Arimo", sans-serif;
            font-size: 112.5%;
        }

        .container-dropdown-internal .dropdown-item:hover {
            background-color: transparent;
        }
    </style>
    <main>
        <ul class="nav nav-tabs d-flex gap-2 text-center" id="tabs-profil" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="evaluator-tab-0" data-bs-toggle="tab" href="#evaluator-tabpanel-0" role="tab" aria-controls="evaluator-tabpanel-0" aria-selected="true">Evaluator</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="lead-evaluator-tab-1" data-bs-toggle="tab" href="#lead-evaluator-tabpanel-1" role="tab" aria-controls="lead-evaluator-tabpanel-1" aria-selected="false" tabindex="-1">Lead Evaluator</a>
            </li>
        </ul>
        <hr class="p-0">
        <div class="tab-content" id="tab-content">
            <section class="tab-pane active bg-light container-fluid py-5" id="evaluator-tabpanel-0" role="tabpanel" aria-labelledby="evaluator-tab-0">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="mb-0" style="font-size: 150%; font-weight: bold;">Data Evaluator</h3>
                    <div class="dropdown container-dropdown-internal">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Tahun
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">2024</a></li>
                            <li><a class="dropdown-item" href="#">2023</a></li>
                            <li><a class="dropdown-item" href="#">2022</a></li>
                            <li><a class="dropdown-item" href="#">2021</a></li>
                        </ul>
                    </div>
                </div>
                
                <table class="table align-items-center mt-4 mb-0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telfon</th>
                            <th>NPWP</th>
                            <th class="text-center">Aksi</th>
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
                                <td class="text-center">
                                    <a href="/admin/internal/{{ $internal->id }}" class="btn" role="button">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

            <section class="tab-pane bg-light container-fluid rounded rounded-lg px-4 py-4" id="lead-evaluator-tabpanel-0" role="tabpanel" aria-labelledby="lead-evaluator-tab-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telfon</th>
                            <th>NPWP</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($internal as $internal) --}}
                        <tr>
                                <td>{{-- $loop->iteration --}}</td>
                                <td>{{-- $internal->name --}}</td>
                                <td>{{-- $internal->email --}}</td>
                                <td>{{-- $internal->user_profil->no_hp --}}</td>
                                <td>{{-- $internal->user_profil->npwp --}}</td>
                                <td class="text-center">
                                    {{-- <a href="/admin/internal/{{-- $internal->id --}}" class="btn" role="button">Detail</a> --}}
                                </td>
                            </tr>
                        {{-- @endforeach --}}

                    </tbody>
                </table>
            </section>
        </div>
        
    </main>
@endsection