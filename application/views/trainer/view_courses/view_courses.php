<div class="mdk-box bg-primary js-mdk-box mb-0" data-effects="blend-background"><div class="mdk-box__bg"></div>
    <div class="mdk-box__content">
        <div class="hero py-64pt text-center text-sm-left">
            <div class="container page__container">
                <h1 class="text-white"><?php echo $training_details[0]['training_name']; ?></h1>
                <p class="lead text-white-50 measure-hero-lead">It’s not every day that one of the most important front-end libraries in web development gets a complete overhaul. Keep your skills relevant and up-to-date with this comprehensive introduction to Google’s popular community project.</p>
                <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                    <a href="student-lesson.html" class="btn btn-outline-white mb-16pt mb-sm-0 mr-sm-16pt">Watch trailer <i class="material-icons icon--right">play_circle_outline</i></a>
                    <a href="pricing.html" class="btn btn-white">Start your free trial</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="navbar navbar-expand-sm navbar-light  border-bottom-2 navbar-list p-0 m-0 align-items-center">
    <div class="container page__container">
        <ul class="nav navbar-nav flex align-items-sm-center">
            <li class="nav-item navbar-list__item">
                <div class="media align-items-center">
                    <span class="media-left mr-16pt">
                        <img src="../../public/images/people/50/guy-6.jpg" width="40" alt="avatar" class="rounded-circle">
                    </span>
                    <div class="media-body">
                        <a class="card-title m-0" href="teacher-profile.html"><?php echo $training_details[0]['trainer_name']; ?></a>
                        <p class="text-50 lh-1 mb-0">Instructor</p>
                    </div>
                </div>
            </li>
            <li class="nav-item navbar-list__item">
                <i class="material-icons text-muted icon--left">schedule</i>
                2h 46m
            </li>
            <li class="nav-item navbar-list__item">
                <i class="material-icons text-muted icon--left">assessment</i>
                Beginner
            </li>
             <li class="nav-item navbar-list__item">
                <i class="material-icons text-muted icon--left">play_circle_outline</i>
                <?php echo $training_details[0]['total_lesson']; ?> Lessons
            </li>
            <!-- <li class="nav-item ml-sm-auto text-sm-center flex-column navbar-list__item">
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
                        <?php if($training_details[0]['training_type'] == 'Online') { ?>
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
                                <?php if($training_details[0]['training_type'] == 'Offline') { ?>
                                    <div class='col-lg-7'>
                                <?php } else { ?>
                                    <div class='col-lg-12'>
                                <?php } ?>
                                <?php if(!empty($section_details)) { ?>
                                    
                                    <?php foreach($section_details as $key => $section): ?>
                                    <?php $training_section_id = urlencode(base64_encode($section['training_section_id'])); ?>

                                    <div class="accordion js-accordion accordion--boxed list-group-flush" id="course-<?php echo $section['training_section_id']; ?>" data-domfactory-upgraded="accordion">
                                        <div class="accordion__item">
                                            <a href="#" class="accordion__toggle collapsed" data-toggle="collapse" data-target="#course-toc-<?php echo $section['training_section_id']; ?>" data-parent="#course-<?php echo $section['training_section_id']; ?>" aria-expanded="false">
                                                <span class="flex"><?php echo $section['section_name']; ?></span>
                                                <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                            </a>
                                            <div class="accordion__menu collapse" id="course-toc-<?php echo $section['training_section_id']; ?>">
                                                
                                                    <?php foreach($section['section_detail_data'] as $sub_key => $sub): ?>
                                                        <?php $training_section_detail_id = urlencode(base64_encode($sub['training_section_detail_id'])); ?>
                                                        <div class="accordion__menu-link">
                                                        <span class="icon-holder icon-holder--small icon-holder--dark rounded-circle d-inline-flex icon--left">
                                                            <i class="material-icons icon-16pt">play_circle_outline</i>
                                                        </span>
                                                        <div class="play_video"> <a class="flex" id="<?php echo $sub['video_file_path']; ?>" onclick="setVideo('<?php echo $sub['video_file_path']; ?>');"><?php echo $sub['sub_section_name']; ?></a> </div> <br>
                                                        <span class="text-muted">&nbsp; 1m 10s</span>
                                                        <!--  <?php if ($training_details[0]['training_type'] == 'Online') { ?> 
                                                            <span class="text-muted  ml-sm-auto flex-column">&nbsp; <button data-value="<?php echo $training_master_id.'_'.$training_section_id.'_'.$training_section_detail_id.'_'.$customer_id; ?>" class="create_meeting btn btn-outline-white mb-16pt mb-sm-0 mr-sm-16pt">Create meeting <i class="material-icons icon--right">play_circle_outline</i></a></span>
                                                        <?php } else { ?>
                                                            <!-id="join_meeting" ->
                                                            <span class="text-muted  ml-sm-auto flex-column">&nbsp; <button data-value="<?php echo $meeting_id.'_'.$attendee_id.'_'.$customer_id; ?>" class="start_meeting btn btn-outline-white mb-16pt mb-sm-0 mr-sm-16pt">Join meeting <i class="material-icons icon--right">play_circle_outline</i></a></span>

                                                             <span class="text-muted  ml-sm-auto flex-column">&nbsp; <a target="_blank" href="<?php echo base_url('start_meeting/' .$meeting_id.'/'.$attendee_id.'/'.$customer_id.'/'.$isMeetingHost); ?>" class="start_meeting btn btn-outline-white mb-16pt mb-sm-0 mr-sm-16pt">Join meeting <i class="material-icons icon--right">play_circle_outline</i></a></span>
                                                        <?php } ?> -->
                                                        </div>
                                                        
                                                    <?php endforeach; ?>
                                                   
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <?php endforeach; ?>

                                <?php } else { ?>

                                <?php } ?>
                                </div>
                                <?php if($training_details[0]['training_type'] == 'offline') { ?>
                                    <div class="col-lg-5 justify-content-center">
                                        <div class="card">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <div id="container">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if($training_details[0]['training_type'] == 'Online') { ?>
                            <div id="course_schedules" class="tab-pane">

                                <div class="posts-cards mb-24pt">

                                    <?php if(!empty($schedule_list)) { ?>                                  

                                        <?php foreach($schedule_list as $schedule) { ?>
                                            <?php $training_master_id = urlencode(base64_encode($schedule['training_master_id'])); ?>
                                            <?php $training_schedule_id = urlencode(base64_encode($schedule['training_schedule_id'])); ?>
                                            <?php $isMeetingHost = urlencode(base64_encode($schedule['isMeetingHost'])); ?>
                                            <?php $customer_id = urlencode(base64_encode($schedule['customer_id'])); ?>
                                            <div class="card posts-card">
                                                <div class="posts-card__content d-flex align-items-center flex-wrap">
                                                    <div class="avatar avatar-lg mr-3">
                                                        <img src="<?php echo $this->config->item('default_url'); ?>/assets/image/logo.png" alt="avatar" class="avatar-img rounded">
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
                                                        <p class="card-title mr-3 text-50"><?php echo $schedule['status_word']; ?></p>
                                                        <!-- <small class="text-50">35 views last week</small> -->
                                                    </div>
                                                    <div class="dropdown ml-auto">
                                                        <!-- <?php echo $training_master_id.'_'.$training_section_id.'_'.$training_section_detail_id.'_'.$meeting_id.'_'.$customer_id; ?> -->
                                                        <button data-value="<?php echo $training_master_id.'_'.$training_schedule_id.'_'.$isMeetingHost.'_'.$customer_id; ?>" class="create_meeting btn btn-outline-dark mb-16pt mb-sm-0 mr-sm-16pt">Create meeting <i class="material-icons icon--right">play_circle_outline</i>
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

<!-- <div class="page-section  border-bottom-2">

    <div class="container page__container">
        <div class="row ">
            <div class="col-md-7">
                <div class="page-separator">
                    <div class="page-separator__text">About this course</div>
                </div>
                <p class="text-70">This course will teach you the fundamentals of working with <?php echo $training_details[0]['category_name']; ?>. You will learn everything you need to know to create complete applications including: components, services, directives, pipes, routing, HTTP, and even testing.</p>
                <p class="text-70 mb-0">This course will teach you the fundamentals of working with <?php echo $training_details[0]['category_name']; ?>. You will learn everything you need to know to create complete applications including: components, services, directives, pipes, routing, HTTP, and even testing.</p>
            </div>
            <div class="col-md-5">
                <div class="page-separator">
                    <div class="page-separator__text">What you’ll learn</div>
                </div>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center">
                        <span class="material-icons text-50 mr-8pt">check</span>
                        <span class="text-70">Fundamentals of working with <?php echo $training_details[0]['category_name']; ?></span>
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="material-icons text-50 mr-8pt">check</span>
                        <span class="text-70">Create complete <?php echo $training_details[0]['category_name']; ?> applications</span>
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="material-icons text-50 mr-8pt">check</span>
                        <span class="text-70">Working with the <?php echo $training_details[0]['category_name']; ?> CLI</span>
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="material-icons text-50 mr-8pt">check</span>
                        <span class="text-70">Understanding Dependency Injection</span>
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="material-icons text-50 mr-8pt">check</span>
                        <span class="text-70">Testing with <?php echo $training_details[0]['category_name']; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
 -->


<script>
	function setVideo(src) {
		document.getElementById('container').innerHTML = '<video autoplay controls controls crossorigin playsinline id="player"><source src="'+src+'" type="video/mp4"></video>';
		document.getElementById('video_ctrl').play();
	}
</script>

<script type="text/javascript">
    var create_meeting_for_online = "<?php echo site_url('create_meeting'); ?>";
    var get_meeting_details = "<?php echo site_url('meeting_details'); ?>";
    var get_attendee_details = "<?php echo site_url('attendee_details'); ?>";
</script>