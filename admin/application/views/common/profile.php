<!-- Page Wrapper -->
<div class="page-wrapper">
   <!-- Page Content -->
   <div class="content container-fluid">
      <!-- Page Header -->
	  <div class="page-header">
         <div class="row align-items-center">
            <div class="col">
               <h3 class="page-title"><?php echo $text_form; ?></h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><?php echo $text_dashboard; ?></a></li>
                  <li class="breadcrumb-item active"><?php echo $text_profile; ?></li>
               </ul>
            </div>
            <div class="col-auto float-right ml-auto">
			  <div class="pull-right">
				<a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" title="<?php echo $btn_back; ?>" class="btn btn-primary"><i class="fa fa-reply"></i></a>
              </div>
            </div>
         </div>
      </div>
      <!-- /Page Header -->
      <div class="card mb-0">
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="profile-view">
                     <div class="profile-img-wrap">
                        <div class="profile-img">
                           <a href="#"><img alt="" src="<?php echo $image; ?>"></a>
                        </div>
                     </div>
                     <div class="profile-basic">
                        <div class="row">
                           <div class="col-md-5">
                              <div class="profile-info-left">
                                 <h3 class="user-name m-t-0 mb-0"><?php echo $first_name; ?> <?php echo $last_name; ?></h3>
                                 <h6 class="text-muted"><?php echo $user_group_name; ?></h6>
                                 <div class="staff-id"><?php echo $text_empid; ?> : <?php echo $emp_id; ?></div>
                                 <div class="small doj text-muted"><?php echo $text_joining; ?> : <?php echo $joining_date; ?></div>
                                 <div class="staff-msg"><a class="btn btn-custom" href="chat.html"><?php echo $btn_send; ?></a></div>
                              </div>
                           </div>
                           <div class="col-md-7">
                              <ul class="personal-info">
                                 <li>
                                    <div class="title"><?php echo $text_mobile; ?>:</div>
                                    <div class="text"><?php echo $phone_no; ?>
                                       <?php if(!empty($alternative_number)) { ?>
                                       , <?php echo $alternative_number; ?>
                                       <?php } ?>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="title"><?php echo $text_email; ?>:</div>
                                    <div class="text"><?php echo $email; ?></div>
                                 </li>
                                 <li>
                                    <div class="title"><?php echo $text_birthday; ?>:</div>
                                    <div class="text"><?php echo $birth_date; ?></div>
                                 </li>
                                 <li>
                                    <div class="title"><?php echo $text_address; ?>:</div>
                                    <div class="text"><?php echo $address; ?><?php echo $city_name; ?><?php echo $state_name; ?><?php echo $country_name; ?><?php echo $pin; ?></div>
                                 </li>
                                 <li>
                                    <div class="title"><?php echo $text_gender; ?>:</div>
                                    <div class="text"><?php echo $gender; ?></div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- /Page Content -->
   <!-- Profile Modal -->
   <div id="profile_info" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><?php echo $text_personal; ?></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form enctype="multipart/form-data" id="user-edit-form" class="form-horizontal">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="profile-img-wrap edit-img">
                           <img class="inline-block" src="<?php echo $image; ?>" alt="user">
                           <div class="fileupload btn">
                              <span class="btn-text"><?php echo $btn_image; ?></span>
                              <input class="upload" type="file" id="profile_image" name="profile_image">
                           </div>
                        </div>
                        <?php $b64_uid = urlencode(base64_encode($user_id)); ?>
                        <input type="hidden" class="form-control" value="<?php echo $b64_uid; ?>" name="b64_uid" id="b64_uid">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><?php echo $text_first_name; ?></label>
                                 <input type="text" class="form-control" value="<?php echo $first_name; ?>" placeholder="<?php echo $text_first_name; ?>" name="first_name" id="first_name">
                              </div>
                              <div id="emp_err"></div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><?php echo $text_last_name; ?></label>
                                 <input type="text" class="form-control" value="<?php echo $last_name; ?>" placeholder="<?php echo $text_last_name; ?>" id="last_name" name="last_name">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><?php echo $text_birthday; ?></label>
                                 <input class="form-control" type="date" value="<?php echo $dob; ?>" placeholder="<?php echo $text_birthday; ?>" id="birth_date" name="birth_date">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><?php echo $text_gender; ?></label>
                                 <select class="form-control" id="gender" name="gender">
                                    <option value=""><?php echo $text_select; ?></option>
                                    <?php foreach($genders as $gender): ?>
                                    <?php if($gender->maintainance_detail_id == $gen) { ?>
                                    <option value="<?php echo $gender->maintainance_detail_id; ?>" selected="selected"><?php echo $gender->maintainance_value; ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $gender->maintainance_detail_id; ?>"><?php echo $gender->maintainance_value; ?></option>
                                    <?php } ?>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div id="gender_err"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label><?php echo $text_address; ?></label>
                           <input type="text" class="form-control" placeholder="<?php echo $text_address; ?>" value="<?php echo $address; ?>" id="address" name="address">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label><?php echo $text_country; ?></label>
                           <select class="form-control" id="country_id" name="country_id">
                              <option value=""><?php echo $text_select; ?></option>
                              <?php foreach($countries as $country): ?>
                              <?php if($country->id == $country_id) { ?>
                              <option value="<?php echo $country->id; ?>" selected="selected"><?php echo $country->name; ?></option>
                              <?php } else { ?>
                              <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                              <?php } ?>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label><?php echo $text_state; ?></label>
                           <select class="form-control" id="state_id" name="state_id" onchange="changeCity();">
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label><?php echo $text_city; ?></label>
                           <select class="form-control" id="city_id" name="city_id">
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label><?php echo $text_pin; ?></label>
                           <input type="text" class="form-control" id="pin_code" name="pin_code" maxlength="6" value="<?php echo $pin; ?>" placeholder="<?php echo $text_pin; ?>" onkeypress="return AllowOnlyNumbers(event);">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label><?php echo $text_mobile; ?></label>
                           <input type="text" class="form-control" value="<?php echo $phone_no; ?>" placeholder="<?php echo $text_mobile; ?>" name="phone_no" id="phone_no" maxlength="10" onkeypress="return AllowOnlyNumbers(event);">
                        </div>
                        <div id="phone_err"></div>
                     </div>
                  </div>
                  <div class="submit-section">
                     <input class="btn btn-primary submit-btn" name="submit" type="submit" value="<?php echo $btn_submit; ?>" />
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- /Profile Modal -->
</div>
<!-- /Page Wrapper -->
<script>
   $(window).on('load', function() {
   	var user_id = <?php echo $user_id; ?>;
   	changeCity();
   })
</script>
<script>
   function savePersonalData() {
   	var b64_uid = '<?php echo urlencode(base64_encode($user_id)); ?>';
   	var url_path = '<?php echo base_url(); ?>edit_user/' + b64_uid;
   	var passport_no = document.getElementById("passport_no").value;
   	var passport_exp_date = document.getElementById("passport_exp_date").value;
   	var tel_no = document.getElementById("tel_no").value;
   	var nationality = document.getElementById("nationality").value;
   	var religion = document.getElementById("religion").value;
   	var marital_status = document.getElementById("marital_status").value;
   	var spouse_emp = document.getElementById("spouse_emp").value;
   	var children_no = document.getElementById("children_no").value;
   	$.ajax({
   		url: '<?php echo base_url(); ?>user/user/editPersonalData',
   		method: 'POST',
   		data: {b64_uid: b64_uid, passport_no: passport_no, passport_exp_date: passport_exp_date, tel_no: tel_no, nationality: nationality, religion: religion, marital_status: marital_status, spouse_emp: spouse_emp, children_no: children_no},
   		dataType: 'json',	
   		success: function(json){
   		  if(json['success']) {
   			$("#personal_success").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['success_msg'] + '</div>').show('fast').delay(5000).hide('fast');
   			window.location = url_path;
   		  } else {
   		    if(json['err_phoneno']) {
   			  $("#tel_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_phoneno'] + '</div>').show('fast').delay(5000).hide('fast');
   			}
   		    if(json['err_nationality']) {
   			  $("#nationality_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_nationality'] + '</div>').show('fast').delay(5000).hide('fast');
   			}
   		    if(json['err_religion']) {
   			  $("#religion_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_religion'] + '</div>').show('fast').delay(5000).hide('fast');
   			}
   		    if(json['err_marital_status']) {
   			  $("#marital_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_marital_status'] + '</div>').show('fast').delay(5000).hide('fast');
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
   $("form#user-edit-form").submit(function(e) {
   	e.preventDefault();
       var b64_uid = '<?php echo urlencode(base64_encode($user_id)); ?>';
   	var url_path = '<?php echo base_url(); ?>edit-user' + '/' + b64_uid;
   	$.ajax({
   		url: '<?php echo base_url(); ?>user/user/editUserData',
   		method: 'POST',
   		data:  new FormData(this),
   		contentType: false,
   		cache: false,
   		processData:false,
   		dataType: 'json',
   		success: function(json){
   			if(json['success']) {
   				$("#add_success").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['success_msg'] + '</div>').show('fast').delay(5000).hide('fast');
   				window.location = url_path;
   			} else {
   				if(json['err_username']) {
   					$("#emp_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_username'] + '</div>').show('fast').delay(5000).hide('fast');
   				}
   				if(json['err_phoneno']) {
   					$("#phone_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_phoneno'] + '</div>').show('fast').delay(5000).hide('fast');
   				}
   				if(json['err_gender']) {
   					$("#gender_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_gender'] + '</div>').show('fast').delay(5000).hide('fast');
   				}
   				if(json['err_joining']) {
   					$("#joining_err").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_joining'] + '</div>').show('fast').delay(5000).hide('fast');
   				}
   			}				
   		},
   		error: function (xhr, ajaxOptions, thrownError) {
   			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
   		}
   	});
   });
</script>
<script>
   function changeCity() {
   	var state_id = document.getElementById("state_id").value;
   	if(state_id){
   		$.ajax({
   			type:'POST',
   			url:'<?php echo base_url(); ?>common/common/getCity',
   			data:{state_id: state_id},
   			dataType: 'json',
   			success:function(json){
   				html = '<option value=""><?php echo $text_select; ?></option>';
   
   				if (json['city'] && json['city'] != '') {
   					for (i = 0; i < json['city'].length; i++) {
   						html += '<option value="' + json['city'][i]['id'] + '">' + json['city'][i]['name'] + '</option>';
   						if (json['city'][i]['id'] == <?php echo $city_id; ?>) {
   							html += '<option value="' + json['city'][i]['id'] + '" selected="selected">' + json['city'][i]['name'] + '</option>';
   						}
   					}
   				} else {
   					html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
   				}
   				$('select[name=\'city_id\']').html(html);
   
   			},
   			error: function (xhr, ajaxOptions, thrownError) {
   				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
   			}
   		});
   	}
   }
</script>
<script type="text/javascript"><!--
   $('select[name=\'country_id\']').on('change', function() {
   	var country_id = $(this).val();
   	if(country_id){
   		$.ajax({
   			type:'POST',
   			url:'<?php echo base_url(); ?>common/common/getState',
   			data:{country_id: country_id},
   			dataType: 'json',
   			success:function(json){
   				html = '<option value=""><?php echo $text_select; ?></option>';
   
   				if (json['states'] && json['states'] != '') {
   					for (i = 0; i < json['states'].length; i++) {
   						html += '<option value="' + json['states'][i]['id'] + '">' + json['states'][i]['name'] + '</option>';
   						if (json['states'][i]['id'] == <?php echo $state_id; ?>) {
   							html += '<option value="' + json['states'][i]['id'] + '" selected="selected">' + json['states'][i]['name'] + '</option>';
   						}
   					}
   				} else {
   					html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
   				}
   
   				$('select[name=\'state_id\']').html(html);
   
   			},
   			error: function (xhr, ajaxOptions, thrownError) {
   				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
   			}
   		});
   	}
   });
   $('select[name=\'country_id\']').trigger('change');
   //-->
</script>