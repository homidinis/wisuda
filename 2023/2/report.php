<?php
	include 'conn.php';
	if(isset($_GET['s']))
		$sesi = $_GET['s'];
	else
		$sesi = 1;

	if(isset($_GET['t']))
		$type = $_GET['t'];
	else
		$type = 1;

	if($type == 1)
	{
		$table = "t_presensi";
		$type_name = "Wisudawan";
		$body_background = "#5b7fde";
	}
	else if($type == 2)
	{
		$table = "t_ortu";
		$type_name = "Orang Tua Wisudawan";
		$body_background = "#5bc0de";
	}
	else
	{
		$table = "t_makan";
		$type_name = "Konsumsi";
		$body_background = "#5bdebb";
	}

	if($sesi == 1)
	{
		$background = "green";
		$table_background = "green";
	}
	else if($sesi == 2)
	{
		$background = "red";
		$table_background = "red";
	}
	else
	{
		$background = "orange";
		$table_background = "orange";
	}
?>

<html>
<head>
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
</script>

<body style='background:<?php echo $body_background;?>'>

<?php

echo "<div class='container' style='margin-top:10px; background:".$background."; padding:10px;'>"; //warna
	echo "<br>";
	echo '  <div class="row">';

	echo '    <div class="col-md-3 form-group">';
	    echo "<a href='report.php?s=1&t=1' class='btn btn-info form-control' style='background-color:#5b7fde; color:green;'>REPORT PRESENSI 1</a>";
	echo '    </div>';
	echo '    <div class="col-md-3 form-group">';
	     echo "<a href='report.php?s=2&t=1' class='btn btn-info form-control' style='background-color:#5b7fde; color:red;'>REPORT PRESENSI 2</a>";
	echo '    </div>';
	echo '    <div class="col-md-3 form-group">';
	     echo "<a href='report.php?s=3&t=1' class='btn btn-info form-control' style='background-color:#5b7fde; color:orange;'>REPORT PRESENSI 3</a>";
	echo '    </div>';
	echo '  </div>';

	echo '  <div class="row">';

	echo '    <div class="col-md-3 form-group">';
	      echo "<a href='report.php?s=1&t=2' class='btn btn-info form-control' style='background-color:#5bc0de'>REPORT ORTU 1</a>";
	echo '    </div>';
	echo '    <div class="col-md-3 form-group">';
	      echo "<a href='report.php?s=2&t=2' class='btn btn-info form-control' style='background-color:#5bc0de'>REPORT ORTU 2</a>";
	echo '    </div>';
	echo '    <div class="col-md-3 form-group">';
	      echo "<a href='report.php?s=3&t=2' class='btn btn-info form-control' style='background-color:#5bc0de'>REPORT ORTU 3</a>";
	echo '    </div>';

	echo '    <div class="col-md-3 form-group">';
	     echo "<a href='report_all.php' class='btn btn-info form-control' style='background-color:red; color:white;'>REPORT ALL</a>";
	echo '    </div>';

	echo '  </div>';

	echo '  <div class="row">';

	echo '    <div class="col-md-3 form-group">';
	      echo "<a href='report.php?s=1&t=3' style='background-color:#5bdebb' class='btn btn-info form-control'>REPORT MAKAN 1</a>";
	echo '    </div>';
	echo '    <div class="col-md-3 form-group">';
	      echo "<a href='report.php?s=2&t=3' style='background-color:#5bdebb' class='btn btn-info form-control'>REPORT MAKAN 2</a>";
	echo '    </div>';
	echo '    <div class="col-md-3 form-group">';
	      echo "<a href='report.php?s=3&t=3' style='background-color:#5bdebb' class='btn btn-info form-control'>REPORT MAKAN 3</a>";
	echo '    </div>';

	echo '    <div class="col-md-3 form-group">';
	     echo "<a href='admin/index.php' class='btn btn-info form-control' style='background-color:red; color:white;'>MENU</a>";
	echo '    </div>';

echo '  </div>';

?>
<?php
$sql = "SELECT 
			".$prefix."t_wisudawan.nim, 
			".$prefix."t_wisudawan.nama, 
			".$prefix."t_wisudawan.prodi, 
			".$prefix."t_wisudawan.nomorkursi, 
			".$prefix.$table.".timestamp,
			".$prefix."t_wisudawan.kodeunik
		FROM 
			".$prefix."t_wisudawan LEFT JOIN ".$prefix.$table." 
				ON ".$prefix."t_wisudawan.nim = ".$prefix.$table.".nim 
		WHERE 
			".$prefix."t_wisudawan.sesi = '$sesi'
		ORDER BY 
			".$prefix."t_wisudawan.id ASC";
$query = mysqli_query($conn, $sql);

echo "<h1 style='text-align:center;color:white'>Report Presensi ".$type_name." ".$periode_romawi." ".$tahun." SESI ".$sesi."</h1>";

$sql_jumlah_presensi = "SELECT * FROM ".$prefix.$table." LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix.$table.".nim = ".$prefix."t_wisudawan.nim WHERE sesi = '$sesi' ORDER BY timestamp DESC";
$query_jumlah_presensi = mysqli_query($conn, $sql_jumlah_presensi);
$jumlah_presensi = mysqli_num_rows($query_jumlah_presensi);

$sql_total_presensi = "SELECT COUNT(id) AS total FROM ".$prefix."t_wisudawan WHERE sesi = '$sesi'";
$query_total_presensi = mysqli_query($conn, $sql_total_presensi);
$row_total_presensi = mysqli_fetch_array($query_total_presensi);
$total_presensi = $row_total_presensi['total'];
$sisa_presensi = $total_presensi - $jumlah_presensi;
echo "<h2 style='color:white;text-align:center'>".$jumlah_presensi." / ".$total_presensi. "(-".$sisa_presensi.")</h2>";
	echo "<table id='table_result' class='table table-striped' style='background-color:".$table_background."'>"; //warna
	echo "<thead style='color:white;'>";
		echo "<tr>";
			echo "<th>No. Kursi</th>";
			echo "<th>NIM</th>";
			echo "<th>Nama</th>";
			echo "<th>Kode unik</th>";
			echo "<th>Kehadiran</th>";
			echo "<th>Prodi</th>";
		echo "</tr>";
	echo "</thead>";
		echo "<tbody>";
		$i=0;
		while ($row = mysqli_fetch_array($query)) {
			$i++;
			echo "<tr>";
			echo "<td>".$row['nomorkursi']."</td>";
			echo "<td>".$row['nim']."</td>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['kodeunik']."</td>";
			if(is_null($row['timestamp']))
			{
				echo "<td style='background:red;'>Tidak Hadir</td>";
			}
			else
			{
				echo "<td style='background:green;''>Hadir</td>";
			}
			echo "<td>".$row['prodi']."</td>";

			echo "</tr>";
		}
		echo "</tbody>";
	echo "</table>";
echo "</div>";

?>
</body>