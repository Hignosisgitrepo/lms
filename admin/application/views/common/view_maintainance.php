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
							<h2 class="mb-0"><?php echo $text_title; ?></h2>

							<ol class="breadcrumb p-0 m-0">
							  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><?php echo $text_dashboard; ?></a></li>
							  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>maintainance"><?php echo $text_title; ?></a></li>
							  <li class="breadcrumb-item active"><?php echo $text_form; ?></li>

							</ol>

						</div>
					</div>

					<div class="row"
						 role="tablist">
						<div class="col-auto">
							<a href="<?php echo base_url(); ?>maintainance" data-toggle="tooltip" title="<?php echo $btn_back; ?>" class="btn btn-outline-secondary"><i class="fa fa-reply"></i></a>
						</div>
					</div>

				</div>
			</div>
			<div id="err_add"></div>
<div class="container page__container page-section">

	<div class="row mb-32pt">
		<div class="col-lg-12 d-flex align-items-center">
			<div class="flex"
				 style="max-width: 100%">

				<div class="card m-0">

					<div class="card-body">
						<?php $b64_mid = urlencode(base64_encode($maintainance_id)); ?>
                     <div class="form-group row">
                        <label for="maintainance_name" class="col-sm-2 col-form-label"><?php echo $entry_name; ?></label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="maintainance_name" name="maintainance_name" placeholder="<?php echo $entry_name; ?>" value="<?php echo $maintainance_name; ?>" />
                        </div>
                     </div>
                     <div style=" color:#FF0000;"><?php echo form_error('maintainance_name'); ?></div>
                     <div class="table-responsive">
                        <table id="maintainance" class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <td class="text-left"><?php echo $entry_value; ?></td>
                                 <td></td>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach($details as $detail): ?>
							 <tr>
								<td class="text-left">
								   <div class="input-group">
									  <input type="text" id="maintainance_value<?php echo $detail->maintainance_detail_id; ?>" name="maintainance_value" placeholder="<?php echo $entry_value; ?>" class="form-control" value="<?php echo $detail->maintainance_value; ?>" disabled />
								   </div>
								</td>
								<td class="text-right"><a title="Edit" class="btn btn-info" onclick="editMaintainance('<?php echo $detail->maintainance_detail_id; ?>');"><i class="fa fa-edit"></i></a>
								<button type="button" title="Save" id="save_btn<?php echo $detail->maintainance_detail_id; ?>" class="btn btn-primary" onclick="saveMaintainance('<?php echo $detail->maintainance_detail_id; ?>');" disabled><i class="fa fa-save"></i></button>
								</td>
							 </tr>
							 <tr style="display:none"><td id="err<?php echo $detail->maintainance_detail_id; ?>" colspan="3"></td></tr>
							 <?php endforeach; ?>
						  </tbody>
						  <tfoot>
							 <tr>
								<td colspan="2"></td>
								<td class="text-right"><button type="button" id="newBtn" onclick="addMaintainance();" title="<?php echo $btn_add; ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i></button></td>
							 </tr>
						  </tfoot>
					   </table>
                     </div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript"><!--
   var maintainance_row = 0;
   
   function addMaintainance() {
    html = '<tr id="maintainance-row' + maintainance_row + '">';
    html += '<td class="text-left"><div class="input-group"><input type="text" name="maintainance_detail[' + maintainance_row + '][maintainance_value]" placeholder="<?php echo $entry_value; ?>" class="form-control" id="newmaint_value"/></div></td>';
    html += '<td class="text-right"><button type="button" onclick="deleteNew(\''+ maintainance_row +'\');" data-toggle="tooltip" title="<?php echo $btn_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button><button type="button" onclick="saveNew(\''+ maintainance_row +'\');" data-toggle="tooltip" title="<?php echo $btn_remove; ?>" class="btn btn-success"><i class="fa fa-save"></i></button></td>';
    html += '</tr>';
    $('#maintainance tbody').append(html);
	
    document.getElementById("newBtn").disabled = true;
    
   }
</script>
<script>
	function saveNew(maintainance_row) {
		var b64_mid = '<?php echo urlencode(base64_encode($maintainance_id)); ?>';
		var url_path = '<?php echo base_url(); ?>view_maintainance/' + b64_mid;
		var maintainance_value = document.getElementById("newmaint_value").value;
		$.ajax({
			url: '<?php echo base_url(); ?>common/maintainance/saveMaintainance',
			method: 'POST',
			data: {b64_mid: b64_mid, maintainance_value: maintainance_value},
			dataType: 'json',	
			success: function(json){
				if(json['success']) {
					$("#err_add").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['success'] + '</div>').show('fast').delay(5000).hide('fast');
					window.location = url_path;
				} else {
					if(json['err_empty']) {
						$("#err_add").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_empty'] + '</div>').show('fast').delay(5000).hide('fast');
					}
				}
				//window.location = 'index.php?route=common/test/success&quiz_id='+ quiz_customer_id;						
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
</script>
<script>
	function deleteNew(maintainance_row) {
		$('#maintainance-row'+ maintainance_row).remove();
		document.getElementById("newBtn").disabled = false;
	}
</script>
<script>
	function editMaintainance(maintainance_detail_id) {
		document.getElementById("maintainance_value"+maintainance_detail_id).disabled = false;
		document.getElementById("save_btn"+maintainance_detail_id).disabled = false;
	}
</script>
<script>
	function saveMaintainance(maintainance_detail_id) {
		var maintainance_id = '<?php echo urlencode(base64_encode($maintainance_id)); ?>';
		var url_path = '<?php echo base_url(); ?>view_maintainance/'+ maintainance_id;
		var maintainance_value = document.getElementById("maintainance_value"+maintainance_detail_id).value;
		$.ajax({
			url: '<?php echo base_url(); ?>common/maintainance/editMaintainance',
			method: 'POST',
			data: {maintainance_detail_id: maintainance_detail_id, maintainance_value: maintainance_value},
			dataType: 'json',	
			success: function(json){
				if(json['success']) {
					$("#err"+maintainance_detail_id).html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['success'] + '</div>').show('fast').delay(5000).hide('fast');
					window.location = url_path;
				} else {
					if(json['err_empty']) {
						$("#err"+maintainance_detail_id).html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_empty'] + '</div>').show('fast').delay(5000).hide('fast');
					}
				}
				//window.location = 'index.php?route=common/test/success&quiz_id='+ quiz_customer_id;						
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
		
	}
</script>