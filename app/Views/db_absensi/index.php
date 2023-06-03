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
                    <th scope="col">waktu absensi</th>
                    <th scope="col">shift</th>
                    <th scope="col">sakit</th>
                    <th scope="col">izin</th>
                    <th scope="col">cuti</th>
                    <th scope="col">sppd</th>
                    <th scope="col">mangkir</th>
                    <th scope="col">tukaran</th>
                    <th scope="col">catatan</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">action</th>
                    <th scope="col">diinput</th>
                    <th scope="col">waktu absensi</th>
                    <th scope="col">shift</th>
                    <th scope="col">sakit</th>
                    <th scope="col">izin</th>
                    <th scope="col">cuti</th>
                    <th scope="col">sppd</th>
                    <th scope="col">mangkir</th>
                    <th scope="col">tukaran</th>
                    <th scope="col">catatan</th>
                </tr>
            </tfoot>

            <tbody>
                <?php $i = 0 ?>
                <?php foreach ($absensi as $row) : ?>
                    <tr>
                        <td style="width: 1%;">
                            <button class="btn btn-sm text-white bg_merah0 fst-italic" type="button" onclick="return konfir('db_absensi','delete','<?= $row['id']; ?>',null)" style="width: 70px;">delete</button>
                        </td>
                        <td><?= $nama[$i] . ' | ' . $waktu[$i]; ?></td>
                        <td><?= $row["waktu"]; ?></td>
                        <td><?= $row["shift"]; ?></td>
                        <td><?= $row["sakit"]; ?></td>
                        <td><?= $row["izin"]; ?></td>
                        <td><?= $row["cuti"]; ?></td>
                        <td><?= $row["sppd"]; ?></td>
                        <td><?= $row["mangkir"]; ?></td>
                        <td><?= $row["tukar"]; ?></td>
                        <td><?= $row["catatan"]; ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="<?= base_url('/js/sweetalert.js'); ?>"></script>
<?= $this->endSection(); ?>