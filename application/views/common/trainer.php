<!DOCTYPE html>
<?php 
   $company = setting('config_company_name', 'config');
   $company_name = $company->value;
   $logo_img = setting('config_logo', 'config');
   $logo = $logo_img->value;
   $icon_img = setting('config_icon', 'config');
   $icon = $icon_img->value;
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
         <form class="search-form form-control-rounded navbar-search d-none d-lg-flex mr-16pt"
            action=""
            style="max-width: 230px">
            <button class="btn"
               type="submit"><i class="material-icons">search</i></button>
            <input type="text"
               class="form-control"
               placeholder="Search ...">
         </form>
         <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
            <li class="nav-item dropdown">
               <a href="#"
                  class="nav-link dropdown-toggle"
                  data-toggle="dropdown"
                  data-caret="false">Course Cateogories</a>
               <div class="dropdown-menu">
                  <a href="courses.html"
                     class="dropdown-item">Browse Courses</a>
                  <a href="student-course.html"
                     class="dropdown-item">Preview Course</a>
                  <a href="student-lesson.html"
                     class="dropdown-item">Preview Lesson</a>
                  <a href="student-take-course.html"
                     class="dropdown-item"><span class="mr-16pt">Take Course</span> <span class="badge badge-notifications badge-accent text-uppercase ml-auto">Pro</span></a>
                  <a href="student-take-lesson.html"
                     class="dropdown-item">Take Lesson</a>
                  <a href="student-take-quiz.html"
                     class="dropdown-item">Take Quiz</a>
                  <a href="student-quiz-result-details.html"
                     class="dropdown-item">Quiz Result</a>
                  <a href="student-dashboard.html"
                     class="dropdown-item">Student Dashboard</a>
                  <a href="student-my-courses.html"
                     class="dropdown-item">My Courses</a>
                  <a href="student-quiz-results.html"
                     class="dropdown-item">My Quizzes</a>
                  <a href="help-center.html"
                     class="dropdown-item">Help Center</a>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?php echo base_url(); ?>corporate-request" target="_blank">LMS For Corporate</a>
            </li>
			
			<li class="nav-item">
				<a class="nav-link active" href="<?php echo base_url(); ?>trainer">Teach on LMS</a>
            </li>
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
         </ul>
         <ul class="nav navbar-nav ml-auto mr-0">
            <li class="nav-item">
               <a href="<?php echo base_url(); ?>trainer-login"
                  class="btn btn-outline-white">Sign In</a>
            </li>
         </ul>
      </div>
<!-- Page Content -->
		<div class="hero container page__container text-center text-md-left py-112pt">
			<div id="tr_success_div" style="background:color:#fff"></div>
			<div class="row">
				<div class="col-lg-8 col-sm-6">
					<div class="banner-header">
						<h1 style="font-weight:bold;color:#fff">Get your demo</h1><br><br>
						<h4 style="color:#fff">Create an online video course and earn money by teaching people around the world.</h4>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6" id="tr_step1">
					<div class="form-group row">
						<div class="col-lg-12">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="sizing-addon2"><i class="fa fa-user"></i></span>
								</div>
								<input type="text" class="form-control" placeholder="First Name" aria-describedby="sizing-addon2" name="first_name" id="first_name" required  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" autocomplete="off">
							</div>
						</div>
					</div>
					<div id="firstname_err"></div>
					<div class="form-group row">
						<div class="col-lg-12">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="sizing-addon2"><i class="fa fa-user"></i></span>
								</div>
								<input type="text" class="form-control" placeholder="Last Name" aria-describedby="sizing-addon2" name="last_name" id="last_name" required  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" autocomplete="off">
							</div>
						</div>
					</div>
					<div id="lastname_err"></div>
					<div class="form-group row">
						<div class="col-lg-12">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
								</div>
								<input type="text" class="form-control" placeholder="Email ID" aria-describedby="sizing-addon2" name="email" id="email" required autocomplete="off" />
							</div>
						</div>
					</div>
					<div id="mail_err"></div>
					<div class="form-group row">
						<div class="col-lg-12">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="sizing-addon2"><i class="fa fa-phone"></i></span>
								</div>
								<select class="form-control" name="tr_phonecode" id="tr_phonecode">
									<?php foreach($countries as $country) { ?>
									  <?php if($country->id == $country_id) { ?>
										<option value="<?php echo $country->id; ?>" selected="selected"><?php echo $country->sortname; ?></option>
									  <?php } else { ?>
										<option value="<?php echo $country->id; ?>"><?php echo $country->sortname; ?></option>
									  <?php } ?>
									<?php } ?>
								</select>
								<input type="text" class="form-control" placeholder="Phone Number" aria-describedby="sizing-addon2" name="telephone" id="telephone" required  value=""onkeypress="return isNumberKey(event)" maxlength="10" autocomplete="off">
							</div>
						</div>
					</div>
					<div id="phone_err"></div>
					<div class="form-group row">
						<div class="col-lg-12">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="sizing-addon2"><i class="fa fa-lock"></i></span>
								</div>
								<input type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2" name="password" id="password" required autocomplete="off" />
							</div>
						</div>
					</div>
					<div id="password_err"></div>
					<div class="form-group row">
					  <div class="col-lg-12">
						<div class="submit-section text-center">
							<button type="submit" class="btn btn-primary submit-btn" style="width:100%" onclick="addUser();">Next</button>
						</div>
					  </div>
					</div>
					<div class="text-center dont-have" style="color:#fff">Already have an account? <a href="<?php echo base_url(); ?>trainer-login" style="color:#fff">Login</a></div>
				</div>
				<div class="col-lg-4 col-md-12" id="tr_step2" style="display:none">
					<h5 class="modal-title" align="center" style="color:#fff">Step 2</h5>
					<!--<p align="center">Provide the OTP to your registred phone number.</p>
					<div class="form-group form-focus">
						<input type="text" class="form-control floating" name="tr_mobile_otp" id="tr_mobile_otp">
						<label class="focus-label">Mobile OTP <span class="text-danger">*</span></label>
						<input type="hidden" name="tr_otp1" id="tr_otp1">
					</div>
					<div id="tr_mobileotp_err"></div>-->
					
					<p align="center">Provide the OTP to your registred mail ID.</p>
					<div class="form-group form-focus">
						<input type="text" class="form-control floating" name="tr_email_otp" id="tr_email_otp" required>
						<label class="focus-label" style="color:#fff">Email OTP <span class="text-danger">*</span></label>
						<input type="hidden" name="tr_otp2" id="tr_otp2">
					</div>
					<div id="tr_emailotp_err"></div>
					<div class="text-right">
						<a class="forgot-link" href="<?php echo base_url(); ?>training-login"><?php echo $text_already; ?></a>
					</div>
					<button class="btn btn-primary btn-block btn-lg login-btn" name="submit" type="submit" onclick="finalSignIN();">Signup</button>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- // END Header -->		

<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content ">

	<div class="border-bottom-2 py-16pt navbar-light bg-white border-bottom-2">
		<div class="container page__container">
			<div class="row align-items-center">
				<div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
					<div class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
						<i class="material-icons text-white">subscriptions</i>
					</div>
					<div class="flex">
						<div class="card-title mb-4pt">8,000+ Courses</div>
						<p class="card-subtitle text-70">Explore a wide range of skills.</p>
					</div>
				</div>
				<div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
					<div class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
						<i class="material-icons text-white">verified_user</i>
					</div>
					<div class="flex">
						<div class="card-title mb-4pt">By Industry Experts</div>
						<p class="card-subtitle text-70">Professional development from the best people.</p>
					</div>
				</div>
				<div class="d-flex col-md align-items-center">
					<div class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
						<i class="material-icons text-white">update</i>
					</div>
					<div class="flex">
						<div class="card-title mb-4pt">Unlimited Access</div>
						<p class="card-subtitle text-70">Unlock Library and learn any topic with one subscription.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('includes/footer'); ?>
