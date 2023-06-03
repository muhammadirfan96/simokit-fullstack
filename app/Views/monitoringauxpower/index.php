<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <form action="laporan_monitoring_aux_power/save" method="post">

        <div class="row justify-content-evenly">
            <div class="col" style="width: 100%;">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">nama file</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="nama_file" value="<?= old('nama_file'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('nama_file')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('nama_file'); ?></p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">link drive</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="link" value="<?= old('link'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('link')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('link'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->include('templates/button_save'); ?>
    </form>
</div>

<?= $this->endSection(); ?>