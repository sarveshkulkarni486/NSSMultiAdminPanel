<?php
require 'config.php';
error_reporting(0);
$id = $_GET['idth'];
$stmt = $conn->prepare("DELETE FROM news WHERE id='$id'");
$stmt->execute();
exit;
if ($conn->stmt) {
	$targetDir = 'uploads/';
	$filePath = $targetDir . $filename;
	if (unlink($filePath)) {
		echo "Image deleted successfully";
	}
	else {
		echo "Error deteleting image file";
	}
}

?>