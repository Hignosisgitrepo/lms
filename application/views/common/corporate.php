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
         <a href="<?php echo base_url(); ?>corporate-request"
                        class="navbar-brand mr-16pt">
                     <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">
                     <span class="avatar-title rounded bg-primary"><img src="<?php echo $this->config->item('default_url'); ?>/assets/image/<?php echo $logo; ?>"
                        alt="logo"
                        class="img-fluid" /></span>
                     </span>
                     <span class="d-none d-lg-block"><?php echo $company_name; ?></span>
                     </a>
                     <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
                        <li class="nav-item dropdown">
                           <a href="#"
                              class="nav-link dropdown-toggle"
                              data-toggle="dropdown"
                              data-caret="false">Courses</a>
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
                           <a href="pricing.html"
                              class="nav-link">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                           <a href="#"
                              class="nav-link dropdown-toggle"
                              data-toggle="dropdown"
                              data-caret="false">Resources</a>
                           <div class="dropdown-menu">
                              <a href="instructor-dashboard.html"
                                 class="dropdown-item">Instructor Dashboard</a>
                              <a href="instructor-courses.html"
                                 class="dropdown-item">Manage Courses</a>
                              <a href="instructor-quizzes.html"
                                 class="dropdown-item">Manage Quizzes</a>
                              <a href="instructor-earnings.html"
                                 class="dropdown-item">Earnings</a>
                              <a href="instructor-statement.html"
                                 class="dropdown-item">Statement</a>
                              <a href="instructor-edit-course.html"
                                 class="dropdown-item">Edit Course</a>
                              <a href="instructor-edit-quiz.html"
                                 class="dropdown-item">Edit Quiz</a>
                           </div>
                        </li>
                     </ul>
                     <ul class="nav navbar-nav ml-auto mr-0">
                        <a href="<?php echo base_url(); ?>corporate" class="btn btn-outline-secondary">Login</a>
                     </ul>
      </div>
<!-- Page Content -->
		<div class="hero container page__container text-center text-md-left py-112pt">
		    <div id="success_div" style="background:color:#fff"></div>
			<div class="row">
				<div class="col-lg-6 col-sm-6">
					<div class="banner-header">
						
					   <h2 style="font-weight:bold;color:#fff">Get your demo for your organisation</h2>
					   <br><br>
					   <h3 style="font-weight:bold;color:#fff">See why leading organizations choose E-Learing for Business as their destination for employee learning
						  In your demo, learn more about:
					   </h3>
					</div>
					<br><br>
					<li style="color:#fff">Unlimited access to the top 5,000+ courses selected from E-Learing.com – anytime, on any device</li>
					<li style="color:#fff">Fresh content taught by 1,500+ experts and real-world practitioners – for any learning style</li>
					<li style="color:#fff">Actionable learning insights and admin functionality</li>
				</div>
				<div class="col-lg-6 d-flex align-items-center">
					<div class="flex" style="max-width: 100%;" id="co_step1">
					   <h5 class="modal-title" align="center" style="color:#fff">Step 1</h5>
					   <hr>
					   <div class="form-row">
						  <div class="col-12 col-md-6 mb-3">
							 <label class="form-label" for="validationSample01" style="color:#fff"><?php echo $text_firstname; ?> <span class="text-danger">*</span></label>
							 <input type="text" class="form-control" name="co_first_name" id="co_first_name" value="" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" autocomplete="off">
							 <div id="co_first_name_err"></div>
						  </div>
						  <div class="col-12 col-md-6 mb-3">
							 <label class="form-label" for="validationSample01" style="color:#fff"><?php echo $text_lastname; ?> <span class="text-danger">*</span></label>
							 <input type="text" class="form-control" name="co_last_name" id="co_last_name" value="" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" autocomplete="off">
							 <div id="co_last_name_err"></div>
						  </div>
					   </div>
					   <div class="form-row">
						  <div class="col-12 col-md-6 mb-3">
							 <label class="form-label" for="validationSample01" style="color:#fff">Domain Name <span class="text-danger">*</span></label>
							 <input type="text" class="form-control" name="co_domain" id="co_domain" value="" autocomplete="off">
							 <div id="co_domain_err"></div>
						  </div>
						  <div class="col-12 col-md-6 mb-3">
							 <label class="form-label" for="validationSample01" style="color:#fff"><?php echo $text_workmail; ?> <span class="text-danger">*</span></label>
							 <input type="email" class="form-control floating" name="co_work_mail" id="co_work_mail" value="" autocomplete="off">
							 <div id="co_work_mail_err"></div>
						  </div>
					   </div>
					   <div class="form-row">
						  <div class="col-12 col-md-6 mb-3">
							 <label class="form-label" for="validationSample01" style="color:#fff"><?php echo $text_phone; ?> <span class="text-danger">*</span></label>
							 <div class="input-group">
								<div class="col-xs-4">
								   <select class="form-control" name="co_phonecode" id="co_phonecode">
									  <?php foreach($countries as $country) { ?>
										<?php if($country_id == $country->id) { ?>
										  <option value="<?php echo $country->id; ?>" selected="selected"selected><?php echo $country->sortname; ?></option>
										<?php } else { ?>
										  <option value="<?php echo $country->id; ?>"><?php echo $country->sortname; ?></option>
										<?php } ?>
									  <?php } ?>
								   </select>
								</div>
								<div class="col-xs-8">
								   <input type="text" class="form-control floating" name="co_phone_number" id="co_phone_number" value=""onkeypress="return
									  isNumberKey(event)" maxlength="10" autocomplete="off">
								</div>
							 </div>
							 <div id="co_phone_number_err"></div>
						  </div>
						  <div class="col-12 col-md-6 mb-3">
							 <label class="form-label" for="validationSample01" style="color:#fff"><?php echo $text_company; ?> <span class="text-danger">*</span></label>
							 <input type="email" class="form-control floating" name="co_company_name" id="co_company_name" value="" autocomplete="off">
							 <div id="co_company_name_err"></div>
						  </div>
					   </div>
					   <div class="form-row">
						  <div class="col-12 col-md-6 mb-3">
							 <label class="form-label" for="validationSample01" style="color:#fff">Company Size <span class="text-danger">*</span></label>
							 <select class="form-control" name="co_company_size" id="co_company_size">
								<option value=""><?php echo $text_select; ?> company size <span class="text-danger">*</span></option>
								<?php foreach($company_sizes as $value) { ?>
								<option value="<?php echo $value->maintainance_detail_id; ?>"><?php echo $value->maintainance_value; ?></option>
								<?php } ?>
							 </select>
							 <div id="co_company_size_err"></div>
						  </div>
						  <div class="col-12 col-md-6 mb-3">
							 <label class="form-label" for="validationSample01" style="color:#fff"><?php echo $text_trainingneed; ?> <span class="text-danger">*</span></label>
							 <textarea type="text" class="form-control" name="co_training_need" id="co_training_need" autocomplete="off"></textarea>
							 <div id="co_training_need_err"></div>
						  </div>
					   </div>
					   <button class="btn btn-primary btn-block btn-lg login-btn" name="submit" type="submit" onclick="addCorporate();"><?php echo $text_getintouch; ?></button>
					</div>
					<div class="flex" style="max-width: 100%;display:none;" id="co_step2">
					   <h5 class="modal-title" align="center" style="color:#fff">Step 2</h5>
					   <hr>
					   <!--<p style="color:#fff">Provide the OTP to your registred phone number.</p>
					   <div class="form-row">
						  <label class="form-label" for="validationSample01" style="color:#fff">Mobile OTP <span class="text-danger">*</span></label>
						  <input type="hidden" name="co_otp1" id="co_otp1">
						  <input type="text" class="form-control" name="co_mobile_otp" id="co_mobile_otp">
					   </div>
					   <div id="co_mobileotp_err"></div>-->
					   <p style="color:#fff">Provide the OTP to your registred mail ID.</p>
					   <div class="form-row">
						  <label class="form-label" for="validationSample01" style="color:#fff">Email OTP <span class="text-danger">*</span></label>
						  <input type="hidden" name="co_otp2" id="co_otp2">
						  <input type="text" class="form-control" name="co_email_otp" id="co_email_otp">
					   </div>
					   <br><br>
					   <div id="co_emailotp_err"></div>
					   <button class="btn btn-primary btn-block btn-lg login-btn" name="submit" type="submit" onclick="finalCorporateSignIN();">Submit</button>
					</div>
				 </div>
			</div>
		</div>

	</div>
</div>

<!-- // END Header -->		

<div class="page-section border-bottom-2 bg-white">
            <div class="container page__container">
               <div class="page-headline text-center">
                  <h2>Features</h2>
                  <p class="lead measure-lead mx-auto text-70">What other students turned professionals have to say about us after learning with us and reaching their goals.</p>
               </div>
               <div class="row align-items-center">
                  <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt pb-16pt pb-md-0">
                     <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">subscriptions</i>
                     </div>
                     <div class="flex">
                        <div class="card-title mb-4pt">8,000+ Courses</div>
                        <p class="card-subtitle text-70">Explore a wide range of skills.</p>
                     </div>
                  </div>
                  <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt pb-16pt pb-md-0">
                     <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">verified_user</i>
                     </div>
                     <div class="flex">
                        <div class="card-title mb-4pt">By Industry Experts</div>
                        <p class="card-subtitle text-70">Professional development from the best people.</p>
                     </div>
                  </div>
                  <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt pb-16pt pb-md-0">
                     <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">update</i>
                     </div>
                     <div class="flex">
                        <div class="card-title mb-4pt">Unlimited Access</div>
                        <p class="card-subtitle text-70">Unlock Library and learn any topic with one subscription.</p>
                     </div>
                  </div>
               </div>
               <div class="row align-items-center">
                  <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                     <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">code</i>
                     </div>
                     <div class="flex">
                        <div class="card-title mb-4pt">Lesson Source Files</div>
                        <p class="card-subtitle text-70">Explore a wide range of skills.</p>
                     </div>
                  </div>
                  <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                     <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">layers</i>
                     </div>
                     <div class="flex">
                        <div class="card-title mb-4pt">Printed Diploma</div>
                        <p class="card-subtitle text-70">Professional development from the best people.</p>
                     </div>
                  </div>
                  <div class="d-flex col-md align-items-center">
                     <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">accessibility</i>
                     </div>
                     <div class="flex">
                        <div class="card-title mb-4pt">Premium Support</div>
                        <p class="card-subtitle text-70">Unlock Library and learn any topic with one subscription.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="page-section border-bottom-2">
            <div class="container page__container">
               <div class="page-separator">
                  <div class="page-separator__text">Design Courses</div>
               </div>
               <div class="row card-group-row">
                  <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">
                     <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                        data-toggle="popover"
                        data-trigger="click">
                        <a href="student-course.html"
                           class="card-img-top js-image"
                           data-position=""
                           data-height="140">
                        <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/sketch_430x168.png"
                           alt="course">
                        <span class="overlay__content">
                        <span class="overlay__action d-flex flex-column text-center">
                        <i class="material-icons icon-32pt">play_circle_outline</i>
                        <span class="card-title text-white">Preview</span>
                        </span>
                        </span>
                        </a>
                        <div class="card-body flex">
                           <div class="d-flex">
                              <div class="flex">
                                 <a class="card-title"
                                    href="student-course.html">Learn Sketch</a>
                                 <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                              </div>
                              <a href="student-course.html"
                                 data-toggle="tooltip"
                                 data-title="Add Favorite"
                                 data-placement="top"
                                 data-boundary="window"
                                 class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                           </div>
                           <div class="d-flex">
                              <div class="rating flex">
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star_border</span></span>
                              </div>
                              <!-- <small class="text-50">6 hours</small> -->
                           </div>
                        </div>
                        <div class="card-footer">
                           <div class="row justify-content-between">
                              <div class="col-auto d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                              </div>
                              <div class="col-auto d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="popoverContainer d-none">
                        <div class="media">
                           <div class="media-left mr-12pt">
                              <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/sketch_40x40@2x.png"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                           </div>
                           <div class="media-body">
                              <div class="card-title mb-0">Learn Sketch</div>
                              <p class="lh-1 mb-0">
                                 <span class="text-50 small">with</span>
                                 <span class="text-50 small font-weight-bold">Elijah Murray</span>
                              </p>
                           </div>
                        </div>
                        <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>
                        <div class="mb-16pt">
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                           </div>
                        </div>
                        <div class="row align-items-center">
                           <div class="col-auto">
                              <div class="d-flex align-items-center mb-4pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                              </div>
                              <div class="d-flex align-items-center mb-4pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                              <div class="d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
                              </div>
                           </div>
                           <div class="col text-right">
                              <a href="student-course.html"
                                 class="btn btn-primary">Watch trailer</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">
                     <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                        data-toggle="popover"
                        data-trigger="click">
                        <a href="student-course.html"
                           class="card-img-top js-image"
                           data-position=""
                           data-height="140">
                        <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/flinto_430x168.png"
                           alt="course">
                        <span class="overlay__content">
                        <span class="overlay__action d-flex flex-column text-center">
                        <i class="material-icons icon-32pt">play_circle_outline</i>
                        <span class="card-title text-white">Preview</span>
                        </span>
                        </span>
                        </a>
                        <div class="card-body flex">
                           <div class="d-flex">
                              <div class="flex">
                                 <a class="card-title"
                                    href="student-course.html">Learn Flinto</a>
                                 <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                              </div>
                              <a href="student-course.html"
                                 data-toggle="tooltip"
                                 data-title="Add Favorite"
                                 data-placement="top"
                                 data-boundary="window"
                                 class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                           </div>
                           <div class="d-flex">
                              <div class="rating flex">
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star_border</span></span>
                              </div>
                              <!-- <small class="text-50">6 hours</small> -->
                           </div>
                        </div>
                        <div class="card-footer">
                           <div class="row justify-content-between">
                              <div class="col-auto d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                              </div>
                              <div class="col-auto d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="popoverContainer d-none">
                        <div class="media">
                           <div class="media-left mr-12pt">
                              <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/flinto_40x40@2x.png"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                           </div>
                           <div class="media-body">
                              <div class="card-title mb-0">Learn Flinto</div>
                              <p class="lh-1 mb-0">
                                 <span class="text-50 small">with</span>
                                 <span class="text-50 small font-weight-bold">Elijah Murray</span>
                              </p>
                           </div>
                        </div>
                        <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>
                        <div class="mb-16pt">
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                           </div>
                        </div>
                        <div class="row align-items-center">
                           <div class="col-auto">
                              <div class="d-flex align-items-center mb-4pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                              </div>
                              <div class="d-flex align-items-center mb-4pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                              <div class="d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
                              </div>
                           </div>
                           <div class="col text-right">
                              <a href="student-course.html"
                                 class="btn btn-primary">Watch trailer</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">
                     <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                        data-toggle="popover"
                        data-trigger="click">
                        <a href="student-course.html"
                           class="card-img-top js-image"
                           data-position=""
                           data-height="140">
                        <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/photoshop_430x168.png"
                           alt="course">
                        <span class="overlay__content">
                        <span class="overlay__action d-flex flex-column text-center">
                        <i class="material-icons icon-32pt">play_circle_outline</i>
                        <span class="card-title text-white">Preview</span>
                        </span>
                        </span>
                        </a>
                        <div class="card-body flex">
                           <div class="d-flex">
                              <div class="flex">
                                 <a class="card-title"
                                    href="student-course.html">Learn Photoshop</a>
                                 <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                              </div>
                              <a href="student-course.html"
                                 data-toggle="tooltip"
                                 data-title="Add Favorite"
                                 data-placement="top"
                                 data-boundary="window"
                                 class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                           </div>
                           <div class="d-flex">
                              <div class="rating flex">
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star_border</span></span>
                              </div>
                              <!-- <small class="text-50">6 hours</small> -->
                           </div>
                        </div>
                        <div class="card-footer">
                           <div class="row justify-content-between">
                              <div class="col-auto d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                              </div>
                              <div class="col-auto d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="popoverContainer d-none">
                        <div class="media">
                           <div class="media-left mr-12pt">
                              <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/photoshop_40x40@2x.png"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                           </div>
                           <div class="media-body">
                              <div class="card-title mb-0">Learn Photoshop</div>
                              <p class="lh-1 mb-0">
                                 <span class="text-50 small">with</span>
                                 <span class="text-50 small font-weight-bold">Elijah Murray</span>
                              </p>
                           </div>
                        </div>
                        <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>
                        <div class="mb-16pt">
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                           </div>
                        </div>
                        <div class="row align-items-center">
                           <div class="col-auto">
                              <div class="d-flex align-items-center mb-4pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                              </div>
                              <div class="d-flex align-items-center mb-4pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                              <div class="d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
                              </div>
                           </div>
                           <div class="col text-right">
                              <a href="student-course.html"
                                 class="btn btn-primary">Watch trailer</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">
                     <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                        data-toggle="popover"
                        data-trigger="click">
                        <a href="student-course.html"
                           class="card-img-top js-image"
                           data-position=""
                           data-height="140">
                        <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/figma_430x168.png"
                           alt="course">
                        <span class="overlay__content">
                        <span class="overlay__action d-flex flex-column text-center">
                        <i class="material-icons icon-32pt">play_circle_outline</i>
                        <span class="card-title text-white">Preview</span>
                        </span>
                        </span>
                        </a>
                        <div class="card-body flex">
                           <div class="d-flex">
                              <div class="flex">
                                 <a class="card-title"
                                    href="student-course.html">Learn Figma</a>
                                 <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                              </div>
                              <a href="student-course.html"
                                 data-toggle="tooltip"
                                 data-title="Add Favorite"
                                 data-placement="top"
                                 data-boundary="window"
                                 class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                           </div>
                           <div class="d-flex">
                              <div class="rating flex">
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star</span></span>
                                 <span class="rating__item"><span class="material-icons">star_border</span></span>
                              </div>
                              <!-- <small class="text-50">6 hours</small> -->
                           </div>
                        </div>
                        <div class="card-footer">
                           <div class="row justify-content-between">
                              <div class="col-auto d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                              </div>
                              <div class="col-auto d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="popoverContainer d-none">
                        <div class="media">
                           <div class="media-left mr-12pt">
                              <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/figma_40x40@2x.png"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                           </div>
                           <div class="media-body">
                              <div class="card-title mb-0">Learn Figma</div>
                              <p class="lh-1 mb-0">
                                 <span class="text-50 small">with</span>
                                 <span class="text-50 small font-weight-bold">Elijah Murray</span>
                              </p>
                           </div>
                        </div>
                        <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>
                        <div class="mb-16pt">
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                           </div>
                           <div class="d-flex align-items-center">
                              <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                              <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                           </div>
                        </div>
                        <div class="row align-items-center">
                           <div class="col-auto">
                              <div class="d-flex align-items-center mb-4pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                              </div>
                              <div class="d-flex align-items-center mb-4pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                              <div class="d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
                              </div>
                           </div>
                           <div class="col text-right">
                              <a href="student-course.html"
                                 class="btn btn-primary">Watch trailer</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="page-section border-bottom-2">
            <div class="container page__container">
               <div class="page-separator">
                  <div class="page-separator__text">Learning Paths</div>
               </div>
               <div class="row card-group-row">
                  <div class="col-sm-4 card-group-row__col">
                     <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                        data-toggle="popover"
                        data-trigger="click">
                        <div class="card-body d-flex flex-column">
                           <div class="d-flex align-items-center">
                              <div class="flex">
                                 <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                       <div class="overlay">
                                          <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/react_40x40@2x.png"
                                             width="40"
                                             height="40"
                                             alt="Angular"
                                             class="rounded">
                                          <span class="overlay__content overlay__content-transparent">
                                          <span class="overlay__action d-flex flex-column text-center lh-1">
                                          <small class="h6 small text-white mb-0"
                                             style="font-weight: 500;">80%</small>
                                          </span>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="flex">
                                       <div class="card-title">React Native</div>
                                       <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                    </div>
                                 </div>
                              </div>
                              <a href="undefinedstudent-path.html"
                                 data-toggle="tooltip"
                                 data-title="Add Favorite"
                                 data-placement="top"
                                 data-boundary="window"
                                 class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                           </div>
                        </div>
                     </div>
                     <div class="popoverContainer d-none">
                        <div class="media">
                           <div class="media-left mr-12pt">
                              <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/react_40x40@2x.png"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                           </div>
                           <div class="media-body">
                              <div class="card-title">React Native</div>
                              <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                           </div>
                        </div>
                        <p class="mt-16pt text-70">Learn the fundamentals of working with React Native and how to create basic applications.</p>
                        <div class="my-32pt">
                           <div class="d-flex align-items-center mb-8pt justify-content-center">
                              <div class="d-flex align-items-center mr-8pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                              </div>
                              <div class="d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                           </div>
                           <div class="d-flex align-items-center justify-content-center">
                              <a href="undefinedstudent-path.html"
                                 class="btn btn-primary mr-8pt">Resume</a>
                              <a href="undefinedstudent-path.html"
                                 class="btn btn-outline-secondary ml-0">Start over</a>
                           </div>
                        </div>
                        <div class="d-flex align-items-center">
                           <small class="text-50 mr-8pt">Your rating</small>
                           <div class="rating mr-8pt">
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                           </div>
                           <small class="text-50">4/5</small>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4 card-group-row__col">
                     <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                        data-toggle="popover"
                        data-trigger="click">
                        <div class="card-body d-flex flex-column">
                           <div class="d-flex align-items-center">
                              <div class="flex">
                                 <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                       <div class="overlay">
                                          <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/devops_40x40@2x.png"
                                             width="40"
                                             height="40"
                                             alt="Angular"
                                             class="rounded">
                                          <span class="overlay__content overlay__content-transparent">
                                          <span class="overlay__action d-flex flex-column text-center lh-1">
                                          <small class="h6 small text-white mb-0"
                                             style="font-weight: 500;">80%</small>
                                          </span>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="flex">
                                       <div class="card-title">Dev Ops</div>
                                       <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                    </div>
                                 </div>
                              </div>
                              <a href="undefinedstudent-path.html"
                                 data-toggle="tooltip"
                                 data-title="Add Favorite"
                                 data-placement="top"
                                 data-boundary="window"
                                 class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                           </div>
                        </div>
                     </div>
                     <div class="popoverContainer d-none">
                        <div class="media">
                           <div class="media-left mr-12pt">
                              <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/devops_40x40@2x.png"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                           </div>
                           <div class="media-body">
                              <div class="card-title">Dev Ops</div>
                              <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                           </div>
                        </div>
                        <p class="mt-16pt text-70">Learn the fundamentals of working with Dev Ops and how to create basic applications.</p>
                        <div class="my-32pt">
                           <div class="d-flex align-items-center mb-8pt justify-content-center">
                              <div class="d-flex align-items-center mr-8pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                              </div>
                              <div class="d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                           </div>
                           <div class="d-flex align-items-center justify-content-center">
                              <a href="undefinedstudent-path.html"
                                 class="btn btn-primary mr-8pt">Resume</a>
                              <a href="undefinedstudent-path.html"
                                 class="btn btn-outline-secondary ml-0">Start over</a>
                           </div>
                        </div>
                        <div class="d-flex align-items-center">
                           <small class="text-50 mr-8pt">Your rating</small>
                           <div class="rating mr-8pt">
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                           </div>
                           <small class="text-50">4/5</small>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4 card-group-row__col">
                     <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                        data-toggle="popover"
                        data-trigger="click">
                        <div class="card-body d-flex flex-column">
                           <div class="d-flex align-items-center">
                              <div class="flex">
                                 <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                       <div class="overlay">
                                          <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/redis_40x40@2x.png"
                                             width="40"
                                             height="40"
                                             alt="Angular"
                                             class="rounded">
                                          <span class="overlay__content overlay__content-transparent">
                                          <span class="overlay__action d-flex flex-column text-center lh-1">
                                          <small class="h6 small text-white mb-0"
                                             style="font-weight: 500;">80%</small>
                                          </span>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="flex">
                                       <div class="card-title">Redis</div>
                                       <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                    </div>
                                 </div>
                              </div>
                              <a href="undefinedstudent-path.html"
                                 data-toggle="tooltip"
                                 data-title="Add Favorite"
                                 data-placement="top"
                                 data-boundary="window"
                                 class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                           </div>
                        </div>
                     </div>
                     <div class="popoverContainer d-none">
                        <div class="media">
                           <div class="media-left mr-12pt">
                              <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/redis_40x40@2x.png"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                           </div>
                           <div class="media-body">
                              <div class="card-title">Redis</div>
                              <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                           </div>
                        </div>
                        <p class="mt-16pt text-70">Learn the fundamentals of working with Redis and how to create basic applications.</p>
                        <div class="my-32pt">
                           <div class="d-flex align-items-center mb-8pt justify-content-center">
                              <div class="d-flex align-items-center mr-8pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                              </div>
                              <div class="d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                           </div>
                           <div class="d-flex align-items-center justify-content-center">
                              <a href="undefinedstudent-path.html"
                                 class="btn btn-primary mr-8pt">Resume</a>
                              <a href="undefinedstudent-path.html"
                                 class="btn btn-outline-secondary ml-0">Start over</a>
                           </div>
                        </div>
                        <div class="d-flex align-items-center">
                           <small class="text-50 mr-8pt">Your rating</small>
                           <div class="rating mr-8pt">
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                           </div>
                           <small class="text-50">4/5</small>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row card-group-row mb-lg-8pt">
                  <div class="col-sm-4 card-group-row__col">
                     <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card mb-lg-0"
                        data-toggle="popover"
                        data-trigger="click">
                        <div class="card-body d-flex flex-column">
                           <div class="d-flex align-items-center">
                              <div class="flex">
                                 <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                       <div class="overlay">
                                          <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/mailchimp_40x40@2x.png"
                                             width="40"
                                             height="40"
                                             alt="Angular"
                                             class="rounded">
                                          <span class="overlay__content overlay__content-transparent">
                                          <span class="overlay__action d-flex flex-column text-center lh-1">
                                          <small class="h6 small text-white mb-0"
                                             style="font-weight: 500;">80%</small>
                                          </span>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="flex">
                                       <div class="card-title">MailChimp</div>
                                       <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                    </div>
                                 </div>
                              </div>
                              <a href="undefinedstudent-path.html"
                                 data-toggle="tooltip"
                                 data-title="Add Favorite"
                                 data-placement="top"
                                 data-boundary="window"
                                 class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                           </div>
                        </div>
                     </div>
                     <div class="popoverContainer d-none">
                        <div class="media">
                           <div class="media-left mr-12pt">
                              <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/mailchimp_40x40@2x.png"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                           </div>
                           <div class="media-body">
                              <div class="card-title">MailChimp</div>
                              <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                           </div>
                        </div>
                        <p class="mt-16pt text-70">Learn the fundamentals of working with MailChimp and how to create basic applications.</p>
                        <div class="my-32pt">
                           <div class="d-flex align-items-center mb-8pt justify-content-center">
                              <div class="d-flex align-items-center mr-8pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                              </div>
                              <div class="d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                           </div>
                           <div class="d-flex align-items-center justify-content-center">
                              <a href="undefinedstudent-path.html"
                                 class="btn btn-primary mr-8pt">Resume</a>
                              <a href="undefinedstudent-path.html"
                                 class="btn btn-outline-secondary ml-0">Start over</a>
                           </div>
                        </div>
                        <div class="d-flex align-items-center">
                           <small class="text-50 mr-8pt">Your rating</small>
                           <div class="rating mr-8pt">
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                           </div>
                           <small class="text-50">4/5</small>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4 card-group-row__col">
                     <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card mb-lg-0"
                        data-toggle="popover"
                        data-trigger="click">
                        <div class="card-body d-flex flex-column">
                           <div class="d-flex align-items-center">
                              <div class="flex">
                                 <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                       <div class="overlay">
                                          <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/swift_40x40@2x.png"
                                             width="40"
                                             height="40"
                                             alt="Angular"
                                             class="rounded">
                                          <span class="overlay__content overlay__content-transparent">
                                          <span class="overlay__action d-flex flex-column text-center lh-1">
                                          <small class="h6 small text-white mb-0"
                                             style="font-weight: 500;">80%</small>
                                          </span>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="flex">
                                       <div class="card-title">Swift</div>
                                       <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                    </div>
                                 </div>
                              </div>
                              <a href="undefinedstudent-path.html"
                                 data-toggle="tooltip"
                                 data-title="Add Favorite"
                                 data-placement="top"
                                 data-boundary="window"
                                 class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                           </div>
                        </div>
                     </div>
                     <div class="popoverContainer d-none">
                        <div class="media">
                           <div class="media-left mr-12pt">
                              <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/swift_40x40@2x.png"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                           </div>
                           <div class="media-body">
                              <div class="card-title">Swift</div>
                              <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                           </div>
                        </div>
                        <p class="mt-16pt text-70">Learn the fundamentals of working with Swift and how to create basic applications.</p>
                        <div class="my-32pt">
                           <div class="d-flex align-items-center mb-8pt justify-content-center">
                              <div class="d-flex align-items-center mr-8pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                              </div>
                              <div class="d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                           </div>
                           <div class="d-flex align-items-center justify-content-center">
                              <a href="undefinedstudent-path.html"
                                 class="btn btn-primary mr-8pt">Resume</a>
                              <a href="undefinedstudent-path.html"
                                 class="btn btn-outline-secondary ml-0">Start over</a>
                           </div>
                        </div>
                        <div class="d-flex align-items-center">
                           <small class="text-50 mr-8pt">Your rating</small>
                           <div class="rating mr-8pt">
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                           </div>
                           <small class="text-50">4/5</small>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4 card-group-row__col">
                     <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card mb-lg-0"
                        data-toggle="popover"
                        data-trigger="click">
                        <div class="card-body d-flex flex-column">
                           <div class="d-flex align-items-center">
                              <div class="flex">
                                 <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                       <div class="overlay">
                                          <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/wordpress_40x40@2x.png"
                                             width="40"
                                             height="40"
                                             alt="Angular"
                                             class="rounded">
                                          <span class="overlay__content overlay__content-transparent">
                                          <span class="overlay__action d-flex flex-column text-center lh-1">
                                          <small class="h6 small text-white mb-0"
                                             style="font-weight: 500;">80%</small>
                                          </span>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="flex">
                                       <div class="card-title">WordPress</div>
                                       <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                    </div>
                                 </div>
                              </div>
                              <a href="undefinedstudent-path.html"
                                 data-toggle="tooltip"
                                 data-title="Add Favorite"
                                 data-placement="top"
                                 data-boundary="window"
                                 class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                           </div>
                        </div>
                     </div>
                     <div class="popoverContainer d-none">
                        <div class="media">
                           <div class="media-left mr-12pt">
                              <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/wordpress_40x40@2x.png"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                           </div>
                           <div class="media-body">
                              <div class="card-title">WordPress</div>
                              <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                           </div>
                        </div>
                        <p class="mt-16pt text-70">Learn the fundamentals of working with WordPress and how to create basic applications.</p>
                        <div class="my-32pt">
                           <div class="d-flex align-items-center mb-8pt justify-content-center">
                              <div class="d-flex align-items-center mr-8pt">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                              </div>
                              <div class="d-flex align-items-center">
                                 <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                 <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                              </div>
                           </div>
                           <div class="d-flex align-items-center justify-content-center">
                              <a href="undefinedstudent-path.html"
                                 class="btn btn-primary mr-8pt">Resume</a>
                              <a href="undefinedstudent-path.html"
                                 class="btn btn-outline-secondary ml-0">Start over</a>
                           </div>
                        </div>
                        <div class="d-flex align-items-center">
                           <small class="text-50 mr-8pt">Your rating</small>
                           <div class="rating mr-8pt">
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                              <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                           </div>
                           <small class="text-50">4/5</small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="page-section border-bottom-2">
            <div class="container page__container">
               <div class="page-separator">
                  <div class="page-separator__text">From the blog</div>
               </div>
               <div class="row card-group-row">
                  <div class="col-md-6 col-lg-4 card-group-row__col">
                     <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                        <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/sketch_430x168.png"
                           alt=""
                           class="card-img">
                        <div class="fullbleed bg-primary"
                           style="opacity: .5"></div>
                        <div class="posts-card-popular__content">
                           <div class="card-body d-flex align-items-center">
                              <div class="avatar-group flex">
                                 <div class="avatar avatar-xs"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Janell D.">
                                    <a href=""><img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/256_luke-porter-261779-unsplash.jpg"
                                       alt="Avatar"
                                       class="avatar-img rounded-circle"></a>
                                 </div>
                              </div>
                              <a style="text-decoration: none;"
                                 class="d-flex align-items-center"
                                 href=""><i class="material-icons mr-1"
                                 style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                           </div>
                           <div class="posts-card-popular__title card-body">
                              <small class="text-muted text-uppercase">sketch</small>
                              <a class="card-title"
                                 href="">Merge Duplicates Inconsistent Symbols</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4 card-group-row__col">
                     <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                        <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/invision_430x168.png"
                           alt=""
                           class="card-img">
                        <div class="fullbleed bg-primary"
                           style="opacity: .5"></div>
                        <div class="posts-card-popular__content">
                           <div class="card-body d-flex align-items-center">
                              <div class="avatar-group flex">
                                 <div class="avatar avatar-xs"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Janell D.">
                                    <a href=""><img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/256_michael-dam-258165-unsplash.jpg"
                                       alt="Avatar"
                                       class="avatar-img rounded-circle"></a>
                                 </div>
                              </div>
                              <a style="text-decoration: none;"
                                 class="d-flex align-items-center"
                                 href=""><i class="material-icons mr-1"
                                 style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                           </div>
                           <div class="posts-card-popular__title card-body">
                              <small class="text-muted text-uppercase">invision</small>
                              <a class="card-title"
                                 href="">Design Systems Essentials</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4 card-group-row__col">
                     <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                        <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/photoshop_430x168.png"
                           alt=""
                           class="card-img">
                        <div class="fullbleed bg-primary"
                           style="opacity: .5"></div>
                        <div class="posts-card-popular__content">
                           <div class="card-body d-flex align-items-center">
                              <div class="avatar-group flex">
                                 <div class="avatar avatar-xs"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Janell D.">
                                    <a href=""><img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/256_rsz_1andy-lee-642320-unsplash.jpg"
                                       alt="Avatar"
                                       class="avatar-img rounded-circle"></a>
                                 </div>
                              </div>
                              <a style="text-decoration: none;"
                                 class="d-flex align-items-center"
                                 href=""><i class="material-icons mr-1"
                                 style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                           </div>
                           <div class="posts-card-popular__title card-body">
                              <small class="text-muted text-uppercase">photoshop</small>
                              <a class="card-title"
                                 href="">Semantic Logo Design</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="posts-cards">
                  <div class="card posts-card mb-0">
                     <div class="posts-card__content d-flex align-items-center flex-wrap">
                        <div class="avatar avatar-lg mr-3">
                           <a href="blog-post.html"><img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/invision_200x168.png"
                              alt="avatar"
                              class="avatar-img rounded"></a>
                        </div>
                        <div class="posts-card__title flex d-flex flex-column">
                           <a href="blog-post.html"
                              class="card-title mr-3">Design Systems Essentials</a>
                           <small class="text-50">35 views last week</small>
                        </div>
                        <div class="d-flex align-items-center flex-column flex-sm-row posts-card__meta">
                           <div class="mr-3 text-50 text-uppercase posts-card__tag d-flex align-items-center">
                              <i class="material-icons text-muted-light mr-1">folder_open</i> inVision
                           </div>
                           <div class="mr-3 text-50 posts-card__date">
                              <small>11 Nov, 2018 07:46 AM</small>
                           </div>
                           <div class="media ml-sm-auto align-items-center">
                              <div class="media-left mr-2 avatar-group">
                                 <div class="avatar avatar-xs"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Janell D.">
                                    <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/256_rsz_1andy-lee-642320-unsplash.jpg"
                                       alt="Avatar"
                                       class="avatar-img rounded-circle">
                                 </div>
                                 <div class="avatar avatar-xs"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Janell D.">
                                    <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/256_michael-dam-258165-unsplash.jpg"
                                       alt="Avatar"
                                       class="avatar-img rounded-circle">
                                 </div>
                                 <div class="avatar avatar-xs"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Janell D.">
                                    <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/256_luke-porter-261779-unsplash.jpg"
                                       alt="Avatar"
                                       class="avatar-img rounded-circle">
                                 </div>
                              </div>
                              <div class="media-body">
                                 <a href="">+2 more</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="page-section bg-alt">
            <div class="container page__container">
               <div class="page-separator">
                  <div class="page-separator__text">Feedback</div>
               </div>
               <div class="row">
                  <div class="col-sm-6 col-md-4">
                     <div class="card card-feedback card-body">
                        <blockquote class="blockquote mb-0">
                           <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                        </blockquote>
                     </div>
                     <div class="media ml-12pt">
                        <div class="media-left mr-12pt">
                           <a href="student-profile.html"
                              class="avatar avatar-sm">
                              <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                              <span class="avatar-title rounded-circle">UK</span>
                           </a>
                        </div>
                        <div class="media-body media-middle">
                           <a href="student-profile.html"
                              class="card-title">Umberto Kass</a>
                           <div class="rating mt-4pt">
                              <span class="rating__item"><span class="material-icons">star</span></span>
                              <span class="rating__item"><span class="material-icons">star</span></span>
                              <span class="rating__item"><span class="material-icons">star</span></span>
                              <span class="rating__item"><span class="material-icons">star</span></span>
                              <span class="rating__item"><span class="material-icons">star_border</span></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                     <div class="card card-feedback card-body">
                        <blockquote class="blockquote mb-0">
                           <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                        </blockquote>
                     </div>
                     <div class="media ml-12pt">
                        <div class="media-left mr-12pt">
                           <a href="student-profile.html"
                              class="avatar avatar-sm">
                              <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                              <span class="avatar-title rounded-circle">UK</span>
                           </a>
                        </div>
                        <div class="media-body media-middle">
                           <a href="student-profile.html"
                              class="card-title">Umberto Kass</a>
                           <div class="rating mt-4pt">
                              <span class="rating__item"><span class="material-icons">star</span></span>
                              <span class="rating__item"><span class="material-icons">star</span></span>
                              <span class="rating__item"><span class="material-icons">star</span></span>
                              <span class="rating__item"><span class="material-icons">star</span></span>
                              <span class="rating__item"><span class="material-icons">star_border</span></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                     <div class="card card-feedback card-body">
                        <blockquote class="blockquote mb-0">
                           <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                        </blockquote>
                     </div>
                     <div class="media ml-12pt">
                        <div class="media-left mr-12pt">
                           <a href="student-profile.html"
                              class="avatar avatar-sm">
                              <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                              <span class="avatar-title rounded-circle">UK</span>
                           </a>
                        </div>
                        <div class="media-body media-middle">
                           <a href="student-profile.html"
                              class="card-title">Umberto Kass</a>
                           <div class="rating mt-4pt">
                              <span class="rating__item"><span class="material-icons">star</span></span>
                              <span class="rating__item"><span class="material-icons">star</span></span>
                              <span class="rating__item"><span class="material-icons">star</span></span>
                              <span class="rating__item"><span class="material-icons">star</span></span>
                              <span class="rating__item"><span class="material-icons">star_border</span></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- // END Header Layout Content -->
<!-- Footer -->
      <div class="bg-dark border-top-2 mt-auto">
         <div class="container page__container page-section d-flex flex-column">
            <p class="text-white-70 brand mb-24pt">
               <img class="brand-icon"
                  src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/logo/white-100@2x.png"
                  width="30"
                  alt="Luma"> Luma
            </p>
            <p class="measure-lead-max text-white-50 small mr-8pt">Luma is a beautifully crafted user interface for modern Education Platforms, including Courses & Tutorials, Video Lessons, Student and Teacher Dashboard, Curriculum Management, Earnings and Reporting, ERP, HR, CMS, Tasks, Projects, eCommerce and more.</p>
            <p class="mb-8pt d-flex">
               <a href=""
                  class="text-white-70 text-underline mr-8pt small">Terms</a>
               <a href=""
                  class="text-white-70 text-underline small">Privacy policy</a>
            </p>
            <p class="text-white-50 small mt-n1 mb-0">Copyright 2019 &copy; All rights reserved.</p>
         </div>
      </div>
      <!-- // END Footer -->
      <!-- // END Header Layout -->
      <!-- jQuery -->
      <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/popper.min.js"></script>
      <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/bootstrap.min.js"></script>
      <!-- Perfect Scrollbar -->
      <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/perfect-scrollbar.min.js"></script>
      <!-- DOM Factory -->
      <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/dom-factory.js"></script>
      <!-- MDK -->
      <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/material-design-kit.js"></script>
      <!-- App JS -->
      <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/app.js"></script>
      <!-- Preloader -->
      <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/preloader.js"></script>
	  
	<script>
		function isNumberKey(evt) {
			 var charCode = (evt.which) ? evt.which : event.keyCode
			 if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;

			 return true;
		}
	</script>
	<script>
		function addCorporate() {
			var first_name = document.getElementById("co_first_name").value;
			var last_name = document.getElementById("co_last_name").value;
			var domain = document.getElementById("co_domain").value;
			var work_mail = document.getElementById("co_work_mail").value;
			var phone_number = document.getElementById("co_phone_number").value;
			var phone_code = document.getElementById("co_phonecode").value;
			var company_name = document.getElementById("co_company_name").value;
			var company_size = document.getElementById("co_company_size").value;
			var training_need = document.getElementById("co_training_need").value;
			var url_path = '<?php echo base_url(); ?>dashboard';
			
			var err = 0;
			if (first_name == '') {
				$("#co_first_name_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>First name should not empty!</div>').show('fast').delay(5000).hide('fast');
				document.getElementById("co_first_name").focus();
				err++;
				return false;
			}
			if (last_name == '') {
				$("#co_last_name_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Last name should not empty!</div>').show('fast').delay(5000).hide('fast');
				document.getElementById("co_last_name").focus();
				err++;
				return false;
			}
			if (domain == '') {
				$("#co_domain_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Domain name should not empty!</div>').show('fast').delay(5000).hide('fast');
				document.getElementById("co_domain").focus();
				err++;
				return false;
			}
			if (work_mail == '') {
				$("#co_work_mail_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Work email should not empty!</div>').show('fast').delay(5000).hide('fast');
				document.getElementById("co_work_mail").focus();
				err++;
				return false;
			} else {
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

				if (reg.test(work_mail) == false) {
					$("#co_work_mail_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Invalid Email ID!</div>').show('fast').delay(5000).hide('fast');
					document.getElementById("co_work_mail").focus();
					
					err++;
					return false;
				} else {
					var ind=work_mail.indexOf("@");
					var my_slice=work_mail.slice((ind+1),work_mail.length);
					if(domain != my_slice) {
						$("#co_work_mail_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>The provided domain and emailID domain is not same!</div>').show('fast').delay(5000).hide('fast');
						document.getElementById("co_work_mail").focus();
						
						err++;
						return false;
					}
				}
			}
			if (phone_number == '') {
				$("#co_phone_number_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Phone number should not empty!</div>').show('fast').delay(5000).hide('fast');
				document.getElementById("co_phone_number").focus();
				err++;
				return false;
			}
			if (company_name == '') {
				$("#co_company_name_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Company name should not empty!</div>').show('fast').delay(5000).hide('fast');
				document.getElementById("co_company_name").focus();
				err++;
				return false;
			}
			if (company_size == '') {
				$("#co_company_size_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Please choose the comapny size!</div>').show('fast').delay(5000).hide('fast');
				document.getElementById("co_company_size").focus();
				err++;
				return false;
			}
			if (training_need == '') {
				$("#co_training_need_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Training needs should not empty!</div>').show('fast').delay(5000).hide('fast');
				document.getElementById("co_training_need").focus();
				err++;
				return false;
			}
			
			if(err == 0) {
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>common_ajax/addRequest',
					data:{first_name: first_name, last_name: last_name, domain: domain, work_mail: work_mail, phone_code: phone_code, phone_number: phone_number, company_name: company_name, company_size: company_size, training_need: training_need},
					dataType: 'json',
					success:function(json){
						if(json['success'] == 1) {
							document.getElementById("co_step1").style.display = "none";
							document.getElementById("co_step2").style.display = "block";
							
							//document.getElementById("co_otp1").value = json['mobile_otp'];
							document.getElementById("co_otp2").value = json['email_otp'];
							
							document.getElementById("co_first_name").value = '';
							document.getElementById("co_last_name").value = '';
							document.getElementById("co_domain").value = '';
							document.getElementById("co_work_mail").value = '';
							document.getElementById("co_phone_number").value = '';
							document.getElementById("co_company_name").value = '';
							document.getElementById("co_company_size").value = '';
							document.getElementById("co_training_need").value = '';
						} else {
							if(json['err_first_name']) {
								$("#co_first_name_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_first_name'] + '</div>').show('fast').delay(5000).hide('fast');
								document.getElementById("co_first_name").focus();
								return false;
							}
							if(json['err_last_name']) {
								$("#co_last_name_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_last_name'] + '</div>').show('fast').delay(5000).hide('fast');
								document.getElementById("co_last_name").focus();
								return false;
							}
							if(json['err_domain']) {
								$("#co_domain_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_domain'] + '</div>').show('fast').delay(5000).hide('fast');
								document.getElementById("co_domain").focus();
								return false;
							}
							if(json['err_email']) {
								$("#co_work_mail_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_email'] + '</div>').show('fast').delay(5000).hide('fast');
								document.getElementById("co_work_mail").focus();
								return false;
							}
							if(json['err_telephone']) {
								$("#co_phone_number_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_telephone'] + '</div>').show('fast').delay(5000).hide('fast');
								document.getElementById("co_phone_number").focus();
								return false;
							}
							if(json['err_comapny']) {
								$("#co_company_name_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_comapny'] + '</div>').show('fast').delay(5000).hide('fast');
								document.getElementById("co_company_name").focus();
								return false;
							}
							if(json['err_size']) {
								$("#co_company_size_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_size'] + '</div>').show('fast').delay(5000).hide('fast');
								document.getElementById("co_company_size").focus();
								return false;
							}
							if(json['err_need']) {
								$("#co_training_need_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_need'] + '</div>').show('fast').delay(5000).hide('fast');
								document.getElementById("co_training_need").focus();
								return false;
							}
						}
					},
					error: function (xhr, ajaxOptions, thrownError) {
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			} else {
				return false;
			}
		}
	</script>
	<script>
		function finalCorporateSignIN() {
			//var mobile_otp = document.getElementById("co_mobile_otp").value;
			var email_otp = document.getElementById("co_email_otp").value;
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>common_ajax/checkCorporateOTP',
				data:{/*mobile_otp: mobile_otp, */email_otp: email_otp},
				dataType: 'json',
				success:function(json){
					if(json['success'] == 1) {
						//document.getElementById("co_mobile_otp").value = '';
						document.getElementById("co_email_otp").value = '';
						document.getElementById("co_step2").style.display = "none";
						document.getElementById("co_step1").style.display = "block";
						document.getElementById("success_div").style.display = "block";
						
						document.getElementById("co_first_name").value = '';
						document.getElementById("co_last_name").value = '';
						document.getElementById("co_domain").value = '';
						document.getElementById("co_work_mail").value = '';
						document.getElementById("co_phone_number").value = '';
						document.getElementById("co_company_name").value = '';
						document.getElementById("co_company_size").value = '';
						document.getElementById("co_training_need").value = '';
						if(json['msg']) {
							$("#success_div").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['msg'] + '</div>').show('fast').delay(5000).hide('fast');
						}
					} else {
						if(json['err_mobileotp']) {
							$("#co_mobileotp_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_mobileotp'] + '</div>').show('fast').delay(5000).hide('fast');
						}
						if(json['err_emailotp']) {
							$("#co_emailotp_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_emailotp'] + '</div>').show('fast').delay(5000).hide('fast');
						}
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	</script>
   </body>
</html>