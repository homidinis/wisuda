<?php

include "conn.php";

$hour = date("H");
$nim = $_POST['nim'];
$nim = str_replace("'", "", $nim);

$cek_nim = "SELECT nim FROM 2022_2_t_wisudawan WHERE nim = '$nim'";
$query_cek_nim = mysqli_query($conn, $cek_nim);
if(mysqli_num_rows($query_cek_nim)>0)
{
	$cek_duplicate = "SELECT * FROM 2022_2_t_presensi WHERE nim = '$nim'";
	$sql_insert = "INSERT INTO 2022_2_t_presensi (nim) VALUES ('$nim')";

	$query_duplicate = mysqli_query($conn, $cek_duplicate);
	if(mysqli_num_rows($query_duplicate)==0)
	{
		mysqli_query($conn, $sql_insert);
		header("Location: presensi.php?p=1&nim=".$nim);
	}
	else
	{
		header("Location: presensi.php?p=0&nim=".$nim);

	}
}
?>