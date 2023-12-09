<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

$conn=mysqli_connect('localhost','founderc_smart_locker','founderc_smart_locker','founderc_smart_locker'); // include database connection file

$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format

$userid=$data['userid'];
//echo $userid;
$fnumber=$data['fnumber'];
$cmnumber=$data['cmnumber'];
$number=$data['number'];
$name=$data['name'];
$type=$data['type'];
$date=$data['date'];
$duration=$data['duration'];
$aid=$data['accountid'];
$simname=$data['simname'];
$query="INSERT INTO `callog`(`userid`, `Fnumber`, `CMnumber`,`number`, `name`, `type`, `date`, `duration`, `accountID`, `simname`) VALUES ('$userid','$fnumber','$cmnumber','$number','$name','$type','$date','$duration','$aid','$simname')";
//echo $query;
$red=mysqli_query($conn,$query);
if($query==true)
{
	$response['msg']="Record Save Successfully";
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