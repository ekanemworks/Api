<?php 
require 'connect.php';

 $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $check_user = mysqli_query($con,"SELECT * FROM members WHERE id='$request' ");
   	$fetch_user_info = mysqli_fetch_assoc($check_user);
    $member['fullname'] = $fetch_user_info['fullname'];
    $member['username'] = $fetch_user_info['username'];
    $member['email']    = $fetch_user_info['email'];
    $member['phoneno'] = $fetch_user_info['phoneno'];
    $member['accounttype'] = $fetch_user_info['accounttype'];
    $member['totalbalance'] = $fetch_user_info['totalbalance'];
    $member['withdrawable'] = $fetch_user_info['withdrawable'];
    $member['country'] = $fetch_user_info['country'];
    $member['city'] = $fetch_user_info['city'];
    $member['profilephoto'] = $fetch_user_info['profilephoto'];
    $member['dateregistered'] = $fetch_user_info['dateregistered'];
    $member['instagram'] = $fetch_user_info['instagram'];
    $member['twitter'] = $fetch_user_info['twitter'];
    $member['bio'] = $fetch_user_info['bio'];
    $member['userstatus'] = $fetch_user_info['userstatus'];
    $member['onlinestatus'] = $fetch_user_info['onlinestatus'];
    $member['notification'] = $fetch_user_info['notification'];

 	echo json_encode($member);
    // $member['id']  = $fetch_user_info['id'];

 ?>