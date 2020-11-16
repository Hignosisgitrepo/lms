<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/UserController.php';

class Training_concept extends UserController {
    public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('trainer_lang', 'language/english');
        $this->load->model('common/common_model');
        $this->load->model('trainer/trainer_model');
    }

    public function add_trainer_concept_info() {

        $insert_array = array();
        $add_concept_id = array();
        $add_training_concept_data[] = array();

        $data['tid']= $this->input->post('training_master_id');
    

        foreach ($concept_name_array as $key => $concept_name) {
            $insert_array[] = array(
                'training_master_id' => $this->input->post('training_master_id'),
                'concept_name' => $concept_name,
              
                'created_by' => $this->global['trainerId'],
                'created_date' => date('Y-m-d H:i:s')
            ); 
        }
        

        foreach ($insert_array as $insert) {
            $add_concept = $this->trainer_model->insert_into_training_concept($insert);

            if($add_concept['result'] == 1){
                array_push($add_concept_id,$add_concept['insert_id']);
            }
        }

        $count = 0;
        $in_query = '';
        foreach ($add_concept_id as $concept_key => $concept_value) {
            $count++;

            if($count != count($add_concept_id)){
                $in_query .= $concept_value.','; 
            } else {
                $in_query .= $concept_value; 
            }
            
        }
       

        $get_concept_details = $this->trainer_model->get_training_concept_data($in_query);


        if(count($get_concept_details) > 0){
            foreach ($get_concept_details as $key => $value) {
                $training_concept_id = $value->training_concept_id;
                $concept_name = $value->concept_name;
                $sort_order = $key;

                $training_concept_data[$sort_order] = array('concept_name' => $concept_name,
                                                                 'training_concept_id' => $training_concept_id);
            }
            
            
        }

        $response = array('training_concept_data' => $training_concept_data,
                            'success' => 1,
                            'message' => 'Successfully added concept basic details');


        echo json_encode($response);

    }
public function saveConcept() {


        $tid=$this->input->post('training_master_id');
        $c_id =$this->input->post('training_concept_id');
        $c_name = $this->input->post('concept_name');
	    $data = array(
            
            'training_concept_id' => $this->input->post('training_concept_id'),
            'training_master_id' => $this->input->post('training_master_id'),
            'concept_name' => $this->input->post('concept_name'),
          
            'created_by' => $this->global['trainerId'],
            'created_date' => date('Y-m-d H:i:s')
	        
	    );

        // print_r($data); exit;
	  
	 
	    $err = 0;
	    if (empty($data['concept_name'])){
	        $json['err_empty'] = $this->lang->line('err_empty');
	      
	        $err++;
	    }
	    
	    if($err == 0) {
            if($data['training_concept_id'] == 0) {
                $this->trainer_model->insert_into_training_concept($data);
            }else {
                $this->trainer_model->edit_into_training_concept($c_name,$c_id);

            }
           
            
	        $json['success'] = $this->lang->line('text_addsuccess');
	    }
	    
	    echo json_encode($json);
    }
    
    public function getConcept(){
        $json = array();
        $tid=$this->input->post('training_master_id');
        $results= $this->trainer_model->get_training_concepts($tid);
        //print_r($results);exit;
        foreach($results as $res) {
            
            $json[] = array(
                'training_concept_id'=>$res->training_concept_id,
                'concept_name' => $res->concept_name
                
            );
        }
        echo json_encode($json);
    }

    public function deleteConcept(){
        $json = array();
        $tid=$this->input->post('training_master_id');

        $concept_id=$this->input->post('training_concept_id');
       
        $results= $this->trainer_model->delete_concepts($concept_id);

        //print_r($results);exit;
        $json['success'] = $this->lang->line('text_addsuccess');
        echo json_encode($json);
    } 
}
