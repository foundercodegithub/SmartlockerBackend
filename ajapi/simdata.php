<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

$conn=mysqli_connect('localhost','founderc_smart_locker','founderc_smart_locker','founderc_smart_locker'); // include database connection file

$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format
$userid=$data['userid'];
$sim1=$data['simfirst'];
$sim2=$data['simsecond'];
$query="INSERT INTO `sim`( `userid`, `sim1`, `sim2`) VALUES ('$userid','$sim1','$sim2')";
$red=mysqli_query($conn,$query);
if($query==true)
{
	$response['msg']="record Save Successfully";
	$response['error']="200";
	echo json_encode($response);
}
else
{
	$response['msg']="Internal Server Error";
	$response['error']="400";
	echo json_encode($response);
}

?>