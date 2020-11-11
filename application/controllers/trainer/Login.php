<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->load->language('trainer_lang');
        $this->load->model('trainer/trainer_model');
    }
	
	public function login() {
	    $data['pageTitle'] = $this->lang->line('text_project_title').$this->lang->line('text_title_login');
    	$data['text_email'] = $this->lang->line('text_email');
    	$data['text_password'] = $this->lang->line('text_password');
    	$data['text_login'] = $this->lang->line('text_login');
    	$data['btn_login'] = $this->lang->line('btn_login');
    	$data['text_forgot'] = $this->lang->line('text_forgot');
    	$data['email'] = '';
    	$data['password'] = '';
    	if (!empty($_POST)) {
    	    $data['email'] = $this->input->post('email');
    	    $data['password'] = $this->input->post('password');
    	    if(!empty($data['password'])) {
    	        $pass = getHashedPassword($data['password']);
    	    } else {
    	        $pass = '';
    	    }
    	    $this->form_validation->set_rules('email', 'Email', 'required|max_length[128]|trim');
    	    $this->form_validation->set_rules('password', 'Password', 'required');
    	    
    	    if($this->form_validation->run() == FALSE) {
    	        // $this->index();
    	    } else {
    	        $email = $this->input->post('email');
    	        $password = $this->input->post('password');
    	        
    	        $result = $this->mentor_model->loginMe($email, $password);
    	        $language = setting('config_language', 'config');
    	        if(empty($language)) {
    	            $default_language = 0;
    	        } else {
    	            $default_language = $language->value;
    	        }
    	        if(count($result) > 0) {
    	            foreach ($result as $res) {
    	                $sessionArray = array('mentor_id'=>$res->mentor_id,
    	                    'name'=>$res->first_name . ' '. $res->last_name,
    	                    'isLoggedIn' => TRUE,/*
    	                    'default_branch' => $res->branch_id,
    	                    'default_department' => $res->department_id, */
    	                    'default_language' => $default_language
    	                );
    	                $this->session->set_userdata($sessionArray);
    	                
    	                redirect(base_url().'dashboard');
    	            }
    	        } else {
    	            $this->session->set_flashdata('error', 'Email or password mismatch');
    	            redirect(base_url());
    	        }
    	    }
    	}
    	$this->load->view('trainer/login', $data);
	
	}
}
