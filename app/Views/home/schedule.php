<div class="container-fluid">
    <div class="row">
        <div class="col">
            <p class="fs-4 fw-bold my-3 text-light text-uppercase"><span class="bg-secondary rounded px-2">schedule</span></p>
        </div>
        <div class="col justify-content-end d-flex">
            <p class=" text-danger fw-bold my-3"><?= date('d-m-Y') ?></p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-md-6 ">
            <div class="shadow mb-3 rounded" style="min-height: 160px;">
                <div class="p-2 bg_hijau1 rounded-top border_bottom2">
                    <i class="fas fa-gears text-success fs-3"></i>
                    <p class="d-inline text-uppercase fw-bolder fs-5 text-success">kegiatan 5s Boiler</p>
                </div>
                <div class="p-2">
                    <?php if ($isNoneBoiler) : ?>
                        <p class="text-center fw-bolder"><i class="fas fa-triangle-exclamation text_merah" style="font-size: 50px;"></i><br>SCHEDULE BELUM DIINPUT</p>
                    <?php endif ?>
                    <?php if (!$isNoneBoiler) : ?>
                        <?php if (count($limasBoiler) == 0) : ?>
                            <p class="text-center fw-bolder"><i class="fas fa-ban text_merah" style="font-size: 50px;"></i><br>TIDAK ADA 5S</p>
                        <?php endif ?>
                        <?php foreach ($limasBoiler as $row) : ?>
                            <p class="text-dark text-center text-uppercase mb-0"><?= $row; ?></p>
                        <?php endforeach; ?>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="shadow mb-3 rounded" style="min-height: 160px;">
                <div class="p-2 bg_hijau1 rounded-top border_bottom2">
                    <i class="fas fa-gears text-success fs-3"></i>
                    <p class="d-inline text-uppercase fw-bolder fs-5 text-success">kegiatan 5s Turbin</p>
                </div>
                <div class="p-2">
                    <?php if ($isNoneTurbin) : ?>
                        <p class="text-center fw-bolder"><i class="fas fa-triangle-exclamation text_merah" style="font-size: 50px;"></i><br>SCHEDULE BELUM DIINPUT</p>
                    <?php endif ?>
                    <?php if (!$isNoneTurbin) : ?>
                        <?php if (count($limasTurbin) == 0) : ?>
                            <p class="text-center fw-bolder"><i class="fas fa-ban text_merah" style="font-size: 50px;"></i><br>TIDAK ADA 5S</p>
                        <?php endif ?>
                        <?php foreach ($limasTurbin as $row) : ?>
                            <p class="text-dark text-center text-uppercase mb-0"><?= $row; ?></p>
                        <?php endforeach; ?>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="shadow mb-3 rounded" style="min-height: 160px;">
                <div class="p-2 bg_hijau1 rounded-top border_bottom2">
                    <i class="fas fa-gears text-success fs-3"></i>
                    <p class="d-inline text-uppercase fw-bolder fs-5 text-success">kegiatan 5s Alba</p>
                </div>
                <div class="p-2">
                    <?php if ($isNoneAlba) : ?>
                        <p class="text-center fw-bolder"><i class="fas fa-triangle-exclamation text_merah" style="font-size: 50px;"></i><br>SCHEDULE BELUM DIINPUT</p>
                    <?php endif ?>
                    <?php if (!$isNoneAlba) : ?>
                        <?php if (count($limasAlba) == 0) : ?>
                            <p class="text-center fw-bolder"><i class="fas fa-ban text_merah" style="font-size: 50px;"></i><br>TIDAK ADA 5S</p>
                        <?php endif ?>
                        <?php foreach ($limasAlba as $row) : ?>
                            <p class="text-dark text-center text-uppercase mb-0"><?= $row; ?></p>
                        <?php endforeach; ?>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="shadow mb-3 rounded" style="min-height: 160px;">
                <div class="p-2 bg_hijau1 rounded-top border_bottom2">
                    <i class="fas fa-gears text-success fs-3"></i>
                    <p class="d-inline text-uppercase fw-bolder fs-5 text-success">kegiatan rutin #1</p>
                </div>
                <div class="p-2">
                    <?php if ($jadwalCoUnit1[0] == "!") : ?>
                        <p class="text-center fw-bolder"><i class="fas fa-triangle-exclamation text_merah" style="font-size: 50px;"></i><br>SCHEDULE BELUM DIINPUT</p>
                    <?php endif ?>
                    <?php if ($jadwalCoUnit1[0] == "?") : ?>
                        <p class="text-center fw-bolder"><i class="fas fa-circle-question text_merah" style="font-size: 50px;"></i><br>SCHEDULE AKAN DITAMPILKAN BESOK</p>
                    <?php endif ?>
                    <?php if ($jadwalCoUnit1[0] != "!" && $jadwalCoUnit1[0] != "?") : ?>
                        <?php if ($isNullSatu) : ?>
                            <p class="text-center fw-bolder"><i class="fas fa-ban text_merah" style="font-size: 50px;"></i><br>TIDAK ADA C.O.</p>
                        <?php endif ?>
                        <?php foreach ($jadwalCoUnit1 as $row) : ?>
                            <p class="text-dark text-center text-uppercase mb-0"><?= $row; ?></p>
                        <?php endforeach; ?>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="shadow mb-3 rounded" style="min-height: 160px;">
                <div class="p-2 bg_hijau1 rounded-top border_bottom2">
                    <i class="fas fa-gears text-success fs-3"></i>
                    <p class="d-inline text-uppercase fw-bolder fs-5 text-success">kegiatan rutin #2</p>
                </div>
                <div class="p-2">
                    <?php if ($jadwalCoUnit2[0] == "!") : ?>
                        <p class="text-center fw-bolder"><i class="fas fa-triangle-exclamation text_merah" style="font-size: 50px;"></i><br>SCHEDULE BELUM DIINPUT</p>
                    <?php endif ?>
                    <?php if ($jadwalCoUnit2[0] == "?") : ?>
                        <p class="text-center fw-bolder"><i class="fas fa-circle-question text_merah" style="font-size: 50px;"></i><br>SCHEDULE AKAN DITAMPILKAN BESOK</p>
                    <?php endif ?>
                    <?php if ($jadwalCoUnit2[0] != "!" && $jadwalCoUnit2[0] != "?") : ?>
                        <?php if ($isNullDua) : ?>
                            <p class="text-center fw-bolder"><i class="fas fa-ban text_merah" style="font-size: 50px;"></i><br>TIDAK ADA C.O.</p>
                        <?php endif ?>
                        <?php foreach ($jadwalCoUnit2 as $row) : ?>
                            <p class="text-dark text-center text-uppercase mb-0"><?= $row; ?></p>
                        <?php endforeach; ?>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="shadow mb-3 rounded" style="min-height: 160px;">
                <div class="p-2 bg_hijau1 rounded-top border_bottom2">
                    <i class="fas fa-gears text-success fs-3"></i>
                    <p class="d-inline text-uppercase fw-bolder fs-5 text-success">kegiatan rutin common</p>
                </div>
                <div class="p-2">
                    <?php if ($jadwalCoCommon[0] == "!") : ?>
                        <p class="text-center fw-bolder"><i class="fas fa-triangle-exclamation text_merah" style="font-size: 50px;"></i><br>SCHEDULE BELUM DIINPUT</p>
                    <?php endif ?>
                    <?php if ($jadwalCoCommon[0] == "?") : ?>
                        <p class="text-center fw-bolder"><i class="fas fa-circle-question text_merah" style="font-size: 50px;"></i><br>SCHEDULE AKAN DITAMPILKAN BESOK</p>
                    <?php endif ?>
                    <?php if ($jadwalCoCommon[0] != "!" && $jadwalCoCommon[0] != "?") : ?>
                        <?php if ($isNullCommon) : ?>
                            <p class="text-center fw-bolder"><i class="fas fa-ban text_merah" style="font-size: 50px;"></i><br>TIDAK ADA C.O.</p>
                        <?php endif ?>
                        <?php foreach ($jadwalCoCommon as $row) : ?>
                            <p class="text-dark text-center text-uppercase mb-0"><?= $row; ?></p>
                        <?php endforeach; ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>