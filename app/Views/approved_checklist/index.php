<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead class="table-success text-capitalize">
                <tr>
                    <th scope="col">aksi</th>
                    <th scope="col">tanggal</th>
                    <th scope="col">diinput oleh</th>
                    <th scope="col">nama peralatan</th>
                    <th scope="col">catatan</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">aksi</th>
                    <th scope="col">tanggal</th>
                    <th scope="col">diinput oleh</th>
                    <th scope="col">nama peralatan</th>
                    <th scope="col">catatan</th>
                </tr>
            </tfoot>

            <tbody>
                <?php foreach ($checklist as $row) : ?>
                    <tr>
                        <td style="width: 1%;">
                            <a class="btn btn-sm fst-italic <?= $row["approved"] == 'n' ? 'bg_biru1 text-dark pe-none' : 'bg_biru0 text-light'; ?> my-1" href="/approved_checklist/printChecklist/<?= $row["id"]; ?>" role="button" target="_blank" style="width: 70px;">print</a>
                        </td>
                        <td><?= $row["tanggal"]; ?></td>
                        <td><?= $row["diinput_oleh"]; ?></td>
                        <td><?= $row["namaPeralatan"] ?></td>
                        <td><?= $row["catatan"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>