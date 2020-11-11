<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ajax extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('admin_lang', 'language/english');
        $this->lang->load('common_lang', 'language/english');
        $this->load->model('user/user_model');
    }
	
	public function corporateLogin() {
	    $json = array();
	    $data = array(
	        'user_name' => $this->input->post('user_name'),
	        'password' => $this->input->post('password')
	    );
	    $err = 0;
	    if(empty($data['user_name'])) {
	        $json['err_username'] = $this->lang->line('err_username');
	        $err++;
	    } else {
	        if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,10}$/i", $data['user_name'])) {
	            $json['err_username'] = $this->lang->line('err_username');
	            $err++;
	        } else {
	            $check_email = $this->user_model->checkUsernameExists($data['user_name']);
	            if($check_email->total < 0) {
	                $json['err_username'] = $this->lang->line('err_username');
	                $err++;
	            }
	        }
	    }
	    
	    if(empty($data['password'])) {
	        $json['err_password'] = $this->lang->line('err_password');
	        $err++;
	    }
	    
	    //print_r($json);
	    if($err == 0) {
	        $result = $this->user_model->loginMe($data['user_name'], $data['password']);
	        //print_r($result);exit;
	        $language = setting('config_language', 'config');
	            if(empty($language)) {
	                $default_language = 0;
	            } else {
	                $default_language = $language->value;
	            }
	            if(count($result) > 0) {
	                foreach ($result as $res) {
	                    $sessionArray = array(
	                        'user_id'=>$res->client_user_id,
	                        'client_id'=>$res->client_id,
	                        'username'=>$res->username,
	                        'name'=>$res->first_name . ' '. $res->last_name,
	                        'user_group_id'=>$res->client_user_group_id,
	                        'user_group'=>$res->user_group_name,
	                        'isLoggedIn' => TRUE,/* 
	                        'default_branch' => $res->branch_id,
	                        'default_department' => $res->department_id, */
	                        'default_language' => $default_language
	                    );
	                    $this->session->set_userdata($sessionArray);
	                }
					$json['success'] = 1;
	        } else {
	            $json['msg'] = $this->lang->line('err_login');
	        }
	        
	    }
	    echo json_encode($json);
	}
}
