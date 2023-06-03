<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead class="table-success text-capitalize">
                <tr>
                    <th>aksi</th>
                    <th>tanggal</th>
                    <th>diinput oleh</th>
                    <th>bidang</th>
                    <th>sasaran</th>
                    <th>area</th>
                    <th>saran</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>aksi</th>
                    <th>tanggal</th>
                    <th>diinput oleh</th>
                    <th>bidang</th>
                    <th>sasaran</th>
                    <th>area</th>
                    <th>saran</th>
                </tr>
            </tfoot>

            <tbody>
                <?php $i = 0 ?>
                <?php foreach ($limas as $row) : ?>
                    <tr>
                        <td style="width: 1%;">
                            <a class="btn btn-sm bg_hijau0 text-light fst-italic my-1" href="/db_limas/details/<?= $row["id"]; ?>" role="button" style="width: 70px;">details</a>

                            <a class="btn btn-sm fst-italic <?= $row["approved"] == 'n' ? 'bg_biru1 text-dark pe-none' : 'bg_biru0 text-light'; ?> my-1" href="/db_limas/<?= $row["id"]; ?>" role="button" target="_blank" style="width: 70px;">print</a>

                            <form class="d-inline <?= $row['id']; ?>" action="/db_limas/<?= $row["id"]; ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm bg_merah0 fst-italic text-light my-1" type="button" onclick="return konfirmasi(<?= $row['id']; ?>)" style="width: 70px;">delete</button>
                            </form>
                        </td>
                        <td><?= $row["tanggal"]; ?></td>
                        <td><?= $row["diinput_oleh"]; ?></td>
                        <td><?= $bidang[$i]; ?></td>
                        <td><?= $row["namaPeralatan"] ?></td>
                        <td><?= $row["area"] ?></td>
                        <td><?= $row["saran"] ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="<?= base_url('/js/sweetalert.js'); ?>"></script>
<?= $this->endSection(); ?>