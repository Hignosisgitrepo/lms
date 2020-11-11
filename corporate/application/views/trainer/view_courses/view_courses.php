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
            <?php if(!empty($section_details)) { ?>

                <?php $training_master_id = urlencode(base64_encode($training_details[0]['training_master_id'])); ?>
                

                <?php foreach($section_details as $section): ?>
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
                                    <?php if ($training_details[0]['training_type'] == 'Online') { ?> 
                                        <span class="text-muted  ml-sm-auto flex-column">&nbsp; <button id="create_meeting" href="<?php echo site_url('create_meeting').'/'.$training_master_id.'/'.$training_section_id.'/'.$training_section_detail_id ?>" class="btn btn-outline-white mb-16pt mb-sm-0 mr-sm-16pt">Create meeting <i class="material-icons icon--right">play_circle_outline</i></a></span>
                                    <?php } ?>
                                    </div>
                                    
                                <?php endforeach; ?>
                               
                            
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
</div>

<div class="page-section  border-bottom-2">

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

<div class="page-section  border-bottom-2">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-24pt mb-md-0">
                <h4>About the author</h4>
                <p class="text-70 mb-24pt"><?php echo $training_details[0]['trainer_name']; ?> is a software developer at LearnDash. With more than 20 years of software development experience, he has gained a passion for Agile software development -- especially Lean.</p>

                <div class="page-separator">
                    <div class="page-separator__text">More from the author</div>
                </div>

                <div class="card card-sm mb-8pt">
                    <div class="card-body d-flex align-items-center">
                        <a href="course.html" class="avatar avatar-4by3 mr-12pt">
                            <img src="public/images/paths/angular_routing_200x168.png" alt="<?php echo $training_details[0]['category_name']; ?> Routing In-Depth" class="avatar-img rounded">
                        </a>
                        <div class="flex">
                            <a class="card-title mb-4pt" href="course.html"><?php echo $training_details[0]['category_name']; ?> Routing In-Depth</a>
                            <div class="d-flex align-items-center">
                                <div class="rating mr-8pt">

                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                    <span class="rating__item"><span class="material-icons">star_border</span></span>

                                    <span class="rating__item"><span class="material-icons">star_border</span></span>

                                </div>
                                <small class="text-muted">3/5</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-sm mb-16pt">
                    <div class="card-body d-flex align-items-center">
                        <a href="course.html" class="avatar avatar-4by3 mr-12pt">
                            <img src="public/images/paths/angular_testing_200x168.png" alt="<?php echo $training_details[0]['category_name']; ?> Unit Testing" class="avatar-img rounded">
                        </a>
                        <div class="flex">
                            <a class="card-title mb-4pt" href="course.html"><?php echo $training_details[0]['category_name']; ?> Unit Testing</a>
                            <div class="d-flex align-items-center">
                                <div class="rating mr-8pt">

                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                    <span class="rating__item"><span class="material-icons">star_border</span></span>

                                </div>
                                <small class="text-muted">4/5</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group list-group-flush">
                    <div class="list-group-item px-0">
                        <a href="" class="card-title mb-4pt"><?php echo $training_details[0]['category_name']; ?> Best Practices</a>
                        <p class="lh-1 mb-0">
                            <small class="text-muted mr-8pt">6h 40m</small>
                            <small class="text-muted mr-8pt">13,876 Views</small>
                            <small class="text-muted">13 May 2018</small>
                        </p>
                    </div>
                    <div class="list-group-item px-0">
                        <a href="" class="card-title mb-4pt">Unit Testing in <?php echo $training_details[0]['category_name']; ?></a>
                        <p class="lh-1 mb-0">
                            <small class="text-muted mr-8pt">6h 40m</small>
                            <small class="text-muted mr-8pt">13,876 Views</small>
                            <small class="text-muted">13 May 2018</small>
                        </p>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-5 pt-sm-32pt pt-md-0 d-flex flex-column align-items-center justify-content-start">
                <div class="text-center">
                    <p class="mb-16pt">
                        <img src="../../public/images/people/110/guy-6.jpg" alt="guy-6" class="rounded-circle" width="64">
                    </p>
                    <h4 class="m-0"><?php echo $training_details[0]['trainer_name']; ?></h4>
                    <p class="lh-1">
                        <small class="text-muted"><?php echo $training_details[0]['category_name']; ?>, Web Development</small>
                    </p>
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                        <a href="teacher-profile.html" class="btn btn-outline-primary mb-16pt mb-sm-0 mr-sm-16pt">Follow</a>
                        <a href="#" class="btn btn-outline-secondary">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-section border-bottom-2">
    <div class="container">
        <div class="page-headline text-center">
            <h2>Feedback</h2>
            <p class="lead text-70 measure-lead mx-auto">What other students turned professionals have to say about us after learning with us and reaching their goals.</p>
        </div>

        <div class="position-relative carousel-card p-0 mx-auto">
            <div class="row d-block js-mdk-carousel" id="carousel-feedback" data-interval="3000" style="overflow: hidden;" data-domfactory-upgraded="mdk-carousel">
                <a class="carousel-control-next js-mdk-carousel-control mt-n24pt" href="#carousel-feedback" role="button" data-slide="next" data-domfactory-upgraded="mdk-carousel-control">
                    <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_right</span>
                    <span class="sr-only">Next</span>
                </a>
                <div class="mdk-carousel__content" style="transition-duration: 0ms; width: 1404px;">

                    <div class="col-12 col-md-6 mdk-carousel__item" style="width: 468px;">

                        <div class="card card-feedback card-body">
                            <blockquote class="blockquote mb-0">
                                <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                            </blockquote>
                        </div>
                        <div class="media ml-12pt">
                            <div class="media-left mr-12pt">
                                <a href="student-profile.html" class="avatar avatar-sm">
                                    <!-- <img src="../../public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">UK</span>
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <a href="student-profile.html" class="card-title">Umberto Kass</a>
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

                    <div class="col-12 col-md-6 mdk-carousel__item" style="width: 468px;">

                        <div class="card card-feedback card-body">
                            <blockquote class="blockquote mb-0">
                                <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                            </blockquote>
                        </div>
                        <div class="media ml-12pt">
                            <div class="media-left mr-12pt">
                                <a href="student-profile.html" class="avatar avatar-sm">
                                    <!-- <img src="../../public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">UK</span>
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <a href="student-profile.html" class="card-title">Umberto Kass</a>
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

                    <div class="col-12 col-md-6 mdk-carousel__item" style="width: 468px;">

                        <div class="card card-feedback card-body">
                            <blockquote class="blockquote mb-0">
                                <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                            </blockquote>
                        </div>
                        <div class="media ml-12pt">
                            <div class="media-left mr-12pt">
                                <a href="student-profile.html" class="avatar avatar-sm">
                                    <!-- <img src="../../public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">UK</span>
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <a href="student-profile.html" class="card-title">Umberto Kass</a>
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
</div>

<div class="page-section border-bottom-2">

    <div class="container page__container">
        <div class="page-separator">
            <div class="page-separator__text">Student Feedback</div>
        </div>
        <div class="row mb-32pt">
            <div class="col-md-3 mb-32pt mb-md-0">
                <div class="display-1">4.7</div>
                <div class="rating rating-24">
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                </div>
                <p class="text-muted mb-0">20 ratings</p>
            </div>
            <div class="col-md-9">

                <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="75% rated 5/5" data-placement="top" data-original-title="" title="">
                    <div class="col-md col-sm-6">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                        <div class="rating">
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star</span></span>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="16% rated 4/5" data-placement="top" data-original-title="" title="">
                    <div class="col-md col-sm-6">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="16" style="width: 16%" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                        <div class="rating">
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="12% rated 3/5" data-placement="top" data-original-title="" title="">
                    <div class="col-md col-sm-6">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="12" style="width: 12%" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                        <div class="rating">
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="9% rated 2/5" data-placement="top" data-original-title="" title="">
                    <div class="col-md col-sm-6">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="9" style="width: 9%" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                        <div class="rating">
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="0% rated 0/5" data-placement="top" data-original-title="" title="">
                    <div class="col-md col-sm-6">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                        <div class="rating">
                            <span class="rating__item"><span class="material-icons">star</span></span>
                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="pb-16pt mb-16pt border-bottom row">
            <div class="col-md-3 mb-16pt mb-md-0">
                <div class="d-flex">
                    <a href="student-profile.html" class="avatar avatar-sm mr-12pt">
                        <!-- <img src="LB" alt="avatar" class="avatar-img rounded-circle"> -->
                        <span class="avatar-title rounded-circle">LB</span>
                    </a>
                    <div class="flex">
                        <p class="small text-muted m-0">2 days ago</p>
                        <a href="student-profile.html" class="card-title">Laza Bogdan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="rating mb-8pt">
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                </div>
                <p class="text-70 mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
            </div>
        </div>

        <div class="pb-16pt mb-16pt border-bottom row">
            <div class="col-md-3 mb-16pt mb-md-0">
                <div class="d-flex">
                    <a href="student-profile.html" class="avatar avatar-sm mr-12pt">
                        <!-- <img src="UK" alt="avatar" class="avatar-img rounded-circle"> -->
                        <span class="avatar-title rounded-circle">UK</span>
                    </a>
                    <div class="flex">
                        <p class="small text-muted m-0">2 days ago</p>
                        <a href="student-profile.html" class="card-title">Umberto Klass</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="rating mb-8pt">
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                </div>
                <p class="text-70 mb-0">This course is absolutely amazing, Bryan goes* out of his way to really expl*ain things clearly I couldn't be happier, so glad I made this purchase!</p>
            </div>
        </div>

        <div class="pb-16pt mb-24pt row">
            <div class="col-md-3 mb-16pt mb-md-0">
                <div class="d-flex">
                    <a href="student-profile.html" class="avatar avatar-sm mr-12pt">
                        <!-- <img src="AD" alt="avatar" class="avatar-img rounded-circle"> -->
                        <span class="avatar-title rounded-circle">AD</span>
                    </a>
                    <div class="flex">
                        <p class="small text-muted m-0">2 days ago</p>
                        <a href="student-profile.html" class="card-title">Adrian Demian</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="rating mb-8pt">
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star</span></span>
                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                </div>
                <p class="text-70 mb-0">This course is absolutely amazing, Bryan goes* out of his way to really expl*ain things clearly I couldn't be happier, so glad I made this purchase!</p>
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
<script type="text/javascript">
    $( "#create_meeting" ).click(function() {
  alert( "Handler for .click() called." );
});
</script>