<?php
session_start();
$conn = mysqli_connect("localhost","root","","master_db");
$id=$_GET['id'];
echo $id;
$query="delete from user_info where id=$id";
if(isset($_SESSION['admin_uid']))
{

if(mysqli_query($conn,$query))
{
	$_SESSION['delete'] = 'deleted';
	header("location:admin_panel.php");
}

else{
	
	echo "fail";
}
}
else
{
  $_SESSION['status'] = 'direct';
  header("location:admin_login.php");
}
?>
