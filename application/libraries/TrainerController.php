<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

class TrainerController extends CI_Controller {
    protected $trainerId = '';
	protected $name = '';
	protected $email_id = '';
	/* protected $default_branch = '';
	protected $default_department = ''; */
	protected $defalut_language = '';
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
		    $this->trainerId = $this->session->userdata ('trainer_id');
			$this->name = $this->session->userdata ('name');
			$this->email_id = $this->session->userdata ('email_id');
			$this->mentor_image = $this->session->userdata ('image');/* 
			$this->default_branch = $this->session->userdata ('default_branch');
			$this->default_department = $this->session->userdata ('default_department'); */
			$this->default_language = $this->session->userdata ('default_language');
			
			
			$this->global ['name'] = $this->name;
			$this->global ['trainerId'] = $this->trainerId;
			$this->global ['email_id'] = $this->email_id;
			/*$this->global ['user_image'] = $this->user_image; 
			$this->global ['default_branch'] = $this->default_branch;
			$this->global ['default_department'] = $this->default_department; 
			$this->global ['default_language'] = $this->default_language;
			$this->global ['permission'] = $this->permission[$key];*/
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
	    $this->load->view ( 'includes/header', $this->global );
	    //$this->load->view ( 'access' );
	    $this->load->view ( 'includes/footer' );
	}
	
	function logout() {
	    $this->session->sess_destroy ();
	    
	    redirect($this->config->item('default_url'));
	}
	
	function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
	    $this->load->view('trainer/includes/header', $headerInfo);
	    $this->load->view('trainer/includes/sidebar', $headerInfo);
	    $this->load->view($viewName, $pageInfo);
	    $this->load->view('trainer/includes/footer', $footerInfo);
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