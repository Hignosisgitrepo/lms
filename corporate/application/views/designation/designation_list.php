<!-- Page Wrapper -->
<div class="page-wrapper">
   <!-- Page Content -->
   <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
         <div class="row align-items-center">
            <div class="col">
               <h3 class="page-title"><?php echo $pageTitle; ?></h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><?php echo $text_dashboard; ?></a></li>
                  <li class="breadcrumb-item active"><?php echo $pageTitle; ?></li>
               </ul>
            </div>
            <div class="col-auto float-right ml-auto">
               <button onclick="createDesignation();" class="btn btn-block btn-primary" title="<?php echo $btn_add; ?>" id="addNew"><i class="fa fa-plus-square"></i></button>
            </div>
         </div>
      </div>
      <!-- /Page Header -->
	  <div class="card mb-0">
		<div class="card-body">
		  <div class="row">
			 <div class="card-body" id="newDiv" style="display:none;">
				<div class="card" style="padding:15px;">
				  <div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="card-title"><?php echo $text_add; ?></h3>
						</div>
						<div class="col-auto float-right ml-auto">
						   <button onclick="saveData();" class="btn btn-success" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
						   <button onclick="closeDiv();" class="btn btn-warning" data-toggle="tooltip" title="Close"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<hr>
					<div id="designation_err"></div>
					<div class="form-group">
					  <label for="designation_name" class="col-sm-5 col-form-label"><?php echo $entry_name; ?> <span class="text-danger">*</span></label>
					  <div class="col-sm-7">
						<input type="text" class="form-control" id="designation_name" name="designation_name" placeholder="<?php echo $entry_name; ?>" value="">
					  </div>
					</div>
				  </div>
				 </div>
			 </div>
			 <div class="col-md-12">
				<div class="table-responsive"
						 data-toggle="lists"
						 data-lists-sort-by="js-lists-values-categoryname"
						 data-lists-values='["js-lists-values-categoryname"]'>

						<div class="card-header">
							<div class="search-form">
								<input type="text"
									   class="form-control search"
									   placeholder="Search ...">
								<button class="btn"
										type="button"><i class="material-icons">search</i></button>
							</div>
						</div>

						<table class="table mb-0 thead-border-top-0 table-nowrap">
							<thead>
								<tr>
									<th>
										<a href="javascript:void(0)"
										   class="sort"
										   data-sort="js-lists-values-categoryname"><?php echo $entry_name; ?></a>
									</th>
									<th><?php echo $text_action; ?></th>
								</tr>
							</thead>
							<tbody class="list"
								   id="search">
								<?php if(!empty($desinations)) { ?>
								  <?php foreach($desinations as $res): ?>
									<tr>
										<td>

											<input type="text" class="form-control-flush" value="<?php echo $res['designation_name']; ?>" id="designation<?php echo $res['corporate_designation_id']; ?>" disabled="true"/>

										</td>
										<td>
										  <div class="btn-group mb-2">
											<button type="button" class="btn btn-dark" id="edit_btn<?php echo $res['corporate_designation_id']; ?>" onclick="editData('<?php echo $res['corporate_designation_id']; ?>');">
												Edit
											</button>
											<button type="button" class="btn btn-success" id="success_btn<?php echo $res['corporate_designation_id']; ?>" onclick="saveEditData('<?php echo $res['corporate_designation_id']; ?>');" disabled="true">
												Save
											</button>
										  </div>
										</td>
									</tr>
									<tr id="designation_err<?php echo $res['corporate_designation_id']; ?>" style="display:none"><td colspan="2" id="designation_msg<?php echo $res['corporate_designation_id']; ?>"></td></tr>
								  <?php endforeach; ?>
								<?php } else { ?>
								  <tr><td colspan="7"><?php echo $text_no_data; ?></td></tr>
								<?php } ?>

							</tbody>
						</table>
					</div>
			 </div>
		  </div>
		</div>
	  </div>
   </div>
   <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
<script>
	function editData(corporate_designation_id) {
		document.getElementById("addNew").disabled = true;
		document.getElementById("designation"+corporate_designation_id).disabled = false;
		document.getElementById("designation"+corporate_designation_id).focus();
		document.getElementById("success_btn"+corporate_designation_id).disabled = false;
		document.getElementById("edit_btn"+corporate_designation_id).disabled = true;
	}
	function createDesignation() {
		document.getElementById("newDiv").style.display = "block";
		document.getElementById("addNew").disabled = true;
		document.getElementById("designation_name").focus();
	}
	function closeDiv() {
		if (confirm("<?php echo $text_change_status; ?>")) {
			document.getElementById("newDiv").style.display = "none";
			document.getElementById("addNew").disabled = false;
		} else {
			return false;
		}
	}
	function saveData() {
		var designation_name = document.getElementById("designation_name").value;
		var url_path = '<?php echo base_url(); ?>designations';
		$.ajax({
			url: '<?php echo base_url(); ?>designation/designation/addDesignation',
			method: 'POST',
			data: {designation_name: designation_name},
			dataType: 'json',	
			success: function(json){
				if(json['msg']) {
					$("#designation_err").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['msg'] + '</div>').show('fast').delay(5000).hide('fast');
					window.location = url_path;
				} else {
					if(json['err_designation']) {
						$("#designation_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_designation'] + '</div>').show('fast').delay(5000).hide('fast');
						document.getElementById("designation_name").focus();
					}
				}						
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
	function saveEditData(corporate_designation_id) {
		var designation_name = document.getElementById("designation"+corporate_designation_id).value;
		var url_path = '<?php echo base_url(); ?>designations';
		$.ajax({
			url: '<?php echo base_url(); ?>designation/designation/editDesignation',
			method: 'POST',
			data: {designation_name: designation_name, corporate_designation_id: corporate_designation_id},
			dataType: 'json',	
			success: function(json){
				if(json['msg']) {
					$("#designation_err").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['msg'] + '</div>').show('fast').delay(5000).hide('fast');
					window.location = url_path;
				} else {
					if(json['err_designation']) {
						document.getElementById("designation_err"+corporate_designation_id).style.display = "block";
						$("#designation_msg"+corporate_designation_id).html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_designation'] + '</div>').show('fast').delay(5000).hide('fast');
						document.getElementById("designation_name").focus();
					}
				}						
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
</script>