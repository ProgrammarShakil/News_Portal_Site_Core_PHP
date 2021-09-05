<?php include "header.php";

if (($_SESSION['role'] == 0)) {
    header("location: post.php");
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">


<?php 
if(isset($_REQUEST['save'])){

    include "config.php";

    $catagory_name = mysqli_real_escape_string($connection,$_REQUEST['catagory_name']);

    $query = "SELECT catagory_name FROM catagory WHERE catagory_name = '{$catagory_name}' ";
    $result = mysqli_query($connection, $query) or die ('Query Failed.');
    $count = mysqli_num_rows($result);

    if($count > 0){
        echo " Catagory already exists";
    }else{
        $query1 = "INSERT INTO catagory (catagory_name) VALUES ('$catagory_name')";

        $result1 = mysqli_query($connection, $query1) or die ('Query Failed.');

        if($result1){
            header("location: category.php");
        }
   }
}
?>



                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="catagory_name" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
