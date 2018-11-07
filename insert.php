<?php
session_start();
if(isset($_SESSION['admin_uid']))
{
if(isset($_POST['submit']))
{
    $img_dir = 'images/';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $image = $img_dir.$_FILES['image']['name'];;
    $address = $_POST['address'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $language =  implode(',', $_POST['language']);


    //

    move_uploaded_file($_FILES['image']['tmp_name'],$image);
    $conn = mysqli_connect("localhost","root","","master_db");
    $query = "INSERT INTO user_info values(NULL,'$name','$email','$contact','$gender','$country','$address','$image','$password','$dob','$language')";
    if(mysqli_query($conn,$query)){
    	$_SESSION['insert'] = 'inserted';
    	header("location:admin_panel.php");
    }
    else
    	echo mysqli_error();
    
}

?>


<!DOCTYPE html>

<html>
<head>
<title>Welcome Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css\bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="parsley.js"></script>
</head>

<body>
	<div class="container">

		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<h1>Add New Record</h1>
				<form action="" method="post" enctype="multipart/form-data" id="myForm" data-validate="parsley">
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" name="name" class="form-control" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" name="email" class="form-control" required data-parsley-type="email" data-parsley-trigger="keyup">
				</div>
				<div class="form-group">
					<label for="contact">Contact No:</label>
					<input type="tel" name="contact" class="form-control" required data-parsley-pattern="^\d{10}$">
				</div>
				<div class="form-group">
					<label for="Gender">Gender:</label>
					<div class="form-check-inline">
				      <p>
   						 M: <input type="radio" name="gender" id="genderM" value="M" required="">
   						 F: <input type="radio" name="gender" id="genderF" value="F">
  					  </p>
				    </div>
				</div>
			    <div class="form-group">
				  <label for="Country">Select Country:</label>
				  <select class="form-control" name="country">
				    <option>India</option>
				    <option>USA</option>
				    <option>Japan</option>
				    <option>China</option>
				    <option>Pakistan</option>
				    <option>Nepal</option>
				  </select>
				</div>
				<div class="form-group">
					<label for="adress">Address:</label>
					<input type="text" name="address" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="image">Profile Image:</label>
					<input type="file" name="image" class="form-control" accept=".jpg, .jpeg, .png" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" id="password1" placeholder="Password" class="form-control" required data-parsley-length="[3, 8]" data-parsley-trigger="keyup">
				</div>
				<div class="form-group">
					<label for="password">Confirm Password:</label>
					<input type="password" name="password" placeholder="Confirm Passowrd" class="form-control" data-parsley-equalto="#password1" data-parsley-trigger="keyup" required>
				</div>
				<div class="form-group">
					<label for="dob">DOB:</label>
					<input type="date" name="dob" class="form-control" required="" max="<?php echo date('m-d-Y');?>" >
				</div>
				<div class="form-group">
					<label for="language">Languages:</label>
					<p>
					English <input type="checkbox" name="language[]" value="english" required="">
					Hindi <input type="checkbox" name="language[]" value="hindi">
					Marwari <input type="checkbox" name="language[]" value="marwari">
					Gujrati <input type="checkbox" name="language[]" value="gujrati" >
					Bengali <input type="checkbox" name="language[]" value="bengali">
					Marathi <input type="checkbox" name="language[]" value="marathi" data-parsley-mincheck="1">
				</p>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> -->
<script>
$(document).ready(function(){  
    $('#myForm').parsley();
});
</script>
<?php
}
else
{
  $_SESSION['status'] = 'direct';
  header("location:admin_login.php");
}
?>