<!DOCTYPE html>
<html>
<head>
	<title>Presensi Gladi Wisuda Universitas</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes" />
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	function Simpan()
	{
		var nim = document.getElementById("nim");
		$.ajax({
	        url: "say_gladi.php",
	        type: "POST",
	        data: {
				nim : nim.value
			},
	        success: function (response) {
	        	if(response != "")
	        	{
	        		say(response, "id-ID");
	        	}
				setTimeout(function (){
				}, 5000);
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
	        	alert("ERROR");
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
		<h1>Presensi Wisudawan</h1>
		<form class="form" action="simpan_gladi.php" method="POST" onsubmit="Simpan()">
		<!-- <form action="simpan_presensi.php" method="POST"> -->
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" id="nim" name="nim" autofocus autocomplete="off">
				<input type="submit" name="submit" class="form-control btn btn-success" value="Simpan">
			</div>
		</form>
		<button class="form-control" onclick="location.href='/admin/index.php';">Kembali ke Menu</button>
	</div>
	<div class="container">
		<?php
			if(isset($_GET['nim']))
			{
				include 'conn.php';
				$nim = $_GET['nim'];
				$sql= "SELECT * FROM ".$prefix."t_wisudawan WHERE nim = '$nim'";
				$query = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($query);
				$nim = $row['nim'];
				$nama = $row['nama'];
				$nomorkursi = $row['nomorkursi'];
				echo "<h1>".$nim." - ".$nama." - ".$nomorkursi."</h1>";
			}
		?>
	</div>

	<div class="container">
		<table class='table'>
			<tr>
				<th>Sesi 1</th>
				<th>Sesi 2</th>
				<th>Sesi 3</th>
				<th>Sesi 4</th>
			</tr>
			<tr>
				<td>
						<?php 
							include 'conn.php';
							$sql_pres_1 = "SELECT * FROM ".$prefix."t_gladi LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_gladi.nim = ".$prefix."t_wisudawan.nim WHERE sesi = 1 ORDER BY timestamp DESC";
							$query_pres_1 = mysqli_query($conn, $sql_pres_1);
							$presensi_sesi_1 = mysqli_num_rows($query_pres_1);

							$sql_total_1 = "SELECT COUNT(id) AS total FROM ".$prefix."t_wisudawan WHERE sesi = 1";
							$query_total_1 = mysqli_query($conn, $sql_total_1);
							$row_total_1 = mysqli_fetch_array($query_total_1);
							$total_sesi_1 = $row_total_1['total'];
							echo $presensi_sesi_1." / ".$total_sesi_1;
						?>
				</td>
				<td>
						<?php 
							include 'conn.php';
							$sql_pres_2 = "SELECT * FROM ".$prefix."t_gladi LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_gladi.nim = ".$prefix."t_wisudawan.nim WHERE sesi = 2 ORDER BY timestamp DESC";
							$query_pres_2 = mysqli_query($conn, $sql_pres_2);
							$presensi_sesi_2 = mysqli_num_rows($query_pres_2);

							$sql_total_2 = "SELECT COUNT(id) AS total FROM ".$prefix."t_wisudawan WHERE sesi = 2";
							$query_total_2 = mysqli_query($conn, $sql_total_2);
							$row_total_2 = mysqli_fetch_array($query_total_2);
							$total_sesi_2 = $row_total_2['total'];
							echo $presensi_sesi_2." / ".$total_sesi_2;
						?>
				</td>
				<td>
						<?php 
							include 'conn.php';
							$sql_pres_3 = "SELECT * FROM ".$prefix."t_gladi LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_gladi.nim = ".$prefix."t_wisudawan.nim WHERE sesi = 3 ORDER BY timestamp DESC";
							$query_pres_3 = mysqli_query($conn, $sql_pres_3);
							$presensi_sesi_3 = mysqli_num_rows($query_pres_3);

							$sql_total_3 = "SELECT COUNT(id) AS total FROM ".$prefix."t_wisudawan WHERE sesi = 3";
							$query_total_3 = mysqli_query($conn, $sql_total_3);
							$row_total_3 = mysqli_fetch_array($query_total_3);
							$total_sesi_3 = $row_total_3['total'];
							echo $presensi_sesi_3." / ".$total_sesi_3;
						?>
				</td>
				<td>
						<?php 
							include 'conn.php';
							$sql_pres_4 = "SELECT * FROM ".$prefix."t_gladi LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_gladi.nim = ".$prefix."t_wisudawan.nim WHERE sesi = 4 ORDER BY timestamp DESC";
							$query_pres_4 = mysqli_query($conn, $sql_pres_4);
							$presensi_sesi_4 = mysqli_num_rows($query_pres_4);

							$sql_total_4 = "SELECT COUNT(id) AS total FROM ".$prefix."t_wisudawan WHERE sesi = 4";
							$query_total_4 = mysqli_query($conn, $sql_total_4);
							$row_total_4 = mysqli_fetch_array($query_total_4);
							$total_sesi_4 = $row_total_4['total'];
							echo $presensi_sesi_4." / ".$total_sesi_4;
						?>
				</td>
			</tr>
		</table>
		<?php
			$sql = "SELECT * FROM ".$prefix."t_gladi LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_gladi.nim = ".$prefix."t_wisudawan.nim ORDER BY timestamp DESC";
			$query = mysqli_query($conn, $sql); 
		?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Nama</th>
					<th>No Kursi</th>
					<th>Sesi</th>
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