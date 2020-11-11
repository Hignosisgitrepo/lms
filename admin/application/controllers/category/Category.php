<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/AdminController.php';

class Category extends AdminController {

	public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper'));
        $this->load->library('form_validation');
        $this->load->model('category/category_model');
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('category_lang', language_folder($this->global['default_language'])->language_directory);
    } 
    
	public function index() {
	    $this->getList();
	}
	
	public function getList() {
	    $this->global['pageTitle'] = $this->lang->line('text_title');
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
	        $data['text_list'] = $this->lang->line('text_list');
	        $data['text_add'] = $this->lang->line('text_add');
	        $data['text_edit'] = $this->lang->line('text_edit');
	        $data['text_select'] = $this->lang->line('text_select');
	        $data['text_add_user'] = $this->lang->line('text_add_user');
	        $data['text_edit_user'] = $this->lang->line('text_edit_user');
	        
	        $data['text_dashboard'] = $this->lang->line('text_dashboard');
	        $data['text_categoryname'] = $this->lang->line('text_categoryname');
	        $data['text_status'] = $this->lang->line('text_status');
	        
	        $data['text_action'] = $this->lang->line('text_action');
	        
	        $data['text_no_data'] = $this->lang->line('text_no_data');
	        $data['text_change_status'] = $this->lang->line('text_change_status');
	        
	        $data['btn_edit'] = $this->lang->line('btn_edit');
	        $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
	        $data['btn_activate'] = $this->lang->line('btn_activate');
	        $data['btn_save'] = $this->lang->line('btn_save');
	        
	        $data['categories'] = array();
	        $results = $this->category_model->getCategories();
	        foreach($results as $res) {
	            if($res->status == 1) {
	                $status_name = 'Active';
	            } else {
	                $status_name = 'Inactive';
	            }
	            
	            $data['categories'][] = array(
	                'category_id' => $res->category_id,
	                'category_name' => $res->category_name,
	                'status_name' => $status_name
	            );
	        }
	        
	        $this->loadViews("category/category_list", $this->global, $data, NULL , NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function edit($b64_cid) {
	    if (is_null($b64_cid)) {
	        redirect(base_url().'categories');
	    }
	    
	    $category_id = base64_decode(urldecode($b64_cid));
	    if (!empty($_POST)) {
	        
	    }
	    $b64_cid = urlencode(base64_encode($category_id));
	    $this->getForm($category_id);
	}

	
	public function add() {
	    $category_id = '';
	    if (!empty($_POST)) {

			$data['category_id'] = $this->input->post('category_id');
	        $data['category_name'] = $this->input->post('category_name');
	        $data['status'] = $this->input->post('status');
	        $data['description'] = $this->input->post('description');
	        $data['category_image'] = $this->input->post('category_image');
	        
	        $this->form_validation->set_rules('category_name','Category Name','trim|required|max_length[128]|xss_clean');
	        $this->form_validation->set_rules('description','Category Description','trim|required|max_length[128]|xss_clean');
	        
	        if ($this->form_validation->run() == false) {
				//$this->index();
				echo "validation failed";
	        } else {
	            if(is_uploaded_file($_FILES['category_image']['tmp_name'])) {
	                $file_name = $_FILES['category_image']['name'];
	                $fileSize = $_FILES["category_image"]["size"]/1024;
	                $fileType = $_FILES["category_image"]["type"];
	                $new_file_name= $file_name;
	                $sourcePath = $_FILES['category_image']['tmp_name'];
	                $admin_targetPath = "./assets/image/".$_FILES['category_image']['name'];
	                $config = array(
	                    'allowed_types' => "gif|jpg|png|jpeg",
	                    'overwrite' => False,
	                    'max_size' => "20240000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
	                );
	                
	                $this->load->library('Upload', $config);
	                $this->upload->initialize($config);
	                if (!$this->upload->do_upload('category_image')) {
	                    echo $this->upload->display_errors();
	                } else {
	                    $path = $this->upload->data();
	                    $file_name = $path['file_name'];
	                }
	                if(move_uploaded_file($sourcePath,$admin_targetPath)) {
	                    
	                }
				}
				if($data['category_id'] ==''){
	           		$this->category_model->addCategory($_POST, $admin_targetPath, $this->global ['userId']);
				}else{
					$this->category_model->editCategory($_POST, $admin_targetPath, $this->global ['userId']);

				}
				redirect(base_url().'categories');
			}
			
	    }
	    $this->getForm($category_id);
	}
	
	public function getForm($category_id) {
	    $this->global['pageTitle'] = $this->lang->line('text_project_title').$this->lang->line('text_pageTitle');
	    $this->global['menus'] = $this->menuCreation();
	    $data['text_add'] = $this->lang->line('text_add');
	    $data['text_title'] = $this->lang->line('text_title');
	    $data['text_form'] = $this->lang->line('text_category_form');
	    $data['text_dashboard'] = $this->lang->line('text_dashboard');
	    
	    $data['text_categoryname'] = $this->lang->line('text_categoryname');
	    $data['text_image'] = $this->lang->line('text_image');
	    $data['text_description'] = $this->lang->line('text_description');
	    $data['text_top'] = $this->lang->line('text_top');
	    $data['text_parent'] = $this->lang->line('text_parent');
	    $data['text_status'] = $this->lang->line('text_status');
	    
	    $data['btn_add'] = $this->lang->line('btn_add');
	    $data['btn_remove'] = $this->lang->line('btn_remove');
	    $data['btn_save'] = $this->lang->line('btn_save');
	    $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
	    $data['btn_activate'] = $this->lang->line('btn_activate');
	    
	    $data['category_id'] = $category_id;
	    if($category_id == '') {
	        $data['category_name'] = '';
	        $data['status'] = 1;
	        $data['description'] = '';
	        $data['image'] = '';
	        $data['parent_id'] = 0;
			$data['top'] = 0;
			
	    } else {
	        $result = $this->category_model->getCategoryData($data['category_id']);
	        $data['category_name'] = $result->category_name;
	        $data['status'] = $result->status;
	        $data['description'] = $result->description;
			$data['image'] = base_url() . $result->image;
			$data['category_id'] =  $result->category_id;
	        //$data['parent_id'] = $result->category_name;
			$data['top'] = $result->top;
		//	$this->loadViews("category/category_edit_form", $this->global, $data, NULL);
	    } 
	    
		$this->loadViews("category/category_form", $this->global, $data, NULL);
	}
}
