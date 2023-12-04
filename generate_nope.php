<?php
include "conn.php";
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$sql = "SELECT * FROM generate_hp";
$query = mysqli_query($conn, $sql);
$i = 0;
while($row = mysqli_fetch_array($query)){
	$i++;
	$no_telp = clean($row['hp']);
	$no_telp62 = substr_replace($no_telp, "62", 0,1);
	$nim = $row['nim'];

	echo "BEGIN:VCARD<br>";
	echo "VERSION:3.0<br>";
	echo "N:".$row['nama'].";Sesi ".$row['sesi']." - ".$nim." -;;;<br>";
	echo "FN:Sesi ".$row['sesi']." - ".$nim." - ".$row['nama']."<br>";
	echo "item1.TEL;waid=".$no_telp62.":+".substr($no_telp62, 0,2)." ".substr($no_telp62, 2,3)."-".substr($no_telp62, 5,3)."-".substr($no_telp62, 8,10)."<br>";
	echo "item1.X-ABLabel:Mobile<br>";
	echo "END:VCARD<br><br>";
}
?>