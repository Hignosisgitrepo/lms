<!DOCTYPE html>
<?php 
   $company = setting('config_company_name', 'config');
   $company_name = $company->value;
   $logo_img = setting('config_logo', 'config');
   $logo = $logo_img->value;
   $icon_img = setting('config_icon', 'config');
   $icon = $icon_img->value;
   ?>
<?php if($this->session->userdata ('customer_id') != '') {
		$customer_data = $this->common_model->getCustomerData($this->session->userdata ('customer_id'));
		if(empty($customer_data)) { 
		  $is_trainer = 0;
		  $approve_status = 0;
		  $trainer_id = 0;
		} else {
		  $is_trainer = $customer_data->is_trainer;
		  $approve_status = $customer_data->approve_status;
		  $trainer_id = $customer_data->trainer_id;
		}
	} else {
		$is_trainer = 0;
		$approve_status = 0;
		$trainer_id = 0;
	}
	$categories = $this->common_model->getCategories();
?>
<html lang="en"
   dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible"
         content="IE=edge">
      <meta name="viewport"
         content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?php echo $company_name; ?></title>
      <link type="image/x-icon" href="<?php echo base_url().$icon; ?>" rel="icon">
      <!-- Prevent the demo from appearing in search engines -->
      <meta name="robots"
         content="noindex">
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
         rel="stylesheet">
      <!-- Preloader -->
      <link type="text/css"
         href="<?php echo base_url('assets/common/vendor/spinkit.css'); ?>"
         rel="stylesheet">
      <!-- Perfect Scrollbar -->
      <link type="text/css"
         href="<?php echo base_url('assets/common/vendor/perfect-scrollbar.css'); ?>"
         rel="stylesheet">
      <!-- Material Design Icons -->
      <link type="text/css"
         href="<?php echo base_url('assets/common/css/material-icons.css'); ?>"
         rel="stylesheet">
      <!-- Font Awesome Icons -->
      <link type="text/css"
         href="<?php echo base_url('assets/common/css/fontawesome.css'); ?>"
         rel="stylesheet">
      <!-- Preloader -->
      <link type="text/css"
         href="<?php echo base_url('assets/common/css/preloader.css'); ?>"
         rel="stylesheet">
      <!-- App CSS -->
      <link type="text/css"
         href="<?php echo base_url('assets/common/css/app.css'); ?>"
         rel="stylesheet">
	  <link type="text/css"
              href="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/toastr.min.css"
              rel="stylesheet">
      <link type="text/css"
              href="<?php echo $this->config->item('default_url'); ?>/assets/common/css/toastr.css"
              rel="stylesheet">
	  <style type="text/css">

		.gst20{

			margin-top:20px;

		}

		.list-gpfrm-list a{

			text-decoration: none !important;

		}

		.list-gpfrm li{

			cursor: pointer;

			padding: 4px 0px;

		}

		.list-gpfrm{

			list-style-type: none;

    		background: #fff;

		}

		.list-gpfrm li:hover{

			color: white;

			background-color: #eee;

		}

	</style>
   </head>
   <body class="layout-sticky-subnav layout-default ">
      <div class="preloader">
         <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
         </div>
         <!-- <div class="sk-bounce">
            <div class="sk-bounce-dot"></div>
            <div class="sk-bounce-dot"></div>
            </div> -->
         <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
      </div>
      <!-- Header Layout -->
      <div class="mdk-header-layout js-mdk-header-layout">
      <!-- Header -->
      <div id="header"
         class="mdk-header mdk-header--bg-dark bg-dark js-mdk-header mb-0"
         data-effects="parallax-background waterfall"
         data-fixed
         data-condenses>
      <div class="mdk-header__bg">
         <div class="mdk-header__bg-front"
            style="background-image: url('assets/common/images/photodune-4161018-group-of-students-m.jpg');"></div>
      </div>
      <div class="mdk-header__content justify-content-center">
      <div class="navbar navbar-expand navbar-dark-pickled-bluewood bg-transparent will-fade-background"
         id="default-navbar"
         data-primary>
         <!-- Navbar toggler -->
         <!--<button class="navbar-toggler w-auto mr-16pt d-block rounded-0"
            type="button"
            data-toggle="sidebar">
            <span class="material-icons">short_text</span>
            </button>-->
         <!-- Navbar Brand -->
         <a href="<?php echo base_url(); ?>" class="navbar-brand mr-16pt">
            <img class="navbar-brand-icon" src="<?php echo $this->config->item('default_url'); ?>/assets/image/<?php echo $logo; ?>" width="30" alt="LMS"> 
            <!--<span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">
               <span class="avatar-title rounded bg-primary"><img src="<?php echo $this->config->item('default_url'); ?>/assets/image/<?php echo $logo; ?>"
                        alt="logo"
                        class="img-fluid" /></span>
               
               </span>-->
            <span class="d-none d-lg-block"><?php echo $company_name; ?></span>
         </a>
		 <form autocomplete="off" class="search-form form-control-rounded navbar-search d-none d-lg-flex mr-16pt" style="width: 400px" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>search/keyword">
			<input autocomplete="off" type="text" class="form-control typeahead" placeholder="Search ..." id="search_box" name="keyword">
		 </form>
		 <div id="results" style="display: block; position: absolute; left: 184.5px; top: 55px; width: 410px;"><ul class="list-gpfrm" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul></div>
         <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
            <li class="nav-item dropdown">
               <a href="#"
                  class="nav-link dropdown-toggle"
                  data-toggle="dropdown"
                  data-caret="false">Course Cateogories</a>
               <div class="dropdown-menu">
				<?php if(!empty($categories)) { ?>
				  <?php foreach($categories as $category) { ?>
					<?php $b64_cid = urlencode(base64_encode($category->category_id)); ?>
					<a href="<?php echo base_url(); ?>category-trainings/<?php echo $b64_cid; ?>" class="dropdown-item"><?php echo $category->category_name; ?></a>
				  <?php } ?>
				 <?php } else { ?>
					No Categories Available
				 <?php } ?>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?php echo base_url(); ?>corporate-request" target="_blank">LMS For Corporate</a>
            </li>
			
			<li class="nav-item">
				<?php if($this->session->userdata ('customer_id') != '') {
				  $customer_data = $this->common_model->getCustomerData($this->session->userdata ('customer_id')); ?>
                  <?php if(($is_trainer == 1) && ($approve_status == 1)) { ?>
					<a class="nav-link" href="<?php echo base_url(); ?>trainer-dashboard">Trainer</a> 
				  <?php } else if(($is_trainer == 1) && ($trainer_id != 0)) { ?>
					<a class="nav-link">
                        Waiting for confirmation
					</a>
				  <?php } else { ?>
					<a onclick="createTrainer();" class="nav-link">
						Teach on LMS
					</a>
			   <?php } ?>
			<?php } else { ?>
				<a class="nav-link" href="<?php echo base_url(); ?>trainer">Teach on LMS</a>
			<?php } ?>
            </li>
			<?php if($this->session->userdata ('customer_id') == '') { ?>
				<li class="nav-item"
				   data-toggle="tooltip"
				   data-title="Admin"
				   data-placement="bottom"
				   data-boundary="window">
				   <a href="<?php echo base_url(); ?>admin"
					  class="nav-link"target="_blank">
				   <i class="material-icons">people_outline</i>
				   </a>
				</li>
			<?php } ?>
         </ul>
         <ul class="nav navbar-nav ml-auto mr-0">
            <div class="nav-item ml-16pt dropdown dropdown-notifications dropdown-xs-down-full"data-toggle="tooltip"
                                 data-title="Shopping Cart"
                                 data-placement="bottom"
                                 data-boundary="window" id="cart">
               <button class="nav-link btn-flush"
						type="button">
					<i class="material-icons">shopping_cart</i>
				</button>
            </div>
            <?php if($this->session->userdata ('customer_id') != '') { ?>
            <li class="nav-item">
               <a class="nav-link btn btn-rounded" href="<?php echo base_url(); ?>coming-soon" title="Wishlist"><i class="fa fa-heart"></i></a>
            </li>
			<?php if($this->session->userdata ('customer_id') != '') {
						$customer_data = $this->common_model->getCustomerData($this->session->userdata ('customer_id'));
						if(empty($customer_data)) { 
						  $is_trainer = 0;
						  $approve_status = 0;
						  $trainer_id = 0;
						} else {
						  $is_trainer = $customer_data->is_trainer;
						  $approve_status = $customer_data->approve_status;
						  $trainer_id = $customer_data->trainer_id;
						}
				} ?>
            <li class="nav-item dropdown has-arrow">
               <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
               <span class="user-img"><img class="rounded-circle" src="<?php echo base_url('assets/common/images/user.jpg'); ?>" width="31" alt="<?php echo $this->session->userdata ('name'); ?>">&nbsp;&nbsp;<?php echo $this->session->userdata ('name'); ?></span>
               </a>
               <div class="dropdown-menu">
				  <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard">Student Dashboard</a>
				  <?php if(($is_trainer == 1) && ($approve_status == 1)) { ?>
					  <a href="<?php echo base_url(); ?>trainer-dashboard" class="dropdown-item">
						Trainer Dashboard
					  </a>
				  <?php } else if(($is_trainer == 1) && ($trainer_id != 0)) { ?>
					  <a class="dropdown-item">
						Wait for Confirmation
					  </a>
				  <?php } else { ?>
					  <a onclick="createTrainer();" class="dropdown-item">
						Not A Trainer
					  </a>
				  <?php } ?>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>mycourses">My Courses</a>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>logout">Logout</a>
               </div>
            </li>
            <?php } else { ?>
            <li class="nav-item">
				<a href="<?php echo base_url(); ?>login"
                  class="btn btn-outline-accent">Sign In</a>
            </li>
            <li class="nav-item">
               <a href="<?php echo base_url(); ?>register"
                  class="btn btn-outline-white">Sign Up</a>
            </li>
            <?php } ?>
         </ul>
      </div>