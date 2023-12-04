<?php

include 'conn.php';
$kode = $_GET['i'];
$nim = $_GET['nim'];
$undangan1= $_POST["Undangan1"];
$undangan2= $_POST["Undangan2"];

$sql="UPDATE ".$prefix."t_wisudawan SET undangan_1 = '$undangan1', undangan_2='$undangan2' WHERE kodeunik='$kode'";
echo $sql;
mysqli_multi_query($conn, $sql);
header("location:index.php?i=".$kode."#rsvp");
?>