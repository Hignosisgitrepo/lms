<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/AdminController.php';

class Package extends AdminController {

	public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper'));
        $this->load->library('form_validation');
		$this->load->model('packages/package_model');
		$this->load->model('packages/package_model');
		$this->load->model('common/common_model');
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('package_lang', language_folder($this->global['default_language'])->language_directory);
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
			$data['text_pageTitle'] = $this->lang->line('text_pageTitle');
	        $data['text_dashboard'] = $this->lang->line('text_dashboard');
	        $data['text_packagename'] = $this->lang->line('text_packagename');
	        $data['text_status'] = $this->lang->line('text_status');
	        
	        $data['text_action'] = $this->lang->line('text_action');
	        
	        $data['text_no_data'] = $this->lang->line('text_no_data');
	        $data['text_change_status'] = $this->lang->line('text_change_status');
	        
	        $data['btn_edit'] = $this->lang->line('btn_edit');
	        $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
	        $data['btn_activate'] = $this->lang->line('btn_activate');
	        $data['btn_save'] = $this->lang->line('btn_save');
	        
	        $data['packages'] = array();
	        $results = $this->package_model->getPackages();
	        foreach($results as $res) {
 
	            $data['packages'][] = array(
	                'package_plan_master_id' => $res->package_plan_master_id,
	                'package_name' => $res->package_name,
	            );
	        }
	        
	        $this->loadViews("packages/package", $this->global, $data, NULL , NULL);
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
	    
	    $package_plan_master_id = base64_decode(urldecode($b64_cid));
	    if (!empty($_POST)) {
	        
	    }
	    $b64_cid = urlencode(base64_encode($package_plan_master_id));
	    $this->getForm($package_plan_master_id);
	}

	
	public function add() {
	    $package_plan_master_id = '';
	    if (!empty($_POST)) {

			$data['package_plan_master_id'] = $this->input->post('package_plan_master_id');
	        $data['package_name'] = $this->input->post('package_name');
	        $data['currency'] = $this->input->post('currency');
	        $data['price'] = $this->input->post('price');
			$data['price_frequency'] = $this->input->post('price_frequency');

	        $this->form_validation->set_rules('package_name','Package Name','trim|required|max_length[128]|xss_clean');
	        $this->form_validation->set_rules('price_frequency','Price Frequency','trim|required|max_length[128]|xss_clean');
	        
	        if ($this->form_validation->run() == false) {
				//$this->index();
				echo "validation failed";
	        } else {
	            
				if($data['package_plan_master_id'] ==''){
	           		$this->package_model->addPackage($_POST, $this->global ['userId']);
				}else{
					$this->package_model->editPackage($_POST, $this->global ['userId']);

				}
				redirect(base_url().'packages');
			}
			
	    }
	    $this->getForm($package_plan_master_id);
	}
	
	public function getForm($package_plan_master_id) {
	    $this->global['pageTitle'] = $this->lang->line('text_project_title').$this->lang->line('text_pageTitle');
	    $this->global['menus'] = $this->menuCreation();
	    $data['text_add'] = $this->lang->line('text_add');
	    $data['text_title'] = $this->lang->line('text_title');
	    $data['text_form'] = $this->lang->line('text_category_form');
	    $data['text_dashboard'] = $this->lang->line('text_dashboard');
	    
		$data['text_packagename'] = $this->lang->line('text_packagename');
		$data['text_currencies'] = $this->lang->line('text_currencies');
		$data['text_select'] = $this->lang->line('text_select');

	    $data['text_top'] = $this->lang->line('text_top');
	    $data['text_parent'] = $this->lang->line('text_parent');
	    $data['text_status'] = $this->lang->line('text_status');
		$data['text_price'] = $this->lang->line('text_price');
		$data['text_price_frequency'] = $this->lang->line('text_price_frequency');

	    $data['btn_add'] = $this->lang->line('btn_add');
	    $data['btn_remove'] = $this->lang->line('btn_remove');
	    $data['btn_save'] = $this->lang->line('btn_save');
	    $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
	    $data['btn_activate'] = $this->lang->line('btn_activate');
		$data['currencies'] = $this->common_model->getCurrencies();
		$data['package_frequency'] = $this->common_model->getMaintainanceValues('Package Frequency');

	    $data['package_plan_master_id'] = $package_plan_master_id;
	    if($package_plan_master_id == '') {
	        $data['package_name'] = '';
	        $data['currency'] = '';
	        $data['price'] = '';
	        $data['price_frequency'] = '';
		
			
	    } else {
	        $result = $this->category_model->getPackageData($data['package_plan_master_id']);
	        $data['package_name'] = $result->package_name;
	        $data['currency'] = $result->currency;
	        $data['price'] = $result->price;
			$data['price_frequency'] = $result->price_frequency;
			

			$data['package_plan_master_id'] =  $result->package_plan_master_id;
	        //$data['parent_id'] = $result->category_name;
			
		//	$this->loadViews("category/category_edit_form", $this->global, $data, NULL);
	    } 
	    
		$this->loadViews("packages/package_form", $this->global, $data, NULL);
	}
}
