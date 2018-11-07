<?php
session_start();
if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
    $conn = mysqli_connect("localhost","root","","master_db");
    $query = "select * from user_info where email='$email' and password='$password'";
    $res = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($res);
    if ($data['email'] == $email && $data['password'] == $password) {
        $_SESSION['uid'] = $data['id'];
        $_SESSION['user_name'] = $data['name'];
         header("location:user_panel.php");
    } else {
        $_SESSION['status'] = 'loginerror';
        //header("location:admin_login.php");
    }
    
}

?>

<!DOCTYPE html>

<html>
<head>
<title>Welcome Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css\bootstrap.min.css">
</head>


<body>
	<div class="container">

		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<?php
                if (isset($_SESSION['status']) && $_SESSION['status'] == 'direct') {
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                    	<h1>Error</h1>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>You have to first login.</strong>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>

                <?php
                if (isset($_SESSION['status']) && $_SESSION['status'] == 'loginerror') {
                    ?>
                    <div class="alert alert-danger fade in">
                    	<h1>Error</h1>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Username or password is invalid.</strong>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>



                <?php
                if (isset($_SESSION['status']) && $_SESSION['status'] == 'logout') {
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                        <h1>Logout Successful</h1>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $_SESSION['user_name'] ?>, you have been logged out successfully.</strong>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>	

				<center><h1>User Login</h1></center>
				
				<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="username">Email:</label>
					<input type="text" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary">Login</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</div>
			</form>
				    				
			</div>
			</div>
			<div class="col-md-3"></div>
		</div>
		
	</div>

</body>
</html>
<?php 
?>