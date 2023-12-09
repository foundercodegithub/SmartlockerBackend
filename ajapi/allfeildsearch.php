<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");header("Acess-Control-Allow-Methods: GET");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");
$conn=mysqli_connect('localhost','founderc_smart_locker','founderc_smart_locker','founderc_smart_locker');
$search=$_GET['search'];
if($search)
{
	//echo "SELECT * FROM `user` WHERE `username` LIKE'%$search%' OR `mobile`LIKE'%$search%' OR `email` LIKE'%$search%' OR `address` LIKE'%search_keyword%' OR `dist` LIKE'%$search%'";
	$query=mysqli_query($conn,"SELECT * FROM `user` WHERE `username`LIKE'%$search%' OR `mobile`LIKE'%$search%' OR `email`LIKE'%$search%' OR `address`LIKE'%$search%' OR `dist`LIKE'%$search%'");
	$test=mysqli_num_rows($query);
	$rd=array();	
	while($row=mysqli_fetch_assoc($query))
	{
		$rd[]=$row;
	}
	if($test>0)
	{
		$response['data']=$rd;
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
	$query=mysqli_query($conn,"SELECT * FROM `user`");
	$test=mysqli_num_rows($query);
	$rd=array();	
	while($row=mysqli_fetch_assoc($query))
	{
		$rd[]=$row;
	}
	if($test>0)
	{
		$response['data']=$rd;
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


?>