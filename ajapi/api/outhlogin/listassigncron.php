<?php

$conn=mysqli_connect('localhost','founderc_smart_locker','founderc_smart_locker','founderc_smart_locker'); // include database connection file


$truc= mysqli_query($conn,"TRUNCATE TABLE `founderc_smart_locker`.`newdata`");
$url = "https://oauth2.googleapis.com/token";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "client_id=982111630622-1jbthhcj67hl3eapjvq1rg2snu5fcafb.apps.googleusercontent.com&client_secret=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&grant_type=refresh_token&refresh_token=1//0g9atuRRCj3hvCgYIARAAGBASNwF-L9Iro49JY2Rjr8Ow26u3wTvDrX83UP6R_SxfUGyYI7j1uEG8-_6Fl7VqHR_9UnZ1TRWmsJI");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));


// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

  $tokendecode= json_decode($server_output);
//var_dump($tokendecode->access_token);

   $token=$tokendecode->access_token;


////    google  unassigned api

$urlg = "https://androidmanagement.googleapis.com/v1/enterprises/LC02pcxtt4/devices";
$ch = curl_init($urlg);
curl_setopt($ch, CURLOPT_URL, $urlg);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer $token",
    'Accept: application/json'
));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_outputg = curl_exec ($ch);

curl_close ($chg);

  $tokendecodeg= json_decode($server_outputg);
    $tokenlg=$tokendecodeg->devices;
//print_r($tokenlg);
$datas=date("Y-m-d H:m:s");
foreach($tokenlg as $items)
{
	
				  $name=$items->name;
                  $enrollmentTime=$items->enrollmentTime;
                 $brand=$items->hardwareInfo->brand;
                 
                  $hardware =$items->hardwareInfo->hardware;
                  $manufacturer=$items->hardwareInfo->manufacturer;
                  $model=$items->hardwareInfo->model;
				  $serialNumber=$items->hardwareInfo->serialNumber;
	$newdata = mysqli_query($conn,"INSERT INTO `newdata`( `sno`, `deviceid`, `datetim`) VALUES ('$serialNumber','$name','$enrollmentTime')");
	$sqlid= mysqli_query($conn,"SELECT * FROM `ime` 
 WHERE enroll_status='0' && `deviceSno`='$serialNumber' ORDER BY `ime`.`deviceTime` DESC");
	
	if(mysqli_num_rows($sqlid)>0)
	{
		$datal=mysqli_fetch_assoc($sqlid);
		$imeino=$datal['imei1'];
	$que=mysqli_query($conn,"UPDATE `ime` SET `deviceBrand`='$brand', `deviceTime`='$enrollmentTime', `deviceHard`='$hardware', `deviceMan`='$manufacturer', `deviceModel`='$model',`deviceSno`='$serialNumber', deviceID='$name',`enroll_status`='1' WHERE enroll_status='0' && `deviceSno`='$serialNumber'");
	
		$post = ['imei' => "$imeino"];

		$zeroenrolurl = "https://ztsp.in/FCT/apis.php?p=claimDevice";
		// print_r($post);die;
	//	imei
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $zeroenrolurl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "imei=$imeino");
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));


// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

  var_dump(json_decode($server_output));
//var_dump($tokendecode->access_token);


curl_close ($chg);
		
		//echo $server_outputg;
		
	}
	else
	{
		echo "not update ";
	}

}
	




// further processing ....

?>
