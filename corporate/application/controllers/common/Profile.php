<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/ClientController.php';

class Profile extends ClientController {

	public function __construct() {
	    Parent::__construct();
	    $this->isLoggedIn();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper'));
        $this->load->model(array('user/user_model', 'common/common_model'));
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('user_lang', language_folder($this->global['default_language'])->language_directory);
    } 
    
    public function index() {
        $this->global['pageTitle'] = $this->lang->line('text_title');
	    //$this->global['menus'] = $this->menuCreation();
        $user_id = $this->global ['userId'];
        $data['text_dashboard'] = $this->lang->line('text_dashboard');
        $data['text_profile'] = $this->lang->line('text_profile');
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
        
        //$data['user_groups'] = $this->common_model->getUserGroups();
        $data['countries'] = $this->common_model->getCountries();
        
        $data['genders'] = $this->common_model->getMaintainanceValues('Gender');
        $data['marital_statuses'] = $this->common_model->getMaintainanceValues('Marital Status');
        $data['nationalities'] = $this->common_model->getMaintainanceValues('Nationality');
        $data['religions'] = $this->common_model->getMaintainanceValues('Religion');
        $data['relationships'] = $this->common_model->getMaintainanceValues('Relationship');
        $data['grades'] = $this->common_model->getMaintainanceValues('Grade');
        $data['specializations'] = $this->common_model->getMaintainanceValues('Specialization');
        $data['degrees'] = $this->common_model->getMaintainanceValues('Degree');
        
        $data['employees'] = array();
        $result = $this->user_model->getUser($user_id);
        $personal_data = $this->user_model->getEmployeePersonalData($user_id);
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
                $data['phone_no'] = '----';
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
                $data['email'] = '----';
            }
            if(!empty($result->joining_date)) {
                $data['joining_date'] = date("jS F Y", strtotime($result->joining_date));
            } else {
                $data['joining_date'] = '----';
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
            
            $data['first_name'] = '-----';
            $data['last_name'] = '-----';
            $data['phone_no'] = '-----';
            $data['image'] = '';
            $data['user_group_name'] = '----';
            $data['emp_id'] = '----';
            $data['department_name'] = '----';
            $data['designation_name'] = '----';
            $data['email'] = '----';
            $data['joining_date'] = '----';
            $data['gender']= '----';
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
        
        /* $bank_data = $this->user_model->getEmployeeBankData($user_id);
         if(!empty($bank_data)) {
         $data['bank_name'] = $bank_data->bank_name;
         $data['bank_ac'] = $bank_data->bank_account_no;
         $data['ifsc_code'] = $bank_data->ifsc_code;
         $data['pan_no'] = $bank_data->pan_no;
         } else {
         $data['bank_name'] = '----';
         $data['bank_ac'] = '----';
         $data['ifsc_code'] = '----';
         $data['pan_no'] = '-----';
         }
         
         $families = $this->user_model->getEmployeeFamilyData($user_id);
         $data['families'] = array();
         foreach($families as $family) {
         $relationship_name = $this->common_model->getMaintainanceDetail($family->relationship);
         $data['families'][] = array(
         'user_family_id'    => $family->user_family_id,
         'user_id'    => $family->user_id,
         'name'    => $family->name,
         'relationship'    => $family->relationship,
         'relationship_name'    => $family->relationship,
         'date_of_birth'    => date("jS F Y", strtotime($family->date_of_birth)),
         'dob'    => $family->date_of_birth,
         'phone'    => $family->phone,
         'priority'    => $relationship_name->maintainance_value
         );
         }
         //print_r($families);exit;
         
         
         $projects = $this->user_model->getEmployeeProjects($user_id);
         $data['projects'] = array();
         foreach($projects as $project) {
         if($project->status == 1) {
         $status = $this->lang->line('text_active');
         } else {
         $status = $this->lang->line('text_inactive');
         }
         $priority = $this->common_model->getMaintainanceDetail($project->priority);
         $user_data = $this->common_model->getUserDetails($project->project_leader);
         if(empty($user_data->image)) {
         $image = base_url().'assets/img/profiles/avatar-02.jpg';
         } else {
         $image = base_url().$user_data->image;
         }
         $data['projects'][] = array(
         'project_id'    => $project->project_id,
         'project_name'    => $project->project_name,
         'start_date'    => $project->start_date,
         'description'    => $project->description,
         'end_date'    => date("jS F Y", strtotime($project->end_date)),
         'status'    => $project->status,
         'status_name'    => $status,
         'priority'    => $priority->maintainance_value,
         'project_leader'    => $user_data->first_name.' '.$user_data->last_name,
         'leader_img'    => $image
         );
         }
         //print_r($data['projects']);exit;
         
         $data['salary_basiss'] = $this->common_model->getMaintainanceValues('Salary Basis Type');
         $data['payment_types'] = $this->common_model->getMaintainanceValues('Payment Type');
         
         $currency = $this->setting_model->getKeyValue('default_currency','default');
         if(!empty($currency)) {
         $data['currency_symbol'] = $this->common_model->getCurrency($currency->value) ->currency_symbol;
         } else {
         $data['currency_symbol'] = '₹';
         }
         
         $emp_salary_data = $this->user_model->getEmployeeSalary($user_id);
         if(!empty($emp_salary_data)) {
         $data['salary_type'] = $emp_salary_data->salary_type;
         $data['salary_amount'] = $emp_salary_data->salary_amount;
         $data['payment_type'] = $emp_salary_data->payment_type;
         $data['pf_contribution'] = $emp_salary_data->pf_contribution;
         $data['pf_no'] = $emp_salary_data->pf_no;
         $data['employee_pf_rate'] = $emp_salary_data->employee_pf_rate;
         $data['pf_additional_rate'] = $emp_salary_data->pf_additional_rate;
         $data['pf_total_rate'] =  $emp_salary_data->employee_pf_rate + $emp_salary_data->pf_additional_rate;
         $data['esi_contribution'] = $emp_salary_data->esi_contribution;
         $data['esi_no'] = $emp_salary_data->esi_no;
         $data['employee_esi_rate'] = $emp_salary_data->employee_esi_rate;
         $data['esi_additional_rate'] = $emp_salary_data->esi_additonal_rate;
         $data['esi_total_rate'] =  $emp_salary_data->employee_esi_rate + $emp_salary_data->esi_additonal_rate;
         } else {
         $data['salary_type'] = '';
         $data['salary_amount'] = '0.00';
         $data['payment_type'] = '';
         $data['pf_contribution'] = '';
         $data['pf_no'] = '';
         $data['employee_pf_rate'] = '0.00';
         $data['pf_additional_rate'] = '0.00';
         $data['pf_total_rate'] =  '0.00';
         $data['esi_contribution'] = '';
         $data['esi_no'] = '';
         $data['employee_esi_rate'] = '0.00';
         $data['esi_additional_rate'] = '0.00';
         $data['esi_total_rate'] =  '0.00';
         }
         
         $emergency_details = $this->user_model->getEmployeeEmergencyData($user_id);
         $data['emergencies'] = array();
         
         $ctr = 1;
         foreach($emergency_details as $emergency) {
         $status_name = $this->common_model->getMaintainanceDetail($emergency->relationship);
         if($ctr == 1) {
         $ctr_name = $this->lang->line('text_primary');
         } else {
         $ctr_name = $this->lang->line('text_secondary');
         }
         if(!empty($emergency->phone_2)) {
         $phone_2 = ', ' . $emergency->phone_2;
         } else {
         $phone_2 = '';
         }
         $data['emergencies'][] = array(
         'ctr'  => $ctr,
         'ctr_name'  => $ctr_name,
         'user_emergency_id'    => $emergency->user_emergency_id,
         'name'    => $emergency->name,
         'relationship'    => $emergency->relationship,
         'phone_1'    => $emergency->phone_1,
         'phone_2'    => $phone_2,
         'status_name'    => $status_name->maintainance_value
         );
         $ctr++;
         }
         
         $family_details = $this->user_model->getEmployeeFamilyData($user_id);
         $data['families'] = array();
         
         $ctr = 1;
         foreach($family_details as $family) {
         $status_name = $this->common_model->getMaintainanceDetail($family->relationship);
         $data['families'][] = array(
         'user_family_id'    => $family->user_family_id,
         'name'    => $family->name,
         'relationship'    => $family->relationship,
         'date_of_birth'    => date("F j, Y", strtotime($family->date_of_birth)),
         'phone'    => $family->phone,
         'status_name'    => $status_name->maintainance_value,
         );
         $ctr++;
         }
         
         $education_details = $this->user_model->getEducationData($user_id);
         $data['educations'] = array();
         
         foreach($education_details as $edu) {
         $specializationname = $this->common_model->getMaintainanceDetail($edu->specialization);
         $status_name = $this->common_model->getMaintainanceDetail($edu->degree);
         $grade_name = $this->common_model->getMaintainanceDetail($edu->grade);
         $data['educations'][] = array(
         'user_education_id'    => $edu->user_education_id,
         'institute_name'    => $edu->institute_name,
         'degree'    => $edu->degree,
         'specialization'    => $edu->specialization,
         'grade'    => $edu->grade,
         'start_date'    => date("Y", strtotime($edu->start_date)),
         'end_date'    => date("Y", strtotime($edu->end_date)),
         'status_name'    => $status_name->maintainance_value,
         'specializationname'    => $specializationname->maintainance_value,
         'grade_name'    => $grade_name->maintainance_value
         );
         }
         
         $experience_details = $this->user_model->getExperienceData($user_id);
         $data['experiences'] = array();
         
         foreach($experience_details as $exp) {
         $status_name = $this->common_model->getDesignationName($exp->job_position);
         $location_name = $this->common_model->getCountryData($exp->location);
         
         $date_diff = abs(strtotime($exp->end_date) - strtotime($exp->start_date));
         
         $years = floor($date_diff / (365*60*60*24));
         $months = floor(($date_diff - $years * 365*60*60*24) / (30*60*60*24));
         
         $data['experiences'][] = array(
         'user_experience_id'    => $exp->user_experience_id,
         'company_name'    => $exp->company_name,
         'location'    => $exp->location,
         'job_position'    => $exp->job_position,
         'start_date'    => date("M Y", strtotime($exp->start_date)),
         'end_date'    => date("M Y", strtotime($exp->end_date)),
         'diff'    => $years . ' Years and ' . $months . ' Months',
         'status_name'    => $status_name->designation_name,
         'location_name'    => $location_name->name
         );
         } */
        
        $data['user_id'] = $user_id;
        $this->loadViews("common/profile", $this->global, $data, NULL , NULL);
	}
}
