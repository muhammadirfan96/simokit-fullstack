<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <form action="/db_notice/edit" method="post">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <input type="hidden" name="maked_by" value="<?= $data['maked_by']; ?>">

        <div class="row justify-content-evenly">
            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">start time</span>
                    <span><?= $data['start_time']; ?></span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="datetime-local" name="start_time" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">start time</span>
                    <span><?= $data['end_time']; ?></span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="datetime-local" name="end_time" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">isi pemberitahuan</span>
                    <div class="mt-2">
                        <textarea class="p-2" name="content" style="width: 100%;"><?= $data['content']; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->include('templates/button_save'); ?>
    </form>
</div>
<?= $this->endSection(); ?>