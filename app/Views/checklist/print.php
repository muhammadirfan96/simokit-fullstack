<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form checklist</title>
    <link rel="stylesheet" href="css/cetak.css">
</head>

<body>
    <div class="table">
        <table width="100%" border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Pertanyaan</th>
                <th colspan="2">Jawaban</th>
                <th rowspan="2" width="25%">Komentar</th>
            </tr>
            <tr>
                <th>Yes</th>
                <th>No</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($pertanyaan as $row) : ?>
                <tr>
                    <td>
                        <?= $i; ?>
                    </td>
                    <td>
                        <?= $pertanyaan[$i - 1]["pertanyaan"]; ?>
                    </td>
                    <?php $jwb[$i - 1][0] == "&#9745" ? $warnaYes = "green" : $warnaYes = "red"; ?>
                    <td style="font-size:30px;color:<?= $warnaYes; ?>;">
                        <?= $jwb[$i - 1][0]; ?>
                    </td>
                    <?php $jwb[$i - 1][1] == "&#9745" ? $warnaNo = "green" : $warnaNo = "red"; ?>
                    <td style="font-size:30px;color:<?= $warnaNo; ?>;">
                        <?= $jwb[$i - 1][1]; ?>
                    </td>
                    <td>
                        <?= $komen["komen" . $i]; ?>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach ?>
        </table>
    </div>
    <br>
    <b>CATATAN :</b> <?= $checklist["catatan"]; ?><br><br>
    <div class="table">
        <table>
            <tr>
                <td>
                    <table class="" width="100%" border="0" cellpadding="5" cellspacing="0">
                        <tr>
                            <td class="" colspan="2">Jeneponto, <?= date('d-m-Y', strtotime($checklist['tanggal'])); ?></td>
                        </tr>
                        <tr>
                            <td width="50%" class="ttd"><?= $atasan['bidang']; ?></td>
                            <td width="50%" class="ttd">pegawai <?= $pegawai[0]['bidang']; ?></td>
                        </tr>
                        <tr>
                            <td class="ttd">
                                <div>
                                    <div><img src="img-ttd/<?= $atasan['signature']; ?>" width="70px" height="70px"></div>
                                    <p><?= $atasan['fullname']; ?></p>
                                    <hr style="width:60%; color:black; margin:1px;">
                                    <p><?= $atasan['username']; ?></p>
                                </div>
                            </td>
                            <td class="ttd">
                                <?php if (count($pegawai) == 1) : ?>
                                    <div>
                                        <div><img src="img-ttd/<?= $pegawai[0]['signature']; ?>" width="70px" height="70px"></div>
                                        <p><?= $pegawai[0]["fullname"]; ?></p>
                                        <hr style="width:60%; color:black; margin:1px;">
                                        <p><?= $pegawai[0]["username"]; ?></p>
                                    </div>
                                <?php endif ?>

                                <?php if (count($pegawai) > 1) : ?>
                                    <table class="" width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <?php $i = 0 ?>
                                        <?php foreach ($pegawai as $peg) : ?>
                                            <tr>
                                                <td width="85%" class="leftt ucase"><?= $i + 1 . '. ' . $peg['fullname']; ?></td>
                                                <td width="15%" class="center"><img src="img-ttd/<?= $peg['signature']; ?>" width="40px" height="40px"></td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach ?>
                                    </table>
                                <?php endif ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>