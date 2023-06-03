<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead class="table-success text-capitalize">
                <tr>
                    <th scope="col">action</th>
                    <th scope="col">fullname</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">bidang</th>
                    <th scope="col">active</th>
                    <th scope="col">created at</th>
                    <th scope="col">updated at</th>
                    <th scope="col">reset at</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">action</th>
                    <th scope="col">fullname</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">bidang</th>
                    <th scope="col">active</th>
                    <th scope="col">created at</th>
                    <th scope="col">updated at</th>
                    <th scope="col">reset at</th>
                </tr>
            </tfoot>

            <tbody>
                <?php foreach ($users as $row) : ?>
                    <tr>
                        <td style="width: 1%;">
                            <a class="btn btn-sm bg_hijau0 text-light fst-italic my-1" href="/db_users/<?= $row["id"]; ?>" role="button" style="width: 70px;">details</a>

                            <form class="d-inline <?= $row['id']; ?>" onclick="return konfirmasi(<?= $row['id']; ?>)" action="/db_users/<?= $row["id"]; ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm bg_merah0 text-light fst-italic my-1" type="button" onclick="return konfirmasi(<?= $row['id']; ?>)" style="width: 70px;">delete</button>
                            </form>
                        </td>
                        <td><?= $row["fullname"]; ?></td>
                        <td><?= $row["username"]; ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["bidang"] ?></td>
                        <td><?= $row["active"] ?></td>
                        <td><?= $row["created_at"] ?></td>
                        <td><?= $row["updated_at"] ?></td>
                        <td><?= $row["reset_at"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= base_url('/js/sweetalert.js'); ?>"></script>
<?= $this->endSection(); ?>