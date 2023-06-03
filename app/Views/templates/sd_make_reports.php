<a class="nav-link collapsed pb-0 mb-0 text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
    <div class="sb-nav-link-icon"><i class="fas fa-file-signature text-dark"></i></div>
    Make Reports
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-dark"></i></div>
</a>
<div class="collapse" id="collapseReport" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link pb-0 mb-0 <?= in_groups('logistic') ? 'pe-none' : ''; ?>" href="/servicerequest/cm">- SR CM</a>
        <a class="nav-link pb-0 mb-0 <?= in_groups('logistic') ? 'pe-none' : ''; ?>" href="/servicerequest/flm">- SR FLM</a>
        <a class="nav-link pb-0 mb-0" href="/limas">- Kegiatan 5s</a>
    </nav>
</div>