<div class="pt-32pt">
   <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
      <div class="flex d-flex flex-column flex-sm-row align-items-center">
         <div class="mb-24pt mb-sm-0 mr-sm-24pt">
            <h2 class="mb-0"><?php echo $pageTitle; ?></h2>
            <ol class="breadcrumb p-0 m-0">
               <li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard'; ?>"><?php echo $text_dashboard; ?></a></li>
               <li class="breadcrumb-item active">
                  Assigned Training List
               </li>
            </ol>
         </div>
      </div>
   </div>
</div>
<!-- BEFORE Page Content -->
<!-- // END BEFORE Page Content --><div class="container-fluid page__container page-section">

                    <div class="page-separator">
                        <div class="page-separator__text">Courses</div>
                    </div>

                    <div class="row">
					  <?php if(!empty($trainings)) { ?>
						<?php foreach($trainings as $res) { ?>
                          <div class="col-sm-6 col-md-4 col-xl-3">

                            <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal "
                                 data-partial-height="44"
                                 data-toggle="popover"
                                 data-trigger="click">
                                <a href="instructor-edit-course.html"
                                   class="js-image"
                                   data-position="left">
                                    <img src="<?php echo $this->config->item('default_url'); ?>/assets/image/logo.png"
                                         alt="course">
                                    <span class="overlay__content align-items-start justify-content-start">
                                        <span class="overlay__action card-body d-flex align-items-center">
                                            <i class="material-icons mr-4pt">edit</i>
                                            <span class="card-title text-white">Edit</span>
                                        </span>
                                    </span>
                                </a>
                                <div class="mdk-reveal__content">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex">
                                                <a class="card-title mb-4pt"
                                                   href="instructor-edit-course.html"><?php echo $res['training_name'] ; ?></a>
                                            </div>
                                            <a href="instructor-edit-course.html"
                                               class="ml-4pt material-icons text-20 card-course__icon-favorite">edit</a>
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
                                        <img src="<?php echo $this->config->item('default_url'); ?>/assets/image/logo.png"
                                             width="40"
                                             height="40"
                                             alt="Angular"
                                             class="rounded">
                                    </div>
                                    <div class="media-body">
                                        <div class="card-title mb-0"><?php echo $res['training_name'] ; ?></div>
                                        <p class="lh-1">
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
                                            <p class="flex text-50 lh-1 mb-0"><small><?php echo $res['course_duration']; ?>Hrs</small></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-4pt">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                            <p class="flex text-50 lh-1 mb-0"><small><?php echo $res['no_of_sessions']; ?></small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <a href="instructor-edit-course.html"
                                           class="btn btn-primary">Edit course</a>
                                    </div>
                                </div>

                            </div>

                          </div>
						<?php } ?>
					  <?php } else { ?>
						No courses available!
					  <?php } ?>

                    </div>

                    <!--<div class="mb-32pt">

                        <ul class="pagination justify-content-start pagination-xsm m-0">
                            <li class="page-item disabled">
                                <a class="page-link"
                                   href="#"
                                   aria-label="Previous">
                                    <span aria-hidden="true"
                                          class="material-icons">chevron_left</span>
                                    <span>Prev</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link"
                                   href="#"
                                   aria-label="Page 1">
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link"
                                   href="#"
                                   aria-label="Page 2">
                                    <span>2</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link"
                                   href="#"
                                   aria-label="Next">
                                    <span>Next</span>
                                    <span aria-hidden="true"
                                          class="material-icons">chevron_right</span>
                                </a>
                            </li>
                        </ul>

                        <!-- <ul class="pagination justify-content-center pagination-sm">
  <li class="page-item disabled">
    <a class="page-link" href="#" aria-label="Previous">
      <span aria-hidden="true" class="material-icons">chevron_left</span>
      <span>Prev</span>
    </a>
  </li>
  <li class="page-item active">
    <a class="page-link" href="#" aria-label="1">
      <span>1</span>
    </a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#" aria-label="1">
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
                    </div>-->
                </div>

                <!-- // END Page Content -->