<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('sekretariat/dashboard') ? 'active' : '' }}" id="navLink" href="/sekretariat/dashboard">
            <div class="icon-sm icon-sm text-center me-1 d-flex align-items-center justify-content-center">
            <i class="fa fa-home"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Beranda</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('sekretariat/peserta') ? 'active' : '' }}" id="navLink" href="/sekretariat/peserta">
            <div
            class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
            >
            <i class="fa fa-user-o" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Sekretariat</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('sekretariat/tim') ? 'active' : '' }}" id="navLink" href="/sekretariat/tim">
            <div
            class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
            >
            <i class="fa fa-users"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Tim</span>
        </a>
    </li>
</ul>