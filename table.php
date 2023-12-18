<?php
include 'connect.php';
$sql = "SELECT * FROM users";
$result = $con->query($sql);
session_start();
?>
<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
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
                                    <a class="nav-link" href="layout-static.html">See Uploaded News</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">
                                        See Paid Students
                                    </a>
                                    <a class="nav-link" href="#">See All Students
                                    </a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <br>
        <br>
            <div class="col py-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">firstname</th>
                        <th scope="col">middlename</th>
                        <th scope="col">lastname</th> 
                        <th scope="col">email</th>
                        <th scope="col">Date of birth</th>
                        <th scope="col">place</th>
                        <th scope="col">gender</th>
                        <th scope="col">mothername</th>
                        <th scope="col">caste</th>
                        <th scope="col">pincode</th>
                        <th scope="col">height</th>
                        <th scope="col">weight</th>
                        <th scope="col">participated</th>
                        <th scope="col">bloodgroup</th>
                        <th scope="col">spectacles</th>
                        <th scope="col">minority</th>
                        <th scope="col">vaccinated</th>
                        <th scope="col">aadharcardno</th>
                        <th scope="col">electioncardno</th>
                        <th scope="col">languages</th>
                        <th scope="col">activity</th>
                        <th scope="col">skills</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($rows=mysqli_fetch_assoc($result)) 
                    {
                    ?>
                    <tr>
                        <th><?php echo $rows['id']; ?></th>
                        <td><?php echo $rows['firstname']; ?></td>
                        <td><?php echo $rows['middlename']; ?></td>
                        <td><?php echo $rows['lastname']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['dateofbirth']; ?></td>
                        <td><?php echo $rows['place']; ?></td>
                        <td><?php echo $rows['gender']; ?></td>
                        <td><?php echo $rows['mothername']; ?></td>
                        <td><?php echo $rows['caste']; ?></td>
                        <td><?php echo $rows['pincode']; ?></td>
                        <td><?php echo $rows['height']; ?></td>
                        <td><?php echo $rows['weight']; ?></td>
                        <td><?php echo $rows['participated']; ?></td>
                        <td><?php echo $rows['bloodgroup']; ?></td>
                        <td><?php echo $rows['spectacles']; ?></td>
                        <td><?php echo $rows['minority']; ?></td>
                        <td><?php echo $rows['vaccinated']; ?></td>
                        <td><?php echo $rows['aadharcardno']; ?></td>
                        <td><?php echo $rows['electioncardno']; ?></td>
                        <td><?php echo $rows['languages']; ?></td>
                        <td><?php echo $rows['Activity']; ?></td>
                        <td><?php echo $rows['skills']; ?></td>
                        <td><button class="btn btn-danger btn-sm"><a href="delete.php?idth=
                            <?php echo $rows['id'] ?>" style="text-decoration: none; color: white;">DELETE</a>
                        </button></td>
                        <td><button class="btn btn-primary btn-sm"><a href="paid.php?idth=
                            <?php echo $rows['id'] ?>" style="text-decoration: none; color: white;">PAID</a>
                        </button></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
