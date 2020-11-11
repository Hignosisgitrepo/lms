<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {
    
    public function getSearchData($keyword) {
        $this->db->order_by('training_master_id', 'DESC');
        $this->db->like("training_name", $keyword);
        $this->db->where("owner", 'T');
        return $this->db->get('training_master')->result_array();
    }
    
    function addSetup($data = array()) {
        $this->db->trans_start();
        $code = "config";
        
        $url = $this->config->item('default_url');
        if($_FILES['config_logo']['name'] == ''){
            $file_name = 'assets/dashboard/img/logo2.png';
        } else {
            if(is_uploaded_file($_FILES['config_logo']['tmp_name'])) {
                $file_name = $_FILES['config_logo']['name'];
                $fileSize = $_FILES["config_logo"]["size"]/1024;
                $fileType = $_FILES["config_logo"]["type"];
                $new_file_name= $file_name;
                $sourcePath = $_FILES['config_logo']['tmp_name'];
                $targetPath = $url."./assets/image/".$_FILES['config_logo']['name'];
                $config = array(
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => False,
                    'max_size' => "20240000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
                );
                
                $this->load->library('Upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('config_logo')) {
                    echo $this->upload->display_errors();
                } else {
                    $path = $this->upload->data();
                    $file_name = $path['file_name'];
                }
                if(move_uploaded_file($sourcePath,$targetPath)) {
                    $this->db->query("INSERT INTO setting SET project_id = '0', `code` = '" . $code . "', `key` = 'config_logo', `value` = '" . $targetPath . "'");
                }
            }
        }
        
        if($_FILES['config_icon']['name'] == ''){
            $file_name = 'assets/dashboard/img/favicon.png';
        } else {
            if(is_uploaded_file($_FILES['config_icon']['tmp_name'])) {
                $file_name = $_FILES['config_icon']['name'];
                $fileSize = $_FILES["config_icon"]["size"]/1024;
                $fileType = $_FILES["config_icon"]["type"];
                $new_file_name= $file_name;
                $sourcePath = $_FILES['config_icon']['tmp_name'];
                $targetPath = $url."./assets/image/".$_FILES['config_icon']['name'];
                $config = array(
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => False,
                    'max_size' => "20240000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
                );
                
                $this->load->library('Upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('config_icon')) {
                    echo $this->upload->display_errors();
                } else {
                    $path = $this->upload->data();
                    $file_name = $path['file_name'];
                }
                if(move_uploaded_file($sourcePath,$targetPath)) {
                    $this->db->query("INSERT INTO setting SET project_id = '0', `code` = '" . $code . "', `key` = 'config_icon', `value` = '" . $targetPath . "'");
                }
            }
        }
        
        foreach ($data as $key => $value) {
            if (substr($key, 0, strlen($code)) == $code) {
                if (!is_array($value)) {
                    $this->db->query("INSERT INTO setting SET project_id = '0', `code` = '" . $code . "', `key` = '" . $key . "', `value` = '" . $value . "'");
                } else {
                    $this->db->query("INSERT INTO setting SET project_id = '0', `code` = '" . $code . "', `key` = '" . $key . "', `value` = '" . json_encode($value, true) . "'");
                }
            }
        }
        $this->db->query("INSERT INTO general_setup SET status = '1', `created_by` = '0', `created_date` = Now()");
        $this->db->trans_complete();
    }
	
	function getMaintainanceValues($key){
        $query = $this->db->query("SELECT * FROM maintainance m, maintainance_detail md WHERE m.maintainance_name = '" . $key ."' AND m.maintainance_id = md.maintainance_id");
        $result = $query->result();
        return $result;
    }

    function getMaintainanceCommissionValues($key) {
        $query = $this->db->query("SELECT * FROM maintainance m, maintainance_detail md WHERE m.maintainance_name = '" . $key ."' AND m.maintainance_id = md.maintainance_id");
        $result = $query->row();
        return $result;
    }
    
    function getMaintainanceDetail($maintainance_detail_id) {
        $query=$this->db->query("SELECT * FROM maintainance_detail WHERE maintainance_detail_id = '" . $maintainance_detail_id. "'");
        $result = $query->row();
        return $result;
    }
    
    function getSetup() {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `general_setup`");
        $result = $query->row();
        return $result;
    }
    
    function getUserGroups() {
        $query = $this->db->query("SELECT * FROM `user_group`");
        $result = $query->result();
        return $result;
    }
    
    function getUserGroupName($user_group_id) {
        $query = $this->db->query("SELECT * FROM `user_group` WHERE user_group_id = '" . $user_group_id . "'");
        $result = $query->row();
        return $result;
    }
    
   

    function getLanguages() {
        $query = $this->db->query("SELECT * FROM `languages`");
        $result = $query->result();
        return $result;
    }
    
    function getCurrencies() {
        $query = $this->db->query("SELECT * FROM `currency`");
        $result = $query->result();
        return $result;
    }
    
    function getCurrency($currency_id) {
        $query = $this->db->query("SELECT * FROM `currency` WHERE currency_id = '" . $currency_id . "'");
        $result = $query->row();
        return $result;
    }
    
    public function getValueByKey($key, $code) {
        $query = $this->db->query("SELECT * FROM `setting` WHERE code = '" . $code . "' AND `key` = '" . $key . "'");
        $result = $query->row();
        return $result;
    }
    
    public function getByKey($key = '') {
        $query = $this->db->query("SELECT * FROM `setting` WHERE `key` = '" . $key . "'");
        $result = $query->row();
        return $result;
    }
    
    public function getLanguageDetail($lang = '') {
        $query = $this->db->query("SELECT * FROM `languages` WHERE language_id = '" . $lang . "'");
        $result = $query->row();
        return $result;
    }
    
    function getUserDetails($user_id) {
        $query = $this->db->query("SELECT * FROM `user` WHERE user_id = '" . $user_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function getCountries() {
        $query = $this->db->query("SELECT * FROM `countries`");
        $result = $query->result();
        return $result;
    }
    
    function getState($country_id) {
        $query = $this->db->query("SELECT * FROM `states` WHERE country_id = '" . $country_id . "'");
        $result = $query->result();
        return $result;
    }
    
    function getCity($state_id) {
        $query = $this->db->query("SELECT * FROM `cities` WHERE state_id = '" . $state_id . "'");
        $result = $query->result();
        return $result;
    }
    
    function getCountryData($country_id) {
        $query = $this->db->query("SELECT * FROM `countries` WHERE id = '" . $country_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function getStateData($state_id) {
        $query = $this->db->query("SELECT * FROM `states` WHERE id = '" . $state_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function getCityData($city_id) {
        $query = $this->db->query("SELECT * FROM `cities` WHERE id = '" . $city_id . "'");
        $result = $query->row();
        return $result;
    }
    
    function checkEmailExists($email) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `customer` WHERE email = '" . $email . "'");
        $result = $query->row();
        return $result;
    }
    
    function checkMobileExists($phone_number) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `customer` WHERE phone_number = '" . $phone_number . "'");
        $result = $query->row();
        return $result;
    }
    
    function addCustomer($data = array()) {
        $this->db->trans_start();
        $this->db->query("INSERT INTO `customer` SET first_name = '" . $data['first_name'] . "', last_name = '" . $data['last_name'] . "', status = '1', email = '" . $data['email'] . "', phone_code = '" . $data['phone_code'] . "', phone_number = '" . $data['telephone'] . "', is_trainer = '" . $data['is_trainer'] . "', password = '" . $data['pass'] . "'");
        
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function getCustomerData($customer_id) {
        $query = $this->db->query("SELECT * FROM `customer` as c, `trainer` as t WHERE c.customer_id = '" . $customer_id . "' AND c.customer_id = t.customer_id");
        $result = $query->row();
        return $result;
    }
    
    function getTrainerData($customer_id) {
        $query = $this->db->query("SELECT * FROM `trainer` WHERE customer_id = '" . $customer_id . "'");
        $result = $query->row();
        return $result;
    }
    
    public function getRandomPassword() {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    //For Course categories by Kshirod
    function getCategories() {
        $query = $this->db->query("SELECT * FROM `category` WHERE status = 1");
        $result = $query->result();
        return $result;
    }
    //For Course categories by Kshirod
    
    function sendMail($email_id, $subject, $message) {
        $mail_parameters = $this->getValueByKey('config_mail_parameters','config');
        if (!empty($mail_parameters)) {
            $data['config_mail_parameters'] = $mail_parameters->value;
        } else {
            $data['config_mail_parameters'] = '';
        }
        $smtp_host_name = $this->getValueByKey('config_smtp_host_name','config');
        if (!empty($smtp_host_name)) {
            $data['config_smtp_host_name'] = $smtp_host_name->value;
        } else {
            $data['config_smtp_host_name'] = '';
        }
        $smtp_username = $this->getValueByKey('config_smtp_username','config');
        if (!empty($smtp_username)) {
            $data['config_smtp_username'] = $smtp_username->value;
        } else {
            $data['config_smtp_username'] = '';
        }
        $smtp_password = $this->getValueByKey('config_smtp_password','config');
        if (!empty($smtp_password)) {
            $data['config_smtp_password'] = $smtp_password->value;
        } else {
            $data['config_smtp_password'] = '';
        }
        $smtp_port = $this->getValueByKey('config_smtp_port','config');
        if (!empty($smtp_port)) {
            $data['config_smtp_port'] = $smtp_port->value;
        } else {
            $data['config_smtp_port'] = '';
        }
        $smtp_timeout = $this->getValueByKey('config_smtp_timeout','config');
        if (!empty($smtp_timeout)) {
            $data['config_smtp_timeout'] = $smtp_timeout->value;
        } else {
            $data['config_smtp_timeout'] = '';
        }
        $company = $this->getValueByKey('config_company_name','config');
        if (!empty($company)) {
            $data['config_company_name'] = $company->value;
        } else {
            $data['config_company_name'] = '';
        }
        
        $this->load->library('email');
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'tls://' . $data['config_smtp_host_name'],
            'smtp_port' => $data['config_smtp_port'],
            'smtp_user' => $data['config_smtp_username'],
            'smtp_pass' => $data['config_smtp_password'],
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        
        //Email content
        $htmlContent = $message;
        
        $this->email->to($email_id);
        $this->email->from($data['config_smtp_username'],$data['config_company_name']);
        $this->email->subject($subject);
        $this->email->message($htmlContent);
        
        if ($this->email->send()) {
            
        } else {
            show_error($this->email->print_debugger());
        }
    }
    
    public function sendSms($smstext, $phone){
        $senderid = 'ATTIRE';
        $senderidapikey = '5926869d2ddf2';
        
        $api_url ='http://softsms.in/app/smsapi/index.php?key='.$senderidapikey.'&type=text&contacts='.$phone.'&senderid='.$senderid.'&msg='.urlencode($smstext);
        //$api_url ='http://api-alerts.solutionsinfini.com/v3/?method=sms.xml&api_key=A943f24b0b748bad767864c98f6ac26fa&xml='.urlencode($xmldata);
        $response = file_get_contents($api_url);
    }
}
