<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content ">

	<div class="pt-32pt">
		<div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
			<div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

				<div class="mb-24pt mb-sm-0 mr-sm-24pt">
					<h2 class="mb-0">My Courses</h2>

					<ol class="breadcrumb p-0 m-0">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="breadcrumb-item active">My Courses</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="container page__container">
		<div class="page-section">

			<div class="page-separator">
				<div class="page-separator__text">My Courses</div>
			</div>

			<!-- <div class="page-heading">
<h4>Learning Paths</h4>
<a 
href="" 
class="text-underline ml-sm-auto">All my learning paths</a>
</div> -->

			<div class="row card-group-row mb-lg-8pt">
			  <?php if($orders) { ?>
				<?php foreach($orders as $order) { ?>
				  <div class="col-sm-4 card-group-row__col">

					<div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
						 data-toggle="popover"
						 data-trigger="click">

						<div class="card-body d-flex flex-column">
							<div class="d-flex align-items-center">
								<div class="flex">
									<div class="d-flex align-items-center">
										<div class="rounded mr-12pt z-0 o-hidden">
											<div class="overlay">
												<img src="<?php echo $order['course_data']['training_image']; ?>" width="40" height="40" alt="<?php echo $order['course_data']['training_name']; ?>" class="rounded">
											</div>
										</div>
										<div class="flex">
											<div class="card-title"><?php echo $order['course_data']['training_name']; ?></div>
											<p class="flex text-50 lh-1 mb-0"><small><?php echo $order['course_data']['no_of_sessions']; ?> sessions</small></p>
										</div>
									</div>
								</div>

								<a href="<?php echo base_url(); ?>course-view/<?php echo $order['course_data']['b64_tmid']; ?>"
								   class="ml-4pt btn btn-sm btn-link text-secondary border-1 border-secondary">View</a>

							</div>

						</div>
					</div>

					<div class="popoverContainer d-none">
						<div class="media">
							<div class="media-left mr-12pt">
								<img src="<?php echo $order['course_data']['training_image']; ?>" width="40" height="40" alt="<?php echo $order['course_data']['training_name']; ?>" class="rounded">
							</div>
							<div class="media-body">
								<div class="card-title"><?php echo $order['course_data']['training_name']; ?></div>
								<p class="text-50 d-flex lh-1 mb-0 small"><?php echo $order['course_data']['no_of_sessions']; ?> sessions</p>
							</div>
						</div>

						<p class="mt-16pt text-70"><?php echo $order['course_data']['training_description']; ?></p>

						<div class="my-32pt">
							<div class="d-flex align-items-center mb-8pt justify-content-center">
								<div class="d-flex align-items-center mr-8pt">
									<span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
									<p class="flex text-50 lh-1 mb-0"><small><?php echo $order['course_data']['course_duration']; ?> Hrs</small></p>
								</div>
								<div class="d-flex align-items-center">
									<span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
									<p class="flex text-50 lh-1 mb-0"><small><?php echo $order['course_data']['no_of_sessions']; ?> sessions</small></p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-center">
								<a href="<?php echo base_url(); ?>course-view/<?php echo $order['course_data']['b64_tmid']; ?>"
								   class="btn btn-primary mr-8pt">View</a>
								<a href="student-path.html"
								   class="btn btn-outline-secondary ml-0">Start over</a>
							</div>
						</div>

						<div class="d-flex align-items-center">
							<small class="text-50 mr-8pt">Your rating</small>
							<div class="rating mr-8pt">
								<span class="rating__item"><span class="material-icons text-primary">star</span></span>
								<span class="rating__item"><span class="material-icons text-primary">star</span></span>
								<span class="rating__item"><span class="material-icons text-primary">star</span></span>
								<span class="rating__item"><span class="material-icons text-primary">star</span></span>
								<span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
							</div>
							<small class="text-50">4/5</small>
						</div>
					</div>

				  </div>
				<?php } ?>
			  <?php } else { ?>
				No courses available!
			  <?php } ?>
			</div>
		</div>
	</div>

</div>
<!-- // END Header Layout Content -->