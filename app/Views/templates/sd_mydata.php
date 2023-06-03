<a class="nav-link collapsed pb-0 mb-0 text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMydata" aria-expanded="false" aria-controls="collapseMydata">
    <div class="sb-nav-link-icon"><i class="fas fa-folder text-dark"></i></div>
    My Data
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-dark"></i></div>
</a>
<div class="collapse" id="collapseMydata" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link pb-0 mb-0" href="/approved_home">- Reporting</a>
        <a class="nav-link pb-0 mb-0 <?= in_groups('logistic') ? 'pe-none' : ''; ?>" href="/kpi">- Kpi</a>
    </nav>
</div>