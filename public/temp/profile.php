<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}


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

    <link rel="stylesheet" href="css/profil.css">
</head>
<body>
    <div class="container-fluid-md">
        <div class="row text-center text-light">
            <div class="col ">
                <h2 class="py-3" style="margin-bottom:0px;background-color:#100b70;border-bottom:3px solid #fc8b05;">Profil</h2>
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
            <div class="col-md mb-3">
                <div class="card">
                    <div class="card-header text-center" style="background-color:#b7d5ac;">
                        <img class="logo rounded-circle border border-light border-3 my-md-3" src="imgUpload/tittle.png">
                    </div>
                    <div class="card-body">
                        <p class="data">Pltu Punagaya merupakan pembangkit listrik tenaga uap dengan daya mampu 2 x 100 MW. Pltu ini terletak di Desa Punagaya Kecamatan Bangkala Kabupaten Jeneponto, Sulawesi Selatan dan diresmikan olah presiden Joko Widodo pada 2 Juli 2018.</p>
                        <p class="data">Pltu Punagaya merupakan pembangkit listrik tenaga uap dengan daya mampu 2 x 100 MW. Pltu ini terletak di Desa Punagaya Kecamatan Bangkala Kabupaten Jeneponto, Sulawesi Selatan dan diresmikan olah presiden Joko Widodo pada 2 Juli 2018.</p>
                    </div>
                </div>          
            </div>
        </div>
    </div>
</body>
</html>