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
            <h2 class="mb-0"><?php if($user_id != 0) {
					echo $text_edit; 
				} else {
					echo $text_add; 
				}
				?></h2>

			<ol class="breadcrumb p-0 m-0">
			   <li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard'; ?>"><?php echo $text_dashboard; ?></a></li>
			   <li class="breadcrumb-item"><a href="<?php echo base_url().'users'; ?>"><?php echo $pageTitle; ?></a></li>
			   <li class="breadcrumb-item active">
				  <?php echo $text_form; ?>
			   </li>

			</ol>
         </div>
      </div>
      <div class="row"
         role="tablist">
         <div class="col-auto">
            <?php if($user_id == 0) { ?>
				<a data-toggle="tooltip" title="Save" class="btn btn-outline-success" name="submit" id="user-form" onclick="addUser();"><i class="fa fa-save"></i></a>
			<?php } else { ?>
				<a data-toggle="tooltip" title="Save" class="btn btn-outline-success" name="submit" id="user-form" onclick="editUser('<?php echo $user_id; ?>');"><i class="fa fa-save"></i></a>
			<?php } ?>
			<a href="<?php echo base_url(); ?>users" data-toggle="tooltip" title="Back" class="btn btn-white"><i class="fa fa-reply"></i></a>
         </div>
      </div>
   </div>
</div>
<div id="successModal" style="display:none">
   <p id="success_div">
</div>
<div class="container page__container page-section">
   <div class="row mb-32pt">
      <div class="col-lg-12 d-flex align-items-center">
         <div class="flex"
            style="max-width: 100%">
            <div class="card m-0">
               <div class="card-body">
                  <div class="card-header">
                     <p id="demo"></p>
                     <div id="add_success"></div>
                     <form enctype="multipart/form-data" id="user-form" class="form-horizontal">
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="col-form-label"><?php echo $text_first_name; ?> <span class="text-danger">*</span></label>
                                 <input class="form-control" type="text" id="first_name" name="first_name" placeholder="<?php echo $text_first_name; ?>" value="<?php echo $first_name; ?>">
                              </div>
                              <div id="emp_err"></div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="col-form-label"><?php echo $text_last_name; ?></label>
                                 <input class="form-control" type="text" id="last_name" name="last_name" placeholder="<?php echo $text_last_name; ?>" value="<?php echo $last_name; ?>">
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="col-form-label"><?php echo $text_email; ?> <span class="text-danger">*</span></label>
								 <?php if($user_id == 0) { ?>
                                   <input class="form-control" type="email" id="email_id" name="email_id" placeholder="<?php echo $text_email; ?>" value="<?php echo $email; ?>">
								 <?php } else { ?>
									<input class="form-control" type="email" id="email_id" name="email_id" placeholder="<?php echo $text_email; ?>" value="<?php echo $email; ?>" readonly />
								 <?php } ?>
                              </div>
                              <div id="email_err"></div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="col-form-label"><?php echo $text_mobile; ?> <span class="text-danger">*</span></label>
                                 <input class="form-control" type="text" id="phone_no" name="phone_no" placeholder="<?php echo $text_mobile; ?>" value="<?php echo $phone_no; ?>">
                              </div>
                              <div id="phone_err"></div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><?php echo $text_user_group; ?> <span class="text-danger">*</span></label>
                                 <select class="form-control" id="usergroup_id" name="usergroup_id">
                                    <option value=""><?php echo $text_select; ?></option>
                                    <?php foreach($user_groups as $group): ?>
									  <?php if($group->user_group_id == $user_group_id) { ?>
										<option value="<?php echo $group->user_group_id; ?>" selected="selected"><?php echo $group->user_group_name; ?></option>
									  <?php } else { ?>
									    <option value="<?php echo $group->user_group_id; ?>"><?php echo $group->user_group_name; ?></option>
									  <?php } ?>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div id="usergroup_err"></div>
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
	function addUser() {
		var first_name = document.getElementById("first_name").value;
		var last_name = document.getElementById("last_name").value;
		var email_id = document.getElementById("email_id").value;
		var phone_no = document.getElementById("phone_no").value;
		var usergroup_id = document.getElementById("usergroup_id").value;
		var url_path = '<?php echo base_url(); ?>users';
		$.ajax({
			url: '<?php echo base_url(); ?>user/user/addUser',
			method: 'POST',
			data: {first_name: first_name, last_name: last_name, email_id: email_id, phone_no: phone_no, usergroup_id: usergroup_id},
			dataType: 'json',	
			success: function(json){
				if(json['success']) {
					window.location = url_path;
				} else {
					if(json['err_employeename']) {
						$("#emp_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_employeename'] + '</div>').show('fast').delay(5000).hide('fast');
					}
					if(json['err_emailid']) {
						$("#email_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_emailid'] + '</div>').show('fast').delay(5000).hide('fast');
					}
					if(json['err_phoneno']) {
						$("#phone_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_phoneno'] + '</div>').show('fast').delay(5000).hide('fast');
					}
					if(json['err_usergroup']) {
						$("#usergroup_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_usergroup'] + '</div>').show('fast').delay(5000).hide('fast');
					}
				}					
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
</script>
<script>
	function editUser(user_id) {
		var first_name = document.getElementById("first_name").value;
		var last_name = document.getElementById("last_name").value;
		var email_id = document.getElementById("email_id").value;
		var phone_no = document.getElementById("phone_no").value;
		var usergroup_id = document.getElementById("usergroup_id").value;
		var url_path = '<?php echo base_url(); ?>users';
		$.ajax({
			url: '<?php echo base_url(); ?>user/user/editUser',
			method: 'POST',
			data: {user_id: user_id, first_name: first_name, last_name: last_name, email_id: email_id, phone_no: phone_no, usergroup_id: usergroup_id},
			dataType: 'json',	
			success: function(json){
				if(json['success']) {
					window.location = url_path;
				} else {
					if(json['err_firstname']) {
						$("#emp_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_firstname'] + '</div>').show('fast').delay(5000).hide('fast');
					}
					if(json['err_emailid']) {
						$("#email_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_emailid'] + '</div>').show('fast').delay(5000).hide('fast');
					}
					if(json['err_phoneno']) {
						$("#phone_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_phoneno'] + '</div>').show('fast').delay(5000).hide('fast');
					}
					if(json['err_usergroup']) {
						$("#usergroup_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_usergroup'] + '</div>').show('fast').delay(5000).hide('fast');
					}
				}					
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
</script>