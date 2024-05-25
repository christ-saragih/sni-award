<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('lead-evaluator/dashboard') ? 'active' : '' }}" id="navLink" href="{{ route('lead_evaluator.dashboard.view') }}">
            <div class="icon-sm icon-sm text-center me-1 d-flex align-items-center justify-content-center">
            <i class="fa fa-home"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Beranda</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('lead-evaluator.lead_evaluator*') ? 'active' : '' }}" id="navLink" href="{{ route('lead_evaluator.lead_evaluator.view') }}">
            <div
            class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
            >
            <i class="fa fa-user-o" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text" id="navLinkText">Peserta</span>
        </a>
    </li>
</ul>