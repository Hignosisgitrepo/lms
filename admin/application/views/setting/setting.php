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
            <h2 class="mb-0"><?php echo $text_setting; ?></h2>
            <ol class="breadcrumb p-0 m-0">
               <li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard'; ?>"><?php echo $text_dashboard; ?></a></li>
               <li class="breadcrumb-item active">
                  <?php echo $text_setting; ?>
               </li>
            </ol>
         </div>
      </div>
      <div class="row"
         role="tablist">
         <div class="col-auto">
            <button type="submit" form="form-setting" data-toggle="tooltip" title="Save" class="btn btn-outline-success"><i class="fa fa-save"></i></button>
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
                     <form action="<?php echo base_url().'save-setting'; ?>" method="post" enctype="multipart/form-data" id="form-setting" class="form-horizontal">
                        <div class="card-body">
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
                     </div>
					</form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>