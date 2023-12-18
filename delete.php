<?php
require 'connect.php';
error_reporting(0);
$id = $_GET['id'];
$stmt = $con->prepare("DELETE FROM users WHERE id='$id'");
$stmt->execute();
if($stmt){
	echo "Deleted Successfully";
	header("Location: admin.php");
}
else {
	echo "Unable to delete data";
}
?>