<style>
	.nav-tabs {
    border-bottom: none !important;
}

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #336683 !important;
    background-color: #a4d6ef !important;
    border-color: transparent transparent #f3f3f3;
}
#tabs .nav-tabs .nav-link {
    border: 1px solid transparent;
    color: #eee;
    font-size: 20px;
    background-color: #336683;
    border: 1px solid #a4d6ef;
    color: #a4d6ef;
}

.nav-item {
    border-radius: 0 !important;
}

.nav-item:last-child {
    border-top-right-radius: .5rem !important;
    border-bottom-right-radius: .5rem !important;
}

.nav-item:first-child {
    border-top-left-radius: .5rem !important;
    border-bottom-left-radius: .5rem !important;
}

.nav-tabs .nav-link.active{
   background-color: #a4d6ef !important; 
}
</style>
<div class="mdk-box bg-primary js-mdk-box mb-0" data-effects="blend-background"><div class="mdk-box__bg"></div>
    <div class="mdk-box__content">
        <div class="hero py-64pt text-center text-sm-left">
            <div class="container page__container">
                  <h1 class="text-white"><?php echo $course['training_name']; ?></h1>
                  <p class="lead text-white-50 measure-hero-lead"><?php echo $course['training_description']; ?></p>
            </div>
        </div>
    </div>
</div>
<div class="navbar navbar-expand-sm navbar-light  border-bottom-2 navbar-list p-0 m-0 align-items-center">
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
            <!-- <li class="nav-item navbar-list__item">
                <i class="material-icons text-muted icon--left">play_circle_outline</i>
                <?php echo $training_details[0]['total_lesson']; ?> Lessons
            </li> -->
<!--             <li class="nav-item ml-sm-auto text-sm-center flex-column navbar-list__item">
                <div class="rating rating-24">
                    <div class="rating__item"><i class="material-icons">star</i></div>
                    <div class="rating__item"><i class="material-icons">star</i></div>
                    <div class="rating__item"><i class="material-icons">star</i></div>
                    <div class="rating__item"><i class="material-icons">star</i></div>
                    <div class="rating__item"><i class="material-icons">star_border</i></div>
                </div>
                <p class="lh-1 mb-0"><small class="text-muted">20 ratings</small></p>
            </li> -->
        </ul>
    </div>
</div>
<div class="page-section border-bottom-2">
	
    <div class="container page__container">
    	<div class="flex" style="max-width: 100%">
		    <div class="mb-0">
		        <div class="card-body">
		            <ul class="card-title nav nav-pills nav-justified">
		            	<?php if($course['training_type'] == 'Online') { ?>
			                <li class="nav-item">
			                    <a class="nav-link active" data-toggle="tab" href="#course_deatils">Course Deatils</a>
			                </li>
		                
			                <li class="nav-item">
			                    <a class="nav-link" data-toggle="tab" href="#course_schedules">Course Schedules</a>
			                </li>
			            <?php } ?>
		            </ul>
		            <div class="tab-content mt-3 text-70">
		                <div id="course_deatils" class="tab-pane active">
		                	<div class="page-separator">
					            <div class="page-separator__text">Table of Contents</div>
					        </div>
					        <div class="row mb-0">
					            <div class="col-lg-7">
					            <?php if(!empty($section_data)) { ?>

					                <!-- <?php $training_master_id = urlencode(base64_encode($training_details[0]['training_master_id'])); ?> -->
					                

					               <?php foreach($section_data as $section): ?>
					                <div class="accordion js-accordion accordion--boxed list-group-flush" id="course-<?php echo $section['training_section_id']; ?>" data-domfactory-upgraded="accordion">
					                	<div class="accordion__item <?php ($section['ctr'] == 1) ? 'active' : '' ?>"> 
					                        <a href="#" class="accordion__toggle collapsed" data-toggle="collapse" data-target="#course-toc-<?php echo $section['training_section_id']; ?>" data-parent="#course-<?php echo $section['training_section_id']; ?>" aria-expanded="false">
					                            <span class="flex"><?php echo $section['section_name']; ?></span>
					                            <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
					                        </a>
					                        <div class="accordion__menu collapse" id="course-toc-<?php echo $section['training_section_id']; ?>">

					                        	<?php if($section['section_details']) { ?>
													<?php foreach($section['section_details'] as $detail) { ?>
														<div class="accordion__menu-link" id="<?php echo $detail->video_file_path; ?>" onclick="setVideo('<?php echo $detail->video_file_path; ?>');">
															<span class="icon-holder icon-holder--small icon-holder--dark rounded-circle d-inline-flex icon--left">
															<i class="material-icons icon-16pt">play_circle_outline</i>
															</span>
															<div class="play_video"> <a class="flex"><?php echo $detail->sub_section_name; ?></a> </div>
														</div>
													<?php } ?>
												<?php } else { ?>
													<div class="accordion__menu-link">
														<span class="text-muted">No Videos Available</span>
													</div>
												<?php } ?>
					                        </div>
					                    </div>
					                </div>

					                <?php endforeach; ?>

					            <?php } else { ?>

					            <?php } ?>



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
		                <?php if($course['training_type'] == 'Online') { ?>
			                <div id="course_schedules" class="tab-pane">

	                            <div class="posts-cards mb-24pt">

	                            	<?php foreach($schedule_data as $schedule) { ?>
                            			<div class="card posts-card">
				                            <div class="posts-card__content d-flex align-items-center flex-wrap">
				                                <div class="avatar avatar-lg mr-3">
					                                <img src="<?php echo $this->config->item('default_url'); ?>/assets/image/logo.png"" alt="avatar" class="avatar-img rounded">
					                            </div>
				                                <div class="posts-card__title flex d-flex flex-column">
				                                    <p class="card-title mr-3 text-50"><?php echo $schedule['training_day']; ?></p>
				                                    <!-- <small class="text-50">35 views last week</small> -->
				                                </div>
				                                <div class="posts-card__title flex d-flex flex-column">
				                                    <p class="card-title mr-3 text-50"><i class="material-icons text-muted-light mr-1">schedule</i> <?php echo $schedule['date']; ?> <?php echo $schedule['start_time']; ?></p>
				                                    <!-- <small class="text-50">35 views last week</small> -->
				                                </div>
				                                <div class="posts-card__title flex d-flex flex-column">
				                                    <p class="card-title mr-3 text-50"><?php echo $schedule['status']; ?></p>
				                                    <!-- <small class="text-50">35 views last week</small> -->
				                                </div>
				                                <div class="dropdown ml-auto">
				                                	<!-- <?php echo $training_master_id.'_'.$training_section_id.'_'.$training_section_detail_id.'_'.$meeting_id.'_'.$customer_id; ?> -->
				                                	<button data-value="" class="attend_meeting btn btn-outline-dark mb-16pt mb-sm-0 mr-sm-16pt">Attend meeting <i class="material-icons icon--right">play_circle_outline</i>
				                                    <!-- <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
				                                    <div class="dropdown-menu dropdown-menu-right">
				                                        <a href="javascript:void(0)" class="dropdown-item">Action</a>
				                                        <a href="javascript:void(0)" class="dropdown-item">Other Action</a>
				                                        <div class="dropdown-divider"></div>
				                                        <a href="javascript:void(0)" class="dropdown-item">Some Other Action</a>
				                                    </div> -->
				                                </div>
				                            </div>
					                    </div>
									<?php } ?>

			                       

			                        
			                    </div>              	
			                </div>
			            <?php } ?>
		            </div>
		        </div>
		    </div>
		</div>

        
    </div>
</div>
<script>
   function setVideo(src) {
   	document.getElementById('container').innerHTML = '<video autoplay controls controls crossorigin playsinline id="player"><source src="'+src+'" type="video/mp4"></video>';
   	document.getElementById('video_ctrl').play();
   }
</script>