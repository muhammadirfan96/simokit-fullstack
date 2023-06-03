<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <form action="/limas/simpan" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row justify-content-evenly">

            <?= $this->include('templates/form_input_tanggal'); ?>
            <?= $this->include('templates/form_input_teman'); ?>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">area</span>
                    <div class="mt-2">
                        <input class="px-2" type="text" name="area" value="<?= old('area'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('area')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('area'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">sasaran</span>
                    <div class="mt-2">
                        <textarea class="px-2" name="namaPeralatan" style="width: 100%;height: 90px;"><?= old('namaPeralatan'); ?></textarea>
                        <?php if ($validation->getError('namaPeralatan')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('namaPeralatan'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">keterangan</span>
                    <div class="mt-2 size12">
                        <ul>
                            <li>1 = Belum memulai kegiatan 5S, tidak ada usaha sama sekali</li>
                            <li>2 = Sudah memulai kegiatan 5S, tetapi ada banyak perbaikan major (perbaikan perlu beberapa hari)</li>
                            <li>3 = Cukup baik, hanya perlu beberapa improvement minor (bisa langsung saat itu memperbaiki kondisi)</li>
                            <li>4 = sudah baik, hanya perlu sedikit improvement</li>
                            <li>5 = Sudah sangat baik, terus pertahankan kondisi seperti ini</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php $i = 1; ?>
            <?php foreach ($pertanyaan as $row) : ?>
                <div class="col-md-6">
                    <div class="mb-3 border p-2 rounded shadow text-center">
                        <label><?= $row["pertanyaan"]; ?></label><br>1&laquo;
                        <input class="mx-2" type="radio" name="nilai<?= $i; ?>" value="1" <?= old('nilai' . $i) == "1" ? 'checked' : ''; ?>>
                        <input class="mx-2" type="radio" name="nilai<?= $i; ?>" value="2" <?= old('nilai' . $i) == "2" ? 'checked' : ''; ?>>
                        <input class="mx-2" type="radio" name="nilai<?= $i; ?>" value="3" <?= old('nilai' . $i) == "3" ? 'checked' : ''; ?>>
                        <input class="mx-2" type="radio" name="nilai<?= $i; ?>" value="4" <?= old('nilai' . $i) == "4" ? 'checked' : ''; ?>>
                        <input class="mx-2" type="radio" name="nilai<?= $i; ?>" value="5" <?= old('nilai' . $i) == "5" ? 'checked' : ''; ?>>&raquo;5
                        <?php if ($validation->getError('nilai' . $i)) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('nilai' . $i); ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">foto sebelum</span>
                    <div class="mt-2">
                        <input class="form-control form-control-sm border border-dark" type="file" name="fotoSebelum">
                        <?php if ($validation->getError('fotoSebelum')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('fotoSebelum'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">foto setelah</span>
                    <div class="mt-2">
                        <input class="form-control form-control-sm border border-dark" type="file" name="fotoSetelah">
                        <?php if ($validation->getError('fotoSetelah')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('fotoSetelah'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">catatan / saran</span>
                    <div class="mt-2">
                        <textarea class="p-2" name="saran" style="width: 100%;"><?= old('saran'); ?></textarea>
                        <?php if ($validation->getError('saran')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('saran'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->include('templates/button_save'); ?>
    </form>
</div>
<?= $this->endSection(); ?>