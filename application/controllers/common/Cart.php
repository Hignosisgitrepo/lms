<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->load->model('common/cart_model');
        $this->load->model('common/search_model');
        $this->load->language('cart_lang');
    }
    
    public function index() {
        if(empty($this->session->userdata ('customer_id'))) {
            $customer_id = 0;
        } else {
            $customer_id = $this->session->userdata ('customer_id');
        }
        
        $data = array(
            'customer_id' => $customer_id,
            'session_id'  => session_id()
        );
        
        $data['total'] = $this->cart_model->getTotalInCart($data)->total;
        $results = $this->cart_model->getCartItems($data);
        
        $total_price = 0;
        $data['trainings'] = array();
        foreach($results as $result) {
            $category_data = $this->search_model->getTrainingCategoryData($result->category_id);
            $currency_data = $this->common_model->getCurrency($result->currency_id);
            $trainer_data = $this->search_model->getTrainerData($result->created_by);
            $program_level_name = $this->common_model->getMaintainanceDetail($result->program_level);
            $data['trainings'][] = array(
                'cart_id'    => $result->cart_id,
                'training_master_id'    => $result->training_master_id,
                'b64_tmid'    => urlencode(base64_encode($result->training_master_id)),
                'training_name'    => $result->training_name,
                'category_name'    => $category_data[0]->category_name,
                'price'    => $currency_data->currency_symbol . ' ' . $result->price,
                'trainer_name'    => $trainer_data[0]->first_name . ' ' . $trainer_data[0]->last_name,
                'program_level_name'    => $program_level_name->maintainance_value,
                'training_image'    => $this->config->item('default_url').'/assets/common/images/people/110/woman-5.jpg',
                'href'    => base_url() . 'training-name/' . urlencode(base64_encode($result->training_master_id))
            );
            $total_price += floatval($result->price);
            $data['total_sum'] = $currency_data->currency_symbol . ' ' . $total_price;
        }
        
        $this->load->view('common/cart', $data, NULL, NULL);
    }
	
	public function add() {
	    $json = array();
	    if(empty($this->session->userdata ('customer_id'))) {
	        $customer_id = 0;
	    } else {
	        $customer_id = $this->session->userdata ('customer_id');
	    }
	    $data = array(
	        'training_master_id' => $this->input->post('training_master_id'),
	        'customer_id' => $customer_id,
	        'qty'  => 1,
	        'session_id'  => session_id(),
	        'created_date'  => date('Y-m-d H:i:s')
	    );
	    
	    $this->cart_model->addToCart($data);
	    
	    $json['total'] = $this->cart_model->getTotalInCart($data)->total;
	    $results = $this->cart_model->getCartItems($data);
	    
	    $total_price = 0;
	    foreach($results as $result) {
	        $category_data = $this->search_model->getTrainingCategoryData($result->category_id);
	        $currency_data = $this->common_model->getCurrency($result->currency_id);
	        $trainer_data = $this->search_model->getTrainerData($result->created_by);
	        $program_level_name = $this->common_model->getMaintainanceDetail($result->program_level);
	        $json['items'][] = array(
	            'training_master_id'    => $result->training_master_id,
	            'b64_tmid'    => urlencode(base64_encode($result->training_master_id)),
	            'training_name'    => $result->training_name,
	            'category_name'    => $category_data[0]->category_name,
	            'price'    => $currency_data->currency_symbol . ' ' . $result->price,
	            'trainer_name'    => $trainer_data[0]->first_name . ' ' . $trainer_data[0]->last_name,
	            'program_level_name'    => $program_level_name->maintainance_value,
	            'training_image'    => $this->config->item('default_url').'/assets/common/images/people/110/woman-5.jpg',
	            'href'    => base_url() . 'training-name/' . urlencode(base64_encode($result->training_master_id))
	        );
	        $total_price += floatval($result->price);
	        $json['total_sum'] = $currency_data->currency_symbol . ' ' . $total_price;
	    }
	    $json['success'] = 1;
	    $json['msg'] = $this->lang->line('text_addtocart');
	    
	    echo json_encode($json);
	}
	
	public function getCartItem() {
	    $json = array();
	    $json['items'] = array();
	    if(empty($this->session->userdata ('customer_id'))) {
	        $customer_id = 0;
	    } else {
	        $customer_id = $this->session->userdata ('customer_id');
	    }
	    $data = array(
	        'customer_id' => $customer_id,
	        'session_id'  => session_id()
	    );
	    
	    $json['total'] = $this->cart_model->getTotalInCart($data)->total;
	    $results = $this->cart_model->getCartItems($data);
	    
	    $total_price = 0;
	    foreach($results as $result) {
	        $category_data = $this->search_model->getTrainingCategoryData($result->category_id);
	        $currency_data = $this->common_model->getCurrency($result->currency_id);
	        $trainer_data = $this->search_model->getTrainerData($result->created_by);
	        $program_level_name = $this->common_model->getMaintainanceDetail($result->program_level);
	        $json['items'][] = array(
	            'training_master_id'    => $result->training_master_id,
	            'b64_tmid'    => urlencode(base64_encode($result->training_master_id)),
                'training_name'    => $result->training_name,
                'category_name'    => $category_data[0]->category_name,
                'price'    => $currency_data->currency_symbol . ' ' . $result->price,
                'trainer_name'    => $trainer_data[0]->first_name . ' ' . $trainer_data[0]->last_name,
                'program_level_name'    => $program_level_name->maintainance_value,
	            'training_image'    => $this->config->item('default_url').'/assets/common/images/people/110/woman-5.jpg',
	            'href'    => base_url() . 'training-name/' . urlencode(base64_encode($result->training_master_id))
            );
	        $total_price += floatval($result->price);
	        $json['total_sum'] = $currency_data->currency_symbol . ' ' . $total_price;
	    }
	    
	    $json['success'] = 1;
	    
	    echo json_encode($json);
	}
	
	public function delete() {
	    $json = array();
	    if(empty($this->session->userdata ('customer_id'))) {
	        $customer_id = 0;
	    } else {
	        $customer_id = $this->session->userdata ('customer_id');
	    }
	    $data = array(
	        'cart_id' => $this->input->post('cart_id'),
	        'customer_id' => $customer_id
	    );
	    
	    $this->cart_model->deleteCart($data);
	    $json['success'] = 1;
	    
	    echo json_encode($json);
	}
}
