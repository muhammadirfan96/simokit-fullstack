<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <form action="/db_servicerequest/edit" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <div class="row justify-content-evenly">

            <?= $this->include('templates/db_form_input_tanggal'); ?>
            <?= $this->include('templates/db_form_input_pelaksana'); ?>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">nomor sr</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="nomorSr" value="<?= $data['nomorSr']; ?>" style="width: 100%;">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">unit</span>
                    <div class="mt-2 d-flex flex-col justify-content-evenly">
                        <div>
                            <input id="1" type="radio" name="unit" value="#1" <?= $data['unit'] == "#1" ? 'checked' : ''; ?>>
                            <label for="1">unit 1</label>
                        </div>
                        <div>
                            <input id="2" type="radio" name="unit" value="#2" <?= $data['unit'] == "#2" ? 'checked' : ''; ?>>
                            <label for="2">unit 2</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">area</span>
                    <div class="mt-2 d-flex flex-col justify-content-evenly">
                        <div>
                            <input type="radio" name="area" id="turbin" value="turbin" <?= $data['area'] == "turbin" ? 'checked' : ''; ?>>
                            <label class="me-3" for="turbin">Turbin</label>
                        </div>
                        <div>
                            <input type="radio" name="area" id="boiler" value="boiler" <?= $data['area'] == "boiler" ? 'checked' : ''; ?>>
                            <label class="me-3" for="boiler">Boiler</label>
                        </div>
                        <div>
                            <input type="radio" name="area" id="wtp" value="wtp" <?= $data['area'] == "wtp" ? 'checked' : ''; ?>>
                            <label class="me-3" for="wtp">WTP</label>
                        </div>
                        <div>
                            <input type="radio" name="area" id="electrical" value="electrical" <?= $data['area'] == "electrical" ? 'checked' : ''; ?>>
                            <label class="me-3" for="electrical">Electrical</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">nama peralatan</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="namaPeralatan" value="<?= $data['namaPeralatan']; ?>" style="width: 100%;">
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
                        <input class="px-2 pt-1" type="text" name="kks" value="<?= $data['kks']; ?>" style="width: 100%;">
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
                        <input class="px-2 pt-1" type="text" name="uraianGangguan1" placeholder="1." value="<?= $data['uraianGangguan1']; ?>" style="width: 100%;">
                        <?php if ($validation->getError('uraianGangguan1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('uraianGangguan1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="uraianGangguan2" placeholder="2." value="<?= $data['uraianGangguan2']; ?>" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">deviasi / normal operasi</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="normalOperasi1" placeholder="1." value="<?= $data['normalOperasi1']; ?>" style="width: 100%;">
                        <?php if ($validation->getError('normalOperasi1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('normalOperasi1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="normalOperasi2" placeholder="2." value="<?= $data['normalOperasi2']; ?>" style="width: 100%;">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">gejala</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="gejala1" placeholder="1." value="<?= $data['gejala1']; ?>" style="width: 100%;">
                        <?php if ($validation->getError('gejala1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('gejala1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="gejala2" placeholder="2." value="<?= $data['gejala2']; ?>" style="width: 100%;">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">prioritas</span>
                    <div class="mt-2 d-flex flex-col justify-content-evenly">
                        <div>
                            <input type="radio" name="prioritas" id="emergency" value="emergency" <?= $data['prioritas'] == "emergency" ? 'checked' : ''; ?>>
                            <label class="me-3" for="emergency">1</label>
                        </div>
                        <div>
                            <input type="radio" name="prioritas" id="urgent" value="urgent" <?= $data['prioritas'] == "urgent" ? 'checked' : ''; ?>>
                            <label class="me-3" for="urgent">2</label>
                        </div>
                        <div>
                            <input type="radio" name="prioritas" id="normal" value="normal" <?= $data['prioritas'] == "normal" ? 'checked' : ''; ?>>
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
                        <input class="px-2 pt-1" type="text" name="akibatKerusakan1" placeholder="1." value="<?= $data['akibatKerusakan1']; ?>" style="width: 100%;">
                        <?php if ($validation->getError('akibatKerusakan1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('akibatKerusakan1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="akibatKerusakan2" placeholder="2." value="<?= $data['akibatKerusakan2']; ?>" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">kemungkinan dampak</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="kemungkinanDampak1" placeholder="1." value="<?= $data['kemungkinanDampak1']; ?>" style="width: 100%;">
                        <?php if ($validation->getError('kemungkinanDampak1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('kemungkinanDampak1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="kemungkinanDampak2" placeholder="2." value="<?= $data['kemungkinanDampak2']; ?>" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">tindakan sementara</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="tindakanSementara1" placeholder="1." value="<?= $data['tindakanSementara1']; ?>" style="width: 100%;">
                        <?php if ($validation->getError('tindakanSementara1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('tindakanSementara1'); ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="tindakanSementara2" placeholder="2." value="<?= $data['tindakanSementara2']; ?>" style="width: 100%;">
                    </div>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="text" name="tindakanSementara3" placeholder="3." value="<?= $data['tindakanSementara3']; ?>" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-evenly">
            <div class="col-md-6">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0"><?= $evidence ?></span>
                    <a class="text-decoration-none" href="<?= base_url('img-sr/' . $data['evidence1']); ?>" target="_blank"> <?= $data['evidence1']; ?></a>
                    <div class="mt-2">
                        <input class="form-control form-control-sm rounded border border-dark" type="file" name="evidence1" style="width: 100%;">
                        <?php if ($validation->getError('evidence1')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('evidence1'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <?php if ($data['ket'] == "flm") : ?>
                <div class="col-md-6">
                    <div class="rounded shadow p-2 mb-3">
                        <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">setelah flm</span>
                        <a class="text-decoration-none" href="<?= base_url('img-sr/' . $data['evidence2']); ?>" target="_blank"> <?= $data['evidence2']; ?></a>
                        <div class="mt-2">
                            <input class="form-control form-control-sm rounded border border-dark" type="file" name="evidence2" style="width: 100%;">
                            <?php if ($validation->getError('evidence2')) : ?>
                                <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('evidence2'); ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>


        <?php if ($data['ket'] == "cm") : ?>
            <input class="form-control d-none" type="file" name="evidence2" value="">
        <?php endif; ?>

        <?php if ($data["approved"] == 'n') : ?>
            <?= $this->include('templates/db_button_change_apv'); ?>
        <?php endif ?>
</div>

<?= $this->endSection(); ?>