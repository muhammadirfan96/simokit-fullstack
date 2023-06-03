<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require_once __DIR__ . '/mpdf/vendor/autoload.php';

require 'functions.php';
$mpdf = new \Mpdf\Mpdf();

if ( $_GET["cetak"] == "dbsrcm") {
	$id = $_GET["id"];
	$table = query("SELECT * FROM srcm WHERE id = '$id'");
} elseif ($_GET["cetak"] == "srcm") {
	$table = query("SELECT * FROM srcm ORDER BY id DESC LIMIT 1");
}
$daftarHari = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];

// ambil data pegawai
$diinput_oleh = $table[0]["diinput_oleh"];
//$pegawai = query("SELECT * FROM users WHERE namaUser = '$diinput_oleh' ")[0];
$pegawai = user($diinput_oleh);

if(empty($pegawai["ttdAtasan"])) {
	$ttdAtasan = '<br><br><br><br>';
} else {
	$ttdAtasan = '<img src="imgUpload/'.$pegawai["ttdAtasan"].'" width="70px" height="70px">';
}

if(empty($pegawai["ttdUser"])) {
	$ttdUser = '<br><br><br><br>';
} else {
	$ttdUser = '<img src="imgUpload/'.$pegawai["ttdUser"].'" width="70px" height="70px">';
}

//untuk unit
if ($table[0]["unit"] == "#1") {
	$unit1 = "&#9745";
}else {
	$unit1 = "&#9744";
}
if ($table[0]["unit"] == "#2") {
	$unit2 = "&#9745";
}else{
	$unit2 = "&#9744";
}

//untuk area
if ($table[0]["area"] == "turbin") {
	$turbin = "&#9745";
	$boiler = "&#9744";
	$wtp = "&#9744";
	$electrical = "&#9744";
}elseif ($table[0]["area"] == "boiler") {
	$turbin = "&#9744";
	$boiler = "&#9745";
	$wtp = "&#9744";
	$electrical = "&#9744";
}elseif ($table[0]["area"] == "wtp") {
	$turbin = "&#9744";
	$boiler = "&#9744";
	$wtp = "&#9745";
	$electrical = "&#9744";
}elseif ($table[0]["area"] == "electrical") {
	$turbin = "&#9744";
	$boiler = "&#9744";
	$wtp = "&#9744";
	$electrical = "&#9745";
}

// untukprioritas
if ($table[0]["prioritas"] == "emergency") {
	$p1 = "&#9745";
	$p2 = "&#9744";
	$p3 = "&#9744";
}elseif ($table[0]["prioritas"] == "urgent") {
	$p1 = "&#9744";
	$p2 = "&#9745";
	$p3 = "&#9744";
}elseif ($table[0]["prioritas"] == "normal") {
	$p1 = "&#9744";
	$p2 = "&#9744";
	$p3 = "&#9745";
}	

$evidence1 = "Sebelum FLM";$evidence2 = "Setelah FLM";
if ($table[0]["ket"]=="") {$evidence1 = "Lampiran";$evidence2 = "";}

$header = '<div class="header"><table border="1" cellpadding="5" cellspacing="0">
		<tr>
			<td rowspan="4"><img src="img/upk.jpg" width="150px"></td>
			<th rowspan="4" class="sr">service request</th>
			<td class="right size12">No. Dokumen :</td>
			<td class="size12">01/BMS/SPNG/2017</td>
		</tr>

		<tr>
			<td class="right size12">Tgl. Berlaku :</td>
			<td class="size12">01 Oktober 2017</td>
		</tr>

		<tr>
			<td class="right size12">Rev :</td>
			<td class="size12">0</td>
		</tr>

		<tr>
			<td class="right size12">Hal :</td>
			<td class="size12">'.'{PAGENO}'.'</td>
		</tr>

	</table></div>';

$html = '<!DOCTYPE html>
<html>
<head>
    <title>Form Cheklist</title>
    <link rel="stylesheet" href="css/cetakSrCm.css">
</head>
<body>

	<div style="border: 3px solid black; padding: 7px;" class="table" >

	<table border="1" cellpadding="5" cellspacing="0" >		
		<tr>
			<td>
				<div class="dalam">
				<table border="0" cellpadding="5" cellspacing="0">
					<tr>						
						<td width="30%">Nomor SR</td>
						<td colspan="5" width="70%">: '.$table[0]["nomorSr"].'</td>
					</tr>
					<tr>
						<td>Hari</td>
						<td colspan="5">: '. $daftarHari[date('l',strtotime($table[0]["tanggal"]))] .'</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td colspan="5">: '. date('d-m-Y',strtotime($table[0]["tanggal"])) .'</td>
					</tr>
					<tr>
						<td>Waktu</td>
						<td colspan="5">: '. date('H:i',strtotime($table[0]["tanggal"])) .' WITA</td>
					</tr>
					<tr>
						<td>Unit</td>
						<td class="right">#1</td>
						<td style="font-size:30px;"><b>'.$unit1.'</b></td>
						<td class="right">#2</td>
						<td style="font-size:30px;"><b>'.$unit2.'</b></td>
						<td style="font-size: 8px; font-style: italic;"><b>* dicentang</b></td>
					</tr>
					<tr>
						<td>Area</td>
						<td class="center">Boiler<br>
							<b style="font-size:30px;">'.$boiler.'</b>
						</td>
						<td class="center">Turbin<br>
							<b style="font-size:30px;">'.$turbin.'</b>
						</td>
						<td class="center">WTP<br>
							<b style="font-size:30px;">'.$wtp.'</b>
						</td>
						<td class="center">Electrical<br>
							<b style="font-size:30px;">'.$electrical.'</b>
						</td>
						<td style="font-size: 8px; font-style: italic;"><b>* dicentang</b></td>
					</tr>
					<tr>
						<td border="1">Nama Peralatan</td>
						<td colspan="5">: '.$table[0]["namaPeralatan"].'</td>
					</tr>
					<tr>
						<td>No. KKS</td>
						<td colspan="5">: '.$table[0]["kks"].'</td>
					</tr>
					<tr>
						<td>Uraian Gangguan</td>
						<td colspan="5">: '.$table[0]["uraianGangguan1"].'</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="5">: ' .$table[0]["uraianGangguan2"].'</td>
					</tr>
					<tr>
						<td>Normal Operasi</td>
						<td colspan="5">: '.$table[0]["normalOperasi1"].'</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="5">: ' .$table[0]["normalOperasi2"].'</td>
					</tr>
					<tr>
						<td>Indikasi/Gejala</td>
						<td colspan="5">: ' .$table[0]["gejala1"].'</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="5">: ' .$table[0]["gejala2"].'</td>
					</tr>

					<tr>
						<td>Prioritas</td>
						<td class="center">1<br>
							<b style="font-size:30px;">'.$p1.'</b>
						</td>
						<td class="center">2<br>
							<b style="font-size:30px;">'.$p2.'</b>
						</td>
						<td class="center">3<br>
							<b style="font-size:30px;">'.$p3.'</b>
						</td>
						<td></td>
						<td>
							<div style="font-size: 8px; font-style: italic;"><b>
									*(1) = emergency - hari yang sama<br>
									*(2) = urgent - 1 s/d 2 minggu<br>
									*(3) = normal - 2 s/d 4 minggu
							</b></div>
						</td>
					</tr>
					<tr>
						<td>Akibat Kerusakan</td>
						<td colspan="5">: ' .$table[0]["akibatKerusakan1"].'</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="5">: ' .$table[0]["akibatKerusakan2"].'</td>
					</tr>
					<tr>
						<td>Kemungkinan Dampak/Resiko</td>
						<td colspan="5">: ' .$table[0]["kemungkinanDampak1"].'</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="5">: ' .$table[0]["kemungkinanDampak2"].'</td>
					</tr>
					<tr>
						<td>Tindakan Sementara</td>
						<td colspan="5">: ' .$table[0]["tindakanSementara1"].'</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="5">: ' .$table[0]["tindakanSementara2"].'</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="5">: ' .$table[0]["tindakanSementara3"].' </td>									
					</tr>
				</table>
				</div>				
			</td>
		</tr>
		
		<tr>
			<td>
				<table border="0" cellpadding="10" cellspacing="0">
					<tr>
						<td colspan="2">Jeneponto, '. date('d-m-Y',strtotime($table[0]["tanggal"])) . '</td>
					</tr>
					<tr>
						<td class="ttd">
							<div>
								<p>Supervisor Operasi Shift '.$pegawai["shift"].'</p>
								<div>'.
									$ttdAtasan
								.'</div>
								<p>' . $pegawai["namaAtasan"] . '</p>
								<hr style="width:60%; color:black; margin:1px;">
								<p>' . $pegawai["nipAtasan"] . '</p>
							</div>
						</td>
						<td class="ttd">
							<div>
								<p>Operator Shift '.$pegawai["shift"].'</p>
								<div>'.
									$ttdUser
								.'</div>
								<p>' . $pegawai["namaUser"] . ' </p>
								<hr style="width:60%; color:black; margin:1px;">
								<p>' . $pegawai["nipUser"] . '</p>
							</div>
						</td>
					</tr>
				</table>
			</td>	
		</tr>			
	</table>
	</div><br>
	<div class="evidence">
		<table border="0" cellpadding="5" cellspacing="0">
			<tr>
				<td class="center bold">'.$evidence1.'<br><br>
					<img src="imgUpload/'.$table[0]["evidence1"].'" max-height="325px"><br>
				</td>	
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td class="center bold">'.$evidence2.'<br><br>
					<img src="imgUpload/'.$table[0]["evidence2"].'" max-height="325px">
				</td>	
			</tr>
		</table>
	</div>
</body>
</html>';

$mpdf->setHeader('{PAGENO}');
$mpdf->setAutoTopMargin = 'stretch';
$mpdf->SetHTMLHeader($header);
$mpdf->shrink_tables_to_fit = 1;
$mpdf->WriteHTML($html);
$mpdf->Output($table[0]["nomorSr"].' '.$table[0]["ket"].' '.$table[0]["namaPeralatan"].' '.$table[0]["uraianGangguan1"].'.pdf', "D");

?>

