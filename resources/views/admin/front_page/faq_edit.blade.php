
<div class="d-flex justify-content-between align-items-center">
    <h3>FAQ</h3>
</div>
<br><hr style="color: orange; height: 0.5px;"><br>
<div class="d-flex items-center justify-content-end">
    <a href="/admin/frontpage/edit?tab=faq" class="btn" role="button" style="width: 100px;">Edit</a>
</div><br>

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
                ">{{ $pq->pertanyaan }}</div>
            @endforeach
        </div>
    @endif
</div>

