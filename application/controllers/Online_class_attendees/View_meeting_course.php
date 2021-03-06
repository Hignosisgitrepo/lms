<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/UserController.php';

class View_meeting_course extends UserController {
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
    
    public function view_my_course($id, $section_id, $section_details_id, $customer_id) {

        $data = array();

        $training_master_id = base64_decode(urldecode($id));
        $training_section_id = base64_decode(urldecode($section_id));
        $training_section_detail_id = base64_decode(urldecode($section_details_id));
        $customer_id = base64_decode(urldecode($customer_id));

        $get_training_master_details = $this->trainer_model->get_training_master_details($training_master_id);

        foreach($get_training_master_details as $master_details) {
            $get_course_category = $this->category_model->getCategoryData($master_details->category_id);
            $get_currency = $this->common_model->getCurrency($master_details->currency_id);
            $get_total_lession = $this->trainer_model->get_total_lession($training_master_id);

            $data['training_details'][] = array(
                    'trainer_name' => $this->global['name'],
                    'training_master_id' => $master_details->training_master_id,
                    'training_name' => $master_details->training_name,
                    'currency_symbol' => $get_currency->currency_symbol,
                    'currency_code' => $get_currency->currency_code,
                    'price' => $master_details->price,
                    'owner' => $master_details->owner,
                    'category_id' =>$master_details->category_id,
                    'category_name' => $get_course_category->category_name,
                    'category_image' => $get_course_category->image,
                    'training_type' => $master_details->training_type,
                    'total_lesson' => $get_total_lession[0]->total_lesson,

                );
        }

        $get_training_section_details = $this->trainer_model->get_training_section_details($training_master_id);

        foreach($get_training_section_details as $training_section) {

            $get_training_section_detail_details = $this->trainer_model->get_training_section_detail_details($training_master_id,$training_section->training_section_id);

            $data['section_details'][$training_section->training_section_id] = array(
                'training_section_id' => $training_section->training_section_id,
                'section_name' => $training_section->section_name,
                'sort_order' => $training_section->sort_order,
                
            );

            foreach($get_training_section_detail_details as $training_section_detail) {

                $get_meeting_id = $this->trainer_model->get_meeting_id($training_master_id, $training_section->training_section_id, $training_section_detail->training_section_detail_id);

                if(isset($get_meeting_id[0]->MeetingId)){
                    $get_AttendeeId = $this->trainer_model->get_AttendeeId($training_master_id, $training_section->training_section_id, $training_section_detail->training_section_detail_id, $get_meeting_id[0]->MeetingId, $customer_id);
                }          
                

                $data['section_details'][$training_section->training_section_id]['sub_section'][] = array(
                        'training_section_detail_id' => $training_section_detail->training_section_detail_id,
                        'sub_section_name' => $training_section_detail->sub_section_name,
                        'video_file_path' => $training_section_detail->video_file_path,
                        'sort_order' => $training_section_detail->sort_order,
                        'customer_id' => $customer_id,
                        'meeting_id' => isset($get_meeting_id[0]->MeetingId) ? $get_meeting_id[0]->MeetingId : '',
                        'attendee_id' => isset($get_AttendeeId[0]->AttendeeId) ? $get_AttendeeId[0]->AttendeeId : '' ,
                        'isMeetingHost' => 0,
                            
                    );
            }
        }

        $this->loadViews("online_class_attendees/attendees_view_course", $this->global, $data,"attend_meeting_script", NULL);
    }
}
