<link rel="stylesheet" href="css/my/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="css/my/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/my/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="css/my/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{  
	    $('#table_result').dataTable();
	});
</script>
<body style='background-color:#5bc0de'>

<?php

include 'conn.php';

$sql = "SELECT 
			".$prefix."t_wisudawan.nim, 
			".$prefix."t_wisudawan.nama, 
			".$prefix."t_wisudawan.nomorkursi, 
			".$prefix."t_ortu.timestamp, 
			".$prefix."t_wisudawan.kodeunik
		FROM 
			".$prefix."t_wisudawan LEFT JOIN ".$prefix."t_ortu 
				ON ".$prefix."t_wisudawan.nim = ".$prefix."t_ortu.nim
		WHERE 
			".$prefix."t_wisudawan.sesi = 2				 
		ORDER BY 
			".$prefix."t_wisudawan.id ASC";
$query = mysqli_query($conn, $sql);
echo "<div class='container' style='margin-top:50px; background:#c80f0f; padding:10px;'>"; //warna

	echo '  <div class="row">';

	echo '    <div class="col-md-4 form-group">';
	    echo "<a href='report1.php' class='btn btn-info form-control' style='background-color:#5b7fde'>REPORT PRESENSI 1</a>";
	echo '    </div>';
	echo '    <div class="col-md-4 form-group">';
	     echo "<a href='report2.php' class='btn btn-info form-control' style='background-color:#5b7fde'>REPORT PRESENSI 2</a>";
	echo '    </div>';
	echo '    <div class="col-md-4 form-group">';
	     echo "<a href='report3.php' class='btn btn-info form-control' style='background-color:#5b7fde'>REPORT PRESENSI 3</a>";
	echo '    </div>';

	echo '  </div>';

	echo '  <div class="row">';

	echo '    <div class="col-md-4 form-group">';
	      echo "<a href='report_ortu1.php' class='btn btn-info form-control'>REPORT ORTU 1</a>";
	echo '    </div>';
	echo '    <div class="col-md-4 form-group">';
	      echo "<a href='report_ortu2.php' class='btn btn-info form-control'>REPORT ORTU 2</a>";
	echo '    </div>';
	echo '    <div class="col-md-4 form-group">';
	      echo "<a href='report_ortu3.php' class='btn btn-info form-control'>REPORT ORTU 3</a>";
	echo '    </div>';

	echo '  </div>';

	echo '  <div class="row">';

	echo '    <div class="col-md-4 form-group">';
	      echo "<a href='report_makan1.php' style='background-color:#5bdebb' class='btn btn-info form-control'>REPORT MAKAN 1</a>";
	echo '    </div>';
	echo '    <div class="col-md-4 form-group">';
	      echo "<a href='report_makan2.php' style='background-color:#5bdebb' class='btn btn-info form-control'>REPORT MAKAN 2</a>";
	echo '    </div>';
	echo '    <div class="col-md-4 form-group">';
	      echo "<a href='report_makan3.php' style='background-color:#5bdebb' class='btn btn-info form-control'>REPORT MAKAN 3</a>";
	echo '    </div>';

	echo '  </div>';

echo "<h1 style='text-align:center;color:white'>Report Presensi Wisuda III 2022 SESI 2</h1>";
	echo "<table id='table_result' class='table table-striped' style='background-color:darkred;'>"; //warna
echo "<thead style='color:white'>";
echo "<tr style='color:white'>";
echo "<th>No</th>";
echo "<th>Kode unik</th>";
echo "<th>NIM</th>";
echo "<th>Nama</th>";
echo "<th>Nomor Kursi</th>";
echo "<th>Kehadiran</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$i=0;
while ($row = mysqli_fetch_array($query)) {
	$i++;
	echo "<tr>";
	echo "<td>".$i."</td>";
	echo "<td>".$row['kodeunik']."</td>";
	echo "<td>".$row['nim']."</td>";
	echo "<td>".$row['nama']."</td>";
	echo "<td>".$row['nomorkursi']."</td>";
	if(is_null($row['timestamp']))
	{
		echo "<td style='background:red;'>Tidak Hadir</td>";
	}
	else
	{
		echo "<td style='background:green;''>Hadir</td>";
	}
	echo "</tr>";
}
echo "</tbody>";
echo "</table>";

echo "</div>";
?>
</body>