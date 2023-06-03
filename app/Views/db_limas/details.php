<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <form action="/db_limas/edit" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <div class="row">

            <?= $this->include('templates/db_form_input_tanggal'); ?>
            <?= $this->include('templates/db_form_input_pelaksana'); ?>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">area</span>
                    <div class="mt-2">
                        <input class="px-2" type="text" name="area" value="<?= $data['area']; ?>" style="width: 100%;">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">sasaran</span>
                    <div class="mt-2">
                        <textarea class="px-2" name="namaPeralatan" style="width: 100%;height: 90px;"><?= $data['namaPeralatan']; ?></textarea>
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
                        <input class="mx-2" type="radio" name="nilai<?= $i; ?>" value="1" <?= $nilaiLimas['nilai' . $i] == "1" ? 'checked' : ''; ?>>
                        <input class="mx-2" type="radio" name="nilai<?= $i; ?>" value="2" <?= $nilaiLimas['nilai' . $i] == "2" ? 'checked' : ''; ?>>
                        <input class="mx-2" type="radio" name="nilai<?= $i; ?>" value="3" <?= $nilaiLimas['nilai' . $i] == "3" ? 'checked' : ''; ?>>
                        <input class="mx-2" type="radio" name="nilai<?= $i; ?>" value="4" <?= $nilaiLimas['nilai' . $i] == "4" ? 'checked' : ''; ?>>
                        <input class="mx-2" type="radio" name="nilai<?= $i; ?>" value="5" <?= $nilaiLimas['nilai' . $i] == "5" ? 'checked' : ''; ?>>&raquo;5
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">foto sebelum</span>
                    <a class="text-decoration-none" href="<?= base_url('img-5s/' . $data['fotoSebelum']); ?>" target="_blank"> <?= $data['fotoSebelum']; ?></a>
                    <div class="mt-2">
                        <input class="<?= ($validation->hasError('fotoSebelum')) ? 'is-invalid' : ''; ?> form-control form-control-sm border border-dark" type="file" name="fotoSebelum">
                        <div class="invalid-feedback">
                            <?= $validation->getError('fotoSebelum'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">foto setelah</span>
                    <a class="text-decoration-none" href="<?= base_url('img-5s/' . $data['fotoSetelah']); ?>" target="_blank"> <?= $data['fotoSetelah']; ?></a>
                    <div class="mt-2">
                        <input class="<?= ($validation->hasError('fotoSetelah')) ? 'is-invalid' : ''; ?> form-control form-control-sm border border-dark" type="file" name="fotoSetelah">
                        <div class="invalid-feedback">
                            <?= $validation->getError('fotoSetelah'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">catatan / saran</span>
                    <div class="mt-2">
                        <textarea class="p-2" name="saran" style="width: 100%;"><?= $data['saran']; ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($data["approved"] == 'n') : ?>
            <?= $this->include('templates/db_button_change_apv'); ?>
        <?php endif ?>

</div>
<?= $this->endSection(); ?>