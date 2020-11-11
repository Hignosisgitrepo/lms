<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>General Setup</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap" rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css" href="<?php echo base_url('assets/common/vendor/spinkit.css'); ?>" rel="stylesheet">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="<?php echo base_url('assets/common/vendor/perfect-scrollbar.css'); ?>"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="<?php echo base_url('assets/common/css/material-icons.css'); ?>"
              rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link type="text/css"
              href="<?php echo base_url('assets/common/css/fontawesome.css'); ?>"
              rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css"
              href="<?php echo base_url('assets/common/css/preloader.css'); ?>"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="<?php echo base_url('assets/common/css/app.css'); ?>"
              rel="stylesheet">

    </head>

    <body class="layout-default layout-login-centered-boxed">

        <div class="layout-login-centered-boxed__form card">
            <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-5 navbar-light">
                <p class="navbar-brand flex-column mb-2 align-items-center mr-0">General Setup</p>
            </div>

            <form method="POST" id="setup" name="setup" novalidate>
                <div class="form-group">
					<label class="form-control-label">Company Name</label>
					<input id="first-name" type="text" class="form-control" name="config_company_name" autofocus="" id="config_company_name">
					<div style=" color:#FF0000;"><?php echo form_error('config_company_name'); ?></div>
                </div>
				<div class="form-group">
					<label class="form-control-label">Default Language</label>
					<select class="form-control" name="config_language" id="config_language">
					  <?php foreach($languages as $lang): ?>
						<option value="<?php echo $lang->language_id; ?>"><?php echo $lang->language_name; ?></option>
					  <?php endforeach; ?>
					</select>
					<div style=" color:#FF0000;"><?php echo form_error('config_language'); ?></div>
				</div>
				<div class="form-group">
					<label>Website Logo</label>
					<input type="file" class="form-control" name="config_logo" id="config_logo">
					<small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
				</div>
				<div class="form-group mb-0">
					<label>Favicon</label>
					<input type="file" class="form-control" name="config_icon" id="config_icon">
					<small class="text-secondary">Recommended image size is <b>16px x 16px</b> or <b>32px x 32px</b></small><br>
					<small class="text-secondary">Accepted formats : only png and ico</small>
				</div>
                <div class="form-group text-center">
                    <button class="btn btn-primary mb-2"type="submit">Save</button>
                </div>
            </form>
        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url('assets/common/vendor/jquery.min.js'); ?>"></script>

        <!-- Bootstrap -->
        <script src="<?php echo base_url('assets/common/vendor/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/common/vendor/bootstrap.min.js'); ?>"></script>

        <!-- Perfect Scrollbar -->
        <script src="<?php echo base_url('assets/common/vendor/perfect-scrollbar.min.js'); ?>"></script>

        <!-- DOM Factory -->
        <script src="<?php echo base_url('assets/common/vendor/dom-factory.js'); ?>"></script>

        <!-- MDK -->
        <script src="<?php echo base_url('assets/common/vendor/material-design-kit.js'); ?>"></script>

        <!-- App JS -->
        <script src="<?php echo base_url('assets/common/js/app.js'); ?>"></script>

        <!-- Preloader -->
        <script src="<?php echo base_url('assets/common/js/preloader.js'); ?>"></script>

    </body>

</html>