<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('admin_lang', 'language/english');
        $this->lang->load('common_lang', 'language/english');
        $this->load->model('user/user_model');
    }
	
	public function index() {
	    $setup = $this->common_model->getSetup();
	    
	    $data['languages'] = $this->common_model->getLanguages();
	    if(!empty($setup)) {
	        if($setup->total == 0) {
	            $this->register();
	        } else {
	            $this->load->view('home', $data);
	        }
	    }
	}
	
	public function setup() {
	    $data['languages'] = $this->common_model->getLanguages();
	    if (!empty($_POST)) {
	        $data['config_company_name'] = $this->input->post('config_company_name');
	        $data['default_language'] = $this->input->post('default_language');
	        $data['config_logo'] = $this->input->post('config_logo');
	        $data['config_icon'] = $this->input->post('config_icon');
	        $this->form_validation->set_rules('config_company_name','Company Name','trim|required|max_length[128]|xss_clean');
	        if ($this->form_validation->run() == false) {
	            //$this->index();
	        } else {
	            //print_r($_POST);
	            $this->common_model->addSetup($_POST);
	            redirect(base_url().'logout');
	        }
	    }
	    
	    $this->load->view('common/setup', $data);
	}
	
	public function register() {
	    $data['full_name'] = '';
	    $data['email'] = '';
	    $data['password'] = '';
	    $data['confirm_password'] = '';
	    $data['pageTitle'] = $this->lang->line('text_project_title').$this->lang->line('text_title_register');
	    $data['text_register'] = $this->lang->line('text_register');
	    $data['text_fullname'] = $this->lang->line('text_fullname');
	    $data['text_email'] = $this->lang->line('text_email');
	    $data['text_password'] = $this->lang->line('text_password');
	    $data['text_retype'] = $this->lang->line('text_retype');
	    $data['text_already'] = $this->lang->line('text_already');
	    $data['btn_register'] = $this->lang->line('btn_register');
	    if (!empty($_POST)) {
	        $data['full_name'] = $this->input->post('full_name');
	        $data['email'] = $this->input->post('email');
	        $data['password'] = $this->input->post('password');
	        $data['confirm_password'] = $this->input->post('confirm_password');
	        
	        $this->form_validation->set_rules('full_name','Full Name','trim|required|max_length[128]|xss_clean');
	        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	        $this->form_validation->set_rules('password', 'Password', 'required');
	        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
	        
	        if ($this->form_validation->run() == false) {
	            //$this->index();
	        } else {
	            $full_name = ucwords(strtolower($this->input->post('full_name')));
	            $email = $this->input->post('email');
	            $password = $this->input->post('password');
	            $user_group_id = 1;
	            $phone_no = $this->input->post('phone_no');
	            $user_name = $this->input->post('email');
	            
	            $userInfo = array('username'=>$user_name, 'email'=>$email, 'password'=>getHashedPassword($password), 'user_group_id	'=>$user_group_id, 'first_name'=> $full_name,
	                'created_by'=>1, 'created_date'=>date('Y-m-d H:i:s'), 'status'=>1);
	            
	            $this->load->model('user_model');
	            $result = $this->user_model->addNewUser($userInfo);
	            
	            if($result > 0) {
	                $user_name = $this->input->post('email');
	                $password = $this->input->post('password');
	                
	                $result = $this->user_model->loginMe($user_name, $password);
	                //print_r($result);exit;
	                if(count($result) > 0) {
	                    $sessionArray = array('user_id'=>$result[0]->user_id,
	                        'username'=>$result[0]->username,
	                        'name'=>$result[0]->first_name,
	                        'user_group_id'=>$result[0]->user_group_id,
	                        'user_group'=>$result[0]->user_group_name,
	                        'isLoggedIn' => TRUE,
	                        /* 'default_branch' => $result['branch_id'],
	                         'default_department' => $result['department_id'], */
	                        'default_language' => 1
	                    );
	                    //print_R($sessionArray);exit;
	                    $this->session->set_userdata($sessionArray);
	                    redirect(base_url().'general-setup');
	                }
	            } else {
	                $this->session->set_flashdata('error', 'User creation failed');
	            }
	        }
	    }
	    
	    $this->load->view('common/register', $data);
	}
	
	public function logout() {
	    $this->session->sess_destroy ();
	    
	    redirect(base_url());
	}
	
	public function coming_soon() {
	    $this->load->view('coming-soon');
	}
}
