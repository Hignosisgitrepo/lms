<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
	$icon_img = setting('theme_icon', 'theme');
	if(!empty($icon_img)) {
		$icon = base_url().'assets/image/'.$icon_img->value;
	} else {
		$icon = base_url().'assets/img/favicon.png';
	}
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
        <title><?php echo $pageTitle; ?> - HRMS admin template</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $icon; ?>">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/line-awesome.min.css'); ?>">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="<?php echo base_url('assets/js/html5shiv.min.js'); ?>"></script>
			<script src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
		<![endif]-->
    </head>
    <body class="error-page">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			
			<div class="error-box">
				<?php echo $text_no_permission; ?>
				<a href="<?php echo base_url(); ?>dashboard" class="btn btn-custom"><?php echo $text_back; ?></a>
			</div>
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
		
		<!-- Custom JS -->
		<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
		
    </body>
</html>