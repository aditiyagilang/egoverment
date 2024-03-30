<!-- Sidebar scroll-->

<style>
    /* Warna latar belakang item sidebar aktif */
    .sidebar-item.active {
        background-color: #6084fc; /* Warna latar belakang item sidebar aktif */
    }

    /* Warna teks item sidebar aktif */
    .sidebar-item.active .hide-menu {
        color: #fdfdfd; /* Warna teks item sidebar aktif */
    }
    .sidebar-item.active .sidebar-link span i {
        color: #fdfdfd; /* Warna ikon item sidebar aktif */
    }
</style>

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
                <a class="sidebar-link" href="/dashboard" aria-expanded="false">
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
                <span class="hide-menu">Tabel User</span>
            </li>
            <li class="sidebar-item {{ $activePage == 'jabatan' ? 'active' : '' }}">
                <a class="sidebar-link" href="/jabatan" aria-expanded="false">
                    <span>
                        <i class="fas fa-briefcase"></i>  <!-- Icon untuk Surat Masuk -->
                    </span>
                    <span class="hide-menu">Jabatan</span>
                </a>
            </li>
            <li class="sidebar-item {{ $activePage == 'user' ? 'active' : '' }}">
                <a class="sidebar-link" href="/user" aria-expanded="false">
                    <span>
                        <i class="fas fa-user"></i>
                    </span>
                    <span class="hide-menu">User</span>
                </a>
            </li>

        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->


