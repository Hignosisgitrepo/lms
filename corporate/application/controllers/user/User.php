<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/ClientController.php';

class User extends ClientController {

	public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->model('user/user_model');
        $this->load->model('setting/setting_model');
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('user_lang', language_folder($this->global['default_language'])->language_directory);
    } 
    
	public function index() {
	    $this->getList();
	}
	
	public function getList() {
	    $this->global['pageTitle'] = $this->lang->line('text_title');
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
	        
	        $data['text_dashboard'] = $this->lang->line('text_dashboard');
    	    $data['text_list'] = $this->lang->line('text_list');
    	    $data['text_add'] = $this->lang->line('text_add');
    	    $data['text_edit'] = $this->lang->line('text_edit');
    	    $data['text_select'] = $this->lang->line('text_select');
    	    
    	    $data['text_first_name'] = $this->lang->line('text_first_name');
    	    $data['text_last_name'] = $this->lang->line('text_last_name');
    	    $data['text_name'] = $this->lang->line('text_name');
    	    $data['text_email'] = $this->lang->line('text_email');
    	    $data['text_mobile'] = $this->lang->line('text_mobile');
    	    $data['text_user_group'] = $this->lang->line('text_user_group');
    	    $data['text_action'] = $this->lang->line('text_action');
    	    $data['text_status'] = $this->lang->line('text_status');
    	    
    	    $data['text_select'] = $this->lang->line('text_select');
    	    $data['text_no_data'] = $this->lang->line('text_no_data');
    	    $data['text_change_status'] = $this->lang->line('text_change_status');
    	    $data['text_report'] = $this->lang->line('text_report');
    	    
    	    $data['btn_edit'] = $this->lang->line('btn_edit');
    	    $data['btn_add'] = $this->lang->line('btn_add');
    	    $data['text_created'] = $this->lang->line('text_created');
    	    $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
    	    $data['btn_activate'] = $this->lang->line('btn_activate');
    	    $data['btn_search'] = $this->lang->line('btn_search');
    	    $data['btn_submit'] = $this->lang->line('btn_submit');
    	    
    	    $data['user_groups'] = $this->common_model->getUserGroups($this->global['client_id']);
    	    $data['genders'] = $this->common_model->getMaintainanceValues('Gender');
    	    
    	    $data['users'] = array();
    	    $results = $this->user_model->getAllEmployees($this->global['userId'], $this->global['client_id']);
    	    foreach($results as $res) {
    	        if(empty($res->image)) {
    	            $image = base_url().'assets/img/profiles/avatar-02.jpg';
    	        } else {
    	            $image = base_url().$res->image;
    	        }
    	        
    	        if($res->status == 1) {
    	            $status = 'Active';
    	        } else {
    	            $status = 'Inactive';
    	        }
    	        
    	        $user_group = $this->common_model->getUserGroupName($res->client_user_group_id, $this->global['client_id']);
    	        $data['users'][] = array(
    	            'emp_user_id' => $res->client_user_id,
    	            'emp_id' => $res->emp_id,
    	            'username' => $res->username,
    	            'password' => $res->password,
    	            'email' => $res->email,
    	            'name' => $res->first_name . ' ' . $res->last_name,
    	            'phone_no' => $res->phone_no,
    	            'image' => $image,
    	            'group_name' => $user_group->user_group_name,
    	            'user_group_id' => $res->client_user_group_id,
    	            'stat' => $res->status,
    	            'status' => $status,
    	            'created_date' => $res->created_date,
    	            'created_by' => $res->created_by,
    	            'modified_date' => $res->modified_date,
    	            'modified_by' => $res->modified_by
    	        );
    	    }
    	    
    	    $this->loadViews("user/user_list", $this->global, $data, NULL , NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function addUser() {
	    $data = array(
	        'first_name' => $this->input->post('first_name'),
	        'last_name' => $this->input->post('last_name'),
	        'email_id' => $this->input->post('email_id'),
	        'phone_no' => $this->input->post('phone_no'),
	        'usergroup_id' => $this->input->post('usergroup_id'),
	        'designation' => $this->input->post('designation')
	    );
	    //$this->common_model->sendMail(1);
	    
	    $err =0;
	    
	    if(empty($data['first_name'])) {
	        $json['err_firstname'] = $this->lang->line('err_firstname');
	        $err++;
	    }
	    
	    if(empty($data['email_id'])) {
	        $json['err_emailid'] = $this->lang->line('err_emailid');
	        $err++;
	    } else {
	        if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,10}$/i", $data['email_id'])) {
	            $json['err_emailid'] = $this->lang->line('err_invalidmail');
	            $err++;
	        } else {
	            $check_email = $this->user_model->checkMailExists($data['email_id']);
    	        if($check_email->total > 0) {
    	            $json['err_emailid'] = $this->lang->line('err_dup_email');
    	            $err++;
    	        }
	        }
	    }
	    
	    if(empty($data['phone_no'])) {
	        $json['err_phoneno'] = $this->lang->line('err_phoneno');
	        $err++;
	    } else {
	        if (!preg_match('/^[0-9]{10}+$/', $data['phone_no'])) {
	            $json['err_phoneno'] = $this->lang->line('err_invalidphone');
	            $err++;
	        } else {
    	        $check_phone = $this->user_model->checkMobileExists($data['phone_no']);
    	        if($check_phone->total > 0) {
    	            $json['err_phoneno'] = $this->lang->line('err_dup_phone');
    	            $err++;
    	        }
	        }
	    }
	    
	    if(empty($data['usergroup_id'])) {
	        $json['err_usergroup'] = $this->lang->line('err_usergroup');
	        $err++;
	    }
	    
	    $password = getRandomPassword(8);
	    $data['password'] = getHashedPassword($password);
	    $data['client_id'] = $this->global['client_id'];
	    
	    if($err == 0) {
	        $id = $this->user_model->addUser($data, $this->global['userId']);
	        
	        $user_data = $this->user_model->getUser($id);
	        $email_id = $user_data->email;
	        $name = $user_data->first_name . ' ' . $user_data->last_name;
	        $pass = $password;
	        $username = $user_data->username;
	        
	        $subject = 'Registration Success';
	        $message = 'Dear ' . $name . ',<br>';
	        $message .= 'Your creadintial has been created.<br>';
	        $message .= 'Your Username : ' . $username . ' and Password = ' . $pass . '.';
	        
	        //$this->common_model->sendMail($email_id, $subject, $message);
	        $json['msg'] = $message;
	        $json['success'] = $this->lang->line('text_addsuccesss');
	    }
	    
	    echo json_encode($json);
	}
	
	public function add() {
	    $user_id = 0;
	    $b64_uid = base64_decode(urldecode($user_id));
	    $this->getForm($b64_uid);
	}
	
	public function edit($b64_uid) {
	    if (is_null($b64_uid)) {
	        redirect(base_url().'employees');
	    }
	    
	    $user_id = base64_decode(urldecode($b64_uid));
	    $b64_uid = urlencode(base64_encode($user_id));
	    $this->getForm($b64_uid);
	}
	
	public function getForm($b64_uid = NULL) {
	    $this->global['pageTitle'] = $this->lang->line('text_title');
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
	         
	        if (is_null($b64_uid)) {
	            redirect(base_url().'users');
	        }
	        
	        $user_id = base64_decode(urldecode($b64_uid));
	        $data['text_dashboard'] = $this->lang->line('text_dashboard');
	        $data['text_form'] = $this->lang->line('text_form');
	        $data['text_add'] = $this->lang->line('text_add');
	        $data['text_edit'] = $this->lang->line('text_edit');
	        $data['text_select'] = $this->lang->line('text_select');
	        $data['text_delete'] = $this->lang->line('text_delete');
	        
	        $data['text_first_name'] = $this->lang->line('text_first_name');
	        $data['text_last_name'] = $this->lang->line('text_last_name');
	        $data['text_email'] = $this->lang->line('text_email');
	        $data['text_mobile'] = $this->lang->line('text_mobile');
	        $data['text_user_group'] = $this->lang->line('text_user_group');
	        $data['text_action'] = $this->lang->line('text_action');
	        $data['text_designation'] = $this->lang->line('text_designation');
	        
	        $data['text_none'] = $this->lang->line('text_none');
	        $data['text_no_data'] = $this->lang->line('text_no_data');
	        $data['text_yes'] = $this->lang->line('text_yes');
	        $data['text_no'] = $this->lang->line('text_no');
	        
	        $data['btn_send'] = $this->lang->line('btn_send');
	        $data['btn_add'] = $this->lang->line('btn_add');
	        $data['btn_remove'] = $this->lang->line('btn_remove');
	        $data['btn_submit'] = $this->lang->line('btn_submit');
	        $data['btn_image'] = $this->lang->line('btn_image');
	        $data['btn_edit'] = $this->lang->line('btn_edit');
	        $data['btn_back'] = $this->lang->line('btn_back');
	        
	        $client_id = $this->global['client_id'];
	        $data['user_groups'] = $this->common_model->getUserGroups($client_id);
	        $data['countries'] = $this->common_model->getCountries();
	        	        
	        $data['designations'] = $this->common_model->getClientDesignations($client_id);
	        
	        $data['employees'] = array();
	        $result = $this->user_model->getUser($user_id);
	        
	        if(!empty($result)) {
	            if(empty($result->image)) {
	                $data['image'] = base_url().'assets/img/profiles/avatar-02.jpg';
	            } else {
	                $data['image'] = base_url().$result->image;
	            }
	            if(!empty($result->first_name)) {
	                $data['first_name'] = $result->first_name;
	            } else {
	                $data['first_name'] = '';
	            }
	            if(!empty($result->last_name)) {
	                $data['last_name'] = $result->last_name;
	            } else {
	                $data['last_name'] = '';
	            }
	            if(!empty($result->phone_no)) {
	                $data['phone_no'] = $result->phone_no;
	            } else {
	                $data['phone_no'] = '';
	            }
	            if(!empty($result->user_group_id)) {
	                $user_group = $this->common_model->getUserGroupName($result->user_group_id);
	                $data['user_group_name'] = $user_group->user_group_name;
	                $data['user_group_name'] = $result->user_group_id;
	            } else {
	                $data['user_group_name'] = '';
	                $data['user_group_name'] = 0;
	            }
	            if(!empty($result->emp_id)) {
	                $data['emp_id'] = $result->emp_id;
	            } else {
	                $data['emp_id'] = '';
	            }
	            if(!empty($result->email)) {
	                $data['email'] = $result->email;
	            } else {
	                $data['email'] = '';
	            }
	            if(!empty($result->joining_date)) {
	                $data['joining_date'] = date("jS F Y", strtotime($result->joining_date));
	            } else {
	                $data['joining_date'] = '';
	            }
	            if(!empty($result->corporate_designation_id)) {
	                $designation_data = $this->common_model->getDesignationData($result->corporate_designation_id);
	                $data['designation'] = $result->corporate_designation_id;
	                $data['designation_name'] = $designation_data->designation_name;
	            } else {
	                $data['designation'] = '';
	                $data['designation_name'] = '';
	            }
	        } else {
	            
	            $data['first_name'] = '';
	            $data['last_name'] = '';
	            $data['phone_no'] = '';
	            $data['image'] = '';
	            $data['user_group_name'] = '';
	            $data['email'] = '';
	            $data['designation'] = '0';
	            $data['designation_name'] = '';
	            $data['user_group_id'] = 0;
	        }
	        $data['user_id'] = $user_id;
	        $this->loadViews("user/user_form", $this->global, $data, NULL , NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function changeStatus() {
	    $data = array(
	        'b64_uid' => $this->input->post('b64_uid')
	    );
	    if (is_null($data['b64_uid'])) {
	        redirect(base_url().'users');
	    }
	    
	    $data['user_id'] = base64_decode(urldecode($data['b64_uid']));
	    
	    $this->user_model->changeStatus($data['user_id']);
	    $json['success'] = 1;
	    
	    echo json_encode($json);
	}
	
	public function editUser() {
	    $data = array(
	        'user_id' => $this->input->post('user_id'),
	        'first_name' => $this->input->post('first_name'),
	        'last_name' => $this->input->post('last_name'),
	        'phone_no' => $this->input->post('phone_no'),
	        'user_group_id' => $this->input->post('usergroup_id'),
	        'designation' => $this->input->post('designation')
	    );
	    
	    $err =0;
	    
	    if(empty($data['first_name'])) {
	        $json['err_employeename'] = $this->lang->line('err_employeename');
	        $err++;
	    }
	    
	    if(empty($data['phone_no'])) {
	        $json['err_phoneno'] = $this->lang->line('err_phoneno');
	        $err++;
	    } else {
	        if (!preg_match('/^[0-9]{10}+$/', $data['phone_no'])) {
	            $json['err_phoneno'] = $this->lang->line('err_invalidphone');
	            $err++;
	        } else {
	            $check_phone = $this->user_model->checkMobileExists($data['phone_no']);
	            $emp_data = $this->user_model->getUser($data['user_id']);
	            if(($check_phone->total > 0) && ($emp_data->phone_no != $data['phone_no'])) {
	                $json['err_phoneno'] = $this->lang->line('err_dup_phone');
	                $err++;
	            }
	        }
	    }
	    
	    if(empty($data['user_group_id'])) {
	        $json['err_usergroup'] = $this->lang->line('err_usergroup');
	        $err++;
	    }
	    
	    $targetPath = '';
	    
	    if($err == 0){
	        $this->user_model->editData($data, $targetPath, $this->global['userId']);
	        $json['success'] = 1;
	        $json['success_msg'] = $this->lang->line('text_emp_success');
	    }
	    
	    echo json_encode($json);
	}
}
