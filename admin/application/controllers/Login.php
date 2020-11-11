<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('admin_lang', 'language/english');
        $this->load->model('user/user_model');
    }
	
	public function index() {
	    $data['pageTitle'] = $this->lang->line('text_project_title').$this->lang->line('text_title_login');
	    $data['text_email'] = $this->lang->line('text_email');
	    $data['text_password'] = $this->lang->line('text_password');
	    $data['text_login'] = $this->lang->line('text_login');
	    $data['btn_login'] = $this->lang->line('btn_login');
	    $data['text_forgot'] = $this->lang->line('text_forgot');
	    $data['user_name'] = '';
	    $data['password'] = '';
		
		$data['err_username'] = $this->lang->line('err_username');
	    $data['err_password'] = $this->lang->line('err_password');
		
		$this->load->view('common/login', $data);
	}
}
