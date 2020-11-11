<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/UserController.php';

class Trainer_ajax extends UserController {
    public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('trainer_lang', 'language/english');
        $this->load->model('common/common_model');
        $this->load->model('trainer/trainer_model');
    }
	
	public function addUser() {
	    $json = array();
	    $data = array(
	        'first_name' => $this->input->post('first_name'),
	        'last_name' => $this->input->post('last_name'),
	        'email' => $this->input->post('email'),
	        'phone_code' => $this->input->post('phone_code'),
	        'telephone' => $this->input->post('telephone'),
	        'password' => $this->input->post('password')
	    );
	    
	    $data['is_trainer'] = 1;
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
	        $json['mobile_otp'] = $this->common_model->getRandomPassword();
	        $json['email_otp'] = $this->common_model->getRandomPassword();
	        
	        $sessionArray = array(
	            'mobile_otp'=>$json['mobile_otp'],
	            'email_otp'=>$json['email_otp'],
	            'first_name'=>$data['first_name'],
	            'last_name'=>$data['last_name'],
	            'phone_code'=>$data['phone_code'],
	            'telephone'=>$data['telephone'],
	            'email'=>$data['email'],
	            'pass'=>$data['pass'],
	            'is_trainer'=>$data['is_trainer']
	        );
	        $this->session->set_userdata($sessionArray);
	        $email_otp = $json['email_otp'];
	        $name = $data['first_name'] . ' ' . $data['last_name'];
	        $email_id = $data['email'];
	        $subject = 'Otp';
	        $message = 'Dear ' . $name . ',<br>';
	        $message .= 'Please note down the OTP' . $email_otp . '.';
	        
	        $this->common_model->sendMail($email_id, $subject, $message);
	        
	        $json['success'] = 1;
	        
	    }
	    echo json_encode($json);
	}
	
	public function checkOTP() {
	    $json = array();
	    $data = array(
	        //'mobile_otp' => $this->input->post('mobile_otp'),
	        'email_otp' => $this->input->post('email_otp')
	    );
	    $err = 0;
	    
	    /* if(empty($data['mobile_otp'])) {
	        $json['err_mobileotp'] = $this->lang->line('err_mobileotp');
	        $err++;
	    } else {
	        if($data['mobile_otp'] != $this->session->userdata ('mobile_otp')) {
	            $json['err_mobileotp'] = $this->lang->line('err_invlidotp');
	            $err++;
	        }
	    } */
	    
	    if(empty($data['email_otp'])) {
	        $json['err_emailotp'] = $this->lang->line('err_emailotp');
	        $err++;
	    } else {
	        if($data['email_otp'] != $this->session->userdata ('email_otp')) {
	            $json['err_emailotp'] = $this->lang->line('err_invlidotp');
	            $err++;
	        }
	    }
	    
	    if($err == 0) {
	        $json['customer_id'] = $this->common_model->addCustomer($this->session->userdata);
	        
	        $email_id = $this->session->userdata('email');
	        $phone = $this->session->userdata();
	        $name = $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name');
	        
	        $subject = 'Successfull';
	        $message = 'Dear ' . $name . ',<br>';
	        $message .= 'Your request has been submited.<br>';
	        $message .= 'Our Admin will activate your account soon.';
	        
	        $this->common_model->sendMail($email_id, $subject, $message);
	        
	        $this->trainer_model->addTrainer($json['customer_id']);
	        $this->session->sess_destroy ();
	        $json['msg'] = $this->lang->line('text_add_trainer');
	        $json['success'] = 1;
	        
	    }
	    echo json_encode($json);
	}
}
