<?php
session_start();
if ($email && $role == 'User') {
    $_SESSION['email'] = $email;
    $_SESSION['role'] = 'User';
    header('Location: users.php');
    exit;
}
?>