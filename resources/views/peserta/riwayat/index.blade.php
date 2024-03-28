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
        <tr>
          <td>1</td>
          <td>2023</td>
          <td>Aktif</td>
          <td>Stage</td>
          <td>Organisasi</td>
          <td class="text-center">
            <div class="btn-group dropend">
              <a href="{{ route('riwayat.detail') }}">
                <button class="btn button-detail" type="button">
                  Detail
                </button>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>2023</td>
          <td>Aktif</td>
          <td>Stage</td>
          <td>Organisasi</td>
          <td class="text-center">
            <div class="btn-group dropend">
              <a href="{{ route('riwayat.detail') }}">
                <button class="btn button-detail" type="button">
                  Detail
                </button>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>2023</td>
          <td>Aktif</td>
          <td>Stage</td>
          <td>Organisasi</td>
          <td class="text-center">
            <div class="btn-group dropend">
              <a href="{{ route('riwayat.detail') }}">
                <button class="btn button-detail" type="button">
                  Detail
                </button>
              </a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>

@endsection