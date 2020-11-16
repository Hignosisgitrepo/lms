<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/UserController.php';

class Training_form extends UserController {
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
    
    public function index() {
        $this->add_form();
    }

    public function add_form(){
        $data['text_add'] = $this->lang->line('text_add');
        $data['text_add_form'] = $this->lang->line('text_add_form');

        $data['text_Basic_Details'] = $this->lang->line('text_Basic_Details');
        $data['text_Section'] = $this->lang->line('text_Section');
        $data['text_Section_Details'] = $this->lang->line('text_Section_Details');

        $data['text_Training_Name'] = $this->lang->line('text_Training_Name');
        $data['text_Category_Name'] = $this->lang->line('text_Category_Name');
        $data['text_Training_Type'] = $this->lang->line('text_Training_Type');

        $data['text_Section_Name'] = $this->lang->line('text_Section_Name');
        $data['text_Price_Discount'] = $this->lang->line('text_Price_Discount');
        $data['text_Price_After_Discount'] = $this->lang->line('text_Price_After_Discount');
        $data['text_Platform_commission'] = $this->lang->line('text_Platform_commission');
        $data['text_Final_Price'] = $this->lang->line('text_Final_Price');

        $data['text_commission_value'] = $this->lang->line('text_commission_value');

        $data['text_concept_Name'] = $this->lang->line('text_concept_Name');	
        $data['text_image'] = $this->lang->line('text_image');	
        $data['text_sort_order'] = $this->lang->line('text_sort_order');
        $data['text_sort_ordered'] = $this->lang->line('text_sort_ordered');
        $data['text_Training_Description'] = $this->lang->line('text_Training_Description');
        $data['text_Program_Level'] = $this->lang->line('text_Program_Level');
        $data['text_Sub_Section_Name'] = $this->lang->line('text_Sub_Section_Name');
        $data['text_video_path'] = $this->lang->line('text_video_path');
        $data['text_video_time'] = $this->lang->line('text_video_time');
        $data['text_price'] = $this->lang->line('text_price');
        $data['text_currencies'] = $this->lang->line('text_currencies');
        $data['text_minimum_commission_value'] = $this->lang->line('text_minimum_commission_value');
        
        $data['text_select'] = $this->lang->line('text_select');

        $data['course_category'] = $this->category_model->getCategories();
        $data['training_type'] = $this->common_model->getMaintainanceValues('Training Type');
        $data['currencies'] = $this->common_model->getCurrencies();
        $data['days'] = $this->common_model->getMaintainanceValues('Days');
        $data['program_level'] = $this->common_model->getMaintainanceValues('Program Level');

        $min_commission = $this->common_model->getMaintainanceCommissionValues('Minimum Trainer Commission');
        
        $data['minimum_commission']=$min_commission->maintainance_value;
        
        if($min_commission != null){
            $data['minimum_commission'] = $min_commission->maintainance_value;
          }else{
            $data['minimum_commission']='0';
          }

        $trainer_id=$this->global['trainerId'];
        
        $cid=$this->trainer_model->getCustomerId($trainer_id);
        if($cid==null){
            $cid->customer_id=0;
        }
        $commission = $this->trainer_model->getPlatformCommission($cid->customer_id);
        if($commission != null){
          $data['platformcommisison'] = $commission->platform_commission;
        }else{
            $data['platformcommisison']='0';
        }
       // $this->loadTrainerViews("trainer/training_forms/add_training", $this->global, $data, NULL);
        $this->loadTrainerViews("trainer/training_forms/add_training", $this->global, $data,"add_training_script", NULL);
    }
}
