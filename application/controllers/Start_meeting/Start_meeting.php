<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/UserController.php';

class Start_meeting extends UserController {
    public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('trainer_lang', 'language/english');
        $this->load->model('common/common_model');
        $this->load->model('common/category_model');
        $this->load->model('trainer/trainer_model');
    }
    
    public function create_meeting_session($meeting_id, $attendee_id, $customer_id, $isMeetingHost) {

        $meeting_id = base64_decode(urldecode($meeting_id));
        $attendee_id = base64_decode(urldecode($attendee_id));
        $customer_id = base64_decode(urldecode($customer_id));

        $data['meeting_data'] = array('meeting_id' => $meeting_id, 
                      'attendee_id' => $attendee_id,
                      'customer_id' => $customer_id,
                      'isMeetingHost' => $isMeetingHost
                    );

        // print_r($data);

        $this->loadTrainerViewswithoutside("start_meeting/start_meeting", $this->global, $data, NULL);
       

        // echo json_encode($response);
    }
}
