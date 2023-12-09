<?php
class User_model extends CI_Model
{
 public function admin_login($email,$password ){
       $d= $this->db->where(['email'=> $email,'password'=> $password])->get('admin');
       
       if($d->num_rows())
       {
           return $d->row()->id;
           
           return $d->row()->email;
        
       }
       else{
           return false;
       }
    }
    public function shakink_mail()
	{
	    $this->db->select('*');
	    $this->db->from('shaking_email');
	    $b=$this->db->get();
	    return $b->result_array();
	}
	public function locations($id)
	{
	    $this->db->where('id',$id);
	    $this->db->select('*');
	    $this->db->from('shaking_email');
	    $b=$this->db->get();
	    return $b->result_array();
	}
	public function crime_views()
	{
	$q=$this->db->query('SELECT  `report_crime`.`id`,`report_crime`.`description`, `report_crime`.`incident_type`, `report_crime`.`address`, `report_crime`.`state`, `report_crime`.`city`,`users`.`name` AS uname, `users`.`email` AS emails,`users`.`mobile` AS phone FROM `report_crime`,`users` WHERE `users`.`id`=`report_crime`.`user_id` ');
	    return $q->result_array();
	}
		public function view_pro($id)
	{
	    $data = $this->db->where('id',$id)->get('users');
        return $data->result_array();
	}
// 	crime open add data open
public function maps_crime()
	 {
	     $q = $this->db->query('SELECT `double`.`id`, `double`.`latitude`, `double`.`longitude`, `double`.`images`, `double`.`place_name`, `double`.`status`, `double`.`device_id`, `double`.`crime`, `users`.`name` AS uname, `users`.`email` AS emails, `users`.`address` AS city, `users`.`mobile` AS phone FROM `double`,`users` WHERE `users`.`id`=`double`.`user_id`');
	     return $q->result_array();
	 }
public function crime_add($data)
	{
	   $this->db->insert('report_crime',$data);
	
	}
	public function crime_view()
	{
	$q=$this->db->query('SELECT  `report_crime`.`id`,`report_crime`.`description`, `report_crime`.`incident_type`, `report_crime`.`address`, `report_crime`.`state`, `report_crime`.`city`,`users`.`name` AS uname, `users`.`email` AS emails,`users`.`mobile` AS phone FROM `report_crime`,`users` WHERE `users`.`id`=`report_crime`.`user_id` ');
        
		
	  

		        return $q->result_array();
	}
	 public function crime_delete($id)
	 {
	     return $this->db->delete('report_crime',array('id'=>$id));
	 }
	 public function map_crime()
	 {
	     $q=$this->db->query('SELECT `double`.`id`, `latitude`, `longitude`, `double`.`address`, `double`.`phone`, `double`.`images`, `double`.`place_name`, `double`.`status`, `double`.`device_id`, `double`.`email`, `double`.`crime`,`users`.`name` AS uname FROM `double`,`users` WHERE `users`.`id`=`double`.`user_id`');
	     return $q->result_array();
	 }
	 public function delete_map_crime($id)
	 {
	     return $this->db->delete('double',array('id'=>$id));
	 }
// crime end add data
public function admin_add($data)
{
    $this->db->insert('admin',$data);
}
public function admin()
{
    $q=$this->db->select('*')->get('admin');
    return $q->result_array();
}

public function admin_delete($id)
{
  return $this->db->delete('admin',array('id'=>$id));
}
public function update_admin($id)
{
     $data= $this->db->where('id',$id)->get('admin');
        return $data->result_array();
}
public function addupdate_admin($id,$data)
{
    $this->db->where('id',$id);
    $this->db->update('admin',$data);
}
//user section

	public function registation_model($data)
	{
	   $this->db->insert('ladli_app',$data);
	
	}
	public function viewdata()
	{
		$q=$this->db->select('*')
		         
		         ->get('ladli_app');

		        return $q->result_array();
	}
	public function view_user()
	{
	    $q=$this->db->select('*')->get('users');
	    return $q->result_array();
	}
public function delete_appuser($id)
{
    return $this->db->delete('ladli_app',array('id'=>$id));
}
public function update_user($id)
{
   $data = $this->db->where('id',$id)->get('ladli_app');
        return $data->result_array();
}
public function user_updated($id,$data)
{
    $this->db->where('id',$id);
    $this->db->update('ladli_app',$data);
}
//email section

public function email_add($data)
{
    $this->db->insert('emails',$data);
}
public function get_email()
{
    $q=$this->db->select('*')->get('emails');
    return $q->result_array();
}
public function delete_email($id)
{
     return $this->db->delete('emails',array('id'=>$id));
}
public function update_email($id)
{
     $data = $this->db->where('id',$id)->get('emails');
        return $data->result_array();
}
public function email_update($id,$data)
{
     $this->db->where('id',$id);
    $this->db->update('emails',$data);
}

//geo section

public function geo()
{
    $q=$this->db->select('*')->get('geo_fences');
    return $q->result_array();
}
public function geo_delete($id)
{
    return $this->db->delete('geo_fences',array('id'=>$id));
}
public function update($id)
{
    $data= $this->db->where('id',$id)->get('geo_fences');
        return $data->result_array();
}
public function update_geo($id,$data)
{
     $this->db->where('id',$id);
    $this->db->update('geo_fences',$data);
}
// location section
public function location()
{
    	$q=$this->db->query('SELECT `locations`.`id`,`locations`.`address`,  `locations`.`city`, `locations`.`district`, `locations`.`state`, `country`, `zip`, `crime_count`, `incident_type`, `r_type`, `locations`.`created_at`, `locations`.`updated_at`,`app_users`.`name` AS uname FROM `locations`,`app_users` WHERE `app_users`.`id`=`locations`.`app_user_id`');
    return $q->result_array();
}
public function delete_location($id)
{
    return $this->db->delete('locations',array('id'=>$id));
}
public function update_location($id)
{
   $data= $this->db->where('id',$id)->get('locations');
        return $data->result_array(); 
}
public function  addupdate_loaction($id,$data)
{
     $this->db->where('id',$id);
    $this->db->update('locations',$data);
}
// journey section

public function fetch_journey()
{
    $q=$this->db->select('*')->get('report_journeys');
    return $q->result_array();
}
public function delete_journey($id)
{
    return $this->db->delete('report_journeys',array('id'=>$id));
}
//dashboard section
public function index()
{
    $query = $this->db->query("SELECT *,count(id) AS num_of_time FROM `double`");
    // print_r($query->result());
    return $query->result();

}
public function index2()
{
    $q = $this->db->query("SELECT *,count(id) AS num_id FROM report_crime");
    // print_r($query->result());
    return $q->result();
}
public function index5()
{
    $q = $this->db->query("SELECT *,count(id) AS num_id FROM `shaking_email`");
    // print_r($query->result());
    return $q->result();
}
public function index3()
{
    $q=$this->db->query("SELECT *,count(id) AS num_id_row FROM geo_fences");
    return $q->result();
}
public function index4()
{
    $q=$this->db->query("SELECT *,count(id) AS num_row FROM users");
    return $q->result();
}
public function user_contact($id)
{
    $this->db->select('*');
    $this->db->where('user_id',$id);
    $this->db->from('user_contact');
    $a=$this->db->get('');
    return $a->result_array();
}
//change password

// public function get_user($id)
//     {
//         $this->db->where('id', $id);
//         $query = $this->db->get('admin');
//         return $query->row();
//     }

//     public function update_user($id, $userdata)
//     {
//         $this->db->where('id', $id);
//         $this->db->update('admin', $userdata);
//     }



	public function change_pass($id,$data)
	{
	     $this->db->where('id',$id);
    $this->db->update('admin',$data);
	
	}


	
}
?>