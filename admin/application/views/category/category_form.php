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

					<form action="<?php echo base_url().'add-category'; ?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
						<div class="row">
						  <div class="form-group col-6">
							 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $text_categoryname; ?> <span class="text-danger">*</span></label>
							 <div class="col-sm-12">
							 <input type="hidden" class="form-control" id="category_id" name="category_id" placeholder="<?php echo $text_categoryname; ?>" value="<?php echo $category_id; ?>">

								<input type="text" class="form-control" id="category_name" name="category_name" placeholder="<?php echo $text_categoryname; ?>" value="<?php echo $category_name; ?>">
							 </div>
							 <div style=" color:#FF0000;padding-left:10px"><?php echo form_error('category_name'); ?></div>
						  </div>
						  <div class="form-group col-6">
							 <label for="inputName2" class="col-sm-12 col-form-label"><?php echo $text_status; ?></label>
							 <div class="col-sm-12">
								<select class="form-control" name="status" id="status">
									<?php if($status == 1) { ?>
										<option value="1" selected="selected"><?php echo $btn_activate; ?></option>
										<option value="0"><?php echo $btn_deactivate; ?></option>
									<?php } else { ?>
										<option value="1"><?php echo $btn_activate; ?></option>
										<option value="0" selected="selected"><?php echo $btn_deactivate; ?></option>
									<?php } ?>
								</select>
							 </div>
						  </div>
						</div>
						<div class="row">
						  <div class="form-group col-6">
							<label class="col-sm-12 col-form-label"><?php echo $text_description; ?> <span class="text-danger">*</span></label>
							<div class="col-sm-12">
							  <textarea class="form-control" type="text" name="description" id="description"><?php echo $description; ?></textarea>
							</div>
							<div style=" color:#FF0000;padding-left:10px"><?php echo form_error('description'); ?></div>
						  </div>
						  <div class="form-group col-6">
							<label class="col-sm-2 col-form-label"><?php echo $text_image; ?></label>
							<div class="col-sm-12">
								<div class="col-xs-7">
									<input type="file" class="form-control" name="category_image" id="category_image">
								</div>
								<div class="col-xs-2">
									<div class="img-thumbnail float-right"><img src="<?php echo $image; ?>" alt="" width="40" height="40"></div>
								</div>
							 </div>
						  </div>
						</div>
						<div class="row">
						  <!--<div class="form-group col-6">
							<label class="col-sm-12 col-form-label"><?php echo $text_parent; ?></label>
							<div class="col-sm-12">
							  <input class="form-control" type="text" name="parent_id" id="parent_id" value="<?php echo $parent_id; ?>" />
							</div>
						  </div>-->
						  <div class="form-group col-6">
							<label class="col-sm-12 col-form-label"><?php echo $text_top; ?></label>
							<div class="col-sm-12">
								<?php if($top == 1) { ?>
									<input type="checkbox" name="top" id="top" value="1" checked />
								<?php } else { ?>
									<input type="checkbox" name="top" id="top" value="1" />
								<?php } ?>
							 </div>
						  </div>
						</div>
                  </form>

				</div>

			</div>
		</div>
	</div>

</div>