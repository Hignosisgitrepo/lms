<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Setting_model extends CI_Model {

    function getSettings() {
        $query=$this->db->query("SELECT * FROM setting WHERE project_id = 0");
        $result = $query->result();
        return $result; 
    }
    
    function editSetting($data = array()) {
        //print_r($data);
        $this->db->trans_start();
        $code = "config";
        $logo_image = $this -> getKeyValue('config_logo');
        $icon_image = $this -> getKeyValue('config_icon');
        $this->db->query("DELETE FROM `setting` WHERE project_id = '0' AND `code` = '" . $code . "'");
        
        if($_FILES['config_logo']['name'] == ''){
            if (isset($logo_image)) {
                $file_name = $logo_image->value;
            } else {
                $file_name = '';
            }
        } else {
            $file_name = $_FILES['config_logo']['name'];
            $fileSize = $_FILES["config_logo"]["size"]/1024;
            $fileType = $_FILES["config_logo"]["type"];
            $new_file_name= $file_name;
            
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/image/",
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
        }
        $this->db->query("INSERT INTO setting SET project_id = '0', `code` = '" . $code . "', `key` = 'config_logo', `value` = '" . $file_name . "'");
        if($_FILES['config_icon']['name'] == ''){
            if (isset($icon_image)) {
                $file_name = $icon_image->value;
            } else {
                $file_name = '';
            }
        } else {
            $file_name = $_FILES['config_icon']['name'];
            $fileSize = $_FILES["config_icon"]["size"]/1024;
            $fileType = $_FILES["config_icon"]["type"];
            $new_file_name= $file_name;
            
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/image/",
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
        }
        $this->db->query("INSERT INTO setting SET project_id = '0', `code` = '" . $code . "', `key` = 'config_icon', `value` = '" . $file_name . "'");
        
        foreach ($data as $key => $value) {
            if (substr($key, 0, strlen($code)) == $code) {
                if (!is_array($value)) {
                    $this->db->query("INSERT INTO setting SET project_id = '0', `code` = '" . $code . "', `key` = '" . $key . "', `value` = '" . $value . "'");
                } else {
                   // echo "iff2";
                    
                    $this->db->query("INSERT INTO setting SET project_id = '0', `code` = '" . $code . "', `key` = '" . $key . "', `value` = '" . json_encode($value, true) . "'");
                }
            }
        }
        $this->db->trans_complete();
    }
        
    function getKeyValue($key){
        $query = $this->db->query("SELECT * FROM setting WHERE code = 'config' AND `key` = '" .$key ."'");
        $result = $query->row();
        return $result; 
    }
}
