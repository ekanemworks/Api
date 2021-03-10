<?php 
require 'connect.php';

 $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $operation = mysqli_real_escape_string($con, $request->operation);

    if ($operation == 'changepassword') {

    $currentpw = mysqli_real_escape_string($con, $request->currentpw);
    $currentpw_encrypt = md5($currentpw);


    $newpw = mysqli_real_escape_string($con, $request->newpw);
    $newpw_encrypt = md5($newpw);

    $session = mysqli_real_escape_string($con, $request->session);


    $get_password = mysqli_query($con,"SELECT * FROM members WHERE password='$currentpw_encrypt' AND id='$session'");
    $password_exist_on_user = mysqli_num_rows($get_password);

    if ($password_exist_on_user == 0) {
    	# code...
    	echo json_encode("invalid");
    }elseif ($password_exist_on_user == 1) {
    	


				    $sql = "UPDATE members  SET password = '$newpw_encrypt' WHERE id = '$session'";
				    $go=mysqli_query($con,$sql);
				    echo json_encode("success");
    }





    }elseif ($operation == 'generals') {

    $instagram = mysqli_real_escape_string($con, $request->instagram);
    $twitter = mysqli_real_escape_string($con, $request->twitter);
    $session = mysqli_real_escape_string($con, $request->session);

            $sql = "UPDATE members  SET twitter = '$twitter', instagram = '$instagram' WHERE id = '$session'";
                    $go=mysqli_query($con,$sql);
                    echo json_encode("success");


    }

 ?>