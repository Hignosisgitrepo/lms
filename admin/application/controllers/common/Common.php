<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/AdminController.php';

class Common extends AdminController {

	public function __construct() {
	    Parent::__construct();
	    $this->isLoggedIn();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper'));
        $this->load->model(array('common/maintainance_model', 'common/common_model'));
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
    }
	
	public function getState() {
	    $json = array();
	    $data = array(
	        'country_id' => $this->input->post('country_id')
	    );

	    $json['states'] = $this->common_model->getState($data['country_id']);
	    echo json_encode($json);
	}
	
	public function getCity() {
	    $json = array();
	    $data = array(
	        'state_id' => $this->input->post('state_id')
	    );
	    
	    $json['city'] = $this->common_model->getCity($data['state_id']);
	    
	    echo json_encode($json);
	}
	
	public function getCurrency() {
	    $json = array();
	    $data = array(
	        'currency_id' => $this->input->post('currency_id')
	    );
	    $json = $this->common_model->getCurrency($data['currency_id']);
	    echo json_encode($json);
	}
}
