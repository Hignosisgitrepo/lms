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
    
    function getTrainerData($trainer_id) {
        $query = $this->db->query("SELECT * FROM `trainer` WHERE trainer_id = '" . $trainer_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function activateTrainer($data = array()) {
        $this->db->trans_start();
        $trainer_data = $this->getTrainerData($data['trainer_id']);
        if(!empty($trainer_data)) {
            if($trainer_data->approve_status == 1) {
                $this->db->query("UPDATE `trainer` SET approve_status = 2 WHERE trainer_id = '" . $data['trainer_id'] . "'");
            } else {
                $this->db->query("UPDATE `trainer` SET approve_status = 1 WHERE trainer_id = '" . $data['trainer_id'] . "'");
            }
        }
        $this->db->trans_complete();
    }
}
