<?php 
   $company = setting('config_company_name', 'config');
   $company_name = $company->value;
   $logo_img = setting('config_logo', 'config');
   $logo = $logo_img->value;
   $icon_img = setting('config_icon', 'config');
   $icon = $icon_img->value;
   ?>
            <!-- Footer -->

            <div class="bg-white border-top-2 mt-auto">
                <div class="container page__container page-section d-flex flex-column">
                    <p class="text-70 brand mb-24pt">
                        <img class="brand-icon"
                             src="<?php echo $this->config->item('default_url'); ?>/assets/image/<?php echo $logo; ?>"
                             width="30"
                             alt="<?php echo $company_name; ?>"> <?php echo $company_name; ?>
                    </p>
                    <p class="measure-lead-max text-50 small mr-8pt"><?php echo $company_name; ?> is a beautifully crafted user interface for modern Education Platforms, including Courses & Tutorials, Video Lessons, Student and Teacher Dashboard, Curriculum Management, Earnings and Reporting, ERP, HR, CMS, Tasks, Projects, eCommerce and more.</p>
                    <p class="mb-8pt d-flex">
                        <a href=""
                           class="text-70 text-underline mr-8pt small">Terms</a>
                        <a href=""
                           class="text-70 text-underline small">Privacy policy</a>
                    </p>
                    <p class="text-50 small mt-n1 mb-0">Copyright 2019 &copy; All rights reserved.</p>
                </div>
            </div>

            <!-- // END Footer -->

        </div>
        <!-- // END Header Layout -->

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
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!-- App JS -->
        <script src="<?php echo base_url('assets/common/js/app.js'); ?>"></script>

        <!-- Preloader -->
        <script src="<?php echo base_url('assets/common/js/preloader.js'); ?>"></script>

		<!-- Toastr -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/toastr.min.js"></script>
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/toastr.js"></script>
        <script>
            (function() {
                'use strict';
                var headerNode = document.querySelector('.mdk-header')
                var layoutNode = document.querySelector('.mdk-header-layout')
                var componentNode = layoutNode ? layoutNode : headerNode
                componentNode.addEventListener('domfactory-component-upgraded', function() {
                    headerNode.mdkHeader.eventTarget.addEventListener('scroll', function() {
                        var progress = headerNode.mdkHeader.getScrollState().progress
                        var navbarNode = headerNode.querySelector('#default-navbar')
                        navbarNode.classList.toggle('bg-transparent', progress <= 0.2)
                    })
                })
            })()
        </script><noscript>
			<meta http-equiv="refresh" content="0; url=<?php echo base_url('noscript.html'); ?>" />
		</noscript>

	<script>

	

		function addUser() {
			var first_name = document.getElementById("first_name").value;
			var last_name = document.getElementById("last_name").value;
			var email = document.getElementById("email").value;
			var phone_code = document.getElementById("tr_phonecode").value;
			var telephone = document.getElementById("telephone").value;
			var password = document.getElementById("password").value;
			var err = 0;
			
			if (first_name == '') {
				$('#first_name').attr('placeholder','Enter your first name');
				$(".input-group").addClass('was-validated');
				err++;
				return false;
			}
			if (last_name == '') {
				
				$('#last_name').attr('placeholder','Enter your last name');
				$(".input-group").addClass('was-validated');
				err++;
				return false;
			}
			if (email == '') {
				
				$('#email').attr('placeholder','Enter your email ID');
				$(".input-group").addClass('was-validated');
				err++;
				return false;
			} else {
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

				if (reg.test(email) == false) {
					$('#email').val('');
					$('#email').attr('placeholder','Invalid email ID');
					$(".input-group").addClass('was-validated');
					document.getElementById("email").focus();
					
					err++;
					return false;
				}
			}
			if (telephone == '') {
				$('#telephone').attr('placeholder','Enter your phone number');
				$(".input-group").addClass('was-validated');
				document.getElementById("telephone").focus();
				err++;
				return false;
			}
			if (password == '') {
				$('#password').attr('placeholder','Enter your password');
				$(".input-group").addClass('was-validated');
				document.getElementById("password").focus();
				err++;
				return false;
			}
			if(err == 0) {
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>trainer/trainer_ajax/addUser',
					data:{first_name: first_name, last_name: last_name, email: email, phone_code: phone_code, telephone: telephone, password: password},
					dataType: 'json',
					success:function(json){
						if(json['success'] == 1) {
							document.getElementById("tr_step2").style.display = "block";
							document.getElementById("tr_step1").style.display = "none";
							//document.getElementById("tr_otp1").value = json['mobile_otp'];
							document.getElementById("tr_otp2").value = json['email_otp'];
							document.getElementById("first_name").value = '';
							document.getElementById("last_name").value = '';
							document.getElementById("email").value = '';
							document.getElementById("telephone").value = '';
							document.getElementById("password").value = '';
						} else {
							if(json['err_firstname']) {
								$('#first_name').attr('placeholder',json['err_firstname']);
								$(".input-group").addClass('was-validated');
								document.getElementById("first_name").focus();
								return false;
							}
							if(json['err_lastname']) {
								$('#last_name').attr('placeholder',json['err_lastname']);
								$(".input-group").addClass('was-validated');
								document.getElementById("last_name").focus();
								return false;
							}						
							if(json['err_email']) {
								$('#email').attr('placeholder',json['err_email']);
								$(".input-group").addClass('was-validated');
								document.getElementById("email").focus();
								return false;
							}
							
							if(json['err_telephone']) {
								$('#telephone').attr('placeholder',json['err_telephone']);
								$(".input-group").addClass('was-validated');
								document.getElementById("telephone").focus();
								return false;
							}
							
							if(json['err_password']) {
								$('#password').attr('placeholder',json['err_password']);
								$(".input-group").addClass('was-validated');
								document.getElementById("password").focus();
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
	<script>
		function addCustomer() {
			var first_name = document.getElementById("c_first_name").value;
			var last_name = document.getElementById("c_last_name").value;
			var email = document.getElementById("c_email").value;
			var phone_code = document.getElementById("c_phonecode").value;
			var telephone = document.getElementById("c_telephone").value;
			var password = document.getElementById("c_password").value;
			var err = 0;
			if (first_name == '') {
				$('#c_first_name').attr('placeholder','Enter your first name');
				$(".input-group").addClass('was-validated');
				document.getElementById("c_first_name").focus();
				err++;
				return false;
			}
			if (last_name == '') {
				$('#c_last_name').attr('placeholder','Enter your last name');
				$(".input-group").addClass('was-validated');
				document.getElementById("c_last_name").focus();
				err++;
				return false;
			}
			if (email == '') {
				$('#c_email').attr('placeholder','Enter your Email ID');
				$(".input-group").addClass('was-validated');
				document.getElementById("c_email").focus();
				err++;
				return false;
			} else {
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

				if (reg.test(email) == false) {
					$('#c_email').val('');
					$('#c_email').attr('placeholder','Invalid Email ID');
					$(".input-group").addClass('was-validated');
					document.getElementById("c_email").focus();
					
					err++;
					return false;
				}
			}
			if (telephone == '') {
				$('#c_telephone').attr('placeholder','Enter your phone number');
				$(".input-group").addClass('was-validated');
				document.getElementById("c_telephone").focus();
				err++;
				return false;
			}
			if (password == '') {
				$('#c_password').attr('placeholder','Enter your password');
				$(".input-group").addClass('was-validated');
				document.getElementById("c_password").focus();
				err++;
				return false;
			}
			if(err == 0) {
			
				var url_path = '<?php echo base_url(); ?>dashboard';
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>login/addCustomer',
					data:{first_name: first_name, last_name: last_name, email: email, phone_code: phone_code, telephone: telephone, password: password},
					dataType: 'json',
					success:function(json){
						if(json['success'] == 1) {
							document.getElementById("c_first_name").value = '';
							document.getElementById("c_last_name").value = '';
							document.getElementById("c_email").value = '';
							document.getElementById("c_telephone").value = '';
							document.getElementById("c_password").value = '';
							window.location = url_path;
						} else {
							if(json['err_firstname']) {
								$('#c_first_name').attr('placeholder',json['err_firstname']);
								$(".input-group").addClass('was-validated');
								document.getElementById("c_first_name").focus();
								return false;
							}
							if(json['err_lastname']) {
								$('#c_last_name').attr('placeholder',json['err_lastname']);
								$(".input-group").addClass('was-validated');
								document.getElementById("c_last_name").focus();
								return false;
							}						
							if(json['err_email']) {
								$('#c_mail').attr('placeholder',json['err_email']);
								$(".input-group").addClass('was-validated');
								$("#c_mail_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_email'] + '</div>').show('fast').delay(5000).hide('fast');
								document.getElementById("c_email").focus();
								return false;
							}
							
							if(json['err_telephone']) {
								$('#c_phone').attr('placeholder',json['err_telephone']);
								$(".input-group").addClass('was-validated');
								document.getElementById("c_telephone").focus();
								return false;
							}
							
							if(json['err_password']) {
								$('#c_password').attr('placeholder',json['err_password']);
								$(".input-group").addClass('was-validated');
								document.getElementById("c_password").focus();
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
	
	<script>
		function finalSignIN() {
			//var mobile_otp = document.getElementById("tr_mobile_otp").value;
			var email_otp = document.getElementById("tr_email_otp").value;
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>trainer/trainer_ajax/checkOTP',
				data:{/*mobile_otp: mobile_otp, */email_otp: email_otp},
				dataType: 'json',
				success:function(json){
					if(json['success'] == 1) {
						
						//document.getElementById("tr_mobile_otp").value = '';
						document.getElementById("tr_email_otp").value = '';
						document.getElementById("tr_step2").style.display = "none";
						document.getElementById("tr_step1").style.display = "block";
						document.getElementById("first_name").value = '';
						document.getElementById("last_name").value = '';
						document.getElementById("email").value = '';
						document.getElementById("telephone").value = '';
						document.getElementById("password").value = '';
						if(json['msg']) {
							$("#tr_success_div").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['msg'] + '</div>').show('fast').delay(5000).hide('fast');
						}
					} else {
						/*if(json['err_mobileotp']) {
							$("#tr_mobileotp_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_mobileotp'] + '</div>').show('fast').delay(5000).hide('fast');
						}*/
						if(json['err_emailotp']) {
							$("#tr_emailotp_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_emailotp'] + '</div>').show('fast').delay(5000).hide('fast');
						}
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	</script>
	<script>
		function trainerLogin() {
			var email = document.getElementById("tr_email").value;
			var password = document.getElementById("tr_password").value;
			var url_path = '<?php echo base_url(); ?>trainer-dashboard';
			var err=0;
			
			if (email == '') {
				$("#tr_email").attr('placeholder','Enter your Email ID');
				$(".form-group").addClass('was-validated');
				err++;
				
			} else {
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

				if (reg.test(email) == false) {
					$("#tr_email").val('');
					$("#tr_email").attr("placeholder","Invalid your Email ID");
					$(".form-group").addClass('was-validated');
				
					err++;
				
				}
			}
			if (password == '') {
				$("#tr_password").attr('placeholder','Enter your password');
				$(".form-group").addClass('was-validated');
				err++;
				
			}
			
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>common_ajax/login',
				data:{email: email, password: password},
				dataType: 'json',
				success:function(json){
					if(json['success'] == 1) {
						window.location = url_path;
					} else {	

						toastr.warning('Invalid Email / Password');		
							
						if(json['err_email']) {
							$("#tr_email").attr('placeholder',json['err_email']);
						}
						
						if(json['err_password']) {
							$("#tr_password").attr('placeholder',json['err_password']);
						}
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	</script>
	<script>
		
		function customerLogin() {
			//alert("123");
			var email = document.getElementById("cu_email").value;
			var password = document.getElementById("cu_password").value;
			var url_path = '<?php echo base_url(); ?>dashboard';
			
			var err =0;
			
			if (email == '') {
				
				$("#cu_email").attr("placeholder","Plese enter your email ID");
				$(".form-group").addClass('was-validated');
				
				err++;
			
			} else {
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

				if (reg.test(email) == false) {
					$("#cu_email").val('');	
					$("#cu_email").attr("placeholder","Invalid Email ID");
					$(".form-group").addClass('was-validated');
					
					err++;
				
				}
			}
			if (password == '') {
				$("#cu_password").attr("placeholder","Plese enter your password");
				$(".form-group").addClass('was-validated');
				err++;
			
			}
			
			if(err == 0) {
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>common_ajax/login',
					data:{email: email, password: password},
					dataType: 'json',
					success:function(json){
						if(json['success'] == 1) {
							window.location = url_path;
						} else {
							
							if(json['err_login']) {
								toastr.warning('Invaid Email / Password');
								
								return false;
							}
							
							if(json['err_password']) {
								toastr.warning('Invaid Email / Password');
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
	<script>
		function viewTraining(b64_tmid) {
			 var url_path = '<?php echo base_url(); ?>search-training/' + b64_tmid;
			 window.location = url_path;
		}
	</script>
	<script>
		function addToCart(training_master_id) {
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>common/cart/add',
				data:{training_master_id: training_master_id},
				dataType: 'json',
				success:function(json){
					if(json['success'] == 1) {
						$('#cart').empty();
						
						var html = '';
						html +='<button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-caret="false"><i class="material-icons">shopping_cart</i><span class="badge badge-notifications badge-accent">' + json['total'] + '</span></button><div class="dropdown-menu dropdown-menu-right"><div data-perfect-scrollbar class="position-relative"><div class="dropdown-header"><strong>Shopping Cart</strong></div><div class="list-group list-group-flush mb-0">';
						for (var i = 0; i < json['items'].length; i++) {
							html +='<a href="';
							html +=json['items'][i]['href'];
							html +='"class="list-group-item list-group-item-action"><span class="d-flex"><span class="avatar avatar-xs mr-2"><img src="';html +=json['items'][i]['training_image'];
							html +='" alt="';
							html +=json['items'][i]['training_name'];
							html +='"class="avatar-img rounded-circle"></span><span class="flex d-flex flex-column"><strong class="text-black-100">';
							html +=json['items'][i]['training_name'];
							html +='</strong><span class="text-black-70">';
							html +=json['items'][i]['trainer_name'];
							html +='</span><span class="text-black-70">';
							html +=json['items'][i]['price'];
							html +='</span></span></span></a>';
						}
						html +='</div></div><div class="dropdown-header"><h3>Total : ';
						html +=json['total_sum'];
						html +='</h3></div><a href="<?php echo base_url(); ?>shopping-cart" class="btn btn-info" style="width:100%">Go To Cart</a></div>';
					}
					if (html){
						document.getElementById("cart").innerHTML = "";
						$("#cart").append(html);
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	</script>
	<script>
		function deleteCart(cart_id) {
			var url_path = '<?php echo base_url(); ?>shopping-cart';

			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type:'POST',
						url:'<?php echo base_url(); ?>common/cart/delete',
						data:{cart_id: cart_id},
						dataType: 'json',
						success:function(json){
							if(json['success'] == 1) {
								window.location = url_path;
							}
						},
						error: function (xhr, ajaxOptions, thrownError) {
							alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
						}
					});

					Swal.fire(
					'Deleted!',
					'Your cart has been deleted.',
					'success'
					)
				
				}
				});
	

				
		}
	</script>
	<script>
		$(document).ready(function () {
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>common/cart/getCartItem',
				data:{},
				dataType: 'json',
				success:function(json){
					if(json['success'] == 1) {
						if(json['total'] != 0) {
							$('#cart').empty();
							var html = '';
							html +='<button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-caret="false"><i class="material-icons">shopping_cart</i><span class="badge badge-notifications badge-accent">' + json['total'] + '</span></button><div class="dropdown-menu dropdown-menu-right"><div data-perfect-scrollbar class="position-relative"><div class="dropdown-header"><strong>Shopping Cart</strong></div><div class="list-group list-group-flush mb-0">';
							for (var i = 0; i < json['items'].length; i++) {
								html +='<a href="';
								html +=json['items'][i]['href'];
								html +='"class="list-group-item list-group-item-action"><span class="d-flex"><span class="avatar avatar-xs mr-2"><img src="';html +=json['items'][i]['training_image'];
                                html +='" alt="';
								html +=json['items'][i]['training_name'];
								html +='"class="avatar-img rounded-circle"></span><span class="flex d-flex flex-column"><strong class="text-black-100">';
								html +=json['items'][i]['training_name'];
								html +='</strong><span class="text-black-70">';
								html +=json['items'][i]['trainer_name'];
								html +='</span><span class="text-black-70">';
								html +=json['items'][i]['price'];
								html +='</span></span></span></a>';
							}
							html +='</div></div><div class="dropdown-header"><h3>Total : ';
							html +=json['total_sum'];
							html +='</h3></div><a href="<?php echo base_url(); ?>shopping-cart" class="btn btn-info" style="width:100%">Go To Cart</a></div>';
						} else {
							$('#cart').empty();
							var html = '';
							html +='<button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-caret="false"><i class="material-icons">shopping_cart</i></button>';
						}
						if (html){
							document.getElementById("cart").innerHTML = "";
							$("#cart").append(html);
						}
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		});
	</script>
	<script>
		function isNumberKey(evt) {
			 var charCode = (evt.which) ? evt.which : event.keyCode
			 if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;

			 return true;
		}
	</script>
	<Script>
		$(document).ready(function () {
			$("#search_box").keyup(function () {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>common_ajax/searchData",
					data: {
						keyword: $("#search_box").val()
					},
					dataType: "json",
					success: function (data) {
						//console.log(data);
						if (data.length > 0) {
							$('#DropdownCountry').empty();
							$('#search_box').attr("data-toggle", "dropdown");
							$('#DropdownCountry').dropdown('toggle');
						}
						else if (data.length == 0) {
							$('#search_box').attr("data-toggle", "");
						}
						$.each(data, function (key,value) {
							if (data.length >= 0) {
								var link_search = value['training_name'].split(/\s/).join('+');
								console.log(link_search);
								$('#DropdownCountry').append('<li class="list-gpfrm-list"><a onclick="openLink(\''+ link_search +'\');" role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['training_name'] + '</a></li>');
							} else {
								$('#DropdownCountry').append('<li class="list-gpfrm-list"><a role="menuitem dropdownCountryli" class="dropdownlivalue">Sorry , No data found!</a></li>');
							}
						});
					}
				});
			});
			$('ul.txtcountry').on('click', 'li a', function () {
				$('#search_box').val($(this).text());
			});
		});
		
		var input = document.getElementById("search_box");
		input.addEventListener("keyup", function(event) {
			if (event.keyCode === 13) {
				event.preventDefault();
				//alert(input);
			}
		});
		
	</script>
	
	<script>
		function openLink(link_search) {
			 var url_path = '<?php echo base_url(); ?>search/' + link_search;
			 window.location = url_path;
		}
	</script>
	<!--<Script>
		$("#search_box").keypress(function(event) { 
			if (event.keyCode === 13) { 
				alert($("#search_box").val());
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>common_ajax/searchFormData",
					data: {
						keyword: $("#search_box").val()
					},
					dataType: "json",
					success: function (data) {
						//console.log(data);
						if (data.length > 0) {
							$('#DropdownCountry').empty();
							$('#search_box').attr("data-toggle", "dropdown");
							$('#DropdownCountry').dropdown('toggle');
						}
					}
				});
			}
		});
	</script>-->
	<script>
		function changeDiv() {
			var div1 = document.getElementById("login_div");
			var div2 = document.getElementById("signup_div");
			if(div1.style.display === 'none') {
				div1.style.display = 'block';
				div2.style.display = 'none';
			} else {
				div2.style.display = 'block';
				div1.style.display = 'none';
			}
		}
	</script>
	<script>
		function checkoutLogin() {
			var email = document.getElementById("checkout_email").value;
			var password = document.getElementById("checkout_pwd").value;
			var url_path = '<?php echo base_url(); ?>shopping-cart';
			
			var err =0;
			
			if (email == '') {
				$("#checkout_email").attr("placeholder","Enter your Email ID");
				$(".form-group").addClass('was-validated');

				document.getElementById("checkout_email").focus();
				err++;
				return false;
			} else {
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

				if (reg.test(email) == false) {
					$("#checkout_email").val('');
					$("#checkout_email").attr("placeholder","Invalid Email ID");
					$(".form-group").addClass('was-validated');
					document.getElementById("checkout_email").focus();
					
					err++;
					return false;
				}
			}
			if (password == '') {
				$("#checkout_pwd").attr("placeholder","Enter your password");
				$(".form-group").addClass('was-validated');
				document.getElementById("checkout_pwd").focus();
				err++;
				return false;
			}
			
			if(err == 0) {
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>common_ajax/login',
					data:{email: email, password: password},
					dataType: 'json',
					success:function(json){
						if(json['success'] == 1) {
							window.location = url_path;
						} else {
							toastr.warning('Invaid Email / Password');
							return false;
							if(json['err_login']) {
								$("#checkout_email").attr("placeholder",json['err_login']);
								$(".form-group").addClass('was-validated');
								return false;
							}
							
							if(json['err_password']) {
								$("#checkout_pwd").attr("placeholder",json['err_password']);
								$(".form-group").addClass('was-validated');
								document.getElementById("cu_password").focus();
								return false;
							}
							
							if(json['err_password']) {
								$("#checkout_pwd").attr("placeholder",json['err_password']);
								$(".form-group").addClass('was-validated');
								document.getElementById("cu_password").focus();
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
	<script>
        function displayRadioValue() { 
            var ele = document.getElementsByTagName('input'); 
              
            for(i = 0; i < ele.length; i++) { 
                  
                if(ele[i].type="radio") { 
                  
                    if(ele[i].checked)  
						if(ele[i].value == 'pp') {
							var url_path = '<?php echo base_url(); ?>paypal-order-summary';
							window.location = url_path;
						}
                } 
            }
        } 

		$(document).ready(function () {	


		
		toastr.options = {
								  "closeButton": false,
								  "debug": false,
								  "newestOnTop": false,
								  "progressBar": false,
								  "positionClass": "toast-top-right",
								  //"preventDuplicates": false,
								  "onclick": null,
								  "showDuration": "300",
								  "hideDuration": "500",
								  "timeOut": "2000",
								  "extendedTimeOut": "1000",
								  "showEasing": "swing",
								  "hideEasing": "linear",
								  "showMethod": "fadeIn",
								  "hideMethod": "fadeOut",
								  "preventDuplicates": true
								}
		});	

	
    </script>
    </body>

</html>