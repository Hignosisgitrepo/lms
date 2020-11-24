<div class="pt-32pt">
	<div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
		<div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

			<div class="mb-24pt mb-sm-0 mr-sm-24pt">
				<h2 class="mb-0">Training</h2>

				<ol class="breadcrumb p-0 m-0">
					<li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Training</li>

				</ol>

			</div>
		</div>

		<div class="row"
			 role="tablist">
			<div class="col-auto">
				<a href="<?php echo base_url()?>add-trainings"
				   class="btn btn-outline-secondary"><?php echo $text_add; ?></a>
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
            <div class="page-separator__text">Development Courses</div>
        </div>

        <div class="row">
			<?php if(!empty($training_list)) { ?>
	        	<?php foreach($training_list as $result): ?>
	            <?php $b64_tmid = urlencode(base64_encode($result['training_master_id'])); ?>

	            <div class="col-sm-6 col-md-4 col-xl-3">

	                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal" data-force-reveal="" data-partial-height="44" data-toggle="popover" data-trigger="click" data-original-title="" title="" data-domfactory-upgraded="mdk-reveal,overlay" style="height: 212px;">
	                    <a class="js-image" data-position="center" data-height="auto" data-domfactory-upgraded="image" style="display: block; position: relative; overflow: hidden; background-image: url(&quot;http://luma.humatheme.com/public/images/paths/angular_430x168.png&quot;); background-size: cover; background-position: center center; height: 168px;">
	                        <img src="../../public/images/paths/angular_430x168.png" alt="course" style="visibility: hidden;">
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
	                                    <a class="card-title mb-4pt"><?php echo $result['category_name']; ?> (<?php echo $result['training_type']; ?>)</a> 
	                                </div>
	                                <!--<a href="instructor-edit-course.html" class="ml-4pt material-icons text-20 card-course__icon-favorite">edit</a>-->
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
	                            <img src="../../public/images/paths/angular_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
	                        </div>
	                        <div class="media-body">
	                            <div class="card-title mb-0"><?php echo $result['category_name']; ?></div>
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
	                                <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
	                            </div>
	                            <div class="d-flex align-items-center mb-4pt">
	                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
	                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
	                            </div>
	                            <div class="d-flex align-items-center">
	                                <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
	                                <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
	                            </div>
	                        </div>
	                        <div class="col text-right">
	                            <a href="instructor-edit-course.html" class="btn btn-primary">Edit course</a><br>
	                            <?php if($result['training_type'] == 'Online') { ?>
								  <a href="<?php echo base_url('training-schedules/' . $b64_tmid); ?>" class="btn btn-info">View Schedules</a>
								<?php } ?>
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

<!-- <div class="container page__container">
	<div class="page-section">
		<div class="card mb-32pt">

			<div class="table-responsive"
				 data-toggle="lists"
				 data-lists-sort-by="js-lists-values-date"
				 data-lists-sort-desc="true"
				 data-lists-values='["js-lists-values-name", "js-lists-values-department", "js-lists-values-status", "js-lists-values-type", "js-lists-values-phone", "js-lists-values-date"]'>

				<table class="table mb-0 thead-border-top-0 table-nowrap">
					<thead>
						<tr>

							<th>
								<a href="javascript:void(0)"
								   class="sort"
								   data-sort="js-lists-values-name"><?php echo $text_Training_Name; ?></a>
							</th>

							<th>
								<a href="javascript:void(0)"
								   class="sort"
								   data-sort="js-lists-values-department"><?php echo $text_Category_Name; ?></a>
							</th>

							<th>
								<a href="javascript:void(0)"
								   class="sort"
								   data-sort="js-lists-values-status"><?php echo $text_Training_Type; ?></a>
							</th>

							<th>
								<a href="javascript:void(0)"
								   class="sort"
								   data-sort="js-lists-values-type">ACTION</a>
							</th>
						</tr>
					</thead>
					<tbody class="list"
						   id="employees">
					  <?php if(!empty($training_list)) { ?>
                        <?php foreach($training_list as $result): ?>
                        <?php $b64_ugid = urlencode(base64_encode($result['training_master_id'])); ?>
						<tr>

							<td>
								<?php echo $result['training_name']; ?>
							</td>

							<td>
								<?php echo $result['category_name']; ?>
							</td>

							<td><span class="<?php echo $result['training_type'] == "Online" ? 'accept' : 'reject'?>"><?php echo $result['training_type']; ?></span>
							</td>

							<td>
								<a class="btn btn-sm bg-success-light" data-toggle="modal" href="<?php echo base_url().'edit-roles/'.$b64_ugid; ?>">
                                 <i class="fa fa-edit"></i>
                                 <?php echo $btn_edit; ?>
                                 </a>
                                 <a data-toggle="modal" href="#" class="btn btn-sm bg-danger-light">
                                 <i class="fa fa-trash"></i> Delete
                                 </a>
							</td>
						  </tr>
						<?php endforeach; ?>
                        <?php } else { ?>
						  <tr>
                              <td colspan="4"><?php echo $text_no_data; ?></td>
                           </tr>
                        <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div> -->

<!-- // END Page Content -->