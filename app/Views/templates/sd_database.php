<a class="nav-link collapsed pb-0 mb-0 text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDatabase" aria-expanded="false" aria-controls="collapseDatabase">
    <div class="sb-nav-link-icon"><i class="fas fa-database text-dark"></i></div>
    Database
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-dark"></i></div>
</a>
<div class="collapse" id="collapseDatabase" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link pb-0 mb-0" href="/db_home">- List DB</a>
        <a class="nav-link pb-0 mb-0 <?= !in_groups('admin') ? 'pe-none' : ''; ?>" href="/manage_users">- Manage Users</a>
    </nav>
</div>