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
	public function getassigndata()
	{
		$this->default_file();
		$query=$this->db->query("SELECT * FROM ime WHERE enroll_status='0'");
		$rest=$query->result_array();
		
		$response['data']=$rest;
		$response['msg']="success";
		$response['error']="200";
		echo json_encode($response);
		
		
	}
	public function callog()
	{
		 $this->default_file();
		$userid=$this->input->post('userid');
		$fnumber=$this->input->post('fnumber');
		$cmnumber=$this->input->post('cmnumber');
		$number=$this->input->post('number');
		$name=$this->input->post('name');
		$type=$this->input->post('type');
		$date=$this->input->post('date');
		$duration=$this->input->post('duration');
		$aid=$this->input->post('accountid');
		$simname=$this->input->post('simname');
		$red=$this->db->query("INSERT INTO `callog`(`userid`,`Fnumber`,`CMnumber`,`number`,`name`,`type`,`date`,`duration`,`accountID`,`simname`) VALUES ('$userid','$fnumber','$cmnumber','$number','$name','$type','$date','$duration','$aid','$simname')");
		if($red==true)
        {
            
            $response['msg']="data save successfully";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Internal server error";
            $response['error']="400";
            echo json_encode($response);
        }
	}
	public function getcallogdata()
	{
		$this->default_file();
		$userid=$this->input->get('userid');
		$get=$this->db->query("SELECT * FROM callog WHERE userid='$userid'");
		$data=$get->result_array();
		if(!empty($data))
        {
            $response['data']=$data;
            $response['msg']="success";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Internal server error";
            $response['error']="400";
            echo json_encode($response);
        }
		
		
	}
	public function getenrollment()
	{
		$this->default_file();
		$query=$this->db->query("SELECT * FROM `enrollment_double`");
		$data=$query->row();
		$rest=$query->num_rows();
		if($rest>0)
		{
			$response['data']=$data;
			$response['msg']="Success";
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
     public function alssuserlist()
    {
        $this->default_file();
        if(!empty($this->input->get('supdis'))){
          $where['supdis']=$this->input->get('supdis');
       
        }
         if(!empty($this->input->get('dist'))){
          $where['dist']=$this->input->get('dist');

        }
         if(!empty($this->input->get('sales'))){
          $id=$this->input->get('sales');

        }
        
        if(!empty($this->input->get('id'))){
                    $where['created_by']=$this->input->get('id');

        }
        $type=$this->input->get('type');
                        $where['type']=$this->input->get('type');

                if($type =='2'&& !empty($id)){

                }else{
                 

                }
         if($type=='2'&& empty($this->input->get('id'))){
                         $sql=$this->db->query("SELECT shop_data.*,user.`username`, user.`type`, user.`mobile`, user.`email`, user.`address`, user.`total_device`,user.`blocked_devices`, user.`unblocked_devices`, user.`free_devices`, user.`shop_id` FROM user,shop_data WHERE shop_data.user_id=user.id && user.created_by='$id' && type='2'");
           $data1 =$sql->result_array();

         }elseif($type=='2'&& !empty($this->input->get('id'))){
             $id=$this->input->get('id');
    $sql=$this->db->query("SELECT shop_data.*,user.`username`, user.`type`, user.`mobile`, user.`email`, user.`address`, user.`total_device`,user.`blocked_devices`, user.`unblocked_devices`, user.`free_devices`, user.`shop_id` FROM user,shop_data WHERE shop_data.user_id=user.id && user.created_by='$id' && type='2'");
           $data1 =$sql->result_array();

         }else{
           $data1 =$this->Comman_model->getAllData('user', $where,'id');

         }

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
	public function getaddress()
	{
		$this->default_file();
		$id['id']=$uid=$this->input->get('user_id');
		$data=$this->db->query("SELECT * FROM ime WHERE id=$uid");
		$rest=$data->result_array();
		foreach($rest as $row)
		{
			$lati=$row['lat'];
			$longi=$row['longitude'];
		}
		$lat=$lati;
		$long=$longi;
		// Initiate curl session in a variable (resource)
		$json1 = json_decode ( file_get_contents ( "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=false&key=AIzaSyBt0XXMqrIAoo-tec72ZeRgnpQF4bkm4Tw"), true);
		$count=count($json1);

		$fulladdress=$json1['results'][0]["formatted_address"];
		$cityname=$json1['results'][0]['address_components']['1']['long_name'];
		$district=$json1['results'][0]['address_components']['2']['long_name'];
		$statename=$json1['results'][0]['address_components']['4']['long_name'];
		$pincode=$json1['results'][0]['address_components']['6']['long_name'];
		$country=$json1['results'][0]['address_components']['5']['long_name'];
		$data1=['fullAddress'=>$fulladdress,'cityname'=>$cityname,'district'=>$district,'statename'=>$statename,'pincode'=>$pincode,'country'=>$country,'lat'=>$lati,'long'=>$longi];

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


	}
    public function getshop_data()
    {
        $this->default_file();
        $id=$this->input->get('id');
        $dist=$this->input->get('dist');
        // $a=$this->db->select("SELECT shop_data.*,user.`username`, user.`type`, user.`mobile`, user.`email`, user.`address`, user.`total_device`,user.`blocked_devices`, user.`unblocked_devices`, user.`free_devices`, user.`shop_id` FROM user,shop_data WHERE shop_data.user_id=user.id && user.sales='$id' && type=2")->result_array();
            $sql=$this->db->query("SELECT shop_data.*,user.`username`, user.`type`, user.`mobile`, user.`email`, user.`address`, user.`total_device`,user.`blocked_devices`, user.`unblocked_devices`, user.`free_devices`, user.`shop_id` FROM user,shop_data WHERE shop_data.user_id=user.id && user.created_by='$id' && type=2");

       
        $data =$sql->result_array();
        //$this->Comman_model->getshop_data();
        if($data)
        {
            $response['data']=$data;
            $response['msg']="success";
            $response['error']=200;
            echo json_encode($response);
        }else{
            $response['msg']="No Data";
            $response['error']="400";
            echo json_encode($response);
        }
    }
	public function transferbalance()
	{
		$this->default_file();
		$id['uid']=$uid=$this->input->post('userid');
		$userid=$this->post('id');
		$data=$this->db->query("SELECT * FROM transactions WHERE uid='$uid' ORDER BY uid DESC LIMIT 1");
		$reds=$data->result_array();
		foreach($reds as $row)
		{
			$balance=$row['remainbal'];
			
		}
		
		
	}
	public function locationstatus()
	{
		$this->default_file();
		$id['id']=$this->input->post('userid');
		$data['status']=2;
	   $data1 =$this->Comman_model->UpdateRecord('ime', $data, $id);
		if(!empty($data1))
        {
            $response['id']=$this->input->post('userid');
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
	public function simdatastatus()
	{
		$this->default_file();
		$id['id']=$this->input->post('userid');
		$data['status']=3;
	   $data1 =$this->Comman_model->UpdateRecord('ime', $data, $id);
		if(!empty($data1))
        {
            $response['id']=$this->input->post('userid');
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
	public function callogdatastatus()
	{
		$this->default_file();
		$id['id']=$this->input->post('userid');
		$data['status']=4;
	   $data1 =$this->Comman_model->UpdateRecord('ime', $data, $id);
		if(!empty($data1))
        {
            $response['id']=$this->input->post('userid');
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
	public function contactstatus()
	{
		$this->default_file();
		$id['id']=$this->input->post('userid');
		$data['status']=1;
	   $data1 =$this->Comman_model->UpdateRecord('ime', $data, $id);
		if(!empty($data1))
        {
            $response['id']=$this->input->post('userid');
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
	public function userdata()
	{
		$this->default_file();
		$editup['user_id']=$user_id=$this->input->post('user_id');
		
		$editup['name']=$this->input->post('name');
		$editup['phone']=$this->input->post('phone');
		$insert=$this->Comman_model->insertData('userdata',$editup);
		 $where['id']=$user_id;
		 $data['status']=0;
         $this->Comman_model->UpdateRecord('ime', $data, $where);
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
	public function getcontact()
	{
		$this->default_file();
		$user_id=$this->input->get('user_id');
		$data=$this->db->query("SELECT * FROM userdata WHERE user_id=$user_id");
		$red=$data->result_array();
		if($red)
		{
            $response['data']=$red;
			$response['msg']="Sucsess";
			$response['error']="200";
			echo json_encode($response);
		}
		else
		{
			$response['msg']="Internet Server Error";
			$response['error']="400";
			echo json_encode($response);
		}

		
	}
	public function datauser()
	{
		$this->default_file();
		$where['id']=$id=$this->input->get('userid');
		$this->db->where('id',$id);
		$this->db->select('*');
		$this->db->from('ime');
		$getsa=$this->db->get();
		$red=$getsa->result_array();
		foreach($red as $row)
		{
			$red=$row['shop_id']; 
		}
		
		$where['`ime`.`shop_id`']=$shop_id=$red;
		$userid='`ime`.`shop_id`=`shop_data`.`shop_id`';
		$this->db->where('`ime`.`shop_id`',$shop_id);
		$this->db->where($userid);
		$this->db->select('`ime`.*,`shop_data`.`dname` AS uname,`shop_data`.`dp_officer_phone` AS dmobile');
		$this->db->from('ime, shop_data');
		$gets=$this->db->get();
		$red=$gets->result_array();
		if($red)
		{
            $response['data']=$red;
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
	public function userlatlong()
	{
		$this->default_file();
		$editup['user_id']=$user_id=$this->input->post('user_id');
		if($user_id)
		{	
		 $where['id']=$user_id;
		 $data['status']=0;
		 $data['lat']=$this->input->post('lat');
		 $data['longitude']=$this->input->post('longitude');	
         $update=$this->Comman_model->UpdateRecord('ime', $data, $where);
		if($update)
		{

			$response['msg']="Sucsess";
			$response['error']=200;
			echo json_encode($response);
		}
		else
		{
			
			$response['msg']="Internel Server Error";
			$response['error']=400;
			echo json_encode($response);
		}
		}
		else
		{
		    $response['msg']="Please Enter User id";
			$response['error']=400;
			echo json_encode($response);	
		}

	}
    public function keymatch()
	{
		 $this->default_file();
        $where['id']=$id=$this->input->post('phone');
        //$data1 =$this->db->query("SELECT * FROM ime WHERE id=$id");
		$this->db->where('id',$id);
		$this->db->select('*');
		$this->db->from('ime');
		$data=$this->db->get();
		
		$red=$data->result_array();
		if(!empty($red))
		{
			foreach($red as $row)
			{
				$uid['id']=$row['id'];
			}
		
			$editup['lock_unlock']='1';
			
			if($this->input->post('userdeviceid') !='')
			{
				$editup['userdevice_id']=$this->input->post('userdeviceid');
			}
			$data2=$this->Comman_model->UpdateRecord('ime', $editup, $uid);

        if(!empty($data2))
        {
			 $data1 =$this->Comman_model->getData('ime', $uid);
			{
            $response['data']=$data1;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
			}
        }
        else
        {
            $response['msg']="Server Error";
            $response['error']=400;
            echo json_encode($response);
        }
		}
		else
		{
			$response['msg']="please Enter valid key";
            $response['error']=400;
            echo json_encode($response);
		}
	}
	public function getdatas()
	{
		 $this->default_file();
		$where['id']=$id=$this->input->get('userid');
		$this->db->where('id',$id);
		$this->db->select('*');
		$this->db->from('ime');
		$getsa=$this->db->get();
		//$getsa="SELECT * FROM ime WHERE mobile=$mobile ";
		$red=$getsa->row();
		if(!empty($red))
		{
		   $response['data']=$red;
            $response['msg']="Sucsess";
            $response['error']="200";
            echo json_encode($response);
		}
		else
		{
		    $response['msg']="please Enter Valid Number";
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
            $response['data']=$data1;
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
           $response['msg']="id Again";
            $response['error']=400;
            echo json_encode($response);
       }
   }
   
    public function update_profile()
    {
       $this->default_file();
        $where['id']=$this->input->post('id');
        
        if($this->input->post('username')!='')
        {
            $data['username']=$this->input->post('username');
        }
        if($this->input->post('mobile')!='')
        {
            $data['mobile']=$this->input->post('mobile');
        }
         if($this->input->post('email')!='')
         {
            $data['email']=$this->input->post('email');
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
   public function update_1()
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
          $data1 =$this->Comman_model->UpdateRecord('ime', $data, $where);
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
    public function update_2()
    {
       $this->default_file();
        $where['id']=$this->input->post('id');
        
        if($this->input->post('due_date')!='')
        {
            $data['due_date']=$this->input->post('due_date');
        }
        if($this->input->post('last_ime_paydate')!='')
        {
            $data['last_ime_paydate']=$this->input->post('last_ime_paydate');
        }
         if($this->input->post('no_of_payimi')!='')
         {
            $data['no_of_payimi']=$this->input->post('no_of_payimi');
         }
         if($this->input->post('no_of_ime')!='')
         {
            $data['no_of_ime']=$this->input->post('no_of_ime');
         }
          $data1 =$this->Comman_model->UpdateRecord('ime', $data, $where);
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
   public function update_imei()
   {
       $this->default_file();
        $where['id']=$red=$this->input->post('id');
     if(!empty($red))
     {
        $data['emi_Amount']=$this->input->post('emi_Amount');
         $data['due_date']=$this->input->post('due_date');
        $data['no_of_ime']=$this->input->post('no_of_ime');
        $data['no_of_payimi']=$this->input->post('no_of_payimi');
        $data['last_ime_paydate']=$this->input->post('last_ime_paydate');
          $data1 =$this->Comman_model->UpdateRecord('ime', $data, $where);
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
            $response['error']="400";
            echo json_encode($response);
		}
         }
        else
        {
          $response['msg']="user_id is required";
            $response['error']="400";
            echo json_encode($response);
        }
        
   }
public function update_imeis()
    {
       $this->default_file();
        $where['id']=$red=$this->input->post('id');
     if(!empty($red))
     {
        $data['emi_Amount']=$this->input->post('emi_Amount');
         $data['due_date']=$this->input->post('due_date');
        $data['no_of_ime']=$this->input->post('no_of_ime');
        $data['no_of_payimi']=$this->input->post('no_of_payimi');
        $data['last_ime_paydate']=$this->input->post('last_ime_paydate');
          $data1 =$this->Comman_model->UpdateRecord('ime', $data, $where);
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
            $response['error']="400";
            echo json_encode($response);
		}
         }
        else
        {
          $response['msg']="user_id is required";
            $response['error']="400";
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
     public function add_shop()
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
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        
        
        $this->load->model('Comman_model');
        date_default_timezone_set('Asia/Kolkata');
      
        $data111['mobile']=$this->input->post('mobile');
    
    
        $data1 =$this->Comman_model->getData('user', $data111);
        if(empty($data1))
        {
              $data1112['id']    = $this->input->post('created_by');
                  $creat= $this->Comman_model->getData('user', $data1112);
          if(!empty($creat)){
                if(!empty($this->upload->do_upload('photo')))
            {
                $ori_filename=$_FILES['photo']['name'];
         $new_name=time()."".str_replace('','-',$ori_filename);
         $this->load->library('upload', $config);
         $this->upload->do_upload('photo');
                if(!empty($this->input->post('email'))){
                   if(!empty($this->input->post('address'))){
                   if(!empty($this->input->post('username'))){
                       
                  
                  
                     $data110['mobile']=$this->input->post('mobile');
                     $data110['email']=$this->input->post('email');
                     $data110['address']=$this->input->post('address');
                     $data110['created_by']=$this->input->post('created_by');
                     $data110['username']=$this->input->post('username');
                     $data110['type']=$this->input->post('type');
                     $data110['status']='1';
                   
                   
                   if($creat->type=='5'){
                   $data110['supdis']=$creat->supdis;
                    $data110['dist']=$creat->dist;
                    
                    $data110['sales']=$this->input->post('created_by');
                     }elseif($creat->type=='4'){
                         $data110['supdis']=$creat->supdis;
                    $data110['dist']=$this->input->post('created_by');
                     }elseif($creat->type=='3'){
                      $data110['supdis']=$this->input->post('created_by');

                     }else{
                          $data110['supdis']='1';
                    $data110['dist']='1';
                    
                    $data110['sales']='1';
                     }
                  
                     $file=$this->upload->data();
                    //  print_r($file);die;
                     $add=$file['file_name'];
            
                     $data110['photo']=$add;
                     $insert=$this->Comman_model->insertData('user',$data110);
                     $this->db->where('id',$insert);
                     $a=$this->db->get('user');
                     $b= $a->result_array();
                     foreach($b as $ab)
                     {
            	        if($insert)
                        {
                              $response['country']=$ab;
                              $response['msg']="Sucsess";
                              $response['error']="200";
                              echo json_encode($response);
                        }
                        else
                        {
                              $response['msg']="Internet Server Error";
                              $response['error']="400";
                              echo json_encode($response);
                        } 
                     }
                
        
        }
            else
            {
                $response['msg']="Please Enter Valid User Name";
                $response['error']=400;
                echo json_encode($response);
            }
        }
            else
            {
                $response['msg']="Please Enter Valid Address";
                $response['error']=400;
                echo json_encode($response);
            }
            
            }
                else
                {
                    $response['msg']="Please Enter Valid Email";
                    $response['error']=400;
                    echo json_encode($response);
                }
            }
            else
            {
                $response['msg']="Shop Image is Required";
                    $response['error']=400;
                    echo json_encode($response);
            }
          }
    }
        else
        {
            $response['msg']="Mobile is already Exist";
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
    
     public function device_list()
    {
        $this->default_file();
        $where['shop_id']=$this->input->post('shop_id');
        $data1 =$this->Comman_model->getAllData('ime', $where,'id');
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
     public function device_c()
    {
        $this->default_file();
        $where['deviceSno']=$this->input->get('deviceSno');
        $data1 =$this->Comman_model->getAllData('ime', $where,'id');
        if(!empty($data1))
        {
           
            $response['msg']="true";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="false";
            $response['error']="400";
            echo json_encode($response);
        }
    }
    
    
    public function all_user_data()
    {
        $this->default_file();
       
        $data1 =$this->Comman_model->getAllData('user,user_details,shop_data');
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
    
    //login and registration section

    public function register()
    {
        $this->default_file();
      
        $data111['mobile']=$this->input->post('mobile');
    
    
        $data1 =$this->Comman_model->getData('user', $data111);
        if(empty($data1))
        {
      
        if(!empty($this->input->post('email'))){
             if(!empty($this->input->post('address'))){
             if(!empty($this->input->post('username'))){
             if(!empty($this->input->post('email'))){
      
        $data110['mobile']=$this->input->post('mobile');
        $data110['email']=$this->input->post('email');
        $data110['address']=$this->input->post('address');
        $data110['created_by']=$this->input->post('created_by');
        $data110['username']=$this->input->post('username');
        $data110['type']='2';
       $data110['status']='1';
      $insert=$this->Comman_model->insertData('user',$data110);
      
        	    if($insert)
                {
                   $response['id']="$insert";
                    $response['msg']="Sucsess";
                    $response['error']="200";
                    echo json_encode($response);
                    $id=$this->db->insert_id();
                    $this->db->select('*');
                    $this->db->where('id',$id);
                    $get=$this->db->get('user');
                    foreach($get as $gets)
                    {
                        $free_device=$gets['free_devices'];
                        $blocked_device=$gets['blocked_devices'];
                        $free_devices="$free_device+1";
                        $blocked_devices="$blocked_device-1";
                        $data=[
                            'free_devices'=>$free_devices,
                            'blocked_devices'=>$blocked_devices
                            ];
                        $this->db->where('id',$id);
                        $this->db->update('user',$data);
                        
                    }
                }
                else
                {
                    $response['msg']="Internet Server Error";
                    $response['error']="400";
                    echo json_encode($response);
                }  
            
        }else{
            $response['msg']="Please Enter Valid Created By";
            $response['error']=400;
            echo json_encode($response);
        }
        }else{
            $response['msg']="Please Enter Valid User Name";
            $response['error']=400;
            echo json_encode($response);
        }
        }else{
            $response['msg']="Please Enter Valid address";
            $response['error']=400;
            echo json_encode($response);
        }
        }else{
            $response['msg']="Please Enter Valid email";
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
 public function register2()
    {
        $this->default_file();
       $data110['user_id']=$this->input->post('user_id');
	 if($this->input->post('user_id')!='')
	 {
		 
        
		 if($this->input->post('dname')!='')
		 {
			 $data110['dname']=$this->input->post('dname');
        $data110['contact_email']=$this->input->post('contact_email');
        //$data110['dp_officername']=$this->input->post('dp_officername');
        //$data110['dp_officer_phone']=$this->input->post('dp_officer_phone');
        $data110['r_officer_name']=$this->input->post('r_officer_name');
        $data110['r_officer_phone']=$this->input->post('r_officer_phone');
        $data110['r_officer_email']=$this->input->post('r_officer_email');
        //$data110['dp_officer_email']=$this->input->post('dp_officer_email');
       $data110['shop_id']=$this->input->post('user_id');
        $wheres['id']=$this->input->post('user_id');
        $data110['status']='1';
                 $data111['shop_id']=$this->input->post('enterprise_id');

      $insert=$this->Comman_model->insertData('shop_data',$data110);
          $data['shop_id']=$this->input->post('enterprise_id');
          //$data2 =$this->Comman_model->UpdateRecord('user', $data, $wheres);
    
          if($insert)
                {
                   $response['id']="$insert";
                    $response['msg']="Sucsess";
                    $response['error']="200";
                    echo json_encode($response);
                }
                else
                {
                    $response['msg']="Internet Server Error";
                    $response['error']="400";
                    echo json_encode($response);
                } 
		 }
        else
		{
			 $response['msg']="shop name is required";
			$response['error']="400";
			echo json_encode($response);
		}
	 }
	 else
	 {
		 $response['msg']="Shopid is required";
		 $response['error']="400";
		 echo json_encode($response);
	 }
    }
    public function add_lock()
    {
        $this->default_file();
        $where['shop_id']=$this->input->post('userid');
        $data1 =$this->Comman_model->getData('user', $where);
        if(!empty($data1))
        {
            $unblocked_devices=$data1->unblocked_devices;
            $blocked_devices=$data1->blocked_devices;
            
            
      $data['unblocked_devices']=$unblocked_devices-1;
      $data['blocked_devices']=$blocked_devices+1;
     $data1 =$this->Comman_model->UpdateRecord('user', $data, $where);
     $data2['deviceSno']=$this->input->post('devicesno');
     $datas['lock_unlock']='2';
     $data3 =$this->Comman_model->UpdateRecord('ime', $datas, $data2);
            
            $response['msg']="success";
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
     public function un_lock()
    {
        $this->default_file();
        $where['shop_id']=$this->input->post('userid');
        $data1 =$this->Comman_model->getData('user', $where);
        if(!empty($data1))
        {
            $unblocked_devices=$data1->unblocked_devices;
            $blocked_devices=$data1->blocked_devices;
            
            
      $data['unblocked_devices']=$unblocked_devices+1;
      $data['blocked_devices']=$blocked_devices-1;
     $data1 =$this->Comman_model->UpdateRecord('user', $data, $where);
     $data2['deviceSno']=$this->input->post('devicesno');
     $datas['lock_unlock']='1';
     $data3 =$this->Comman_model->UpdateRecord('ime', $datas, $data2);
            
            $response['msg']="success";
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
 public function update_shopid()
    {
       $this->default_file();
    
           $where['id']=$this->input->post('id');
           $wheres['id']=$this->input->post('uid');
      $data['shop_id']=$this->input->post('shop_id');
     $data1 =$this->Comman_model->UpdateRecord('shop_data', $data, $where);
          $data1 =$this->Comman_model->UpdateRecord('user', $data, $wheres);

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
            $response['error']="400";
            echo json_encode($response);
        }
        
   }
public function checkmobile()
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
    $phone=$this->input->get('mobile');
    $where1['mobile']=$phone;
        
       $data1 =$this->Comman_model->getData('user', $where1);
       if(!empty($data1))
        {
            echo "hi";
        }
        else
        {
            $this->db->where('mobile',$phone);
            $a=$this->db->get('usr');
            $b= $a->result_array();
            foreach($b as $ab)
            {
                $username=$ab['username'];
                $email=$ab['email'];
                $mobile=$ab['mobile'];
            }
            $responce=[
                'mobile'=>$mobile,
                'email'=>$email,
                'username'=>$username
                ];
                echo json_encode($responce);
        }
}

	 public function transferbalances()
    {
       $this->default_file();

        
        $uid=$this->input->get('uid');
        $tid=$this->input->get('tid');
        $piece=$this->input->get('piece');
        
        $where['id']=$uid;
        $where1['mobile']=$tid;
        
       $data1 =$this->Comman_model->getData('user', $where);
       
       $data2 =$this->Comman_model->getData('user', $where1);

     
        if(!empty($data1))
        {
       $totdev1 =$data1->total_device;
       $freedev1 =$data1->free_devices;
     

       if($freedev1 >= $piece){
                
                
    $data5['total_device']=$totdev1+$piece;
      $data5['free_devices']=$freedev1+$piece;


     $data4 =$this->Comman_model->UpdateRecord('user', $data5, $where);
            
            
            
        $totdev =$data2->total_device;
       $freedev =$data2->free_devices;
       
      $datal['total_device']=$totdev-$piece;
      $datal['free_devices']=$freedev-$piece;


        $data3 =$this->Comman_model->UpdateRecord('user', $datal, $where1);


       $data110['remainbal']= $freedev1-$piece;
       $data110['remaintid']= $freedev+$piece;
       $data110['piece']=$piece ;
       $data110['type']= 'Reverse';
       $data110['uid']= $uid;
       $data110['tid']= $data2->id;
       $data110['typetid']='Reverse';
       $data110['datetime']= date('Y-m-d H:i:s');

     $insert=$this->Comman_model->insertData('transactions',$data110);


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
       }else{}
        
   }

 public function balancetransfer()
    {
       $this->default_file();

        
        $uid=$this->input->get('uid');
        $tid=$this->input->get('tid');
        $piece=$this->input->get('piece');
        
        $where['id']=$uid;
        $where1['mobile']=$tid;
        
       $data1 =$this->Comman_model->getData('user', $where);
       
       $data2 =$this->Comman_model->getData('user', $where1);

     
        if(!empty($data1))
        {
       $totdev1 =$data1->total_device;
       $freedev1 =$data1->free_devices;
     

       if($freedev1 >= $piece){
                
                
    $data5['total_device']=$totdev1-$piece;
      $data5['free_devices']=$freedev1-$piece;


     $data4 =$this->Comman_model->UpdateRecord('user', $data5, $where);
            
            
            
        $totdev =$data2->total_device;
       $freedev =$data2->free_devices;
       
      $datal['total_device']=$totdev+$piece;
      $datal['free_devices']=$freedev+$piece;


        $data3 =$this->Comman_model->UpdateRecord('user', $datal, $where1);


       $data110['remainbal']= $freedev1-$piece;
       $data110['remaintid']= $freedev+$piece;
       $data110['piece']=$piece ;
       $data110['type']= 'debit';
       $data110['uid']= $uid;
       $data110['tid']= $data2->id;
       $data110['typetid']='credit';
       $data110['datetime']= date('Y-m-d H:i:s');

     $insert=$this->Comman_model->insertData('transactions',$data110);


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
       }else{}
        
   }

 public function add_balance()
    {
       $this->default_file();
    
        $where['id']='1';
      $piece=$this->input->get('piece');
       $data1 =$this->Comman_model->getData('user', $where);
     
        if(!empty($data1))
        {
        $totdev =$data1->total_device;
       $freedev =$data1->free_devices;
     
      $data['total_device']=$totdev+$piece;
      $data['free_devices']=$freedev+$piece;


        $data2 =$this->Comman_model->UpdateRecord('user', $data, $where);

            $response['id']=$this->input->post('id');
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
  
public function cut_balance()
    {
       $this->default_file();
       $where['id']='1';
	   $userid=$this->input->get('userid');
       $piece=$this->input->get('piece');
	date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
$date=date('d-m-Y H:i:s');
       $data1 =$this->Comman_model->getData('user', $where);
        if(!empty($data1))
        {
			$id=$data1->id;
			$totdev =$data1->total_device;
			$remainbal=$data1->free_devices;
			
			$tatol=$data['total_device']=$totdev+$piece;
			$data2 =$this->Comman_model->UpdateRecord('user', $data, $where);
			$update=$this->db->query("UPDATE `user` SET `total_device`=`total_device`-'$piece' WHERE `id`='$userid'");
			
			
			$this->db->query("INSERT INTO `transactions`(`remainbal`, `remaintid`, `piece`, `type`, `typetid`, `uid`, `tid`, `datetime`) VALUES ('$tatol','','$piece','Reverse','Reverse','$id','$userid','$date')");
			$response['id']=$this->input->post('id');
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
 public function add_device()
    {
       $this->default_file();
      $where['shop_id']=$this->input->post('shop_id');
    
      $data12 =$this->Comman_model->getData('user', $where);
         $datalu=$data12->unblocked_devices;
     $dataf=$data12->free_devices;
      
if($dataf>=1){
            $data110['device_name']=$this->input->post('device_state');
        $data110['d_enrollment_time']=$this->input->post('d_enrollment_time');
        $data110['d_serial_no']=$this->input->post('d_serial_no');
        $data110['d_brand']=$this->input->post('d_brand');
        $data110['d_hardware']=$this->input->post('d_hardware');
        $data110['d_manufacture']=$this->input->post('d_manufacture');
        $data110['d_model']=$this->input->post('d_model');
        $data110['d_IMEI1']=$this->input->post('d_IMEI1');
        $data110['d_IMEI2']=$this->input->post('d_IMEI2');
        $data110['shop_id']=$this->input->post('shop_id');
        $data110['emi_amount']=$this->input->post('emi_amount');
        $data110['number_paid_emi']=$this->input->post('number_paid_emi');
        $data110['due_date']=$this->input->post('due_date');
        $data110['device']=$this->input->post('device');
        $data110['status']='1';
      $insert=$this->Comman_model->insertData('device',$data110);
      
  
     $data['unblocked_devices']=$datalu+1;
          $data['free_devices']=$datalu-1;

   $data2 =$this->Comman_model->UpdateRecord('user', $data, $where);

       $data1101['remaintid']= $dataf-1;
       $data1101['piece']='1' ;
       $data1101['tid']= $data12->id;
       $data1101['typetid']='debit';
       $data110['datetime']= date('Y-m-d H:i:s');

     $insert=$this->Comman_model->insertData('transactions',$data1101);

          if($insert)
                {
                   $response['id']="$insert";
                    $response['msg']="Sucsess";
                    $response['error']="200";
                    echo json_encode($response);
                }
                else
                {
                    $response['msg']="Internet Server Error";
                    $response['error']="400";
                    echo json_encode($response);
                } 
}else{
     $response['msg']="Balance Low";
                    $response['error']="400";
                    echo json_encode($response);
}
     
        
   }

    public function transaction_creditedss()
	{
		$this->default_file();
		$id=$this->input->get('id');
	    $firstdate=$this->input->get('firstdate');
		$seconddate=$this->input->get('seconddate');
		$data=$this->db->query("SELECT * FROM user WHERE id='$id'");
		$data1=$data->result_array();
		foreach($data1 as $row)
		{
			$type=$row['type']; 
		}
		if($firstdate!='' && $seconddate=='')
		{
			//echo "munna";
		if($type==1)
		{
			$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`uid`= `user`.`id` && `transactions`.`datetime` LIKE '%$firstdate%'  ORDER BY `id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
		}
		else
		{
			$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`uid`= `user`.`id` && `transactions`.`uid`='$id' && `transactions`.`datetime` LIKE '%$firstdate%' ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
		}
	}
		elseif($firstdate!='' && $seconddate!='')
		{
			//echo "rohit";
			if($type==1)
		{
			$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`uid`= `user`.`id` && `transactions`.`datetime`  BETWEEN LIKE '%$firstdate%' AND LIKE '%$seconddate%'  ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
		}
		else
		{
			$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`uid`= `user`.`id` && `transactions`.`uid`='$id' && `transactions`.`datetime` LIKE '%$firstdate%' ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
		}
  }
	else
	{
		$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`uid`= `user`.`id` && `transactions`.`uid`='$id' ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
	}

}
	
	public function transaction_credited()
	{
		$this->default_file();
		$id=$this->input->get('id');
	    $firstdate=$this->input->get('firstdate');
		$seconddate=$this->input->get('seconddate');
		$data=$this->db->query("SELECT * FROM user WHERE id='$id'");
		$data1=$data->result_array();
		foreach($data1 as $row)
		{
			$type=$row['type']; 
		}
		if($firstdate!='' && $seconddate=='')
		{
	
		if($type==1)
		{
			$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`uid`= `user`.`id` && `transactions`.`datetime` LIKE '%$firstdate%'  ORDER BY `id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
		}
		else
		{
			$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`uid`= `user`.`id` && `transactions`.`uid`='$id' && `transactions`.`datetime` LIKE '%$firstdate%' ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
		}
	}
		elseif($firstdate!='' && $seconddate!='')
		{
			
			if($type==1)
		{
			$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`uid`= `user`.`id`  && `transactions`.`datetime`  BETWEEN '".$firstdate."' AND '".$seconddate."'  ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
		}
		else
		{
			$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`uid`= `user`.`id` && `transactions`.`uid`='$id'  && `transactions`.`datetime`  BETWEEN '".$firstdate."' AND '".$seconddate."' ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
		}
  }
	else
	{
		$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`uid`= `user`.`id` && `transactions`.`uid`='$id' ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
	}

	}
    public function transaction_crediteda()
    {
                $this->default_file();

        $where['tid']=$this->input->get('id');
              $data1 =$this->Comman_model->get_trasaction( $where,'id');

        if($data1)
        {
            $response['data']=$data1;
            $response['msg']="Login Successfully";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Contect To Admin";
            $response['error']="400";
            echo json_encode($response);
        }
       
    }
    public function transaction_debited()
	{
	    
		$this->default_file();
		$id=$this->input->get('id');
	    $firstdate=$this->input->get('firstdate');
		$seconddate=$this->input->get('seconddate');
		$data=$this->db->query("SELECT * FROM user WHERE id='$id'");
		$data1=$data->result_array();
		foreach($data1 as $row)
		{
			$type=$row['type']; 
		}
		if($firstdate!='' && $seconddate=='')
		{
		//echo "munna";
		if($type==1)
		{
			$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`tid`= `user`.`id` && `transactions`.`datetime` LIKE '%$firstdate%'  ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
		}
		else
		{
			//echo "ggggggggg";
			
			$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`tid`= `user`.`id` && `transactions`.`uid`='$id' && `transactions`.`datetime` LIKE '%$firstdate%' ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
		}
	}
		elseif($firstdate!='' && $seconddate!='')
		{
		
			if($type==1)
		{
				
			$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`tid`= `user`.`id`  && `transactions`.`datetime`  BETWEEN '".$firstdate."' AND '".$seconddate."'  ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
		}
		else
		{
			
			$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`tid`= `user`.`id` && `transactions`.`uid`='$id' && `transactions`.`datetime`  BETWEEN '".$firstdate."' AND '".$seconddate."' ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
		}
  }
	else
	{
		$data2=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`tid`= `user`.`id` && `transactions`.`uid`='$id' ORDER BY `transactions`.`id` DESC");
			$data3=$data2->result_array();
			 if($data3)
			 {
				 $response['data']=$data3;
				 $response['msg']="success";
				 $response['error']="200";
				 echo json_encode($response);
			 }
			else
			{
				$response['msg']="Contect To Admin";
				$response['error']="400";
				echo json_encode($response);
			}
	}


		
	}
    public function transaction_debited1()
    {
                $this->default_file();

        $where['uid']=$this->input->get('id');

              $data1 =$this->Comman_model->get_trasaction('transactions', $where,'id');

        if($data1)
        {
            $response['data']=$data1;
            $response['msg']="Login Successfully";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Contect To Admin";
            $response['error']="400";
            echo json_encode($response);
        }
       
    }
    




 public function alluser()
    {
                $this->default_file();

        $where['status']='1';

              $data1 =$this->Comman_model->getAllData('user', $where,'id');

        if($data1)
        {
            $response['data']=$data1;
            $response['msg']="Login Successfully";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Contect To Admin";
            $response['error']="400";
            echo json_encode($response);
        }
       
    }
    

    public function alllockdevices()
    {
                $this->default_file();

        $where['shop_id']=$this->input->post('shop_id');
        $where['lock_unlock']='2';
              $data1 =$this->Comman_model->getAllData('ime', $where,'id');

        if($data1)
        {
            $response['data']=$data1;
            $response['msg']="Successfully";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Contect To Admin";
            $response['error']="400";
            echo json_encode($response);
        }
       
    }
      public function allunlockdevices()
    {
                $this->default_file();

        $where['shop_id']=$this->input->post('shop_id');
        $where['lock_unlock']='1';
              $data1 =$this->Comman_model->getAllData('ime', $where,'id');

        if($data1)
        {
            $response['data']=$data1;
            $response['msg']="Successfully";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Contect To Admin";
            $response['error']="400";
            echo json_encode($response);
        }
       
    }
    public function alldevice()
    {
                $this->default_file();

        $where['shop_id']=$this->input->post('shop_id');

              $data1 =$this->Comman_model->getAllData('device', $where,'id');

        if($data1)
        {
            $response['data']=$data1;
            $response['msg']="Login Successfully";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Contect To Admin";
            $response['error']="400";
            echo json_encode($response);
        }
       
    }
    
	 public function transfermatch()
    {
        $this->default_file();
         $data['status']='1';
        $data['mobile']=$red=$this->input->get('mobile');
		 $data['type']='1';
		 $data1 =$this->Comman_model->getData('user', $data);		 
		 if(empty($data1))
		 {

        $data1['mobile']=$red;
        $data2 =$this->Comman_model->getData('user', $data1);
        if($data2)
        {
            $response['data']=$data2;
            $response['msg']="User Found Succesfully";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Please Enter Registerd Phone Number";
            $response['error']="400";
            echo json_encode($response);
        }
		}
		 else
		 {
			 $response['msg']="You are Admin";
			 $response['error']="400";
			 echo json_encode($response);
		 }
       
    }
    
    
 public function matchphone()
    {
                $this->default_file();

        $data['status']='1';

        $data['mobile']=$this->input->get('mobile');
        
      $data1 =$this->Comman_model->getData('user', $data);
        if($data1)
        {
            $response['data']=$data1;
            $response['msg']="OTP send on your given Phone Number";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Please Enter Registerd Phone Number";
            $response['error']="400";
            echo json_encode($response);
        }
       
    }
    
    public function app_login()
    {
        $this->default_file();
		$phone=$this->input->post('mobile');
		if($phone)
		{
		$pin=$this->input->post('pin');
       $data=$this->Comman_model->loginuser($phone,$pin);
            if(!empty($data))
            {
                $response ['data'] =$data;
                $response['msg']="Login Successfully";
                $response['error']="200";
                echo json_encode($response);
            }
            else
            {
                $response['msg']="Please Enter correct Password";
                $response['error']="400";
                echo json_encode($response);
            }
		}
		else
		{
			    $response['msg']="Please Enter Mobile number";
                $response['error']="400";
                echo json_encode($response);
		}
            
       
        
    }
    
    
    public function update_password()
    {
        $this->default_file();
        $red['id']=$id=$this->input->get('userid');
        if(!empty($id))
        {
          $pin=$this->input->get('pin');  
         // $data1 =$this->Comman_model->UpdateRecord('user',$data,$red);
			$this->db->where('id',$id);
			$data=[
				'pin'=>$pin
				];
			$data1=$this->db->update('user',$data);
             if(!empty($data1))
            {
                $response['id']=$this->input->get('userid');
                $response['msg']="Pin Change Succesfully";
                $response['error']="200";
                echo json_encode($response);
            }
            else
            {
                $response['msg']="server Error";
                $response['error']="400";
                echo json_encode($response);
            }
        }
        else
        {
          $response['msg']="User id is required";
          $response['error']="400";
          echo json_encode($response);  
        }
        
    }
 public function update_access()
    {
       $this->default_file();
       date_default_timezone_set("Asia/Kolkata");
         $timer=date("Y-m-d h:i:sa");
        $where['id']='1';
        $data['updated_at']=$timer;

         if($this->input->post('access_token')!='')
         {
        $data['access_token']=$this->input->get('access_token');
         }
         if($this->input->get('code')!='')
         {
        $data['refresh_token']=$this->input->get('code');
         }
            $data1 =$this->Comman_model->UpdateRecord('token', $data, $where);
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
            $response['error']="400";
            echo json_encode($response);
        }
        
   }
   
    public function gettoken()
    {
        $this->default_file();
        $data['id']='1';
       
       $data1 =$this->Comman_model->getData('token', $data);
        if(!empty($data1))
        {
            $response['access']=$data1;
            $response['msg']="Successfully";
            $response['error']="200";
            echo json_encode($response);
        }
        else
        {
            $response['msg']="Someting Went Wrong";
            $response['error']="400";
            echo json_encode($response);
        }
       }
 
 
      
}