<div class="rounded shadow p-2 mb-3">
    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">aktivasi user</span>
    <div class="mt-2">
        <form action="/manage_users/save_aktivasi_user" method="post">
            <ul class="overflow-auto px-2" style="max-height: 40vh;">
                <?php foreach ($users as $user) : ?>
                    <li>
                        <label for="<?= $user['id']; ?>" style="width: 95%;"><?= $user['fullname']; ?></label>
                        <input type="checkbox" name="<?= $user['id']; ?>" value="1" id="<?= $user['id']; ?>" <?= $user['active'] == 1 ? 'checked' : ''; ?>>
                    </li>
                    <hr class="m-1">
                <?php endforeach ?>
            </ul>
            <?= $this->include('templates/button_save'); ?>
        </form>
    </div>
</div>