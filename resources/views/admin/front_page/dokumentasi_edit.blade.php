<div class="d-flex justify-content-between align-items-center">
    <h3>Dokumentasi</h3>
</div>
<br><hr style="color: orange; height: 0.5px;"><br>
<div class="d-flex items-center justify-content-end">
    <a href="/admin/frontpage/edit?tab=dokumentasi" class="btn" role="button" style="width: 100px;">Edit</a>
</div>
<br>
<div class="w-100" style="
    user-select: none !important;
    pointer-event: none !important;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    flex-wrap: wrap;
">
    @foreach ($dokumentasi as $dok)
        <img src="/storage{{ $dok->url_dokumentasi }}" alt="" style="
            user-select: none !important;
            pointer-event: none !important;
            width: 500px;
            height: auto;
            border: none;
            border-radius: 20px;
        ">
    @endforeach
</div>