<a class="nav-link collapsed pb-0 mb-0 text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSopik" aria-expanded="false" aria-controls="collapseSopik">
    <div class="sb-nav-link-icon"><i class="fas fa-book text-dark"></i></div>
    SOP IK
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-dark"></i></div>
</a>
<div class="collapse" id="collapseSopik" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link pb-0 mb-0" href="/bacasopik">- Read</a>
        <a class="nav-link pb-0 mb-0 <?= in_groups('logistic') || in_groups('supervisor logistic') || in_groups('supervisor operasi shift a') || in_groups('supervisor operasi shift b') || in_groups('supervisor operasi shift c') || in_groups('supervisor operasi shift d') ? 'pe-none' : ''; ?>" href="/checklist">- Checklist</a>
    </nav>
</div>