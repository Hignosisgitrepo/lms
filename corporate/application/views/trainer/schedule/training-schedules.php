<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Training Schedules</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('trainer-dashboard'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Training Schedules</li>

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
             <div class="page-separator__text">Training Schedules : <?php echo $training_data[0]->training_name; ?></div>
        </div>

        <div class="row">
            <?php if(!empty($schedule_list)) { ?>
                <?php foreach($schedule_list as $result): ?>
                <?php $b64_tsid = urlencode(base64_encode($result['training_schedule_id'])); ?>

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
                                        <a class="card-title mb-4pt" href="instructor-edit-course.html"><?php echo $result['training_day']; ?> (<?php echo $result['start_time']; ?>)</a> 
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
                                <div class="card-title mb-0"><?php echo $result['status']; ?></div>
                                <p class="lh-1">
                                    <?php if($result['training_status'] == 0) { ?>
									  <a href="" class="btn btn-primary">Start Training</a>
									<?php } ?>
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
                
                <?php endforeach; ?>
            <?php } else { ?>
              <div class="page-separator">
                        <div class="page-separator__text">No Schedules</div>
                    </div>
            <?php } ?>
            

        </div>

       <!--  <div class="mb-32pt">

            <ul class="pagination justify-content-start pagination-xsm m-0">
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true" class="material-icons">chevron_left</span>
                        <span>Prev</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Page 1">
                        <span>1</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Page 2">
                        <span>2</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span>Next</span>
                        <span aria-hidden="true" class="material-icons">chevron_right</span>
                    </a>
                </li>
            </ul>

        </div> -->

    </div>
</div>

<!-- // END Page Content -->