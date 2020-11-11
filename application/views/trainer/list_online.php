<div class="pt-32pt">
	<div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
		<div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

			<div class="mb-24pt mb-sm-0 mr-sm-24pt">
				<h2 class="mb-0">Online Training</h2>

				<ol class="breadcrumb p-0 m-0">
					<li class="breadcrumb-item"><a href="<?php echo site_url('trainer-dashboard'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Online Training</li>

				</ol>

			</div>
		</div>
	</div>
</div>

<!-- BEFORE Page Content -->

<!-- // END BEFORE Page Content -->

<!-- Page Content -->

<div class="container page__container">
    <div class="page-section">

        <div class="page-separator">
            <div class="page-separator__text">Online Courses</div>
        </div>

        <div class="row">
			<?php if(!empty($online_training_list)) { ?>
	        	<?php foreach($online_training_list as $result): ?>
	            <?php $b64_ugid = urlencode(base64_encode($result['training_master_id'])); ?>

	            <div class="col-sm-6 col-md-4 col-xl-3">

                    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal" data-force-reveal="" data-partial-height="44" data-toggle="popover" data-trigger="click" data-original-title="" title="" data-domfactory-upgraded="mdk-reveal,overlay" style="height: 212px;">
                        <a href="instructor-edit-course.html" class="js-image" data-position="center" data-height="auto" data-domfactory-upgraded="image" style="display: block; position: relative; overflow: hidden; background-image: url(&quot;http://luma.humatheme.com/public/images/paths/angular_430x168.png&quot;); background-size: cover; background-position: center center; height: 168px;">
                            <img src="<?php echo $this->config->item('default_url'); ?>/assets/image/logo.png" alt="course" style="visibility: hidden;">
                            <!-- <span class="overlay__content align-items-start justify-content-start">
                                <span class="overlay__action card-body d-flex align-items-center">
                                    <i class="material-icons mr-4pt">edit</i>
                                    <span class="card-title text-white">Edit</span>
                                </span>
                            </span> -->
                        </a>
                        <div class="mdk-reveal__content" style="transform: translateY(0px);"><div class="mdk-reveal__partial" style="height: 44px;"></div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex">
                                        <a class="card-title mb-4pt" href="instructor-edit-course.html"><?php echo $result['category_name']; ?> (<?php echo $result['training_type']; ?>)</a> 
                                    </div>
                                    <a href="instructor-edit-course.html" class="ml-4pt material-icons text-20 card-course__icon-favorite">edit</a>
                                </div>
                                <div class="d-flex">
                                    <div class="rating flex">
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                    </div>
                                    <small class="text-50">6 hours</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-left mr-12pt">
                                <img src="<?php echo $this->config->item('default_url'); ?>/assets/image/logo.png" width="40" height="40" alt="Angular" class="rounded">
                            </div>
                            <div class="media-body">
                                <div class="card-title mb-0"><?php echo $result['training_name']; ?></div>
                                <p class="lh-1">
                                    <span class="text-50 small">with</span>
                                    <span class="text-50 small font-weight-bold"><?php echo $result['trainer_name']; ?></span>
                                </p>
                            </div>
                        </div>

                        <p class="my-16pt text-70">Learn the fundamentals of working with <?php echo $result['category_name']; ?> and how to create basic applications.</p>

                        <div class="mb-16pt">
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with <?php echo $result['category_name']; ?></small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                <p class="flex text-50 lh-1 mb-0"><small>Create complete <?php echo $result['category_name']; ?> applications</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                <p class="flex text-50 lh-1 mb-0"><small>Working with the <?php echo $result['category_name']; ?> CLI</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                <p class="flex text-50 lh-1 mb-0"><small>Testing with <?php echo $result['category_name']; ?></small></p>
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
                                    <p class="flex text-50 lh-1 mb-0"><small><?php echo $result['total_lesson']; ?> lessons</small></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-50 mr-4pt"><?php echo $result['currency_symbol']; ?></span>
                                    <p class="flex text-50 lh-1 mb-0"><small><?php echo $result['price']; ?></small></p>
                                </div>
                            </div>
                            <div class="col text-right">
                                <a href="<?php echo site_url('view_course_details'); ?>/<?php echo $result['training_master_id']; ?>" class="btn btn-primary">View course</a>
                            </div>
                        </div>

                    </div>

                </div>
				
				<?php endforeach; ?>
			<?php } else { ?>
			  <div class="page-separator">
			            <div class="page-separator__text">No Courses</div>
			        </div>
			<?php } ?>
            

        </div>

    </div>
</div>
<!-- // END Page Content -->