<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/UserController.php';

class Mycourses extends UserController {

	public function __construct() {
	    Parent::__construct();
	    $this->load->library('session');
	    $this->isLoggedIn();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        
        $this->load->model('common/search_model');
        $this->load->model('common/common_model');
        $this->load->model('customer/order_model');
        $this->load->model('trainer/trainer_model');
    }
	
	public function index() {
	    $customer_id = $this->global['customerId'];
	    $data['customer_data'] = $this->common_model->getCustomerData($customer_id);
	    $results = $this->order_model->getOrders($customer_id);
	    
	    $data['orders'] = array();
	    foreach($results as $result) {
	        $course_data = $this->order_model->getTrainingData($result->product_id);
	        
	        $course = array(
	            'training_master_id'   => $course_data[0]->training_master_id,
	            'b64_tmid'    => urlencode(base64_encode($course_data[0]->training_master_id)),
	            'training_name'   => $course_data[0]->training_name,
	            'training_description'   => $course_data[0]->training_description,
	            'category_id'   => $course_data[0]->category_id,
	            'program_level'   => $course_data[0]->program_level,
	            'training_type'   => $course_data[0]->training_type,
	            'currency_id'   => $course_data[0]->currency_id,
	            'price'   => $course_data[0]->price,
	            'course_duration'   => $course_data[0]->course_duration,
	            'session_duration'   => $course_data[0]->session_duration,
	            'no_of_sessions'   => $course_data[0]->no_of_sessions,
	            'training_image'   => $this->config->item('default_url').'/assets/common/images/paths/angular_40x40@2x.png',
	            'training_start_date'   => $course_data[0]->training_start_date,
	            'training_start_time'   => $course_data[0]->training_start_time,
	            'training_started'   => $course_data[0]->training_started	            
	        );
	        
	        $data['orders'][] = array(
	            'order_id' => $result->order_id,
	            'order_product_id' => $result->order_product_id,
	            'product_id' => $result->product_id,
	            'course_data' => $course
	        );
	    }
	    $this->loadViews("customer/mycourses", $this->global, $data, NULL);
	}
	
	public function view($b64_tmid = NULL) {
	    if (is_null($b64_tmid)) {
	        redirect(base_url());
	    }
	    
	    $training_master_id = base64_decode(urldecode($b64_tmid));
	    $customer_id = $this->global['customerId'];
	    $data['customer_data'] = $this->common_model->getCustomerData($customer_id);
	    $course_data = $this->order_model->getTrainingData($training_master_id);
	    $trainer_data = $this->common_model->getCustomerData($course_data[0]->created_by);
	    
	    if(!empty($course_data[0]->program_level)) {
    	    $program = $this->common_model->getMaintainanceDetail($course_data[0]->program_level);
    	    if(!empty($program)) {
    	        $data['program_level_name'] = $program->maintainance_value;
    	    } else {
    	        $data['program_level_name'] = '';
    	    }
	    } else {
	        $data['program_level_name'] = '';
	    }
	    
	    $data['course'] = array(
	        'training_master_id'   => $course_data[0]->training_master_id,
	        'b64_tmid'    => urlencode(base64_encode($course_data[0]->training_master_id)),
	        'training_name'   => $course_data[0]->training_name,
	        'training_description'   => $course_data[0]->training_description,
	        'category_id'   => $course_data[0]->category_id,
	        'program_level'   => $course_data[0]->program_level,
	        'training_type'   => $course_data[0]->training_type,
	        'currency_id'   => $course_data[0]->currency_id,
	        'price'   => $course_data[0]->price,
	        'course_duration'   => $course_data[0]->course_duration,
	        'session_duration'   => $course_data[0]->session_duration,
	        'no_of_sessions'   => $course_data[0]->no_of_sessions,
	        'training_image'   => $this->config->item('default_url').'/assets/common/images/paths/angular_40x40@2x.png',
	        'training_start_date'   => $course_data[0]->training_start_date,
	        'training_start_time'   => $course_data[0]->training_start_time,
	        'training_started'   => $course_data[0]->training_started,
	        'trainer_data' => $trainer_data
	        
	    );
	    
	    $trainer_sections = $this->search_model->getTrainingSections($course_data[0]->training_master_id);
	    $data['section_data'] = array();
	    
	    $ctr = 1;
	    foreach($trainer_sections as $trainer_section) {
	        $section_detail = $this->search_model->getTrainingSectionDetails($trainer_section->training_section_id);
	        $data['section_data'][] = array(
	            'ctr'   => $ctr,
	            'training_section_id' => $trainer_section->training_section_id,
	            'section_name' => $trainer_section->section_name,
	            'sort_order' => $trainer_section->sort_order,
	            'section_details' => $section_detail
	        );
	        $ctr++;
	    }
	    
		$data['schedule_data'] = array();
	    if($course_data[0]->training_type == 'Online') {	        
	        
	        $trainer_schedules = $this->trainer_model->getTrainingSchedules($course_data[0]->training_master_id);
	        
	        $count = 1;
	        foreach($trainer_schedules as $trainer_schedule) {
	            if($trainer_schedule->day == 0) {
	                $day = 'Sunday';
	            } elseif($trainer_schedule->day == 1) {
	                $day = 'Monday';
	            } elseif($trainer_schedule->day == 2) {
	                $day = 'Tuesday';
	            } elseif($trainer_schedule->day == 3) {
	                $day = 'Wednesday';
	            } elseif($trainer_schedule->day == 4) {
	                $day = 'Thursday';
	            } elseif($trainer_schedule->day == 5) {
	                $day = 'Friday';
	            } elseif($trainer_schedule->day == 6) {
	                $day = 'Saturday';
	            }
	            
	            if($trainer_schedule->training_status == 0) {
	                $status = 'Not Started';
	            } elseif($trainer_schedule->training_status == 1) {
	                $status = 'In Progress';
	            } elseif($trainer_schedule->training_status == 2) {
	                $status = 'Completed';
	            }
	            $data['schedule_data'][] = array(
	                'ctr'   => $count,
	                'training_section_id' => $trainer_schedule->date,
	                'section_name' => $trainer_schedule->day,
	                'date' 	=> $trainer_schedule->date,
	                'start_time' => $trainer_schedule->start_time,
	                'status' => $trainer_schedule->end_time,
	                'training_status' => $trainer_schedule->training_status,
	                'training_day' => $day,
	                'status' => $status
	            );
	            $count ++;
	        }
	    }
	    
	    $this->loadViews("customer/course-view", $this->global, $data, NULL);
	}
}
