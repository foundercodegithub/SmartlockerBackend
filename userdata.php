<?php
// Initiate curl session in a variable (resource)
$json1 = json_decode ( file_get_contents ( 'https://smartlockerindia.com/ajapi/api/Mobile_app/userlist'), true);
$id=$json1['user']["id"];
$uid=$json1['user']["user_id"];
$name=$json1['user']["name"];
$mobile=$json1['user']["phone"];
$email=$json1['user']["email"];
$con = mysqli_connect("localhost", "founderc_smart_locker","founderc_smart_locker", "founderc_smart_locker");
$store="INSERT INTO userdata (`id`,`user_id`,`name`,`phone`,`email`) VALUES ('$id','$uid','$name','$mobile','$email')";
echo $store;die;
$finaluocol=mysqli_query($con,$store);
if($finalupcol)
{
    $response["msg"]="Success";
    $response["error"]="200";
    echo json_encode($response);
}
else
{
	$response["msg"]="error";
    $response["error"]="400";
    echo json_encode($response);
}


?>