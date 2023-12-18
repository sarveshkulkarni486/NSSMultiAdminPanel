<?php 
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'user') {
    header('location: login.php');
    exit;
}
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'nssadmindashboard';
$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
	die('could not able to connect to database'.$conn->connect_error);
}
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $headline = $_POST['headline'];
    $details = $_POST['details'];

    $targetDir = 'uploads/';
    $image = basename($_FILES['image']['name']);
    $targetFilePath = $targetDir.$image;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'jpeg', 'png', 'pdf');
    if(in_array(strtolower($fileType), $allowTypes)){
        if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)){
            $sql = 'INSERT INTO news(email, fullname, headlines, details, images) VALUES(?,?,?,?,?)';
            $stmt = $conn->prepare($sql);
            if($stmt === false){
                echo('Error preparing the statement: ' . $conn->error);
            }
            $stmt->bind_param('sssss', $email, $fullname, $headline, $details, $image);
            if($stmt->execute()){
                echo 'Inserted successfully';
            } else {
                echo 'An error occurred while executing the statement: ' .$stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error uploading file";
        }
    } else {
        echo 'Invalid file type. Allowed types are jpg, jpeg, png, pdf';
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Upload news</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Activities</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Contents
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="upload.php">Upload News</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <style>
            .container {
                margin-top: 4rem;
                margin-right: 0rem;
                width: 80%;
                height: 80%;
                margin-bottom: 0rem;
            }
            textarea {
                width: 100%;
                height: 10%;
                border-radius: 12px;
            }
            .form-control {
                border-radius: 12px;
            }
        </style>
            <div class="container" id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4 card">
                    <div class="card-body">
                        <div class="card-title">NEWS</div>
                        <br />
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="emailid">Email-id</label>
                                <input type="email" id="emailid" name="email" class="form-control">
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" id="name" name="fullname" class="form-control">
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="head">Headline</label>
                                <input type="text" id="head" name="headline" class="form-control">
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="desc">Details of News</label>
                                <textarea id="desc" name="details"></textarea>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="file" id="news" name="image" class="form-control">
                                <label class="form-label" for="news">Upload Image</label>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        </div>
</body>
</html>