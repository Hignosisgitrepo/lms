<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/UserController.php';

class Training_schedules extends UserController {

	public function __construct() {
	    Parent::__construct();
	    $this->load->library('session');
	    $this->isLoggedIn();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
		$this->load->model('trainer/trainer_model');
    }
	
	public function schedules($b64_tmid = NULL) {
		if (is_null($b64_tmid)) {
			redirect(base_url().'trainer-dashboard');
		}
		
		$training_master_id = base64_decode(urldecode($b64_tmid));
		$data['schedule_list'] = array();
		
		$data['training_data'] = $this->trainer_model->get_training_master_details($training_master_id);
		
		$results = $this->trainer_model->getTrainingSchedules($training_master_id);
		foreach($results as $res) {
			if($res->day == 0) {
				$day = 'Sunday';
			} elseif($res->day == 1) {
				$day = 'Monday';
			} elseif($res->day == 2) {
				$day = 'Tuesday';
			} elseif($res->day == 3) {
				$day = 'Wednesday';
			} elseif($res->day == 4) {
				$day = 'Thursday';
			} elseif($res->day == 5) {
				$day = 'Friday';
			} elseif($res->day == 6) {
				$day = 'Saturday';
			}
			
			if($res->training_status == 0) {
				$status_word = 'Not Started';
			} elseif($res->training_status == 1) {
				$status_word = 'In Progress';
			} elseif($res->training_status == 2) {
				$status_word = 'Completed';
			}
			
            $data['schedule_list'][] = array(
                'training_master_id' => $res->training_master_id,
                'training_schedule_id' => $res->training_schedule_id,
                'date' => $res->date,
                'day' =>$res->day,
                'start_time' => $res->start_time,
                'end_time' => $res->end_time,
                'training_status' => $res->training_status,
                'training_day' => $day,
                'status' => $res->training_status,
                'status_word' => $status_word,
            );
        }
		
		
		// print_r($data['schedule_list']);exit;
	    $this->global['menu'] = 123;
	    //print_r($this->global);exit;
	    $this->loadTrainerViews("trainer/schedule/training-schedules", $this->global, $data, NULL);
	}
}