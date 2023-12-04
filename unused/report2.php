
<html>
<head>
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
<body style='background-color:#5b7fde'>

<?php

include 'conn.php';
include 'menu.php';

$sql = "SELECT 
			".$prefix."t_wisudawan.nim, 
			".$prefix."t_wisudawan.nama, 
			".$prefix."t_wisudawan.prodi, 
			".$prefix."t_wisudawan.nomorkursi, 
			".$prefix."t_presensi.timestamp, 
			".$prefix."t_wisudawan.kodeunik
		FROM 
			".$prefix."t_wisudawan LEFT JOIN ".$prefix."t_presensi 
				ON ".$prefix."t_wisudawan.nim = ".$prefix."t_presensi.nim 
		WHERE 
			".$prefix."t_wisudawan.sesi = 2
		ORDER BY 
			".$prefix."t_wisudawan.id ASC";
$query = mysqli_query($conn, $sql);

echo "<div class='container' style='margin-top:50px; background:#c80f0f; padding:10px;'>"; //warna

	echo '  <div class="row">';

	echo '    <div class="col-md-4 form-group">';
	    echo "<a href='report1.php' class='btn btn-info form-control' style='background-color:#5b7fde'>REPORT PRESENSI SESI 1</a>";
	echo '    </div>';
	echo '    <div class="col-md-4 form-group">';
	     echo "<a href='report2.php' class='btn btn-info form-control' style='background-color:#5b7fde'>REPORT PRESENSI SESI 2</a>";
	echo '    </div>';
	echo '    <div class="col-md-4 form-group">';
	     echo "<a href='report3.php' class='btn btn-info form-control' style='background-color:#5b7fde'>REPORT PRESENSI SESI 3</a>";
	echo '    </div>';

	echo '  </div>';

	echo '  <div class="row">';

	echo '    <div class="col-md-4 form-group">';
	      echo "<a href='report_ortu1.php' class='btn btn-info form-control'>REPORT ORTU SESI 1</a>";
	echo '    </div>';
	echo '    <div class="col-md-4 form-group">';
	      echo "<a href='report_ortu2.php' class='btn btn-info form-control'>REPORT ORTU SESI 2</a>";
	echo '    </div>';
	echo '    <div class="col-md-4 form-group">';
	      echo "<a href='report_ortu3.php' class='btn btn-info form-control'>REPORT ORTU SESI 3</a>";
	echo '    </div>';

	echo '  </div>';

	echo '  <div class="row">';

	echo '    <div class="col-md-4 form-group">';
	      echo "<a href='report_makan1.php' style='background-color:#5bdebb' class='btn btn-info form-control'>REPORT MAKAN SESI 1</a>";
	echo '    </div>';
	echo '    <div class="col-md-4 form-group">';
	      echo "<a href='report_makan2.php' style='background-color:#5bdebb' class='btn btn-info form-control'>REPORT MAKAN SESI 2</a>";
	echo '    </div>';
	echo '    <div class="col-md-4 form-group">';
	      echo "<a href='report_makan3.php' style='background-color:#5bdebb' class='btn btn-info form-control'>REPORT MAKAN SESI 3</a>";
	echo '    </div>';

	echo '  </div>';

echo "<h1 style='text-align:center;color:white'>Report Presensi Wisuda III 2022 SESI 2</h1>";

$sql_pres_2 = "SELECT * FROM ".$prefix."t_presensi LEFT JOIN ".$prefix."t_wisudawan ON ".$prefix."t_presensi.nim = ".$prefix."t_wisudawan.nim WHERE sesi = 2 ORDER BY timestamp DESC";
$query_pres_2 = mysqli_query($conn, $sql_pres_2);
$presensi_sesi_2 = mysqli_num_rows($query_pres_2);

$sql_total_2 = "SELECT COUNT(id) AS total FROM ".$prefix."t_wisudawan WHERE sesi = 2";
$query_total_2 = mysqli_query($conn, $sql_total_2);
$row_total_2 = mysqli_fetch_array($query_total_2);
$total_sesi_2 = $row_total_2['total'];
$sisa_sesi_2 = $total_sesi_2 - $presensi_sesi_2;
echo "<h2 style='color:white;text-align:center'>".$presensi_sesi_2." / ".$total_sesi_2. "(-".$sisa_sesi_2.")</h2>";

	echo "<table id='table_result' class='table table-striped' style='background-color:darkred'>"; //warna
echo "<thead style='color:white;'>";
	echo "<tr>";
		echo "<th>No. Kursi</th>";
		echo "<th>NIM</th>";
		echo "<th>Nama</th>";
		echo "<th>Kehadiran</th>";
		echo "<th>Kode unik</th>";
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
		if(is_null($row['timestamp']))
		{
			echo "<td style='background:red;'>Tidak Hadir</td>";
		}
		else
		{
			echo "<td style='background:green;''>Hadir</td>";
		}
		echo "<td>".$row['kodeunik']."</td>";
		echo "<td>".$row['prodi']."</td>";

		echo "</tr>";
	}
echo "</tbody>";
echo "</table>";

echo "</div>";
?>
</body>