
<div class="d-flex justify-content-between align-items-center">
    <h3 class="text-center mb-0 pb-0" style="font-size: 150%; font-weight: bold;">FAQ</h3>
</div>
<br><hr style="color: orange; height: 0.5px;"><br>
<a href="/admin/frontpage?tab=faq" role="button" class="btn">Kembali</a>
<br><br>

{{-- <form action="" method="POST">
    @method('PUT')
    @csrf
    <div class="frontpage-input-text">
        <label for="judul_faq">Judul FAQ</label>
        <input type="text" name="judul_faq">
    </div>
</form> --}}

<div class="frontpage-input-text">
    <label for="popular_faq">FAQ</label>
    <div class="d-flex flex-column align-items-center justify-content-center" style="gap: 5px;">
        @foreach ($popular_faq as $pq)
            <div style="
                width: 100%;
                border: 1px solid gray;
                border-radius: 10px;
                padding: 5px 10px;
                display: flex;
                align-items: center;
                gap: 10px;
            ">
                <form action="/admin/frontpage/faq_populer/hapus/{{ $pq->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <button type="submit" style="border-radius: 5px;padding:1px 10px;background-color:#E1A600;border:none;">x</button>
                </form>
                <div>
                    {{ $pq->pertanyaan }}
                </div>
            </div>
        @endforeach
    </div>
</div>

@if (count($popular_faq) != 3)
<div class="frontpage-input-text">
    <label for="judul_faq">Tambah FAQ</label>
    <div class="pilih-faq" style="position: relative;">
        <button style="width: 100%;border:none;background-color:white;color:black;text-align:left;font-weight:normal;display:flex; align-items-center; justify-content:space-between;">
            <div>Pilih</div>
            <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
            </svg></div>
        </button>
        <div class="pilihan-faq" style="">
            <div style="
                display:flex;
                flex-direction:column;
                width:100%;
            ">
                @foreach ($faq as $faq)
                    <form action="/admin/frontpage/faq_populer/tambah/{{ $faq->id }}" method="post">
                        @method('PUT')
                        @csrf
                        <button type="submit">
                            {{ $faq->pertanyaan }}
                        </button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>  
@endif

<script>
    $(document).ready(function(){
        $('.pilih-faq').click(()=>{
            $('.pilihan-faq').toggle()
        })
    })
</script>
{{-- <select name="judul_faq" id="">
    <option value="" disabled selected>--pilih--</option>
    @foreach ($faq as $faq)
        <form action="/admin/frontpage/tambah_faq_populer/{{ $faq->id }}" method="POST">
            @method('PUT')
            @csrf
        </form>
        <option option value="">
                <button type="submit" style="border:none;padding:0;background-color:white;color:black;">
                    {{ $faq->pertanyaan }}
                </button>
        </option>
    @endforeach
</select> --}}


{{-- <div class="d-flex align-items-center justify-content-end gap-2">
    <a href="/admin/frontpage?tab=faq" role="button" class="btn" style="
        width: 100px;
        padding: 5px 10px;
        background-color: #fff;
        color: #C17D2D;
    ">Batal</a>
    <button style="
        width: 100px;
        padding: 5px 10px;
    " disabled>Simpan</button>
</div>
<select name="" id="selectOption">
    <option value="">zcvzcbzb</option>
    <option value="">ncvbnx</option>
    <option value="">pomckvm</option>
</select>
<script>
    $(document).ready(() => {
        $('#selectOption').chosen()
    })
</script> --}}