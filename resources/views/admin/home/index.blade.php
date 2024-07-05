@extends('admin.layouts.master')

@section('content')

<style>
    .container-card > div {
        width: 33.33%;
    }

    .card-header {
        border: none !important;
    }
</style>

<div class="tab-pane">
    <div class="content-profil py-5 mb-5">
            <div class="container-card d-flex mb-5" style="gap: 2.2rem;">
                <div class="d-flex position-relative flex-column justify-content-center py-3" style="padding-inline: 2.5rem; box-shadow: 0px 4px 4px 0px rgba(204,204,204,1); border-radius: 20px; background-color: #FAFAFA; height: 144px;">
                    <hr class="position-absolute start-0 h-100" style="background-color: #552525; border: none; width: 12px; border-radius: 20px;">
                    <h3 style="font-weight: bold; font-size: 150%; color: #000000;">Desk Evaluation</h3>
                    <div class="d-flex gap-2 align-items-center">
                        <img src="{{ asset('assets') }}/images/dashboard1.svg" style="width: 50px; height: 50px; border: none; border-radius: 0;" alt="">
                        <span style="color: #E59B30; font-weight: bold; font-size: 137.5%">{{ $desk_evaluation }}</span>
                    </div>
                </div>
                <div class="d-flex position-relative flex-column justify-content-center py-3" style="padding-inline: 2.5rem; box-shadow: 0px 4px 4px 0px rgba(204,204,204,1); border-radius: 20px; background-color: #FAFAFA; height: 144px;">
                    <hr class="position-absolute start-0 h-100" style="background-color: #552525; border: none; width: 12px; border-radius: 20px;">
                    <h3 style="font-weight: bold; font-size: 150%; color: #000000;">Site Evaluation</h3>
                    <div class="d-flex gap-2 align-items-center">
                        <img src="{{ asset('assets') }}/images/dashboard1.svg" style="width: 50px; height: 50px; border: none; border-radius: 0;" alt="">
                        <span style="color: #E59B30; font-weight: bold; font-size: 137.5%">{{ $site_evaluation }}</span>
                    </div>
                </div>
                <div class="d-flex position-relative flex-column justify-content-center py-3" style="padding-inline: 2.5rem; box-shadow: 0px 4px 4px 0px rgba(204,204,204,1); border-radius: 20px; background-color: #FAFAFA; height: 144px;">
                    <hr class="position-absolute start-0 h-100" style="background-color: #552525; border: none; width: 12px; border-radius: 20px;">
                    <h3 style="font-weight: bold; font-size: 150%; color: #000000;">Peserta</h3>
                    <div class="d-flex gap-2 align-items-center">
                        <img src="{{ asset('assets') }}/images/dashboard1.svg" style="width: 50px; height: 50px; border: none; border-radius: 0;" alt="">
                        <span style="color: #E59B30; font-weight: bold; font-size: 137.5%">{{ $peserta }}</span>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-4">
                <div class="card" style="width: 65%; box-shadow: 0px 4px 4px 0px rgba(204,204,204,1); border-radius: 20px; background-color: #FAFAFA;">
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

                <div class="card" style="width: 35%; box-shadow: 0px 4px 4px 0px rgba(204,204,204,1); border-radius: 20px; background-color: #FAFAFA;">
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
                </div>
            </div>
    </div>
</div>

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
