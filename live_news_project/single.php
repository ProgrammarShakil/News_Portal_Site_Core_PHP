<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">

                    <?php
include "admin/config.php";

$post_id = $_REQUEST['id'];

$query = "SELECT post.post_id, post.post_title, post.post_image, post.post_description, post.post_date, post.post_catagory ,post.post_author, catagory.catagory_name, user.username FROM post 
LEFT JOIN catagory ON post.post_catagory = catagory.catagory_id
LEFT JOIN user ON post.post_author = user.user_id WHERE post.post_id = '{$post_id}'";

$result = mysqli_query($connection, $query) or die("Failed.");
$count = mysqli_num_rows($result);

if($count > 0){
    while($row = mysqli_fetch_assoc($result)){
?>



                        <div class="post-content single-post"> 
                            <h3><?php echo $row['post_title'] ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='category.php?cid=<?php echo $row['post_catagory'] ?>'><?php echo $row['catagory_name'] ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?author_id=<?php echo $row['post_author'] ?>'><?php echo $row['username'] ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date'] ?>
                                </span>
                            </div>
                            <img width="50px" src="admin/upload/<?php echo $row['post_image'] ?>">
                            <p class="description" style="margin-top: 20px;">
                            <?php echo $row['post_description'] ?>
                            </p>
                        </div>
<?php }

}else{
    echo "No Record founded.";

}?>

                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
