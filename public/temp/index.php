<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

if (isset($_SESSION["loginAdmin"])) {
	header("Location: admin/admin.php");
	exit;
}

// auto delete schedule

$lama = 3;
$tabelDB = ["schedulesatu", "scheduledua", "schedulecommon", "limasboilerpertama", "limasboilerkedua", "limasboilerketiga", "limasturbinpertama", "limasturbinkedua", "limasturbinketiga", "limasturbinkeempat", "limasalbapertama", "limasalbakedua"];
for ($i=0; $i < count($tabelDB); $i++) { 
	$query = "DELETE FROM $tabelDB[$i] WHERE DATEDIFF(CURDATE(), tanggal) > $lama";
	mysqli_query($db, $query);
} 

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/tittle.png">
    <title>webpunagaya.com</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/icons/icons-1.4.0/font/bootstrap-icons.css">
    <script src="bootstrap/js/jquery-3.2.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/home.css">
  </head>
<body>

<!-- navbar1 -->

	<nav class="nv1 navbar navbar-expand navbar-dark pt-1 pb-3">
		<div class="container">
			<div>
				<img src="img/massive.png" width="50px"><div class="navbar-brand fs-2 ms-2 pt-3 d-inline-block" style="transform: scale(0.7, 2); transform-origin: left; z-index:-1;">OPERASI PUNAGAYA</div>
			</div>

			<div class="dropdown">
				<button class="btn text-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi-person-circle fs-4"></i>
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
					<li><a class="dropdown-item" href="dataku.php">me</a></li>
					<li><a class="dropdown-item" href="logoutUser.php">logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
<!-- akhir navbar1 -->

<!-- navbar2 -->
	<nav class="nv2 navbar navbar-expand-md navbar-light">
	  <div class="container">
	    <a class="navbar-brand fs-2" href="#"></a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse " id="navbarNavDropdown">
	      <ul class="navbar-nav ">

	        <li class="nav-item dropdown">
	          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi-house-door"></i> home</a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			  	<li><a class="dropdown-item" href="daftarSopIk.php"><i class="bi-book" > </i>Baca SOP IK</a></li>
	            <li><a class="dropdown-item" href="pilih.php"><i class="bi-journal-check"> </i>Isi Checklist SOP IK</a></li>
				<li><a class="dropdown-item" href="srcm.php?judul=CM"><i class="bi-pencil-square" > </i>Buat Laporan SR CM</a></li>
	            <li><a class="dropdown-item" href="srcm.php?judul=FLM&ket=FLM"><i class="bi-pencil-square"> </i>Buat Laporan SR FLM</a></li>
	            <li><a class="dropdown-item" href="limaS.php"><i class="bi-pencil-square"> </i>Buat Laporan 5S</a></li>
	            <li><a class="dropdown-item" href="admin/loginAdmin.php"><i class="bi-person-circle"> </i>Database</a></li>
	          </ul>
	        </li>

			<li class="nav-item">
	          <a class="nav-link active" href="about.php"><i class="bi-info-square"> </i>about</a>
	        </li>
			<li class="nav-item">
	          <a class="nav-link active" href="know.php"><i class="bi-building"> </i>know</a>
	        </li>
			<li class="nav-item">
	          <a class="nav-link active" href="contact.php"><i class="bi-person-square"> </i>contact</a>
	        </li>
			<li class="nav-item">
	          <a class="nav-link active" href="schedule.php"><i class="bi-calendar3"> </i>schedule</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

<!-- akhir navbar2 -->

<!-- home -->
<div class="jumbotron my-3">
	<div class="container my-3 text-center">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<p>Selamat datang <span class="nama"><?= $_SESSION["namaUser"]; ?></span></p>
				<p>Semoga hari ini anda dalam lindungan-Nya</p>
				<p>Keep Safety</p>
<b>INFO PENTING</b><br>
<b>DALAM MINGGU INI WEBPUNAGAYA AKAN DIUPDATE LAGI BERIKUT BEBERAPA TAMPILAN SLIDENYA</b><br>
			</div>

			<div class="col-md-4 ">
				<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
				  <div class="carousel-indicators">
				    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
				    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
				  </div>
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="img/gambar1.jpg" class="d-block w-100">
				      <div class="carousel-caption d-none d-md-block">
				        <h5></h5>
				        <p></p>
				      </div>
				    </div>
				    <div class="carousel-item">
				      <img src="img/gambar2.jpg" class="d-block w-100">
				      <div class="carousel-caption d-none d-md-block">
				        <h5></h5>
				        <p></p>
				      </div>
				    </div>
				    <div class="carousel-item">
				      <img src="img/gambar3.jpg" class="d-block w-100">
				      <div class="carousel-caption d-none d-md-block">
				        <h5></h5>
				        <p></p>
				      </div>
				    </div>
				  </div>
				  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Previous</span>
				  </button>
				  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Next</span>
				  </button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- akhir home -->

<!-- footer -->

<footer>
	<div class="jumbotron">
		<div class="row text-center text-light">
			<div class="col">
				<p>@operator lokal 2021</p>
			</div>
		</div>
	</div>
</footer>

</body>
</nav>
</html>
