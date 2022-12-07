<?php

include 'conn.php';
$nim = $_GET['nim'];
$undangan1= $_POST["Undangan1"];
$undangan2= $_POST["Undangan2"];

$sql="UPDATE 2022_2_t_wisudawan SET undangan_1='$undangan1', undangan_2='$undangan2' WHERE nim='$nim'";
echo $sql;
mysqli_multi_query($conn, $sql);

header("location:index.php?nim=".$nim."#rsvp");
?>