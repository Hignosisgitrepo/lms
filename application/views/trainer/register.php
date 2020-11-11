<?php $this->load->view('includes/header'); ?>
<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				
			<?php
				$success = $this->session->flashdata('success');
				if($success) { ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $success; ?>                    
				</div>
			<?php } ?>
				<!-- Account Content -->
				<div class="account-content">
					<div class="row align-items-center justify-content-center">
						<div class="col-md-12 col-lg-6 login-right">
							<div class="login-header">
								<h3>Mentor Register <a href="<?php echo base_url(); ?>user-registration">Not a Mentor?</a></h3>
							</div>
							
							<!-- Register Form -->
							<form method="POST" id="register" name="register">
								<div class="form-group form-focus">
									<input id="first-name" type="text" class="form-control" name="full_name" autofocus="">
									<label class="focus-label"><?php echo $text_fullname; ?></label>
									<div style=" color:#FF0000;"><?php echo form_error('full_name'); ?></div>
								</div>
								<div class="form-group form-focus">
									<input id="email" type="email" class="form-control" name="email">
									<label class="focus-label"><?php echo $text_email; ?></label>
									<div style=" color:#FF0000;"><?php echo form_error('email'); ?></div>
								</div>
								<div class="form-group form-focus">
									<input id="password" type="password" class="form-control" name="password">
									<label class="focus-label"><?php echo $text_password; ?></label>
									<div style=" color:#FF0000;"><?php echo form_error('password'); ?></div>
								</div>
								<div class="form-group form-focus">
									<input id="password-confirm" type="password" class="form-control" name="confirm_password">
									<label class="focus-label"><?php echo $text_retype; ?></label>
									<div style=" color:#FF0000;"><?php echo form_error('confirm_password'); ?></div>
								</div>
								<div class="text-right">
									<a class="forgot-link" href="<?php echo base_url(); ?>mentor-login">Already have an account?</a>
								</div>
								<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
							</form>
							<br>
							<!-- /Register Form -->
							
						</div>
					</div>
				</div>
				<!-- /Account Content -->
					
			</div>
		</div>

	</div>

</div>		
<!-- /Page Content -->
<?php $this->load->view('includes/footer'); ?>