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
			<section id="tabs">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 ">
							<nav>
								<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Course Deatils</a>
									<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Course Schedules</a>
								</div>
							</nav>
							<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
								<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								  <?php if($course['training_type'] == 'Offline') { ?>
									<div class="card mb-lg-32pt">

										<div class="table-responsive"
											 data-toggle="lists"
											 data-lists-values='["js-lists-values-name"]'>

											<table class="table table-bordered table-flush mb-0 thead-border-top-0 table-nowrap">
												<thead>
													<tr>

														<th style="width: 18px;"
															class="pr-0 border-right-0">
															<div class="custom-control custom-checkbox">
																<input type="checkbox"
																	   class="custom-control-input js-toggle-check-all"
																	   data-target="#contacts"
																	   id="customCheckAll_contacts">
																<label class="custom-control-label"
																	   for="customCheckAll_contacts"><span class="text-hide">Toggle all</span></label>
															</div>
														</th>

														<th class="border-left-0">
															<a href="javascript:void(0)"
															   class="sort"
															   data-sort="js-lists-values-name">Sl No</a>
														</th>
														<th>
															<div class="lh-1 d-flex flex-column text-50 my-4pt">
																Day
															</div>
														</th>
														<th>
															<div class="lh-1 d-flex flex-column text-50 my-4pt">
																Start Time
															</div>
														</th>
														<th>
															<div class="lh-1 d-flex flex-column text-50 my-4pt">
																Status
															</div>
														</th>
														<th style="width: 24px;">Action</th>
													</tr>
												</thead>
												<tbody class="list"
													   id="contacts">
												  <?php foreach($schedule_data as $schedule) { ?>
													<tr>
														<td class="border-left-0">

															<div class="media flex-nowrap align-items-center"
																 style="white-space: nowrap;">
																<div class="media-body ml-4pt">

																	<p class="mb-0"><strong class="js-lists-values-name"><?php echo $schedule['ctr']; ?></strong></p>

																</div>
															</div>

														</td>
														<td>

															<small><strong class="js-lists-values-name text-black-100"><?php echo $schedule['training_day']; ?></strong></small>

														</td>
														<td>
															<small><strong class="js-lists-values-name text-black-100"><?php echo $schedule['start_time']; ?></strong></small>
														</td>
														<td>
															<small><strong class="js-lists-values-name text-black-100"><?php echo $schedule['status']; ?></strong></small>
														</td>
														<td>
															<?php if($schedule['training_status'] == 0) { ?>
																<a class="d-flex flex-column border-1 rounded bg-light px-8pt py-4pt lh-1"
															   href="">
																	<small><strong class="js-lists-values-name text-black-100">Start Training</strong></small>
																</a>
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
			</section>
         </div>
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