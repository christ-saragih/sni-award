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
    <a class="nav-link {{ request()->is('lead-evaluator/sekretariat*') ? 'active' : '' }}" id="navLink" href="{{ route('lead_evaluator.sekretariat.view') }}">
        <div
            class="icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center"
        >
            <img src="{{ asset('assets') }}/peserta/images/icon-sekretariat.svg" alt="Sekretariat">
        </div>
        <span class="nav-link-text" id="navLinkText">Sekretariat</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('lead-evaluator/lead-evaluator*') ? 'active' : '' }}" id="navLink" href="{{ route('lead_evaluator.lead_evaluator.view') }}">
        <div
            class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
        >
            <img src="{{ asset('assets') }}/peserta/images/icon-lead-evaluator.svg" alt="Lead Evaluator">
        </div>
        <span class="nav-link-text" id="navLinkText">Lead Evaluator</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('lead-evaluator/evaluator*') ? 'active' : '' }}" id="navLink" href="{{ route('lead_evaluator.evaluator.view') }}">
        <div
            class="icon-shape icon-sm text-center me-1 d-flex align-items-center justify-content-center"
        >
            <img src="{{ asset('assets') }}/peserta/images/icon-evaluator.svg" alt="Evaluator">
        </div>
        <span class="nav-link-text" id="navLinkText">Evaluator</span>
    </a>
</li>
</ul>