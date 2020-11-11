<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_ajax extends CI_Controller {
    public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('trainer_lang', 'language/english');
        $this->load->model('user/user_model');
        $this->load->model('trainer/trainer_model');
        $this->load->model('common/corporate_model');
        $this->load->model('common/cart_model');
    }
	
	public function login() {
	    $json = array();
	    $data = array(
	        'email' => $this->input->post('email'),
	        'password' => $this->input->post('password'),
	        'session_id'    => session_id()
	    );
	    $err = 0;
	    
	    if(empty($data['email'])) {
	        $json['err_email'] = $this->lang->line('err_email');
	        $err++;
	    } else {
	        if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,10}$/i", $data['email'])) {
	            $json['err_email'] = $this->lang->line('err_invalidmail');
	            $err++;
	        } else {
	            $check_email = $this->common_model->checkEmailExists($data['email']);
	            if($check_email->total < 0) {
	                $json['err_email'] = $this->lang->line('err_notexist');
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
	        $result = $this->user_model->loginCustomer($data['email'], $data['password']);
	        //print_r($result);exit;
	        if(count($result) > 0) {
	            $data['customer_id'] = $result[0]->customer_id;
	            $cart_items = $this->cart_model->getCartItems($data);
	            
	            $this->cart_model->updateCart($cart_items, $result[0]->customer_id);
	            
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
	            $sessionArray = array('customer_id'=>$result[0]->customer_id,
	                'name'=>$result[0]->first_name,
	                'is_trainer'=>$result[0]->is_trainer,
	                'email'=>$result[0]->email,
	                'approve_status'=>$approve_status,
	                'isLoggedIn' => TRUE,
	                /* 'default_branch' => $result['branch_id'],
	                 'default_department' => $result['department_id'], */
	                'user_image' => $user_image,
	                'default_language' => 1
	            );
	            $this->session->set_userdata($sessionArray);
	            //print_r($sessionArray);exit;
	            $json['success'] = 1;
	        } else {
	            $json['err_login'] = $this->lang->line('err_login');
	        }
	        
	    }
	    echo json_encode($json);
	}
	
	public function addRequest() {
	    $json = array();
	    $data = array(
	        'first_name' => $this->input->post('first_name'),
	        'last_name' => $this->input->post('last_name'),
	        'domain' => $this->input->post('domain'),
	        'work_mail' => $this->input->post('work_mail'),
	        'phone_number' => $this->input->post('phone_number'),
	        'company_name' => $this->input->post('company_name'),
	        'company_size' => $this->input->post('company_size'),
	        'training_need' => $this->input->post('training_need')
	    );
	    $err = 0;
	    
	    //print_r($data);
	    if(empty($data['first_name'])) {
	        $json['err_first_name'] = $this->lang->line('err_firstname');
	        $err++;
	    }
	    if(empty($data['last_name'])) {
	        $json['err_last_name'] = $this->lang->line('err_lastname');
	        $err++;
	    }
	    if(empty($data['domain'])) {
	        $json['err_domain'] = $this->lang->line('err_domain');
	        $err++;
	    } else {
	        $domain = $this->is_valid_domain_name($data['domain']);
	        $check_domain = $this->corporate_model->checkDomainExists($data['domain']);
	        if($check_domain->total < 0) {
	            $json['err_domain'] = $this->lang->line('err_dup_domain');
	            $err++;
	        }
	    }
	    
	    if(empty($data['work_mail'])) {
	        $json['err_email'] = $this->lang->line('err_email');
	        $err++;
	    } else {
	        if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,10}$/i", $data['work_mail'])) {
	            $json['err_email'] = $this->lang->line('err_invalidmail');
	            $err++;
	        } else {
	            $check_email = $this->corporate_model->checkCorporateEmailExists($data['work_mail']);
	            if($check_email->total < 0) {
	                $json['err_email'] = $this->lang->line('err_dup_email');
	                $err++;
	            }
	        }
	    }
	    if(empty($data['phone_number'])) {
	        $json['err_phone'] = $this->lang->line('err_phone');
	        $err++;
	    } else {
	        if (!preg_match('/^[0-9]{10}+$/', $data['phone_number'])) {
	            $json['err_telephone'] = $this->lang->line('err_invalidphone');
	            $err++;
	        } else {
	            $check_phone = $this->corporate_model->checkCorporateMobileExists($data['phone_number']);
	            if($check_phone->total > 0) {
	                $json['err_telephone'] = $this->lang->line('err_dup_phone');
	                $err++;
	            }
	        }
	    }
	    if(empty($data['company_name'])) {
	        $json['err_comapny'] = $this->lang->line('err_comapny');
	        $err++;
	    } else {
	        $check_company = $this->corporate_model->checkCorporateExists($data['company_name']);
	        if($check_company->total > 0) {
	            $json['err_comapny'] = $this->lang->line('err_dup_company');
	            $err++;
	        }
	    }
	    if(empty($data['company_size'])) {
	        $json['err_size'] = $this->lang->line('err_size');
	        $err++;
	    }
	    
	    if(empty($data['training_need'])) {
	        $json['err_need'] = $this->lang->line('err_need');
	        $err++;
	    }
	    
	    if($err == 0) {
	        $json['mobile_otp'] = $this->common_model->getRandomPassword();
	        $json['email_otp'] = $this->common_model->getRandomPassword();
	        $sessionArray = array(
	            'co_mobile_otp'=>$json['mobile_otp'],
	            'co_email_otp'=>$json['email_otp'],
	            'co_first_name'=>$data['first_name'],
	            'co_last_name'=>$data['last_name'],
	            'co_work_mail'=>$data['work_mail'],
	            'co_phone_number'=>$data['phone_number'],
	            'co_domain'=>$data['domain'],
	            'co_company_name'=>$data['company_name'],
	            'co_company_size'=>$data['company_size'],
	            'co_training_need'=>$data['training_need']
	        );
	        
	        $email_otp = $json['email_otp'];
	        $name = $data['first_name'] . ' ' . $data['last_name'];
	        $email_id = $data['work_mail'];
	        $subject = 'Otp';
	        $message = 'Dear ' . $name . ',<br>';
	        $message .= 'Please note down the OTP' . $email_otp . '.';
	        
	        $this->common_model->sendMail($email_id, $subject, $message);
	        
	        $this->session->set_userdata($sessionArray);
	        
	        $json['success'] = 1;
	        
	    }
	    echo json_encode($json);
	}
	
	public function checkCorporateOTP() {
	    $json = array();
	    $data = array(
	        //'mobile_otp' => $this->input->post('mobile_otp'),
	        'email_otp' => $this->input->post('email_otp')
	    );
	    $err = 0;
	    
	    /*if(empty($data['mobile_otp'])) {
	        $json['err_mobileotp'] = $this->lang->line('err_otp');
	        $err++;
	    } else {
	        if($data['mobile_otp'] != $this->session->userdata ('co_mobile_otp')) {
	            $json['err_mobileotp'] = $this->lang->line('err_otp');
	            $err++;
	        }
	    }*/
	    
	    if(empty($data['email_otp'])) {
	        $json['err_emailotp'] = $this->lang->line('err_otp');
	        $err++;
	    } else {
	        if($data['email_otp'] != $this->session->userdata ('co_email_otp')) {
	            $json['err_emailotp'] = $this->lang->line('err_otp');
	            $err++;
	        }
	    }
	    if($err == 0) {
	        $this->corporate_model->addEnquiry($this->session->userdata());
	        
	        $email_id = $this->session->userdata('co_work_mail');
	        $phone = $this->session->userdata();
	        $name = $this->session->userdata('co_first_name') . ' ' . $this->session->userdata('co_last_name');
	        
	        $subject = 'Client Admin Created';
	        $message = 'Dear ' . $name . ',<br>';
	        $message .= 'Your requst has been submited.<br>';
	        $message .= 'Our Admin will contact you soon.';
	        
	        $this->common_model->sendMail($email_id, $subject, $message);
	        $this->session->sess_destroy ();
	        $json['success'] = 1;
	        $json['msg'] = $this->lang->line('text_add_enquiry');
	    }
	    
	    echo json_encode($json);
	}
	
	function is_valid_domain_name($domain_name) {
	    return (preg_match("/^([a-zd](-*[a-zd])*)(.([a-zd](-*[a-zd])*))*$/i", $domain_name) //valid characters check
	        && preg_match("/^.{1,253}$/", $domain_name) //overall length check
	        && preg_match("/^[^.]{1,63}(.[^.]{1,63})*$/", $domain_name) ); //length of every label
	}
	
	public function createTrainer() {
	    $json = array();
	    $data = array(
	        'customer_id' => $this->input->post('customer_id')
	    );
        
	    $id = $this->trainer_model->addTrainer($data['customer_id']);
	    
	    $this->session->set_userdata('is_trainer', 1);
	    $this->session->set_userdata('trainerId', $id);
        $json['success'] = 1;
        $json['msg'] = $this->lang->line('text_add_enquiry');
	    
	    echo json_encode($json);
	}
	
	public function searchData() {
	    $keyword = $this->input->post('keyword');
	    $json = $this->common_model->getSearchData($keyword);
	    
	    echo json_encode($json);
	}
	
}
