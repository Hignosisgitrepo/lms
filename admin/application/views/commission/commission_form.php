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
								<li class="breadcrumb-item"><a href="<?php echo base_url().'categories'; ?>"><?php echo $text_title; ?></a></li>
								<li class="breadcrumb-item active">

									<?php echo $text_add; ?>

								</li>

							</ol>

						</div>
					</div>

					<div class="row"
						 role="tablist">
						<div class="col-auto">
                        <?php $b64_cid = urlencode(base64_encode($trainer_id)); ?>
							<button type="submit" form="form-commission" data-toggle="tooltip" title="Save" class="btn btn-success"><i class="fa fa-save"></i></button>
							<a href="<?php echo base_url().'commission/'.$b64_cid; ?>" data-toggle="tooltip" title="Back" class="btn btn-white"><i class="fa fa-reply"></i></a>
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
                <?php $b64_cid = urlencode(base64_encode($trainer_id)); ?>
					<form action="<?php echo base_url().'add-commission/'.$b64_cid; ?>" method="post" enctype="multipart/form-data" id="form-commission" class="form-horizontal">
                    <input type="hidden" id="commission_id" name="commission_id" value="<?php echo $commission_id; ?>">
                    <div class="row">
						  <div class="form-group col-6">
							 <label for="platform_commission" class="col-sm-5 col-form-label"><?php echo $text_platform_commission; ?></label>
							 <div class="col-sm-12">
								<input type="text" class="form-control" id="platform_commission" name="platform_commission" placeholder="<?php echo $text_platform_commission; ?>" value="<?php echo $platform_commission; ?>">
							 </div>
							
						  </div>
						  <div class="form-group col-6">
							 <label for="date" class="col-sm-12 col-form-label"><?php echo $text_commission_start_date; ?></label>
							 <div class="col-sm-12">
                             <input type="date" class="form-control" id="commission_start_date" name="commission_start_date" placeholder="<?php echo $text_commission_start_date; ?>" value="<?php echo $commission_start_date; ?>">
							 </div>
						  </div>
						</div>
						
						
                  </form>

				</div>

			</div>
		</div>
	</div>

</div>