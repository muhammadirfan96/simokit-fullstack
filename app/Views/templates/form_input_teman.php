<div class="col-md-6 col-xl-4">
    <div class="rounded shadow p-2 mb-3">
        <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">teman</span>
        <div class="dropdown mt-2">
            <button class="btn border border-dark pt-4" type="button" id="teman" data-bs-toggle="dropdown" style="width: 100%;">
            </button>
            <ul class="dropdown-menu overflow-auto px-2" aria-labelledby="teman" style="width: 100%;max-height: 40vh;">
                <?php foreach ($users as $user) : ?>
                    <li>
                        <input type="checkbox" id="<?= $user['username']; ?>" name="<?= $user['username']; ?>" value="<?= $user['username']; ?>" <?= old($user['username']) == $user['username'] ? 'checked' : ''; ?>>
                        <label for="<?= $user['username']; ?>">
                            <?= $user['fullname']; ?>
                        </label>
                    </li>
                    <hr class="m-1">
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>