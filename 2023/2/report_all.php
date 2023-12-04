<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes" />
<link rel="stylesheet" href="css/my/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="css/my/bootstrap.min.js"></script>
<?php

include 'conn.php';

$sql = "SELECT * FROM ".$prefix."t_wisudawan ORDER BY sesi ASC, id ASC";

$query = mysqli_query($conn, $sql);
echo "<div class='container'>";
echo "<table class='table table-striped'>";
echo "<thead>";
echo "<tr>";
echo "<th>No</th>";
echo "<th>NIM</th>";
echo "<th>Nama</th>";
echo "<th>Sesi</th>";
echo "<th>Nomor Kursi</th>";
echo "<th>Prodi</th>";
echo "<th>Undangan 1</th>";
echo "<th>Undangan 2</th>";
echo "<th>Presensi</th>";
echo "<th>Orang Tua</th>";
echo "<th>Konsumsi</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

$i=0;
while($row = mysqli_fetch_array($query))
{
	$i++;
	echo "<tr>";
	echo "<td>".$i."</td>";
	echo "<td>".$row['nim']."</td>";
	echo "<td>".$row['nama']."</td>";
	echo "<td>".$row['sesi']."</td>";
	echo "<td>".$row['nomorkursi']."</td>";
	echo "<td>".$row['prodi']."</td>";
	echo "<td>".$row['undangan_1']."</td>";
	echo "<td>".$row['undangan_2']."</td>";
	$nim = $row['nim'];
	$sql_presensi = "SELECT * FROM ".$prefix."t_presensi WHERE nim = '$nim'";
	$query_presensi = mysqli_query($conn,$sql_presensi);
	if(mysqli_num_rows($query_presensi)>0)
		echo "<td style='background:green;'>V</td>";
	else 
		echo "<td style='background:red;'>X</td>";

	$sql_ortu = "SELECT * FROM ".$prefix."t_ortu WHERE nim = '$nim'";
	$query_ortu = mysqli_query($conn,$sql_ortu);
	if(mysqli_num_rows($query_ortu)>0)
		echo "<td style='background:green;'>V</td>";
	else 
		echo "<td style='background:red;'>X</td>";

	$sql_makan = "SELECT * FROM ".$prefix."t_makan WHERE nim = '$nim'";
	$query_makan = mysqli_query($conn,$sql_makan);
	if(mysqli_num_rows($query_makan)>0)
		echo "<td style='background:green;'>V</td>";
	else 
		echo "<td style='background:red;'>X</td>";

	echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</div>";

?>