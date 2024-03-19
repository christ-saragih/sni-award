// select 2
// $("#basic-usage").select2({
//     theme: "bootstrap-5",
//     width: $(this).data("width")
//         ? $(this).data("width")
//         : $(this).hasClass("w-100")
//         ? "100%"
//         : "style",
//     placeholder: $(this).data("placeholder"),
// });


// Navbar Dropdown Button Informasi
const navLinkInformasi = document.getElementById("navLinkInformasi");
const caretLeftInformasi = document.getElementById("faCaretLeftInformasi");

let rotatedInformasi = false;
navLinkInformasi.addEventListener("click", function (event) {
    if (!rotatedInformasi) {
        navLinkInformasi.classList.add("active");
        caretLeftInformasi.style.transition = "transform 0.3s ease-in-out";
        caretLeftInformasi.style.transitionDelay = "0.3s";
        caretLeftInformasi.style.transform = "rotate(-90deg)";
        rotatedInformasi = true;
    } else {
        navLinkInformasi.classList.remove("active");
        caretLeftInformasi.style.transform = "rotate(0deg)";
        rotatedInformasi = false;
    }

    event.preventDefault();
});

const dropdownMenuInformasi = document.getElementById("dropdownMenuInformasi");

let isDropdownVisibleInformasi = false;

function toggleDropdownMenuInformasi() {
    if (isDropdownVisibleInformasi) {
        dropdownMenuInformasi.classList.add("dropdownMenuInformasi-hidden");
        setTimeout(() => {
            dropdownMenuInformasi.style.display = "none";
            dropdownMenuInformasi.classList.remove("dropdownMenuInformasi-hidden");
        }, 300);
    } else {
        dropdownMenuInformasi.style.display = "block";
    }
    isDropdownVisibleInformasi = !isDropdownVisibleInformasi;
}

navLinkInformasi.addEventListener("click", function (event) {
    toggleDropdownMenuInformasi();
    event.preventDefault();
});


// Navbar Dropdown Button Data Master
const navLinkDataMaster = document.getElementById("navLinkDataMaster");
const caretLeftDataMaster = document.getElementById("faCaretLeftDataMaster");

let rotated = false;
navLinkDataMaster.addEventListener("click", function (event) {
    if (!rotated) {
        navLinkDataMaster.classList.add("active");
        caretLeftDataMaster.style.transition = "transform 0.3s ease-in-out";
        caretLeftDataMaster.style.transitionDelay = "0.3s";
        caretLeftDataMaster.style.transform = "rotate(-90deg)";
        rotated = true;
    } else {
        navLinkDataMaster.classList.remove("active");
        caretLeftDataMaster.style.transform = "rotate(0deg)";
        rotated = false;
    }

    event.preventDefault();
});

const dropdownMenuDataMaster = document.getElementById("dropdownMenuDataMaster");

let isDropdownVisible = false;

function toggleDropdownMenuDataMaster() {
    if (isDropdownVisible) {
        dropdownMenuDataMaster.classList.add("dropdownMenuDataMaster-hidden");
        setTimeout(() => {
            dropdownMenuDataMaster.style.display = "none";
            dropdownMenuDataMaster.classList.remove("dropdownMenuDataMaster-hidden");
        }, 300);
    } else {
        dropdownMenuDataMaster.style.display = "block";
    }
    isDropdownVisible = !isDropdownVisible;
}

navLinkDataMaster.addEventListener("click", function (event) {
    toggleDropdownMenuDataMaster();
    event.preventDefault();
});

// Href untuk informasi
// berita
const navLinkBerita = document.getElementById("navLinkBerita");
navLinkBerita.style.cursor = "pointer";
navLinkBerita.addEventListener("click", function (event) {
    window.location.href = "/admin/berita";
    event.preventDefault();
});

// acara
const navLinkAcara = document.getElementById("navLinkAcara");
navLinkAcara.style.cursor = "pointer";
navLinkAcara.addEventListener("click", function (event) {
    window.location.href = "/admin/acara";
    event.preventDefault();
});


// Href untuk data master
// konfigurasi
const navLinkKonfigurasi = document.getElementById("navLinkKonfigurasi");
navLinkKonfigurasi.style.cursor = "pointer";
navLinkKonfigurasi.addEventListener("click", function (event) {
    window.location.href = "/admin/konfigurasi";
    event.preventDefault();
});

// assesment
const navLinkAssesment = document.getElementById("navLinkAssesment");
navLinkAssesment.style.cursor = "pointer";
navLinkAssesment.addEventListener("click", function (event) {
    window.location.href = "/admin/assessment";
    event.preventDefault();
});

// dokumen
const navLinkDokumen = document.getElementById("navLinkDokumen");
navLinkDokumen.style.cursor = "pointer";
navLinkDokumen.addEventListener("click", function (event) {
    window.location.href = "/admin/dokumen";
    event.preventDefault();
});

// status kepemilikan
const navLinkStatusKepemilikan = document.getElementById(
    "navLinkStatusKepemilikan"
);
navLinkStatusKepemilikan.style.cursor = "pointer";
navLinkStatusKepemilikan.addEventListener("click", function (event) {
    window.location.href = "/admin/status_kepemilikan";
    event.preventDefault();
});

// lembaga sertifikasi
const navLinkLembagaSertifikasi = document.getElementById(
    "navLinkLembagaSertifikasi"
);
navLinkLembagaSertifikasi.style.cursor = "pointer";
navLinkLembagaSertifikasi.addEventListener("click", function (event) {
    window.location.href = "/admin/lembaga_sertifikasi";
    event.preventDefault();
});

// wilayah
const navLinkWilayah = document.getElementById("navLinkWilayah");
navLinkWilayah.style.cursor = "pointer";
navLinkWilayah.addEventListener("click", function (event) {
    window.location.href = "/admin/wilayah";
    event.preventDefault();
});

// Toggle Sidenav
const barsMenu = document.getElementById("barsMenu");
const sidenavMain = document.getElementById("sidenavMain");
const mainContent = document.getElementById("mainContent");
const navLinks = document.querySelectorAll("#navLink");
const navLinkText = document.querySelectorAll("#navLinkText");
const navbarBrand = document.getElementById("navbarBrand");
const sidebar = document.getElementById("sidebar");

let sidenavVisible = true;

barsMenu.addEventListener("click", function (event) {
    if (window.innerWidth > 992) {
        if (sidenavVisible) {
            // Style yang diberikan ketika sidenav visible
            sidenavMain.style.width = "4%";
            mainContent.style.marginLeft = "4.625rem";
            // Iterasi melalui setiap elemen dalam NodeList
            navLinks.forEach(function (element) {
                element.style.marginLeft = "0";
            });
            navLinkText.forEach(function (element) {
                element.style.display = "none";
            });
            navbarBrand.style.display = "none";
            caretLeftDataMaster.style.display = "none";
            sidebar.style.marginTop = "4rem";
        } else {
            // Style yang diberikan ketika sidenav tidak visible
            sidenavMain.style.width = "100%";
            mainContent.style.marginLeft = "17.125rem";
            navLinks.forEach(function (element) {
                element.style.marginLeft = "1rem";
            });
            // Iterasi melalui setiap elemen dalam NodeList
            navLinkText.forEach(function (element) {
                element.style.display = "block";
            });
            navbarBrand.style.display = "block";
            caretLeftDataMaster.style.display = "block";
            sidebar.style.marginTop = "0";
        }
        sidenavVisible = !sidenavVisible; // Toggle status tampilan sidenav
    }
    event.preventDefault();
});

barsMenu.addEventListener("click", function (event) {
    if (window.innerWidth <= 992) {
        // Style yang diberikan ketika sidenav visible
        sidenavMain.style.display = "block";
        sidenavMain.style.width = "100%";
        mainContent.style.marginLeft = "17.125rem";
        navLinks.forEach(function (element) {
            element.style.marginLeft = "1rem";
        });
        // Iterasi melalui setiap elemen dalam NodeList
        navLinkText.forEach(function (element) {
            element.style.display = "block";
        });
        navbarBrand.style.display = "block";
        caretLeftDataMaster.style.display = "block";
        sidebar.style.marginTop = "0";
    }
    event.preventDefault();
});

// modal pop up ubah provinsi
function openModalUbahProvinsi(id, name) {
    document.getElementById("id_provinsi").value = id;
    document.getElementById("nama_provinsi").value = name;

    document
        .getElementById("form_ubah_provinsi")
        .setAttribute("action", `/admin/wilayah/provinsi/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("ubahProvinsi"));
    modal.show();
}

// modal pop up hapus provinsi
function openModalHapusProvinsi(id, name) {
    document.getElementById("id_provinsi").value = id;
    document.getElementById("nama_provinsi").value = name;

    document
        .getElementById("form_hapus_provinsi")
        .setAttribute("action", `/admin/wilayah/provinsi/${id}`);
    const modal = new bootstrap.Modal(document.getElementById("hapusProvinsi"));
    modal.show();
}

// modal pop up ubah kabupaten
function openModalUbahKabupaten(id, name) {
    document.getElementById("id_kabupaten").value = id;
    document.getElementById("nama_kabupaten").value = name;

    document
        .getElementById("form_ubah_kabupaten")
        .setAttribute("action", `/admin/wilayah/kabupaten/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("ubahKabupaten"));
    modal.show();
}

// modal pop up hapus kabupaten
function openModalHapusKabupaten(id, name) {
    document.getElementById("id_kabupaten").value = id;
    document.getElementById("nama_kabupaten").value = name;

    document
        .getElementById("form_hapus_kabupaten")
        .setAttribute("action", `/admin/wilayah/kabupaten/${id}`);
    const modal = new bootstrap.Modal(
        document.getElementById("hapusKabupaten")
    );
    modal.show();
}

// modal pop up ubah kecamatan
function openModalUbahKecamatan(id, name) {
    document.getElementById("id_kecamatan").value = id;
    document.getElementById("nama_kecamatan").value = name;

    document
        .getElementById("form_ubah_kecamatan")
        .setAttribute("action", `/admin/wilayah/kecamatan/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("ubahKecamatan"));
    modal.show();
}

// modal pop up hapus kabupaten
function openModalHapusKecamatan(id, name) {
    document.getElementById("id_kecamatan").value = id;
    document.getElementById("nama_kecamatan").value = name;

    document
        .getElementById("form_hapus_kecamatan")
        .setAttribute("action", `/admin/wilayah/kecamatan/${id}`);
    const modal = new bootstrap.Modal(
        document.getElementById("hapusKecamatan")
    );
    modal.show();
}

// modal pop up ubah
function openModalUbah(id, name) {
    document.getElementById("id_kategori").value = id;
    document.getElementById("nama_kategori").value = name;

    document
        .getElementById("form_ubah_kategori")
        .setAttribute("action", `/admin/assessment_kategori/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("ubahKategori"));
    // const modal = new bootstrap.Modal(document.getElementById('ubahStatusKepemilikan'));
    modal.show();
}

// modal pop up hapus
function openModalHapus(id, name) {
    document.getElementById("id_kategori").value = id;
    document.getElementById("nama_kategori").value = name;

    // const formModalContent = document.getElementById('formModalContent');
    // formModalContent.action = '/assessment/' + id;
    document
        .getElementById("form_hapus_kategori")
        .setAttribute("action", `/admin/assessment_kategori/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("hapusKategori"));
    modal.show();
}

// modal pop up ubah status kepemilikan
function openModalUbahSK(id, name) {
    document.getElementById("id_status_kepemilikan").value = id;
    document.getElementById("nama_status_kepemilikan").value = name;

    document
        .getElementById("form_ubah_status_kepemilikan")
        .setAttribute("action", `/admin/status_kepemilikan/${id}`);

    const modal = new bootstrap.Modal(
        document.getElementById("ubahStatusKepemilikan")
    );
    modal.show();
}

// modal pop up hapus status kepemilikan
function openModalHapusSK(id, name) {
    document.getElementById("id_status_kepemilikan").value = id;
    document.getElementById("nama_status_kepemilikan").value = name;

    // const formModalContent = document.getElementById('formModalContent');
    // formModalContent.action = '/assessment/' + id;
    document
        .getElementById("form_hapus_status_kepemilikan")
        .setAttribute("action", `/admin/status_kepemilikan/${id}`);

    const modal = new bootstrap.Modal(
        document.getElementById("hapusStatusKepemilikan")
    );
    modal.show();
}

// modal pop up Ubah Assessment Sub Kategori
// function openModalUbahASK(id, name) {
//     document.getElementById("id_kategori").value = id;
//     document.getElementById("id_sub_kategori").value = id;
//     document.getElementById("nama_kategori").value = name;
//     document.getElementById("nama_sub_kategori").value = name;

//     document
//         .getElementById("form_ubah_sub_kategori")
//         .setAttribute("action", `/admin/assessment_sub_kategori/${id}`);

//     const modal = new bootstrap.Modal(
//         document.getElementById("ubahSubKategori")
//     );
//     // const modal = new bootstrap.Modal(document.getElementById('ubahStatusKepemilikan'));
//     modal.show();
// }

function openModalUbahASK(id) {
    // Kirim permintaan AJAX untuk mendapatkan data kategori_organisasi berdasarkan ID
    $.ajax({
        url: `/admin/assessment_sub_kategori/${id}/ubah`,
        type: 'GET',
        success: function(response) {
            console.log(response);
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $('#form_ubah_sub_kategori select[name="assessment_kategori_id"]').val(response.assessment_kategori_id);
            $('#form_ubah_sub_kategori input[name="nama"]').val(response.nama);

            // Atur aksi formulir untuk mengirimkan data dengan metode PUT
            $('#form_ubah_sub_kategori').attr('action', `/admin/assessment_sub_kategori/${id}`);

            // Tampilkan modal edit
            $('#ubahAssessmentSubKategori').modal('show');

            // Inisialisasi Select2 setelah memuat modal
            $('#form_ubah_sub_kategori select[name="assessment_kategori_id"]').select2({
                theme: 'bootstrap-5',
                width: '100%',
                dropdownParent: $('#ubahAssessmentSubKategori')
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

// modal pop up Hapus Assessment Sub Kategori
function openModalHapusASK(id) {
    document
        .getElementById("form_hapus_sub_kategori")
        .setAttribute("action", `/admin/assessment_sub_kategori/${id}`);

    const modal = new bootstrap.Modal(
        document.getElementById("hapusSubKategori")
    );
    // const modal = new bootstrap.Modal(document.getElementById('ubahStatusKepemilikan'));
    modal.show();
}

// Tag Berita
// modal pop up Ubah
function openModalUbahTB(id, name) {
    document.getElementById("id_tag_berita").value = id;
    document.getElementById("nama_tag_berita").value = name;

    document
        .getElementById("form_ubah_tag_berita")
        .setAttribute("action", `/admin/tag_berita/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("ubahTagBerita"));
    modal.show();
}
// modal pop up Hapus
function openModalHapusTB(id, name) {
    document.getElementById("id_tag_berita").value = id;
    document.getElementById("nama_tag_berita").value = name;

    document
        .getElementById("form_hapus_tag_berita")
        .setAttribute("action", `/admin/tag_berita/${id}`);

    const modal = new bootstrap.Modal(
        document.getElementById("hapusTagBerita")
    );

    modal.show();
}

// Berita
// modal pop up Hapus
function openModalHapusBerita(id, name) {
    document.getElementById("id_berita").value = id;
    document.getElementById("nama_berita").value = name;

    document
        .getElementById("form_hapus_berita")
        .setAttribute("action", `/admin/berita/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("hapusBerita"));

    modal.show();
}


// Acara
// modal pop up Hapus
function openModalHapusAcara(id, name) {
    document.getElementById("id_acara").value = id;
    document.getElementById("nama_acara").value = name;

    document
        .getElementById("form_hapus_acara")
        .setAttribute("action", `/admin/acara/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("hapusAcara"));

    modal.show();
}

// Assessment Pertanyaan
// modal pop up Hapus
function openModalHapusPertanyaan(id, name) {
    // console.log(id, name);
    document.getElementById("id_pertanyaan").value = id;
    document.getElementById("nama_pertanyaan").value = name;

    document
        .getElementById("form_hapus_assessment_pertanyaan")
        .setAttribute("action", `/admin/assessment_pertanyaan/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("hapusAssessmentPertanyaan"));

    modal.show();
}

// Dokumen
// modal pop up Ubah
function openModalUbahDokumen(id) {
    // Kirim permintaan AJAX untuk mendapatkan data dokumen berdasarkan ID
    $.ajax({
        url: `/admin/dokumen/${id}/edit`,
        type: 'GET',
        success: function(response) {
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $('#form_ubah_dokumen input[name="nama"]').val(response.nama);
            $('#form_ubah_dokumen select[name="status"]').val(response.status);

            // Tampilkan modal edit
            $('#ubahDokumen').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });

    // Atur aksi formulir untuk mengirimkan data dengan metode PUT
    $('#form_ubah_dokumen').attr('action', `/admin/dokumen/${id}`);
}

// modal pop up Hapus
function openModalHapusDokumen(id) {
    document
        .getElementById("form_hapus_dokumen")
        .setAttribute("action", `/admin/dokumen/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("hapusDokumen"));

    modal.show();
}
// End Dokumen

// Kategori Organisasi
// modal pop up Ubah
function openModalUbahKategoriOrganisasi(id) {
    // Kirim permintaan AJAX untuk mendapatkan data kategori_organisasi berdasarkan ID
    $.ajax({
        url: `/admin/kategori_organisasi/${id}/edit`,
        type: 'GET',
        success: function(response) {
            console.log(response);
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $('#form_ubah_kategori_organisasi input[name="nama"]').val(response.nama);
            $('#form_ubah_kategori_organisasi select[name="tipe_kategori_id"]').val(response.tipe_kategori_id);

            // Atur aksi formulir untuk mengirimkan data dengan metode PUT
            $('#form_ubah_kategori_organisasi').attr('action', `/admin/kategori_organisasi/${id}`);

            // Tampilkan modal edit
            $('#ubahKategoriOrganisasi').modal('show');

            // Inisialisasi Select2 setelah memuat modal
            $('#form_ubah_kategori_organisasi select[name="tipe_kategori_id"]').select2({
                theme: 'bootstrap-5',
                width: '100%',
                dropdownParent: $('#ubahKategoriOrganisasi')
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

// modal pop up Hapus
function openModalHapusKategoriOrganisasi(id) {
    document
        .getElementById("form_hapus_kategori_organisasi")
        .setAttribute("action", `/admin/kategori_organisasi/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("hapusKategoriOrganisasi"));

    modal.show();
}
// End Ketegori Organisasi

// Tipe Kategori
// modal pop up Ubah
function openModalUbahTipeKategori(id) {
    // Kirim permintaan AJAX untuk mendapatkan data tipe_kategori berdasarkan ID
    $.ajax({
        url: `/admin/tipe_kategori/${id}/edit`,
        type: 'GET',
        success: function(response) {
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $('#form_ubah_tipe_kategori input[name="nama"]').val(response.nama);

            // Tampilkan modal edit
            $('#ubahTipeKategori').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });

    // Atur aksi formulir untuk mengirimkan data dengan metode PUT
    $('#form_ubah_tipe_kategori').attr('action', `/admin/tipe_kategori/${id}`);
}

// modal pop up Hapus
function openModalHapusTipeKategori(id) {
    document
        .getElementById("form_hapus_tipe_kategori")
        .setAttribute("action", `/admin/tipe_kategori/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("hapusTipeKategori"));

    modal.show();
}
// End Tipe Kategori
