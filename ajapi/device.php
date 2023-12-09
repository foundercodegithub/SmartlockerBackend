<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

$conn=mysqli_connect('localhost','founderc_smart_locker','founderc_smart_locker','founderc_smart_locker'); // include database connection file

$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format
$shop_id=$data['shop_id'];
if($shop_id)
{
	$name=$data['name'];
	if($name)
	{
		$imei1=$data['imei1'];
		if($imei1)
		{
			$imei2=$data['imei2'];
			if($imei2)
			{
				$deviceSno=$data['deviceSno'];
				if($deviceSno)
				{
				$email=$data['email'];
				$mobile=$data['mobile'];

				//   $deviceID=$data['deviceID'];
				//   $deviceBrand=$data['deviceBrand'];
				//   $deviceTime=$data['deviceTime'];
				//   $deviceHard=$data['deviceHard'];
				//   $deviceMan=$data['deviceMan'];
				//   $deviceModel=$data['deviceModel'];
				
				//$shop_id=$data['shop_id'];

				$b64 = $data['image'];

				$bin = base64_decode($b64);

				$im = imageCreateFromString($bin);

				// Make sure that the GD library was able to load the image
				// This is important, because you should not miss corrupted or unsupported images

				$rand=rand(11111,99999);
				// Specify the location where you want to save the image
				$img_file = "./uploads/$rand.png";
				$image="$rand.png";

				// if no error caused, continue ....
				// if(!isset($errorMSG))
				// {
				// $path='https://rocks.codescarts.com/Ubiqcure/upload';






				//--------balance add
				//  $data['unblocked_devices']=$datalu+1;
				//       $data['free_devices']=$datalu-1;
				$ro="SELECT * FROM `user` WHERE `shop_id`='$shop_id'";
				$roh=mysqli_query($conn,$ro);
				foreach($roh as $rohi)
				{
					$freedevice=$rohi['free_devices'];
					$id=$rohi['id'];
					$datalu=$rohi['unblocked_devices'];
					$datalus=$rohi['free_devices'];

				}
				$unlocked=$datalu+ 1;
				$freedevi=$datalus-1;
				// 	echo $freedevice;
				if($freedevice>=1)
				{
					$res="INSERT INTO `ime`( `shop_id`, `name`, `email`, `mobile`, `imei1`, `imei2`, `deviceID`, `deviceBrand`, `deviceTime`, `deviceHard`, `deviceMan`, `deviceModel`, `deviceSno`,`lock_unlock`, `uninstall`, `deletes`, `photo`) VALUES ('$shop_id','$name','$email','$mobile','$imei1','$imei2','$deviceID','$deviceBrand','$deviceTime','$deviceHard','$deviceMan','$deviceModel','$deviceSno','1','1','1','$image')";
					//echo $res;

					$query = mysqli_query($conn,$res);
					$last_ids = mysqli_insert_id($conn);
					$rou="UPDATE `user` SET `unblocked_devices`='$unlocked' , `free_devices`='$freedevi' WHERE `id`='$id'";

					$query3 = mysqli_query($conn,$rou);
					//------transaction hist

					$emi_Amount['remaintid']= $datalus-1;


					$d='debit';
					$u= date('Y-m-d H:i:s');
					//   $ro="SELECT * FROM `user` WHERE `shop_id`='$shop_id'";

					$res="INSERT INTO `transactions`(`remaintid`, `piece`, `uid`, `typetid`, `datetime`) VALUES ('$freedevice','1','$id','$d','$u')";
					// 	echo $res;
					$query2 = mysqli_query($conn,$res);
					$last_id = mysqli_insert_id($conn);
					imagepng($im, $img_file, 0);

					echo json_encode(array("message" => "Image Uploaded Successfully", "status" => "200","id" =>"$last_ids"));
				}
				else
				{
					echo json_encode(array("message" => "Balance is low", "status" => "400"));
				}
				}
				else
				{
					$response['msg']="Device No is required";
				    $response['error']="400";
				    echo json_encode($response);
				}
				
			}
			else
			{
				$response['msg']="IMEI 2 is required";
				$response['error']="400";
				echo json_encode($response);
			}

		}
		else
		{
			$response['msg']="IMEI 1 is required";
			$response['error']="400";
			echo json_encode($response);
		}
	}
	else
	{
		$response['msg']="name is required";
		$response['error']="400";
		echo json_encode($response);
	}

}
else
{
	$response['msg']="shop id is required";
	$response['error']="400";
	echo json_encode($response);
}

// 	echo json_encode(array("message" => "Image Uploaded Successfully", "status" => true));	
// }

?>