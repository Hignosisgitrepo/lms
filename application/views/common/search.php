<?php $this->load->view('includes/header'); ?>
</div>
</div>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content ">

	<div data-push
		 data-responsive-width="992px"
		 class="mdk-drawer-layout js-mdk-drawer-layout">
		<div class="mdk-drawer-layout__content">

			<div class="page-section">
				<div class="container page__container">

					<div class="d-flex flex-column flex-sm-row align-items-sm-center mb-24pt"
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
					</div>
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
										<h5 class="m-0"><?php echo $training['price']; ?></h5>
										<p class="lh-1 mb-0"><small class="text-70"><strike><?php echo $training['price']; ?></strike></small></p>
																																  
									</div>
								</div>

							</div>
						  </div>

						</div>
						
				      <?php } ?>
					<?php }  else { ?>
						No course available!
					<?php } ?>
					<div class="mb-32pt">

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

					</div>

				</div>
			</div>

		</div>

		<div class="mdk-drawer js-mdk-drawer "
			 id="library-drawer"
			 data-align="end" data-position="left">
			<div class="mdk-drawer__content top-navbar">
				<div class="sidebar sidebar-light sidebar-right py-16pt"
					 data-perfect-scrollbar
					 data-perfect-scrollbar-wheel-propagation="true">

					<div class="d-flex align-items-center mb-24pt  d-lg-none">
						<form action="index.html"
							  class="search-form search-form--light mx-16pt pr-0 pl-16pt">
							<input type="text"
								   class="form-control pl-0"
								   placeholder="Search">
							<button class="btn"
									type="submit"><i class="material-icons">search</i></button>
						</form>
					</div>

					<div class="sidebar-heading">Category</div>
					<ul class="sidebar-menu">
						<li class="sidebar-menu-item active">
							<a href=""
							   class="sidebar-menu-button">
								<span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">code</span>
								<span class="sidebar-menu-text">Web Development</span>
							</a>
						</li>
						<li class="sidebar-menu-item">
							<a href=""
							   class="sidebar-menu-button">
								<span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">brush</span>
								<span class="sidebar-menu-text">Design</span>
							</a>
						</li>
						<li class="sidebar-menu-item">
							<a href=""
							   class="sidebar-menu-button">
								<span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">settings_cell</span>
								<span class="sidebar-menu-text">iOS &amp; Swift</span>
							</a>
						</li>
						<li class="sidebar-menu-item">
							<a href=""
							   class="sidebar-menu-button">
								<span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">android</span>
								<span class="sidebar-menu-text">Android</span>
							</a>
						</li>
						<li class="sidebar-menu-item">
							<a href=""
							   class="sidebar-menu-button">
								<span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">business_center</span>
								<span class="sidebar-menu-text">Business</span>
							</a>
						</li>
						<li class="sidebar-menu-item">
							<a href=""
							   class="sidebar-menu-button">
								<span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">crop_original</span>
								<span class="sidebar-menu-text">Photography</span>
							</a>
						</li>
						<li class="sidebar-menu-item">
							<a href=""
							   class="sidebar-menu-button">
								<span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">payment</span>
								<span class="sidebar-menu-text">Marketing</span>
							</a>
						</li>
						<li class="sidebar-menu-item">
							<a href=""
							   class="sidebar-menu-button">
								<span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">store</span>
								<span class="sidebar-menu-text">eCommerce</span>
							</a>
						</li>
						<li class="sidebar-menu-item">
							<a href=""
							   class="sidebar-menu-button">
								<span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">redeem</span>
								<span class="sidebar-menu-text">Health &amp; Fitness</span>
							</a>
						</li>
						<li class="sidebar-menu-item">
							<a href=""
							   class="sidebar-menu-button">
								<span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">music_note</span>
								<span class="sidebar-menu-text">Music</span>
							</a>
						</li>
					</ul>

					<div class="sidebar-heading">Platform</div>
					<div class="sidebar-block">
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck01"
									   checked="">
								<label class="custom-control-label"
									   for="filtersCheck01">All</label>
							</div>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck02">
								<label class="custom-control-label"
									   for="filtersCheck02">Archive</label>
							</div>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck06">
								<label class="custom-control-label"
									   for="filtersCheck06">Unity</label>
							</div>
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck03">
								<label class="custom-control-label"
									   for="filtersCheck03">Web</label>
							</div>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck04">
								<label class="custom-control-label"
									   for="filtersCheck04">iOS &amp; Swift</label>
							</div>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck05">
								<label class="custom-control-label"
									   for="filtersCheck05">Android</label>
							</div>
						</div>
					</div>

					<div class="sidebar-heading">Subscription</div>
					<div class="sidebar-block">
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck07"
									   checked="">
								<label class="custom-control-label"
									   for="filtersCheck07">All</label>
							</div>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck08">
								<label class="custom-control-label"
									   for="filtersCheck08">Free</label>
							</div>
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck09">
								<label class="custom-control-label"
									   for="filtersCheck09">Beginner</label>
							</div>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck10">
								<label class="custom-control-label"
									   for="filtersCheck10">Advanced</label>
							</div>
						</div>
					</div>

					<div class="sidebar-heading">Content type</div>
					<div class="sidebar-block">
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck11"
									   checked="">
								<label class="custom-control-label"
									   for="filtersCheck11">All</label>
							</div>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck12">
								<label class="custom-control-label"
									   for="filtersCheck12">Episode</label>
							</div>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck13">
								<label class="custom-control-label"
									   for="filtersCheck13">Video</label>
							</div>
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck14">
								<label class="custom-control-label"
									   for="filtersCheck14">Article</label>
							</div>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck15">
								<label class="custom-control-label"
									   for="filtersCheck15">Book</label>
							</div>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input"
									   type="checkbox"
									   value=""
									   id="filtersCheck16">
								<label class="custom-control-label"
									   for="filtersCheck16">Screencast</label>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>

</div>
<!-- // END Header Layout Content -->
<?php $this->load->view('includes/footer'); ?>