<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <?php foreach ($users as $user) : ?>
            <div class="col-md-4 col-sm-6 col-lg-3 mb-3">
                <a class="text-decoration-none rounded shadow d-block overflow-hidden" href="/kpi_monitoring/details/<?= $user['id']; ?>" style="height: 100px;">
                    <div class="p-2 bg_hijau1 rounded-top border_bottom2">
                        <?php if ($user['picture'] == '') : ?>
                            <img class="rounded-circle" width="50px" height="50px" src="<?= base_url('img-dev/default.png'); ?>">
                        <?php endif ?>
                        <?php if ($user['picture'] != '') : ?>
                            <img class="rounded-circle" width="50px" height="50px" src="<?= base_url('img-profile/' . $user['picture']); ?>">
                        <?php endif ?>
                        <p class="fw-bold text-uppercase d-inline-block mb-0 text-success text-right"><?= $user['username']; ?></p>
                    </div>
                    <div class="rounded-bottom px-2">
                        <p class="text-dark text-center text-uppercase"><?= $user['fullname']; ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection(); ?>