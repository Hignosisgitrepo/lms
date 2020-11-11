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
								<li class="breadcrumb-item"><a href="<?php echo base_url().'corporate-enquiry'; ?>">Corporates Enquiry</a></li>
								<li class="breadcrumb-item active">

									View Enquiry

								</li>

							</ol>

						</div>
					</div>

				</div>
			</div>

<div id="successModal" style="display:none"><p id="success_div"></div>
<div class="container page__container page-section">

	<div class="row mb-32pt">
		<div class="col-lg-12 d-flex align-items-center">
			<div class="flex"
				 style="max-width: 100%">

				<div class="card m-0">

					<div class="card-body">
						<form action="<?php echo base_url().'add-category'; ?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
							<div id="add_success"></div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label"><?php echo $text_first_name; ?> <span class="text-danger">*</span></label>
										<input class="form-control" type="text" id="first_name" name="first_name" placeholder="<?php echo $text_first_name; ?>" value="<?php echo $first_name; ?>" readonly >
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label"><?php echo $text_last_name; ?></label>
										<input class="form-control" type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" placeholder="<?php echo $text_last_name; ?>" readonly >
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label"><?php echo $text_workmail; ?> <span class="text-danger">*</span></label>
										<input class="form-control" type="text" id="email" name="email" value="<?php echo $email; ?>" readonly>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label"><?php echo $text_telephone; ?> <span class="text-danger">*</span></label>
										<input class="form-control" type="text" id="phone_no" name="phone_no" placeholder="<?php echo $text_telephone; ?>" value="<?php echo $phone; ?>" readonly>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label"><?php echo $text_companysize; ?> <span class="text-danger">*</span></label>
										<input class="form-control" type="text" id="companysize" name="companysize" placeholder="<?php echo $text_companysize; ?>" value="<?php echo $companysize; ?>" readonly>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-form-label"><?php echo $text_trainingneed; ?> <span class="text-danger">*</span></label>
										<textarea class="form-control" type="text" id="job_title" name="job_title" placeholder="<?php echo $text_trainingneed; ?>" readonly><?php echo $training_need; ?></textarea>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-form-label">Reject Message <span class="text-danger">*</span></label>
										<?php if($status == 0) { ?>
											<textarea class="form-control" type="text" id="reject_msg" name="reject_msg" placeholder="Reject Message"><?php echo $reject_message; ?></textarea>
										<?php } else { ?>
											<textarea class="form-control" type="text" id="reject_msg" name="reject_msg" placeholder="Reject Message" readonly><?php echo $reject_message; ?></textarea>
										<?php } ?>
									</div>
								</div>
							</div>
							<?php if($status == 0) { ?>
							  <div class="submit-section">
								<a class="btn btn-primary" onclick="addClient('<?php echo $corporate_enquiry_id; ?>');"><?php echo $btn_activate; ?></a>
								<a class="btn btn-primary" onclick="rejectClient('<?php echo $corporate_enquiry_id; ?>');">Reject</a>
							  </div>
							<?php } ?>
						</form>
						
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function addClient(corporate_enquiry_id) {
		var url_path = '<?php echo base_url(); ?>corporates';
		$.ajax({
			url: '<?php echo base_url(); ?>client/enquiries/activateCorporate',
			method: 'POST',
			data: {corporate_enquiry_id: corporate_enquiry_id},
			dataType: 'json',	
			success: function(json){
				if(json['success']) {
					$("#add_success").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['success'] + '</div>').show('fast').delay(5000).hide('fast');
					window.location = url_path;
				}			
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
</script>
<script>
	function rejectClient(corporate_enquiry_id) {
		var url_path = '<?php echo base_url(); ?>corporate-enquiry';
		var reject_msg = document.getElementById("reject_msg").value;
		$.ajax({
			url: '<?php echo base_url(); ?>client/enquiries/rejectClient',
			method: 'POST',
			data: {corporate_enquiry_id: corporate_enquiry_id, reject_msg: reject_msg},
			dataType: 'json',	
			success: function(json){
				if(json['success']) {
					$("#add_success").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['success'] + '</div>').show('fast').delay(5000).hide('fast');
					window.location = url_path;
				} else {
					$("#add_success").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_msg'] + '</div>').show('fast').delay(5000).hide('fast');
					document.getElementById("reject_msg").focus();
				}					
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
</script>