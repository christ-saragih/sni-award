@extends('evaluator.layouts.master')

@section('content')

<style>
    section {
        background-color: white;
        border-radius: 20px;
        padding-block: 2rem;
    }

    .container-file span {
        color: #2B2B28;
        font-size: 112.5%;
        font-weight: 600;
        font-family: 'Josefin Sans', sans-serif;
        margin: 0;
    }

    .container-file > div > .card {
        background-color: #F5F5F5;
        border-radius: 0 20px 20px 20px;
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
        padding-block: 2rem;
        padding-inline: 1rem;
    }

    .container-file > div > .card > i {
        font-size: 287.5%;
    }


    .background-tambahan {
        top: -20px;
        background-color: #F5F5F5;
        border-radius: 20px 19% 0 0;
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
        padding-block: 2rem;
        height: 100%;
        width: 60%;
    }

    .circular-progress-profil,
    .circular-progress-pendaftaran {
        position: relative;
        width: 65px;
        height: 65px;
        /* background-color: #E59B30; */
        border-radius: 50%;
        display: grid;
        place-items: center;
    }

    .circular-progress-profil:before,
    .circular-progress-pendaftaran:before {
        content: "";
        position: absolute;
        height: 80%;
        width: 80%;
        background-color: white;
        border-radius: 50%;
    }

    .value-container-profil,
    .value-container-pendaftaran {
        position: relative;
        color: #2B2B28;
        font-size: 112.5%;
        font-weight: 600;
        font-family: 'Josefin Sans', sans-serif;
    }
</style>

<main>
    <section class="px-4 d-flex gap-4">
        <div style="width: 70%;">
            <div class="w-100 d-flex justify-content-between px-3 pt-1 position-relative" style="background-color: #E9ECFA; border-radius: 20px; box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);">
                <div style="width: 60%; margin-top: 2.5rem;">
                    <h1 style="font-family: 'Josefin Sans', sans-serif; color: #2B2B28; font-size: 200%; font-weight: 600; ">Selamat Datang</h1>
                    <p>Jangan lupa untuk lengkapi semua penilaian peserta ya!</p>
                </div>

                <div style="width: 40%;">
                    <img src="{{ asset('assets') }}/peserta/images/dashboard.png" alt="" class="img-fluid">
                </div>

                <div class="position-absolute bottom-0" style="left: 6px;">
                    <img src="{{ asset('assets') }}/peserta/images/tanaman.svg" alt="ya">
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header" style="background-color: #FAFAFA;">
                    <h5 style="font-size: 125%;">Grafik</h5>
                    <h6 style="color: #808080; font-size: 81.25%; font-weight: 500;">Peserta SNI Award</h6>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="chartjs-bar" style="height: 250px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <aside class="card" style="width: 30%; box-shadow: 0px 4px 4px 0px rgba(204,204,204,1); border-radius: 20px; background-color: #FAFAFA;">
            <div class="card-header" style="background-color: #552525; border-radius: 15px;">
                <h5 class="card-title py-1 ms-3 mb-0" style="color: white; font-weight: 600;">Kalender</h5>
            </div>
            <div class="card-body d-flex pt-0">
                <div class="align-self-center w-100">
                    <div class="chart">
                        <div id="datetimepicker-dashboard"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer pt-4" style="background-color: white;">
                <ul>
                    <li class="d-flex align-items-center gap-2" style="list-style: none;"><i class="fa fa-circle" style="margin-left: -20px; color: #552525;"></i> <p class="m-0">Rapat Dewan Pengarah</p></li>
                    <li class="d-flex align-items-baseline gap-2" style="list-style: none;"><i class="fa fa-circle" style="margin-left: -20px; color: #CC9305;"></i> <p class="m-0">Rapat Dewan Juri I Penetapan Syarat dan Aturan SNI Award</p></li>
                    <li class="d-flex align-items-center gap-2" style="list-style: none;"><i class="fa fa-circle" style="margin-left: -20px; color: #3D666B;"></i> <p class="m-0">Desk Ecaluation (DE)</p></li>
                </ul>
            </div>
        </aside>
    </section>
</main>

<!-- JS Kalender -->

<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-bar"), {
				type: "bar",
				data: {
					labels: ["2019", "2020", "2021", "2022", "2023", "2024"],
					datasets: [{
						label: "Pendaftar",
						backgroundColor: '#5A6ACF',
						borderColor: '#5A6ACF',
						hoverBackgroundColor: '#5A6ACF',
						hoverBorderColor: '#5A6ACF',
						data: [65, 84, 87, 61, 75, 82],
						barPercentage: .55,
						categoryPercentage: .55
					}, {
						label: "Peserta",
						backgroundColor: "#E1A600",
						borderColor: "#E1A600",
						hoverBackgroundColor: "#E1A600",
						hoverBorderColor: "#E1A600",
						data: [71, 89, 86, 44, 68, 72],
						barPercentage: .55,
						categoryPercentage: .55
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: true
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
</script>
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
