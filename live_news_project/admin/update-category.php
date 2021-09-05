<?php include "header.php"; 

if (($_SESSION['role'] == 0)) {
    header("location: post.php");
}

?>


<?php

if(isset($_REQUEST['submit'])){

    include "config.php";

    $cat_id = mysqli_real_escape_string($connection,$_REQUEST['cat_id']);
    $cat_name = mysqli_real_escape_string($connection,$_REQUEST['cat_name']);


    $query4 = " UPDATE catagory SET catagory_name = '{$cat_name}' WHERE catagory_id = '{$cat_id}'";
    $result4 = mysqli_query($connection, $query4) or die("Failed.");

if($result4){
    header("location: category.php ");
}

}

?>



  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">

<?php
$catagory_id = $_REQUEST['id'];
include "config.php";

$query2 = "SELECT * FROM catagory WHERE catagory_id = '{$catagory_id}'";
$result2 = mysqli_query($connection, $query2) or die("Failed.");
$count = mysqli_num_rows($result2);

if($count > 0){

    while($row = mysqli_fetch_assoc($result2)){
?>

              <form action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['catagory_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['catagory_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>

  <?php } } ?> 
                </div>
              </div> 
            </div>
          </div>
<?php include "footer.php"; ?>
