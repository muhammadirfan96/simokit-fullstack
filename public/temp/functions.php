<?php

$db = mysqli_connect("localhost", "u782091411_Irfan", "Irfan313#1", "u782091411_project1");

//$db = mysqli_connect("localhost", "root", "", "webpunagaya");

//$db = mysqli_connect("0.0.0.0:3306", "root", "root", "Coba");

function query($query)
{
	global $db;
	$result = mysqli_query($db, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function user($username)
{
	$query = "SELECT * FROM users WHERE username = '$username'";
	return query($query)[0];
}

function simpan($data)
{
	global $db;
	$tanggal = date("d-m-Y");
	$diinput_oleh = $_SESSION["username"];
	$catatan = htmlspecialchars($data["catatan"]);
	$namaPeralatan = $_SESSION["namaPeralatan"];

	$jawaban1 = $data["flexRadioDefault1"];
	$coment1 = htmlspecialchars($data["textarea1"]);
	$jawaban2 = $data["flexRadioDefault2"];
	$coment2 = htmlspecialchars($data["textarea2"]);
	$jawaban3 = $data["flexRadioDefault3"];
	$coment3 = htmlspecialchars($data["textarea3"]);
	$jawaban4 = $data["flexRadioDefault4"];
	$coment4 = htmlspecialchars($data["textarea4"]);
	$jawaban5 = $data["flexRadioDefault5"];
	$coment5 = htmlspecialchars($data["textarea5"]);
	$jawaban6 = $data["flexRadioDefault6"];
	$coment6 = htmlspecialchars($data["textarea6"]);
	$jawaban7 = $data["flexRadioDefault7"];
	$coment7 = htmlspecialchars($data["textarea7"]);
	$jawaban8 = $data["flexRadioDefault8"];
	$coment8 = htmlspecialchars($data["textarea8"]);
	$jawaban9 = $data["flexRadioDefault9"];
	$coment9 = htmlspecialchars($data["textarea9"]);
	$jawaban10 = $data["flexRadioDefault10"];
	$coment10 = htmlspecialchars($data["textarea10"]);
	$jawaban11 = $data["flexRadioDefault11"];
	$coment11 = htmlspecialchars($data["textarea11"]);
	$jawaban12 = $data["flexRadioDefault12"];
	$coment12 = htmlspecialchars($data["textarea12"]);
	$jawaban13 = $data["flexRadioDefault13"];
	$coment13 = htmlspecialchars($data["textarea13"]);
	$jawaban14 = $data["flexRadioDefault14"];
	$coment14 = htmlspecialchars($data["textarea14"]);
	$jawaban15 = $data["flexRadioDefault15"];
	$coment15 = htmlspecialchars($data["textarea15"]);
	$jawaban16 = $data["flexRadioDefault16"];
	$coment16 = htmlspecialchars($data["textarea16"]);
	$jawaban17 = $data["flexRadioDefault17"];
	$coment17 = htmlspecialchars($data["textarea17"]);
	$jawaban18 = $data["flexRadioDefault18"];
	$coment18 = htmlspecialchars($data["textarea18"]);
	$jawaban19 = $data["flexRadioDefault19"];
	$coment19 = htmlspecialchars($data["textarea19"]);
	$jawaban20 = $data["flexRadioDefault20"];
	$coment20 = htmlspecialchars($data["textarea20"]);
	$jawaban21 = $data["flexRadioDefault21"];
	$coment21 = htmlspecialchars($data["textarea21"]);
	$jawaban22 = $data["flexRadioDefault22"];
	$coment22 = htmlspecialchars($data["textarea22"]);
	$jawaban23 = $data["flexRadioDefault23"];
	$coment23 = htmlspecialchars($data["textarea23"]);
	$jawaban24 = $data["flexRadioDefault24"];
	$coment24 = htmlspecialchars($data["textarea24"]);
	$jawaban25 = $data["flexRadioDefault25"];
	$coment25 = htmlspecialchars($data["textarea25"]);
	$jawaban26 = $data["flexRadioDefault26"];
	$coment26 = htmlspecialchars($data["textarea26"]);
	$jawaban27 = $data["flexRadioDefault27"];
	$coment27 = htmlspecialchars($data["textarea27"]);
	$jawaban28 = $data["flexRadioDefault28"];
	$coment28 = htmlspecialchars($data["textarea28"]);
	$jawaban29 = $data["flexRadioDefault29"];
	$coment29 = htmlspecialchars($data["textarea29"]);
	$jawaban30 = $data["flexRadioDefault30"];
	$coment30 = htmlspecialchars($data["textarea30"]);
	$jawaban31 = $data["flexRadioDefault31"];
	$coment31 = htmlspecialchars($data["textarea31"]);
	$jawaban32 = $data["flexRadioDefault32"];
	$coment32 = htmlspecialchars($data["textarea32"]);
	$jawaban33 = $data["flexRadioDefault33"];
	$coment33 = htmlspecialchars($data["textarea33"]);

	// insert ke tabel checklist
	$query = "INSERT INTO checklist VALUES (
				'', '$tanggal', '$diinput_oleh', '$namaPeralatan', '$catatan'
	)";
	mysqli_query($db, $query);

	// insert ke tabel jawaban
	$query2 = "INSERT INTO jawaban VALUES (
				'', '$namaPeralatan', '$jawaban1', '$jawaban2', '$jawaban3', '$jawaban4', '$jawaban5', '$jawaban6', '$jawaban7', '$jawaban8'
				, '$jawaban9', '$jawaban10', '$jawaban11', '$jawaban12', '$jawaban13', '$jawaban14','$jawaban15', '$jawaban16', '$jawaban17'
				, '$jawaban18', '$jawaban19', '$jawaban20', '$jawaban21', '$jawaban22', '$jawaban23', '$jawaban24', '$jawaban25'
				, '$jawaban26', '$jawaban27', '$jawaban28', '$jawaban29', '$jawaban30', '$jawaban31', '$jawaban32', '$jawaban33'
	)";
	mysqli_query($db, $query2);

	// insert ke tabel komen
	$query3 = "INSERT INTO komen VALUES (
				'', '$namaPeralatan', '$coment1', '$coment2', '$coment3', '$coment4', '$coment5', '$coment6', '$coment7', '$coment8'
				, '$coment9', '$coment10', '$coment11', '$coment12', '$coment13', '$coment14','$coment15', '$coment16', '$coment17'
				, '$coment18', '$coment19', '$coment20', '$coment21', '$coment22', '$coment23', '$coment24', '$coment25'
				, '$coment26', '$coment27', '$coment28', '$coment29', '$coment30', '$coment31', '$coment32', '$coment33'
	)";
	mysqli_query($db, $query3);

	return mysqli_affected_rows($db);
}


function tambahSrCm($data)
{
	global $db;
	$nomorSr =  htmlspecialchars($data["nomorSr"]);
	$unit = $data["unit"];
	$area = $data["area"];
	$namaPeralatan = htmlspecialchars($data["namaPeralatan"]);
	$kks = htmlspecialchars($data["kks"]);
	$uraianGangguan1 = htmlspecialchars($data["uraianGangguan1"]);
	$uraianGangguan2 = htmlspecialchars($data["uraianGangguan2"]);
	$normalOperasi1 = htmlspecialchars($data["normalOperasi1"]);
	$normalOperasi2 = htmlspecialchars($data["normalOperasi2"]);
	$gejala1 = htmlspecialchars($data["gejala1"]);
	$gejala2 = htmlspecialchars($data["gejala2"]);
	$prioritas = $data["prioritas"];
	$akibatKerusakan1 = htmlspecialchars($data["akibatKerusakan1"]);
	$akibatKerusakan2 = htmlspecialchars($data["akibatKerusakan2"]);
	$kemungkinanDampak1 = htmlspecialchars($data["kemungkinanDampak1"]);
	$kemungkinanDampak2 = htmlspecialchars($data["kemungkinanDampak2"]);
	$tindakanSementara1 = htmlspecialchars($data["tindakanSementara1"]);
	$tindakanSementara2 = htmlspecialchars($data["tindakanSementara2"]);
	$tindakanSementara3 = htmlspecialchars($data["tindakanSementara3"]);
	$diinput_oleh = $_SESSION["username"];
	$tanggal = $data["tanggal"];
	$ket = $_SESSION["ket"];

	// upload gambar dulu

	$evidence1 = upload(1, 1000000);
	if (isset($_SESSION["ket"])) {
		$evidence2 = upload(2, 1000000);
	}

	if (!$evidence1 && !$evidence2) {
		return false;
	}

	$query = "INSERT INTO srcm
				VALUES
			('','$nomorSr', '$unit', '$area', '$namaPeralatan', '$kks', '$uraianGangguan1', '$uraianGangguan2', '$normalOperasi1', '$normalOperasi2', '$gejala1', '$gejala2', '$prioritas', '$akibatKerusakan1', '$akibatKerusakan2', '$kemungkinanDampak1', '$kemungkinanDampak2', '$tindakanSementara1', '$tindakanSementara2', '$tindakanSementara3', '$diinput_oleh', '$tanggal', '$ket', '$evidence1', '$evidence2')
			";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

function tambahLimaS($data)
{
	global $db;
	$diinput_oleh = $_SESSION["username"];
	$namaPeralatan = htmlspecialchars($data["namaPeralatan"]);
	$area = htmlspecialchars($data["area"]);
	$saran = htmlspecialchars($data["saran"]);
	$tanggal = $data["tanggal"];
	$sebelum = upload(1, 1000000);
	$setelah = upload(2, 1000000);

	if (!$sebelum && !$setelah) {
		return false;
	}

	$nilai1 = $data["nilai1"];
	$nilai2 = $data["nilai2"];
	$nilai3 = $data["nilai3"];
	$nilai4 = $data["nilai4"];
	$nilai5 = $data["nilai5"];
	$nilai6 = $data["nilai6"];
	$nilai7 = $data["nilai7"];
	$nilai8 = $data["nilai8"];
	$nilai9 = $data["nilai9"];
	$nilai10 = $data["nilai10"];
	$nilai11 = $data["nilai11"];
	$nilai12 = $data["nilai12"];
	$nilai13 = $data["nilai13"];
	$nilai14 = $data["nilai14"];
	$nilai15 = $data["nilai15"];
	$nilai16 = $data["nilai16"];
	$nilai17 = $data["nilai17"];
	$nilai18 = $data["nilai18"];
	$nilai19 = $data["nilai19"];
	$nilai20 = $data["nilai20"];
	$nilai21 = $data["nilai21"];
	$nilai22 = $data["nilai22"];
	$nilai23 = $data["nilai23"];
	$nilai24 = $data["nilai24"];
	$nilai25 = $data["nilai25"];

	$query = "INSERT INTO limas
				VALUES
			('', '$diinput_oleh', '$tanggal', '$namaPeralatan', '$area', '$saran', '$sebelum', '$setelah' )
			";
	mysqli_query($db, $query);

	$query2 = "INSERT INTO nilailimas
				VALUES
			('', '$nilai1', '$nilai2', '$nilai3', '$nilai4', '$nilai5', '$nilai6', '$nilai7', '$nilai8', '$nilai9', '$nilai10', '$nilai11', '$nilai12', '$nilai13', '$nilai14', '$nilai15', '$nilai16', '$nilai17', '$nilai18', '$nilai19', '$nilai20', '$nilai21', '$nilai22', '$nilai23', '$nilai24', '$nilai25' )
			";
	mysqli_query($db, $query2);

	return mysqli_affected_rows($db);
}

function simpanShutdown($data)
{
	global $db;
	$unit = $data["unit"];
	$waktu = $data["waktu"];
	$shiftA = $data["shiftA"];
	$shiftB = $data["shiftB"];
	$shiftC = $data["shiftC"];
	$shiftD = $data["shiftD"];
	$wtp = htmlspecialchars($data["wtp"]);
	$analisa = htmlspecialchars($data["analisa"]);
	$boilerAux1 = htmlspecialchars($data["boilerAux1"]);
	$boilerAux2 = htmlspecialchars($data["boilerAux2"]);
	$turbinAux1 = htmlspecialchars($data["turbinAux1"]);
	$turbinAux2 = htmlspecialchars($data["turbinAux2"]);
	$electrical1 = htmlspecialchars($data["electrical1"]);
	$electrical2 = htmlspecialchars($data["electrical2"]);
	$sepatu = $data["sepatu"];
	$helm = $data["helm"];
	$earplug = $data["earplug"];
	$masker = $data["masker"];
	$sTangan = $data["sTangan"];

	$jawaban0 = $data["jawaban0"];
	$waktu0 = $data["waktu0"];
	$ket0 = htmlspecialchars($data["ket0"]);
	$jawaban1 = $data["jawaban1"];
	$waktu1 = $data["waktu1"];
	$ket1 = htmlspecialchars($data["ket1"]);
	$jawaban2 = $data["jawaban2"];
	$waktu2 = $data["waktu2"];
	$ket2 = htmlspecialchars($data["ket2"]);
	$jawaban3 = $data["jawaban3"];
	$waktu3 = $data["waktu3"];
	$ket3 = htmlspecialchars($data["ket3"]);
	$jawaban4 = $data["jawaban4"];
	$waktu4 = $data["waktu4"];
	$ket4 = htmlspecialchars($data["ket4"]);
	$jawaban5 = $data["jawaban5"];
	$waktu5 = $data["waktu5"];
	$ket5 = htmlspecialchars($data["ket5"]);
	$jawaban6 = $data["jawaban6"];
	$waktu6 = $data["waktu6"];
	$ket6 = htmlspecialchars($data["ket6"]);
	$jawaban7 = $data["jawaban7"];
	$waktu7 = $data["waktu7"];
	$ket7 = htmlspecialchars($data["ket7"]);
	$jawaban8 = $data["jawaban8"];
	$waktu8 = $data["waktu8"];
	$ket8 = htmlspecialchars($data["ket8"]);
	$jawaban9 = $data["jawaban9"];
	$waktu9 = $data["waktu9"];
	$ket9 = htmlspecialchars($data["ket9"]);
	$jawaban10 = $data["jawaban10"];
	$waktu10 = $data["waktu10"];
	$ket10 = htmlspecialchars($data["ket10"]);
	$jawaban11 = $data["jawaban11"];
	$waktu11 = $data["waktu11"];
	$ket11 = htmlspecialchars($data["ket11"]);
	$jawaban12 = $data["jawaban12"];
	$waktu12 = $data["waktu12"];
	$ket12 = htmlspecialchars($data["ket12"]);
	$jawaban13 = $data["jawaban13"];
	$waktu13 = $data["waktu13"];
	$ket13 = htmlspecialchars($data["ket13"]);
	$jawaban14 = $data["jawaban14"];
	$waktu14 = $data["waktu14"];
	$ket14 = htmlspecialchars($data["ket14"]);
	$jawaban15 = $data["jawaban15"];
	$waktu15 = $data["waktu15"];
	$ket15 = htmlspecialchars($data["ket15"]);
	$jawaban16 = $data["jawaban16"];
	$waktu16 = $data["waktu16"];
	$ket16 = htmlspecialchars($data["ket16"]);
	$jawaban17 = $data["jawaban17"];
	$waktu17 = $data["waktu17"];
	$ket17 = htmlspecialchars($data["ket17"]);
	$jawaban18 = $data["jawaban18"];
	$waktu18 = $data["waktu18"];
	$ket18 = htmlspecialchars($data["ket18"]);
	$jawaban19 = $data["jawaban19"];
	$waktu19 = $data["waktu19"];
	$ket19 = htmlspecialchars($data["ket19"]);
	$jawaban20 = $data["jawaban20"];
	$waktu20 = $data["waktu20"];
	$ket20 = htmlspecialchars($data["ket20"]);
	$jawaban21 = $data["jawaban21"];
	$waktu21 = $data["waktu21"];
	$ket21 = htmlspecialchars($data["ket21"]);
	$jawaban22 = $data["jawaban22"];
	$waktu22 = $data["waktu22"];
	$ket22 = htmlspecialchars($data["ket22"]);
	$jawaban23 = $data["jawaban23"];
	$waktu23 = $data["waktu23"];
	$ket23 = htmlspecialchars($data["ket23"]);
	$jawaban24 = $data["jawaban24"];
	$waktu24 = $data["waktu24"];
	$ket24 = htmlspecialchars($data["ket24"]);
	$jawaban25 = $data["jawaban25"];
	$waktu25 = $data["waktu25"];
	$ket25 = htmlspecialchars($data["ket25"]);
	$jawaban26 = $data["jawaban26"];
	$waktu26 = $data["waktu26"];
	$ket26 = htmlspecialchars($data["ket26"]);
	$jawaban27 = $data["jawaban27"];
	$waktu27 = $data["waktu27"];
	$ket27 = htmlspecialchars($data["ket27"]);
	$jawaban28 = $data["jawaban28"];
	$waktu28 = $data["waktu28"];
	$ket28 = htmlspecialchars($data["ket28"]);
	$jawaban29 = $data["jawaban29"];
	$waktu29 = $data["waktu29"];
	$ket29 = htmlspecialchars($data["ket29"]);
	$jawaban30 = $data["jawaban30"];
	$waktu30 = $data["waktu30"];
	$ket30 = htmlspecialchars($data["ket30"]);
	$jawaban31 = $data["jawaban31"];
	$waktu31 = $data["waktu31"];
	$ket31 = htmlspecialchars($data["ket31"]);
	$jawaban32 = $data["jawaban32"];
	$waktu32 = $data["waktu32"];
	$ket32 = htmlspecialchars($data["ket32"]);
	$jawaban33 = $data["jawaban33"];
	$waktu33 = $data["waktu33"];
	$ket33 = htmlspecialchars($data["ket33"]);

	$aspek1 = htmlspecialchars($data["aspek1"]);
	$aspek2 = htmlspecialchars($data["aspek2"]);
	$pencegahan1 = htmlspecialchars($data["pencegahan1"]);
	$pencegahan2 = htmlspecialchars($data["pencegahan2"]);
	$jamSD = $data["jamSD"];
	$bebanSD = htmlspecialchars($data["bebanSD"]);
	$lamaSD = htmlspecialchars($data["lamaSD"]);
	$peralatanGangguan1 = htmlspecialchars($data["peralatanGangguan1"]);
	$ketPeralatanGangguan1 = htmlspecialchars($data["ketPeralatanGangguan1"]);
	$peralatanGangguan2 = htmlspecialchars($data["peralatanGangguan2"]);
	$ketPeralatanGangguan2 = htmlspecialchars($data["ketPeralatanGangguan2"]);
	$peralatanGangguan3 = htmlspecialchars($data["peralatanGangguan3"]);
	$ketPeralatanGangguan3 = htmlspecialchars($data["ketPeralatanGangguan3"]);
	$peralatanGangguan4 = htmlspecialchars($data["peralatanGangguan4"]);
	$ketPeralatanGangguan4 = htmlspecialchars($data["ketPeralatanGangguan4"]);
	$peralatanGangguan5 = htmlspecialchars($data["peralatanGangguan5"]);
	$ketPeralatanGangguan5 = htmlspecialchars($data["ketPeralatanGangguan5"]);
	$peralatanGangguan6 = htmlspecialchars($data["peralatanGangguan6"]);
	$ketPeralatanGangguan6 = htmlspecialchars($data["ketPeralatanGangguan6"]);
	$peralatanGangguan7 = htmlspecialchars($data["peralatanGangguan7"]);
	$ketPeralatanGangguan7 = htmlspecialchars($data["ketPeralatanGangguan7"]);
	$peralatanGangguan8 = htmlspecialchars($data["peralatanGangguan8"]);
	$ketPeralatanGangguan8 = htmlspecialchars($data["ketPeralatanGangguan8"]);
	$peralatanGangguan9 = htmlspecialchars($data["peralatanGangguan9"]);
	$ketPeralatanGangguan9 = htmlspecialchars($data["ketPeralatanGangguan9"]);
	$peralatanGangguan10 = htmlspecialchars($data["peralatanGangguan10"]);
	$ketPeralatanGangguan10 = htmlspecialchars($data["ketPeralatanGangguan10"]);
	$peralatanGangguan11 = htmlspecialchars($data["peralatanGangguan11"]);
	$ketPeralatanGangguan11 = htmlspecialchars($data["ketPeralatanGangguan11"]);
	$peralatanGangguan12 = htmlspecialchars($data["peralatanGangguan12"]);
	$ketPeralatanGangguan12 = htmlspecialchars($data["ketPeralatanGangguan12"]);
	$peralatanGangguan13 = htmlspecialchars($data["peralatanGangguan13"]);
	$ketPeralatanGangguan13 = htmlspecialchars($data["ketPeralatanGangguan13"]);
	$peralatanGangguan14 = htmlspecialchars($data["peralatanGangguan14"]);
	$ketPeralatanGangguan14 = htmlspecialchars($data["ketPeralatanGangguan14"]);
	$peralatanGangguan15 = htmlspecialchars($data["peralatanGangguan15"]);
	$ketPeralatanGangguan15 = htmlspecialchars($data["ketPeralatanGangguan15"]);

	$query1 = "INSERT INTO sddata
				VALUES
			('', '$unit', '$waktu', '$shiftA', '$shiftB', '$shiftC', '$shiftD', '$wtp', '$analisa', '$boilerAux1', '$boilerAux2', '$turbinAux1', '$turbinAux2', '$electrical1', '$electrical2', '$sepatu', '$helm', '$earplug', '$masker', '$sTangan', '$aspek1', '$aspek2', '$pencegahan1', '$pencegahan2', '$jamSD', '$bebanSD', '$lamaSD' )
			";
	mysqli_query($db, $query1);

	$query2 = "INSERT INTO sdjawaban
				VALUES
			('', '$jawaban0', '$jawaban1', '$jawaban2', '$jawaban3', '$jawaban4', '$jawaban5', '$jawaban6', '$jawaban7', '$jawaban8', '$jawaban9', '$jawaban10', '$jawaban11', '$jawaban12', '$jawaban13', '$jawaban14', '$jawaban15', '$jawaban16', '$jawaban17', '$jawaban18', '$jawaban19', '$jawaban20', '$jawaban21', '$jawaban22', '$jawaban23', '$jawaban24', '$jawaban25', '$jawaban26', '$jawaban27', '$jawaban28', '$jawaban29', '$jawaban30', '$jawaban31', '$jawaban32', '$jawaban33' )
			";
	mysqli_query($db, $query2);

	$query3 = "INSERT INTO sdket
				VALUES
			('', '$ket0', '$ket1', '$ket2', '$ket3', '$ket4', '$ket5', '$ket6', '$ket7', '$ket8', '$ket9', '$ket10', '$ket11', '$ket12', '$ket13', '$ket14', '$ket15', '$ket16', '$ket17', '$ket18', '$ket19', '$ket20', '$ket21', '$ket22', '$ket23', '$ket24', '$ket25', '$ket26', '$ket27', '$ket28', '$ket29', '$ket30', '$ket31', '$ket32', '$ket33' )
			";
	mysqli_query($db, $query3);

	$query4 = "INSERT INTO sdwaktu
				VALUES
			('', '$waktu0', '$waktu1', '$waktu2', '$waktu3', '$waktu4', '$waktu5', '$waktu6', '$waktu7', '$waktu8', '$waktu9', '$waktu10', '$waktu11', '$waktu12', '$waktu13', '$waktu14', '$waktu15', '$waktu16', '$waktu17', '$waktu18', '$waktu19', '$waktu20', '$waktu21', '$waktu22', '$waktu23', '$waktu24', '$waktu25', '$waktu26', '$waktu27', '$waktu28', '$waktu29', '$waktu30', '$waktu31', '$waktu32', '$waktu33' )
			";
	mysqli_query($db, $query4);

	$query5 = "INSERT INTO sdgangguan
				VALUES
			('', '$peralatanGangguan1', '$ketPeralatanGangguan1', '$peralatanGangguan2', '$ketPeralatanGangguan2', '$peralatanGangguan3', '$ketPeralatanGangguan3', '$peralatanGangguan4', '$ketPeralatanGangguan4', '$peralatanGangguan5', '$ketPeralatanGangguan5', '$peralatanGangguan6', '$ketPeralatanGangguan6', '$peralatanGangguan7', '$ketPeralatanGangguan7', '$peralatanGangguan8', '$ketPeralatanGangguan8', '$peralatanGangguan9', '$ketPeralatanGangguan9', '$peralatanGangguan10', '$ketPeralatanGangguan10', '$peralatanGangguan11', '$ketPeralatanGangguan11', '$peralatanGangguan12', '$ketPeralatanGangguan12', '$peralatanGangguan13', '$ketPeralatanGangguan13', '$peralatanGangguan14', '$ketPeralatanGangguan14', '$peralatanGangguan15', '$ketPeralatanGangguan15' )
			";
	mysqli_query($db, $query5);

	return mysqli_affected_rows($db);
}

function upload($data, $max)
{
	$namaFile = $_FILES["evidence$data"]["name"];
	$ukuranFile = $_FILES["evidence$data"]["size"];
	$error = $_FILES["evidence$data"]["error"];
	$tmpName = $_FILES["evidence$data"]["tmp_name"];

	// cek apakah ada evidence yang di upload atau tdk
	if ($error === 4) {
		echo "<script>
				alert('pilih evidence terlebih dahulu');
			</script>";
		return false;
	}

	// cek yang di upload evidence atau bukan
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('yang anda upload bukan gambar');
			</script>";
		return false;
	}

	// CEK JIKA UKURANNYA TERLALU BESAR
	if ($ukuranFile > $max) {
		echo "<script>
				alert('ukuran gambar terlalu besar (maksimal $max byte)');
			</script>";
		return false;
	}

	// lolos pengecekan maka evidence siap diupload
	// generate nama evidence baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'imgUpload/' . $namaFileBaru);
	return $namaFileBaru;
}

function hapus($id, $namaTable)
{
	global $db;
	mysqli_query($db, "DELETE FROM $namaTable WHERE id = $id");
	return mysqli_affected_rows($db);
}

function ubahDataUser($data)
{
	global $db;
	global $username;
	global $fotoUserLama;
	global $ttdUserLama;
	global $ttdAtasanLama;
	$namaUser = strtolower(stripcslashes($data["namaUser"]));
	$nipUser = strtolower(stripcslashes($data["nip"]));
	$email = htmlspecialchars($data["email"]);
	$namaAtasan = $data["namaAtasan"];

	if ($namaAtasan == "asharri rizal") {
		$shift = "A";
		$nipAtasan = "94171285zy";
	} elseif ($namaAtasan == "muhamad imam ismail") {
		$shift = "B";
		$nipAtasan = "8810035f";
	} elseif ($namaAtasan == "dwi aji saputro") {
		$shift = "C";
		$nipAtasan = "94171286zy";
	} elseif ($namaAtasan == "yoga fajar nugroho") {
		$shift = "D";
		$nipAtasan = "9218616zy";
	}

	// cek apakah user pilih gambar baru atau tidak
	if ($_FILES["evidence1"]["error"] === 4) {
		$fotoUser = $fotoUserLama;
	} else {
		if (empty($fotoUser = upload(1, 3000000))) {
			$fotoUser = $fotoUserLama;
		}
	}

	if ($_FILES["evidence2"]["error"] === 4) {
		$ttdUser = $ttdUserLama;
	} else {
		if (empty($ttdUser = upload(2, 1000000))) {
			$ttdUser = $ttdUserLama;
		}
	}

	if ($_FILES["evidence3"]["error"] === 4) {
		$ttdAtasan = $ttdAtasanLama;
	} else {
		if (empty($ttdAtasan = upload(3, 1000000))) {
			$ttdAtasan = $ttdAtasanLama;
		}
	}

	$query = "UPDATE users SET
				namaUser = '$namaUser',
				shift = '$shift',
				nipUser = '$nipUser',
				nipAtasan = '$nipAtasan',
				email = '$email',
				namaAtasan = '$namaAtasan',
				fotoUser = '$fotoUser',
				ttdUser = '$ttdUser',
				ttdAtasan = '$ttdAtasan'

			WHERE username = '$username'

			";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

function gantiPassword($data)
{
	global $db;
	$unm = $_SESSION["unm"];
	$password = mysqli_real_escape_string($db, $data["password"]);
	$password2 = mysqli_real_escape_string($db, $data["password2"]);

	// cek konfirmasi password
	if ($password !== $password2) {
		# code...
		echo "<script>
				alert('konfirmasi password tidak sesuai');
			</script>";
		return false;
	}
	// ekripsi password terlebih dahulu
	$password = password_hash($password, PASSWORD_DEFAULT);

	// password sama maka ganti passord lama dengan password baru

	$query = "UPDATE users SET password = '$password' WHERE username = '$unm'";

	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}

function registrasi($data)
{
	global $db;
	$username = strtolower(stripcslashes($data["username"]));
	$namaUser = strtolower(stripcslashes($data["namaUser"]));
	$email = strtolower(stripcslashes($data["email"]));
	$nipUser = strtolower(stripcslashes($data["nip"]));
	$namaAtasan = strtolower(stripcslashes($data["namaAtasan"]));

	if ($namaAtasan == "asharri rizal") {
		$shift = "A";
		$nipAtasan = "94171285zy";
	} elseif ($namaAtasan == "muhamad imam ismail") {
		$shift = "B";
		$nipAtasan = "8810035f";
	} elseif ($namaAtasan == "dwi aji saputro") {
		$shift = "C";
		$nipAtasan = "94171286zy";
	} elseif ($namaAtasan == "yoga fajar nugroho") {
		$shift = "D";
		$nipAtasan = "9218616zy";
	}

	$password = mysqli_real_escape_string($db, $data["password"]);
	$password2 = mysqli_real_escape_string($db, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah terdaftar')
			</script>";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai');
			</script>";
		return false;
	}
	// ekripsi password terlebih dahulu
	$password = password_hash($password, PASSWORD_DEFAULT);

	// password sama maka tambahkan user baru ke data base

	mysqli_query($db, "INSERT INTO users VALUES ('', '$username', '$shift', '$nipUser', '$namaUser', '$email', '$nipAtasan', '$namaAtasan', '', '', '', '$password')");
	return mysqli_affected_rows($db);
}

function registrasiAdmin($data)
{
	global $db;
	$username = strtolower(stripcslashes($data["usernameAdmin"]));
	mysqli_query($db, "INSERT INTO admin VALUES ('', '$username')");
	return mysqli_affected_rows($db);
}

function inputschedulesatu($data)
{
	global $db;
	global $hari;
	for ($i = 1; $i <= $hari; $i++) {
		$tanggal = date('Y-m-' . $i);
		$checklistunitsatu = [];
		for ($j = 99; $j <= 123; $j++) {
			array_push($checklistunitsatu, $data["$i" . "$j"]);
		}

		$query1 = "INSERT INTO schedulesatu
				VALUES ('', '$tanggal', '" . join("','", $checklistunitsatu) . "')		
			";
		mysqli_query($db, $query1);
	}
	return mysqli_affected_rows($db);
}

function inputscheduledua($data)
{
	global $db;
	global $hari;
	for ($i = 1; $i <= $hari; $i++) {
		$tanggal = date('Y-m-' . $i);
		$checklistunitdua = [];
		for ($j = 999; $j <= 1023; $j++) {
			array_push($checklistunitdua, $data["$i" . "$j"]);
		}

		$query2 = "INSERT INTO scheduledua
				VALUES ('', '$tanggal', '" . join("','", $checklistunitdua) . "')		
			";
		mysqli_query($db, $query2);
	}
	return mysqli_affected_rows($db);
}

function inputschedulecommon($data)
{
	global $db;
	global $hari;
	for ($i = 1; $i <= $hari; $i++) {
		$tanggal = date('Y-m-' . $i);
		$checklistcommon = [];
		for ($j = 9999; $j <= 10012; $j++) {
			array_push($checklistcommon, $data["$i" . "$j"]);
		}

		$query3 = "INSERT INTO schedulecommon
				VALUES ('', '$tanggal', '" . join("','", $checklistcommon) . "')	
			";
		mysqli_query($db, $query3);
	}
	return mysqli_affected_rows($db);
}

function inputschedulelimasboiler($data)
{
	global $db;
	global $hari;
	for ($i = 1; $i <= $hari; $i++) {
		$tanggal = date('Y-m-' . $i);

		// tabel pertama 5S boiler
		$checklistlimasboilerpertama = [];
		for ($j = 99; $j <= 124; $j++) {
			array_push($checklistlimasboilerpertama, $data["$i" . "$j"]);
		}

		$query1 = "INSERT INTO limasboilerpertama
				VALUES ('', '$tanggal', '" . join("','", $checklistlimasboilerpertama) . "')		
			";
		mysqli_query($db, $query1);

		// tabel kedua 5S boiler
		$checklistlimasboilerkedua = [];
		for ($j = 125; $j <= 150; $j++) {
			array_push($checklistlimasboilerkedua, $data["$i" . "$j"]);
		}

		$query2 = "INSERT INTO limasboilerkedua
				VALUES ('', '$tanggal', '" . join("','", $checklistlimasboilerkedua) . "')		
			";
		mysqli_query($db, $query2);

		// tabel ketiga 5S boiler
		$checklistlimasboilerketiga = [];
		for ($j = 151; $j <= 170; $j++) {
			array_push($checklistlimasboilerketiga, $data["$i" . "$j"]);
		}

		$query3 = "INSERT INTO limasboilerketiga
				VALUES ('', '$tanggal', '" . join("','", $checklistlimasboilerketiga) . "')		
			";
		mysqli_query($db, $query3);
	}

	return mysqli_affected_rows($db);
}

function inputschedulelimasturbin($data)
{
	global $db;
	global $hari;
	for ($i = 1; $i <= $hari; $i++) {
		$tanggal = date('Y-m-' . $i);

		// tabel pertama 5S turbin
		$checklistlimasturbinpertama = [];
		for ($j = 999; $j <= 1026; $j++) {
			array_push($checklistlimasturbinpertama, $data["$i" . "$j"]);
		}

		$query1 = "INSERT INTO limasturbinpertama
				VALUES ('', '$tanggal', '" . join("','", $checklistlimasturbinpertama) . "')		
			";
		mysqli_query($db, $query1);

		// tabel kedua 5S turbin
		$checklistlimasturbinkedua = [];
		for ($j = 1027; $j <= 1054; $j++) {
			array_push($checklistlimasturbinkedua, $data["$i" . "$j"]);
		}

		$query2 = "INSERT INTO limasturbinkedua
				VALUES ('', '$tanggal', '" . join("','", $checklistlimasturbinkedua) . "')		
			";
		mysqli_query($db, $query2);

		// tabel ketiga 5S turbin
		$checklistlimasturbinketiga = [];
		for ($j = 1055; $j <= 1080; $j++) {
			array_push($checklistlimasturbinketiga, $data["$i" . "$j"]);
		}

		$query3 = "INSERT INTO limasturbinketiga
				VALUES ('', '$tanggal', '" . join("','", $checklistlimasturbinketiga) . "')		
			";
		mysqli_query($db, $query3);

		// tabel keempat 5S turbin
		$checklistlimasturbinkeempat = [];
		for ($j = 1081; $j <= 1104; $j++) {
			array_push($checklistlimasturbinkeempat, $data["$i" . "$j"]);
		}

		$query4 = "INSERT INTO limasturbinkeempat
				VALUES ('', '$tanggal', '" . join("','", $checklistlimasturbinkeempat) . "')		
			";
		mysqli_query($db, $query4);
	}

	return mysqli_affected_rows($db);
}

function inputschedulelimasalba($data)
{
	global $db;
	global $hari;
	for ($i = 1; $i <= $hari; $i++) {
		$tanggal = date('Y-m-' . $i);

		// tabel pertama 5S alba
		$checklistlimasalbapertama = [];
		for ($j = 9999; $j <= 10026; $j++) {
			array_push($checklistlimasalbapertama, $data["$i" . "$j"]);
		}

		$query1 = "INSERT INTO limasalbapertama
				VALUES ('', '$tanggal', '" . join("','", $checklistlimasalbapertama) . "')		
			";
		mysqli_query($db, $query1);

		// tabel kedua 5S alba
		$checklistlimasalbakedua = [];
		for ($j = 10027; $j <= 10034; $j++) {
			array_push($checklistlimasalbakedua, $data["$i" . "$j"]);
		}

		$query2 = "INSERT INTO limasalbakedua
				VALUES ('', '$tanggal', '" . join("','", $checklistlimasalbakedua) . "')		
			";
		mysqli_query($db, $query2);
	}

	return mysqli_affected_rows($db);
}

function kirimkode($to, $kode)
{
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	$from = "muhammadirfanirfani808@gmail.com";
	//$to = "muhammadirfan187@outlook.com";
	$subject = "kode konfirmasi";
	$message = "kode konfirmasi anda adalah " . $kode;
	$headers = "From:" . $from;
	return mail($to, $subject, $message, $headers);
}
