<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: GET");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

$conn=mysqli_connect('localhost','founderc_smart_locker','founderc_smart_locker','founderc_smart_locker'); // include database connection file

$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format
$search=$_GET['search'];
$shopid=$_GET['shopid'];
if($shopid)
{
if($search)
{
	 $query=mysqli_query($conn,"SELECT * FROM `ime` WHERE `shop_id`='$shopid' && `name` LIKE '%$search%'");
	 $test=mysqli_num_rows($query);
	 $r=array();
	 while($re=mysqli_fetch_assoc($query))
	 {
	    $r[]=$re;
	 }
	 if($test>0)
	 {
	     $response['data']=$r;
	     $response['msg']="success";
		$response['error']="200";
		echo json_encode($response);
	 }
	 else
	 {
		 $response['msg']="No record found";
		$response['error']="400";
		echo json_encode($response);
	 }
}
else
{
	$query=mysqli_query($conn,"SELECT * FROM `ime` WHERE `shop_id`='$shopid'");
	 $test=mysqli_num_rows($query);
	 $r=array();
	 while($re=mysqli_fetch_assoc($query))
	 {
	    $r[]=$re;
	 }
	 if($test>0)
	 {
	     $response['data']=$r;
	     $response['msg']="success";
		$response['error']="200";
		echo json_encode($response);
	 }
	 else
	 {
		 $response['msg']="No record found";
		$response['error']="400";
		echo json_encode($response);
	 }
}
}
else
{
	$response['msg']="shop id is required";
		$response['error']="400";
		echo json_encode($response);
}
?>