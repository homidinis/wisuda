<?php

include 'conn.php';

$id = $_POST['id'];

$sql_get = "SELECT * FROM t_lampu WHERE id = '$id'";
$query_get = mysqli_query($conn, $sql_get);
$row_get = mysqli_fetch_array($query_get);
$status = $row_get['status'];

if($status == 1)
	$sql_update = "UPDATE t_lampu SET status = 0 WHERE id ='$id'";
else
	$sql_update = "UPDATE t_lampu SET status = 1 WHERE id ='$id'";

$query_update = mysqli_query($conn, $sql_update);
?>