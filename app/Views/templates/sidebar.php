<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light bg_birulaut0" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav mb-2">
                    <?php if (in_groups('admin')) : ?>
                        <div class="sb-sidenav-menu-heading pb-0 mb-0"><span class="bg_orange0 text-light px-1 rounded">core</span></div>
                        <?= $this->include('templates/sd_dashboard'); ?>
                        <?= $this->include('templates/sd_database'); ?>
                        <?= $this->include('templates/sd_inputs'); ?>
                        <?= $this->include('templates/sd_make_notice'); ?>
                        <?= $this->include('templates/sd_manage_kpi'); ?>
                        <div class="sb-sidenav-menu-heading pb-0 mb-0"><span class="bg_orange0 text-light px-1 rounded">user</span></div>
                        <?= $this->include('templates/sd_sopik'); ?>
                        <?= $this->include('templates/sd_make_reports'); ?>
                        <?= $this->include('templates/sd_inputs_data'); ?>
                        <?= $this->include('templates/sd_mydata'); ?>
                    <?php endif ?>

                    <?php if (in_groups('manager bagian operasi')) : ?>
                        <div class="sb-sidenav-menu-heading pb-0 mb-0"><span class="bg_orange0 text-light px-1 rounded">core</span></div>
                        <?= $this->include('templates/sd_dashboard'); ?>
                        <?= $this->include('templates/sd_make_notice'); ?>
                    <?php endif ?>

                    <?php if (in_groups('supervisor operasi shift a') || in_groups('supervisor operasi shift b') || in_groups('supervisor operasi shift c') || in_groups('supervisor operasi shift d')) : ?>
                        <div class="sb-sidenav-menu-heading pb-0 mb-0"><span class="bg_orange0 text-light px-1 rounded">core</span></div>
                        <?= $this->include('templates/sd_dashboard'); ?>
                        <?= $this->include('templates/sd_database'); ?>
                        <?= $this->include('templates/sd_inputs'); ?>
                        <?= $this->include('templates/sd_make_notice'); ?>
                        <?= $this->include('templates/sd_manage_kpi'); ?>
                        <div class="sb-sidenav-menu-heading pb-0 mb-0"><span class="bg_orange0 text-light px-1 rounded">user</span></div>
                        <?= $this->include('templates/sd_sopik'); ?>
                        <?= $this->include('templates/sd_make_reports'); ?>
                        <?= $this->include('templates/sd_inputs_data'); ?>
                        <?= $this->include('templates/sd_mydata'); ?>
                    <?php endif ?>

                    <?php if (in_groups('operator shift a') || in_groups('operator shift b') || in_groups('operator shift c') || in_groups('operator shift d')) : ?>
                        <div class="sb-sidenav-menu-heading pb-0 mb-0"><span class="bg_orange0 text-light px-1 rounded">user</span></div>
                        <?= $this->include('templates/sd_sopik'); ?>
                        <?= $this->include('templates/sd_make_reports'); ?>
                        <?= $this->include('templates/sd_inputs_data'); ?>
                        <?= $this->include('templates/sd_mydata'); ?>
                    <?php endif ?>

                    <?php if (in_groups('supervisor logistic')) : ?>
                        <div class="sb-sidenav-menu-heading pb-0 mb-0"><span class="bg_orange0 text-light px-1 rounded">core</span></div>
                        <?= $this->include('templates/sd_database'); ?>
                        <div class="sb-sidenav-menu-heading pb-0 mb-0"><span class="bg_orange0 text-light px-1 rounded">user</span></div>
                        <?= $this->include('templates/sd_sopik'); ?>
                    <?php endif ?>

                    <?php if (in_groups('logistic')) : ?>
                        <div class="sb-sidenav-menu-heading pb-0 mb-0"><span class="bg_orange0 text-light px-1 rounded">user</span></div>
                        <?= $this->include('templates/sd_sopik'); ?>
                        <?= $this->include('templates/sd_make_reports'); ?>
                        <?= $this->include('templates/sd_mydata'); ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= user()->fullname; ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <?= $this->renderSection('page-content'); ?>
            </div>
        </main>
        <footer class="py-4 bg-light mt-2">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Simokit 2021</div>
                </div>
            </div>
        </footer>
    </div>
</div>