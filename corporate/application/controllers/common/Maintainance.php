<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/ClientController.php';

class Maintainance extends ClientController {

	public function __construct() {
	    Parent::__construct();
	    $this->isLoggedIn();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper'));
        $this->load->model(array('common/maintainance_model', 'common/common_model'));
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('maintainance_lang', language_folder($this->global['default_language'])->language_directory);
    } 
    
    public function index() {
        $this->getList();
	}
	
	public function getList() {
	    $this->global['pageTitle'] = $this->lang->line('text_pageTitle');
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
	        $client_id = $this->global['client_id'];
    	    $data['text_title'] = $this->lang->line('text_pageTitle');
    	    $data['text_list'] = $this->lang->line('text_list');
    	    $data['text_dashboard'] = $this->lang->line('text_dashboard');
    	    $data['text_add'] = $this->lang->line('text_add');
    	    $data['text_edit'] = $this->lang->line('text_edit');
    	    $data['text_view'] = $this->lang->line('text_viewform');
    	    $data['text_no_data'] = $this->lang->line('text_no_data');
    	    
    	    $data['entry_name'] = $this->lang->line('entry_name');
    	    $data['entry_created_by'] = $this->lang->line('entry_created_by');
    	    $data['entry_created_date'] = $this->lang->line('entry_created_date');
    	    $data['entry_value'] = $this->lang->line('entry_value');
    	    
    	    $data['btn_add'] = $this->lang->line('btn_add');
    	    $data['btn_remove'] = $this->lang->line('btn_remove');
    	    $data['btn_save'] = $this->lang->line('btn_save');
    	    $data['text_action'] = $this->lang->line('text_action');
    	    
    	    $data['maintainances'] = $this->maintainance_model->getMaintainances($client_id);
    	    
    	    $this->loadViews("common/maintainance_list", $this->global, $data, NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function add() {
	    $maintainance_id = '';
	    if (!empty($_POST)) {
	        $data['maintainance_name'] = $this->input->post('maintainance_name');
	        
	        $this->form_validation->set_rules('maintainance_name','Maintainance Name','trim|required|max_length[128]|xss_clean');
	        
	        if ($this->form_validation->run() == false) {
	            //$this->index();
	        } else {
	            $result = $this->maintainance_model->addMaintainance($_POST, $this->global ['userId'], $this->global ['client_id']);
	            if(count($result) > 0) {
	                redirect(base_url().'maintainance');
	            }
	        }
	    } 
	    $b64_mid = urlencode(base64_encode($maintainance_id));
	    $this->getForm($b64_mid);
	}
	
	public function edit($b64_mid) {
	    if (is_null($b64_mid)) {
	        redirect(base_url().'maintainance');
	    }
	    
	    $maintainance_id = base64_decode(urldecode($b64_mid));
	    if (!empty($_POST)) {
	        $data['maintainance_name'] = $this->input->post('maintainance_name');
	        
	        $this->form_validation->set_rules('maintainance_name','Maintainance Name','trim|required|max_length[128]|xss_clean');
	        
	        if ($this->form_validation->run() == false) {
	            //$this->index();
	        } else {
	            $result = $this->maintainance_model->editMaintainance($_POST, $maintainance_id, $this->global ['userId']);
	            if(count($result) > 0) {
	                redirect(base_url().'maintainance');
	            }
	        }
	    }
	    $b64_mid = urlencode(base64_encode($maintainance_id));
	    $this->getForm($b64_mid);
	}
	
	public function view($b64_mid = NULL) {
	    $this->global['pageTitle'] = $this->lang->line('text_pageTitle');
	    
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
	        if (is_null($b64_mid)) {
	            redirect(base_url().'maintainance');
	        }
	        
	        $maintainance_id = base64_decode(urldecode($b64_mid));
    	    $data['text_title'] = $this->lang->line('text_pageTitle');
    	    $data['text_form'] = $this->lang->line('text_viewform');
    	    $data['text_dashboard'] = $this->lang->line('text_dashboard');
    	    $data['text_edit'] = $this->lang->line('text_edit');	    
    	    $data['text_add'] = $this->lang->line('text_add');
    	    
    	    $data['entry_name'] = $this->lang->line('entry_name');
    	    $data['entry_value'] = $this->lang->line('entry_value');
    	    
    	    $data['btn_add'] = $this->lang->line('btn_add');
    	    $data['btn_remove'] = $this->lang->line('btn_remove');
    	    $data['btn_save'] = $this->lang->line('btn_save');
    	    $data['btn_back'] = $this->lang->line('btn_back');
    	    
    	    $data['maintainance_id'] = $maintainance_id;
    	    if($maintainance_id == '') {
    	        $data['maintainance_name'] = '';
    	        $data['details'] = array();
    	    } else {
    	        $maintainance = $this->maintainance_model->getMaintainance($data['maintainance_id']);
    	        $data['maintainance_name'] = $maintainance->maintainance_name;
    	        $data['details'] = $this->maintainance_model->getMaintainanceDetail($data['maintainance_id']);
    	    }
    	    
    	    $this->loadViews("common/view_maintainance", $this->global, $data, NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function getForm($b64_mid = NULL) {
	    $this->global['pageTitle'] = $this->lang->line('text_pageTitle');
	    
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
	        if (is_null($b64_mid)) {
	            redirect(base_url().'maintainance');
	        }
	        
	        $maintainance_id = base64_decode(urldecode($b64_mid));
    	    $data['text_title'] = $this->lang->line('text_pageTitle');
    	    $data['text_form'] = $this->lang->line('text_form');
    	    $data['text_dashboard'] = $this->lang->line('text_dashboard');
    	    
    	    $data['entry_name'] = $this->lang->line('entry_name');
    	    $data['entry_value'] = $this->lang->line('entry_value');
    	    
    	    $data['btn_add'] = $this->lang->line('btn_add');
    	    $data['btn_remove'] = $this->lang->line('btn_remove');
    	    $data['btn_save'] = $this->lang->line('btn_save');
    	    $data['btn_back'] = $this->lang->line('btn_back');
    	    
    	    $data['maintainance_id'] = $maintainance_id;
    	    if($maintainance_id == '') {
    	        $data['maintainance_name'] = '';
    	        $data['details'] = array();
    	    } else {
    	        $maintainance = $this->maintainance_model->getMaintainance($data['maintainance_id']);
    	        $data['maintainance_name'] = $maintainance->maintainance_name;
    	        $data['details'] = $this->maintainance_model->getMaintainanceDetail($data['maintainance_id']);
    	    }
    	    
    	    $this->loadViews("common/maintainance_form", $this->global, $data, NULL);
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
