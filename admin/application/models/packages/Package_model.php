<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Package_model extends CI_Model {
	function __construct() {
         parent::__construct();
	}
	
	function addPackage($data = array(),  $user_id) {
	    $this->db->trans_start();
	    $this->db->query("INSERT INTO package_plan_master set package_name = '" . $data['package_name'] . "', currency = '" . $data['currency'] . "', price = '" . $data['price']. "', price_frequency = '" . $data['price_frequency'] . "' ");
	    $insert_id = $this->db->insert_id();
	    $this->db->trans_complete();
	}
    

    function editPackage($data = array(),  $user_id) {
	    $this->db->trans_start();
	    $this->db->query("UPDATE  package_plan_master set category_name = '" . $data['category_name'] . "', description = '" . $data['description'] . "', top = '" . (isset($data['top']) ? (int)$data['top'] : 0) . "', image = '" . $image . "', status  = '" . $data['status'] . "', created_by = '" . $user_id . "', created_date = NOW() where category_id= '" . $data['category_id'] . "' ");
	    
        $this->db->trans_complete();
        
        return $user_id;
    }
    
     
    function getPackages() {
        $query = $this->db->query("SELECT * FROM `package_plan_master`");
        $result = $query->result();
        return $result;
    }
    
    function getPackageData($package_plan_master_id) {
        $query = $this->db->query("SELECT * FROM `package_plan_master` WHERE package_plan_master_id = '" . $package_plan_master_id . "'");
        $result = $query->row();
        return $result;
    }
}
