<?php 
session_start();
require 'functions.php';

// cek dulu cookie
if (isset($_COOKIE["id"]) && isset($_COOKIE["uname"])) {
	$id = $_COOKIE["id"];
	$uname = $_COOKIE["uname"];

	// ambil username berdasarkan id
	$result = mysqli_query($db, "SELECT username FROM users WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if ($uname === hash('sha256', $row["username"])) {
		$_SESSION["namaUser"] = $row["namaUser"];
		$_SESSION["username"] = $row["username"];			
		$_SESSION["login"] = true;
	}

}

if (isset($_SESSION["login"])) {
	header("Location: index.php");
}

// login awal

if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result =  mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
	
	// cek username
	if (mysqli_num_rows($result) === 1) {

		// cek password lagi
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
		 	// set session
			$_SESSION["login"] = true;
			$_SESSION["namaUser"] = $row["namaUser"];
			$_SESSION["username"] = $row["username"];

			// cek remember me
			if (isset($_POST["remember"])) {

				// buat cookie
				setcookie('id', $row["id"], time() + 60 );
				setcookie('uname', hash('sha256', $row["username"]), time()+60);
			}
		 	header("Location: index.php");
		 	exit;
		 }
	}
	$error = true;
}

?>

<!Doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/tittle.png">
    <title>webpunagaya</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/icons/icons-1.4.0/font/bootstrap-icons.css">
    <script src="bootstrap/js/jquery-3.2.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/loginn.css">
	
</head>
<body>
	<div class="container">
		<div class="atas row justify-content-center mt-4">
			<div class="col-md-6 col-sm-11 rounded-top ">
				<h2 class="text-light py-3">Login</h2>
			</div>			
		</div>
		<div class="bawah row justify-content-center">
			<div class="col-md-6 col-sm-11 rounded-bottom">
				
				<?php if (isset($error)) : ?>
					<p style="color: red; font-style: italic;">username / password salah</p>
				<?php endif; ?>

				<form action="" method="post">
					<div class="text-start my-2">
						<label class="form-label" for="username">Username</label>
						<div class="input-group mb-3">					
							<span class="input-group-text" id="basic-addon1"><img src="img/worker.png" width="20px"></span>
						  	<input type="text" class="form-control" placeholder="masukkan username" aria-label="Username" aria-describedby="basic-addon1" name="username" id="username" autocomplete="off">
						</div>
						<label class="form-label" for="password">Password</label>
						<div class="input-group mb-3">					
							<span class="input-group-text" id="basic-addon1"><img src="img/lock.png" width="20px"></span>
						  	<input type="password" class="form-control" placeholder="masukkan password" aria-label="Username" aria-describedby="basic-addon1" name="password" id="password">
						</div>
							<div class="my-2 form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember">
								<label class="form-check-label" for="remember">Remember me</label>
							</div>					
						<p class="text-end"><button class="btn" type="submit" name="login">Login</button></p>
						<p class="text-center">belum punya akun? klik <a href="registrasi.php" style="color: #fc8b05;">disini</a></p>
						<p class="text-center"><a href="lupaPassword.php" style="color: #fc8b05;">Lupa password</a></p>
					</div>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>