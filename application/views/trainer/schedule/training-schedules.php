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
        <div class="row"
			 role="tablist">
			<div class="col-auto">
				<a href="<?php echo base_url(); ?>trainer-dashboard" data-toggle="tooltip" title="Back" class="btn btn-white"><i class="fa fa-reply"></i></a>
			</div>
		</div>

    </div>
</div>

<!-- BEFORE Page Content -->

<!-- // END BEFORE Page Content -->

<!-- Page Content -->

<div class="container page__container page-section">
            <div class="page-separator">
            <div class="page-separator__text">Training Schedules : <?php echo $training_data[0]->training_name; ?></div>
        </div>
                    <div class="card stack">
                        <div class="list-group list-group-flush">
                          <?php if(!empty($schedule_list)) { ?>
                            <?php foreach($schedule_list as $result): ?>
                            <?php $b64_tsid = urlencode(base64_encode($result['training_schedule_id'])); ?>
                            <div class="list-group-item d-flex flex-column flex-sm-row align-items-sm-center px-12pt">
                                <div class="flex d-flex align-items-center mr-sm-16pt mb-8pt mb-sm-0">
                                    <a href="instructor-edit-quiz.html"
                                       class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                                        <img src="<?php echo $this->config->item('default_url'); ?>/assets/image/logo.png"
                                             alt="Newsletter Design"
                                             class="avatar-img rounded">
                                        <span class="overlay__content"></span>
                                    </a>
                                    <div class="flex">
                                        <a class="card-title mb-4pt"
                                           href="instructor-edit-quiz.html"><?php echo $result['training_day']; ?>(<?php echo $result['date']; ?>)</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="flex text-center d-flex align-items-center mr-16pt">
                                        <span class="text-50 text-headings text-uppercase mr-12pt"><?php echo $result['start_time']; ?></span>
                                        <span class="badge badge-dark badge-notifications"><?php echo $result['status']; ?></span>
                                        
                                    </div>

                                    <div >
                                    <?php if($result['training_status'] == 0) { ?>
									  <a href="" class="btn btn-sm btn-primary">Start Training</a>
									<?php } ?>
                                    </div>

                                </div>
                            </div>
                          <?php endforeach; ?>    
                          <?php } else { ?>
                            No Schedules
                          <?php } ?>
                </div>
                </div>
</div>
<!-- // END Page Content -->