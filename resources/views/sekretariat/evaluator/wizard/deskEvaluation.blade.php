<div class="d-flex align-items-center justify-content-end">
    <div class="dropdown container-dropdown-internal">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Tahun
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">2024</a></li>
            <li><a class="dropdown-item" href="#">2023</a></li>
            <li><a class="dropdown-item" href="#">2022</a></li>
            <li><a class="dropdown-item" href="#">2021</a></li>
        </ul>
    </div>
</div>

<table class="table align-items-center mt-4 mb-0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No. Telepon</th>
            <th>Tim Penilai</th>
            <th class="text-center">Status Penilaian</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>1</td>
                <td>Bennefit Saragih</td>
                <td>bennefit@gmail.com</td>
                <td>082269075325</td>
                <td class="d-flex align-items-center justify-content-center">
                    <a href="" class="px-2 py-1" style="color: white; background-color: #6C64CC; border-radius: 10px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat tim">
                        <i class="fa fa-users"></i>
                    </a>
                </td>
                <td>
                    <div class="px-1 py-1 text-center text-white" style="border-radius: 15px; font-weight: bold; background-color: #47A15E;">Sudah Dinilai</div>
                    <!-- <div class="px-1 py-1 text-center text-white" style="border-radius: 15px; font-weight: bold; background-color: #D12B2B;">Belum Dinilai</div> -->
                </td>
                <td class="text-center">
                    <div class="dropdown">
                        <button 
                            type="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false"
                            class="btn dropdown-toggle" 
                            style="
                                text-decoration: none;
                                padding: 5px 10px;
                                border:none;
                                background-color:#E59B30;
                                border-radius:10px;
                            " 
                        >Detail</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="">Profil</a></li>
                            
                            <li><a class="dropdown-item" href="#">Riwayat</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
    </tbody>
</table>