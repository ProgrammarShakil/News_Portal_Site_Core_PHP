<?php  
include "config.php"; 

if (empty($_FILES['new-image']['name'])) {
    $new_name = $_POST['old_image'];
}else{
    $errors = array();

	$file_name = $_FILES['new-image']['name'];
	$file_size = $_FILES['new-image']['size'];
	$file_tmp_name = $_FILES['new-image']['tmp_name'];
	$file_type = $_FILES['new-image']['type'];
	$file_ext = end(explode('.', $file_name));


	$extentions = array("jpeg","png","jpg");

	if (in_array($file_ext, $extentions) === false ){
		$errors[] = " This Extentions File Not Allowed, Choose jpg,png or jpeg format.";
	}

	if ($file_size > 2097152) {
		$errors[] = " File Must Be 2 MB or Lower.";
	}
	$new_name = time(). "-".basename($file_name);
	$target = "upload/".$new_name;

	if (empty($errors) == true ) {
		move_uploaded_file($file_tmp_name, $target);
	} else {
		print_r($errors);
		die();
	}
}

$query = " UPDATE post SET  post_title = '{$_POST["post_title"]}' ,
                            post_description = '{$_POST["post_description"]}',
                            post_catagory = '{$_POST["post_catagory"]}',
                            post_image = '{$new_name}' WHERE post_id = {$_POST["post_id"]};";
	if($_POST['old_catagory'] != $_POST['post_catagory']){

		$query .= " UPDATE catagory SET post = post - 1 WHERE catagory_id = {$_POST['old_catagory']};";

		$query .= " UPDATE catagory SET post = post + 1 WHERE catagory_id = {$_POST['post_catagory']};";

	}

$result = mysqli_multi_query($connection, $query);

if ($result) {
	header("location: ../admin/post.php");
}else{
	echo "Query Failed.";
}










?>