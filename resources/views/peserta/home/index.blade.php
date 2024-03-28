@extends('peserta.layouts.master')

@section('content')
<style>
    section {
        background-color: white;
        border-radius: 20px;
        padding-block: 2rem;
    }
</style>

<main>
    <section class="px-4 d-flex gap-4">
        <div style="width: 70%;">
            <div class="w-100 d-flex justify-content-between px-3 pt-5 position-relative" style="background-color: #E9ECFA; border-radius: 20px; box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);">
                <div>
                    <h1 style="font-family: 'Josefin Sans', sans-serif; color: #2B2B28; font-size: 200%; font-weight: 600; ">Selamat Datang</h1>
                    <p>Jangan lupa untuk lengkapi semua data ya!</p>
                </div>

                <div>  
                    <img src="https:/source.unsplash.com/240x185" alt="test">
                </div>

                <div class="position-absolute bottom-0" style="left: 6px;">
                    <img src="https:/source.unsplash.com/42x50" alt="ya">
                </div>
            </div>
            <div>
                <div class="card"></div>
                <div class="card"></div>
            </div>
        </div>
        <aside class="card" style="width: 30%; box-shadow: 0px 4px 4px 0px rgba(204,204,204,1); border-radius: 20px; background-color: #FAFAFA;">
            <div class="card-header" style="background-color: #FAFAFA;">

                <h5 class="card-title mb-0">Kalender</h5>
            </div>
            <div class="card-body d-flex">
                <div class="align-self-center w-100">
                    <div class="chart">
                        <div id="datetimepicker-dashboard"></div>
                    </div>
                </div>
            </div>
        </aside>
    </section>
</main>


<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
</script>
@endsection('content')
