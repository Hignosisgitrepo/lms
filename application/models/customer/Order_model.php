<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {
	function __construct() {
         parent::__construct();
	}
	
	function addOrder($data , $customer_id, $payment_code, $payment_method) {
	    $this->db->query("INSERT INTO `order` SET invoice_prefix = 'LMS', store_id = '', store_name = 'LMS', store_url = '', customer_id = '" . $customer_id . "', payment_firstname = '" . $data['shipping_name'] . "', payment_address_1 = '" . $data['shipping_street'] . "', payment_city = '" . $data['shipping_city'] . "', payment_postcode = '" . $data['shipping_zip'] . "', payment_country = '" . $data['shipping_country_name'] . "', payment_country_code = '" . $data['shipping_country_code'] . "', payment_zone = '" . $data['shipping_state'] . "', payment_method = '" . $payment_method . "', payment_code = '" . $payment_code . "', shipping_firstname = '" . $data['shipping_name'] . "', shipping_address_1 = '" . $data['shipping_street'] . "', shipping_city = '" . $data['shipping_city'] . "', shipping_postcode = '" . $data['shipping_zip'] . "', shipping_country = '" . $data['shipping_country_name'] . "', shipping_country_code = '" . $data['shipping_country_code'] . "', shipping_zone = '" . $data['shipping_state'] . "',  total = '300', commission = '12', date_added = NOW(), date_modified = NOW()");

		$order_id = $this->db->insert_id();

		// Products
		if (isset($data['shopping_cart']['items'])) {
			foreach ($data['shopping_cart']['items'] as $product) {
				$this->db->query("INSERT INTO order_product SET order_id = '" . (int)$order_id . "', product_id = '" . (int)$product['training_master_id'] . "', name = '" . $product['name'] . "', quantity = '" . (int)$product['qty'] . "', price = '" . (float)$product['price'] . "', total = '" . (float)$product['price'] . "'");

				$order_product_id = $this->db->insert_id();
				
				$this->db->query("DELETE FROM shopping_cart WHERE cart_id = '" . (int)$product['cart_id'] . "'");
				
			}
		}
				/*		foreach ($product['option'] as $option) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "order_option SET order_id = '" . (int)$order_id . "', order_product_id = '" . (int)$order_product_id . "', product_option_id = '" . (int)$option['product_option_id'] . "', product_option_value_id = '" . (int)$option['product_option_value_id'] . "', name = '" . $this->db->escape($option['name']) . "', `value` = '" . $this->db->escape($option['value']) . "', `type` = '" . $this->db->escape($option['type']) . "'");
				}
			}
		}

		// Gift Voucher
		$this->load->model('extension/total/voucher');

		// Vouchers
		if (isset($data['vouchers'])) {
			foreach ($data['vouchers'] as $voucher) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_voucher SET order_id = '" . (int)$order_id . "', description = '" . $this->db->escape($voucher['description']) . "', code = '" . $this->db->escape($voucher['code']) . "', from_name = '" . $this->db->escape($voucher['from_name']) . "', from_email = '" . $this->db->escape($voucher['from_email']) . "', to_name = '" . $this->db->escape($voucher['to_name']) . "', to_email = '" . $this->db->escape($voucher['to_email']) . "', voucher_theme_id = '" . (int)$voucher['voucher_theme_id'] . "', message = '" . $this->db->escape($voucher['message']) . "', amount = '" . (float)$voucher['amount'] . "'");

				$order_voucher_id = $this->db->getLastId();

				$voucher_id = $this->model_extension_total_voucher->addVoucher($order_id, $voucher);

				$this->db->query("UPDATE " . DB_PREFIX . "order_voucher SET voucher_id = '" . (int)$voucher_id . "' WHERE order_voucher_id = '" . (int)$order_voucher_id . "'");
			}
		}

		// Totals
		if (isset($data['totals'])) {
			foreach ($data['totals'] as $total) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_total SET order_id = '" . (int)$order_id . "', code = '" . $this->db->escape($total['code']) . "', title = '" . $this->db->escape($total['title']) . "', `value` = '" . (float)$total['value'] . "', sort_order = '" . (int)$total['sort_order'] . "'");
			}
		}*/

		return $order_id;
	}
	
	function getOrders($customer_id) {
	    $query = $this->db->query("SELECT * FROM `order` as o, `order_product` as op WHERE o.customer_id = '" . $customer_id . "' AND o.order_id = op.order_id");
	    $result = $query->result();
	    return $result;
	}
	
	function getTrainingData($training_master_id) {
	    $query = "SELECT  TM.* FROM training_master TM WHERE TM.training_master_id = ?";
	    
	    $result = $this->db->query($query, array($training_master_id));
	    
	    return $result->result();
	}
	
}
