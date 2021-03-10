<?php 
require 'connect.php';

 $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $usernameOrEmail = mysqli_real_escape_string($con, $request->usernameOrEmail);
    $password = mysqli_real_escape_string($con, $request->password);
    $password_encrypt = md5($password);


    // CHECK VERIFICATION USING USERNAME
    // CHECK VERIFICATION USING USERNAME
    $sql_query_username = mysqli_query($con,"SELECT * FROM members WHERE (username='$usernameOrEmail' AND password='$password_encrypt') OR (email='$usernameOrEmail' AND password='$password_encrypt') ");
    $sql_query_username_num = mysqli_num_rows($sql_query_username);




    if (($sql_query_username_num==1)) {

    	    $fetch_user_info = mysqli_fetch_assoc($sql_query_username);
  
            // USING AN OBJECT TO SEND INFORMATION TO COMPONENT
    $member['id']             = $fetch_user_info['id'];
    $member['fullname']       = $fetch_user_info['fullname'];
    $member['username']       = $fetch_user_info['username'];
    $member['email']          = $fetch_user_info['email'];
    $member['phoneno']        = $fetch_user_info['phoneno'];
    $member['accounttype']    = $fetch_user_info['accounttype'];
    $member['totalbalance']   = $fetch_user_info['totalbalance'];
    $member['withdrawable']   = $fetch_user_info['withdrawable'];
    $member['country']        = $fetch_user_info['country'];
    $member['city']           = $fetch_user_info['city'];
    $member['profilephoto']   = $fetch_user_info['profilephoto'];
    $member['dateregistered'] = $fetch_user_info['dateregistered'];
    $member['instagram']      = $fetch_user_info['instagram'];
    $member['twitter']        = $fetch_user_info['twitter'];
    $member['bio']            = $fetch_user_info['bio'];
    $member['userstatus']     = $fetch_user_info['userstatus'];
    $member['onlinestatus']   = $fetch_user_info['onlinestatus'];
    $member['notification']   = $fetch_user_info['notification'];
    $member['productnumber']   = $fetch_user_info['productnumber'];
    $member['tongues']        = $fetch_user_info['tongues'];
    $member['stars']          = $fetch_user_info['stars'];
    		echo json_encode($member);




    }else{
        echo json_encode("invalid");
    }




 ?>