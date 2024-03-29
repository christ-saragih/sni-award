@extends('peserta.layouts.master')

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
                    <p>Jangan lupa untuk lengkapi semua data ya!</p>
                </div>

                <div style="width: 40%;">  
                    <img src="{{ asset('assets') }}/peserta/images/dashboard.png" alt="" class="img-fluid">
                </div>

                <div class="position-absolute bottom-0" style="left: 6px;">
                    <img src="{{ asset('assets') }}/peserta/images/tanaman.svg" alt="ya">
                </div>
            </div>
            <div class="container-file d-flex flex-row justify-content-around mt-5">

                <div class="position-relative" style="width: 38.5%;">
                    <div class="background-tambahan position-absolute start-0"></div>
                    <div class="card d-flex flex-row align-items-center">
                        <i class="fa fa-folder-open me-2" aria-hidden="true" style="color: #E59B30;"></i>
                        <span>Profil</span>
                        <div class="circular-progress-profil ms-auto">
                            <div class="value-container-profil">
                                100
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="position-relative" style="width: 38.5%;">
                    <div class="background-tambahan position-absolute start-0"></div>
                    <div class="card d-flex flex-row align-items-center">
                        <i class="fa fa-file-text me-2" aria-hidden="true" style="color: #78A55A;"></i>
                        <span>Pendaftaran</span>
                        <div class="circular-progress-pendaftaran ms-auto">
                            <div class="value-container-pendaftaran">
                                90
                            </div>
                        </div>
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
        </aside>
    </section>
</main>

<!-- JS Kalender -->
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

<!-- JS Circular Progress Bar -->
<script>
    // profil
    let circularProgressProfil = document.querySelector('.circular-progress-profil');
    let valueContainerProfil = document.querySelector('.value-container-profil');

    let progressValueProfil = 0;
    let progressEndValueProfil = parseInt(valueContainerProfil.textContent.trim());
    let speedProfil = progressEndValueProfil > 60 ? 25 : 50;

    let progressProfil = setInterval(() => {
        progressValueProfil++;
        valueContainerProfil.textContent = `${progressValueProfil}%`;
        circularProgressProfil.style.background = `conic-gradient(
            #E59B30 ${progressValueProfil * 3.6}deg,
            #D9D9D9 ${progressValueProfil * 3.6}deg
        )`;
        if(progressValueProfil == progressEndValueProfil) {
            clearInterval(progressProfil);
        }
    }, speedProfil);

    // pendaftaran
    let circularProgressPendaftaran = document.querySelector('.circular-progress-pendaftaran');
    let valueContainerPendaftaran = document.querySelector('.value-container-pendaftaran');

    let progressValuePendaftaran = 0;
    let progressEndValuePendaftaran = parseInt(valueContainerPendaftaran.textContent.trim());
    let speedPendaftaran = progressEndValuePendaftaran > 60 ? 25 : 50;

    let progressPendaftaran = setInterval(() => {
        progressValuePendaftaran++;
        valueContainerPendaftaran.textContent = `${progressValuePendaftaran}%`;
        circularProgressPendaftaran.style.background = `conic-gradient(
            #78A55A ${progressValuePendaftaran * 3.6}deg,
            #D9D9D9 ${progressValuePendaftaran * 3.6}deg
        )`;
        if(progressValuePendaftaran == progressEndValuePendaftaran) {
            clearInterval(progressPendaftaran);
        }
    }, speedPendaftaran);

</script>
@endsection('content')
