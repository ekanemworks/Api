<?php 
require 'connect.php';

 $postdata = file_get_contents("php://input");


    $request = json_decode($postdata);
    $accounttype = mysqli_real_escape_string($con, $request->accounttype);




   	//CONDITION CHECK : ACCOUNT TYPE
    //CONDITION CHECK : ACCOUNT TYPE
    if ($accounttype == 'basic') {



    $email = mysqli_real_escape_string($con, $request->email);
    // getting the userID for session
    $check_email = mysqli_query($con,"SELECT email FROM members WHERE email='$email' ");
    $check_email_num = mysqli_num_rows($check_email);





    // Check if EMAIL Exist
    // Check if EMAIL Exist
    // Check if EMAIL Exist
    if ($check_email_num==0) {





     $username = mysqli_real_escape_string($con, $request->username);
     $city = mysqli_real_escape_string($con, $request->city);
     $email = mysqli_real_escape_string($con, $request->email);
     $phone = mysqli_real_escape_string($con, $request->phone);
     $profilephoto = mysqli_real_escape_string($con, $request->profilephoto);
     $password = mysqli_real_escape_string($con, $request->password);
     $password_encrypt = md5($password);
     $dateregistered=date('d-m-y');


       // TO INSERT NEW MEMBER
       // TO INSERT NEW MEMBER
    $sql = "INSERT INTO members  VALUES (NULL,
                                        '',
                                        '',
                                        '$username',
                                        '$email',
                                        '$phone',
                                        '$password_encrypt',
                                        '$accounttype',
                                        '0',
                                        '0',
                                        'Nigeria',
                                        '$city',
                                        '$profilephoto',
                                        '$dateregistered',
                                        '',
                                        '',
                                        'My Bio... Hi there, I use Baybn',
                                        'newuser',
                                        '1',
                                        '0',
                                        '',
                                        '',
                                        '0',
                                        '0',
                                        '0',
                                        '0',
                                        '0')";
    $go=mysqli_query($con,$sql);






    // SEND AN EMAIL
    $subject = 'Welcome to Baybn';
    $message = 'Hi, your profile has being created on Baybn and you`re ready to go. ';
    $headers = 'From: noreply@baybn.com';
    mail($email,$subject,$message,$headers);



    // getting the userID for session
    $get_userid = mysqli_query($con,"SELECT * FROM members WHERE username='$username' AND password='$password_encrypt'");
    $fetch_user_info = mysqli_fetch_assoc($get_userid);

    // SENDING VARIABLE TO COMPONENT FOR SESSION CREATION
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

    $id_real              = $member['id'];
    $id_ext              = 'user_'.$id_real;

    $username_ext        = $member['username'];
    $username_ext        = 'user_'.$username_ext;

    $profilephoto_ext    = $member['profilephoto'];

            if ($profilephoto_ext == '') {
                
            }
            else{

                $pattern = '/'.$username_ext.'/i';
                $new = preg_replace($pattern, $id_ext, $profilephoto_ext);

                rename("../images/profilephoto/$username_ext/", "../images/profilephoto/$id_ext/");
                $sql = "UPDATE members SET profilephoto = '$new' WHERE id = '$id_real'";
                $go=mysqli_query($con,$sql);

                $member['profilephoto']   = $new;

            }




    echo json_encode($member);
    







    	// End of check username exist
    }else{ 
    	echo json_encode("bad"); 
    }



















    }
    elseif ($accounttype == 'restaurant') 
    {
    	// RESTAURANT USER SIGNUP
    	// RESTAURANT USER SIGNUP
    	// RESTAURANT USER SIGNUP
    	// RESTAURANT USER SIGNUP
    	// RESTAURANT USER SIGNUP
    $email = mysqli_real_escape_string($con, $request->email);
    // getting the userID for session
    $check_email = mysqli_query($con,"SELECT email FROM members WHERE email='$email' ");
    $check_email_num = mysqli_num_rows($check_email);


    if ($check_email_num == 0) {


     $city = mysqli_real_escape_string($con, $request->city);
     $businessname = mysqli_real_escape_string($con, $request->businessname);
     $email = mysqli_real_escape_string($con, $request->email);
     $password = mysqli_real_escape_string($con, $request->password);
	 $password_encrypt = md5($password);
	 $dateregistered=date('d-m-y');

     // TO INSERT DETAILS
     // TO INSERT DETAILS
    $sql = "INSERT INTO members  VALUES (NULL,
                                        '',
                                        '$businessname',
                                        '',
                                        '$email',
                                        '',
                                        '$password_encrypt',
                                        '$accounttype',
                                        '0',
                                        '0',
                                        'Nigeria',
                                        '$city',
                                        '',
                                        '$dateregistered',
                                        '',
                                        '',
                                        'My Bio... Hi there, I use Baybn',
                                        'newuser',
                                        '1',
                                        '0',
                                        '',
                                        '',
                                        '0',
                                        '0',
                                        '0',
                                        '0',
                                        '0')";
    $go=mysqli_query($con,$sql);




    // SEND AN EMAIL
    $subject = 'Welcome to Baybn';
    $message = 'Hi, your profile has being created on Baybn and you`re ready to go. ';
    $headers = 'From: noreply@baybn.com';
    mail($email,$subject,$message,$headers);


    // getting the userID for session
    $get_userid = mysqli_query($con,"SELECT * FROM members WHERE email='$email' AND password='$password_encrypt'");
    $fetch_user_info = mysqli_fetch_assoc($get_userid);



    // SENDING VARIABLE TO COMPONENT FOR SESSION CREATION
    // USING AN OBJECT TO SEND INFORMATION TO COMPONENT       
    $member['id']             = $fetch_user_info['id'];


    echo json_encode($member);


    }else{	
    	echo json_encode("bad"); 
    	}










    		
    }
    elseif ($accounttype == 'checkusername') {
    	// CHECK BASIC SIGNUP EMAIL EXISTENCE
    	// CHECK BASIC SIGNUP EMAIL EXISTENCE
     	// CHECK BASIC SIGNUP EMAIL EXISTENCE



    $username = mysqli_real_escape_string($con, $request->username);


    if (strpos($username, ' ')) {
        echo json_encode("space");
    }else
    {
    $check_username_s = mysqli_query($con,"SELECT username FROM members WHERE username='$username' ");
    $check_username_s_num = mysqli_num_rows($check_username_s);   
    echo json_encode($check_username_s_num);   
    }


	


    }
    elseif ($accounttype == 'setupbusiness') {
        // RESTAURANT / BUINESS SETUP UPDATE
        // RESTAURANT / BUINESS SETUP UPDATE
        // RESTAURANT / BUINESS SETUP UPDATE



    $username = mysqli_real_escape_string($con, $request->username);
    // getting the userID for session
    $check_username = mysqli_query($con,"SELECT username FROM members WHERE username='$username' ");
    $check_username_num = mysqli_num_rows($check_username);


    if ($check_username_num==0) {

        if (strpos($username, ' ')) {
            echo json_encode("space");
        }else
        {


     $businessStatus = mysqli_real_escape_string($con, $request->businessStatus);
     $phone = mysqli_real_escape_string($con, $request->phone);
     $id = mysqli_real_escape_string($con, $request->id);

     $sql_update_query = mysqli_query($con, "UPDATE members SET 
                                            username = '$username',
                                            business_verification = '$businessStatus',
                                            phoneno = '$phone' WHERE id = '$id'");

    // getting the userID for session
    $get_userid = mysqli_query($con,"SELECT * FROM members WHERE id = '$id'");
    $fetch_user_info = mysqli_fetch_assoc($get_userid);



    // SENDING VARIABLE TO COMPONENT FOR SESSION CREATION
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
    $member['productnumber']  = $fetch_user_info['productnumber'];
    $member['tongues']        = $fetch_user_info['tongues'];
    $member['stars']          = $fetch_user_info['stars'];


    echo json_encode($member);



        }





    }
    else{
        echo json_encode('usernameError');
    }


    }




















 ?>