<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/AdminController.php';

class Commission extends AdminController {

	public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper'));
        $this->load->library('form_validation');
        $this->load->model('commission/commission_model');
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('commission_lang', language_folder($this->global['default_language'])->language_directory);
    } 
    
	
	
	public function getCommissionList($b64_cid) {
	    $this->global['pageTitle'] = $this->lang->line('text_title');
	    $this->global['menus'] = $this->menuCreation();
	   
	        $data['text_list'] = $this->lang->line('text_list');
	        $data['text_add'] = $this->lang->line('text_add');
	        $data['text_edit'] = $this->lang->line('text_edit');
	        $data['text_select'] = $this->lang->line('text_select');
	        $data['text_add_user'] = $this->lang->line('text_add_user');
	        $data['text_edit_user'] = $this->lang->line('text_edit_user');
	        
	        $data['text_dashboard'] = $this->lang->line('text_dashboard');
            $data['text_commission_name'] = $this->lang->line('text_commission_name');
            $data['text_trainer_name'] = $this->lang->line('text_trainer_name');
            $data['text_platform_commission'] = $this->lang->line('text_platform_commission');
            $data['text_commission_start_date'] = $this->lang->line('text_commission_start_date');

            
	        $data['text_status'] = $this->lang->line('text_status');
	        
	        $data['text_action'] = $this->lang->line('text_action');
	        
	        $data['text_no_data'] = $this->lang->line('text_no_data');
	        $data['text_change_status'] = $this->lang->line('text_change_status');
	        
	        $data['btn_edit'] = $this->lang->line('btn_edit');
	        $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
	        $data['btn_activate'] = $this->lang->line('btn_activate');
	        $data['btn_save'] = $this->lang->line('btn_save');
	        
            $data['commission'] = array();
            
            $customer_id = base64_decode(urldecode($b64_cid));
            $data['c_id']=base64_decode(urldecode($b64_cid));
            $results = $this->commission_model->getCommissionAll($customer_id);
           

	        foreach($results as $res) {

			
	            $data['commission'][] = array(
                    
                    'first_name' =>$res->first_name,
                    'last_name' =>$res->last_name,
                    'commission_id' => $res->commission_id,
                    'trainer_id' => $res->trainer_id,
                    'platform_commission' => $res->platform_commission,
	                'commission_start_date' => date("m-d-Y", strtotime($res->commission_start_date)),
					'status' => $res->comm_status
	               
	            );
	        }
	        
	        $this->loadViews("commission/commission_list", $this->global, $data, NULL , NULL);
	    
	}
	
	public function edit($b64_cid) {
	    if (is_null($b64_cid)) {
	        redirect(base_url().'commission');
	    }
	    $trainer_id='';
	    $commission_id = base64_decode(urldecode($b64_cid));
	    if (!empty($_POST)) {
	        
	    }
	    $b64_cid = urlencode(base64_encode($commission_id));
	    $this->getForm($commission_id,$trainer_id);
	}
	
	public function add($b64_cid) {
        
        $customer_id = base64_decode(urldecode($b64_cid));

	    $commission_id = '';
	    if (!empty($_POST)) {
            
            $data['commission_id'] = $this->input->post('commission_id');
	        $data['platform_commission'] = $this->input->post('platform_commission');
            $data['commission_start_date'] = $this->input->post('commission_start_date');
           
           
            
            if($data['commission_id'] ==''){
                $this->commission_model->addCommission($_POST,$customer_id);
                redirect(base_url().'commission/'.$b64_cid);
            }else{
                $this->commission_model->editCommission($_POST, $data['commission_id'],$customer_id );
                redirect(base_url().'commission/'.$b64_cid);

            }
	    }
	    $this->getForm($commission_id,$customer_id);
	}
	
	public function getForm($commission_id,$customer_id) {
	    $this->global['pageTitle'] = $this->lang->line('text_project_title').$this->lang->line('text_pageTitle');
	    $this->global['menus'] = $this->menuCreation();
	    $data['text_add'] = $this->lang->line('text_add');
	    $data['text_title'] = $this->lang->line('text_title');
	    $data['text_form'] = $this->lang->line('text_category_form');
	    $data['text_dashboard'] = $this->lang->line('text_dashboard');
	    
	
	    $data['text_parent'] = $this->lang->line('text_parent');
	    $data['text_status'] = $this->lang->line('text_status');
	    
	    $data['btn_add'] = $this->lang->line('btn_add');
	    $data['btn_remove'] = $this->lang->line('btn_remove');
	    $data['btn_save'] = $this->lang->line('btn_save');
	    $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
	    $data['btn_activate'] = $this->lang->line('btn_activate');
        $data['text_platform_commission'] = $this->lang->line('text_platform_commission');
        $data['text_commission_start_date'] = $this->lang->line('text_commission_start_date');


	    $data['commission_id'] = $commission_id;
	    if($commission_id == '') {
           
            $data['platform_commission'] = '';
            $data['trainer_id'] = $customer_id;
	        $data['commission_start_date'] = '';
	     
	    } else {
            $result = $this->commission_model->getCommissionData($data['commission_id']);
           
            $data['platform_commission'] = $result->platform_commission;
            $data['trainer_id'] =  $result->trainer_id;
	        $data['commission_start_date'] = $result->commission_start_date;
	       
	    } 
	    
	    $this->loadViews("commission/commission_form", $this->global, $data, NULL);
	}
}
