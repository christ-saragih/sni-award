@extends('admin.layouts.master')
@section('content')
<style>
    form input, form select {
        padding: 2px 5px;
        border-radius: 5px;
        border: 1px solid lightgray;
    }
    .data{
        padding: 2px 5px;
        border: 1px solid lightgray;
        border-radius: 5px;
        background-color: #efefef50;
    }
</style>
<main>
    <form class="card px-4 py-4" method="POST" action="/admin/internal/edit/{{ $internal->id }}">
        @method('PUT')
        @csrf
        <div class="d-flex gap-4">
            {{-- <span>Nama&emsp;:</span><input type='text' name='name' value="{{ $internal->name }}" disabled required/> --}}
            <span>Nama&emsp;:</span>
            <div class="data">{{ $internal->name }}</div>
        </div>
        <div class="d-flex gap-4">
            {{-- <span>Email&emsp;:</span><input type='text' name="email" value="{{ $internal->email }}" disabled required/> --}}
            <span>Email&emsp;:</span>
            <div class="data">{{ $internal->email }}</div>
        </div>
        <div class="d-flex gap-4">
            <span>Peran&emsp;:</span>
            <select name="role" id="">
                @foreach ($all_role as $ar)
                    <option value="{{ $ar->id }}" {{ ($internal->role == $ar->id)?'selected':'' }}>{{ $ar->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex gap-4">
            <span>No. Telepon&emsp;:</span>
            <div class="data">{{ $internal->user_profil->no_hp }}</div>
            {{-- <input type='text' value='{{ $internal->user_profil->no_hp }}' disabled/> --}}
        </div>
        <div class="d-flex gap-4">
            <span>NPWP&emsp;:</span>
            <div class="data">{{ $internal->user_profil->npwp }}</div>
            {{-- <input type='text' value='{{ $internal->user_profil->npwp }}' disabled/> --}}
        </div>
        <div class="d-flex gap-4">
            <span>No. Rekening&emsp;:</span>
            <div class="data">{{ $internal->user_profil->no_rekening }}</div>
            {{-- <input type='text' value='{{ $internal->user_profil->no_rekening }}' disabled/> --}}
        </div>
        <div class="d-flex gap-4">
            <span>Bukti Anti Penyuapan&emsp;:</span><span><a href="{{ $internal->user_profil->url_anti_penyuapan }}" target="_blank">{{ $internal->user_profil->url_anti_penyuapan }}</a></span>
        </div>

        <br><br>
        <div>
            <input type="checkbox" name="verified_at" id="verifikasi" value="{{ date('Y-m-d H:i:s') }}">
            <label for="verifikasi">Verifikasi</label>
        </div>
        
        <div class="d-flex justify-content-end gap-2">
            <a href="/admin/internal/{{ $internal->id }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</main>
@endsection