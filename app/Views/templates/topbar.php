<nav class="sb-topnav navbar navbar-expand navbar-dark bg_biru0 border_bottom">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 fs-3" href="/">
        <!-- <img src="/img-dev/logo.png" width="30px"> -->
        S I M O K I T
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img class="rounded-circle border border-light border-2" src="<?= base_url('img-profile/' . user()->picture); ?>" width="30px"></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/profil">My Profil</a></li>
                <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>