<?php
include 'config.php';

$post_id = $_REQUEST['id'];    // catch post id
$cat_id = $_REQUEST['cat_id'];    // catch cat id


$query1 = "SELECT * FROM post WHERE post_id = {$post_id}";   //select
$result = mysqli_query($connection, $query1) or die("query failed");
$row = mysqli_fetch_assoc($result);   // fetch assoc
unlink("upload/" .$row['post_image']);   //unlink with directory

$query = " DELETE FROM post WHERE post_id = {$post_id};";   // delete query
$query .= " UPDATE catagory SET catagory_post = catagory_post -1 WHERE catagory_id = {$cat_id} " ;    // update query 


$result = mysqli_multi_query($connection, $query);   // multi query

if($result){
    header("location: ../admin/post.php");    // user redirect location 
}else{
    echo "Can't Delete post";
}
?>
