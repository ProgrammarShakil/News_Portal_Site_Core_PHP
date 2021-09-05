<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">

<?php
include "admin/config.php";
if (isset($_REQUEST['cid'])) {
$rcv_cid1 = $_REQUEST['cid'];

$query_cat = " SELECT * FROM catagory WHERE catagory_id = '{$rcv_cid1}'";
$result_cat = mysqli_query($connection,$query_cat) or die("cat query failed");
$fetch = mysqli_fetch_assoc($result_cat);

?>
     <h2 class="page-heading"><?php echo strtoupper($fetch['catagory_name'])?></h2>

<?php
include "admin/config.php";

$rcv_cid = $_REQUEST['cid'];

$limit = 3;

if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}

$offset = ($page - 1) * $limit;

$query2 = "SELECT post.post_id, post.post_title, post.post_image, post.post_description, post.post_date, post.post_catagory,post.post_author, catagory.catagory_name, user.username FROM post 
LEFT JOIN catagory ON post.post_catagory = catagory.catagory_id
LEFT JOIN user ON post.post_author = user.user_id WHERE post.post_catagory = {$rcv_cid}
ORDER BY post.post_id DESC LIMIT {$offset}, {$limit} ";

$result2 = mysqli_query($connection, $query2) or die("Failed.");
$count = mysqli_num_rows($result2);

if($count > 0){
    while($row = mysqli_fetch_assoc($result2)){
?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>"><img width="50px" src="admin/upload/<?php echo $row['post_image'] ?>"></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id'] ?>'><?php echo $row['post_title'] ?></a></h3>
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
               <p class="description"><?php echo substr($row['post_description'] ,0,420) ."..." ?> </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'] ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php } }else{
    echo "No Post Here";
}?>




<?php 

    include "admin/config.php";

        $query5 = "SELECT * FROM post WHERE post.post_catagory = {$rcv_cid}";
        $result5 = mysqli_query($connection, $query5) or die("Failed");

    if(mysqli_num_rows($result5)){
        $total_records = mysqli_num_rows($result5);
        $total_page = ceil($total_records/$limit);

      echo  "<ul class='pagination admin-pagination'>";
      if ($page > 1) {
        echo '<li><a href="category.php?cid='.$rcv_cid.'&page='.($page - 1).'">Prev</a></li>';
      }

        for ($i = 1; $i <= $total_page; $i++) { 

            if ($i== $page) {
                $active = "active";
            } else {
                $active = "";
            }
            
            echo '<li class='.$active.'><a href="category.php?cid='.$rcv_cid.'&page='.$i.'">'.$i.'</a></li>';

        }
        if ($total_page > $page) {
            echo '<li><a href="category.php?cid='.$rcv_cid.'&page='.($page + 1).'">Next</a></li>';
           }

      echo "</ul>";
} }
?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
