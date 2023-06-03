<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cetak.css">
</head>

<body>
    <div class="header">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <td rowspan="4"><img src="img-dev/upk.jpg" width="150px"></td>
                <th class="asset">enterprise asset management</th>
                <td class="right">No. Formulir</td>
                <td class="left">: <?= $nomorfm; ?></td>
            </tr>

            <tr>
                <th rowspan="3">form checklist <?= $namaPeralatan; ?></th>
                <td class="right">Revisi</td>
                <td class="left">: <?= $revisi; ?></td>
            </tr>

            <tr>
                <td class="right">Tanggal</td>
                <td class="left">: <?= $tanggal; ?></td>
            </tr>

            <tr>
                <td class="right">Halaman</td>
                <td class="left">: <?= '{PAGENO}'; ?></td>
            </tr>
        </table>
    </div>
</body>

</html>