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
				<li class="breadcrumb-item"><a href="<?php echo base_url().'corporates'; ?>"><?php echo $pageTitle; ?></a></li>
				<li class="breadcrumb-item active">

					<?php echo $text_add; ?>

				</li>
            </ol>
         </div>
      </div>
      <div class="row"
         role="tablist">
         <div class="col-auto">
            <a data-toggle="tooltip" title="Save" class="btn btn-outline-success" onclick="addClient();"><i class="fa fa-save"></i></a>
			<a href="<?php echo base_url(); ?>corporates" data-toggle="tooltip" title="Back" class="btn btn-white"><i class="fa fa-reply"></i></a>
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
               <div class="card-body">
                  <div class="card-header">
                     <form method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
						<div id="success"></div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label"><?php echo $text_client_name; ?> <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="client_name" id="client_name">
							</div>
							<div id="client_err"></div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label"><?php echo $text_contact_person; ?> <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="contact_name" id="contact_name">
							</div>
							<div id="contact_err"></div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label"><?php echo $text_email; ?> <span class="text-danger">*</span></label>
								<input class="form-control floating" type="email" name="email_id" id="email_id">
							</div>
							<div id="email_err"></div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label"><?php echo $text_telephone; ?> <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="telephone" id="telephone">
							</div>
							<div id="telephone_err"></div>
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
<script>
	function addClient() {
		var url_path = '<?php echo base_url(); ?>corporates';
		var client_name = document.getElementById("client_name").value;
		var contact_name = document.getElementById("contact_name").value;
		var email_id = document.getElementById("email_id").value;
		var telephone = document.getElementById("telephone").value;
		$.ajax({
			url: '<?php echo base_url(); ?>client/client/addClient',
			method: 'POST',
			data: {client_name: client_name, contact_name: contact_name, email_id: email_id, telephone: telephone},
			dataType: 'json',	
			success: function(json){
				if(json['success']) {
					$("#success").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['success'] + '</div>').show('fast').delay(5000).hide('fast');
					window.location = url_path;
				} else {
					if(json['err_client']) {
						$("#client_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_client'] + '</div>').show('fast').delay(5000).hide('fast');
					}
					if(json['err_contact']) {
						$("#contact_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_contact'] + '</div>').show('fast').delay(5000).hide('fast');
					}
					if(json['err_email']) {
						$("#email_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_email'] + '</div>').show('fast').delay(5000).hide('fast');
					}
					if(json['err_telephone']) {
						$("#telephone_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_telephone'] + '</div>').show('fast').delay(5000).hide('fast');
					}
				}					
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
</script>