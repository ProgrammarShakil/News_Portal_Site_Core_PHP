<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News Site</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a style="color: #fff;" href="index.php" id=""><div class="logo" style="font-weight:900; font-size:20px; padding-top:10px; text-align:left;">FS BLOG</div></a>
            </div>
            <div class="col-md-8">
                
    <?php
    
    include "admin/config.php";

    if (isset($_REQUEST['cid'])) {
       $cid = $_REQUEST['cid'];
    }

    $query =  "SELECT * FROM catagory WHERE catagory_post > 0 ";

    $result = mysqli_query($connection,$query) or die("catagories query failed.");
    
    
    if(mysqli_num_rows($result)){

        $active = "";
    ?>
         <ul class='menu'>
             
           <?php 
            while($row = mysqli_fetch_assoc($result)){
             if (isset($_REQUEST['cid'])) {
                if ($row['catagory_id'] == $cid) {
                    $active = "active";
                }else{
                    $active = "";
                }
            }
            
            echo "<li><a class='$active' href='category.php?cid={$row['catagory_id']}'>{$row['catagory_name']}</a></li>";
          } ?>
        </ul>

    <?php } ?>

            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
