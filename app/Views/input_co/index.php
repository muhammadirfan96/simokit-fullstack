<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="mb-1">
                <button id="unit1" type="button" class="btn btn-sm text-light fw-bold text-uppercase bg_merah0 ">unit 1</button>
                <button id="unit2" type="button" class="btn btn-sm text-light fw-bold text-uppercase bg_biru0 ">unit 2</button>
                <button id="common" type="button" class="btn btn-sm text-light fw-bold text-uppercase bg_hijau0 ">common</button>
            </div>

            <div class="mb-1">
                <select class="border_orange rounded" name="tahun" id="tahun">
                    <?php foreach ($thnList as $key => $val) : ?>
                        <option <?= $key == date('Y') ? 'selected' : ''; ?> value="<?= $key; ?>"><?= $val; ?></option>
                    <?php endforeach ?>
                </select>
                <select class="border_orange rounded" name="bulan" id="bulan">
                    <?php foreach ($blnList as $key => $val) : ?>
                        <option <?= $key == date('m') ? 'selected' : '' ?> value="<?= $key; ?>"><?= $val; ?></option>
                    <?php endforeach ?>
                </select>
                <button id="go" type="button" class="bg_orange0 rounded border-0 text-light fw-bold">GO</button>
            </div>

            <div id="tabel">
                <?= $this->include('input_co/table'); ?>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('/js/inputco.js'); ?>"></script>

<?= $this->endSection(); ?>