<?php

include "conn.php";

$hour = date("H");
$kodeunik = $_POST['nim'];
$kodeunik = str_replace("'", "", $kodeunik);

$cek_nim = "SELECT nim FROM ".$prefix."t_wisudawan WHERE kodeunik = '$kodeunik'";
$query_cek_nim = mysqli_query($conn, $cek_nim);
if(mysqli_num_rows($query_cek_nim)>0)
{
	$row_cek_nim = mysqli_fetch_array($query_cek_nim);
	$nim = $row_cek_nim['nim'];
	$cek_duplicate = "SELECT * FROM ".$prefix."t_presensi WHERE nim = '$nim'";
	$sql_insert = "INSERT INTO ".$prefix."t_presensi (nim) VALUES ('$nim')";
	// echo $sql_insert;
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
else
{
	header("Location: presensi.php?p=0");	
}
?>