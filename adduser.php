<?php 
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'Admin') {
    header('location: login.php');
    exit;
}
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'nssadmindashboard';
$connection = new mysqli($hostname, $username, $password, $dbname);
if ($connection->connect_error) {
	die('could not able to connect to database' .$connection->connect_error);
}
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	$sql = $connection->prepare("INSERT INTO admin('email', 'password', 'role') VALUES(?,?,?)");
	$sql->bind_param("sss", $email, $password, $role);
	$sql->execute($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="addusers.css"/>
	<title>Add Users</title>
</head>
<body>
	<div class="container-fluid ps-md-0">
		<div class="row g-0">
			<div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
			<div class="col-md-8 col-lg-6">
				<div class="login d-flex align-items-center py-5">
					<div class="container">
						<div class="row">
							<div class="col-md-9 col-lg-8 mx-auto">
								<h5>Welcome</h5>
								<form>
									<div class="form-floating mb-3">
										<input type="email" name="email" class="form-control" placeholder="Email" id="email">
										<label for="email">Email</label>
									</div>
									<div class="form-floating mb-3">
										<input type="password" name="password" class="form-control" placeholder="Password" id="password">
										<label for="password">Password</label>
									</div>
									
									<div class="form-floating mb-3">
										<select name="role" class="form-select" aria-label="Default select example">
											<option value="Admin">Admin</option>
											<option selected value="User">Users</option>
										</select>
									</div>
									<div class="d-grid">
										<button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit" name="submit">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>