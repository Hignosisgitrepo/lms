<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/UserController.php';

class List_training extends UserController {
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
    
    public function list_training_data() {
      
        $data['text_add'] = $this->lang->line('text_add');
        $data['text_add_form'] = $this->lang->line('text_add_form');

        $data['text_Basic_Details'] = $this->lang->line('text_Basic_Details');
        $data['text_Section'] = $this->lang->line('text_Section');
        $data['text_Section_Details'] = $this->lang->line('text_Section_Details');

        $data['text_Training_Name'] = $this->lang->line('text_Training_Name');
        $data['text_Category_Name'] = $this->lang->line('text_Category_Name');
		$data['text_Training_Description'] = $this->lang->line('text_Training_Description');
        $data['text_Program_Level'] = $this->lang->line('text_Program_Level');
        $data['text_Training_Type'] = $this->lang->line('text_Training_Type');
        $data['text_price'] = $this->lang->line('text_price');
        $data['text_currencies'] = $this->lang->line('text_currencies');
        $data['text_Final_Price'] = $this->lang->line('text_Final_Price');     
        $data['text_concept_Name'] = $this->lang->line('text_concept_Name');  
        
        $data['text_Section_Name'] = $this->lang->line('text_Section_Name');
        $data['text_sort_order'] = $this->lang->line('text_sort_order');
        $data['text_image'] = $this->lang->line('text_image');
        $data['text_no_data'] = $this->lang->line('text_no_data');
        $data['btn_edit'] = $this->lang->line('btn_edit');

        $data['list_of_training'] = array();
        $results = $this->trainer_model->get_trainer_data($this->global['trainerId'], 'T', 'Offline');
      
        $results1 = $this->trainer_model->getTrainer($this->global['trainerId']);

        $c_id=$this->trainer_model->getTrainerName($results1->customer_id);

        $data['trainer_name']=$c_id->first_name.' '. $c_id->last_name;

        foreach($results as $res) {
            $get_course_category = $this->category_model->getCategoryData($res->category_id);

			$results1 = $this->category_model->getCourseConceptsData($res->training_master_id);
            foreach($results1 as $res1) {
                $data['course_concepts'][]  = array(
                    'course_concepts'=> $res1->concept_name,
                    'training_master_id'=> $res1->training_master_id,
                );
            } 
            $data['training_list'][] = array(
                'training_master_id' => $res->training_master_id,
                'training_name' => $res->training_name,
                'owner' => $res->owner,
                'category_id' =>$res->category_id,
				'training_description' =>$res->training_description,								
                'category_name' => $get_course_category->category_name,
				'image'=> base_url() .$get_course_category->image,				   
                'training_type' => $res->training_type,
                'created_by' => $res->created_by,
                'created_date' => $res->created_date,
                'modified_by' => $res->modified_by,
                'modified_date' => $res->modified_date,
            );
        }
        
        $this->loadTrainerViews("trainer/training_forms/list_training", $this->global, $data, NULL);
    }
}
