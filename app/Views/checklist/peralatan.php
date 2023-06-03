<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-11">
            <p class="fs-4 fw-bold my-3 text-light text-uppercase"><span class="bg-secondary rounded px-2">checklist <?= $title; ?></span></p>
        </div>
        <div class="col-1 justify-content-end d-flex">
            <a class="fs-4 text-danger my-3" href="/checklist">
                <div class="justify-content-end d-flex"><i class="fas fa-backspace"></i></div>
            </a>
        </div>
    </div>
</div>

<div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('pesanWarning'); ?>"></div>
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('pesanSuccess'); ?>"></div>

<div class="container-fluid">
    <form action="/checklist/simpan" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="namaPeralatan" value="<?= $title; ?>">
        <input type="hidden" name="jumlahPertanyaan" value="<?= count($pertanyaan); ?>">

        <div class="row">
            <div class="col-xl-6">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">tanggal</span>
                    <p class="fst-italic fw-bold">tanggal diisi secara otomatis berdasarkan waktu checklist dibuat</p>
                </div>
            </div>

            <?= $this->include('templates/form_input_teman'); ?>

        </div>

        <div class="row justify-content-center">
            <?php $i = 1; ?>
            <?php foreach ($pertanyaan as $row) : ?>
                <div class="col-xl-6">
                    <div class="rounded shadow p-2 mb-3">
                        <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">tahapan ke-<?= $i; ?></span>
                        <p class="mb-1"><?= $row["pertanyaan"]; ?></p>
                        <div class="mt-2 d-flex flex-col justify-content-evenly">
                            <div>
                                <input type="radio" name="pertanyaan<?= $i; ?>" value="ya" id="pertanyaan<?= $i; ?>" <?= old('pertanyaan' . $i) == "ya" ? 'checked' : ''; ?>>
                                <label for="pertanyaan<?= $i; ?>">Ya</label>
                            </div>
                            <div>
                                <input type="radio" name="pertanyaan<?= $i; ?>" value="tidak" id="pertanyaan<?= $i; ?>a" <?= old('pertanyaan' . $i) == "tidak" ? 'checked' : ''; ?>>
                                <label for="pertanyaan<?= $i; ?>a">Tidak</label>
                            </div>
                        </div>

                        <?php if ($validation->hasError('pertanyaan' . $i)) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('pertanyaan' . $i); ?></p>
                        <?php endif ?>

                        <textarea class="mt-2 p-2" name="komen<?= $i; ?>" style="width: 100%;"><?= old('komen' . $i); ?></textarea>
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
                        <textarea class="p-2" name="catatan" style="width: 100%;"><?= old('catatan'); ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->include('templates/button_save'); ?>
    </form>
</div>
<?= $this->endSection(); ?>