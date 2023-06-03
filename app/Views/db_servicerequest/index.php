<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead class="table-success text-capitalize">
                <tr>
                    <th>aksi</th>
                    <th>ket</th>
                    <th>diinput oleh</th>
                    <th>bidang</th>
                    <th>nomor sr</th>
                    <th>tanggal</th>
                    <th>unit</th>
                    <th>area</th>
                    <th>nama peralatan</th>
                    <th>KKS</th>
                    <th>ur. gangguan(1)</th>
                    <th>ur. gangguan(2)</th>
                    <th>nor. operasi(1)</th>
                    <th>nor. operasi(2)</th>
                    <th>gejala(1)</th>
                    <th>gejala(2)</th>
                    <th>prioritas</th>
                    <th>ak. kerusakan(1)</th>
                    <th>ak. kerusakan(2)</th>
                    <th>kem. dampak(1)</th>
                    <th>kem. dampak(2)</th>
                    <th>tin. sementara(1)</th>
                    <th>tin. sementara(2)</th>
                    <th>tin. sementara(3)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>aksi</th>
                    <th>ket</th>
                    <th>diinput oleh</th>
                    <th>bidang</th>
                    <th>nomor sr</th>
                    <th>tanggal</th>
                    <th>unit</th>
                    <th>area</th>
                    <th>nama peralatan</th>
                    <th>KKS</th>
                    <th>ur. gangguan(1)</th>
                    <th>ur. gangguan(2)</th>
                    <th>nor. operasi(1)</th>
                    <th>nor. operasi(2)</th>
                    <th>gejala(1)</th>
                    <th>gejala(2)</th>
                    <th>prioritas</th>
                    <th>ak. kerusakan(1)</th>
                    <th>ak. kerusakan(2)</th>
                    <th>kem. dampak(1)</th>
                    <th>kem. dampak(2)</th>
                    <th>tin. sementara(1)</th>
                    <th>tin. sementara(2)</th>
                    <th>tin. sementara(3)</th>
                </tr>
            </tfoot>

            <tbody>
                <?php $i = 0 ?>
                <?php foreach ($servicerequest as $row) : ?>
                    <tr>
                        <td style="width: 1%;">
                            <a class="btn btn-sm bg_hijau0 text-light fst-italic my-1" href="/db_servicerequest/details/<?= $row["id"]; ?>" role="button" style="width: 70px;">details</a>

                            <a class="btn btn-sm fst-italic <?= $row["approved"] == 'n' ? 'bg_biru1 text-dark pe-none' : 'bg_biru0 text-light'; ?> my-1" href="/db_servicerequest/<?= $row["id"]; ?>" role="button" target="_blank" style="width: 70px;">print</a>

                            <form class="d-inline <?= $row['id']; ?>" action="/db_servicerequest/<?= $row["id"]; ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm bg_merah0 fst-italic text-light my-1" type="button" onclick="return konfirmasi(<?= $row['id']; ?>)" style="width: 70px;">delete</button>
                            </form>

                        </td>
                        <td><?= $row["ket"]; ?></td>
                        <td><?= $row["diinput_oleh"]; ?></td>
                        <td><?= $bidang[$i]; ?></td>
                        <td><?= $row["nomorSr"] ?></td>
                        <td><?= $row["tanggal"] ?></td>
                        <td><?= $row["unit"]; ?></td>
                        <td><?= $row["area"]; ?></td>
                        <td><?= $row["namaPeralatan"]; ?></td>
                        <td><?= $row["kks"]; ?></td>
                        <td><?= $row["uraianGangguan1"]; ?></td>
                        <td><?= $row["uraianGangguan2"]; ?></td>
                        <td><?= $row["normalOperasi1"]; ?></td>
                        <td><?= $row["normalOperasi2"]; ?></td>
                        <td><?= $row["gejala1"]; ?></td>
                        <td><?= $row["gejala2"]; ?></td>
                        <td><?= $row["prioritas"]; ?></td>
                        <td><?= $row["akibatKerusakan1"]; ?></td>
                        <td><?= $row["akibatKerusakan2"]; ?></td>
                        <td><?= $row["kemungkinanDampak1"]; ?></td>
                        <td><?= $row["kemungkinanDampak2"]; ?></td>
                        <td><?= $row["tindakanSementara1"]; ?></td>
                        <td><?= $row["tindakanSementara2"]; ?></td>
                        <td><?= $row["tindakanSementara3"]; ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= base_url('/js/sweetalert.js'); ?>"></script>
<?= $this->endSection(); ?>