<?php 
require 'connect.php';

  if (isset($_GET['Category'])) {
	
	$Category = ($_GET['Category']);
	$username = ($_GET['username']); //Also substitute for ID as session




	if ($Category == 'basicsetup') {
// START OF BASIC CHANGE PHOTO ON SETUP
// START OF BASIC CHANGE PHOTO ON SETUP
// START OF BASIC CHANGE PHOTO ON SETUP





       // CHECK IF DIRECTORY EXIST WITH A DATE
       // CHECK IF DIRECTORY EXIST WITH A DATE
       if (is_dir("../images/profilephoto/user_$username/")) { }
       	else{ mkdir("../images/profilephoto/user_$username/"); }

		$string = $_FILES["myfile"]["name"];
		$photo = preg_replace('#[^A-Za-z0-9]#i', '', $string);

		$target_dir = "../images/profilephoto/user_$username/";
 		$target_file = $target_dir.$photo; //Joining the path and the actual file
		 move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);

		$database_dir_link = "images/profilephoto/user_$username/";
 		$database_dir_link = $database_dir_link.$photo;
			
	    echo json_encode($database_dir_link);









// END OF BASIC CHANGE PHOTO ON SETUP
// END OF BASIC CHANGE PHOTO ON SETUP
// END OF BASIC CHANGE PHOTO ON SETUP
	}
	elseif ($Category == 'businesssetup') 
	{
// START OF BASIC CHANGE PHOTO ON SETUP
// START OF BASIC CHANGE PHOTO ON SETUP
// START OF BASIC CHANGE PHOTO ON SETUP



					// IMPORTANT
					// IMPORTANT
					// IMPORTANT
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID


       // CHECK IF DIRECTORY EXIST WITH A DATE
       // CHECK IF DIRECTORY EXIST WITH A DATE
       if (is_dir("../images/profilephoto/user_$username/")) { }
       	else{ mkdir("../images/profilephoto/user_$username/"); }

		$string = $_FILES["myfile"]["name"];
		$photo = preg_replace('#[^A-Za-z0-9]#i', '', $string);

		$target_dir = "../images/profilephoto/user_$username/";
 		$target_file = $target_dir.$photo; //Joining the path and the actual file
		 move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);

		$database_dir_link = "images/profilephoto/user_$username/";
 		$database_dir_link = $database_dir_link.$photo;

			

	    $sql = "UPDATE members SET profilephoto = '$database_dir_link' WHERE id = '$username'";
	    $go=mysqli_query($con,$sql);
	    
	    echo json_encode($database_dir_link);





// END OF BASIC CHANGE PHOTO ON SETUP
// END OF BASIC CHANGE PHOTO ON SETUP
// END OF BASIC CHANGE PHOTO ON SETUP
	}
	elseif ($Category == 'editprofile') 
	{


		//  $sql_get_image_link = mysqli_query($con,"SELECT profilephoto FROM members WHERE id='$username'");
		// $sql_get_image_link_fetch = mysqli_fetch_assoc($sql_get_image_link);
		// $sql_get_image_link_profilephoto = $sql_get_image_link_fetch['profilephoto'];

		





					// IMPORTANT
					// IMPORTANT
					// IMPORTANT
					// IMPORTANT
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID
		// HERE USERNAME IS THE VARIABLE NAME BUT THE CONTENT IS THE ID



			
       if (is_dir("../images/profilephoto/user_$username/")) {
         # code...
       }else{
       mkdir("../images/profilephoto/user_$username/"); 
       }


		$string = $_FILES["myfile"]["name"];
		$photo = preg_replace('#[^A-Za-z0-9]#i', '', $string);

		$target_dir = "../images/profilephoto/user_$username/";
 		$target_file = $target_dir.$photo; //Joining the path and the actual file
		 move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);

		$database_dir_link = "images/profilephoto/user_$username/";
 		$database_dir_link = $database_dir_link.$photo;
			





	    $sql = "UPDATE members SET profilephoto = '$database_dir_link' WHERE id = '$username'";
	    $go=mysqli_query($con,$sql);

	    echo json_encode($database_dir_link);





	}



	


   }


 ?>