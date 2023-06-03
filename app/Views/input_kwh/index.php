<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <form action="input_kwh/save" method="post">

        <div class="row justify-content-evenly">
            <div class="col-md-6">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">time</span>
                    <div class="mt-2">
                        <div class="px-2 py-1 fw-bold border border-dark rounded fst-italic" style="width: 100%;">masukkan data kwh pukul 00:00 setiap hari</div>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="datetime-local" name="waktu" value="<?= old('waktu'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('waktu')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('waktu'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">kwh kit</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="kit1" placeholder="#1" value="<?= old('kit1'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('kit1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('kit1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="kit2" placeholder="#2" value="<?= old('kit2'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('kit2')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('kit2'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">kwh ps</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="ps1" placeholder="#1" value="<?= old('ps1'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('ps1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('ps1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="ps2" placeholder="#2" value="<?= old('ps2'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('ps2')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('ps2'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">kwh et</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="et1" placeholder="#1" value="<?= old('et1'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('et1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('et1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="et2" placeholder="#2" value="<?= old('et2'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('et2')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('et2'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->include('templates/button_save'); ?>
    </form>
</div>

<?= $this->endSection(); ?>