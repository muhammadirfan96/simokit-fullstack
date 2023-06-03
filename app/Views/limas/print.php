<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print lima es</title>
    <link rel="stylesheet" href="css/limaS.css">
</head>

<body>
    <br><br>
    <p class="center bold size12 my0">PELAKSANAAN 5S</p>

    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <td class="bold biru" colspan="6">INFORMASI</td>
        </tr>
        <tr>
            <td class="bold biruMuda" colspan="2">Satuan Kerja<br><?= $satuanKerja; ?></td>
            <td class="bold biruMuda besar" colspan="2">NAMA PELAKSANA<br><?= $cetakPelaksana; ?></td>
            <td class="bold biruMuda">Area / Lokasi Kerja<br><?= $limas['area']; ?></td>
            <td class="bold biruMuda" width="120px">WAKTU<br><?= $limas['tanggal']; ?></td>
        </tr>
        <tr>
            <td class="bold biru" colspan="6">PENDAHULUAN</td>
        </tr>
        <tr>
            <td class="bold biruMuda" colspan="2">Tujuan</td>
            <td colspan="4">Menjadi kegiatan rutin <?= $tujuanBidang; ?> yang membudaya, terjadwal dan termonitoring</td>
        </tr>
        <tr>
            <td class="bold biruMuda" colspan="2">Sasaran</td>
            <td colspan="4"><?= $sasaran; ?></b></td>
        </tr>
        <tr>
            <td class="bold biru" colspan="6">PENILAIAN</td>
        </tr>
        <tr>
            <td class="bold biruMuda" width="30px" text-rotate="90" rowspan="2">LEVEL</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
        </tr>
        <tr>
            <td>Belum memulai kegiatan 5S, tidak ada usaha sama sekali.</td>
            <td>Sudah memulai kegiatan 5S, tetapi ada banyak perbaikan major <i>(perbaikan perlu beberapa hari)</i></td>
            <td>Cukup baik, hanya perlu beberapa improvement minor <i>(bisa langsung saat itu memperbaiki kondisi)</i></td>
            <td>sudah baik, hanya perlu sedikit improvement</td>
            <td>Sudah sangat baik, terus pertahankan kondisi seperti ini</td>
        </tr>
        <tr>
            <td class="bold orangeMuda" colspan="2">URAIAN</td>
            <td class="bold orangeMuda">CHECK ITEM</td>
            <td class="bold orangeMuda" colspan="2">DESKRIPSI</td>
            <td class="bold orangeMuda">NILAI 1 - 5</td>
        </tr>
        <tr>
            <td class="bold biruMuda" text-rotate="90" rowspan="5">PELAKSANAAN 5S</td>
            <td class="biruMuda">STEP 1: Seiri, Ringkasi<br>Merupakan kegiatan memilih dan membuang barang atau file yang tidak diperlukan lagi</td>

            <td class="orangeMuda" rowspan="5" colspan="4">
                <table width="100%" border="1" cellpadding="1" cellspacing="0">

                    <?php for ($i = 1; $i <= 25; $i++) : ?>
                        <tr>
                            <td class="left white" width="127px"><?= $checkItem[$i - 1]; ?></td>
                            <td class="left white"><?= $pertanyaan[$i - 1]['pertanyaan']; ?></td>
                            <td width="116px" class="white"><?= $nilaiLimas['nilai' . $i]; ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
            </td>
        </tr>
        <tr>
            <td class="biruMuda">STEP 2: Seiton, Rapih<br>Merupakan kegiatan merapihkan semua barang dan file</td>
        </tr>
        <tr>
            <td class="biruMuda">STEP 3: Seiso, Resik<br>Merupakan kegiatan membersihkan tempat kerja, ruangan kerja, dan lingkungan kerja secara rutin</td>
        </tr>
        <tr>
            <td class="biruMuda">STEP 4: Seiketsu, Rawat<br>Merupakan kegiatan perawatan atau maintenance terhadap kegiatan Seiri, Seiton, dan Seiso</td>
        </tr>
        <tr>
            <td class="biruMuda">STEP 5: Shitsuke, Rajin<br>Merupakan suatu kebiasaan dan pemeliharaan program 5S yang sudah berjalan</td>
        </tr>
        <tr>
            <td class="bold biruMuda" text-rotate="90" rowspan="2">DOKUMENTASI</td>
            <td class="bold orangeMuda" colspan="2">KONDISI SEBELUM</td>
            <td class="bold orangeMuda" colspan="3">KONDISI SETELAH</td>
        </tr>
        <tr>
            <td colspan="2"><img src="img-5s/<?= $limas['fotoSebelum']; ?>" width=" 120px" max-height="90px"></td>
            <td colspan="3"><img src="img-5s/<?= $limas['fotoSetelah']; ?>" width=" 140px" max-height="90px"></td>
        </tr>
        <tr>
            <td class="bold biruMuda" text-rotate="90">CATATAN</td>
            <td class="left" colspan="5"><?= $limas['saran']; ?></td>
        </tr>
    </table>
    <table class="size12 mt5" width="100%" border="0" cellpadding="2" cellspacing="0">
        <tr>
            <td class="left" colspan="2">Jeneponto, <?= date('d-m-Y', strtotime($limas['tanggal'])); ?></td>
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
                    <table class="left size12" width="100%" border="0" cellpadding="0" cellspacing="0">
                        <?php $i = 0 ?>
                        <?php foreach ($pegawai as $peg) : ?>
                            <tr>
                                <td width="85%" class="ttd"><?= $i + 1 . '. ' . $peg['fullname']; ?></td>
                                <td width="15%" class="center"><img src="img-ttd/<?= $peg['signature']; ?>" width="40px" height="40px"></td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach ?>
                    </table>
                <?php endif ?>
            </td>
        </tr>
    </table>
</body>

</html>