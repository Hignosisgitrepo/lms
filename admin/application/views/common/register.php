<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Register - Help Desk</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/dashboard/img/favicon.png'); ?>">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/css/bootstrap.min.css'); ?>">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/css/font-awesome.min.css'); ?>">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/css/style.css'); ?>">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/dashboard/js/html5shiv.min.js"></script>
			<script src="assets/dashboard/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="container">
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title"><?php echo $text_register; ?></h3>
							
							<!-- Account Form -->
							<form method="POST" id="register" name="register">
								<div class="form-group">
									<label><?php echo $text_fullname; ?></label>
									<input class="form-control" type="text" placeholder="<?php echo $text_fullname; ?>" name="full_name" id="full_name" value="<?php echo $full_name; ?>" >
									<div style=" color:#FF0000;"><?php echo form_error('full_name'); ?></div>
								</div>
								<div class="form-group">
									<label><?php echo $text_email; ?></label>
									<input class="form-control" type="text" placeholder="<?php echo $text_email; ?>" name="email" id="email" value="<?php echo $email; ?>" />
									<div style=" color:#FF0000;"><?php echo form_error('email'); ?></div>
								</div>
								<div class="form-group">
									<label><?php echo $text_password; ?></label>
									<input class="form-control" type="password" placeholder="<?php echo $text_password; ?>" name="password" id="password" value="<?php echo $password; ?>" />
									<div style=" color:#FF0000;"><?php echo form_error('password'); ?></div>
								</div>
								<div class="form-group">
									<label><?php echo $text_retype; ?></label>
									<input class="form-control" type="password" placeholder="<?php echo $text_retype; ?>" name="confirm_password" id="confirm_password" value="<?php echo $confirm_password; ?>" />
									<div style=" color:#FF0000;"><?php echo form_error('confirm_password'); ?></div>
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit"><?php echo $btn_register; ?></button>
								</div>
							</form>
							<!-- /Account Form -->
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="<?php echo base_url('assets/dashboard/js/jquery-3.2.1.min.js'); ?>"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url('assets/dashboard/js/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/bootstrap.min.js'); ?>"></script>
		
		<!-- Custom JS -->
		<script src="<?php echo base_url('assets/dashboard/js/app.js'); ?>"></script>
		
    </body>
</html>