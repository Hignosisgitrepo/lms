<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {
	function __construct() {
         parent::__construct();
	}
	
	function getTopTrainingConcepts($training_master_id) {
	    $query = "SELECT  TC.* FROM training_concepts TC WHERE TC.training_master_id = ? LIMIT 0,3";
	    
	    $result = $this->db->query($query, array($training_master_id));
	    
	    return $result->result();
	}
	
	function getTrainings($training_name) {
	    $this->db->like("training_name", $training_name);
	    $this->db->where("owner", 'T');
	    return $this->db->get('training_master')->result_array();
	}
	
	function getTrainingData($training_master_id) {
	    $query = "SELECT  TM.* FROM training_master TM WHERE TM.training_master_id = ?";
	    
	    $result = $this->db->query($query, array($training_master_id));
	    
	    return $result->result();
	}
	
	function getTrainingConcepts($training_master_id) {
	    $query = "SELECT  TC.* FROM training_concepts TC WHERE TC.training_master_id = ?";
	    
	    $result = $this->db->query($query, array($training_master_id));
	    
	    return $result->result();
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
}