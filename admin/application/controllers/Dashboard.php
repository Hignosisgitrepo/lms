<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/AdminController.php';

class Dashboard extends AdminController {

	public function __construct() {
	    Parent::__construct();
	    $this->load->library('session');
	    $this->isLoggedIn();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
    }
	
	public function index() {
	    $data = array();
	    $this->global['menus'] = $this->menuCreation();
	    $this->loadViews("common/dashboard", $this->global, $data, NULL);
	}
	
	public function logout() {
	    $this->session->sess_destroy ();
	    redirect($this->config->item('default_url'));
	}
}
