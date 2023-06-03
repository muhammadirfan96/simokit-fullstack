<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <form action="/input_absensi/simpan" method="post">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="rounded shadow p-2 mb-3" style="width: 100%;height:80%;">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">operator</span>
                    <div class="mt-2 d-flex flex-col justify-content-between">
                        <div>
                            <input type="radio" name="shift" id="a" value="shift a" <?= $status[0]; ?>>
                            <label for="a">shift a</label>
                        </div>
                        <div>
                            <input type="radio" name="shift" id="b" value="shift b" <?= $status[1]; ?>>
                            <label for="b">shift b</label>
                        </div>
                        <div>
                            <input type="radio" name="shift" id="c" value="shift c" <?= $status[2]; ?>>
                            <label for="c">shift c</label>
                        </div>
                        <div>
                            <input type="radio" name="shift" id="d" value="shift d" <?= $status[3]; ?>>
                            <label for="d">shift d</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="rounded shadow p-2 mb-3" style="width: 100%;height:80%;">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">tanggal</span>
                    <div class="overflow-auto mt-2">
                        <input type="date" name="waktu" style="width: 100%;" required>
                    </div>
                </div>
            </div>
        </div>
        <div id="table" class="row justify-content-evenly">
            <?= $this->include('input_absensi/table'); ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">catatan</span>
                    <div class="overflow-auto mt-2">
                        <textarea class="p-2" name="catatan" style="width: 100%;"></textarea>
                    </div>
                </div>
            </div>
            <div class="col">
                <button class="btn fw-bold text-light bg_hijau0" type="submit" style="width: 100%;">SAVE</button>
            </div>
        </div>
    </form>
</div>

<script src="<?= base_url('/js/inputAbsensi.js'); ?>"></script>
<?= $this->endSection(); ?>