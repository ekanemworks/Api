<?php 

require 'connect.php';

$postdata = file_get_contents("php://input");

$id = json_decode($postdata);

$item = [];
$sql = "SELECT * FROM product WHERE ownerid = '$id' ORDER BY id DESC";

if ($result = mysqli_query($con,$sql)) 
{
	$check_item_number = mysqli_num_rows($result);

	if ($check_item_number==0) 
	{
		echo json_encode(0);

	}
	else
	{


	$cr = 0;
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$item[$cr]['id'] 			   	  = $row['id'];
		$item[$cr]['productcategory']  	  = $row['productcategory'];
		$item[$cr]['producttype'] 	      = $row['producttype'];
		$item[$cr]['productname'] 	   	  = $row['productname'];
		$item[$cr]['productdescription']  = $row['productdescription'];
		$item[$cr]['productphoto1']       = $row['productphoto1'];
		$item[$cr]['productphoto2']       = $row['productphoto2'];
		$item[$cr]['productphoto3']       = $row['productphoto3'];
		$item[$cr]['productprice'] 	      = $row['productprice'];
		$item[$cr]['city'] 			      = $row['city'];
		$item[$cr]['country'] 		      = $row['country'];
		$item[$cr]['ownerid'] 		      = $row['ownerid'];
		$item[$cr]['dateadded'] 	      = $row['dateadded'];
		$cr++;
	}
	echo json_encode($item);


	}


}


 ?>