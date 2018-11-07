<?php
session_start();

unset($_SESSION['admin_uid']);
//unset($_SESSION['admin_name']);
$_SESSION['status'] = 'logout';
header("location:admin_login.php");
?>