<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/UserController.php';

class Create_online extends UserController {
    public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->load->library('aws_lib/aws_chime/Chime_meeting');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('trainer_lang', 'language/english');
        $this->load->model('common/common_model');
        $this->load->model('common/category_model');
        $this->load->model('trainer/trainer_model');
    }
    
    public function create_online_meeting() {

        $training_master_id = base64_decode(urldecode($this->input->post('training_master_id')));
        $training_section_id = base64_decode(urldecode($this->input->post('training_section_id')));
        $training_section_detail_id = base64_decode(urldecode($this->input->post('training_section_detail_id')));
        $customer_id = base64_decode(urldecode($this->input->post('customer_id')));

        //create metting in AWS
        $region = 'us-east-1';

        $response = $this->chime_meeting->aws_creating_meeting($training_master_id, $training_section_id, $training_section_detail_id, $customer_id, $region);

        $MetaData_status_code = isset($response['@metadata']['statusCode'])? $response['@metadata']['statusCode'] : 0;

        if($MetaData_status_code == 201){
            $insert_meeting_details = array(
                'training_master_id'  => $training_master_id,
                'training_section_id'  => $training_section_id,
                'training_section_detail_id'  => $training_section_detail_id,
                'MeetingId' => $response['Meeting']['MeetingId'],
                'ExternalMeetingId' => $response['Meeting']['ExternalMeetingId'],
                'AudioHostUrl' => $response['Meeting']['MediaPlacement']['AudioHostUrl'],
                'AudioFallbackUrl' => $response['Meeting']['MediaPlacement']['AudioFallbackUrl'],
                'ScreenDataUrl' => $response['Meeting']['MediaPlacement']['ScreenDataUrl'],
                'ScreenSharingUrl' => $response['Meeting']['MediaPlacement']['ScreenSharingUrl'],
                'ScreenViewingUrl' => $response['Meeting']['MediaPlacement']['ScreenViewingUrl'],
                'SignalingUrl' => $response['Meeting']['MediaPlacement']['SignalingUrl'],
                'TurnControlUrl' => $response['Meeting']['MediaPlacement']['TurnControlUrl'],
                'MediaRegion' => $response['Meeting']['MediaRegion'],
                'effectiveUri' => $response['@metadata']['effectiveUri'],
            ); 

             $add_meeting_details = $this->trainer_model->add_meeting_details($insert_meeting_details);

             $response = array('success' => 1, 'message' => 'Meeting has been created');

        } else {
            $response = array('success' => 0, 'message' => 'File upload error');
        }

        echo json_encode($response);
    }
}
