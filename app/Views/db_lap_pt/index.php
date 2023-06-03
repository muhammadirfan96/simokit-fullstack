<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead class="table-success text-capitalize">
                <tr>
                    <th scope="col">action</th>
                    <th scope="col">nama file</th>
                    <th scope="col">diinput oleh</th>
                    <th scope="col">waktu input</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">action</th>
                    <th scope="col">nama file</th>
                    <th scope="col">diinput oleh</th>
                    <th scope="col">waktu input</th>
                </tr>
            </tfoot>

            <tbody>
                <?php $i = 0 ?>
                <?php foreach ($lap_pt as $row) : ?>
                    <tr>
                        <td style="width: 1%;">
                            <a href="<?= $row["link"]; ?>" class="btn btn-sm text-white bg_hijau0 fst-italic mb-1" type="button" style="width: 70px;" target="_blank">details</a>

                            <button class="btn btn-sm text-white bg_merah0 fst-italic" type="button" onclick="return konfir('db_lap_pt','delete','<?= $row['id']; ?>',null)" style="width: 70px;">delete</button>
                        </td>
                        <td><?= $row["nama_file"]; ?></td>
                        <td><?= $row["created_by"]; ?></td>
                        <td><?= $row["created_at"]; ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="<?= base_url('/js/sweetalert.js'); ?>"></script>
<?= $this->endSection(); ?>