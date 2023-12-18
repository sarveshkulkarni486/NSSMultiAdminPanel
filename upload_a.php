<?php 
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'nssadmindashboard';
$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
	die('could not able to connect to database'.$conn->connect_error);
}
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$name = $_POST['name'];
	$headline = $_POST['headline'];
	$details = $_POST['details'];
	$targetDir = 'uploads/';
	$filename = basename($_FILES['image']['name']);
	$targetFilePath = $targetDir.$filename;
	$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
	$allowType = array('jpg', 'png', 'jpeg', 'pdf');
	if (in_array($fileType, $allowType)) {
		if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)){
			$stmt = $conn->prepare('INSERT INTO news(email, name, headline, details, image) VALUES(?,?,?,?,?)');
			$stmt->bind_param('sssss', $email, $name, $headline, $details, $filename);
			$stmt->execute();
			if ($stmt) {
				echo "Inserted successfully";
			}
			else {
				echo "an error occured";
			}
		}
	}
}
?>
