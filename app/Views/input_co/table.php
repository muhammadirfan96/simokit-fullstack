<form action="/input_co/simpan" method="post">
    <input type="hidden" name="method" id="method" value="<?= $method; ?>">
    <input type="hidden" name="tahun" value="<?= $tahun; ?>">
    <input type="hidden" name="bulan" value="<?= $bulanAngka; ?>">
    <div class="table-responsive mb-3 " style="height: 600px;">
        <table class="table table-hover table-border overflow-auto">
            <thead class="bg_hijau1 text-capitalize align-middle position-sticky top-0" style="z-index: 2;">
                <tr class="">
                    <th class="" colspan="<?= $hari + 1 ?>">
                        <span class="text-dark bg_orange1 inline-block p-1 rounded"><?= $bagian; ?></span>
                        <span class="text-dark bg_orange1 inline-block p-1 rounded"><?= $tahun; ?></span>
                        <span class="text-dark bg_orange1 inline-block p-1 rounded"><?= $bulanHuruf; ?></span>
                    </th>
                </tr>
                <tr class="">
                    <th class="text-center">nama peralatan</th>
                    <?php for ($i = 1; $i <= $hari; $i++) : ?>
                        <th><?= $i; ?></th>
                    <?php endfor ?>
                </tr>
            </thead>
            <tbody class="">
                <?php $j = 99; ?>
                <?php foreach ($tools as $tool) : ?>
                    <tr>
                        <td class="position-sticky start-0 bg-light" style="z-index: 1;"><?= $tool ?></td>
                        <?php for ($i = 1; $i <= $hari; $i++) : ?>
                            <td>
                                <div class="form-check">
                                    <?php if ($schedule == null) : ?>
                                        <input class="form-check-input" type="checkbox" name="<?= $i . $j ?>" value="ya">
                                    <?php endif ?>
                                    <?php if ($schedule != null) : ?>
                                        <input class="form-check-input" type="checkbox" name="<?= $i . $j ?>" value="ya" <?= $schedule[$i - 1][$key[$j - 97]] == 'ya' ? 'checked' : ''; ?>>
                                    <?php endif ?>
                                </div>
                            </td>
                        <?php endfor ?>
                    </tr>
                    <?php $j++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?= $this->include('templates/button_save'); ?>
</form>