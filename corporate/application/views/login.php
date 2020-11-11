<!DOCTYPE html>
<?php 
	$company = setting('config_company_name', 'config');
	$company_name = $company->value;
	$logo_img = setting('config_logo', 'config');
	$logo = $logo_img->value;
	$icon_img = setting('config_icon', 'config');
	$icon = $icon_img->value;
?>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $company_name; ?>-Login</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap" rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css" href="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/spinkit.css" rel="stylesheet">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/perfect-scrollbar.css"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="<?php echo $this->config->item('default_url'); ?>/assets/common/css/material-icons.css"
              rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link type="text/css"
              href="<?php echo $this->config->item('default_url'); ?>/assets/common/css/fontawesome.css"
              rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css"
              href="<?php echo $this->config->item('default_url'); ?>/assets/common/css/preloader.css'"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="<?php echo $this->config->item('default_url'); ?>/assets/common/css/app.css"
              rel="stylesheet">

    </head>

    <body class="layout-default layout-login-centered-boxed">

        <div class="layout-login-centered-boxed__form card">
            <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-5 navbar-light">
                <p class="navbar-brand flex-column mb-2 align-items-center mr-0">Login</p>
            </div>
			<div id="login_err"></div>
            <form method="POST" id="register" name="register" novalidate>
                <div class="form-group">
                    <label class="text-label"
                           for="email_2"><?php echo $text_email; ?></label>
                    <div class="input-group input-group-merge">
                        <input id="user_name" type="email" required="" class="form-control form-control-prepended" placeholder="<?php echo $text_email; ?>" name="user_name">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div id="user_name_err"></div>
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
				<div id="password_err"></div>
                <div class="form-group text-center">
                    <a class="btn btn-primary" onclick="corporateLogin();" style="color:#fff"> <?php echo $btn_login; ?> </a>
                </div>
            </form>
        </div>

        <!-- jQuery -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/popper.min.js"></script>
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/material-design-kit.js"></script>

        <!-- App JS -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/app.js"></script>

        <!-- Preloader -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/preloader.js"></script>
		<script>
			function corporateLogin() {
				var user_name = document.getElementById("user_name").value;
				var password = document.getElementById("password").value;
				var err = 0;
				if (user_name == '') {
					$("#user_name_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $err_username; ?></div>').show('fast').delay(5000).hide('fast');
					document.getElementById("user_name").focus();
					err++;
					return false;
				} else {
					var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

					if (reg.test(user_name) == false) {
						$("#user_name_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $err_username; ?></div>').show('fast').delay(5000).hide('fast');
						document.getElementById("user_name").focus();
						
						err++;
						return false;
					}
				}
				if (password == '') {
					$("#password_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $err_password; ?></div>').show('fast').delay(5000).hide('fast');
					document.getElementById("password").focus();
					err++;
					return false;
				}
				if(err == 0) {
					var url_path = '<?php echo base_url(); ?>dashboard';
					$.ajax({
						type:'POST',
						url:'<?php echo base_url(); ?>common/login_ajax/corporateLogin',
						data:{user_name: user_name, password: password},
						dataType: 'json',
						success:function(json){
							if(json['success'] == 1) {
								window.location = url_path;
							} else {
								if(json['err_username']) {
									$("#user_name_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_username'] + '</div>').show('fast').delay(5000).hide('fast');
									document.getElementById("user_name").focus();
									return false;
								}
								if(json['err_password']) {
									$("#pasword_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_password'] + '</div>').show('fast').delay(5000).hide('fast');
									document.getElementById("password").focus();
									return false;
								}	
								if(json['msg']) {
									$("#login_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['msg'] + '</div>').show('fast').delay(5000).hide('fast');
									document.getElementById("user_name").focus();
									return false;
								}
							}
						},
						error: function (xhr, ajaxOptions, thrownError) {
							alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
						}
					});
				} else {
					return false;
				}
			}
		</script>

    </body>

</html>