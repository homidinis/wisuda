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


<?php

include 'conn.php';

$sql = "SELECT 
			2022_2_t_wisudawan.nim, 
			2022_2_t_wisudawan.nama, 
			2022_2_t_wisudawan.nomorkursi, 
			2022_2_t_ortu.timestamp 
		FROM 
			2022_2_t_wisudawan LEFT JOIN 2022_2_t_ortu 
				ON 2022_2_t_wisudawan.nim = 2022_2_t_ortu.nim 
		ORDER BY 
			2022_2_t_wisudawan.id ASC";
$query = mysqli_query($conn, $sql);
echo "<div class='container' style='margin-top:50px;'>";
echo "<h1>Report Presensi Ortu Wisuda II 2022</h1>";

echo "<a href='report_ortu.php' class='btn btn-info'>Report Ortu</a>";
echo "<a href='report_makan.php' class='btn btn-info'>Report Makan</a>";
echo "<a href='report.php' class='btn btn-info'>Report Presensi</a>";

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
	// if(is_null($row['timestamp']))
	// 	echo "<tr style='background:red;'>";
	// else
	// 	echo "<tr style='background:green;'>";
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