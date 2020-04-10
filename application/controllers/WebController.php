<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebController extends MY_Controller {

    public function __construct() {
       parent::__construct();
       $this->load->model('Usermodel');
       $this->load->model('AdminModel');
    }

    public function set_location($id){
       $location=$id;
       $this->session->set_userdata('location_user',$location);
       redirect(base_url());
    }

    public function change_pass_ajax(){
        $userdata=$this->session->userdata('userdata');
        $my_id=$userdata[0]['user_id'];
        $old_pass=$_POST['old_pass'];
        $new_pass=$_POST['new_pass'];
        $changer=$this->Usermodel->password_changer($my_id,$old_pass,$new_pass);
        if ($changer) {
            die(json_encode(array('status'=>'1','msg'=>'Password Updated Successfully')));
        }
        else{
            die(json_encode(array('status'=>'0','msg'=>'Old Password Is incorrect')));
        }
    }

    public function change_password(){
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        $data['location']=$random;
        $this->load->view('website/header',$data);
        $this->load->view('website/privacy',$data);
        $this->load->view('website/footer');
    }

    public function delete_ad(){
        $ads_id=$_POST['ads_id'];
        $delete=$this->Usermodel->delete_ad($ads_id);
        if ($delete) {
            $this->session->unset_userdata('location_user');
            die(json_encode(array('status'=>'1','msg'=>'deleted')));
        }
        else{
            die(json_encode(array('status'=>'0')));
        }
    }

    public function view_profile($id){
        $data['user_data']=$this->Usermodel->fetch_user($id);
        $data['user_products']=$this->Usermodel->fetch_ad_by_user($id);
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        $data['location']=$random;
        $this->load->view('website/header',$data);
        $this->load->view('website/user_profile',$data);
        $this->load->view('website/footer');
    }

    public function edit_profile(){
        $userdata=$this->session->userdata('userdata');
        $my_id=$userdata[0]['user_id'];
        $data['user_details']=$this->Usermodel->fetch_user($my_id);
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        $data['location']=$random;
        $this->load->view('website/header',$data);
        $this->load->view('website/myprofile',$data);
        $this->load->view('website/footer');
    }

    public function upload_profile(){
        $userdata=$this->session->userdata('userdata');
        $my_id=$userdata[0]['user_id'];
        $check_profile=$this->Usermodel->check_profile($_POST,$my_id);
        if($check_profile){
        $result=$this->Usermodel->update_profile($_POST,$my_id);
            if ($result) {
                $this->session->set_flashdata('add_category_message', 'Profile Updated Successfully');
                redirect(base_url()."my-profile");
            }            
        }
        else{
                $this->session->set_flashdata('add_category_message', 'Already Exists');
                redirect(base_url()."my-profile");
        }
    }

    public function image_handler(){
                $config['upload_path'] = './uploads/profile_pics/';  

        // directory (http://localhost/codeigniter/index.php/your directory)

                $config['allowed_types'] = 'gif|jpg|png|jpeg';  
        //Image type  

                $config['max_size'] = 0;    

         // I have chosen max size no limit 
                $new_name = time() . '-' . $_FILES["file-0"]['name']; 

        //Added time function in image name for no duplicate image 

                $config['file_name'] = $new_name;

        //Stored the new name into $config['file_name']

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file-0') && !empty($_FILES['file-0']['name'])) {
                    //$this->session->set_flashdata('add_category_message', 'Something Went Wrong');
                    //redirect('AdminController/add_category');
                    //$error = array('error' => $this->upload->display_errors());
                    //$this->load->view('production/create_images', $error);
                } else {
                        $image_data =   $this->upload->data();
                        $this->load->library('image_lib');
                        $configer =  array(
                          'image_library'   => 'gd2',
                          'source_image'    =>  "./uploads/category_images/".$new_name,
                          'maintain_ratio'  =>  TRUE,
                          'width'           =>  250,
                          'height'          =>  250,
                        );
                        $this->image_lib->clear();
                        $this->image_lib->initialize($configer);
                        $this->image_lib->resize();
                        $data=array('user_image'=>$new_name);
                        $table="users";
                        $userdata=$this->session->userdata('userdata');
                        $my_id=$userdata[0]['user_id'];
                        $result=$this->Usermodel->update_picture($table,$data,$my_id);
                        if ($result) {
                            die(json_encode(array('status'=>'1')));
                        }
                        else{
                            die(json_encode(array('status'=>'0')));
                        }
                }
    }

    public function upload_pic(){
        $userdata=$this->session->userdata('userdata');
        $my_id=$userdata[0]['user_id'];
        $data['user_details']=$this->Usermodel->fetch_user($my_id);
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        $data['location']=$random;
        $this->load->view('website/header',$data);
        $this->load->view('website/upload_profilepic',$data);
        $this->load->view('website/footer');
    }

    public function chat(){
        $userdata=$this->session->userdata('userdata');
        $my_id=$userdata[0]['user_id'];
        $data['fetch_chat_users']=$this->Usermodel->fetch_chat_users($my_id);
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        $data['location']=$random;
        $this->load->view('website/header',$data);
        $this->load->view('website/chat',$data);
        $this->load->view('website/footer');
    }

    public function open_chat(){
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        $userdata=$this->session->userdata('userdata');
        $my_id=$userdata[0]['user_id'];
        $data['fetch_chat_users']=$this->Usermodel->fetch_chat_users($my_id);
        $data['location']=$random;
        $this->load->view('website/header',$data);
        $this->load->view('website/chat',$data);
        $this->load->view('website/footer');
    }

    public function fetch_products(){
        $name=$_POST['name'];
        $location=$_POST['location'];
        $result=$this->Usermodel->fetch_products($name,$location);
        if ($result) {
            die(json_encode(array('status'=>'1','data'=>$result)));
        }
        else{
            die(json_encode(array('status'=>'0')));
        }
    }

    public function index(){
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        else{
            $this->session->set_userdata('location_user',$random);
        }
        $data['ads']=$this->Usermodel->fetch_ads($random);
        $data['location']=$random;
    	$this->load->view('website/header',$data);
    	$this->load->view('website/index',$data);
    	$this->load->view('website/footer');
    }

    public function fetch_cities(){
        $name=$_POST['name'];
        $fetch=$this->Usermodel->fetch_cities($name);
        die(json_encode($fetch));
    }

    public function fetch_by_category($id){
        $slug=$id;
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        $data['location']=$random;
        $data['products']=$this->Usermodel->fetch_all_products($random,$slug);
        $this->load->view('website/header',$data);
        $this->load->view('website/search_results',$data);
        $this->load->view('website/footer');
    }

    public function fetch_by_subcat($a,$b){
        //$slug=$id;
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        $data['location']=$random;
        $data['products']=$this->Usermodel->fetch_all_products_sub($random,$b);
        $this->load->view('website/header',$data);
        $this->load->view('website/search_results',$data);
        $this->load->view('website/footer');
    }

    public function my_ads(){
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        $data['location']=$random;
        if ($this->session->userdata('userdata')) {
            $userdata=$this->session->userdata('userdata');
            $user_id=$userdata[0]['user_id'];
            $data['myads']=$this->Usermodel->fetchmyads($user_id);
            $this->load->view('website/header',$data);
            $this->load->view('website/myfav',$data);
            $this->load->view('website/footer');
        }
        else{
            redirect(base_url());
        }
    }

    public function view_ad($id){
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        $data['location']=$random;
        $result=$this->Usermodel->fetch_ad($id);
        if ($result) {
            $data['ad']=$result;
            $this->load->view('website/header',$data);
            $this->load->view('website/product_view',$data);
            $this->load->view('website/footer');
        }
        else{
            redirect(base_url());
        }
    }

    public function logout(){
    	$this->session->unset_userdata('userdata');
        $this->session->unset_userdata('location_user');
		$this->session->sess_destroy();
		redirect(base_url());
    }

    public function add_user(){
    	$table = "users";
    	$email = $this->input->post('user_email');
    	$check_user = $this->Usermodel->check_user($email);
    	if ($check_user) {
    		$result=$this->Usermodel->insert_function($table,$_POST);
    		if ($result) {
    			die(json_encode(array('status'=>'1','msg'=>'User Registered Successfully')));
    		}
    		else{
    			die(json_encode(array('status'=>'0','msg'=>'OOPS ! Something Went Wrong')));
    		}
    	}
    	else{
    		die(json_encode(array('status'=>'2','msg'=>'User With this Email ID already exists')));
    	}
    }

    public function post(){
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        $data['location']=$random;
    	$table = "categories";
    	$data['fetch_categories']=$this->AdminModel->fetch_data($table);
    	$this->load->view('website/header',$data);
    	$this->load->view('website/post_list',$data);
    	$this->load->view('website/footer');
    }

    public function fetch_country(){
    	$val = $this->input->post('val');
    	$states = $this->Usermodel->fetch_states($val);
    	die(json_encode(array('states'=>$states)));
    }

    public function fetch_city(){
    	$val = $this->input->post('val');
    	$states = $this->Usermodel->fetch_city($val);
    	die(json_encode(array('states'=>$states)));
    }

    public function create_post($id){
        $rand_city=$this->Usermodel->fetch_city_rand();
        $random=$rand_city[0]['city'];
        if($this->session->userdata('location_user')){
            $location=$this->session->userdata('location_user');
            $random=$location;
        }
        $data['location']=$random;
    	$result=$this->Usermodel->fetch_sub_slug($id);	
    	$data['countries']=$this->Usermodel->fetch_countries();
    	if($result){
    		$data['cat_data']=$result;
    		$this->load->view('website/header',$data);
    		$this->load->view('website/post_add',$data);
    		$this->load->view('website/footer');
    	}
    	else{
    		redirect(base_url());
    	}
    }

    public function add_post(){
    	$result=$this->upload_files($_FILES['photos']);
    	if ($result) {
	    	$photos=implode(",",$result);
	    	$_POST['photos']=$photos;
	    	$table="active_ads";
	    	$result=$this->Usermodel->insert_function($table,$_POST);
	    	if ($result) {
	    		die(json_encode(array('status'=>'1','msg'=>'added')));
	    	}
	    	else{
	    		die(json_encode(array('status'=>'0','msg'=>'Failed')));
	    	}
    	}

    }

        public function upload_files($files)
    {
        $config = array(
            'upload_path'   => './uploads/ads_images/',
            'allowed_types' => 'jpg|gif|png',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $fileName = time() .'_'. $image;

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
	            //$image_data =   $this->upload->data();
				$this->load->library('image_lib');
	            $configer =  array(
	              'image_library'   => 'gd2',
	              'source_image'    =>  "./uploads/ads_images/".$fileName,
	              'maintain_ratio'  =>  TRUE,
	              'width'           =>  250,
	              'height'          =>  250,
	            );
	            $this->image_lib->clear();
	            $this->image_lib->initialize($configer);
	            $this->image_lib->resize();
            } else {
            	$error = array('error' => $this->upload->display_errors());
            	//print_r($error);
                return false;
            }
        }

        return $images;
    }

    public function login(){
    	$email = $this->input->post('email');
    	$password = $this->input->post('password');
    	$check_user = $this->Usermodel->signin($email,$password);
    	if ($check_user) {
    		$this->session->set_userdata('userdata',$check_user);
    		die(json_encode(array('status'=>'1')));
    	}
    	else{
    		die(json_encode(array('status'=>'0')));
    	}
    }

    public function insert_message(){
        $table="messages";
        $userdata=$this->session->userdata('userdata');
        $my_id=$userdata[0]['user_id'];
        $data=array('chat_id'=>$_POST['chat_id'],
                    'from_msg'=>$my_id,
                    'to_msg'=>$_POST['to_user'],
                    'message'=>$_POST['message']);
        $result=$this->Usermodel->insert_function($table,$data);
        if ($result) {
            die(json_encode(array('status'=>'1')));
        }
        else{
            die(json_encode(array('status'=>'0')));
        }
    }

    public function fetch_chat_by_id(){
        $chat_id=$_POST['chat_id'];
        $chats=$this->Usermodel->fetch_all_chats($chat_id);
        die(json_encode($chats));
    }

    public function insert_chat(){
        $userdata=$this->session->userdata('userdata');
        $my_id=$userdata[0]['user_id'];
        $seller_id=$_POST['user_id'];
        $ads_id=$_POST['ads_id'];
        $check=$this->Usermodel->check_chat($my_id,$seller_id,$ads_id);
        if ($check) {
            $chat_id=$check[0]['chat_id'];
            die(json_encode(array('status'=>'1','msg'=>'exists','chat_id'=>$chat_id)));
        }
        else{
            $start_chat=$this->Usermodel->start_chat($my_id,$seller_id,$ads_id);
            if ($start_chat) {
                $msg="Hey , I have an enquiry about this product";
                $insert_thread=$this->Usermodel->insert_thread($start_chat,$my_id,$seller_id,$msg);
                if ($insert_thread) {
                    die(json_encode(array('status'=>'1','msg'=>'inserted','chat_id'=>$start_chat)));
                }
                else{
                    die(json_encode(array('status'=>'0')));
                }
            }
            else{
                die(json_encode(array('status'=>'0')));
            }

        }
    }
}