<?php $this->load->view('includes/header'); ?>
</div>
</div>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content ">

	<div class="pt-32pt">
		<div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
			<div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

				<div class="mb-24pt mb-sm-0 mr-sm-24pt">
					<h2 class="mb-0">Checkout</h2>

					<ol class="breadcrumb p-0 m-0">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>shopping-cart">Shopping Cart</a></li>
						<li class="breadcrumb-item active">

							Checkout

						</li>

					</ol>

				</div>
			</div>

			<div class="row"
				 role="tablist">
				<div class="col-auto">
					<a href="<?php echo base_url(); ?>shopping-cart" class="btn btn-outline-secondary"><i class="fa fa-reply"></i></a>
				</div>
			</div>

		</div>
	</div>

	<!-- Header Layout Content -->
	<div class="mdk-header-layout__content page-content " id="login_div">

		<div class="pt-32pt pt-sm-64pt pb-32pt">
			<div class="container page__container">
				<form class="col-md-5 p-0 mx-auto">
					<div id="checkinvalidLogin"></div>
					<div class="form-group">
						<label class="form-label"
							   for="email">Email:</label>
						<input type="text" class="form-control" placeholder="Your email address ..." id="checkout_email" required>
					</div>
					<div id="checkemail_err"></div>
					<div class="form-group">
						<label class="form-label"
							   for="password">Password:</label>
						<input type="password" class="form-control" placeholder="Your password ..." id="checkout_pwd" required>
						<!-- <p class="text-right"><a href="reset-password.html"
							   class="small">Forgot your password?</a></p> -->
					</div>
					<div id="checkpwd_err"></div>
					<div class="text-center">
						<a class="btn btn-primary" onclick="checkoutLogin();">Login</a>
					</div>
				</form>
			</div>
		</div>
		<div class="page-separator justify-content-center m-0">
			<div class="page-separator__text">Already have account!</div>
		</div>
		<div class="bg-body pt-32pt pb-32pt pb-md-64pt text-center">
			<div class="container page__container">
				<button class="btn btn-primary" onclick="changeDiv();">Sign Up</button>
			</div>
		</div>

	</div>
	<div class="mdk-header-layout__content page-content " id="signup_div" style="display:none">

		<div class="pt-32pt pt-sm-64pt pb-32pt">
			<div class="container page__container">
				<form action="index.html"
					  class="col-md-5 p-0 mx-auto">
					<div class="form-group">
						<label class="form-label"
							   for="email">Email:</label>
						<input id="email"
							   type="text"
							   class="form-control"
							   placeholder="Your email address ...">
					</div>
					<div class="form-group">
						<label class="form-label"
							   for="password">Password:</label>
						<input id="password"
							   type="password"
							   class="form-control"
							   placeholder="Your first and last name ...">
						<p class="text-right"><a href="reset-password.html"
							   class="small">Forgot your password?</a></p>
					</div>
					<div class="text-center">
						<button class="btn btn-primary">Signin</button>
					</div>
				</form>
			</div>
		</div>
		<div class="page-separator justify-content-center m-0">
			<div class="page-separator__text">Don’t have an account? </div>
		</div>
		<div class="bg-body pt-32pt pb-32pt pb-md-64pt text-center">
			<div class="container page__container">
				<button class="btn btn-primary" onclick="changeDiv();">Login</button>
			</div>
		</div>

	</div>
	<!-- // END Header Layout Content -->

</div>
<!-- // END Header Layout Content -->
<?php $this->load->view('includes/footer'); ?>