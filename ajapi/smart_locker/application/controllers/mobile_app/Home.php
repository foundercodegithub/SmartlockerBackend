<?php

class Mobile_app extends CI_Controller 
{
    
    
    
   
    
    public function token()
    {
        $a=strtotime("now");
        $abc= md5($a);
        return $abc;
    }

    function default_file()
    {  
        
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
        $this->load->library('form_validation');

        $_POST=json_decode($rest_json,true);
        $this->load->model('Comman_model');
        date_default_timezone_set('Asia/Kolkata');
    }
    public function delete_id()
    {
        $id=$this->input->post('id');
        $this->db->where('id',$id);
        $a=$this->db->delete('users');
        if($a)
        {
            $response['msg']="Deleted";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Not delete";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    public function rest()
    {
        $this->load->view('index');
    }
    
    //user_data
    public function all_user_data()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('user');
        if(!empty($data1))
        {
            $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    
    //  public function all_data()
    // {
    //     $this->default_file();
    //     $where['status']='1';
    //     $data1 =$this->Comman_model->getAllData('all_data', $where,'id');
    //     if(!empty($data1))
    //     {
    //         $response['country']=$data1;
    //         $response['msg']="Sucsess";
    //         $response['error']=200;
    //         echo json_encode($response);
    //     }
    //     else
    //     {
    //         $response['msg']="No record found";
    //         $response['error']=400;
    //         echo json_encode($response);
    //     }
    // } 
     public function user()
    {
        $this->default_file();
            
                    if($this->input->post('user_name')!='')
                    {
                        if($this->input->post('type')!='')
                        {
                            if($this->input->post('email')!='')
                            {
                                if($this->input->post('photo')!='')
                                {
                                    $editup['user_name']=$this->input->post('user_name');
                                     $editup['type']=$this->input->post('type');
                                    $editup['email']=$this->input->post('email');
                                  
                                    $editup['photo']=$this->input->post('photo');
                                    
                                    
                                    $updated = $this->Comman_model->insertData('user',$editup);
                                    if($updated)
                                    {   // $o=rand(111111,999999);
                                        $response['id']="$updated";
                                        $response['msg']="register sucsessfully";
                                        // $response['otp']="$o";
                                        $response['error']="200";
                                        echo json_encode($response);
                                    }
                                }
                                else
                                {
                                    $response['msg']="email  is Required";
                                    $response['error']="400";
                                    echo json_encode($response);
                                }
                            }
                            else
                            {
                                $response['msg']="type is required";
                                $response['error']="400";
                                echo json_encode($response);
                            }
                        }
                        else
                        {
                            $response['msg']="Username is Required";
                            $response['error']="400";
                            echo json_encode($response);
                        }
                    }
                    
                
    }
    
    
    
    
    public function update_images()
    {
       header("Access-Control-Allow-Origin: * ");
        header("Access-Control-Allow-Headers: Origin,Content-Type ");
        header("Content-Type:application/json ");
        header("Content-Type: application/json");
        header("Expires: 0");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
     
        $this->load->library('form_validation');

     
        $this->load->model('Comman_model');
        date_default_timezone_set('Asia/Kolkata');
        $where['id']=$this->input->post('id');
        $id=$this->input->post('id');
        //echo $id;die;
        
//         if($_FILES['avatar']['name']!='')
//         {
//             $ori_filename=$_FILES['avatar']['name'];
// 		$new_name=time()."".str_replace('','-',$ori_filename);
		
// 	    $config['upload_path']          = './uploads/';
//         $config['allowed_types']        = 'gif|jpg|png|jpeg';

//         $this->load->library('upload', $config);
//         $this->upload->do_upload('avatar')  ;
    
//         $file=$this->upload->data();
//         $add=$file['file_name'];
//         //$file1=$this->upload->data('file_name1');
//         // echo "<pre>";
//         // print_r($file);
        
//             $data['img_url']=$add;
//         }
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('img_url')!='')
        {
            $ori_filename=$_FILES['img_url']['name'];
		$new_name=time()."".str_replace('','-',$ori_filename);
		     $this->load->library('upload', $config);
        $this->upload->do_upload('img_url')  ;
    
        $file=$this->upload->data();
        $add=$file['file_name'];
        
        $data['img_url']=$add;
        }
        if($this->input->post('name')!='')
        {
            $data['name']=$this->input->post('name');
        }
        if($this->input->post('email')!='')
        {
            $data['email']=$this->input->post('email');
        }
        if($this->input->post('mobile')!='')
        {
            $data['mobile']=$this->input->post('mobile');
         }
		 if($this->input->post('age')!='')
        {
            $data['age']=$this->input->post('age');
        }
        if($this->input->post('address')!='')
        {
            $data['address']=$this->input->post('address');
        }
//         if($this->input->post('email')!='')
//         {
//             $data['email']=$this->input->post('email');
//          }
// 		 if($this->input->post('profile')!='')
//         {
//             $data['profile']=$this->input->post('profile');
//          }
        
            $data1 =$this->Comman_model->UpdateRecord('users', $data, $where);
                  
        if(!empty($data1))
        {
            $response['id']=$this->input->post('id');
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
        
   }
   
      public function  delete_video()
    {
          $this->default_file();
        if($this->input->post('id')!='')
        {
            $where['id']=$this->input->post('id');
                $insert=$this->Comman_model->Deletedata('users', $where);
        	    if($insert)
                {
                    $response['msg']="Internet Server Error";
                    $response['error']=400;
                    echo json_encode($response);
                }
                else
                {
                
                    $response['msg']="Sucsess";
                    $response['error']=200;
                    echo json_encode($response);
                }
          
        }
        else
        {
             $response['msg']="User id found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function gameli_e()
    {
         date_default_timezone_set("Asia/Kolkata");
         $timer=date('H');
        $this->default_file();
       // $q=rand(11111,99999);
         $sql=$this->db->query("SELECT * FROM `match`  ORDER BY batting_openingtime DESC LIMIT 5");
        $data1 =$sql->result();
        if(!empty($data1))
        {
            //echo $q;
            $q=rand(1111,9999);
            $response['data']=$data1;
            $response['playing']=$q;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
     public function otpl()
    {
        $this->default_file();
        
       //$where['mobile']=$email= $this->input->post('email');
                $where['status']="1";
                $datas['datetime']=date('s'); 

        // $where['password']=$password=$this->input->post('password');
   		   
        if($datas)
        {
               		    $data1=$this->Comman_model->getdata('match',$where);

                  if($data1)
               {
                    $o=rand(11,99);
                    $response['']="$o";
                    $response['id']=$data1;
                    echo json_encode($response);
               }
              
        
        
    }
    }
    public function version()
    {
        $this->default_file();
        $where['id']='1';
        $data1 =$this->Comman_model->getAllData1('version', $where,'id');
        if(!empty($data1))
        {
            $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    public function gamelive()
    {
         date_default_timezone_set("Asia/Kolkata");
         $timer=date('H');
      
        $this->default_file();
        if($timer)
        {
            $q=rand(1111,99999);
            $n=rand(1111,99999);
            $w=rand(111,9999);
            $x=rand(11111,99999);
            $u=rand(1111,99999);
            //echo $q;
            $editup['number']="rand(1111,99999)";
            $sql1=$this->db->query("UPDATE `match` SET `number`='$q' WHERE `id`=1 ");
            $sql1=$this->db->query("UPDATE `match` SET `number`='$n' WHERE `id`=2 ");
            $sql1=$this->db->query("UPDATE `match` SET `number`='$w' WHERE `id`=3 ");
            $sql1=$this->db->query("UPDATE `match` SET `number`='$x' WHERE `id`=4 ");
            $sql1=$this->db->query("UPDATE `match` SET `number`='$u' WHERE `id`=5 ");
           //echo $sql1;
          //$sql=$this->db->query("SELECT * FROM `match`  ORDER BY batting_openingtime DESC ");
          $sql=$this->db->query("SELECT * FROM `match` WHERE `tm` >= '$timer' ");
          $data1 =$sql->result();
          if(!empty($data1))
        {
        
            $response['data']=$data1;
             //$response['number']=$q;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']="400";
            echo json_encode($response);
        }
        }
    }

    public function resultslive()
    {

        date_default_timezone_set("Asia/Kolkata");
         $timer=date('h');
        $this->default_file();
        
        //`tm` >= $timer
        //$where['number']=$user=$this->input->post('number');
           $sql=$this->db->query("SELECT * FROM `match` WHERE 1 LIMIT 5");

        $data1 =$sql->result();
        if(!empty($data1))
        {
            $response['data']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
     public function upcoming_gam()
    {
          date_default_timezone_set("Asia/Kolkata");
         $timer=date('h');
        $this->default_file();
        //$sql=$this->db->query("SELECT * FROM `match` WHERE `batting_openingtime` >= $timer ORDER BY batting_openingtime ASC LIMIT 3");
        $data1 =$sql->result();
        if(!empty($data1))
        {
            $response['data']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
      public function upcoming_game()
    {
          date_default_timezone_set("Asia/Kolkata");
         $timer=date('H');
        $this->default_file();
        $sql=$this->db->query("SELECT * FROM `match` WHERE `tm` >= $timer ORDER BY batting_openingtime DESC LIMIT 4");
      
        $data1 =$sql->result();
        if(!empty($data1))
        {
            $response['data']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);             
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
   
    
    public function allgame()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('match', $where,'id');
        if(!empty($data1))
        {
            $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function state()
    {
        $this->default_file();
        if($this->input->post('countryid')!='')
        {
        $where['status']='1';
        $where['countryid']=$this->input->post('countryid');
        $data1 =$this->Comman_model->getAllData('state', $where,'id');
        if(!empty($data1))
        {
            $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
        }
        else
        {
            $response['msg']="please Select Country Id";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function city()
    {
        $this->default_file();
        

              if($this->input->post('state')!='')
              {
                $where['status']='1';
                
                $where['state']=$this->input->post('state');
                $data1 =$this->Comman_model->getAllData('city', $where,'id');
                $response['country']=$data1;
                $response['msg']="Sucsess";
                $response['error']=200;
                echo json_encode($response);
              }
              else
              {
                  $response['msg']="please Select Country Id";
                    $response['error']=400;
                    echo json_encode($response);
              }
           
        }
    
    public function status()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getData('country', $where);
        if(!empty($data1))
        {
            $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function register()
    {
        $this->default_file();
        $data110['email']=$this->input->post('email');
        $data210['mobile']=$this->input->post('mobile');
        $data1 =$this->Comman_model->getData('user_profile', $data110);
        $data2 =$this->Comman_model->getData('user_profile', $data210);
        if(empty($data2))
        {
            if(empty($data1))
            {
                $data110 =$this->Comman_model->getData('user_profile', $data110);
                if(empty($data1222))
                {
                    if($this->input->post('name')!='')
                    {
                        if($this->input->post('email')!='')
                        {
                               if($this->input->post('password')!='')
                                {
                                    if($this->input->post('state')!='')
                                    {
                                     if($this->input->post('mobile')!='')
                                        {
                                             $editup['name']=$this->input->post('name');
                                             $editup['mobile']=$this->input->post('mobile');
                                             $editup['email']=$this->input->post('email');
                                             $editup['password']=$this->input->post('password');
                                             $editup['state']=$this->input->post('state');
                                               $editup['status']="1";
                                            $ref=$this->input->post('referral_code');
                                             if($ref=='')
                                             {
                                            $updated = $this->Comman_model->insertData('user_profile',$editup);
                                             if ($updated) 
                            			     {   
                            			         $o=rand(111111,999999);
                                			    $response['id']="$updated";
                                			    $response['otp']="$o";
                                                $response['msg']="Sucsess";
                                                $response['error']=200;
                                                echo json_encode($response);
                        			         }
                        			         else
                        			         {
                            			        $response['msg']="Not Sucsess";
                                                $response['error']=400;
                                                echo json_encode($response);
                        			         }
                                                 
                                             }
                                             else
                                             {
                                                   $data0w['mobile']=$mob=$this->input->post('referral_code');
                                                    
                                      
                                         $data102 =$this->Comman_model->getData('user_profile', $data0w);
                                         
                                         $where['mobile']=$mob;
                                                    $datank['bonus']=$data102->bonus+'50';
                                            $datank['wallet']=$data102->wallet+'50';
                                           $data1nk =$this->Comman_model->UpdateRecord('user_profile', $datank, $where);
                                         
                                                 if(!empty($data102)){
                                                     
                                                 

                                                $editup['referral_code']=$this->input->post('referral_code');
                                                
                                             
                                             }else{
                                                $response['msg']="Wrong Code";
                                                $response['error']=400;
                                                echo json_encode($response);
                        			      
                                             }
                                            $updated = $this->Comman_model->insertData('user_profile',$editup);
                        
       
                         
                                             if ($updated) 
                            			     {   
                            			         $o=rand(111111,999999);
                                			    $response['id']="$updated";
                                			    $response['otp']="$o";
                                                $response['msg']="Sucsess";
                                                $response['error']=200;
                                                echo json_encode($response);
                        			         }
                        			         else
                        			         {
                            			        $response['msg']="Not Sucsess";
                                                $response['error']=400;
                                                echo json_encode($response);
                        			         }
                                             }
                                        }
                                        else
                                        {
                                            $response['msg']="Mobile No. is Required";
                                            $response['error']=400;
                                            echo json_encode($response);
                                        }
                                    }
                                    else
                                    {
                                        $response['msg']="State is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                    }
                                }
                                else
                                {
                                    $response['msg']="Password is Required";
                                    $response['error']=400;
                                    echo json_encode($response);
                                }
                        }
                        else
                        {
                            $response['msg']="email is Required";
                            $response['error']=400;
                            echo json_encode($response);
                        }
                    }
                    else
                    {
                        $response['msg']="Name is Required";
                        $response['error']=400;
                        echo json_encode($response);
                    }
                }
            }
            else
            {
                $response['msg']="Email is already exist";
                $response['error']=400;
                echo json_encode($response);
            }
        }
        else
        {
            $response['msg']="mobile is already exist";
            $response['error']=400;
            echo json_encode($response);
        }
    }
     public function labnik()
    {
        $this->default_file();
           if($this->input->post('name')!='')
                    {
                        if($this->input->post('email')!='')
                        {
                               if($this->input->post('password')!='')
                                {
                                    if($this->input->post('state')!='')
                                    {
                                     if($this->input->post('mobile')!='')
                                        {
                                             $editup['name']=$this->input->post('name');
                                             $editup['mobile']=$this->input->post('mobile');
                                             $editup['email']=$this->input->post('email');
                                             $editup['password']=$this->input->post('password');
                                             $editup['state']=$this->input->post('state');
                                               $editup['status']="1";
                                            $ref=$this->input->post('referral_code');
                                             if($ref=='')
                                             {
                                            $updated = $this->Comman_model->insertData('user_profile',$editup);
                                             if ($updated) 
                            			     {   
                            			         $o=rand(111111,999999);
                                			    $response['id']="$updated";
                                			    $response['otp']="$o";
                                                $response['msg']="Sucsess";
                                                $response['error']=200;
                                                echo json_encode($response);
                        			         }
                        			         else
                        			         {
                            			        $response['msg']="Not Sucsess";
                                                $response['error']=400;
                                                echo json_encode($response);
                        			         }
                                                 
                                             }
                                             else
                                             {
                                                   $data0w['mobile']=$mob=$this->input->post('referral_code');
                                                    
                                      
                                         $data102 =$this->Comman_model->getData('user_profile', $data0w);
                                         
                                         $where['mobile']=$mob;
                                                    $datank['bonus']=$data102->bonus+'50';
                                            $datank['wallet']=$data102->wallet+'50';
                                           $data1nk =$this->Comman_model->UpdateRecord('user_profile', $datank, $where);
                                         
                                                 if(!empty($data102)){
                                                     
                                                 

                                                $editup['referral_code']=$this->input->post('referral_code');
                                                
                                             
                                             }else{
                                                $response['msg']="Wrong Code";
                                                $response['error']=400;
                                                echo json_encode($response);
                        			      
                                             }
                                            $updated = $this->Comman_model->insertData('user_profile',$editup);
                        
       
                         
                                             if ($updated) 
                            			     {   
                            			         $o=rand(111111,999999);
                                			    $response['id']="$updated";
                                			    $response['otp']="$o";
                                                $response['msg']="Sucsess";
                                                $response['error']=200;
                                                echo json_encode($response);
                        			         }
                        			         else
                        			         {
                            			        $response['msg']="Not Sucsess";
                                                $response['error']=400;
                                                echo json_encode($response);
                        			         }
                                             }
                                        }
                                        else
                                        {
                                            $response['msg']="Mobile No. is Required";
                                            $response['error']=400;
                                            echo json_encode($response);
                                        }
                                    }
                                    else
                                    {
                                        $response['msg']="State is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                    }
                                }
                                else
                                {
                                    $response['msg']="Password is Required";
                                    $response['error']=400;
                                    echo json_encode($response);
                                }
                        }
                        else
                        {
                            $response['msg']="email is Required";
                            $response['error']=400;
                            echo json_encode($response);
                        }
                    }
                    else
                    {
                        $response['msg']="Name is Required";
                        $response['error']=400;
                        echo json_encode($response);
                    }
                }
            
        
        
    
   function regii()
    {
        $this->default_file();
       $data110['email']=$this->input->post('email');
        $data210['mobile']=$this->input->post('mobile');
       $data1 =$this->Comman_model->getData('users', $data110);
        $data2 =$this->Comman_model->getData('users', $data210);
        if(empty($data1))
        {
        if(empty($data2))
        {
            if(empty($data1222))
                {
                    if($this->input->post('name')!='')
                    {
                        if($this->input->post('age')!='')
                        {
                            if($this->input->post('email')!='')
                            {
                                if($this->input->post('mobile')!='')
                                {
                                    if($this->input->post('address')!='')
                                {
                                    if($this->input->post('zip')!='')
                                {
                                    $editup['name']=$this->input->post('name');
                                    $editup['email']=$this->input->post('email');
                                    $editup['age']=$this->input->post('age');
                                    $editup['zip']=$this->input->post('zip');
                                    $editup['mobile']=$this->input->post('mobile');
                                     $editup['address']=$this->input->post('address');
                                    
                                    $updated = $this->Comman_model->insertData('users',$editup);
                                    
                                    if($updated)
                                    {   // $o=rand(111111,999999);
                                    $data11['id']="$updated";
        		            $data10 =$this->Comman_model->getData('users', $data11);
                                        $response['data']=$data10;
                                        $response['msg']="register sucsessfully";
                                        // $response['otp']="$o";
                                        $response['error']="200";
                                        echo json_encode($response);
                                    }
                                }
                                     else
                                {
                                    $response['msg']="zip is Required";
                                    $response['error']="400";
                                    echo json_encode($response);
                                }
                                }
                                else
                                {
                                    $response['msg']="address is Required";
                                    $response['error']="400";
                                    echo json_encode($response);
                                }
                                }
                                else
                                {
                                    $response['msg']="mobile No. is Required";
                                    $response['error']="400";
                                    echo json_encode($response);
                                }
                            }
                            else
                            {
                                $response['msg']="email is Required";
                                $response['error']="400";
                                echo json_encode($response);
                            }
                        }
                        else
                        {
                            $response['msg']="age is Required";
                            $response['error']="400";
                            echo json_encode($response);
                        }
                    }
                    else
                    {
                        $response['msg']="name is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    }
                }
        } 
        else
        {
            $response['msg']="mobile is already exist";
            $response['error']="400";
            echo json_encode($response);
        }
    } 
     else
        {
            $response['msg']="email is already exist";
            $response['error']="400";
            echo json_encode($response);
        }
    }
     function double()
    {
        $this->default_file();
            
                    if($this->input->post('place_name')!='')
                    {
                        if($this->input->post('latitude')!='')
                        {
                            if($this->input->post('longitude')!='')
                            {
                                if($this->input->post('address')!='')
                                {
                                    $editup['user_id']=$this->input->post('user_id');
                                     $editup['crime']=$this->input->post('crime');
                                    $editup['device_id']=$this->input->post('device_id');
                                    $editup['address']=$this->input->post('address');
                                    $editup['phone']=$this->input->post('phone');
                                    $editup['email']=$this->input->post('email');
                                    $editup['latitude']=$this->input->post('latitude');
                                    $editup['longitude']=$this->input->post('longitude');
                                    $editup['place_name']=$this->input->post('place_name');
                                    $editup['status']=1;
                                    
                                    
                                    $updated = $this->Comman_model->insertData('double',$editup);
                                    if($updated)
                                    {   // $o=rand(111111,999999);
                                        $response['id']="$updated";
                                        $response['msg']="register sucsessfully";
                                        // $response['otp']="$o";
                                        $response['error']="200";
                                        echo json_encode($response);
                                    }
                                }
                                else
                                {
                                    $response['msg']="address  is Required";
                                    $response['error']="400";
                                    echo json_encode($response);
                                }
                            }
                            else
                            {
                                $response['msg']="longitude is Required";
                                $response['error']="400";
                                echo json_encode($response);
                            }
                        }
                        else
                        {
                            $response['msg']="latitude is Required";
                            $response['error']="400";
                            echo json_encode($response);
                        }
                    }
                    else
                    {
                        $response['msg']="place_name is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    }
                
    }
    public function alldata()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('crims_list', $where,'id');
        if(!empty($data1))
        {
            $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
     function user_contact()
    {   
        $this->default_file();
        $data110['email']=$this->input->post('email');
        $data210['phone']=$this->input->post('phone');
        $data1 =$this->Comman_model->getData('user_contact', $data110);
        $data2 =$this->Comman_model->getData('user_contact', $data210);
        if(empty($data1))
        {
        if(empty($data2))
        {
            if(empty($data1222))
                {
                    if($this->input->post('name')!='')
                    {
                        if($this->input->post('user_id')!='')
                        {
                            if($this->input->post('email')!='')
                            {
                                if($this->input->post('phone')!='')
                                {
                                    $editup['name']=$this->input->post('name');
                                    $editup['email']=$this->input->post('email');
                                    $editup['user_id']=$this->input->post('user_id');
                                    $editup['phone']=$this->input->post('phone');
                                    
                                    $updated = $this->Comman_model->insertData('user_contact',$editup);
                                    if($updated)
                                    {   // $o=rand(111111,999999);
                                        $response['id']="$updated";
                                        $response['msg']="register sucsessfully";
                                        // $response['otp']="$o";
                                        $response['error']="200";
                                        echo json_encode($response);
                                    }
                                }
                                else
                                {
                                    $response['msg']="mobile No. is Required";
                                    $response['error']="400";
                                    echo json_encode($response);
                                }
                            }
                            else
                            {
                                $response['msg']="email is Required";
                                $response['error']="400";
                                echo json_encode($response);
                            }
                        }
                        else
                        {
                            $response['msg']="user_id is Required";
                            $response['error']="400";
                            echo json_encode($response);
                        }
                    }
                    else
                    {
                        $response['msg']="name is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    }
                }
        } 
        else
        {
            $response['msg']="mobile is already exist";
            $response['error']="400";
            echo json_encode($response);
        }
    } 
     else
        {
            $response['msg']="email is already exist";
            $response['error']="400";
            echo json_encode($response);
        }
    }
    
     function user_count()
    {   
        $this->default_file();
        $id=$this->input->post('user_id');
        $phone=$this->input->post('phone'); 
        $email=$this->input->post('email');
         $query = $this->db->query("select `user_id` from user_contact where user_id='$id'");  
  $a=$query->num_rows();
 
        if($a<=4)
          {
        //$data110['email']=$this->input->post('email');
        // $data210['phone']=$this->input->post('phone');
        $data1 =$this->Comman_model->getemail($email,$id);
        $data2 =$this->Comman_model->getmob($phone,$id);
        if(empty($data1))
        {    
        if(empty($data2))
        {
            if(empty($data1222))
                {
                    if($this->input->post('name')!='')
                    {  
                        if($this->input->post('user_id')!='')
                         {
                            if($this->input->post('email')!='')
                            {
                                if($this->input->post('phone')!='')
                                {
                                    $editup['name']=$this->input->post('name');
                                    $editup['email']=$this->input->post('email');
                                    $editup['user_id']=$this->input->post('user_id');
                                    $editup['phone']=$this->input->post('phone');
                                    
                                    $updated = $this->Comman_model->insertData('user_contact',$editup);
                                    if($updated)
                                    {   // $o=rand(111111,999999);
                                         
                                        $response['id']="$updated";
                                        $response['msg']="register sucsessfully";
                                        // $response['otp']="$o";
                                        $response['error']="200";
                                        echo json_encode($response);
                                    }
                                }
                                else
                                {
                                    $response['msg']="mobile No. is Required";
                                    $response['error']="400";
                                    echo json_encode($response);
                                }
                            }
                            else
                            {
                                $response['msg']="email is Required";
                                $response['error']="400";
                                echo json_encode($response);
                            }
                        }
                        else
                        {
                            $response['msg']="user_id is Required";
                            $response['error']="400";
                            echo json_encode($response);
                        }
                    }
                    else
                    {
                        $response['msg']="name is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    }
                }
        } 
        else
        {
            $response['msg']="mobile is already exist";
            $response['error']="400";
            echo json_encode($response);
        }
    } 
     else
        {
            $response['msg']="email is already exist";
            $response['error']="400";
            echo json_encode($response);
        }
        }
        else
        {
            $response['msg']="Your Kota is full";
            $response['error']="400";
            echo json_encode($response);
        }
        
    }
     public function about_us()  {      
         $this->default_file();        $where['id']='1';        $data1 =$this->Comman_model->getAllData('about_us', $where,'id');        if(!empty($data1))        {            $response['country']=$data1;   $response['msg']="Sucsess";            $response['error']="200";            echo json_encode($response);        }        else        {            $response['msg']="No record found";            $response['error']="400";            echo json_encode($response);        }    }
     public function term_condition()  {      
         $this->default_file();        $where['id']='1';        $data1 =$this->Comman_model->getAllData('term_condition', $where,'id');        if(!empty($data1))        {            $response['country']=$data1;            $response['msg']="Sucsess";            $response['error']="200";            echo json_encode($response);        }        else        {            $response['msg']="No record found";            $response['error']="400";            echo json_encode($response);        }    }
       public function privacy_policy()  {      
         $this->default_file();        $where['id']='1';        $data1 =$this->Comman_model->getAllData('privacy_policy', $where,'id');        if(!empty($data1))        {            $response['country']=$data1;            $response['msg']="Sucsess";            $response['error']="200";            echo json_encode($response);        }        else        {            $response['msg']="No record found";            $response['error']="400";            echo json_encode($response);        }    }
     public function report_crime()
    {
        $this->default_file();
          // $where['city']='uttar pradesh';
          // $where['state']='lucknow';
            if(empty($data1222))
                {
                    if($this->input->post('city')!='')
                    {
                       
                            if($this->input->post('address')!='')
                            {
                                if($this->input->post('user_id')!='')
                               {
                                    $editup['user_id']=$this->input->post('user_id');
                                    $editup['city']=$this->input->post('city');
                                    $editup['incident_type']=$this->input->post('type');
                                    $editup['address']=$this->input->post('address');
                                   
                                     $editup['description']=$this->input->post('description');
                                     $editup['state']='Uttar Pradesh';
                                    
                                    $updated = $this->Comman_model->insertData('report_crime',$editup);
                                    if($updated)
                                    {   
                                        $response['id']="$updated";
                                        $response['msg']="register sucsessfully";
                                        $response['error']="200";
                                        echo json_encode($response);
                                    }
                                }
                                 else
                            {
                                $response['msg']="user_id is Required";
                                $response['error']="400";
                                echo json_encode($response);
                            }
                        
                            }
                            else
                            {
                                $response['msg']="address is Required";
                                $response['error']="400";
                                echo json_encode($response);
                            }
                        }
                        
                    else
                    {
                        $response['msg']="city is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    }
                }
        } 
        
     
    public function user_login()
    {
        $this->default_file();
         
		    if($this->input->post('mobile')!='')
		    		        {
		           
        		            $data11['mobile']=$this->input->post('mobile');
        		            $data10 =$this->Comman_model->getData('user_profile', $data11);
        		            
        		            if(!empty($data10))
        		            {
        		               // $iou=rand(111111,999999);
        		                 
        		                     $response['msg']="Send otp Successfully";
                                    $response['error']="200";
                                    $response['id']=$data10->id;
                                   // $response['screen']=1;
                                                                        //$response['otp']="$iou";

                                    echo json_encode($response);
        		                }
        		             
        		            else
        		            {
        		                        		    

        		                $response['msg']="please register";
                                $response['error']="400";
                                $response['mobile']=$this->input->post('mobile');
                      
                                echo json_encode($response);
        		            }
        		      
        		       
		        }
		       
		    
		    else
		    {
		         $response['msg']="Please Enter Mobile";
                $response['error']=400;
                echo json_encode($response);
		    } 
   		
    
    }
    
         public function beto()
    {
        $this->default_file();
        $data110['id']=$user=$this->input->post('user_id');
        $amount=$this->input->post('amount');
          $n=$this->input->post('n');
        //           $n1=$this->input->post('n1');

        
        $data1 =$this->Comman_model->getData('user_profile', $data110);
        if(!empty($data1))
        {
            
            if(!empty($amount))
            {
                $am=$amount+$amount;
                
               $balance=$data1->wallet;
               if($am<$balance)
               {
                   $d['market_name']=$this->input->post('gameid');
                   $dat =$this->Comman_model->getData('match', $d);
                   
                   if($dat->nextbet>=date('H:i')){
                               $editup['user_id']=$user;
                                             $editup['amount']=$amount;
                                             $editup['gameid']=$this->input->post('gameid');
                                             
                                             $editup['number']=$this->input->post('n');
                                             $editup['date_time']=date('Y-m-d');
                                              $editup['time']=date('h:i:s');
                                              $editup['betdate']=date('Y-m-d');
                                             
                                                                             $updated = $this->Comman_model->insertData('batting',$editup);
                                             if ($updated) 
                                             {
                                                 $rah=date_default_timezone_set("Asia/Kolkata");
         $timer=date('Y-m-d h:i:s');
                                                 $ed['user_id']=$user;
                                                                                       $ed['type']="debit";
                                                                                       $ed['amount']=$amount;
                                                                                                                                                                      $ed['description']="Betting Amount";
                                                                                                                                                                      $ed['datetime']=$timer;


                                                 $updatehis = $this->Comman_model->insertData('transactions_table',$ed);
                                                 $data['wallet']=$balance-$amount;
                                                 $where['id']=$user;
                                        $data1 =$this->Comman_model->UpdateRecord('user_profile', $data, $where);


                                                 if($updatehis) {   
                                                     
                                			    $response['id']=$updated;
                                			    $response['total']="$am";
                                                $response['msg']="Sucsess";
                                                $response['error']=200;
                                                echo json_encode($response);
                        			         }
                        			         else
                        			         {
                            			        $response['msg']="Not Sucsess";
                                                $response['error']=400;
                                                echo json_encode($response);
                        			         }
                                        }
                                             }
                    else{
                        $y=date('Y-m');
                        $d1=date('d');
                        $d=$d1+'1';
                        $ms=$d;
                        $betdate=("$y-$ms");
                                    $editup['user_id']=$user;
                                             $editup['amount']=$amount;
                                             $editup['gameid']=$this->input->post('gameid');
                                             
                                             $editup['number']=$this->input->post('n');
                                             $editup['date_time']=date('Y-m-d');
                                              $editup['time']=date('h:i:s');
                                              $editup['betdate']=$betdate;
                                             
                                                                             $updated = $this->Comman_model->insertData('batting',$editup);
                                             if ($updated) 
                                             {
                                                 $rah=date_default_timezone_set("Asia/Kolkata");
         $timer=date('Y-m-d h:i:s');
                                                 $ed['user_id']=$user;
                                                                                       $ed['type']="debit";
                                                                                       $ed['amount']=$amount;
                                                                                                                                                                      $ed['description']="Betting Amount";
                                                                                                                                                                      $ed['datetime']=$timer;


                                                 $updatehis = $this->Comman_model->insertData('transactions_table',$ed);
                                                 $data['wallet']=$balance-$amount;
                                                 $where['id']=$user;
                                        $data1 =$this->Comman_model->UpdateRecord('user_profile', $data, $where);


                                                 if($updatehis) {   
                                                     
                                			    $response['id']=$updated;
                                			    $response['total']="$am";
                                                $response['msg']="Sucsess";
                                                $response['error']=200;
                                                echo json_encode($response);
                        			         }
                        			         else
                        			         {
                            			        $response['msg']="Not Sucsess";
                                                $response['error']=400;
                                                echo json_encode($response);
                        			         }
                                        }
                    }
                       
               }
                   
                                             
                            			    
                                        else
                                        {
                                            $response['msg']="Balance Is Low";
                                            $response['error']=400;
                                            echo json_encode($response);
                                        }
             
            }
            else
            {
                $response['msg']="Please Enter Amount";
                $response['error']=400;
                echo json_encode($response);
            }
        }
        else
        {
            $response['msg']="User  not found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
     public function beto1()
    {
        $this->default_file();
        $data110['id']=$user=$this->input->post('id');
        $amount=$this->input->post('wallet');
        //  $n=$this->input->post('n');
        //           $n1=$this->input->post('n1');

        //  $n2=$this->input->post('n2');
        //   $n3=$this->input->post('n3');
        //  $n4=$this->input->post('n4');
        //  $n5=$this->input->post('n5');
        //  $n6=$this->input->post('n6');
        //  $n7=$this->input->post('n7');
        //   $n8=$this->input->post('n8');
        //  $n9=$this->input->post('n9');
        $data1 =$this->Comman_model->getData('user_profile', $data110);
        if(!empty($data1))
        {
            
            if(!empty($wallet))
            {
                $am=$wallet+$wallet;
                
               $balance=$data1->wallet;
               if($am<$balance)
               {
                                             $editup['id']=$user;
                                             $editup['wallet']=$amount;
                                            // $editup['gameid']=$this->input->post('gameid');
                                             
                                           //  $editup['number']=$this->input->post('n');
                                            // $editup['date_time']=date('Y-m-d h:i:s');
                                                                                            
                                                 if($updatehis) {   
                                                     
                                			    $response['id']=$updated;
                                			    $response['total']="$am";
                                                $response['msg']="Sucsess";
                                                $response['error']=200;
                                                echo json_encode($response);
                        			         }
                        			         else
                        			         {
                            			        $response['msg']="Not Sucsess";
                                                $response['error']=400;
                                                echo json_encode($response);
                        			         }
                                        
                                             }
                            			    
                                        
                                        
             
            }
            
        }
        
    }
     public function withdrawl_1()
    {
        $this->default_file();
        
                    if($this->input->post('user_id')!='')
                    {   $data110['id']=$user=$this->input->post('user_id');
                        $amount=$this->input->post('amount');
                                $data1 =$this->Comman_model->getData('user_profile', $data110);
                                if($data1){
                                    $bal=$data1->wallet;
                                    if($bal>$amount){
                                            if($this->input->post('upi')!='')
                        {
                            
                                     if($this->input->post('amount')!='')
                                        {
                                             $editup['user_id']=$user;
                                             $editup['upi']=$this->input->post('upi');
                                             $editup['status']='1';
                                             $editup['datetime']=date('Y-m-d h:i:s');
                                              $editup['date']=date('Y-m-d ');
                                             $editup['name']=$this->input->post('name');
                                             $editup['amount']=$this->input->post('amount');
                                               $editup['status']="1";
                                               
                                             $updated = $this->Comman_model->insertData('withdrawl',$editup);
                                             $raj=$bal-$amount;
                                             $where['id']=$this->input->post('user_id');
                                             $data['wallet']= $raj;
                                        $data310 =$this->Comman_model->UpdateRecord('user_profile', $data, $where);
                                  
                                  
                                   $editu['user_id']=$user;
                                             $editu['type']="debit";
                                             $editu['amount']=$amount;
                                             $editu['description']="Withdrawl Request";
                                                                                    $editu['datetime']=date('Y-m-d h:i:s');
                                             $updated = $this->Comman_model->insertData('transactions_table',$editu);
                                  
                                  
                                             
                                             if ($updated) 
                            			 
                        			     
                        			         {
                        			             
                        			             
                            			        $response['msg']="success";
                                                $response['error']="200";
                                                echo json_encode($response);
                        			         }
                                             }
                                        }
                                       
                                else
                                {
                                    $response['msg']="upi is Required";
                                    $response['error']=400;
                                    echo json_encode($response);
                                }
                    }
                     else
                    {
                        $response['msg']="Balance Low";
                        $response['error']=400;
                        echo json_encode($response);
                    }
                                    }
                                     else
                    {
                        $response['msg']="User Not Found";
                        $response['error']=400;
                        echo json_encode($response);
                    }
                                }
                                
                    
                    else
                    {
                        $response['msg']="User Id Required";
                        $response['error']=400;
                        echo json_encode($response);
                    }
    }
      public function userpro()
    {
        $this->default_file();
        $where['id']=$user=$this->input->post('user_id');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getData('user_profile', $where);
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="user_id is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
    public function year1()
    {
        $this->default_file();
        $where['year']=$user=$this->input->post('year');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getData('chart_calender', $where);
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="year is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
  
    public function result()
    {
        $this->default_file();
        $where['id']=$user=$this->input->post('gameid');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getData('batting', $where);
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="gameid is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
    public function transhistory()
    {
        $this->default_file();
        $where['user_id']=$user=$this->input->post('user_id');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('transactions_table', $where,'id');
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="user_id is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
     public function user_get()
    {
        $this->default_file();
        $where['id']=$user=$this->input->post('user_id');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('users', $where,'id');
         if($data1){
              $response['data']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="user_id is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
     public function contact_get()
    {
        $this->default_file();
        $where['user_id']=$user=$this->input->post('user_id');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('user_contact', $where,'id');
         if($data1){
              $response['data']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="user_id is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
      public function contact_ge()
    {
        $this->default_file();
        $where['user_id']=$user=$this->input->post('user_id');

        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('user_contact', $where,'id');
         if($data1){
              $response['data']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="user_id is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
     public function double_get()
    {
        $this->default_file();
        $where['id']=$user=$this->input->post('id');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('double', $where,'id');
         if($data1){
              $response['data']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="id is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
      public function report_crime_get()
    {
        $this->default_file();
        $where['user_id']=$user=$this->input->post('user_id');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('report_crime', $where,'id');
         if($data1){
              $response['data']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="user_id is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
    public function daten()
    {
        $this->default_file();
        $where['date']=$user=$this->input->post('date');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('calender', $where,'id');
         if($data1){
              $response['']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="date is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
   
    public function year()
    {
        $this->default_file();
        // $where['gamename']=$user=$this->input->post('gamename');
        $where['year']=$user=$this->input->post('year');
        $where['month']=$user=$this->input->post('month');
        $where['date']=$user=$this->input->post('date');
       // $data210['mobile']=$this->input->post('mobile');
        $where['rds']="1";
        // $where['gamename']="GALI";
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('chart_calender', $where,'id');
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="user_id is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
    
    public function calender()
    {
        $this->default_file();
        //$where['gamename']=$user=$this->input->post('gamename');
        $where['date']=$user=$this->input->post('date');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('chart_calender', $where,'id');
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="user_id is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
    public function battinghistory()
    {
        $this->default_file();
        $where['user_id']=$user=$this->input->post('user_id');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('batting', $where,'id');
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="user_id is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
    
    public function bh()
    {
        $this->default_file();
        $where['user_id']=$user=$this->input->post('user_id');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('batting', $where,'id');
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
        }else{
             
                        $response['msg']="user_id is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
    public function Withdrawl()
    {
        $this->default_file();
        $where['user_id']=$user=$this->input->post('user_id');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('withdrawl', $where,'id');
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="user_id is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
    public function gamechart()
    {
        $this->default_file();
        $where['year']=$user=$this->input->post('year');
        $where['month']=$user=$this->input->post('month');
        $where['gamename']=$user=$this->input->post('gamename');
       // $data210['mobile']=$this->input->post('mobile');
 
        $data1 =$this->Comman_model->getAllData('chart_calender', $where,'id');
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
     
    }
    public function month_chart()
    {
        $this->default_file();
        $where['month']=$user=$this->input->post('month');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('month', $where,'gameid');
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="gameid is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
     public function day_chart()
    {
        $this->default_file();
        $where['day']=$user=$this->input->post('day');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('month', $where,'gameid');
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="gameid is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
    public function date_chart()
    {
        $this->default_file();
        $where['date']=$user=$this->input->post('date');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('date', $where,'gameid');
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="gameid is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
    public function chart()
    {
        $this->default_file();
        $where['gameid']=$user=$this->input->post('gameid');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('batting', $where,'id');
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="gameid is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
    public function month()
    {
        $this->default_file();
        $where['gameid']=$user=$this->input->post('gameid');
        $where['month']=$user=$this->input->post('month');
       // $data210['mobile']=$this->input->post('mobile');
        
        if(!empty($user))
        {
                    $data1 =$this->Comman_model->getAllData('batting', $where,'id');
         if($data1){
              $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
         }else{
             $response['msg']="No Record Found";
                        $response['error']="400";
                        echo json_encode($response);
             
         }
             
            
        }else{
             
                        $response['msg']="gameid is Required";
                        $response['error']="400";
                        echo json_encode($response);
                    
        }
           
    
    }
     public function payinuser()
    {
        $this->default_file();
        $data110['id']=$this->input->post('user_id');
$data1222 =$this->Comman_model->getData('user_profile', $data110);
    
                if(!empty($data1222))
                {
                    if($this->input->post('user_id')!='')
                    {
                        if($this->input->post('amount')!='')
                        {
                                      $rah=date_default_timezone_set("Asia/Kolkata");
         $timer=date('Y-m-d h:i:s');
         $date=date('Y-m-d');
                                             $editup['user_id']=$this->input->post('user_id');
                                             $editup['type']="credit";
                                             $editup['amount']=$balam=$this->input->post('amount');
                                             $editup['description']="Amount Added UPI";
                                                     $editup['utr']=$this->input->post('description');                                  $editup['utr']=$timer;
                                                     $editup['datetime']=$date;
                                             $updated = $this->Comman_model->insertData('transactions_table',$editup);
                                          
       
            
                $balance=$data1222-> wallet;
                                             $data['wallet']=$balance+$balam;
                                                 $wher['id']=$this->input->post('user_id');
                                        $data1 =$this->Comman_model->UpdateRecord('user_profile', $data, $wher);
                                             if ($updated) 
                            			     {   
                            			        // $o=rand(111111,999999);
                                			    $response['id']=$updated;
                                			   // $response['otp']="$o";
                                                $response['msg']="Sucsess";
                                                $response['error']=200;
                                                echo json_encode($response);
                        			         }
                        			         else
                        			         {
                            			        $response['msg']="Not Sucsess";
                                                $response['error']=400;
                                                echo json_encode($response);
                        			         }
                                        }
                                            else
                    {
                        $response['msg']="amount";
                        $response['error']=400;
                        echo json_encode($response);
                    }
                }
                    else
                    {
                        $response['msg']="user_id is Required";
                        $response['error']=400;
                        echo json_encode($response);
                    }
                }
            }
       
   
    public function upcoming()
    {
        $this->default_file();
         $rah=date_default_timezone_set("Asia/Kolkata");
         $timer=date('H:i');
         $where['status']='1';
        $where['result']="0";
        // $where['time']=$catagory=$this->input->post('catagory');
        $updated =$this->Comman_model->getAllData('match', $where,'id');
          if ($updated) 
                            			     {   
                            			                 

                            			         //$o=rand(111111,999999);
                            			         $response['tttt']=date('H:i');
                                			    $response['game_id']=$updated;
                                			   // $response['otp']="$o";
                                                $response['msg']="Sucsess";
                                                $response['error']=200;
                                                echo json_encode($response);
                        			         }
                        			         else
                        			         {
                            			        $response['msg']="Not Sucsess";
                                                $response['error']=400;
                                                echo json_encode($response);
                        			         }
                                        }
                                        
      public function update_users()
    {
       $this->default_file();
        $where['id']=$this->input->post('id');
        
        if($this->input->post('name')!='')
        {
            $data['name']=$this->input->post('name');
        }
        if($this->input->post('mobile')!='')
        {
            $data['mobile']=$this->input->post('mobile');
        }
        if($this->input->post('email')!='')
        {
            $data['email']=$this->input->post('email');
         }
		 if($this->input->post('age')!='')
        {
            $data['age']=$this->input->post('age');
        }
        if($this->input->post('address')!='')
        {
            $data['address']=$this->input->post('address');
        }
        
        
            $data1 =$this->Comman_model->UpdateRecord('users', $data, $where);
                  //  $data1 =$this->Comman_model->getData('user_profile', $data,$where);
        if(!empty($data1))
        {
            $response['id']=$this->input->post('id');
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
        
   }                                    
         public function update_contact()
    {
       $this->default_file();
        $where['id']=$this->input->post('id');
        
        if($this->input->post('name')!='')
        {
            $data['name']=$this->input->post('name');
        }
        if($this->input->post('phone')!='')
        {
            $data['phone']=$this->input->post('phone');
        }
        if($this->input->post('email')!='')
        {
            $data['email']=$this->input->post('email');
        }
            $data1 =$this->Comman_model->UpdateRecord('user_contact', $data, $where);
                  //  $data1 =$this->Comman_model->getData('user_profile', $data,$where);
        if(!empty($data1))
        {
            $response['id']=$this->input->post('id');
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
        
   }                                    
       
        
        
    
    public function upcoming_games()
    {
        $this->default_file();
        $data110['game_id']=$this->input->post('game_id');
        $data210['game_name']=$this->input->post('game_name');
        $data1 =$this->Comman_model->getData('upcoming_games01', $data110);
        $data2 =$this->Comman_model->getData('upcoming_games01', $data210);
        if(empty($data2))
        {
            if(empty($data1))
            {
               // $data22['name']=$this->input->post('name');
                $data110 =$this->Comman_model->getData('upcoming_games01', $data110);
                if(empty($data1222))
                {
                    
                       if($this->input->post('game_name')!='')
                        {
                               if($this->input->post('bet_close_time')!='')
                                {
                                    if($this->input->post('bet_result_time')!='')
                                    {
                                        
                                             $editup['game_name']=$this->input->post('game_name');
                                             $editup['bet_close_time']=$this->input->post('bet_close_time');
                                             $editup['bet_result_time']=$this->input->post('bet_result_time');
                                           //  $editup['state']=$this->input->post('state');
                                             //  $editup['status']="1";
                                             
                                             //$editup['mobile']=$this->input->post('mobile');
                                             $updated = $this->Comman_model->insertData('upcoming_games01',$editup);
                                             if ($updated) 
                            			     {   
                            			         //$o=rand(111111,999999);
                                			    $response['game_id']=$updated;
                                			   // $response['otp']="$o";
                                                $response['msg']="Sucsess";
                                                $response['error']=200;
                                                echo json_encode($response);
                        			         }
                        			         else
                        			         {
                            			        $response['msg']="Not Sucsess";
                                                $response['error']=400;
                                                echo json_encode($response);
                        			         }
                                        }
                                        else
                                        {
                                            $response['msg']=" bet_result_time is Required";
                                            $response['error']="400";
                                            echo json_encode($response);
                                        }
                                    }
                                    else
                                    {
                                        $response['msg']="bet_close_time is Required";
                                        $response['error']="400";
                                        echo json_encode($response);
                                    }
                                }
                              
                        else
                                {
                                    $response['msg']="game_name is Required";
                                    $response['error']="400";
                                    echo json_encode($response);
                                }
                        }
                        
                    }
                    
                
            }

    
    }
    
    
    public function otplogin()
    {
        $this->default_file();
        
        $where['mobile']=$email=$this->input->post('mobile');
                $where['status']="1";

        // $where['password']=$password=$this->input->post('password');
   		   
        if($email!='')
        {
               		    $data1=$this->Comman_model->getdata('users',$where);

                  if($data1)
               {
                    $o=rand(111111,999999);
                    $response['otp']=" $o";
                    $response['id']=$data1;
                    $response['msg']="Sucsess";
                    $response['error']="200";
                    echo json_encode($response);
               }
               else
               {
                    $response['msg']=" mobile dont match";
                    $response['error']="400";
                    echo json_encode($response);
               }
            }
        else
        {
            $response['msg']="Please Enter mobile";
            $response['error']="400";
            echo json_encode($response);
        }
        
        
    }
      public function otpphon()
    {
        $this->default_file();
        
        $where['mobile']=$email=$this->input->post('phone');
              //  $where['status']="1";

        // $where['password']=$password=$this->input->post('password');
   		   
        if($email!='')
        {
               		    $data1=$this->Comman_model->getdata('users',$where);

                  if($data1)
               {
                    $o=rand(111111,999999);
                    $response['otp']=" $o";
                    $response['id']=$data1;
                    $response['msg']="Sucsess";
                    $response['error']="200";
                    echo json_encode($response);
               }
               else
               {
                    $response['msg']="phone dont match";
                    $response['error']="400";
                    echo json_encode($response);
               }
            }
        else
        {
            $response['msg']="Please Enter phone";
            $response['error']="400";
            echo json_encode($response);
        }
        
        
    }
      public function otpphone()
    {
        $this->default_file();
         
		    if($this->input->post('phone')!='')
		    		        {
		           
        		            $data11['mobile']=$this->input->post('phone');
        		            $data10 =$this->Comman_model->getData('users', $data11);
        		            
        		            if(!empty($data10))
        		            {
        		                
        		                 
        		                     $response['msg']="Successfully Login";
                                    $response['error']="200";
                                    $response['data']=$data10;
                                   
                                                                        

                                    echo json_encode($response);
        		                }
        		             
        		            else
        		            {
        		                        		                
        		                $response['msg']="Your Phone No Not register";
                                $response['error']="400";
                                
                         
                               
                                echo json_encode($response);
        		            }
        		      
        		       
		        }
		       
		    
		    else
		    {
		         $response['msg']="Please Enter Phone No";
                $response['error']=400;
                echo json_encode($response);
		    } 
   		
    
    }
      public function otpmobile()
    {
        $this->default_file();
        
        $where['mobile']=$mobile=$this->input->post('mobile');
                $where['status']="1";

        // $where['password']=$password=$this->input->post('password');
   		if($mobile!='1234567890')   
   		{
            if($mobile!='')
            {
                   		    $data1=$this->Comman_model->getdata('user_profile',$where);
    
                      if($data1)
                   {
                        $o=rand(111111,999999);
                        $response['otp']=" $o";
                        $response['id']=$data1;
                        $response['msg']="Sucsess";
                        $response['error']="200";
                        echo json_encode($response);
                   }
                   else
                   {
                        $response['msg']="mobile & password dont match";
                        $response['error']="400";
                        echo json_encode($response);
                   }
            }
            else
            {
                $response['msg']="Please Enter mobile";
                $response['error']="400";
                echo json_encode($response);
            }
   		}
   		else
   		{
   		        $data1=$this->Comman_model->getdata('user_profile',$where);
    
                      if($data1)
                   {
                        $response['id']=$data1;
                        $response['msg']="Sucsess";
                        $response['error']="200";
                        echo json_encode($response);
                   }
   		}
        
        
    }
     public function slider()
    {
        $this->default_file();
        
       // $where['mobile']=$email=$this->input->post('email');
                $where['status']="1";

        // $where['password']=$password=$this->input->post('password');
   		   
    
               		    $data1=$this->Comman_model->getAlldata('slider',$where);

                  if($data1)
               {
                   // $o=rand(111111,999999);
                  //  $response['otp']=" $o";
                    $response['id']=$data1;
                    $response['msg']="Sucsess";
                    $response['error']="200";
                    echo json_encode($response);
               }
              
            
       
        
        
    }
    
        public function userlogin()
    {
        $this->default_file();
        
        $where['email']=$email=$this->input->post('email');
        
        $where['password']=$password=$this->input->post('password');
    $where['status']="1";
        if($email!='')
        {
               		    $data1=$this->Comman_model->getdata('user_profile',$where);

                  if($data1)
               {
                    $o=rand(111111,999999);
                    $response['otp']=" $o";
                    $response['data']=$data1;
                    $response['msg']="Sucsess";
                    $response['error']="200";
                    echo json_encode($response);
               }
               else
               {
                    $response['msg']="email & password dont match";
                    $response['error']="400";
                    echo json_encode($response);
               }
            }
        else
        {
            $response['msg']="Please Enter email";
            $response['error']="400";
            echo json_encode($response);
        }
        
        
    }
     public function search()
    {
        $this->default_file();
        $search_value=$data['search'];
        //$qry="SELECT * FROM user_profile WHERE name  LIKE '%{$search_value}%'";
        //$res=mysqli_query($dbconn,$qry);
    	//$num=mysqli_num_rows($res);
    //	$row=mysqli_fetch_array($res);
    $updated = $this->Comman_model->searchdata('user_profile',$editup);
        if($row )
        {
          	$response['status']="200";
        	$response['message']="User found";
        	   $response['data']=$row;
        }
        else
        {
        	$response['status']="400";
        	$response['message']="User not found";
        	$response['data']=$row;
        
        }
     
    echo json_encode($response);

    }
    
    public function event()
    {
        $this->default_file();
        $where['status']='1';
        $where['catagory']=$catagory=$this->input->post('catagory');
        $data1 =$this->Comman_model->getAllData('event', $where,'id');
        // print_r($data1);
        // die;
        if(!empty($data1))
        {
             $response['event']=$data1;
            foreach($data1 as $key =>$e)
            {
                if($e->country!='')
                {
                 $w['id']=$e->country;
                $d =$this->Comman_model->getData('country', $w);
                 $response['event'][$key]->country=$d->country;
                } 
                else{
                    $response['event'][$key]->country="";
                }
                
                if($e->city!='')
                {
                 $w['id']=$e->city;
                    $d=$this->Comman_model->getData('city', $w);
              
                    if($d->city)
                    {
                        $response['event'][$key]->city=@$d->city;
                    }
                    else
                    {
                          $response['event'][$key]->city="";
                    }
                } 
                else{
                    $response['event'][$key]->city="";
                }
                  if($e->state!='')
                {
                 $w['id']=$e->state;
                $d =$this->Comman_model->getData('state', $w);
                 $response['event'][$key]->state=$d->state;
                } 
                else{
                    $response['event'][$key]->state="";
                }
                
                
                if($e->userid!='')
                {
                    if($e->userid=='0')
                    {
                        
                         $response['event'][$key]->event_post_user="Admin";
                    }
                    else
                    {
                     $w10['id']=$e->userid;
                    $d10 =$this->Comman_model->getData('user', $w10);
                        if(!empty($d10))
                        {   
                            @$response['event'][$key]->event_post_user=$d10->name;
                        }
                        else
                        {
                             $response['event'][$key]->event_post_user="Admin";
                        }
                    }

                } 
                else{
                    $response['event'][$key]->event_post_user="Admin";
                }
                
               $eid= $e->id;
               if($eid!='')
               {
               $aa=$this->db->query("SELECT `book_event`.`userid`,user.name FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
              $a= $aa->result();
              if(!empty($a))
              {
            foreach($a as $k => $ui)
                {
                     @$response['event'][$key]->users[$k]->username=$ui->name;
                      @$response['event'][$key]->users[$k]->userimage=base_url().'uploads/event/'.$ui->image;
                    //   $response['event'][$key]->users=$d->state;
                     //=base_url().'uploads/event/'.$ui->image;
                }
              }
               
                $whe1['event_id']=$e->id;
                $d =$this->Comman_model->getAllData('event_view', $whe1,'id');
                $totalview=count($d);
                
                $d1 =$this->Comman_model->getAllData('favorite', $whe1,'id');
                $totalfavorite=count($d1);
               $response['event'][$key]->totalview=strval($totalview);
               $response['event'][$key]->totalfavorite=strval($totalfavorite);
               }
            }
            //echo $data1->id; die;
           
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    
    public function event_booking()
    {
         $this->default_file();
         
                if($this->input->post('event_id')!='')
                {
                    if($this->input->post('price')!='')
                    {
                      if($this->input->post('userid')!='')
                      {
                            if($this->input->post('quantity')!='')
                            {
                        	  $editup['event_id']=$this->input->post('event_id');
                        	  $editup['price']=$this->input->post('price');
                        	  $editup['userid']=$this->input->post('userid');
                        	  $editup['quantity']=$this->input->post('quantity');
                        	  $insert=$this->Comman_model->insertData('book_event',$editup);
                        	  if($insert)
                               {
                                   
                                    $response['msg']="Sucsess";
                                    $response['error']=200;
                                    echo json_encode($response);
                                }
                                else
                                {
                                    $response['msg']="Internet Server Error";
                                    $response['error']=400;
                                    echo json_encode($response);
                                }
                                }
                                else
                                {
                                $response['msg']="quantity ID is Required";
                                $response['error']=400;
                                echo json_encode($response);
                                }
        
                                }
                                else
                                {
                                $response['msg']="userid is Required";
                                $response['error']=400;
                                echo json_encode($response);
                                }
                                }
                                else
                                {
                                $response['msg']="price  is Required";
                                $response['error']=400;
                                echo json_encode($response);
                                }
    
                                }
                                else
                                {
                                $response['msg']="Event id is Required";
                                $response['error']=400;
                                echo json_encode($response);
                                }
    }
    
    public function my_event()
    {
        $this->default_file();
        $where['userid']=$this->input->post('userid');
        $data1 =$this->Comman_model->getAllData('book_event', $where,'id');
        if(!empty($data1))
        {
            $response['event']=$data1;
            foreach($data1 as $key =>$e)
            {
                $eid= $e->event_id;
                $wherea['id']=$eid;
                    $dataw1 =$this->Comman_model->getData('event', $wherea);
                    $response['event'][$key]=$dataw1;                  
                    if($dataw1->country!='')
                    {
                        $w['id']=$dataw1->country;
                        $d =$this->Comman_model->getData('country', $w);
                        $response['event'][$key]->country=$d->country;
                    } 
                    else
                    {
                        $response['event'][$key]->country="";
                    }
                
                   if($dataw1->city!='')
                    {
                        $w['id']=$dataw1->city;
                        $d=$this->Comman_model->getData('city', $w);
              
                        if($d->city)
                        {
                            $response['event'][$key]->city=@$d->city;
                        }
                        else
                        {
                              $response['event'][$key]->city="";
                        }
                    } 
                    else
                    {
                        $response['event'][$key]->city="";
                    }
                    if($dataw1->state!='')
                    {
                        $w['id']=$dataw1->state;
                        $d =$this->Comman_model->getData('state', $w);
                        $response['event'][$key]->state=$d->state;
                    } 
                    else
                    {
                        $response['event'][$key]->state="";
                    }
                    if($dataw1->catagory!='')
                    {
                        $w['id']=$dataw1->catagory;
                        $d =$this->Comman_model->getData('catagory', $w);
                        $response['event'][$key]->catagory=$d->catagory;
                    } 
                    else
                    {
                        $response['event'][$key]->catagory="";
                    }
                    if($dataw1->smoking!='')
                    {
                        $w['id']=$dataw1->smoking;
                        $d =$this->Comman_model->getData('smoking', $w);
                        $response['event'][$key]->smoking=$d->smoking;
                    } 
                    else
                    {
                        $response['event'][$key]->smoking="no";
                    }
                    if($dataw1->drinking!='')
                    {
                        $w['id']=$dataw1->drinking;
                        $d =$this->Comman_model->getData('drinking', $w);
                        $response['event'][$key]->drinking=$d->drinking;
                    } 
                    else
                    {
                        $response['event'][$key]->drinking="no";
                    }
                    if($dataw1->intrested_in!='')
                    {
                        $w['id']=$dataw1->intrested_in;
                        $d =$this->Comman_model->getData('intrested', $w);
                        $response['event'][$key]->intrested_in=$d->intrested;
                    } 
                    else
                    {
                        $response['event'][$key]->intrested_in="";
                    }
                    if($dataw1->eligibility!='')
                    {
                        $w['id']=$dataw1->eligibility;
                        $d =$this->Comman_model->getData('eligibility', $w);
                        $response['event'][$key]->eligibility=$d->eligibility;
                    } 
                    else
                    {
                        $response['event'][$key]->eligibility="";
                    }
                     if($dataw1->name!='')
                    {
                        
                        $response['event'][$key]->name=$dataw1->name;
                    } 
                    else
                    {
                        $whe1111['id']=$dataw1->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if($use->name!='')
                        {
                            $response['event'][$key]->name=$use->name;
                        }
                        else
                        {
                        $response['event'][$key]->name="";
                        }
                    }
                    
                    if($dataw1->mobile_no!='')
                    {
                        
                        $response['event'][$key]->mobile_no=$dataw1->mobile_no;
                    } 
                    else
                    {
                        $whe1111['id']=$dataw1->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if($use->mobile_no!='')
                        {
                            $response['event'][$key]->mobile_no=$use->mobile_no;
                        }
                        else
                        {
                        $response['event'][$key]->mobile_no="";
                        }
                    }
                    
                    if($dataw1->email!='')
                    {
                        
                        $response['event'][$key]->email=$dataw1->email;
                    } 
                    else
                    {
                        $whe1111['id']=$dataw1->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if($use->email!='')
                        {
                            $response['event'][$key]->email=$use->email;
                        }
                        else
                        {
                        $response['event'][$key]->email="";
                        }
                    }
                     if($dataw1->hobby!='')
                    {
                        $w['id']=$dataw1->hobby;
                        $d =$this->Comman_model->getData('hobby', $w);
                        $response['event'][$key]->hobby=$d->hobby;
                    } 
                    else
                    {
                        $response['event'][$key]->hobby="";
                    }
                    
                
                
                $aa=$this->db->query("SELECT `book_event`.`userid`,user.name FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
                $a= $aa->result();
                foreach($a as $k => $ui)
                {
                     $response['event'][$key]->users[$k]->username=$ui->name;
                      $response['event'][$key]->users[$k]->userimage=base_url().'uploads/event/'.$ui->image;
                    //   $response['event'][$key]->users=$d->state;
                     //=base_url().'uploads/event/'.$ui->image;
                }
                
                
                $whe1['event_id']=$e->id;
                $d =$this->Comman_model->getAllData('event_view', $whe1,'id');
                
                $d1 =$this->Comman_model->getAllData('favorite', $whe1,'id');
               $response['event'][$key]->totalview=count($d);
               $response['event'][$key]->totalfavorite=count($d1);
                  
               
            }
                //echo $data1->id; die;
           
                $response['msg']="Sucsess";
                $response['error']=200;
                echo json_encode($response);
            }
            else
            {
                $response['msg']="No record found";
                $response['error']=400;
                echo json_encode($response);
            }
    }
    
    public function my_eventdetails()
    {
        $this->default_file();
        $where['userid']=$userid=$this->input->post('userid');
        $where['id']=$this->input->post('bookingid');
       // $where['status']='1';
        if($this->input->post('userid')!='')
        {
        $data11 =$this->Comman_model->getData('book_event', $where);
        		            
        if(!empty($data11))
        {
            $response['event']=$data11;
            
            
                $eid= $data11->event_id;
                $wherea['id']=$eid;
                 $dataw1 =$this->Comman_model->getData('event', $wherea);
                 if($dataw1->country!='')
                    {
                        $w['id']=$dataw1->country;
                        $d =$this->Comman_model->getData('country', $w);
                        $response['event']->country=$d->country;
                    } 
                    else
                    {
                        $response['event']->country="";
                    }
                
                   if($dataw1->city!='')
                    {
                        $w['id']=$dataw1->city;
                        $d=$this->Comman_model->getData('city', $w);
              
                        if($d->city)
                        {
                            $response['event']->city=@$d->city;
                        }
                        else
                        {
                              $response['event']->city="";
                        }
                    } 
                    else
                    {
                        $response['event']->city="";
                    }
                    if($dataw1->state!='')
                    {
                        $w['id']=$dataw1->state;
                        $d =$this->Comman_model->getData('state', $w);
                        $response['event']->state=$d->state;
                    } 
                    else
                    {
                        $response['event']->state="";
                    }
                    if($dataw1->catagory!='')
                    {
                        $w['id']=$dataw1->catagory;
                        $d =$this->Comman_model->getData('catagory', $w);
                        $response['event']->catagory=$d->catagory;
                    } 
                    else
                    {
                        $response['event']->catagory="";
                    }
                    if($dataw1->smoking!='')
                    {
                        $w['id']=$dataw1->smoking;
                        $d =$this->Comman_model->getData('smoking', $w);
                        $response['event']->smoking=$d->smoking;
                    } 
                    else
                    {
                        $response['event']->smoking="no";
                    }
                    if($dataw1->drinking!='')
                    {
                        $w['id']=$dataw1->drinking;
                        $d =$this->Comman_model->getData('drinking', $w);
                        $response['event']->drinking=$d->drinking;
                    } 
                    else
                    {
                        $response['event']->drinking="no";
                    }
                    if($dataw1->intrested_in!='')
                    {
                        $w['id']=$dataw1->intrested_in;
                        $d =$this->Comman_model->getData('intrested', $w);
                        $response['event']->intrested_in=$d->intrested;
                    } 
                    else
                    {
                        $response['event']->intrested_in="";
                    }
                    if($dataw1->eligibility!='')
                    {
                        $w['id']=$dataw1->eligibility;
                        $d =$this->Comman_model->getData('eligibility', $w);
                        $response['event']->eligibility=$d->eligibility;
                    } 
                    else
                    {
                        $response['event']->eligibility="";
                    }
                     if($dataw1->name!='')
                    {
                        
                        $response['event']->name=$dataw1->name;
                    } 
                    else
                    {
                        $whe1111['id']=$dataw1->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if($use->name!='')
                        {
                            $response['event']->name=$use->name;
                        }
                        else
                        {
                        $response['event']->name="";
                        }
                    }
                    
                    if($dataw1->mobile_no!='')
                    {
                        
                        $response['event']->mobile_no=$dataw1->mobile_no;
                    } 
                    else
                    {
                        $whe1111['id']=$dataw1->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if($use->mobile_no!='')
                        {
                            $response['event']->mobile_no=$use->mobile_no;
                        }
                        else
                        {
                        $response['event']->mobile_no="";
                        }
                    }
                    
                    if($dataw1->email!='')
                    {
                        
                        $response['event']->email=$dataw1->email;
                    } 
                    else
                    {
                        $whe1111['id']=$dataw1->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if($use->email!='')
                        {
                            $response['event']->email=$use->email;
                        }
                        else
                        {
                        $response['event']->email="";
                        }
                    }
                     if($dataw1->hobby!='')
                    {
                        $w['id']=$dataw1->hobby;
                        $d =$this->Comman_model->getData('hobby', $w);
                        $response['event']->hobby=$d->hobby;
                    } 
                    else
                    {
                        $response['event']->hobby="";
                    }
                    
                 
                 
                 
                 
                 $aa=$this->db->query("SELECT `book_event`.`userid`,user.name FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
                $a= $aa->result();
                $response['event']->eventdetails=$dataw1;
                foreach($a as $k => $ui)
                {
                     $response['event']->users[$k]->username=$ui->name;
                      $response['event']->users[$k]->userimage=base_url().'uploads/event/'.$ui->image;
                    //   $response['event'][$key]->users=$d->state;
                     //=base_url().'uploads/event/'.$ui->image;
                }
                
                
                $whe1['event_id']=$e->id;
                $d =$this->Comman_model->getAllData('event_view', $whe1,'id');
                
                $d1 =$this->Comman_model->getAllData('favorite', $whe1,'id');
               $response['event']->totalview=count($d);
               $response['event']->totalfavorite=count($d1);
                
                
                
                $response['msg']="Successfully";
                $response['error']=200;
                echo json_encode($response);
        }
        else
        {
            $response['msg']="Someting Went Wrong";
            $response['error']=400;
            echo json_encode($response);
        }
       }
       else
       {
           $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
       }
        
    }
    
    public function intrested()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('intrested', $where,'id');
        if(!empty($data1))
        {
            $response['intrested']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function gender()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('gender', $where,'id');
        if(!empty($data1))
        {
            $response['gender']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function smoking()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('smoking', $where,'id');
        if(!empty($data1))
        {
            $response['smoking']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function drinking()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('drinking', $where,'id');
        if(!empty($data1))
        {
            $response['drinking']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function organization()
    {
        $this->default_file();
        $data110['email']=$this->input->post('email');
        $data1 =$this->Comman_model->getData('user', $data110);
        if(empty($data1))
        {
            $data22['mobile_no']=$this->input->post('mobile');
            $data1222 =$this->Comman_model->getData('user', $data22);
            if(empty($data1222))
            {
                if($this->input->post('fname')!='')
                {
                    if($this->input->post('email')!='')
                    {
                      
                      if($this->input->post('mobile')!='')
                        {
                           if($this->input->post('password')!='')
                            {
                            if($this->input->post('country')!='')
                                {
                                if($this->input->post('state')!='')
                                    {
                                    if($this->input->post('city')!='')
                                    {
                                        if($this->input->post('gender')!='')
                                    {
                                        if($this->input->post('dob')!='')
                                    {
                                        if($this->input->post('hobby')!='')
                                    {
                                        if($this->input->post('smoking')!='')
                                    {
                                         if($this->input->post('drinking')!='')
                                    {   
                                        if($this->input->post('intrested_in')!='')
                                    {   
                                        if($this->input->post('expected_time')!='')
                                    {   
                                      $editup['name']=$this->input->post('fname');
                                	  $editup['email']=$this->input->post('email');
                                	  $editup['mobile_no']=$this->input->post('mobile');
                                	  $editup['password']=$this->input->post('password');
                                	  $editup['country']=$this->input->post('country');
                                	  $editup['state']=$this->input->post('state');
                                	  $editup['city']=$this->input->post('city');
                                	  $editup['gender']=$this->input->post('gender');
                                	  $editup['dob']=$this->input->post('dob');
                                	  $editup['hobby']=$this->input->post('hobby');
                                	  $editup['smoking']=$this->input->post('smoking');
                                	  $editup['drinking']=$this->input->post('drinking');
                                	  $editup['intrested_in']=$this->input->post('intrested_in');
                                	  $editup['user_type']='2';
                                        if($this->input->post('dob')!='')
                                	    {
                                	        $editup['dob']=$this->input->post('dob');
                                	    }
                                	    $updated = $this->Comman_model->insertData('user',$editup);
                                	    
                                	if ($updated) 
                            			{
                            			    $response['user_id']=$updated;
                                            $response['msg']="Sucsess";
                                            $response['error']=200;
                                            echo json_encode($response);
                        			    } 
                        			else 
                        			    {
                                        $response['msg']="Something went wrong";
                                        $response['error']=400;
                                        echo json_encode($response);
                         			    }
                             			
                                    }
                                    else
                                      {
                                        $response['msg']="Your interested is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="drinking is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="Smoking is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="Hobby is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="DOB is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="Gender is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="City is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="State is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="Country is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="Password is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                            $response['msg']="Mobile Number is Required";
                                            $response['error']=400;
                                            echo json_encode($response);
                                      }
                                        
                                    }
                                    else
                                    {
                                            $response['msg']="Email Address is Required";
                                            $response['error']=400;
                                            echo json_encode($response);
                                    }
                                    }
                                    else
                                    {
                                            $response['msg']="Full Name is Required";
                                            $response['error']=400;
                                            echo json_encode($response);
                                            }
                                        }
                                    else
                                        {
                                            $response['msg']="Mobile Alrady Register";
                                            $response['error']=400;
                                            echo json_encode($response);
                                        }
                                    }
        else
        {
            $response['msg']="Email Alrady Register";
            $response['error']=400;
            echo json_encode($response);
        }
    
    }
    
}

    public function event_organizer()
    {
        $this->default_file();
        $data110['email']=$this->input->post('email');
    $data1 =$this->Comman_model->getData('organizer', $data110);
        if(empty($data1))
        {
            $data22['mobile_no']=$this->input->post('mobile');
            $data1222 =$this->Comman_model->getData('organizer', $data22);
            if(empty($data1222))
            {
                if($this->input->post('fname')!='')
                {
                    if($this->input->post('email')!='')
                    {
                      
                       
                        if($this->input->post('mobile')!='')
                         {
                          if($this->input->post('password')!='')
                           {
                            
                                if($this->input->post('country')!='')
                                {
                                if($this->input->post('state')!='')
                                {
                                if($this->input->post('city')!='')
                                    {
                                if($this->input->post('address')!='')
                                    {
                                if($this->input->post('gender')!='')
                                    {
                                if($this->input->post('dob')!='')
                                    {
                                if($this->input->post('hobby')!='')
                                    {
                                if($this->input->post('smoking')!='')
                                    {
                                if($this->input->post('drinking')!='')
                                    {   
                                if($this->input->post('intrested_in')!='')
                                    {   
                                if($this->input->post('partydetails')!='')
                                    {   
                                if($this->input->post('eligibility')!='')
                                    {   
                                if($this->input->post('charges')!='')
                                    {   
                                if($this->input->post('offer')!='')
                                    {   
                                if($this->input->post('day')!='')
                                    {   
                                if($this->input->post('expected_time')!='')
                                    {   
                                      $editup['name']=$this->input->post('fname');
                                	  $editup['email']=$this->input->post('email');
                                	  $editup['mobile_no']=$this->input->post('mobile');
                                	  $editup['password']=$this->input->post('password');
                                	  $editup['country']=$this->input->post('country');
                                	  $editup['state']=$this->input->post('state');
                                	  $editup['city']=$this->input->post('city');
                                	  $editup['address']=$this->input->post('address');
                                	  $editup['gender']=$this->input->post('gender');
                                	  $editup['dob']=$this->input->post('dob');
                                	  $editup['hobby']=$this->input->post('hobby');
                                	  $editup['smoking']=$this->input->post('smoking');
                                	  $editup['drinking']=$this->input->post('drinking');
                                	  $editup['intrested_in']=$this->input->post('intrested_in');
                                	  $editup['partydetails']=$this->input->post('partydetails');
                                	  $editup['eligibility']=$this->input->post('eligibility');
                                	  $editup['charges']=$this->input->post('charges');
                                	  $editup['offer']=$this->input->post('offer');
                                	  $editup['day']=$this->input->post('day');
                                	  $editup['expected_time']=$this->input->post('expected_time');
                                	  $editup['user_type']='2';
                                        if($this->input->post('dob')!='')
                                	    {
                                	        $editup['dob']=$this->input->post('dob');
                                	    }
                                	    $updated = $this->Comman_model->insertData('organizer',$editup);
                                	    
                                	if ($updated) 
                            			{
                            			    $response['user_id']=$updated;
                                            $response['msg']="Sucsess";
                                            $response['error']=200;
                                            echo json_encode($response);
                        			    } 
                        			else 
                        			    {
                                        $response['msg']="Something went wrong";
                                        $response['error']=400;
                                        echo json_encode($response);
                         			    }
                             			
                                    }
                                    else
                                      {
                                        $response['msg']="Expected Time is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                     else
                                      {
                                        $response['msg']="Day is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                     else
                                      {
                                        $response['msg']="Offer is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                     else
                                      {
                                        $response['msg']="Charges is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                     else
                                      {
                                        $response['msg']="Eligibility is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                      else
                                      {
                                        $response['msg']="Party Details is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="Your interested is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="drinking is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="Smoking is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="Hobby is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="DOB is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="Gender is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                     else
                                      {
                                        $response['msg']="Address is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                      {
                                        $response['msg']="City is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                     }
                                    else
                                    {
                                        $response['msg']="State is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                    }
                                    else
                                    {
                                        $response['msg']="Country is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                    }
                                    
                                    else
                                    {
                                        $response['msg']="Password is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                    }
                                    else
                                    {
                                            $response['msg']="Mobile Number is Required";
                                            $response['error']=400;
                                            echo json_encode($response);
                                      }
                                        
                                    }
                                    
                                    else
                                    {
                                            $response['msg']="Email Address is Required";
                                            $response['error']=400;
                                            echo json_encode($response);
                                    }
                                    }
                                    else
                                    {
                                            $response['msg']="Full Name is Required";
                                            $response['error']=400;
                                            echo json_encode($response);
                                            }
                                    }
                                    else
                                    {
                                            $response['msg']="Mobile Alrady Register";
                                            $response['error']=400;
                                            echo json_encode($response);
                                        }
                                    }
                                    else
                                    {
                                        $response['msg']="Email Alrady Register";
                                        $response['error']=400;
                                        echo json_encode($response);
                                    }
    
    }
    
    
    
    public function postevent_new()
    {
            $this->load->model('Comman_model');
            $this->form_validation->set_rules('userid', 'userid', 'required');
            // $this->form_validation->set_rules('fname', 'fname', 'required');
            // $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('catagory', 'catagory', 'required');
            $this->form_validation->set_rules('short_description', 'short_description', 'required');
            $this->form_validation->set_rules('full_description', 'full_description', 'required');
            // $this->form_validation->set_rules('mobile', 'mobile', 'required');
            // $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('state', 'state', 'required');
            $this->form_validation->set_rules('city', 'city', 'required');
            $this->form_validation->set_rules('address', 'address', 'required');
            // $this->form_validation->set_rules('gender', 'gender', 'required');
            // $this->form_validation->set_rules('dob', 'dob', 'required');
            // $this->form_validation->set_rules('hobby', 'hobby', 'required');
            $this->form_validation->set_rules('smoking', 'smoking', 'required');
            $this->form_validation->set_rules('drinking', 'drinking', 'required');
            // $this->form_validation->set_rules('intrested_in', 'intrested_in', 'required');
            $this->form_validation->set_rules('partydetails', 'partydetails', 'required');
            $this->form_validation->set_rules('eligibility', 'eligibility', 'required');
            $this->form_validation->set_rules('price', 'price', 'required');
            // $this->form_validation->set_rules('offer', 'offer', 'required');
            $this->form_validation->set_rules('day', 'day', 'required');
            $this->form_validation->set_rules('expected_time', 'expected_time', 'required');
            $this->form_validation->set_rules('expected_guest', 'expected_guest', 'required');
        if (!$this->form_validation->run()) 
            {
                    $response['msg']=strip_tags(validation_errors());
                    $response['error']="400";
                    echo json_encode($response);
            }
        else
            {
                
                
                $config['upload_path']          = 'uploads/users/';
                $config['allowed_types']        = '*';
                
                $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $response['msg']=$error;
                    $response['error']="400";
                    echo json_encode($response);
                }
            else
                {
                    $data = $this->upload->data();
                    $picture = $data['file_name'];
                    
                    $editup['userid']= $this->input->post('userid');
                    // $editup['name']= $this->input->post('fname');
                    // $editup['email']= $this->input->post('email');
                    $editup['title']= $this->input->post('title');
                    $editup['catagory']= $this->input->post('catagory');
                    $editup['short_description']= $this->input->post('short_description');
                    $editup['full_description']= $this->input->post('full_description');
                    // $editup['mobile_no']= $this->input->post('mobile');
                    // $editup['password']= $this->input->post('password');
                    $editup['country']= $this->input->post('country');
                    $editup['state']= $this->input->post('state');
                    $editup['city']= $this->input->post('city');
                    $editup['address']= $this->input->post('address');
                    // $editup['gender']= $this->input->post('gender');
                    // $editup['dob']= $this->input->post('dob');
                    // $editup['hobby']= $this->input->post('hobby');
                    $editup['smoking']= $this->input->post('smoking');
                    $editup['drinking']= $this->input->post('drinking');
                    // $editup['intrested_in']= $this->input->post('intrested_in');
                    $editup['partydetails']= $this->input->post('partydetails');
                    $editup['eligibility']= $this->input->post('eligibility');
                    $editup['price']= $this->input->post('price');
                    // $editup['offer']= $this->input->post('offer');
                    $editup['day']= $this->input->post('day');
                    $editup['expected_time']= $this->input->post('expected_time');
                    $editup['expected_guest']= $this->input->post('expected_guest');
                    $editup['user_type']='2';
                    $editup['file']=$picture;
                    $editup['date']=date('Y-m-d');
                        $editup['date_time']=date('Y-m-d H:i:s');
                    
                    
                    $editup['status']='0';
                	$updated = $this->Comman_model->insertData('event',$editup);
                                	    
                        if ($updated) 
                    		{
                			    $response['user_id']=$updated;
                                $response['msg']="Sucsess";
                                $response['error']=200;
                                echo json_encode($response);
                			} 
            			else 
            			{
                            $response['msg']="Something went wrong";
                            $response['error']=400;
                            echo json_encode($response);
             			}
                    
                }
                
                
                
            }
    }
                            
    public function todayevent()
    {
        $this->default_file();
        // $where['status']='1';
        // $where['today_event']='1';
        
        // $where['date']=date('Y-m-d');
        $where['catagory']=$catagory=$this->input->post('catagory');
        $data1 =$this->Comman_model->getAllData('event', $where,'id');
       if(!empty($data1))
        {
             $response['event']=$data1;
            foreach($data1 as $key =>$e)
            {
                if($e->country!='')
                {
                 $w['id']=$e->country;
                $d =$this->Comman_model->getData('country', $w);
                 $response['event'][$key]->country=$d->country;
                } 
                else{
                    $response['event'][$key]->country="";
                }
                
                if($e->city!='')
                {
                 $w['id']=$e->city;
                $d =$this->Comman_model->getData('city', $w);
                 $response['event'][$key]->city=$d->city;
                } 
                else{
                    $response['event'][$key]->city="";
                }
                  if($e->state!='')
                {
                $w['id']=$e->state;
                $d =$this->Comman_model->getData('state', $w);
                $response['event'][$key]->state=$d->state;
                
                } 
                else{
                    $response['event'][$key]->state="";
                }
                 if($e->catagory!='')
                    {
                         
                        $w['id']=$e->catagory;
                        $d =$this->Comman_model->getData('catagory', $w);
                        $response['event'][$key]->catagory=$d->catagory;
                        // print_r($d);
                        // die;
                    } 
                    else
                    {
                        $response['event'][$key]->catagory="";
                    }
                    
                     if($e->smoking!='')
                    {
                        $w['id']=$e->smoking;
                        $d =$this->Comman_model->getData('smoking', $w);
                        $response['event'][$key]->smoking=$d->smoking;
                    } 
                    else
                    {
                        $response['event'][$key]->smoking="no";
                    }
                    if($e->drinking!='')
                    {
                        $w['id']=$e->drinking;
                        $d =$this->Comman_model->getData('drinking', $w);
                        $response['event'][$key]->drinking=$d->drinking;
                    } 
                    else
                    {
                        $response['event'][$key]->drinking="no";
                    }
                    
                    //---------------//
                    if($e->intrested_in!='')
                    {
                        $w['id']=$e->intrested_in;
                        $d =$this->Comman_model->getData('intrested', $w);
                        $response['event'][$key]->intrested_in=$d->intrested;
                    } 
                    else
                    {
                        $response['event'][$key]->intrested_in="";
                    }
                    if($e->eligibility!='')
                    {
                        $w['id']=$e->eligibility;
                        $d =$this->Comman_model->getData('eligibility', $w);
                        $response['event'][$key]->eligibility=$d->eligibility;
                    } 
                    else
                    {
                        $response['event'][$key]->eligibility="";
                    }
                     if($e->name!='')
                    {
                        
                        $response['event'][$key]->name=@$e->name;
                    } 
                    else
                    {
                       
                        $response['event'][$key]->name="";
                        
                    }
                    
                    if($e->mobile_no!='')
                    {
                        
                        $response['event'][$key]->mobile_no=$e->mobile_no;
                    } 
                    else
                    {
                        
                        $response['event'][$key]->mobile_no="";
                        
                    }
                    
                    if($e->email!='')
                    {
                        
                        $response['event'][$key]->email=$e->email;
                    } 
                    else
                    {
                        
                        $response['event'][$key]->email="";
                        
                    }
                     if($e->hobby!='')
                    {
                        $w['id']=$e->hobby;
                        $d =$this->Comman_model->getData('hobby', $w);
                        $response['event'][$key]->hobby=$d->hobby;
                    } 
                    else
                    {
                        $response['event'][$key]->hobby="";
                    }
                    
                
               if($e->userid!='')
                {
                    if($e->userid=='0')
                    {
                        
                         $response['event'][$key]->event_post_user="Admin";
                    }
                    else
                    {
                     $w10['id']=$e->userid;
                    $d10 =$this->Comman_model->getData('user', $w10);
                        if(!empty($d10))
                        {   
                                @$response['event'][$key]->event_post_user=$d10->name;
                        }
                        else
                        {
                             $response['event'][$key]->event_post_user="Admin";
                        }
                    }

                } 
                else{
                    $response['event'][$key]->event_post_user="";
                }
               $eid= $e->id;
               if($eid!='')
               {
               $aa=$this->db->query("SELECT `book_event`.`userid`,user.name,user.image FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
              $a= $aa->result();
              if(!empty($a))
              {
            foreach($a as $k => $ui)
                {
                     @$response['event'][$key]->users[$k]->username=$ui->name;
                      @$response['event'][$key]->users[$k]->userimage=base_url().'uploads/event/'.$ui->image;
                    //   $response['event'][$key]->users=$d->state;
                     //=base_url().'uploads/event/'.$ui->image;
                }
              }
               
                $whe1['event_id']=$e->id;
                $d =$this->Comman_model->getAllData('event_view', $whe1,'id');
                $totalview=count($d);
                
                $d1 =$this->Comman_model->getAllData('favorite', $whe1,'id');
                $totalfavorite=count($d1);
               $response['event'][$key]->totalview=strval($totalview);
               $response['event'][$key]->totalfavorite=strval($totalfavorite);
               
            }
            //echo $data1->id; die;
            }
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
            
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function latest()
    {
        $this->default_file();
        $u =$this->db->query("SELECT * FROM `event` WHERE `status`='1' and latest_event='1' ORDER BY id LIMIT 5");
        $data1=$u->result();
      if(!empty($data1))
        {
             $response['event']=$data1;
            foreach($data1 as $key =>$e)
            {
               if($e->country!='')
                {
                 $w['id']=$e->country;
                $d =$this->Comman_model->getData('country', $w);
                 $response['event'][$key]->country=$d->country;
                } 
                else{
                    $response['event'][$key]->country="";
                }
                
                if($e->city!='')
                {
                 $w['id']=$e->city;
                $d =$this->Comman_model->getData('city', $w);
                 $response['event'][$key]->city=$d->city;
                } 
                else{
                    $response['event'][$key]->city="";
                }
                  if($e->state!='')
                {
                 $w['id']=$e->state;
                $d =$this->Comman_model->getData('state', $w);
                 $response['event'][$key]->state=$d->state;
                } 
                else{
                    $response['event'][$key]->state="";
                }
                 if($e->catagory!='')
                    {
                        $w['id']=$e->catagory;
                        $d =$this->Comman_model->getData('catagory', $w);
                        $response['event'][$key]->catagory=$d->catagory;
                    } 
                    else
                    {
                        $response['event'][$key]->catagory="";
                    }
                    
                     if($e->smoking!='')
                    {
                        $w['id']=$e->smoking;
                        $d =$this->Comman_model->getData('smoking', $w);
                        $response['event'][$key]->smoking=$d->smoking;
                    } 
                    else
                    {
                        $response['event'][$key]->smoking="no";
                    }
                    if($e->drinking!='')
                    {
                        $w['id']=$e->drinking;
                        $d =$this->Comman_model->getData('drinking', $w);
                        $response['event'][$key]->drinking=$d->drinking;
                    } 
                    else
                    {
                        $response['event'][$key]->drinking="no";
                    }
                    
                    //---------------//
                    if($e->intrested_in!='')
                    {
                        $w['id']=$e->intrested_in;
                        $d =$this->Comman_model->getData('intrested', $w);
                        $response['event'][$key]->intrested_in=$d->intrested;
                    } 
                    else
                    {
                        $response['event'][$key]->intrested_in="";
                    }
                    if($e->eligibility!='')
                    {
                        $w['id']=$e->eligibility;
                        $d =$this->Comman_model->getData('eligibility', $w);
                        $response['event'][$key]->eligibility=$d->eligibility;
                    } 
                    else
                    {
                        $response['event'][$key]->eligibility="";
                    }
                     if($e->name!='')
                    {
                        
                        $response['event'][$key]->name=$e->name;
                    } 
                    else
                    {
                        $whe1111['id']=$e->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if(!empty($use))
                        {
                        if($use->name!='')
                        {
                            $response['event'][$key]->name=$use->name;
                        }
                        else
                        {
                        $response['event'][$key]->name="";
                        }
                        }
                    }
                    
                    if($e->mobile_no!='')
                    {
                        
                        $response['event'][$key]->mobile_no=$e->mobile_no;
                    } 
                    else
                    {
                        $whe1111['id']=$e->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if(!empty($use))
                        {
                            if($use->mobile_no!='')
                            {
                                $response['event'][$key]->mobile_no=$use->mobile_no;
                            }
                            else
                            {
                            $response['event'][$key]->mobile_no="";
                            }
                        }
                    }
                    
                    if($e->email!='')
                    {
                        
                        $response['event'][$key]->email=$e->email;
                    } 
                    else
                    {
                        $whe1111['id']=$e->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if(!empty($use))
                        {
                            if($use->email!='')
                            {
                                $response['event'][$key]->email=$use->email;
                            }
                            else
                            {
                            $response['event'][$key]->email="";
                            }
                        }
                    }
                     if($e->hobby!='')
                    {
                        $w['id']=$e->hobby;
                        $d =$this->Comman_model->getData('hobby', $w);
                        $response['event'][$key]->hobby=$d->hobby;
                    } 
                    else
                    {
                        $response['event'][$key]->hobby="";
                    }
              if($e->userid!='')
                {
                    if($e->userid=='0')
                    {
                        
                         $response['event'][$key]->event_post_user="Admin";
                    }
                    else
                    {
                     $w10['id']=$e->userid;
                    $d10 =$this->Comman_model->getData('user', $w10);
                     @$response['event'][$key]->event_post_user=$d10->name;
                    }

                } 
                else{
                    $response['event'][$key]->event_post_user="";
                }
               $eid= $e->id;
               if($eid!='')
               {
               $aa=$this->db->query("SELECT `book_event`.`userid`,user.name,user.image FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
              $a= $aa->result();
              if(!empty($a))
              {
            foreach($a as $k => $ui)
                {
                     @$response['event'][$key]->users[$k]->username=$ui->name;
                      @$response['event'][$key]->users[$k]->userimage=base_url().'uploads/event/'.$ui->image;
                    //   $response['event'][$key]->users=$d->state;
                     //=base_url().'uploads/event/'.$ui->image;
                }
              }
               
                $whe1['event_id']=$e->id;
                $d =$this->Comman_model->getAllData('event_view', $whe1,'id');
                $totalview=count($d);
                
                $d1 =$this->Comman_model->getAllData('favorite', $whe1,'id');
                $totalfavorite=count($d1);
               $response['event'][$key]->totalview=strval($totalview);
               $response['event'][$key]->totalfavorite=strval($totalfavorite);
               
            }
            //echo $data1->id; die;
            }
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
            
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function free()
    {
         $this->default_file();
        $where['status']='1';
        $where['free_event']='1';
        $where['price']='0';
        $data1 =$this->Comman_model->getAllData('event', $where,'id');
        if(!empty($data1))
        {
             $response['event']=$data1;
            foreach($data1 as $key =>$e)
            {
               if($e->country!='')
                {
                 $w['id']=$e->country;
                $d =$this->Comman_model->getData('country', $w);
                 $response['event'][$key]->country=$d->country;
                } 
                else{
                    $response['event'][$key]->country="";
                }
                
                if($e->city!='')
                {
                 $w['id']=$e->city;
                $d =$this->Comman_model->getData('city', $w);
                 $response['event'][$key]->city=$d->city;
                } 
                else{
                    $response['event'][$key]->city="";
                }
                  if($e->state!='')
                {
                 $w['id']=$e->state;
                $d =$this->Comman_model->getData('state', $w);
                 $response['event'][$key]->state=$d->state;
                } 
                else{
                    $response['event'][$key]->state="";
                }
                 if($e->catagory!='')
                    {
                        $w['id']=$e->catagory;
                        $d =$this->Comman_model->getData('catagory', $w);
                        $response['event'][$key]->catagory=$d->catagory;
                    } 
                    else
                    {
                        $response['event'][$key]->catagory="";
                    }
                    
                     if($e->smoking!='')
                    {
                        $w['id']=$e->smoking;
                        $d =$this->Comman_model->getData('smoking', $w);
                        $response['event'][$key]->smoking=$d->smoking;
                    } 
                    else
                    {
                        $response['event'][$key]->smoking="no";
                    }
                    if($e->drinking!='')
                    {
                        $w['id']=$e->drinking;
                        $d =$this->Comman_model->getData('drinking', $w);
                        $response['event'][$key]->drinking=$d->drinking;
                    } 
                    else
                    {
                        $response['event'][$key]->drinking="no";
                    }
                    
                    //---------------//
                    if($e->intrested_in!='')
                    {
                        $w['id']=$e->intrested_in;
                        $d =$this->Comman_model->getData('intrested', $w);
                        $response['event'][$key]->intrested_in=$d->intrested;
                    } 
                    else
                    {
                        $response['event'][$key]->intrested_in="";
                    }
                    if($e->eligibility!='')
                    {
                        $w['id']=$e->eligibility;
                        $d =$this->Comman_model->getData('eligibility', $w);
                        $response['event'][$key]->eligibility=$d->eligibility;
                    } 
                    else
                    {
                        $response['event'][$key]->eligibility="";
                    }
                     if($e->name!='')
                    {
                        
                        $response['event'][$key]->name=$e->name;
                    } 
                    else
                    {
                        $whe1111['id']=$e->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if(!empty($use))
                        {
                        if($use->name!='')
                        {
                            $response['event'][$key]->name=$use->name;
                        }
                        else
                        {
                        $response['event'][$key]->name="";
                        }
                        }
                    }
                    
                    if($e->mobile_no!='')
                    {
                        
                        $response['event'][$key]->mobile_no=$e->mobile_no;
                    } 
                    else
                    {
                        $whe1111['id']=$e->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if(!empty($use))
                        {
                            if($use->mobile_no!='')
                            {
                                $response['event'][$key]->mobile_no=$use->mobile_no;
                            }
                            else
                            {
                            $response['event'][$key]->mobile_no="";
                            }
                        }
                    }
                    
                    if($e->email!='')
                    {
                        
                        $response['event'][$key]->email=$e->email;
                    } 
                    else
                    {
                        $whe1111['id']=$e->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if(!empty($use))
                        {
                            if($use->email!='')
                            {
                                $response['event'][$key]->email=$use->email;
                            }
                            else
                            {
                            $response['event'][$key]->email="";
                            }
                        }
                    }
                     if($e->hobby!='')
                    {
                        $w['id']=$e->hobby;
                        $d =$this->Comman_model->getData('hobby', $w);
                        $response['event'][$key]->hobby=$d->hobby;
                    } 
                    else
                    {
                        $response['event'][$key]->hobby="";
                    }
              if($e->userid!='')
                {
                    if($e->userid=='0')
                    {
                        
                         $response['event'][$key]->event_post_user="Admin";
                    }
                    else
                    {
                     $w10['id']=$e->userid;
                    $d10 =$this->Comman_model->getData('user', $w10);
                     @$response['event'][$key]->event_post_user=$d10->name;
                    }

                } 
                else{
                    $response['event'][$key]->event_post_user="";
                }
               $eid= $e->id;
               if($eid!='')
               {
               $aa=$this->db->query("SELECT `book_event`.`userid`,user.name,user.image FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
              $a= $aa->result();
              if(!empty($a))
              {
            foreach($a as $k => $ui)
                {
                  
                     @$response['event'][$key]->users[$k]->username=$ui->name;
                      @$response['event'][$key]->users[$k]->userimage=base_url().'uploads/event/'.$ui->image;
                    //   $response['event'][$key]->users=$d->state;
                     //=base_url().'uploads/event/'.$ui->image;
                }
              }
               
                $whe1['event_id']=$e->id;
                $d =$this->Comman_model->getAllData('event_view', $whe1,'id');
                $totalview=count($d);
                
                $d1 =$this->Comman_model->getAllData('favorite', $whe1,'id');
                $totalfavorite=count($d1);
               $response['event'][$key]->totalview=strval($totalview);
               $response['event'][$key]->totalfavorite=strval($totalfavorite);
               
            }
            //echo $data1->id; die;
            }
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
            
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function paid()
    {
        $this->default_file();
        $where['status']='1';
         $where['paid_event']='1';
        $where['price!=']='0';
        $data1 =$this->Comman_model->getAllData('event', $where,'id');
        if(!empty($data1))
        {
             $response['event']=$data1;
            foreach($data1 as $key =>$e)
            {
               if($e->country!='')
                {
                 $w['id']=$e->country;
                $d =$this->Comman_model->getData('country', $w);
                 $response['event'][$key]->country=$d->country;
                } 
                else{
                    $response['event'][$key]->country="";
                }
                
                if($e->city!='')
                {
                 $w['id']=$e->city;
                $d =$this->Comman_model->getData('city', $w);
                 $response['event'][$key]->city=$d->city;
                } 
                else{
                    $response['event'][$key]->city="";
                }
                  if($e->state!='')
                {
                 $w['id']=$e->state;
                $d =$this->Comman_model->getData('state', $w);
                 $response['event'][$key]->state=$d->state;
                } 
                else{
                    $response['event'][$key]->state="";
                }
                 if($e->catagory!='')
                    {
                        $w['id']=$e->catagory;
                        $d =$this->Comman_model->getData('catagory', $w);
                        $response['event'][$key]->catagory=$d->catagory;
                    } 
                    else
                    {
                        $response['event'][$key]->catagory="";
                    }
                    
                     if($e->smoking!='')
                    {
                        $w['id']=$e->smoking;
                        $d =$this->Comman_model->getData('smoking', $w);
                        $response['event'][$key]->smoking=$d->smoking;
                    } 
                    else
                    {
                        $response['event'][$key]->smoking="no";
                    }
                    if($e->drinking!='')
                    {
                        $w['id']=$e->drinking;
                        $d =$this->Comman_model->getData('drinking', $w);
                        $response['event'][$key]->drinking=$d->drinking;
                    } 
                    else
                    {
                        $response['event'][$key]->drinking="no";
                    }
                    
                    //---------------//
                    if($e->intrested_in!='')
                    {
                        $w['id']=$e->intrested_in;
                        $d =$this->Comman_model->getData('intrested', $w);
                        $response['event'][$key]->intrested_in=$d->intrested;
                    } 
                    else
                    {
                        $response['event'][$key]->intrested_in="";
                    }
                    if($e->eligibility!='')
                    {
                        $w['id']=$e->eligibility;
                        $d =$this->Comman_model->getData('eligibility', $w);
                        $response['event'][$key]->eligibility=$d->eligibility;
                    } 
                    else
                    {
                        $response['event'][$key]->eligibility="";
                    }
                     if($e->name!='')
                    {
                        
                        $response['event'][$key]->name=$e->name;
                    } 
                    else
                    {
                        $whe1111['id']=$e->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if(!empty($use))
                        {
                        if($use->name!='')
                        {
                            $response['event'][$key]->name=$use->name;
                        }
                        else
                        {
                        $response['event'][$key]->name="";
                        }
                        }
                    }
                    
                    if($e->mobile_no!='')
                    {
                        
                        $response['event'][$key]->mobile_no=$e->mobile_no;
                    } 
                    else
                    {
                        $whe1111['id']=$e->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if(!empty($use))
                        {
                            if($use->mobile_no!='')
                            {
                                $response['event'][$key]->mobile_no=$use->mobile_no;
                            }
                            else
                            {
                            $response['event'][$key]->mobile_no="";
                            }
                        }
                    }
                    
                    if($e->email!='')
                    {
                        
                        $response['event'][$key]->email=$e->email;
                    } 
                    else
                    {
                        $whe1111['id']=$e->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if(!empty($use))
                        {
                            if($use->email!='')
                            {
                                $response['event'][$key]->email=$use->email;
                            }
                            else
                            {
                            $response['event'][$key]->email="";
                            }
                        }
                    }
                     if($e->hobby!='')
                    {
                        $w['id']=$e->hobby;
                        $d =$this->Comman_model->getData('hobby', $w);
                        $response['event'][$key]->hobby=$d->hobby;
                    } 
                    else
                    {
                        $response['event'][$key]->hobby="";
                    }
              if($e->userid!='')
                {
                    if($e->userid=='0')
                    {
                        
                         $response['event'][$key]->event_post_user="Admin";
                    }
                    else
                    {
                     $w10['id']=$e->userid;
                    $d10 =$this->Comman_model->getData('user', $w10);
                     @$response['event'][$key]->event_post_user=$d10->name;
                    }

                } 
                else{
                    $response['event'][$key]->event_post_user="";
                }
               $eid= $e->id;
               if($eid!='')
               {
               $aa=$this->db->query("SELECT `book_event`.`userid`,user.name,user.image FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
              $a= $aa->result();
              if(!empty($a))
              {
            foreach($a as $k => $ui)
                {
                  
                     @$response['event'][$key]->users[$k]->username=$ui->name;
                      @$response['event'][$key]->users[$k]->userimage=base_url().'uploads/event/'.$ui->image;
                    //   $response['event'][$key]->users=$d->state;
                     //=base_url().'uploads/event/'.$ui->image;
                }
              }
               
                $whe1['event_id']=$e->id;
                $d =$this->Comman_model->getAllData('event_view', $whe1,'id');
                $totalview=count($d);
                
                $d1 =$this->Comman_model->getAllData('favorite', $whe1,'id');
                $totalfavorite=count($d1);
               $response['event'][$key]->totalview=strval($totalview);
               $response['event'][$key]->totalfavorite=strval($totalfavorite);
               
            }
            //echo $data1->id; die;
            }
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
            
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function offer()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('offer', $where,'id');
        if(!empty($data1))
        {
            $response['offer']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function hobby()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('hobby', $where,'id');
        if(!empty($data1))
        {
            $response['hobby']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function old()
    {
        $this->default_file();
        $where['status']='1';
        
        
        $time = strtotime(date("Y/m/d"));
 $final = date("Y-m-d", strtotime("-5 day", $time));
    $where['date <']=$final;
        $data1 =$this->Comman_model->getAllData('event', $where,'id');
         if(!empty($data1))
        {
             $response['event']=$data1;
            foreach($data1 as $key =>$e)
            {
                 if($e->country!='')
                {
                 $w['id']=$e->country;
                $d =$this->Comman_model->getData('country', $w);
                 $response['event'][$key]->country=$d->country;
                } 
                else{
                    $response['event'][$key]->country="";
                }
                
                if($e->city!='')
                {
                 $w['id']=$e->city;
                $d =$this->Comman_model->getData('city', $w);
                 $response['event'][$key]->city=$d->city;
                } 
                else{
                    $response['event'][$key]->city="";
                }
                  if($e->state!='')
                {
                 $w['id']=$e->state;
                $d =$this->Comman_model->getData('state', $w);
                 $response['event'][$key]->state=$d->state;
                } 
                else{
                    $response['event'][$key]->state="";
                }
                 if($e->catagory!='')
                    {
                        $w['id']=$e->catagory;
                        $d =$this->Comman_model->getData('catagory', $w);
                        $response['event'][$key]->catagory=$d->catagory;
                    } 
                    else
                    {
                        $response['event'][$key]->catagory="";
                    }
                    
                     if($e->smoking!='')
                    {
                        $w['id']=$e->smoking;
                        $d =$this->Comman_model->getData('smoking', $w);
                        $response['event'][$key]->smoking=$d->smoking;
                    } 
                    else
                    {
                        $response['event'][$key]->smoking="no";
                    }
                    if($e->drinking!='')
                    {
                        $w['id']=$e->drinking;
                        $d =$this->Comman_model->getData('drinking', $w);
                        $response['event'][$key]->drinking=$d->drinking;
                    } 
                    else
                    {
                        $response['event'][$key]->drinking="no";
                    }
                    
                    //---------------//
                    if($e->intrested_in!='')
                    {
                        $w['id']=$e->intrested_in;
                        $d =$this->Comman_model->getData('intrested', $w);
                        $response['event'][$key]->intrested_in=$d->intrested;
                    } 
                    else
                    {
                        $response['event'][$key]->intrested_in="";
                    }
                    if($e->eligibility!='')
                    {
                        $w['id']=$e->eligibility;
                        $d =$this->Comman_model->getData('eligibility', $w);
                        $response['event'][$key]->eligibility=$d->eligibility;
                    } 
                    else
                    {
                        $response['event'][$key]->eligibility="";
                    }
                     if($e->name!='')
                    {
                        
                        $response['event'][$key]->name=$e->name;
                    } 
                    else
                    {
                        $whe1111['id']=$e->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if($use->name!='')
                        {
                            $response['event'][$key]->name=$use->name;
                        }
                        else
                        {
                        $response['event'][$key]->name="";
                        }
                    }
                    
                    if($e->mobile_no!='')
                    {
                        
                        $response['event'][$key]->mobile_no=$e->mobile_no;
                    } 
                    else
                    {
                        $whe1111['id']=$e->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if($use->mobile_no!='')
                        {
                            $response['event'][$key]->mobile_no=$use->mobile_no;
                        }
                        else
                        {
                        $response['event'][$key]->mobile_no="";
                        }
                    }
                    
                    if($e->email!='')
                    {
                        
                        $response['event'][$key]->email=$e->email;
                    } 
                    else
                    {
                        $whe1111['id']=$e->userid;
                        $use =$this->Comman_model->getData('user', $whe1111);
                        if($use->email!='')
                        {
                            $response['event'][$key]->email=$use->email;
                        }
                        else
                        {
                        $response['event'][$key]->email="";
                        }
                    }
                     if($e->hobby!='')
                    {
                        $w['id']=$e->hobby;
                        $d =$this->Comman_model->getData('hobby', $w);
                        $response['event'][$key]->hobby=$d->hobby;
                    } 
                    else
                    {
                        $response['event'][$key]->hobby="";
                    }
               $eid= $e->id;
               if($eid!='')
               {
               $aa=$this->db->query("SELECT `book_event`.`userid`,user.name FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
              $a= $aa->result();
              if(!empty($a))
              {
            foreach($a as $k => $ui)
                {
                     @$response['event'][$key]->users[$k]->username=$ui->name;
                      @$response['event'][$key]->users[$k]->userimage=base_url().'uploads/event/'.$ui->image;
                    //   $response['event'][$key]->users=$d->state;
                     //=base_url().'uploads/event/'.$ui->image;
                }
              }
               
                $whe1['event_id']=$e->id;
                $d =$this->Comman_model->getAllData('event_view', $whe1,'id');
                $totalview=count($d);
                
                $d1 =$this->Comman_model->getAllData('favorite', $whe1,'id');
                $totalfavorite=count($d1);
               $response['event'][$key]->totalview=strval($totalview);
               $response['event'][$key]->totalfavorite=strval($totalfavorite);
               
            }
            //echo $data1->id; die;
            }
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
            
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
      
    }
    
    public function settings()
    {
        $this->default_file();
        $where['id']='5';
        $data1 =$this->Comman_model->getAllData('settings', $where);
        if(!empty($data1))
        {
            $response['settings']=$data1;
             $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
               $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }

        
       
    }
    
    //catagory
    
    public function catagory()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('catagory', $where,'id');
        if(!empty($data1))
        {
            $response['settings']=$data1;
             $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
               $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }

        
       
    }
    
    public function eligibility()
    {
        $this->default_file();
      $where['status']='1';
        $data1 =$this->Comman_model->getAllData('eligibility', $where,'id');
        if(!empty($data1))
        {
            $response['eligibility']=$data1;
             $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
               $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }

        
       
    }
    
    public function faq()
    {
        $this->default_file();
      $where['status']='1';
        $data1 =$this->Comman_model->getAllData('faq', $where='','id');
        if(!empty($data1))
        {
            $response['settings']=$data1;
             $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
               $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }

        
       
    }
    //----------------------//
    
    public function event_details()
    {
        $this->default_file();
        $where['status']='1';
        if($this->input->post('event_id')!='')
        {
         $where['id']=$this->input->post('event_id');
        $e =$this->Comman_model->getData('event', $where);
        if(!empty($e))
        {
             $response['event']=$e;
          
                if($e->country!='')
                {
                 $w['id']=$e->country;
                $d =$this->Comman_model->getData('country', $w);
                 $response['event']->country=$d->country;
                } 
                else{
                    $response['event']->country="";
                }
                
                if($e->city!='')
                {
                 $w['id']=$e->city;
                    $d=$this->Comman_model->getData('city', $w);
              
                    if($d->city)
                    {
                        $response['event']->city=@$d->city;
                    }
                    else
                    {
                          $response['event']->city="";
                    }
                } 
                else{
                    $response['event']->city="";
                }
                  if($e->state!='')
                {
                 $w['id']=$e->state;
                $d =$this->Comman_model->getData('state', $w);
                 $response['event']->state=$d->state;
                } 
                else{
                    $response['event']->state="";
                }
                   if($e->catagory!='')
                {
                 $w['id']=$e->catagory;
                $d =$this->Comman_model->getData('catagory', $w);
                 $response['event']->catagory=$d->catagory;
                } 
                else{
                    $response['event']->catagory="";
                }
                
                if($e->userid!='')
                {
                    if($e->userid=='0')
                    {
                        
                         $response['event']->event_post_user="Admin";
                    }
                    else
                    {
                     $w10['id']=$e->userid;
                    $d10 =$this->Comman_model->getData('user', $w10);
                     @$response['event']->event_post_user=$d10->name;
                    }

                } 
                else
                {
                    $response['event']->event_post_user="";
                }
                
               $eid= $e->id;
               $aa=$this->db->query("SELECT `book_event`.`userid`,user.name FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
              $a= $aa->result();
            //   foreach($a as $k =>$v)
           $aii= json_encode($a);
                $response['event']->users=$aii;
               
            
            //echo $data1->id; die;
           
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
        }
        else
        {
              $response['msg']="event Not found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function event_by_catagory()
    {
        $this->default_file();
      $where['status']='1';
     
      if($this->input->post('catagory')!='')
      {
           $where['catagory']=$this->input->post('catagory');
        $data1 =$this->Comman_model->getAllData('event', $where,'id');
        if(!empty($data1))
        {
            $response['event']=$data1;
            foreach($data1 as $key =>$e)
            {
                if($e->country!='')
                {
                 $w['id']=$e->country;
                $d =$this->Comman_model->getData('country', $w);
                 $response['event'][$key]->country=$d->country;
                } 
                else{
                    $response['event'][$key]->country="";
                }
                
                if($e->city!='')
                {
                 $w['id']=$e->city;
                    $d=$this->Comman_model->getData('city', $w);
              
                    if($d->city)
                    {
                        $response['event'][$key]->city=@$d->city;
                    }
                    else
                    {
                          $response['event'][$key]->city="";
                    }
                } 
                else{
                    $response['event'][$key]->city="";
                }
                  if($e->state!='')
                {
                 $w['id']=$e->state;
                $d =$this->Comman_model->getData('state', $w);
                 $response['event'][$key]->state=$d->state;
                } 
                else{
                    $response['event'][$key]->state="";
                }
                
                     if($e->catagory!='')
                {
                 $w['id']=$e->catagory;
                $d =$this->Comman_model->getData('catagory', $w);
                 $response['event'][$key]->catagory=$d->catagory;
                } 
                else{
                    $response['event'][$key]->catagory="";
                }
                
               $eid= $e->id;
               $aa=$this->db->query("SELECT `book_event`.`userid`,user.name FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
              $a= $aa->result();
            //   foreach($a as $k =>$v)
           $aii= json_encode($a);
                $response['event'][$key]->users=$aii;
               
            }
            $response['msg']="No record found";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
               $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
      }
      else
      {
           $response['msg']="catagory No record found";
            $response['error']=400;
            echo json_encode($response);
      }

        
       
    }
    
    public function my_eventpast()
    {
        $this->default_file();
        if($this->input->post('userid')!='')
        {
        $where['userid']=$this->input->post('userid');
        
                $time = strtotime(date("Y/m/d"));
 $final = date("Y-m-d", strtotime("-5 day", $time));
    $where['datetime <']=$final;
        
        //$where['status']='1';
        $data1 =$this->Comman_model->getAllData('book_event', $where,'id');
        // print_r($data1);
        // die;
        if(!empty($data1))
        {
            $response['event']=$data1;
            foreach($data1 as $key =>$e)
            {
                $eid= $e->event_id;
                $wherea['id']=$eid;
                 $dataw1 =$this->Comman_model->getData('event', $wherea);
                   $response['event'][$key]=$dataw1;                  
                 if($dataw1->country!='')
                {
                 $w['id']=$dataw1->country;
                $d =$this->Comman_model->getData('country', $w);
                 $response['event'][$key]->country=$d->country;
                } 
                else{
                    $response['event'][$key]->country="";
                }
                
                   if($dataw1->city!='')
                {
                 $w['id']=$dataw1->city;
                    $d=$this->Comman_model->getData('city', $w);
              
                    if($d->city)
                    {
                        $response['event'][$key]->city=@$d->city;
                    }
                    else
                    {
                          $response['event'][$key]->city="";
                    }
                } 
                else{
                    $response['event'][$key]->city="";
                }
                  if($dataw1->state!='')
                {
                 $w['id']=$dataw1->state;
                $d =$this->Comman_model->getData('state', $w);
                 $response['event'][$key]->state=$d->state;
                } 
                else{
                    $response['event'][$key]->state="";
                }
                if($dataw1->catagory!='')
                {
                 $w['id']=$dataw1->catagory;
                $d =$this->Comman_model->getData('catagory', $w);
                 $response['event'][$key]->catagory=$d->catagory;
                } 
                else{
                    $response['event'][$key]->catagory="";
                }
                
                
                $aa=$this->db->query("SELECT `book_event`.`userid`,user.name FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
                $a= $aa->result();
                //   foreach($a as $k =>$v)
                $aii= json_encode($a);
                $response['event'][$key]->users=$aii;
                  
               
            }
                //echo $data1->id; die;
           
                $response['msg']="Sucsess";
                $response['error']=200;
                echo json_encode($response);
            }
            else
            {
                $response['msg']="No record found";
                $response['error']=400;
                echo json_encode($response);
            }
        }
        else
        {
            $response['msg']="No record found";
                $response['error']=400;
                echo json_encode($response);
        }
    }
    
    public function reals_post()
    {
            $this->load->model('Comman_model');
            
            $this->form_validation->set_rules('userid', 'User Id', 'required'); 
            if (!$this->form_validation->run()) 
            {
                    $response['msg']=strip_tags(validation_errors());
                    $response['error']="400";
                    echo json_encode($response);
            }
            else
            {
                $config['upload_path']          = './uploads/videos/';
                $config['allowed_types']        = '*';
                
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('userfile'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    
                    $response['msg']=$error;
                    $response['error']="400";
                    echo json_encode($response);
                }
                else
                {
                    $data = $this->upload->data();
                    $picture = $data['file_name'];
                    $editup['userid']=$this->input->post('userid');
                    $editup['type']='0';
                    $editup['datetime']=date('Y-m-d H:i:s');
                    $editup['videos']=$picture;
                    $updated = $this->Comman_model->insertData('reals_post',$editup);
                    if($updated)
                    {
                        $response['msg']="Sucsess";
                        $response['error']="200";
                        echo json_encode($response);
                    }
                    else
                    {
                     
                        $response['msg']=$error;
                        $response['error']="400";
                        echo json_encode($response);   
                    }
                
                }
            }
           }
        
    //subscription
    public function subscription()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('subscription', $where,'id');
        if(!empty($data1))
        {
            $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function reals()
    {
        $this->default_file();
        $where['status']='1';
        $where['type']=0;
        $data1 =$this->Comman_model->getAllData('reals_post', $where,'id');
        if(!empty($data1))
        {
            $response['country']=$data1;
            foreach($data1 as $key =>$v )
            {
                $where11['id']=$v->userid;
                $dat55 =$this->Comman_model->getData('user', $where11);
                $response['country'][$key]->username=$dat55->name;
                 
                $old = $v->datetime;
                $new = date('d M Y H:i A', strtotime($old));
                $response['country'][$key]->videos=base_url().'uploads/videos/'.$v->videos;
                 $response['country'][$key]->datetime=$new;
                 
                $whe1['reels_id']=$v->id;
                    $d =$this->Comman_model->getAllData('reels_view', $whe1,'id');
                    $totalview=count($d);
                
                    $d1 =$this->Comman_model->getAllData('reels_like', $whe1,'id');
                    $totallike=count($d1);
                    
                    $response['country'][$key]->totalview=strval($totalview);
                    $response['country'][$key]->totalfavorite=strval($totallike);
            }
            
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function splashscreen()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('splash', $where,'id');
        if(!empty($data1))
        {
            $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    //reals_post
    
    public function event_by_city()
    {
        $this->default_file();
        $where['status']='1';
     
      if($this->input->post('city')!='')
      {
           $where['city']=$this->input->post('city');
            $data1 =$this->Comman_model->getAllData('event', $where,'id');
        if(!empty($data1))
        {
            $response['event']=$data1;
            foreach($data1 as $key =>$e)
            {
                if($e->country!='')
                {
                    $w['id']=$e->country;
                    $d =$this->Comman_model->getData('country', $w);
                    $response['event'][$key]->country=$d->country;
                } 
                else
                {
                    $response['event'][$key]->country="";
                }
                
                if($e->city!='')
                {
                    $w['id']=$e->city;
                    $d=$this->Comman_model->getData('city', $w);
              
                    if($d->city)
                    {
                        $response['event'][$key]->city=@$d->city;
                    }
                    else
                    {
                          $response['event'][$key]->city="";
                    }
                } 
                else{
                    $response['event'][$key]->city="";
                }
                  if($e->state!='')
                {
                 $w['id']=$e->state;
                $d =$this->Comman_model->getData('state', $w);
                 $response['event'][$key]->state=$d->state;
                } 
                else{
                    $response['event'][$key]->state="";
                }
                
                     if($e->catagory!='')
                {
                 $w['id']=$e->catagory;
                $d =$this->Comman_model->getData('catagory', $w);
                 $response['event'][$key]->catagory=$d->catagory;
                } 
                else{
                    $response['event'][$key]->catagory="";
                }
                
               $eid= $e->id;
               $aa=$this->db->query("SELECT `book_event`.`userid`,user.name FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
              $a= $aa->result();
            //   foreach($a as $k =>$v)
           $aii= json_encode($a);
                $response['event'][$key]->users=$aii;
               
            }
            $response['msg']="No record found";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
               $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
      }
      else
      {
           $response['msg']="City No record found";
            $response['error']=400;
            echo json_encode($response);
      }

        
       
    }
    
    public function getcites()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('city', $where,'id');
        if(!empty($data1))
        {
            $response['city']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function contactus()
    {
        $this->default_file();
        $data['id']=$this->input->post('id');
        $data1 =$this->Comman_model->getData('contact_us', $data);
        if(empty($data1))
        {
        if($this->input->post('subject')!='')
        {
            if($this->input->post('message')!='')
            {
                $editup['subject']=$this->input->post('subject');
                $editup['message']=$this->input->post('message');
                if($this->input->post('id')!='')
        	    {
        	        $editup['id']=$this->input->post('id');
        	    }
        	    $updated = $this->Comman_model->insertData('contact_us',$editup);
        	    
        	if ($updated) 
    			{
    			    $response['user_id']=$updated;
                    $response['msg']="Sucsess";
                    $response['error']=200;
                    echo json_encode($response);
			    } 
			else 
			    {
                $response['msg']="Something went wrong";
                $response['error']=400;
                echo json_encode($response);
 			    }
     		}
            else
            {
                    $response['msg']="Email Address is Required";
                    $response['error']=400;
                    echo json_encode($response);
            }
            }
            else
            {
                    $response['msg']="Message is Required";
                    $response['error']=400;
                    echo json_encode($response);
                    }
                }
            else
                {
                    $response['msg']="Subject is Required";
                    $response['error']=400;
                    echo json_encode($response);
                }
            }
            
    public function notifications()
    {
        
        $this->default_file();
        $data12['status']='1';
        $data122 =$this->Comman_model->getAllData('notification', $data12,'id');
        if(!empty($data122))
        {
            $response['notification']=$data122;
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Something Went wrong";
            $response['error']=400;
            echo json_encode($response);
        }
     
    }
        public function notifications01()
    {
        
        $this->default_file();
        $data12['status']='1';
        $data122 =$this->Comman_model->getAllData('user_profile', $data12,'id');
        if(!empty($data122))
        {
            $response['notification']=$data122;
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Something Went wrong";
            $response['error']=400;
            echo json_encode($response);
        }
     
    }
     
    
    public function profile()
    {
        $this->default_file();
        $data['id']=$id=$this->input->post('id');
        if($id!='')
       {
       $data1 =$this->Comman_model->getData('user', $data);
        if(!empty($data1))
        {
            $response['userdata']=$data1;
            $response['msg']="Successfully";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Someting Went Wrong";
            $response['error']=400;
            echo json_encode($response);
        }
       }
       else
       {
           $response['msg']="Login Again";
            $response['error']=400;
            echo json_encode($response);
       }
   }
   
    public function update_profile()
    {
       $this->default_file();
        $where['id']=$this->input->post('id');
        
        if($this->input->post('name')!='')
        {
            $data['name']=$this->input->post('name');
        }
        if($this->input->post('mobile_no')!='')
        {
            $data['mobile_no']=$this->input->post('mobile_no');
        }
         if($this->input->post('email')!='')
         {
            $data['email']=$this->input->post('email');
         }
         if($this->input->post('password')!='')
         {
            $data['password']=$this->input->post('password');
         }
         if($this->input->post('gender')!='')
         {
            $data['gender']=$this->input->post('gender');
         }
         if($this->input->post('dob')!='')
         {
            $data['dob']=$this->input->post('dob');
         }
         if($this->input->post('hobby')!='')
         {
            $data['hobby']=$this->input->post('hobby');
         }
         if($this->input->post('country')!='')
         {
        $data['country']=$this->input->post('country');
         }
         if($this->input->post('state')!='')
         {
        $data['state']=$this->input->post('state');
         }
         if($this->input->post('city')!='')
         {
        $data['city']=$this->input->post('city');
         }
         if($this->input->post('smoking')!='')
         {
        $data['smoking']=$this->input->post('smoking');
         }
         if($this->input->post('drinking')!='')
         {
        $data['drinking']=$this->input->post('drinking');
         }
         if($this->input->post('intrested_in')!='')
         {
        $data['intrested_in']=$this->input->post('intrested_in');
         }
            $data1 =$this->Comman_model->UpdateRecord('user', $data, $where);
        if(!empty($data1))
        {
            $response['id']=$this->input->post('id');
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
        
   }
    public function edit_profile()
    {
       $this->default_file();
        $where['id']=$this->input->post('id');
        
        if($this->input->post('name')!='')
        {
            $data['name']=$this->input->post('name');
        }
        if($this->input->post('mobile')!='')
        {
            $data['mobile']=$this->input->post('mobile');
        }
        if($this->input->post('email')!='')
        {
            $data['email']=$this->input->post('email');
         }
         if($this->input->post('password')!='')
         {
            $data['password']=$this->input->post('password');
         }
        
         if($this->input->post('dob')!='')
         {
            $data['dob']=$this->input->post('dob');
         }
         if($this->input->post('state')!='')
         {
            $data['state']=$this->input->post('state');
         }
            $data1 =$this->Comman_model->UpdateRecord('user_profile', $data, $where);
                  //  $data1 =$this->Comman_model->getData('user_profile', $data,$where);
        if(!empty($data1))
        {
            $response['id']=$this->input->post('id');
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
        
   }
      
   
    public function registration_post() {
        // Get the post data
        $name = $this->input->post('name'); 
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $phone = $this->input->post('phone');
        $gender = $this->input->post('gender');
        // $price = strip_tags($this->input->post('price'));
        // Validate the post data
        if(!empty($name) && !empty($phone) && !empty($email) && !empty($password)){
            
            // Check if the given email already exists
            $con['returnType'] = 'count';
            $con['conditions'] = array(
                'email' => $email,
            );
            $userCount = $this->user->getRows($con);
            
            if($userCount > 0){
                // Set the response and exit
                $this->response([
                        'status' => 400,
                        'message' => 'The given email already exists.'
                    ], REST_Controller::HTTP_BAD_REQUEST);
            }
            else{
                // Insert user data
                $userData = array(
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'phone' => $phone,
                    'gender' => $gender,
                   // 'price' => $price

                );

                 // for Image insert in database
    //              if(isset($_FILES) && !empty($_FILES) && $_FILES['image']['name'])
				//  {    
				// $file = $this->Comman_model->updateMedia('image','users');
				// $userData['image'] = $file; 
				//  }
                

                $insert = $this->user->insert($userData);
                
                // Check if the user data is inserted
                if($insert){
                    // Set the response and exit
                    $this->response([
                        'status' => 200,
                        'message' => 'The user has been added successfully.',
                        'userid' => $insert
                    ], REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $this->response([
                        'status' => 400,
                        'message' => 'Some problems occurred, please try again.',
                        'userid' => $insert
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }else{
            // Set the response and exit
            $this->response([
                'status' => 400,
                'message' => 'Provide complete user info to add.. All fields provide and fill',
                'data' => $insert
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function reals_image_post()
    {
        $this->load->model('Comman_model');
            
            $this->form_validation->set_rules('userid', 'User Id', 'required'); 
            if (!$this->form_validation->run()) 
            {
                    $response['msg']=strip_tags(validation_errors());
                    $response['error']=400;
                    echo json_encode($response);
            }
            else
            {
                $config['upload_path']          = './uploads/images/';
                $config['allowed_types']        = '*';
                
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('userfile'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    
                    $response['msg']=$error;
                    $response['error']=400;
                    echo json_encode($response);
                }
                else
                {
                    $data = $this->upload->data();
                    $picture = $data['file_name'];
                    $editup['userid']=$this->input->post('userid');
                    $editup['type']='1';
                    $editup['datetime']=date('Y-m-d H:i:s');
                    
                    $editup['videos']=$picture;
                    $updated = $this->Comman_model->insertData('reals_post',$editup);
                    if($updated)
                    {
                        $response['msg']="Sucsess";
                        $response['error']=200;
                        echo json_encode($response);
                    }
                    else
                    {
                     
                        $response['msg']=$error;
                        $response['error']=400;
                        echo json_encode($response);   
                    }
                
                }
            }
           }
           
    public function reals_images()
    {
        $this->default_file();
        $where['status']='1';
        $where['type']=1;
        $data1 =$this->Comman_model->getAllData('reals_post', $where,'id');
        if(!empty($data1))
        {
            $response['country']=$data1;
            foreach($data1 as $key =>$v )
            {
                $where11['id']=$v->userid;
                $dat55 =$this->Comman_model->getData('user', $where11);
                $response['country'][$key]->username=$dat55->name;
                 
                $old = $v->datetime;
                $new = date('d M Y H:i A', strtotime($old));
                $response['country'][$key]->videos=base_url().'uploads/images/'.$v->videos;
                 $response['country'][$key]->datetime=$new;
                  $whe1['reels_id']=$v->id;
                    $d =$this->Comman_model->getAllData('reels_view', $whe1,'id');
                    $totalview=count($d);
                
                    $d1 =$this->Comman_model->getAllData('reels_like', $whe1,'id');
                    $totallike=count($d1);
                    
                    $response['country'][$key]->totalview=strval($totalview);
                    $response['country'][$key]->totalfavorite=strval($totallike);
            }
            
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
     public function alldata_n()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('crime_r', $where,'id');
        if(!empty($data1))
        {
            $response['country']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function reals_images_user()
    {
        $this->default_file();
        if($this->input->post('user_id')!='')
        {
        $where['userid']=$this->input->post('user_id');
        $where['status']='1';
        $where['type']=1;
        $data1 =$this->Comman_model->getAllData('reals_post', $where,'id');
        if(!empty($data1))
        {
            $response['country']=$data1;
            foreach($data1 as $key =>$v )
            {
                $where11['id']=$v->userid;
                $dat55 =$this->Comman_model->getData('user', $where11);
                $response['country'][$key]->username=$dat55->name;
                $response['country'][$key]->videos=base_url().'uploads/images/'.$v->videos;
                 
                $old = $v->datetime;
                $new = date('d M Y H:i A', strtotime($old));
               
                 $response['country'][$key]->datetime=$new;
            }
            
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
        }
        else
        {
             $response['msg']="User id found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function reals_videos_user()
    {
        $this->default_file();
        if($this->input->post('user_id')!='')
        {
        $where['userid']=$this->input->post('user_id');
        $where['status']='1';
        $where['type']=0;
        $data1 =$this->Comman_model->getAllData('reals_post', $where,'id');
        if(!empty($data1))
        {
            $response['country']=$data1;
            foreach($data1 as $key =>$v )
            {
                $where11['id']=$v->userid;
                $dat55 =$this->Comman_model->getData('user', $where11);
                $response['country'][$key]->username=$dat55->name;
                 
                $old = $v->datetime;
                $new = date('d M Y H:i A', strtotime($old));
                $response['country'][$key]->videos=base_url().'uploads/videos/'.$v->videos;
                $response['country'][$key]->datetime=$new;
            }
            
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
        }
        else
        {
             $response['msg']="User id found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function event_view()
    {
        $this->default_file();
        if($this->input->post('user_id')!='')
        {
            if($this->input->post('event_id')!='')
            {
                $editup['user_id']=$this->input->post('user_id');
                $editup['event_id']=$this->input->post('event_id');
                $editup['datetime']=date('Y-m-d H:i:s');
                $insert=$this->Comman_model->insertData('event_view',$editup);
        	    if($insert)
                {
                   
                    $response['msg']="Sucsess";
                    $response['error']=200;
                    echo json_encode($response);
                }
                else
                {
                    $response['msg']="Internet Server Error";
                    $response['error']=400;
                    echo json_encode($response);
                }
            }
            else
            {
                $response['msg']="Event id found";
                $response['error']=400;
                echo json_encode($response);
            }
        }
        else
        {
             $response['msg']="User id found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function event_favorite()
    {
        $this->default_file();
        if($this->input->post('user_id')!='')
        {
            if($this->input->post('event_id')!='')
            {
                $editup['user_id']=$this->input->post('user_id');
                $editup['event_id']=$this->input->post('event_id');
                $editup['datetime']=date('Y-m-d H:i:s');
                $insert=$this->Comman_model->insertData('favorite',$editup);
        	    if($insert)
                {
                   
                    $response['msg']="Sucsess";
                    $response['error']=200;
                    echo json_encode($response);
                }
                else
                {
                    $response['msg']="Internet Server Error";
                    $response['error']=400;
                    echo json_encode($response);
                }
            }
            else
            {
                $response['msg']="Event id found";
                $response['error']=400;
                echo json_encode($response);
            }
        }
        else
        {
             $response['msg']="User id found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function  userdelete()
    {
          $this->default_file();
        if($this->input->post('id')!='')
        {
            $where['id']=$this->input->post('id');
                $insert=$this->Comman_model->Deletedata('user_contact', $where);
        	    if($insert)
                {
                    $response['msg']="Internet Server Error";
                    $response['error']=400;
                    echo json_encode($response);
                }
                
                else
                {
                
                    $response['msg']="Sucsess";
                    $response['error']=200;
                    echo json_encode($response);
                } 
          
        }
        else
        {
             $response['msg']="User id found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
     
    
    public function userlist()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('user', $where,'id');
        if(!empty($data1))
        {
            $response['user']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function add_frnd()
    {
        $this->default_file();
            if($this->input->post('userid')!='')
            {
                if($this->input->post('frndid')!='')
                        {
                        $editup['userid']=$this->input->post('userid');
                        $editup['frndid']=$this->input->post('frndid');
                        $editup['datetime']=date('Y-m-d H:i:s');
                        $editup['status']='1';
                        $insert=$this->Comman_model->insertData('add_user',$editup);
                	    if($insert)
                        {
                           
                            $response['msg']="Sucsess";
                            $response['error']=200;
                            echo json_encode($response);
                        }
                    else
                    {
                        $response['msg']="Internet Server Error";
                        $response['error']=400;
                        echo json_encode($response);
                    }
                    }
                else
                    {
                        $response['msg']="Friend id found";
                        $response['error']=400;
                        echo json_encode($response);
                    }
                  
            }
        else
        {
             $response['msg']="User id found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function frndlist()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('add_user', $where,'id');
        if(!empty($data1))
        {
            $response['user']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function event_wise_user()
    {
        $this->default_file();
        if($this->input->post('event_id')!='')
        {
      
            $eid=$this->input->post('event_id');
                  $aa=$this->db->query("SELECT `book_event`.`userid`,user.name FROM `book_event`,user WHERE book_event.`event_id`='$eid' and book_event.userid=user.id");
                  $a= $aa->result();
                  if(!empty($a))
                  {
                    $response['user']=$a;
                foreach($a as $k => $ui)
                    {
                         @$response['user'][$k]->name=$ui->name;
                          @$response['user'][$k]->userimage=base_url().'uploads/event/'.$ui->image;
                        //   $response['event'][$key]->users=$d->state;
                         //=base_url().'uploads/event/'.$ui->image;
                    }
                  }
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
             $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    
    
   
    
    public function reels_view()
    {
        $this->default_file();
        if($this->input->post('user_id')!='')
        {
            if($this->input->post('reels_id')!='')
            {
                if($this->input->post('reels_type')!='')
                {
                    $editup['user_id']=$this->input->post('user_id');
                    $editup['reels_id']=$this->input->post('reels_id');
                    $editup['reels_type']=$this->input->post('reels_type');
                    $editup['datetime']=date('Y-m-d H:i:s');
                    $insert=$this->Comman_model->insertData('reels_view',$editup);
        	    if($insert)
                {
                   
                    $response['msg']="Sucsess";
                    $response['error']=200;
                    echo json_encode($response);
                }
                else
                {
                    $response['msg']="Internet Server Error";
                    $response['error']=400;
                    echo json_encode($response);
                }
            }
            else
            {
                $response['msg']="Reels type found";
                $response['error']=400;
                echo json_encode($response);
            }
        }
            else
            {
                $response['msg']="Event id found";
                $response['error']=400;
                echo json_encode($response);
            }
        }
        else
        {
             $response['msg']="User id found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function reelsview_list()
    {
        $this->default_file();
        $data['id']=$id=$this->input->post('id');
        if($id!='')
      {
      $data1 =$this->Comman_model->getData('reels_view', $data);
        if(!empty($data1))
        {
            $response['userdata']=$data1;
            $response['msg']="Successfully";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Someting Went Wrong";
            $response['error']=400;
            echo json_encode($response);
        }
      }
      else
      {
          $response['msg']="Login Again";
            $response['error']=400;
            echo json_encode($response);
      }
  }
    
    public function reels_like()
    {
        $this->default_file();
        if($this->input->post('user_id')!='')
        {
            if($this->input->post('reels_id')!='')
            {
                if($this->input->post('reels_type')!='')
            {
                $editup['user_id']=$this->input->post('user_id');
                $editup['reels_id']=$this->input->post('reels_id');
                $editup['reels_type']=$this->input->post('reels_type');
                $editup['datetime']=date('Y-m-d H:i:s');
                $insert=$this->Comman_model->insertData('reels_like',$editup);
                
                $whe1['reels_id']=$e->id;
                $d =$this->Comman_model->getAllData('reels_view', $whe1,'id');
                $totalview=count($d);
            
                $d1 =$this->Comman_model->getAllData('reels_like', $whe1,'id');
                $totalfavorite=count($d1);
                
                $response['event'][$key]->totalview=strval($totalview);
                $response['event'][$key]->totalfavorite=strval($totallike);
                
                
        	    if($insert)
                {
                   
                    $response['msg']="Sucsess";
                    $response['error']=200;
                    echo json_encode($response);
                }
                else
                {
                    $response['msg']="Internet Server Error";
                    $response['error']=400;
                    echo json_encode($response);
                }
            }
            else
            {
                $response['msg']="Reels type found";
                $response['error']=400;
                echo json_encode($response);
            }
        }
            else
            {
                $response['msg']="Event id found";
                $response['error']=400;
                echo json_encode($response);
            }
        }
        else
        {
             $response['msg']="User id found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function reelslike_list()
    {
        $this->default_file();
        $data['id']=$id=$this->input->post('id');
        if($id!='')
       {
       $data1 =$this->Comman_model->getData('reels_like', $data);
        if(!empty($data1))
        {
            $response['userdata']=$data1;
            $response['msg']="Successfully";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Someting Went Wrong";
            $response['error']=400;
            echo json_encode($response);
        }
       }
       else
       {
           $response['msg']="Login Again";
            $response['error']=400;
            echo json_encode($response);
       }
   }
   
    public function forget_email()
    {
        $this->default_file();
        $email=$this->input->post('email');
        if($email!='')
        {
            $data['email']=$email;
            $data1 =$this->Comman_model->getData('user', $data);
            if(!empty($data1))
            {
                $pass= $data1->password;
            
                $this->load->library('email');
        
                $this->email->from('sheetal.kuval@gmail.com', 'Events');
                $this->email->to($email);
                
                $this->email->subject('Forget Password');
                $this->email->message('Your password is '.$pass);
                
                $uu=$this->email->send();
                if($uu)
                {
                      $response['msg']="Send Successfully";
            $response['error']=200;
            echo json_encode($response);
                }
                else
                {
                      $response['msg']="Try Again";
            $response['error']=400;
            echo json_encode($response);
                }
            }
        }
        else
        {
         $response['msg']="Enter valid email";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function chatting()
    {         
         $this->default_file();
            $this->load->model('Comman_model');
            
            $this->form_validation->set_rules('userid', 'User Id', 'required');
             $this->form_validation->set_rules('senderid', 'Sender id', 'required');
             $this->form_validation->set_rules('msg', 'msg', 'required');
             
            //
            if (!$this->form_validation->run()) 
            {
                    $response['msg']=strip_tags(validation_errors());
                    $response['error']="400";
                    echo json_encode($response);
            }
            else
            {
              
                    $editup['userid']=$this->input->post('userid');
                    $editup['senderid']=$this->input->post('senderid');
                    $editup['msg']=$this->input->post('msg');
                    $editup['datetime']=date('Y-m-d H:i:s');
                $editup['status']="1";
                    $updated = $this->Comman_model->insertData('chatting',$editup);
                    if($updated)
                    {
                        $response['msg']="Sucsess";
                        $response['error']="200";
                        echo json_encode($response);
                    }
                    else
                    {
                     
                        $response['msg']=$error;
                        $response['error']="400";
                        echo json_encode($response);   
                    }
                   
                  
              
            }
                        
    
    }
    
//  public function chattinglist()
//  {
//         $this->default_file();
//         $data['id']=$this->input->post('userid');
//         if($userid!='')
//       {
//       $data1 =$this->Comman_model->getData('chatting', $data, 'userid');
//         if(!empty($data1))
//         {
//             $response['userdata']=$data1;
//             $response['msg']="Successfully";
//             $response['error']=200;
//             echo json_encode($response);
//         }
//         else
//         {
//             $response['msg']="Someting Went Wrong";
//             $response['error']=400;
//             echo json_encode($response);
//         }
//       }
//       else
//       {
//           $response['msg']="Login Again";
//             $response['error']=400;
//             echo json_encode($response);
//       }
//   }
    
    public function chatting_list()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('chatting', $where,'id');
        if(!empty($data1))
        {
            $response['chatting']=$data1;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        }
        else
        {
            $response['msg']="No record found";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
    public function mychatlist()
    {
        //
         $this->default_file();
        $user_id=$this->input->post('userid');
        if($user_id!='')
        {
           
            $o=$this->db->query("SELECT DISTINCT `senderid` FROM `chatting` WHERE `userid`='$user_id'");
            $data1=   $o->result();
            if(!empty($data1))
            {
                 $response['users']=$data1;
                foreach($data1 as $key =>$e)
                {
                    if($e->senderid!='')
                    {
                     $w['id']=$e->senderid;
                    $d =$this->Comman_model->getData('user', $w);
                     $response['users'][$key]->username=$d->name;
                     if($d->image!='')
                     {
                        $response['users'][$key]->userimages=base_url().'uploads/users'.$d->image;
                     }
                     else
                     {
                          $response['users'][$key]->userimages=base_url().'uploads/uu.png';
                     }
                    } 
                    else{
                        $response['users'][$key]->username="";
                         $response['users'][$key]->userimages=base_url().'uploads/uu.png';
                    }
                }
            $response['error']=200;
            echo json_encode($response);
            }
        }
        else
        {
         $response['msg']="Login Again";
            $response['error']=400;
            echo json_encode($response);
        }

    }
    
    public function user_wisechat_details()
    {
        //
         $this->default_file();
        $user_id=$this->input->post('userid');
        $senderid=$this->input->post('senderid');
        if($user_id!='')
        {
            if($senderid!='')
            {
           
            $o=$this->db->query("SELECT * FROM `chatting` WHERE `userid` = '$user_id' AND `senderid` = '$senderid' ORDER BY `userid` DESC");
            $data1=   $o->result();
            if(!empty($data1))
            {
                 $response['users']=$data1;
                foreach($data1 as $key =>$e)
                {
                    if($e->senderid!='')
                    {
                     $w['id']=$e->senderid;
                    $d =$this->Comman_model->getData('user', $w);
                     $response['users'][$key]->username=$d->name;
                     if($d->image!='')
                     {
                        $response['users'][$key]->userimages=base_url().'uploads/users'.$d->image;
                     }
                     else
                     {
                          $response['users'][$key]->userimages=base_url().'uploads/uu.png';
                     }
                    } 
                    else{
                        $response['users'][$key]->username="";
                         $response['users'][$key]->userimages=base_url().'uploads/uu.png';
                    }
                }
                
                
                
            $response['error']=200;
            echo json_encode($response);
            }
            }
            else
            {
                  $response['msg']="Sender Not Selected";
            $response['error']=400;
            echo json_encode($response);
            }
        }
        else
        {
         $response['msg']="Login Again";
            $response['error']=400;
            echo json_encode($response);
        }

    }
    //SELECT * FROM `chatting` WHERE `userid` = '6' AND `senderid` = '7' ORDER BY `userid` DESC

    public function generate_otp()
    {
        $this->default_file();
        $this->form_validation->set_rules('mobile','mobile','required|regex_mactch[/^[0-9]{10}$/]') ;
          if($this->form_validation->run()==FALSE)
          {
              
            $response['msg']="Enter mobile number";
            $response['error']=400;
            echo json_encode($response);
          }
          else
          {
         
            $data['mobile']= $this->input->post('mobile');
		    $data1=$this->Comman_model->getdata('user_profile',$data);
		    
    		    if(!empty($data1))
    		    {
    		      $id=$data1->id;
        		  $this->load->library('mobile');
        		  $otp = mt_rand(1111,9999) ;
                  $aa=$this->Comman_model->updateRecord('user_profile',array('otp'=>$otp),array('id'=>$id));
                    if($aa)
                    {
                        $e=$data1->mobile;
                          $this->mobile->from('','events');
                         $this->mobile->to($e);
                          $this->mobile->subject('One time Password');
                          $this->mobile->message('Dear User, Your one time password is '.$otp.' to reset your password');
                          $y=$this->mobile->send();
                      if($y)
                      {
                            $response['id']=$id;
                            $response['msg']="success";
                            $response['error']=200;
                            echo json_encode($response);
                      }
                      else
                      {
                            $response['msg']="Failed";
                            $response['error']=400;
                            echo json_encode($response);
                      }
                    }
                    else
                    {
                        $response['msg']="Otp Not Send";
                        $response['error']=400;
                        echo json_encode($response);
                    }
    		    }
        		else
        		{
        		    $response['msg']="mobile Dont exits";
                    $response['error']=400;
                    echo json_encode($response);
        		}
      }
    }
    
    public function verify_otp()
    {
            $this->default_file();
      $id = $this->input->post('id') ;
      $this->form_validation->set_rules('otp','OTP','required') ;
       $this->form_validation->set_rules('id','id','required') ;
      if($this->form_validation->run()==FALSE)
      {
                $response['msg']=strip_tags(validation_errors());
                $response['error']=400;
                echo json_encode($response);
      }
      else
      {
          $otp = $this->input->POST('otp') ;
          $data=$this->Comman_model->getdata('user',array('id'=>$id));
          if($data->otp == $otp)
          {
                $response['msg']="success";
                $response['error']=200;
                echo json_encode($response);
          }
          else
          {
		      $response['msg']='OTP does not matched';
                $response['error']=400;
                echo json_encode($response);
          }
      }
    }
       
    public function change_password()
    {
        $this->default_file();
        $id = $this->input->post('id') ;
        // $this->form_validation->set_rules('old_password','Old Password','required') ;
        $x = $this->input->post('old_password') ;
        $this->form_validation->set_rules('new_password','New Password','required') ;
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[new_password]') ;
          if($this->form_validation->run()==FALSE)
          {
                $response['msg']="Enter Password";
                $response['error']=400;
                echo json_encode($response);
          }
          else
          {
              
              $password = $this->input->post('new_password') ;
              
                 $data=$this->Comman_model->getdata('user',array('id'=>$id));
             if($x==$data->password)
             {
                  $data=$this->Comman_model->updateRecord('user',array('password'=>$password),array('id'=>$id));
                  $y = $this->input->post('new_password') ;
                if($y)
                      {
                            $response['id']=$id;
                            $response['msg']="success";
                            $response['error']=200;
                            echo json_encode($response);
                      }
                      else
                      {
                            $response['msg']="Failed";
                            $response['error']=400;
                            echo json_encode($response);
                      }
                    // $this->session->set_flashdata('success','Password updated successfully!, Please Login.') ;
             }
             else
             {
                 $response['msg']="Old Password Dosenot match";
                $response['error']=400;
                echo json_encode($response);
             }
        
      }
    }
     public function changepassword()
    {
        $this->default_file();
        $id = $this->input->post('id') ;
        // $this->form_validation->set_rules('old_password','Old Password','required') ;
        $x = $this->input->post('old_password') ;
        $this->form_validation->set_rules('new_password','New Password','required') ;
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[new_password]') ;
          if($this->form_validation->run()==FALSE)
          {
                $response['msg']="Enter Password";
                $response['error']=400;
                echo json_encode($response);
          }
          else
          {
              
              $password = $this->input->post('new_password') ;
              
                 $data=$this->Comman_model->getdata('user_profile',array('id'=>$id));
             if($x==$data->password)
             {
                  $data=$this->Comman_model->updateRecord('user_profile',array('password'=>$password),array('id'=>$id));
                  $y = $this->input->post('new_password') ;
                if($y)
                      {
                            $response['id']=$id;
                            $response['msg']="success";
                            $response['error']=200;
                            echo json_encode($response);
                      }
                      else
                      {
                            $response['msg']="Failed";
                            $response['error']=400;
                            echo json_encode($response);
                      }
                    // $this->session->set_flashdata('success','Password updated successfully!, Please Login.') ;
             }
             else
             {
                 $response['msg']="Old Password Dosenot match";
                $response['error']=400;
                echo json_encode($response);
             }
        
      }
    }
    
    public function catagory_new()
    {
        $this->default_file();
        
        $where['country']=$country=$this->input->post('country');
        $where['state']=$state=$this->input->post('state');
        $where['city']=$city=$this->input->post('city');
   
        if($country!='')
        {
            
            if($state!='')
            {
                
                if($city!='')
                {
                    $data1 =$this->Comman_model->getData('catagory', $where);
                        if($data1)
                        {
                            $response['id']=$data1;
                            $response['msg']="Sucsess";
                            $response['error']=200;
                            echo json_encode($response);
                        }
                    else
                        {
                        $response['msg']="Something went wrong";
                        $response['error']=400;
                        echo json_encode($response);
                        }
                    }
                else
                    {
                    $response['msg']="Please Enter City ID";
                    $response['error']=400;
                    echo json_encode($response);
                    }
                }
            else
                {
                    $response['msg']="Please Enter State ID";
                    $response['error']=400;
                    echo json_encode($response);
                }
            }
        else
        {
            $response['msg']="Please Enter Country ID";
            $response['error']=400;
            echo json_encode($response);
        }
    }
    
}