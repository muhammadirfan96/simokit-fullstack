<div class="col-md-6 col-xl-4">
    <div class="rounded shadow p-2 mb-3">
        <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">tanggal</span>
        <div class="mt-2">
            <input class="px-2 pt-1" type="datetime-local" name="tanggal" value="<?= old('tanggal'); ?>" style="width: 100%;">
            <?php if ($validation->getError('tanggal')) : ?>
                <p class="size12 text-danger mb-0 pt-1 pt-1 text-center"><?= $validation->getError('tanggal'); ?></p>
            <?php endif ?>
        </div>
    </div>
</div>