<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?><!DOCTYPE html><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login</title>
		
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
			<script src="<?php echo base_url('assets/dashboard/js/html5shiv.min.js'); ?>"></script>
			<script src="<?php echo base_url('assets/dashboard/js/respond.min.js'); ?>"></script>
		<![endif]-->
    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="container">
				
					<!-- Account Logo -->
					<div class="account-logo">
						<img src="<?php echo base_url('assets/dashboard/img/logo.png'); ?>" alt="Dreamguy's Technologies">
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Login</h3>
							<p class="account-subtitle">Help Desk</p>
							
							<!-- Account Form -->
							<form action="<?php echo base_url(); ?>dashboard">
								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Password</label>
										</div>
										<div class="col-auto">
											<a class="text-muted" href="forgot-password.html">
												Forgot password?
											</a>
										</div>
									</div>
									<input class="form-control" type="password">
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Login</button>
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