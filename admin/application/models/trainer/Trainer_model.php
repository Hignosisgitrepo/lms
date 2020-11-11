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
}
