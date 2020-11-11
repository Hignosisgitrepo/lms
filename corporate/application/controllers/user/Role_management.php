<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/ClientController.php';

class Role_management extends ClientController {

	public function __construct() {
	    Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('user/user_model', 'general/common_model'));
        $this->lang->load('permission_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
    } 
    
    public function index() {
        $this->getList();
    }
    
    public function getList() {
        $this->global['pageTitle'] = $this->lang->line('text_title');
        $this->global['menus'] = $this->menuCreation();
        if ($this->hasPermission('access', $this->uri->segment('1'))) {
            $this->global['pageTitle'] = $this->lang->line('text_title');
            $data['text_header'] = $this->lang->line('text_title');
            $data['text_list'] = $this->lang->line('text_list');
            $data['text_dashboard'] = $this->lang->line('text_dashboard');
            $data['text_edit'] = $this->lang->line('text_edit');
            
            $data['entry_role'] = $this->lang->line('entry_role');
            $data['entry_created_by'] = $this->lang->line('entry_created_by');
            $data['text_action'] = $this->lang->line('text_action');
            
            $data['text_no_data'] = $this->lang->line('text_no_data');
            
            $data['btn_add'] = $this->lang->line('btn_add');
            $data['btn_edit'] = $this->lang->line('btn_edit');
            $data['user_groups'] = array();
            $results = $this->user_model->getUserRoles($this->global['client_id']);
            foreach($results as $result) {
                $data['user_groups'][] = array(
                    'user_group_id' => $result->client_user_group_id,
                    'user_group_name' => $result->user_group_name
                );
            }
            $this->loadViews("user/roles_list", $this->global, $data, NULL , NULL);
        } else {
            $this->global['text_back'] = $this->lang->line('text_back');
            $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
            $this->load->view("error", $this->global, NULL , NULL);
        } 
    }
    
    public function add() {
        $user_group_id = '';
        if (!empty($_POST)) {
            $text_success = $this->lang->line('text_addsuccesss');
            if (!empty($this->input->post('user_group_name'))) {
                $data['user_group_name'] = $this->input->post('user_group_name');
            } else {
                $data['user_group_name'] = '';
            }
            
            if (!empty($this->input->post('permission'))) {
                $data['permission'] = $this->input->post('permission');
            } else {
                $data['permission'] = '';
            }
            $msg = '';
            if (empty($data['user_group_name'])){
                $msg = $this->lang->line('err_msg');
            } else {
                $rolename= $this->user_model->getTotalRole($data['user_group_name']);
                //print_r($postname->total);
                if (($rolename->total) >= 1){
                    $msg = $this->lang->line('err_duplicate');
                }
            }
            if($msg == '') {
                $this->user_model->addRoles($_POST, $this->global ['userId'], $this->global['client_id']);
                $this->session->set_flashdata('success', $text_success);
                redirect(base_url().'roles');
            } else {
                $this->session->set_flashdata('error', $msg);
            }
        }
        $b64_ugid = urlencode(base64_encode($user_group_id));
        $this->getForm($b64_ugid);
    }
    
    public function edit($b64_ugid = NULL) {
        if (is_null($b64_ugid)) {
            redirect(base_url().'roles');
        }
        
        $user_group_id = base64_decode(urldecode($b64_ugid));
        
        if (!empty($_POST)) {
            $text_success = $this->lang->line('text_editsuccesss');
            if (!empty($this->input->post('user_group_name'))) {
                $data['user_group_name'] = $this->input->post('user_group_name');
            } else {
                $data['user_group_name'] = '';
            }
            
            if (!empty($this->input->post('permission'))) {
                $data['permission'] = $this->input->post('permission');
            } else {
                $data['permission'] = '';
            }
            $msg = '';
            if (empty($data['user_group_name'])){
                $msg = $this->lang->line('err_msg');
            } else {
                $roledata= $this->user_model->getUserGroup($user_group_id, $this->global['client_id']);
                $rolename= $this->user_model->getTotalRole($data['user_group_name'], $this->global['client_id']);
                //print_r($postname->total);
                if (($roledata->user_group_name != $data['user_group_name']) && (($rolename->total) >= 1)){
                    $msg = $this->lang->line('err_duplicate');
                }
            }
            if($msg == '') {
                $this->user_model->editRoles($_POST, $user_group_id, $this->global ['userId'], $this->global['client_id']);
                $this->session->set_flashdata('success', $text_success);
                redirect(base_url().'roles');
            } else {
                $this->session->set_flashdata('error', $msg);
            }
        }
        $b64_ugid = urlencode(base64_encode($user_group_id));
        $this->getForm($b64_ugid);
    }
    
    public function getForm($b64_ugid = NULL) {
        $this->global['pageTitle'] = $this->lang->line('text_title');
        $this->global['menus'] = $this->menuCreation();
        if ($this->hasPermission('access', $this->uri->segment('1'))) {
            
            if (is_null($b64_ugid)) {
                redirect(base_url().'roles');
            }
            
            $user_group_id = base64_decode(urldecode($b64_ugid));
    	    $data['text_list'] = $this->lang->line('text_list');
    	    $data['text_add'] = $this->lang->line('text_add');
    	    $data['text_dashboard'] = $this->lang->line('text_dashboard');
    	    
    	    $data['entry_role'] = $this->lang->line('entry_role');
    	    $data['entry_module'] = $this->lang->line('entry_module');
    	    $data['text_edit'] = $this->lang->line('text_edit');
    	    $data['text_form'] = $this->lang->line('text_form');
    	    $data['btn_add'] = $this->lang->line('btn_add');
    	    $data['btn_remove'] = $this->lang->line('btn_remove');
    	    $data['btn_save'] = $this->lang->line('btn_save');
    	    $data['btn_back'] = $this->lang->line('btn_back');
    	    
    	    $data['permissions'] = array();
    	    $results = $this->router->routes;
    	    
    	    $ignore = array(
    	        'login',
    	        'logout',
    	        'forgot_password',
    	        '404_override',
    	        'dashboard',
    	        'profile'
    	    );
    	    
    	    foreach($results as $key=>$value) {
    	        if (!in_array($key, $ignore)) {
    	           $data['permissions'][] = $key;
    	        }
    	    }
    	    
    	    if($user_group_id == '') {
    	        $data['user_group_name'] = '';
    	        $data['access'] = array();
    	    } else {
    	        $user_group = $this->user_model->getUserGroup($user_group_id, $this->global['client_id']);
    	        $data['user_group_name'] = $user_group->user_group_name;
    	        $data['access'] = $user_group->permission;
    	    }
    	    
    	    $data['user_group_id'] = $user_group_id;
    	    $this->loadViews("user/roles_form", $this->global, $data, NULL , NULL);
        } else {
            $this->global['text_back'] = $this->lang->line('text_back');
            $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
            $this->load->view("error", $this->global, NULL , NULL);
        }
    }
}