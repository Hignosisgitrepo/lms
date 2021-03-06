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
    
    public function view_my_course($id) {

        $get_training_master_details = $this->trainer_model->get_training_master_details($id);

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

        $get_training_section_details = $this->trainer_model->get_training_section_details($id);
        
        $data['section_details'] = array();
        if(!empty($get_training_section_details)) {

            foreach($get_training_section_details as $training_section) {
    
                $get_training_section_detail_details = $this->trainer_model->get_training_section_detail_details($id,$training_section->training_section_id);
                $section_detail_data = array();
                foreach($get_training_section_detail_details as $training_section_detail) {
                    $section_detail_data[] = array(
                        'training_section_detail_id' => $training_section_detail->training_section_detail_id,
                        'sub_section_name' => $training_section_detail->sub_section_name,
                        'video_file_path' => $training_section_detail->video_file_path,
                        'sort_order' => $training_section_detail->sort_order,
                        
                    );
                }
                
                $data['section_details'][] = array(
                    'training_section_id' => $training_section->training_section_id,
                    'section_name' => $training_section->section_name,
                    'sort_order' => $training_section->sort_order,
                    'section_detail_data'=> $section_detail_data
                    
                );
            }
        }
        /* print_r($data['section_details']);
        exit; */
        $this->loadTrainerViews("trainer/view_courses/view_courses", $this->global, $data, NULL);
    }
}
