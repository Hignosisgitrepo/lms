<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/ClientController.php';

class Training_mapping extends ClientController {

	public function __construct() {
	    Parent::__construct();
	    $this->isLoggedIn();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper'));
        $this->load->model(array('training/training_model', 'common/common_model'));
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('training_lang', language_folder($this->global['default_language'])->language_directory);
    } 
    
    public function index() {
        $this->getList();
	}
	
	public function getList() {
	    $this->global['pageTitle'] = $this->lang->line('text_pageTitle');
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
    	    $data['text_title'] = $this->lang->line('text_pageTitle');
    	    $data['text_list'] = $this->lang->line('text_list');
    	    $data['text_dashboard'] = $this->lang->line('text_dashboard');
    	    $data['text_add'] = $this->lang->line('text_add');
    	    $data['text_edit'] = $this->lang->line('text_edit');
    	    $data['text_view'] = $this->lang->line('text_viewform');
    	    
    	    $data['entry_name'] = $this->lang->line('entry_name');
    	    $data['entry_designation'] = $this->lang->line('entry_designation');
    	    
    	    $data['text_no_data'] = $this->lang->line('text_no_data');
    	    $data['btn_add'] = $this->lang->line('btn_add');
    	    $data['btn_remove'] = $this->lang->line('btn_remove');
    	    $data['btn_save'] = $this->lang->line('btn_save');
    	    $data['text_action'] = $this->lang->line('text_action');
    	        	    
    	    $data['training_mappings'] = array();
    	    
    	    $results = $this->training_model->getTrainingMappings($this->global['client_id']);
    	    foreach($results as $result) {
    	        $traings = $this->training_model->getTrainingMappingData($result->training_map_master_id);
    	        $data['training_mappings'][] = array(
    	            'corporate_designation_id' => $result->corporate_designation_id,
    	            'designation_name' => $result->designation_name,
    	            'training_map_master_id' => $result->training_map_master_id,
    	            'designation_id' => $result->designation_id,
    	            'training_deatils' => $traings
    	        );
    	    }
    	    
    	    $this->loadViews("training/training_mapping_list", $this->global, $data, NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function add() {
	    if (!empty($_POST)) {
	        //print_r($_POST);exit;
	        $client_id  = $this->global['client_id'];
	        $data['designation_id'] = $this->input->post('designation_id');
	        if (!empty($this->input->post('map_deatil'))) {
	            $data['map_detail'] = $this->input->post('map_deatil');
	        } else {
	            $data['map_detail'] = array();
	        }
	        
	        $msg = '';
	        $counterror = 0;
	        if (empty($data['designation_id'])){
	            $msg = $this->lang->line('err_designation');
	            $counterror++;
	        }
	        if (empty($data['map_detail'])){
	            $msg = $this->lang->line('err_map');
	            $counterror++;
	        }
	        
	        $text_success = $this->lang->line('text_success');
	        
	        if($counterror == 0) {
	            $this->training_model->addMappings($data, $client_id, $this->global ['userId']);
	            $this->session->set_flashdata('success', $text_success);
	            redirect(base_url().'map-trainings');
	        } else {
	            $this->session->set_flashdata('error', $msg);
	            $this->getForm();
	        }
	    }
	    $this->getForm();
	}
	
	public function getForm() {
	    $this->global['pageTitle'] = $this->lang->line('text_pageTitle');
	    
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
    	    $data['text_title'] = $this->lang->line('text_pageTitle');
    	    $data['text_form'] = $this->lang->line('text_form');
    	    $data['text_dashboard'] = $this->lang->line('text_dashboard');
    	    $data['text_select'] = $this->lang->line('text_select');
    	    
    	    $data['entry_name'] = $this->lang->line('entry_name');
    	    $data['entry_designation'] = $this->lang->line('entry_designation');
    	    
    	    $data['btn_add'] = $this->lang->line('btn_add');
    	    $data['btn_remove'] = $this->lang->line('btn_remove');
    	    $data['btn_save'] = $this->lang->line('btn_save');
    	    $data['btn_back'] = $this->lang->line('btn_back');
    	    
    	    $client_id = $this->global['client_id'];
    	    $data['designations'] = $this->common_model->getClientDesignations($client_id);
    	    
    	    $data['trainings'] = $this->common_model->getTrainingList();
    	    
    	    $data['training_id'] = '';
    	    $data['map_details'] = array();
    	    
    	    $this->loadViews("training/training_mapping_form", $this->global, $data, NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function editMaintainance() {
	    $data = array(
	        'maintainance_detail_id' => $this->input->post('maintainance_detail_id'),
	        'maintainance_value' => $this->input->post('maintainance_value')
	    );
	    $err = 0;
	    if (empty($data['maintainance_value'])){
	        $json['err_empty'] = $this->lang->line('err_empty');
	        $err++;
	    }
	    
	    if($err == 0) {
	        $this->maintainance_model->editData($data, $this->global['userId']);
	        $json['success'] = $this->lang->line('text_editsuccess');
	    }
	    
	    echo json_encode($json);
	}
	
	public function saveMaintainance() {
	    $data = array(
	        'b64_mid' => $this->input->post('b64_mid'),
	        'maintainance_value' => $this->input->post('maintainance_value')
	    );
	    if (is_null($data['b64_mid'])) {
	        redirect(base_url().'maintainance');
	    }
	    $data['maintainance_id'] = base64_decode(urldecode($data['b64_mid']));
	    $err = 0;
	    if (empty($data['maintainance_value'])){
	        $json['err_empty'] = $this->lang->line('err_empty');
	        $json['maintainance_id'] = $data['maintainance_id'];
	        $err++;
	    }
	    
	    if($err == 0) {
	        $this->maintainance_model->saveData($data, $this->global['userId']);
	        $json['success'] = $this->lang->line('text_editsuccess');
	    }
	    
	    echo json_encode($json);
	}
}
