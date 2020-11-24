<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/UserController.php';

class Training_section extends UserController {
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
                'created_by' => $this->global['trainerId'],
                'created_date' => date('Y-m-d H:i:s')
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

    public function getSection(){
        $json = array();
       
   
        $tid=$this->input->post('training_master_id');
       
        $results= $this->trainer_model->get_training_section($tid);
        //print_r($results);exit;
        
        

        foreach($results as $res) {
            
            $json[] = array(
                'training_section_id'=>$res->training_section_id,
                'section_name' => $res->section_name,
                'sort_order' => $res->sort_order

            );

         
        }

       
       
     //   getSectionDetails($tid);
     //   echo json_encode($response);
        echo json_encode($json);

    }


    public function getSectionDetails() {

        $insert_array = array();
        $add_section_id = array();
        $add_training_section_data[] = array();

        
       $tid=$this->input->post('training_master_id');
        $results= $this->trainer_model->get_training_section($tid);
        //print_r($results);exit;
        $get_training_master_details = $this->trainer_model->get_training_master_details($tid);
        $json['training_type'] = $get_training_master_details[0]->training_type;
        
        foreach($results as $res) {
            
            $json[] = array(
                'training_section_id'=>$res->training_section_id,
                'section_name' => $res->section_name,
                'sort_order' => $res->sort_order

            );

            array_push($add_section_id,$res->training_section_id);
         
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

    public function saveSection() {


        $tid=$this->input->post('training_master_id');
        $s_id =$this->input->post('training_section_id');
        $s_name = $this->input->post('section_name');
        $s_order= $this->input->post('sort_order');
	    $data = array(
            
            'training_section_id' => $this->input->post('training_section_id'),
            'training_master_id' => $this->input->post('training_master_id'),
            'section_name' => $this->input->post('section_name'),
            'sort_order'=>$this->input->post('sort_order'),
            'created_by' => $this->global['trainerId'],
            'created_date' => date('Y-m-d H:i:s'),
            'modified_by' => '0',
            'modified_date' => '',
	        
	    );
	  
	 
	    $err = 0;
	    if (empty($data['section_name'])){
	        $json['err_empty'] = $this->lang->line('err_empty');
	      
	        $err++;
	    }
	    
	    if($err == 0) {
            if($data['training_section_id'] == 0) {
                $add_section =  $this->trainer_model->insert_into_training_section($data);
            }else {
                $this->trainer_model->edit_into_training_section($s_name,$s_id,$s_order);

            }
            
            
	        $json['success'] = $this->lang->line('text_addsuccess');
        }

	    echo json_encode($json);
    }
    

    public function deletesection(){
        $json = array();
        $tid=$this->input->post('training_master_id');

        $section_id=$this->input->post('training_section_id');
       
        $results= $this->trainer_model->delete_section($section_id);

        //print_r($results);exit;
        $json['success'] = $this->lang->line('text_addsuccess');
        echo json_encode($json);
    }
}
