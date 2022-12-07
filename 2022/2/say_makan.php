<?php

include "conn.php";

$hour = date("H");
$nim = $_POST['nim'];

$sql_select_nama = "SELECT * FROM 2022_2_t_wisudawan WHERE nim = '$nim'";
$query_select_nama = mysqli_query($conn, $sql_select_nama);

while ($row_select_nama = mysqli_fetch_array($query_select_nama)) {
	$nama = $row_select_nama['nama'];
	$nomorkursi = $row_select_nama['nomorkursi'];
}

$cek_duplicate = "SELECT * FROM 2022_2_t_makan WHERE nim = '$nim'";
$query_duplicate = mysqli_query($conn, $cek_duplicate);

if(mysqli_num_rows($query_duplicate)==0)
{ 
	echo "Terima kasih  ".$nama;
} 
else
{
	echo "Terima kasih ".$nama;
}

?>