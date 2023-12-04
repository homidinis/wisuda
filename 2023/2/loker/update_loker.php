<?php

// file ini digunakan untuk mencoba mengupdate salah satu pintu loker


$server = "localhost";
$user = "wisuser";
$password = "wispwd";
$db = "wisudapresensi";

define("DEFAULT_TANGGAL", "2000-01-01 00:00:00");

$conn = mysqli_connect($server, $user, $password, $db);

$id = $_GET['id'];

$sql = "UPDATE 0_loker SET status = 1 WHERE id = $id";
$sql2 = "UPDATE 0_trigger SET status = 1";

// echo $sql;

$query = mysqli_query($conn, $sql);
$query2 = mysqli_query($conn, $sql2);

?>