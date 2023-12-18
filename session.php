<?php
session_start();
if ($email && $role == 'Admin') {
    $_SESSION['email'] = $email;
    $_SESSION['role'] = 'Admin';
    header('Location: admin.php');
    exit;
}
?>