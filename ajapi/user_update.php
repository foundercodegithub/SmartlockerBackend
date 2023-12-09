<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

$conn=mysqli_connect('localhost','founderc_ladli','founderc_ladli','founderc_ladli'); 

$data = json_decode(file_get_contents("php://input"), true); 


$id=$_POST['id'];
// echo $id;

if(!empty($_FILES['photo']['name']))
        {
           $fileName  =  $_FILES['photo']['name'];
$tempPath  =  $_FILES['photo']['tmp_name'];
$fileSize  =  $_FILES['photo']['size'];

//  		print_r($fileName);

	$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));  
	$file=rand(111111111,999999999).'.'.$fileExt;

	$upload_path = 'upload/';
	

	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
	
    move_uploaded_file($tempPath, $upload_path . $file);

		$path='https://ladli.foundercodes.com/upload';

           $up= "UPDATE users set `img_url`='$path/$file' WHERE `id`='$id' ";
           $result=mysqli_query($conn,$up);

            
            
        }
 

if(!empty($_POST['name']))
        {
          $name=$_POST['name']; 
          $upn= "UPDATE users set `name`='$name' WHERE `id`='$id' ";
        //   $_POST=$data['name'];
        $result=mysqli_query($conn,$upn);
         
        }
if(!empty($_POST['mobile']))
        {
          $phone=$_POST['mobile']; 
          $upp= "UPDATE users set `mobile`='$phone' WHERE `id`='$id' ";
        //   $_POST=$data['phone'];
        $result=mysqli_query($conn,$upp);
          
        } 
if(!empty($_POST['age']))
        {
          $phone_alternate=$_POST['age']; 
          $uppa= "UPDATE users set `age`='$phone_alternate' WHERE `id`='$id' ";
        //  $_POST=$data['phone_alternate'];
        $result=mysqli_query($conn,$uppa);
            
        }  
if(!empty($_POST['email']))
        {
          $address_line_1=$_POST['email']; 
          $upal= "UPDATE users set `email`='$address_line_1' WHERE `id`='$id' ";
        //   echo $up;
        $result=mysqli_query($conn,$upal);
            
        }  
if(!empty($_POST['address']))
        {
          $city=$_POST['address']; 
          $upc= "UPDATE users set `address`='$city' WHERE `id`='$id' ";
          $result=mysqli_query($conn,$upc);
            // echo $up;
        }  

 

 if($result )
{

  
    echo json_encode(array('massege'=> 'Successfully Update','status'=> "200"));
   
 }
 else


    {
         echo json_encode(array('massege'=> 'not record update','status'=> "400"));
	

	
  }

  

?>