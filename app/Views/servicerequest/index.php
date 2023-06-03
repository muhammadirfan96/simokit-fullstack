<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <form action="/servicerequest/simpan" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="jenisSr" value="<?= $jenisSr; ?>">

        <div class="row justify-content-evenly">

            <?= $this->include('templates/form_input_tanggal'); ?>
            <?= $this->include('templates/form_input_teman'); ?>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">nomor sr</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="nomorSr" value="<?= old('nomorSr'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('nomorSr')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('nomorSr'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">unit</span>
                    <div class="mt-2 d-flex flex-col justify-content-evenly">
                        <div>
                            <input id="1" type="radio" name="unit" value="#1" <?= old('unit') == "#1" ? 'checked' : ''; ?>>
                            <label for="1">unit 1</label>
                        </div>
                        <div>
                            <input id="2" type="radio" name="unit" value="#2" <?= old('unit') == "#2" ? 'checked' : ''; ?>>
                            <label for="2">unit 2</label>
                        </div>
                    </div>
                    <?php if ($validation->getError('unit')) : ?>
                        <p class="size12 text-danger mb-0 pt-1 text-center"><?= $validation->getError('unit'); ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">area</span>
                    <div class="mt-2 d-flex flex-col justify-content-evenly">
                        <div>
                            <input type="radio" name="area" id="turbin" value="turbin" <?= old('area') == "turbin" ? 'checked' : ''; ?>>
                            <label class="me-3" for="turbin">Turbin</label>
                        </div>
                        <div>
                            <input type="radio" name="area" id="boiler" value="boiler" <?= old('area') == "boiler" ? 'checked' : ''; ?>>
                            <label class="me-3" for="boiler">Boiler</label>
                        </div>
                        <div>
                            <input type="radio" name="area" id="wtp" value="wtp" <?= old('area') == "wtp" ? 'checked' : ''; ?>>
                            <label class="me-3" for="wtp">WTP</label>
                        </div>
                        <div>
                            <input type="radio" name="area" id="electrical" value="electrical" <?= old('area') == "electrical" ? 'checked' : ''; ?>>
                            <label class="me-3" for="electrical">Electrical</label>
                        </div>
                    </div>
                    <?php if ($validation->getError('area')) : ?>
                        <p class="size12 text-danger mb-0 pt-1 text-center"><?= $validation->getError('area'); ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">nama peralatan</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="namaPeralatan" value="<?= old('namaPeralatan'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('namaPeralatan')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('namaPeralatan'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">nomor kks</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="kks" value="<?= old('kks'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('kks')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('kks'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">uraian gangguan</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="uraianGangguan1" placeholder="1." value="<?= old('uraianGangguan1'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('uraianGangguan1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('uraianGangguan1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="uraianGangguan2" placeholder="2." value="<?= old('uraianGangguan2'); ?>" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">deviasi / normal operasi</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="normalOperasi1" placeholder="1." value="<?= old('normalOperasi1'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('normalOperasi1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('normalOperasi1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="normalOperasi2" placeholder="2." value="<?= old('normalOperasi2'); ?>" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">gejala</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="gejala1" placeholder="1." value="<?= old('gejala1'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('gejala1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('gejala1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="gejala2" placeholder="2." value="<?= old('gejala2'); ?>" style="width: 100%;">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">prioritas</span>
                    <div class="mt-2 d-flex flex-col justify-content-evenly">
                        <div>
                            <input type="radio" name="prioritas" id="emergency" value="emergency" <?= old('prioritas') == "emergency" ? 'checked' : ''; ?>>
                            <label class="me-3" for="emergency">1</label>
                        </div>
                        <div>
                            <input type="radio" name="prioritas" id="urgent" value="urgent" <?= old('prioritas') == "urgent" ? 'checked' : ''; ?>>
                            <label class="me-3" for="urgent">2</label>
                        </div>
                        <div>
                            <input type="radio" name="prioritas" id="normal" value="normal" <?= old('prioritas') == "normal" ? 'checked' : ''; ?>>
                            <label class="me-3" for="normal">3</label>
                        </div>
                    </div>
                    <?php if ($validation->getError('prioritas')) : ?>
                        <p class="size12 text-danger mb-0 pt-1 text-center"><?= $validation->getError('prioritas'); ?></p>
                    <?php endif ?>
                    <p class="size12 fst-italic text-center mb-0">1 = Emergency (hari yang sama), 2 = Urgent (1 s/d 2 minggu), 3 = Normal (2 s/d 4 minggu)</p>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">akibat kerusakan</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="akibatKerusakan1" placeholder="1." value="<?= old('akibatKerusakan1'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('akibatKerusakan1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('akibatKerusakan1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="akibatKerusakan2" placeholder="2." value="<?= old('akibatKerusakan2'); ?>" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">kemungkinan dampak</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="kemungkinanDampak1" placeholder="1." value="<?= old('kemungkinanDampak1'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('kemungkinanDampak1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('kemungkinanDampak1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="kemungkinanDampak2" placeholder="2." value="<?= old('kemungkinanDampak2'); ?>" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">tindakan sementara</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="tindakanSementara1" placeholder="1." value="<?= old('tindakanSementara1'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('tindakanSementara1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('tindakanSementara1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="tindakanSementara2" placeholder="2." value="<?= old('tindakanSementara2'); ?>" style="width: 100%;">
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="tindakanSementara3" placeholder="3." value="<?= old('tindakanSementara3'); ?>" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-evenly">
            <div class="col-md-6">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0"><?= $evidence ?></span>
                    <div class="mt-2">
                        <input class="form-control form-control-sm rounded border border-dark" type="file" name="evidence1" value="<?= old('evidence1'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('evidence1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('evidence1'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <?php if ($jenisSr == "flm") : ?>
                <div class="col-md-6">
                    <div class="rounded shadow p-2 mb-3">
                        <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">Setelah FLM</span>
                        <div class="mt-2">
                            <input class="form-control form-control-sm rounded border border-dark" type="file" name="evidence2" value="<?= old('evidence2'); ?>" style="width: 100%;">
                            <?php if ($validation->getError('evidence2')) : ?>
                                <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('evidence2'); ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($jenisSr == "cm") : ?>
            <input class="form-control d-none" type="file" name="evidence2" value="">
        <?php endif; ?>

        <?= $this->include('templates/button_save'); ?>
    </form>
</div>

<?= $this->endSection(); ?>