<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Signup</title>

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
                <p class="navbar-brand flex-column mb-2 align-items-center mr-0">Create a new account</p>
            </div>

            <form method="POST" id="register" name="register" novalidate>
                <div class="form-group">
                    <label class="text-label"
                           for="name_2"><?php echo $text_fullname; ?></label>
                    <div class="input-group input-group-merge">
						<input id="full_name" type="text" required="" class="form-control form-control-prepended" placeholder="<?php echo $text_fullname; ?>" name="full_name">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-user"></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div style=" color:#FF0000;"><?php echo form_error('full_name'); ?></div>
                <div class="form-group">
                    <label class="text-label"
                           for="email_2"><?php echo $text_email; ?></label>
                    <div class="input-group input-group-merge">
                        <input id="email" type="email" required="" class="form-control form-control-prepended" placeholder="<?php echo $text_email; ?>" name="email">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div style=" color:#FF0000;"><?php echo form_error('email'); ?></div>
                <div class="form-group">
                    <label class="text-label"
                           for="password_2"><?php echo $text_password; ?></label>
                    <div class="input-group input-group-merge">
                        <input id="password" type="password" name="password" required="" class="form-control form-control-prepended" placeholder="<?php echo $text_password; ?>">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div style=" color:#FF0000;"><?php echo form_error('password'); ?></div>
                <div class="form-group">
                    <label class="text-label"
                           for="password_2"><?php echo $text_retype; ?></label>
                    <div class="input-group input-group-merge">
                        <input id="confirm_password" type="password" name="confirm_password" required="" class="form-control form-control-prepended" placeholder="<?php echo $text_retype; ?>">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
					<div style=" color:#FF0000;"><?php echo form_error('confirm_password'); ?></div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary mb-2"type="submit"><?php echo $btn_register; ?></button>
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