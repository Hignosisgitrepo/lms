<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/UserController.php';

class Training_add_basic extends UserController {
    public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('trainer_lang', 'language/english');
        $this->load->model('common/common_model');
        $this->load->model('trainer/trainer_model');
		$this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
    }
    
    public function add_trainer_basic_details() {
        
        if(isset($_POST)){
            
            $training_name      = $this->input->post('training_name');
            $training_description      = $this->input->post('training_description');
            $program_level      = $this->input->post('program_level');
            $course_category    = $this->input->post('course_category');
            $training_type      = $this->input->post('training_type');
            $currencies         = $this->input->post('currencies');
            $price              = $this->input->post('price');


            $discount              = $this->input->post('discount');
            $price_after_discount              = $this->input->post('price_after_discount');
            $platform_commission              = $this->input->post('platform_commission');
            $final_price              = $this->input->post('final_price');
            $days_selected      = $this->input->post('days_selected');
            $course_duration    = $this->input->post('course_duration');
            $session_duration   = $this->input->post('session_duration');
            $no_of_sessions      = $this->input->post('no_of_session');
            $start_date         = $this->input->post('start_date');
            $start_hour     =   $this->input->post('start_hour');
            $start_time     =    $this->input->post('start_time');
            $time_zone     =    $this->input->post('time_zone');
            $get_training_type = $this->common_model->getMaintainanceDetail($training_type);
            
            $training_master = array(
                'training_name' => $training_name,
                'training_description' => $training_description,
                'program_level' => $program_level,							  
                'owner' => 'T',
                'category_id' => $course_category,
                'training_type' => $get_training_type->maintainance_value,
                'currencies' => $currencies,
                'price' => $price,

                'discount' => $discount,
                'price_after_discount' => $price_after_discount,
                'platform_commission' => $platform_commission,
                'final_price' => $final_price,
                
                'course_duration' => isset($course_duration)? 0:$course_duration,
                'session_duration' => isset($session_duration)? 0:$session_duration,
                'no_of_sessions' => isset($no_of_sessions)?0:$no_of_sessions,
                'training_start_date' => if($start_date == '' )? 'NULL' : "$start_date",
                'training_start_time' => date("H:i", strtotime($start_hour.':'.$start_time.':00')), 
                'time_zone'=>$time_zone,
                'training_started' => 0,
                'created_by' => $this->global['trainerId'],
                'created_date' => date('Y-m-d H:i:s'),
                'modified_by' => '',
                'modified_date' => '',
            );
            
            $add_basic_details = $this->trainer_model->insert_into_training_master($training_master);
            
            if($add_basic_details['result'] == 1){

                if($training_type == 'Online'){
                    foreach ($days_selected as $day) {
                        $training_days = array(
                            'training_master_id' => $add_basic_details['insert_id'],
                            'day' => $day,
                        );
                        $add_training_days = $this->trainer_model->insert_into_training_days($training_days);
                    }
                    
                    //Tarakant started 26th oct
                    
                    $parsed = date_parse($start_time);
                    $start_seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                    
                    $session_time = $session_duration * 60 *60;
                    
                    
                    $total = $start_seconds + $session_time;
                    $end_time = date('h:i:s a', strtotime(gmdate("H:i:s", $total)));
                    $this->trainer_model->populate_schedule($add_basic_details['insert_id'], $start_date, $start_time, $end_time, $no_of_sessions);
                    
                    //Tarakant ends
                    
                    /*if($add_training_days == 1){
                        
                        $secondsToAdd = $session_duration * (60 * 60);
                        
                        $end_time = strtotime($start_time) + $secondsToAdd;
                        
                        $date = array();
                        
                        $dayofweek = date('w', strtotime($start_date));
                        
                        for ($i=0; $i<$no_of_sessions ; $i++) {
                            
                            foreach ($days_selected as $day) {
                                $date[]   = date('Y-m-d', strtotime(($day + $dayofweek).' day', strtotime($start_date)));
                            }
                        }
                        
                        $training_schedule = array(
                            'training_master_id' => $add_basic_details['insert_id'],
                            'date' => 'T',
                            'day' => $course_category,
                            'start_time' => date("H:i", strtotime($start_time)),
                            'end_time' => date("H:i", strtotime($end_time)),
                            'training_status' => 0,
                        );
                    }*/
                }
                
                
            }
            //print_r($add_basic_details);exit;
            if($add_basic_details['result'] == 1){
                $response = array('training_master_id' => $add_basic_details['insert_id'],
                    'success' => 1,
                    'message' => 'Successfully added basic details');
            } else {
                $response = array('success' => 0,
                    'message' => 'Error while adding the details');
            }
            echo json_encode($response);
        }
        
        
        
    }
}
