<?php
// file ini digunakan untuk mengambil data ke arduino, file ini akan mereturn status dari masing-masing pintu loker yang
// nantinya dapat digunakan untuk memberi instruksi ke setiap relay apakah harus membuka atau menutup.

$server = "localhost";
$user = "wisuser";
$password = "wispwd";
$db = "wisudapresensi";

define("DEFAULT_TANGGAL", "2000-01-01 00:00:00");

$conn = mysqli_connect($server, $user, $password, $db);

$id = $_GET['id'];

$sql = "SELECT * FROM 0_loker";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($query))
{
	$status = $status.$row['status'];
}
echo $status;
?>