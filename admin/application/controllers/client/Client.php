<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/AdminController.php';

class Client extends AdminController {

	public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper'));
        $this->load->library('form_validation');
        $this->load->model('client/client_model');
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('client_lang', language_folder($this->global['default_language'])->language_directory);
    } 
    
	public function index() {
	    $this->getList();
	}
	
	public function getList() {
	    $this->global['pageTitle'] = $this->lang->line('text_title');
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
	        $data['text_list'] = $this->lang->line('text_list');
	        $data['text_add'] = $this->lang->line('text_add');
	        $data['text_edit'] = $this->lang->line('text_edit');
	        $data['text_select'] = $this->lang->line('text_select');
	        $data['text_add_user'] = $this->lang->line('text_add_user');
	        $data['text_edit_user'] = $this->lang->line('text_edit_user');
	        
	        $data['text_dashboard'] = $this->lang->line('text_dashboard');
	        
	        $data['text_first_name'] = $this->lang->line('text_first_name');
	        $data['text_last_name'] = $this->lang->line('text_last_name');
	        $data['text_username'] = $this->lang->line('text_username');
	        $data['text_empname'] = $this->lang->line('text_empname');
	        $data['text_empid'] = $this->lang->line('text_empid');
	        $data['text_email'] = $this->lang->line('text_email');
	        $data['text_mobile'] = $this->lang->line('text_mobile');
	        $data['text_user_group'] = $this->lang->line('text_user_group');
	        $data['text_action'] = $this->lang->line('text_action');
	        $data['text_password'] = $this->lang->line('text_password');
	        $data['text_gender'] = $this->lang->line('text_gender');
	        $data['text_joining'] = $this->lang->line('text_joining');
	        $data['text_status'] = $this->lang->line('text_status');
	        
	        $data['text_client_name'] = $this->lang->line('text_client_name');
	        $data['text_contact_person'] = $this->lang->line('text_contact_person');
	        $data['text_telephone'] = $this->lang->line('text_telephone');
	        $data['text_id'] = $this->lang->line('text_id');
	        $data['text_email'] = $this->lang->line('text_email');
	        $data['text_status'] = $this->lang->line('text_status');
	        
	        $data['text_action'] = $this->lang->line('text_action');
	        
	        $data['text_no_data'] = $this->lang->line('text_no_data');
	        $data['text_change_status'] = $this->lang->line('text_change_status');
	        
	        $data['btn_edit'] = $this->lang->line('btn_edit');
	        $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
	        $data['btn_activate'] = $this->lang->line('btn_activate');
	        $data['btn_save'] = $this->lang->line('btn_save');
	        
	        $data['clients'] = array();
	        $results = $this->client_model->getAllClients();
	        foreach($results as $res) {
	            if($res->status == 1) {
	                $status_name = 'Active';
	            } else {
	                $status_name = 'Inactive';
	            }
	            
	            $check_admin = $this->client_model->getAdmin($res->client_id);
	            if($check_admin->total == 0) {
	                $admin_created = 0;
	                $admin_status = 'Not Created';
	            } else {
	                $admin_created = 1;
	                $admin_status = 'Created';
	            }
	            
	            $data['clients'][] = array(
	                'client_id' => $res->client_id,
	                'client_name' => $res->client_name,
	                'contact_person' => $res->contact_name,
	                'telephone' => $res->contact_phone,
	                'client' => 'CLT-' . $res->client_id,
	                'email' => $res->contact_email,
	                'status' => $res->status,
	                'status_name' => $status_name,
	                'admin_created' => $admin_created,
	                'admin_status' => $admin_status,
	                'created_date' => $res->created_date
	            );
	        }
	        
	        $this->loadViews("client/client_list", $this->global, $data, NULL , NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function addCorporate() {
	    $this->global['pageTitle'] = $this->lang->line('text_title');
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
	        $data['text_list'] = $this->lang->line('text_list');
	        $data['text_add'] = $this->lang->line('text_add');
	        $data['text_edit'] = $this->lang->line('text_edit');
	        $data['text_select'] = $this->lang->line('text_select');
	        $data['text_add_user'] = $this->lang->line('text_add_user');
	        $data['text_edit_user'] = $this->lang->line('text_edit_user');
	        
	        $data['text_dashboard'] = $this->lang->line('text_dashboard');
	        
	        $data['text_first_name'] = $this->lang->line('text_first_name');
	        $data['text_last_name'] = $this->lang->line('text_last_name');
	        $data['text_username'] = $this->lang->line('text_username');
	        $data['text_empname'] = $this->lang->line('text_empname');
	        $data['text_empid'] = $this->lang->line('text_empid');
	        $data['text_email'] = $this->lang->line('text_email');
	        $data['text_mobile'] = $this->lang->line('text_mobile');
	        $data['text_user_group'] = $this->lang->line('text_user_group');
	        $data['text_action'] = $this->lang->line('text_action');
	        $data['text_password'] = $this->lang->line('text_password');
	        $data['text_gender'] = $this->lang->line('text_gender');
	        $data['text_joining'] = $this->lang->line('text_joining');
	        $data['text_status'] = $this->lang->line('text_status');
	        
	        $data['text_client_name'] = $this->lang->line('text_client_name');
	        $data['text_contact_person'] = $this->lang->line('text_contact_person');
	        $data['text_telephone'] = $this->lang->line('text_telephone');
	        $data['text_id'] = $this->lang->line('text_id');
	        $data['text_email'] = $this->lang->line('text_email');
	        $data['text_status'] = $this->lang->line('text_status');
	        
	        $data['text_action'] = $this->lang->line('text_action');
	        
	        $data['text_no_data'] = $this->lang->line('text_no_data');
	        $data['text_change_status'] = $this->lang->line('text_change_status');
	        
	        $data['btn_edit'] = $this->lang->line('btn_edit');
	        $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
	        $data['btn_activate'] = $this->lang->line('btn_activate');
	        $data['btn_save'] = $this->lang->line('btn_save');
	        
	        
	        $this->loadViews("client/client_form", $this->global, $data, NULL , NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function view($b64_cid = NULL) {
	    $this->global['pageTitle'] = $this->lang->line('text_title');
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
	        if (is_null($b64_cid)) {
	            redirect(base_url().'corporates');
	        }
	        
	        $client_id = base64_decode(urldecode($b64_cid));
	        $data['text_list'] = $this->lang->line('text_list');
	        $data['text_edit'] = $this->lang->line('text_edit');
	        $data['text_view'] = $this->lang->line('text_view');
	        $data['text_select'] = $this->lang->line('text_select');
	        
	        $data['text_dashboard'] = $this->lang->line('text_dashboard');
	        $data['text_client'] = $this->lang->line('text_client');
	        
	        $data['text_client_name'] = $this->lang->line('text_client_name');
	        $data['text_contact_person'] = $this->lang->line('text_contact_person');
	        $data['text_telephone'] = $this->lang->line('text_telephone');
	        $data['text_id'] = $this->lang->line('text_id');
	        $data['text_email'] = $this->lang->line('text_email');
	        $data['text_address'] = $this->lang->line('text_address');
	        $data['text_city'] = $this->lang->line('text_city');
	        $data['text_state'] = $this->lang->line('text_state');
	        $data['text_country'] = $this->lang->line('text_country');
	        $data['text_pin'] = $this->lang->line('text_pin');
	        $data['text_users'] = $this->lang->line('text_users');
	        
	        $data['text_action'] = $this->lang->line('text_action');
	        $data['text_none'] = $this->lang->line('text_none');
	        
	        $data['text_no_data'] = $this->lang->line('text_no_data');
	        $data['text_change_status'] = $this->lang->line('text_change_status');
	        
	        $data['btn_edit'] = $this->lang->line('btn_edit');
	        $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
	        $data['btn_activate'] = $this->lang->line('btn_activate');
	        $data['btn_save'] = $this->lang->line('btn_save');
	        $data['btn_image'] = $this->lang->line('btn_image');
	        $data['btn_back'] = $this->lang->line('btn_back');
	        
	        $data['countries'] = $this->common_model->getCountries();
	        $data['user_groups'] = $this->client_model->getClientUserGroups($client_id);
	        $data['genders'] = $this->common_model->getMaintainanceValues('Gender');
	        
	        $result = $this->client_model->getClientData($client_id);
	        if(!empty($result)) {
	            if(!empty($result->client_name)) {
	                $data['client_name'] = $result->client_name;
	            } else {
	                $data['client_name'] = '';
	            }
	            if(!empty($result->client_id)) {
	                $data['client_id'] = 'CLT-'.$result->client_id;
	            } else {
	                $data['client_id'] = '';
	            }
	            if(!empty($result->contact_name)) {
	                $data['contact_person'] = $result->contact_name;
	            } else {
	                $data['contact_person'] = '';
	            }
	            if(!empty($result->contact_phone)) {
	                $data['telephone'] = $result->contact_phone;
	            } else {
	                $data['telephone'] = '';
	            }
	            if(!empty($result->address)) {
	                $data['address'] = $result->address;
	            } else {
	                $data['address'] = '';
	            }
	            if(!empty($result->city)) {
	                $data['city_id'] = $result->city;
	            } else {
	                $data['city_id'] = '0';
	            }
	            if(!empty($result->state)) {
	                $data['state_id'] = $result->state;
	            } else {
	                $data['state_id'] = '0';
	            }
	            if(!empty($result->country)) {
	                $data['country_id'] = $result->country;
	            } else {
	                $data['country_id'] = '0';
	            }
	            if(!empty($result->contact_email)) {
	                $data['email'] = $result->contact_email;
	            } else {
	                $data['email'] = '';
	            }
	            if(!empty($result->pin)) {
	                $data['pin'] = $result->pin;
	            } else {
	                $data['pin'] = '';
	            }
	            if(!empty($result->image)) {
	                $data['image'] =  base_url().$result->image;
	            } else {
	                $data['image'] = '';
	            }
	            $country = $this->common_model->getCountryData($result->country);
	            $state = $this->common_model->getStateData($result->state);
	            $city = $this->common_model->getCityData($result->city);
	            
	            if(!empty($country)) {
	                $data['country_name'] = ', '.$country->name;
	            } else {
	                $data['country_name'] = '';
	            }
	            if(!empty($state)) {
	                $data['state_name'] = ', '.$state->name;
	            } else {
	                $data['state_name'] = '';
	            }
	            if(!empty($city)) {
	                $data['city_name'] = ', '.$city->name;
	            } else {
	                $data['city_name'] = '';
	            }
	        } else {
	            $data['client_name'] = '';
	            $data['client_id'] = '';
	            $data['contact_person'] = '';
	            $data['telephone'] = '';
	            $data['address'] = '';
	            $data['city_id'] = '0';
	            $data['state_id'] = '0';
	            $data['country_id'] = '0';
	            $data['city'] = '';
	            $data['state'] = '';
	            $data['country'] = '';
	            $data['email'] = '';
	            $data['pin'] = '';
	            $data['image'] = '';
	            $data['country_name'] = '----';
	            $data['state_name'] = '----';
	            $data['city_name'] = '----';
	        }
	        
	        $client_users = $this->client_model->getClientUsers($client_id);
	        $data['users'] = array();
	        foreach($client_users as $res) {
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
	            
	            $user_group = $this->client_model->getClientUserGroup($res->client_user_group_id);
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
	        
	        $data['client_id'] = $client_id; 
	        
	        $this->loadViews("client/view_client", $this->global, $data, NULL , NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function createAdmin() {
	    $data = array(
	        'b64_cid' => $this->input->post('b64_cid')
	    );
	    
	    if (is_null($data['b64_cid'])) {
	        redirect(base_url().'corporates');
	    }
	    
	    $client_id = base64_decode(urldecode($data['b64_cid']));
	    $json = array();
	    
	    $password = getRandomPassword(8);
	    $pass = getHashedPassword($password);
	    
	    $id = $this->client_model->createAdmin($client_id, $pass, $this->global['userId']);
	    
	    $user_data = $this->client_model->getClientUserData($id);
	    $email_id = $user_data->email;
	    $phone = $user_data->phone_no;
	    $name = $user_data->first_name . ' ' . $user_data->last_name;
	    $pass = $password;
	    $username = $user_data->username;
	    
	    $subject = 'Client Admin Created';
	    $message = 'Dear ' . $name . ',<br>';
	    $message .= 'Your creadintial has been created.<br>';
	    $message .= 'Your Username : ' . $username . ' and Password = ' . $pass . '.';
	    
	    $this->common_model->sendMail($email_id, $subject, $message);
	    $this->common_model->sendSms($message, $phone);
	    
	    $json['msg'] = $message;
	    $json['success'] = $this->lang->line('text_addsuccesss');
	    
	    echo json_encode($json);
	}
	
	public function addClient() {
	    $data = array(
	        'client_name' => $this->input->post('client_name'),
	        'contact_name' => $this->input->post('contact_name'),
	        'email_id' => $this->input->post('email_id'),
	        'telephone' => $this->input->post('telephone')
	    );
	    
	    $err =0;
	    
	    if(empty($data['client_name'])) {
	        $json['err_client'] = $this->lang->line('err_client');
	        $err++;
	    } else {
	        $check_client = $this->client_model->checkClientExists($data['client_name']);
	        if($check_client->total > 0) {
	            $json['err_client'] = $this->lang->line('err_dup_client');
	            $err++;
	        }
	    }
	    
	    if(empty($data['contact_name'])) {
	        $json['err_contact'] = $this->lang->line('err_contact');
	        $err++;
	    }
	    
	    if(empty($data['email_id'])) {
	        $json['err_email'] = $this->lang->line('err_email');
	        $err++;
	    } else {
	        if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,10}$/i", $data['email_id'])) {
	            $json['err_email'] = $this->lang->line('err_invalidmail');
	            $err++;
	        } else {
    	        $check_email = $this->client_model->checkEmailExists($data['email_id']);
    	        if($check_email->total > 0) {
    	            $json['err_email'] = $this->lang->line('err_dupemail');
    	            $err++;
    	        }
	        }
	    }
	    
	    if(empty($data['telephone'])) {
	        $json['err_telephone'] = $this->lang->line('err_telephone');
	        $err++;
	    } else {
	        $check_telephone = $this->client_model->checkTelephoneExists($data['telephone']);
	        if($check_telephone->total > 0) {
	            $json['err_telephone'] = $this->lang->line('err_duptelephone');
	            $err++;
	        }
	    }
	    
	    if($err == 0) {
	        $this->client_model->addClient($data, $this->global['userId']);
	        $json['success'] = $this->lang->line('text_addsuccesss');
	    }
	    
	    echo json_encode($json);
	}
	
	public function editClientData() {
	    $data = array(
	        'b64_cid' => $this->input->post('b64_cid'),
	        'contact_name' => $this->input->post('contact_name'),
	        'address' => $this->input->post('address'),
	        'country_id' => $this->input->post('country_id'),
	        'state_id' => $this->input->post('state_id'),
	        'city_id' => $this->input->post('city_id'),
	        'pin_code' => $this->input->post('pin_code')
	    );
	    
	    if (is_null($data['b64_cid'])) {
	        redirect(base_url().'client-view');
	    }
	    
	    $data['client_id'] = base64_decode(urldecode($data['b64_cid']));
	    
	    $err =0;
	    
	    if(empty($data['contact_name'])) {
	        $json['err_contact'] = $this->lang->line('err_contact');
	        $err++;
	    }
	    
	    $targetPath = '';
	    if($err == 0){
	        if(is_array($_FILES)) {
	            if(is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
	                $sourcePath = $_FILES['profile_image']['tmp_name'];
	                $targetPath = "./assets/image/".$_FILES['profile_image']['name'];
	                if(move_uploaded_file($sourcePath,$targetPath)) {
	                    
	                }
	            }
	        }
	        $this->client_model->editClient($data, $targetPath, $this->global['userId']);
	        $json['success'] = 1;
	        $json['success'] = $this->lang->line('text_editsuccesss');
	    }
	    
	    echo json_encode($json);
	}
	
	public function changeStatus() {
	    $data = array(
	        'b64_cid' => $this->input->post('b64_cid')
	    );
	    if (is_null($data['b64_cid'])) {
	        redirect(base_url().'clients');
	    }
	    
	    $data['client_id'] = base64_decode(urldecode($data['b64_cid']));
	    
	    $this->client_model->changeStatus($data['client_id']);
	    $json['success'] = 1;
	    
	    echo json_encode($json);
	}
}
