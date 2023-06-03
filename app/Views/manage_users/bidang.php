<div class="rounded shadow p-2 mb-3">
    <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">bidang</span>
    <div class="mt-2">
        <div class="row">
            <?php for ($i = 0; $i <= 11; $i += 2) : ?>
                <div class="col-6 col-md-4">
                    <div class="size12 fst-italic p-1 m-1 border border-dark rounded">
                        <p class="mb-0"><?= $group[$i]['id'] . ' = ' . $group[$i]['name']; ?></p>
                        <p class="mb-0"><?= $group[$i + 1]['id'] . ' = ' . $group[$i + 1]['name']; ?></p>
                    </div>
                </div>
            <?php endfor ?>
        </div>
        <hr>
        <form action="/manage_users/save_bidang" method="post">
            <div class="overflow-auto mb-2" style="max-height: 60vh;">
                <div class="d-flex flex-wrap justify-content-evenly">
                    <?php foreach ($users as $user) : ?>
                        <div class="">
                            <div class="px-3 py-1 m-1 border border-dark rounded text-center">
                                <label class="d-block" for="<?= $user['id']; ?>"><?= $user['fullname']; ?></label>
                                <div class="size12">
                                    1&laquo;
                                    <?php foreach ($group as $item) : ?>
                                        <input class="m-1" type="radio" name="<?= $user['id']; ?>" value="<?= $item['name'] . ' | ' . $item['id']; ?>" <?= $user['bidang'] == $item['name'] ? 'checked' : ''; ?>>
                                    <?php endforeach ?>
                                    &raquo;12
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <?= $this->include('templates/button_save'); ?>
        </form>
    </div>
</div>