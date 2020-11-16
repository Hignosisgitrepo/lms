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
		    <div class="card mb-0">
		        <div class="card-body">
		            <ul class="nav nav-pills nav-justified">
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
			                	<div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-from" data-lists-sort-desc="true" data-lists-values="[&quot;js-lists-values-name&quot;, &quot;js-lists-values-status&quot;, &quot;js-lists-values-policy&quot;, &quot;js-lists-values-reason&quot;, &quot;js-lists-values-days&quot;, &quot;js-lists-values-available&quot;, &quot;js-lists-values-from&quot;, &quot;js-lists-values-to&quot;]">

                                <table class="table mb-0 thead-border-top-0 table-nowrap">
                                    <thead>
                                        <tr>

                                          <!--   <th style="width: 18px;" class="pr-0">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#leaves" id="customCheckAllleaves">
                                                    <label class="custom-control-label" for="customCheckAllleaves"><span class="text-hide">Toggle all</span></label>
                                                </div>
                                            </th> -->

                                            <th style="width: 18px;">
                                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-name">Sl No</a>
                                            </th>
                                            <th>
                                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-status">Day</a>
                                            </th>
                                            <th>
                                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-status">Date</a>
                                            </th>
                                            <th style="width: 48px;">
                                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-policy">Start Time</a>
                                            </th>
                                            <th style="width: 150px;">
                                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-reason">Status</a>
                                            </th>
                                            <th style="width: 24px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="leaves">
										<?php foreach($schedule_data as $schedule) { ?>
										<tr>
											<td >
												<small><strong class="js-lists-values-name text-50"><?php echo $schedule['ctr']; ?></strong></small>
											</td>
											<td>
												<small><strong class="js-lists-values-name text-50"><?php echo $schedule['training_day']; ?></strong></small>
											</td>
											<td>
												<small><strong class="js-lists-values-name text-50"><?php echo $schedule['date']; ?></strong></small>
											</td>
											<td>
												<small><strong class="js-lists-values-name text-50"><?php echo $schedule['start_time']; ?></strong></small>
											</td>
											<td>
												<small><strong class="js-lists-values-name text-50"><?php echo $schedule['status']; ?></strong></small>
											</td>
											<td>
												<?php if($schedule['training_status'] == 0) { ?>
														<small><strong class="js-lists-values-name text-50">Start Training</strong></small>
												<?php } else if($schedule['training_status'] == 1) { ?>
													In Progress
												<?php } else if($schedule['training_status'] == 2) { ?>
													Completed
												<?php } ?>
											</td>
										</tr>

									  <?php } ?>

                                    </tbody>
                                </table>
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