@extends('admin.layouts.master')

@section('content')


<div class="tab-pane" role="tabpanel">
  <div class="content-profil pt-4 pb-5">
      <div class="container mt-4">
        <table class="table">
          <thead>
          <tr>
            <th class="ps-3" scope="col">No</th>
            <th scope="col">Nama Peserta</th>
            <th scope="col">Email</th>
            <th scope="col">No. Telepon</th>
            <th scope="col">NPWP</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
          </thead>
          <tbody>

            
            <tr>
              <th class="ps-3" scope="row">1</th>
              <td>Iqna</td></td>
              <td>pertamina@gmail.com</td>
              <td>08123456789</td>
              <td>123asdfghj</td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <button class="btn btn-ubah" data-bs-toggle="modal" role="button">Detail</button>
                </div>
              </td>
            </tr>

            <tr>
              <th class="ps-3" scope="row">2</th>
              <td>Hafis</td></td>
              <td>wilmar.nabati.indonesia@gmail.com</td>
              <td>08123456789</td>
              <td>123asdfghj</td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <button class="btn btn-ubah" data-bs-toggle="modal" role="button">Detail</button>
                </div>
              </td>
            </tr>

            <tr>
              <th class="ps-3" scope="row">3</th>
              <td>Ben</td></td>
              <td>adhya.tirta.batam@gmail.com</td>
              <td>08123456789</td>
              <td>123asdfghj</td> 
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <button class="btn btn-ubah" data-bs-toggle="modal" role="button">Detail</button>
                </div>
              </td>
            </tr>

        

          </tbody>
        </table>
      </div>
  </div>
</div>


@endsection