
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body>
<?php

include 'conn.php';

$sql = "SELECT * FROM ".$prefix."t_wisudawan AS wisudawan LEFT JOIN ".$prefix."t_presensi AS presensi ON wisudawan.nim = presensi.nim WHERE sesi = 1";
$query = mysqli_query($conn, $sql);

$arrayHadir = array();
array_push($arrayHadir,'');
while($row=mysqli_fetch_array($query))
{
	if($row['timestamp'] != "")
    	array_push($arrayHadir,$row['nomorkursi']); 
}


?>
<div class="row">
	<div class="col-md-4" style="margin: 10px;">
		<a href="denah1.php" class="btn btn-info form-control">SESI 1</a>
	</div>
	<div class="col-md-4" style="margin: 10px;">
		<a href="denah2.php" class="btn btn-info form-control">SESI 2</a>
	</div>
	<div class="col-md-4" style="margin: 10px;"	>
		<a href="denah3.php" class="btn btn-info form-control">SESI 3</a>
	</div>
    <div class="col-md-4" style="margin: 10px;" >
        <a href="/admin/index.php" class="btn btn-info form-control">Menu</a>
    </div>
</div>
<div style="width:100% ;overflow:auto">
    <table style="text-align:center;padding:2px;margin:2px; border-spacing:5px 8px;background-color:#0B930B;border-collapse:separate;border:1px 500158 solid">
    <?php
        $i = 0;
        echo "<th colspan='17' style='background-color:#0B930B;text-align:center;padding:5px'>SENATOR</th>";
        $sql = "SELECT * FROM ".$prefix."t_kursi";
        $query = mysqli_query($conn,$sql);
        $arrayKursi = array();
        array_push($arrayKursi,'');
        while($row=mysqli_fetch_array($query))
        {
            array_push($arrayKursi,$row['kursi']); 
        }

        for($baris=1;$baris<17;$baris++)
        {
            echo "<tr>";
            for($kolom = 1; $kolom<=17; $kolom++)
            {

                if ($kolom % 9==0)
                    echo"<td style='background-color:#eac155;text-align:center;border-color:#eac155'></td>"; 
                else
                { 
                    $i++;
                    if(!in_array($arrayKursi[$i], $arrayHadir))
                    // if($nomorkursi==$arrayKursi[$i])
                        echo"<td class='blink' style='border:1px solid black; padding:5px;background-color:#800000;text-align:center;width:70px !important;color:black'><span>".$arrayKursi[$i]."</span></td>"; //pull arraykursi yg di push, index ke i
                    else
                        echo"<td style='border:none;color:black;border: 0px solid black;padding:5px; background-color:white;text-align:center;width:70px !important;'>".$arrayKursi[$i]."</td>";
                }
            }
            echo "</tr>";
            
        }
    ?>
    </table>
</div> 



</body>
</html>