<?php

include 'conn.php';

$idx = $_POST['idx'];
$nilai = $_POST['nilai'];
$klmpk = $_POST['klmpk'];
$pos = $_POST['pos']; //pos berdasarkan username atau postname?

$sql = "SELECT * FROM t_main WHERE pos='$pos' AND id_kelompok = '$klmpk'"; //bisa cek duplicate tapi tidak bisa update, kalau bisa diupdate ga bisa cek duplicate
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query)==0)
{
	$sqlAll = "SELECT * FROM t_main WHERE pos = '$pos' AND idx = '$idx'";
	$queryAll = mysqli_query($conn, $sqlAll);
	if(mysqli_num_rows($queryAll)>0){
		$sql = "UPDATE t_main SET nilai = '$nilai', id_kelompok = '$klmpk' WHERE pos = '$pos' AND idx = '$idx'"; 
		echo "Berhasil Update";
	}
	else
	{
		$sql = "INSERT t_main (nilai,pos,id_kelompok,idx) VALUES ('$nilai','$pos','$klmpk', '$idx')";
		echo "Berhasil Insert";
	}
	$query = mysqli_query($conn, $sql);
}
else
{
	// copas dari baris 14-19
	$sqlAll = "SELECT * FROM t_main WHERE pos = '$pos' AND id_kelompok = '$klmpk' AND idx = '$idx'";
	$queryAll = mysqli_query($conn, $sqlAll);
	if(mysqli_num_rows($queryAll)>0){
		$sql = "UPDATE t_main SET nilai = '$nilai', id_kelompok = '$klmpk' WHERE pos = '$pos' AND idx = '$idx'";
		$query = mysqli_query($conn, $sql);
		echo "Berhasil Update";
	}
	else
	{
		echo "Duplikasi Kelompok";
	}
}



// if( isset($_POST['nilai']) ){ //isset = check if value is set within this file
// 	$sql = "UPDATE t_main SET nilai = '$nilai' WHERE pos = '$pos' AND id_kelompok='$id'"; //sudah bisa update
// 	$query = mysqli_query($conn, $sql);
	
// 	if ($query){	
// 	echo "Berhasil Update";
// 	}else{
// 		echo "Gagal Update";
// 	}
// }
?>

