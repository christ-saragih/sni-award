 // Inisialisasi variabel untuk melacak halaman saat ini
 var currentPage = 1; // Misalnya, kita mulai dari halaman pertama


// Panggil fungsi untuk menetapkan tampilan tombol navigasi saat pertama kali memuat halaman
$(document).ready(function() {
    aturTombolNavigasi();
});

// Ketika tombol "selanjutnya" diklik
$(".selanjutnyaAssesment").click(function () {
    // Temukan fieldset saat ini yang sedang ditampilkan
    var currentFieldset = $(this).closest('fieldset');
    // Temukan fieldset selanjutnya setelah fieldset saat ini
    var nextFieldset = currentFieldset.next('fieldset');

    // Periksa apakah masih ada fieldset selanjutnya
    if (nextFieldset.length > 0) {
        // Sembunyikan fieldset saat ini
        // currentFieldset.hide();
        // Tampilkan fieldset selanjutnya
        nextFieldset.show();
        // Atur tampilan tombol navigasi
        aturTombolNavigasi();
    }
});

// Ketika tombol "sebelumnya" diklik
$(".sebelumnyaAssesment").click(function () {
    // Temukan fieldset saat ini yang sedang ditampilkan
    var currentFieldset = $(this).closest('fieldset');
    // Temukan fieldset sebelumnya sebelum fieldset saat ini
    var previousFieldset = currentFieldset.prev('fieldset');

    // Periksa apakah masih ada fieldset sebelumnya
    if (previousFieldset.length > 0) {
        // Sembunyikan fieldset saat ini
        currentFieldset.hide();
        // Tampilkan fieldset sebelumnya
        previousFieldset.show();
        // Atur tampilan tombol navigasi
        aturTombolNavigasi();
    }
});

// Fungsi untuk menetapkan tampilan tombol navigasi
function aturTombolNavigasi() {
    // Periksa apakah tombol "selanjutnya" harus ditampilkan atau disembunyikan
    if ($(".fieldset:visible").last().attr("id") === $(".fieldset:visible").attr("id")) {
        $(".selanjutnyaAssesment").hide(); // Sembunyikan tombol jika sudah di halaman terakhir
    } else {
        $(".selanjutnyaAssesment").show(); // Tampilkan tombol jika belum di halaman terakhir
    }

    // Periksa apakah tombol "sebelumnya" harus ditampilkan atau disembunyikan
    if ($(".fieldset:visible").first().attr("id") === $(".fieldset:visible").attr("id")) {
        $(".sebelumnyaAssesment").hide(); // Sembunyikan tombol jika sudah di halaman pertama
    } else {
        $(".sebelumnyaAssesment").show(); // Tampilkan tombol jika belum di halaman pertama
    }
}


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
    if (sidenavVisible) {
        sidenavMain.style.width = "4%";
        mainContent.style.marginLeft = "3.625rem";
        // Iterasi melalui setiap elemen dalam NodeList
        navLinks.forEach(function (element) {
            element.style.marginLeft = "0";
        });
        navLinkText.forEach(function (element) {
            element.style.display = "none";
        });
        navbarBrand.style.display = "none";
        sidebar.style.marginTop = "4rem";
    } else {
        sidenavMain.style.width = "100%";
        mainContent.style.marginLeft = "17.125rem"; // Atur kembali margin ke nilai semula jika ingin menampilkan sidenav
        navLinks.forEach(function (element) {
            element.style.marginLeft = "1rem";
        });
        // Iterasi melalui setiap elemen dalam NodeList
        navLinkText.forEach(function (element) {
            element.style.display = "block"; // Atur kembali display ke nilai semula
        });
        navbarBrand.style.display = "block";
        sidebar.style.marginTop = "0";
    }
    sidenavVisible = !sidenavVisible; // Toggle status tampilan sidenav
    event.preventDefault();
});

// // Initialization for ES Users
// import { Tab, initMDB } from "mdb-ui-kit";

// initMDB({ Tab });

// Ubah teks 'Choose File' menjadi 'Unggah' saat input file dipilih
// document
//     .querySelector('input[type="file"]')
//     .addEventListener("change", function (e) {
//         var fileName = e.target.files[0].name;
//         var siblingInput = e.target.nextElementSibling;
//         if (fileName) {
//             siblingInput.value = fileName;
//         } else {
//             siblingInput.value = "";
//         }
//     });

$(function () {
    rome(inputCalendar, { time: false, inputFormat: "DD-MM-YYYY" });
});

const fileInput = document.getElementById("inputGroupFile1");

const fileInputLabel = document.getElementById("file-input-label");

fileInput.addEventListener("change", () => {
    if (fileInput.value === "") {
        fileInputLabel.innerHTML = "Select a file";
    } else {
        const realPathArray = fileInput.value.split("\\");

        fileInputLabel.innerHTML = realPathArray[realPathArray.length - 1];
    }
});

function pilihJawaban(element) {
    // Menandai jawaban yang dipilih
    var selectedRadio = element.querySelector('input[type="radio"]');
    var groupName = selectedRadio.getAttribute('name');

    var otherRadios = document.querySelectorAll('input[type="radio"][name="' + groupName + '"]');
    otherRadios.forEach(function(radio) {
        if (radio !== selectedRadio) {
            radio.checked = false;
            radio.parentElement.classList.remove('selected'); // Menghapus kelas 'selected' dari label yang tidak dipilih
        }
    });

    if (selectedRadio.checked) {
        element.classList.add('selected'); // Menambahkan kelas 'selected' ke label jawaban yang dipilih
    } else {
        element.classList.remove('selected'); // Menghapus kelas 'selected' jika jawaban tidak dipilih
    }
}

// Fungsi untuk menangani unggah dokumen
function handleUpload() {
    // Lakukan logika untuk mengunggah dokumen, dan kemudian panggil fungsi untuk memperbarui tampilan
    updateDocumentList();
}

// Fungsi untuk memperbarui tampilan dengan daftar dokumen dari baris lain
function updateDocumentList() {
    // Lakukan permintaan AJAX ke endpoint yang sesuai di server (Laravel)
    $.ajax({
        url: '{{route("")}}',
        method: 'GET',
        success: function(response) {
            // Update tampilan dengan daftar dokumen dari baris lain
            // Misalnya, Anda dapat mengganti isi dari sebuah div dengan daftar dokumen yang diterima dari server
            $('#otherDocuments').html(response);
        },
        error: function(xhr, status, error) {
            // Tangani kesalahan jika ada
            console.error(error);
        }
    });
}

const fileUpload = document.querySelector('#file-upload');
const btnBrowse = document.querySelector('.btn-browse');

btnBrowse.addEventListener('click', () => {
    fileUpload.click();
});

fileUpload.addEventListener('change', () => {
    if (fileUpload.files.length > 0) {
        const fileName = fileUpload.files[0].name;
        btnBrowse.textContent = fileName;
    }
});
// TAMBAH KONTAK PENGHUBUNG START
const iconTambah = document.getElementById('iconTambah');
const containerFormTambahKontak = document.querySelector('.content-kontak-form .container');
let kontakCount = 1;

iconTambah.addEventListener('click', function() {
    if (kontakCount < 3) {
        const newForm = createNewForm();
        containerFormTambahKontak.appendChild(newForm);

        if (kontakCount === 3) {
            iconTambah.disabled = true;
            iconTambah.style.cursor = "default";
        }
    }
});

function createNewForm() {
    const newForm = document.createElement('div');
    newForm.classList.add('row', 'd-flex', 'justify-content-center', 'align-items-center', 'kontak-penghubung');

    newForm.innerHTML = `
        <div class="col-xl-12">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body">
                    <div class="row pt-4 pb-4">
                        <div class="ps-5 d-flex flex-column gap-3">
                            <h6 class="mb-0">Kontak Penghubung ${kontakCount}</h6>
                            <hr class="p-0 flex-fill" style="height: 1px; background-color: #9FAFBF;">
                        </div>
                    </div>
                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Nama Penghubung</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                            <input type="text" class="form-control form-control-lg" />
                        </div>
                    </div>
                    <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Nomor Telepon</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                            <input type="text" class="form-control form-control-lg" />
                        </div>
                    </div>
                    <div class="row align-items-center pb-3">
                        <div class="col-md-4 ps-5">
                            <h6 class="mb-0">Jabatan</h6>
                        </div>
                        <div class="col-md-8 pe-5">
                            <input type="text" class="form-control form-control-lg" />
                        </div>
                    </div>
                    <div class="px-5 py-4 d-flex justify-content-end gap-3">
                        <button id="buttonBatal" type="submit" class="btn nonactive" style="width: 13%;">Batal</button>
                        <button type="submit" class="btn" style="width: 13%;">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    `;

    kontakCount++;
    return newForm;
}

// BATALKAN
document.addEventListener('click', function(event) {
    if (event.target.id === 'buttonBatal') {
        const form = event.target.closest('.card');
        form.style.display = 'none';
      
        kontakCount--;

        if (kontakCount < 3) {
            iconTambah.style.cursor = "pointer";
            iconTambah.disabled = false;
            iconTambah.id = '';
        }
    }
});
// TAMBAH KONTAK PENGHUBUNG END


