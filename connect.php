<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'nss';
$con = new mysqli($hostname, $username, $password, $dbname);
if ($con->connect_error) {
	die('could not able to connect to database' .$con->connect_error);
}
?>s