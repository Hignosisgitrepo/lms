<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/ClientController.php';

class Training_section extends ClientController {
    public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('training_lang', 'language/english');
        $this->load->model('common/common_model');
        $this->load->model('training/trainer_model');
    }

    public function add_trainer_section_info() {

        $insert_array = array();
        $add_section_id = array();
        $add_training_section_data[] = array();

        $section_name_array = $this->input->post('section_name');
        $sort_order_array = $this->input->post('sort_order');

        foreach ($section_name_array as $key => $section_name) {
            $insert_array[] = array(
                'training_master_id' => $this->input->post('training_master_id'),
                'section_name' => $section_name,
                'sort_order' => $sort_order_array[$key],
                'created_by' => $this->global['client_id'],
                'created_date' => date('Y-m-d H:i:s'),
                'modified_by' => '',
                'modified_date' => '',
            ); 
        }

        foreach ($insert_array as $insert) {
            $add_section = $this->trainer_model->insert_into_training_section($insert);

            if($add_section['result'] == 1){
                array_push($add_section_id,$add_section['insert_id']);
            }
        }

        $count = 0;
        $in_query = '';
        foreach ($add_section_id as $section_key => $section_value) {
            $count++;

            if($count != count($add_section_id)){
                $in_query .= $section_value.','; 
            } else {
                $in_query .= $section_value; 
            }
            
        }
       

        $get_section_details = $this->trainer_model->get_training_section_data($in_query);


        if(count($get_section_details) > 0){
            foreach ($get_section_details as $key => $value) {
                $training_section_id = $value->training_section_id;
                $section_name = $value->section_name;
                $sort_order = $value->sort_order;

                $training_section_data[$sort_order] = array('section_name' => $section_name,
                                                                 'training_section_id' => $training_section_id);
            }
            
            
        }

        $response = array('training_section_data' => $training_section_data,
                            'success' => 1,
                            'message' => 'Successfully added section basic details');


        echo json_encode($response);

    }
}
