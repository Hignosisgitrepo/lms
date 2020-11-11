<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content ">
   <div class="pt-32pt">
      <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
         <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
               <h2 class="mb-0">Course View</h2>
               <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>mycourses">My Courses</a></li>
                  <li class="breadcrumb-item active">Course View</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Header Layout Content -->
      <div class="mdk-box bg-primary js-mdk-box mb-0"
         data-effects="blend-background">
         <div class="mdk-box__content">
            <div class="hero py-64pt text-center text-sm-left">
               <div class="container page__container">
                  <h1 class="text-white"><?php echo $course['training_name']; ?></h1>
                  <p class="lead text-white-50 measure-hero-lead"><?php echo $course['training_description']; ?></p>
                  <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                     <a href="student-lesson.html"
                        class="btn btn-outline-white mb-16pt mb-sm-0 mr-sm-16pt">Watch trailer <i class="material-icons icon--right">play_circle_outline</i></a>
                     <a href="pricing.html"
                        class="btn btn-white">Start your free trial</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="navbar navbar-expand-sm navbar-light bg-white border-bottom-2 navbar-list p-0 m-0 align-items-center">
         <div class="container page__container">
            <ul class="nav navbar-nav flex align-items-sm-center">
               <li class="nav-item navbar-list__item">
                  <i class="material-icons text-muted icon--left">schedule</i>
                  <?php echo $course['course_duration']; ?> Hrs
               </li>
               <li class="nav-item navbar-list__item">
                  <i class="material-icons text-muted icon--left">assessment</i>
                  <?php echo $program_level_name; ?>
               </li>
               <li class="nav-item ml-sm-auto text-sm-center flex-column navbar-list__item">
                  <div class="rating rating-24">
                     <div class="rating__item"><i class="material-icons">star</i></div>
                     <div class="rating__item"><i class="material-icons">star</i></div>
                     <div class="rating__item"><i class="material-icons">star</i></div>
                     <div class="rating__item"><i class="material-icons">star</i></div>
                     <div class="rating__item"><i class="material-icons">star_border</i></div>
                  </div>
                  <p class="lh-1 mb-0"><small class="text-muted">20 ratings</small></p>
               </li>
            </ul>
         </div>
      </div>
      <div class="page-section border-bottom-2">
         <div class="container page__container">
            <div class="page-separator">
               <div class="page-separator__text">Table of Contents</div>
            </div>
            <div class="row mb-0">
               <div class="col-lg-7">
                  <div class="accordion js-accordion accordion--boxed list-group-flush" id="parent">
                     <?php if($section_data) { ?>
                     <?php foreach($section_data as $section) { ?>
                     <?php if($section['ctr'] == 1) { ?>
                     <div class="accordion__item active">
                        <?php } else { ?>
                        <div class="accordion__item">
                           <?php } ?>
                           <a href="#"
                              class="accordion__toggle collapsed"
                              data-toggle="collapse"
                              data-target="#course-toc-<?php echo $section['training_section_id']; ?>"
                              data-parent="#parent">
                           <span class="flex"><?php echo $section['section_name']; ?></span>
                           <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                           </a>
                           <div class="accordion__menu collapse" id="course-toc-<?php echo $section['training_section_id']; ?>">
                              <?php if($section['section_details']) { ?>
                              <?php foreach($section['section_details'] as $detail) { ?>
                              <div class="accordion__menu-link">
                                 <span class="icon-holder icon-holder--small icon-holder--dark rounded-circle d-inline-flex icon--left">
                                 <i class="material-icons icon-16pt">play_circle_outline</i>
                                 </span>
                                 <div class="play_video"> <a class="flex" id="<?php echo $detail->video_file_path; ?>" onclick="setVideo('<?php echo $detail->video_file_path; ?>');"><?php echo $detail->sub_section_name; ?></a> </div>
                              </div>
                              <?php } ?>
                              <?php } else { ?>
                              <div class="accordion__menu-link">
                                 <span class="text-muted">No Videos Available</span>
                              </div>
                              <?php } ?>
                           </div>
                        </div>
                        <?php } ?>
                        <?php } else { ?>
                        No Sections Available!
                        <?php } ?>
                     </div>
                  </div>
                  <div class="col-lg-5 justify-content-center">
                     <div class="card">
                        <div class="embed-responsive embed-responsive-16by9">
                           <div id="container">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 <?php if($course['training_type'] == 'Online') { ?>
		 
         <?php } ?>
      </div>
   </div>
   <!-- // END Header Layout Content -->
</div>
<!-- // END Header Layout Content -->
<script>
   function setVideo(src) {
   	document.getElementById('container').innerHTML = '<video autoplay controls controls crossorigin playsinline id="player"><source src="'+src+'" type="video/mp4"></video>';
   	document.getElementById('video_ctrl').play();
   }
</script>