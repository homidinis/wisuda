<?php
include "conn.php";

$sql = "SELECT * FROM ".$prefix."t_wisudawan AS wisudawan LEFT JOIN ".$prefix."t_sesi AS sesi ON wisudawan.sesi = sesi.id";
$query = mysqli_query($conn,$sql);

echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>No HP</th>";
echo "<th>Nama</th>";
echo "<th>Nomor Kursi</th>";
echo "<th>Kode Unik</th>";
echo "<th>Sesi</th>";
echo "<th>Tanggal dan jam TM</th>";
echo "<th>Tanggal dan jam gladi</th>";
echo "<th>Tanggal dan jam wisuda</th>";
echo "<th>Tanggal dan jam Hadir</th>";
echo "<th>Link Zoom TM</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_array($query)) {
	echo "<tr>";
	echo "<td>".$row['nohp']."</td>";
	echo "<td>".$row['nama']."</td>";
	echo "<td>".$row['nomorkursi']."</td>";
	echo "<td>".$row['kodeunik']."</td>";
	echo "<td>".$row['sesi']."</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td>".$row['display']."</td>";
	echo "<td>".$row['jam_hadir']."</td>";
	echo "<td></td>";
	echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>