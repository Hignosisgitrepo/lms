<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	function __construct() {
         parent::__construct();
    }
    function getTotalUser() {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `client_user`");
        $result = $query->row();
        return $result;
    }
    
    function checkUsernameExists($username) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `client_user` WHERE username = '" . $username . "'");
        $result = $query->row();
        return $result;
    }
    
    function checkEmailExists($key) {
        $this->db->where('email',$key);
        $query = $this->db->get('client_user');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
    
    function addNewUser($userInfo) {
        $this->db->trans_start();
        $this->db->insert('client_user', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function getUserDetails($userName, $password){
         $this->db->select("*");
         $whereCondition = $array = array('username' =>$userName,'password'=>$password);
         $this->db->where($whereCondition);
         $this->db->from('client_user');
         $query = $this->db->get();
         $sql = $this->db->last_query();
         //print_r($sql);
         return $query;
     }
     
     function loginMe($userName, $password) {
         $query = $this->db->query("SELECT * FROM client as cli, client_user as BaseTbl, client_user_group as Roles WHERE BaseTbl.username = '" . $userName . "' AND BaseTbl.status = 1 AND BaseTbl.client_user_group_id = Roles.client_user_group_id AND cli.status = 1 AND cli.client_id = BaseTbl.client_id");
         $user = $query->result();
         
         if(!empty($user)){
             if(verifyHashedPassword($password, $user[0]->password)){
                 return $user;
             } else {
                return array();
             }
         } else {
            return array();
         }
     }
     
     function getUserGroups($client_id) {
         $query = $this->db->query("SELECT * FROM user_group WHERE user_group_name != 'Admin' AND client_id = '" . $client_id . "'");
         $result = $query->result();
         return $result;
     }
     
     function saveData($data = array(), $user_id) {
         $this->db->trans_start();
         $this->db->query("INSERT INTO client_user SET username = '" . $data['username'] . "', password = '" . $data['password'] . "', email = '" . $data['email'] . "', name = '" . $data['name'] . "', phone_no = '" . $data['phone_no'] . "', user_group_id = '" . $data['user_group_id'] . "', status = '" . $data['status'] . "', created_date = NOW(), created_by = '" . $user_id . "'");
         
         $this->db->trans_complete();
     }
     
     function editData($data = array(), $user_id) {
         $this->db->trans_start();
         $this->db->query("UPDATE client_user SET first_name = '" . $data['first_name'] . "', last_name = '" . $data['last_name'] . "', phone_no = '" . $data['phone_no'] . "', client_user_group_id = '" . $data['user_group_id'] . "', corporate_designation_id = '" . $data['designation'] . "', status = '1', modified_date = NOW(), modified_by = '" . $user_id . "' WHERE client_user_id = '" . $data['user_id'] . "'");
         
         $this->db->trans_complete();
     }
     
     function getUsers($user_id) {
         $query = $this->db->query("SELECT * FROM client_user WHERE client_user_id != '" . $user_id . "'");
         $result = $query->result();
         return $result;
     }
     
     function checkNameExists($username) {
         $query = $this->db->query("SELECT COUNT(*) AS total FROM `client_user` WHERE username = '" . $username . "'");
         $result = $query->row();
         return $result;
     }
     
     function checkMobileExists($phone_no) {
         $query = $this->db->query("SELECT COUNT(*) AS total FROM `client_user` WHERE phone_no = '" . $phone_no . "'");
         $result = $query->row();
         return $result;
     }
     
     function checkMailExists($email) {
         $query = $this->db->query("SELECT COUNT(*) AS total FROM `client_user` WHERE email = '" . $email . "'");
         $result = $query->row();
         return $result;
     }
     
     function checkIdExists($emp_id) {
         $query = $this->db->query("SELECT COUNT(*) AS total FROM `client_user` WHERE emp_id = '" . $emp_id . "'");
         $result = $query->row();
         return $result;
     }
     
     function getUserGroup($user_group_id, $client_id) {
         $query = $this->db->query("SELECT * FROM `client_user_group` WHERE client_user_group_id = '" . $user_group_id . "' AND client_id = '" . $client_id . "'");
         $result = $query->row();
         return $result;
     }
     
     function getUser($user_id) {
         $query = $this->db->query("SELECT * FROM client_user WHERE client_user_id = '" . $user_id . "'");
         $result = $query->row();
         return $result;
     }
    
     function getTotalRole($user_group_name, $client_id) {
         $query = $this->db->query("SELECT COUNT(*) AS total FROM client_user_group WHERE user_group_name = '" . $user_group_name . "' AND client_id = '" . $client_id . "'");
         $result = $query->row();
         return $result;
     }
     
     public function addRoles($data = array(), $user_id, $client_id) {
         $this->db->trans_start();
         $this->db->query("INSERT INTO client_user_group SET client_id = '" . $client_id . "', user_group_name = '" . $data['user_group_name'] . "', permission = '" . (isset($data['permission']) ? (json_encode($data['permission'])) : '') . "', created_by = '" . $user_id . "', created_date = NOW()");

         $this->db->trans_complete();
     }
     
     public function editRoles($data = array(), $user_group_id, $user_id, $client_id) {
         $this->db->trans_start();
         $this->db->query("UPDATE client_user_group SET user_group_name = '" . $data['user_group_name'] . "', permission = '" . (isset($data['permission']) ? (json_encode($data['permission'])) : '') . "', created_by = '" . $user_id . "', created_date = NOW() WHERE client_user_group_id = '" . $user_group_id . "' AND client_id = '" . $client_id . "'");
         
         $this->db->trans_complete();
     }
     
     public function getUserGroupDetails($user_group_id) {
         $query = $this->db->query("SELECT * FROM roles WHERE user_group_id = '" . $user_group_id . "'");
         $result = $query->result();
         return $result;
     }
     
     public function getUserRoles($client_id) {
         $query = $this->db->query("SELECT * FROM client_user_group Where client_id = '" . $client_id . "'");
         $result = $query->result();
         return $result;
     }
     
     function getAllEmployees($user_id, $client_id) {
         $query = $this->db->query("SELECT * FROM `client_user` WHERE client_user_id != '" . $user_id . "' AND client_id = '" . $client_id . "'");
         $result = $query->result();
         return $result;
     }
     
     function addUser($data = array(), $user_id) {
         $this->db->trans_start();
         
         $this->db->query("INSERT INTO `client_user` SET client_id = '" . $data['client_id'] . "', username = '" . $data['email_id'] . "', password = '" . $data['password'] . "', email = '" . $data['email_id'] . "', first_name = '" . $data['first_name'] . "', last_name = '" . $data['last_name'] . "', phone_no = '" . $data['phone_no'] . "', client_user_group_id = '" . $data['usergroup_id'] . "', corporate_designation_id = '" . $data['designation'] . "', status = '1', created_date = Now(), created_by = '" . $user_id . "'");
         
         $insert_id = $this->db->insert_id();
         if(!empty($data['designation'])) {
             $getTrainings = $this->getTrainings($data['designation']);
             if(!empty($getTrainings)) {
                 foreach($getTrainings as $res) {
                     $this->db->query("INSERT INTO `assigned_training` SET employee_id = '" . $insert_id . "', training_map_master_id = '" . $res->training_map_master_id . "', status = '0', created_date = Now(), created_by = '" . $user_id . "'");
                 }
             }
         }
         
         $this->db->trans_complete();
         return $insert_id;
     }
     
     function getTrainings($designation_id) {
         $query = $this->db->query("SELECT * FROM `training_map_master` WHERE designation_id = '" . $designation_id . "'");
         $result = $query->result();
         return $result;
     }
     
     function getEmployeePersonalData($user_id) {
         $query = $this->db->query("SELECT * FROM `client_user_personal_detail` WHERE user_id = '" . $user_id . "'");
         $result = $query->row();
         return $result;
     }
     
     function changeStatus($user_id) {
         $this->db->trans_start();
         $emp_data = $this->getUser($user_id);
         if(!empty($emp_data)) {
             if($emp_data->status == 1) {
                 $this->db->query("UPDATE `client_user` SET status = 2 WHERE client_user_id = '" . $user_id . "'");
             } else {
                 $this->db->query("UPDATE `client_user` SET status = 1 WHERE client_user_id = '" . $user_id . "'");
             }
         }
         $this->db->trans_complete();
     }
}
