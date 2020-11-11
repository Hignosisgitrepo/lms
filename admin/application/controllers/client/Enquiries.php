<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/AdminController.php';

class Enquiries extends AdminController {

	public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper'));
        $this->load->library('form_validation');
        $this->load->model('client/client_model');
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('client_lang', language_folder($this->global['default_language'])->language_directory);
    } 
    
	public function index() {
	    $this->getList();
	}
	
	public function getList() {
	    $this->global['pageTitle'] = $this->lang->line('text_enquirytitle');
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
	        $data['text_list'] = $this->lang->line('text_enquirylist');
	        $data['text_enquirydetails'] = $this->lang->line('text_enquirydetails');
	        
	        $data['text_dashboard'] = $this->lang->line('text_dashboard');
	        
	        $data['text_contact_person'] = $this->lang->line('text_contact_person');
	        $data['text_telephone'] = $this->lang->line('text_telephone');
	        $data['text_workmail'] = $this->lang->line('text_workmail');
	        $data['text_company'] = $this->lang->line('text_company');
	        $data['text_jobtitle'] = $this->lang->line('text_jobtitle');
	        $data['text_companysize'] = $this->lang->line('text_companysize');
	        $data['text_noofpeople'] = $this->lang->line('text_noofpeople');
	        $data['text_trainingneed'] = $this->lang->line('text_trainingneed');
	        $data['text_status'] = $this->lang->line('text_status');
	        
	        $data['text_client_name'] = $this->lang->line('text_client_name');
	        $data['text_contact_person'] = $this->lang->line('text_contact_person');
	        $data['text_telephone'] = $this->lang->line('text_telephone');
	        $data['text_id'] = $this->lang->line('text_id');
	        $data['text_email'] = $this->lang->line('text_email');
	        $data['text_status'] = $this->lang->line('text_status');
	        
	        $data['text_first_name'] = $this->lang->line('text_first_name');
	        $data['text_last_name'] = $this->lang->line('text_last_name');
	        $data['text_contact_person'] = $this->lang->line('text_contact_person');
	        
	        $data['text_action'] = $this->lang->line('text_action');
	        
	        $data['text_no_data'] = $this->lang->line('text_no_data');
	        $data['text_change_status'] = $this->lang->line('text_change_status');
	        
	        $data['btn_view'] = $this->lang->line('btn_view');
	        $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
	        $data['btn_activate'] = $this->lang->line('btn_activate');
	        $data['btn_save'] = $this->lang->line('btn_save');
	        
	        $data['enquiries'] = array();
	        $results = $this->client_model->getAllEnquiries();
	        //print_r($results);exit;
	        foreach($results as $res) {
	            if($res->status == 1) {
	                $status_name = 'Approved';
	            } else if($res->status == 2) {
	                $status_name = 'Rejected';
	            } else {
	                $status_name = 'New';
	            }
	            
	            $data['enquiries'][] = array(
	                'corporate_enquiry_id' => $res->corporate_enquiry_id,
	                'first_name' => $res->first_name,
	                'last_name' => $res->last_name,
	                'company_name' => $res->company_name,
	                'email' => $res->email,
	                'phone' => $res->phone,
	                'company_size' => $res->company_size,
	                'companysize' => $this->common_model->getMaintainanceDetail($res->company_size)->maintainance_value,
	                'training_need' => $res->training_need,
	                'status' => $res->status,
	                'reject_message' => $res->reject_message,
	                'status_name' => $status_name,
	            );
	        }
	        
	        $this->loadViews("client/enquiry_list", $this->global, $data, NULL , NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function view($b64_cid = NULL) {
	    $this->global['pageTitle'] = $this->lang->line('text_enquirytitle');
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
	        if (is_null($b64_cid)) {
	            redirect(base_url().'corporate-enquiry');
	        }
	        $corporate_enquiry_id = base64_decode(urldecode($b64_cid));
	        $data['text_list'] = $this->lang->line('text_enquirylist');
	        $data['text_enquirydetails'] = $this->lang->line('text_enquirydetails');
	        
	        $data['text_dashboard'] = $this->lang->line('text_dashboard');
	        
	        $data['text_contact_person'] = $this->lang->line('text_contact_person');
	        $data['text_telephone'] = $this->lang->line('text_telephone');
	        $data['text_workmail'] = $this->lang->line('text_workmail');
	        $data['text_company'] = $this->lang->line('text_company');
	        $data['text_jobtitle'] = $this->lang->line('text_jobtitle');
	        $data['text_companysize'] = $this->lang->line('text_companysize');
	        $data['text_noofpeople'] = $this->lang->line('text_noofpeople');
	        $data['text_trainingneed'] = $this->lang->line('text_trainingneed');
	        $data['text_status'] = $this->lang->line('text_status');
	        
	        $data['text_client_name'] = $this->lang->line('text_client_name');
	        $data['text_contact_person'] = $this->lang->line('text_contact_person');
	        $data['text_telephone'] = $this->lang->line('text_telephone');
	        $data['text_id'] = $this->lang->line('text_id');
	        $data['text_email'] = $this->lang->line('text_email');
	        $data['text_status'] = $this->lang->line('text_status');
	        
	        $data['text_first_name'] = $this->lang->line('text_first_name');
	        $data['text_last_name'] = $this->lang->line('text_last_name');
	        $data['text_contact_person'] = $this->lang->line('text_contact_person');
	        
	        $data['text_action'] = $this->lang->line('text_action');
	        
	        $data['text_no_data'] = $this->lang->line('text_no_data');
	        $data['text_change_status'] = $this->lang->line('text_change_status');
	        
	        $data['btn_view'] = $this->lang->line('btn_view');
	        $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
	        $data['btn_activate'] = $this->lang->line('btn_activate');
	        $data['btn_save'] = $this->lang->line('btn_save');
	        
	        $result = $this->client_model->getClientEnquiries($corporate_enquiry_id);
	        
	        $data['corporate_enquiry_id'] = $result->corporate_enquiry_id;
	        $data['last_name'] = $result->last_name;
	        $data['first_name'] = $result->first_name;
	        $data['company_name'] = $result->company_name;
	        $data['email'] = $result->email;
	        $data['phone'] = $result->phone;
	        $data['company_size'] = $result->company_size;
	        $data['companysize'] = $this->common_model->getMaintainanceDetail($result->company_size)->maintainance_value;
	        $data['training_need'] = $result->training_need;
	        $data['status'] = $result->status;
	        $data['reject_message'] = $result->reject_message;
	        
	        $this->loadViews("client/enquiry_form", $this->global, $data, NULL , NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function activateCorporate() {
	    $data = array(
	        'corporate_enquiry_id' => $this->input->post('corporate_enquiry_id')
	    );
	    
	    $this->client_model->activateCorporate($data, $this->global['userId']);
        $json['success'] = $this->lang->line('text_addsuccesss');
	    
	    echo json_encode($json);
	}
	
	public function rejectClient() {
	    $json = array();
	    $data = array(
	        'corporate_enquiry_id' => $this->input->post('corporate_enquiry_id'),
	        'reject_msg' => $this->input->post('reject_msg')
	    );
	    
	    $err =0;
	    if(empty($data['reject_msg'])) {
	        $json['err_msg'] = 'Please prvide the reject message!';
	        $err++;
	    } 
	    
	    if($err == 0) {
    	    $this->client_model->rejectCorporate($data, $this->global['userId']);
    	    $json['success'] = $this->lang->line('text_addsuccesss');
	    }
	    
	    echo json_encode($json);
	}
}
