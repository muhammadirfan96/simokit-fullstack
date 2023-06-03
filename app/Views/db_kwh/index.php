<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead class="table-success text-capitalize">
                <tr>
                    <th scope="col">action</th>
                    <th scope="col">diinput</th>
                    <th scope="col">waktu kwh</th>
                    <th scope="col">Kwh KIT #1</th>
                    <th scope="col">Kwh KIT #2</th>
                    <th scope="col">Kwh PS #1</th>
                    <th scope="col">Kwh PS #2</th>
                    <th scope="col">Kwh ET #1</th>
                    <th scope="col">Kwh ET #2</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">action</th>
                    <th scope="col">diinput</th>
                    <th scope="col">waktu kwh</th>
                    <th scope="col">Kwh KIT #1</th>
                    <th scope="col">Kwh KIT #2</th>
                    <th scope="col">Kwh PS #1</th>
                    <th scope="col">Kwh PS #2</th>
                    <th scope="col">Kwh ET #1</th>
                    <th scope="col">Kwh ET #2</th>
                </tr>
            </tfoot>

            <tbody>
                <?php $i = 0 ?>
                <?php foreach ($kwh as $row) : ?>
                    <tr>
                        <td style="width: 1%;">
                            <button class="btn btn-sm text-white bg_merah0 fst-italic" type="button" onclick="return konfir('db_kwh','delete','<?= $row['id']; ?>',null)" style="width: 70px;">delete</button>
                        </td>
                        <td><?= $nama[$i] . ' | ' . $waktu[$i]; ?></td>
                        <td><?= $row["waktu"]; ?></td>
                        <td><?= $row["kit1"]; ?></td>
                        <td><?= $row["kit2"]; ?></td>
                        <td><?= $row["ps1"]; ?></td>
                        <td><?= $row["ps2"]; ?></td>
                        <td><?= $row["et1"]; ?></td>
                        <td><?= $row["et2"]; ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="<?= base_url('/js/sweetalert.js'); ?>"></script>
<?= $this->endSection(); ?>