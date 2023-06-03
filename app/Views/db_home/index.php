<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid text-center">
    <div class="row">
        <?php foreach ($data as $row) : ?>
            <div class="col-xl-3 col-md-6 mb-3">
                <a href="/<?= $row[0]; ?>" class="text-decoration-none rounded shadow d-block">
                    <div class="p-2 bg_hijau1 rounded-top border_bottom2 text-start">
                        <i class="fas <?= $row[1]; ?> fs-2 text-success"></i>
                        <p class="fw-bolder text-uppercase fs-5 d-inline-block mb-0 text-success text-right">database</p>
                    </div>
                    <div class="rounded-bottom text-dark fw-bolder text-uppercase py-2">
                        <?= $row[2]; ?>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection(); ?>