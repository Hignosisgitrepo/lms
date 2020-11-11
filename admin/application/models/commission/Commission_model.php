<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Commission_model extends CI_Model {
	function __construct() {
         parent::__construct();
	}
	
	function addCommission($data = array(), $customer_id) {
        $this->db->trans_start();
        $this->db->query("UPDATE  commission set status='0' where trainer_id = '".$customer_id."' ");
	    $this->db->query("INSERT INTO commission set trainer_id = '".$customer_id."', platform_commission = '" . $data['platform_commission'] . "',  commission_start_date  = '" . $data['commission_start_date'] . "', status='1' ");
	    $insert_id = $this->db->insert_id();
	    $this->db->trans_complete();
	}
    function editCommission($data = array(), $commission_id,$customer_id) {
        $this->db->trans_start();
        $this->db->query("UPDATE  commission set status='0' where trainer_id = '".$customer_id."' ");
	    $this->db->query("UPDATE  commission set platform_commission = '" . $data['platform_commission'] . "', commission_start_date = '" . $data['commission_start_date'] . "',status='1'  where commission_id= '".$commission_id."' ");
	    
        $this->db->trans_complete();
        
        return $user_id;
    }
    

    function getCommissionAll($customer_id) {
         $query = $this->db->query("SELECT *,c.status as comm_status FROM `commission` as c, `customer` as ct WHERE c.trainer_id = ct.customer_id and c.trainer_id='".$customer_id."' order by commission_start_date desc");

     //   $query = $this->db->query("SELECT * FROM `commission` where customer_id= '".$customer_id."'");
        $result = $query->result();
        return $result;
    }

  
    
    function getCommissionData($commission_id) {
        $query = $this->db->query("SELECT * FROM `commission` WHERE commission_id = '" . $commission_id . "'");
        $result = $query->row();
        return $result;
    }
}
