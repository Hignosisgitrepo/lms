<div class="page-section">
	<div class="container-fluid page__container">

		<!--<div class="d-flex flex-column flex-sm-row align-items-sm-center mb-24pt"
			 style="white-space: nowrap;">
			<small class="flex text-muted text-headings text-uppercase mr-3 mb-2 mb-sm-0">Displaying 4 out of 10 courses</small>
			<div class="w-auto ml-sm-auto table d-flex align-items-center mb-2 mb-sm-0">
				<small class="text-muted text-headings text-uppercase mr-3 d-none d-sm-block">Sort by</small>

				<a href="#"
				   class="sort desc small text-headings text-uppercase">Newest</a>

				<a href="#"
				   class="sort small text-headings text-uppercase ml-2">Popularity</a>

			</div>

			<a href="#"
			   data-target="#library-drawer"
			   data-toggle="sidebar"
			   class="btn btn-sm btn-white ml-sm-16pt">
				<i class="material-icons icon--left">tune</i> Filters
			</a>

		</div>

		<div class="page-separator">
			<div class="page-separator__text">Popular Courses</div>
		</div>-->
		<?php if($trainings) { ?>
		  <?php foreach($trainings as $training) { ?>
			<div class="card" title="What u'll learn?" data-placement="bottom" data-toggle="popover" data-trigger="hover" data-content="
				<?php $ctr = 1; ?>
				<?php foreach($training['concepts'] as $concept) { ?>
					<?php echo $ctr . '. ' . $concept->concept_name; ?><br>
					<?php $ctr++; ?>
				<?php } ?>
				" onclick="viewTraining('<?php echo $training['b64_tmid']; ?>');">
			  <div class="list-group list-group-flush" style="cursor: -webkit-grab; cursor: grab;">

				<div class="list-group-item p-3">
					
															 
					<div class="row align-items-start">

						<div class="col-md-9 mb-8pt mb-md-0">

															  
							<div class="media align-items-center">
								<div class="media-left mr-12pt">
									<a onclick="viewTraining('<?php echo $training['b64_tmid']; ?>');">
									   <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/angular_40x40@2x.png" width="150" height="100" alt="<?php echo $training['training_name']; ?>" class="rounded">
									</a>			  
								</div>
								<div class="d-flex flex-column media-body media-middle">
									<a onclick="viewTraining('<?php echo $training['b64_tmid']; ?>');" class="card-title"><?php echo $training['training_name']; ?></a>
									<small class="text-muted"><?php echo $training['training_description']; ?></small>
									<p class="flex text-50 lh-1 mb-0"><small>By <a><?php echo $training['trainer_name']; ?></a></small></p>
									<div class="d-flex align-items-center mb-8pt justify-content-center" style="justify-content: left!important;">
										<div class="d-flex align-items-center mr-8pt">
											<span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
											<p class="flex text-50 lh-1 mb-0"><small><?php echo $training['course_duration']; ?>Hrs</small></p>
										</div>
										<div class="d-flex align-items-center">
											<span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
											<p class="flex text-50 lh-1 mb-0"><small><?php echo $training['no_of_sessions']; ?> sessions</small></p>
										</div>
										<div class="d-flex align-items-center">
											<span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
											<p class="flex text-50 lh-1 mb-0"><small><?php echo $training['program_level_name']; ?></small></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto d-flex flex-column align-items-center justify-content-center">
							<?php if($training['discount'] != 0) { ?>
							  <h5 class="m-0"><?php echo $training['price_after_discount']; ?></h5>
							  <p class="lh-1 mb-0"><small class="text-70"><strike><?php echo $training['price']; ?></strike></small></p>
							<?php } else { ?>
							  <h5 class="m-0"><?php echo $training['price']; ?></h5>
							<?php } ?>																					  
						</div>
					</div>

				</div>
			  </div>

			</div>
			
		  <?php } ?>
		<?php }  else { ?>
			No course available!
		<?php } ?>
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

		</div>-->

	</div>
</div>