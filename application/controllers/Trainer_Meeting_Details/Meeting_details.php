<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/UserController.php';

class Meeting_details extends UserController {
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
    
    public function get_meeting_details() {

        $meeting_id = base64_decode(urldecode($this->input->post('meetingId')));
        $attendee_id = base64_decode(urldecode($this->input->post('attendeeId')));
        $customer_id = base64_decode(urldecode($this->input->post('customer_id')));

        $data['Info'] = array();

        $get_meeting_results = $this->trainer_model->get_meeting_details($meeting_id);
        $get_attendee_results = $this->trainer_model->get_attendee_details($meeting_id, $attendee_id, $customer_id);

        foreach($get_meeting_results as $res) {
          
            $data['Info']['Meeting'] = array(
                'MeetingId' => $res->MeetingId,
                'ExternalMeetingId' => $res->ExternalMeetingId,
                'MediaPlacement' => array(
                    'AudioHostUrl' => $res->AudioHostUrl,
                    'AudioFallbackUrl' => $res->AudioFallbackUrl,
                    'ScreenDataUrl' => $res->ScreenDataUrl,
                    'ScreenSharingUrl' => $res->ScreenSharingUrl,
                    'ScreenViewingUrl' => $res->ScreenViewingUrl,
                    'SignalingUrl' => $res->SignalingUrl,
                    'TurnControlUrl' => $res->TurnControlUrl,   
                ),
                'MediaRegion' => $res->MediaRegion,
            );

        }

        foreach($get_attendee_results as $res) {
            $data['Info']['Attendee'] = array(
                'AttendeeId' => $res->AttendeeId,
                'JoinToken' => $res->JoinToken,
                'ExternalUserId' => $res->ExternalUserId,
            );
        }

        echo json_encode($data);
    }
}
