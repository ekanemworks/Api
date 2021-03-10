<?php 

require 'connect.php';

$item = [];
$sql = "SELECT * FROM product ORDER BY id DESC";

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
		$item[$cr]['productdescription1']  = $row['productdescription'];
		$description    				  = $item[$cr]['productdescription1'];

		$item[$cr]['productdescription2']  = substr($description, 0,67);


		$item[$cr]['productphoto1']       = $row['productphoto1'];
		$item[$cr]['productphoto2']       = $row['productphoto2'];
		$item[$cr]['productphoto3']       = $row['productphoto3'];
		$item[$cr]['productprice'] 	      = $row['productprice'];
		$item[$cr]['city'] 			      = $row['city'];
		$item[$cr]['country'] 		      = $row['country'];
		$item[$cr]['ownerid'] 		      = $row['ownerid'];
		$item[$cr]['dateadded'] 	      = $row['dateadded'];

		$ownerid = $item[$cr]['ownerid']; 
		$sql_owner = "SELECT * FROM members WHERE id='$ownerid'";
		$result_owner = mysqli_query($con,$sql_owner);
		$row_owner 	  = mysqli_fetch_assoc($result_owner);
		$item[$cr]['username'] 			   	  = $row_owner['username'];
		$item[$cr]['profilephoto'] 			  = $row_owner['profilephoto'];




		$cr++;
	}
	echo json_encode($item);


	}


}


 ?>