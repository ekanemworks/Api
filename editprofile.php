<?php 
require 'connect.php';

 $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $bio = mysqli_real_escape_string($con, $request->bio);
    $username = mysqli_real_escape_string($con, $request->username);
    $fullname = mysqli_real_escape_string($con, $request->fullname);
    $email = mysqli_real_escape_string($con, $request->email);
    $phone = mysqli_real_escape_string($con, $request->phone);
    $token = mysqli_real_escape_string($con, $request->token);



    $check_username = mysqli_query($con,"SELECT username FROM members WHERE username='$username' AND id!='$token'");
    $check_username_num = mysqli_num_rows($check_username);



    $check_email = mysqli_query($con,"SELECT email FROM members WHERE email='$email' AND id!='$token'");
    $check_email_num = mysqli_num_rows($check_email);


    // IF USERNAME ALREADY EXIST
    // IF USERNAME ALREADY EXIST
    // IF USERNAME ALREADY EXIST
    if ($check_username_num == 0) {


     if (strpos($username, ' ')) {
            echo json_encode("space");
        }else
        {
            // IF EMAIL ALREADY EXIST
            // IF EMAIL ALREADY EXIST
            // IF EMAIL ALREADY EXIST
                if ($check_email_num == 0) {
                    

                        // TO INSERT DETAILS
                    $sql = "UPDATE members  SET email       = '$email',
                                                phoneno     = '$phone',
                                                bio         = '$bio',
                                                fullname    = '$fullname',
                                                username    = '$username' WHERE id = '$token'";

                    $go=mysqli_query($con,$sql);




                }
                else { echo json_encode("invalid email");}

        }
		    

    }
    else { echo json_encode("invalid username");}




 ?>