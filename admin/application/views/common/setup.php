<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>General Setup</title>
		
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
		<link rel="stylesheet" href="<?php echo base_url('assets/dashboard/css/select2.min.css'); ?>">
    </head>
    <body class="account-page">
        <div class="col-md-8 offset-md-2">
		  <div class="conatiner">
			<div class="page-header">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="page-title">Setup</h3>
					</div>
				</div>
				<form action="<?php echo base_url().'general-setup'; ?>" method="post" enctype="multipart/form-data" id="form-setting" class="form-horizontal">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Company Name <span class="text-danger">*</span></label>
								<input class="form-control" type="text" value="" name="config_company_name" id="config_company_name">
							</div>
							<div style=" color:#FF0000;padding-left:10px"><?php echo form_error('config_company_name'); ?></div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Default Language</label>
								<select class="form-control" name="config_language" id="config_language">
								  <?php foreach($languages as $lang): ?>
									<option value="<?php echo $lang->language_id; ?>"><?php echo $lang->language_name; ?></option>
								  <?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-lg-3 col-form-label">Logo</label>
						<div class="col-lg-7">
							<input type="file" class="form-control" name="config_logo" id="config_logo">
							<span class="form-text text-muted">Recommended image size is 40px x 40px</span>
						</div>
						<div class="col-lg-2">
							<div class="img-thumbnail float-right"><img src="assets/dashboard/img/logo2.png" alt="" width="40" height="40"></div>
						</div>
					</div>
					<div class="row">
						<label class="col-lg-3 col-form-label">Favicon</label>
						<div class="col-lg-7">
							<input type="file" class="form-control" name="config_icon" id="config_icon">
							<span class="form-text text-muted">Recommended image size is 16px x 16px</span>
						</div>
						<div class="col-lg-2">
							<div class="settings-image img-thumbnail float-right"><img src="assets/dashboard/img/logo2.png" class="img-fluid" width="16" height="16" alt=""></div>
						</div>
					</div>
				</form> 
				<div class="submit-section">
					<button class="btn btn-primary submit-btn" type="submit" form="form-setting">Save</button>
				</div>
			</div>
		  </div>
        </div>		
		<!-- jQuery -->
        <script src="<?php echo base_url('assets/dashboard/js/jquery-3.2.1.min.js'); ?>"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url('assets/dashboard/js/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/bootstrap.min.js'); ?>"></script>
		
		<!-- Custom JS -->
		<script src="<?php echo base_url('assets/dashboard/js/app.js'); ?>"></script>
		<script src="<?php echo base_url('assets/dashboard/js/select2.min.js'); ?>"></script>
    </body>
</html>