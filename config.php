<?php 
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'nssadmindashboard';
$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
	die('Could not able to connect to database' .$conn->connect_error);
}
?>