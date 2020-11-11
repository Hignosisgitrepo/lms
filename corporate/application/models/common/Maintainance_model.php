<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Maintainance_model extends CI_Model {

    function addMaintainance($data = array(), $id, $client_id) {
        $this->db->trans_start();
        
        $this->db->query("INSERT INTO `maintainance` SET maintainance_name = '" . $data['maintainance_name'] . "', client_id = '" . $client_id . "', created_by = '" . $id . "', created_date = NOW()");
        
        $maintainance_id = $this->db->insert_id();
        
        if (isset($data['maintainance_detail'])) {
            foreach ($data['maintainance_detail'] as $maintain) {
                $this->db->query("INSERT INTO maintainance_detail SET maintainance_id = '" . (int)$maintainance_id . "', maintainance_name = '" . $data['maintainance_name'] . "' , maintainance_value = '" . $maintain['maintainance_value'] ."'");
            }
        }
        $this->db->trans_complete();
        
        return $maintainance_id;
    }
    
    function editMaintainance($data = array(), $maintainance_id, $id) {
        $this->db->trans_start();
        
        $this->db->query("UPDATE `maintainance` SET maintainance_name = '" . $data['maintainance_name'] . "', modified_by = '" . $id . "', modified_date = NOW() WHERE maintainance_id = '" . $maintainance_id . "'");
        
        $this->db->query("DELETE FROM `maintainance_detail` WHERE maintainance_id = '" . $maintainance_id . "'");
        
        if (isset($data['maintainance_detail'])) {
            foreach ($data['maintainance_detail'] as $maintain) {
                $this->db->query("INSERT INTO maintainance_detail SET maintainance_id = '" . (int)$maintainance_id . "', maintainance_name = '" . $data['maintainance_name'] . "' , maintainance_value = '" . $maintain['maintainance_value'] ."'");
            }
        }
        $this->db->trans_complete();
        
        return $maintainance_id;
    }
    
    function getMaintainances($client_id) {
        $query=$this->db->query("SELECT * FROM maintainance WHERE client_id = '" . $client_id . "' ORDER BY created_date DESC");
        $result = $query->result();
        return $result;          
    }
    
    function getMaintainance($maintainance_id) {
        $query=$this->db->query("SELECT * FROM maintainance WHERE maintainance_id = '" . $maintainance_id . "'");
        $result = $query->row();
        return $result;   
    }
    
    function getMaintainanceDetail($maintainance_id) {
        $query=$this->db->query("SELECT * FROM maintainance_detail WHERE maintainance_id = '" . $maintainance_id . "'");
        //print_r($this->db->last_query());exit;
        $result = $query->result();
        return $result;     
    }
    
    function getLanguages() {
        $query=$this->db->query("SELECT * FROM languages");
        $result = $query->result();
        return $result;
    }
    
    function getLanguage($language_id) {
        $query=$this->db->query("SELECT * FROM languages WHERE language_id = '" . $language_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function addLanguage($data = array()) {
        $this->db->trans_start();
        
        $this->db->query("INSERT INTO `languages` SET language_name = '" . $data['language_name'] . "', language_directory = '" . $data['language_directory'] . "', slug = '" . $data['slug'] . "', language_code = '" . $data['language_code'] . "'");
        
        $language_id = $this->db->insert_id();
        $this->db->trans_complete();
        
        return $language_id;
    }
    
    function editLanguage($data = array(), $language_id) {
        $this->db->trans_start();
        
        $this->db->query("UPDATE `languages` SET language_name = '" . $data['language_name'] . "', language_directory = '" . $data['language_directory'] . "', slug = '" . $data['slug'] . "', language_code = '" . $data['language_code'] . "' WHERE language_id = '" . $language_id . "'");
        $this->db->trans_complete();
        
        return $language_id;
    }
    
    function editData($data = array(), $user_id) {
        $this->db->trans_start();
        $this->db->query("UPDATE maintainance_detail SET maintainance_value = '" . $data['maintainance_value'] ."' WHERE maintainance_detail_id = '" . $data['maintainance_detail_id'] ."'");
            
        $this->db->trans_complete();
        
        return $data['maintainance_detail_id'];
    }
    
    function saveData($data = array(), $user_id) {
        $this->db->trans_start();
        $maintainance = $this->getMaintainance($data['maintainance_id']);
        $this->db->query("INSERT INTO maintainance_detail SET maintainance_value = '" . $data['maintainance_value'] ."', maintainance_name = '" . $maintainance->maintainance_name ."', maintainance_id = '" . $data['maintainance_id'] ."'");
        
        $this->db->trans_complete();
        
        return $data['maintainance_id'];
    }
}
