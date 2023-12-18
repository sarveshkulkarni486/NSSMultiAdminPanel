<?php
require('config.php');
$error='';
session_start();
if(isset($_POST['login'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql = "SELECT role FROM admin WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$role = $row['role'];
	if($role=='Admin'){
		$email = $_SESSION['email'];
		$role = $_SESSION['role'];
		header('Location: admin.php');
	}
	elseif ($role=='User') {
		$email1 = $_SESSION['email'];
		$role = $_SESSION['role'];
		header('Location: users.php');
	}
	else {
		header('Location: login.php');
	}
}
else {
  // Generate a new token to prevent CSRF attacks
  $_SESSION['token'] = bin2hex(random_bytes(32));
 }
?>