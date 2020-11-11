<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Corporate_model extends CI_Model {
	function addEnquiry($data = array()) {
        $this->db->trans_start();
        $this->db->query("INSERT INTO `corporate_enquiry` SET first_name = '" . $data['co_first_name'] . "', last_name = '" . $data['co_last_name'] . "', company_name = '" . $data['co_company_name'] . "', domain_name = '" . $data['co_domain'] . "', email = '" . $data['co_work_mail'] . "', phone = '" . $data['co_phone_number'] . "', company_size = '" . $data['co_company_size'] . "', training_need = '" . $data['co_training_need'] ."', status = 0");
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
	}
	
	function checkCorporateEmailExists($email) {
	    $query = $this->db->query("SELECT COUNT(*) AS total FROM `corporate_enquiry` WHERE email = '" . $email . "'");
	    $result = $query->row();
	    return $result;
	}
	
	function checkCorporateMobileExists($phone_number) {
	    $query = $this->db->query("SELECT COUNT(*) AS total FROM `corporate_enquiry` WHERE phone = '" . $phone_number . "'");
	    $result = $query->row();
	    return $result;
	}
	
	function checkDomainExists($domain_name) {
	    $query = $this->db->query("SELECT COUNT(*) AS total FROM `corporate_enquiry` WHERE domain_name = '" . $domain_name . "'");
	    $result = $query->row();
	    return $result;
	}
	
	function checkCorporateExists($company_name) {
	    $query = $this->db->query("SELECT COUNT(*) AS total FROM `corporate_enquiry` WHERE company_name = '" . $company_name . "'");
	    $result = $query->row();
	    return $result;
	}
}
