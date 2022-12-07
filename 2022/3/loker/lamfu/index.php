<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IoT Lampu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript">
		function OnOffLampu(id)
		{
			$.ajax({
				type: "POST",
				url: "onoff.php", 
				data: {
					id : id
				},
				success: function(result){
					window.location.reload();
				}
			});
		}
	</script>
	<style type="text/css">
		html, body{
			height: 100%;
		}
	</style>
</head>
<body>
	<div class="row" id="button" style="padding: 50px; height: 100%;">
		<?php
			$sql = "SELECT * FROM t_lampu";
			$query = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($query)) {
				$id = $row['id'];
				$status = $row['status'];
				$lampu = $id+1;
				if($status == 0)
				{
					?>
					<div class="col-md-12" style="text-align: center; margin-top: auto; margin-bottom: auto;">
						<button onclick="OnOffLampu(<?php echo $id;?>)" style="width:100px; height:100px; background-color: red;">Lampu <?php echo $lampu;?> OFF</button>
					</div>
					<?php
				}
				else
				{
					?>
					<div class="col-md-12" style="text-align: center; margin-top: auto; margin-bottom: auto;">
						<button onclick="OnOffLampu(<?php echo $id;?>)" style="width:100px; height:100px; background-color: green;">Lampu <?php echo $lampu;?> ON</button>
					</div>
					<?php
				}

			}
		?>
	</div>
</body>
</html>