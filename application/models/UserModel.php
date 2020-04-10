<?php
class UserModel extends CI_Model{

	public function check_user($email){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_email',$email);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	    	return false;
	    }
	    else{
	    	return true;
	    }
	}

	public function password_changer($my_id,$old_pass,$new_pass){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$my_id);
		$this->db->where('user_password',$old_pass);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
		    $this->db->where('user_id',$my_id);
		    $this->db->update('users',array('user_password'=>$new_pass));
		    return true;
	    }
	    else{
	    	return false;
	    }
	}

	public function fetch_chat_users($my_id){
		$sql="SELECT * FROM chat_head WHERE user_id='$my_id' OR seller_id='$my_id'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function fetch_all_chats($chat_id){
		$this->db->select('*');
		$this->db->from('messages');
		$this->db->where('chat_id',$chat_id);
		 $query = $this->db->get();
		$result=$query->result_array();
		return $result;
	}

	public function check_chat($my_id,$seller_id,$ads_id){
		$this->db->select('*');
		$this->db->from('chat_head');
		$this->db->where('user_id',$my_id);
		$this->db->where('seller_id',$seller_id);
		$this->db->where('product_id',$ads_id);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
			$result=$query->result_array();
    		return $result;
	    }
	    else{
	    	return false;
	    }
	}

	public function fetchmyads($user_id){
		$this->db->select('*');
		$this->db->from('active_ads');
		$this->db->where("user_id",$user_id);
	    $query = $this->db->get();
		$result=$query->result_array();
    	return $result;
	}

	public function fetch_all_products($random,$slug){
		$sql="SELECT * FROM `active_ads` JOIN sub_categories ON sub_categories.sub_id=active_ads.sub_id JOIN categories ON sub_categories.cat_id=categories.id WHERE active_ads.city='$random' AND categories.category_slug='$slug'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function fetch_all_products_sub($random,$slug){
		$sql="SELECT * FROM `active_ads` JOIN sub_categories ON sub_categories.sub_id=active_ads.sub_id JOIN categories ON sub_categories.cat_id=categories.id WHERE active_ads.city='$random' AND sub_categories.category_slug='$slug'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function fetch_products($name,$location){
		$this->db->select('*');
		$this->db->from('active_ads');
		$this->db->where("product_name LIKE '%$name%'");
		$this->db->where('city',$location);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
    		$result=$query->result_array();
	    	return $result;
	    }
	    else{
	    	return false;
	    }
	}

	public function fetch_city_rand(){
		$sql="SELECT city from active_ads ORDER BY rand() limit 1";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function fetch_cities($name){
		$sql = "SELECT DISTINCT city FROM active_ads WHERE city LIKE '$name%'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function fetch_ad($id){
		$this->db->select('*');
		$this->db->from('active_ads');
		$this->db->join('users','users.user_id=active_ads.user_id');
		$this->db->where('ads_id',$id);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	    	$result=$query->result_array();
	    	return $result;
	    }
	    else{
	    	return false;
	    }
	}

	public function fetch_ads($random){
		$this->db->select('*');
		$this->db->from('active_ads');
		$this->db->where('status_active','1');
		$this->db->where('city',$random);
	    $query = $this->db->get()->result_array();
	    return $query;
	}

	public function fetch_sub_slug($id){
		$this->db->select('*');
		$this->db->from('sub_categories');
		$this->db->join('categories','sub_categories.cat_id=categories.id');
		$this->db->where('sub_categories.category_slug',$id);
		$query = $this->db->get();
		if ( $query->num_rows() > 0 )
	    {
	    	$result=$query->result_array();
	    	return $result;
	    }
	    else{
	    	return false;
	    }
	}

	public function update_picture($table,$data,$my_id){
	    $this->db->where('user_id', $my_id);
	    $this->db->update($table,$data);
	    return true;
	}

	public function update_profile($data,$id){
	    $this->db->where('user_id', $id);
	    $this->db->update("users",$data);
	    return true;
	}

	public function check_profile($data,$my_id){
		$email=$data['user_email'];
		$phone=$data['user_mobile'];
		$sql="SELECT * FROM `users` WHERE (user_mobile='$phone' OR user_email='$email') AND user_id<>'$my_id'";
		$query = $this->db->query($sql);
		if ( $query->num_rows() > 0 )
	    {
	    	return false;
	    }
	    else{
	    	return true;
	    }
	}

	public function fetch_states($val){
		$this->db->select('*');
		$this->db->from('states');
		$this->db->where('country_id',$val);
		$query=$this->db->get();
		$result=$query->result_array();
		return $result;
	}

	public function fetch_city($val){
		$this->db->select('*');
		$this->db->from('cities');
		$this->db->where('state_id',$val);
		$query=$this->db->get();
		$result=$query->result_array();
		return $result;
	}

	public function fetch_countries(){
		$this->db->select('*');
		$this->db->from('countries');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function delete_ad($ads_id){
	   $this->db->where('ads_id', $ads_id);
   		if($this->db->delete('active_ads')){
		   $this->db->where('product_id', $ads_id);
   			$this->db->delete('chat_head'); 
   		} 
   		return true;
	}

	public function fetch_user($my_id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$my_id);
		$query=$this->db->get();
		$result=$query->result_array();
		return $result;
	}

	public function fetch_ad_by_user($id){
		$this->db->select('*');
		$this->db->from('active_ads');
		$this->db->where('user_id',$id);
		$this->db->where('status_active','1');
		$query=$this->db->get();
		$result=$query->result_array();
		return $result;
	}

	public function insert_function($table,$data){ // insert into database
          if($this->db->insert($table, $data)){
          	return true;
          }
          else{
          	return false;
          }
	}

	public function insert_thread($start_chat,$my_id,$seller_id,$msg){
		$table="messages";
		$data=array('chat_id'=>$start_chat,
					'from_msg'=>$my_id,
					'to_msg'=>$seller_id,
					'message'=>$msg);
      	if($this->db->insert($table, $data)){
	      	return true;
	      }
	      else{
	      	return false;
	      }
	}

	public function start_chat($my_id,$seller_id,$ads_id){
		$table="chat_head";
		$data=array('user_id'=>$my_id,
					'seller_id'=>$seller_id,
					'product_id'=>$ads_id);
      	if($this->db->insert($table, $data)){
          	$insert_id = $this->db->insert_id();
   			return  $insert_id;
        }
	    else{
	      	return false;
	    }
	}

	public function signin($email,$password){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_email',$email);
		$this->db->where('user_password', $password);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	    	$result=$query->result_array();
	    	return $result;
	    }
	    else{
	    	return false;
	    }
	}

}