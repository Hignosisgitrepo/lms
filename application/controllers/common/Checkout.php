<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->load->model('common/cart_model');
        $this->load->model('common/search_model');
        $this->load->language('cart_lang');
    }
    
    public function index() {
        $data = array();
        if(empty($this->session->userdata ('customer_id'))) {
            $this->load->view('common/checkout-login', $data, NULL, NULL);
        } else {
            redirect(base_url().'paypal-order-summary');
        }
    }
}
