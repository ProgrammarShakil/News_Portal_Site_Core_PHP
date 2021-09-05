
<?php 

include "config.php";

if (isset($_FILES['fileToUpload'])) {
	$errors = array();

	$file_name = $_FILES['fileToUpload']['name'];
	$file_size = $_FILES['fileToUpload']['size'];
	$file_tmp_name = $_FILES['fileToUpload']['tmp_name'];
	$file_type = $_FILES['fileToUpload']['type'];
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

	if (empty($errors) === true ) {
		move_uploaded_file($file_tmp_name, $target);
	} else {
		print_r($errors);
		die();
	}
}

session_start();

$post_title = mysqli_real_escape_string($connection,$_POST['post_title']);
$post_description = mysqli_real_escape_string($connection,$_POST['post_description']);
$post_catagory = mysqli_real_escape_string($connection,$_POST['post_catagory']);
$date = date("d M, Y");
$author = $_SESSION['user_id'];

$sql = "INSERT INTO post(post_title, post_description, post_catagory, post_date, post_author,post_image) VALUES ('{$post_title}','{$post_description}','{$post_catagory}','{$date}','{$author}','{$new_name}');";

$sql.= "UPDATE catagory SET catagory_post = catagory_post + 1 WHERE catagory_id = {$post_catagory}";

if (mysqli_multi_query($connection,$sql)) {
	header("location: post.php");
} else {
	echo "<font color='red'> Query failed <font/>";
} 


?>