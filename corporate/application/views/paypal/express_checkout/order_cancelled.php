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
						<li class="breadcrumb-item active">Order Cancelled
						</li>

					</ol>

				</div>
			</div>
		</div>
	</div>

	<!-- Header Layout Content -->
	<div class="mdk-header-layout__content page-content">

		<div class="page-section">
			<div class="container page__container">
				<div class="col-md-12 column">
					<p>The payment has not been processed at this point because we cancelled the payment.</p>
				</div>
				<a class="btn btn-primary" href="<?php echo base_url();?>">Start over</a>
			</div>
		</div>

	</div>
	<!-- // END Header Layout Content -->

</div>
<!-- // END Header Layout Content -->
<?php $this->load->view('includes/footer'); ?>