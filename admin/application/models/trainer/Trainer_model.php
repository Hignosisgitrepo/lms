<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Trainer_model extends CI_Model {
	function __construct() {
         parent::__construct();
    }
    
    function getAllTrainers() {
        $query = $this->db->query("SELECT * FROM `trainer` as t, `customer` as c WHERE t.customer_id = c.customer_id");
        $result = $query->result();
        return $result;
    }
    
    function activateTrainer($data = array()) {
		$this->db->trans_start();
        $this->db->query("UPDATE `trainer` SET approve_status = 1 WHERE trainer_id = '" . $data['trainer_id'] . "'");
        $this->db->trans_complete();
    }
    
    function getTrainingCourses($trainer_id) {
        $query = $this->db->query("SELECT * FROM `training_master` WHERE created_by = '" . $trainer_id . "' AND owner = 'T'");
        $result = $query->result();
        return $result;
    }
    
    function getTrainingCategoryData($category_id) {
        $query = "SELECT  C.* FROM category C WHERE C.category_id = ?";
        
        $result = $this->db->query($query, array($category_id));
        
        return $result->result();
    }
    
    function getTrainerData($trainer_id) {
        $query = "SELECT  T.*, C.*  FROM trainer T INNER JOIN customer C ON T.customer_id = C.customer_id WHERE T.trainer_id = ?";
        
        $result = $this->db->query($query, array($trainer_id));
        return $result->result();
    }
    
    function getTrainingSections($training_master_id) {
        $query = "SELECT  TS.* FROM training_section TS WHERE TS.training_master_id = ? ORDER BY TS.sort_order ASC";
        
        $result = $this->db->query($query, array($training_master_id));
        
        return $result->result();
    }
    
    function getTrainingSectionDetails($training_section_id) {
        $query = "SELECT  TS.* FROM training_section_detail TS WHERE TS.training_section_id = ? ORDER BY TS.sort_order ASC";
        
        $result = $this->db->query($query, array($training_section_id));
        
        return $result->result();
    }
    
    function getTrainingSchedules($id) {
        
        $query = "SELECT  TS.* FROM training_schedule TS WHERE TS.training_master_id = ?";
        
        $result = $this->db->query($query, array($id));
        
        return $result->result();
    }
    
    function getTopTrainingConcepts($training_master_id) {
        $query = "SELECT  TC.* FROM training_concepts TC WHERE TC.training_master_id = ? LIMIT 0,3";
        
        $result = $this->db->query($query, array($training_master_id));
        
        return $result->result();
    }
}
