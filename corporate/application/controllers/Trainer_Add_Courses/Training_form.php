<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/ClientController.php';

class Training_form extends ClientController {
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
    
    public function index() {
        $this->global['menus'] = $this->menuCreation();
        if ($this->hasPermission('access', $this->uri->segment('1'))) {
            $data['text_add'] = $this->lang->line('text_add');
            $data['text_add_form'] = $this->lang->line('text_add_form');
            
            $data['text_Basic_Details'] = $this->lang->line('text_Basic_Details');
            $data['text_Section'] = $this->lang->line('text_Section');
            $data['text_Section_Details'] = $this->lang->line('text_Section_Details');
            
            $data['text_Training_Name'] = $this->lang->line('text_Training_Name');
            $data['text_Category_Name'] = $this->lang->line('text_Category_Name');
            $data['text_Training_Type'] = $this->lang->line('text_Training_Type');
            
            $data['text_Section_Name'] = $this->lang->line('text_Section_Name');
            $data['text_sort_order'] = $this->lang->line('text_sort_order');
            
            $data['text_Sub_Section_Name'] = $this->lang->line('text_Sub_Section_Name');
            $data['text_video_path'] = $this->lang->line('text_video_path');
            
            $data['text_price'] = $this->lang->line('text_price');
            $data['text_currencies'] = $this->lang->line('text_currencies');
            
            $data['text_select'] = $this->lang->line('text_select');
            
            $data['course_category'] = $this->category_model->getCategories();
            $data['training_type'] = $this->common_model->getMaintainanceValues('Training Type');
            $data['currencies'] = $this->common_model->getCurrencies();
            $data['days'] = $this->common_model->getMaintainanceValues('Days');
            
            $this->loadViews("trainer/training_forms/add_training", $this->global, $data, NULL);
        } else {
            $this->global['text_back'] = $this->lang->line('text_back');
            $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
            $this->load->view("error", $this->global, NULL , NULL);
        }
    }
}
