<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

class AdminController extends CI_Controller {
    protected $user_group_id = '';
    protected $userId = '';
	protected $name = '';
	protected $user_group = '';
	/* protected $default_branch = '';
	protected $default_department = ''; */
	protected $defalut_language = '';
	protected $defalut_logo = '';
	protected $defalut_icon = '';
	protected $menus = '';
	protected $global = array ();
	
	public function response($data = NULL) {
	    $this->output->set_status_header ( 200 )->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
	    exit ();
	}
	
	function isLoggedIn() {
		$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		
		if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
		    redirect(base_url());
		} else {
			$this->user_group_id = $this->session->userdata ('user_group_id');
			$this->userId = $this->session->userdata ('user_id');
			$this->name = $this->session->userdata ('name');
			$this->user_group = $this->session->userdata ('user_group');
			$this->user_image = $this->session->userdata ('image');/* 
			$this->default_branch = $this->session->userdata ('default_branch');
			$this->default_department = $this->session->userdata ('default_department'); */
			$this->default_language = $this->session->userdata ('default_language');
			
			$user_group_query = $this->db->query("SELECT permission FROM user_group WHERE user_group_id = '" . (int)$this->user_group_id . "'");
			$result = $user_group_query->row();
			$permissions = json_decode($result->permission, true);
			
			if(!empty($permissions)) {
    			if (is_array($permissions)) {
    			    foreach ($permissions as $key => $value) {
    			        $this->permission[$key] = $value;
    			    }
    			}
			} else {
			    $key = '';
			    $this->permission[$key] = array();
			}
			
			$logo_qry = $this->db->query("SELECT * FROM setting WHERE code = 'config' AND `key` = 'config_logo'");
			$logo_result = $logo_qry->row();
			//print_r($logo_result);exit;
			if(!file_exists($logo_result->value)) {
			    $logo = ($this->config->item('default_url')).'/assets/image/logo.png';
			} else {
			    $logo = base_url().'assets/image/'.$logo_result->value;
			}
			$icon_qry = $this->db->query("SELECT * FROM setting WHERE code = 'config' AND `key` = 'config_icon'");
			$icon_result = $icon_qry->row();
			//print_r($logo_result);exit;
			if(!file_exists($icon_result->value)) {
			    $icon = ($this->config->item('default_url')).'/assets/image/favicon.png';
			} else {
			    $icon = base_url().'assets/image/'.$icon_result->value;
			}
			//print_r($logo);exit;
			$this->defalut_logo = $logo;
			$this->defalut_icon = $icon;
			//$this->default_language = $this->session->userdata ('default_language');
			
			$this->global ['name'] = $this->name;
			$this->global ['userId'] = $this->userId;
			$this->global ['user_group_id'] = $this->user_group_id;
			$this->global ['user_group'] = $this->user_group;
			$this->global ['user_image'] = $this->user_image;/* 
			$this->global ['default_branch'] = $this->default_branch;
			$this->global ['default_department'] = $this->default_department; */
			$this->global ['default_language'] = $this->default_language;
			$this->global ['defalut_logo'] = $this->defalut_logo;
			$this->global ['defalut_icon'] = $this->defalut_icon;
			$this->global ['permission'] = $this->permission[$key];
		}
	}
	
	public function hasPermission($key, $value) {
	    //print_r($this->global ['permission']);
	    if (isset($this->global ['permission'])) {
	        return in_array($value, $this->global ['permission']);
	    } else {
	        return false;
	    }
	}
	
	function menuCreation() {
	    $menus = array();
	    $menus[] = array(
	        'id'       => 'menu-dashboard',
	        'icon'	   => 'home',
	        'name'	   => 'Dashboard',
	        'short' => 'dashboard',
	        'href'     => base_url().'dashboard',
	        'children' => array()
	    );
    	 $tariner = array();
    	 if ($this->hasPermission('access', 'trainers')) {
    	     $tariner[] = array(
    	         'name'	   => 'Trainers',
    	         'short' => 'trainers',
    	         'href'     => base_url(). 'trainers',
    	         'children' => array()
    	     );
    	 }
    	 /*if ($this->hasPermission('access', 'trainer-schedule')) {
    	     $tariner[] = array(
    	         'name'	   => 'Trainer Schedule',
    	         'short' => 'trainer-schedule',
    	         'href'     => base_url(). 'trainer-schedule',
    	         'children' => array()
    	     );
    	 }*/
    	 
    	 if ($tariner) {
    	     $menus[] = array(
    	         'id'       => 'menu-trainer',
    	         'icon'	   => 'format_shapes',
    	         'name'	   => 'Trainer Management',
    	         'href'     => '',
    	         'children' => $tariner
    	     );
    	 }
    	 $category = array();
    	 if ($this->hasPermission('access', 'categories')) {
    	     $category[] = array(
    	         'name'	   => 'Categories',
    	         'short' => 'categories',
    	         'href'     => base_url(). 'categories',
    	         'children' => array()
    	     );
    	 }
    	 
    	 if ($category) {
    	     $menus[] = array(
    	         'id'       => 'menu-category',
    	         'icon'	   => 'category',
    	         'name'	   => 'Categories',
    	         'href'     => '',
    	         'children' => $category
    	     );
    	 }
    	 $corporate = array();
	    if ($this->hasPermission('access', 'corporates')) {
	        $corporate[] = array(
	            'name'	   => 'Corporates',
	            'short' => 'corporates',
	            'href'     => base_url(). 'corporates',
	            'children' => array()
	        );
	    }
	    if ($this->hasPermission('access', 'corporate-enquiry')) {
	        $corporate[] = array(
	            'name'	   => 'Corporate Enquiries',
	            'short' => 'corporate-enquiry',
	            'href'     => base_url(). 'corporate-enquiry',
	            'children' => array()
	        );
	    }
	    
	    if ($corporate) {
	        $menus[] = array(
	            'id'       => 'menu-corporate',
	            'icon'	   => 'people_outline',
	            'name'	   => 'Corporate Mgmt',
	            'href'     => '',
	            'children' => $corporate
	        );
	    }
	    
	    $user = array();
	    if ($this->hasPermission('access', 'users')) {
	       $user[] = array(
	           'name'	   => 'Users',
	           'short' => 'users',
	            'href'     => base_url(). 'users',
	            'children' => array()
	        );
	    } 
	    
	    if ($this->hasPermission('access', 'roles')) {
	        $user[] = array(
	            'name'	   => 'Role Management',
	            'short' => 'roles',
	            'href'     => base_url(). 'roles',
	            'children' => array()
	        );
	    }
	    
	    if ($user) {
	        $menus[] = array(
	            'id'       => 'menu-user',
	            'icon'	   => 'group',
	            'name'	   => 'User Management',
	            'href'     => '',
	            'children' => $user
	        );
	    }
	
	    if ($this->hasPermission('access', 'maintainance')) {
    	    $menus[] = array(
    	        'id'       => 'menu-maintainance',
    	        'icon'	   => 'settings',
    	        'name'	   => 'Maintainance',
    	        'short' => 'maintainance',
    	        'href'     => base_url().'maintainance',
    	        'children' => array()
    	    );
	    }
    	if ($this->hasPermission('access', 'setting')) {
    	    $menus[] = array(
    	        'id'       => 'menu-setting',
    	        'icon'	   => 'settings',
    	        'name'	   => 'Settings',
    	        'short' => 'setting',
    	        'href'     => base_url().'setting',
    	        'children' => array()
    	    );
    	}
	    
	    $this->global ['menus'] = $menus;
	    return $this->global ['menus'];
	}
	
	function loadThis() {
	    $this->global ['pageTitle'] = 'CodeInsect : Access Denied';
	    $this->load->view ( 'includes/header', $this->global );
	    //$this->load->view ( 'access' );
	    $this->load->view ( 'includes/footer' );
	}
	
	function logout() {
	    $this->session->sess_destroy ();
	    
	    redirect($this->config->item('default_url'));
	}
	
	function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL, $sidebarInfo = NULL){
	    $this->load->view('includes/header', $headerInfo);
	    $this->load->view($viewName, $pageInfo);
	    $this->load->view('includes/footer', $footerInfo);
	    $this->load->view('includes/sidebar', $sidebarInfo);
	}
	
	function paginationCompress($link, $count, $perPage = 10) {
	    $this->load->library ( 'pagination' );
	    
	    $config ['base_url'] = base_url () . $link;
	    $config ['total_rows'] = $count;
	    $config ['uri_segment'] = SEGMENT;
	    $config ['per_page'] = $perPage;
	    $config ['num_links'] = 5;
	    $config ['full_tag_open'] = '<nav><ul class="pagination">';
	    $config ['full_tag_close'] = '</ul></nav>';
	    $config ['first_tag_open'] = '<li class="arrow">';
	    $config ['first_link'] = 'First';
	    $config ['first_tag_close'] = '</li>';
	    $config ['prev_link'] = 'Previous';
	    $config ['prev_tag_open'] = '<li class="arrow">';
	    $config ['prev_tag_close'] = '</li>';
	    $config ['next_link'] = 'Next';
	    $config ['next_tag_open'] = '<li class="arrow">';
	    $config ['next_tag_close'] = '</li>';
	    $config ['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config ['cur_tag_close'] = '</a></li>';
	    $config ['num_tag_open'] = '<li>';
	    $config ['num_tag_close'] = '</li>';
	    $config ['last_tag_open'] = '<li class="arrow">';
	    $config ['last_link'] = 'Last';
	    $config ['last_tag_close'] = '</li>';
	    
	    $this->pagination->initialize ( $config );
	    $page = $config ['per_page'];
	    $segment = $this->uri->segment ( SEGMENT );
	    
	    return array (
	        "page" => $page,
	        "segment" => $segment
	    );
	}
}