<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/AdminController.php';

class Setting extends AdminController {
    
    private $data = array();
	public function __construct() {
        Parent::__construct();
        $this->isLoggedIn();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'url', 'security', 'email', 'cias_helper', 'array'));
        $this->load->model('setting/setting_model');
        $this->lang->load('common_lang', language_folder($this->global['default_language'])->language_directory);
        $this->lang->load('setting_lang', language_folder($this->global['default_language'])->language_directory);
    } 
    
	public function index() {
	    $this->global['pageTitle'] = $this->lang->line('text_project_title').$this->lang->line('text_pageTitle');
	    $this->global['menus'] = $this->menuCreation();
	    if ($this->hasPermission('access', $this->uri->segment('1'))) {
    	    $data['text_setting'] = $this->lang->line('text_pageTitle');
    	    $data['tab_general'] = $this->lang->line('tab_general');
    	    $data['tab_image'] = $this->lang->line('tab_image');
    	    $data['tab_mail'] = $this->lang->line('tab_mail');
    	    $data['tab_sms'] = $this->lang->line('tab_sms');
    	    $data['tab_help'] = $this->lang->line('tab_help');
    	    $data['tab_captcha'] = $this->lang->line('tab_captcha');
    	    $data['text_dashboard'] = $this->lang->line('text_dashboard');
    	    $data['text_localization'] = $this->lang->line('text_localization');
    	    $data['text_dashboard'] = $this->lang->line('text_dashboard');
    	    $data['btn_submit'] = $this->lang->line('btn_submit');
    	    $data['text_select'] = $this->lang->line('text_select');
    	    $data['text_none'] = $this->lang->line('text_none');
    	    
    	    $data['entry_company'] = $this->lang->line('entry_company');
    	    $data['entry_title'] = $this->lang->line('entry_title');
    	    $data['entry_address'] = $this->lang->line('entry_address');
    	    $data['entry_country'] = $this->lang->line('entry_country');
    	    $data['entry_city'] = $this->lang->line('entry_city');
    	    $data['entry_state'] = $this->lang->line('entry_state');
    	    $data['entry_pin'] = $this->lang->line('entry_pin');
    	    $data['entry_language'] = $this->lang->line('entry_language');
    	    $data['entry_captcha'] = $this->lang->line('entry_captcha');
    	    $data['entry_alerts'] = $this->lang->line('entry_alerts');
    	    $data['entry_alert_types'] = $this->lang->line('entry_alert_types');
    	    $data['entry_help_line'] = $this->lang->line('entry_help_line');
    	    $data['entry_timings'] = $this->lang->line('entry_timings');
    	    $data['entry_date_format'] = $this->lang->line('entry_date_format');
    	    $data['entry_timezone'] = $this->lang->line('entry_timezone');
    	    $data['entry_default_lang'] = $this->lang->line('entry_default_lang');
    	    $data['entry_currency_code'] = $this->lang->line('entry_currency_code');
    	    $data['entry_currency_symbol'] = $this->lang->line('entry_currency_symbol');
    	    $data['entry_contact_name'] = $this->lang->line('entry_contact_name');
    	    $data['entry_contact_email'] = $this->lang->line('entry_contact_email');
    	    $data['entry_alert_types'] = $this->lang->line('entry_alert_types');
    	    $data['entry_logo'] = $this->lang->line('entry_logo');
    	    $data['entry_icon'] = $this->lang->line('entry_icon');
    	    $data['entry_logo_witdh'] = $this->lang->line('entry_logo_witdh');
    	    $data['entry_logo_height'] = $this->lang->line('entry_logo_height');
    	    $data['entry_mail_engine'] = $this->lang->line('entry_mail_engine');
    	    $data['entry_mail_parameters'] = $this->lang->line('entry_mail_parameters');
    	    $data['entry_host'] = $this->lang->line('entry_host');
    	    $data['entry_username'] = $this->lang->line('entry_username');
    	    $data['entry_password'] = $this->lang->line('entry_password');
    	    $data['entry_port'] = $this->lang->line('entry_port');
    	    $data['entry_timeout'] = $this->lang->line('entry_timeout');
    	    $data['entry_sender_id'] = $this->lang->line('entry_sender_id');
    	    $data['entry_sender_api'] = $this->lang->line('entry_sender_api');
    	    $data['entry_captcha_page'] = $this->lang->line('entry_captcha_page');
    	    $data['entry_alert_page'] = $this->lang->line('entry_alert_page');
    	    $data['entry_footer_text'] = $this->lang->line('entry_footer_text');
    	    $data['entry_comments'] = $this->lang->line('entry_comments');
    	    
    	    $data['text_cap'] = $this->lang->line('text_cap');
    	    $data['text_arlt'] = $this->lang->line('text_arlt');
    	    $data['text_select'] = $this->lang->line('text_select');
    	    $data['text_change_logo'] = $this->lang->line('text_change_logo');
    	    $data['text_change_icon'] = $this->lang->line('text_change_icon');
    	    
    	    $data['mail_engines'] = $this->common_model -> getMaintainanceValues('Mail Engine');
    	    $data['languages'] = $this->common_model -> getLanguages();
    	    $data['countries'] = $this->common_model->getCountries();
    	    $data['languages'] = $this->common_model->getLanguages();
    	    $data['currencies'] = $this->common_model->getCurrencies();
    	    
    	    $data['date_formats'] = array(
    	        'F j, Y' => 'F j, Y',
    	        'm.d.y' => 'm.d.y',
    	        'j, n, Y' => 'j, n, Y',
    	        'D M Y' => 'D M Y',
    	        'Y-m-d' => 'Y-m-d',
    	        'd/m/Y' => 'd/m/Y',
    	        'd.m.Y' => 'd.m.Y',
    	        'd-m-Y' => 'd-m-Y',
    	        'm/d/Y' => 'm/d/Y',
    	        'Y/m/d' => 'Y/m/d',
    	        'Y-m-d' => 'Y-m-d',
    	        'M d Y' => 'M d Y',
    	        'd M Y' => 'd M Y'
    	    );
    	    
    	    $data['settings'] = $this->setting_model->getSettings();
    	    
    	    if (empty($data['settings'])) {
    	        $data['config_company_name'] = '';
    	        $data['config_language'] = '';
    	        $data['config_address'] = '';
    	        $data['config_country'] = '';
    	        $data['config_state'] = '';
    	        $data['config_city'] = '';
    	        $data['config_pin'] = '';
    	        /*$data['config_enable_captcha'] = '';
    	        $data['config_heading_title'] = '';
    	        $data['config_footer_text'] = '';
    	        $data['config_alerts'] = '';
    	        $data['config_alert_types'] = '';
    	        $data['config_alert_page'] = array(); */
    	        $data['config_help_line'] = '';
    	        $data['config_timings'] = '';
    	        $data['config_contact_name'] = '';
    	        $data['config_contact_email'] = '';
    	        $data['config_logo'] = '';
    	        $data['config_icon'] = '';
    	        $data['config_logo_height'] = '';
    	        $data['config_logo_witdh'] = '';
    	        $data['config_mail_engine'] = '';
    	        $data['config_mail_parameters'] = '';
    	        $data['config_smtp_host_name'] = '';
    	        $data['config_smtp_username'] = '';
    	        $data['config_smtp_password'] = '';
    	        $data['config_smtp_port'] = '';
    	        $data['config_smtp_timeout'] = '';
    	        $data['config_sender_id'] = '';
    	        $data['config_sender_api'] = '';
    	        $data['config_comments'] = '';
    	        //$data['config_captcha_page'] = array();
    	    } else {
    	        $company_name = $this->setting_model->getKeyValue('config_company_name','config');
    	        if (isset($company_name)) {
    	            $data['config_company_name'] = $company_name->value;
    	        } else {
    	            $data['config_company_name'] = '';
    	        }
    	        $language = $this->setting_model->getKeyValue('config_language','config');
    	        if (isset($language)) {
    	            $data['config_language'] = $language->value;
    	        } else {
    	            $data['config_language'] = '';
    	        }
    	        $address = $this->setting_model->getKeyValue('config_address','config');
    	        if (isset($address)) {
    	            $data['config_address'] = $address->value;
    	        } else {
    	            $data['config_address'] = '';
    	        }
    	        $country = $this->setting_model->getKeyValue('config_country','config');
    	        if (isset($country)) {
    	            $data['config_country'] = $country->value;
    	        } else {
    	            $data['config_country'] = '';
    	        }
    	        $state = $this->setting_model->getKeyValue('config_state','config');
    	        if (isset($state)) {
    	            $data['config_state'] = $state->value;
    	        } else {
    	            $data['config_state'] = '';
    	        }
    	        $city = $this->setting_model->getKeyValue('config_city','config');
    	        if (isset($city)) {
    	            $data['config_city'] = $city->value;
    	        } else {
    	            $data['config_city'] = '';
    	        }
    	        $pin = $this->setting_model->getKeyValue('config_pin','config');
    	        if (isset($pin)) {
    	            $data['config_pin'] = $pin->value;
    	        } else {
    	            $data['config_pin'] = '';
    	        }
    	        /* 
    	        $heading_title = $this->setting_model->getKeyValue('config_heading_title','config');
    	        if (isset($heading_title)) {
    	            $data['config_heading_title'] = $heading_title->value;
    	        } else {
    	            $data['config_heading_title'] = '';
    	        }
    	        $enable_captcha = $this->setting_model->getKeyValue('config_enable_captcha','config');
    	        if (isset($enable_captcha)) {
    	            $data['config_enable_captcha'] = $enable_captcha->value;
    	        } else {
    	            $data['config_enable_captcha'] = '';
    	        }
    	        $footer_text = $this->setting_model->getKeyValue('config_footer_text','config');
    	        if (isset($footer_text)) {
    	            $data['config_footer_text'] = $footer_text->value;
    	        } else {
    	            $data['config_footer_text'] = '';
    	        }
    	        $comment = $this->setting_model->getKeyValue('config_comments','config');
    	        if (isset($comment)) {
    	            $data['config_comments'] = $comment->value;
    	        } else {
    	            $data['config_comments'] = '';
    	        }
    	        $alert_types = $this->setting_model->getKeyValue('config_alert_types','config');
    	        if (isset($alert_types)) {
    	            $data['config_alert_types'] = $alert_types->value;
    	        } else {
    	            $data['config_alert_types'] = '';
    	        }
    	        $alert_page = $this->setting_model->getKeyValue('config_alert_page','config');
    	        if (isset($alert_page)) {
    	            $alert_page->value = str_replace(array('[',']'),'',$alert_page->value);
    	            
    	            $data['config_alert_page'] = '"'.str_replace('"', '',(str_replace(array('[',']'),'',$alert_page->value))).'"';
    	        } else {
    	            $data['config_alert_page'] = '';
    	        } */
    	        $help_line = $this->setting_model->getKeyValue('config_help_line','config');
    	        if (isset($help_line)) {
    	            $data['config_help_line'] = $help_line->value;
    	        } else {
    	            $data['config_help_line'] = '';
    	        }
    	        $timings = $this->setting_model->getKeyValue('config_timings','config');
    	        if (isset($timings)) {
    	            $data['config_timings'] = $timings->value;
    	        } else {
    	            $data['config_timings'] = '';
    	        }
    	        $config_date_format = $this->setting_model->getKeyValue('config_date_format','config');
    	        if (isset($config_date_format)) {
    	            $data['config_date_format'] = $config_date_format->value;
    	        } else {
    	            $data['config_date_format'] = '';
    	        }
    	        $config_currency = $this->setting_model->getKeyValue('config_currency','config');
    	        if (isset($config_currency)) {
    	            $data['config_currency'] = $config_currency->value;
    	        } else {
    	            $data['config_currency'] = '';
    	        }
    	        $zones = $this->setting_model->getKeyValue('config_timezone','config');
    	        if (isset($zones)) {
    	            $data['config_timezone'] = $zones->value;
    	        } else {
    	            $data['config_timezone'] = '';
    	        }
    	        $contact_name = $this->setting_model->getKeyValue('config_contact_name','config');
    	        if (isset($contact_name)) {
    	            $data['config_contact_name'] = $contact_name->value;
    	        } else {
    	            $data['config_contact_name'] = '';
    	        }
    	        $contact_email = $this->setting_model->getKeyValue('config_contact_email','config');
    	        if (isset($contact_email)) {
    	            $data['config_contact_email'] = $contact_email->value;
    	        } else {
    	            $data['config_contact_email'] = '';
    	        }
    	        $logo_height = $this->setting_model->getKeyValue('config_logo_height','config');
    	        if (isset($logo_height)) {
    	            $data['config_logo_height'] = $logo_height->value;
    	        } else {
    	            $data['config_logo_height'] = '';
    	        }
    	        $logo_witdh = $this->setting_model->getKeyValue('config_logo_witdh','config');
    	        if (isset($logo_witdh)) {
    	            $data['config_logo_witdh'] = $logo_witdh->value;
    	        } else {
    	            $data['config_logo_witdh'] = '';
    	        }
    	        $mail_engine = $this->setting_model->getKeyValue('config_mail_engine','config');
    	        if (isset($mail_engine)) {
    	            $data['config_mail_engine'] = $mail_engine->value;
    	        } else {
    	            $data['config_mail_engine'] = '';
    	        }
    	        $mail_parameters = $this->setting_model->getKeyValue('config_mail_parameters','config');
    	        if (isset($mail_parameters)) {
    	            $data['config_mail_parameters'] = $mail_parameters->value;
    	        } else {
    	            $data['config_mail_parameters'] = '';
    	        }
    	        $smtp_host_name = $this->setting_model->getKeyValue('config_smtp_host_name','config');
    	        if (isset($smtp_host_name)) {
    	            $data['config_smtp_host_name'] = $smtp_host_name->value;
    	        } else {
    	            $data['config_smtp_host_name'] = '';
    	        }
    	        $smtp_username = $this->setting_model->getKeyValue('config_smtp_username','config');
    	        if (isset($smtp_username)) {
    	            $data['config_smtp_username'] = $smtp_username->value;
    	        } else {
    	            $data['config_smtp_username'] = '';
    	        }
    	        $smtp_password = $this->setting_model->getKeyValue('config_smtp_password','config');
    	        if (isset($smtp_password)) {
    	            $data['config_smtp_password'] = $smtp_password->value;
    	        } else {
    	            $data['config_smtp_password'] = '';
    	        }
    	        $smtp_port = $this->setting_model->getKeyValue('config_smtp_port','config');
    	        if (isset($smtp_port)) {
    	            $data['config_smtp_port'] = $smtp_port->value;
    	        } else {
    	            $data['config_smtp_port'] = '';
    	        }
    	        $smtp_timeout = $this->setting_model->getKeyValue('config_smtp_timeout','config');
    	        if (isset($smtp_timeout)) {
    	            $data['config_smtp_timeout'] = $smtp_timeout->value;
    	        } else {
    	            $data['config_smtp_timeout'] = '';
    	        }
    	        $sender_id = $this->setting_model->getKeyValue('config_sender_id','config');
    	        if (isset($sender_id)) {
    	            $data['config_sender_id'] = $sender_id->value;
    	        } else {
    	            $data['config_sender_id'] = '';
    	        }
    	        $sender_api = $this->setting_model->getKeyValue('config_sender_api','config');
    	        if (isset($sender_api)) {
    	            $data['config_sender_api'] = $sender_api->value;
    	        } else {
    	            $data['config_sender_api'] = '';
    	        }/* 
    	        $captcha_page = $this->setting_model->getKeyValue('config_captcha_page','config');
    	        if (isset($captcha_page)) {
    	            $captcha_page->value = str_replace(array('[',']'),'',$captcha_page->value);
    	            
    	            $data['config_captcha_page'] = '"'.str_replace('"', '',(str_replace(array('[',']'),'',$captcha_page->value))).'"';
    	        } else {
    	            $data['config_captcha_page'] = '';
    	        } */
    	        
    	        $logo_img = $this->setting_model->getKeyValue('config_logo','config');
    	        if (isset($logo_img)) {
    	            $data['config_logo'] = base_url().$logo_img->value;
    	        } else {
    	            $data['config_logo'] = '';
    	        }
    	        //print_r($data['config_logo']);exit;
                    	        
    	        $icon_img = $this->setting_model->getKeyValue('config_icon','config');
    	        if (isset($icon_img)) {
    	            $data['config_icon'] = base_url().$icon_img->value;
    	        } else {
    	            $data['config_icon'] = '';
    	        }
    	    }
    	    
    	    $this->loadViews("setting/setting", $this->global, $data, NULL);
	    } else {
	        $this->global['text_back'] = $this->lang->line('text_back');
	        $this->global['text_no_permission'] = $this->lang->line('text_no_permission');
	        $this->load->view("error", $this->global, NULL , NULL);
	    }
	}
	
	public function save(){
	    if (!empty($_POST)) {
	        $data['config_company_name'] = $this->input->post('config_company_name');
	        $data['config_language'] = $this->input->post('config_language');
	        $data['config_address'] = $this->input->post('config_address');
	        $data['config_country'] = $this->input->post('config_country');
	        $data['config_state'] = $this->input->post('config_state');
	        $data['config_city'] = $this->input->post('config_city');
	        $data['config_pin'] = $this->input->post('config_pin');
	        /* $data['config_enable_captcha'] = $this->input->post('config_enable_captcha');
	        $data['config_heading_title'] = $this->input->post('config_heading_title');
	        $data['config_footer_text'] = $this->input->post('config_footer_text');
	        $data['config_alerts'] = $this->input->post('config_alerts');
	        $data['config_alert_types'] = $this->input->post('config_alert_types');
	        $data['config_alert_page'] = $this->input->post('config_alert_page'); */
	        $data['config_help_line'] = $this->input->post('config_help_line');
	        $data['config_timings'] = $this->input->post('config_timings');
	        $data['config_date_format'] = $this->input->post('config_date_format');
	        $data['config_currency'] = $this->input->post('config_currency');
	        $data['config_timezone'] = $this->input->post('config_timezone');
	        $data['config_contact_name'] = $this->input->post('config_contact_name');
	        $data['config_contact_email'] = $this->input->post('config_contact_email');
	        $data['config_logo'] = $this->input->post('config_logo');
	        $data['config_icon'] = $this->input->post('config_icon');
	        $data['config_logo_height'] = $this->input->post('config_logo_height');
	        $data['config_logo_witdh'] = $this->input->post('config_logo_witdh');
	        $data['config_mail_engine'] = $this->input->post('config_mail_engine');
	        $data['config_mail_parameters'] = $this->input->post('config_mail_parameters');
	        $data['config_smtp_host_name'] = $this->input->post('config_smtp_host_name');
	        $data['config_smtp_username'] = $this->input->post('config_smtp_username');
	        $data['config_smtp_password'] = $this->input->post('config_smtp_password');
	        $data['config_smtp_port'] = $this->input->post('config_smtp_port');
	        $data['config_smtp_timeout'] = $this->input->post('config_smtp_timeout');
	        $data['config_sender_id'] = $this->input->post('config_sender_id');
	        $data['config_sender_api'] = $this->input->post('config_sender_api');
	        /* $data['config_captcha_page'] = $this->input->post('config_captcha_page');
	        $data['config_comments'] = $this->input->post('config_comments'); */
	        
	        $this->form_validation->set_rules('config_company_name','Company Name','trim|required|max_length[128]|xss_clean');
	        $this->form_validation->set_rules('config_language', 'Language', 'required');
	        if ($this->form_validation->run() == false) {
	            //$this->index();
	        } else {
	            $this->setting_model->editSetting($_POST);
                redirect(base_url().'setting');
	        }
	    }
	    $this->index();
	}
}
