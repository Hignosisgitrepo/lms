<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
    }
	
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('common/dashboard');
		$this->load->view('includes/footer');
	}
}
