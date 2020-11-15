<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model {
	function __construct() {
         parent::__construct();
	}
	
	function addToCart($data = array()) {
	    $query = "INSERT INTO corporate_shopping_cart (user_id, session_id, product_id, qty, created_date) VALUES (?, ?, ?, ?, ?)";
	    
	    $result = $this->db->query($query, array($data['userId'], $data['session_id'],  $data['training_master_id'], $data['qty'], $data['created_date']));
	    $insert_id = $this->db->insert_id();
	    
	    $data = array('insert_id' => $insert_id,
	        'result' => $result);
	    
	    return $data;
	}
	
	function updateCart($data = array(), $user_id) {
	    $this->db->trans_start();
	    foreach($data as $item) {
	        $this->db->query("UPDATE `corporate_shopping_cart` SET user_id = '" . $user_id . "' WHERE cart_id = '" . $item->cart_id . "'");
	    }
	    $this->db->trans_complete();
	}
    
    function getTotalInCart($data = array()) {
        $query = $this->db->query("SELECT COUNT(*) as total FROM `corporate_shopping_cart` WHERE session_id = '" . $data['session_id'] . "' AND user_id = '" . $data['userId'] . "'");
        $result = $query->row();
        return $result;
    }
    
    function getCartItems($data = array()) {
        $query = $this->db->query("SELECT * FROM `corporate_shopping_cart` as sc, `training_master` as tm WHERE sc.user_id = '" . $data['userId'] . "' AND sc.session_id = '" . $data['session_id'] ."' AND sc.product_id = tm.training_master_id");
        $result = $query->result();
        return $result;
    }
    
    function deleteCart($data = array()) {
        $this->db->trans_start();
        $this->db->query("DELETE FROM `corporate_shopping_cart` WHERE cart_id = '" . $data['cart_id'] . "' AND user_id = '" . $data['userId'] . "'");
        
        $this->db->trans_complete();
    }
}
