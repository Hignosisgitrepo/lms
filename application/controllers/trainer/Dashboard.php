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
    }
	
	public function index() {
		
	    $data = array();
	    $this->global['menu'] = 123;
	    //print_r($this->global);exit;
	    $this->loadTrainerViews("trainer/dashboard", $this->global, $data, NULL);
	}
}