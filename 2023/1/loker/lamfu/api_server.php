<?php

include 'conn.php';

$id = $_GET['id'];

$sql = "SELECT * FROM t_lampu";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($query))
{
	$status = $status . $row['status'];
}
echo $status;
?>