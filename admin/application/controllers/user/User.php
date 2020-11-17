<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/AdminController.php';

class User extends AdminController {

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
    	    $data['text_branch'] = $this->lang->line('text_branch');
    	    
    	    $data['text_select'] = $this->lang->line('text_select');
    	    $data['text_no_data'] = $this->lang->line('text_no_data');
    	    $data['text_change_status'] = $this->lang->line('text_change_status');
    	    $data['text_report'] = $this->lang->line('text_report');
    	    
    	    $data['btn_edit'] = $this->lang->line('btn_edit');
    	    $data['btn_add'] = $this->lang->line('btn_add');
    	    $data['btn_remove'] = $this->lang->line('btn_remove');
    	    $data['btn_deactivate'] = $this->lang->line('btn_deactivate');
    	    $data['btn_activate'] = $this->lang->line('btn_activate');
    	    $data['btn_search'] = $this->lang->line('btn_search');
    	    $data['btn_submit'] = $this->lang->line('btn_submit');
    	    
    	    $data['user_groups'] = $this->common_model->getUserGroups();
    	    $data['genders'] = $this->common_model->getMaintainanceValues('Gender');
    	    
    	    $data['users'] = array();
    	    $results = $this->user_model->getAllEmployees($this->global['userId']);
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
    	        
    	        $user_group = $this->common_model->getUserGroupName($res->user_group_id);
    	        $data['users'][] = array(
    	            'emp_user_id' => $res->user_id,
    	            'emp_id' => $res->emp_id,
    	            'username' => $res->username,
    	            'password' => $res->password,
    	            'email' => $res->email,
    	            'name' => $res->first_name . ' ' . $res->last_name,
    	            'phone_no' => $res->phone_no,
    	            'image' => $image,
    	            'group_name' => $user_group->user_group_name,
    	            'user_group_id' => $res->user_group_id,
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
	        'usergroup_id' => $this->input->post('usergroup_id')
	    );
	    //$this->common_model->sendMail(1);
	    
	    $err =0;
	    
	    if(empty($data['first_name'])) {
	        $json['err_employeename'] = $this->lang->line('err_employeename');
	        $err++;
	    }
	    
	    if(empty($data['email_id'])) {
	        $json['err_emailid'] = $this->lang->line('err_emailid');
	        $err++;
	    } else {
	        if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,10}$/i", $data['email_id'])) {
	            $json['err_emailid'] = $this->lang->line('err_invalidmail');
	            $err++;
	        } else {
	            $check_email = $this->user_model->checkEmailExists($data['email_id']);
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
	    
	    if($err == 0) {
	        $id = $this->user_model->addUser($data, $this->global['userId']);
	        
	        $user_data = $this->user_model->getUser($id);
	        $email_id = $user_data->email;
	        $phone = $user_data->phone_no;
	        $name = $user_data->first_name . ' ' . $user_data->last_name;
	        $pass = $password;
	        $username = $user_data->username;
	        
	        $subject = 'Registration Success';
	        $message = 'Dear ' . $name . ',<br>';
	        $message .= 'Your creadintial has been created.<br>';
	        $message .= 'Your Username : ' . $username . ' and Password = ' . $pass . '.';
	        
	        //$this->common_model->sendMail($email_id, $subject, $message);
	        $this->common_model->sendSms($message, $phone);
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
	            redirect(base_url().'employees');
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
	        $data['text_username'] = $this->lang->line('text_username');
	        $data['text_empname'] = $this->lang->line('text_empname');
	        $data['text_empid'] = $this->lang->line('text_empid');
	        $data['text_email'] = $this->lang->line('text_email');
	        $data['text_mobile'] = $this->lang->line('text_mobile');
	        $data['text_user_group'] = $this->lang->line('text_user_group');
	        $data['text_action'] = $this->lang->line('text_action');
	        $data['text_password'] = $this->lang->line('text_password');
	        $data['text_joining'] = $this->lang->line('text_joining');
	        $data['text_birthday'] = $this->lang->line('text_birthday');
	        $data['text_address'] = $this->lang->line('text_address');
	        $data['text_gender'] = $this->lang->line('text_gender');
	        
	        $data['text_personal'] = $this->lang->line('text_personal');
	        $data['text_passport_no'] = $this->lang->line('text_passport_no');
	        $data['text_passport_exp_date'] = $this->lang->line('text_passport_exp_date');
	        $data['text_tel_no'] = $this->lang->line('text_tel_no');
	        $data['text_country'] = $this->lang->line('text_country');
	        $data['text_state'] = $this->lang->line('text_state');
	        $data['text_pin'] = $this->lang->line('text_pin');
	        $data['text_city'] = $this->lang->line('text_city');
	        $data['text_nationality'] = $this->lang->line('text_nationality');
	        $data['text_religion'] = $this->lang->line('text_religion');
	        $data['text_marital_status'] = $this->lang->line('text_marital_status');
	        $data['text_spouse_emp'] = $this->lang->line('text_spouse_emp');
	        $data['text_children_no'] = $this->lang->line('text_children_no');
	        
	        $data['tab_profile'] = $this->lang->line('tab_profile');
	        $data['tab_project'] = $this->lang->line('tab_project');
	        $data['tab_bank'] = $this->lang->line('tab_bank');
	        
	        $data['text_family'] = $this->lang->line('text_family');
	        $data['text_name'] = $this->lang->line('text_name');
	        $data['text_relation'] = $this->lang->line('text_relation');
	        
	        $data['text_emergency'] = $this->lang->line('text_emergency');
	        $data['text_primary'] = $this->lang->line('text_primary');
	        $data['text_secondary'] = $this->lang->line('text_secondary');
	        $data['text_alternative'] = $this->lang->line('text_alternative');
	        
	        $data['text_bank'] = $this->lang->line('text_bank');
	        $data['text_bank_name'] = $this->lang->line('text_bank_name');
	        $data['text_bank_ac'] = $this->lang->line('text_bank_ac');
	        $data['text_ifsc'] = $this->lang->line('text_ifsc');
	        $data['text_pan'] = $this->lang->line('text_pan');
	        
	        $data['text_education'] = $this->lang->line('text_education');
	        $data['text_institution_name'] = $this->lang->line('text_institution_name');
	        $data['text_course'] = $this->lang->line('text_course');
	        $data['text_start'] = $this->lang->line('text_start');
	        $data['text_completion'] = $this->lang->line('text_completion');
	        $data['text_degree'] = $this->lang->line('text_degree');
	        $data['text_grade'] = $this->lang->line('text_grade');
	        
	        $data['text_experience'] = $this->lang->line('text_experience');
	        $data['text_company_name'] = $this->lang->line('text_company_name');
	        $data['text_location'] = $this->lang->line('text_location');
	        $data['text_position'] = $this->lang->line('text_position');
	        
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
	        
	        $data['user_groups'] = $this->common_model->getUserGroups();
	        $data['countries'] = $this->common_model->getCountries();
	        
	        $result = $this->user_model->getUser($user_id);
	        $personal_data = $this->user_model->getEmployeePersonalData($user_id);
	        if(!empty($result)) {
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
	            } else {
	                $data['user_group_name'] = '';
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
	            if(!empty($result->gender)) {
	                $gender = $this->common_model->getMaintainanceDetail($result->gender);
	                $data['gen'] = $result->gender;
	                $data['gender'] = $gender->maintainance_value;
	            } else {
	                $data['gender'] = '----';
	                $data['gen'] = '';
	            }
	            if(!empty($result->branch_id)) {
	                $branch = $this->common_model->getBranchName($result->branch_id);
	                $data['branch_id'] = $result->branch_id;
	                if(!empty($branch)) {
	                    $data['branch_name'] = $branch->branch_name;
	                } else {
	                    $data['branch_name'] = '';
	                }
	            } else {
	                $data['branch_id'] = '';
	                $data['branch_name'] = '';
	            }
	        } else {
	            
	            $data['first_name'] = '';
	            $data['last_name'] = '';
	            $data['phone_no'] = '';
	            $data['image'] = '';
	            $data['user_group_name'] = '';
	            $data['emp_id'] = '';
	            $data['department_name'] = '';
	            $data['designation_name'] = '';
	            $data['email'] = '';
	            $data['joining_date'] = '';
	            $data['gender']= '';
	            $data['gen'] = '';
	            $data['designtn'] = '';
	            $data['departmnt'] = '';
	            $data['branch_id'] = '';
	            $data['branch_name'] = '';
	        }
	        if(!empty($personal_data)) {
	            $data['birth_date'] = date("jS F", strtotime($personal_data->birth_date));
	            $data['dob'] = $personal_data->birth_date;
	            if(!empty($personal_data->pin)) {
	                $data['pin'] = $personal_data->pin;
	            } else {
	                $data['pin'] = '';
	            }
	            
	            if(!empty($personal_data->address)) {
	                $data['address'] = $personal_data->address;
	            } else {
	                $data['address'] = '';
	            }
	            
	            if(!empty($personal_data->alternate_number)) {
	                $data['alternate_number'] = $personal_data->alternate_number;
	            } else {
	                $data['alternate_number'] = '';
	            }
	            
	            if(!empty($personal_data->country)) {
	                $data['country_id'] = $personal_data->country;
	                $country = $this->common_model->getCountryData($personal_data->country);
	                $data['country_name'] = ', '.$country->name;
	            } else {
	                $data['country_id'] = '';
	                $data['country_name'] = '';
	            }
	            
	            if(!empty($personal_data->state)) {
	                $data['state_id'] = $personal_data->state;
	                $state = $this->common_model->getStateData($personal_data->state);
	                $data['state_name'] = ', '.$state->name;
	            } else {
	                $data['state_id'] = '';
	                $data['state_name'] = '';
	            }
	            
	            if(!empty($personal_data->city)) {
	                $data['city_id'] = $personal_data->city;
	                $city = $this->common_model->getCityData($personal_data->city);
	                $data['city_name'] = ', '.$city->name;
	            } else {
	                $data['city_id'] = '';
	                $data['city_name'] = '';
	            }
	            
	            if(!empty($personal_data->alternate_number)) {
	                $data['tel'] = $personal_data->alternate_number;
	            } else {
	                $data['tel'] = '';
	            }
	            
	            if(!empty($personal_data->passport_no)) {
	                $data['passport_no'] = $personal_data->passport_no;
	            } else {
	                $data['passport_no'] = '';
	            }
	            
	            if(!empty($personal_data->passport_expiry_date)) {
	                $data['passport_expiry_date'] = $personal_data->passport_expiry_date;
	                $data['pass_exp_date'] = date("jS F", strtotime($personal_data->passport_expiry_date));
	            } else {
	                $data['passport_expiry_date'] = '';
	                $data['pass_exp_date'] = '';
	            }
	            
	            if(!empty($personal_data->nationality)) {
	                $data['nationality'] = $personal_data->nationality;
	                $data['nationality_name'] = $this->common_model->getMaintainanceDetail($personal_data->nationality)->maintainance_value;
	            } else {
	                $data['nationality'] = '';
	                $data['nationality_name'] = '';
	            }
	            
	            if(!empty($personal_data->religion)) {
	                $data['religion'] = $personal_data->religion;
	                $data['religion_name'] = $this->common_model->getMaintainanceDetail($personal_data->religion)->maintainance_value;
	            } else {
	                $data['religion'] = '';
	                $data['religion_name'] = '';
	            }
	            
	            if(!empty($personal_data->marital_status)) {
	                $data['marital_status'] = $personal_data->marital_status;
	                $data['marital_status_name'] = $this->common_model->getMaintainanceDetail($personal_data->marital_status)->maintainance_value;
	            } else {
	                $data['marital_status'] = '';
	                $data['marital_status_name'] = '';
	            }
	        } else {
	            $data['birth_date'] = '----';
	            $data['dob'] = '';
	            $data['address'] = '----';
	            $data['alternate_number'] = '----';
	            $data['country_id'] = '';
	            $data['state_id'] = '';
	            $data['city_id'] = '';
	            $data['pin'] = '----';
	            $data['country_name'] = '----';
	            $data['state_name'] = '----';
	            $data['city_name'] = '----';
	            $data['alternate_number'] = '----';
	            $data['tel'] = '----';
	            $data['passport_no'] = '----';
	            $data['pass_exp_date'] = '----';
	            $data['passport_expiry_date'] = '----';
	            $data['nationality'] = '';
	            $data['nationality_name'] = '----';
	            $data['religion'] = '';
	            $data['religion_name'] = '----';
	            $data['marital_status'] = '';
	            $data['marital_status_name'] = '----';
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
	
	public function getState() {
	    $json = array();
	    $this->load->model('general/common_model');
	    $data = array(
	        'country_id' => $this->input->post('country_id')
	    );
	    $json['states'] = $this->common_model->getState($data['country_id']);
	    echo json_encode($json);
	}
	
	public function getCity() {
	    $this->load->model('general/common_model');
	    $data = array(
	        'state_id' => $this->input->post('state_id')
	    );
	    
	    $json['city'] = $this->common_model->getCity($data['state_id']);
	    
	    echo json_encode($json);
	}
	
	public function editUser() {
	    $data = array(
	        'user_id' => $this->input->post('user_id'),
	        'first_name' => $this->input->post('first_name'),
	        'last_name' => $this->input->post('last_name'),
	        'phone_no' => $this->input->post('phone_no'),
	        'user_group_id' => $this->input->post('usergroup_id')
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
	    
	    if($err == 0){
	        $this->user_model->editData($data, $this->global['userId']);
	        $json['success'] = 1;
	        $json['success_msg'] = $this->lang->line('text_emp_success');
	    }
	    
	    echo json_encode($json);
	}
}
