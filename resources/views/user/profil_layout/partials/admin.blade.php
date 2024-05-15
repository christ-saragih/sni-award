<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" id="navLink" href="/admin/dashboard">
            <div
            class="icon-sm icon-sm text-center me-1 d-flex align-items-center justify-content-center"
            >
            <i class="fa fa-home"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Beranda</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/frontpage*') ? 'active' : '' }}" id="navLink" href="/admin/frontpage">
            <div
            class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
            >
            <i class="fa fa-university"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Halaman Depan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/faq*') ? 'active' : '' }}" id="navLink" href="/admin/faq">
            <div
            class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
            >
            <i class="fa fa-commenting"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">FAQ</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/penjadwalan*') ? 'active' : '' }}" id="navLink" href="/admin/penjadwalan">
            <div
            class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
            >
            <i class="fa fa-calendar"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Penjadwalan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/berita*') || request()->is('admin/acara*') ? 'active' : '' }}" id="navLinkInformasi" href="/admin">
            <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
            <i class="fa fa-sticky-note"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Informasi</span>
            <i class="fa fa-caret-left ms-auto" id="faCaretLeftInformasi"></i>
        </a>
    <ul class="dropdown-menu" id="dropdownMenuInformasi">
        <li class="nav-item">
            <a class="nav-link dropdown {{ request()->is('admin/berita') ? 'active' : '' }}" id="navLinkBerita">
                <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                </div>
                <span class="nav-link-text dropdown">Berita</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown {{ request()->is('admin/acara') ? 'active' : '' }}" id="navLinkAcara">
                <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                </div>
                <span class="nav-link-text dropdown">Acara</span>
            </a>
        </li>
    </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ 
            request()->is('admin/konfigurasi*') ||
            request()->is('admin/assessment*') ||
            request()->is('admin/dokumen*') ||
            request()->is('admin/status_kepemilikan*') ||
            request()->is('admin/lembaga_sertifikasi*') ||
            request()->is('admin/wilayah*') ? 'active' : ''
            }}" 
            id="navLinkDataMaster" 
            href="/admin"
        >
            <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
            <i class="fa fa-database"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Data Master</span>
            <i class="fa fa-caret-left ms-auto" id="faCaretLeftDataMaster"></i>
        </a>
    <ul class="dropdown-menu" id="dropdownMenuDataMaster">
        <li class="nav-item">
            <a class="nav-link dropdown {{ request()->is('admin/konfigurasi') ? 'active' : '' }}" id="navLinkKonfigurasi">
                <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                </div>
                <span class="nav-link-text dropdown">Konfigurasi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown {{ request()->is('admin/assessment') ? 'active' : '' }}" id="navLinkAssesment">
                <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                </div>
                <span class="nav-link-text dropdown">Assesment</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown {{ request()->is('admin/dokumen') ? 'active' : '' }}" id="navLinkDokumen">
                <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                </div>
                <span class="nav-link-text dropdown">Dokumen</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown {{ request()->is('admin/status_kepemilikan') ? 'active' : '' }}" id="navLinkStatusKepemilikan">
                <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                </div>
                <span class="nav-link-text dropdown">Status Kepemilikan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown {{ request()->is('admin/lembaga_sertifikasi') ? 'active' : '' }}" id="navLinkLembagaSertifikasi">
                <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                </div>
                <span class="nav-link-text dropdown">Lembaga Sertifikasi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown {{ request()->is('admin/wilayah') ? 'active' : '' }}" id="navLinkWilayah">
                <div class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center">
                </div>
                <span class="nav-link-text dropdown">Wilayah</span>
            </a>
        </li>
    </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/peserta*') ? 'active' : '' }}" id="navLink" href="/admin/peserta">
            <div
            class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
            >
            <i class="fa fa-user"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Peserta</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/internal*') ? 'active' : '' }}" id="navLink" href="/admin/internal">
            <div
            class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
            >
            <i class="fa fa-tasks"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Internal</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/pendaftar_sni_award*') ? 'active' : '' }}" id="navLink" href="/admin/pendaftar_sni_award">
            <div
            class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
            >
            <i class="fa fa-tags"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Event SNI Award</span>
        </a>
    </li>
</ul>