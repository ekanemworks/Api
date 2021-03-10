<?php 
require 'connect.php';

  if (isset($_GET['Category'])) {

  	$Category = ($_GET['Category']);
	$id = ($_GET['id']); //Also substitute for ID as session
	$date_added = date('d-m-y');



    $check_products = mysqli_query($con,"SELECT * FROM product WHERE ownerid='$id' ");
    $check_products_num = mysqli_num_rows($check_products);
    $product_int_number = $check_products_num + 1;

       // CHECK IF DIRECTORY 
       // CHECK IF DIRECTORY
       if (is_dir("../images/productphoto/user_$id/")) { 
       
       // CHECK IF DIRECTORY
       if (is_dir("../images/productphoto/user_$id/product_$product_int_number/")) { }
       	else{ mkdir("../images/productphoto/user_$id/product_$product_int_number/"); }

       }
       	else{ 
       		mkdir("../images/productphoto/user_$id/"); 
       		mkdir("../images/productphoto/user_$id/product_$product_int_number/"); 
       		 }

		$string = $_FILES["myfile"]["name"];
		$photo = preg_replace('#[^A-Za-z0-9]#i', '', $string);

		$target_dir = "../images/productphoto/user_$id/product_$product_int_number/";
 		$target_file = $target_dir.$photo; //Joining the path and the actual file
		 move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);

		$database_dir_link = "images/productphoto/user_$id/product_$product_int_number/";
 		$database_dir_link = $database_dir_link.$photo;
			
	    echo json_encode($database_dir_link);



  }

?>