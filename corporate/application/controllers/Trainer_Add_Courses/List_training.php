<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/ClientController.php';

class List_training extends ClientController {
    public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('training_lang', 'language/english');
        $this->load->model('common/common_model');
        $this->load->model('common/category_model');
        $this->load->model('training/trainer_model');
    }
    
    public function list_training_data() {
        $this->global['menus'] = $this->menuCreation();
        if ($this->hasPermission('access', $this->uri->segment('1'))) {
            $data['text_add'] = $this->lang->line('text_add_training');
            $data['text_add_form'] = $this->lang->line('text_add_form');
    
            $data['text_Basic_Details'] = $this->lang->line('text_Basic_Details');
            $data['text_Section'] = $this->lang->line('text_Section');
            $data['text_Section_Details'] = $this->lang->line('text_Section_Details');
    
            $data['text_Training_Name'] = $this->lang->line('text_Training_Name');
            $data['text_Category_Name'] = $this->lang->line('text_Category_Name');
            $data['text_Training_Type'] = $this->lang->line('text_Training_Type');
            $data['text_price'] = $this->lang->line('text_price');
            $data['text_currencies'] = $this->lang->line('text_currencies');
    
            
            $data['text_Section_Name'] = $this->lang->line('text_Section_Name');
            $data['text_sort_order'] = $this->lang->line('text_sort_order');
    
            $data['text_no_data'] = $this->lang->line('text_no_data');
            $data['btn_edit'] = $this->lang->line('btn_edit');
    
            $data['list_of_training'] = array();
            $results = $this->trainer_model->get_trainer_data($this->global['client_id'], 'C');
    
            foreach($results as $res) {
                $get_course_category = $this->category_model->getCategoryData($res->category_id);
    
                $data['training_list'][] = array(
                    'training_master_id' => $res->training_master_id,
                    'training_name' => $res->training_name,
                    'owner' => $res->owner,
                    'category_id' =>$res->category_id,
                    'category_name' => $get_course_category->category_name,
                    'training_type' => $res->training_type,
                    'created_by' => $res->created_by,
                    'created_date' => $res->created_date,
                    'modified_by' => $res->modified_by,
                    'modified_date' => $res->modified_date,
                );
            }
            
            $this->loadViews("trainer/training_forms/list_training", $this->global, $data, NULL);
        } else {
            $this->global['text_back'] = $this->lang->line('text_back');
            $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
            $this->load->view("error", $this->global, NULL , NULL);
        }
    }
}
