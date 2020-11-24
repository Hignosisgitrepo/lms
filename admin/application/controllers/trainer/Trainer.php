<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/AdminController.php';

class Trainer extends AdminController {

	public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper'));
        $this->load->library('form_validation');
        $this->load->model('trainer/trainer_model');
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('trainer_lang', language_folder($this->global['default_language'])->language_directory);
    } 
    
	public function index() {
	    $this->getTrainerList();
	}
	
	public function getTrainerList() {
	    $this->global['pageTitle'] = $this->lang->line('text_title');
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
	        $data['text_list'] = $this->lang->line('text_list');
	        $data['text_enquirydetails'] = $this->lang->line('text_enquirydetails');
	        
	        $data['text_dashboard'] = $this->lang->line('text_dashboard');
	        
	        $data['text_telephone'] = $this->lang->line('text_telephone');
	        $data['text_email'] = $this->lang->line('text_email');
	        $data['text_status'] = $this->lang->line('text_status');
	        
			$data['text_fullname'] = $this->lang->line('text_fullname');
	        $data['text_first_name'] = $this->lang->line('text_first_name');
	        $data['text_last_name'] = $this->lang->line('text_last_name');
	        
	        $data['text_action'] = $this->lang->line('text_action');
	        
	        $data['text_no_data'] = $this->lang->line('text_no_data');
	        $data['text_change_status'] = $this->lang->line('text_change_status');
	        
	        $data['btn_view'] = $this->lang->line('btn_view');
	        $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
	        $data['btn_activate'] = $this->lang->line('btn_activate');
	        $data['btn_save'] = $this->lang->line('btn_save');
	        
	        $data['trainers'] = array();
	        $results = $this->trainer_model->getAllTrainers();
	        //print_r($results);exit;
	        foreach($results as $res) {
	            if($res->approve_status == 1) {
	                $status_name = 'Approved';
	            } else if($res->approve_status == 2) {
	                $status_name = 'Deactivate';
	            } else {
	                $status_name = 'New';
	            }
	            
	            $data['trainers'][] = array(
	                'customer_id' => $res->customer_id,
	                'trainer_id' => $res->trainer_id,
	                'first_name' => $res->first_name,
	                'last_name' => $res->last_name,
	                'email' => $res->email,
	                'phone' => $res->phone_number,
	                'status' => $res->status,
	                'active_status' => $res->approve_status,
	                'status_name' => $status_name,
	            );
	        }
	        
	        $this->loadViews("trainer/trainer_list", $this->global, $data, NULL , NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function activateTrainer() {
	    $data = array(
	        'trainer_id' => $this->input->post('trainer_id')
	    );
	    $this->trainer_model->activateTrainer($data, $this->global['userId']);
        $json['success'] = $this->lang->line('text_addsuccesss');
	    
	    echo json_encode($json);
	}
}
