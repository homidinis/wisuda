
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


<body style='background:#5b7fde'>
<?php
include 'conn.php';
include 'menu.php';
if(isset($_GET['s']))
	$sesi = $_GET['s'];
else
	$sesi = 1;

if($sesi == 1)
{
	$background = "green";
	$table_background = "darkgreen";
}
else if($sesi == 2)
{
	$background = "pink";
	$table_background = "red";
}
else
{
	$background = "yellow";
	$table_background = "orange";
}


$sql = "SELECT 
			".$prefix."t_wisudawan.nim, 
			".$prefix."t_wisudawan.nama, 
			".$prefix."t_wisudawan.nomorkursi, 
			".$prefix."t_ortu.timestamp 
		FROM 
			".$prefix."t_wisudawan LEFT JOIN ".$prefix."t_ortu 
				ON ".$prefix."t_wisudawan.nim = ".$prefix."t_ortu.nim 
		WHERE 
			".$prefix."t_wisudawan.sesi = '$sesi'
		ORDER BY 
			".$prefix."t_wisudawan.id ASC";
$query = mysqli_query($conn, $sql);
echo "<div class='container' style='margin-top:50px;'>";
// echo "<h1>Report Presensi Ortu Wisuda II 2022</h1>";
echo "<h1 style='text-align:center;color:white'>Report Presensi Orang Tua Wisudawan ".$periode_romawi." ".$tahun." SESI ".$sesi."</h1>";

// echo "<a href='report_ortu.php' class='btn btn-info'>Report Ortu</a>";
// echo "<a href='report_makan.php' class='btn btn-info'>Report Makan</a>";
// echo "<a href='report.php' class='btn btn-info'>Report Presensi</a>";

echo "<table id='table_result' class='table table-striped' style='background:white'>";
echo "<thead>";
echo "<tr>";
echo "<th>No</th>";
echo "<th>NIM</th>";
echo "<th>Nama</th>";
echo "<th>Nomor Kursi</th>";
echo "<th>Kehadiran</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$i=0;
while ($row = mysqli_fetch_array($query)) {
	$i++;
	echo "<tr>";
	echo "<td>".$i."</td>";
	echo "<td>".$row['nim']."</td>";
	echo "<td>".$row['nama']."</td>";
	echo "<td>".$row['nomorkursi']."</td>";
	if(is_null($row['timestamp']))
	{
		echo "<td style='background:red;'>Tidak Hadir</td>";
	}
	else
	{
		echo "<td style='background:green;''>Hadir</td>";
	}
	echo "</tr>";
}
echo "</tbody>";
echo "</table>";

echo "</div>";
?>