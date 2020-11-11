<div class="pt-32pt">
	<div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
		<div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

			<div class="mb-24pt mb-sm-0 mr-sm-24pt">
				<h2 class="mb-0">Training</h2>

				<ol class="breadcrumb p-0 m-0">
					<li class="breadcrumb-item"><a href="<?php echo site_url('trainer-dashboard'); ?>">Dashboard</a></li>
				    <li class="breadcrumb-item"><a href="<?php echo site_url('training-list'); ?>">Training List</a></li>
                    <li class="breadcrumb-item active">Add Training</li>

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
			<div class="card card-primary card-outline" style="min-width: 100%;">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title"><?php echo $text_add; ?></h3>
                    <!--  <a href="<?php echo site_url('add_training')?>" class="btn btn-rounded btn-primary float-right"><i class="fa fa-plus"></i> <?php echo $text_add; ?></a> -->
                  </div>
                  <!-- /.card-header -->
				  <input id="training_master_id" class="training_master_id" type="hidden" value="" data-value=''>
				  <input id="training_section_id" class="training_section_id" type="hidden" value="" data-value=''>
                  <div class="card-body">
      					<ul class="nav nav-tabs  nav-tabs-bottom nav-justified">
      						<li class="nav-item"><a class="tab_menu  nav-link disabled active" id="tab_1" data-target="#tab_1_content" data-toggle="tab" data-value="1"><?php echo $text_Basic_Details; ?></a></li>
      						<li class="nav-item"><a class="tab_menu nav-link disabled" id="tab_2" data-target="#tab_2_content" data-toggle="tab" data-value="2"><?php echo $text_Section; ?></a></li>
      						<li class="nav-item"><a class="tab_menu nav-link disabled" id="tab_3" data-target="#tab_3_content" data-toggle="tab" data-value="3"><?php echo $text_Section_Details; ?></a></li>
      					</ul>
      					<div class="tab-content">
      						<div class="tab_content tab-pane show active" id="tab_1_content">
      							<?php $this->load->view('trainer/training_forms/basic_form'); ?>
      						</div>
      						<div class="tab_content tab-pane" id="tab_2_content">
      							<?php $this->load->view('trainer/training_forms/section_form'); ?>
      						</div>
      						<div class="tab_content tab-pane" id="tab_3_content">
      							<?php $this->load->view('trainer/training_forms/section_detail_form'); ?>
      						</div>
      					</div>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
        </div>
    </div>
</div>