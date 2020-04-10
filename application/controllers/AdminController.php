<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends MY_Controller {

    public function __construct() {
       parent::__construct();
       $this->load->model('AdminModel');
    }
	
	public function index()
	{
		$this->load->view('admin/sidebar');
		$this->load->view('admin/dashboard');
	}

	public function edit_sub_category(){
		$table="categories";
		$data['categories']=$this->AdminModel->fetch_data($table);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_sub_category',$data);
	}

	public function add_category(){
		$this->load->view('admin/sidebar');
		$this->load->view('admin/addcategory');
	}

	public function add_sub_category(){
		$table="categories";
		$data['categories']=$this->AdminModel->fetch_data($table);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_subcategory',$data);
	}

	public function fetch_sub_category(){
		print_r($_POST);
	}

	public function add_sub_category_ajax(){
		$table="sub_categories";
		$cat_id=$_POST['category_id'];
		$sub_category_name = $_POST['sub_category_name'];
		$sub_category_slug = $_POST['sub_category_slug'];
		$new_slug=$this->slugify($sub_category_slug);
		$data=array('cat_id'=>$cat_id,
					'sub_name'=>$sub_category_name,
					'category_slug'=>$new_slug);
		$check_slug=$this->AdminModel->check_slug($table,$new_slug);
		if ($check_slug) {
			$insert=$this->AdminModel->insert_sub($table,$data);
			if ($insert) {
				
				$this->session->set_flashdata('add_category_message_success', 'Subcategory Inserted Successfully');
				redirect('AdminController/add_sub_category');
			}
			else{
				$this->session->set_flashdata('add_category_message', 'Subcategory already exists for the defined category');
				redirect('AdminController/add_sub_category');
			}
		}else{
			$this->session->set_flashdata('add_category_message', 'Slug Already Exists');
			redirect('AdminController/add_sub_category');
		}
	}

	public function edit_category(){
		$table="categories";
		$data['categories']=$this->AdminModel->fetch_data($table);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/editcategory',$data);
	}

	public function delete_category(){
		$table="categories";
		$condition=array('status'=>'2');
		$update=$this->AdminModel->update_table($table,$condition,$_POST['cat_id']);

	}

	public function update_category(){
		$timestamp = date("Y-m-d H:i:s");
		$id=$_POST['id'];
		// if($_FILES['category_image']['name']=="" || $_FILES['category_image']['name']==null){
			$table="categories";
			$category_name=$this->input->post('category_name');
			$slug=$this->input->post('category_slug');
			$new_slug=$this->slugify($slug);
			$check_category=$this->AdminModel->check_category_with_id($category_name,$id);
			if ($check_category) {
				$check_slug=$this->AdminModel->check_slug_with_id($table,$new_slug,$id);
				if ($check_slug) {
					if($_FILES['category_image']['name']=="" || $_FILES['category_image']['name']==null){
					$data=array('category_name'=>$category_name,
								'category_slug'=>$new_slug,
								'updated_at'=>$timestamp);
					}
					else{
				        $config['upload_path'] = './uploads/category_images/';  

				// directory (http://localhost/codeigniter/index.php/your directory)

				        $config['allowed_types'] = 'gif|jpg|png|jpeg';  
				//Image type  

				        $config['max_size'] = 0;    

				 // I have chosen max size no limit 
				        $new_name = time() . '-' . $_FILES["category_image"]['name']; 

				//Added time function in image name for no duplicate image 

				        $config['file_name'] = $new_name;

				//Stored the new name into $config['file_name']

				        $this->load->library('upload', $config);

				        if (!$this->upload->do_upload('category_image') && !empty($_FILES['category_image']['name'])) {
							//$this->session->set_flashdata('add_category_message', 'Something Went Wrong');
							die(json_encode(array('status'=>'1','msg'=>'OOPS! Something Went Wrong')));
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
					            $data=array('category_name'=>$category_name,
					        				'category_slug'=>$new_slug,
					        				'category_image'=>$new_name);
				        }
					}
		            $result=$this->AdminModel->update_category($table,$data,$id);
		            if ($result) {
		            	die(json_encode(array('status'=>'1','msg'=>'Updated Successfully')));
        				//$this->session->set_flashdata('add_category_message', 'Category Added Successfully');
						//redirect('AdminController/edit_category');
		            }
		            else{
		            	die(json_encode(array('status'=>'0','msg'=>'OOPS! Something Went Wrong')));
        				//$this->session->set_flashdata('add_category_message', 'Something Went Wrong');
						//redirect('AdminController/add_category');
		            }
				}
				else{
					die(json_encode(array('status'=>'0','msg'=>'Slug Already Exists')));
				}
			}
			else{
				die(json_encode(array('status'=>'0','msg'=>'Category Already Exists')));
			}
		}

	public function category_edit($id){
		$table='categories';
		$data['result'] = $this->AdminModel->fetch_data_by_id($id,$table);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/category_edit',$data);
	}

	public function add_category_ajax(){
		$table="categories";
		$category_name=$this->input->post('category_name');
		$slug=$this->input->post('category_slug');
		$new_slug=$this->slugify($slug);
		$check_category=$this->AdminModel->check_category($category_name);
		if($check_category){
			$check_slug=$this->AdminModel->check_slug($table,$new_slug);
			if ($check_slug) {
		        $config['upload_path'] = './uploads/category_images/';  

		// directory (http://localhost/codeigniter/index.php/your directory)

		        $config['allowed_types'] = 'gif|jpg|png|jpeg';  
		//Image type  

		        $config['max_size'] = 0;    

		 // I have chosen max size no limit 
		        $new_name = time() . '-' . $_FILES["category_image"]['name']; 

		//Added time function in image name for no duplicate image 

		        $config['file_name'] = $new_name;

		//Stored the new name into $config['file_name']

		        $this->load->library('upload', $config);

		        if (!$this->upload->do_upload('category_image') && !empty($_FILES['category_image']['name'])) {
					$this->session->set_flashdata('add_category_message', 'Something Went Wrong');
					redirect('AdminController/add_category');
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
			            $data=array('category_name'=>$category_name,
			        				'category_slug'=>$new_slug,
			        				'category_image'=>$new_name);
			            $result=$this->AdminModel->insert_function($table,$data);
			            if ($result) {
            				$this->session->set_flashdata('add_category_message', 'Category Added Successfully');
							redirect('AdminController/edit_category');
			            }
			            else{
            				$this->session->set_flashdata('add_category_message', 'Something Went Wrong');
							redirect('AdminController/add_category');
			            }
		        }
			}
			else{
				$this->session->set_flashdata('add_category_message', 'Slug with same name already exists');
				redirect('AdminController/add_category');
			}
		}
		else{
			$this->session->set_flashdata('add_category_message', 'Category with same name already exists');
			redirect('AdminController/add_category');
		}
	}
}