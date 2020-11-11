<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Designation_model extends CI_Model {

    function getTotalDesignation($designation_name, $client_id) {
        $query=$this->db->query("SELECT COUNT(*) as total FROM corporate_designation WHERE designation_name = '" . $designation_name . "' AND corporate_id = '" . $client_id . "'");
        $result = $query->row();
        return $result; 
    }
    
    function addDesignation($designation_name, $client_id, $user_id) {
        $this->db->trans_start();
        $this->db->query("INSERT INTO corporate_designation SET designation_name = '" . $designation_name . "', corporate_id = '" . $client_id . "', created_by = '" . $user_id . "', created_date = NOW()");
        
        $this->db->trans_complete();
    }
    
    function getDesignations($client_id) {
        $query=$this->db->query("SELECT * FROM corporate_designation WHERE corporate_id = '" . $client_id . "'");
        $result = $query->result();
        return $result;
    }
    
    function getDesignationData($corporate_designation_id) {
        $query=$this->db->query("SELECT * FROM corporate_designation WHERE corporate_designation_id = '" . $corporate_designation_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function editDesignation($data = array(), $client_id, $user_id) {
        $this->db->trans_start();
        $this->db->query("UPDATE corporate_designation SET designation_name = '" . $data['designation_name'] . "', modified_by = '" . $user_id . "', modified_date = NOW() WHERE corporate_designation_id = '" . $data['corporate_designation_id'] . "' AND corporate_id = '" . $client_id . "'");
        
        $this->db->trans_complete();
    }
}
