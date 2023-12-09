<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: GET");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

$conn=mysqli_connect('localhost','founderc_smart_locker','founderc_smart_locker','founderc_smart_locker'); // include database connection file

$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format


$query="SELECT * FROM sim";
$red=mysqli_query($conn,$query);
$ros=array();
foreach($red as $row)
{
	$ros[]=$row;
}
if($query==true)
{
	$response['data']=$ros;
	$response['msg']="success";
	$response['error']="200";
	echo json_encode($response);
}
else
{
	$response['msg']="no record Found";
	$response['error']="400";
	echo json_encode($response);
}


?>