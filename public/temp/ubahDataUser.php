<?php
session_start();
if ($_SESSION["username"]=='renop') {
	echo "<script>
				alert('maaf, data anda tidak boleh diganti');
				document.location.href = 'dataku.php';
			</script>";
}
require 'functions.php';
$username = $_SESSION["username"];
//$data = query("SELECT * FROM users WHERE username = '$username'");
$data = user($username);
switch ($data["namaAtasan"]) {
	case 'asharri rizal':
		$selectedA = 'selected';
		$selectedB = '';
		$selectedC = '';
		$selectedD = '';
		break;
	case 'muhamad imam ismail':
		$selectedA = '';
		$selectedB = 'selected';
		$selectedC = '';
		$selectedD = '';
		break;
	case 'dwi aji saputro':
		$selectedA = '';
		$selectedB = '';
		$selectedC = 'selected';
		$selectedD = '';
		break;
	case 'yoga fajar nugroho':
		$selectedA = '';
		$selectedB = '';
		$selectedC = '';
		$selectedD = 'selected';
		break;		
}

$fotoUserLama = $data["fotoUser"];
$ttdUserLama = $data["ttdUser"];
$ttdAtasanLama = $data["ttdAtasan"];

if (isset($_POST["ubah"])) {
	if (ubahDataUser($_POST) > 0 ) {
		$dataUser = user($username);
		$_SESSION["namaUser"] = $dataUser["namaUser"];
		echo "<script>
				alert('data user berhasil diubah');
				document.location.href = 'dataku.php';
			</script>";
	} else {
		echo mysqli_error($db);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/tittle.png">
    <title>ubah data pegawai</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/icons/icons-1.4.0/font/bootstrap-icons.css">
    <script src="bootstrap/js/jquery-3.2.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/loginn.css">
</head>
<body>
<div class="container">
		<div class="atas row justify-content-center mt-3">
			<div class="col-md-6 col-sm-11 rounded-top d-flex">
				<h2 class="text-light py-3 text-capitalize">ubah data pegawai</h2>
			</div>				
		</div>
		<div class="bawah row justify-content-center">
			<div class="col-md-6 col-sm-11 rounded-bottom">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="text-start my-2">
						<label class="form-label" for="namaPegawai">Nama Pegawai</label>
						<div class="input-group mb-2">					
							<span class="input-group-text" id="basic-addon1"><img src="img/worker.png" width="20px"></span>
						  	<input type="text" class="form-control form-control-sm" value="<?=$data["namaUser"];?>" aria-label="Username" aria-describedby="basic-addon1" name="namaUser" id="namaPegawai" autocomplete="off" required>
						</div>
						<label class="form-label" for="nip">NIP</label>
						<div class="input-group mb-2">					
							<span class="input-group-text" id="basic-addon1"><img src="img/pencil.png" width="20px"></span>
						  	<input type="text" class="form-control form-control-sm" value="<?=$data["nipUser"];?>" aria-label="Username" aria-describedby="basic-addon1" name="nip" id="nip" autocomplete="off" required>
						</div>

						<label class="form-label" for="email">email</label>
						<div class="input-group mb-2">					
							<span class="input-group-text" id="basic-addon1">@</span>
						  	<input type="email" class="form-control form-control-sm" value="<?=$data["email"];?>" aria-label="Username" aria-describedby="basic-addon1" name="email" id="email" autocomplete="off">
						</div>

						<label class="form-label" for="namaAtasan">Nama Atasan</label>
						<div class="input-group mb-2">
							<span class="input-group-text" id="namaAtasan"><img src="img/man.png" width="20px"></i></span>
							<select class="form-select form-select-sm" id="namaAtasan" name="namaAtasan" required>
								<option <?=$selectedA?> value="asharri rizal">asharri rizal</option>
								<option <?=$selectedB?> value="muhamad imam ismail">muhamad imam ismail</option>
								<option <?=$selectedC?> value="dwi aji saputro">dwi aji saputro</option>
								<option <?=$selectedD?> value="yoga fajar nugroho">yoga fajar nugroho</option>
							</select>
						</div>

						<label class="form-label" for="foto">Foto saya</label><span style="font-style:italic;color: #fc8b05;"> <?=$data["fotoUser"];?></span>
						<div class="input-group input-group-sm mb-2">
						  	<input type="file" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="evidence1" id="foto">
						</div>

						<label class="form-label" for="ttd">TTD saya</label><span style="font-style:italic;color: #fc8b05;"> <?=$data["ttdUser"];?></span>
						<div class="input-group input-group-sm mb-2">
						  	<input type="file" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="evidence2" id="ttd">
						</div>

						<label class="form-label" for="ttda">TTD atasan</label><span style="font-style:italic;color: #fc8b05;"> <?=$data["ttdAtasan"];?></span>
						<div class="input-group input-group-sm mb-1">
						  	<input type="file" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="evidence3" id="ttda">
						</div><br><br>
						<div class="position-relative">
							<button class="btn btn-sm position-absolute bottom-0 end-0 mb-2" type="submit" name="ubah">ubah</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
    
</body>
</html>