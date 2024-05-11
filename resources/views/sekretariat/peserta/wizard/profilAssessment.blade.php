<style>
    .kategori-select {
        padding: 10px 20px;
        border: none;
        outline: none;
        background-color: #CC9305;
        border-radius: 15px;
        color: #fff;
        font-weight: bold;
    }
    .kategori-option {
        background-color: #fff;
        color: #000;
        font-weight: 500;
    }
</style>
<div class="content-profil py-5">
    {{-- head --}}
    <div class="d-flex align-items-center">
        {{-- <hr style="height: 5px;"> --}}
        <div style="width: 100%;height: 5px; border-radius: 10px; background-color: #CC9305;"></div>
        <select name="assessment_kategori" id="" class="kategori-select" oninput="handleChangeKategori(this, {{ $registrasi->id }})">
            @foreach ($assessment_kategori as $key=>$ak)
                <option value="{{ $ak->id }}" {{ $key==0 ? 'selected' : '' }} class="kategori-option">{{ $ak->nama }}</option>
            @endforeach
        </select>
    </div>
    {{-- end head --}}
</div>
<script>
    const handleChangeKategori = (e, registrasiId) => {
        // console.log({[e.name]: e.value});
        $.ajax({
            url: `/api/sekretariat/peserta/assessment/${registrasiId}`,
            data: {[e.name]: e.value},
            success: (res) => {
                console.log(res);
            },
            error: (err) => {
                console.log(err);
            }
        })
    }
</script>