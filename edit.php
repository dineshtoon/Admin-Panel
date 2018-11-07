<?php
session_start();

$conn = mysqli_connect("localhost","root","","master_db");
$id=$_GET['id'];
$query="select * from user_info where id='$id'";
$res=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($res);
$lang = explode(',',$data['language']);

//Update Query

if(isset($_POST['submit']))
{
    //variables 
    $img_old = $data['image'];
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
    if(empty($_FILES['image']['name']))
    {
        $query = "UPDATE user_info SET id='$id',name='$name',email='$email',contact='$contact',gender='$gender',country='$country',image='$img_old',address='$address',password='$password',dob='$dob',language='$language' WHERE id='$id'";
    }

    else
    {
      $query = "UPDATE user_info SET id='$id',name='$name',email='$email',contact='$contact',gender='$gender',country='$country',image='$image',address='$address',password='$password',dob='$dob',language='$language' WHERE id='$id'";
      move_uploaded_file($_FILES['image']['tmp_name'],$image);
    }
    
    //$conn = mysqli_connect("localhost","root","","master_db");
   
    if(mysqli_query($conn,$query))
    {
      $_SESSION['edit'] = 'edited';
      header("location:admin_panel.php");
    }
    else
      echo mysqli_error();
    
}

//


if(isset($_SESSION['admin_uid']))
{
  
?>

<!DOCTYPE html>

<html>
<head>
<title>Welcome Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css\bootstrap.min.css">
</head>

<body>
  <div class="container">

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h1>Edit Record</h1>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="name" class="form-control" value="<?php echo $data['name'];?>">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" class="form-control" value="<?php echo $data['email'];?>">
        </div>
        <div class="form-group">
          <label for="contact">Contact No:</label>
          <input type="tel" name="contact" class="form-control" value="<?php echo $data['contact'];?>">
        </div>
        <div class="form-group">
          <label for="Gender">Gender:</label>
          <div class="form-check-inline">
              <label class="form-check-label" for="male">
                <input type="radio" class="form-check-input" name="gender" value="Male" <?php if($data['gender'] == "Male") {?> checked <?php }?>> Male
              </label> &nbsp &nbsp &nbsp
              <label class="form-check-label" for="female">
                <input type="radio" class="form-check-input" name="gender" value="Female" <?php if($data['gender'] == "Female") {?> checked <?php }?>>Female
              </label>
            </div>
        </div>
          <div class="form-group">
          <label for="Country">Select Country:</label>
          <select class="form-control" name="country">            
            <option 
            <?php if ($data['country'] == 'India') { ?>selected="true" <?php }; ?>>India</option>
            <option <?php if ($data['country'] == 'USA') { ?>selected="true" <?php }; ?>>USA</option>
            <option <?php if ($data['country'] == 'Japan') { ?>selected="true" <?php }; ?>>Japan</option>
            <option <?php if ($data['country'] == 'China') { ?>selected="true" <?php }; ?>>China</option>
            <option <?php if ($data['country'] == 'Pakistan') { ?>selected="true" <?php }; ?>>Pakistan</option>
            <option <?php if ($data['country'] == 'Nepal') { ?>selected="true" <?php }; ?>>Nepal</option>
          </select>
        </div>
        <div class="form-group">
          <label for="adress">Address:</label>
          <input type="text" name="address" class="form-control" value="<?php echo $data['address'];?>">
        </div>
        <div class="form-group">
          <label for="image">Profile Image:</label>
          <input type="file" name="image" class="form-control" value="<?php echo $data['image'];?>"> 
          <?php if($data['image'] != "images/"){?><img height="50px" width="50px" src="<?php echo $data['image'];?>"><?php }?>
          
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" name="password" class="form-control" value="<?php echo $data['password'];?>">
        </div>
        <div class="form-group">
          <label for="dob">DOB:</label>
          <input type="date" name="dob" class="form-control" value="<?php echo $data['dob'];?>">
        </div>
        <div class="form-group">
          <label for="language">Languages:</label>
          <label>English <input type="checkbox" name="language[]" value="english"  <?php if(in_array('english',$lang)) {echo "checked='checked'";} ?>  ></label>
          <label>Hindi <input type="checkbox" name="language[]" value="hindi" <?php if(in_array('hindi',$lang)) {echo "checked='checked'";} ?>  ></label>
          <label>Marwari <input type="checkbox" name="language[]" value="marwari" <?php if(in_array('marwari',$lang)) {echo "checked='checked'";} ?>  ></label>
          <label>Gujrati <input type="checkbox" name="language[]" value="gujrati" <?php if(in_array('gujrati',$lang)) {echo "checked='checked'";} ?>  ></label>
          <label>Bengali <input type="checkbox" name="language[]" value="bengali" <?php if(in_array('bengli',$lang)) {echo "checked='checked'";} ?>  ></label>
          <label>Marathi <input type="checkbox" name="language[]" value="marathi" <?php if(in_array('marathi',$lang)) {echo "checked='checked'";} ?>  ></label>
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
<?php }
else
{
  $_SESSION['status'] = 'direct';
  header("location:admin_login.php");
}
?>