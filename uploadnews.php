<?php 
$sourceHost = 'localhost';
$sourceUser = 'root';
$sourcePass = '';
$sourceDB = 'nssadmindashboard';
$conn = new mysqli($sourceHost, $sourceUser, $sourcePass, $sourceDB);
if ($conn->connect_error) {
	die('could not able to connect to database'.$conn->connect_error);
}
$id = $_GET['idth'];
$sql = $conn->prepare("INSERT newsdata SELECT id, fullname, email, headlines, details, images FROM news WHERE id='$id'");
$sql->execute();
if ($sql) {
	echo "Uploaded successfully";
}
?>
