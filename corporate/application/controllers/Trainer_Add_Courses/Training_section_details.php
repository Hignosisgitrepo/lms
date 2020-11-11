<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/ClientController.php';

class Training_section_details extends ClientController {
    public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->load->library('aws_lib/S3_upload');
        $this->lang->load('common_lang', 'language/english');
        $this->lang->load('training_lang', 'language/english');
        $this->load->model('common/common_model');
        $this->load->model('training/trainer_model');
    }

    public function add_trainer_section_details_info() {
        $section_id = $_POST['section_id'];
        $section_details_name = $_POST['section_details_name'];
        $section_details_sort_order = $_POST['section_details_sort_order'];

        if(isset($_FILES['file_']) && $_FILES['file_']['error'] != 1){
            $file_name = $_FILES['file_']['name'];   
            $temp_file_location = $_FILES['file_']['tmp_name']; 
            
            $region = 'us-east-1';

            $response = $this->s3_upload->upload_s3($file_name,$temp_file_location,$region);

            $MetaData_status_code = isset($response['@metadata']['statusCode'])? $response['@metadata']['statusCode'] : 0;

            if($MetaData_status_code == 200){
                $insert_array = array(
                    'training_section_id' => $section_id,
                    'sub_section_name' => $section_details_name,
                    'video_file_path' => $response['ObjectURL'],
                    'sort_order' => $section_details_sort_order,
                    'created_by' => $this->global['client_id'],
                    'created_date' => date('Y-m-d H:i:s'),
                    'modified_by' => '',
                    'modified_date' => '',
                ); 

                 $add_section = $this->trainer_model->insert_into_training_section_details($insert_array);

                 $response = array('success' => 1, 'message' => 'Successfully uploaded details');

            } else {
                $response = array('success' => 0, 'message' => 'File upload error');
            }
        } else {
            $response = array('success' => 0, 'message' => 'File size error');
        }

        echo json_encode($response);

    }
}
