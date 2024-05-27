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

// dynamic dropdown kota
$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});

$(function () {
    $("#propinsi").on("change", function () {
        let propinsi_id = $("#propinsi").val();
        console.log(propinsi_id);

        $.ajax({
            type: "GET",
            url: `/api/admin/wilayah/provinsi/${propinsi_id}/kota-kab`,
            cache: false,

            success: function (msg) {
                $("#kota").html(kotaKabresponseToHtml(msg));
            },
            error: function (data) {
                console.log("error:", data);
            },
        });
    });
});

const kotaKabresponseToHtml = (data) => {
    let html = "";
    for (let kota of data.data) {
        html += `<option value='${kota.id}'>${kota.kota}</option>`;
        console.log(kota);
    }

    return html;
};

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
            dropdownMenuInformasi.classList.remove(
                "dropdownMenuInformasi-hidden"
            );
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

const dropdownMenuDataMaster = document.getElementById(
    "dropdownMenuDataMaster"
);

let isDropdownVisible = false;

function toggleDropdownMenuDataMaster() {
    if (isDropdownVisible) {
        dropdownMenuDataMaster.classList.add("dropdownMenuDataMaster-hidden");
        setTimeout(() => {
            dropdownMenuDataMaster.style.display = "none";
            dropdownMenuDataMaster.classList.remove(
                "dropdownMenuDataMaster-hidden"
            );
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

// Href untuk halaman depan
// beranda
const navLinkBeranda = document.getElementById("navLinkBeranda");
navLinkBeranda.style.cursor = "pointer";
navLinkBeranda.addEventListener("click", function (event) {
    window.location.href = "/admin/frontpage";
    event.preventDefault();
});

// faq
const navLinkFaq = document.getElementById("navLinkFaq");
navLinkFaq.style.cursor = "pointer";
navLinkFaq.addEventListener("click", function (event) {
    window.location.href = "/admin/faq";
    event.preventDefault();
});

// acara
const navLinkAcara = document.getElementById("navLinkAcara");
navLinkAcara.style.cursor = "pointer";
navLinkAcara.addEventListener("click", function (event) {
    window.location.href = "/admin/acara";
    event.preventDefault();
});

// berita
const navLinkBerita = document.getElementById("navLinkBerita");
navLinkBerita.style.cursor = "pointer";
navLinkBerita.addEventListener("click", function (event) {
    window.location.href = "/admin/berita";
    event.preventDefault();
});

// dokumentasi
const navLinkDokumentasi = document.getElementById("navLinkDokumentasi");
navLinkDokumentasi.style.cursor = "pointer";
navLinkDokumentasi.addEventListener("click", function (event) {
    window.location.href = "/admin/dokumentasi";
    event.preventDefault();
});

// linimasa
const navLinkLinimasa = document.getElementById("navLinkLinimasa");
navLinkLinimasa.style.cursor = "pointer";
navLinkLinimasa.addEventListener("click", function (event) {
    window.location.href = "/admin/linimasa";
    event.preventDefault();
});

// kontak
const navLinkKontak = document.getElementById("navLinkKontak");
navLinkKontak.style.cursor = "pointer";
navLinkKontak.addEventListener("click", function (event) {
    window.location.href = "/admin/kontak";
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
function openModalUbahKabupaten(id) {
    // Kirim permintaan AJAX untuk mendapatkan data kategori_organisasi berdasarkan ID
    $.ajax({
        url: `/admin/wilayah/kabupaten/${id}/ubah`,
        type: "GET",
        success: function (response) {
            console.log(response);
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $('#form_ubah_kabupaten select[name="propinsi_id"]').val(
                response.propinsi_id
            );
            $('#form_ubah_kabupaten input[name="kota"]').val(response.kota);

            // Atur aksi formulir untuk mengirimkan data dengan metode PUT
            $("#form_ubah_kabupaten").attr(
                "action",
                `/admin/wilayah/kabupaten/${id}`
            );

            // Tampilkan modal edit
            $("#ubahKabupatenKota").modal("show");

            // Inisialisasi Select2 setelah memuat modal
            $('#form_ubah_kabupaten select[name="propinsi_id"]').select2({
                theme: "bootstrap-5",
                width: "100%",
                dropdownParent: $("#ubahKabupatenKota"),
            });
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
}

// modal pop up hapus kabupaten
function openModalHapusKabupaten(id) {
    document
        .getElementById("form_hapus_kabupaten")
        .setAttribute("action", `/admin/wilayah/kabupaten/${id}`);
    const modal = new bootstrap.Modal(
        document.getElementById("hapusKabupaten")
    );
    modal.show();
}

// modal pop up ubah kecamatan
function openModalUbahKecamatan(id) {
    // Kirim permintaan AJAX untuk mendapatkan data kategori_organisasi berdasarkan ID
    $.ajax({
        url: `/admin/wilayah/kecamatan/${id}/ubah`,
        type: "GET",
        success: function (response) {
            console.log(response);
            // Akses propinsi melalui kota
            var propinsi_id = response.kota.propinsi_id;

            // Isi formulir modal dengan data yang diterima dari server
            $('#form_ubah_kecamatan select[name="propinsi_id"]').val(
                propinsi_id
            );
            $('#form_ubah_kecamatan select[name="kota_id"]').val(
                response.kota_id
            );
            $('#form_ubah_kecamatan input[name="kecamatan"]').val(
                response.kecamatan
            );

            // Atur aksi formulir untuk mengirimkan data dengan metode PUT
            $("#form_ubah_kecamatan").attr(
                "action",
                `/admin/wilayah/kecamatan/${id}`
            );

            // Tampilkan modal edit
            $("#ubahKecamatan").modal("show");

            // Inisialisasi Select2 setelah memuat modal
            $('#form_ubah_kecamatan select[name="propinsi_id"]').select2({
                theme: "bootstrap-5",
                width: "100%",
                dropdownParent: $("#ubahKecamatan"),
            });
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
}

// modal pop up hapus kabupaten
function openModalHapusKecamatan(id) {
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
        type: "GET",
        success: function (response) {
            console.log(response);
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $(
                '#form_ubah_sub_kategori select[name="assessment_kategori_id"]'
            ).val(response.assessment_kategori_id);
            $('#form_ubah_sub_kategori input[name="nama"]').val(response.nama);

            // Atur aksi formulir untuk mengirimkan data dengan metode PUT
            $("#form_ubah_sub_kategori").attr(
                "action",
                `/admin/assessment_sub_kategori/${id}`
            );

            // Tampilkan modal edit
            $("#ubahAssessmentSubKategori").modal("show");

            // Inisialisasi Select2 setelah memuat modal
            $(
                '#form_ubah_sub_kategori select[name="assessment_kategori_id"]'
            ).select2({
                theme: "bootstrap-5",
                width: "100%",
                dropdownParent: $("#ubahAssessmentSubKategori"),
            });
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
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
// Modal Tambah
function openModalTambahTB() {
    const modal = new bootstrap.Modal(
        document.getElementById("tambahTagBerita")
    );
    modal.show();
}
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
function openModalHapusPertanyaan(id) {
    document
        .getElementById("form_hapus_assessment_pertanyaan")
        .setAttribute("action", `/admin/assessment_pertanyaan/${id}`);

    const modal = new bootstrap.Modal(
        document.getElementById("hapusAssessmentPertanyaan")
    );

    modal.show();
}

// Dokumen
// modal pop up Ubah
function openModalUbahDokumen(id) {
    // Kirim permintaan AJAX untuk mendapatkan data dokumen berdasarkan ID
    $.ajax({
        url: `/admin/dokumen/${id}/edit`,
        type: "GET",
        success: function (response) {
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $('#form_ubah_dokumen input[name="nama"]').val(response.nama);
            $('#form_ubah_dokumen select[name="status"]').val(response.status);

            // Tampilkan modal edit
            $("#ubahDokumen").modal("show");
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });

    // Atur aksi formulir untuk mengirimkan data dengan metode PUT
    $("#form_ubah_dokumen").attr("action", `/admin/dokumen/${id}`);
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
        type: "GET",
        success: function (response) {
            console.log(response);
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $('#form_ubah_kategori_organisasi input[name="nama"]').val(
                response.nama
            );
            $(
                '#form_ubah_kategori_organisasi select[name="tipe_kategori_id"]'
            ).val(response.tipe_kategori_id);

            // Atur aksi formulir untuk mengirimkan data dengan metode PUT
            $("#form_ubah_kategori_organisasi").attr(
                "action",
                `/admin/kategori_organisasi/${id}`
            );

            // Tampilkan modal edit
            $("#ubahKategoriOrganisasi").modal("show");

            // Inisialisasi Select2 setelah memuat modal
            $(
                '#form_ubah_kategori_organisasi select[name="tipe_kategori_id"]'
            ).select2({
                theme: "bootstrap-5",
                width: "100%",
                dropdownParent: $("#ubahKategoriOrganisasi"),
            });
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
}

// modal pop up Hapus
function openModalHapusKategoriOrganisasi(id) {
    document
        .getElementById("form_hapus_kategori_organisasi")
        .setAttribute("action", `/admin/kategori_organisasi/${id}`);

    const modal = new bootstrap.Modal(
        document.getElementById("hapusKategoriOrganisasi")
    );

    modal.show();
}
// End Ketegori Organisasi

// Tipe Kategori
// modal pop up Ubah
function openModalUbahTipeKategori(id) {
    // Kirim permintaan AJAX untuk mendapatkan data tipe_kategori berdasarkan ID
    $.ajax({
        url: `/admin/tipe_kategori/${id}/edit`,
        type: "GET",
        success: function (response) {
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $('#form_ubah_tipe_kategori input[name="nama"]').val(response.nama);

            // Tampilkan modal edit
            $("#ubahTipeKategori").modal("show");
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });

    // Atur aksi formulir untuk mengirimkan data dengan metode PUT
    $("#form_ubah_tipe_kategori").attr("action", `/admin/tipe_kategori/${id}`);
}

// modal pop up Hapus
function openModalHapusTipeKategori(id) {
    document
        .getElementById("form_hapus_tipe_kategori")
        .setAttribute("action", `/admin/tipe_kategori/${id}`);

    const modal = new bootstrap.Modal(
        document.getElementById("hapusTipeKategori")
    );

    modal.show();
}
// End Tipe Kategori

// modal penjadwalan start
// pop tambah dokumen
function openModalTambahDokumenPenjadwalan() {
    const modal = new bootstrap.Modal(
        document.getElementById("tambahDokumenPenjadwalan")
    );
    modal.show();
}

// ubah penjadwalan Dokumen
function openModalUbahDokumenPenjadwalan(id) {
    // Kirim permintaan AJAX untuk mendapatkan data dokumen berdasarkan ID
    $.ajax({
        url: `/admin/penjadwalan_dokumen/${id}/edit`,
        type: "GET",
        success: function (response) {
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $('#form_ubah_dokumen input[name="nama_dokumen"]').val(
                response.nama_dokumen
            );

            // $('#form_ubah_dokumen input[name="file_dokumen"]').val(
            //     response.file_dokumen
            // );

            // Menampilkan nama file saat ini di bawah input file
            if (response.file_dokumen) {
                $("#current-file").text(
                    `File saat ini: ${response.file_dokumen}`
                );
            } else {
                $("#current-file").text("");
            }

            // Tampilkan modal edit
            $("#ubahDokumenPenjadwalan").modal("show");
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });

    // Atur aksi formulir untuk mengirimkan data dengan metode PUT
    $("#form_ubah_dokumen").attr("action", `/admin/penjadwalan_dokumen/${id}`);
}

function openModalHapusDokumenPenjadwalan(id) {
    document
        .getElementById("form_hapus_dokumen")
        .setAttribute("action", `/admin/penjadwalan_dokumen/${id}`);

    const modal = new bootstrap.Modal(
        document.getElementById("hapusDokumenPenjadwalan")
    );
    modal.show();
}
// modal penjadwalan end

// modal faq start
// pop up ubah
function openModalUbahFaq(id, name, description) {
    document.getElementById("id_faq").value = id;
    document.getElementById("nama_faq").value = name;
    document.getElementById("deskripsi_faq").value = description;

    document
        .getElementById("form_ubah_faq")
        .setAttribute("action", `/admin/faq/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("ubahFaq"));
    modal.show();
}

// pop up hapus
function openModalHapusFaq(id, name, description) {
    document.getElementById("id_faq").value = id;
    document.getElementById("nama_faq").value = name;
    document.getElementById("deskripsi_faq").value = description;

    document
        .getElementById("form_hapus_faq")
        .setAttribute("action", `/admin/faq/${id}`);
    const modal = new bootstrap.Modal(document.getElementById("hapusFaq"));
    modal.show();
}
// modal faq end

// modal faq start
// pop up ubah
function openModalUbahFaq(id, name, description) {
    document.getElementById("id_faq").value = id;
    document.getElementById("nama_faq").value = name;
    document.getElementById("deskripsi_faq").value = description;

    document
        .getElementById("form_ubah_faq")
        .setAttribute("action", `/admin/faq/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("ubahFaq"));
    modal.show();
}

// pop up hapus
function openModalHapusFaq(id, name, description) {
    document.getElementById("id_faq").value = id;
    document.getElementById("nama_faq").value = name;
    document.getElementById("deskripsi_faq").value = description;

    document
        .getElementById("form_hapus_faq")
        .setAttribute("action", `/admin/faq/${id}`);
    const modal = new bootstrap.Modal(document.getElementById("hapusFaq"));
    modal.show();
}
// modal faq end

// Konfigurasi
// modal pop up Ubah
function openModalUbahKonfigurasi(id) {
    // Kirim permintaan AJAX untuk mendapatkan data konfigurasi berdasarkan ID
    $.ajax({
        url: `/admin/konfigurasi/${id}/ubah`,
        type: "GET",
        success: function (response) {
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $('#form_ubah_konfigurasi input[name="key"]').val(response.key);
            $('#form_ubah_konfigurasi input[name="value"]').val(response.value);

            // Tampilkan modal edit
            $("#ubahKonfigurasi").modal("show");
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });

    // Atur aksi formulir untuk mengirimkan data dengan metode PUT
    $("#form_ubah_konfigurasi").attr("action", `/admin/konfigurasi/${id}`);
}

// modal pop up Hapus
function openModalHapusKonfigurasi(id) {
    document
        .getElementById("form_hapus_konfigurasi")
        .setAttribute("action", `/admin/konfigurasi/${id}`);

    const modal = new bootstrap.Modal(
        document.getElementById("hapusKonfigurasi")
    );

    modal.show();
}
// End Konfigurasi

// Lembaga Sertifikasi
// modal pop up Ubah
function openModalUbahLembagaSertifikasi(id) {
    // Kirim permintaan AJAX untuk mendapatkan data lembaga_sertifikasi berdasarkan ID
    $.ajax({
        url: `/admin/lembaga_sertifikasi/${id}/ubah`,
        type: "GET",
        success: function (response) {
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $('#form_ubah_lembaga_sertifikasi input[name="nama"]').val(
                response.nama
            );

            // Tampilkan modal edit
            $("#ubahLembagaSertifikasi").modal("show");
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });

    // Atur aksi formulir untuk mengirimkan data dengan metode PUT
    $("#form_ubah_lembaga_sertifikasi").attr(
        "action",
        `/admin/lembaga_sertifikasi/${id}`
    );
}

// modal pop up Hapus
function openModalHapusLembagaSertifikasi(id) {
    document
        .getElementById("form_hapus_lembaga_sertifikasi")
        .setAttribute("action", `/admin/lembaga_sertifikasi/${id}`);

    const modal = new bootstrap.Modal(
        document.getElementById("hapusLembagaSertifikasi")
    );

    modal.show();
}
// End Lembaga Sertifikasi

// Pendaftar Event SNI Award
function openModalUbahPendaftarAdmin(id) {
    // Kirim permintaan AJAX untuk mendapatkan data pendaftar_sni_award berdasarkan ID
    $.ajax({
        url: `/admin/pendaftar_sni_award/${id}/ubah`,
        type: "GET",
        success: function (response) {
            console.log(response);
            // Isi nilai input pada modal edit dengan nilai dari respons JSON
            $(
                '#form_ubah_pendaftar_sni_award select[name="sekretariat_id"]'
            ).val(response.sekretariat_id);

            // Atur aksi formulir untuk mengirimkan data dengan metode PUT
            $("#form_ubah_pendaftar_sni_award").attr(
                "action",
                `/admin/pendaftar_sni_award/${id}`
            );

            // Tampilkan modal edit
            $("#ubahPendaftarAdmin").modal("show");

            // Inisialisasi Select2 setelah memuat modal
            $(
                '#form_ubah_pendaftar_sni_award select[name="sekretariat_id"]'
            ).select2({
                theme: "bootstrap-5",
                width: "100%",
                dropdownParent: $("#ubahPendaftarAdmin"),
            });
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
}
