<?php
include 'config.php';

$recv_dlt_catagory = $_REQUEST['id'];

$query = "DELETE FROM catagory WHERE catagory_id = '{$recv_dlt_catagory}' ";

$result = mysqli_query($connection, $query);

if($result){
    header("location: category.php");
}else{
    echo "Can't Delete catagory";
}

?>
