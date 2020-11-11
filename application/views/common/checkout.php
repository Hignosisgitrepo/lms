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
	<div class="mdk-header-layout__content page-content">

		<div class="page-section">
			<div class="container page__container">
				<form action="index.html"
					  class="col-md-8 p-0 mx-auto">

					<div class="list-group list-group-form mb-0">
						<div class="list-group-item">
							<fieldset aria-labelledby="label-type"
									  class="m-0 form-group">
								<div class="form-row align-items-center">
									<label for="payment_cc"
										   id="label-type"
										   class="col-md-3 col-form-label form-label">Payment type</label>
									<div role="group"
										 aria-labelledby="label-type"
										 class="col-md-9">
										<div role="group"
											 class="btn-group btn-group-toggle"
											 data-toggle="buttons">
											<label class="btn btn-outline-secondary active">
												<input type="radio" id="payment_cc" name="payment_type" value="cc" checked="" aria-checked="true" onchange="displayRadioValue();" /> Debit or credit card
											</label>
											<label class="btn btn-outline-secondary">
												<input type="radio" id="payment_pp" name="payment_type" value="pp" aria-checked="true" onchange="displayRadioValue();" /> PayPal
											</label>
											<label class="btn btn-outline-secondary">
												<input type="radio" id="payment_rp" name="payment_type" value="rp" aria-checked="true" onchange="displayRadioValue();" /> Razorpay
											</label>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="list-group-item">
							<div class="form-group row align-items-center mb-0">
								<label class="col-form-label form-label col-sm-3">Card number</label>
								<div class="col-sm-9">
									<input type="text"
										   class="form-control"
										   placeholder="Credit / debit card number" />
								</div>
							</div>
						</div>
						<div class="list-group-item">
							<div class="form-group row align-items-center mb-0">
								<label class="col-form-label form-label col-sm-3">Security code (CVV)</label>
								<div class="col-sm-9">
									<input type="text"
										   class="form-control"
										   placeholder="CVV"
										   style="width:80px">
								</div>
							</div>
						</div>
						<div class="list-group-item">
							<div class="form-group row align-items-center mb-0">
								<label class="col-form-label form-label col-sm-3">Expiration date</label>
								<div class="col-sm-9">
									<div class="form-row">
										<div class="col-md-6 mb-16pt mb-sm-0">
											<select class="custom-control custom-select form-control">
												<option value="1">January</option>
												<option value="2">February</option>
												<option value="3">March</option>
												<option value="4">April</option>
												<option value="5">May</option>
												<option value="6">June</option>
												<option value="7">July</option>
												<option value="8">August</option>
												<option value="9">September</option>
												<option value="10">October</option>
												<option value="11">Novemeber</option>
												<option value="12">December</option>
											</select>
										</div>
										<div class="col-md-6">
											<select class="custom-control custom-select form-control">
												<option value="1"
														selected="">2016</option>
												<option value="2">2017</option>
												<option value="3">2018</option>
												<option value="3">2019</option>
												<option value="3">2020</option>
												<option value="3">2021</option>
												<option value="3">2022</option>
												<option value="3">2023</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="list-group-item text-center">
							<button type="submit"
									class="btn btn-primary">Pay Now</button>
						</div>
					</div>

				</form>
			</div>
		</div>

	</div>
	<!-- // END Header Layout Content -->

</div>
<!-- // END Header Layout Content -->
<?php $this->load->view('includes/footer'); ?>