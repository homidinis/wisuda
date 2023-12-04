<?php
include 'conn.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$gambar = $_POST['gambar'];

var_dump($id);
var_dump($nama);
var_dump($harga);
var_dump($gambar);


// $sqlSimpan = "SELECT * FROM jualan";
$sqlUpdate = "UPDATE 0_lokerkita SET nama = '$nama', harga = '$harga', gambar = '$gambar' WHERE ID = '$id'";
echo $sqlUpdate;
mysqli_query($conn,$sqlUpdate);