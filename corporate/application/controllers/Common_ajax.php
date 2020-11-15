<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_ajax extends CI_Controller {
    public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->load->model('common/common_model');
    }
	
	public function searchData() {
	    $keyword = $this->input->post('keyword');
	    if(!empty($keyword)) {
    	    $json = $this->common_model->getSearchData($keyword);
	    } else {
	        $json = '';
	    }
	    
	    echo json_encode($json);
	}
	
}
