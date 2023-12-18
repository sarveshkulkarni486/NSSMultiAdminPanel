<?php
if (isset($_POST['update'])) {
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'nssadmindashboard';
	$con = new mysqli($hostname, $username, $password, $dbname);
	if ($con->connect_error) {
		die('could not able tp connect to database' .$con->connect_error);
	}
	$id = $_GET['idth'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$headline = $_POST['headline'];
	$details = $_POST['details'];
	//Get the uploaded file details
	$file = $_FILES['image'];
	$fileTmpPath = $file['tmp_name'];
	$fileName = $file['name'];
	$fileType = $file['type'];
	$fileSize = $file['size'];
	//Move the uploaded file to desired location 
	$targetDir = 'uploads/';
	$targetFilePath = $targetDir. $fileName;
	move_uploaded_file($fileTmpPath, $targetFilePath);
	//update the image in database;
	$sql = "UPDATE news SET email='$email', name='$name', headline='$headline', details='$details', image='$fileName' WHERE id='$id' ";
	if (mysqli_query($con, $sql)) {
		header('Location: uploadmsg.php');
	}
	else {
		echo "Error updating image:" .mysqli_error($con);
	}
	//close the database connection
	mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="upload.css"/>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload news</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title">NEWS
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-outline mb-4">
                            <input type="email" id="emailid" name="email" class="form-control">
                            <label class="form-label" for="emailid">Email-id</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="name" name="name" class="form-control">
                            <label class="form-label" for="name">Name</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="head" name="headline" class="form-control">
                            <label class="form-label" for="head">Headline</label>
                        </div>
                        <div class="form-outline mb-4">
                            <textarea id="desc" name="details"></textarea>
                            <label class="form-label" for="desc">Details of News</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="file" id="news" name="image" class="form-control">
                            <label class="form-label" for="news">Upload Image</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>