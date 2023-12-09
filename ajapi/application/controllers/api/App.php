<?php
//  use Razorpay\Api\Api;
// include 'razorpay/Razorpay.php';
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
    
    public function country()
    {
        $this->default_file();
        $where['status']='1';
        $data1 =$this->Comman_model->getAllData('country', $where,'id');
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
        // $where['status']='0';
        // $data1 =$this->Comman_model->getAllData('country', $where,'id');
        

              if($this->input->post('state')!='')
              {
                $where['status']='1';
                //$where['country']=$this->input->post('country');
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
        $data1 =$this->Comman_model->getData('user_profile', $data110);
        if(empty($data1))
        {
            //$data22['mobile_no']=$this->input->post('mobile');
            $data1222 =$this->Comman_model->getData('user_profile', $data22);
            if(empty($data1222))
            {
                if($this->input->post('name')!='')
                {
                    if($this->input->post('email')!='')
                    
                        {
                           if($this->input->post('password')!='')
                           // {
                           // if($this->input->post('country')!='')
                                {
                                if($this->input->post('state')!='')
                                    {
                                    if($this->input->post('referral_code')!='')
                                   // {
                                //        if($this->input->post('gender')!='')
                                   // {
                                     //   if($this->input->post('dob')!='')
                                   // {
                                       // if($this->input->post('hobby')!='')
                                   // {
                                     //   if($this->input->post('smoking')!='')
                                   // {
                                         //if($this->input->post('drinking')!='')
                                   // {   
                                     //   if($this->input->post('intrested_in')!//='')
                                    {   
                                      $editup['name']=$this->input->post('name');
                                	  $editup['email']=$this->input->post('email');
                                	//  $editup['mobile_no']=$this->input->post('mobile_no');
                                	  $editup['password']=$this->input->post('password');
                                //	  $editup['country']=$this->input->post('country');
                                	  $editup['state']=$this->input->post('state');
                                	  $editup['referral_code']=$this->input->post('referral_code');
                                	//  $editup['gender']=$this->input->post('gender');
                                	//  $editup['dob']=$this->input->post('dob');
                                	//  $editup['hobby']=$this->input->post('hobby');
                                	//  $editup['smoking']=$this->input->post('smoking');
                                	 // $editup['drinking']=$this->input->post('drinking');
                                	//  $editup['intrested']=$this->input->post('intrested_in');
                                	//  $editup['user_type']='2';
                                	 // $editup['status']='1';
                                    //if($this->input->post('dob')!='')
                                	 //   {
                                	//    $editup['dob']=$this->input->post('dob');
                                	  //  }
                                	    $updated = $this->Comman_model->insertData('user',$editup);
                                	    
                                	if ($updated) 
                            			{
                            			    $response['id']=$updated;
                                            $response['msg']="Sucsess";
                                            $response['error']=200;
                                            echo json_encode($response);
                        			    } 
                        			else 
                        			   // {
                                       // $response['msg']="Something went wrong";
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
                                     }
                                     }
                                     }
                                     }
                                    {
                                        $response['msg']="City is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                            
                            
                                      {
                                        $response['msg']="State is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                                    
                                
                                     
                                     
                            
                            {
                                        $response['msg']="Password is Required";
                                        $response['error']=400;
                                        echo json_encode($response);
                                      }
                    
                        
                        
                                        
                
                    
                    {
                            $response['msg']="Email Address is Required";
                            $response['error']=400;
                            echo json_encode($response);
                    }
               // }
              //  else
                {
                    $response['msg']="Name is Required";
                    $response['error']=400;
                    echo json_encode($response);
                }
           // }
          //  else
        
        {
            $response['msg']="Email Alrady Register";
            $response['error']=400;
            echo json_encode($response);
        }
    
    }
    
    public function userlogin()
    {
        $this->default_file();
        
        $where['mobile_no']=$mobile=$this->input->post('mobile');
        
        $where['password']=$password=$this->input->post('password');
   
        if($mobile!='')
        {
            
            if($password!='')
            {
              
               $data1 =$this->Comman_model->getData('user', $where);
               if($data1)
               {
                    $response['id']=$data1;
                    $response['msg']="Sucsess";
                    $response['error']=200;
                    echo json_encode($response);
               }
               else
               {
                    $response['msg']="Mobile & password dont match";
                    $response['error']=400;
                    echo json_encode($response);
               }
            }
            else
            {
                $response['msg']="Please Enter password";
                $response['error']=400;
                echo json_encode($response);
            }
           
        }
        else
        {
            $response['msg']="Please Enter Mobile Number";
            $response['error']=400;
            echo json_encode($response);
        }
        
        
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
    
    // public function postevent()
    // {
    //     $this->default_file();
    //     $data110['email']=$this->input->post('email');
    //     $data1 =$this->Comman_model->getData('user', $data110);
    //     if(empty($data1))
    //     {
    //         $data22['mobile_no']=$this->input->post('mobile');
    //         $data1222 =$this->Comman_model->getData('user', $data22);
    //         if(empty($data1222))
    //         {
    //             if($this->input->post('fname')!='')
    //             {
    //                 if($this->input->post('email')!='')
    //                 {
    //                     if($this->input->post('catagory')!='')
    //                     {
    //                         if($this->input->post('title')!='')
    //                         {
    //                             if($this->input->post('short_description')!='')
    //                             {
    //                                 if($this->input->post('full_description')!='')
    //                                 {
                                    
    //                                     if($this->input->post('mobile')!='')
    //                                     {
    //                                         if($this->input->post('password')!='')
    //                                         {
    //                                             if($this->input->post('country')!='')
    //                                             {
    //                                                 if($this->input->post('state')!='')
    //                                                 {
    //                                                     if($this->input->post('city')!='')
    //                                                     {
    //                                                         if($this->input->post('address')!='')
    //                                                         {
    //                                                             if($this->input->post('gender')!='')
    //                                                             {
    //                                                                 if($this->input->post('dob')!='')
    //                                                                 {
    //                                                                     if($this->input->post('hobby')!='')
    //                                                                     {
    //                                                                         if($this->input->post('smoking')!='')
    //                                                                         {
    //                                                                             if($this->input->post('drinking')!='')
    //                                                                             {   
    //                                                                                 if($this->input->post('intrested_in')!='')
    //                                                                                 {   
    //                                                                                     if($this->input->post('partydetails')!='')
    //                                                                                     {   
    //                                                                                         if($this->input->post('eligibility')!='')
    //                                                                                         {   
    //                                                                                             if($this->input->post('price')!='')
    //                                                                                             {   
    //                                                                                                 if($this->input->post('offer')!='')
    //                                                                                                 {   
    //                                                                                                     if($this->input->post('day')!='')
    //                                                                                                     {   
    //                                                                                                         if($this->input->post('expected_time')!='')
    //                                                                                                         {   
    //                                                                                                           $editup['name']=$this->input->post('fname');
    //                                                                                                     	  $editup['email']=$this->input->post('email');
    //                                                                                                     	  $editup['catagory']=$this->input->post('catagory');
    //                                                                                                     	  $editup['title']=$this->input->post('title');
    //                                                                                                     	  $editup['short_description']=$this->input->post('short_description');
    //                                                                                                     	  $editup['full_description']=$this->input->post('full_description');
    //                                                                                                     	  $editup['mobile_no']=$this->input->post('mobile');
    //                                                                                                     	  $editup['password']=$this->input->post('password');
    //                                                                                                     	  $editup['country']=$this->input->post('country');
    //                                                                                                     	  $editup['state']=$this->input->post('state');
    //                                                                                                     	  $editup['city']=$this->input->post('city');
    //                                                                                                     	  $editup['address']=$this->input->post('address');
    //                                                                                                     	  $editup['gender']=$this->input->post('gender');
    //                                                                                                     	  $editup['dob']=$this->input->post('dob');
    //                                                                                                     	  $editup['hobby']=$this->input->post('hobby');
    //                                                                                                     	  $editup['smoking']=$this->input->post('smoking');
    //                                                                                                     	  $editup['drinking']=$this->input->post('drinking');
    //                                                                                                     	  $editup['intrested_in']=$this->input->post('intrested_in');
    //                                                                                                     	  $editup['partydetails']=$this->input->post('partydetails');
    //                                                                                                     	  $editup['eligibility']=$this->input->post('eligibility');
    //                                                                                                     	  $editup['price']=$this->input->post('price');
    //                                                                                                     	  $editup['offer']=$this->input->post('offer');
    //                                                                                                     	  $editup['day']=$this->input->post('day');
    //                                                                                                     	  $editup['expected_time']=$this->input->post('expected_time');
    //                                                                                                     	  $editup['user_type']='2';
    //                                                                                                         if($this->input->post('dob')!='')
    //                                                                                                     	    {
    //                                                                                                     	        $editup['dob']=$this->input->post('dob');
    //                                                                                                     	    }
    //                                                                                                     	        $updated = $this->Comman_model->insertData('event',$editup);
                                	    
    //                                                                                                         if ($updated) 
    //                                                                                                     		{
    //                                                                                                 			    $response['user_id']=$updated;
    //                                                                                                                 $response['msg']="Sucsess";
    //                                                                                                                 $response['error']=200;
    //                                                                                                                 echo json_encode($response);
    //                                                                                                 			} 
    //                                                                                             			else 
    //                                                                                             			{
    //                                                                                                             $response['msg']="Something went wrong";
    //                                                                                                             $response['error']=400;
    //                                                                                                             echo json_encode($response);
    //                                                                                              			}
    //                                                                                                  		}
    //                                                                                                     else
    //                                                                                                     {
    //                                                                                                         $response['msg']="Expected Time is Required";
    //                                                                                                         $response['error']=400;
    //                                                                                                         echo json_encode($response);
    //                                                                                                     }
    //                                                                                                     }
    //                                                                                                 else
    //                                                                                                 {
    //                                                                                                     $response['msg']="Day is Required";
    //                                                                                                     $response['error']=400;
    //                                                                                                     echo json_encode($response);
    //                                                                                                 }
    //                                                                                                 }
    //                                                                                             else
    //                                                                                             {
    //                                                                                                 $response['msg']="Offer is Required";
    //                                                                                                 $response['error']=400;
    //                                                                                                 echo json_encode($response);
    //                                                                                             }
    //                                                                                             }
    //                                                                                         else
    //                                                                                         {
    //                                                                                             $response['msg']="Charges is Required";
    //                                                                                             $response['error']=400;
    //                                                                                             echo json_encode($response);
    //                                                                                         }
    //                                                                                         }
    //                                                                                      else
    //                                                                                     {
    //                                                                                         $response['msg']="Eligibility is Required";
    //                                                                                         $response['error']=400;
    //                                                                                         echo json_encode($response);
    //                                                                                     }
    //                                                                                     }
    //                                                                                 else
    //                                                                                 {
    //                                                                                     $response['msg']="Party Details is Required";
    //                                                                                     $response['error']=400;
    //                                                                                     echo json_encode($response);
    //                                                                                 }
    //                                                                                 }
    //                                                                             else
    //                                                                             {
    //                                                                                 $response['msg']="Your interested is Required";
    //                                                                                 $response['error']=400;
    //                                                                                 echo json_encode($response);
    //                                                                             }
    //                                                                             }
    //                                                                         else
    //                                                                         {
    //                                                                             $response['msg']="drinking is Required";
    //                                                                             $response['error']=400;
    //                                                                             echo json_encode($response);
    //                                                                          }
    //                                                                         }
    //                                                                     else
    //                                                                     {
    //                                                                         $response['msg']="Smoking is Required";
    //                                                                         $response['error']=400;
    //                                                                         echo json_encode($response);
    //                                                                     }
    //                                                                     }
    //                                                                 else
    //                                                                 {
    //                                                                     $response['msg']="Hobby is Required";
    //                                                                     $response['error']=400;
    //                                                                     echo json_encode($response);
    //                                                                 }
    //                                                                 }
    //                                                             else
    //                                                             {
    //                                                                 $response['msg']="DOB is Required";
    //                                                                 $response['error']=400;
    //                                                                 echo json_encode($response);
    //                                                             }
    //                                                             }
    //                                                         else
    //                                                         {
    //                                                             $response['msg']="Gender is Required";
    //                                                             $response['error']=400;
    //                                                             echo json_encode($response);
    //                                                         }
    //                                                         }
    //                                                     else
    //                                                     {
    //                                                         $response['msg']="Address is Required";
    //                                                         $response['error']=400;
    //                                                         echo json_encode($response);
    //                                                     }
    //                                                     }
    //                                                 else
    //                                                 {
    //                                                     $response['msg']="City is Required";
    //                                                     $response['error']=400;
    //                                                     echo json_encode($response);
    //                                                 }
    //                                                 }
    //                                             else
    //                                             {
    //                                                 $response['msg']="State is Required";
    //                                                 $response['error']=400;
    //                                                 echo json_encode($response);
    //                                             }
    //                                             }
    //                                         else
    //                                         {
    //                                             $response['msg']="Country is Required";
    //                                             $response['error']=400;
    //                                             echo json_encode($response);
    //                                         }
    //                                         }
    //                                     else
    //                                     {
    //                                         $response['msg']="Password is Required";
    //                                         $response['error']=400;
    //                                         echo json_encode($response);
    //                                     }
    //                                     }
    //                                 else
    //                                 {
    //                                     $response['msg']="Mobile Number is Required";
    //                                     $response['error']=400;
    //                                     echo json_encode($response);
    //                                 }
    //                                 }
    //                             else
    //                             {
    //                                 $response['msg']="Full Description is Required";
    //                                 $response['error']=400;
    //                                 echo json_encode($response);
    //                             }
    //                             }
    //                         else
    //                         {
    //                             $response['msg']="Short Description is Required";
    //                             $response['error']=400;
    //                             echo json_encode($response);
    //                         }
    //                         }
    //                     else
    //                     {
    //                         $response['msg']="Title is Required";
    //                         $response['error']=400;
    //                         echo json_encode($response);
    //                     }
    //                     }
    //                 else
    //                 {
    //                     $response['msg']="Catagory is Required";
    //                     $response['error']=400;
    //                     echo json_encode($response);
    //                 }
    //                 }
    //             else
    //             {
    //                 $response['msg']="Email Address is Required";
    //                 $response['error']=400;
    //                 echo json_encode($response);
    //             }
    //             }
    //         else
    //         {
    //             $response['msg']="Full Name is Required";
    //             $response['error']=400;
    //             echo json_encode($response);
    //         }
    //         }
    //     else
    //     {
    //         $response['msg']="Mobile Alrady Register";
    //         $response['error']=400;
    //         echo json_encode($response);
    //     }
    //     }
    // else
    // {
    //     $response['msg']="Email Alrady Register";
    //     $response['error']=400;
    //     echo json_encode($response);
    // }
    // }
    
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
        if($this->input->post('user_id')!='')
        {
           
                $where['id']=$this->input->post('user_id');
                $insert=$this->Comman_model->Deletedata('user', $where);
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
    
    
    
    public function  delete_video()
    {
          $this->default_file();
        if($this->input->post('id')!='')
        {
           
                $where['id']=$this->input->post('id');
                $insert=$this->Comman_model->Deletedata('reals_post', $where);
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
        $this->form_validation->set_rules('email','Email','required|valid_email') ;
          if($this->form_validation->run()==FALSE)
          {
            $response['msg']="Enter Email Address";
            $response['error']=400;
            echo json_encode($response);
          }
          else
          {
         
            $data['email']= $this->input->post('email');
		    $data1=$this->Comman_model->getdata('user',$data);
		    
    		    if(!empty($data1))
    		    {
    		      $id=$data1->id;
        		  $this->load->library('email');
        		  $otp = mt_rand(1111,9999) ;
                  $aa=$this->Comman_model->updateRecord('user',array('otp'=>$otp),array('id'=>$id));
                    if($aa)
                    {
                        $e=$data1->email;
                          $this->email->from('hr@ksglobaltech.com','events');
                          $this->email->to($e);
                          $this->email->subject('One time Password');
                          $this->email->message('Dear User, Your one time password is '.$otp.' to reset your password');
                          $y=$this->email->send();
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
        		    $response['msg']="Email Dont exits";
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