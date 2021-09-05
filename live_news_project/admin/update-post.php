<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">


<?php 

include "config.php";

$post_id = $_REQUEST['id'];

$query2 = " SELECT post.post_id, post.post_title, post.post_description, post.post_image,
 catagory.catagory_name, post.post_catagory FROM post 
    LEFT JOIN catagory ON post.post_catagory = catagory.catagory_id
    LEFT JOIN user ON post.post_author = user.user_id
    WHERE post.post_id = '{$post_id}'";



$result2 = mysqli_query($connection, $query2) or die("Failed.");
$count = mysqli_num_rows($result2);

if($count > 0){

    while($row = mysqli_fetch_assoc($result2)){
?>
        <!-- Form for show edit-->
        <form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id'] ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['post_title'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="post_description" class="form-control"  required rows="5"><?php echo $row['post_description'] ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Catagory</label>
                <select class="form-control" name="post_catagory">
                <option disabled selected> Select Category</option>

<?php 

include "config.php";

$query1 = "SELECT * FROM catagory";
$result1 = mysqli_query($connection,$query1) or die('query failed');
$count = mysqli_num_rows($result1);

if($count > 0){
  while ($row1 = mysqli_fetch_assoc($result1)) {

    if($row['post_catagory'] == $row1['catagory_id']){
        echo $selected = "selected";
    }else{
        echo $selected = "";
    }

    echo "<option {$selected} value='{$row1['catagory_id']}'>{$row1['catagory_name']}</option>";
  }

}

 ?>
                </select> 
           <input type="hidden" name="old_catagory" value="<?php echo $row['post_catagory'] ?>">
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $row['post_image'] ?>" height="150px">
              <input type="hidden" name="old_image" value="<?php echo $row['post_image'] ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->

    <?php

     } 

} else{
    echo "result not found.";

    } ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
