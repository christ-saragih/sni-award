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
        <form action="">
            <select name="assessment_kategori" id="" class="kategori-select">
                @foreach ($assessment_kategori as $key=>$ak)
                    <option value="{{ $ak->id }}" {{ $key==0 ? 'selected' : '' }} class="kategori-option">{{ $ak->nama }}</option>
                @endforeach
            </select>
        </form>
    </div>
    {{-- end head --}}
</div>
<script>
    $(document).ready(() => {

    })
</script>