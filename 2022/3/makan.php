<?php 
include 'conn.php';
if(isset($_GET['nim']))
{
	$nim = $_GET['nim'];
	$sql_nama = "SELECT nama FROM ".$prefix."t_wisudawan WHERE nim = '$nim'";
	$query_nama = mysqli_query($conn, $sql_nama);
	$row_nama = mysqli_fetch_array($query_nama);
	$nama = $row_nama['nama'];
}
$sql = "SELECT * FROM ".$prefix."t_makan LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_makan.nim = ".$prefix."t_wisudawan.nim ORDER BY timestamp DESC";
$query = mysqli_query($conn, $sql);
// echo mysqli_num_rows($query);
?>		

<!DOCTYPE html>
<html>
<head>
	<title>Presensi Wisuda Universitas</title>
</head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes" />
<link rel="stylesheet" href="css/my/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="css/my/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/my/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="css/my/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
{  
    $('#table_result').dataTable();
	});
	function Simpan()
	{
		var nim = document.getElementById("nim");
		$.ajax({
	        url: "say_makan.php",
	        type: "POST",
	        data: {
				nim : nim.value
			},
	        success: function (response) {
	        	// alert(response);
	        	if(response != "")
	        	{
	        		say(response, "id-ID");
	        	}
	        	else
	        	{
					// say("Selamat Datang");
	        	}
				setTimeout(function (){

				  // window.location.reload(); 

				}, 5000);
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
	        	alert("ERROR");
	           // console.log(textStatus, errorThrown);
	        }
	    });
	}
	function say(m, lang) {
		//http://www.lingoes.net/en/translator/langcode.htm
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[1];
		msg.voiceURI = "native";
		msg.volume = 1;
		msg.rate = 1;
		msg.pitch = 1;
		msg.text = m;
		msg.lang = lang;
		speechSynthesis.speak(msg);
	}
</script>
<?php
if($_GET['p']==1)
{
	echo '<body style="background-color:green;">';
}
else if($_GET['p'] == 0)
{
	echo '<body style="background-color:red;">';
}
else
{
	echo '<body style="background-color:white;">';
}
?>
	<div class='container'>
		<form class="form" action="simpan_makan.php" method="POST" onsubmit="Simpan()">
		<!-- <form action="simpan_presensi.php" method="POST"> -->
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" id="nim" name="nim" autofocus autocomplete="off">
				<input type="submit" name="submit" class="form-control btn btn-success" value="Simpan">
			</div>
		</form>
	</div>
	<div class="container">
		<h2><?php echo $nim." - ".$nama;?></h2>
		<h2>Makan</h2>
		<h2>
			<table class='table'>
				<tr>
					<th>Sesi 1</th>
					<th>Sesi 2</th>
					<th>Sesi 3</th>
				</tr>
				<tr>
					<td>
						<?php 
							$sql_pres_1 = "SELECT * FROM ".$prefix."t_makan LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_makan.nim = ".$prefix."t_wisudawan.nim WHERE sesi = 1 ORDER BY timestamp DESC";
							$query_pres_1 = mysqli_query($conn, $sql_pres_1);
							$presensi_sesi_1 = mysqli_num_rows($query_pres_1);

							$sql_total_1 = "SELECT COUNT(id) AS total FROM ".$prefix."t_wisudawan WHERE sesi = 1";
							$query_total_1 = mysqli_query($conn, $sql_total_1);
							$row_total_1 = mysqli_fetch_array($query_total_1);
							$total_sesi_1 = $row_total_1['total'];
							$sisa_sesi_1 = $total_sesi_1 - $presensi_sesi_1;
							echo $presensi_sesi_1." / ".$total_sesi_1. "(-".$sisa_sesi_1.")";
						?>
					</td>
					<td>
						<?php 
							$sql_pres_2 = "SELECT * FROM ".$prefix."t_makan LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_makan.nim = ".$prefix."t_wisudawan.nim WHERE sesi = 2 ORDER BY timestamp DESC";
							$query_pres_2 = mysqli_query($conn, $sql_pres_2);
							$presensi_sesi_2 = mysqli_num_rows($query_pres_2);

							$sql_total_2 = "SELECT COUNT(id) AS total FROM ".$prefix."t_wisudawan WHERE sesi = 2";
							$query_total_2 = mysqli_query($conn, $sql_total_2);
							$row_total_2 = mysqli_fetch_array($query_total_2);
							$total_sesi_2 = $row_total_2['total'];
							$sisa_sesi_2 = $total_sesi_2 - $presensi_sesi_2;
							echo $presensi_sesi_2." / ".$total_sesi_2. "(-".$sisa_sesi_2.")";
						?>
					</td>
					<td>
						<?php 
							$sql_pres_3 = "SELECT * FROM ".$prefix."t_makan LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_makan.nim = ".$prefix."t_wisudawan.nim WHERE sesi = 3 ORDER BY timestamp DESC";
							$query_pres_3 = mysqli_query($conn, $sql_pres_3);
							$presensi_sesi_3 = mysqli_num_rows($query_pres_3);

							$sql_total_3 = "SELECT COUNT(id) AS total FROM ".$prefix."t_wisudawan WHERE sesi = 3 AND id != 1000";
							$query_total_3 = mysqli_query($conn, $sql_total_3);
							$row_total_3 = mysqli_fetch_array($query_total_3);
							$total_sesi_3 = $row_total_3['total'];
							$sisa_sesi_3 = $total_sesi_3 - $presensi_sesi_3;
							echo $presensi_sesi_3." / ".$total_sesi_3. "(-".$sisa_sesi_3.")";
						?>
					</td>
				</tr>
			</table>
		</h2>
		<h2>Tabel Presensi Makan</h2>
		<table class="table table-striped" id="table_result">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Nama</th>
					<th>No Kursi</th>
					<th>Sesi</th>
					<th>Kode Unik</th>
					<th>Tanggal</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					
					$i=0;
					while ($row = mysqli_fetch_array($query)) {
						$i ++;
						echo "<tr>";
						echo "<td>".$i."</td>";
						echo "<td>".$row['nim']."</td>";
						echo "<td>".$row['nama']."</td>";
						echo "<td>".$row['nomorkursi']."</td>";
						echo "<td>".$row['kodeunik']."</td>";
						echo "<td>".$row['sesi']."</td>";
						echo "<td>".date("d M Y H:i", strtotime($row['timestamp']))."</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>