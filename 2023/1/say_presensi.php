<?php

include "conn.php";

$hour = date("H");
$nim = $_POST['nim'];
$nim = str_replace("'", "", $nim);

$sql_select_nama = "SELECT * FROM ".$prefix."t_wisudawan WHERE nim = '$nim'";
$query_select_nama = mysqli_query($conn, $sql_select_nama);

while ($row_select_nama = mysqli_fetch_array($query_select_nama)) {
	$nama = $row_select_nama['nama'];
	$nomorkursi = $row_select_nama['nomorkursi'];
}

$cek_duplicate = "SELECT * FROM ".$prefix."t_presensi WHERE nim = '$nim'";

$query_duplicate = mysqli_query($conn, $cek_duplicate);

if(mysqli_num_rows($query_duplicate)==0)
{ 
	echo "Selamat datang di wisuda universitas  ".$nama;
} 
else
{
	echo "Terima kasih ".$nama;
}

?>