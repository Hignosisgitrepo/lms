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
            <h2 class="mb-0"><?php echo $text_list; ?></h2>
            <ol class="breadcrumb p-0 m-0">
               <li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard'; ?>"><?php echo $text_dashboard; ?></a></li>
			   <li class="breadcrumb-item"><a href="<?php echo base_url().'roles'; ?>"><?php echo $pageTitle; ?></a></li>
               <li class="breadcrumb-item active">
                  <?php echo $text_form; ?>
               </li>
            </ol>
         </div>
      </div>
      <div class="row"
         role="tablist">
         <div class="col-auto">
             <button type="submit" data-toggle="tooltip" title="Save" form="form-role" class="btn btn-outline-success"><i class="fa fa-save"></i></button>
			<a href="<?php echo base_url(); ?>roles" data-toggle="tooltip" title="Back" class="btn btn-white"><i class="fa fa-reply"></i></a>
         </div>
      </div>
   </div>
</div>
<?php
	$error = $this->session->flashdata('error');
	if($error) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?php echo $error; ?>                    
	</div>
<?php } ?>
<div class="container page__container page-section">
   <div class="row mb-32pt">
      <div class="col-lg-12 d-flex align-items-center">
         <div class="flex"
            style="max-width: 100%">
            <div class="card m-0">
               <div class="card-body">
                  <div class="card-header">
                    <?php $b64_ugid = urlencode(base64_encode($user_group_id)); ?>
					<?php if($b64_ugid != '') {  ?>
					  <form action="<?php echo base_url().'edit-roles/'.$b64_ugid; ?>" method="post" enctype="multipart/form-data" id="form-role" class="form-horizontal">
					<?php } else { ?>
					  <form action="<?php echo base_url().'add-roles'; ?>" method="post" enctype="multipart/form-data" id="form-role" class="form-horizontal">
					<?php } ?>
						<div class="row">
						  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="row">
								<label class="col-lg-3 col-form-label"><?php echo $entry_role; ?> <span class="text-danger">*</span></label>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="user_group_name" id="user_group_name" placeholder="<?php echo $entry_role; ?>" value="<?php echo $user_group_name; ?>">
								</div>
							</div>
							<br>
							<h6 class="card-title m-b-20"><?php echo $entry_module; ?></h6>
							<hr>
							<div class="m-b-30">
								<ul class="list-group notification-list">
								  <?php foreach($permissions as $permission): ?>
									<li class="list-group-item">
										<?php $replace = str_replace('_', ' ', $permission);
											  $new_string = str_replace('/(:any)', '', $replace); ?>
											  
											<?php $word = str_replace('/(:any)', '', $permission);
													$mystring = $access; ?>
										<label class="form-label mb-0"  for="<?php echo $word; ?>"><?php echo $word; ?></label>
										<div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
													<?php if(!empty($access)) { 
													  if(strpos($mystring, $word) !== false){ ?>
											<input type="checkbox" name="permission[access][]" id="<?php echo $word; ?>" class="custom-control-input" value="<?php echo $word; ?>" checked>
										  <?php } else { ?>
											<input type="checkbox" name="permission[access][]" id="<?php echo $word; ?>" class="custom-control-input" value="<?php echo $word; ?>">
										  <?php } ?>
										  <?php } else { ?>
											<input type="checkbox" name="permission[access][]" id="<?php echo $word; ?>" class="custom-control-input" value="<?php echo $word; ?>">
										  <?php } ?>
											<label class="custom-control-label" for="<?php echo $word; ?>"></label>
										</div>
									</li>
								  <?php endforeach; ?>
								</ul>
							</div>    
						  </div>
						</div>
					</form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>