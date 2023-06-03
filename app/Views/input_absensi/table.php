<?php foreach ($ket as $row) : ?>
    <div class="col-md-6 col-lg-3">
        <div class="rounded shadow p-2 mb-3">
            <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0"><?= $row; ?></span>
            <div class="overflow-auto mb-2" style="max-height: 380px;">
                <table class="table table-sm">
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td>
                                <input class="form-check-input ms-2" type="radio" id="<?= $user['username'] . $row; ?>" name="<?= $user['username']; ?>" value="<?= $row; ?>">
                            </td>
                            <td width="97%">
                                <label class="form-check-label me-2 text-lowercase" for="<?= $user['username'] . $row; ?>">
                                    <?= $user['fullname']; ?>
                                </label>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
<?php endforeach ?>

<div class="col-md-6 col-lg-7">
    <div class="rounded shadow p-2 mb-3">
        <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">tukar jaga</span>
        <div class="overflow-auto mb-2" style="max-height: 380px;">
            <table class="table table-sm">
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td>
                            <input class="form-check-input ms-2" type="radio" id="<?= $user['username'] . 'tukar'; ?>" name="<?= $user['username']; ?>" value="tukar">
                        </td>
                        <td width="50%">
                            <label class="form-check-label me-2 text-lowercase" for="<?= $user['username'] . 'tukar'; ?>">
                                <?= $user['fullname']; ?>
                            </label>
                        </td>
                        <td width="49%">
                            <select name="<?= 'pengganti_' . $user['username']; ?>" style="width: 100%;">
                                <option disabled selected>...</option>
                                <?php foreach ($pengganti as $orang) : ?>
                                    <option value="<?= $orang['username']; ?>"><?= $orang['fullname']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>