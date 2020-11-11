<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

class UserController extends CI_Controller {
    protected $customerId = '';
	protected $name = '';
	protected $email_id = '';
	protected $approve_status = '';
	/* protected $default_branch = '';
	protected $default_department = ''; */
	protected $defalut_language = '';
	protected $menus = '';
	protected $is_trainer = '';
	protected $trainerId  = '';
	protected $userimg  = '';
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
			$this->customerId = $this->session->userdata ('customer_id');
			$this->name = $this->session->userdata ('name');
			$this->email_id = $this->session->userdata ('email');
			$this->approve_status = $this->session->userdata ('approve_status');
			$this->is_trainer = $this->session->userdata ('is_trainer');
			if($this->is_trainer == 1) {
				$query = $this->db->query("SELECT * FROM trainer WHERE customer_id = '" . $this->customerId . "' AND approve_status = 1");
				$trainer = $query->row();
				
				if(!empty($trainer)) {
    				$this->trainerId = $trainer->trainer_id;
				} else {
				    $this->trainerId = 0;
				}
			} else {
				$this->trainerId = 0;
			}
			/* 
			$this->default_branch = $this->session->userdata ('default_branch');
			$this->default_department = $this->session->userdata ('default_department'); */
			$this->default_language = $this->session->userdata ('default_language');
			$this->user_image = $this->session->userdata ('user_image');
			
			$this->global ['name'] = $this->name;
			$this->global ['customerId'] = $this->customerId;
			$this->global ['email_id'] = $this->email_id;
			$this->global ['approve_status'] = $this->approve_status;
			$this->global ['user_image'] = $this->user_image;
			$this->global ['is_trainer'] = $this->is_trainer;
			$this->global ['trainerId'] = $this->trainerId;/* 
			$this->global ['default_branch'] = $this->default_branch;
			$this->global ['default_department'] = $this->default_department; */
			$this->global ['default_language'] = $this->default_language;
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
	        'icon'	   => 'la-dashboard',
	        'name'	   => 'Dashboard',
	        'short' => 'dashboard',
	        'href'     => base_url().'dashboard',
	        'children' => array()
	    );
	    if ($this->hasPermission('access', 'favorites')) {
    	    $menus[] = array(
    	        'id'       => 'menu-favorite',
    	        'icon'	   => 'la-star-o',
    	        'name'	   => 'Favorites',
    	        'short' => 'favorites',
    	        'href'     => base_url().'dashboard',
    	        'children' => array()
    	    );
	    }
	    if ($this->hasPermission('access', 'comments')) {
    	    $menus[] = array(
    	        'id'       => 'menu-comments',
    	        'icon'	   => 'la-comments-o',
    	        'name'	   => 'Comments',
    	        'short' => 'comments',
    	        'href'     => base_url().'dashboard',
    	        'children' => array()
    	    );
    	 }
    	 if ($this->hasPermission('access', 'call')) {
    	    $menus[] = array(
    	        'id'       => 'menu-call',
    	        'icon'	   => 'la-phone-square',
    	        'name'	   => 'Call',
    	        'short' => 'call',
    	        'href'     => base_url().'dashboard',
    	        'children' => array()
    	    );
    	 }
    	 if ($this->hasPermission('access', 'inbox')) {
    	    $menus[] = array(
    	        'id'       => 'menu-inbox',
    	        'icon'	   => 'la-inbox',
    	        'name'	   => 'Inbox',
    	        'short' => 'inbox',
    	        'href'     => base_url().'dashboard',
    	        'children' => array()
    	    );
    	 }
    	 if ($this->hasPermission('access', 'agent')) {
    	    $menus[] = array(
    	        'id'       => 'menu-agents',
    	        'icon'	   => 'la-headphones',
    	        'name'	   => 'Agents Assistance',
    	        'short' => 'agent',
    	        'href'     => base_url().'dashboard',
    	        'children' => array()
    	    );
    	 }
    	 if ($this->hasPermission('access', 'interaction')) {
    	    $menus[] = array(
    	        'id'       => 'menu-interactions',
    	        'icon'	   => 'la-commenting',
    	        'name'	   => 'Interactions',
    	        'short' => 'interaction',
    	        'href'     => base_url().'dashboard',
    	        'children' => array()
    	    );
    	}
	    $client = array();
	    if ($this->hasPermission('access', 'clients')) {
	        $client[] = array(
	            'name'	   => 'Clients',
	            'short' => 'clients',
	            'href'     => base_url(). 'clients',
	            'children' => array()
	        );
	    }
	    
	    if ($client) {
	        $menus[] = array(
	            'id'       => 'menu-client',
	            'icon'	   => 'la-users',
	            'name'	   => 'Client Management',
	            'href'     => '',
	            'children' => $client
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
	            'icon'	   => 'la-user',
	            'name'	   => 'User Management',
	            'href'     => '',
	            'children' => $user
	        );
	    }
	
	    if ($this->hasPermission('access', 'maintainance')) {
    	    $menus[] = array(
    	        'id'       => 'menu-maintainance',
    	        'icon'	   => 'la-cogs',
    	        'name'	   => 'Maintainance',
    	        'short' => 'maintainance',
    	        'href'     => base_url().'maintainance',
    	        'children' => array()
    	    );
	    }
    	if ($this->hasPermission('access', 'setting')) {
    	    $menus[] = array(
    	        'id'       => 'menu-setting',
    	        'icon'	   => 'la-cog',
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
	    $this->load->view ( 'customer-includes/header', $this->global );
	    //$this->load->view ( 'access' );
	    $this->load->view ( 'customer-includes/footer' );
	}
	
	function logout() {
	    $this->session->sess_destroy ();
	    
	    redirect($this->config->item('default_url'));
	}
	
	function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $script = NULL, $footerInfo = NULL, $sidebarInfo = NULL){
	    $this->load->view('customer-includes/header', $headerInfo);
	    $this->load->view($viewName, $pageInfo);
	    $this->load->view('customer-includes/footer', $footerInfo);
	    $this->load->view('customer-includes/sidebar', $headerInfo);
	    if($script != NULL){
	    	$this->load->view('customer-includes/'.$script, $footerInfo);
	    }
	}
	
	function loadTrainerThis() {
	    $this->global ['pageTitle'] = 'CodeInsect : Access Denied';
	    $this->load->view ( 'trainer-includes/header', $this->global );
	    //$this->load->view ( 'access' );
	    $this->load->view ( 'trainer-includes/footer' );
	}
	
	function loadCommonViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
	    $this->load->view('includes/header', $headerInfo);
	    $this->load->view($viewName, $pageInfo);
	    $this->load->view('includes/footer', $footerInfo);
	}
	
	function loadCommonThis() {
	    $this->global ['pageTitle'] = 'CodeInsect : Access Denied';
	    $this->load->view ( 'includes/header', $this->global );
	    //$this->load->view ( 'access' );
	    $this->load->view ( 'includes/footer' );
	}
	
	function loadTrainerViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $script = NULL, $footerInfo = NULL, $sidebarInfo = NULL){
	    $this->load->view('trainer-includes/header', $headerInfo);
	    $this->load->view($viewName, $pageInfo);
	    $this->load->view('trainer-includes/footer', $footerInfo);
	    $this->load->view('trainer-includes/sidebar', $sidebarInfo);
	    if($script != NULL){
	    	$this->load->view('trainer-includes/'.$script, $footerInfo);
	    }
	    
	}

	function loadTrainerViewswithoutside($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $script = NULL, $footerInfo = NULL, $sidebarInfo = NULL){
	    $this->load->view('trainer-includes/header', $headerInfo);
	    $this->load->view($viewName, $pageInfo);
	    $this->load->view('trainer-includes/footer', $footerInfo);
	    //this->load->view('trainer-includes/sidebar', $sidebarInfo);
	    if($script != NULL){
	    	$this->load->view('trainer-includes/'.$script, $footerInfo);
	    }
	    
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