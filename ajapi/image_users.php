<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

$conn=mysqli_connect('localhost','founderc_ladli','founderc_ladli','founderc_ladli'); // include database connection file

$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format

$fileName  =  $_FILES['sendimage']['name'];
$tempPath  =  $_FILES['sendimage']['tmp_name'];
$fileSize  =  $_FILES['sendimage']['size'];

		
if(empty($fileName))
{
	$errorMSG = json_encode(array("message" => "please select image", "status" => false));	
	echo $errorMSG;
}
else
{
	$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); // get image extension
	$file=rand(111111111,999999999).'.'.$fileExt;
	//echo $file;
	
	$upload_path = 'upload/'; // set upload folder path 
	
	//$path='flaphealth.foundercodes.com/api/upload';
		
	// valid image extensions
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
					
	// allow valid image file formats
	if(in_array($fileExt, $valid_extensions))
	{				
		//check file not exist our upload folder path
		if(!file_exists($upload_path . $file))
		{
			// check file size '5MB'
			if($fileSize < 5000000){
				move_uploaded_file($tempPath, $upload_path . $file); // move file from system temporary path to our upload folder path 
			}
			else
			{		

				$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
				echo $errorMSG;
			}
		}
		else
		{		
		    
			$errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));	
			echo $errorMSG;
		}
	}
	else
	{		
		$errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));	
		echo $errorMSG;		
	}
}
		
// if no error caused, continue ....
if(!isset($errorMSG))
{
    		    $id=$_POST['id'];
    //$name=$_POST['name'];
    //$category=$_POST['category'];
    //$email=$_POST['email'];
   // $phone=$_POST['phone'];
    //$generic=$_POST['generic'];
    //$address=$_POST['address'];
    //$shopid=$_POST['shopid'];
    $select="SELECT * FROM `users` ";
    $res="UPDATE `users` SET `img_url`='$file' where `id`='$id'";
    //echo $res;
	$query = mysqli_query($conn,$res);
    
	
	
		
		    echo json_encode(array("message" => "Update success", "status" => "200"));
}

?>