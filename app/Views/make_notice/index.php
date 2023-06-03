<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <form action="/make_notice/post" method="post">

        <div class="row justify-content-evenly">
            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">start time</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="datetime-local" name="start_time" value="<?= old('start_time'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('start_time')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('start_time'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">end time</span>
                    <div class="mt-2">
                        <input class="px-2 pt-1" type="datetime-local" name="end_time" value="<?= old('end_time'); ?>" style="width: 100%;">
                        <?php if ($validation->getError('end_time')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('end_time'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">notify to</span>
                    <div class="dropdown mt-2">
                        <button class="btn border border-dark pt-4" type="button" id="teman" data-bs-toggle="dropdown" style="width: 100%;">
                        </button>
                        <ul class="dropdown-menu overflow-auto px-2" style="width: 100%;max-height: 40vh;">
                            <?php foreach ($notifyTo as $item) : ?>
                                <li>
                                    <input type="checkbox" id="<?= $item[1]; ?>" name="<?= $item[1]; ?>" value="<?= $item[0]; ?>" <?= old($item[1]) == $item[0] ? 'checked' : ''; ?>>
                                    <label for="<?= $item[1]; ?>">
                                        <?= $item[0]; ?>
                                    </label>
                                </li>
                                <hr class="m-1">
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="rounded shadow p-2 mb-3">
                    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">isi pemberitahuan</span>
                    <div class="mt-2">
                        <textarea class="p-2" name="content" style="width: 100%;"><?= old('content'); ?></textarea>
                        <?php if ($validation->getError('content')) : ?>
                            <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('content'); ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->include('templates/button_save'); ?>
    </form>
</div>

<?= $this->endSection(); ?>