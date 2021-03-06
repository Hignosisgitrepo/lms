<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/ClientController.php';

class Training_add_basic extends ClientController {
    public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('training_lang', 'language/english');
        $this->load->model('common/common_model');
        $this->load->model('training/trainer_model');
    }
    
    public function add_trainer_basic_details() {
        
        if(isset($_POST)){
            
            $training_name      = $this->input->post('training_name');
            $course_category    = $this->input->post('course_category');
            $training_type      = $this->input->post('training_type');
            $currencies         = $this->input->post('currencies');
            $price              = $this->input->post('price');
            $days_selected      = $this->input->post('days_selected');
            $course_duration    = $this->input->post('course_duration');
            $session_duration   = $this->input->post('session_duration');
            $no_of_sessions      = $this->input->post('no_of_session');
            $start_date         = $this->input->post('start_date');
            $start_time         = $this->input->post('start_time');
            
            $get_training_type = $this->common_model->getMaintainanceDetail($training_type);
            
            $training_master = array(
                'training_name' => $training_name,
                'owner' => 'C',
                'category_id' => $course_category,
                'training_type' => $get_training_type->maintainance_value,
                'currencies' => $currencies,
                'price' => $price,
                'course_duration' => $course_duration,
                'session_duration' => $session_duration,
                'no_of_sessions' => $no_of_sessions,
                'training_start_date' => $start_date,
                'training_start_time' => date("H:i", strtotime($start_time)),
                'training_started' => 0,
                'created_by' => $this->global['client_id'],
                'created_date' => date('Y-m-d H:i:s'),
                'modified_by' => '',
                'modified_date' => '',
            );
            
            $add_basic_details = $this->trainer_model->insert_into_training_master($training_master);
            
            if($add_basic_details['result'] == 1){
                if($training_master['training_type'] == 'Online'){
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
