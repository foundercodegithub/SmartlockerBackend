<?php 
class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
     
    }
    public function term_condition()
    {
        $this->load->view('users/term_condition');
    }
    public function crime_by_maps()
	{
	    $this->load->helper('url');
        $this->load->model('User_model');
        $ap['rest']=$this->User_model->maps_crime();
	    $this->load->view('users/crimes_by_map',$ap);
	}
	public function shakink_mail()
    {
         $this->load->model('User_model');
     	  $arti['artic']=$this->User_model->shakink_mail();
     	 	$this->load->view('users/shaking_mail',$arti);
    }
    public function crime_views()
	{
		$this->load->helper('url');
      $this->load->model('User_model');
     
	  $arti['artic']=$this->User_model->crime_views();

		$this->load->view('users/crime_views',$arti);
	}
//session section
public function index()
{
   if($this->session->userdata('id'))
		 {
		      $this->load->helper('url');
       $this->load->model('User_model');
	  $arti['artic']=$this->User_model->index();
	  $arti['rest']=$this->User_model->index2();
	  $arti['best']=$this->User_model->index3();
	   $arti['est']=$this->User_model->index4();
	   $arti['st']=$this->User_model->index5();
        //   print_r ($arti); 
        //   print_r($data);die;
           $this->load->view('users/index',$arti);	      }
		else
		 {
		 	redirect('users/login_page');
		 }
}
public function locations()
{
    $id=$this->input->get('id');
    $this->load->model('User_model');
    $arti['artic']=$this->User_model->locations($id);
  	$this->load->view('users/locations',$arti);
}
//end session
// user section
public function all_user_list()
	{
		$this->load->helper('url');
       $this->load->model('User_model');
     
	  $arti['artic']=$this->User_model->viewdata();

		$this->load->view('project1/User_list',$arti);
	}
	public function index2()
	{
		$this->load->helper('url');
       $this->load->model('User_model');
     
	  $arti['artic']=$this->User_model->viewdata();

		$this->load->view('users/superlist',$arti);
	}
	public function all_user()
	{
	    $this->load->helper('url');
	    $this->load->model('User_model');
	    $data['rest']=$this->User_model->view_user();
	    $this->load->view('users/all_user',$data);
	}
	public function view_profile()
{
    $id=$this->input->get('id');
        $this->load->model('User_model');
        $data['data']= $this->User_model->view_pro($id);
    $this->load->view('users/view_profile',$data);
}
	public function user_contact()
	{
	    $id=$this->input->get('id');
	    $this->load->model('User_model');
	    $data['abc']=$this->User_model->user_contact($id);
	    $this->load->view('users/user_contact',$data);
	}
	public function registation()
	{
		$this->load->view('users/superadd');
	}
	public function insert()
	{
	$data=[
		 		'name'=>$this->input->post('name'),
		 		'age'=>$this->input->post('age'),
		 		'email'=>$this->input->post('email'),
		 		'number'=>$this->input->post('number'),
		 		'address'=>$this->input->post('address'),
		 		'city'=>$this->input->post('city'),
		 		'zipcode'=>$this->input->post('zipcode'),
		 		'state'=>$this->input->post('state'),
		 		'country'=>$this->input->post('country'),
		 	];
		 	
		 	$this->load->model('User_model');
		 	$this->User_model->registation_model($data);
		 	redirect('users/index2');
	}
	 public function delete_user()
    {
        $id=$this->input->get('id');
        $this->load->model('User_model');
        $this->User_model->delete_appuser($id);
         redirect('users/index2');
     }
     public function update_user()
     {
          $id=$this->input->get('id');
        $this->load->model('User_model');
        $data['data']= $this->User_model->update_user($id);
         $this->load->view('users/update_user',$data);
     }
     public function user_update()
     {
         $id=$this->input->post('id');
         
         	$this->load->model('User_model');
         $data=[
		 		'name'=>$this->input->post('name'),
		 		'age'=>$this->input->post('age'),
		 		'email'=>$this->input->post('email'),
		 		'number'=>$this->input->post('number'),
		 		'address'=>$this->input->post('address'),
		 		'city'=>$this->input->post('city'),
		 		'zipcode'=>$this->input->post('zipcode'),
		 		'state'=>$this->input->post('state'),
		 		'country'=>$this->input->post('country'),
		 	];
		 	
		 	
		 	$this->User_model->user_updated($id,$data);
		 	redirect ('users/index2');
	
         
     }
     
     
     //user section end
	public function distriadd()
	{
		$this->load->view('users/distriadd');
	}
	public function distrilist()
	{
		$this->load->view('users/distrilist');
	}

	public function reataileradd()
	{
		$this->load->view('users/retaileradd');
	}
	public function reatailerlist()
	{
		$this->load->view('users/retailerlist');	
	}
	public function userlist()
	{
		$this->load->view('users/userlist');
	}
	public function transaction()
	{
		$this->load->view('users/transaction');
	}
	public function finace()
	{
		$this->load->view('users/finace');
	}
	
	// login section
	 public function Admin_login()
	 {
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','email','required');
         $this->form_validation->set_rules('password','password','required');
         $email=$this->input->post('email');
         $password=$this->input->post('password');
         
         if($this->form_validation->run()== true)
         {
             $this->load->model('User_model');
             $email=$this->input->post('email');
             $password=$this->input->post('password');
             $session=$this->User_model->admin_login($email,$password);
             if($session)
             {
                 $this->load->library('session');
                $this->session->set_userdata('id',$session);
                $id=$this->session->userdata('id');
                 redirect('users/index');
             }
             else{
                 redirect('users/login_page');
             }
         }
    }
	public function login_page()
	{
		$this->load->view('users/login');
	}

// email crime open

     public function email_add()
	{
		$this->load->view('email/add');
	}
	public function add_email()
	{
	    $data=[
		 		'app_user'=>$this->input->post('app_user'),
		 		'contact_person'=>$this->input->post('contact_person'),
		 		'email_id'=>$this->input->post('email_id'),
		 		'image_attachment'=>$this->input->post('image_attachment'),
		 		'address'=>$this->input->post('address'),
		 		'city_name'=>$this->input->post('city_name'),
		 	
		 		'created_at'=>$this->input->post('created_at')
		 	];
		 	
		 	$this->load->model('User_model');
		 	$this->User_model->email_add($data);
		 	redirect('users/fetch_email');
	}
	
	public function fetch_email()
	{
	   $this->load->helper('url');
       $this->load->model('User_model');
	  $arti['artic']=$this->User_model->get_email(); 
	    $this->load->view('email/email_list',$arti);
	}
	public function delete_email()
	{
	     $id=$this->input->get('id');
        $this->load->model('User_model');
        $this->User_model->delete_email($id);
        redirect('users/fetch_email');
	}
	public function update_emails()
	{
	     $id=$this->input->get('id');
        $this->load->model('User_model');
        $data['data']= $this->User_model->update_email($id);
	    $this->load->view('email/update_email',$data);
	}
	public function email_update()
	{
	    $id = $this->input->post('id');
	    $this->load->model('User_model');
	    $data=[
	        
		 		'app_user'=>$this->input->post('app_user'),
		 		'contact_person'=>$this->input->post('contact_person'),
		 		'email_id'=>$this->input->post('email_id'),
		 		'image_attachment'=>$this->input->post('image_attachment'),
		 		'address'=>$this->input->post('address'),
		 		'city_name'=>$this->input->post('city_name'),
		 		'updated_at'=>$this->input->post('updated_at')
	        ];
	        $this->User_model->email_update($id,$data);
	        redirect('users/fetch_email');
	}
	//crime section
	public function add_crime()
	{
	    $this->load->view('users/add_crime');
	}
	
	public function crime_add(){
	$data=[
		 		'user_id'=>$this->input->post('user_id'),
		 		'description'=>$this->input->post('description'),
		 		'incident_type'=>$this->input->post('incident_type'),
		 		'address'=>$this->input->post('address'),
		 		'city'=>$this->input->post('city'),
		 		'state'=>$this->input->post('state')
		 		
		 	];
		 	
		 	$this->load->model('User_model');
		 	$this->User_model->crime_add($data);
		 	redirect('users/crime_view');
	 }
	
	public function crime_view()
	{
		$this->load->helper('url');
       $this->load->model('User_model');
     
	  $arti['artic']=$this->User_model->crime_view();

		$this->load->view('email/add_list',$arti);
	}
	
	public function crime_delete()
	{
	    $id=$this->input->get('id');
        $this->load->model('User_model');
        $this->User_model->crime_delete($id);
         redirect('users/crime_view');
	}
	
	
	//crime list by map
	public function crime_by_map()
	{
	    $this->load->helper('url');
    $this->load->model('User_model');
    $ap['rest']=$this->User_model->map_crime();
	    $this->load->view('email/map_crime_list',$ap);
	}
	public function delete_map_crime()
	{
	   $id=$this->input->get('id');
        $this->load->model('User_model');
        $this->User_model->delete_map_crime($id);
        redirect('users/crime_by_map');
	}
	
// email crime end

//admin section

public function add_admin()
{
    $this->load->view('users/add_admin');
}
public function adminadd()
{
    
    $data=[
		 		'name'=>$this->input->post('name'),
		 		'phone'=>$this->input->post('phone'),
		 		'email'=>$this->input->post('email'),
		 		'password'=>$this->input->post('password'),
		 		'create_date'=>$this->input->post('create_date'),
		 		'status'=>'1'
		 	
		 	];
		 	$this->load->model('User_model');
		 	$this->User_model->admin_add($data);
            redirect('users/adminlist');
}
public function adminlist()
{
    $this->load->helper('url');
    $this->load->model('User_model');
    $ap['rest']=$this->User_model->admin();
    $this->load->view('users/admin_list',$ap);
}
public function del_admin()
{
       $id=$this->input->get('id');
        $this->load->model('User_model');
        $this->User_model->admin_delete($id);
         redirect('users/adminlist');
}
public function admin_update()
{
    $id=$this->input->get('id');
    $this->load->model('User_model');
   $data['data']= $this->User_model->update_admin($id);
    $this->load->view('users/update_admin',$data);
}
public function update_admin_add()
{
     $id=$this->input->post('id');
    $this->load->model('User_model');
    
    $data=[
           'name'=>$this->input->post('name'),
            'phone'=>$this->input->post('phone'),
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password'),
			
			'up_date'=>$this->input->post('up_date')
			
// 			'status'=>'0',
        
        ];
        $this->User_model->addupdate_admin($id,$data);
        redirect('users/adminlist');
}
  
     
     
     //geo fence section
     public function geofence()
     {
          $this->load->helper('url');
       $this->load->model('User_model');
       $ap['rest']=$this->User_model->geo();
         $this->load->view('users/geo_fence',$ap);
     }
     public function delete_geo()
     {
         $id=$this->input->get('id');
        $this->load->model('User_model');
        $this->User_model->geo_delete($id);
        redirect('users/geofence');
     }
     public function update_geo()
     {
          $id=$this->input->get('id');
        $this->load->model('User_model');
        $data['data']= $this->User_model->update($id);
         $this->load->view('email/update_geo',$data);
     }
     public function update()
     {
         $id=$this->input->post('id');
    $this->load->model('User_model');
    
    $data=[
           
			'geo_fence_distance'=>$this->input->post('geo_fence_distance'),
			
			'updated_at'=>$this->input->post('updated_at')
			
// 			'status'=>'0',
        
        ];
        $this->User_model->update_geo($id,$data);
        redirect('users/geofence');

     }
// location section
public function location()
{
    $this->load->helper('url');
       $this->load->model('User_model');
       $ap['rest']=$this->User_model->location();
    $this->load->view('users/location',$ap);
}
public function delete_loaction()
{
     $id=$this->input->get('id');
        $this->load->model('User_model');
        $this->User_model->delete_location($id);
        redirect('users/location');
}
public function update_location()
{
    $id=$this->input->get('id');
        $this->load->model('User_model');
        $data['data']= $this->User_model->update_location($id);
    $this->load->view('users/update_location',$data);
}
public function location_update()
{
$id=$this->input->post('id');
    $this->load->model('User_model');
    
    $data=[
           
			'app_user_id'=>$this->input->post('app_user_id'),
			
			'address'=>$this->input->post('address'),
			'city'=>$this->input->post('city'),
			'district'=>$this->input->post('district'),
			'state'=>$this->input->post('state'),
			
			'country'=>$this->input->post('country'),
			'zip'=>$this->input->post('zip'),
			'crime_count'=>$this->input->post('crime_count'),
			'incident_type'=>$this->input->post('incident_type'),
			'r_type'=>$this->input->post('r_type'),
			'updated_at'=>$this->input->post('updated_at')
			

			
			
// 			'status'=>'0',
        
        ];
        $this->User_model->addupdate_loaction($id,$data);
        redirect('users/location');

}
//jpurney section

public function journey()
{
     $this->load->helper('url');
       $this->load->model('User_model');
       $ap['rest']=$this->User_model->fetch_journey();
    $this->load->view('users/journy',$ap);
}
public function delete_journey()
{
    
     $id=$this->input->get('id');
        $this->load->model('User_model');
        $this->User_model->delete_journey($id);
        redirect('users/journey');
}
public function update_journey()
{
    $this->load->view('users/update_journey');
}

public function password_change()
{
    $this->load->view('users/change_password');
}
public function change_pass()
	{
	$id=$this->input->post('id');
    $this->load->model('User_model');
    $data=[
        'password'=>$this->input->post('password')
        ];
        
		 $this->User_model->change_pass($id,$data);	
		 redirect('users/login_page');
	}


}
?>