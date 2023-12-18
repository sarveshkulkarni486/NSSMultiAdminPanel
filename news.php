<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
    header('location: login.php');
    exit;
}
include 'config.php';
$sql = "SELECT * FROM news";
$result = $conn->query($sql);
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
        
        
        </div>
        <br>
        <br>
            <div class="col py-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">email</th>
                        <th scope="col">name</th>
                        <th scope="col">headline</th>
                        <th scope="col">details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    {
                        foreach ($result as $rows) {
                    ?>
                    <tr class="sm-4">
                        <th><?php echo $rows['id']; ?></th>
                        <th><?php echo $rows['email']; ?></th>
                        <th><?php echo $rows['fullname']; ?></th>
                        <th><?php echo $rows['headlines']; ?></th>
                        <th><?php echo $rows['details']; ?></th>
                        <td>
                            <img src="<?php echo "uploads/" .$rows['images']; ?> " alt="image" width="50px">
                        </td>
                        <td><button class="btn btn-danger btn-sm"><a href="deletenews.php?idth=
                            <?php echo $rows['id'] ?>" style="text-decoration: none; color: white;">DELETE</a>
                        </button></td>
                        <td><button name="update" id="update" class="btn btn-primary btn-sm"><a href="updatenews.php?idth= 
                            <?php echo $rows['id'] ?>" style="text-decoration: none; color: white;">Update</a>
                        </button></td>
                        <td><button name="upload" id="upload" class="btn btn-success btn-sm"><a href="uploadnews.php?idth= 
                            <?php echo $rows['id'];?>" style="text-decoration: none; color: white;">Upload</a>
                        </button></td>
                    </tr>
                    <?php
                }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
