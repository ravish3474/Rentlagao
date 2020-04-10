<?php
class AdminModel extends CI_Model{

	public function insert_function($table,$data){ // insert into database
          if($this->db->insert($table, $data)){
          	return true;
          }
          else{
          	return false;
          }
	}

	public function update_table($table,$condition,$id){
	    $this->db->where('id', $id);
	    $this->db->update($table, $condition);
	    return true;
	}
      
	public function check_category($category_name){ //check if category exists
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('category_name',$category_name);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	    	return false;
	    }
	    else{
	    	return true;
	    }
	}

	public function check_category_with_id($category_name,$id){
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('category_name',$category_name);
		$this->db->where_not_in('id', $id);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	    	return false;
	    }
	    else{
	    	return true;
	    }
	}

	public function check_slug_with_id($table,$new_slug,$id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('category_slug',$new_slug);
		$this->db->where_not_in('id', $id);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	    	return false;
	    }
	    else{
	    	return true;
	    }
	}

	public function update_category($table,$data,$id){
	    $this->db->where('id', $id);
    	$this->db->update($table,$data);
    	return true;
	}

	public function fetch_data_by_id($id,$table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('id',$id);
	    $query = $this->db->get()->result();
	    return $query;
	}

	public function fetch_cat_by_id($table,$id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('id',$id);
	    $query = $this->db->get()->result();
	    return $query;
	}

	public function fetch_data($table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('status','1');
	    $query = $this->db->get()->result_array();
	    return $query;
	}

	public function insert_sub($table,$data){
		$sql="SELECT * FROM sub_categories WHERE sub_id='".$data['cat_id']."' AND sub_name='".$data['sub_name']."'";
		$query = $this->db->query($sql);
		if ($query->num_rows>0) {
			return false;
		}
		else{
	          if($this->db->insert($table, $data)){
	          	return true;
	          }
	          else{
	          	return false;
	          }
		}
	}

	public function check_slug($table,$new_slug){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('category_slug',$new_slug);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	    	return false;
	    }
	    else{
	    	return true;
	    }
	}

}