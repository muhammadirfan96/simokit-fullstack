<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="shadow mb-3 p-3 rounded">
                <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">jadwal shift</span>
                <div class="d-flex flex-col">
                    <div class="" style="width: 50%;">
                        <table class="mt-2">
                            <?php $i = 0 ?>
                            <?php foreach ($jadwalShift['jadwal'] as $key => $val) : ?>
                                <tr>
                                    <td>
                                        <span class="px-2 rounded bg_hijau1 text-dark"><?= $key . ' ' . $jadwalShift['ke']; ?></span>
                                    </td>
                                    <td>
                                        <span class="fs-4 rounded-circle bg_hijau1 text-dark d-inline-block text-center text-uppercase" style="width:40px; height:40px;"><?= $val; ?></span>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endforeach ?>
                        </table>
                    </div>
                    <div class="border border-dark border-1 rounded position-relative ms-1" style="width:50%;">
                        <p class="size12 position-absolute px-1 border-dark border-1 border-end border-bottom" style="border-bottom-right-radius: 0.25rem;">sedang bertugas</p>
                        <p class="d-inline-block position-absolute top-50 start-50 translate-middle text-uppercase" style="font-size: 100px;"><?= $jadwalShift['masuk']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="shadow mb-3 p-3 rounded">
                <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">tidak hadir</span>
                <div class="d-flex flex-col justify-content-center" style="min-height:176px">
                    <?php if ($tidakHadir == null) : ?>
                        <p class="text-center fw-bolder"><i class="fas fa-triangle-exclamation text_merah" style="font-size: 120px;"></i><br>spv. shift <?= $jadwalShift['masuk']; ?> belum input absensi</p>
                    <?php endif ?>
                    <?php if ($tidakHadir != null) : ?>
                        <div class="size12" style="width: 50%;">
                            <?php foreach ($tidakHadir[0] as $key => $val) : ?>
                                <p class="my-0 text-uppercase fw-bold text-dark"><?= $key; ?></p>
                                <ol class="mb-1 ps-3">
                                    <?php foreach ($val as $row) : ?>
                                        <li class=""><?= $row; ?></li>
                                    <?php endforeach ?>
                                </ol>
                            <?php endforeach ?>
                        </div>
                        <div class="border border-dark border-1 rounded position-relative ms-1 size12" style="width:50%;height:50%">
                            <p class="px-1 d-block position-absolute border-dark border-1 border-end border-bottom" style="border-bottom-right-radius: 0.25rem;">catatan</p>
                            <p class="text-center mt-4 p-2"><?= $tidakHadir[1]['catatan']; ?></p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>