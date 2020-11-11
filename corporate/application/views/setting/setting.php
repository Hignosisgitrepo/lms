<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<style>
	.circle{
		width: 100px;
		height: 100px;
		border-radius: 50%;
		overflow: hidden;
		display: inline-block;
		position: relative;
		border:1px solid #ccc;
	}
	.circle img{ 
		width: 100%; 
		height: 100%; 
		border-radius: 50%;
	}
	.circle .change-img{
		position: absolute;
		width: 100%;
		height: 100%;
		left: 0;
		top: 0;
		background: rgba(0,0,0,0.6);
		line-height: 95px;
		color: #fff;
		transition: all 0.3s;
		text-align: center;
		transform: scale(0);
	}
	.circle:hover .change-img{ 
		transform: scale(1); 
	}
	.p-image{ 
		display: none;
	}
	.profile_view{
		height: 110px;
		width: 110px;
		overflow: hidden;
		position: relative;
	}
	.profile_view img{
		width: 100%;
			border-radius: 50%;
		border: 1px solid #c1c1c1;
	}
	/*.file_upload{
		position: absolute;
		z-index: 1;
		top: 38px;
		right: -316px;
	}*/
	.profile_view input[type=file]
	{
		opacity: 0;
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		width: 100px;
		height: 100px;
		display: inline-block;
		z-index: 100;
		cursor: pointer;
	}
	.upload-tag
	{
		position: absolute;
		right: 0;
		bottom: 50%;
		z-index: 1;
		color: #000
	}
	#imageUpload_input{
		opacity: 1;
	}
</style>
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
			
				<!-- Page Header -->
			  <div class="page-header">
				 <div class="row align-items-center">
					<div class="col">
					   <h3 class="page-title"><?php echo $text_setting; ?></h3>
					   <ul class="breadcrumb">
						  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><?php echo $text_dashboard; ?></a></li>
						  <li class="breadcrumb-item active"><?php echo $text_setting; ?></li>
					   </ul>
					</div>
					<div class="col-auto float-right ml-auto">
					 <div class="pull-right">
					    <button type="submit" form="form-setting" data-toggle="tooltip" title="Save" class="btn btn-outline-success"><i class="fa fa-save"></i></button>
					 </div>
					</div>
				 </div>
			  </div>
			  <!-- /Page Header -->
				<div class="card">
                  <form action="<?php echo base_url().'save-setting'; ?>" method="post" enctype="multipart/form-data" id="form-setting" class="form-horizontal">
                     <div class="card-body">
                        <div class="col-12">
						  <div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title"><?php echo $tab_general; ?></h3>
							</div>
							<div class="row">
                              <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_company; ?> <span class="text-danger">*</span></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="config_company_name" name="config_company_name" placeholder="<?php echo $entry_company; ?>" value="<?php echo $config_company_name; ?>">
                                 </div>
								 <div style=" color:#FF0000;padding-left:10px"><?php echo form_error('config_company_name'); ?></div>
                              </div>
                              <div class="form-group col-6">
                                 <label for="inputName2" class="col-sm-5 col-form-label"><?php echo $entry_language; ?><span class="text-danger">*</span></label>
                                 <div class="col-sm-12">
									<select class="form-control" name="config_language" id="language">
									  <option value=""><?php echo $text_select; ?></option>
									  <?php foreach($languages as $value): ?>
										<?php if($value->language_id == $config_language) { ?>
											<option value="<?php echo $value->language_id; ?>" selected="selected"><?php echo $value->language_name; ?></option>
										<?php } else { ?>
											<option value="<?php echo $value->language_id; ?>"><?php echo $value->language_name; ?></option>
										<?php } ?>
									  <?php endforeach; ?>
									</select>
                                 </div>
								 <div style=" color:#FF0000;padding-left:10px"><?php echo form_error('config_language'); ?></div>
                              </div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="col-sm-2 col-form-label"><?php echo $entry_address; ?></label>
										<div class="col-sm-12">
										  <input class="form-control " value="<?php echo $config_address; ?>" type="text" name="config_address" id="config_address">
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-3">
									<div class="form-group">
										<label class="col-sm-12 col-form-label"><?php echo $entry_country; ?></label>
										<div class="col-sm-12">
										  <select class="form-control" name="config_country" id="config_country">
											<option value=""><?php echo $text_select; ?></option>
											<?php foreach($countries as $country): ?>
												<?php if($country->id == $config_country) { ?>
												  <option value="<?php echo $country->id; ?>" selected="selected"><?php echo $country->name; ?></option>
												<?php } else { ?>
												  <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
												<?php } ?>
											<?php endforeach; ?>
										  </select>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-3">
									<div class="form-group">
										<label class="col-sm-12 col-form-label"><?php echo $entry_state; ?></label>
										<div class="col-sm-12">
										  <select class="form-control" name="config_state" id="config_state" onchange="changeCity();">
										  </select>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-3">
									<div class="form-group">
										<label class="col-sm-12 col-form-label"><?php echo $entry_city; ?></label>
										<div class="col-sm-12">  
										  <select class="form-control" name="config_city" id="config_city">
										  </select>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-3">
									<div class="form-group">
										<label class="col-sm-12 col-form-label"><?php echo $entry_pin; ?></label>
										<div class="col-sm-12">
										  <input class="form-control" value="<?php echo $config_pin; ?>" type="text" name="config_pin" id="config_pin">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title"><?php echo $text_localization; ?></h3>
							</div>
						   <div class="row">
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_date_format; ?></label>
                                 <div class="col-sm-12">
                                    <select class="form-control" name="config_date_format" id="config_date_format">
										<option value=""><?php echo $text_select; ?></option>
										<?php foreach($date_formats as $key => $value): ?>
											<?php if($value == $config_date_format) { ?>
											  <option value="<?php echo $value; ?>" selected="selected"><?php echo date($value); ?></option>
											<?php } else { ?>
											  <option value="<?php echo $value; ?>"><?php echo date($value); ?></option>
											<?php } ?>
										<?php endforeach; ?>
									</select>
                                 </div>
                              </div>
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_timezone; ?></label>
								 <?php
									function tz_list() {
									  $zones_array = array();
									  $timestamp = time();
									  foreach(timezone_identifiers_list() as $key => $zone) {
										date_default_timezone_set($zone);
										$zones_array[$key]['zone'] = $zone;
										$zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
									  }
									  return $zones_array;
									}
								?>
                                 <div class="col-sm-12">
                                    <select class="form-control" name="config_timezone" id="config_timezone">
										<option value=""><?php echo $text_select; ?></option>
										<?php foreach(tz_list() as $time): ?>
											<?php if($time['zone'] == $config_timezone) { ?>
											  <option value="<?php echo $time['zone']; ?>" selected="selected"><?php echo $time['diff_from_GMT'] . ' - ' . $time['zone'] ?></option>
											<?php } else { ?>
											  <option value="<?php echo $time['zone']; ?>"><?php echo $time['diff_from_GMT'] . ' - ' . $time['zone'] ?></option>
											<?php } ?>
										<?php endforeach; ?>
									</select>
                                 </div>
                              </div>
						   </div>
						   <div class="row">
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_currency_code; ?></label>
                                 <div class="col-sm-12">
                                    <select class="form-control" name="config_currency" id="config_currency" onchange="changeCurrency();">
										<option value=""><?php echo $text_select; ?></option>
										<?php foreach($currencies as $currency): ?>
											<?php if($currency->currency_id == $config_currency) { ?>
											  <option value="<?php echo $currency->currency_id; ?>" selected="selected"><?php echo $currency->currency_name; ?></option>
											<?php } else { ?>
											  <option value="<?php echo $currency->currency_id; ?>"><?php echo $currency->currency_name; ?></option>
											<?php } ?>
										<?php endforeach; ?>
									</select>
                                 </div>
                              </div>
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_currency_symbol; ?></label>
                                 <div class="col-sm-12">
                                    <input class="form-control" readonly  type="text" name="currency_symbol" id="currency_symbol">
                                 </div>
                              </div>
                           </div>
						</div>
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title"><?php echo $tab_help; ?></h3>
							</div>
						   <div class="row">
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_help_line; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="help_line" name="config_help_line" placeholder="<?php echo $entry_help_line; ?>" value="<?php echo $config_help_line; ?>">
                                 </div>
                              </div>
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_timings; ?></label>
                                 <div class="col-sm-12">
                                    <textarea name="config_timings" id="timings" class="form-control" placeholder="<?php echo $entry_timings; ?>"><?php echo $config_timings; ?></textarea>
                                 </div>
                              </div>
						   </div>
						   <div class="row">
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_contact_name; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="contact_name" name="config_contact_name" placeholder="<?php echo $entry_contact_name; ?>" value="<?php echo $config_contact_name; ?>">
                                 </div>
                              </div>
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_contact_email; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="contact_email" name="config_contact_email" placeholder="<?php echo $entry_contact_email; ?>" value="<?php echo $config_contact_email; ?>">
                                 </div>
                              </div>
                           </div>
						</div>
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title"><?php echo $tab_image; ?></h3>
							</div>
                           <div class="row">
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_logo; ?></label>
                                 <div class="col-sm-12">
                                    <div class="col-xs-7">
										<input type="file" class="form-control" name="config_logo" id="config_logo">
										<span class="form-text text-muted">Recommended image size is 100px x 100px</span>
									</div>
									<div class="col-xs-2">
										<div class="img-thumbnail float-right"><img src="<?php echo $config_logo; ?>" alt="" width="40" height="40"></div>
									</div>
                                 </div>
                              </div>
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_icon; ?></label>
                                 
                                 <div class="col-sm-12">
                                    <div class="col-xs-7">
										<input type="file" class="form-control" name="config_icon" id="config_icon">
										<span class="form-text text-muted">Recommended image size is 40px x 40px</span>
									</div>
									<div class="col-xs-2">
										<div class="img-thumbnail float-right"><img src="<?php echo $config_icon; ?>" alt="" width="40" height="40"></div>
									</div>
                                 </div>
                              </div>
						   </div>
						   <div class="row">
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_logo_height; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="logo_height" name="config_logo_height" placeholder="<?php echo $entry_logo_height; ?>" value="<?php echo $config_logo_height; ?>">
                                 </div>
                              </div>
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_logo_witdh; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="logo_witdh" name="config_logo_witdh" placeholder="<?php echo $entry_logo_witdh; ?>" value="<?php echo $config_logo_witdh; ?>">
                                 </div>
                              </div>
                           </div>
						</div>
						<div class="card card-primary" id="tab_mail">
							<div class="card-header">
								<h3 class="card-title"><?php echo $tab_mail; ?></h3>
							</div>
                           <div class="row">
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_mail_engine; ?></label>
                                 <div class="col-sm-12">
                                    <select class="form-control" name="config_mail_engine" id="mail_engine">
									  <option value=""><?php echo $text_select; ?></option>
									  <?php foreach($mail_engines as $value): ?>
									    <?php if($value->maintainance_value == $config_mail_engine) { ?>
											<option value="<?php echo $value->maintainance_value; ?>" selected="selected"><?php echo $value->maintainance_value; ?></option>
										<?php } else { ?>
											<option value="<?php echo $value->maintainance_value; ?>"><?php echo $value->maintainance_value; ?></option>
										<?php } ?>
									  <?php endforeach; ?>
									</select>
                                 </div>
                              </div>
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_mail_parameters; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="mail_parameters" name="config_mail_parameters" placeholder="<?php echo $entry_mail_parameters; ?>" value="<?php echo $config_mail_parameters; ?>">
                                 </div>
                              </div>
							</div>
							<div class="row">
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_host; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="smtp_host_name" name="config_smtp_host_name" placeholder="<?php echo $entry_host; ?>" value="<?php echo $config_smtp_host_name; ?>">
                                 </div>
                              </div>
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_username; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="smtp_username" name="config_smtp_username" placeholder="<?php echo $entry_username; ?>" value="<?php echo $config_smtp_username; ?>">
                                 </div>
                              </div>
							</div>
							<div class="row">
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_password; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="smtp_password" name="config_smtp_password" placeholder="<?php echo $entry_password; ?>" value="<?php echo $config_smtp_password; ?>">
                                 </div>
                              </div>
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_port; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="smtp_port" name="config_smtp_port" placeholder="<?php echo $entry_port; ?>" value="<?php echo $config_smtp_port; ?>">
                                 </div>
                              </div>
							</div>
							<div class="row">
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_timeout; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="smtp_timeout" name="config_smtp_timeout" placeholder="<?php echo $entry_timeout; ?>" value="<?php echo $config_smtp_timeout; ?>">
                                 </div>
                              </div>
                           </div>
						</div>
						<div class="card card-primary" id="tab_sms">
							<div class="card-header">
								<h3 class="card-title"><?php echo $tab_sms; ?></h3>
							</div>
                           <div class="row">
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_sender_id; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="sender_id" name="config_sender_id" placeholder="<?php echo $entry_sender_id; ?>" value="<?php echo $config_sender_id; ?>">
                                 </div>
                              </div>
							  <div class="form-group col-6">
                                 <label for="project_name" class="col-sm-5 col-form-label"><?php echo $entry_sender_api; ?></label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control" id="sender_api" name="config_sender_api" placeholder="<?php echo $entry_sender_api; ?>" value="<?php echo $config_sender_api; ?>">
                                 </div>
                              </div>
						   </div>
						</div>
						<!--<div class="card card-primary" id="tab_captcha" style="display:none;">
							<div class="card-header">
								<h3 class="card-title"><?php echo $tab_captcha; ?></h3>
							</div>
                           <div class="form-group">
							 <label for="inputExperience" class="col-sm-5 col-form-label"><?php echo $entry_captcha_page; ?></label>
							 <div class="row" style="padding-left:25px">
								<?php foreach($captcha_pages as $value): ?>
								  <?php $word = $value->maintainance_value;
									$mystring = $config_captcha_page;
									if($config_captcha_page) {
									  if(strpos($mystring, $word) !== false){ ?>
										<div class="col-3">
											<input type="checkbox" name="config_captcha_page[]" class="form-check-input" id="captcha_page" value="<?php echo $word; ?>" checked="checked" />
											<label class="form-check-label" for="exampleCheck2"><?php echo $value->maintainance_value; ?></label>
										</div>
									  <?php } else{ ?>
										<div class="col-3">
											<input type="checkbox" name="config_captcha_page[]" class="form-check-input" id="captcha_page" value="<?php echo $word; ?>" />
											<label class="form-check-label" for="exampleCheck2"><?php echo $value->maintainance_value; ?></label>
										</div>
									  <?php } ?>
									<?php } else { ?>
									  <div class="col-3">
											<input type="checkbox" name="config_captcha_page[]" class="form-check-input" id="captcha_page" value="<?php echo $word; ?>" />
											<label class="form-check-label" for="exampleCheck2"><?php echo $value->maintainance_value; ?></label>
									  </div>
									<?php } ?>
								<?php endforeach; ?>
							 </div>
						  </div>
                        </div>-->
                     </div>
                  </form>
               </div>
            </div>
			</div>
		</div>
	</div>
	<!-- /Page Content -->
	
</div>
<script>
	$(document).ready(function() {
		var readURL = function(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('.profile-pic').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$('.change-img').on('click', function(){
			$('#config_logo').trigger('click');
		});

		$(".file-upload").on('change', function(){
			readURL(this);
		});

		$(".upload-button").on('click', function() {
		$(".file-upload").click();
		});
	});
</script>
<script>
	$(window).on('load', function() {
		changeCity();
		changeCurrency();
	});
</script>
<script type="text/javascript"><!--
	function changeCurrency() {
		var currency_id = document.getElementById("config_currency").value;
		if(currency_id){
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>common/common/getCurrency',
				data:{currency_id: currency_id},
				dataType: 'json',
				success:function(json){
					document.getElementById("currency_symbol").value = json['currency_symbol'];

				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}
//--></script>
<script>
	function changeCity() {
		var state_id = document.getElementById("config_state").value;
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
							if (json['city'][i]['id'] == '<?php echo $config_city; ?>') {
								html += '<option value="' + json['city'][i]['id'] + '" selected="selected">' + json['city'][i]['name'] + '</option>';
							}
						}
					} else {
						html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
					}
					$('select[name=\'config_city\']').html(html);

				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}
</script>
<script type="text/javascript"><!--
	$('select[name=\'config_country\']').on('change', function() {
		var country_id = $(this).val();
		if(country_id){
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>common/common/getState',
				data:{country_id: country_id},
				dataType: 'json',
				success:function(json){
					console.log(json['states']);
					html = '<option value=""><?php echo $text_select; ?></option>';
					if (json['states'] && json['states'] != '') {
						for (i = 0; i < json['states'].length; i++) {
							html += '<option value="' + json['states'][i]['id'] + '">' + json['states'][i]['name'] + '</option>';
							if (json['states'][i]['id'] == '<?php echo $config_state; ?>') {
								html += '<option value="' + json['states'][i]['id'] + '" selected="selected">' + json['states'][i]['name'] + '</option>';
							}
						}
					} else {
						html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
					}

					$('select[name=\'config_state\']').html(html);
					
					document.getElementById("config_city").value = '';

				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	});
	$('select[name=\'config_country\']').trigger('change');
//--></script>
<script>
   $( "#tabs" ).tabs();
</script>