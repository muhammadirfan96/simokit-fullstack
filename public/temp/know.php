<?php
$tools = [
    "<b>AUXILLIARY BOILER</b><hr>Untuk menghasilkan uap yang bertujuan untuk pemanasan awal pada header water wall,
    daerator dan perapat poros turbin (gland seal)",
    "<b>COAL FEEDER</b><hr>Untuk mentransportasikan dan mengatur flow batubara dari coal bunker menuju furnace
    sehingga pembakaran di furnace dapat dikendalikan",
    "<b>HIGH PRIMARY FLUIDIZED FAN</b><hr>Untuk mengembalikan batubara ke dalam furnace dengan menggunakan udara bertekanan",
    "<b>INDUCED DRAFT FAN</b><hr>Untuk menghisap gas buang hasil pembakaran dalam ruang bakar dan untuk mengatur atau mengendalikan tekanan ruang bakar",
    "<b>LOWER BURNER</b><hr>Untuk penyalaan awal sebagai pemanas ruang bakar sampai mencapai temperatur tertentu
    sesuai dengan karakteristik boiler",
    "<b>LIME STONE</b><hr>Untuk menginjeksikan CaCO3 agar mengurangi kadar udara polutan dan menjaga kadar CEMS meliputi SO2, CO, NOX dan O2",
    "<b>PRIMARY AIR FAN</b><hr>Untuk menyuplai udara pembakaran dan mengangkat material bed (hot air), Sebagai udara pendorong batubara ke dalam furnace dan Sebagai sealing air duct coal feeder (cold air)",
    "<b>SECONDARY AIR FAN</b><hr>Untuk menyempurnakan udara pembakaran di dalam furnace dan sebagai suplai udara upper burner",
    "<b>SLAGCOOLER</b><hr>Untuk mendinginkan bottom ash sisa dari pembakaran pada furnace boiler sebelum dibuang
    ke bottom ash silo selanjutnya akan diangkut oleh truk menuju ash yard",
    "<b>SOOTBLOWER</b><hr>Untuk membersihkan jelaga atau kotoran-kotoran yang menempel pada pipa-pipa di area HRA (heat recovery area)",
    "<b>SUPPLY OIL PUMP</b><hr>Untuk menyuplai bahan bakar dari oil tank ke burner dan auxilliary boiler",
    "<b>AC OIL PUMP</b><hr>Untuk memberikan pelumasan pada bearing turbin sehingga tidak terjadi gesekan antara babit bearing dan journal bearing",
    "<b>CYRCULATING WATER PUMP</b><hr>Untuk menyediakan air pendingin yang diperlukan untuk mengkondensasikan uap bekas dan uap di dalam kondensor dan uUntuk memasuk air untuk mendinginkan HE pada sistem air pendingin bantu yang merupakan siklus pendingin tertutup",
    "<b>CLOSE CYRCULATING WATER PUMP</b><hr>Untuk mensirkulasikan air pendingin pada peralatan bantu PLTU punagaya",
    "<b>CONDENSATE AXTRACTION PUMP</b><hr>Digunakan untuk memompa air kondensat dari hotwheel kondensor ke daerator",
    "<b>DC OIL PUMP</b><hr>Untuk melumasi bearing turbin apabila kondisi AC pump tidak ada tegangan atau Black Out",
    "<b>DEH</b><hr>Sebagai sistem yang mengatur supply pelumas ke Aktuator(yaitu: Governor Valve dan Main Steam Valve), Electric protection dan Mechanical protection",
    "<b>DRAIN PIT PUMP</b><hr>Untuk menghisap genangan air di penampungan pitpool hasil drain debris yang berada di area ground floor",
    "<b>FEEDERFEED WATER PUMP</b><hr>Untuk menyuplai air pengisi pada boiler drum dimana sebelumnya melalui HPH sistem dan ekonomizer yang digunakan untuk menaikkan temperatur air pengisi",
    "<b>FILTER SYSTEM</b><hr>Sebagai sistem penjaringan sea water dari sea water reservoir yang memenuhi standar spesifikasi sebagai air umpan primary reserve osmosis dengan injeksi sodium hipoklorit dosing",
    "<b>HP OIL PUMP</b><hr>Untuk menekan diafragma valve agar oli dari pump bisa membuka MSV dan GV",
    "<b>JACKING OIL PUMP</b><hr>Untuk mengangkat poros turbin",
    "<b>RUBBER BALL CLEANING</b><hr>Untuk membersihkan pipa pipa kondensor dari kotoran yang menyumbat dan mengganggu proses aliran cooling water (air laut) agar dapat meningkatkan efisiensi pertukaran panas di kondensor dan mencegah pertumbuhan kerak pada pipa-pipa kondensor",
    "<b>SEA WATER PRETHREATMENT</b><hr>Sebagai sistem penjernihan air laut dengan menggunakan injeksi coagulant dan sodium hipoklorit dan Sebagai sistem pengumpan atau pemasok air laut ke filter system menjadi air yang memenuhi persyaratan",
    "<b>TRAVELING SCREEN</b><hr>Sebagai spray untuk membersihkan sampah yang menempel pada travelling screen",
    "<b>SCREEN WASH PUMP</b><hr>Menyaring sampah-sampah besar yang terdapat pada intake",
    "<b>TURNING GEAR</b><hr>Untuk memutar poros turbin dengan putaran -+ 5 rpm",
    "<b>VACUUM PUMP</b><hr>Membuat tekanan vakum pada kondensor sehingga membantu proses kondensasi uap menjadi air di kondensor",
    "<b>CONVEYING AIR COMPRESSOR</b><hr>Untuk menyuplai udara transporter fly ash"

];
$jmlGambar = count($tools);

$img = [];
for ($i=0; $i < $jmlGambar; $i++) { 
    array_push($img, 'gbr'.$i.'.jpg');
}
//var_dump($img);die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/tittle.png">
    <title>profil</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/icons/icons-1.4.0/font/bootstrap-icons.css">
    <script src="bootstrap/js/jquery-3.2.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="container-fluid-md">
        <div class="row text-center text-light">
            <div class="col text-capitalize">
                <h2 class="py-3" style="margin-bottom:0px;background-color:#100b70;border-bottom:3px solid #fc8b05;">know</h2>
            </div>	
        </div>
        <div class="row mb-3">
            <div class="col">
                <p class="py-2 text-darken" style="background-color:#04dffc;text-indent:5%;"><i class="bi-house-fill fs-4 "></i> <a class="text-decoration-none" href="index.php" style="color:black;">Home</a></p>
            </div>
        </div>			
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md">
                <?php $i=0; ?>
                <?php foreach ($tools as $tool) : ?>
                    <div class="card mb-4">
                        <div class="card-header text-center" style="background-color:#b7d5ac;">
                            <img class="logo rounded border border-light border-3 my-md-3" src="imgknow/<?= $img[$i]; ?>">
                        </div>
                        <div class="data card-body text-center">

                            <?=$tool?>
                        </div>
                    </div>
                <?php $i++; ?>
                <?php endforeach?>        
            </div>
        </div>
    </div>
</body>
</html>