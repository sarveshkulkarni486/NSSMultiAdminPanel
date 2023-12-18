<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<title>LogOut</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-lg-4">
				<div class="card">
					<div class="card-header">
						Log Out
					</div>
					<div class="card-body">
						<img src="logout.jpg" class="img-fluid" style="max-width: 300px; justify-content: center; align-items: center;">
						<h5 class="card-title">SUCCESSFULLY LOGGED OUT</h5>
						<p class="card-text">you have logged out for log in again. click below button</p>
					</div>
					<a href="login.php">
					<button class="btn btn-primary">LOG-IN</button></a>
				</div>
			</div>
		</div>
	</div>
	<style type="text/css">
		.container {
			position: absolute;
			left: 35%;
			top: 20%;
			filter: blur(5px);
		}
		.container:hover {
			filter: blur(0px);
		}
	</style>
</body>
</html>
