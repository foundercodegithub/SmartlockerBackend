 <?php
$user_id=$_GET('id');
echo $user_id; die;
 $lat=26.850000;
 $long=80.949997;
// Initiate curl session in a variable (resource)
$json1 = json_decode ( file_get_contents ( "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=false&key=AIzaSyBt0XXMqrIAoo-tec72ZeRgnpQF4bkm4Tw"), true);
$count=count($json1);

$fulladdress=$json1['results'][0]["formatted_address"];
$cityname=$json1['results'][0]['address_components']['0']['long_name'];
$district=$json1['results'][0]['address_components']['1']['long_name'];
$statename=$json1['results'][0]['address_components']['4']['long_name'];
$pincode=$json1['results'][0]['address_components']['6']['long_name'];
$country=$json1['results'][0]['address_components']['5']['long_name'];
$data1=['fullAddress'=>$fulladdress,'cityname'=>$cityname,'statename'=>$statename,'district'=>$district,'pincode'=>$pincode,'country'=>$country];

if($data1)
{
    $response['data']=$data1;
    $response["msg"]="success";
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