<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Corporate extends CI_Controller {
    public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('corporate_lang', 'language/english');
        $this->load->model('common/common_model');
    }
    
	public function index() {
		$data['text_firstname'] = $this->lang->line('text_firstname');
	    $data['text_lastname'] = $this->lang->line('text_lastname');
	    $data['text_workmail'] = $this->lang->line('text_workmail');
	    $data['text_phone'] = $this->lang->line('text_phone');
	    $data['text_company'] = $this->lang->line('text_company');
	    $data['text_jobtitle'] = $this->lang->line('text_jobtitle');
	    $data['text_companysize'] = $this->lang->line('text_companysize');
	    $data['text_noofpeople'] = $this->lang->line('text_noofpeople');
	    $data['text_trainingneed'] = $this->lang->line('text_trainingneed');
	    $data['text_select'] = $this->lang->line('text_select');
	    $data['text_getintouch'] = $this->lang->line('text_getintouch');
	    $data['text_already'] = $this->lang->line('text_already');
        
	    $data['company_sizes'] = $this->common_model->getMaintainanceValues('Company Size');
	    $data['train_sizes'] = $this->common_model->getMaintainanceValues('No of People For Train');
	    
	    $data['countries'] = $this->common_model->getCountries();
	    $data['country_id'] = '231';
	    
	    $this->load->view('common/corporate', $data, null, null);
	}
	
	public function check_email_exists($email){
	    
	    $where_array = array( 'email' => $email );
        $this->db->where($where_array);
        $switch = $this->db->count_all_results("corporate_enquiry");
        if ($switch != NULL){
            $this->form_validation->set_message('check_email_exists', 'The %s field value already exist, please try another.');
            return false;
        }else{
            return true;
        }
	}
	
	public function check_phone_exists($phone){
	    
	    $where_array = array( 'phone' => $phone );
	    $this->db->where($where_array);
	    $switch = $this->db->count_all_results("corporate_enquiry");
	    if ($switch != NULL){
	        $this->form_validation->set_message('check_phone_exists', 'The %s field value already exist, please try another.');
	        return false;
	    }else{
	        return true;
	    }
	}
}
