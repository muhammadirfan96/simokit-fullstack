<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead class="table-success text-capitalize">
                <tr>
                    <th scope="col">action</th>
                    <th scope="col">start time</th>
                    <th scope="col">end time</th>
                    <th scope="col">maked by</th>
                    <th scope="col">notice to</th>
                    <th scope="col">content</th>
                    <th scope="col">up. by</th>
                    <th scope="col">up. at</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">action</th>
                    <th scope="col">start time</th>
                    <th scope="col">end time</th>
                    <th scope="col">maked by</th>
                    <th scope="col">notice to</th>
                    <th scope="col">content</th>
                    <th scope="col">up. by</th>
                    <th scope="col">up. at</th>
                </tr>
            </tfoot>

            <tbody>
                <?php foreach ($notice as $row) : ?>
                    <tr>
                        <td style="width: 1%;">
                            <a class="btn btn-sm bg_hijau0 text-light fst-italic my-1" href="/db_notice/<?= $row["id"]; ?>" role="button" style="width: 70px;">details</a>

                            <form class="d-inline <?= $row['id']; ?>" action="/db_notice/<?= $row["id"]; ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm bg_merah0 text-light fst-italic my-1" type="button" onclick="return konfirmasi(<?= $row['id']; ?>)" style="width: 70px;">delete</button>
                            </form>
                        </td>
                        <td><?= $row["start_time"]; ?></td>
                        <td><?= $row["end_time"]; ?></td>
                        <td><?= $row["maked_by"]; ?></td>
                        <td><?= $row["notice_to"]; ?></td>
                        <td><?= $row["content"]; ?></td>
                        <td><?= $row["updated_by"]; ?></td>
                        <td><?= $row["updated_at"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= base_url('/js/sweetalert.js'); ?>"></script>
<?= $this->endSection(); ?>