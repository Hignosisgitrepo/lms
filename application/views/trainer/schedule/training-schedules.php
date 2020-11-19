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
        <!-- <div class="card stack">
            <div class="list-group list-group-flush"> -->
              <?php if(!empty($schedule_list)) { ?>
                <?php foreach($schedule_list as $result): ?>
                <?php $training_master_id = urlencode(base64_encode($result['training_master_id'])); ?>
                <!-- <?php $meeting_id = urlencode(base64_encode($section['meeting_id'])); ?>
                <?php $customer_id = urlencode(base64_encode($section['customer_id'])); ?>
                <?php $attendee_id = urlencode(base64_encode($section['attendee_id'])); ?>
                <?php $isMeetingHost = $section['isMeetingHost']; ?> -->

                    <div class="card posts-card">
                        <div class="posts-card__content d-flex align-items-center flex-wrap">
                            <div class="avatar avatar-lg mr-3">
                                <img src="<?php echo $this->config->item('default_url'); ?>/assets/image/logo.png"" alt="avatar" class="avatar-img rounded">
                            </div>
                            <div class="posts-card__title flex d-flex flex-column">
                                <p class="card-title mr-3 text-50"><?php echo $result['training_day']; ?></p>
                                <!-- <small class="text-50">35 views last week</small> -->
                            </div>
                            <div class="posts-card__title flex d-flex flex-column">
                                <p class="card-title mr-3 text-50"><i class="material-icons text-muted-light mr-1">schedule</i> <?php echo $result['date']; ?> <?php echo $result['start_time']; ?></p>
                                <!-- <small class="text-50">35 views last week</small> -->
                            </div>
                            <div class="posts-card__title flex d-flex flex-column">
                                <p class="card-title mr-3 text-50"><?php echo $result['status_word']; ?></p>
                                <!-- <small class="text-50">35 views last week</small> -->
                            </div>
                            <div class="dropdown ml-auto">
                                <!-- <?php echo $training_master_id.'_'.$training_section_id.'_'.$training_section_detail_id.'_'.$customer_id; ?> -->
                                <?php if($result['training_status'] == 0) { ?>
                                    <button data-value="" class="create_meeting btn btn-outline-dark mb-16pt mb-sm-0 mr-sm-16pt">Create meeting <i class="material-icons icon--right">play_circle_outline</i>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>    
              <?php } else { ?>
                No Schedules
              <?php } ?>
      <!--   </div>
    </div> -->
</div>
<!-- // END Page Content -->