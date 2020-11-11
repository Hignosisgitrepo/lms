<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->load->model('user/user_model');
    }
	
	public function index() {
	    
	    $data['countries'] = $this->common_model->getCountries();
		
		$this->load->view('login', $data);
	}
	
	public function registration() {
	    
	    $data['countries'] = $this->common_model->getCountries();
	    
	    $data['country_id'] = '231';
	    $this->load->view('registration', $data);
	}
	
	public function addCustomer() {
	    $json = array();
	    $data = array(
	        'first_name' => $this->input->post('first_name'),
	        'last_name' => $this->input->post('last_name'),
	        'email' => $this->input->post('email'),
	        'phone_code' => $this->input->post('phone_code'),
	        'telephone' => $this->input->post('telephone'),
	        'password' => $this->input->post('password')
	    );
	    
	    $data['is_trainer'] = 0;
	    $err = 0;
	    
	    if(empty($data['first_name'])) {
	        $json['err_firstname'] = $this->lang->line('err_firstname');
	        $err++;
	    }
	    
	    if(empty($data['last_name'])) {
	        $json['err_lastname'] = $this->lang->line('err_lastname');
	        $err++;
	    }
	    
	    if(empty($data['email'])) {
	        $json['err_email'] = $this->lang->line('err_email');
	        $err++;
	    } else {
	        if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,10}$/i", $data['email'])) {
	            $json['err_email'] = $this->lang->line('err_invalidmail');
	            $err++;
	        } else {
	            $check_email = $this->common_model->checkEmailExists($data['email']);
	            if($check_email->total > 0) {
	                $json['err_email'] = $this->lang->line('err_dup_email');
	                $err++;
	            }
	        }
	    }
	    
	    if(empty($data['telephone'])) {
	        $json['err_telephone'] = $this->lang->line('err_telephone');
	        $err++;
	    } else {
	        if (!preg_match('/^[0-9]{10}+$/', $data['telephone'])) {
	            $json['err_telephone'] = $this->lang->line('err_invalidphone');
	            $err++;
	        } else {
	            $check_phone = $this->common_model->checkMobileExists($data['telephone']);
	            if($check_phone->total > 0) {
	                $json['err_telephone'] = $this->lang->line('err_dup_phone');
	                $err++;
	            }
	        }
	    }
	    
	    if(empty($data['password'])) {
	        $json['err_password'] = $this->lang->line('err_password');
	        $err++;
	    } else {
	        $data['pass'] = getHashedPassword($data['password']);
	    }
	    
	    if($err == 0) {
	        $json['customer_id'] = $this->common_model->addCustomer($data);
	        
	        $result = $this->user_model->loginCustomer($data['email'], $data['password']);
	        if(count($result) > 0) {
	            if($result[0]->is_trainer == 0) {
	                $approve_status = 0;
	            } else {
	                $trainerData = $this->common_model->getTrainerData($result[0]->customer_id);
	                $approve_status = $trainerData->approve_status;
	            }
	            if(!empty($result[0]->image)) {
	                $user_image = $result[0]->image;
	            } else {
	                $user_image = base_url().'assets/customer/dist/img/user.jpg';
	            }
	            $sessionArray = array(
	                'customer_id '=>$result[0]->customer_id,
	                'name'=>$result[0]->first_name,
	                'is_trainer'=>$result[0]->is_trainer,
	                'email'=>$result[0]->email,
	                'approve_status'=>$approve_status,
	                'isLoggedIn' => TRUE,
	                'user_image' => $user_image,
	                'default_language' => 1
	            );
	            $this->session->set_userdata($sessionArray);
	            $json['success'] = 1;
	        } else {
	            $json['success'] = 2;
	            $json['err_login'] = 'Invalid Credintials!';
	        }
	        
	    }
	    echo json_encode($json);
	}
}
