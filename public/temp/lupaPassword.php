<?php
session_start();

require 'functions.php';
if (isset($_POST["kirim"])) {
    // cek apakah ada username yang sesuai atau tidak
    $username = $_POST["username"];
    //$dataUser = user($username);
    
    $dataUser =  mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
    
	if (mysqli_num_rows($dataUser) === 1) {
        $row = mysqli_fetch_assoc($dataUser);
        $_SESSION["unm"] = $username;
        $to = $row["email"];
        $acak = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmonopqrstuvwxyz123456789';
	    $_SESSION["kode"] = substr(str_shuffle($acak),0,5);
        if (kirimkode($to, $_SESSION["kode"])) {
            echo("
				<script>
					alert('masukkan kode yang telah di kirim ke $to');
					document.location.href = 'konfirmasiKode.php';
				</script>
			");
        }

	} else {
		echo("
				<script>
					alert('username tidak sesuai');
					document.location.href = 'lupaPassword.php';
				</script>
			");
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
				<h2 class="text-light py-3">Username Anda</h2>
			</div>			
		</div>
		<div class="bawah row justify-content-center">
			<div class="col-md-6 col-sm-11 rounded-bottom">

                <form action="" method="post">
                    <div class="text-start my-2">
						<label class="form-label" for="username">Username</label>
						<div class="input-group mb-3">					
							<span class="input-group-text" id="basic-addon1"><img src="img/worker.png" width="20px"></span>
						  	<input type="text" class="form-control" placeholder="masukkan username" aria-label="Username" aria-describedby="basic-addon1" name="username" id="username" autocomplete="off">
						</div>                       
                    </div>
                    <p class="text-end"><button class="btn" type="submit" name="kirim">Submit!</button></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>