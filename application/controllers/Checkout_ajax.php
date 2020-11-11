<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_ajax extends CI_Controller {
    public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library(array('form_validation'));
        $this->lang->load('common_lang', 'language/english');
        $this->load->model('user/user_model');
        $this->load->model('common/cart_model');
    }
	
	public function login() {
	    $json = array();
	    $data = array(
	        'email' => $this->input->post('email'),
	        'password' => $this->input->post('password')
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
	            if($result[0]->is_trainer == 0) {
	                $approve_status = 0;
	            } else {
	                $trainerData = $this->common_model->getTrainerData($result[0]->customer_id);
	                $approve_status = $trainerData->approve_status;
	            }
				
	            $cart_items = $this->cart_model->getCartItems(session_id());
	            $this->cart_model->updateCart($cart_items, $result[0]->customer_id);
				
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
	
	function paypal(){
	    $this->load->view('paypal/intro');
	}
	
}
