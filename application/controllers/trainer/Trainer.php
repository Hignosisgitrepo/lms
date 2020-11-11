<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trainer extends CI_Controller {
    public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('trainer_lang', 'language/english');
        $this->load->model('common/common_model');
        $this->load->model('trainer/trainer_model');
    }
    
    public function myDashboard() {
        
        $this->load->view('trainer/dashboard');
    }
    
	public function index() {
		$data['text_firstname'] = $this->lang->line('text_firstname');
	    $data['text_lastname'] = $this->lang->line('text_lastname');
	    $data['text_email'] = $this->lang->line('text_email');
	    $data['text_phone'] = $this->lang->line('text_phone');
	    $data['text_password'] = $this->lang->line('text_password');
	    $data['btn_register'] = $this->lang->line('btn_register');
	    $data['text_retype'] = $this->lang->line('text_retype');
	    $data['text_already'] = $this->lang->line('text_already');
	    $data['countries'] = $this->common_model->getCountries();
	    $data['country_id'] = '231';
        
	    $this->load->view('common/trainer', $data, null, null);
	}
	
	public function login() {
	    $data['pageTitle'] = $this->lang->line('text_project_title').$this->lang->line('text_title_login');
	    $data['text_email'] = $this->lang->line('text_email');
	    $data['text_password'] = $this->lang->line('text_password');
	    $data['btn_login'] = $this->lang->line('btn_login');
	    $data['email'] = '';
	    $data['password'] = '';
	    
	    $this->load->view('trainer/login', $data);
	    
	}
}
