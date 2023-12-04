<?php

include 'conn.php';

$id = $_POST['id'];
$nilai = $_POST['nilai'];
$pos = $_POST['pos']; //pos berdasarkan username atau postname?


$sqlAll = "SELECT * FROM t_main WHERE pos = '$pos' AND id_kelompok='$id'";
$queryAll = mysqli_query($conn, $sqlAll);
if(mysqli_num_rows($queryAll)>0){
	$sql = "UPDATE t_main SET nilai = '$nilai' WHERE pos = '$pos' AND id_kelompok='$id'"; //sudah bisa update
}else{
	$sql = "INSERT t_main (nilai,pos,id_kelompok) VALUES ('$nilai','$pos','$id')";
}

$query = mysqli_query($conn, $sql);

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

