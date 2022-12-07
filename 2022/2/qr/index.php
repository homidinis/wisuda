<?php
include '../conn.php';
$nim = $_GET['nim'];
$sql = "SELECT * FROM t_wisudawan WHERE nim = '$nim'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$nim = $row['nim'];
$nama = $row['nama'];
$nomorkursi = $row['nomorkursi'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes" />
	<title></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	body{
		background-image: url(../polosan.jpeg);
	}
</style>
<body>
	<div class="container" style="text-align: center; margin-top: 50px;">
		<?php
			if(mysqli_num_rows($query)>0)
			{
		?>
				<h1>Wisuda Periode II tahun 2022</h1>
				<img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=<?php echo $nim;?>&choe=UTF-8">
				<h3><?php echo $nim;?></h3>
				<h2><?php echo $nama;?></h2>
				<h2><?php echo $nomorkursi;?></h2>
		<?php
			}
			else
			{
		?>
				<h1>Mohon Maaf, nim Anda tidak terdaftar.</h1>
		<?php
			}
		?>
	</div>
</body>
</html>