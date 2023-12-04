<?php
include 'conn.php';
function RandomString($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}

   
$sql = "SELECT * FROM ".$prefix."t_wisudawan WHERE kodeunik IS NULL";
$query = mysqli_query($conn, $sql);
echo $sql;
while ($row = mysqli_fetch_array($query)) {
	$id = $row['id'];
	$rand = RandomString(4);
	$duplicate = true;
    while ($duplicate) {
    	$sql1="SELECT * FROM ".$prefix."t_wisudawan WHERE kodeunik = '$rand'";
    	$query1 = mysqli_query($conn,$sql1);
    	// echo $sql1;
    	if(mysqli_num_rows($query1)==0)
    	{
    		$sql2 = "UPDATE ".$prefix."t_wisudawan SET kodeunik = '$rand' WHERE id ='$id'";
    		echo $sql2."<br>";
    		$query2 = mysqli_query($conn, $sql2);
    		$duplicate = false;
    	}
    	else
    	{
    		$rand = RandomString();
    	}
    }
}

?>