<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/ClientController.php';

class Search extends ClientController {

	public function __construct() {
        Parent::__construct();
	    $this->isLoggedIn();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->load->model('common/search_model');
    }
	
    public function index($keyword = NULL) {
	    $this->global['menus'] = $this->menuCreation();
        if($this->input->post('keyword')){
            $keyword = $this->input->post('keyword');
            $results = $this->search_model->getTrainings($keyword);
        } else {
            $new_str = str_replace('+', ' ', $keyword);
            $results = $this->search_model->getTrainings($new_str);
        }
        $data['trainings'] = array();
        
        foreach($results as $result) {
            $category_data = $this->search_model->getTrainingCategoryData($result['category_id']);
            $training_concepts = $this->search_model->getTopTrainingConcepts($result['training_master_id']);
            $currency_data = $this->common_model->getCurrency($result['currency_id']);
            $trainer_data = $this->search_model->getTrainerData($result['created_by']);
            $program_level_name = $this->common_model->getMaintainanceDetail($result['program_level']);
            $data['trainings'][] = array(
                'discount'    => $result['discount'],
                'price_after_discount'    => $result['price_after_discount'],
                'training_master_id'    => $result['training_master_id'],
                'b64_tmid'    => urlencode(base64_encode($result['training_master_id'])),
                'training_name'    => $result['training_name'],
                'training_description'    => $result['training_description'],
                'owner'    => $result['owner'],
                'category_id'    => $result['category_id'],
                'program_level'    => $result['program_level'],
                'training_type'    => $result['training_type'],
                'currency_id'    => $result['currency_id'],
                'created_by'    => $result['created_by'],
                'category_name'    => $category_data[0]->category_name,
                'price'    => $currency_data->currency_symbol . ' ' . $result['price'],
                'trainer_name'    => $trainer_data[0]->first_name . ' ' . $trainer_data[0]->last_name,
                'concepts'    => $training_concepts,
                'program_level_name'    => $program_level_name->maintainance_value,
                'course_duration'    => $result['course_duration'],
                'session_duration'    => $result['session_duration'],
                'no_of_sessions'    => $result['no_of_sessions'],
                'training_image'    => $result['training_image']
            );
        }
	    
	    $this->loadViews('common/search', $this->global, $data, NULL);
    }
    
    public function searchTraining($b64_tmid = NULL) {
        if (is_null($b64_tmid)) {
            redirect(base_url());
        }
        
		$this->global['menus'] = $this->menuCreation();
        $training_master_id = base64_decode(urldecode($b64_tmid));
        $result = $this->search_model->getTrainingData($training_master_id);
        
        $data['training_name'] = $result[0]->training_name;
        $data['training_type'] = $result[0]->training_type;
        $data['currency_id'] = $result[0]->currency_id;
        $data['price'] = $result[0]->price;
        $data['course_duration'] = $result[0]->course_duration;
        $data['session_duration'] = $result[0]->session_duration;
        $data['no_of_sessions'] = $result[0]->no_of_sessions;
        $data['training_start_date'] = $result[0]->training_start_date;
        $data['training_start_time'] = $result[0]->training_start_time;
        $data['training_started'] = $result[0]->training_started;
        $data['training_description'] = $result[0]->training_description;
        $data['program_level'] = $result[0]->program_level;
        $data['owner'] = $result[0]->owner;
        
        $data['concepts'] = $this->search_model->getTrainingConcepts($training_master_id);
        $data['category_data'] = $this->search_model->getTrainingCategoryData($result[0]->category_id);
        $data['trainer_data'] = $this->search_model->getTrainerData($result[0]->created_by);
        $data['program_level_name'] = $this->common_model->getMaintainanceDetail($result[0]->program_level);
        
        $user_id = $this->global['userId'];
        $data['cart_session'] = array(
            'user_id' => $user_id,
            'session_id'  => session_id(),
            'product_id'  => $training_master_id
        );
        $cart_item = $this->search_model->getItemInCart($data['cart_session']);
        if($cart_item->total == 0) {
            $data['item_status'] = 0;
        } else {
            $data['item_status'] = 1;
        }
        //print_r($cart_item);exit;
        
        $trainer_sections = $this->search_model->getTrainingSections($result[0]->training_master_id);
        $data['section_data'] = array();
        
        $ctr = 1;
        foreach($trainer_sections as $trainer_section) {
            $section_detail = $this->search_model->getTrainingSectionDetails($trainer_section->training_section_id);
            $data['section_data'][] = array(
                'ctr'   => $ctr,
                'training_section_id' => $trainer_section->training_section_id,
                'section_name' => $trainer_section->section_name,
                'sort_order' => $trainer_section->sort_order,
                'section_details' => $section_detail
            );
            $ctr++;
        }
        
        $data['other_trainings'] = $this->search_model->getOtherTrainings($training_master_id, $result[0]->created_by);
        //print_r($other_trainings);exit;
        
        $data['training_master_id'] = $training_master_id;
        
        $this->loadViews('common/search-training', $this->global, $data, NULL);
    }
}
