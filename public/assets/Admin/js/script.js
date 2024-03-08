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

// Navbar Dropdown Button
const navLinkDataMaster = document.getElementById("navLinkDataMaster");
const caretLeft = document.getElementById("faCaretLeft");

let rotated = false;
navLinkDataMaster.addEventListener("click", function (event) {
    if (!rotated) {
        navLinkDataMaster.classList.add("active");
        caretLeft.style.transition = "transform 0.3s ease-in-out";
        caretLeft.style.transitionDelay = "0.3s";
        caretLeft.style.transform = "rotate(-90deg)";
        rotated = true;
    } else {
        navLinkDataMaster.classList.remove("active");
        caretLeft.style.transform = "rotate(0deg)";
        rotated = false;
    }

    event.preventDefault();
});

const dropdownMenu = document.getElementById("dropdownMenu");

let isDropdownVisible = false;

function toggleDropdownMenu() {
    if (isDropdownVisible) {
        dropdownMenu.classList.add("dropdownMenu-hidden");
        setTimeout(() => {
            dropdownMenu.style.display = "none";
            dropdownMenu.classList.remove("dropdownMenu-hidden");
        }, 300);
    } else {
        dropdownMenu.style.display = "block";
    }
    isDropdownVisible = !isDropdownVisible;
}

navLinkDataMaster.addEventListener("click", function (event) {
    toggleDropdownMenu();
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
    window.location.href = "/admin/assesment";
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
            caretLeft.style.display = "none";
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
            caretLeft.style.display = "block";
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
        caretLeft.style.display = "block";
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

function openModalHapus(id, name) {
    document.getElementById("id_kategori").value = id;
    document.getElementById("nama_kategori").value = name;

    // const formModalContent = document.getElementById('formModalContent');
    // formModalContent.action = '/assessment/' + id;
    document
        .getElementById("form_hapus_kategori")
        .setAttribute("action", `/assessment_kategori/${id}`);

    const modal = new bootstrap.Modal(document.getElementById("hapusKategori"));
    modal.show();
}
