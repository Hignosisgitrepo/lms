<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	function __construct() {
         parent::__construct();
    }
    function getTotalUser() {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `user`");
        $result = $query->row();
        return $result;
    }
    
    function checkEmailExists($key) {
        $this->db->where('email',$key);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
    
    function addNewUser($userInfo) {
        $this->db->trans_start();
        $this->db->insert('user', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function getUserDetails($userName, $password){
         $this->db->select("*");
         $whereCondition = $array = array('username' =>$userName,'password'=>$password);
         $this->db->where($whereCondition);
         $this->db->from('user');
         $query = $this->db->get();
         $sql = $this->db->last_query();
         //print_r($sql);
         return $query;
     }
     
     function loginMe($userName, $password) {
         $query = $this->db->query("SELECT * FROM user as BaseTbl, user_group as Roles WHERE BaseTbl.username = '" . $userName . "' AND BaseTbl.status = 1 AND BaseTbl.user_group_id = Roles.user_group_id");
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
     
     function loginCustomer($email, $password) {
         $query = $this->db->query("SELECT * FROM customer WHERE email = '" . $email . "'");
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
     
     function getUserGroups() {
         $query = $this->db->query("SELECT * FROM user_group WHERE user_group_name != 'Admin'");
         $result = $query->result();
         return $result;
     }
     
     function saveData($data = array(), $user_id) {
         $this->db->trans_start();
         $this->db->query("INSERT INTO user SET username = '" . $data['username'] . "', password = '" . $data['password'] . "', email = '" . $data['email'] . "', name = '" . $data['name'] . "', phone_no = '" . $data['phone_no'] . "', user_group_id = '" . $data['user_group_id'] . "', status = '" . $data['status'] . "', created_date = NOW(), created_by = '" . $user_id . "'");
         
         $this->db->trans_complete();
     }
     
     function editData($data = array(), $user_id) {
         $this->db->trans_start();
         $this->db->query("UPDATE user SET email = '" . $data['email'] . "', name = '" . $data['name'] . "', phone_no = '" . $data['phone_no'] . "', user_group_id = '" . $data['user_group_id'] . "', status = '" . $data['status'] . "', modified_date = NOW(), modified_by = '" . $user_id . "'");
         
         $this->db->trans_complete();
     }
     
     function getUsers($user_id) {
         $query = $this->db->query("SELECT * FROM user WHERE user_id != '" . $user_id . "'");
         $result = $query->result();
         return $result;
     }
     
     function checkNameExists($username) {
         $query = $this->db->query("SELECT COUNT(*) AS total FROM `user` WHERE username = '" . $username . "'");
         $result = $query->row();
         return $result;
     }
     
     function checkMobileExists($phone_no) {
         $query = $this->db->query("SELECT COUNT(*) AS total FROM `user` WHERE phone_no = '" . $phone_no . "'");
         $result = $query->row();
         return $result;
     }
     
     function checkMailExists($email) {
         $query = $this->db->query("SELECT COUNT(*) AS total FROM `user` WHERE email = '" . $email . "'");
         $result = $query->row();
         return $result;
     }
     
     function getUserGroup($user_group_id) {
         $query = $this->db->query("SELECT * FROM `user_group` WHERE user_group_id = '" . $user_group_id . "'");
         $result = $query->row();
         return $result;
     }
     
     function getUser($user_id) {
         $query = $this->db->query("SELECT * FROM user WHERE user_id = '" . $user_id . "'");
         $result = $query->row();
         return $result;
     }
    
     function getTotalRole($user_group_name) {
         $query = $this->db->query("SELECT COUNT(*) AS total FROM user_group WHERE user_group_name = '" . $user_group_name . "'");
         $result = $query->row();
         return $result;
     }
     
     public function addRoles($data = array(), $user_id) {
         $this->db->trans_start();
         $this->db->query("INSERT INTO user_group SET user_group_name = '" . $data['user_group_name'] . "', permission = '" . (isset($data['permission']) ? (json_encode($data['permission'])) : '') . "', created_by = '" . $user_id . "', created_date = NOW()");

         $this->db->trans_complete();
     }
     
     public function editRoles($data = array(), $user_group_id, $user_id) {
         $this->db->trans_start();
         $this->db->query("UPDATE user_group SET user_group_name = '" . $data['user_group_name'] . "', permission = '" . (isset($data['permission']) ? (json_encode($data['permission'])) : '') . "', created_by = '" . $user_id . "', created_date = NOW() WHERE user_group_id = '" . $user_group_id . "'");
         
         $this->db->trans_complete();
     }
     
     public function getUserGroupDetails($user_group_id) {
         $query = $this->db->query("SELECT * FROM roles WHERE user_group_id = '" . $user_group_id . "'");
         $result = $query->result();
         return $result;
     }
     
     public function getUserRoles() {
         $query = $this->db->query("SELECT * FROM user_group");
         $result = $query->result();
         return $result;
     }
     
     function getAllUsers($user_id) {
         $query = $this->db->query("SELECT * FROM `user` WHERE user_id != '" . $user_id . "'");
         $result = $query->result();
         return $result;
     }
}
