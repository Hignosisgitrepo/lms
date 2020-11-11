<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/ClientController.php';

class Designation extends ClientController {

	public function __construct() {
	    Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('designation/designation_model', 'common/common_model'));
        $this->lang->load('designation_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
    } 
    
    public function index() {
        $this->getList();
    }
    
    public function getList() {
        $this->global['pageTitle'] = $this->lang->line('text_pageTitle');
        $this->global['menus'] = $this->menuCreation();
        if ($this->hasPermission('access', $this->uri->segment('1'))) {
            $this->global['pageTitle'] = $this->lang->line('text_pageTitle');
            $data['text_list'] = $this->lang->line('text_list');
            $data['text_add'] = $this->lang->line('text_add');
            $data['text_dashboard'] = $this->lang->line('text_dashboard');
            $data['text_edit'] = $this->lang->line('text_edit');
            
            $data['entry_name'] = $this->lang->line('entry_name');
            $data['text_action'] = $this->lang->line('text_action');
            $data['text_change_status'] = $this->lang->line('text_change_status');
            
            $data['text_no_data'] = $this->lang->line('text_no_data');
            
            $data['btn_add'] = $this->lang->line('btn_add');
            $data['btn_edit'] = $this->lang->line('btn_edit'); 
            
            $data['desinations'] = array();
            $results = $this->designation_model->getDesignations($this->global['client_id']);   
            
            foreach($results as $result) {
                $data['desinations'][] = array(
                    'corporate_designation_id' => $result->corporate_designation_id,
                    'designation_name' => $result->designation_name
                );
            }
            
            $this->loadViews("designation/designation_list", $this->global, $data, NULL , NULL);
        } else {
            $this->global['text_back'] = $this->lang->line('text_back');
            $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
            $this->load->view("error", $this->global, NULL , NULL);
        } 
    }
    
    public function addDesignation() {
        $json = array();
        $data = array(
            'designation_name' => $this->input->post('designation_name')
        );
        $err = 0;
        
        if(empty($data['designation_name'])) {
            $json['err_designation'] = $this->lang->line('err_empty');
            $err++;
        } else {
            $checkDesignation = $this->designation_model->getTotalDesignation($data['designation_name'], $this->global['client_id']);
            if($checkDesignation->total > 0) {
                $json['err_designation'] = $this->lang->line('err_dulicate');
                $err++;
            }
        }
        
        if($err == 0) {
            $this->designation_model->addDesignation($data['designation_name'], $this->global['client_id'], $this->global['userId']);
            $json['succces'] = 1;
            $json['msg'] = $this->lang->line('text_success');
        }
        
        echo json_encode($json);
    }
    
    public function editDesignation() {
        $json = array();
        $data = array(
            'corporate_designation_id' => $this->input->post('corporate_designation_id'),
            'designation_name' => $this->input->post('designation_name')
        );
        $err = 0;
        
        if(empty($data['designation_name'])) {
            $json['err_designation'] = $this->lang->line('err_empty');
            $err++;
        } else {
            $checkDesignation = $this->designation_model->getTotalDesignation($data['designation_name'], $this->global['client_id']);
            $checkDesignationData = $this->designation_model->getDesignationData($data['corporate_designation_id']);
            if(($checkDesignation->total > 0) && ($checkDesignationData->designation_name != $data['designation_name'])) {
                $json['err_designation'] = $this->lang->line('err_dulicate');
                $err++;
            }
        }
        if($err == 0) {
            $this->designation_model->editDesignation($data, $this->global['client_id'], $this->global['userId']);
            $json['succces'] = 1;
            $json['msg'] = $this->lang->line('text_editsuccess');
        }
        
        echo json_encode($json);
    }
}