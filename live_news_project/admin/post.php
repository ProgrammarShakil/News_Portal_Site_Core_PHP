<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">

<?php
include "config.php";

$limit = 6;

if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}

$offset = ($page - 1) * $limit;


if ($_SESSION['role'] == 1) {
  
  $query2 = "SELECT post.post_id, post.post_title, post.post_image, post.post_description, post.post_date, post.post_catagory, catagory.catagory_name, user.username FROM post 
LEFT JOIN catagory ON post.post_catagory = catagory.catagory_id
LEFT JOIN user ON post.post_author = user.user_id
ORDER BY post.post_id DESC LIMIT {$offset}, {$limit} ";

}elseif($_SESSION['role'] == 0) {
  
  $query2 = "SELECT post.post_id, post.post_title, post.post_image, post.post_description, post.post_date, post.post_catagory, catagory.catagory_name, user.username FROM post 
LEFT JOIN catagory ON post.post_catagory = catagory.catagory_id
LEFT JOIN user ON post.post_author = user.user_id
WHERE post.post_author = {$_SESSION['user_id']}
ORDER BY post.post_id DESC LIMIT {$offset}, {$limit} ";
}




$result2 = mysqli_query($connection, $query2) or die("Failed.");
$count = mysqli_num_rows($result2);

if($count > 0){

?>


                  <table class="content-table">
                      <thead>
                          <th>SL.No.</th>
                          <th>Title</th>
                          <th>Image</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>

         <?php
         $serial = 1;
         while($row = mysqli_fetch_assoc($result2)){
         ?>

                          <tr>
                              <td class='id'><?php echo  $serial++ ?></td>
                              <td><?php echo $row['post_title'] ?></td>
                              <td><img width="50px" src="upload/<?php echo $row['post_image'] ?>"></td>
                              <td><?php echo $row['catagory_name'] ?></td>
                              <td><?php echo $row['post_date'] ?></td>
                              <td><?php echo $row['username'] ?></td>

  <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id'] ?>'><i class='fa fa-edit'></i></a></td>
<td class='delete'><a onclick='return confirm("Do You Want To Delete ?");' href='delete-post.php?id=<?php echo $row['post_id'] ?>&cat_id=<?php echo $row['post_catagory'] ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>

  <?php }     ?>

                      </tbody>

<?php 
  
}else{
    echo " Blank Database, Please Insert Data. ";
     } 
?>                  </table> 

<?php 

    include "config.php";

        $query5 = "SELECT * FROM post";
        $result5 = mysqli_query($connection, $query5) or die("Failed");

    if(mysqli_num_rows($result5)){
        $total_records = mysqli_num_rows($result5);
        $total_page = ceil($total_records/$limit);

      echo  "<ul class='pagination admin-pagination'>";
      if ($page > 1) {
        echo '<li><a href="post.php?page='.($page - 1).'">Prev</a></li>';
      }

        for ($i = 1; $i <= $total_page; $i++) { 

            if ($i== $page) {
                $active = "active";
            } else {
                $active = "";
            }
            
            echo '<li class='.$active.'><a href="post.php?page='.$i.'">'.$i.'</a></li>';

        }
        if ($total_page > $page) {
            echo '<li><a href="post.php?page='.($page + 1).'">Next</a></li>';
           }

      echo "</ul>";
}
?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
