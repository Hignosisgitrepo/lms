<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/UserController.php';

class List_online extends UserController {
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
    
    public function list_online_classes() {
       
       $data['online_training_list'] = array();

        $results = $this->trainer_model->get_trainer_data($this->global['trainerId'], 'T', 'Online');

        foreach($results as $res) {
            $get_course_category = $this->category_model->getCategoryData($res->category_id);
            $get_currency = $this->common_model->getCurrency($res->currency_id);

            $get_total_lession = $this->trainer_model->get_total_lession($res->training_master_id);

            $data['online_training_list'][] = array(
                'trainer_name' => $this->global['name'],
                'training_master_id' => $res->training_master_id,
                'training_name' => $res->training_name,
                'total_lesson' => $get_total_lession[0]->total_lesson,
                'currency_symbol' => $get_currency->currency_symbol,
                'currency_code' => $get_currency->currency_code,
                'price' => $res->price,
                'owner' => $res->owner,
                'category_id' =>$res->category_id,
                'category_name' => $get_course_category->category_name,
                'category_image' => $get_course_category->image,
                'training_type' => $res->training_type,
                'created_by' => $res->created_by,
                'created_date' => $res->created_date,
                'modified_by' => $res->modified_by,
                'modified_date' => $res->modified_date,
            );
        }
        
        $this->loadTrainerViews("online_class/list_online", $this->global, $data, NULL);
    }
}
