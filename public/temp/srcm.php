<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// cek tombosubmit sudh d tekan atau belum
if ( isset($_POST["saveSrCm"]) ) {
	$_SESSION["ket"] = $_GET["ket"];

	// cek apaka data berhasil ditambahkan atau tidak

	if (tambahSrCm($_POST) > 0 ) {
		echo("
				<script>
					alert('data SR CM berhasil ditambahkan');
					document.location.href = 'cetakSrCm.php?cetak=srcm';
				</script>

			");
	} else {
		echo("
				<script>
					alert('data SR CM gagal ditambahkan');
					document.location.href = '';
				</script>				

			");
	}
}

if (isset($_GET["ket"])) {$evidence = 'Sebelum FLM';} else {$evidence = 'Evidence';}

?>

<!doctype html>
<html lang="en">
<head>	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/tittle.png">
    <title>srcm</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/icons/icons-1.4.0/font/bootstrap-icons.css">
    <script src="bootstrap/js/jquery-3.2.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>	
	<div class="container-fluid-md">
		<div class="row text-center text-light">
			<div class="col text-capitalize">
				<h2 class="py-3" style="margin-bottom:0px;background-color:#100b70;border-bottom:3px solid #fc8b05;">Buat Laporan SR <?= $_GET["judul"] ?></h2>
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
			<div class="col">
				<form action="" method="post" enctype="multipart/form-data">
					<label class="fw-bold">Nomor SR</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="nomorSr">
					</div>

					<label class="fw-bold">Tanggal</label>
					<div class="input-group mb-3">
						<input type="datetime-local" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="tanggal">
					</div>

					<div class="text-center mb-3">
						<label><b>Unit</b></label><br>
						<input class="form-check-input" type="radio" name="unit" id="1" value="#1">
						<label class="form-check-label  me-3" for="1" >#1</label>
				
						<input class="form-check-input" type="radio" name="unit" id="2" value="#2">
						<label class="form-check-label" for="2" >#2</label>
					</div>

					<div class="text-center mb-3">
						<label><b>Area</b></label><br>
						<input class="form-check-input" type="radio" name="area" id="turbin" value="turbin">
						<label class="form-check-label  me-3" for="turbin" >Turbin</label>

						<input class="form-check-input" type="radio" name="area" id="boiler" value="boiler">
						<label class="form-check-label  me-3" for="boiler" >Boiler</label>

						<input class="form-check-input" type="radio" name="area" id="wtp" value="wtp">
						<label class="form-check-label  me-3" for="wtp" >WTP</label>

						<input class="form-check-input" type="radio" name="area" id="electrical" value="electrical">
						<label class="form-check-label  me-3" for="electrical" >Electrical</label>
					</div>

					<label class="fw-bold">Nama Peralatan</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="namaPeralatan">
					</div>

					<label class="fw-bold">Nomor KKS</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="kks" name="kks">
					</div>

					<label class="fw-bold">Uraian Gangguan</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="1." aria-label="Username" aria-describedby="basic-addon1" name="uraianGangguan1">
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="2." aria-label="Username" aria-describedby="basic-addon1" name="uraianGangguan2">
					</div><br>

					<label class="fw-bold">Deviasi / Normal Operasi</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="1." aria-label="Username" aria-describedby="basic-addon1" id="kks" name="normalOperasi1">
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="2." aria-label="Username" aria-describedby="basic-addon1" id="kks" name="normalOperasi2">
					</div><br>

					<label class="fw-bold">Gejala</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="1." aria-label="Username" aria-describedby="basic-addon1" id="kks" name="gejala1">
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="2." aria-label="Username" aria-describedby="basic-addon1" id="kks" name="gejala2">
					</div><br>

					<div class="text-center mb-3">
						<label><b>Prioritas</b></label><br>
						<input class="form-check-input" type="radio" name="prioritas" id="emergency" value="emergency">
						<label class="form-check-label  me-3" for="emergency" >1</label>

						<input class="form-check-input" type="radio" name="prioritas" id="urgent" value="urgent">
						<label class="form-check-label  me-3" for="urgent" >2</label>

						<input class="form-check-input" type="radio" name="prioritas" id="normal" value="normal">
						<label class="form-check-label  me-3" for="normal" >3</label><br>
						<i style="color: red; font-size: 10px;">1 = Emergency (hari yang sama), 2 = Urgent (1 s/d 2 minggu), 3 = Normal (2 s/d 4 minggu)</i>
					</div>

					<label class="fw-bold">Akibat Kerusakan</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="1." aria-label="Username" aria-describedby="basic-addon1" id="kks" name="akibatKerusakan1">
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="2." aria-label="Username" aria-describedby="basic-addon1" id="kks" name="akibatKerusakan2">
					</div><br>

					<label class="fw-bold">Kemungkinan Dampak</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="1." aria-label="Username" aria-describedby="basic-addon1" id="kks" name="kemungkinanDampak1">
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="2." aria-label="Username" aria-describedby="basic-addon1" id="kks" name="kemungkinanDampak2">
					</div><br>

					<label class="fw-bold">Tindakan Sementara</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="1." aria-label="Username" aria-describedby="basic-addon1" id="kks" name="tindakanSementara1">
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="2." aria-label="Username" aria-describedby="basic-addon1" id="kks" name="tindakanSementara2">
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="3." aria-label="Username" aria-describedby="basic-addon1" id="kks" name="tindakanSementara3">
					</div>

					<label class="fw-bold"><?=$evidence ?></label>
					<input class="form-control mb-3" type="file" name="evidence1">

					<?php if (isset($_GET["ket"])) : ?>
						<label class="fw-bold">Setelah FLM</label>
						<input class="form-control" type="file" name="evidence2">
					<?php endif; ?>

					<div class="mb-3 text-start">
						<i style="color: red; font-size: 10px;">format file yang di dukung .jpg, .jpeg, atau .png dan Max 1 MB</i>
					</div>

					<div class="position-relative">
						<div class="position-absolute top-0 end-0">
							<button class="btn btn-success btn-sm" type="submit" name="saveSrCm">Save & Download</button>
						</div>
					</div>
					<br><br><br><br>
				</form>					
			</div>
		</div>
	</div>
</body>
</html>