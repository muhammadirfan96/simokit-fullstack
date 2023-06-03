<div id="bidangRegis" class="rounded shadow p-2 mb-3">
    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">aktivasi bidang form registration</span>
    <div class="mt-2">
        <form action="/manage_users/save_bidang_regis" method="post">
            <ul class="overflow-auto px-2" style="max-height: 40vh;">
                <?php foreach ($group as $item) : ?>
                    <li>
                        <label for="<?= $item['id']; ?>" style="width: 95%;"><?= $item['name']; ?></label>
                        <input type="checkbox" name="<?= $item['id']; ?>" value="1" id="<?= $item['id']; ?>" <?= $item['description'] == 1 ? 'checked' : ''; ?>>
                    </li>
                    <hr class="m-1">
                <?php endforeach ?>
            </ul>
            <?= $this->include('templates/button_save'); ?>
        </form>
    </div>
</div>