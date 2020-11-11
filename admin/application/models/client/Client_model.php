<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model {
	function __construct() {
         parent::__construct();
    }
    
    function getClientData($client_id) {
        $query = $this->db->query("SELECT * FROM `client` WHERE client_id = '" . $client_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function getAllEnquiries() {
        $query = $this->db->query("SELECT * FROM `corporate_enquiry` WHERE status != 1");
        $result = $query->result();
        return $result;
    }
    
    function getClientEnquiries($corporate_enquiry_id) {
        $query = $this->db->query("SELECT * FROM `corporate_enquiry` WHERE corporate_enquiry_id = '" . $corporate_enquiry_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function addClient($data = array(), $user_id) {
        $this->db->trans_start();
        $this->db->query("INSERT INTO `client` SET client_name = '" . $data['client_name'] . "', contact_name = '" . $data['contact_name'] . "', contact_phone = '" . $data['telephone'] . "', contact_email = '" . $data['email_id'] . "', status = 1, created_date = Now(), created_by = '" . $user_id . "'");
            
        $insert_id = $this->db->insert_id();
        
        $query = $this->db->query("SELECT * FROM `client_user_group` WHERE client_id = 0");
        $client_groups = $query->result();
        
        if(empty($client_groups)) {
            $query1 = $this->db->query("SELECT * FROM `user_group`");
            $results = $query1->result();
            foreach($results as $result) {
                $this->db->query("INSERT INTO `client_user_group` SET client_id = 0, user_group_name = '" . $result->user_group_name . "', permission = '" . $result->permission . "', created_date = Now(), created_by = '" . $user_id . "'");
                $this->db->query("INSERT INTO `client_user_group` SET client_id = '" . $insert_id . "', user_group_name = '" . $result->user_group_name . "', permission = '" . $result->permission . "', created_date = Now(), created_by = '" . $user_id . "'");
            }
        } else {
            foreach($client_groups as $result) {
                $this->db->query("INSERT INTO `client_user_group` SET client_id = '" . $insert_id . "', user_group_name = '" . $result->user_group_name . "', permission = '" . $result->permission . "', created_date = Now(), created_by = '" . $user_id . "'");
            }
        }
            
        
        
        $this->db->trans_complete();
    }
    
    function editClient($data = array(), $image, $user_id) {
        $this->db->trans_start();
        
        $client_data = $this->getClientData($data['client_id']);
        if($image == '') {
            $img = $client_data->image;
        } else {
            $img = $image; 
        }
        $this->db->query("UPDATE `client` SET contact_name = '" . $data['contact_name'] . "', address = '" . $data['address'] . "', city = '" . $data['city_id'] . "', state = '" . $data['state_id'] . "', image = '" . $img . "', country = '" . $data['country_id'] . "', pin = '" . $data['pin_code'] . "', modified_date = Now(), modified_by = '" . $user_id . "' WHERE client_id = '" . $data['client_id'] . "'");
        
        $this->db->trans_complete();
    }
    
    function checkClientExists($client_name) {
        $query = $this->db->query("SELECT count(*) as total FROM `client` WHERE client_name = '" . $client_name . "'");
        $result = $query->row();
        return $result;
    }
    
    function checkEmailExists($email) {
        $query = $this->db->query("SELECT count(*) as total FROM `client` WHERE contact_email = '" . $email . "'");
        $result = $query->row();
        return $result;
    }
    
    function checkTelephoneExists($telephone) {
        $query = $this->db->query("SELECT count(*) as total FROM `client` WHERE contact_phone = '" . $telephone . "'");
        $result = $query->row();
        return $result;
    }
    
    function getAllClients() {
        $query = $this->db->query("SELECT * FROM `client`");
        $result = $query->result();
        return $result;
    }
    
    function changeStatus($client_id) {
        $this->db->trans_start();
        $client_data = $this->getClientData($client_id);
        if(!empty($client_data)) {
            if($client_data->status == 1) {
                $this->db->query("UPDATE `client` SET status = 2 WHERE client_id = '" . $client_id . "'");
            } else {
                $this->db->query("UPDATE `client` SET status = 1 WHERE client_id = '" . $client_id . "'");
            }
        }
        $this->db->trans_complete();
    }
    
    function getClientUsers($client_id) {
        $query = $this->db->query("SELECT * FROM `client_user` WHERE client_id = '" . $client_id . "'");
        $result = $query->result();
        return $result;
    }
    
    function getClientUserGroups($client_id) {
        $query = $this->db->query("SELECT * FROM `client_user_group` WHERE client_id = '" . $client_id . "'");
        $result = $query->result();
        return $result;
    }
    
    function checkUsernameExists($username) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `client_user` WHERE username = '" . $username . "'");
        $result = $query->row();
        return $result;
    }
    
    function checkIdExists($emp_id) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `client_user` WHERE emp_id = '" . $emp_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function checkUserEmailExists($email_id) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `client_user` WHERE email = '" . $email_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function checkMobileExists($phone_no) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `client_user` WHERE phone_no = '" . $phone_no . "'");
        $result = $query->row();
        return $result;
    }
    
    function getAdmin($client_id) {
        $query = $this->db->query("SELECT * FROM `client_user_group` WHERE user_group_name = 'Admin' AND client_id = '" . $client_id . "'");
        $result = $query->row();
        
        $user_group_id = $result->client_user_group_id;
        $query1 = $this->db->query("SELECT COUNT(*) AS total FROM `client_user` WHERE client_user_group_id = '" . $user_group_id . "'");
        $user_query = $query1->row();
        return $user_query;
    }
    
    function createAdmin($client_id, $password, $user_id) {
        $this->db->trans_start();
        
        $query = $this->db->query("SELECT * FROM `client_user_group` WHERE user_group_name = 'Admin' AND client_id = '" . $client_id . "'");
        $result = $query->row();
        
        $user_group_id = $result->client_user_group_id;
        $client_data = $this->getClientData($client_id);
       // print_r($client_data);exit;
        
        $this->db->query("INSERT INTO `client_user` SET client_id = '" . $client_id . "', username = '" . $client_data->contact_email . "', password = '" . $password . "', email = '" . $client_data->contact_email . "', first_name = '" . $client_data->contact_name . "', last_name = '', phone_no = '" . $client_data->contact_phone . "', client_user_group_id = '" . $user_group_id. "', status = '1', created_date = Now(), created_by = '" . $user_id . "'");
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        return $insert_id;
    }
    
    function getClientUserData($user_id) {
        $query = $this->db->query("SELECT * FROM `client_user` WHERE client_user_id = '" . $user_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function getClientUserGroup($user_group_id) {
        $query = $this->db->query("SELECT * FROM `client_user_group` WHERE client_user_group_id = '" . $user_group_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function activateCorporate($data = array(), $user_id) {
        $this->db->trans_start();
        
        $client_data = $this->getClientEnquiries($data['corporate_enquiry_id']);
        $fullname = $client_data->first_name . ' ' . $client_data->last_name;
        $this->db->query("INSERT INTO `client` SET client_name = '" . $client_data->company_name . "', contact_name = '" . $fullname . "', contact_phone = '" . $client_data->phone . "', contact_email = '" . $client_data->email . "', status = 1, created_date = Now(), created_by = '" . $user_id . "'");
        
        $insert_id = $this->db->insert_id();
        
        $query = $this->db->query("SELECT * FROM `client_user_group` WHERE client_id = 0");
        $client_groups = $query->result();
        
        if(empty($client_groups)) {
            $query1 = $this->db->query("SELECT * FROM `user_group`");
            $results = $query1->result();
            foreach($results as $result) {
                $this->db->query("INSERT INTO `client_user_group` SET client_id = 0, user_group_name = '" . $result->user_group_name . "', permission = '" . $result->permission . "', created_date = Now(), created_by = '" . $user_id . "'");
                $this->db->query("INSERT INTO `client_user_group` SET client_id = '" . $insert_id . "', user_group_name = '" . $result->user_group_name . "', permission = '" . $result->permission . "', created_date = Now(), created_by = '" . $user_id . "'");
            }
        } else {
            foreach($client_groups as $result) {
                $this->db->query("INSERT INTO `client_user_group` SET client_id = '" . $insert_id . "', user_group_name = '" . $result->user_group_name . "', permission = '" . $result->permission . "', created_date = Now(), created_by = '" . $user_id . "'");
            }
        }
        $this->db->query("UPDATE `corporate_enquiry` SET status = 1 WHERE corporate_enquiry_id = '" . $data['corporate_enquiry_id'] . "'");
        
        $this->db->trans_complete();
    }
    
    function rejectCorporate($data = array(), $user_id) {
        $this->db->trans_start();
        $this->db->query("UPDATE `corporate_enquiry` SET reject_message = '" . $data['reject_msg'] . "', status = 2, modified_date = Now(), modified_by = '" . $user_id . "' WHERE corporate_enquiry_id = '" . $data['corporate_enquiry_id'] . "'");
        
        $this->db->trans_complete();
    }
}
