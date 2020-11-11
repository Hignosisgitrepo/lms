<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Training_model extends CI_Model {
    
    function getTrainingData($training_master_id) {
        $query=$this->db->query("SELECT * FROM training_master WHERE training_master_id = '" . $training_master_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function getTrainingDesignation($designation_id, $client_id) {
        $query=$this->db->query("SELECT * FROM training_master WHERE training_master_id = '" . $designation_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function getTrainingMappingData($training_map_master_id) {
        $query=$this->db->query("SELECT * FROM training_map_detail as tmd, training_master as tm WHERE tmd.training_map_master_id = '" . $training_map_master_id . "' AND tmd.training_master_id = tm.training_master_id");
        $result = $query->result();
        return $result;
    }
    
    function addMappings($data = array(), $client_id, $id) {
        $this->db->trans_start();
        
        $this->db->query("INSERT INTO `training_map_master` SET designation_id = '" . $data['designation_id'] . "'");
        
        $training_map_master_id = $this->db->insert_id();
        
        if (!empty($data['map_detail'])) {
            foreach ($data['map_detail'] as $map) {
                //print_r("INSERT INTO training_map_detail SET training_map_master_id = '" . (int)$training_map_master_id . "', training_master_id = '" . $map['training_id'] . "', created_by = '" . $id . "', created_date = NOW()");exit;
                $this->db->query("INSERT INTO training_map_detail SET training_map_master_id = '" . (int)$training_map_master_id . "', training_master_id = '" . $map['training_id'] . "', created_by = '" . $id . "', created_date = NOW()");
            }
        }
        $this->db->trans_complete();
        
        return $training_map_master_id;
    }
    
    function getTrainingMappings($client_id) {
        $query=$this->db->query("SELECT * FROM corporate_designation as cd, training_map_master as tm WHERE cd.corporate_id = '" . $client_id . "' AND tm.designation_id = cd.corporate_designation_id");
        $result = $query->result();
        return $result;
    }
    
    function getAssignedTrainings($user_id) {
        $query=$this->db->query("SELECT * FROM assigned_training as at, training_map_detail as tm WHERE at.employee_id = '" . $user_id . "' AND at.training_map_master_id = tm.training_map_master_id");
        $result = $query->result();
        return $result;
    }
}
