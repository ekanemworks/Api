<?php 
require 'connect.php';

 	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    $itemcategory 	 = mysqli_real_escape_string($con, $request->itemcategory);
    $itemname 		 = mysqli_real_escape_string($con, $request->itemname);
    $itemdescription = mysqli_real_escape_string($con, $request->itemdescription);
    $itemprice 		 = mysqli_real_escape_string($con, $request->itemprice);
    $itempic1 		 = mysqli_real_escape_string($con, $request->itempic1);
    $itempic2 		 = mysqli_real_escape_string($con, $request->itempic2);
    $itempic3 		 = mysqli_real_escape_string($con, $request->itempic3);
    $city            = mysqli_real_escape_string($con, $request->city);
    $productnumber            = mysqli_real_escape_string($con, $request->productnumber);
    $session 		 = mysqli_real_escape_string($con, $request->session);
	$date_added = date('d-m-y');

 

    if ($itemcategory    == null || 
        $itemname        == null || 
        $itemdescription == null || 
        $itemprice       == null || 
        $itempic1        == null || 
        $itempic2        == null || 
        $itempic3        == null ) {
    	echo json_encode('null');
    }else{

    	  // TO INSERT NEW food
  	      // TO INSERT NEW food
    $sql = "INSERT INTO product  VALUES (NULL,
                                        '$itemcategory',
                                        'Food',
                                        '$itemname',
                                        '$itemdescription',
                                        '$itempic1',
                                        '$itempic2',
                                        '$itempic3',
                                        '$itemprice',
                                        '$city',
                                        'Nigeria',
                                        '$session',
                                        '$date_added')";
    $go=mysqli_query($con,$sql);

    // TO UPDATE PRODUCT NUMBER IN MEMBER TABLE
    // TO UPDATE PRODUCT NUMBER IN MEMBER TABLE
    $productnumber++;
    mysqli_query($con,"UPDATE members  SET productnumber = '$productnumber' WHERE id ='$session'");

    echo json_encode('success');

    }


 ?>