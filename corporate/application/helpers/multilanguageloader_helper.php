<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if ( ! function_exists('initialize')){
		function initialize() {
			$ci =& get_instance();
			$ci->load->helper('language');
			
			$ci->load->database();
		    $query = $ci->db->query("SELECT * FROM setting WHERE `key` = 'default_language'");
			$result = $query->row();
			if(!empty($result)){
				$query1 = $ci->db->query("SELECT * FROM languages WHERE language_name = '" . $result->value . "'");
				$res = $query1->row();
			    $directory = $res->language_directory;
				return $directory;
		    }else{
			    $directory = 'english';
				return $directory;
		    }
		}
	}
?>