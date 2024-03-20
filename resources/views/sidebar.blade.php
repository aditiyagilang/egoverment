<!-- Sidebar scroll-->
<div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="/index" class="text-nowrap logo-img">
            <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
        </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item {{ $activePage == 'index' ? 'active' : '' }}">
                <a class="sidebar-link" href="/index" aria-expanded="false">
                    <span>
                        <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Tabel Surat</span>
            </li>
            <li class="sidebar-item {{ $activePage == 'suratmasuk' ? 'active' : '' }}">
                <a class="sidebar-link" href="/suratmasuk" aria-expanded="false">
                    <span>
                        <i class="fas fa-envelope"></i> <!-- Icon untuk Surat Masuk -->
                    </span>
                    <span class="hide-menu">Surat Masuk</span>
                </a>
            </li>
            <li class="sidebar-item {{ $activePage == 'suratkeluar' ? 'active' : '' }}">
                <a class="sidebar-link" href="/suratkeluar" aria-expanded="false">
                    <span>
                        <i class="fas fa-envelope-open-text"></i>
                    </span>
                    <span class="hide-menu">Surat Keluar</span>
                </a>
            </li>
            <li class="sidebar-item {{ $activePage == 'suratdisposisi' ? 'active' : '' }}">
                <a class="sidebar-link" href="/suratdisposisi" aria-expanded="false">
                    <span>
                        <i class="fas fa-mail-bulk"></i>
                    </span>
                    <span class="hide-menu">Surat Disposisi</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
