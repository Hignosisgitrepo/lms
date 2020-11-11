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
               <a href="<?php echo base_url(); ?>trainer"
                  class="btn btn-outline-white">Sign Up</a>
            </li>
         </ul>
      </div>

<!-- Page Content -->
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <!-- Account Content -->
            <div class="account-content">
               <div class="row align-items-center justify-content-center">
                  <div class="col-md-12 col-lg-6 login-right">
                     <div class="login-header">
                        <h3 style="color:#ffffff">Log In to your Tech on LMS Account</h3>
                     </div>
                     <hr>
                     <!-- login Form -->
					 
                     <div id="invalidLogin"></div>
                     <div class="form-group row">
                        <div class="col-lg-12">
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Email ID" aria-describedby="sizing-addon2" name="tr_email" id="tr_email" value="">
                           </div>
                        </div>
                     </div>
                     <div id="tremail_err"></div>
                     <div class="form-group row">
                        <div class="col-lg-12">
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="sizing-addon2"><i class="fa fa-lock"></i></span>
                              </div>
                              <input type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2" name="tr_password" id="tr_password" value="">
                           </div>
                        </div>
                     </div>
                     <div id="trpwd_err"></div>
                     <br>
                     <button class="btn btn-primary btn-block btn-lg login-btn" type="submit" onclick="trainerLogin();">Signin</button><br><br>
                     <div class="text-center forgotpass"><a href="forgot-password.html" style="color:#ffffff">Forgot Password?</a></div>
                     <br><br>
                     <div class="text-center dont-have" style="color:#ffffff">Don’t have an account? <a href="<?php echo base_url(); ?>trainer" style="color:#ffffff">Register</a></div>
                     <br><br>
                     <!-- /login Form -->
                  </div>
               </div>
            </div>
            <!-- /Account Content -->
         </div>
      </div>
   </div>
</div>
<!-- /Page Content -->
<?php $this->load->view('includes/footer'); ?>