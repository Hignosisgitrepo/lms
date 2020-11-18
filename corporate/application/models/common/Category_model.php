<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {
	function __construct() {
         parent::__construct();
	}
	
	function addCategory($data = array(), $image, $user_id) {
	    $this->db->trans_start();
	    $this->db->query("INSERT INTO category set category_name = '" . $data['category_name'] . "', description = '" . $data['description'] . "', top = '" . (isset($data['top']) ? (int)$data['top'] : 0) . "', image = '" . $image . "', status  = '" . $data['status'] . "', created_by = '" . $user_id . "', created_date = NOW()");
	    $insert_id = $this->db->insert_id();
	    $this->db->trans_complete();
	}
    
    function getCategories() {
        $query = $this->db->query("SELECT * FROM `category`");
        $result = $query->result();
        return $result;
    }
    
    function getCategoryData($category_id) {
        $query = $this->db->query("SELECT * FROM `category` WHERE category_id = '" . $category_id . "'");
        $result = $query->row();
        return $result;
    }

    function getCourseConceptsData($trainer_id) {
        $query = $this->db->query("SELECT * FROM `training_concepts` WHERE training_master_id = '" . $trainer_id . "'");
        $result = $query->result();
        return $result;
    }
    
    function getCategoryTrainings($category_id) {
        $query = $this->db->query("SELECT * FROM `training_master` WHERE category_id = '" . $category_id . "'");
        $result = $query->result();
        return $result;
    }
}
