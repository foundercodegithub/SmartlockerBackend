<?php
    header("Access-Control-Allow-Origin: * ");
    header("Access-Control-Allow-Headers: Origin,Content-Type ");
    header("Content-Type:application/json ");
    header("Content-Type: application/json");
    header("Expires: 0");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    $rest_json = file_get_contents("php://input");

    $_POST=json_decode($rest_json,true);
    date_default_timezone_set('Asia/Kolkata');
    $date=date('Y-m-d');
    $baseurl="https://ladli.foundercodes.com/api/uploads";
    $conn=mysqli_connect('localhost','founderc_smart_locker','founderc_smart_locker','founderc_smart_locker');
      
    date_default_timezone_set('Asia/Kolkata');
    $datetime=date("d/m/Y H:i:s");
    
    if(!empty($_POST['mobile']))
    {
        $mobile=$_POST['mobile'];
        $count=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE mobile='$mobile'"));
        if($count>0)
        {
            $response['msg']="Mobile is already Exist";
            $response['error']=400;
            echo json_encode($response);
        }
        else
        {
             if(!empty($_POST['username']))
                { 
                  if(!empty($_POST['type']))
                    {
							if(!empty($_POST['pin']))
        					{ 
								$mobile=$_POST['mobile'];
								$created_by=$_POST['created_by'];
								$photo=$_POST['photo'];

								$email=$_POST['email'];
								$address=$_POST['address'];
								$username=$_POST['username'];

								$type=$_POST['type'];
								$pin=$_POST['pin'];

								$bin = base64_decode($photo);

								$im = imageCreateFromString($bin);


								$rand=rand(11111,99999);

								//$img_file = "./uploads/$rand.png";

								$img_file = "../uploads/$rand.png";
								$image="$rand.png";

								$gettype=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE id='$created_by'"));
								$creat=$gettype['type'];
								//echo $creat;
								if($creat=='5')
								{
									$supdis=$gettype['supdis'];
									$dist=$gettype['dist'];

									$sales=$created_by;
									$que=mysqli_query($conn,"INSERT INTO `user`(`username`, `type`, `mobile`, `email`, `photo`, `address`, `created_by`,`status`,`supdis`,`dist`,`sales`,`pin`) VALUES ('$username','$type','$mobile','$email','$image','$address','$created_by','1','$supdis','$dist','$sales','$pin');");
								}
								elseif($creat=='4')
								{
									$dist=$created_by;
									$que=mysqli_query($conn,"INSERT INTO `user`(`username`, `type`, `mobile`, `email`, `photo`, `address`, `created_by`,`status`,`dist`,`pin`) VALUES ('$username','$type','$mobile','$email','$image','$address','$created_by','1','$dist','$pin');");
								}
								elseif($creat->type=='3')
								{
									$supdis=$created_by;
									$que=mysqli_query($conn,"INSERT INTO `user`(`username`, `type`, `mobile`, `email`, `photo`, `address`, `created_by`,`status`,`supdis`,`pin`) VALUES ('$username','$type','$mobile','$email','$image','$address','$created_by','1','$supdis','$pin');");
								}
								else
								{
									$supdis='1';
									$dist='1';

									$sales='1';
									$que=mysqli_query($conn,"INSERT INTO `user`(`username`, `type`, `mobile`, `email`, `photo`, `address`, `created_by`,`status`,`supdis`,`dist`,`sales`,`pin`) VALUES ('$username','$type','$mobile','$email','$image','$address','$created_by','1','$supdis','$dist','$sales','$pin');");
								}
								if($que==1)
								{
									$insid=mysqli_insert_id($conn);
									$que=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `user` WHERE `id`='$insid';"));
									$response=[
										  'data'=>$que,
										  'msg'=>"Successfully",
										  'success'=>"200"
									  ];
									  echo json_encode($response);
									  imagepng($im, $img_file, 0);
								}
								else
								{
									$response=[
										  'msg'=>"Not Success",
										  'success'=>"400"
									  ];
									  echo json_encode($response);
								}
							}
							else
							{
								$response=[
										  'msg'=>"Password Is Required",
										  'error'=>"400"
									  ];
									  echo json_encode($response);     

							}
                        }
                    else
                    {
                        $response=[
                                  'msg'=>"Role Is Required",
                                  'error'=>"400"
                              ];
                              echo json_encode($response);     
                              
                    }
               }
            else
            {
                $response=[
                          'msg'=>"name Is Required",
                          'error'=>"400"
                      ];
                echo json_encode($response);     
                      
            }

        }
    }
    else
    {
        $response=[
                  'msg'=>"Mobile No Is Required",
                  'error'=>"400"
              ];
              echo json_encode($response);     
              
    }
       
       
       
       