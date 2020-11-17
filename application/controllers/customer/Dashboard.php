<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/UserController.php';

class Dashboard extends UserController {

	public function __construct() {
	    Parent::__construct();
	    $this->load->library('session');
	    $this->isLoggedIn();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->load->model('common/common_model');
    }
	
	public function index() {
		
	    $data = array();
	    $this->global['xyz'] = "123";
	    // $customer_data = $this->common_model->getCustomerData($this->global['customerId']);

	    // print_r($data);exit;
	    $this->loadViews("customer/dashboard", $this->global, $data, NULL);
	}
}
