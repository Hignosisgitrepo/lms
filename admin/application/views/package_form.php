<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

	<!-- Drawer Layout -->
	<div class="mdk-drawer-layout js-mdk-drawer-layout"
		 data-push
		 data-responsive-width="992px">

		<!-- Drawer Layout Content -->
		<div class="mdk-drawer-layout__content page-content">

			<div class="pt-32pt">
				<div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
					<div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

						<div class="mb-24pt mb-sm-0 mr-sm-24pt">
							<h2 class="mb-0"><?php echo $text_add; ?></h2>

							<ol class="breadcrumb p-0 m-0">
								<li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard'; ?>"><?php echo $text_dashboard; ?></a></li>
								<li class="breadcrumb-item"><a href="<?php echo base_url().'packages'; ?>"><?php echo $text_title; ?></a></li>
								<li class="breadcrumb-item active">

									<?php echo $text_add; ?>

								</li>

							</ol>

						</div>
					</div>

					<div class="row"
						 role="tablist">
						<div class="col-auto">
							<button type="submit" form="form-category" data-toggle="tooltip" title="Save" class="btn btn-outline-success"><?php echo $btn_save; ?></button>
						</div>
					</div>

				</div>
			</div>

<div class="container page__container page-section">

	<div class="row mb-32pt">
		<div class="col-lg-12 d-flex align-items-center">
			<div class="flex"
				 style="max-width: 100%">

				<div class="card m-0">

					<form action="<?php echo base_url().'add-package'; ?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
						<div class="row">
						  <div class="form-group col-6">
							 <label for="package_name" class="col-sm-5 col-form-label"><?php echo $text_packagename; ?> <span class="text-danger">*</span></label>
							 <div class="col-sm-12">
							 <input type="hidden" class="form-control" id="package_plan_master_id" name="package_plan_master_id" placeholder="<?php echo $text_packagename; ?>" value="<?php echo $package_plan_master_id; ?>">

								<input type="text" class="form-control" id="package_name" name="package_name" placeholder="<?php echo $text_packagename; ?>" value="<?php echo $package_name; ?>">
							 </div>
							 <div style=" color:#FF0000;padding-left:10px"><?php echo form_error('package_name'); ?></div>
						  </div>



				<div class="form-group col-6">
					<label class="col-lg-3 col-form-label"><?php echo $text_currencies; ?></label>
					<div class="col-lg-9">
						<select class="form-control" name="currency" id="currency" required>
							 <option value=""><?php echo $text_select; ?></option>
							 <?php foreach($currencies as $currency): ?>
                                <?php if($currency->currency_id == $currency) { ?>
                                <option value="<?php echo $currency->currency_id; ?>" selected="selected">><?php echo $currency->currency_name; ?> - <?php echo $currency->currency_code; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $currency->currency_id; ?>"><?php echo $currency->currency_name; ?> - <?php echo $currency->currency_code; ?></option>
                                <?php } ?>
                               <?php endforeach; ?>
						</select>
						<div class="invalid-feedback">
							Please select a <?php echo $text_currencies; ?>.
						</div>
					</div>
				</div>
						 
						</div>

						<div class="row">
						 
						  <div class="form-group col-6">
							<label class="col-sm-12 col-form-label"><?php echo $text_price; ?> <span class="text-danger">*</span></label>
							<div class="col-sm-12">
							<input type="text" class="form-control" id="price" name="price" placeholder="<?php echo $text_price; ?>" value="<?php echo $price; ?>">
							</div>
							<div style=" color:#FF0000;padding-left:10px"><?php echo form_error('price'); ?></div>
						  </div>
						 

						  <div class="form-group col-6">
								<label class="col-lg-3 col-form-label"><?php echo $text_price_frequency; ?></label>
								<div class="col-lg-9">
									<select class="form-control" name="price_frequency" id="price_frequency" required>
										<option value=""><?php echo $text_select; ?></option>
										<?php foreach($package_frequency as $package): ?>
										
											<option data-value ="<?php echo $package->maintainance_value; ?>" value="<?php echo $package->maintainance_detail_id; ?>"><?php echo $package->maintainance_value; ?></option>
										<?php endforeach; ?>
									</select>
									<div class="invalid-feedback">
										Please select a <?php echo $text_price_frequency; ?>.
									</div>
								</div>
								
						  </div>

						</div>

						
                  </form>

				</div>

			</div>
		</div>
	</div>

</div>