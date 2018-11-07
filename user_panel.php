
<?php
session_start();
if(isset($_SESSION['uid']))
{
	$id = $_SESSION['uid'];
    $conn = mysqli_connect("localhost","root","","master_db");
    $query = "SELECT * from user_info WHERE id='$id'";
    $res = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($res);   
?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css\bootstrap.min.css">
<style>
table,th,td {text-align:center;padding:15px 15px 15px 15px;font-size:18px}
th {background-color:#67BCDB;color: white;}
tr:nth-child(odd){background-color:#F3FAB6}
body {background: linear-gradient(to right, #C9FFBF , #FFAFBD,#70e1f5 , #ffd194)}
</style>
</head>

<body>
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				
				<center><h1>User Panel</h1></center>
				<h1>Welcome, <?php echo $_SESSION['user_name']; ?></h1> 
				<div class="pull-right"><a href="user_logout.php" class="btn btn-warning">Logout</a></div>
			</div>
		</div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
						<table style="width:100%">
						<tr>
						<th>Id</th>
						<th>Profile Image</th>
						<th>Name</th>
						<th>Email</th>
						<th>Contact</th>
						<th>Gender</th>
						<th>Address</th>
						<th>Country</th>
						<th>Password</th>
						<th>DOB</th>
						<th>Language</th>				
						</tr>    									
						<tr>
						<td><?php echo $data['id']; ?></td>
						<td><img src="<?php echo $data['image']; ?>" alt="Profile Image"></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['contact']; ?></td>
						<td><?php echo $data['gender']; ?></td>
						<td><?php echo $data['address']; ?></td>
						<td><?php echo $data['country']; ?></td>
						<td><?php echo $data['password']; ?></td>
						<td><?php echo $data['dob']; ?></td>
						<td><?php echo $data['language']; ?></td>
						</tr>
						</table>
						</div>	
					</div>
				</div>				
	</div>
</body>
</html>
<?php
}

else
{
	$_SESSION['status'] = 'direct';
    header("location:user_login.php");
}

?>
 
