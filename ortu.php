<!DOCTYPE html>
<html>
<head>
	<title>Presensi Wisuda Universitas</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	function Simpan()
	{
		var nim = document.getElementById("nim");
		$.ajax({
	        url: "say_ortu.php",
	        type: "POST",
	        data: {
				nim : nim.value
			},
	        success: function (response) {
	        	if(response != "")
	        	{
	        		say(response, "id-ID");
	        	}
	        	else
	        	{
					// say("Selamat Datang");
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
		<form class="form" action="simpan_ortu.php" method="POST" onsubmit="Simpan()">
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" id="nim" name="nim" autofocus autocomplete="off">
				<input type="submit" name="submit" class="form-control btn btn-success" value="Simpan">
			</div>
		</form>
	</div>
	<div class="container">
		<h2>Presensi Ortu</h2>
							<table class='table'>
			<tr>
				<th>Sesi 1</th>
				<th>Sesi 2</th>
				<th>Sesi 3</th>
			</tr>
			<tr>
				<td>
						<?php 
							include 'conn.php';
							$sql_pres_1 = "SELECT * FROM ".$prefix."t_ortu LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_ortu.nim = ".$prefix."t_wisudawan.nim WHERE sesi = 1 ORDER BY timestamp DESC";
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
							$sql_pres_2 = "SELECT * FROM ".$prefix."t_ortu LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_ortu.nim = ".$prefix."t_wisudawan.nim WHERE sesi = 2 ORDER BY timestamp DESC";
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
							$sql_pres_3 = "SELECT * FROM ".$prefix."t_ortu LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_ortu.nim = ".$prefix."t_wisudawan.nim WHERE sesi = 3 ORDER BY timestamp DESC";
							$query_pres_3 = mysqli_query($conn, $sql_pres_3);
							$presensi_sesi_3 = mysqli_num_rows($query_pres_3);

							$sql_total_3 = "SELECT COUNT(id) AS total FROM ".$prefix."t_wisudawan WHERE sesi = 3";
							$query_total_3 = mysqli_query($conn, $sql_total_3);
							$row_total_3 = mysqli_fetch_array($query_total_3);
							$total_sesi_3 = $row_total_3['total'];
							echo $presensi_sesi_3." / ".$total_sesi_3;
						?>
				</td>
			</tr>
		</table>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Nama</th>
					<th>No Kursi</th>
					<th>Tanggal</th>
				</tr>
			</thead>
			<tbody>

				<?php 
					include 'conn.php';
					$sql = "SELECT * FROM ".$prefix."t_ortu LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_ortu.nim = ".$prefix."t_wisudawan.nim ORDER BY timestamp DESC";
					$query = mysqli_query($conn, $sql);
					$i=0;
					while ($row = mysqli_fetch_array($query)) {
						$i ++;
						echo "<tr>";
						echo "<td>".$i."</td>";
						echo "<td>".$row['nim']."</td>";
						echo "<td>".$row['nama']."</td>";
						echo "<td>".$row['nomorkursi']."</td>";
						echo "<td>".date("d M Y H:i", strtotime($row['timestamp']))."</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>