<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// cek tombosubmit sudh d tekan atau belum
 if ( isset($_POST["save"]) ) {
 	// var_dump($_POST);
 	// die();

 	$_SESSION["namaPeralatan1"] = 'persiapan shutdown';
 	$_SESSION["namaPeralatan2"] = 'pelaksanaan shutdown';
	
// cek apaka data berhasil ditambahkan atau tidak
	if (simpanShutdown($_POST) > 0 ) {
		echo("
				<script>
					alert('data berhasil ditambahkan');
					document.location.href = 'tes.php';
				</script>
			");
	} else {
		echo("
				<script>
					alert('data gagal ditambahkan');
					document.location.href = 'pilih.php';
				</script>				
			");
	}

}

$pertanyaan1 = query("SELECT pertanyaan FROM daftar_pertanyaan WHERE untuk = 'persiapan shutdown'");
$pertanyaan2 = query("SELECT pertanyaan FROM daftar_pertanyaan WHERE untuk = 'pelaksanaan shutdown'");

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="img/tittle.png">
		<title>checklist shutdown</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="bootstrap/icons/icons-1.4.0/font/bootstrap-icons.css">
		<script src="bootstrap/js/jquery-3.2.1.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</head>

<body>
	<div class="container-fluid-md">
		<div class="row text-center text-light">
			<div class="col text-capitalize">
				<h2 class="py-3" style="margin-bottom:0px;background-color:#100b70;border-bottom:3px solid #fc8b05;">checklist shutdown</h2>
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
				<form action="" method="post" style="font-size: 12px;">

					<table class="table table-hover text-uppercase">
						<tr>
							<td>description</td>
							<td>shutdown unit</td>
							<td colspan="3">
								<input type="radio" name="unit" id="1" value="1">
								<label class="me-3" for="1">#1</label>
								<input type="radio" name="unit" id="2" value="2">
								<label for="2">#2</label>
							</td>
						</tr>
						<tr>
							<td colspan="2">waktu pelaksanaan</td>
							<td colspan="3">
								<input type="datetime-local" name="waktu">
							</td>
						</tr>
						<tr>
							<td>pelaksana</td>
							<td>shift</td>
							<td colspan="3">
								<input type="Checkbox" name="shiftA" value="a">
								<label class="me-3">a</label>
								<input type="Checkbox" name="shiftB" value="b">
								<label class="me-3">b</label>
								<input type="Checkbox" name="shiftC" value="c">
								<label class="me-3">c</label>
								<input type="Checkbox" name="shiftD" value="d">
								<label>d</label>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>WTP</td>
							<td colspan="3"><input size="30%" type="text" name="wtp"></td>
						</tr>
						<tr>
							<td></td>
							<td>ANALISA KIMIA</td>
							<td colspan="3"><input size="30%" type="text" name="analisa"></td>
						</tr>
						<tr>
							<td></td>
							<td>BOILER & AUXILLIARY</td>
							<td colspan="3"><input size="30%" type="text" name="boilerAux1"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td colspan="3"><input size="30%" type="text" name="boilerAux2"></td>
						</tr>
						<tr>
							<td></td>
							<td>TURBIN & AUXILLIARY</td>
							<td colspan="3"><input size="30%" type="text" name="turbinAux1"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td colspan="3"><input size="30%" type="text" name="turbinAux2"></td>
						</tr>
						<tr>
							<td></td>
							<td>ELECTRICAL</td>
							<td colspan="3"><input size="30%" type="text" name="electrical1"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td colspan="3"><input size="30%" type="text" name="electrical2"></td>
						</tr>

					</table>

					<p class="fw-bold text-uppercase">ii. persiapan pelindung diri</p>
					<table class="table table-hover text-capitalize align-middle text-center">				
						<tr>
							<td>
									<input type="Checkbox" name="sepatu" value="sepatu" id="sepatu">
									<label for="sepatu">sepatu safety</label>						
							</td>
							<td>
									<input type="Checkbox" name="helm" value="helm" id="helm">
									<label for= "helm" >helm safety</label>
							
							</td>
							<td>
									<input type="Checkbox" name="earplug" value="earplug" id="earplug">
									<label for="earplug">earplug</label>
							</td>
							<td>
									<input type="Checkbox" name="masker" value="masker" id="masker">
									<label for= "masker" >masker</label>
							</td>
							<td>
									<input type="Checkbox" name="sTangan" value="sarung tangan" id="sTangan">
									<label for= "sTangan" >sarung tangan</label>
							</td>
						</tr>
					</table>

					<p class="fw-bold text-uppercase">iii. detail aktivitas</p>
					<table class="table table-hover text-center">
						
						<thead class="table-success text-uppercase align-middle">
							<tr>
								<th class="bg-secondary" colspan="6">tahap persiapan shut down unit</th>
							</tr>
							<tr>
								<th rowspan="2" scope="col">NO</th>
								<th rowspan="2" scope="col">uraian pekerjaan</th>
								<th colspan="2" scope="col">checklist</th>
								<th rowspan="2" scope="col">waktu</th>
								<th rowspan="2" scope="col">keterangan</th>
							</tr>
							<tr>
								<th scope="col">do</th>
								<th scope="col">don't</th>
							</tr>
						</thead>
							<tr class="text-uppercase fw-bold">
								<td scope="row">a</td>
								<td class="text-start" scope="row" colspan="5">electrical</td>
							</tr>
							<?php $j = 1; ?>
							<?php for ($i=0; $i < 1; $i++) : ?>
								

								<tr>
									<td scope="row"><?=$j ?></td>
									<td class="text-start" scope="row"><?= $pertanyaan1["$i"]["pertanyaan"]; ?></td>
									<td>
										<input class="form-check-input"  type="radio" name="jawaban<?=$i;?>" value="ya">
									</td>
									<td scope="row">
										<input class="form-check-input"  type="radio" name="jawaban<?=$i;?>" value="tidak">
									</td>
									<td scope="row">
										<input type="time" name="waktu<?=$i;?>">
									</td>
									<td scope="row">
										<input type="text" name="ket<?=$i;?>">
									</td>
								</tr>
							<?php $j++; ?>
							<?php $i+1; ?>
							<?php endfor; ?>

							<tr class="text-uppercase fw-bold">
								<td scope="row">b</td>
								<td class="text-start" scope="row" colspan="5">wtp dan analisa kimia</td>
							</tr>
							<?php $j = 1; ?>
							<?php for ($i=1; $i < 2; $i++) : ?>
								

								<tr>
									<td scope="row"><?=$j ?></td>
									<td class="text-start" scope="row"><?= $pertanyaan1["$i"]["pertanyaan"]; ?></td>
									<td>
										<input class="form-check-input"  type="radio" name="jawaban<?=$i;?>" value="ya">
									</td>
									<td scope="row">
										<input class="form-check-input"  type="radio" name="jawaban<?=$i;?>" value="tidak">
									</td>
									<td scope="row">
										<input type="time" name="waktu<?=$i;?>">
									</td>
									<td scope="row">
										<input type="text" name="ket<?=$i;?>">
									</td>
								</tr>
							<?php $j++; ?>
							<?php $i+1; ?>
							<?php endfor; ?>
							<tr class="text-uppercase fw-bold">
								<td scope="row">b</td>
								<td class="text-start" scope="row" colspan="5">boiler & auxilliary</td>
							</tr>

							<?php $j = 1; ?>
							<?php for ($i=2; $i < 5; $i++) : ?>

								<tr>
									<td scope="row"><?=$j ?></td>
									<td class="text-start" scope="row"><?= $pertanyaan1["$i"]["pertanyaan"]; ?></td>
									<td>
										<input class="form-check-input"  type="radio" name="jawaban<?=$i;?>" value="ya">
									</td>
									<td scope="row">
										<input class="form-check-input"  type="radio" name="jawaban<?=$i;?>" value="tidak">
									</td>
									<td scope="row">
										<input type="time" name="waktu<?=$i;?>">
									</td>
									<td scope="row">
										<input type="text" name="ket<?=$i;?>">
									</td>
								</tr>
							<?php $j++; ?>
							<?php $i+1; ?>
							<?php endfor; ?>
							<tr class="text-uppercase fw-bold">
								<td scope="row">b</td>
								<td class="text-start" scope="row" colspan="5">turbin & auxilliary</td>
							</tr>

							<?php $j = 1; ?>
							<?php for ($i=5; $i < 14; $i++) : ?>

								<tr>
									<td scope="row"><?=$j ?></td>
									<td class="text-start" scope="row"><?= $pertanyaan1["$i"]["pertanyaan"]; ?></td>
									<td>
										<input class="form-check-input"  type="radio" name="jawaban<?=$i;?>" value="ya">
									</td>
									<td scope="row">
										<input class="form-check-input"  type="radio" name="jawaban<?=$i;?>" value="tidak">
									</td>
									<td scope="row">
										<input type="time" name="waktu<?=$i;?>">
									</td>
									<td scope="row">
										<input type="text" name="ket<?=$i;?>">
									</td>
								</tr>
							<?php $j++; ?>
							<?php $i+1; ?>
							<?php endfor; ?>

						<thead class="table-success text-uppercase align-middle">
							<tr>
								<th class="bg-secondary" colspan="6">tahap pelaksanaan shut down unit</th>
							</tr>
							<tr>
								<th rowspan="2" scope="col">NO</th>
								<th rowspan="2" scope="col">uraian pekerjaan</th>
								<th colspan="2" scope="col">checklist</th>
								<th rowspan="2" scope="col">waktu</th>
								<th rowspan="2" scope="col">keterangan</th>
							</tr>
							<tr>
								<th scope="col">do</th>
								<th scope="col">don't</th>
							</tr>
						</thead>

							<?php $j = 1; ?>
							<?php $k = 14; ?>
							<?php for ($i=0; $i < 20; $i++) : ?>
								

								<tr>
									<td scope="row"><?=$j ?></td>
									<td class="text-start" scope="row"><?= $pertanyaan2["$i"]["pertanyaan"]; ?></td>
									<td>
										<input class="form-check-input"  type="radio" name="jawaban<?=$k;?>" value="ya">
									</td>
									<td scope="row">
										<input class="form-check-input"  type="radio" name="jawaban<?=$k;?>" value="tidak">
									</td>
									<td scope="row">
										<input type="time" name="waktu<?=$k;?>">
									</td>
									<td scope="row">
										<input type="text" name="ket<?=$k;?>">
									</td>
								</tr>
							<?php $j++; ?>
							<?php $k++; ?>
							<?php $i+1; ?>
							<?php endfor; ?>
					</table>

					<p class="fw-bold text-uppercase">iv. aspek berbahaya dan akibatnya</p>
					
					<textarea name="aspek1" class="form-control mb-3">1. </textarea>
					<textarea name="aspek2" class="form-control mb-3">2. </textarea>
					
					<p class="fw-bold text-uppercase">v. pencegahan dan penanggulangan bahaya</p>
					
					<textarea name="pencegahan1" class="form-control mb-3">1. </textarea>
					<textarea name="pencegahan2" class="form-control mb-3">2. </textarea>

					<p class="fw-bold text-uppercase">vi. form laporan hasil shutdown unit & kondisi peralatan yang gangguan sebelum shutdown</p>
					<table class="table table-hover">
						<thead class="table-success text-uppercase align-middle text-center">
							<tr>
								<th width="5%">no</th>
								<th width="45%">item</th>
								<th width="50%">keterangan</th>
							</tr>
						</thead>
							<tr>
								<td class="text-center">1</td>
								<td>shutdown pada pukul</td>
								<td>
									<input type="time" name="jamSD">
								</td>						
								
							</tr>
							<tr>
								<td class="text-center">2</td>
								<td>beban sebelum shut down</td>
								<td>
									<input size="30%" type="text" name="bebanSD">
								</td>
							</tr>
							<tr>
								<td class="text-center">3</td>
								<td>lama tahapan shut down sejak penurunan beban</td>
								<td>
									<input size="30%" type="text" name="lamaSD">
								</td>
							</tr>
							<tr>
								<td class="text-center">4</td>
								<td>kondisi peralatan yang agngguan:</td>
								<td></td>
							</tr>

							<?php $j = 1 ?>
							<?php for ($i=5; $i <= 15; $i++) : ?>
								<tr>
									<td class="text-center"><?= $i ?></td>
									<td><input size="30%" type="text" name="peralatanGangguan<?=$j;?>"></td>
									<td><input size="30%" type="text" name="ketPeralatanGangguan<?=$j;?>"></td>
								</tr>
							<?php $j++ ?>
							<?php $i+1 ?>
							<?php endfor ?>
					</table>

					<div class="position-relative">
						<div class="position-absolute top-0 end-0">
							<button class="btn btn-success btn-sm" type="submit" name="save">Save & Download</button>
						</div>
					</div>
					<br><br><br><br>
				</form>
			</div>
		</div>		
	</div>
</body>
</nav>
</html>
