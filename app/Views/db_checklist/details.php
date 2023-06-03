<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <form action="/db_checklist/edit" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="namaPeralatan" value="<?= $data['namaPeralatan']; ?>">
        <input type="hidden" name="jumlahPertanyaan" value="<?= count($pertanyaan); ?>">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <div class="row">
            <div class="col-xl-6">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">tanggal</span>
                    <p class="fst-italic fw-bold">tanggal diisi secara otomatis berdasarkan waktu checklist dibuat</p>
                </div>
            </div>

            <?= $this->include('templates/db_form_input_pelaksana'); ?>

        </div>

        <div class="row justify-content-center">
            <?php $i = 1; ?>
            <?php foreach ($pertanyaan as $row) : ?>
                <div class="col-xl-6">
                    <div class="rounded shadow p-2 mb-3">
                        <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">tahapan ke-<?= $i; ?></span>
                        <p class="mb-1"><?= $row["pertanyaan"]; ?></p>
                        <div class="d-flex justify-content-evenly mb-2">
                            <div>
                                <input type="radio" name="pertanyaan<?= $i; ?>" value="ya" id="pertanyaan<?= $i; ?>" <?= $jawaban['jawaban' . $i] == "ya" ? 'checked' : ''; ?>>
                                <label for="pertanyaan<?= $i; ?>">Ya</label>
                            </div>
                            <div>
                                <input type="radio" name="pertanyaan<?= $i; ?>" value="tidak" id="pertanyaan<?= $i; ?>a" <?= $jawaban['jawaban' . $i] == "tidak" ? 'checked' : ''; ?>>
                                <label for="pertanyaan<?= $i; ?>a">Tidak</label>
                            </div>
                        </div>

                        <textarea class="p-2" name="komen<?= $i; ?>" style="width: 100%;"></textarea>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">catatan / saran</span>
                    <div class="mt-2">
                        <textarea class="p-2" name="catatan" style="width: 100%;"><?= $data['catatan']; ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($data["approved"] == 'n') : ?>
            <?= $this->include('templates/db_button_change_apv'); ?>
        <?php endif ?>

</div>

<?= $this->endSection(); ?>