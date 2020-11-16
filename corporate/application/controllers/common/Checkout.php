<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/ClientController.php';

class Checkout extends ClientController {

	public function __construct() {
        Parent::__construct();
		
	    $this->isLoggedIn();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->load->model('common/cart_model');
        $this->load->model('common/search_model');
        $this->load->language('cart_lang');
    }
    
    public function index() {
        $data = array();
		
		$this->global['menus'] = $this->menuCreation();
        if(empty($this->global['userId'])) {
            base_url();
        } else {
			$this->loadViews('common/checkout', $this->global, $data, NULL);
        }
    }
}
