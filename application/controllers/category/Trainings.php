<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trainings extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->load->model('common/common_model');
        $this->load->model('common/category_model');
        $this->load->model('common/search_model');
    }
    
    public function getList($b64_cid = NULL) {
		
        if (is_null($b64_cid)) {
            redirect(base_url());
        }
		$category_id = base64_decode(urldecode($b64_cid));
		$results = $this->category_model->getCategoryTrainings($category_id);
		$data['trainings'] = array();
        
        foreach($results as $result) {
            $category_data = $this->search_model->getTrainingCategoryData($result->category_id);
            $training_concepts = $this->search_model->getTopTrainingConcepts($result->training_master_id);
            $currency_data = $this->common_model->getCurrency($result->currency_id);
            $trainer_data = $this->search_model->getTrainerData($result->created_by);
            $program_level_name = $this->common_model->getMaintainanceDetail($result->program_level);
            $data['trainings'][] = array(
                'discount'    => $result->discount,
                'price_after_discount'    => $currency_data->currency_symbol . ' ' . $result->price_after_discount,
                'training_master_id'    => $result->training_master_id,
                'b64_tmid'    => urlencode(base64_encode($result->training_master_id)),
                'training_name'    => $result->training_name,
                'training_description'    => $result->training_description,
                'owner'    => $result->owner,
                'category_id'    => $result->category_id,
                'program_level'    => $result->program_level,
                'training_type'    => $result->training_type,
                'currency_id'    => $result->currency_id,
                'created_by'    => $result->created_by,
                'category_name'    => $category_data[0]->category_name,
                'price'    => $currency_data->currency_symbol . ' ' . $result->price,
                'trainer_name'    => $trainer_data[0]->first_name . ' ' . $trainer_data[0]->last_name,
                'concepts'    => $training_concepts,
                'program_level_name'    => $program_level_name->maintainance_value,
                'course_duration'    => $result->course_duration,
                'session_duration'    => $result->session_duration,
                'no_of_sessions'    => $result->no_of_sessions,
                'training_image'    => $result->training_image
            );
        }
		
		$this->load->view('category/trainings', $data, NULL, NULL);
    }
}
