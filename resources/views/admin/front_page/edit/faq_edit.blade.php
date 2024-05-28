<div class="d-flex justify-content-between align-items-center">
    <h3>FAQ</h3>
</div>
<br><hr style="color: orange; height: 0.5px;"><br>
<a href="/admin/frontpage?tab=faq" role="button" class="btn">Kembali</a>
<br><br>

<div class="frontpage-input-text">
    <label for="popular_faq">FAQ</label>
    @if (count($popular_faq) != 0)
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
    @endif
</div>

@if (count($popular_faq) != 3)
<div class="frontpage-input-text">
    <label for="judul_faq">Tambah FAQ</label>
    <select name="" id="" onchange="handleAddPopularFaq(this)" class="px-3 py-2 w-100 rounded">
        <option value="" disabled selected>-- pilih --</option>
        @foreach ($faq as $faq)
            <option value="{{ $faq->id }}">{{ $faq->pertanyaan }}</option>
        @endforeach
    </select>
</div>  
@endif


<script>
    $(document).ready(function(){
        $('.pilih-faq').click(()=>{
            $('.pilihan-faq').toggle()
        })
    })
    const handleAddPopularFaq = (e) => {
        $.ajax({
            url: `/admin/frontpage/faq_populer/tambah/${e.value}`,
            type: 'PUT'
        })
        location.reload()
    }
</script>