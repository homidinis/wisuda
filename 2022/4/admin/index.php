<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<style type="text/css">
	.vertical-center {
		display: flex;
		align-items: center;
		text-align: center;
	}
</style>
<body>
<div class="container" style="margin-top: 200px;">
	<div class="row">
		<div class="col-md-4">
			<button class="btn btn-info form-control" style="height: 100px;" onclick="location.href='../presensi.php';">Presensi Wisudawan</button>
		</div>

		<div class="col-md-4">	
			<button class="btn btn-info form-control" style="height: 100px;" onclick="location.href='../ortu.php';">Presensi Ortu</button>
		</div>

		<div class="col-md-4">
			<button class="btn btn-info form-control" style="height: 100px;" onclick="location.href='../makan.php';">Presensi Konsumsi</button>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-6">
			<button class="btn btn-info form-control" style="height: 100px;" onclick="location.href='../denah.php';">Denah</button>
		</div>

		<div class="col-md-6">
			<button class="btn btn-info form-control" style="height: 100px;" onclick="location.href='../report.php';">Report</button>
		</div>
	</div>
</div>
</body>
</html>