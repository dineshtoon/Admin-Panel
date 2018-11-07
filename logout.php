<?php
session_start();

unset($_SESSION['uid']);

$_SESSION['status'] = 'logout';
header("location:login.php");
?>