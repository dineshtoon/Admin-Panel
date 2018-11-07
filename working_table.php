 <?php 
 session_start(); 
 $connect = mysqli_connect("localhost", "root", "", "master_db");  
 $query ="SELECT * FROM user_info ORDER BY id DESC";  
 $result = mysqli_query($connect, $query); 
 if (isset($_SESSION['admin_uid'])) { 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3>  
                <br />  
                <div class="row">
      <div class="col-md-12">

        <center><h1>Admin Panel</h1></center>
        <?php
                if (isset($_SESSION['insert']) && $_SESSION['insert'] == 'inserted') {
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                      <h1>Inserted</h1>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>One record added successfully.</strong>
                    </div>
                    <?php
                    unset($_SESSION['insert']);
                }
                ?>

                <?php
                if (isset($_SESSION['edit']) && $_SESSION['edit'] == 'edited') {
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                      <h1>Edited</h1>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>One record edited successfully.</strong>
                    </div>
                    <?php
                    unset($_SESSION['edit']);
                }
                ?>

                <?php
                if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'deleted') {
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                      <h1>Deleted</h1>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>One record deleted successfully.</strong>
                    </div>
                    <?php
                    unset($_SESSION['delete']);
                }
                ?>
        <h1>Welcome, <?php echo $_SESSION['admin_name']; ?></h1>
        <div class="pull-right"><a href="insert.php" class="btn btn-primary">Add New Record</a>
        <a href="admin_logout.php" class="btn btn-warning">Logout</a></div><br \>
      </div>
    </div>
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Name</td>  
                                    <td>Address</td>  
                                    <td>Gender</td>  
                                    <td>Designation</td>  
                                    <td>Age</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["name"].'</td>  
                                    <td>'.$row["address"].'</td>  
                                    <td>'.$row["gender"].'</td>  
                                    <td>'.$row["email"].'</td>  
                                    <td>'.$row["contact"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
  <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
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