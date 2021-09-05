<?php include "header.php"; 
if (($_SESSION['role'] == 0)) {
    header("location: post.php");
}
?>

<?php

if(isset($_REQUEST['submit'])){

    include "config.php";
    $user_id = mysqli_real_escape_string($connection,$_REQUEST['user_id']);
    $fname = mysqli_real_escape_string($connection,$_REQUEST['f_name']);
    $lname = mysqli_real_escape_string($connection,$_REQUEST['l_name']);
    $user = mysqli_real_escape_string($connection,$_REQUEST['username']);
    $role = mysqli_real_escape_string($connection,$_REQUEST['role']);


    $query4 = " UPDATE user SET first_name = '{$fname}', last_name = '{$lname}', username = '{$user}', role = '{$role}' WHERE user_id = '{$user_id}' ";
    $result4 = mysqli_query($connection, $query4) or die("Failed.");

if($result4){
    header("location: users.php ");
}

}

?>


  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
<?php
$user_id = $_REQUEST['id'];
include "config.php";

$query2 = "SELECT * FROM user WHERE user_id = '$user_id'";
$result2 = mysqli_query($connection, $query2) or die("Failed.");
$count = mysqli_num_rows($result2);

if($count > 0){

    while($row = mysqli_fetch_assoc($result2)){


?>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo  $row['user_id'];?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo  $row['first_name'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo  $row['last_name'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo  $row['username'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">

                          <?php 
                                  if($row['role'] == 1){
                                      echo '<option value="1" selected>Admin</option>';
                                      echo '<option value="0">Moderator</option>';
                                  }else{
                                      echo '<option value="1">Admin</option>';
                                      echo '<option value="0" selected>Moderator</option>';
                                  }
                            ?>

                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->

                  <?php
                   } 
                }
                  
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
