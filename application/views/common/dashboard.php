<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?><!DOCTYPE html>
<!-- Page Wrapper -->
<div class="page-wrapper">
   <!-- Page Content -->
   <div class="content container-fluid">
      <div class="card mb-0">
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="profile-view" align="center">
                     <div class="profile-img">
                        <a href="#"><img alt="" src="<?php echo base_url('assets/dashboard/img/profiles/avatar-02.jpg'); ?>" style="border-radius: 50%; height: 120px; width: 120px;"></a>
                     </div>
                     <div class="col-md-12">
                        <h3 class="user-name m-t-0 mb-0">John Doe</h3>
                        <h6 class="text-muted">UI/UX Design Team</h6>
                        <small class="text-muted">Web Designer</small>
                     </div>
                     <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
	  <!-- Buttons -->
		<!--<section class="comp-section comp-buttons" id="comp_buttons" align="center">
			<div>
				<button type="button" class="btn btn-info"><i class="fa fa-plus"></i></a>&nbsp; Add New Section</button>
				<button type="button" class="btn btn-info"><i class="fa fa-linkedin"></i></a>&nbsp; Linkedin Import</button>
			</div>
		</section>-->
      <div class="row">
         <div class="col-12 col-md-6 col-lg-3 d-flex">
            <div class="card profile-box flex-fill">
               <div class="card-body">
                  <h3 class="card-title">Relationship <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
				  <div class="project-members m-b-15">
					<div>Management </div>
					<ul class="team-members">
						<li>
							<a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="<?php echo base_url('assets/dashboard/img/profiles/avatar-02.jpg'); ?>"></a>
						</li>
					</ul>
				  </div>
				  <div class="project-members m-b-15">
					<div>CCSM Peers </div>
					<ul class="team-members">
						<li>
							<a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="<?php echo base_url('assets/dashboard/img/profiles/avatar-02.jpg'); ?>"></a>
						</li>
					</ul>
				  </div>
				  <div class="project-members m-b-15">
					<div>Engineers </div>
					<ul class="team-members">
						<li>
							<a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="<?php echo base_url('assets/dashboard/img/profiles/avatar-02.jpg'); ?>"></a>
						</li>
						<li>
							<a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="<?php echo base_url('assets/dashboard/img/profiles/avatar-02.jpg'); ?>"></a>
						</li>
						<li>
							<a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="<?php echo base_url('assets/dashboard/img/profiles/avatar-02.jpg'); ?>"></a>
						</li>
					</ul>
				  </div>
				  <div class="project-members m-b-15">
					<div>Sales </div>
					<ul class="team-members">
						<li>
							<a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="<?php echo base_url('assets/dashboard/img/profiles/avatar-02.jpg'); ?>"></a>
						</li>
					</ul>
				  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-md-6 col-lg-3 d-flex">
            <div class="card flex-fill">
               <div class="card-body" style="flex: 0 0 auto;padding:1.25rem 0.1rem 0.1rem 1.25rem">
                  <h3 class="card-title">Groups <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
			   </div>
				<div class="card-header">
					<ul role="tablist" class="nav nav-tabs card-header-tabs float-right">
						<li class="nav-item">
							<a href="#tab-1" data-toggle="tab" class="nav-link active" style="padding: .5rem .5em;">Official</a>
						</li>
						<li class="nav-item">
							<a href="#tab-2" data-toggle="tab" class="nav-link" style="padding: .5rem .5em;">Social</a>
						</li>
						<li class="nav-item">
							<a href="#tab-3" data-toggle="tab" class="nav-link" style="padding: .5rem .5em;">Owned</a>
						</li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content pt-0">
						<div role="tabpanel" id="tab-1" class="tab-pane fade show active">
							
				  <div class="project-members m-b-15">
									<ul class="chat-user-list">
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></span>
													<div class="media-body align-self-center text-nowrap">
														<div class="user-name">CCSM</div>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="assets/img/profiles/avatar-10.jpg"></span>
													<div class="media-body align-self-center text-nowrap">
														<div class="user-name">Sales</div>
													</div>
												</div>
											</a>
										</li>
									</ul>
				  </div>
						</div>
						<div role="tabpanel" id="tab-2" class="tab-pane fade text-center">
							<div class="project-members m-b-15">
									<ul class="chat-user-list">
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></span>
													<div class="media-body align-self-center text-nowrap">
														<div class="user-name">CCSM</div>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="assets/img/profiles/avatar-10.jpg"></span>
													<div class="media-body align-self-center text-nowrap">
														<div class="user-name">Sales</div>
													</div>
												</div>
											</a>
										</li>
									</ul>
				  </div>
						</div>
						<div role="tabpanel" id="tab-3" class="tab-pane fade">
							<div class="project-members m-b-15">
									<ul class="chat-user-list">
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></span>
													<div class="media-body align-self-center text-nowrap">
														<div class="user-name">CCSM</div>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="assets/img/profiles/avatar-10.jpg"></span>
													<div class="media-body align-self-center text-nowrap">
														<div class="user-name">Sales</div>
													</div>
												</div>
											</a>
										</li>
									</ul>
				  </div>
						</div>
					</div>
				</div>
			</div>
         </div>
         <div class="col-12 col-md-6 col-lg-3 d-flex">
            <div class="card profile-box flex-fill">
               <div class="card-body">
                  <h3 class="card-title">Contact Information <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
				  
					<div class="staff-id">Email</div>
					<div class="staff-id">Main Email</div>
					<h6 class="text-muted">Primary</h6>
					tarakant@hignosisit.com
					<h6 class="text-muted">Secondary</h6>
					tarakant@gamil.com
				  
				  
			   </div>
			</div>
		 </div>
         <div class="col-12 col-md-6 col-lg-3 d-flex">
            <div class="card profile-box flex-fill">
               <div class="card-body">
                  <h3 class="card-title">Skills & Certifications <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
				  
					<div class="staff-id">Certifications</div>
					<div class="alert alert-light alert-dismissible fade show">
						Contact center
					</div>
					<div class="alert alert-light alert-dismissible fade show">
						Networking
					</div>
					<div class="alert alert-light alert-dismissible fade show">
						Telecom
					</div>
				  
					<div class="staff-id">Skills</div>
					<div class="alert alert-light alert-dismissible fade show">
						Telecom
					</div>
			   </div>
			</div>
		 </div>
      </div>
   </div>
   <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->