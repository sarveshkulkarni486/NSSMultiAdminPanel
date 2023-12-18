<?php
require 'connect.php';
$id = $_GET['idth'];
$sql = $con->prepare("INSERT paid SELECT id, firstname, lastname, email, aadharcardno FROM users WHERE id='$id'");
$sql->execute();
if ($sql) {
	header('location: viewpaid.php');
}
else {
	echo "<script>alert('unable to insert data into database something went wrong');</script>";
}
?>


