<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Comman_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function insertData($table, $data) {
        $this->db->insert($table, $data);
        $id = $this->db->insert_id();
        if (!empty($id > 0)) {
            return $id;
        } else {
            return false; 
        }
       
    }
    public function get_trasaction()
    {
        $data=$this->db->query("SELECT `transactions`.*, `user`.`username` As username,`user`.`mobile` As userphone FROM `transactions`,`user` WHERE `transactions`.`uid`= `user`.`id` ");
        return $data->result();
    }
    public function get_login()
	{
		$rest=$this->db->query("SELECT * FROM user");
		return $rest->result_array();
	}
	public function loginuser($phone,$pin)
	{
		$this->db->select('*');
		$this->db->where('mobile',$phone);
		$this->db->where('pin',$pin);
		$this->db->from('user');
		$a=$this->db->get();
		return $a->row();
	}
    public function appointments()
    {
        $q='doctor.id=appointment.doctor';
        $r='users.id=appointment.patient';
        
        $this->db->select('appointment.*,users.username As uname,doctor.name As dname, doctor.department AS depart,doctor.profile As dprofile,doctor.img_url As dimg_url,doctor.phone AS dphone');
        $this->db->from('appointment,doctor,users');
        $this->db->where($q);
        $this->db->where('appointment.status','1');
        $this->db->where($r);
        $a=$this->db->get();
        return $a->result_array();
    }
     public function insertDat($table, $data) {
          $a='`users`.`username`=`feedback`.`userid`';
          $this->db->select('feedback.*');
          $this->db->from('users,feedback');
         $this->db->where('`feedback`.`username`',$id);
          $this->db->where($c);
          $a=$this->db->get();
        $this->db->insert($table, $data);
        $id = $this->db->insert_id();
        if (!empty($id > 0)) {
            return $id;
        } else {
            return false; 
        }
       
    }
        public function getAllData6($table, $where, $oderBy = '') {
        $this->db->select('wallet');
        //$this->db->select('image');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($oderBy)) {
            $this->db->from($table);
            $this->db->order_by($oderBy, "DESC");
            $query = $this->db->get();
            return $query->result();
        } else {
            $query = $this->db->get($table)->result();
            return $query;
        }
    }
    
    public function getshop_data()
    {
        $q="user.id=shop_data.user_id";
        $this->db->select('shop_data.*,user.`username`, user.`type`, user.`mobile`, user.`email`, user.`address`, user.`total_device`,user.`blocked_devices`, user.`unblocked_devices`, user.`free_devices`, user.`shop_id`');
        $this->db->where($q);
        $this->db->where('shop_data.user_id !=', '1');
        $a=$this->db->get('user,shop_data');
        echo $q;
       // return $a->result_array();
    }
    public function getAllData1($table, $where, $oderBy = '') {
        $this->db->select('username');
        $this->db->select('image');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($oderBy)) {
            $this->db->from($table);
            $this->db->order_by($oderBy, "DESC");
            $query = $this->db->get();
            return $query->result();
        } else {
            $query = $this->db->get($table)->result();
            return $query;
        }
    }
     public function getAllData2($table, $where, $oderBy = '') {
        $this->db->select('s_time');
        $this->db->select('e_time');
         $this->db->select('weekday');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($oderBy)) {
            $this->db->from($table);
            $this->db->order_by($oderBy, "DESC");
            $query = $this->db->get();
            return $query->result();
        } else {
            $query = $this->db->get($table)->result();
            return $query;
        }
    }
    public function getdata1($table, $where) {
        $this->db->select('s_time');
        $this->db->select('e_time');
        $this->db->select('weekday');
        if (!empty($where)) 
        {
            $this->db->where($where);
        }
        $query = $this->db->get($table)->row();
        return $query;
    }
    public function getdata2($table, $where) {
        $this->db->select('username');
        $this->db->select('image');
        if (!empty($where)) 
        {
            $this->db->where($where);
        }
        $query = $this->db->get($table)->row();
        return $query;
    }
    function UpdateRecord($TableName, $Data, $WhereData = NULL) {
        if ($WhereData != NULL) {
            $this->db->where($WhereData);
        }
        $Result = $this->db->update($TableName, $Data);
         //echo"$Result";die;
        return $Result;
    }
	public function Updateime($id,$data)
	{
		$this->db->where('id',$id);
		$data1=$this->db->update('ime',$data);
		return $data1;
	}
    function Deletedata($table, $where) {
        $this->db->delete($table, $where);
    }
    public function getdata($table, $where) {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table)->row();
        return $query;
    }
     public function getdata9($table, $where) {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table)->row();
        return $query;
    }

    public function getcartdata($table, $where) {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table)->result();
        return $query;
    }

    public function getAllData($table, $where, $oderBy = '') {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($oderBy)) {
            $this->db->from($table);
            $this->db->order_by($oderBy, "DESC");
            $query = $this->db->get();
            return $query->result();
        } else {
            $query = $this->db->get($table)->result();
            return $query;
        }
    }
    public function getAllData9($table, $where, $oderBy = '') {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($oderBy)) {
            $this->db->from($table);
            $this->db->order_by($oderBy, "DESC");
            $query = $this->db->get();
            return $query->result();
        } else {
            $query = $this->db->get($table)->result();
            return $query;
        }
    }
      public function getAllDataslot($table, $where, $oderBy = 'weekday') {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($oderBy)) {
            $this->db->from($table);
            $this->db->order_by($oderBy, "DESC");
            $query = $this->db->get();
            return $query->result();
        } else {
            $query = $this->db->get($table)->result();
            return $query;
        }
    }
    
    
    
    public function getreview($table, $where, $oderBy = 'datetime') {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($oderBy)) {
            $this->db->from($table);
            $this->db->order_by($oderBy, "ASC");
            $query = $this->db->get();
            return $query->result();
        } else {
            $query = $this->db->get($table)->result();
            return $query;
        }
    }
   
    function updateMedia($image, $folder, $height = 768, $width = 1024, $path = FALSE) 
        {
        $this->makedirs($folder);
        $realpath = $path ? '../uploads/' : 'uploads/';
        $allowed_types = "*";
        $img_name = $this->authToken(); //generate random string for image name
        $img_sizes_arr = $this->image_sizes($folder); //predefined sizes in model
      
        // print_r($img_sizes_arr); die;
        //We will set min height and width according to thumbnail size
        $min_width = $img_sizes_arr['thumbnail']['width'];
        $min_height = $img_sizes_arr['thumbnail']['height'];
        $config = array('upload_path' => $realpath . $folder, 'allowed_types' => $allowed_types,
        //'max_size' => "10240", // File size limitation, initially w'll set to 10mb (Can be changed)
        //'max_height' => "4000", // max height in px
        //'max_width' => "4000", // max width in px
        'min_width' => $min_width, // min width in px
        'min_height' => $min_height, // min height in px
        'file_name' => $img_name, 'overwrite' => FALSE, 'remove_spaces' => TRUE, 'quality' => '100%',);
        $this->load->library('upload'); //upload library
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($image)) {
            $error = array('error' => $this->upload->display_errors());
            return $error; //error in upload
            
        }
        //image uploaded successfully - We will now resize and crop this image
        $image_data = $this->upload->data(); //get uploaded image data
        $this->load->library('image_lib'); //Load image manipulation library
        $thumb_img = '';
        foreach ($img_sizes_arr as $k => $v) {
            // create resize sub-folder
            $sub_folder = $folder . $v['folder'];
            $this->makedirs($sub_folder);
            $real_path = realpath(FCPATH . $realpath . $folder);
            $resize['image_library'] = 'gd2';
            $resize['source_image'] = $image_data['full_path'];
            $resize['new_image'] = $real_path . $v['folder'] . '/' . $image_data['file_name'];
            $resize['maintain_ratio'] = TRUE; //maintain original image ratio
            $resize['width'] = $v['width'];
            $resize['height'] = $v['height'];
            $resize['quality'] = '100%';
            // We need to know whether to use width or height edge as the hard-value.
            // After the original image has been resized, either the original image width’s edge or
            // the height’s edge will be the same as the container
            //$dim = (intval($image_data["image_width"]) / intval($image_data["image_height"])) - ($v['width'] / $v['height']);
            //$resize['master_dim'] = ($dim > 0) ? "height" : "width";
            $this->image_lib->initialize($resize);
            $is_resize = $this->image_lib->resize(); //create resized copies
            //image resizing maintaining it's aspect ratio is done. Now we will start cropping the resized image
            $source_img = $real_path . $v['folder'] . '/' . $image_data['file_name'];
            if ($is_resize && file_exists($source_img)) {
                $source_image_arr = getimagesize($source_img);
                $source_image_width = $source_image_arr[0];
                $source_image_height = $source_image_arr[1];
                $source_ratio = $source_image_width / $source_image_height;
                $new_ratio = $v['width'] / $v['height'];
                if ($source_ratio != $new_ratio) {
                    //image cropping config
                    $crop_config['image_library'] = 'gd2';
                    $crop_config['source_image'] = $source_img;
                    $crop_config['new_image'] = $source_img;
                    $crop_config['quality'] = "100%";
                    //$crop_config['maintain_ratio'] = FALSE;
                    $crop_config['maintain_ratio'] = TRUE;
                    $crop_config['width'] = $v['width'];
                    $crop_config['height'] = $v['height'];
                    if ($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1))) {
                        $crop_config['y_axis'] = round(($source_image_width - $crop_config['width']) / 2);
                        $crop_config['x_axis'] = 0;
                    } else {
                        $crop_config['x_axis'] = round(($source_image_height - $crop_config['height']) / 2);
                        $crop_config['y_axis'] = 0;
                    }
                    //$crop_config['x_axis'] = 0;
                    //$crop_config['y_axis'] = 0;
                    $this->image_lib->initialize($crop_config);
                    $this->image_lib->crop();
                    $this->image_lib->clear();
                }
            }
        }
        if (empty($thumb_img)) $thumb_img = $image_data['file_name'];
        return $thumb_img;
    } 
    function authToken() {
        return 'guruji' . strtoupper(md5(base64_encode(rand()))); //.'_'.time();
        
    }
    function makedirs($folder = '', $mode = DIR_WRITE_MODE, $defaultFolder = 'uploads/') {
        if (!@is_dir(FCPATH . $defaultFolder)) {
            mkdir(FCPATH . $defaultFolder, $mode);
        }
        if (!empty($folder)) {
            if (!@is_dir(FCPATH . $defaultFolder . '/' . $folder)) {
                mkdir(FCPATH . $defaultFolder . '/' . $folder, $mode, true);
            }
        }
    } //End Function
    function image_sizes($folder) {
        $img_sizes = array();
        switch ($folder) {
            case 'video':
                $img_sizes['thumbnail'] = array('width' => 50, 'height' => 50, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'users':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'aadhar':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'photo':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'bank':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'gallery':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'service':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'NoticesDoc':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'training':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
              case 'logo':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'tranning_program':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'cms':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            
            case 'appbanner':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            
        }
        return $img_sizes;
    }
    function uploadPDF($profile_image, $folder) {
        $this->makedirs($folder);
        $config = array('upload_path' => FCPATH . 'uploads/' . $folder, 'allowed_types' => "*", 'overwrite' => false, 'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        'encrypt_name' => TRUE, 'remove_spaces' => TRUE);
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($profile_image)) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $pdf = $this->upload->data(); //upload the image
            return $pdf['file_name'];
        }
    }

    public function seo_url($url)
    {
         $category_url = str_replace(" ", "-", strtolower(trim($url)));
        return $category_url = str_replace("&", "and", $category_url);

    }

 public function get_product_list($key,$catid,$limit)
    {
        if($key){
        $Where=" products.`product_type` like '%$key%' ";
        }else{
        $Where='products.`product_type` like "" ';
        }

        if($catid){
        $cat_where="and products.product_cat ='$catid' ";
        }else{
        $cat_where='';
        }
         $lang=$this->session->userdata('site_lang');
 if ($lang=='english') { 
       $query=$this->db->query("SELECT brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   $Where and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.featured_on_home='yes' and products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` DESC  limit $limit ");
}else{
       $query=$this->db->query("SELECT brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   $Where and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.featured_on_home='yes' and products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` DESC  limit $limit ");

}
            return $query->result();

    }

    public function get_product_details($url){
        $lang=$this->session->userdata('site_lang');
        if ($lang=='english') { 
            $query=$this->db->query("SELECT products.product_id,products.product_title,products.product_sdisc,products.product_cat,products.product_subcat,products.product_childcat,products.product_brand,products.product_url,products.prid,products.vendor_id,products.note,products.materials, brands.brand_name, sizes.size_name, colors.color_name, colors.color_id, sizes.size_id, product_color_size_record.* FROM `products`, brands, product_color_size_record, colors, sizes WHERE product_color_size_record.pcs_product_rand_id = products.prid AND brands.brand_id = product_brand AND colors.color_id = product_color_size_record.pcs_color_id AND sizes.size_id = product_color_size_record.pcs_size  AND products.product_status = '1' AND products.product_url = '$url' ");
        }else{
            $query=$this->db->query("SELECT products.product_id,products.ar_product_title as product_title,products.product_sdisc,products.product_cat,products.product_subcat,products.product_childcat,products.product_brand,products.product_url,products.prid,products.vendor_id,products.ar_editor_notes as note,products.ar_materials as materials, brands.ar_brand_name as brand_name, sizes.ar_size_name as size_name, colors.ar_color_name as color_name, colors.color_id, sizes.size_id, product_color_size_record.* FROM `products`, brands, product_color_size_record, colors, sizes WHERE product_color_size_record.pcs_product_rand_id = products.prid AND brands.brand_id = product_brand AND colors.color_id = product_color_size_record.pcs_color_id AND sizes.size_id = product_color_size_record.pcs_size AND products.product_status = '1' AND products.product_url = '$url' ");
        }
        return $query->row();
    }


public function get_colour_by_prid($prid)
{
    $lang=$this->session->userdata('site_lang');
 if ($lang=='english') { 

   $query=$this->db->query("SELECT DISTINCT colors.color_id,colors.color_name FROM colors,`product_color_size_record` WHERE colors.color_id=product_color_size_record.pcs_color_id and product_color_size_record.pcs_product_rand_id='$prid' ");
}else{
   $query=$this->db->query("SELECT DISTINCT colors.color_id,colors.ar_color_name as color_name FROM colors,`product_color_size_record` WHERE colors.color_id=product_color_size_record.pcs_color_id and product_color_size_record.pcs_product_rand_id='$prid' ");

}
            return $query->result();

}


public function get_size_by_prid($prid,$colorid)
{
    $lang=$this->session->userdata('site_lang');
 if ($lang=='english') { 

   $query=$this->db->query("SELECT DISTINCT sizes.size_id,sizes.size_name FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_color_id='$colorid' ");
        }else{
   $query=$this->db->query("SELECT DISTINCT sizes.size_id,sizes.ar_size_name as size_name FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_color_id='$colorid' ");


        }
            return $query->result();

}



 public function new_arraival($limit)
    {
      
 $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  

       $query=$this->db->query("SELECT vendor_id,brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.`product_type` like '%new%'  and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` asc  limit $limit ");
 }else{
       $query=$this->db->query("SELECT vendor_id,brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.`product_type` like '%new%'  and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` asc  limit $limit ");
 }
            return $query->result();

    }
    public function hot_deal($limit)
    {
         $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  
      
       $query=$this->db->query("SELECT vendor_id,brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.`product_type` like '%hot%'  and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` ASC  limit $limit ");
     }else{

       $query=$this->db->query("SELECT vendor_id,brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.`product_type` like '%hot%'  and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` ASC  limit $limit ");


     }

            return $query->result();

    }

     public function deal_of_the_day($limit)
    {

 $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  
      
       $query=$this->db->query("SELECT vendor_id,brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.`product_type` like '%day%'  and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` DESC  limit $limit ");
     }else{

       $query=$this->db->query("SELECT vendor_id,brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.`product_type` like '%day%'  and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` DESC  limit $limit ");

     }

            return $query->result();

    }




public function related_product($product_brand ,$limit)
{
     $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  
   $query=$this->db->query("SELECT vendor_id, brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.product_brand ='$product_brand' AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` DESC  limit $limit ");
}else{
   $query=$this->db->query("SELECT vendor_id, brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.product_brand ='$product_brand' AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` DESC  limit $limit ");


}
            return $query->result();

}


public function get_browsing($id ,$limit)
{

      $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  
   $query=$this->db->query("SELECT vendor_id, brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.product_subcat ='$id'  and products.product_subcat ='$id' AND products.product_status = '1'  GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` asc  limit $limit ");
}else{

   $query=$this->db->query("SELECT vendor_id, brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title  as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.product_subcat ='$id' AND products.product_status = '1' and products.product_subcat ='$id'  GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` asc  limit $limit ");

}
            return $query->result();

}





public function get_image_by_colour($prid,$colorid)
{
   $query=$this->db->query("SELECT product_color_size_record.* FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_color_id='$colorid' ");
            return $query->row();

}




public function get_size_by_colour($prid,$colorid)
{
       $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  

   $query=$this->db->query("SELECT product_color_size_record.*,sizes.size_name FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_color_id='$colorid' ");
}else{
   $query=$this->db->query("SELECT product_color_size_record.*,sizes.ar_size_name as size_name FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_color_id='$colorid' ");


}
            return $query->result();

}

public function get_price_by_colour($prid,$colorid)
{
   $query=$this->db->query("SELECT product_color_size_record.* FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_color_id='$colorid' ");
            return $query->row();

}


public function get_price_by_size($prid,$size_id)
{
   $query=$this->db->query("SELECT product_color_size_record.* FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_size='$size_id' ");
            return $query->row();

}



public function get_pcsid_by_sizecolour($prid,$colour_id,$size_id)
{

   $query=$this->db->query("SELECT product_color_size_record.* FROM `product_color_size_record` WHERE  product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_size='$size_id'  and product_color_size_record.pcs_color_id='$colour_id' ");
            return $query->row();

}

public function check_product_intocart($prid,$colour_id,$size_id)
{

}

public function search($search,$tags,$sub_cat,$brand,$colour,$order,$size,$price)
{

//die();

    if($order == '1'){
    
         $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id  AND products.product_status = '1' and   product_color_size_record.pcs_product_rand_id=products.prid GROUP BY product_color_size_record.pcs_product_rand_id  ORDER BY product_color_size_record.pcs_sale ASC ");

    }else if($order == '2'){

          $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id  AND products.product_status = '1'  and   product_color_size_record.pcs_product_rand_id=products.prid  GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY product_color_size_record.pcs_sale DESC ");
         
    }else if($order == '3'){    

        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id  AND products.product_status = '1'  and   product_color_size_record.pcs_product_rand_id=products.prid  GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY products.product_id DESC ");
    }
    elseif($price)
        {
  
          $prc=explode("-",$price);
          $p1=$prc[0];
          $p2=$prc[1];
            $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id  AND products.product_status = '1'  and   product_color_size_record.pcs_product_rand_id=products.prid   and `product_color_size_record`.`pcs_sale` BETWEEN $p2 AND  $p1 GROUP BY product_color_size_record.pcs_product_rand_id ASC ");
        }

    else{
        
         $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id  AND products.product_status = '1' and   product_color_size_record.pcs_product_rand_id=products.prid   GROUP BY product_color_size_record.pcs_product_rand_id ");
    }
    // echo $order;
    // die();
    if(!empty($tags)){
        $tags_where="AND FIND_IN_SET(".$tags.", products.tagIds)";
        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$tags_where." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);        
    }else{
        $tags_where="";
    }
    if(!empty($search)){
        $search="AND (products.product_title LIKE '%$search%' OR products.ar_product_title LIKE '%$search%')";
        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$search." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }else{
        $search="";
    }
    if(!empty($sub_cat)){
        $sub_cat="AND products.product_subcat = ".$sub_cat;
        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$sub_cat." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }else{
        $sub_cat="";
    }
    if(!empty($brand)){
        $brand="AND products.product_brand = ".$brand;
        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$brand." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }else{
        $brand="";
    }
    if(!empty($colour)){
        $colour="AND product_color_size_record.pcs_color_id = ".$colour;
        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$colour." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }else{
        $colour="";
    }
    if(!empty($size)){
        $size="AND product_color_size_record.pcs_size = ".$size;
        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$size." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }else{
        $size='';
    }
    $lang = $this->session->userdata('site_lang');
    if(!empty($lang) && ($lang == 'english')){  
        //$query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$tags_where." ".$search." ".$sub_cat." ".$brand." ".$colour." ".$size." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }else{
        //$query = $this->db->query("SELECT products.vendor_id,brands.ar_brand_name as brand_name,product_color_size_record.*, products.product_id, products.ar_product_title as product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND  product_color_size_record.pcs_product_rand_id = products.prid ".$tags_where." ".$search." ".$sub_cat." ".$brand." ".$colour." ".$size." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }
    return $query->result();
}
//--------------13-02-2020-----------------
public function see_all($id ,$limit)
{

      $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  
   $query=$this->db->query("SELECT vendor_id, brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.product_type ='$id' AND products.product_status = '1'  GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` asc  limit $limit ");
}else{

   $query=$this->db->query("SELECT vendor_id, brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title  as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.product_type ='$id'  AND products.product_status = '1'  GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` asc  limit $limit ");

}
            return $query->result();

}
//---------------------2020-04-12---------
public function solutions_limit()
{
    $sql=$this->db->query("SELECT * FROM `match` WHERE `tm` <= '17'");
    
    return $sql->result();
}
public function symbole_search($symbole,$searchtype)
{
    $this->db->select('*');
    $this->db->from('symboles');
    $search="(symbol LIKE '%$symbole%' OR name_of_compney LIKE '%$symbole%')";
    $this->db->where($search);    
    $this->db->where('search_type',$searchtype);
    $qry = $this->db->get();
    return $qry->result();
}
public function liveres()
{
    date_default_timezone_set("Asia/Kolkata");
         $timer=date('H');
   $sql=$this->db->query("SELECT * FROM `match` WHERE `tm` <= '17'");
    
    return $sql->result();
        
}
//--------------------------
public function api_call_sms($mobile,$msg)
{

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://sms.abinfotech.net/api/sendhttp.php?authkey=325405APXGQRxFwU5e87602f&mobiles=$mobile&message=$msg&sender=METATR&route=4",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 6eb2e084-d775-2e89-39b2-affe9b39d3c4"
  ),
));

 $response = curl_exec($curl);
 $err = curl_error($curl);

curl_close($curl);
return;
}
public function livemetch($sdate,$edate)
{
    $uu=$this->db->query("SELECT count(*) as tlive FROM `live_game` WHERE `time` BETWEEN '$sdate' AND '$edate'");
    
    return $uu->row();
}
public function upcomming($sdate)
{
    $dd=$this->db->query("SELECT count(*) as utotlal FROM `live_game` WHERE `time`> '$sdate'");
    return $dd->row();
}
function cancle()
{
   $dd=$this->db->query("SELECT count(*) as ctotlal FROM `live_game` WHERE `livestatus`='CANCL'");
   return $dd->row();
}
public function finished()
{
   $dd=$this->db->query("SELECT count(*) as ftotlal FROM `live_game` WHERE `livestatus`='finished'");
   return $dd->row(); 
}
public function upcommingall($sdate)
{
    $dd=$this->db->query("SELECT * FROM `live_game` WHERE `time`> '$sdate'");
    return $dd->result();
}
public function complete()
{
     $dd=$this->db->query("SELECT * FROM `live_game` WHERE `livestatus`='finished'");
   return $dd->result(); 
}
public function livemetch_all($sdate,$edate)
{
    $uu=$this->db->query("SELECT * FROM `live_game` WHERE `time` BETWEEN '$sdate' AND '$edate'");
    return $uu->result();
}
public function livefoot()
{
    $date=date('Y-m-d');
     $uu=$this->db->query(" SELECT * FROM `football` WHERE `starting_at_date`='$date'");
    return $uu->result();
   //
    
}
public function upcommingfoot()
{
     $date=date('Y-m-d');
     $uu=$this->db->query(" SELECT * FROM `football` WHERE `starting_at_date`>'$date'");
    return $uu->result();
}
public function canclefoot()
{
     $date=date('Y-m-d');
     $uu=$this->db->query(" SELECT * FROM `football` WHERE `starting_at_date`<'$date'");
    return $uu->result();
}

public function insertWallet($init_id,$user_type,$pay_type,$user,$amount,$method){
    $data = array("init_id"=>$init_id,"user_type"=>$user_type,"pay_type"=>$pay_type,"user"=>$user,"amount"=>$amount,"timestamp"=>strtotime(date('d-m-Y')),"method"=>$method,"status"=>'pending');
    return $this->db->insert('wallet_load',$data);
}
public function insertWall($init_id,$user_type,$pay_type,$user,$amount,$method){
    $data = array("init_id"=>$init_id,"user_type"=>$user_type,"pay_type"=>$pay_type,"user"=>$user,"amount"=>$amount,"timestamp"=>strtotime(date('d-m-Y')),"method"=>$method,"status"=>'success');
    return $this->db->insert('wallet_load',$data);
}
public function getUserProfile($table,$field,$id){
    $res = $this->db->select('*')
                    ->where($field,$id)
                    ->get($table);
    return $res->row_array();
}


public function getLetestPayment($init_id){
    $res= $this->db->select('*')
                    ->where('init_id',$init_id)
                    ->get('wallet_load');
    return $res->result_array();            
}

public function updateWalletPayment($wallet_load_id,$transactionId){
    return $this->db->where('wallet_load_id',$wallet_load_id)->update('wallet_load',array('status'=>'paid',"transactionId"=>$transactionId));
}


public function updateUid($id,$uid){
    return $this->db->where('phone',$id)->update('user',array("uid"=>$uid));
}


public function updateAmount($amount,$user_id,$table,$field){
    $res = $this->db->select('*')
                    ->where($field,$user_id)
                    ->get($table);
    $user = $res->row_array();
    $wallet = base64_decode($user['wallet']);
    $wallet = ($table=="user")?((int)$wallet-(int)$amount):((int)$wallet+(int)$amount);
    $wallet = base64_encode($wallet);
    return $this->db->where($field,$user_id)->update($table,array('wallet'=>$wallet));
}








}











?>