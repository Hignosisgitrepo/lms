<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/UserController.php';

class View_courses extends UserController {
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
    
    public function view_my_course($training_master_id) {

        $get_training_master_details = $this->trainer_model->get_training_master_details($training_master_id);

        foreach($get_training_master_details as $master_details) {
            $get_course_category = $this->category_model->getCategoryData($master_details->category_id);
            $get_currency = $this->common_model->getCurrency($master_details->currency_id);
            $get_total_lession = $this->trainer_model->get_total_lession($master_details->training_master_id);

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
        
        $data['section_details'] = array();
        if(!empty($get_training_section_details)) {

            foreach($get_training_section_details as $training_section) {
    
                $get_training_section_detail_details = $this->trainer_model->get_training_section_detail_details($training_master_id,$training_section->training_section_id);
                $section_detail_data = array();
                foreach($get_training_section_detail_details as $training_section_detail) {
                    $section_detail_data[] = array(
                        'training_section_detail_id' => $training_section_detail->training_section_detail_id,
                        'sub_section_name' => $training_section_detail->sub_section_name,
                        'video_file_path' => $training_section_detail->video_file_path,
                        'sort_order' => $training_section_detail->sort_order,
                        
                    );
                }
                // $get_meeting_id = $this->trainer_model->get_meeting_id($training_master_id,$training_section->training_section_id,$training_section_detail->training_section_detail_id);

                // if(isset($get_meeting_id[0]->MeetingId)){
                //     $get_AttendeeId = $this->trainer_model->get_AttendeeId($training_master_id, $training_section->training_section_id, $training_section_detail->training_section_detail_id, $get_meeting_id[0]->MeetingId, $this->global['customerId']);
                // } 

                
                $data['section_details'][] = array(
                    'training_section_id' => $training_section->training_section_id,
                    'section_name' => $training_section->section_name,
                    'sort_order' => $training_section->sort_order,
                    // 'meeting_id' => isset($get_meeting_id[0]->MeetingId) ? $get_meeting_id[0]->MeetingId : '' ,
                    // 'attendee_id' => isset($get_AttendeeId[0]->AttendeeId) ? $get_AttendeeId[0]->AttendeeId : '' ,
                    'customer_id' => $this->global['customerId'],                    
                    'section_detail_data'=> $section_detail_data,
                );

            
            }
        }

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
                'isMeetingHost' => 1,
                'customer_id' => $this->global['customerId'],
            );
        }
         // print_r($data);
        // exit; 
        $this->loadTrainerViews("trainer/view_courses/view_courses", $this->global, $data,"create_meeting_script", NULL);
    }
}
