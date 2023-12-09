<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Authentication extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        // API key
     //  $apiKey = 'CODEX@123';

      // API auth credentials
     //$apiUser = "admin";
     //$apiPass = "1234";
        // Load the user model
        $this->load->model('user');
        $this->load->model('Comman_model');
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
    
       
    public function usernewlogin_post()
    {
        $this->default_file();
        
        $where['email']=$email=$this->input->post('email');
        
        $where['password']=$password=$this->input->post('password');
        
        $userData = array(
                    'email' => $email,
                    'password' => $password,
                    'status' => 1
                );
   
        if($email!='')
        {
            
            if($password!='')
            {
              
               $data1 =$this->Comman_model->getData('register', $userData,$where);
               if($data1)
               {
                    $response['id']=$data1;
                    $response['msg']="Sucsess";
                    $response['error']=200;
                    echo json_encode($response);
               }
               else
               {
                    $response['msg']="Email & password dont match";
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
            $response['msg']="Please Enter Email ID";
            $response['error']=400;
            echo json_encode($response);
        }
        
    }    
    
    
    // ///-----------------Login By Type (type 1 = Astrologer and type 2 = User)-----------------------///////
    public function userlogin_post() {
        // Get the post data
        $email = $this->post('email');
        $password = $this->post('password');
        
        // Validate the post data
        if(!empty($email) && !empty($password)){
            $where['status'] = '1';
            
            $userData = array(
                    
                    'email' => $email,
                    'password' => $password,
                    'status' => 1
               
                );
           
            
            if($this->post('type')==1) 
              {
                  $user = $this->Comman_model->getdata('register',$userData,  $where);
                  
                              if($user){
                            
                                $response['user_id']=$user->id;
                                $response['msg']="Login Sucsessful";
                                $response['error']=200;
                                echo json_encode($response);
                        }
                        
                        else{
                            // Set the response and exit
                            //BAD_REQUEST (400) being the HTTP response code
                            $this->response([
                                'status' => 400,
                                'message' => 'Wrong email or password. Or status not active',
                            ], REST_Controller::HTTP_BAD_REQUEST);
                        }
            
                } 
                
                if($this->post('type')==2) 
              {
                 $astro = $this->Comman_model->getdata('astro',$userData, $where);
                 
                              if($astro){

                                $response['astro_id']=$astro->id;
                                $response['msg']="Login Sucsessful";
                                $response['error']=200;
                                echo json_encode($response);
                        }
                        
                        else{
                            // Set the response and exit
                            //BAD_REQUEST (400) being the HTTP response code
                            $this->response([
                                'status' => 400,
                                'message' => 'Wrong email or password. Or status not active',
                            ], REST_Controller::HTTP_BAD_REQUEST);
                        }
                
              } 
        
            
        }else{
            // Set the response and exit
            $this->response([
                'status' => 400,
                'message' => 'Provide email and password.'
                
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
    // //////----------------End Login By type-----------------///
    // ///--------------Normal Login API Function-------------------------////
    public function login_post() {
        // Get the post data
        $email = $this->post('email');
        $password = $this->post('password');
        $users = $this->user->getdata('astro',$con);
        
        // Validate the post data
        if(!empty($email) && !empty($password)){
            
            
            $user = $this->user->getRows($con);
            
            if($this->post('type')==1) 
               {
                $con['message'] = $this->post('message');
                } 
                
                if($this->post('type')==2) 
               {
                 $userData['astro_msg'] = $this->post('message');
                } 
            
            // Check if any user exists with the given credentials
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'email' => $email,
                'password' => $password,
                'status' => 1
            );
            if($user){
                // Set the response and exit
                $this->response([
                    'status' => 200,
                    'message' => 'User login successful.',
                    'User ID' => $user
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
                $this->response([
                    'status' => 400,
                    'message' => 'Wrong email or password. Or status not active',
                    'User ID' => $user
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            // Set the response and exit
            $this->response([
                'status' => 400,
                'message' => 'Provide email and password.'
                
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
////////---------------- Registration API--------------------/////

function dateFormat($date, $format = 'd-M-Y'){
    return date($format, strtotime($date));
}

// $now = DateTime::createFromFormat('U.u', microtime(true));
// echo $now->format("m-d-Y H:i:s.u");

    public function registration_post() {
        // Get the post data
        $name = strip_tags($this->input->post('name')); 
        $email = strip_tags($this->input->post('email'));
        $password = $this->input->post('password');
        $dob = $this->input->post('dob');
        $phone = strip_tags($this->input->post('phone'));
        $gender = strip_tags($this->input->post('gender'));
        $dd=date("Y-m-d", strtotime($dob) );
        // $price = strip_tags($this->input->post('price'));
        // Validate the post data
        if(!empty($name) && !empty($phone) && !empty($email) && !empty($password)){
            // $dbo=date('Y-m-d', strtotime($date));
         
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
                    'dob' => $dd,
                    'status' => 1
                );

                //   for Image insert in database
                if(isset($_FILES) && !empty($_FILES) && $_FILES['image']['name'])
				 {    
				$file = $this->Comman_model->updateMedia('image','users');
				$userData['image'] = $file; 
				}
                
                // $insert = $this->user->insert($userData);
                $insert = $this->Comman_model->insertData('register',$userData, $where); 
                
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
    
    public function user_post($id = 0) {
        // Returns all the users data if the id not specified,
        // Otherwise, a single user will be returned.
        // $con = $id?array('id' => $id):'';
         $con = array('id' => $this->post('id'));
        // $users = $this->user->getRows($con);
         $users = $this->Comman_model->getdata('register', $con,'id');
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of User and The user has been added successfully.',
                'Users' => $users
            ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => ' No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    

    public function astroregistration_post() {
       
        $name = strip_tags($this->post('name'));
        $email = strip_tags($this->post('email'));
        $password = $this->post('password');
        $dob = strip_tags($this->post('dob'));
        $dd=date("Y-m-d", strtotime($dob) );
        $year = strip_tags($this->post('year'));
       // $language = strip_tags($this->post('language'));
        $mint_price = strip_tags($this->post('mint_price'));
       // $image = strip_tags($this->post('image'));
        $address = strip_tags($this->post('address'));
        $city = strip_tags($this->post('city'));
        $country = strip_tags($this->post('country'));
        $state = strip_tags($this->post('state'));
        $astroscience = strip_tags($this->post('astroscience'));
        $speciality = implode(",", $this->post('speciality'));
        $achievement = implode(",", $this->post('achievement'));
        $biography = strip_tags($this->post('biography'));
        $skill = implode(",", $this->post('skill'));
        //$bkimage = strip_tags($this->post('bkimage'));
        $lan=implode(",", $this->post('language'));
        
        // Validate the post data
        // if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)){
            if(!empty($name) && !empty($dob) && !empty($email) && !empty($password)){
            
            // Check if the given email already exists
            $con['returnType'] = 'count';
            $con['conditions'] = array(
                'email' => $email,
            );
            $userCount = $this->user->getRows2($con);
            
            if($userCount > 0){
                // Set the response and exit
                $this->response("The given email already exists.", REST_Controller::HTTP_BAD_REQUEST);
            }else{
                // Insert user data
                $userData = array(
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'dob' => $dd,
                    'year' => $year,
                    'language' => $lan,
                    'mint_price' => $mint_price,
                    'address' => $address,
                    'city' => $city,
                    'country' => $country,
                    'state' => $state,
                    'astroscience' => $astroscience,
                    'speciality' => $speciality,
                    'achievement' => $achievement,
                    'biography' => $biography,
                    'skill' => $skill
                );
                // for Image insert in database
                if(isset($_FILES) && !empty($_FILES) && $_FILES['image']['name'])
				 {    
				$file = $this->Comman_model->updateMedia('image','users');
				$userData['image'] = $file; 
				 }
                
                // For Background image insert in database
                 if(isset($_FILES) && !empty($_FILES) && $_FILES['bkimage']['name'])
				 {    
			    	$file = $this->Comman_model->updateMedia('bkimage','users');
			    	$userData['bkimage'] = $file; 
				 }
                 
                 if(!empty($_FILES['audio']['name'])){
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'mp3|wmv|mp4|AAC|FLAC|ALAC|WAV|AIFF|MPEG';
                    $config['max_size'] = '0';
                    $config['file_name'] = $this->input->post('audio');
        
                    //Load upload library and initialize configuration
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
        
    
                    $file = $this->Comman_model->updateMedia('audio','users');
                    $userData['audio'] = $file; 
    
                }
                 // Insert Query
                $insert = $this->user->insert_astro($userData);
                
                // Check if the user data is inserted
                if($insert){
                    // Set the response and exit
                    $this->response([
                        'status' => 200,
                        'message' => 'The Astrologer user has been added successfully.',
                        'data' => $insert
                    ], REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $this->response([
                        'status' => 400,
                        'message' => 'Some problems occurred, please try again.',
                        'data' => $insert
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }else{
            // Set the response and exit
            $this->response([
                'status' => 400,
                'message' => 'Provide complete Astrologer user info to add. Complete all field ',
                'data' => $insert
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function edit_profile_post() {
        $id = $this->post('id');
        
        // Get the post data
        $name = strip_tags($this->post('name'));
        $gender = strip_tags($this->post('gender'));
        $email = strip_tags($this->post('email'));
        $password = $this->post('password');
        $phone = strip_tags($this->post('phone'));
        $dob = strip_tags($this->post('dob'));
        // Validate the post data
        if(!empty($id) && (!empty($name) || !empty($email) || !empty($password) )){
            // Update user's account data
            $userData = array();
            if(!empty($name)){
                $userData['name'] = $name;
            }
            if(!empty($gender)){
                $userData['gender'] = $gender;
            }
            if(!empty($email)){
                $userData['email'] = $email;
            }
            if(!empty($password)){
                $userData['password'] = $password;
            }
            if(!empty($phone)){
                $userData['phone'] = $phone;
            }
            if(!empty($dob)){
                $userData['dob'] = $dob;
            }
            
             // for Image insert in database
            if(isset($_FILES) && !empty($_FILES) && $_FILES['image']['name'])
				 {    
			    	$file = $this->Comman_model->updateMedia('image','users');
			    	$userData['image'] = $file; 
				 }
				 
            $update = $this->user->update($userData, $id);
            
            // Check if the user data is updated
            if($update){
                // Set the response and exit
                $this->response([
                    'status' => 200,
                    'message' => 'The user info has been updated successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $this->response([
                    'status' => 400,
                    'message' => 'Some problems occurred, please try again.'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            // Set the response and exit
            $this->response([
                    'status' => 400,
                    'message' => 'Provide at least one user info to update.'
                ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function astrouser_post() {
        //$id = $this->put('id');
        $id = $this->post('id');
        $name = strip_tags($this->post('name'));
        $email = strip_tags($this->post('email'));
        $password = $this->post('password');
        $dob = strip_tags($this->post('dob'));
        $year = strip_tags($this->post('year'));
        $language = strip_tags($this->post('language'));
        $mint_price = strip_tags($this->post('mint_price'));
        $image = strip_tags($this->post('image'));
        $address = strip_tags($this->post('address'));
        $city = strip_tags($this->post('city'));
        $country = strip_tags($this->post('country'));
        $state = strip_tags($this->post('state'));
        $astroscience = strip_tags($this->post('astroscience'));
        $speciality = strip_tags($this->post('speciality'));
        $achievement = strip_tags($this->post('achievement'));
        $biography = strip_tags($this->post('biography'));
        $bkimage = strip_tags($this->post('bkimage'));
        
        // Validate the post data
            if(!empty($id) && (!empty($name) || !empty($email) || !empty($password))){
            // Update user's account data
            $userData = array();
           

           if(!empty($name)){
                $userData['name'] = $name;
            }
           
            if(!empty($email)){
                $userData['email'] = $email;
            }
           
            if(!empty($password)){
                $userData['password'] = $password;
            }
            if(!empty($dob)){
                $userData['dob'] = $dob;
            }

            if(!empty($year)){
                $userData['year'] = $year;
            }

            if(!empty($language)){
                $userData['language'] = $language;
            }
            if(!empty($price)){
                $userData['mint_price'] = $mint_price;
            }
           
            
            if(!empty($address)){
                $userData['address'] = $address;
            }

            if(!empty($city)){
                $userData['city'] = $city;
            }

            if(!empty($country)){
                $userData['country'] = $country;
            }
           
            if(!empty($state)){
                $userData['state'] = $state;
            }
            if(!empty($address)){
                $userData['address'] = $address;
            }

            if(!empty($astrosc)){
                $userData['astrosc'] = $astrosc;
            }
                if(!empty($speciality)){
                    $userData['speciality'] = $speciality;
                }
                if(!empty($achievement)){
                    $userData['achievement'] = $achievement;
                }
    
                if(!empty($biography)){
                    $userData['biography'] = $biography;
                }
    
               

            $update = $this->user->update_astro($userData, $id);

            // Check if the user data is updated
            if($update){
                // Set the response and exit
                $this->response([
                    'status' => 200,
                    'message' => 'The user info has been updated successfully.'
                ], REST_Controller::HTTP_OK);
            } else{
                // Set the response and exit
                $this->response([
                    'status' => 400,
                    'message' => 'Some problems occurred, please try again.'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else{
            // Set the response and exit
            $this->response([
                'status' => 400,
                'message' => 'Provide at least one user info to update.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


 public function astro_get()
    {
        
        $this->default_file();
        $users = $this->Comman_model->getAllData('astro', $where='','id');
        $lang1=array();
        foreach ($users as $key=> $value1) {
            
            // $value1->id;
            
             $value1->id;
            
            $w['id']=$value1->id;
            $uu=$this->Comman_model->getData('reviews', $w);
            if(!empty($uu))
            {
                $users[$key]->review=$uu->message;

            }
            // $w['astrologer_id']=$value1->id;
            // //  $where['status']='1';
            // //   $id=$e->status;
              
            // if(!empty($w))
            //      {
            //     $w['astrologer_id']=$id;
            //     $d =$this->Comman_model->getData('reviews', $w);
                
            //     } 
                
            $value1->id;
            
            $w['id']=$value1->id;
            
             $lang=$value1->language;
             $skill=$value1->skill;
             $speciality=$value1->speciality;
             $achievement=$value1->achievement;
           
            $lang1=array();
            $lan=explode(",",$lang);
            foreach($lan as $k =>$val)
            {
               $w['id']=$val;
               $uu=$this->Comman_model->getData('language', $w);
               @$la= $uu->language_name;
               array_push($lang1,$la);
            }
          
            $langaa= implode(",",$lang1);
       
           $users[$key]->languagename=$langaa;
           
           //--------------------------------------//
           
            $skills=array();
            $ski=explode(",",$skill);
            foreach($ski  as $k1 =>$v1)
            {
                $w['id']=$v1;
                $uu=$this->Comman_model->getData('skilld', $w);
               @$sa= $uu->name;
               array_push($skills,$sa);
            }
            
            $sik= implode(",",$skills);
       
            $users[$key]->skillesname=$sik;
            
            // --------------------------------------------------//
            
            $specis= array();
            $spec = explode(",",$speciality);
            foreach($spec as $s =>$s1)
            {
              $w['id']=$s1;
              $uu=$this->Comman_model->getData('specialityd', $w);
              @$sp= $uu->specialist_name;
               array_push($specis,$sp);  
            }
            
             $spk= implode(",",$specis);
       
            $users[$key]->Specialitysname=$spk;
            
            
            
            //---------------------------------------------------//
            
            $achiev= array();
            $ach = explode(",",$achievement);
            foreach($ach as $a =>$a1)
            {
              $w['id']=$a1;
              $uu=$this->Comman_model->getData('achievments', $w);
              @$ep= $uu->achiev_name;
               array_push($achiev,$ep);  
            }
            
             $ek= implode(",",$achiev);
       
            $users[$key]->Achievementsname=$ek;
            
            // ----------------------------------------------//
             
        //     foreach($users as $key =>$e)
        //     {
               
              
        //     }
        // }
            
           
           
                $users[$key]->username=$value1->name;
                $users[$key]->image = base_url().'uploads/users/'.$value1->image;
                $users[$key]->bkimage = base_url().'uploads/users/'.$value1->bkimage;
                $users[$key]->audio = base_url().'uploads/users/'.$value1->audio;
                $datetime1 = new DateTime();
                $datetime2 = new DateTime($value1->created);
                $interval = $datetime1->diff($datetime2);
                $elapsed = $interval->format('%d day - %h:%i: %s seconds Ago');
                $users[$key]->datetime= $elapsed;
        }

        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of Astrologer User successfully.',
                'Users' => $users
            ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No Astrologer user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function astrouserlist_post($id = 0) {
        // Returns all the users data if the id not specified,
        // Otherwise, a single user will be returned.
        $this->default_file();
        //$con = $id?array('id' => $id):'';
        $con = array('id' => $this->post('id'));
        // $users = $this->user->getdata('astro',$con);
        
        //  $con = $id?array('id' => $id):'';
        // $users = $this->Comman_model->getAllData('astro', $id,'id');
        //  $con = $id?array('id' => $id):'';
        $users = $this->Comman_model->getdata('astro', $con,'id');
        //$users = $this->user->getRows2($con);
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of Astrologer User and The user has been added successfully.',
                'AstrologerUsers' => $users
        
        ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No Astrologer user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function catagory_get($id = 0)
    {
        $this->default_file();
        $con = $id?array('id' => $id):'';
        $users = $this->Comman_model->getAllData('task', $id,'id');
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of User (Catagory field) and The user has been added successfully.',
                'Users' => $users
            ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
   public function addcatagory_post(){
       
        
   $name = $this->post('name');
  // $image = $this->post('image');
   
   
           // Insert user data
           $userData = array(
               'name' => $name,
           );

           // for Image insert in database
                if(isset($_FILES) && !empty($_FILES) && $_FILES['image']['name'])
				 {    
				$file = $this->Comman_model->updateMedia('image','users');
				$userData['image'] = $file; 
				 }
                
           $insert = $this->user->insert_catagory($userData);
           
           // Check if the user data is inserted
           if($insert){
               // Set the response and exit
               $this->response([
                   'status' => 200,
                   'message' => 'The Catagory has been added successfully.',
                   'data' => $insert
               ], REST_Controller::HTTP_OK);
           }else{
               // Set the response and exit
               $this->response([
                'status' => 400,
                'message' => 'Provide complete info to add. Some problems occurred, please try again.'     
            ], REST_Controller::HTTP_BAD_REQUEST);
           }
      
 }
 
 
  public function catagoryuser_post() {
    // Returns all the users data if the id not specified,
    // Otherwise, a single user will be returned.
   // $con = $id?array('id' => $id):'';
   // $users = $this->user->getRows_transaction($con);
    
    $con = array('id' => $this->input->post('id'));
    $users = $this->user->getAllData('task',$con,'id');
    
    // Check if the user data exists
    if(!empty($users)){
        // Set the response and exit
        //OK (200) being the HTTP response code
        $this->response([
            'status' => 200,
            'message' => 'Please check All Details of Catagory successfully by id.',
            'Users' => $users
        ], REST_Controller::HTTP_OK);
    }else{
        // Set the response and exit
        //NOT_FOUND (404) being the HTTP response code
        $this->response([
            'status' => 400,
            'message' => 'No Catagory User was found by this ID.'
        ], REST_Controller::HTTP_NOT_FOUND);
    }
}

    public function language_get($id = 0)
    {
       
        $this->default_file();
        $where['status']='1';
        $con = $id?array('id' => $id):'';
        $users = $this->Comman_model->getAllData('language', $where,'id');
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of User Language Successfully.',
                'Users' => $users
            ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        
    }

    public function astrology_get($id = 0)
    {
        
        $this->default_file();
        $where['status']='1';
        $con = $id?array('id' => $id):'';
        $users = $this->Comman_model->getAllData('astro', $where,'id');
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of User astrologer successfully.',
                'Users' => $users
            ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        
    }

    public function consulting_get($id = 0)
    {
       
        $this->default_file();

        $con = $id?array('id' => $id):'';
        $users = $this->Comman_model->getAllData('consultingd', $where,'id');
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of User consulting successfully.',
                'Users' => $users
            ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function guidance_post() {
        // Get the post data
        
        $text = $this->post('text');
        $user_id = $this->post('user_id');
        
        
        // Validate the post data
        if(!empty($text)){
            
            // Check if the given email already exists
            $con['returnType'] = 'count';
            $con['conditions'] = array(
                'text' => $text,
               
            );
            
            $userCount = $this->user->getRows_guidance($con);
           
                // Insert user data
                $userData = array(
                    'text' => $text,
                    'datetime' => date('Y-m-d H:i:s'),
                    'user_id' => $user_id
                );

                 // for Image insert in database
                 if(isset($_FILES) && !empty($_FILES) && $_FILES['image']['name'])
				 {    
				$file = $this->Comman_model->updateMedia('image','users');
				$userData['image'] = $file; 
				 }
           
                $insert = $this->user->insert_guidance($userData);
                
                // Check if the user data is inserted
                if($insert){
                    // Set the response and exit
                    $this->response([
                        'status' => 200,
                        'message' => 'The Guidance user has been added successfully.',
                        'data' => $insert
                    ], REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $this->response([
                        'status' => 400,
                        'message' => 'Some problems occurred, please try again.',
                        'data' => $insert
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        
    }

    public function guidance_get()
    {
        
        $this->default_file();
        $users = $this->Comman_model->getAllData('guid', $where='','id');
     
        foreach ($users as $key=> $value1) {
             $value1->user_id;
            
            $w['id']=$value1->user_id;
            $uu=$this->Comman_model->getData('user', $w);
            if(!empty($uu))
            {
                $users[$key]->username=$uu->name;
                $users[$key]->photo=base_url().'uploads/users/'.$uu->photo;
                
                $datetime1 = new DateTime();
                $datetime2 = new DateTime($value1->datetime);
                $interval = $datetime1->diff($datetime2);
                $elapsed = $interval->format('%d day - %h:%i: %s seconds Ago');
                 $users[$key]->datetime= $elapsed;
                
            }
            
        }

        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of User Guidance successfully.',
                'Users' => $users
            ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function skill_get($id = 0)
    {
      
        $this->default_file();
        $con = $id?array('id' => $id):'';
        $users = $this->Comman_model->getAllData('skilld', $id,'id');
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of User skill successfully.',
                'Users' => $users
            ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function speciality_get($id = 0)
    {
        $this->default_file();
        
        // Returns all the users data if the id not specified,
        // Otherwise, a single user will be returned.
        $con = $id?array('id' => $id):'';
        $users = $this->Comman_model->getAllData('specialityd', $where,'id');
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of User speciality successfully.',
                'Users' => $users
            ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

public function speciality_post()
    {
        $this->default_file();
        
        
    $con = array('astro_id' => $this->input->post('astro_id'));
    $users = $this->user->getAllData('specialityd',$con,'astro_id');
    // echo $this->db->last_query();
    // die;
    // Check if the user data exists
    if(!empty($users)){
       
        $this->response([
            'status' => 200,
            'message' => 'Please check All Details of User Chat successfully.',
            'Users' => $users
        ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        
    }

   public function chat_post(){
       
   // Get the post data
        
   $message = $this->post('message');
   $astromessage = $this->post('astro_msg');
   //   $date = $this->post('date');
  //  $time = $this->post('time');
   $astrologer_id = $this->post('astrologer_id');
   $user_id = $this->post('user_id');
   
               if($this->post('type')==1) 
               {
                $userData['message'] = $this->post('message');
                } 
                
                if($this->post('type')==2) 
               {
                 $userData['astro_msg'] = $this->post('message');
                } 
       
       $userData['date']=date('Y-m-d');
       $userData['time']=date('H:i:s');
       $userData['astrologer_id']=$astrologer_id;
       $userData['user_id']=$user_id;
     

           $insert = $this->user->insert_chat($userData);
           
           // Check if the user data is inserted
           if($insert){
               // Set the response and exit
               $this->response([
                   'status' => 200,
                   'message' => 'The chat data has been added successfully.',
                   'data' => $insert
               ], REST_Controller::HTTP_OK);
           }else{
               // Set the response and exit
               $this->response([
                'status' => 400,
                'message' => 'Provide complete info to add. complete all field which want for chat.Some problems occurred, please try again.'     
            ], REST_Controller::HTTP_BAD_REQUEST);
           }

         
 }

 public function chatuser_post() {
    // Returns all the users data if the id not specified,
    // Otherwise, a single user will be returned.
    $con = array('user_id' => $this->input->post('user_id'),'astrologer_id'=>$this->input->post('astro_id')); 
    
    $users = $this->Comman_model->getAllData('chat',$con,'id');
         if(!empty($users))
        {
             $response['chat']=$users;
            foreach($users as $key =>$e)
            {
                $id=$e->user_id;
               if($this->input->post('type')=='1') 
               {
                if($id!='')
                 {
                 $w['id']=$id;
                $d =$this->Comman_model->getData('register', $w);
                 $response['chat'][$key]->name=$d->name;
                } 
                else{
                    $response['chat'][$key]->name="";
                }
               }
                if($this->input->post('type')=='2') 
               {
                if($id!='')
                 {
                 $w['id']=$id;
                $d =$this->Comman_model->getData('astro', $w);
                 $response['chat'][$key]->name=$d->name;
                } 
                else{
                    $response['chat'][$key]->name="";
                }
               }
            }
        }
          
          
    // Check if the user data exists
    if(!empty($users)){
       
           $response['chat']=$users;
            $response['msg']="Sucsess";
            $response['error']=200;
            echo json_encode($response);
        // $this->response([
        //     'status' => 200,
        //     'message' => 'Please check All Details of User Chat successfully.',
        //     'Users' => $users
        // ], REST_Controller::HTTP_OK);
    }else{
        // Set the response and exit
        //NOT_FOUND (404) being the HTTP response code
        // $this->response([
        //     'status' => 400,
        //     'message' => 'No chat or user was found.'
        // ], REST_Controller::HTTP_NOT_FOUND);
        
            $response['msg']="No record found and No chat or user was found.";
            $response['error']=400;
            echo json_encode($response);
    }
}
   
public function walletadd_post(){
         
   $user_id = $this->post('user_id');
   $amount = $this->post('amount');
   $balance_type = '+';
   $type = $this->post('type');
   $remark = 'Add Amount in Wallet ';
   
           // Insert user data
           $userData = array(
               'remark' => $remark,
               'balance_type' => $balance_type,
               'credit' => $amount,
               'datetime' => date('Y-m-d H:i:s'),
               'type' => $type,
               'status'  => 1,
               'user_id' => $user_id
           );
           // type - 1 for User and type - 2 for  Astrologer
          if($this->post('type')==1) 
              {
                  $user = $this->Comman_model->insertData('transaction',$userData,  $where);
                } 
                
                if($this->post('type')==2) 
              {
                 $user = $this->Comman_model->insertData('transaction',$userData, $where);
              } 

           
        //   $insert = $this->user->insert_wallet($userData);
           
           // Check if the user data is inserted
           if($user){
               // Set the response and exit
               $this->response([
                   'status' => 200,
                   'message' => 'The credit Amount has been added successfully.',
                   'data' =>$user
               ], REST_Controller::HTTP_OK);
           }else{
               // Set the response and exit
               $this->response([
                'status' => 400,
                'message' => 'Provide complete info to add. Some problems occurred, please try again.'     
            ], REST_Controller::HTTP_BAD_REQUEST);
           }
      
 }
 
 public function withdrawal_post()
 {
       
   $user_id = $this->post('user_id');
   $amount = $this->post('amount');
    $type = $this->post('type');
   $balance_type = '-';
   $remark = 'Withdrawal Amount From Wallet ';
   $bank_id = $this->post('bank_id');
   
           // Insert user data
           $userData = array(
               'remark' => $remark,
               'balance_type' => $balance_type,
               'debit' => $amount,
               'datetime' => date('Y-m-d H:i:s'),
               'type' => $type,
               'user_id' => $user_id,
               'status' => 1
               //'bank_id' => $bank_id
           );

       // type - 1 for User and type - 2 for  Astrologer
          if($this->post('type')==1) 
              {
                  $user = $this->Comman_model->insertData('transaction',$userData,  $where);
                } 
                
                if($this->post('type')==2) 
              {
                 $user = $this->Comman_model->insertData('transaction',$userData, $where);
              } 
           
        //   $insert = $this->user->insert_wallet($userData);
           
           // Check if the user data is inserted
           if($user){
               // Set the response and exit
               $this->response([
                   'status' => 200,
                   'message' => 'The Debit Amount has been withdrawal successfully.',
                   'data' => $user
               ], REST_Controller::HTTP_OK);
           }else{
               // Set the response and exit
               $this->response([
                'status' => 400,
                'message' => 'Provide complete info to add. Some problems occurred, please try again.'     
            ], REST_Controller::HTTP_BAD_REQUEST);
           }
 }
 
  public function transaction_post() {
    // Returns all the users data if the id not specified,
   // Otherwise, a single user will be returned.
  
    $user_id = $this->post('user_id');
    $type = $this->post('type');
   
           // Insert user data
           $userData = array(
               'type' => $type,
               'user_id' => $user_id,
               'status' => 1
           );

       // type - 1 for User and type - 2 for  Astrologer
          if($this->post('type')==1) 
              {
                  $user = $this->Comman_model->getAllData('transaction',$userData);
                   if(!empty($user)){
                         $bla=$this->db->query("SELECT SUM(`credit`-`debit`) as blance FROM `transaction` WHERE `user_id`='$user_id' and `type`='$type'");
                         $b1= $bla->row();
                         $blance=$b1->blance;
                        // $blance=$b1; // We can also define this kind of avalaible balance 
                       
                        $this->response([
                            'status' => 200,
                            'message' => 'Please check All Details of Transaction History successfully.',
                            'avalableblance'=>$blance,
                            'Users' => $user 
                            
                        ], REST_Controller::HTTP_OK);
                    }else{
                        // Set the response and exit
                        //NOT_FOUND (404) being the HTTP response code
                        $this->response([
                            'status' => 400,
                            'message' => 'No User No transaction was found by this user_id.'
                        ], REST_Controller::HTTP_NOT_FOUND);
                    }
                } 
                
                if($this->post('type')==2) 
              {
                 $user = $this->Comman_model->getAllData('transaction',$userData);
                 
                  if(!empty($user)){
                         $bla=$this->db->query("SELECT SUM(`credit`-`debit`) as blance FROM `transaction` WHERE `user_id`='$user_id' and `type`='$type'");
                         $b1= $bla->row();
                         $blance=$b1->blance;
                        // $blance=$b1; // We can also define this kind of avalaible balance 
                       
                        $this->response([
                            'status' => 200,
                            'message' => 'Please check All Details of Transaction History successfully.',
                            'avalableblance'=>$blance,
                            'astrologer' => $user 
                            
                        ], REST_Controller::HTTP_OK);
                    }else{
                        // Set the response and exit
                        //NOT_FOUND (404) being the HTTP response code
                        $this->response([
                            'status' => 400,
                            'message' => 'No Astrologer No transaction was found by this astrouser_id.'
                        ], REST_Controller::HTTP_NOT_FOUND);
                    }
              }
}

 public function addfavrate_post()
 {
       
   $user_id = $this->post('user_id');
   $astrologer_id = $this->post('astrologer_id');
   $users = $this->user->getData('favourite','user_id', 'astrologer_id');


 // Check if the given email already exists
            $con['returnType'] = 'count';
            $con['conditions'] = array(
                'user_id' => $user_id,
                'astrologer_id'=> $astrologer_id
            );
            $userCount = $this->user->getRows_fav($con);
            
            if($userCount > 0){
                // Set the response and exit
                $this->response([
                   'status' => 400,
                   'message' => 'The given User_id and astrologer_id already exists.'
               ], REST_Controller::HTTP_BAD_REQUEST);
            }
   
     else{
           // Insert user data
           $userData = array(
              'datetime' => date('Y-m-d H:i:s'),
               'user_id' => $user_id,
               'astrologer_id' => $astrologer_id
           );

     }  
           $insert = $this->user->insert_fav($userData);
           
           // Check if the user data is inserted
           if($insert){
               // Set the response and exit
               $this->response([
                   'status' => 200,
                   'message' => 'The Inserted details successfully.',
                   'data' => $insert
               ], REST_Controller::HTTP_OK);
           }else{
               // Set the response and exit
               $this->response([
                'status' => 400,
                'message' => 'Provide complete info to add. Some problems occurred, please try again.'     
            ], REST_Controller::HTTP_BAD_REQUEST);
           }
 }
 
 
 public function favouritedelete_post()
    {
       $this->default_file();
        if($this->post('id')!='')
        {
           
                $where['id']=$this->post('id');
                $insert=$this->user->Deletedata('favourite', $where);
        	    if($insert)
                {
                   
                       $response['msg']="Internet Server Error";
                    $response['error']=400;
                    echo json_encode($response);
                }
                else
                {
                
                    $response['msg']="Sucsessfully deleted";
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
    
    public function myfavrate_astrologer_post() {
    // Returns all the users data if the id not specified,
    // Otherwise, a single user will be returned.
   // $con = $id?array('id' => $id):'';
   // $users = $this->user->getRows_transaction($con);
    
    $con = array('user_id' => $this->input->post('user_id'));
    $users = $this->user->getAllData('favourite',$con,'id');
    
    // Check if the user data exists
    if(!empty($users)){
        // Set the response and exit
        //OK (200) being the HTTP response code
        $this->response([
            'status' => 200,
            'message' => 'Please check All Details of Favourite Astrologer list successfully.',
            'Users' => $users
        ], REST_Controller::HTTP_OK);
    }else{
        // Set the response and exit
        //NOT_FOUND (404) being the HTTP response code
        $this->response([
            'status' => 400,
            'message' => 'Give User_id No Favourite Astrologer was found by this user_id.'
        ], REST_Controller::HTTP_NOT_FOUND);
    }
}


 public function verifycode() {
    // Returns all the users data if the id not specified,
    $this->default_file();
    $where['status']='1';
    $con = array('user_id' => $this->input->post('user_id'));
    $users = $this->user->getAllData('users',$where,$con,'id');
    
    
    // VALIDATE:
    // if(isset($status)){

    //     if ($status != 'publish' && $status != 'future' && $status != 'draft' && $status != 'pending' && $status != 'private' && $status != 'trash') {

    //         $this->response(array(
    //             'status'  => FALSE,
    //             'message' => '(status) must be one of the following (publish|future|draft|pending|private|trash)'
    //         ), REST_Controller::HTTP_OK);

    //     }

    //     // ADD TO QUERY:
    //     $where['status'] = $status;

    // }
    // Check if the user data exists
    if(!empty($users)){
        // Set the response and exit
        //OK (200) being the HTTP response code
        $this->response([
            
            'status' => 200,
            'message' => 'Please check All Details successfully.',
            'Users' => $users
        ], REST_Controller::HTTP_OK);
    }else{
        // Set the response and exit
        //NOT_FOUND (404) being the HTTP response code
        $this->response([
            'status' => 400,
            'message' => 'Give User_id was found by this user_id.'
        ], REST_Controller::HTTP_NOT_FOUND);
    }
}


 public function verifyApi(Request $request)
    { 
        if( ! $request->code || ! $request->email)
        {
            return response()->json('email and code required', 449);
        }

        $user = User::whereEmail($request->email)->whereCode($request->code)->first();

        if( ! $user)
        {            
            return response()->json('not found', 401);
        }
        else{
            $user->code = null;
            $user->save();
            return response()->json('ok', 200);
        }
    }


public function contactus_post()
 {
       
   $user_id = $this->post('user_id');
   $message = $this->post('message');
   
           // Insert user data
           $userData = array(
               
               'user_id' => $user_id,
               'message' => $message
           );

           
           $insert = $this->user->insert_contactus($userData);
           
           // Check if the user data is inserted
           if($insert){
               // Set the response and exit
               $this->response([
                   'status' => 200,
                   'message' => 'Inserted Message in contact us details successfully.',
                   'data' => $insert
               ], REST_Controller::HTTP_OK);
           }else{
               // Set the response and exit
               $this->response([
                'status' => 400,
                'message' => 'Provide complete info to add. Some problems occurred, please try again.'     
            ], REST_Controller::HTTP_BAD_REQUEST);
           }
 }
 
 public function birth_chart_post()
 {
       
   $user_id = $this->post('user_id');
   $name = $this->post('name');
   $gender = $this->post('gender');
   $birthdate = $this->post('birthdate');
   $birthtime = $this->post('birthtime');
   $born_location = $this->post('born_location');
   
   
           // Insert user data
           $userData = array(
               
               'user_id' => $user_id,
               'name' => $name,
               'gender' => $gender,
               'birthdate' => $birthdate,
               'birthtime' => $birthtime,
               'born_location' => $born_location
               
           );
           
           $insert = $this->user->insert_birthchart($userData);
           
           // Check if the user data is inserted
           if($insert){
               // Set the response and exit
               $this->response([
                   'status' => 200,
                   'message' => 'Inserted data for birth chart details successfully.',
                   'data' => $insert
               ], REST_Controller::HTTP_OK);
           }else{
               // Set the response and exit
               $this->response([
                'status' => 400,
                'message' => 'Provide complete info to add. Some problems occurred, please try again.'     
            ], REST_Controller::HTTP_BAD_REQUEST);
           }
 }
 
  ////-------------Simple GET Method Of Comman model without using Array --------///
    public function privacy_get()
    {
        $this->default_file();
        $where['status']='1';
        $where['id']='1';
        $data1 =$this->Comman_model->getData('privacy', $where);
        if(!empty($data1))
        {
            $response['privacy']=$data1;
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
    
    
     public function about_get()
    {
        $this->default_file();
        $where['status']='1';
        $where['id']='1';
        $data1 =$this->Comman_model->getData('aboutus', $where);
        if(!empty($data1))
        {
            $response['aboutus']=$data1;
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
    
    
    public function terms_get()
    {
        $this->default_file();
        $where['status']='1';
        $where['id']='1';
        $data1 =$this->Comman_model->getData('term', $where);
        if(!empty($data1))
        {
            $response['term']=$data1;
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
    
    
    
    
    // //// ---------------End of Get Method-----------///
    
    
//  //////-------------GET Method with Array and Rest controller--------------------///////
    public function privacypolicy_get($id = 0)
    {
        $this->default_file();
        $con = $id?array('id' => $id):'';
        $users = $this->Comman_model->getAllData('privacy', $id,'id');
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of User (Privacy Policy field) and The user has been added successfully.',
                'privacypolicy' => $users
            ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No data was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    
     public function termandcondition_get($id = 0)
    {
        $this->default_file();
        $con = $id?array('id' => $id):'';
        $users = $this->Comman_model->getAllData('term', $id,'id');
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of User (Term and Conditions field) and The user has been added successfully.',
                'terms' => $users
            ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No data was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    
    public function aboutus_get($id = 0)
    {
        $this->default_file();
        $con = $id?array('id' => $id):'';
        $users = $this->Comman_model->getAllData('aboutus', $id,'id');
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response([
                'status' => 200,
                'message' => 'Please check All Details of User (About us field) and The user has been added successfully.',
                'aboutus' => $users
            ], REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => 400,
                'message' => 'No data was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
/////////////--------------END of GET Method----------------------------////////////

///////------Start of Reviews and Rating API----------------//////////

 public function reviews_post(){
     
    $this->default_file();
    // $where['status']='1';
    // $users = $this->user->getAllData('chat',$where,$con,'id');
    
    // $con = array('user_id' => $this->input->post('user_id'),'astrologer_id'=>$this->input->post('astro_id')); 
    
  
   $user_id = $this->post('user_id');
   $message = $this->post('message');
   $astrologer_id = $this->post('astrologer_id');
    $rating = $this->post('rating');
           // Insert user data
           $userData = array(
               'astrologer_id'=> $astrologer_id,
               'user_id' => $user_id,
               'datetime' => date('Y-m-d H:i:s'),
               'message' => $message,
               'rating' => $rating
           );

           
        //   $insert = $this->user->insert_contactus($userData);
            $insert = $this->Comman_model->insertData('reviews',$userData);
           
           // Check if the user data is inserted
           if($insert){
               // Set the response and exit
               $this->response([
                   'status' => 200,
                   'message' => 'Inserted Message in contact us details successfully.',
                   'data' => $insert
               ], REST_Controller::HTTP_OK);
           }else{
               // Set the response and exit
               $this->response([
                'status' => 400,
                'message' => 'Provide complete info to add. Some problems occurred, please try again.'     
            ], REST_Controller::HTTP_BAD_REQUEST);
           }
    
 }
 
 public function birthuserfind_post(){
     
    $con = array('user_id' => $this->input->post('user_id'));
    $users = $this->user->getAllData('birth_cha',$con,'id');
    
    // Check if the user data exists
    if(!empty($users)){
        // Set the response and exit
        //OK (200) being the HTTP response code
        $this->response([
            'status' => 200,
            'message' => 'Please check All Details of Birth Chart successfully.',
            'Users' => $users
        ], REST_Controller::HTTP_OK);
    }else{
        // Set the response and exit
        //NOT_FOUND (404) being the HTTP response code
        $this->response([
            'status' => 400,
            'message' => 'No User was found by this user_id.'
        ], REST_Controller::HTTP_NOT_FOUND);
    }
 }
 
 //////----------  FORGOT PASSWORD using Mobile OTP Verification and Change Password(Reset)--------------------////////////
 
    public function forget_password_post(){
         $this->default_file();
          // Get the post data
        $phone = $this->post('phone');
        
        // Validate the post data
        if(!empty($phone)){
            
            $where['status'] = '1';
            
            $userData = array(
                    
                    'phone' => $phone,
                    'status' => 1
               
                ); 
         
         $user = $this->Comman_model->getdata('register',$userData,  $where);
        //  $otp = rand(0000, 9999);
        
        
            
        //   $data['phone']= $this->input->post('phone');
		  //  $data1=$this->Comman_model->getdata('register',$data);
		    
    		    if(!empty($user))
    		    {
    		      $id=$user->id;
        		  //$this->load->library('phone');
        		  $otp = mt_rand(1111,9999) ;
                  $aa=$this->Comman_model->updateRecord('register',array('otp'=>$otp),array('id'=>$id));
                    if($user)
                    {
                            $response['id']=$id;
                            $response['msg']="successfully Genrate OTP";
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
    
    }
    
     public function verify_otp_post()
    {
      $this->default_file();
      $id = $this->input->post('id') ;
      $otp = $this->input->POST('otp') ;
    
          $data=$this->Comman_model->getdata('register',array('id'=>$id));
          if($data->otp == $otp)
          {
                $response['msg']="successfully Matched OTP";
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
    
    public function changepassworduser_post()
    {
      $this->default_file();
      
      $id = $this->post('id');
      $newpassword = $this->post('newpassword');
      $cpassword = $this->post('cnewpassword');
      if(!empty($id)){
     
      if($newpassword == $cpassword)
      {
                
          // Update user's account data
            $userData = array();
            if(!empty($newpassword)==!empty($cpassword)){
                $userData['password'] = $newpassword;
           
            
            $update = $this->user->updatepassword($userData, $id);
            
            // Check if the user data is updated
            if($update){
                // Set the response and exit
                $this->response([
                    'status' => 200,
                    'message' => 'The User Password info has been updated successfully.'
                ], REST_Controller::HTTP_OK);
              }
            
             }
             else{
                // Set the response and exit
                $this->response([
                    'status' => 400,
                    'message' => 'Password not match Some problems occurred, please try again.'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
      }
    
      else{
           $response['msg']='Password not matched';
                $response['error']=400;
                echo json_encode($response);
         }
    
       }
    }  

  
    public function examplechangepassworduser_post()
    {
        try{   
            $id = $this->input->post('id');
            if ($id != '')
            {
                $this->load->library('form_validation');

                $this->form_validation->set_rules('oldPassword','Old Password','required|max_length[20]');
                $this->form_validation->set_rules('newPassword','New Password','required|max_length[20]');
                $this->form_validation->set_rules('cNewPassword','Confirm new Password','required|matches[newPassword]|max_length[20]');

                if($this->form_validation->run() == false)
                {
                    echo validation_errors();
                }
                else
                {
                    $oldPassword = $this->input->post('oldPassword');
                    $newPassword = $this->input->post('newPassword');

                    $resultPas = $this->user_model->matchOldPassword($id, $oldPassword);

                    if($resultPas)
                    {

                        $this->set_response("password no match.", REST_Controller::HTTP_BAD_REQUEST);
                    }
                    else
                    {
                        $changeData = array('password'=>$newPassword);

                        $result = $this->user_model->changePassword($id, $changeData);

                        if($result > 0) { $this->set_response([
                                            'message' => 'password changed successful.',
                                            'data' => $changeData
                                            ], REST_Controller::HTTP_OK); }
                        else { $this->set_response("enter password first.", REST_Controller::HTTP_BAD_REQUEST); }

                    }
                }
            }
            else
            {
                throw new Exception("The Data Already Register or The Data is Empty");
            }             
        }
        catch (Exception $e)
        {
           $error = array($e->getmessage());
           $errormsg = json_encode($error);
           echo $errormsg;
        }
    }

//////---- End USER Forget password and Reset API------------//////

////////------- Start of Astrologer Forget Password and Reset API--------------///////

    public function forget_astropassword_post(){
         $this->default_file();
          // Get the post data
        $phone = $this->post('phone');
        
        // Validate the post data
        if(!empty($phone)){
            
            $where['status'] = '1';
            
            $userData = array(
                    
                    'phone' => $phone,
                    'status' => 1
               
                ); 
         
         $user = $this->Comman_model->getdata('astro',$userData,  $where);
        //  $otp = rand(0000, 9999);
        
        
            
        //   $data['phone']= $this->input->post('phone');
		  //  $data1=$this->Comman_model->getdata('register',$data);
		    
    		    if(!empty($user))
    		    {
    		      $id=$user->id;
        		  //$this->load->library('phone');
        		  $otp = mt_rand(1111,9999) ;
                  $aa=$this->Comman_model->updateRecord('astro',array('otp'=>$otp),array('id'=>$id));
                    if($user)
                    {
                            $response['id']=$id;
                            $response['msg']="successfully Genrate OTP";
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
    
    }
    
    public function verifyotp_astro_post()
    {
      $this->default_file();
      $id = $this->input->post('id') ;
      $otp = $this->input->POST('otp') ;
     if(!empty($id) && !empty($otp)){
        // $userData = array();
    
        //   if(!empty($id)){
        //         $userData['id'] = $id;
        //     }
           
        //     if(!empty($otp)){
        //         $userData['otp'] = $otp;
        //     }
         $where['status'] = '1';
            
            $userData = array(
                    
                    'id' => $id,
                    'otp' => $otp,
                    'status' => 1
                );
          $data=$this->Comman_model->getdata('astro',array('id'=>$id),$userData,$where);
        
          if($data->otp == $otp)
          {
                $response['msg']="successfully Matched OTP";
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
    else{
        
		      $response['msg']='Id or Otp is not matched please post correct id and OTP';
                $response['error']=400;
                echo json_encode($response);
     }
    }
    
    public function changepasswordastro_post()
    {
      $this->default_file();
      
      $id = $this->post('id');
      $newpassword = $this->post('newpassword');
      $cpassword = $this->post('cnewpassword');
      if(!empty($id)){
     
      if($newpassword == $cpassword)
      {
                
          // Update user's account data
            $userData = array();
            if(!empty($newpassword)==!empty($cpassword)){
                $userData['password'] = $newpassword;
           
            
            $update = $this->user->updateastroastropassword($userData, $id);
            
            // Check if the user data is updated
            if($update){
                // Set the response and exit
                $this->response([
                    'status' => 200,
                    'message' => 'The User Password info has been updated successfully.'
                ], REST_Controller::HTTP_OK);
              }
            
             }
             else{
                // Set the response and exit
                $this->response([
                    'status' => 400,
                    'message' => 'Password not match Some problems occurred, please try again.'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
      }
    
      else{
           $response['msg']='Password not matched';
                $response['error']=400;
                echo json_encode($response);
         }
    
       }
    }  


/////////------ End of Astro Forget and Reset APi-------------//////

 
 //// ----- End of Forgot and Reset password with OTP verification-------/////
     
///////////////-------------END OF GURUJI API CODE-----------------////////
 
// END ///////
}