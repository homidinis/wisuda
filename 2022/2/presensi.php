<!DOCTYPE html>
<html>
<head>
	<title>Presensi Wisuda Universitas</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	function Simpan()
	{
		var nim = document.getElementById("nim");
		$.ajax({
	        url: "say_presensi.php",
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
		<form class="form" action="simpan_presensi.php" method="POST" onsubmit="Simpan()">
		<!-- <form action="simpan_presensi.php" method="POST"> -->
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" id="nim" name="nim" autofocus autocomplete="off">
				<input type="submit" name="submit" class="form-control btn btn-success" value="Simpan">
			</div>
		</form>
	</div>
	<div class="container">
		<?php
			if(isset($_GET['nim']))
			{
				include 'conn.php';
				$nim = $_GET['nim'];
				$sql= "SELECT * FROM 2022_2_t_wisudawan WHERE nim = '$nim'";
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
		<h2>Presensi 1</h2>
		<h2>
			<?php 
				include 'conn.php';
				$sql = "SELECT * FROM 2022_2_t_presensi LEFT JOIN 2022_2_t_wisudawan ON 2022_2_t_presensi.nim = 2022_2_t_wisudawan.nim ORDER BY timestamp DESC";
				$query = mysqli_query($conn, $sql);
				echo mysqli_num_rows($query);
			?>
		</h2>
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